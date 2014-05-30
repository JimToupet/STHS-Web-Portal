<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
 
$GetAction = "claim";
if (isset($_GET['action'])) {
  $GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}
$GetPlayer = "1";
if (isset($_GET['player'])) {
  $GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetTeam = "0";
if (isset($_GET['team'])) {
  $GetTeam = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
}
$ID_GetTransactionID = "0";
if (isset($_GET['id'])) {
  $ID_GetTransactionID  = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ID_GetClaimID = "0";
if (isset($_GET['claim_id'])) {
  $ID_GetClaimID  = (get_magic_quotes_gpc()) ? $_GET['claim_id'] : addslashes($_GET['claim_id']);
}
$updateGoTo = "sent_request.php";


$query_GetTransaction = sprintf("SELECT proteam.Number,  proteam.Name, proteam.City, waiver.WID FROM waiver, proteam WHERE proteam.Number=waiver.FromTeam AND waiver.WID=%s", $ID_GetTransactionID);
$GetTransaction = mysql_query($query_GetTransaction, $connection) or die(mysql_error());
$row_GetTransaction = mysql_fetch_assoc($GetTransaction);

$query_GetEmails = sprintf("SELECT proteam.EmailAlert, proteam.Email, proteam.Number FROM waiver_claims, waiver, proteam WHERE waiver.Player = '%s' AND waiver.WID=waiver_claims.W_ID AND proteam.Number=waiver_claims.Team GROUP BY proteam.Number", $GetPlayer);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);
$targetID = $row_GetTransaction['Number'];
$targetName = $row_GetTransaction['City']." ".$row_GetTransaction['Name'];

if ($GetAction == "decline") {
	$deleteSQL = "DELETE FROM waiver WHERE WID=".$ID_GetTransactionID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
	
	$deleteSQL = "DELETE FROM waiver_claims WHERE W_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "claim") {
	$insertSQL = sprintf("INSERT INTO waiver_claims (W_ID, Team, DateCreated) values (%s,%s,%s)",
                        GetSQLValueString($ID_GetTransactionID, "int"),
                        GetSQLValueString($GetTeam, "int"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}
mysql_free_result($GetTransaction);
header(sprintf("Location: %s", $updateGoTo));
?>