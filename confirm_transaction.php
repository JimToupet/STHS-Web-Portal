<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("facebook/facebook.php") ?>
<?php include("twitter/twitteroauth.php") ?>
<?php include("includes/shorturl.php") ?>
<?php
//facebook application

$facebook = new Facebook(array(
  'appId'  => APP_ID,
  'secret' => APP_SECRET,
  'cookie' => true,
));

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}
$ID = 0;
if (isset($_POST["id"])) {
  $ID = (get_magic_quotes_gpc()) ? $_POST["id"] : addslashes($_POST["id"]);
}
$player = "";
if (isset($_POST["player"])) {
  $player = (get_magic_quotes_gpc()) ? $_POST["player"] : addslashes($_POST["player"]);
}
$Team = "0";
if (isset($_POST["teamnumber"])) {
  $Team = (get_magic_quotes_gpc()) ? $_POST["teamnumber"] : addslashes($_POST["teamnumber"]);
}

$query_GetEmails = sprintf("SELECT proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider FROM playerscontractoffers, proteam WHERE  PR_ID=%s AND proteam.Number=playerscontractoffers.Team GROUP BY proteam.Number", $ID);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);

$query_GetEmails = sprintf("SELECT proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider FROM playerscontractoffers, proteam WHERE  PR_ID=%s AND proteam.Number=playerscontractoffers.Team GROUP BY proteam.Number", $ID);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);

$url = $_SESSION['DomainName'].'/player.php?player='.$ID;

$insertSQL = sprintf("UPDATE playerscontractoffers SET Approved='True' WHERE PR_ID=%s",
                        GetSQLValueString($ID, "int"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
   $MailSubject = "CONTRACT - ".$_GET['player']." - APPROVED";
   $MailMessage = "The league has approved the contract signing of ".$player.".";
   $MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($Team, "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

?>