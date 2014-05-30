<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_MailSubject = "Warning - Over the Team 50 Protected Player Limit";
	$l_MailMessage  = "This message is to warn you that your hockey team is over the league 50 protected player limit.  This 50 player list is composed of all the players in your PRO, FARM and PROSPECTS.  Please fix problem within the next 48 hours.  You can release or trade away players.  If you do not, you could face league fines.";
	break; 

case 'fr': 
	$l_MailSubject = "Avertissement - au-dessus de la limite prot&eacute;g&eacute;e de joueur de l&apos;&eacute;quipe 50";
	$l_MailMessage  = "Ce message est de vous avertir que votre &eacute;quipe de hockey est au-dessus de la limite prot&eacute;g&eacute;e de joueur de la ligue 50. Cette liste de 50 joueurs se compose de tous les joueurs dans votre PRO, FERME et PERSPECTIVES. Veuillez fixer le probl&egrave;me dans les 48 heures suivantes. Vous pouvez lib&eacute;rer ou commercer les joueurs partis. Si vous ne faites pas, vous pourriez faire face &agrave; des fines de ligue.";
	break;
} 
$updateGoTo = "admin_report.php";

$query_GetWarning = sprintf("SELECT Number, Email FROM proteam WHERE Number=%s", $_GET['teamNumber']);
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