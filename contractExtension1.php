<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PlayerRatings = "Player Ratings";
	$l_SalaryDistribution = "Salary Distribution";
	$l_SalaryPerYear = "Salary Per Year";
	$l_SendOffer = "Send Offer";
	$l_Offer = "Offer Sheet";
	$l_True  = "True";
	$l_False  = "False";
	$l_CONTRACTLENGTH = "Contract Length";
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
	$l_Odds1 = "<h4>You have a ";
	$l_Odds2 = ", he will resign with your team. </h4><em style='padding-left:135px; font-size:11px'>The site will generate a random number between 1 and 100. If the number is between 1 and ";
	$l_Odds3 = ", he will sign the contract.</em>";
	$l_YouOdds = "Your Odds";
	$l_OfferDeclined = "OFFER DECLINED";
	$l_FinScore1 = "Your final score of";
	$l_FinScore2 = "is greater than the odds of";
	$l_FinScore3 = "% beat the odds of";
	$l_OfferAccepted = "OFFER ACCEPTED";
	$l_Bonus = "Signing Bonus";
	$l_SalaryCap = "Salary Cap";
	$l_NextSeason = "Next Seasons Projected Payroll";
	$l_AvailableFunds = "Available Funds For Payroll";
	$l_CurrentSalary = "Current Salary";
	$ContractDetails = "Contract Details";
	$ContractOptions = "Contract Options";
	$AgentAskingPrice = "current market value";
	$AgentFeedback = "Agent Feedback";
	$clientMoraleLow = "My client is unhappy with the team right now.";
	$clientMoraleHight = "My client is extremely happy with the team. right now.";
	$clientMoraleMed = "My client is currently happy with his status with the team.";
	$clientConcerned = "%item1 is concerned about his ice time with his position with the franchise next season.";
	$ufaElegable = "This contract offer will extend past my client's UFA eligablity.";
	$ExpectedSalary = "My client is expecting to make <strong>at least $%item1</strong>.";
	$ExtensionAttemptsText = "You have made <strong>%item1 contract extension offer(s)</strong>.  You have up to <strong>%item2 more</strong> opportunities remaining.";
	$AlreadySigned = "You have already signed this player to a contract extension.";
	$AlreadySentOffer = "You have already made a contract extension offer today.   Please wait 24 hours before making another offer.";
	$l_NoneTxt = "None";
	$l_Even = "Even";
	$l_FrontLoad = "Front-Load";
	$l_IncludeText = "Include";
	$NoRightsToPlayer = "You don't have negotiation rights witht his player.  You can not make any contract extension offers.";
	$l_SigningBonus = "Signing Bonus";
	$l_SigningBonusDetails = "10% of Contract";
	$SummaryText1 = 'The market value for his services is currently a <strong><span class="YearTxt1">%item1</span>-year</strong> contract worth a total of <strong>$<span class="TotalSalaryTxt">%item2</span></strong>, which equals <strong>$<span class="YearlySalaryTxt">%item3</span></strong> per season.';
	$SummaryText2 = 'You are offering <strong>%item1-year</strong> old %item2 the following contract: The contract runs over <strong><span class="YearTxt">1</span></strong>&nbsp;guaranteed years. The total guaranteed value of the contract is <strong>$<span class="YourTotalSalaryTxt">%item3</span></strong>, which equals an average value of <strong>$<span class="YourYearlySalaryTxt">%item4</span></strong> per season.';
	$SummaryText3 = 'Included in this contract is a <strong>$<span class="BonusTxt">0</span></strong> signing bonus that will count against the salary cap.';
	$SummaryText4 = 'You have <strong>$<span class="RemainingCap">%item1</span></strong> left for player contracts next season. <br><br><span style="color:green;">The owner has given approval of this deal, so you may submit the offer to the player.</span>';
	$SummaryText5 = 'You have <strong>$<span class="RemainingCap">%item1</span></strong> left for player contracts next season. <br><br><span style="color:red;">The owner will not approve this deal until you free up some salary cap. room.</span>';
	$l_resignOdds = "RESIGNING ODDS";
	$l_sendOffer = "Send Offer";
	$l_totalContract = "Total Contract";
	$l_summary = "SUMMARY";
	$l_NoTradeCopy = "In addition, you are giving him a <strong>no trade</strong> clause with his contract.";
	break; 

case 'fr': 
	$l_PlayerRatings = "Stat de joueur";
	$l_SalaryDistribution = "Distribution de salaire";
	$l_SalaryPerYear = "Salaire par an";
	$l_SendOffer = "Envoyez l'offre";
	$l_Offer = "Offre";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_CONTRACTLENGTH = "Longueur de contrat";
	$l_NoPermission = "Vous n'avez pas la permission d'&ecirc;tre en pourparlers un contrat avec ce joueur!";
	$l_rejectFinal = "Ce joueur a indiqu&eacute; qu'il n'a aucun int&eacute;r&ecirc;t en signant une extension de contrat avec votre &eacute;quipe.";
	$l_rejectWait = "L'agent demande que vous prenez 24 heures pour penser au-dessus d'une nouvelle offre. Ainsi revenu en 24 heures.";
	$l_AgentBargain= "Negocier avec l'agent";
	$l_AskingPrice = "Prix demand&eacute;";
	$l_ContractAccepted = "Le contrat acceptent";
	$l_years = "ann&eacute;es";
	$l_perSeason = "par saison";
	$l_NegStatus = "Statut de n&eacute;gociations";
	$l_Neg1 = "Vous n'avez fait aucune proposition.";
	$l_Neg2 = "Vous avez fait ";
	$l_Neg3 = " offre.  ";
	$l_Neg4 = "Vous pouvez composer &agrave; ";
	$l_Neg5 = "plus offre. ";
	$l_Neg6 = "L'extension de contrat que les entretiens ont a interrompu et le joueur souhaite examiner le march&eacute; d'agence libre.";
	$l_OfferContract = "Extension de contrat";
	$l_Signed = "Extension de sign&eacute;e";
	$l_Odds1 = "<h4>Vous avez ";
	$l_Odds2 = ", il d&eacute;missionnera avec votre &eacute;quipe. </h4><em style='padding-left:135px; font-size:11px'>L'emplacement produira d'un &agrave;  nombre al&eacute;atoire entre 1 et 100. Si le nombre est entre 1 et";
	$l_Odds3 = ", il sign&eacute;e avec votre &eacute;quipe.</em>";
	$l_YouOdds = "Votre chance";
	$l_OfferDeclined = "L'OFFRE A REJET&agrave;";
	$l_FinScore1 = "Vos points finaux de";
	$l_FinScore2 = "est plus grande que la chance de";
	$l_FinScore3 = "% gagnez la chance de";
	$l_OfferAccepted = "L'OFFRE A ACCEPT&agrave;";
	$l_Bonus = "Bonification de contrat";
	$l_SalaryCap = "Limite de salaire";
	$l_NextSeason = "Les saisons suivantes ont projet&eacute; le livre de paie";
	$l_AvailableFunds = "Fonds disponibles pour le livre de paie";
	$l_CurrentSalary = "Salaire courant";
	$ContractDetails = "D&eacute;tails de contrat";
	$ContractOptions = "Options de contrat";
	$AgentAskingPrice = "du prix demand&eacute; d'agents";
	$AgentFeedback = "R&eacute;troaction d'agent";
	$clientMoraleLow = "Mon client est peu satisfait de l'&eacute;quipe en ce moment.";
	$clientMoraleHight = "Mon client est extr&ecirc;mement heureux avec l'&eacute;quipe. en ce moment.";
	$clientMoraleMed = "Mon client est actuellement heureux avec son statut avec l'&eacute;quipe.";
	$clientConcerned = "%item1 est pr&eacute;occup&eacute; par son temps de glace par sa position par la concession la saison prochaine.";
	$ufaElegable = "Cette offre de contrat se prolongera apr&egrave;s mon client' ; eligablity de UFA.";
	$ExpectedSalary = "Mon client compte faire au moins $%item1.";
	$ExtensionAttemptsText = "Vous avez d&eacute;j&agrave; fait les propositions <strong>%item1</strong>. Vous avez <strong>%item2</strong> plus de rester d'occasions.";
	$AlreadySigned = "Vous avez d&eacute;j&agrave; sign&eacute; ce joueur &agrave; une extension de contrat.";
	$AlreadySentOffer = "Vous avez d&eacute;j&agrave; fait une extension de contrat offrir aujourd'hui. Veuillez attendre 24 heures avant de faire une autre proposition.";
	$l_NoneTxt = "Aucun";
	$l_Even = "Even";
	$l_FrontLoad = "Avant-Charge";
	$l_IncludeText = "Incluez";
	$NoRightsToPlayer = "Vous n'avez pas des droits de n&eacute;gociation avec son joueur. Vous ne pouvez faire aucune propositions d'extension de contrat.";
	$l_SigningBonus = "Bonification de signature";
	$l_SigningBonusDetails = "10% du contrat";
	$SummaryText1 = 'Le joueur estime que sa valeur marchande justifierait au moins a <strong><span class="YearTxt1">%item1</span>- ann&eacute;e</strong> contrat en valeur l un total de <strong>$<span class="TotalSalaryTxt">%item2</span></strong>, qui &eacute;gale<strong>$<span class="YearlySalaryTxt">%item3</span></strong> par saison.';
	$SummaryText2 = 'Vous offrez <strong>%item1-year</strong> vieux %item2 le contrat suivant : Le contrat fonctionne plus de <strong><span class="YearTxt">1</span></strong>&nbsp;ann&eacute;es garanties. Toute la valeur garantie du contrat est <strong>$<span class="YourTotalSalaryTxt">%item3</span></strong>, de ce qu\'&eacute;gale une valeur <strong>$<span class="YourYearlySalaryTxt">%item4</span></strong> par saison.';
	$SummaryText3 = 'Inclus dans ce contrat est a <strong>$<span class="BonusTxt">0</span></strong> bonification de signature qui comptera contre la limite de salaire.';
	$SummaryText4 = 'Vous avez <strong>$<span class="RemainingCap">%item1</span></strong> la gauche pour le joueur contracte la saison prochaine. <br><br><span style="color:green;">Le propri&eacute;taire a donn&eacute; l\'approbation de cette affaire, ainsi vous pouvez soumettre l\'offre au joueur.</span>';
	$SummaryText5 = 'Vous avez <strong>$<span class="RemainingCap">%item1</span></strong> la gauche pour le joueur contracte la saison prochaine. <br><br>Le propri&eacute;taire n\'approuvera pas cette affaire jusqu\'&agrave; ce que vous lib&eacute;riez vers le haut une certaine pi&egrave;ce de limite de salaire.';
	$l_resignOdds = "Chance de prolongation";
	$l_sendOffer = "Envoyez l'offre";
	$l_totalContract = "Contrat total";
	$l_summary = "R&eacute;sum&eacute;";
	$l_NoTradeCopy = "En outre, vous lui avez donn&eacute; une <strong>clause du commerce de non</strong> avec son contrat.";
	break;
} 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$PID_GetPlayer = "82";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetType = "player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}


$query_GetWebInfo = sprintf("SELECT * FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);

$SalaryCap=$row_GetWebInfo['SalaryCap'];
$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
$MaximumPlayerSalary=$row_GetWebInfo['MaximumPlayerSalary'];
$TradeDeadlineDay=$row_GetWebInfo['TradeDeadlineDay'];
$PlayerAI=$row_GetWebInfo['PlayerAI'];
$UFA=$row_GetWebInfo['UFA'];
$AvgerageSalary=$row_GetWebInfo['AvgerageSalary'];
$WaiverSalaryExemption=$row_GetWebInfo['WaiverSalaryExemption'];

if ($GetType == 'goalie'){
	$query_GetPlayer = sprintf("SELECT P.*, '5' as Position FROM goalies as P, goaliestats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
	$json = checkMarketValue($row_GetPlayer["Number"],'goalie', $connection);
	$arr = json_decode($json, true); 
	foreach($arr as $key1 => $value1) { 
		$expectedYears = $value1["years"];
		$expectedSalary = $value1["salary"];
		$expectedTotal = $value1["total"];
	}

	$query_GetAvg = sprintf("SELECT AVG(Salary1) as Salary, AVG(SK) as SK, AVG(DU) as DU, AVG(EN) as EN, AVG(SZ) as SZ, AVG(AG) as AG, AVG(RB) as RB, AVG(SC) as SC, AVG(HS) as HS, AVG(RT) as RT, AVG(PC) as PC, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM goalies WHERE Retired=0 AND SK > 50 AND DU > 50 AND EN > 40 AND SZ > 50 AND AG > 50 AND RB > 50 AND SC > 50 AND PS AND LD > 50 AND EX > 50");
	$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
	$row_GetAvg = mysql_fetch_assoc($GetAvg);
	$totalRows_GetAvg = mysql_num_rows($GetAvg);
	
	$OverallRate = $row_GetPlayer['Overall'] - 10;
	
	$SK_MOD=0.85;
	$DU_MOD=1.10;
	$EN_MOD=1.00;
	$SZ_MOD=1.10;
	$AG_MOD=0.85;
	$RB_MOD=1.05;
	$SC_MOD=0.90;
	$HS_MOD=0.75;
	$RT_MOD=0.85;
	$PC_MOD=0.80;
	$PS_MOD=0.75;
	$EX_MOD=0.50;
	$LD_MOD=0.50;
	
	$BASE_MOD_1 = 1.15;
	$BASE_MOD_2 = 1.1;
	$BASE_MOD_3 = 1.05;
	$BASE_MOD_4 = 1;
	$INCREMENT=0.06;
	
	if($row_GetPlayer['Salary1'] < $MinimumPlayerSalary) { $tmpSalary = $MinimumPlayerSalary; } else {$tmpSalary = $row_GetPlayer['Salary1']; }
	
	$WEIGHTED_AVE_RATE = ((($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['SZ'] * $SZ_MOD) + ($row_GetAvg['AG'] * $AG_MOD) + ($row_GetAvg['RB'] * $RB_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['HS'] * $HS_MOD) + ($row_GetAvg['RT'] * $RT_MOD) + ($row_GetAvg['PC'] * $PC_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 13);
	$PLAYER_AVE_RATE = ((($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['SZ'] * $SZ_MOD) + ($row_GetPlayer['AG'] * $AG_MOD) + ($row_GetPlayer['RB'] * $RB_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['HS'] * $HS_MOD) + ($row_GetPlayer['RT'] * $RT_MOD) + ($row_GetPlayer['PC'] * $PC_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 13);
	$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
	
	if($row_GetPlayer['PO'] > 90){ $POTENTIAL_MOD = 1.25; 
	} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.2; 
	} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.15; 
	} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.1; 
	} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.075; 
	} else if($row_GetPlayer['PO'] >= 65 && $row_GetPlayer['PO'] < 70){ $POTENTIAL_MOD = 1.05; 
	} else if($row_GetPlayer['PO'] >= 60 && $row_GetPlayer['PO'] < 65){ $POTENTIAL_MOD = 1.025; 
	} else { $POTENTIAL_MOD = 1;}
	
	if($FINAL_BASE_RATE < 0.9) { $FINAL_BASE_RATE = 0.9; }
	$YEAR_1_MOD = abs(($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_2_MOD = abs(($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_3_MOD = abs(($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_4_MOD = abs(($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	
	if(abs($YEAR_1_MOD * $AvgerageSalary) < $MinimumPlayerSalary){
		$tmpSalaryMod = $MinimumPlayerSalary;
	} else {
		$tmpSalaryMod = abs($YEAR_1_MOD * $AvgerageSalary);
	}
	if($tmpSalary > $tmpSalaryMod){
		$BONUS = floor(($tmpSalary - $AvgerageSalary) * 0.2);
	} else {
		$BONUS = 0;
	}
	
	$YEAR_1_SALARY = round(floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1)),-3);
	$YEAR_2_SALARY = round(floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95)),-3);
	$YEAR_3_SALARY = round(floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9)),-3);
	$YEAR_4_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85)),-3);
	$YEAR_5_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8)),-3);
	$YEAR_6_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75)),-3);
	$YEAR_7_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7)),-3);
	$YEAR_8_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65)),-3);
	$YEAR_9_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6)),-3);
	$YEAR_10_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5)),-3);
	
	$SalaryIncrement = 1 + ((($row_GetPlayer['PO'] * .25) + ($row_GetPlayer['Overall'] * .75))/100);

	if ($YEAR_1_SALARY < $MinimumPlayerSalary) { $YEAR_1_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 1); }
	if ($YEAR_2_SALARY < $MinimumPlayerSalary) { $YEAR_2_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.95); }
	if ($YEAR_3_SALARY < $MinimumPlayerSalary) { $YEAR_3_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.90); }
	if ($YEAR_4_SALARY < $MinimumPlayerSalary) { $YEAR_4_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.85); }
	if ($YEAR_5_SALARY < $MinimumPlayerSalary) { $YEAR_5_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.8); }
	if ($YEAR_6_SALARY < $MinimumPlayerSalary) { $YEAR_6_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.75); }
	if ($YEAR_7_SALARY < $MinimumPlayerSalary) { $YEAR_7_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.7); }
	if ($YEAR_8_SALARY < $MinimumPlayerSalary) { $YEAR_8_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.65); }
	if ($YEAR_9_SALARY < $MinimumPlayerSalary) { $YEAR_9_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.6); }
	if ($YEAR_10_SALARY < $MinimumPlayerSalary) { $YEAR_10_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.5); }

	$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;

	
}else{
	$query_GetPlayer = sprintf("SELECT P.* FROM players as P, playerstats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
	$json = checkMarketValue($row_GetPlayer["Number"],'player', $connection);
	$arr = json_decode($json, true); 
	foreach($arr as $key1 => $value1) { 
		$expectedYears = $value1["years"];
		$expectedSalary = $value1["salary"];
		$expectedTotal = $value1["total"];
	}
	
	$query_GetAvg = sprintf("SELECT AVG(Salary1) as Salary, AVG(CK) as CK, AVG(FG) as FG, AVG(DI) as DI, AVG(SK) as SK, AVG(ST) as ST, AVG(EN) as EN, AVG(DU) as DU, AVG(PH) as PH, AVG(FO) as FO, AVG(PA) as PA, AVG(SC) as SC, AVG(DF) as DF, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM players WHERE Retired=0 AND CK > 50 AND FG > 50 AND DI > 40 AND SK > 50 AND ST > 50 AND EN > 50 AND DU > 50 AND PH > 50 AND FO > 50 AND PA > 50 AND SC > 50 AND DF > 50 AND PS > 50 AND LD > 50 AND EX > 50");
	$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
	$row_GetAvg = mysql_fetch_assoc($GetAvg);
	$totalRows_GetAvg = mysql_num_rows($GetAvg);
	
	$OverallRate = $row_GetPlayer['Overall'];
	
	if($row_GetPlayer['Salary1'] < $MinimumPlayerSalary) { $tmpSalary = $MinimumPlayerSalary; } else {$tmpSalary = $row_GetPlayer['Salary1']; }
	
	if ($row_GetPlayer['Position'] > 0 && $row_GetPlayer['Position'] < 4){
		$CK_MOD=0.65;
		$FG_MOD=0.50;
		$DI_MOD=0.50;
		$SK_MOD=0.50;
		$ST_MOD=0.80;
		$EN_MOD=0.80;
		$DU_MOD=0.70;
		$PH_MOD=0.80;
		$FO_MOD=0.65;
		$PA_MOD=1.10;
		$SC_MOD=1.30;
		$DF_MOD=1.10;
		$PS_MOD=0.60;
		$EX_MOD=0.50;
		$LD_MOD=0.50;
	} else {
		$CK_MOD=0.90;
		$FG_MOD=0.50;
		$DI_MOD=0.60;
		$SK_MOD=0.75;
		$ST_MOD=0.80;
		$EN_MOD=0.80;
		$DU_MOD=1.10;
		$PH_MOD=0.80;
		$FO_MOD=0.20;
		$PA_MOD=1.05;
		$SC_MOD=1.00;
		$DF_MOD=1.30;
		$PS_MOD=0.20;
		$EX_MOD=0.50;
		$LD_MOD=0.50;
	} 
	
	$BASE_MOD_1 = 1.15;
	$BASE_MOD_2 = 1.1;
	$BASE_MOD_3 = 1.05;
	$BASE_MOD_4 = 1;
	if($OverallRate >= 80){
		$INCREMENT=0.08;
	} else {
		$INCREMENT=0.06;
	}
	
	$WEIGHTED_AVE_RATE = ((($row_GetAvg['CK'] * $CK_MOD) + ($row_GetAvg['FG'] * $FG_MOD) + ($row_GetAvg['DI'] * $DI_MOD) + ($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['ST'] * $ST_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['PH'] * $PH_MOD) + ($row_GetAvg['FO'] * $FO_MOD) + ($row_GetAvg['PA'] * $PA_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['DF'] * $DF_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 15);
	$PLAYER_AVE_RATE = ((($row_GetPlayer['CK'] * $CK_MOD) + ($row_GetPlayer['FG'] * $FG_MOD) + ($row_GetPlayer['DI'] * $DI_MOD) + ($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['ST'] * $ST_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['PH'] * $PH_MOD) + ($row_GetPlayer['FO'] * $FO_MOD) + ($row_GetPlayer['PA'] * $PA_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['DF'] * $DF_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 15);
	$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
	
	if($row_GetPlayer['PO'] > 90){ $POTENTIAL_MOD = 1.25; 
	} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.2; 
	} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.15; 
	} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.1; 
	} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.075; 
	} else if($row_GetPlayer['PO'] >= 65 && $row_GetPlayer['PO'] < 70){ $POTENTIAL_MOD = 1.05; 
	} else if($row_GetPlayer['PO'] >= 60 && $row_GetPlayer['PO'] < 65){ $POTENTIAL_MOD = 1.025; 
	} else { $POTENTIAL_MOD = 1;}
	
	if($FINAL_BASE_RATE < 0.9) { $FINAL_BASE_RATE = 0.9; }
	$YEAR_1_MOD = abs(($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_2_MOD = abs(($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_3_MOD = abs(($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	$YEAR_4_MOD = abs(($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
	
	if(abs($YEAR_1_MOD * $AvgerageSalary) < $MinimumPlayerSalary){
		$tmpSalaryMod = $MinimumPlayerSalary;
	} else {
		$tmpSalaryMod = abs($YEAR_1_MOD * $AvgerageSalary);
	}
	if($tmpSalary > $tmpSalaryMod){
		$BONUS = floor(($tmpSalary - $AvgerageSalary) * 0.2);
	} else {
		$BONUS = 0;
	}
	
	$YEAR_1_SALARY = round(floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1)),-3);
	$YEAR_2_SALARY = round(floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95)),-3);
	$YEAR_3_SALARY = round(floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9)),-3);
	$YEAR_4_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85)),-3);
	$YEAR_5_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8)),-3);
	$YEAR_6_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75)),-3);
	$YEAR_7_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7)),-3);
	$YEAR_8_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65)),-3);
	$YEAR_9_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6)),-3);
	$YEAR_10_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5)),-3);
	
	$SalaryIncrement = 1 + ((($row_GetPlayer['PO'] * .25) + ($row_GetPlayer['Overall'] * .75))/100);

	if ($YEAR_1_SALARY < $MinimumPlayerSalary) { $YEAR_1_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 1); }
	if ($YEAR_2_SALARY < $MinimumPlayerSalary) { $YEAR_2_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.95); }
	if ($YEAR_3_SALARY < $MinimumPlayerSalary) { $YEAR_3_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.90); }
	if ($YEAR_4_SALARY < $MinimumPlayerSalary) { $YEAR_4_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.85); }
	if ($YEAR_5_SALARY < $MinimumPlayerSalary) { $YEAR_5_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.8); }
	if ($YEAR_6_SALARY < $MinimumPlayerSalary) { $YEAR_6_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.75); }
	if ($YEAR_7_SALARY < $MinimumPlayerSalary) { $YEAR_7_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.7); }
	if ($YEAR_8_SALARY < $MinimumPlayerSalary) { $YEAR_8_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.65); }
	if ($YEAR_9_SALARY < $MinimumPlayerSalary) { $YEAR_9_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.6); }
	if ($YEAR_10_SALARY < $MinimumPlayerSalary) { $YEAR_10_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.5); }
	
	$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;

}

$PlayerName=$row_GetPlayer['Name'];
$Position=$row_GetPlayer['Position'];
$currentSalary=$tmpSalary;

$query_GetContractExt = sprintf("SELECT * FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension'", $row_GetPlayer['Number']);
$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
$totalRows_GetContractExt = mysql_num_rows($GetContractExt);

$query_GetTotalDays = "select schedule.Day FROM schedule WHERE schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day desc limit 0,1";
$GetTotalDays = mysql_query($query_GetTotalDays, $connection) or die(mysql_error());
$row_GetTotalDays = mysql_fetch_assoc($GetTotalDays);
$totalRows_GetTotalDays = $row_GetTotalDays['Day'];

$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
if ($totalRows_GetLastDay==0){
	$Day_ID = 0;
} else {
	$Day_ID = $row_GetLastDay['Day'];
}

$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Type='Extension' ORDER BY DateCreated DESC ", $PID_GetPlayer);
$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);

$query_GetPlayerExtensionOffersCT = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s AND Type='Extension' ORDER BY DateCreated DESC ", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffersCT = mysql_query($query_GetPlayerExtensionOffersCT, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersCT = mysql_fetch_assoc($GetPlayerExtensionOffersCT);
$totalRows_GetPlayerExtensionOffersCT = mysql_num_rows($GetPlayerExtensionOffersCT);

$query_GetPlayerExtensionOffersTeams = sprintf("SELECT Team FROM playersextensionoffers WHERE Player=%s AND Type='Extension' GROUP BY Team ", $PID_GetPlayer);
$GetPlayerExtensionOffersTeams = mysql_query($query_GetPlayerExtensionOffersTeams, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersTeams = mysql_fetch_assoc($GetPlayerExtensionOffersTeams);
$totalRows_GetPlayerExtensionOffersTeams = mysql_num_rows($GetPlayerExtensionOffersTeams);

$ExtensionAttempts = 0;
$ExtensionAttemptsValue = 0;
$ExtensionLastDate="2009-01-01";
$RemainingOffers = 0;	
$NegWithMe = "True";	

if($totalRows_GetPlayerExtensionOffersTeams == 1){
	if($totalRows_GetPlayerExtensionOffersCT == 0){
		$ExtensionAttempts=0;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate="2009-01-01";	
		$RemainingOffers = 2;	
	} else if($totalRows_GetPlayerExtensionOffersCT == 1){
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 2;	
	} else if($totalRows_GetPlayerExtensionOffersCT == 2){
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 1;	
	} else {
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 0;	
	}	
	
} else if($totalRows_GetPlayerExtensionOffersTeams == 2){
	if($totalRows_GetPlayerExtensionOffersCT == 0){
		$ExtensionAttempts=$totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate="2009-01-01";
		$RemainingOffers = 1;	
	} else if($totalRows_GetPlayerExtensionOffersCT == 1){
		$ExtensionAttempts=$totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 1;			
	} else {
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 0;	
	} 
	
} else if($totalRows_GetPlayerExtensionOffersTeams >= 3){
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * $row_GetWebInfo['AI_FAIL']);
		$ExtensionLastDate=$row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 0;	
	
} else if($totalRows_GetPlayerExtensionOffersTeams == 0){
		$ExtensionAttempts = 0;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate = "2009-01-01";
		$RemainingOffers = 3;	
}

$OfferAccepted = false;
$OfferYears = 1;
$offerSalary = $MinimumPlayerSalary;
$OfferNoTrade = 0;
$modifier = 1;
if($row_GetPlayer['Age'] < $UFA){
	$odds = $row_GetWebInfo['AI_RFA_BASE'];
} else {
	$odds = $row_GetWebInfo['AI_UFA_BASE'];
}
$odds = $odds - ($ExtensionAttempts * $row_GetWebInfo['AI_FAIL']);

$HalfSeason = number_format($totalRows_GetTotalDays / 2,0);

if ($_SESSION['current_SeasonTypeID']==2){
	$timeofyear = $row_GetWebInfo['AI_SEASON_PRE'];
} else if ($_SESSION['current_SeasonTypeID']==1){
	if ($Day_ID > $HalfSeason){
		$timeofyear = $row_GetWebInfo['AI_SEASON_REG_2ND'];		
	} else {
		$timeofyear = $row_GetWebInfo['AI_SEASON_REG_1ST'];
	}
} else {
	$timeofyear = $row_GetWebInfo['AI_SEASON_POST'];

}

$odds = $odds - $timeofyear;

if(checkPlayersFuture($row_GetPlayer['Team'], $row_GetPlayer['Position'], $row_GetPlayer['Overall'], $connection) == 1){
	$odds = $odds - $row_GetWebInfo['AI_DEPTH_CHARTS'];
}

$CurrentPayroll = getTeamPayroll($row_GetPlayer['Team'],2, $connection, $WaiverSalaryExemption);

$PlayerPos = "Forward";
if ($GetType == 'goalie'){ 
	$PlayerPos = "Goalie"; 
} else {
	if ($row_GetPlayer['PosC'] == "True" || $row_GetPlayer['PosC'] == "Vrai" || $row_GetPlayer['PosLW'] == "True" || $row_GetPlayer['PosC'] == "Vrai" || $row_GetPlayer['PosRW'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
		$PlayerPos = "Forward";
	} else if ($row_GetPlayer['PosD'] == "True" || $row_GetPlayer['PosD'] == "Vrai"){
		$PlayerPos = $l_Defence;
	}
}


$tmpTxtItems = array("%item1");
$updatedTxtItems = array(number_format($SalaryCap - $CurrentPayroll,0));
$SummaryText4 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText4);

$tmpTxtItems = array("%item1");
$updatedTxtItems = array(number_format($SalaryCap - $CurrentPayroll,0));
$SummaryText5 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText5);
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



<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">

$(function(){
var BASE_1_SALARY = <?php echo $YEAR_1_SALARY;?>;
var BASE_2_SALARY = <?php echo $YEAR_2_SALARY;?>;
var BASE_3_SALARY = <?php echo $YEAR_3_SALARY;?>;
var BASE_4_SALARY = <?php echo $YEAR_4_SALARY;?>;
var BASE_5_SALARY = <?php echo $YEAR_5_SALARY;?>;
var BASE_6_SALARY = <?php echo $YEAR_6_SALARY;?>;
var BASE_7_SALARY = <?php echo $YEAR_7_SALARY;?>;
var BASE_8_SALARY = <?php echo $YEAR_8_SALARY;?>;
var BASE_9_SALARY = <?php echo $YEAR_9_SALARY;?>;
var BASE_10_SALARY = <?php echo $YEAR_10_SALARY;?>;
var YEAR_1_SALARY = BASE_1_SALARY;
var YEAR_2_SALARY = BASE_1_SALARY;
var YEAR_3_SALARY = BASE_1_SALARY;
var YEAR_4_SALARY = BASE_1_SALARY;
var YEAR_5_SALARY = BASE_1_SALARY;
var YEAR_6_SALARY = BASE_1_SALARY;
var YEAR_7_SALARY = BASE_1_SALARY;
var YEAR_8_SALARY = BASE_1_SALARY;
var YEAR_9_SALARY = BASE_1_SALARY;
var YEAR_10_SALARY = BASE_1_SALARY;
var UFA = <?php echo $UFA;?>;
var AGE = <?php echo $row_GetPlayer['Age'];?>;
var MORALE = <?php echo $row_GetPlayer['MO'];?>;
var currentDistribute = 0;
var currentNoTrade = 0;
var bargain = 1;
var salaryCapRemaining = <?php echo (($SalaryCap * 1.05) - $CurrentPayroll); ?>;
var expectedTotal = <?php echo $expectedTotal;?>;
var MinimumPlayerSalary = <?php echo $MinimumPlayerSalary;?>;
var MaximumPlayerSalary = <?php echo $MaximumPlayerSalary;?>;
var ExtraBonus = 0;
$('#UFAText').hide();
$('#NoTrade').hide();
$('#ExpectedText').hide();	
$('#contract_form').submit(function(e){
	e.preventDefault();
	var form = $(this);
	var post_url = form.attr('action');
	var post_data = form.serialize();
	$('#loader', form).html('<div align="center" style="margin-top:50px;"><img src="image/common/ajax-load.gif" /></div>');
	$.ajax({
		type: 'POST',
		url: post_url,
		data: post_data,
		success: function(msg) {
			$(form).fadeOut(500, function(){
				form.html(msg).fadeIn();
			});
		}
	});

});

$('#BonusText').hide();	

  if(document.contract_form.yearsoff.value==1){
	  updateOffer();
  }
  
  	$('#bargain').change(function() {
		resetSalary();
		if(currentDistribute == 1){
			distributeSalary();
		} else {
			updateOffer();
		}
	});
	
	$('#yearsoff').change(function() {
		resetSalary();
		if(currentDistribute == 1){
			distributeSalary();
		} else {
			updateOffer();
		}
	});

	$("input[name=distribute]:radio").click(function() {
		if($(this).val() == '1') {
	  		distributeSalary();
			currentDistribute = 1;
		} else {
			currentDistribute = 0;
			resetSalary();
			updateOffer();
		}
	});
	
	$("input[name=notrade]:radio").click(function() {
		resetSalary();
		if(currentNoTrade == 1){
			currentNoTrade = 0;
		} else {
			currentNoTrade = 1;
		}
		if(currentDistribute == 1){
			distributeSalary();
		}
		updateOffer();
	});

	$('#bonus').change(function() {
		resetSalary();
		if(currentDistribute == 1){
			distributeSalary();
		} else {
			updateOffer();
		}
	});

	function resetSalary(){
		ExtraBonus = 0;
		
		if($('#yearsoff').val() == 1){
			YEAR_1_SALARY = BASE_1_SALARY;
		  } else if($('#yearsoff').val() == 2){
			YEAR_1_SALARY = BASE_2_SALARY;
			YEAR_2_SALARY = BASE_2_SALARY;
		  } else if($('#yearsoff').val() == 3){
			YEAR_1_SALARY = BASE_3_SALARY;
			YEAR_2_SALARY = BASE_3_SALARY;
			YEAR_3_SALARY = BASE_3_SALARY;
		  } else if($('#yearsoff').val() == 4){
			YEAR_1_SALARY = BASE_4_SALARY;
			YEAR_2_SALARY = BASE_4_SALARY;
			YEAR_3_SALARY = BASE_4_SALARY;
			YEAR_4_SALARY = BASE_4_SALARY;
		  } else if($('#yearsoff').val() == 5){
			YEAR_1_SALARY = BASE_5_SALARY;
			YEAR_2_SALARY = BASE_5_SALARY;
			YEAR_3_SALARY = BASE_5_SALARY;
			YEAR_4_SALARY = BASE_5_SALARY;
			YEAR_5_SALARY = BASE_5_SALARY;
		  } else if($('#yearsoff').val() == 6){
			YEAR_1_SALARY = BASE_6_SALARY;
			YEAR_2_SALARY = BASE_6_SALARY;
			YEAR_3_SALARY = BASE_6_SALARY;
			YEAR_4_SALARY = BASE_6_SALARY;
			YEAR_5_SALARY = BASE_6_SALARY;
			YEAR_6_SALARY = BASE_6_SALARY;
		  } else if($('#yearsoff').val() == 7){
			YEAR_1_SALARY = BASE_7_SALARY;
			YEAR_2_SALARY = BASE_7_SALARY;
			YEAR_3_SALARY = BASE_7_SALARY;
			YEAR_4_SALARY = BASE_7_SALARY;
			YEAR_5_SALARY = BASE_7_SALARY;
			YEAR_6_SALARY = BASE_7_SALARY;
			YEAR_7_SALARY = BASE_7_SALARY;
		  } else if($('#yearsoff').val() == 8){
			YEAR_1_SALARY = BASE_8_SALARY;
			YEAR_2_SALARY = BASE_8_SALARY;
			YEAR_3_SALARY = BASE_8_SALARY;
			YEAR_4_SALARY = BASE_8_SALARY;
			YEAR_5_SALARY = BASE_8_SALARY;
			YEAR_6_SALARY = BASE_8_SALARY;
			YEAR_7_SALARY = BASE_8_SALARY;
			YEAR_8_SALARY = BASE_8_SALARY;
		  } else if($('#yearsoff').val() == 9){
			YEAR_1_SALARY = BASE_9_SALARY;
			YEAR_2_SALARY = BASE_9_SALARY;
			YEAR_3_SALARY = BASE_9_SALARY;
			YEAR_4_SALARY = BASE_9_SALARY;
			YEAR_5_SALARY = BASE_9_SALARY;
			YEAR_6_SALARY = BASE_9_SALARY;
			YEAR_7_SALARY = BASE_9_SALARY;
			YEAR_8_SALARY = BASE_9_SALARY;
			YEAR_9_SALARY = BASE_9_SALARY;
		  }	else if($('#yearsoff').val() == 10){
			YEAR_1_SALARY = BASE_10_SALARY;
			YEAR_2_SALARY = BASE_10_SALARY;
			YEAR_3_SALARY = BASE_10_SALARY;
			YEAR_4_SALARY = BASE_10_SALARY;
			YEAR_5_SALARY = BASE_10_SALARY;
			YEAR_6_SALARY = BASE_10_SALARY;
			YEAR_7_SALARY = BASE_10_SALARY;
			YEAR_8_SALARY = BASE_10_SALARY;
			YEAR_9_SALARY = BASE_10_SALARY;
			YEAR_10_SALARY = BASE_10_SALARY;
		  }	   	  
	}
	
	function distributeSalary(){
		var $DIST_SALARY_1 = 0;
		var $DIST_SALARY_2 = 0;
		var $DIST_SALARY_3 = 0;
		var $DIST_SALARY_4 = 0;
		var $DIST_SALARY_5 = 0;
		var $DIST_SALARY_6 = 0;
		var $DIST_SALARY_7 = 0;
		var $DIST_SALARY_8 = 0;
		var $DIST_SALARY_9 = 0;
		var $DIST_SALARY_10 = 0;
		
		if($('#yearsoff').val() == 1){
			$DIST_SALARY_1=YEAR_1_SALARY;
		} else if($('#yearsoff').val() == 2){
			$DIST_SALARY_1=(YEAR_2_SALARY * 1.1);
			$DIST_SALARY_2=(YEAR_2_SALARY * 0.9);
		} else if($('#yearsoff').val() == 3){
			$DIST_SALARY_1=(YEAR_3_SALARY * 1.1);
			$DIST_SALARY_2=(YEAR_3_SALARY * 1.0);
			$DIST_SALARY_3=(YEAR_3_SALARY * 0.9);
		} else if($('#yearsoff').val() == 4){
			$DIST_SALARY_1=(YEAR_4_SALARY * 1.2);
			$DIST_SALARY_2=(YEAR_4_SALARY * 1.1);
			$DIST_SALARY_3=(YEAR_4_SALARY * 0.9);
			$DIST_SALARY_4=(YEAR_4_SALARY * 0.8);
		} else if($('#yearsoff').val() == 5){
			$DIST_SALARY_1=(YEAR_5_SALARY * 1.2);
			$DIST_SALARY_2=(YEAR_5_SALARY * 1.1);
			$DIST_SALARY_3=(YEAR_5_SALARY * 1.0);
			$DIST_SALARY_4=(YEAR_5_SALARY * 0.9);
			$DIST_SALARY_5=(YEAR_5_SALARY * 0.8);
		} else if($('#yearsoff').val() == 6){
			$DIST_SALARY_1=(YEAR_6_SALARY * 1.3);
			$DIST_SALARY_2=(YEAR_6_SALARY * 1.2);
			$DIST_SALARY_3=(YEAR_6_SALARY * 1.1);
			$DIST_SALARY_4=(YEAR_6_SALARY * 0.9);
			$DIST_SALARY_5=(YEAR_6_SALARY * 0.8);
			$DIST_SALARY_6=(YEAR_6_SALARY * 0.7);
		} else if($('#yearsoff').val() == 7){
			$DIST_SALARY_1=(YEAR_7_SALARY * 1.3);
			$DIST_SALARY_2=(YEAR_7_SALARY * 1.2);
			$DIST_SALARY_3=(YEAR_7_SALARY * 1.1);
			$DIST_SALARY_4=(YEAR_7_SALARY * 1.0);
			$DIST_SALARY_5=(YEAR_7_SALARY * 0.9);
			$DIST_SALARY_6=(YEAR_7_SALARY * 0.8);
			$DIST_SALARY_7=(YEAR_7_SALARY * 0.7);
		} else if($('#yearsoff').val() == 8){
			$DIST_SALARY_1=(YEAR_8_SALARY * 1.4);
			$DIST_SALARY_2=(YEAR_8_SALARY * 1.3);
			$DIST_SALARY_3=(YEAR_8_SALARY * 1.2);
			$DIST_SALARY_4=(YEAR_8_SALARY * 1.1);
			$DIST_SALARY_5=(YEAR_8_SALARY * 0.9);
			$DIST_SALARY_6=(YEAR_8_SALARY * 0.8);
			$DIST_SALARY_7=(YEAR_8_SALARY * 0.7);
			$DIST_SALARY_7=(YEAR_8_SALARY * 0.6);
		} else if($('#yearsoff').val() == 9){
			$DIST_SALARY_1=(YEAR_9_SALARY * 1.4);
			$DIST_SALARY_2=(YEAR_9_SALARY * 1.3);
			$DIST_SALARY_3=(YEAR_9_SALARY * 1.2);
			$DIST_SALARY_4=(YEAR_9_SALARY * 1.1);
			$DIST_SALARY_5=(YEAR_9_SALARY * 1.0);
			$DIST_SALARY_6=(YEAR_9_SALARY * 0.9);
			$DIST_SALARY_7=(YEAR_9_SALARY * 0.8);
			$DIST_SALARY_8=(YEAR_9_SALARY * 0.7);
			$DIST_SALARY_9=(YEAR_9_SALARY * 0.6);
		} else if($('#yearsoff').val() == 10){
			$DIST_SALARY_1=(YEAR_10_SALARY * 1.5);
			$DIST_SALARY_2=(YEAR_10_SALARY * 1.4);
			$DIST_SALARY_3=(YEAR_10_SALARY * 1.3);
			$DIST_SALARY_4=(YEAR_10_SALARY * 1.2);
			$DIST_SALARY_5=(YEAR_10_SALARY * 1.1);
			$DIST_SALARY_6=(YEAR_10_SALARY * 0.9);
			$DIST_SALARY_7=(YEAR_10_SALARY * 0.8);
			$DIST_SALARY_8=(YEAR_10_SALARY * 0.7);
			$DIST_SALARY_9=(YEAR_10_SALARY * 0.6);
			$DIST_SALARY_10=(YEAR_10_SALARY * 0.5);
		}
		YEAR_1_SALARY=Math.round($DIST_SALARY_1 / 1000) * 1000;
		YEAR_2_SALARY=Math.round($DIST_SALARY_2 / 1000) * 1000;
		YEAR_3_SALARY=Math.round($DIST_SALARY_3 / 1000) * 1000;
		YEAR_4_SALARY=Math.round($DIST_SALARY_4 / 1000) * 1000;
		YEAR_5_SALARY=Math.round($DIST_SALARY_5 / 1000) * 1000;
		YEAR_6_SALARY=Math.round($DIST_SALARY_6 / 1000) * 1000;
		YEAR_7_SALARY=Math.round($DIST_SALARY_7 / 1000) * 1000;
		YEAR_8_SALARY=Math.round($DIST_SALARY_8 / 1000) * 1000;
		YEAR_9_SALARY=Math.round($DIST_SALARY_9 / 1000) * 1000;
		YEAR_10_SALARY=Math.round($DIST_SALARY_10 / 1000) * 1000;
		updateOffer();
	}
	
	function updateOffer() {
		var ODDS = <?php echo $odds;?>;
		var TOTAL_SALARY = <?php echo $YEAR_1_SALARY;?>;
		var YEAR_1 = "<?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?>";
		var YEAR_2 = "<?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?>";
		var YEAR_3 = "<?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?>";
		var YEAR_4 = "<?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?>";
		var YEAR_5 = "<?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?>";
		var YEAR_6 = "<?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?>";
		var YEAR_7 = "<?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?>";
		var YEAR_8 = "<?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?>";
		var YEAR_9 = "<?php echo ($_SESSION['current_Season']+9)."-".substr($_SESSION['current_Season']+10, -2);?>";
		var YEAR_10 = "<?php echo ($_SESSION['current_Season']+10)."-".substr($_SESSION['current_Season']+11, -2);?>";
		
		var YEAR_1_SALARY_DEMAND = 0;
		var YEAR_2_SALARY_DEMAND = 0;
		var YEAR_3_SALARY_DEMAND = 0;
		var YEAR_4_SALARY_DEMAND = 0;
		var YEAR_5_SALARY_DEMAND = 0;
		var YEAR_6_SALARY_DEMAND = 0;
		var YEAR_7_SALARY_DEMAND = 0;
		var YEAR_8_SALARY_DEMAND = 0;
		var YEAR_9_SALARY_DEMAND = 0;
		var YEAR_10_SALARY_DEMAND = 0;
		
		if($('#bargain').val() == 1){
			bargain = 1.0;
		} else if($('#bargain').val() == 2){
			bargain = 0.9;
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_PAY_CUT_90'];?>;
		} else if($('#bargain').val() == 3){
			bargain = 0.8;
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_PAY_CUT_80'];?>;
		} else if($('#bargain').val() == 4){
			bargain = 0.7;
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_PAY_CUT_70'];?>;
		} else if($('#bargain').val() == 5){
			bargain = 0.6;
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_PAY_CUT_60'];?>;
		} else if($('#bargain').val() == 6){
			bargain = 0.5;
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_PAY_CUT_50'];?>;
		} else if($('#bargain').val() == 7){
			bargain = 1.1;
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_PAY_RAISE_10'];?>;
		} else if($('#bargain').val() == 8){
			bargain = 1.2;
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_PAY_RAISE_20'];?>;
		} else if($('#bargain').val() == 9){
			bargain = 1.3;
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_PAY_RAISE_30'];?>;
		} else if($('#bargain').val() == 10){
			bargain = 1.4;
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_PAY_RAISE_40'];?>;
		} else if($('#bargain').val() == 11){
			bargain = 1.5;
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_PAY_RAISE_50'];?>;
		}
		
		if($('#yearsoff').val() == 1){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = 0;
			YEAR_3_SALARY_DEMAND = 0;
			YEAR_4_SALARY_DEMAND = 0;
			YEAR_5_SALARY_DEMAND = 0;
			YEAR_6_SALARY_DEMAND = 0;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
			$(".YearTxt").html(1);
			document.contract_form.contract.value=1;
		} else if($('#yearsoff').val() == 2){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = 0;
			YEAR_4_SALARY_DEMAND = 0;
			YEAR_5_SALARY_DEMAND = 0;
			YEAR_6_SALARY_DEMAND = 0;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(2);
			ODDS = ODDS + 5;
			document.contract_form.contract.value=2;
		} else if($('#yearsoff').val() == 3){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = 0;
			YEAR_5_SALARY_DEMAND = 0;
			YEAR_6_SALARY_DEMAND = 0;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(3);
			ODDS = ODDS + 10;
			document.contract_form.contract.value=3;
		} else if($('#yearsoff').val() == 4){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = 0;
			YEAR_6_SALARY_DEMAND = 0;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(4);
			ODDS = ODDS + 15;
			document.contract_form.contract.value=4;
		} else if($('#yearsoff').val() == 5){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = 0;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(5);
			ODDS = ODDS + 20;
			document.contract_form.contract.value=5;
		} else if($('#yearsoff').val() == 6){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = Math.round(YEAR_6_SALARY * bargain / 1000) * 1000;
			YEAR_7_SALARY_DEMAND = 0;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(6);
			ODDS = ODDS + 25;
			document.contract_form.contract.value=6;
		} else if($('#yearsoff').val() == 7){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = Math.round(YEAR_6_SALARY * bargain / 1000) * 1000;
			YEAR_7_SALARY_DEMAND = Math.round(YEAR_7_SALARY * bargain / 1000) * 1000;
			YEAR_8_SALARY_DEMAND = 0;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(7);
			ODDS = ODDS + 30;
			document.contract_form.contract.value=7;
		} else if($('#yearsoff').val() == 8){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = Math.round(YEAR_6_SALARY * bargain / 1000) * 1000;
			YEAR_7_SALARY_DEMAND = Math.round(YEAR_7_SALARY * bargain / 1000) * 1000;
			YEAR_8_SALARY_DEMAND = Math.round(YEAR_8_SALARY * bargain / 1000) * 1000;
			YEAR_9_SALARY_DEMAND = 0;
			YEAR_10_SALARY_DEMAND = 0;
		    $(".YearTxt").html(8);
			ODDS = ODDS + 35;
			document.contract_form.contract.value=8;
		} else if($('#yearsoff').val() == 9){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = Math.round(YEAR_6_SALARY * bargain / 1000) * 1000;
			YEAR_7_SALARY_DEMAND = Math.round(YEAR_7_SALARY * bargain / 1000) * 1000;
			YEAR_8_SALARY_DEMAND = Math.round(YEAR_8_SALARY * bargain / 1000) * 1000;
			YEAR_9_SALARY_DEMAND = Math.round(YEAR_9_SALARY * bargain / 1000) * 1000;
			YEAR_10_SALARY_DEMAND = 0;
			$(".YearTxt").html(9);
			ODDS = ODDS + 40;
			document.contract_form.contract.value=9;
		} else if($('#yearsoff').val() == 10){
			YEAR_1_SALARY_DEMAND = Math.round(YEAR_1_SALARY * bargain / 1000) * 1000;
			YEAR_2_SALARY_DEMAND = Math.round(YEAR_2_SALARY * bargain / 1000) * 1000;
			YEAR_3_SALARY_DEMAND = Math.round(YEAR_3_SALARY * bargain / 1000) * 1000;
			YEAR_4_SALARY_DEMAND = Math.round(YEAR_4_SALARY * bargain / 1000) * 1000;
			YEAR_5_SALARY_DEMAND = Math.round(YEAR_5_SALARY * bargain / 1000) * 1000;
			YEAR_6_SALARY_DEMAND = Math.round(YEAR_6_SALARY * bargain / 1000) * 1000;
			YEAR_7_SALARY_DEMAND = Math.round(YEAR_7_SALARY * bargain / 1000) * 1000;
			YEAR_8_SALARY_DEMAND = Math.round(YEAR_8_SALARY * bargain / 1000) * 1000;
			YEAR_9_SALARY_DEMAND = Math.round(YEAR_9_SALARY * bargain / 1000) * 1000;
			YEAR_10_SALARY_DEMAND = Math.round(YEAR_10_SALARY * bargain / 1000) * 1000;
		  	$(".YearTxt").html(10);
			ODDS = ODDS + 45;
			document.contract_form.contract.value=10;
		}
		if(YEAR_1_SALARY_DEMAND < MinimumPlayerSalary && YEAR_1_SALARY_DEMAND != 0){ YEAR_1_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_2_SALARY_DEMAND < MinimumPlayerSalary && YEAR_2_SALARY_DEMAND != 0){ YEAR_2_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_3_SALARY_DEMAND < MinimumPlayerSalary && YEAR_3_SALARY_DEMAND != 0){ YEAR_3_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_4_SALARY_DEMAND < MinimumPlayerSalary && YEAR_4_SALARY_DEMAND != 0){ YEAR_4_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_5_SALARY_DEMAND < MinimumPlayerSalary && YEAR_5_SALARY_DEMAND != 0){ YEAR_5_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_6_SALARY_DEMAND < MinimumPlayerSalary && YEAR_6_SALARY_DEMAND != 0){ YEAR_6_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_7_SALARY_DEMAND < MinimumPlayerSalary && YEAR_7_SALARY_DEMAND != 0){ YEAR_7_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_8_SALARY_DEMAND < MinimumPlayerSalary && YEAR_8_SALARY_DEMAND != 0){ YEAR_8_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_9_SALARY_DEMAND < MinimumPlayerSalary && YEAR_9_SALARY_DEMAND != 0){ YEAR_9_SALARY_DEMAND = MinimumPlayerSalary;}
		if(YEAR_10_SALARY_DEMAND < MinimumPlayerSalary && YEAR_10_SALARY_DEMAND != 0){ YEAR_10_SALARY_DEMAND = MinimumPlayerSalary;}
		TOTAL_SALARY = YEAR_1_SALARY_DEMAND + YEAR_2_SALARY_DEMAND + YEAR_3_SALARY_DEMAND + YEAR_4_SALARY_DEMAND + YEAR_5_SALARY_DEMAND + YEAR_6_SALARY_DEMAND + YEAR_7_SALARY_DEMAND + YEAR_8_SALARY_DEMAND + YEAR_9_SALARY_DEMAND + YEAR_10_SALARY_DEMAND;
		
		if(YEAR_1_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_1_SALARY_DEMAND - MaximumPlayerSalary; YEAR_1_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_2_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_2_SALARY_DEMAND - MaximumPlayerSalary; YEAR_2_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_3_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_3_SALARY_DEMAND - MaximumPlayerSalary; YEAR_3_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_4_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_4_SALARY_DEMAND - MaximumPlayerSalary; YEAR_4_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_5_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_5_SALARY_DEMAND - MaximumPlayerSalary; YEAR_5_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_6_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_6_SALARY_DEMAND - MaximumPlayerSalary; YEAR_6_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_7_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_7_SALARY_DEMAND - MaximumPlayerSalary; YEAR_7_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_8_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_8_SALARY_DEMAND - MaximumPlayerSalary; YEAR_8_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_9_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_9_SALARY_DEMAND - MaximumPlayerSalary; YEAR_9_SALARY_DEMAND = MaximumPlayerSalary;}
		if(YEAR_10_SALARY_DEMAND > MaximumPlayerSalary){ ExtraBonus = ExtraBonus + YEAR_10_SALARY_DEMAND - MaximumPlayerSalary; YEAR_10_SALARY_DEMAND = MaximumPlayerSalary;}
		
		$("#ContractDetails").html(YEAR_1 + " = $" + formatCurrency(YEAR_1_SALARY_DEMAND) + "<br />");
		if(YEAR_2_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_2 + " = $" + formatCurrency(YEAR_2_SALARY_DEMAND) + "<br />");}
		if(YEAR_3_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_3 + " = $" + formatCurrency(YEAR_3_SALARY_DEMAND) + "<br />");}
		if(YEAR_4_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_4 + " = $" + formatCurrency(YEAR_4_SALARY_DEMAND) + "<br />");}
		if(YEAR_5_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_5 + " = $" + formatCurrency(YEAR_5_SALARY_DEMAND) + "<br />");}
		if(YEAR_6_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_6 + " = $" + formatCurrency(YEAR_6_SALARY_DEMAND) + "<br />");}
		if(YEAR_7_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_7 + " = $" + formatCurrency(YEAR_7_SALARY_DEMAND) + "<br />");}
		if(YEAR_8_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_8 + " = $" + formatCurrency(YEAR_8_SALARY_DEMAND) + "<br />");}
		if(YEAR_9_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_9 + " = $" + formatCurrency(YEAR_9_SALARY_DEMAND) + "<br />");}
		if(YEAR_10_SALARY_DEMAND > 0){ $("#ContractDetails").append(YEAR_10 + " = $" + formatCurrency(YEAR_10_SALARY_DEMAND) + "<br />");}
		document.contract_form.YearSalary1.value=YEAR_1_SALARY_DEMAND;
		document.contract_form.YearSalary2.value=YEAR_2_SALARY_DEMAND;
		document.contract_form.YearSalary3.value=YEAR_3_SALARY_DEMAND;
		document.contract_form.YearSalary4.value=YEAR_4_SALARY_DEMAND;
		document.contract_form.YearSalary5.value=YEAR_5_SALARY_DEMAND;
		document.contract_form.YearSalary6.value=YEAR_6_SALARY_DEMAND;
		document.contract_form.YearSalary7.value=YEAR_7_SALARY_DEMAND;
		document.contract_form.YearSalary8.value=YEAR_8_SALARY_DEMAND;
		document.contract_form.YearSalary9.value=YEAR_9_SALARY_DEMAND;
		document.contract_form.YearSalary10.value=YEAR_10_SALARY_DEMAND;
		document.contract_form.bonus.value=0;
		document.contract_form.bonusfin.value=0;
		if ($('#bonus').is(':checked')) { 
		  	$("#ContractDetails").append("Signing Bonus = $" + formatCurrency((TOTAL_SALARY * .1) + ExtraBonus) + "<br />");
			document.contract_form.bonusfin.value=(TOTAL_SALARY * .1) + ExtraBonus;
			$('#BonusText').show();	
			$('#BonusText').html('<?php echo $SummaryText3;?>');
			$(".BonusTxt").html(formatCurrency(TOTAL_SALARY * .1) + ExtraBonus);
			ODDS = ODDS + 5;
		 	TOTAL_SALARY = TOTAL_SALARY + (TOTAL_SALARY * .1) + ExtraBonus;
		} else {
			if(ExtraBonus > 0) {
				$("#ContractDetails").append("Signing Bonus = $" + formatCurrency(ExtraBonus) + "<br />");
				document.contract_form.bonusfin.value=ExtraBonus;
				$('#BonusText').show();	
				$('#BonusText').html('<?php echo $SummaryText3;?>');
				$(".BonusTxt").html(formatCurrency(ExtraBonus));
				TOTAL_SALARY = TOTAL_SALARY + ExtraBonus;
			} else {
				$('#BonusText').hide();	
				document.contract_form.bonusfin.value=0;
				$('#BonusText').empty();
			}
		}
		if(currentNoTrade == 1){
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_NO_TRADE'];?>;
			$('#NoTrade').show();
			$('#NoTrade').html('<?php echo $l_NoTradeCopy;?>');
			document.contract_form.notradefin.value=1;
		} else {
			$('#NoTrade').hide();
			document.contract_form.notradefin.value=0;
			$('#NoTrade').empty();
		}
		if(MORALE < 25){
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_MORALE_LOW'];?>;
		} else if(MORALE > 75){
			ODDS = ODDS + <?php echo $row_GetWebInfo['AI_MORALE_HIGH'];?>;
		}
		
		if(AGE < UFA) {
			if(AGE + parseInt($('#yearsoff').val()) >= UFA ){
				$YearsOverUFA = ((parseInt(AGE)+ parseInt($('#yearsoff').val())) - parseInt(UFA));
				ODDS = ODDS - <?php echo $row_GetWebInfo['AI_RFA_TO_UFA'];?> - <?php echo $row_GetWebInfo['AI_RFA_BASE'] - $row_GetWebInfo['AI_UFA_BASE'];?>;
				$('#UFAText').show();	
			} else {
				$('#UFAText').hide();	
			}
		}
		
		if(TOTAL_SALARY < expectedTotal){
			ODDS = ODDS - <?php echo $row_GetWebInfo['AI_LOW_EXPECTATIONS'];?>;
			$('#ExpectedText').show();	
		} else {	
			$('#ExpectedText').hide();
		}
		
		$(".YourTotalSalaryTxt").html(formatCurrency(TOTAL_SALARY ));
		$(".YourYearlySalaryTxt").html(formatCurrency(TOTAL_SALARY/document.contract_form.contract.value));
		$(".RemainingCap").html(formatCurrency(salaryCapRemaining - YEAR_1_SALARY_DEMAND));
		
		if(ODDS > 95){ ODDS = 95; }
		if(ODDS < 5){ ODDS = 0; }
		document.contract_form.totalsalary.value=TOTAL_SALARY;
		document.contract_form.odds.value=ODDS;
		$("#ContractDetails").append("<?php echo $l_totalContract;?> = $" + formatCurrency(TOTAL_SALARY) + "<br />");
		$("#yourOdds").html(ODDS + "<span style='font-size:16px;'>%</sup>");
		document.contract_form.contractsummary.value=$("#contractSummary").html();
		
		if(salaryCapRemaining - YEAR_1_SALARY_DEMAND < 0){
			if(YEAR_1_SALARY_DEMAND > <?php echo $WaiverSalaryExemption;?>){
				$("#buttonEmail").hide();
				$('#ownerApproval').html('<?php echo $SummaryText5;?>');
				$('#ownerApproval').css({"background-color":"red","color":"white"});
			} else {
				$("#buttonEmail").show();	
				$('#ownerApproval').html('<?php echo $SummaryText4;?>')
				$('#ownerApproval').css({"background-color":"white","color":"black"});
			}
		} else {
			$("#buttonEmail").show();	
			$('#ownerApproval').html('<?php echo $SummaryText4;?>');
			$('#ownerApproval').css({"background-color":"white","color":"black"});
		}
		
		if(ODDS == 0){ $("#buttonEmail").hide(); }
	}
	

  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
		

});;

function roundTo(number, to) {
    return Math.round(number * to) / to;
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
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
.fieldsetleft {float:left; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:350px; }
.fieldsetright {float:right; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:350px;}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
<tr>
<td id="PlayerProfile" style="background-color:#ededed; padding:6px; width:120px;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td><img src="<?php echo  imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
    </tr>
    </table>
</td>
<td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px;vertical-align:top;">
    
    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
    <tr>
        <td colspan="3" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $l_OfferContract." : ".$row_GetPlayer['Name']; ?></strong>
        <div style="width:50px; float:right"><?php echo checkUFA($row_GetPlayer['Age'], $row_GetPlayer['Salary1'],0,0,1,$row_GetPlayer['AgeDate']);?></div></td>
    </tr>
    <tr>
    	<td width="25%"><?php echo $l_CurrentSalary;?>: <strong>$<?php echo number_format($row_GetPlayer['Salary1'],0); ?></strong></td>
        <td width="15%"><?php echo $l_Age;?>: <strong><?php 
						if($row_GetPlayer['Retired']==0){
							$playerAge = getAge($row_GetPlayer['AgeDate']);
						} else {
							$playerAge = getAge($row_GetPlayer['Age']);
						}	
						echo $playerAge;
						?></strong></td>
        <td width="60%" align="right"><?php echo $l_MO_D ;?> : <strong><?php echo $row_GetPlayer['MO'];?></strong>
        </td>
    </tr>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
    <tr>
    	<td width="25%">
          <?php echo $l_SalaryCap;?>: <strong>$<?php echo number_format($SalaryCap,0);?></strong>
        </td>
        <td><?php echo $l_NextSeason;?>: <strong>$<?php echo number_format($CurrentPayroll, 0); ?></strong></td>
        <td align="right"><?php echo $l_AvailableFunds;?>: <strong>$<?php echo number_format($SalaryCap - $CurrentPayroll,0);?></strong></td>
     </tr>
    </table>
    <h3 style="margin-top:14px;"><?php echo $l_PlayerRatings;?></h3>
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
                <th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
                <th><a title="<?php echo $l_overall;?>"><?php echo $l_overall;?></a></th>
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
                <td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PO']; ?></td>
                <td align="center" style="font-size:1.4em;"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetPlayer['Overall'];} else { echo 0;} ?></td>
            </tr>
            </tbody>
            </table>
         <?php } ?>
</td>
</tr>
</table>
<br /><br />
<?php 
if(isset($_SESSION['U_ID'])){
	if($_SESSION['U_ID']==$row_GetPlayer['Team'] || $_SESSION['U_Admin']==1){
?>
<form method="post" name="contract_form" id="contract_form" action="getContractExtDetails.php">
<div id="loader">
<?php if($RemainingOffers > 0 && $ExtensionAttempts < 3 && $ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){ ?>
	<div id="tabs" class="fieldsetleft">
 	<h3 style="border-bottom-width:1px; border-bottom-style:dotted; border-bottom-color:#999; padding-bottom:5px; margin-bottom:10px;"><?php echo $ContractOptions;?></h3>
		<div class="rowElem">
        <label><?php echo $l_CONTRACTLENGTH ;?>:</label>
        <select id="yearsoff" size=1  name=yearsoff>
        <?php 
		if($expectedYears==4 && $row_GetPlayer['Age'] > 36){
			$agemod=4;
		} else if($expectedYears==3 && $row_GetPlayer['Age'] > 36){
			$agemod=1;
		} else if($expectedYears==2 && $row_GetPlayer['Age'] > 36){
			$agemod=2;
		} else {
			$agemod=0;
		}
		for ( $counter = 1; $counter <= ($row_GetWebInfo['MaxContract'] - $agemod); $counter += 1) {
			if($counter == 1){
				$tmpSelected = 'selected="selected"';
			} else {
				$tmpSelected = '';
			}
			echo '<option value="'.$counter.'" '.$tmpSelected.'>'.$counter.' '.$l_Year.'</option>';
		}
		?>
          </select>
        </div>
        
        <div class="rowElem">
        <label><?php echo $l_SalaryDistribution;?>:</label>
        <input name="distribute" type="radio" value="0" checked="checked" ><span style="margin-top:10px;"><?php echo $l_Even;?></span> <input name="distribute" type="radio" value="1"><span style="margin-top:10px;"><?php echo $l_FrontLoad;?></span>
		</div>
        
        <div class="rowElem">
        <label><?php echo $l_NoTrade;?>:</label>
        <input name="notrade" type="radio" value="0" checked="checked" ><span style="margin-top:10px;"><?php echo $l_NoneTxt;?></span> <input name="notrade" type="radio" value="1"><span style="margin-top:10px;"><?php echo $l_IncludeText;?></span>
       	</div>

        
        <div class="rowElem">
        <label><?php echo $l_SigningBonus;?>:</label>
        <input id="bonus" name="bonus" type="checkbox"><span><?php echo $l_SigningBonusDetails;?></span>
       	</div>
        
        <div class="rowElem" style="padding-bottom:10px;">
        <label><?php echo $l_AgentBargain;?>:</label>
        <select id="bargain" size=1  name="bargain">
        <option value="1" selected="selected">100% <?php echo $AgentAskingPrice;?>.</option>
        <option value="2">90% <?php echo $AgentAskingPrice;?>.</option>
        <option value="3">80% <?php echo $AgentAskingPrice;?>.</option>
        <option value="4">70% <?php echo $AgentAskingPrice;?>.</option>
        <option value="5">60% <?php echo $AgentAskingPrice;?>.</option>
        <option value="6">50% <?php echo $AgentAskingPrice;?>.</option>
        <option value="7">110% <?php echo $AgentAskingPrice;?>.</option>
        <option value="8">120% <?php echo $AgentAskingPrice;?>.</option>
        <option value="9">130% <?php echo $AgentAskingPrice;?>.</option>
        <option value="10">140% <?php echo $AgentAskingPrice;?>.</option>
        <option value="11">150% <?php echo $AgentAskingPrice;?>.</option>
        </select>
        </div>
        

        
 		<div class="rowElem">
        <label><?php echo $ContractDetails;?>:</label>
        <div style="border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; float:right; border-style:dashed; border-color:#999; background-color:#CCC; font-weight:bold; text-align:center; display:table-cell; vertical-align:middle; font-size:36px; padding:10px 5px 10px 5px; margin-top:10px;"><div style="font-size:8px;"><?php echo $l_resignOdds;?></div><span id="yourOdds"><?php echo $odds;?><span style="font-size:16px;">%</sup></span></div>
        <div id="ContractDetails"></div>
        </div>
        
        <br /><br  clear="all" />
        <div align="center">
        
        <input type="submit" value="<?php echo $l_sendOffer;?>" id="buttonEmail" class="button email" >
        </div>
        
		<div style="display:block; font-size:11px; padding:10px; margin-top:10px;" id="ownerApproval"></div>
	</div>
	
    <div id="tabs2" class="fieldsetright">
    	<h3 style="border-bottom-width:1px; border-bottom-style:dotted; border-bottom-color:#999; padding-bottom:5px; margin-bottom:10px;"><?php echo $l_summary;?></h3>
        <?php 
		$tmpTxtItems = array("%item1", "%item2", "%item3");
		$updatedTxtItems = array($expectedYears, number_format($expectedTotal,0), number_format($expectedSalary,0));
		$SummaryText1 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText1);
		echo "<p>".$SummaryText1."</p>";
		echo '<div id="contractSummary">';
		$tmpTxtItems = array("%item1", "%item2", "%item3", "%item4");
		$updatedTxtItems = array($row_GetPlayer['Age'], $PlayerPos, number_format($TOTAL_SALARY,0), number_format($YEAR_1_SALARY,0));
		$SummaryText2 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText2);
		echo "<p>".$SummaryText2."</p>";
		
		echo '<span id="BonusText">'.$SummaryText3.' </span> ';
		echo '<span id="NoTrade">'.$l_NoTradeCopy.'<br /></span>';
		echo "</div>";
		?>
        <br>
        <div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px;">
      	<h3><?php echo $AgentFeedback;?></h3>
        	<div style="float:right; display:block; text-align:center; font-size:9px">
            	<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
            </div>
   			<ul>
            <?php 
			$tmpTxtItems = array("%item1","%item2");
			$updatedTxtItems = array($ExtensionAttempts, $RemainingOffers);
			$ExtensionAttemptsText = str_replace($tmpTxtItems, $updatedTxtItems, $ExtensionAttemptsText);
			?>
            <li style='font-size:12px;'><?php echo $ExtensionAttemptsText;?></li>
			<?php
			if ($row_GetPlayer['MO'] < 25 ){
				echo "<li style='color:red; font-size:12px;'>".$clientMoraleLow."</li>";
			} else if ($row_GetPlayer['MO'] > 75){
				echo "<li style='color:green; font-size:12px;'>".$clientMoraleHight."</li>";				
			} else {
				echo "<li style='font-size:12px;'>".$clientMoraleMed."</li>";				
			}
			$tmpTxtItems = array("%item1");
			$updatedTxtItems = array(number_format($expectedTotal,0));
			$ExpectedSalary = str_replace($tmpTxtItems, $updatedTxtItems, $ExpectedSalary);
			?>
            <li style='color:red; font-size:12px;' id="ExpectedText"><?php echo $ExpectedSalary;?></li>
            <li style='color:red; font-size:12px;' id="UFAText"><?php echo $ufaElegable;?></li>
			<?php 
			if(checkPlayersFuture($row_GetPlayer['Team'], $row_GetPlayer['Position'], $row_GetPlayer['Overall'], $connection) == 1){
				$tmpTxtItems = array("%item1");
				$updatedTxtItems = array($row_GetPlayer['Name']);
				$clientConcerned = str_replace($tmpTxtItems, $updatedTxtItems, $clientConcerned);
				echo "<li style='color:red; font-size:12px;'>".$clientConcerned."</li>";
			}
			?>
            </ul>
            <br clear="all" />
            </div>
	</div>
<input id="player" name="player" type="hidden" value="<?php echo $row_GetPlayer['Number']; ?>">
<input id="position" name="position" type="hidden" value="<?php echo $row_GetPlayer['Position']; ?>">
<input id="type" name="type" type="hidden" value="<?php echo $GetType; ?>">
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
<input type="hidden" name="contract" value="1"> 
<input type="hidden" name="bonusfin" value="0">
<input type="hidden" name="notradefin" value="0">
<input type="hidden" name="totalsalary" value="<?php echo $MinimumPlayerSalary; ?>">
<input type="hidden" name="odds" value="<?php echo $odds; ?>" />
<input type="hidden" name="contractsummary" value="" />
<input type="hidden" name="ExtensionAttempts" value="<?php echo $ExtensionAttempts;?>" />

<?php } else if($totalRows_GetContractExt==1) {?>
<div align="center">
<div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px; width:400px; text-align:left;">
<div style="float:right; display:block; text-align:center; font-size:9px">
<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
</div>
<h3><?php echo $AgentFeedback;?></h3>
<br />
<p><?php echo $AlreadySigned;?></p>
<br clear="all" />
</div>
</div>
<?php } else if($ExtensionLastDate == strftime('%Y-%m-%d', strtotime('now'))) {?>
<div align="center">
<div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px; width:400px; text-align:left;">
<div style="float:right; display:block; text-align:center; font-size:9px">
<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
</div>
<h3><?php echo $AgentFeedback;?></h3>
<br />
<p><?php echo $AlreadySentOffer;?></p>
<br clear="all" />
</div>
</div>
<?php } else {?>
<div align="center">
<div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px; width:400px; text-align:left;">
<div style="float:right; display:block; text-align:center; font-size:9px">
<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
</div>
<h3><?php echo $AgentFeedback;?></h3>
<br />
<p><?php 
$tmpTxtItems = array("%item1","%item2");
$updatedTxtItems = array($ExtensionAttempts, $RemainingOffers);
$ExtensionAttemptsText = str_replace($tmpTxtItems, $updatedTxtItems, $ExtensionAttemptsText);
echo $ExtensionAttemptsText;?></p>
<br clear="all" />
</div>
</div>
<?php } ?>
</div>
</form>
<br clear="all" />
<?php 
} else {
?>
<div align="center">
<div style="display:block; padding:5px 10px 5px 10px; border-style:solid; border-color:#999; border-width:1px; width:400px; text-align:left;">
<div style="float:right; display:block; text-align:center; font-size:9px">
<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
</div>
<h3><?php echo $AgentFeedback;?></h3>
<br />
<p><?php echo $NoRightsToPlayer;?></p>
<br clear="all" />
</div>
</div>
<?php
	}	
}	 
?>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>
