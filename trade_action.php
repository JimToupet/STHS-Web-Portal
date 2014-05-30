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

 
$GetAction = "accept";
if (isset($_GET['action'])) {
  $GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}
$GetTeam = "1";
if (isset($_GET['teamnum'])) {
  $GetTeam = (get_magic_quotes_gpc()) ? $_GET['teamnum'] : addslashes($_GET['teamnum']);
}
$ID_GetTransactionID = "0";
if (isset($_GET['id'])) {
  $ID_GetTransactionID  = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}

$query_GetTrans = sprintf("SELECT Team1, Team2 FROM transactions WHERE T_ID=".$ID_GetTransactionID);
$GetTrans = mysql_query($query_GetTrans, $connection) or die(mysql_error());
$row_GetTrans = mysql_fetch_assoc($GetTrans);
$query_GetTeam1 = sprintf("SELECT proteam.Email, proteam.EmailAlert, proteam.Number, proteam.City, proteam.Name, proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider FROM proteam WHERE proteam.Number='%s'",$row_GetTrans['Team1']);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
$query_GetTeam2 = sprintf("SELECT proteam.Email, proteam.EmailAlert, proteam.Number, proteam.City, proteam.Name, proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider FROM proteam WHERE proteam.Number='%s'",$row_GetTrans['Team2']);
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

if ($GetAction == "accept") {
	if ($GetTeam == 1) {
		$updateSQL = "UPDATE transactions SET Team1Approved='True' WHERE T_ID=".$ID_GetTransactionID;
	} else {
		$updateSQL = "UPDATE transactions SET Team2Approved='True' WHERE T_ID=".$ID_GetTransactionID;
	}
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "TRADE - Accepted by the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'];
  	$MailMessage1 = "The ".$row_GetTeam2['City']." ".$row_GetTeam2['Name']." have accepted the trade offer.  The offer has been sent to the league for approval.  It may take up to 24 hours to get approval.";
  	$MailMessage2 = "The trade between you and the ".$row_GetTeam1['City']." ".$row_GetTeam1['Name']." has accepted by both teams.  The offer has been sent to the league for approval.  It may take up to 24 hours to get approval.";
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTeam1['Number'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage2;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTeam2['Number'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	
	
	$query_GetTransaction = sprintf("SELECT COUNT(T_ID) as TeamApproved FROM transactions WHERE Team1Approved = 'True' AND Team2Approved = 'True' AND T_ID = %s", $ID_GetTransactionID);
	$GetTransaction = mysql_query($query_GetTransaction, $connection) or die(mysql_error());
	$row_GetTransaction = mysql_fetch_assoc($GetTransaction);
		
	if ($row_GetTransaction['TeamApproved'] == 1) {
		// To send HTML mail, the Content-type header must be set
		$to =  $_SESSION['site_Email'];
		$subject = "TRADE APPROVAL BY BOTH TEAMS - ".strftime('%Y-%m-%d', strtotime('now'));
		$body = "A transaction has been approved by the two teams involved.  Please ACCEPT or DECLINE the transaction.";
		sendMail($_SESSION['site_Email'], $_SESSION['site_Email'], $subject, $body);
	}
	
	if ($row_GetTeam1['EmailAlert']==1){		
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $subject, $body);
	}
	
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $subject, $body);
	}
	
	mysql_free_result($GetTransaction);
	
	$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "decline") {
	if ($GetTeam == 1) {
		$updateSQL = "UPDATE transactions SET Team1Approved='Declined' WHERE T_ID=".$ID_GetTransactionID;
	} else {
		$updateSQL = "UPDATE transactions SET Team2Approved='Declined' WHERE T_ID=".$ID_GetTransactionID;
	}
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "TRADE - declined by the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'];
  	$MailMessage1 = "<p>The ".$row_GetTeam2['City']." ".$row_GetTeam2['Name']." have declined the trade offer.</p>";	
	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $row_GetTeam2['Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $row_GetTeam2['Email'], $MailSubject, $MailMessage2);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTeam1['Number'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());

	$deleteSQL = "DELETE FROM  transactions WHERE T_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

} else if ($GetAction == "commishaccept") {
	$updateSQL = "UPDATE transactions SET CommishApproved='True' WHERE T_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	
  	$MailSubject = "TRADE - Approved by league";
  	$MailMessage1 = "The league has approved your trade with the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'].".  It may take up to 24 hours to see the changes on the website.";
  	$MailMessage2 = "The league has approved your trade with the ".$row_GetTeam1['City']." ".$row_GetTeam1['Name'].".  It may take up to 24 hours to see the changes on the website.";
	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage2);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTrans['Team1'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage2;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTrans['Team2'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());

} else if ($GetAction == "commishdecline") {
	$updateSQL = "UPDATE transactions SET CommishApproved='Declined' WHERE T_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "TRADE - Declined by league";
  	$MailMessage1 = "The league has declined your trade with the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'].".  You can contact <a href='mailto:".$_SESSION['site_Email']."'>".$_SESSION['site_Email']."</a> for more information.";
  	$MailMessage2 = "The league has declined your trade with the ".$row_GetTeam1['City']." ".$row_GetTeam1['Name'].".  You can contact <a href='mailto:".$_SESSION['site_Email']."'>".$_SESSION['site_Email']."</a> for more information.";
  	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage2);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTrans['Team1'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage2;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetTrans['Team2'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$deleteSQL = "DELETE FROM transactions WHERE T_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "remove") {
	$deleteSQL = "DELETE FROM transactions WHERE T_ID=".$ID_GetTransactionID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
}


$url = $_SESSION['DomainName'].'/transactions.php';

if($row_GetTeam1['oauth_provider']=='facebook' && $row_GetTeam1['oauth_uid'] != "" && $row_GetTeam1['post_approvals']=='True'){
	$post =  array(
		'access_token' => $row_GetTeam1['access_token'],
		'link' => $url,
		'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
		'name' => $_SESSION['SiteName'],
		'message' => $MailSubject,
		'description' => $MailMessage1
	);
	//and make the request
	try {
		$res = $facebook->api('/'.$row_GetTeam1['oauth_uid'].'/feed', 'POST', $post);
	} catch (FacebookApiException $e) {}
	//echo "<br>1=".$row_GetTeam1['access_token']."<br>";
	
} 
if($row_GetTeam1['oauth_provider']=='twitter' && $row_GetTeam1['post_approvals']=='True'){
	$tinyURL = ShortUrl::create($url,'tinyurl');
	$MailMessage = $MailSubject." - ".$tinyURL;
	
	/* Get user access tokens out of the session. */
	$access_token = explode(",", $row_GetTeam1['access_token']);
	$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
	$response = $twitter_connection->post('statuses/update', array('status' => substr($MailMessage, 0, 140)));
	//echo "<br>1=".$access_token[0]."<br>";	echo $access_token[1]."<br>";
	
} 
if($row_GetTeam2['oauth_provider']=='facebook' && $row_GetTeam2['oauth_uid'] != "" && $row_GetTeam2['post_approvals']=='True'){
	$post =  array(
		'access_token' => $row_GetTeam2['access_token'],
		'link' => $url,
		'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
		'name' => $_SESSION['SiteName'],
		'message' => $MailSubject,
		'description' => $MailMessage2
	);
	//and make the request
	try {
		$res = $facebook->api('/'.$row_GetTeam2['oauth_uid'].'/feed', 'POST', $post);
	} catch (FacebookApiException $e) {}
	//echo "<br>2=".$row_GetTeam1['access_token']."<br>";
	
}
if($row_GetTeam2['oauth_provider']=='twitter' && $row_GetTeam2['post_approvals']=='True'){
	$tinyURL = ShortUrl::create($url,'tinyurl');
	$MailMessage = $MailSubject." - ".$tinyURL;
	/* Get user access tokens out of the session. */
	$access_token = explode(",", $row_GetTeam2['access_token']);
	$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
	$response = $twitter_connection->post('statuses/update', array('status' => substr($MailMessage2, 0, 140)));
	//echo "<br>2<br>".$access_token[0]."<br>";	echo $access_token[1]."<br>".$MailMessage2;
}

mysql_free_result($GetTrans);
mysql_free_result($GetTeam1);
mysql_free_result($GetTeam2);
$updateGoTo = "transactions.php?Team=".$_SESSION['U_ID'];
header(sprintf("Location: %s", $updateGoTo));
?>