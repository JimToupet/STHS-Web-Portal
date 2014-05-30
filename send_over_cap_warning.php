<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_MailSubject = "Warning - Over the Team Salary Cap";
	$l_MailMessage  = "This message is to warn you that your hockey team is over the league salary cap.  Please fix your teams financial problem within the next 48 hours.  If you do not, you could face league fines.";
	break; 

case 'fr': 
	$l_MailSubject = "Avertissement - au-dessus du plafond de salaire d&apos;&eacute;quipe";
	$l_MailMessage  = "Ce message est de vous avertir que votre &eacute;quipe de hockey est au-dessus du plafond de salaire de ligue. Veuillez fixer votre probl&egrave;me financier d&apos;&eacute;quipes dans les 48 heures suivantes. Si vous ne faites pas, vous pourriez faire face &agrave; des fines de ligue.";
	break;
} 
$updateGoTo = "admin_report.php";

$query_GetWarning = sprintf("SELECT Number, Email FROM proteam WHERE Number=%s", $_GET['teamNumber']);
$GetWarning = mysql_query($query_GetWarning, $connection) or die(mysql_error());
$row_GetWarning = mysql_fetch_assoc($GetWarning);
$totalRows_GetWarning = mysql_num_rows($GetWarning);

if ($totalRows_GetWarning > 0){
	$MailSubject = "";
	$MailMessage = "";
	
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