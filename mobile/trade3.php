<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_Assets = "Assets";
	$l_Select  = "Select a team to trade with";
	$l_PageTitle = "Trade - Step 3/3";
	$l_Step = "Step";
	$l_FutureConsiderations="Future Considerations";
	$l_Submit = "Submit Trade";
	break; 

case 'fr': 
	$l_PageTitle = "&Eacute;changese - Step 3/3";
	$l_FutureConsiderations="Futures considérations";
	$l_Step = "Step";
	$l_Assets = "Articles";
	$l_Select  = "Choisissez une &eacute;quipe";
	$l_Submit = "Soumettez le commerce";
	break;
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO transactions (Team1,Team2,Team1List,Team2List,Team1Approved,Team2Approved,CommishApproved,DateCreated,FutureConsiderations) values (%s,%s,%s,%s,%s,'False','False',%s,%s)",
                        GetSQLValueString($_POST['TEAM1'], "int"),
                        GetSQLValueString($_POST['TEAM2'], "int"),
                       	GetSQLValueString($_POST['TEAM1_ASSETS'], "text"),
                       	GetSQLValueString($_POST['TEAM2_ASSETS'], "text"),
                       	GetSQLValueString($_POST['TEAM1_CONFIRM'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
						GetSQLValueString($_POST['FutureConsiderations'], "text"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  $query_GetTeam = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['TEAM1']);
  $GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
  $row_GetTeam = mysql_fetch_assoc($GetTeam);
  
  $query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['TEAM2']);
  $GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
  $row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
  $MailSubject = "TRADE - Awaiting your approval.";
  $MailMessage = "<p>The ".$row_GetTeam['City']." ".$row_GetTeam['Name']." has submitted a trade to the league.  You are required to either accept or decline the trade offer. The trade will become void if you do not accept or decline in the TRADES secton of the website.</p>";
  
  $insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
                        GetSQLValueString($MailSubject, "text"),
                        GetSQLValueString($MailMessage, "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($_POST['team1'], "int"),
						GetSQLValueString($_POST['team2'], "int"));
  $Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
  
  mysql_free_result($GetTeam);
  
  	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:".$row_GetTeam['Email']."\r\n";
	if ($row_GetTeam2['EmailAlert']==1){
		$to =  $row_GetTeam2['Email'];
		if (mail($to, $MailSubject, $MailMessage, $headers)) {
		  $errortxt = "\n Email has been sent to - ".$to."<br>";
		 } else {
		  $errortxt = "\n Message delivery failed - ".$to."<br>";
		 }
		//echo "$errortxt";
	}
	 mysql_free_result($GetTeam2);
	 
	 $insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
  $updateGoTo = "team.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$GetTeamID = "0";
if (isset($_POST['TEAM1'])) {
  $GetTeamID = (get_magic_quotes_gpc()) ? $_POST['TEAM1'] : addslashes($_POST['TEAM1']);
}
$GetTeamID2 = "0";
if (isset($_POST['TEAM2'])) {
  $GetTeamID2 = (get_magic_quotes_gpc()) ? $_POST['TEAM2'] : addslashes($_POST['TEAM2']);
}
$TEAM1_CONFIRM = "False";
if (isset($_POST['TEAM1_CONFIRM'])) {
  $TEAM1_CONFIRM = (get_magic_quotes_gpc()) ? $_POST['TEAM1_CONFIRM'] : addslashes($_POST['TEAM1_CONFIRM']);
}
$TEAM1_ASSETS = "";
if (isset($_POST['TEAM1_ASSETS'])) {
  $TEAM1_ASSETS = (get_magic_quotes_gpc()) ? $_POST['TEAM1_ASSETS'] : addslashes($_POST['TEAM1_ASSETS']);
}
$TEAM2_ASSETS = "";
if (isset($_POST['select4'])) {
	$N = count($_POST['select4']);
	$tmpList = "";
	for($i=0; $i < $N; $i++)
	{
	  $tmpList = $tmpList.$_POST['select4'][$i] . "<br />";
	}
  $TEAM2_ASSETS = $tmpList ;
}
$FutureConsiderations = "";
if (isset($_POST['FutureConsiderations'])) {
  $FutureConsiderations = (get_magic_quotes_gpc()) ? $_POST['FutureConsiderations'] : addslashes($_POST['FutureConsiderations']);
}

$query_GetTeam2 = sprintf("SELECT Name, City, Number FROM proteam WHERE Number=%s", $GetTeamID2);
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

$query_GetTeam1 = sprintf("SELECT Name, City, Number FROM proteam WHERE Number=%s", $GetTeamID);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['TouchIcon'];?>" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $_SESSION['SiteName'] ; ?></title>
<meta content="STHS Web Portal" name="keywords" />
</head>

<body>

<div id="topbar">
	<div id="title"><?php echo $_SESSION['current_City']." ".$_SESSION['current_Team'];?></div>
	<div id="leftnav">
		<a href="trade.php"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<form method="post" action="<?php echo $editFormAction;?>">
		<fieldset><span class="graytitle"><?php echo $l_PageTitle;?></span>
		<ul class="pageitem">
        	<br />
			<ul class="pageitem"> 
			<li class="textbox"><span class="header"><?php echo $row_GetTeam1['City']." ".$row_GetTeam1['Name']." ".$l_Assets; ?></span>
            <?php echo $TEAM1_ASSETS;?>
            </ul>
			<ul class="pageitem"> 
			<li class="textbox"><span class="header"><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']." ".$l_Assets; ?></span>
           <?php echo $TEAM2_ASSETS;?>
            </ul>
            <ul class="pageitem"> 
			<li class="textbox"><span class="header"><?php echo $l_FutureConsiderations;?></span>
            <?php echo $FutureConsiderations;?>
            </ul>
            
        <li class="button">
			<input type="hidden" name="TEAM1" value="<?php echo $GetTeamID;?>" />
			<input type="hidden" name="TEAM2" value="<?php echo $GetTeamID2;?>" />
            <input type="hidden" name="TEAM1_CONFIRM" value="<?php echo $TEAM1_CONFIRM ;?>" />
            <input type="hidden" name="TEAM1_ASSETS" value="<?php echo $TEAM1_ASSETS;?>" />
            <input type="hidden" name="TEAM2_ASSETS" value="<?php echo $TEAM2_ASSETS;?>" />
           <input type="hidden" name="FutureConsiderations" value="<?php echo $FutureConsiderations;?>" />
			<input name="Submit input" type="submit" value="<?php echo $l_Submit;?>" /></li>
		</ul>
        
        <input type="hidden" name="MM_insert" value="form1">
		</fieldset></form>
</div>

<div id="footer">
	<a class="noeffect" href="http://www.simhl.net"><?php echo $l_footer_2; ?> STHS WEB PORTAL</a>
	&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php
    $currentFile = $_SERVER["SCRIPT_NAME"]; 
    $parts = Explode('/', $currentFile); 
    $currentFile = $parts[count($parts) - 1]; 
    if($lang=='en'){
        echo '<a class="noeffect"href="langswitch.php?lang=fr&prevpage='.$currentFile.'">Fran&ccedil;ais</a>';
    } else {
        echo '<a class="noeffect"href="langswitch.php?lang=en&prevpage='.$currentFile.'">English</a>';
    }
    ?>
</div>

</body>

</html>
