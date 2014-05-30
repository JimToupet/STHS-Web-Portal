 <?php include('Connections/simhl-setup.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
} 


switch ($lang){ 
case 'en': 
	$l_PlayerRatings = "Player Ratings";
	$l_NoTradeDescription = "A no trade clause will help convince the player to sign with your team.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Salary will be the same each year of their contract.<br>&nbsp;&nbsp;FRONT-LOAD = Higher salary in first year and will gradually decrease until final year.";
	$l_SalaryDistribution = "Salary Distribution";
	$l_SalaryPerYear = "Salary Per Year";
	$l_SendOffer = "Send Offer";
	$l_Offer = "Offer Sheet";
	$l_True  = "True";
	$l_False  = "False";
	$l_CONTRACTLENGTH = "Contract Length";
	$Alert3 = "The owner of your team does not approve sending any more contract offers because you already have 10 active offers.  If you want to send an offer to this player, you will have to remove another offer first.";
	$Alert2_1 = "The owner of your team does not approve sending a contract greater than $";
	$Alert2_2 = "per year because there is not enough league competition for his services.  If more bids are placed then he will approve a higher offer.";
	$Alert1_1 = "Please enter a salary greater than $";
	$Alert1_2 = "per year.";
	$l_NoPermission = "You don't have permission to negotiate a contract with this player!";
	$l_rejectFinal = "This player has indicated he has no interest in signing a contract extension with your team.";
	$l_rejectWait = "The agent asks that you take 24 hours to think over a new offer.  So come back in 24 hours.";
	$l_AgentBargain = "Bargain with agent";
	$l_AskingPrice = "Asking price";
	$l_ContractAccepted = "Contract accepted";
	$l_years = "years";
	$l_perSeason = "per season";
	$l_NegStatus = "Negotiations status";
	$l_Neg1 = "You have not made any offers.";
	$l_Neg2 = "You have made ";
	$l_Neg3 = " offer.  ";
	$l_Neg4 = "You can make up to ";
	$l_Neg5 = "more offers. ";
	$l_Neg6 = "Contract extension talks have broke off and the player wishes to test the free agency market.";
	$l_OfferContract = "Contract extension";
	$l_Signed = "Signed Extension";
	$l_Odds1 = "You have a ";
	$l_Odds2 = ", he will resign with your team.  The site will generate a random number between 1 and 100.  <br>If the number is between 1 and ";
	$l_Odds3 = ", he will sign with your team.";
	$l_YouOdds = "Your Odds";
	$l_OfferDeclined = "OFFER DECLINED";
	$l_FinScore1 = "Your final score of";
	$l_FinScore2 = "is greater than the odds of";
	$l_FinScore3 = "% beat the odds of";
	$l_OfferAccepted = "OFFER ACCEPTED";
	$l_Bonus = "Signing Bonus";
	break; 

case 'fr': 
	$l_PlayerRatings = "Stat de joueur";
	$l_NoTradeDescription = "Une clause de non-échange va aider a convaincre le joueur de signer avec votre équipe.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Salaire va être égale a chaque année du contrat<br>&nbsp;&nbsp;FRONT-LOAD = Salaire et plus haut la première année et va diminuer graduellement jusqu'à la dernière année du contrat";
	$l_SalaryDistribution = "Distribution de salaire";
	$l_SalaryPerYear = "Salaire par an";
	$l_SendOffer = "Envoyez l'offre";
	$l_Offer = "Offre";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_CONTRACTLENGTH = "Longueur de contrat";
	$Alert3 = "Le propriétaire de votre équipe n'approuve pas envoyer plus d'offres de contrat parce que vous avez déjà 10 offres actives. Si vous voulez envoyer une offre à ce joueur, vous devrez enlever une autre offre d'abord.";
	$Alert2_1 = "Le propriétaire de votre équipe n'approuve pas envoyer un contrat plus grand que ";
	$Alert2_2 = "$ par an parce qu'il n'y a pas assez de concurrence de ligue pour ses services. Si plus d'offres sont placées alors il approuvera un plus haut offrent.";
	$Alert1_1 = "Veuillez écrire un salaire plus grand que ";
	$Alert1_2 = "$ année.";
	$l_NoPermission = "Vous n'avez pas la permission d'être en pourparlers un contrat avec ce joueur !";
	$l_rejectFinal = "Ce joueur a indiqué qu'il n'a aucun intérêt en signant une extension de contrat avec votre équipe.";
	$l_rejectWait = "L'agent demande que vous prenez 24 heures pour penser au-dessus d'une nouvelle offre. Ainsi revenu en 24 heures.";
	$l_AgentBargain= "Negocier avec l'agent";
	$l_AskingPrice = "Prix demandé";
	$l_ContractAccepted = "Le contrat acceptent";
	$l_years = "années";
	$l_perSeason = "par saison";
	$l_NegStatus = "Statut de négociations";
	$l_Neg1 = "Vous n'avez fait aucune proposition.";
	$l_Neg2 = "Vous avez fait ";
	$l_Neg3 = " offre.  ";
	$l_Neg4 = "Vous pouvez composer à ";
	$l_Neg5 = "plus offre. ";
	$l_Neg6 = "L'extension de contrat que les entretiens ont a interrompu et le joueur souhaite examiner le marché d'agence libre.";
	$l_OfferContract = "Extension de contrat";
	$l_Signed = "Extension de signée";
	$l_Odds1 = "Vous avez ";
	$l_Odds2 = ", il démissionnera avec votre équipe. L'emplacement produira d'un à nombre aléatoire entre 1 et 100. Si le nombre est entre 1 et";
	$l_Odds3 = ", il signée avec votre équipe.";
	$l_YouOdds = "Votre chance";
	$l_OfferDeclined = "L'OFFRE A REJETÉ";
	$l_FinScore1 = "Vos points finaux de";
	$l_FinScore2 = "est plus grande que la chance de";
	$l_FinScore3 = "% gagnez la chance de";
	$l_OfferAccepted = "L'OFFRE A ACCEPTÉ";
	$l_Bonus = "Bonification de contrat";
	break;
} 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
mysql_select_db($database_simhl, $simhl);

$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetType = "Player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}

mysql_select_db($database_simhl, $simhl);
if ($GetType == 'goalie'){
	$query_GetPlayer = sprintf("SELECT P.*, 'False' as Position FROM goalies as P, goaliestats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
}else{
	$query_GetPlayer = sprintf("SELECT P.*, 'True' as Position FROM players as P, playerstats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
}
$GetPlayer = mysql_query($query_GetPlayer, $simhl) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
$PlayerName=$row_GetPlayer['Name'];

$MinimumPlayerSalary=10000;
$MaximumPlayerSalary=100000;
$query_GetWebInfo = sprintf("SELECT MaxContract, UFA, MinimumPlayerSalary, MaximumPlayerSalary, PlayerAI, MaximumPlayerSalary, MinimumPlayerSalary,TradeDeadlineDay FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $simhl) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);
$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
$MaximumPlayerSalary=$row_GetWebInfo['MaximumPlayerSalary'];
$TradeDeadlineDay=$row_GetWebInfo['TradeDeadlineDay'];
$PlayerAI=$row_GetWebInfo['PlayerAI'];
$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
$UFA=$row_GetWebInfo['UFA'];

$query_GetTotalDays = "select schedule.Day FROM schedule WHERE schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day desc limit 0,1";
$GetTotalDays = mysql_query($query_GetTotalDays, $simhl) or die(mysql_error());
$row_GetTotalDays = mysql_fetch_assoc($GetTotalDays);
$totalRows_GetTotalDays = $row_GetTotalDays['Day'];

$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
$GetLastDay = mysql_query($query_GetLastDay, $simhl) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
if ($totalRows_GetLastDay==0){
	$Day_ID = 0;
} else {
	$Day_ID = $row_GetLastDay['Day'];
}

$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s ORDER BY DateCreated DESC ", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $simhl) or die(mysql_error());
$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);

if($totalRows_GetPlayerExtensionOffers == 0){
	$ExtensionAttempts=0;
	$ExtensionAttemptsValue = 0;
	$ExtensionLastDate="2009-01-01";
}else{
	$ExtensionAttempts = $totalRows_GetPlayerExtensionOffers;
	$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffers * 5);
	$ExtensionLastDate=$row_GetPlayerExtensionOffers['DateCreated'];
}
mysql_free_result($GetPlayerExtensionOffers);

function unique_rand($start, $end, $amount) {
	$random = array();
	while ($amount) {
		$amount--;
		do {
			$random_num = mt_rand($start, $end);
		} while (in_array($random_num, $random));
		$random[] = $random_num;
	}
	return $random;
}
	
$OfferAccepted = false;
$OfferYears = 1;
$offerSalary = $MinimumPlayerSalary;
$OfferNoTrade = 0;
$modifier = 1;
$PlayerNote = "<font size=14><strong> </strong></font>";
$odds = 90;
$odds = $odds - $ExtensionAttemptsValue;

$HalfSeason = number_format($totalRows_GetTotalDays / 2,0);

if ($_SESSION['current_SeasonTypeID']==2){
	$timeofyear = 25;
} else if ($_SESSION['current_SeasonTypeID']==1){
	if ($Day_ID > $HalfSeason){
		$timeofyear = 25;		
	} else {
		$timeofyear = 25;
	}
} else {
	$timeofyear = 25;

}
$timeofyear = 15;
$odds = $odds - $timeofyear;	

if (isset($_POST["odds"])){
	$odds = $_POST['odds'] - $ExtensionAttemptsValue;
} else {
	$odds = $odds - $ExtensionAttemptsValue;
}

if ((isset($_POST["MM_OfferContract"])) && ($_POST["MM_OfferContract"] == "form")) {

$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
					GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
					GetSQLValueString($_SESSION['U_Team'], "text"),
					GetSQLValueString($_SESSION['current_SeasonID'], "int"),
					GetSQLValueString("Transactions", "text"));
$Result1 = mysql_query($insertSQL, $simhl) or die(mysql_error());
	
$NoTrade = $_POST['notrade'];
$TmpAge = $_POST['age'];
$OfferYears = $_POST['yearsoff'];

$acceptedSalary = number_format(($_POST['newsalfinal']),0);
$acceptedSalary2 = ($_POST['newsalfinal']);
$tmpBonus = 0;

$PlayersDecision = rand(1, 100);

if ($PlayersDecision <= $odds){
	$OfferAccepted = true;
	if ($_POST['bonus'] != 0){
		$tmpBonus = $_POST['bonus'];
	}
	
	$PlayerNote = "<font size=18 color=green><strong>".$l_OfferAccepted."</strong></font><p>".$l_FinScore1." <strong>".$PlayersDecision."%</strong> ".$l_FinScore3." ".$odds."%.</p>";
	
	$insertSQL = sprintf("INSERT INTO playerscontractoffers (Player,Type,Team,DateCreated,Contract,Salary1,Salary2,Salary3,Salary4,Salary5,Salary6,Salary7,Salary8,Salary9,Salary10,Approved,NoTrade,Compensation ) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'False',%s,%s)",
                        GetSQLValueString($_POST['player'], "text"),
                        GetSQLValueString("Extension", "text"),
                        GetSQLValueString($_SESSION['current_Team_ID'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($_POST['yearsoff'], "double"),
						GetSQLValueString($_POST['YearSalary1'], "int"),
						GetSQLValueString($_POST['YearSalary2'], "int"),
						GetSQLValueString($_POST['YearSalary3'], "int"),
						GetSQLValueString($_POST['YearSalary4'], "int"),
						GetSQLValueString($_POST['YearSalary5'], "int"),
						GetSQLValueString($_POST['YearSalary6'], "int"),
						GetSQLValueString($_POST['YearSalary7'], "int"),
						GetSQLValueString($_POST['YearSalary8'], "int"),
						GetSQLValueString($_POST['YearSalary9'], "int"),
						GetSQLValueString($_POST['YearSalary10'], "int"),
						GetSQLValueString($_POST['notrade'], "int"),
						GetSQLValueString($tmpBonus, "int"));
	  	$Result1 = mysql_query($insertSQL, $simhl) or die(mysql_error());
	   $MailSubject = "CONTRACT EXTENSION - ".$_POST['player'];
	   $MailMessage = "<p>The ".$_SESSION['U_City']." ".$_SESSION['U_Team']." has signed ".$_POST['player']." to a contract extension.  At the end of the season, you must update his salary and contract length.</p>";
	  
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:".$_SESSION['U_Email']."\r\n";
		$to =  $_SESSION['site_Email'];
		if (mail($to, $MailSubject, $MailMessage, $headers)) {
		  $errortxt = "\n Email has been sent to - ".$to."<br>";
		 } else {
		  $errortxt = "\n Message delivery failed - ".$to."<br>";
		 }
			
		//echo "$errortxt";
} else {
	$PlayerNote = "<font size=18 color=red><strong>".$l_OfferDeclined."</strong></font><p>".$l_FinScore1." <strong>".$PlayersDecision."%</strong> ".$l_FinScore2." ".$odds."%.</p>";
	$insertSQL = sprintf("INSERT INTO playersextensionoffers (Player,Team,Attempt,DateCreated,Season) values (%s,%s,%s,%s,%s)",
							GetSQLValueString($PID_GetPlayer, "int"),
							GetSQLValueString($_SESSION['current_Team_ID'], "text"),
				GetSQLValueString($_POST['ExtensionAttempts'], "int"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
							GetSQLValueString($_SESSION['current_Season'], "text"));
	$Result1 = mysql_query($insertSQL, $simhl) or die(mysql_error());
	
	$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s order by DateCreated desc", $PID_GetPlayer, $row_GetPlayer['Team']);
	$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $simhl) or die(mysql_error());
	$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
	$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);
	
	if($totalRows_GetPlayerExtensionOffers == 0){
		$ExtensionAttempts=0;
		$ExtensionLastDate="2009-01-01";
	}else{
		$ExtensionAttempts=$totalRows_GetPlayerExtensionOffers;
		$ExtensionLastDate=$row_GetPlayerExtensionOffers['DateCreated'];
	}
	mysql_free_result($GetPlayerExtensionOffers);
	
	$query_GetRequestedTeams = sprintf("SELECT * FROM traderequests WHERE Player='%s' AND Season='%s'", $PlayerName, $_SESSION['current_Season']);
	$GetRequestedTeams = mysql_query($query_GetRequestedTeams, $simhl) or die(mysql_error());
	$row_GetRequestedTeams = mysql_fetch_assoc($GetRequestedTeams);
	$totalRows_GetRequestedTeams = mysql_num_rows($GetRequestedTeams);
	$RequestedTeams = $row_GetRequestedTeams['RequestedTeams'];
	$RequestedTeamsArray = explode(",", $row_GetRequestedTeams['RequestedTeams']);
	
	if ($totalRows_GetRequestedTeams == 0 && $ExtensionAttempts == 3){
		$team_list = implode(',', unique_rand(1, $_SESSION['total_teams'], 8)); 
		$team_list = str_replace($_SESSION['current_Team_ID'], "0", $team_list);
		
		$updateSQL = sprintf("INSERT INTO traderequests (RequestedTeams, Season, Player) values (%s,%s,%s)", 
			GetSQLValueString($team_list, "text"), 
			GetSQLValueString($_SESSION['current_Season'], "text"), 
			GetSQLValueString($PlayerName, "text"));
		mysql_real_escape_string($database_simhl, $simhl);
		$Result2 = mysql_query($updateSQL, $simhl) or die(mysql_error());
		
		$query_GetTeamEmails = sprintf("SELECT EmailAlert, Email, Number, City, Name FROM proteam WHERE Number IN (%s)", $team_list);
		$GetTeamEmails = mysql_query($query_GetTeamEmails, $simhl) or die(mysql_error());
		$row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails);
		$totalRows_GetTeamEmails = mysql_num_rows($GetTeamEmails);
		$CityList = "";
		
		do {
			$CityList = $CityList.", ".$row_GetTeamEmails['City'];
			$MailSubject = $PlayerName." is interested in playing for ".$row_GetTeamEmails['City'];
  			$MailMessage = "<img src='".$_SESSION['DomainName']."/image/players/".$row_GetPlayer['Photo']."' border='1' width='100' height='150' align='left' hspace='5'><p>".$PlayerName." has broken off contract negotiations with the ".$row_GetPlayer['Team'].".  As a result he has submitted a list of eight teams he'd be willing to play for and continue contract extension talks. Congratulations, the ".$row_GetTeamEmails['City']." ".$row_GetTeamEmails['Name']." was on his list. If you wish to acquire his services and potentially sighn him to a contract extension please contact the ".$row_GetPlayer['Team']." to alert them of your interest.</p>";
  
			$insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
							GetSQLValueString($MailSubject, "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
							GetSQLValueString(0, "int"),
							GetSQLValueString($row_GetTeamEmails['Number'], "int"));
			$Result0 = mysql_query($insertSQL, $simhl) or die(mysql_error());
			
		} while ($row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails)); 
		
		$MailSubject = $PlayerName." indicates he wants to be traded.";
		$MailMessage = "<img src='".$_SESSION['DomainName']."/image/players/".$row_GetPlayer['Photo']."' border='1' width='100' height='150' align='left' hspace='5'><p>".$PlayerName." has ended his contract extension talks with you and wishes to be traded.  He has picked eight potential teams, in which he will have contract extension talks with or he will pursue free agency in the summer.  Those teams are ".$CityList.". Please contact these teams to see if they wish to aquire his services.</p>";

		$insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
						GetSQLValueString($MailSubject, "text"),
						GetSQLValueString(addslashes($MailMessage), "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
						GetSQLValueString(0, "int"),
						GetSQLValueString($_SESSION['current_Team_ID'], "int"));
		$Result0 = mysql_query($insertSQL, $simhl) or die(mysql_error());
	
	} else if ($totalRows_GetRequestedTeams > 0 && $ExtensionAttempts == 3){
		$team_list = str_replace($_SESSION['current_Team_ID'], "0", $row_GetRequestedTeams['RequestedTeams']);
		
		$updateSQL = sprintf("UPDATE traderequests set RequestedTeams='%s' WHERE Season='%s' AND Player='%s'", $team_list, $_SESSION['current_Season'], $PlayerName);
		mysql_real_escape_string($database_simhl, $simhl);
		$Result2 = mysql_query($updateSQL, $simhl) or die(mysql_error());
		
		$query_GetTeamEmails = sprintf("SELECT EmailAlert, Email, Number, City, Name FROM proteam WHERE Number IN (%s)", $team_list);
		$GetTeamEmails = mysql_query($query_GetTeamEmails, $simhl) or die(mysql_error());
		$row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails);
		$totalRows_GetTeamEmails = mysql_num_rows($GetTeamEmails);
		$CityList = "";
				
		do {
			$CityList = $CityList.", ".$row_GetTeamEmails['City'];
			$MailSubject = $PlayerName." is interested in playing for ".$row_GetTeamEmails['City'];
  			$MailMessage = "<img src='".$_SESSION['DomainName']."/image/players/".$row_GetPlayer['Photo']."' border='1' width='100' height='150' align='left' hspace='5'><p>".$PlayerName." has broken off contract negotiations with the ".$row_GetPlayer['Team'].".  As a result he has submitted a list of eight teams he'd be willing to play for and continue contract extension talks. Congratulations, the ".$row_GetTeamEmails['City']." ".$row_GetTeamEmails['Name']." was on his list. If you wish to acquire his services and potentially sighn him to a contract extension please contact the ".$row_GetPlayer['Team']." to alert them of your interest.</p>";
  
			$insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
							GetSQLValueString($MailSubject, "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
							GetSQLValueString(0, "int"),
							GetSQLValueString($row_GetTeamEmails['Number'], "int"));
			$Result0 = mysql_query($insertSQL, $simhl) or die(mysql_error());
			
		} while ($row_GetTeamEmails = mysql_fetch_assoc($GetTeamEmails)); 
		
		$MailSubject = $PlayerName." indicates he wants to be traded.";
		$MailMessage = "<img src='".$_SESSION['DomainName']."/image/players/".$row_GetPlayer['Photo']."' border='1' width='100' height='150' align='left' hspace='5'><p>".$PlayerName." has ended his contract extension talks with you and wishes to be traded.  He has picked eight potential teams, in which he will have contract extension talks with or he will pursue free agency in the summer.  Those teams are ".$CityList.". Please contact these teams to see if they wish to aquire his services.</p>";

		$insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
						GetSQLValueString($MailSubject, "text"),
						GetSQLValueString(addslashes($MailMessage), "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
						GetSQLValueString(0, "int"),
						GetSQLValueString($_SESSION['current_Team_ID'], "int"));
		$Result0 = mysql_query($insertSQL, $simhl) or die(mysql_error());
		
	}
 }
}

$query_GetSigned = sprintf("SELECT * FROM playerscontractoffers WHERE Player='%s' AND Type='Extension'", $PlayerName);
$GetSigned = mysql_query($query_GetSigned, $simhl) or die(mysql_error());
$row_GetSigned = mysql_fetch_assoc($GetSigned);
$totalRows_GetSigned = mysql_num_rows($GetSigned);

function getAge( $p_strDate ) {
    $tmpYear = $_SESSION['current_Season'];
	if(substr_count($p_strDate,"-") > 0){
    	list($m,$d,$Y) = explode("-",$p_strDate);
    	$years = $tmpYear - $Y;
   	if ($_SESSION['JuniorLeague'] == 'False'){ if( date("md") < $m.$d ) { $years--; }}		
	} elseif (substr_count($p_strDate,"/") > 0){
    	list($m,$d,$Y) = explode("/",$p_strDate);
    	$years = $tmpYear - $Y;
   	if ($_SESSION['JuniorLeague'] == 'False'){ if( date("md") < $m.$d ) { $years--; }}		
   } elseif (substr_count($p_strDate,".") > 0){
    	list($m,$d,$Y) = explode(".",$p_strDate);
    	$years = $tmpYear - $Y;
   	if ($_SESSION['JuniorLeague'] == 'False'){ if( date("md") < $m.$d ) { $years--; }}		
   }
   return $years;
}
function minutes( $seconds )
{
    return sprintf( "%02.2d:%02.2d", floor( $seconds / 60 ), $seconds % 60 );
}
mysql_free_result($GetWebInfo);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_OfferContract; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/jqtransformplugin/jqtransform.css" />

<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.accessible-news-slider.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/jqtransformplugin/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/extension.js"></script>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  $('form').jqTransform({imgPath:'jqtransformplugin/img/'});
});;
</script>
<SCRIPT language=JavaScript>
function FrontEnd() {	

	var obj1 = document.getElementById("Year1");
	var obj2 = document.getElementById("Year2");
	var obj3 = document.getElementById("Year3");
	var obj4 = document.getElementById("Year4");
	var obj5 = document.getElementById("Year5");
	var obj6 = document.getElementById("Year6");
	var obj7 = document.getElementById("Year7");
	var obj8 = document.getElementById("Year8");
	var obj9 = document.getElementById("Year9");
	var obj10 = document.getElementById("Year10");

	document.form.YearSalary1.value=<?php echo $MinimumPlayerSalary; ?>;
	document.form.YearSalary2.value=0;
	document.form.YearSalary3.value=0;
	document.form.YearSalary4.value=0;
	document.form.YearSalary5.value=0;
	document.form.YearSalary6.value=0;
	document.form.YearSalary7.value=0;
	document.form.YearSalary8.value=0;
	document.form.YearSalary9.value=0;
	document.form.YearSalary10.value=0;
	
	obj1.innerHTML = "$0";
	obj2.innerHTML = "$0";
	obj3.innerHTML = "$0";
	obj4.innerHTML = "$0";
	obj5.innerHTML = "$0";
	obj6.innerHTML = "$0";
	obj7.innerHTML = "$0";
	obj8.innerHTML = "$0";
	obj9.innerHTML = "$0";
	obj10.innerHTML = "$0";
	
	if (document.form.distribute.value == 1) {
		$tmpMod = (document.form.yearsoff.value / 2);
		$tmp1=0;
		$tmp2=0;
		$tmp3=0;
		$tmp4=0;
		$tmp5=0;
		$tmp6=0;
		$tmp7=0;
		$tmp8=0;
		$tmp9=0;
		$tmp10=0;
		if(document.form.yearsoff.value==1){
			$tmp1=Math.round(document.form.newsal.value);
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
		} else if(document.form.yearsoff.value==2){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp2 < <?php echo $MinimumPlayerSalary; ?>) { $tmp2 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2; 
		} else if(document.form.yearsoff.value==3){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value);
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp3 < <?php echo $MinimumPlayerSalary; ?>) { $tmp3 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
		} else if(document.form.yearsoff.value==4){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp3 < <?php echo $MinimumPlayerSalary; ?>) { $tmp3 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
		} else if(document.form.yearsoff.value==5){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value);
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
		} else if(document.form.yearsoff.value==6){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
		} else if(document.form.yearsoff.value==7){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value);
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
		} else if(document.form.yearsoff.value==8){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
		} else if(document.form.yearsoff.value==9){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value);
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp9=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp9 < <?php echo $MinimumPlayerSalary; ?>) { $tmp9 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
			obj9.innerHTML = "$" + formatCurrency($tmp9);
			document.form.YearSalary9.value=$tmp9;
		} else if(document.form.yearsoff.value==10){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.005)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.005)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp9=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp10=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp9 < <?php echo $MinimumPlayerSalary; ?>) { $tmp9 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp10 < <?php echo $MinimumPlayerSalary; ?>) { $tmp10 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
			obj9.innerHTML = "$" + formatCurrency($tmp9);
			document.form.YearSalary9.value=$tmp9;
			obj10.innerHTML = "$" + formatCurrency($tmp10);
			document.form.YearSalary10.value=$tmp10;
		}
		
    } else {
		for (i=1;i<=document.form.yearsoff.value;i++)
		{
			if(i == 1){document.form.YearSalary1.value=document.form.newsal.value; obj1.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 2){document.form.YearSalary2.value=document.form.newsal.value; obj2.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 3){document.form.YearSalary3.value=document.form.newsal.value; obj3.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 4){document.form.YearSalary4.value=document.form.newsal.value; obj4.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 5){document.form.YearSalary5.value=document.form.newsal.value; obj5.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 6){document.form.YearSalary6.value=document.form.newsal.value; obj6.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 7){document.form.YearSalary7.value=document.form.newsal.value; obj7.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 8){document.form.YearSalary8.value=document.form.newsal.value; obj8.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 9){document.form.YearSalary9.value=document.form.newsal.value; obj9.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 10){document.form.YearSalary10.value=document.form.newsal.value; obj10.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
		}
	}
}


function Salary(form) {
var obj1 = document.getElementById("Year1");
var obj2 = document.getElementById("Year2");
var obj3 = document.getElementById("Year3");
var obj4 = document.getElementById("Year4");
var obj5 = document.getElementById("Year5");
var obj6 = document.getElementById("Year6");
var obj7 = document.getElementById("Year7");
var obj8 = document.getElementById("Year8");
var obj9 = document.getElementById("Year9");
var obj10 = document.getElementById("Year10");
var test = 0;
var bargain = (form.bargain.value);
var modifier = (form.modifier.value);
var odds = (form.oddsdefault.value);
var player = (form.player.value);
var prevsal = (form.prevsal.value);
var team = (form.team.value);
var ov = (form.overall.value);
var po = (form.po.value);
var position = (form.position.value);
var yearsoff = (form.yearsoff.value);
var notrade = (form.notrade.value);
var ex = (form.ex.value);
var age = (form.age.value);
var minimum = (form.MinimumPlayerSalary.value);
var maximum = (form.MaximumPlayerSalary.value);
var newsal = (form.newsal.value);
var hike;
var notrade_txt;
var askingprice = form.MinimumPlayerSalary.value;
var playerAI = form.PlayerAI.value;
notrade_txt = "";

if (age < 23)
{
	if (ov < 60)
	{ hike = 1.15;}
	else if ( ov > 59 && ov < 65)
	{ hike = 1.25;}
	else if ( ov > 64 && ov < 70)
	{ hike = 1.5;}
	else if (ov > 69 && ov < 75 && prevsal < 1000000)
	{ hike = 2;}
	else if (ov > 74 && ov < 80 && prevsal < 1000000)
	{ hike = 2.5;}
	else if (ov > 79 && ov < 85 && prevsal < 1000000)
	{ hike = 3.0;}
	else if (ov >= 85 && prevsal < 1000000)
	{ hike = 3.5;}
	else 
	{ hike = 1.75;}
}
else if (age > 22)
{
	if (ov < 66)
	{ hike = .9;}
	else if ( ov > 65 && ov < 70)
	{ hike = 1;}
	else if ( ov > 69 && ov < 75)
	{ hike = 1.1;}
	else if (ov > 74 && ov < 80)
	{ hike = 1.2;}
	else if (ov > 79 && ov < 85)
	{ hike = 1.3;}
	else if (ov > 84 && ov < 90)
	{ hike = 1.4;}
	else if (ov >=70 && ov <80 && prevsal <= 1500000){
		hike = hike * 2.5;
	} else if (ov >=80 && prevsal <= 300000){
		hike = hike * 2;
	} else if (ov >=80 && (prevsal >= 3000000 && prevsal < 5000000)){
		hike = 1;
	} else if (ov >=80 && prevsal >= 5000000){
		hike = 0.8;
	}else
	{ hike = 1.5;}
	
}

if (po == 1)
{ hike = hike - 0.2;}
else if ( po > 1 && po <= 50)
{ hike = hike - 0.1;}
else if ( po > 50 && po <= 60)
{ hike = hike + 0;}
else if ( po > 60 && po <= 70)
{ hike = hike + 0.05;}
else if (po > 70 && po <= 80)
{ hike = hike + 0.1;}
else if (po > 80 && po <= 90)
{ hike = hike + 0.15;}
else
{ hike = hike + 0.2;}

if (age < 40)
{
	if (prevsal > 5000000 && hike > 1)
	{
		hike = hike - 0.3;
	}

	if (notrade == 1){
		hike = hike - 0.1;
		notrade_txt = "(No Trade clause)";
		if (age < 28){
			odds = eval(odds) - 10;
		} else {
			odds = eval(odds) + 10;			
		}
	}
	tmpMod = 0;
	askingprice2 = ((1 + (modifier)) * prevsal * hike * (1 +(ex/4/100)));
	if(askingprice2 <= 20000000 && ov > 74){
		tmpMod = 2.5;
	} else if(askingprice2 <= 20000000 && ov > 70 &&  ov < 75){
		tmpMod = 0.5;
	} else {
		tmpMod = 0;
	}
	if (yearsoff == 1){
		modifier = 0.2 + tmpMod;
		odds = odds - 15;
	} else if (yearsoff == 2){
		modifier = 0.4 + tmpMod;
		odds = odds - 10;
	} else if (yearsoff == 3){
		modifier = 0.6 + tmpMod;
		odds = odds - 5;
	} else if (yearsoff == 4){
		modifier = 1 + tmpMod;
		odds = odds;
	}
	
	askingprice = formatCurrency(Math.floor(((1 + modifier) * prevsal * hike * (1 +(ex/4/100)))));
	askingprice2 = ((1 + (modifier)) * prevsal * hike * (1 +(ex/4/100)));
	
}
else if (age > 39)
{
	if (notrade == 1){
		hike = hike - 0.15;
		notrade_txt = "(No Trade clause)";
		odds = eval(odds) + 10;
	} 
	
	if (yearsoff == 1){
		modifier = yearsoff * 0.06;
		odds = odds - 15;
	} else if (yearsoff == 2){
		modifier = yearsoff * 0.05;
		odds = odds - 10;
	} else if (yearsoff == 3){
		modifier = yearsoff * 0.04;
		odds = odds - 5;
	} else if (yearsoff >= 4){
		modifier = yearsoff * 0.03;
		odds = odds;
	}
	
	askingprice2 = ((1 + (modifier)) * prevsal * hike * (1 +(ex/4/200)));

	askingprice = formatCurrency(Math.floor((1 + (modifier)) * prevsal * hike * (1 +(ex/4/200))));
	askingprice2 = ((1 + (modifier)) * prevsal * hike * (1 +(ex/4/200)));
}

FinalOffer = 0;
if (bargain == 1){
	FinalOffer = formatCurrency(askingprice2 * 1);
	FinalOffer2 = (askingprice2 * 1);
	odds = odds;
} else if (bargain == 2){
	FinalOffer = formatCurrency(askingprice2 * 0.9);
	FinalOffer2 = (askingprice2 * 0.9);
	odds = odds - 15;
} else if (bargain == 3){
	FinalOffer = formatCurrency(askingprice2 * 0.8);
	FinalOffer2 = (askingprice2 * 0.8);
	odds = odds - 30;
} else if (bargain == 4){
	FinalOffer = formatCurrency(askingprice2 * 0.7);
	FinalOffer2 = (askingprice2 * 0.7);
	odds = odds - 45;
} else if (bargain == 5){
	FinalOffer = formatCurrency(askingprice2 * 0.6);
	FinalOffer2 = (askingprice2 * 0.6);
	odds = odds - 60;
} else if (bargain == 6){
	FinalOffer = formatCurrency(askingprice2 * 1.1);
	FinalOffer2 = (askingprice2 * 1.1);
	odds = eval(odds) + 10;
}

if (askingprice >> maximum) {
	askingprice = maximum;
}
if (playerAI == 0) {
	odds = 100;
}
if (odds > 100) {
	odds = 100;
}

var num = FinalOffer2;
num = num / 10000;
num = Math.round(num);
num = num * 10000;
FinalOffer2 = num;

var num = askingprice2;
num = num / 10000;
num = Math.round(num);
num = num * 10000;
askingprice = num;

SigningBonusAmount = 0;

if(askingprice > maximum){
	SigningBonusAmount = askingprice - maximum
	num = SigningBonusAmount / 10000;
	num = Math.round(num);
	num = num * 10000;
	SigningBonusAmount = num;
	askingprice = maximum;
}

if(FinalOffer2 > maximum){
	SigningBonusAmount = FinalOffer2 - maximum
	num = SigningBonusAmount / 10000;
	num = Math.round(num);
	num = num * 10000;
	SigningBonusAmount = num;
	FinalOffer2 = maximum;
}

document.form.newsal.value = FinalOffer2;
document.form.newsalfinal.value = FinalOffer2;
document.form.odds.value = odds;

var AskingPrice = document.getElementById("AskingPrice");
AskingPrice.innerHTML = "$" + formatCurrency(askingprice);

//var FinalContractOffer = document.getElementById("FinalContractOffer");
//var txt2 = yearsoff + " year contract " + notrade_txt + " = $" + FinalOffer;
//FinalContractOffer.innerHTML = txt2;

var FinalOdds = document.getElementById("FinalOdds");
var txt3 = "<?php echo $l_Odds1;?> <strong>" + odds + "%</strong><?php echo $l_Odds2;?>" + odds + "<?php echo $l_Odds3;?>";
FinalOdds.innerHTML = txt3;

var SigningBonus = document.getElementById("Bonus");
document.form.bonus.value = SigningBonusAmount;
var txt4 = "<div class='rowElem'><label><?php echo $l_Bonus;?>:</label><strong>$" + formatCurrency(SigningBonusAmount) + "</strong></div>";
if(SigningBonusAmount > 0){
	SigningBonus.innerHTML = txt4;
} else {
	SigningBonus.innerHTML = "";
}

for (i=1;i<=document.form.yearsoff.value;i++)
{
	if(i == 1){document.form.YearSalary1.value=document.form.newsal.value; obj1.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 2){document.form.YearSalary2.value=document.form.newsal.value; obj2.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 3){document.form.YearSalary3.value=document.form.newsal.value; obj3.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 4){document.form.YearSalary4.value=document.form.newsal.value; obj4.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 5){document.form.YearSalary5.value=document.form.newsal.value; obj5.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 6){document.form.YearSalary6.value=document.form.newsal.value; obj6.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 7){document.form.YearSalary7.value=document.form.newsal.value; obj7.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 8){document.form.YearSalary8.value=document.form.newsal.value; obj8.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 9){document.form.YearSalary9.value=document.form.newsal.value; obj9.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
	if(i == 10){document.form.YearSalary10.value=document.form.newsal.value; obj10.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
}

}

function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + num );
}

function removeCommas(aNum) {
	aNum=aNum.replace(/,/g,"");
	aNum=aNum.replace(/\s/g,"");
	return aNum;
}
</script>
<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;
}
</style>
</head>
<?php 
if ($ExtensionAttempts < 3){
	if ($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
		echo '<body onload="Salary(document.form)">';
	} else {
		echo '<body>';
	}
} else {
	echo '<body>';
}
?>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
    
<h1><?php echo $l_Offer ;?> &nbsp;-&nbsp; <?php echo $row_GetPlayer['Name']; ?></h1>

<form method="post" name="form" id="form" action="<?php echo $editFormAction; ?>">
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
<tr>
	<td width="110" valign="top" style="vertical-align:top">
    	<img src="<?php echo $_SESSION['DomainName']; ?>/image/players/<?php echo $row_GetPlayer['Photo']; ?>" style=" border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; width:100px; height:150px; border-width:1px; margin-top:10px; border-style:solid;" width="100" height="150"/>
    	<INPUT id="age" onfocus=select() type="hidden" value="<?php echo getAge($row_GetPlayer['AgeDate']); ?>" name=age>
        <INPUT id="team" type="hidden" value="<?php echo $row_GetPlayer['Team']; ?>" name="team">
        <INPUT id="ex" type="hidden" value="<?php echo $row_GetPlayer['EX']; ?>" name="ex">
        <INPUT id="po" type="hidden" value="<?php echo $row_GetPlayer['PO']; ?>" name="po">
        <INPUT id="mo" type="hidden" value="<?php echo $row_GetPlayer['MO']; ?>" name="mo">
        <INPUT id="overall" type="hidden" value="<?php echo $row_GetPlayer['Overall']; ?>" name="overall">
        <INPUT id="prevsal" type="hidden" onfocus=select() size=8 value="<?php echo $row_GetPlayer['Salary1']; ?>" name=prevsal>        
    </td>
     <td valign="top">
     
		<h3><?php echo $l_PlayerRatings;?></h3>
       <?php if ($GetType == 'goalie'){ ?>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
			<th><a title="<?php echo $l_SK_D;?>">SK</a></th>
			<th><a title="<?php echo $l_DU_D;?>">DU</a></th>
			<th><a title="<?php echo $l_EN_D;?>">EN</a></th>	
			<th><a title="<?php echo $l_SZ_D;?>">SZ</a></th>	
			<th><a title="<?php echo $l_AG_D;?>">AG</a></th>	
			<th><a title="<?php echo $l_RB_D;?>">RB</a></th>	
			<th><a title="<?php echo $l_STC_D;?>">SC</a></th>				
			<th><a title="<?php echo $l_HS_D;?>">HS</a></th>	
			<th><a title="<?php echo $l_RT_D;?>">RT</a></th>	
			<th><a title="<?php echo $l_PC_D;?>">PC</a></th>	
			<th><a title="<?php echo $l_PenS_D;?>">PS</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_Overall_D;?>">Overall</a></th>
		</tr>
        </thead>
		<tbody>
		  <tr>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DU']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EN']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SZ']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['AG']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['RB']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['HS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['RT']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EX']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['LD']; ?></td>			
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['MO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetPlayer['Overall'];} else { echo 0;} ?></td>
		</tr>
		</tbody>
		</table>
     <?php }else{ ?>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
			<th><a title="<?php echo $l_CK_D;?>">CK</a></th>
			<th><a title="<?php echo $l_FG_D;?>">FG</a></th>
			<th><a title="<?php echo $l_DI_D;?>">DI</a></th>	
			<th><a title="<?php echo $l_SK_D;?>">SK</a></th>	
			<th><a title="<?php echo $l_ST_D;?>">ST</a></th>	
			<th><a title="<?php echo $l_EN_D;?>">EN</a></th>	
			<th><a title="<?php echo $l_DU_D;?>">DU</a></th>				
			<th><a title="<?php echo $l_PH_D;?>">PH</a></th>	
			<th><a title="<?php echo $l_FO_D;?>">FO</a></th>	
			<th><a title="<?php echo $l_PA_D;?>">PA</a></th>	
			<th><a title="<?php echo $l_SC_D;?>">SC</a></th>	
			<th><a title="<?php echo $l_DF_D;?>">DF</a></th>	
			<th><a title="<?php echo $l_PenS_D;?>">PS</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_OV_D;?>"><?php echo $l_OV_D;?></a></th>
		</tr>
        </thead>
		<tbody>
		  <tr>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['CK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['FG']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DI']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['ST']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EN']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DU']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PH']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['FO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PA']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DF']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EX']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['LD']; ?></td>			
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['MO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetPlayer['Overall'];} else { echo 0;} ?></td>
		</tr>
		</tbody>
		</table>
     <?php } 
	 
if($totalRows_GetSigned > 0){
	 ?>
  		<h3><?php echo $l_Signed;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
            <th width="10%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+9)."-".substr($_SESSION['current_Season']+10, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+10)."-".substr($_SESSION['current_Season']+11, -2);?></th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center"><div id="Year1">$<?php echo number_format($row_GetSigned['Salary1']);?></div></td>
            <td align="center"><div id="Year2">$<?php echo number_format($row_GetSigned['Salary2']);?></div></td>
            <td align="center"><div id="Year3">$<?php echo number_format($row_GetSigned['Salary3']);?></div></td>
            <td align="center"><div id="Year4">$<?php echo number_format($row_GetSigned['Salary4']);?></div></td>
            <td align="center"><div id="Year5">$<?php echo number_format($row_GetSigned['Salary5']);?></div></td>
            <td align="center"><div id="Year6">$<?php echo number_format($row_GetSigned['Salary6']);?></div></td>
            <td align="center"><div id="Year7">$<?php echo number_format($row_GetSigned['Salary7']);?></div></td>
            <td align="center"><div id="Year8">$<?php echo number_format($row_GetSigned['Salary8']);?></div></td>
            <td align="center"><div id="Year9">$<?php echo number_format($row_GetSigned['Salary9']);?></div></td>
            <td align="center"><div id="Year10">$<?php echo number_format($row_GetSigned['Salary10']);?></div></td>
        </tr>
        </tbody>
        </table>
<?php 

echo $PlayerNote;

if ($OfferAccepted == true){
?>
     
	 <div class="rowElem">
    <label><?php echo $l_ContractAccepted;?>:</label>
    <?php
	echo "<input type='hidden' name='yearsoff' value='".$OfferYears."'>";
	echo $OfferYears." ".$l_years." $";
 	echo $acceptedSalary." ".$l_perSeason;
	if ($OfferNoTrade == 1){
		echo $l_NoTrade;
	}
	
	?>
	</h4></strong><br>
    
<?php 
} 

} else {
?>
	<h3><?php echo $l_Offer  ;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
            <th width="10%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+9)."-".substr($_SESSION['current_Season']+10, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+10)."-".substr($_SESSION['current_Season']+11, -2);?></th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center"><div id="Year1">$<?php echo number_format($MinimumPlayerSalary,0); ?></div></td>
            <td align="center"><div id="Year2">$0</div></td>
            <td align="center"><div id="Year3">$0</div></td>
            <td align="center"><div id="Year4">$0</div></td>
            <td align="center"><div id="Year5">$0</div></td>
            <td align="center"><div id="Year6">$0</div></td>
            <td align="center"><div id="Year7">$0</div></td>
            <td align="center"><div id="Year8">$0</div></td>
            <td align="center"><div id="Year9">$0</div></td>
            <td align="center"><div id="Year10">$0</div></td>
        </tr>
        </tbody>
        </table>
        <div id="Bonus"></div>
        <br>
<?php 
echo $PlayerNote;

	if ($OfferAccepted == false){
?>
		<div class="rowElem">
        <label><?php echo $l_NegStatus ;?>:</label>
        <?php
		  if ($ExtensionAttempts == 0){
			echo $l_Neg1;
		  } else if ($ExtensionAttempts == 1){
			echo "<h4>".$l_Neg2." ".$ExtensionAttempts." ".$l_Neg3." <br><font color=red><b>".$l_Neg4." 2 ".$l_Neg5."</b></font></h4>";  
		  } else if ($ExtensionAttempts == 2){
			echo "<h4>".$l_Neg2." ".$ExtensionAttempts." ".$l_Neg3." <br><font color=red><b>".$l_Neg4." 1 ".$l_Neg5."</b></font></h4>";   
		  } else if ($ExtensionAttempts == 3){
			echo "<h4><font color=red><b>".$l_Neg6."</b></font></h4>";
		  }
		  ?>
        </div>
        
<?php 
//echo "Requested Teams = ".$RequestedTeams."<br>";
//echo $ExtensionLastDate."<br>";
//echo strftime('%Y-%m-%d', strtotime('now'))."<br>"; 

		if ($ExtensionAttempts < 3){
			if ($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
//echo "can make offer today <bR>";
?>   
		<div class="rowElem">
        <label><?php echo $l_AskingPrice ;?>:</label>
        <div id="AskingPrice"><?php echo "$".number_format($MinimumPlayerSalary,0); ?></div>
		</div>
        
        <br clear="all" />
        <br clear="all" />
        
        <div class="rowElem">
        <label><?php echo $l_CONTRACTLENGTH ;?>:</label>
        <select id="yearsoff" size=1  name=yearsoff ONCHANGE="Salary(document.form); FrontEnd(); ">
        <?php 
		for ( $counter = 1; $counter <= $row_GetWebInfo['MaxContract']; $counter += 1) {
			if($counter == 1){
				$tmpSelected = 'selected="selected"';
			} else {
				$tmpSelected = '';
			}
			echo '<option value="'.$counter.'" '.$tmpSelected.'>'.$counter.'</option>';
		}
		?>
        </select>
        </div>
        
        <div class="rowElem" style="">
        <label><?php echo $l_SalaryDistribution;?>:</label>
        <select id="distribute" size=1  name="distribute" ONCHANGE="FrontEnd();" ><option value="0" selected="selected">EVEN</option><option value="1">FRONT-LOAD</option></select>
        <div style="display:block;">
        <label></label><sub style="font-size:10px;">&nbsp;&nbsp;<?php echo $l_FrontLoadDescription;?></sub><br clear="all" />
        </div>
        </div>
        
        <div class="rowElem" style="">
        <label><?php echo $l_NoTrade;?>:</label>
        <select id="notrade" size=1  name="notrade"  onchange="Salary(this.form)"><option value="0" selected="selected"><?php echo $l_False;?></option><option value="1"><?php echo $l_True;?></option></select>
        <label></label>&nbsp;&nbsp;<sub style="font-size:10px;"><?php echo $l_NoTradeDescription;?></sub>
       </div>

        <div class="rowElem" style="padding-bottom:50px;">
        <label><?php echo $l_AgentBargain;?>:</label>
        <select id="bargain" size=1  name="bargain"  onchange="Salary(this.form)">
        <option value="1" selected="selected">100% of agents asking price.</option>
        <?php if($_SESSION['PlayerAI'] == 1){?>
        <option value="2">90% of agents asking price.</option>
        <option value="3">80% of agents asking price.</option>
        <option value="4">70% of agents asking price.</option>
        <option value="5">60% of agents asking price.</option>
        <option value="6">110% of agents asking price (overpay).</option>
        <?php } ?>
        </select>
        </div>
        
        <input type="hidden" name="MM_OfferContract" value="form">
        <div class="rowElem" style="padding-bottom:20px;"><label><?php echo $l_YouOdds;?>:</label><span style="font-size:12px;"><div id="FinalOdds"></div></span></div>
        <?php if ($_SESSION['current_Team_ID'] == $row_GetPlayer['Team'] || $_SESSION['U_Admin']==1){?>
        <div class="rowElem"><label></label><input type="submit" value="<?php echo $l_SendOffer;?>"></div>
       
<?php 
				} 
		} else {
?>

	 <div class="rowElem">
        <label><?php echo $l_AgentBargain;?>:</label>
        <h4><?php echo $l_rejectWait;?></h4>
     </div>

<?php
		}
// EXCEEDED 3 ATTEMPTS BY THIS TEAM
		} else {
?>

	 <div class="rowElem">
        <label><?php echo $l_AgentBargain;?>:</label>
        <h4><?php echo $l_rejectFinal;?></h4>
     </div>
     
<?php
	}
//CONTRACT ACCEPTED
} else {
?>
     
	 <div class="rowElem">
    <label><?php echo $l_ContractAccepted;?>:</label>
    <?php
	echo "<input type='hidden' name='yearsoff' value='".$OfferYears."'>";
	echo $OfferYears." ".$l_years." $";
 	echo $acceptedSalary." ".$l_perSeason;
	if ($OfferNoTrade == 1){
		echo $l_NoTrade;
	}
	if ($tmpBonus > 0){
		echo " ".$l_Bonus." $".number_format($tmpBonus,0);
	}
	
	?>
	</h4></strong><br><input id="acceptedsalary" type="hidden" name="acceptedsalary" value="0">
	<input type="hidden" name="MM_insert" value="form">
    
<?php 
} 

}

if($_SESSION['PlayerAI'] == 0){
    $odds=100;
}
?>

     </div>
                
      </td>
    </tr>
    </table>
    <INPUT id="player"  type="hidden" value="<?php echo $row_GetPlayer['Name']; ?>" name="player">
	<input type="hidden" name="YearSalary1" value="<?php echo $MinimumPlayerSalary; ?>">
    <input type="hidden" name="YearSalary2" value="0">
    <input type="hidden" name="YearSalary3" value="0">
    <input type="hidden" name="YearSalary4" value="0">
    <input type="hidden" name="YearSalary5" value="0">
    <input type="hidden" name="YearSalary6" value="0">
    <input type="hidden" name="YearSalary7" value="0">
    <input type="hidden" name="YearSalary8" value="0">
    <input type="hidden" name="YearSalary9" value="0">
    <input type="hidden" name="YearSalary10" value="0"> 
    <input type="hidden" name="bonus" value="0">
    <input type="hidden" name="PlayerAI" value="<?php echo $_SESSION['PlayerAI'];?>"> 
    <input type="hidden" name="position" id="position" value="<?php echo $row_GetPlayer['Position']; ?>" />
    <input type="hidden" name="ExtensionAttempts" value="<?php echo $ExtensionAttempts;?>">
    <input type="hidden" name="newsalfinal" value="<?php echo $MinimumPlayerSalary; ?>">
    <input type="hidden" name="newsal" value="<?php echo $MinimumPlayerSalary; ?>">
  	<input type="hidden" name="position" value="<?php echo $row_GetPlayer['Position']; ?>" />
    <input type="hidden" name="MinimumPlayerSalary" value="<?php echo $MinimumPlayerSalary; ?>" />
    <input type="hidden" name="modifier" value="<?php echo $modifier; ?>" />
    <input type="hidden" name="oddsdefault" value="<?php echo $odds; ?>" />
    <input type="hidden" name="odds" value="<?php echo $odds; ?>" />
    <input type="hidden" name="MaximumPlayerSalary" value="<?php echo $MaximumPlayerSalary; ?>" />
</form>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>
