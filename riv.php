<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO rivalry (Team1,Team2,Team1Approved,Team2Approved,CommishApproved,DateCreated) values (%s,%s,%s,'False','False',%s)",
                        GetSQLValueString($_POST['team1'], "int"),
                        GetSQLValueString($_POST['team2'], "int"),
                       	GetSQLValueString($_POST['TEAM1_CONFIRM'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  $query_GetTeam = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['team1']);
  $GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
  $row_GetTeam = mysql_fetch_assoc($GetTeam);
  
  $query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['team2']);
  $GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
  $row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
  $MailSubject = "RIVALRY - Awaiting your approval.";
  $MailMessage = "<p>The ".$row_GetTeam['City']." ".$row_GetTeam['Name']." has submitted a rivalry to the league.  You are required to either accept or decline the rivalry offer. The rivalry will become void if you do not accept or decline in the RIVALRY secton of the website.</p>";
  $MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO chat (chat.from,chat.to,message,sent,recd) values (%s,%s,%s,now(),0)",
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam['Name'])), "text"),
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam2['Name'])), "text"),
					GetSQLValueString($MailMessage, "text"));
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
	
  $updateGoTo = "rivalry.php?Team=".$_SESSION['current_Team_ID'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$GetTeamID = "1";
if (isset($_POST['team1'])) {
  $GetTeamID = (get_magic_quotes_gpc()) ? $_POST['team1'] : addslashes($_POST['team1']);
}
$ID_GetTeam2 = "Bruins";
if (isset($_POST['team2'])) {
  $ID_GetTeam2 = (get_magic_quotes_gpc()) ? $_POST['team2'] : addslashes($_POST['team2']);
}

$query_GetTeam2 = sprintf("SELECT Name, City, Number FROM proteam WHERE Name='%s'", $ID_GetTeam2);
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

$query_GetTeam1 = sprintf("SELECT Name, City, Number FROM proteam WHERE Name='%s'", $GetTeamID);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Submit a Rivalry - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />



<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->

<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
 <h1>Submit a Rivalry</h1>
<table width="100%" cellspacing="0" border="0" >
<tr style="background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>">
	<td style="padding-top: 2px; font-weight: bold;;">TEAM 1</td>
</tr>
<tr class="rowHeader" style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
	<td class="playerHeaderCell" style="color:#FFFFFF"><strong><?php echo $row_GetTeam1['City']." ".$GetTeamID; ?></strong></td>
</tr>
</table>
<?php if(!isset($_SESSION['U_ID'])) { ?>
	<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return dontcheckme();">
	<input type="hidden" name="TEAM1_CONFIRM" value="False" />
<?php } else { ?>
	<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return checkme();">
<?php } ?>
<input type="hidden" name="team1" value="<?php echo $row_GetTeam1['Number']; ?>" />
<div align="center">
<?php if(!isset($_SESSION['U_ID'])) {
	echo '<br />Please check here if the GM of team 1 agrees to this rivalry request.';
} else {
	echo '<br /><input type="checkbox" name="TEAM1_CONFIRM" value="True" />&nbsp;Please check here if the GM of team 1 agrees to this rivalry request.';
}
?>
</div>
	<br /><br />
<table width="100%" cellspacing="0" border="0" >
<tr style="background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>">
	<td style="padding-top: 2px; font-weight: bold;;">TEAM 2</td>
</tr>
<tr class="rowHeader" style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
	<td class="playerHeaderCell" style="color:#FFFFFF"><strong><?php echo $row_GetTeam2['City']." ".$ID_GetTeam2; ?></strong></td>
</tr>
</table><br />
<input type="hidden" name="team2" value="<?php echo $row_GetTeam2['Number']; ?>" />
<br /><div align="center">The G.M. of Team 1 must log in and accept this rivalry request before it will be submitted to the commissioner.</div>
<br />
<div align="center">
<br /><hr /><br />
<input type="submit" value="Submit Rivalry" />
	<br /><br />
	<input type="hidden" name="MM_insert" value="form1">
</form>	
</td>
	</tr>
</table>  
    
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>