<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Create Message";
	$l_To  = "TO";
	$l_Title  = "TITLE";
	$l_Message  = "MESSAGE";
	$l_Select  = "Select a team";
	$l_Submit  = "SEND";
	$l_Alert1 = "Please select a G.M. you wish to send a message to.";
	$l_Alert2 = "Please enter a title.";
	break; 

case 'fr': 
	$l_PageTitle = "Envoyez message";
	$l_To  = "&AGRAVE;";
	$l_Title  = "TITRE";
	$l_Message  = "MESSAGE";
	$l_Select  = "Choisissez une &eacute;quipe";
	$l_Submit  = "ENVOYEZ";
	$l_Alert1 = "Veuillez choisir un G.M. que vous souhaitez envoyer un message &agrave;.";
	$l_Alert2 = "Veuillez &eacute;crire un titre.";
	break;
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
                        GetSQLValueString($_POST['TITLE'], "text"),
                        GetSQLValueString($_POST['CONTENT'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($_SESSION['U_ID'], "int"),
						GetSQLValueString($_POST['RECEIVER'], "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  
  $query_GetTeam = sprintf("SELECT proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['RECEIVER']);
	$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
	$row_GetTeam = mysql_fetch_assoc($GetTeam);
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:".$_SESSION['U_Email']."\r\n";
		
	
	if ($row_GetTeam['EmailAlert']==1){
		$to =  $row_GetTeam['Email'];
		if (mail($to, $_POST['TITLE'], $_POST['CONTENT'], $headers)) {
		  $errortxt = "\n Email has been sent to - ".$to."<br>";
		 } else {
		  $errortxt = "\n Message delivery failed - ".$to."<br>";
		 }
		//echo "$errortxt";
	}
	mysql_free_result($GetTeam);
  
  $updateGoTo = "sent.php?team=".$_SESSION['U_ID'];
  header(sprintf("Location: %s", $updateGoTo));
}
$ID_GetMail = "1";
if (isset($_GET['id'])) {
  $ID_GetMail = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$GetType = "new";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}

if ($GetType == "reply"){
	$query_GetMail = sprintf("SELECT mail.* FROM mail WHERE mail.M_ID=%s", $ID_GetMail);
	$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
	$row_GetMail = mysql_fetch_assoc($GetMail);
	$tmpTitle="RE: ".$row_GetMail['Title'];
	
	if ($row_GetMail['Sender_U_ID'] == NULL){
		$tmpGM=0;
	} else {
		$tmpGM=$row_GetMail['Sender_U_ID'];
	}
	mysql_free_result($GetMail);
	
}else{
	$tmpGM=0;
	$tmpTitle="";
	$tmpContent="";
}

if ($GetType == "reply"){
	$query_GetTeamList = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number = %s",$tmpGM);
}else{
	$query_GetTeamList = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number <> %s ORDER BY proteam.City",$_SESSION['U_ID']);
}
$GetTeamList = mysql_query($query_GetTeamList, $connection) or die(mysql_error());
$row_GetTeamList = mysql_fetch_assoc($GetTeamList);
$totalRows_GetTeamList = mysql_num_rows($GetTeamList);

$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Email", "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
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
		<a href="check_messages.php?team=<?php echo $_SESSION['current_Team_ID']; ?>"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<form method="post" action="<?php echo $editFormAction; ?>">
		<fieldset><span class="graytitle"><?php echo $l_PageTitle;?></span>
		<ul class="pageitem">
			<li class="select">
            <select name="RECEIVER">
              <option value="0" selected="selected"><?php echo $l_Select;?></option>
				<?php do { ?>
                <option value="<?php echo $row_GetTeamList['Number']; ?>" <?php if ($tmpGM==$row_GetTeamList['Number']){ echo "selected"; }?>><?php echo $row_GetTeamList['City']." ".$row_GetTeamList['Name']." (".$row_GetTeamList['GM']; ?>)</option>
                <?php } while ($row_GetTeamList = mysql_fetch_assoc($GetTeamList)); ?>
              </select></li>
			<li class="textbox"><br /><span class="header"><?php echo $l_Title;?>:</span><input name="TITLE" size="65" value="<?php echo $tmpTitle; ?>" type="text" /><br /><br /></li>
            <li class="textbox"><br /><span class="header"><?php echo $l_Message;?>:</span><textarea name="CONTENT" rows="4"></textarea><br /><br /></li> 
		
        <li class="button">
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
