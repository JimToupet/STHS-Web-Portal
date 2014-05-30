<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_OfferDeclined = "OFFER DECLINED";
	$l_FinScore1 = "Your final score of";
	$l_FinScore2 = "was not within the range of 0 -";
	$l_FinScore3 = "was within the range of 0 -";
	$l_OfferAccepted = "OFFER ACCEPTED";
	$l_OfferContract = "Contract extension";
	$l_Subject1 = "is interested in playing for";
	$l_Subject2 = "indicates he wants to be traded.";
	$AgentFeedback = "Agent Feedback";
	$MailMessage1 = "<p>The %item2 has signed %item3 to a contract extension.  At the end of the season, you must update his salary and contract length.</p>";
	$MailMessage2 = "<p>%item2 has ended his contract extension talks with you and will not negotiate with any other team.  As a result he he will be going to free agency this up coming off-season.</p>";
	$MailMessage3 = "<p>%item2 has ended his contract extension talks with you and wishes to be traded.  He would consider talking to one other team in which he will have contract extension talks with or he will pursue free agency in the summer.</p>";
	$l_RejectedOffer = "%item1 rejected contract extension from the %item2.";
	break; 

case 'fr': 
	$l_OfferDeclined = "L'OFFRE A REJET&eacute;";
	$l_FinScore1 = "Vos points finaux de";
	$l_FinScore2 = "est plus grande que la chance de";
	$l_FinScore3 = "% gagnez la chance de";
	$l_OfferAccepted = "L'OFFRE A ACCEPT&eacute;";
	$l_OfferContract = "Extension de contrat";
	$l_Subject1 = "est int&eacute;ress&eacute; &agrave; jouer pour";
	$l_Subject2 = "indique qu'il veut &ecirc;tre commerc&eacute;.";
	$AgentFeedback = "R&eacute;troaction d'agent";
	$MailMessage1 = "<p>Le %item2 a sign&eacute; %item3 &agrave; une extension de contrat. &agrave; la fin de la saison, vous devez mettre &agrave; jour son salaire et longueur de contrat.</p>";
	$MailMessage2 = "<p>%item2 has ended his contract extension talks with you and will not negotiate with any other team.  As a result he he will be going to free agency this up coming off-season.</p>";
	$MailMessage3 = "<p>%item2 has ended his contract extension talks with you and wishes to be traded.  He would consider talking to one other team in which he will have contract extension talks with or he will pursue free agency in the summer.</p>";
	$l_RejectedOffer = "%item1 extension de contrat rejet&eacute;e de %item2.";
	break;
} 


$query_GetWebInfo = sprintf("SELECT AI_NOTRADE_TEAM_LIST, AI_NOTRADE_AVAILABLE, AI_WAIVE_NT, AvgerageSalary, MaxContract, UFA, SalaryCap, MinimumPlayerSalary, MaximumPlayerSalary, PlayerAI, MaximumPlayerSalary, MinimumPlayerSalary,TradeDeadlineDay FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);
$TradeDeadlineDay=$row_GetWebInfo['TradeDeadlineDay'];
$PlayerAI=$row_GetWebInfo['PlayerAI'];
$UFA=$row_GetWebInfo['UFA'];

$GetOdds = "0";
if (isset($_POST["odds"])) {
  $GetOdds = (get_magic_quotes_gpc()) ? $_POST["odds"] : addslashes($_POST["odds"]);
}
$GetNoTrade = "0";
if (isset($_POST["notradefin"])) {
  $GetNoTrade = (get_magic_quotes_gpc()) ? $_POST["notradefin"] : addslashes($_POST["notradefin"]);
}
$GetPlayerID = 0;
if (isset($_POST["player"])) {
  $GetPlayerID = (get_magic_quotes_gpc()) ? $_POST["player"] : addslashes($_POST["player"]);
}
$GetPosition = 1;
if (isset($_POST["position"])) {
  $GetPosition = (get_magic_quotes_gpc()) ? $_POST["position"] : addslashes($_POST["position"]);
}
$GetYearSalary1 = 0;
if (isset($_POST["YearSalary1"])) {
  $GetYearSalary1 = (get_magic_quotes_gpc()) ? $_POST["YearSalary1"] : addslashes($_POST["YearSalary1"]);
}
$GetYearSalary2 = 0;
if (isset($_POST["YearSalary2"])) {
  $GetYearSalary2 = (get_magic_quotes_gpc()) ? $_POST["YearSalary2"] : addslashes($_POST["YearSalary2"]);
}
$GetYearSalary3 = 0;
if (isset($_POST["YearSalary3"])) {
  $GetYearSalary3 = (get_magic_quotes_gpc()) ? $_POST["YearSalary3"] : addslashes($_POST["YearSalary3"]);
}
$GetYearSalary4 = 0;
if (isset($_POST["YearSalary4"])) {
  $GetYearSalary4 = (get_magic_quotes_gpc()) ? $_POST["YearSalary4"] : addslashes($_POST["YearSalary4"]);
}
$GetYearSalary5 = 0;
if (isset($_POST["YearSalary5"])) {
  $GetYearSalary5 = (get_magic_quotes_gpc()) ? $_POST["YearSalary5"] : addslashes($_POST["YearSalary5"]);
}
$GetYearSalary6 = 0;
if (isset($_POST["YearSalary6"])) {
  $GetYearSalary6 = (get_magic_quotes_gpc()) ? $_POST["YearSalary6"] : addslashes($_POST["YearSalary6"]);
}
$GetYearSalary7 = 0;
if (isset($_POST["YearSalary7"])) {
  $GetYearSalary7 = (get_magic_quotes_gpc()) ? $_POST["YearSalary7"] : addslashes($_POST["YearSalary7"]);
}
$GetYearSalary8 = 0;
if (isset($_POST["YearSalary8"])) {
  $GetYearSalary8 = (get_magic_quotes_gpc()) ? $_POST["YearSalary8"] : addslashes($_POST["YearSalary8"]);
}
$GetYearSalary9 = 0;
if (isset($_POST["YearSalary9"])) {
  $GetYearSalary9 = (get_magic_quotes_gpc()) ? $_POST["YearSalary9"] : addslashes($_POST["YearSalary9"]);
}
$GetYearSalary10 = 0;
if (isset($_POST["YearSalary10"])) {
  $GetYearSalary10 = (get_magic_quotes_gpc()) ? $_POST["YearSalary10"] : addslashes($_POST["YearSalary10"]);
}
$GetContract = 0;
if (isset($_POST["contract"])) {
  $GetContract = (get_magic_quotes_gpc()) ? $_POST["contract"] : addslashes($_POST["contract"]);
}
$GetTotalSalary = 0;
if (isset($_POST["totalsalary"])) {
  $GetTotalSalary = (get_magic_quotes_gpc()) ? $_POST["totalsalary"] : addslashes($_POST["totalsalary"]);
}
$GetBonus = 0;
if (isset($_POST["bonusfin"])) {
  $GetBonus = (get_magic_quotes_gpc()) ? $_POST["bonusfin"] : addslashes($_POST["bonusfin"]);
}
$GetContractSummary = "";
if (isset($_POST["contractsummary"])) {
  $GetContractSummary = (get_magic_quotes_gpc()) ? $_POST["contractsummary"] : addslashes($_POST["contractsummary"]);
}
$GetType = "player";
if (isset($_POST["type"])) {
  $GetType = (get_magic_quotes_gpc()) ? $_POST["type"] : addslashes($_POST["type"]);
}
$ExtensionAttempts = 0;
if (isset($_POST["ExtensionAttempts"])) {
  $ExtensionAttempts = (get_magic_quotes_gpc()) ? $_POST["ExtensionAttempts"] : addslashes($_POST["ExtensionAttempts"]);
}
$MailMessage1 = $MailMessage1." ".$GetContractSummary; 
if ($GetType == 'goalie'){
	$query_GetPlayer = sprintf("SELECT P.*, '5' as Position FROM goalies as P, goaliestats as S WHERE P.Number=%s AND P.Number=S.Number AND S.Active='True'", $GetPlayerID);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
}else{
	$query_GetPlayer = sprintf("SELECT P.* FROM players as P, playerstats as S WHERE P.Number=%s AND P.Number=S.Number AND S.Active='True'", $GetPlayerID);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
}
$query_GetTeamName = sprintf("SELECT City, Name FROM proteam WHERE Number=%s", $row_GetPlayer['Team']);
$GetTeamName = mysql_query($query_GetTeamName, $connection) or die(mysql_error());
$row_GetTeamName = mysql_fetch_assoc($GetTeamName);
$totalRows_GetTeamName = mysql_num_rows($GetTeamName);

?>
<div align="center">
<div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px; width:400px; text-align:left;">
<div style="float:right; display:block; text-align:center; font-size:9px">
	<?php echo getPlayerAgent($GetPlayerID, $GetPosition, $connection);?>
</div>
<h3><?php echo $AgentFeedback;?></h3>
<br />
<?php
$PlayersDecision = rand(1, 100);
if ($PlayersDecision <= $GetOdds){
	$PlayerNote = "<font size=18 color=green><strong>".$l_OfferAccepted."</strong></font><p>".$l_FinScore1." <strong>".$PlayersDecision."%</strong> ".$l_FinScore3." ".$GetOdds."%.</p>";
	$insertSQL = sprintf("INSERT INTO playerscontractoffers (Player,PlayerType,Type,Team,DateCreated,Contract,Salary1,Salary2,Salary3,Salary4,Salary5,Salary6,Salary7,Salary8,Salary9,Salary10,Approved,NoTrade,Compensation ) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'False',%s,%s)",
                        GetSQLValueString($row_GetPlayer['Number'], "text"),
                        GetSQLValueString($GetType, "text"),
                        GetSQLValueString("Extension", "text"),
                        GetSQLValueString($_SESSION['U_ID'], "int"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($GetContract, "double"),
						GetSQLValueString($GetYearSalary1, "int"),
						GetSQLValueString($GetYearSalary2, "int"),
						GetSQLValueString($GetYearSalary3, "int"),
						GetSQLValueString($GetYearSalary4, "int"),
						GetSQLValueString($GetYearSalary5, "int"),
						GetSQLValueString($GetYearSalary6, "int"),
						GetSQLValueString($GetYearSalary7, "int"),
						GetSQLValueString($GetYearSalary8, "int"),
						GetSQLValueString($GetYearSalary9, "int"),
						GetSQLValueString($GetYearSalary10, "int"),
						GetSQLValueString($GetNoTrade, "int"),
						GetSQLValueString($GetBonus, "int"));
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	$MailSubject = $l_OfferContract." - ".$row_GetPlayer['Name'];
	$tmpTxtItems = array("%item2", "%item3");
	$updatedTxtItems = array($_SESSION['U_City']." ".$_SESSION['U_Team'], $row_GetPlayer['Name']);
	$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage1);
	
	sendMail($_SESSION['site_Email'], $_SESSION['U_Email'], $MailSubject, $MailMessage);
	
	 $MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($_SESSION['U_ID'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));

	$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());

} else {
	$PlayerNote = "<font size=18 color=red><strong>".$l_OfferDeclined."</strong></font><p>".$l_FinScore1." <strong>".$PlayersDecision."%</strong> ".$l_FinScore2." ".$GetOdds."%.</p><p>Please wait 24 hours before trying to submit another offer.</p>";
	$insertSQL = sprintf("INSERT INTO playersextensionoffers (Player,Team,Attempt,DateCreated,Season,PlayerType) values (%s,%s,%s,%s,%s,%s)",
							GetSQLValueString($GetPlayerID, "int"),
							GetSQLValueString($_SESSION['U_ID'], "text"),
							GetSQLValueString($_POST['ExtensionAttempts'], "int"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($GetType, "text"));
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$tmpTxtItems = array("%item1", "%item2");
	$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamName['City']." ".$row_GetTeamName['Name']);
	$l_RejectedOffer  = "[".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."] - " . str_replace($tmpTxtItems, $updatedTxtItems, $l_RejectedOffer );
		
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($l_RejectedOffer, "text"),
							GetSQLValueString($_SESSION['U_ID'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	
	$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s order by DateCreated desc", $GetPlayerID);
	$GetPlayerIDExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
	$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerIDExtensionOffers);
	$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerIDExtensionOffers);
	
	if($totalRows_GetPlayerExtensionOffers == 0){
		$ExtensionAttempts=0;
		$ExtensionLastDate="2009-01-01";
	}else{
		$ExtensionAttempts=$totalRows_GetPlayerExtensionOffers;
		$ExtensionLastDate=$row_GetPlayerExtensionOffers['DateCreated'];
	}
	mysql_free_result($GetPlayerIDExtensionOffers);
	
	//IF HE CURRENTLY DOES NOT HAVE A NO TRADE CLAUSE, GIVE A LIST
	if($row_GetPlayer['NoTrade'] == "False" || $row_GetPlayer['NoTrade'] == "Faux"){
		$query_GetRequestedTeams = sprintf("SELECT * FROM traderequests WHERE Player='%s' AND Season='%s'", $row_GetPlayer['Name'], $_SESSION['current_Season']);
		$GetRequestedTeams = mysql_query($query_GetRequestedTeams, $connection) or die(mysql_error());
		$row_GetRequestedTeams = mysql_fetch_assoc($GetRequestedTeams);
		$totalRows_GetRequestedTeams = mysql_num_rows($GetRequestedTeams);
	
		if ($totalRows_GetRequestedTeams == 0 && $ExtensionAttempts == 3 ){
			

			//RANDOM 25%
			$TradingDecision = rand(1, 100);

			//HE WILL TALK WITH ONE MORE TEAM
			if ($TradingDecision <= 25){
				$team_list = implode(',', $_SESSION['MenuTeamsID']); 
				
				$MailSubject = $row_GetPlayer['Name']." ".$l_Subject2;
				$tmpTxtItems = array("%item2");
				$updatedTxtItems = array($row_GetPlayer['Name']);
				$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage3);

			} else {
			//FREE AGENCY
				$team_list = 0; 
				$MailSubject = $row_GetPlayer['Name']." ".$l_Subject2;
				$tmpTxtItems = array("%item2");
				$updatedTxtItems = array($row_GetPlayer['Name']);
				$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage2);
				
			}
			
			$updateSQL = sprintf("INSERT INTO traderequests (RequestedTeams, Season, Player) values (%s,%s,%s)", 
				GetSQLValueString($team_list, "text"), 
				GetSQLValueString($_SESSION['current_Season'], "text"), 
				GetSQLValueString($row_GetPlayer['Name'], "text"));
			mysql_real_escape_string(DB_DATABASE, $connection);
			$Result2 = mysql_query($updateSQL, $connection) or die(mysql_error());
			
			$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;
			$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($_SESSION['U_ID'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
			$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());

		} else if ($totalRows_GetRequestedTeams > 0 && $ExtensionAttempts >= 2){
			
			$insertSQL = sprintf("INSERT INTO playerscontractoffers (Player,PlayerType,Type,Team ) values (%s,%s,%s,%s)",
						GetSQLValueString($row_GetPlayer['Number'], "text"),
						GetSQLValueString($GetType, "text"),
						GetSQLValueString("FreeAgency", "text"),
						GetSQLValueString($_SESSION['U_ID'], "int"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
			$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
			
			$MailSubject = $row_GetPlayer['Name']." ".$l_Subject2;
			$tmpTxtItems = array("%item2");
			$updatedTxtItems = array($row_GetPlayer['Name']);
			$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage2);
			$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;
			$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($_SESSION['U_ID'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
			$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
		}
	} else {
		$team_list = 0; 
		$updateSQL = sprintf("INSERT INTO traderequests (RequestedTeams, Season, Player) values (%s,%s,%s)", 
			GetSQLValueString($team_list, "text"), 
			GetSQLValueString($_SESSION['current_Season'], "text"), 
			GetSQLValueString($row_GetPlayer['Name'], "text"));
		mysql_real_escape_string(DB_DATABASE, $connection);
		$Result2 = mysql_query($updateSQL, $connection) or die(mysql_error());
		
		$MailSubject = $row_GetPlayer['Name']." ".$l_Subject2;
		$tmpTxtItems = array("%item2");
		$updatedTxtItems = array($row_GetPlayer['Name']);
		$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage2);
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
						GetSQLValueString($_SESSION['current_Season'], "text"),
						GetSQLValueString($MailMessage, "text"),
						GetSQLValueString($_SESSION['U_ID'], "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
		$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
	}
}

echo $PlayerNote;
?><br clear="all" />
</div>
</div>