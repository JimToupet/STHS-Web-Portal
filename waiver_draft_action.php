<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$pos = 0;
$GetID = "1";
if (isset($_POST['id'])) {
  $GetID = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}
$GetAction = "True";
if (isset($_POST['action'])) {
  $GetAction = (get_magic_quotes_gpc()) ? $_POST['action'] : addslashes($_POST['action']);
}

 

$updateSQL = "UPDATE waiver_draft SET DraftStatus='".$GetAction."' WHERE D_ID=".$GetID;
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($GetAction == "True"){
$query_GetDraftDetails = sprintf("SELECT * FROM waiver_draft WHERE D_ID=%s",$GetID);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);
$totalRows_GetDraftDetails = mysql_num_rows($GetDraftDetails);

$query_GetNextPick = sprintf("SELECT D.*, P.EmailAlert, P.Email FROM waiver_draftpicks as D, proteam as P WHERE D.TeamName=P.Number AND D.Name = '' AND D.Draft_ID=%s ORDER BY D.Overall ASC LIMIT 0,1",$GetID);
$GetNextPick = mysql_query($query_GetNextPick, $connection) or die(mysql_error());
$row_GetNextPick = mysql_fetch_assoc($GetNextPick);
$totalRows_GetNextPick = mysql_num_rows($GetNextPick);

if ($totalRows_GetNextPick > 0){
	$offsetMinutes = $row_GetDraftDetails['DraftPickTime'];
	//$launchTime = date('Y/m/d H:i:s', strtotime("+$offsetMinutes minutes"));
	$launchTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
	$timeStamp = strtotime('now');
	$NewTime = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp + 600));
	$NewTime2 = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp));
	
	$updateSQL = "UPDATE waiver_draftpicks SET DateCreated='".$NewTime."' WHERE D_ID=".$row_GetNextPick['D_ID'];
	$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailMessage = '<p>It is now time to make your selection for the '.$row_GetDraftDetails['DraftName'].'.  You have '.$row_GetDraftDetails['DraftPickTime'].' minutes to log onto the site and make your selection.  If you fail to make your selection within '.$row_GetDraftDetails['DraftPickTime'].' minutes, the site will give you the top rated player on either the list you already created or the top rated player overall.</p><p><a href="'.$_SESSION['DomainName'].'/waiver_draft.php" target=_blank>Go make my pick now</a></p>';	
	$MailSubject = $row_GetDraftDetails['DraftName']." - Your turn to draft";
	if ($row_GetNextPick['EmailAlert']==1){
		sendMail($row_GetNextPick['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
	}
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString($row_GetNextPick['TeamName'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
} 
}
$updateGoTo = "waiver_draft.php";
header(sprintf("Location: %s", $updateGoTo));
?>