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
	$Answer1 = "%item1 choose %item2 because they offered the highest financial package.";
	$Answer2 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
	$Answer3 = "%item1 takes less money and shocks the hockey world and choose %item2 because because he felt they were a better fit for his career.";
	$Answer4 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
	$NoTrade = " He also has a no trade clause added to his contract. ";
	break; 

case 'fr': 
	$MailSubject = '%item1 has accepted an offer sheet with %item2.';
	$MailMessage = '%item1 has decided to accept the contract offered by %item2 offered him a %item3 year deal worth $%item4. %item5 It may take up to 24 hours to see the changes on the website.';
	$Answer1 = "%item1 choose %item2 because they offered the highest financial package.";
	$Answer2 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
	$Answer3 = "%item1 takes less money and shocks the hockey world and choose %item2 because because he felt they were a better fit for his career.";
	$Answer4 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
	$NoTrade = " He also has a no trade clause added to his contract. ";
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
$GetType = "player";
if (isset($_POST['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_POST['type'] : addslashes($_POST['type']);
}
if($GetType == "goalie"){
	$ContractType="RFA Goalie Offer Sheet Final";
	$ContractSigned="RFA Goalie Signed";
	$query_GetPlayer= sprintf("SELECT Name, Position, Overall FROM goalies WHERE Number=%s ",$PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
} else {
	$ContractType="RFA Offer Sheet Final";	
	$ContractSigned="RFA Signed";
	$query_GetPlayer= sprintf("SELECT Name, Position, Overall FROM players WHERE Number=%s ",$PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
}

$query_GetStatus= sprintf("SELECT (O.Salary1 + O.Salary2 + O.Salary3 + O.Salary4 + O.Salary5 + O.Salary6 + O.Salary7 + O.Salary8 + O.Salary9 + O.Salary10 + O.bonus + (O.NoTrade * 500000)) as TotalOffer, O.bonus, O.NoTrade, O.NoTradeSalary, O.Salary1, O.Salary2, O.Salary3, O.Salary4, O.Salary5, O.Salary6, O.Salary7, O.Salary8, O.Salary9, O.Salary10, O.Contract, O.Type, O.DateCreated, O.PR_ID, O.Team, T.City, T.Name as TeamName FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Type='%s' AND O.Team=T.Number Order By TotalOffer desc",$PID_GetPlayer, $ContractType);
$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
$row_GetStatus = mysql_fetch_assoc($GetStatus);
$totalRows_GetStatus = mysql_num_rows($GetStatus);
$TeamOfferList = "0";

if($_SESSION['PlayerAI'] == 0){
	$tmpCity = $row_GetStatus['City'];
	$tmpTeamSigned = $row_GetStatus['PR_ID'];
	$rand = 100;
} else {

$rand = rand(1,100);
$tmpRow = 0;
$tmpTeamSigned = 0;
$tmpTeamRow = 0;
$tmpChance = 100;

$tmpCity = "";
$tmpTeamName = "";
$tmpContract = 0;
$tmpSalary1 = 0;
$maxoffer = 0;

$Winner1 = $Answer1;
$Winner2 = $Answer2;
$Winner3 = $Answer3;

if($totalRows_GetStatus == 3){
	$OfferChance1 = 70;
	$OfferChance2 = 20;
	$OfferChance3 = 10;
} else if($totalRows_GetStatus == 2){
	$OfferChance1 = 70;
	$OfferChance2 = 30;
	$OfferChance3 = 0;
}

do { 
	
	$tmpRow = $tmpRow + 1;
	if($tmpRow == 1){
		$tmpCity1 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	} else if($tmpRow == 2){
		$tmpCity2 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	}if($tmpRow == 3){
		$tmpCity3 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	}
	
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
	
	$iceTimeTracker = checkPlayersFuture($row_GetStatus['Team'], $row_GetPlayer['Position'], $row_GetPlayer['Overall'], $connection);
	$offerPct = number_format(($row_GetStatus['TotalOffer']/$maxoffer)*100,0);

	if($tmpRow == 2){
		$TeamOfferID2 = $row_GetStatus['PR_ID'];
		$tmpTeamSigned2 = $row_GetStatus['PR_ID'];
		$WinnerSalary2 = $tmpSalary1 + $tmpSalary2 + $tmpSalary3 + $tmpSalary4 + $tmpSalary5 + $tmpSalary6 + $tmpSalary7 + $tmpSalary8 + $tmpSalary9 + $tmpSalary10 + $tmpBonus;
		$WinnerContract2 = $row_GetStatus['Contract'];
		if ($row_GetStatus['NoTrade'] == 0){
			$tmpNoTradeDescription2 = "";
		} else {
			$tmpNoTradeDescription2 = $NoTrade;
		}
		
		if($offerPct >= 75 && $iceTimeTracker == 0 && $totalRows_GetStatus == 3){	
			$OfferChance1 = 50;
			$OfferChance2 = 40;
			$OfferChance3 = 10;
			$Winner1 = $Answer1;
			$Winner2 = $Answer4;
			$Winner3 = $Answer2;
		} else if($offerPct >= 75 && $iceTimeTracker == 0 && $totalRows_GetStatus == 2){	
			$OfferChance1 = 50;
			$OfferChance2 = 50;
			$OfferChance3 = 0;
			$Winner1 = $Answer4;
			$Winner2 = $Answer4;
			$Winner3 = $Answer4;
		}
	} else if ($tmpRow == 3){	
		$TeamOfferID3 = $row_GetStatus['PR_ID'];
		$tmpTeamSigned2 = $row_GetStatus['PR_ID'];	
		$WinnerSalary3 = $tmpSalary1 + $tmpSalary2 + $tmpSalary3 + $tmpSalary4 + $tmpSalary5 + $tmpSalary6 + $tmpSalary7 + $tmpSalary8 + $tmpSalary9 + $tmpSalary10 + $tmpBonus;
		$WinnerContract3 = $row_GetStatus['Contract'];
		if ($row_GetStatus['NoTrade'] == 0){
			$tmpNoTradeDescription3 = "";
		} else {
			$tmpNoTradeDescription3 = $NoTrade;
		}
		
		if($offerPct >= 75 && $iceTimeTracker == 0 && $OfferChance2 > 20){	
			$OfferChance1 = 35;
			$OfferChance2 = 35;
			$OfferChance3 = 30;
			$Winner1 = $Answer4;
			$Winner2 = $Answer4;
			$Winner3 = $Answer4;
		} else if($offerPct >= 75 && $iceTimeTracker == 0 && $OfferChance2 == 20){	
			$OfferChance1 = 50;
			$OfferChance2 = 25;
			$OfferChance3 = 25;
			$Winner1 = $Answer1;
			$Winner2 = $Answer2;
			$Winner3 = $Answer2;
		}
	}  else {
		$TeamOfferID1 = $row_GetStatus['PR_ID'];
		$tmpTeamSigned1 = $row_GetStatus['PR_ID'];
		$WinnerSalary1 = $tmpSalary1 + $tmpSalary2 + $tmpSalary3 + $tmpSalary4 + $tmpSalary5 + $tmpSalary6 + $tmpSalary7 + $tmpSalary8 + $tmpSalary9 + $tmpSalary10 + $tmpBonus;
		$WinnerContract1 = $row_GetStatus['Contract'];
		if ($row_GetStatus['NoTrade'] == 0){
			$tmpNoTradeDescription1 = "";
		} else {
			$tmpNoTradeDescription1 = $NoTrade;
		}
	}
} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
mysql_free_result($GetStatus);
}

if ($totalRows_GetStatus == 3){
	if ($rand > 0 && $rand < $OfferChance3){
		$tmpTeamRow = 3;
		$Winner = $tmpCity3;
		$WinnerSalary = $WinnerSalary3;
		$WinnerContract = $WinnerContract3;
		$tmpNoTradeDescription = $tmpNoTradeDescription3;
		$TeamOfferList = $TeamOfferID1 . "," . $TeamOfferID2;
		$tmpTeamSigned = $tmpTeamSigned3;
	} else if ($rand >= $OfferChance3 && $rand < ($OfferChance3 + $OfferChance2)){
		$tmpTeamRow = 2;
		$Winner = $tmpCity2;
		$WinnerSalary = $WinnerSalary2;
		$WinnerContract = $WinnerContract2;
		$tmpNoTradeDescription = $tmpNoTradeDescription2;
		$TeamOfferList = $TeamOfferID1 . "," . $TeamOfferID3;
		$tmpTeamSigned = $tmpTeamSigned2;
	} else {
		$tmpTeamRow = 1;
		$Winner = $tmpCity1;
		$WinnerSalary = $WinnerSalary1;
		$WinnerContract = $WinnerContract1;
		$tmpNoTradeDescription = $tmpNoTradeDescription1;
		$TeamOfferList = $TeamOfferID3 . "," . $TeamOfferID2;
		$tmpTeamSigned = $tmpTeamSigned1;
	}
} else if ($totalRows_GetStatus == 2){
	if ($rand > 0 && $rand < $OfferChance2){
		$tmpTeamRow = 2;
		$Winner = $tmpCity2;
		$WinnerSalary = $WinnerSalary2;
		$WinnerContract = $WinnerContract2;
		$tmpNoTradeDescription = $tmpNoTradeDescription2;
		$TeamOfferList = $TeamOfferID1;
		$tmpTeamSigned = $tmpTeamSigned2;
	} else {
		$tmpTeamRow = 1;
		$Winner = $tmpCity1;
		$WinnerSalary = $WinnerSalary1;
		$WinnerContract = $WinnerContract1;
		$tmpNoTradeDescription = $tmpNoTradeDescription1;
		$TeamOfferList = $TeamOfferID2;
		$tmpTeamSigned = $tmpTeamSigned1;
	}
} else {
	$tmpTeamRow = 1;
	$Winner = $tmpCity1;
	$WinnerSalary = $WinnerSalary1;
	$WinnerContract = $WinnerContract1;
	$tmpNoTradeDescription = $tmpNoTradeDescription1;
	$TeamOfferList = $TeamOfferID3 . "," . $TeamOfferID2;
	$tmpTeamSigned = $tmpTeamSigned1;
}
$Looser = $tmpCity1;

$tmpTxtItems = array("%item1", "%item2", "%item3");
$updatedTxtItems = array($row_GetPlayer['Name'], $Winner, $Looser);
$Winner1 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner1);
$Winner2 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner2);
$Winner3 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner3);

$url = $_SESSION['DomainName'].'/rfa-free-agents_signed.php';

$query_GetEmails = sprintf("SELECT proteam.Number, proteam.Email, proteam.EmailAlert, proteam.post_approvals, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider  FROM playerscontractoffers, proteam WHERE playerscontractoffers.Player = '%s' AND proteam.Number=playerscontractoffers.Team GROUP BY proteam.Number", $PID_GetPlayer);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);

$tmpTxtItems = array("%item1","%item2");
$updatedTxtItems = array(addslashes($row_GetPlayer['Name']), $Winner);
$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubject);

$tmpTxtItems = array("%item1", "%item2","%item3","%item4","%item5");
$updatedTxtItems = array(addslashes($row_GetPlayer['Name']), $Winner.".  ".$Winner, $WinnerContract, number_format($WinnerSalary,0), $tmpNoTradeDescription);
$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage);

if($tmpTeamRow == 1){
	$MailMessage = $MailMessage . "<br><br>".$Winner1;
} else if ($tmpTeamRow == 2){
	$MailMessage = $MailMessage . "<br><br>".$Winner2;	
} else {
	$MailMessage = $MailMessage . "<br><br>".$Winner3;
}

$updateSQL = "UPDATE playerscontractoffers SET Type='".$ContractSigned."', DateCreated='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE PR_ID=".$tmpTeamSigned." AND Type='".$ContractType."'";
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

$deleteSQL = "DELETE FROM playerscontractoffers WHERE Player=".$PID_GetPlayer." AND PR_ID IN (".$TeamOfferList.")";
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

//$removeGoTo = "rfa-free-agents_signed.php";
//header(sprintf("Location: %s", $removeGoTo));

?>