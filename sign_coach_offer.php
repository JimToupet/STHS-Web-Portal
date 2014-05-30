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
	$MailSubject = '%item1 has accepted an offer sheet with %item2.';
	$MailMessage = '%item1 has decided to accept the contract offered by %item2 offered him a %item3 year deal worth $%item4. %item5 It may take up to 24 hours to see the changes on the website.';
	break; 

case 'fr': 
	$MailSubject = '%item1 has accepted an offer sheet with %item2.';
	$MailMessage = '%item1 has decided to accept the contract offered by %item2 offered him a %item3 year deal worth $%item4. %item5 It may take up to 24 hours to see the changes on the website.';
	break;
} 

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
$PID_GetPlayer = "1";
if (isset($_POST['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_POST['player'] : ParseSQL($_POST['player']);
}



$query_GetStatus= sprintf("SELECT (O.Salary1 + O.Salary2 + O.Salary3 + O.Salary4 + O.Salary5 + O.Salary6 + O.Salary7 + O.Salary8 + O.Salary9 + O.Salary10 + O.bonus) as TotalOffer, O.bonus, O.NoTrade, O.NoTradeSalary, O.Salary1, O.Salary2, O.Salary3, O.Salary4, O.Salary5, O.Salary6, O.Salary7, O.Salary8, O.Salary9, O.Salary10, O.Contract, O.Type, O.DateCreated, O.PR_ID, O.Team, O.FarmPro, T.City, T.Name as TeamName FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By TotalOffer desc",$PID_GetPlayer);
$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
$row_GetStatus = mysql_fetch_assoc($GetStatus);
$totalRows_GetStatus = mysql_num_rows($GetStatus);
$TeamOfferList = "0";

if($_SESSION['PlayerAI'] == 1){
	$tmpCity = $row_GetStatus['City'];
	$tmpTeamSigned = $row_GetStatus['PR_ID'];
	$rand = 100;
} else {
$rand = rand(1,100);
$tmpRow = 0;
$tmpTeamSigned = 0;
$tmpTeamRow = 0;
$tmpChance = 100;
$tmpFarmPro = "Pro";

if ($totalRows_GetStatus == 3){
	if ($rand > 0 && $rand < 10){
		$tmpTeamRow = 3;
	} else if ($rand > 9 && $rand < 31){
		$tmpTeamRow = 2;
	} else {
		$tmpTeamRow = 1;
	}
} else if ($totalRows_GetStatus == 2){
	if ($rand > 0 && $rand < 31){
		$tmpTeamRow = 2;
	} else {
		$tmpTeamRow = 1;
	}
} else {
	$tmpTeamRow = 1;
}

$tmpCity = "";
$tmpTeamName = "";
$tmpContract = 0;
$tmpSalary1 = 0;
//echo "<h3>".$PID_GetPlayer." decision time results</h3>";
//echo "<p>Total offer is (Salary1 per yer + (10% of Salary1 * years) + (10% of Salary1 * no trade clause)  + (25% of signing bonus))</p>";
//echo "<table width=600 border=1 cellpadding=5>";
//echo "<tr><td>Team</td><td>years</td><td>Salary1</td><td>no trade</td><td>bonus</td><td align=center>Total Offer</td><td>Chances of winning</td></tr>";
do { 
	//echo "<tr>";
	$tmpRow = $tmpRow + 1;
	if($tmpRow == $tmpTeamRow){
		$tmpTeamSigned = $row_GetStatus['PR_ID'];
		$tmpCity = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
		$tmpTeamName = $row_GetStatus['Team'];
		$tmpContract = $row_GetStatus['Contract'];
		$tmpSalary1 = $row_GetStatus['Salary1'];
		$tmpSalary2 = $row_GetStatus['Salary2'];
		$tmpSalary3 = $row_GetStatus['Salary3'];
		$tmpSalary4 = $row_GetStatus['Salary4'];
		$tmpSalary5 = $row_GetStatus['Salary5'];
		$tmpSalary6 = $row_GetStatus['Salary6'];
		$tmpSalary7 = $row_GetStatus['Salary7'];
		$tmpSalary8 = $row_GetStatus['Salary8'];
		$tmpSalary9 = $row_GetStatus['Salary9'];
		$tmpSalary10 = $row_GetStatus['Salary10'];
		$tmpBonus = $row_GetStatus['bonus'];
		$tmpFarmPro = $row_GetStatus['FarmPro'];
	} else {
		$TeamOfferList = $TeamOfferList.",".$row_GetStatus['PR_ID'];	
	}
	
	if($totalRows_GetStatus == 3){
		if ($tmpRow == 1){
			$tmpChance = 70;
		} else if ($tmpRow == 2){
			$tmpChance = 20;
		} else if ($tmpRow == 3){
			$tmpChance = 10;
		}
	} else if($totalRows_GetStatus == 2){
		if ($tmpRow == 1){
			$tmpChance = 70;
		} else if ($tmpRow == 2){
			$tmpChance = 30;
		}
	}
	//echo "<tr><td>".$row_GetStatus['City']."</td><td>".$row_GetStatus['Contract']."</td><td>$".number_format($row_GetStatus['Salary1'],0)."</td><td>".$tmpNoTrade."</td><td>$".number_format($row_GetStatus['bonus'],0)."</td><td align=center>$".number_format($row_GetStatus['TotalOffer'],0)."</td><td align=right>".$tmpChance."%</td></tr>";

	//echo "</tr>";
} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
mysql_free_result($GetStatus);
//echo "</table>";
}
//echo "<p>".$PID_GetPlayer." rolls his magic dice and rolls a <b>".$rand." out of 100</b>.  So, that means, he decides to sign with <b>".$tmpCity."</b>. </p><p>Click refrest a few times to see this randomly work. </p>";

$tmpNoTradeDescription = "";

$url = $_SESSION['DomainName'].'/depth_chart.php?team='.$tmpTeamSigned; 

$query_GetEmails = sprintf("SELECT proteam.Number, proteam.Email, proteam.EmailAlert, proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider  FROM playerscontractoffers, proteam WHERE playerscontractoffers.Player = '%s' AND proteam.Number=playerscontractoffers.Team GROUP BY proteam.Number", $PID_GetPlayer);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);

$tmpTxtItems = array("%item1","%item2");
$updatedTxtItems = array(addslashes($PID_GetPlayer), $tmpCity);
$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubject);

$tmpTxtItems = array("%item1", "%item2","%item3","%item4","%item5");
$updatedTxtItems = array(addslashes($PID_GetPlayer), $tmpCity.".  ".$tmpCity, $tmpContract, number_format($tmpSalary1 + $tmpSalary2 + $tmpSalary3 + $tmpSalary4 + $tmpSalary5 + $tmpSalary6 + $tmpSalary7 + $tmpSalary8 + $tmpSalary9 + $tmpSalary10,0), $tmpNoTradeDescription);
$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage);

$updateSQL = "UPDATE playerscontractoffers SET Type='Coach Signed', DateCreated='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE PR_ID=".$tmpTeamSigned;
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateSQL = "UPDATE coaches SET FarmPro='".$tmpFarmPro."' WHERE Name='".$PID_GetPlayer."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

do { 
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(ParseSQL($MailMessage), "text"),
							GetSQLValueString($row_GetEmails['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());

	if($row_GetEmails['oauth_provider']=='facebook' && $row_GetEmails['post_approvals']=='True' && $row_GetEmails['Number']==$tmpTeamSigned){
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
		
	} else if($row_GetEmails['oauth_provider']=='twitter' && $row_GetEmails['post_approvals']=='True' && $row_GetEmails['Number']==$tmpTeamSigned){
		$tinyURL = ShortUrl::create($url,'tinyurl');
		$MailMessage = $MailSubject." - ".$tinyURL;
		/* Get user access tokens out of the session. */
		$access_token = explode(",", $row_GetEmails['access_token']);
		$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
		$response = $twitter_connection->post('statuses/update', array('status' => substr($MailMessage, 0, 140)));
	}
	
} while ($row_GetEmails = mysql_fetch_assoc($GetEmails));

$deleteSQL = "DELETE FROM playerscontractoffers WHERE Player='".$PID_GetPlayer."' AND PR_ID IN (".$TeamOfferList.")";
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

//$removeGoTo = "coaches_signed.php";
//header(sprintf("Location: %s", $removeGoTo));

?>