<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php

$PID_GetType = "player";
if (isset($_GET['type'])) {
  $PID_GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}

$updateGoTo = "admin_report.php";

if($PID_GetType = "player"){
	$query_GetWarning = sprintf("SELECT p.*, t.Email, t.Number as TeamNumber FROM proteam as t, players as p WHERE p.Team=t.Number AND p.Number=%s", $PID_GetPlayer);
}else{
	$query_GetWarning = sprintf("SELECT p.*, t.Email, t.Number as TeamNumber FROM proteam as t, goalies as p WHERE p.Team=t.Number AND p.Number=%s", $PID_GetPlayer);
}

switch ($lang){ 
case 'en': 
	$l_MailSubject = "Warning - ".$row_GetWarning['Name']." is not aloud in the minors";
	$l_MailMessage  = "This message is to warn you that your have ".$row_GetWarning['Name']." in the minors.  He makes too much salary to be in the minors.  Please move him to the pro team, buy him out or place him on waivers within the next 48 hours.  If you do not, he could be placed on league waivers.";
	break; 

case 'fr': 
	$l_MailSubject = "Avertissement - ".$row_GetWarning['Name']." n&apos;est pas &agrave; haute voix dans les mineurs";
	$l_MailMessage  = "Ce message est de vous avertir que votre ayez ".$row_GetWarning['Name']." dans les mineurs. Il fait trop de salaire pour &ecirc;tre dans les mineurs. Veuillez le d&eacute;placer &agrave; la pro &eacute;quipe, rachetez la part de lui ou placez-le sur des lev&eacute;es dans les 48 heures suivantes. Si vous ne faites pas, il pourrait &ecirc;tre plac&eacute; sur des lev&eacute;es de ligue.";
	break;
} 
$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}


$GetWarning = mysql_query($query_GetWarning, $connection) or die(mysql_error());
$row_GetWarning = mysql_fetch_assoc($GetWarning);
$totalRows_GetWarning = mysql_num_rows($GetWarning);

if ($totalRows_GetWarning > 0){
	$MailSubject = $l_MailSubject;
	$MailMessage = $l_MailMessage;
	sendMail($row_GetWarning['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString($row_GetWarning['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

mysql_free_result($GetWarning);
header(sprintf("Location: %s", $updateGoTo));
?>