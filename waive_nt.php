<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$MailSubjectInterest = "%item1 is interested in playing for %item2";
	$MailMessageInterest = "<img src='%item1' border='1' width='100' height='150' align='left' hspace='5' vspace='5'><p>%item2 is willing to waive his no trade clause with the %item3.  As a result he has submitted a list of %item4 teams he'd be willing to be traded to. Congratulations, the %item5 was on his list. If you wish to acquire his services please contact the %item6 to alert them of your interest.  If you both agree to a potential trade,  %item7 will have to contact the commishioner to inform them of the trade so the league can lift the no trade clause.</p>";
	$MailSubjectDecline = "%item1 declines waiving no trade clause.";
	$MailMessageDecline = "The agent asks that you wait 24 hours before asking him to waive his no trade clause again.";
	$MailSubjectAccept = "%item1 is willing to waive his no trade clause.";
	$MailMessageAccept = "%item2 has agreed to lift his no trade clause.  He has selected a list potential teams, in which he will be willing to be traded to.  Those teams are %item3. Please contact these teams to see if they wish to aquire his services.  If you do work out a trade, then contact the league to inform them so the no trade clause will be lifted.";
	$l_FinScore1 = "Your final score of";
	$l_FinScore2 = "was not within the range of 0 -";
	$l_FinScore3 = "was within the range of 0 -";
	break; 

case 'fr': 	
	$MailSubjectInterest = "%item1 est int&eacute;ress&eacute; &agrave; jouer pour %item2";
	$MailMessageInterest = "<img src='%item1' border='1' width='100' height='150' align='left' hspace='5' vspace='5'><p>%item2 est dispos&eacute; &agrave; &eacute;carter sa clause du commerce de non avec le %item3. En cons&eacute;quence il a soumis une liste %item4 des &eacute;quipes he&apos; ; d soit dispos&eacute; &agrave; &ecirc;tre commerc&eacute; &agrave;. Les f&eacute;licitations, le %item5 &eacute;taient sur sa liste. Si vous souhaitez acqu&eacute;rir ses services satisfont entrent en contact avec le %item6 pour les alerter de votre int&eacute;r&ecirc;t. Si vous tous les deux &ecirc;tes d&apos;accord sur un commerce potentiel, %item7 devra contacter le commishioner pour les informer que du commerce ainsi la ligue peut soulever la clause du commerce de non.</p>";
	$MailSubjectDecline = "%item1 d&eacute;clins n&apos;&eacute;cartant aucune clause commerciale.";
	$MailMessageDecline = "L&apos;agent demande que vous attendez 24 heures avant de lui demander d&apos;&eacute;carter encore.";
	$MailSubjectAccept = "%item1 est dispos&eacute; &agrave; &eacute;carter sa clause du commerce de non.";
	$MailMessageAccept = "%item2 a acceptent de soulever sa clause du commerce de non. Il a choisi les &eacute;quipes potentielles d&apos;une liste, dans aux lesquelles il sera dispos&eacute; &agrave; &ecirc;tre commerc&eacute;. Ces &eacute;quipes sont %item3. Veuillez contacter ces &eacute;quipes pour voir si elles souhaitent acqu&eacute;rir ses services. Si vous &eacute;tablissez un commerce, alors contactez la ligue pour les informer qu&apos;ainsi la clause du commerce de non sera soulev&eacute;e.";
	$l_FinScore1 = "Vos points finaux de";
	$l_FinScore2 = "est plus grande que la chance de";
	$l_FinScore3 = "% gagnez la chance de";
	break;
}

$query_GetInfo = sprintf("SELECT AI_NOTRADE_TEAM_LIST, AI_NOTRADE_AVAILABLE, AI_WAIVE_NT FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);

$PID_GetPlayer = "1";
if (isset($_POST['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_POST['player'] : addslashes($_POST['player']);
}
$GetType = "player";
if (isset($_POST['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_POST['type'] : addslashes($_POST['type']);
}

if ($GetType == 'goalie'){
	$query_GetPlayer = sprintf("SELECT P.Team, P.Photo, P.Name, P.MO, P.Overall, P.PO, P.Age, P.Salary1, P.EX, P.Contract FROM goalies as P, goaliestats as S WHERE P.Number=%s AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
}else{
	$query_GetPlayer = sprintf("SELECT P.Team, P.Photo, P.Name, P.MO, P.Overall, P.PO, P.Age, P.Salary1, P.EX, P.Contract FROM players as P, playerstats as S WHERE P.Number=%s AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
}
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

if($totalRows_GetPlayer > 0){
$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s AND Type='Waive' order by DateCreated desc", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);

$PlayersDecision = rand(1, 100);
$odds = $row_GetInfo['AI_WAIVE_NT'];
if($odds == "" || $odds < 1){
	$odds = 10;
}

if ($PlayersDecision <= $odds){
	
	$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt FROM playersextensionoffers WHERE Player=%s AND Team=%s AND Type='Waive'", $PID_GetPlayer, $row_GetPlayer['Team']);
	$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
	$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
	$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);

	if($row_GetPlayerExtensionOffers['Attempt'] >= $row_GetInfo['AI_NOTRADE_TEAM_LIST']) {
		$tradeRequestAmount = $row_GetInfo['AI_NOTRADE_TEAM_LIST'] - 1;
	} else if($row_GetPlayerExtensionOffers['Attempt'] >= 1 && $row_GetPlayerExtensionOffers['Attempt'] < $row_GetInfo['AI_NOTRADE_TEAM_LIST']){
		$tradeRequestAmount = $row_GetPlayerExtensionOffers['Attempt'];
	} else {
		$tradeRequestAmount = 0;
	}
	$NewAttempt = $row_GetInfo['AI_NOTRADE_TEAM_LIST'] - $tradeRequestAmount;

		$team_list = implode(',', unique_rand(1, $_SESSION['total_teams'], $NewAttempt)); 
		$team_list = str_replace($_SESSION['current_Team_ID'], "0", $team_list);
		$updateSQL = sprintf("INSERT INTO traderequests (RequestedTeams, Season, Player, RequestType) values (%s,%s,%s,%s)", 
			GetSQLValueString($team_list, "text"), 
			GetSQLValueString($_SESSION['current_Season'], "text"), 
			GetSQLValueString($row_GetPlayer['Name'], "text"),
			GetSQLValueString('NoTrade', "text"));
		$Result2 = mysql_query($updateSQL, $connection) or die(mysql_error());	

	
	$query_GetTeamEmails = sprintf("SELECT EmailAlert, Email, Number, City, Name FROM proteam WHERE Number IN (%s)", $team_list);
	$GetTeamEmails = mysql_query($query_GetTeamEmails, $connection) or die(mysql_error());
	$row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails);
	$totalRows_GetTeamEmails = mysql_num_rows($GetTeamEmails);
	$CityList = "";
	
	do {
			$CityList = $CityList.", ".$row_GetTeamEmails['City'];
				
			$tmpTxtItems = array("%item1", "%item1");
			$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamEmails['City']." ".$row_GetTeamEmails['Name']);
			$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubjectInterest);
			$tmpTxtItems = array("%item1", "%item2", "%item3", "%item4", "%item5", "%item6", "%item7");
			$updatedTxtItems = array(imageExists("/image/players/".$row_GetPlayer['Photo']), $row_GetPlayer['Name'], $row_GetPlayer['Team'], $NewAttempt, $row_GetTeamEmails['City']." ".$row_GetTeamEmails['Name'], $row_GetPlayer['Team']);
			$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessageInterest);
			
			if ($row_GetTeamEmails['EmailAlert']==1){
				sendMail($row_GetTeamEmails['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
			}
 			
			$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
			$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($row_GetTeamEmails['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));

			$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
			
		} while ($row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails)); 


		$tmpTxtItems = array("%item1");
		$updatedTxtItems = array($row_GetPlayer['Name']);
		$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubjectAccept);
		$tmpTxtItems = array("%item2", "%item3");
		$updatedTxtItems = array($row_GetPlayer['Name'], $CityList);
		$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessageAccept);
		echo "<br /><strong style='color:green'>".$MailSubject."</strong>";
		echo "<br /><br />".$l_FinScore1." ".$PlayersDecision."% ".$l_FinScore3." ".$odds."%.<br /><br />".$MailMessage;

		$MailMessage = "<img src='".imageExists("/image/players/".$row_GetPlayer['Photo'])."' border='1' width='100' height='150' align='left' hspace='5' vspace='5'><p>".$MailMessage."</p>";
		sendMail($_SESSION['site_Email'], $_SESSION['current_Email'], $MailSubject, $MailMessage);
		
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
						GetSQLValueString($_SESSION['current_Season'], "text"),
						GetSQLValueString($MailMessage, "text"),
						GetSQLValueString($_SESSION['U_ID'], "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	
} else {
	if($totalRows_GetPlayerExtensionOffers == 0){
		$insertSQL = sprintf("INSERT INTO playersextensionoffers (Player,Team,Attempt,DateCreated,Season,Type) values (%s,%s,%s,%s,%s,%s)",
								GetSQLValueString($PID_GetPlayer, "text"),
								GetSQLValueString($_SESSION['U_ID'], "int"),
								GetSQLValueString(1, "int"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($_SESSION['current_Season'], "text"),
								GetSQLValueString('Waive', "text"));
		$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	} else {
		$NewAttempt = $row_GetPlayerExtensionOffers['Attempt'] + 1;
		$insertSQL = sprintf("UPDATE playersextensionoffers set Attempt = ".$NewAttempt.", DateCreated='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE Type='Waive' AND Player=%s AND Season='%s' ",$PID_GetPlayer, $_SESSION['current_Season']);
		$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	}
	
	$tmpTxtItems = array("%item1");
	$updatedTxtItems = array($row_GetPlayer['Name']);
	$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubjectDecline);
	echo "<br /><strong style='color:red;'>".$MailSubject."</strong>";
	echo "<br /><br />".$l_FinScore1." ".$PlayersDecision."% ".$l_FinScore2." ".$odds."%.<br /><br />".$MailMessageDecline;
}
}
?>