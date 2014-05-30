<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("facebook/facebook.php") ?>
<?php include("twitter/twitteroauth.php") ?>
<?php include("includes/shorturl.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$MailSubject = '%item1 has selected the final teams he will negotiate with.';
	$MailMessage = '%item1 has selected the following citys in which he will negotiate with %item2.  He will make a final decesion as early as 24 hours from now.';
	break; 

case 'fr': 
	$MailSubject = '%item1 has selected the final teams he will negotiate with.';
	$MailMessage = '%item1 has selected the following citys in which he will negotiate with %item2.  He will make a final decesion as early as 24 hours from now.';
	break;
} 

$facebook = new Facebook(array(
  'appId'  => APP_ID,
  'secret' => APP_SECRET,
  'cookie' => true,
));


if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}
$PID_GetPlayer = "1";
if (isset($_POST['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_POST['player'] : ParseSQL($_POST['player']);
}

$url = $_SESSION['DomainName'].'/coaches_decide.php';

$query_GetStatus= sprintf("SELECT  (O.Salary1 + O.Salary2 + O.Salary3 + O.Salary4 + O.Salary5 + O.Salary6 + O.Salary7 + O.Salary8 + O.Salary9 + O.Salary10 + O.bonus) as TotalOffer, O.Type, O.DateCreated, O.PR_ID, O.Team, T.City FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By TotalOffer desc limit 0,3",$PID_GetPlayer );
$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
$row_GetStatus = mysql_fetch_assoc($GetStatus);
$totalRows_GetStatus = mysql_num_rows($GetStatus);

if($totalRows_GetStatus > 1){

	$TeamOfferList = "0";
	$TeamOfferListName = "";
	do { 
		$TeamOfferList = $TeamOfferList.",".$row_GetStatus['PR_ID'];	
		$TeamOfferListName = $TeamOfferListName.",".$row_GetStatus['City'];	
	} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
	mysql_free_result($GetStatus);
	
	$query_GetEmails = sprintf("SELECT proteam.Number, proteam.Email, proteam.EmailAlert, proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider   FROM playerscontractoffers, proteam WHERE playerscontractoffers.Player = '%s' AND proteam.Number=playerscontractoffers.Team GROUP BY proteam.Number", $PID_GetPlayer);
	$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
	$row_GetEmails = mysql_fetch_assoc($GetEmails);
	
	$tmpTxtItems = array("%item1");
	$updatedTxtItems = array(addslashes($PID_GetPlayer));
	$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubject);
	
	$tmpTxtItems = array("%item1", "%item2");
	$updatedTxtItems = array(addslashes($PID_GetPlayer), $TeamOfferListName);
	$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage);
		do { 
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($row_GetEmails['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
		$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
	} while ($row_GetEmails = mysql_fetch_assoc($GetEmails));
	
	$updateSQL = "UPDATE playerscontractoffers SET Type='Coach Offer Sheet Final', DateCreated='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE Player='".$PID_GetPlayer."'";
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$deleteSQL = "DELETE FROM playerscontractoffers WHERE Player='".ParseSQL($PID_GetPlayer)."' AND PR_ID NOT IN (".$TeamOfferList.")";
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
	
	if($row_GetEmails['oauth_provider']=='facebook' && $row_GetEmails['post_approvals']=='True'){
		$post =  array(
			'access_token' => $row_GetEmails['access_token'],
			'link' => $url,
			'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
			'name' => $_SESSION['SiteName'],
			'message' => $MailSubject,
			'description' => $MailMessage
		);
		//and make the request
		try {
			$res = $facebook->api('/'.$row_GetEmails['oauth_uid'].'/feed', 'POST', $post);
		} catch (FacebookApiException $e) {}
		
	} else if($row_GetEmails['oauth_provider']=='twitter' && $row_GetEmails['post_approvals']=='True'){
		$tinyURL = ShortUrl::create($url,'tinyurl');
		$MailMessage = $MailSubject." - ".$tinyURL;
		/* Get user access tokens out of the session. */
		$access_token = explode(",", $row_GetEmails['access_token']);
		$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
		$response = $twitter_connection->post('statuses/update', array('status' => substr($MailMessage, 0, 140)));
	}
	
	//$removeGoTo = "coaches_w_offer.php";
	//header(sprintf("Location: %s", $removeGoTo));

} else {
	$updateSQL = "UPDATE playerscontractoffers SET Type='Coach Signed' WHERE Type='Coach Offer Sheet' AND Player=".$PID_GetPlayer;
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	//$removeGoTo = "sign_coach_offer.php?player=".$PID_GetPlayer;
	//header(sprintf("Location: %s", $removeGoTo));
}

?>