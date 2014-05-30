<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_OfferTitle = "Edit Offer Sheet";
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
	$l_NextSeason = "Current Payroll";
	$l_AvailableFunds = "Available Funds For Payroll";
	$l_CurrentSalary = "Requested Contract";
	$ContractDetails = "Contract Details";
	$ContractOptions = "Contract Options";
	$AgentAskingPrice = "of agents asking price";
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
	$SummaryText1 = 'The player feels that his market value would at least warrant a <strong><span class="YearTxt1">%item1</span>-year</strong> contract worth a total of <strong>$<span class="TotalSalaryTxt">%item2</span></strong>, which equals <strong>$<span class="YearlySalaryTxt">%item3</span></strong> per season.';
	$SummaryText2 = 'You are offering <strong>%item1-year</strong> old %item2 the following contract: The contract runs over <strong><span class="YearTxt">1</span></strong>&nbsp;guaranteed years. The total guaranteed value of the contract is <strong>$<span class="YourTotalSalaryTxt">%item3</span></strong>, which equals an average value of <strong>$<span class="YourYearlySalaryTxt">%item4</span></strong> per season.';
	$SummaryText3 = 'Included in this contract is a <strong>$<span class="BonusTxt">0</span></strong> signing bonus that will count against the salary cap.';
	$SummaryText4 = 'You have <strong>$<span class="RemainingCap">%item1</span></strong> left for player contracts this season. You have <strong>$<span class="RemainingCap">%item2</span></strong> currently sent out it offers.<br><br>You have <strong>$<span class="RemainingCap">%item3</span></strong> remaining. The owner has given approval of this deal, so you may submit the offer to the player.';
	$SummaryText5 = 'You have <strong>$<span class="RemainingCap">%item1</span></strong> left for player contracts this season. You have <strong>$<span class="RemainingCap">%item2</span></strong> currently sent out it offers.<br><br>You have <strong>$<span class="RemainingCap">%item3</span></strong> remaining.The owner will not approve this deal until you free up some salary cap. room.';
	$l_resignOdds = "RESIGNING ODDS";
	$l_sendOffer = "Send Offer";
	$l_totalContract = "Total Contract";
	$l_summary = "SUMMARY";
	$l_NoTradeCopy = "In addition, you are giving him a <strong>no trade</strong> clause with his contract.";
	$AverageSalaryHigh = "<span style=\"color:green\">Your current offer sheet is <strong>higher</strong> than what the average offer sheet that we have recieved from other general managers.</span>";
	$AverageSalaryLow = "<span style=\"color:red\">Your current offer sheet is <strong>lower</strong> than what the average offer sheet that we have recieved from other general managers.</span>";
	$AverageSalaryAvg = "Your current offer sheet is <strong>about the same</strong> as the average offer sheet that we have recieved from other general managers.";
	$l_comp1 = "None";
	$l_comp2 = "Third-round choice";
	$l_comp3 = "Second-round choice";
	$l_comp4 = "First-round and third-round choice";
	$l_comp5 = "First-round, second-round and third-round choice";
	$l_comp6 = "Two first-round choices, one second and one third round choices";
	$l_comp7 = "Four 1st round picks";
	$l_CompNote = "The team offering the compensation must have their picks available prior for the deal to go through.  The team owning the players rights will have up to 7 days to match the offer or they can choose to receive the compensation.";
	$l_CompNote2 = "If your team does not have the compensation prior to this offer, then the offer will become void.";
	$l_NewSalary = "New Salary (Per Season)";
	$l_Compensation = '<strong><span class="CompensationTxt"></span></strong> will be sent as compensation.';
	$l_CurrentOffers = "Current Offers";
	break; 

case 'fr': 
	$l_OfferTitle = "&Eacute;ditez l'offre";
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
	$l_CurrentSalary = "Contrat demandé";
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
	$SummaryText4 = 'Vous avez <strong>$<span class="RemainingCap">%item1</span></strong> la gauche pour le joueur contracte la saison prochaine.  You have <strong>$<span class="RemainingCap">%item2</span></strong> currently sent out it offers.<br><br>You have <strong>$<span class="RemainingCap">%item3</span></strong> remaining. <span style="color:green;">Le propri&eacute;taire a donn&eacute; l\'approbation de cette affaire, ainsi vous pouvez soumettre l\'offre au joueur.</span>';
	$SummaryText5 = 'Vous avez <strong>$<span class="RemainingCap">%item1</span></strong> la gauche pour le joueur contracte la saison prochaine.  You have <strong>$<span class="RemainingCap">%item2</span></strong> currently sent out it offers.<br><br>You have <strong>$<span class="RemainingCap">%item3</span></strong> remaining. Le propri&eacute;taire n\'approuvera pas cette affaire jusqu\'&agrave; ce que vous lib&eacute;riez vers le haut une certaine pi&egrave;ce de limite de salaire.';
	$l_resignOdds = "Chance de prolongation";
	$l_sendOffer = "Envoyez l'offre";
	$l_totalContract = "Contrat total";
	$l_summary = "R&eacute;sum&eacute;";
	$l_NoTradeCopy = "En outre, vous lui avez donn&eacute; une <strong>clause du commerce de non</strong> avec son contrat.";
	$AverageSalaryHigh = "<span style=\"color:green\">Your current offer sheet is <strong>higher</strong> than what the average offer sheet that we have recieved from other general managers.</span>";
	$AverageSalaryLow = "<span style=\"color:red\">Your current offer sheet is <strong>lower</strong> than what the average offer sheet that we have recieved from other general managers.</span>";
	$AverageSalaryAvg = "Your current offer sheet is <strong>about the same</strong> as the average offer sheet that we have recieved from other general managers.";
	$l_comp1 = "Aucun";
	$l_comp2 = "Choix Troisi&egrave;me rond";
	$l_comp3 = "Choix secondaire";
	$l_comp4 = "Premier round et choix troisi&egrave;me rond";
	$l_comp5 = "Choix de premier rond, secondaire et troisi&egrave;me rond";
	$l_comp6 = "Deux choix de premier round, une seconde et un tiers de choix ronds";
	$l_comp7 = "Quatre premier s&eacute;lections de rond";
	$l_CompNote = "L'&eacute;quipe offrant la compensation doit avoir leurs s&eacute;lections disponibles ant&eacute;rieurement pour que l'affaire intervienne. L'&eacute;quipe poss&eacute;dant les droits de joueurs aura jusqu'&agrave;  7 jours pour assortir l'offre ou ils peuvent choisir de recevoir la compensation.";
	$l_CompNote2 = "Si votre &eacute;quipe n'a pas la compensation avant cette offre, alors l'offre deviendra vide.";
	$l_NewSalary = "Nouveau salaire (par saison)";
	$l_Compensation = '<strong><span class="CompensationTxt"></span></strong> will be sent as compensation.';
	$l_CurrentOffers = "Current Offers";
	break;
} 


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_edit"])) && ($_POST["MM_edit"] == "form")) {
	$tmpNoTradeSalary = 0;
	if($_POST['notrade'] == 1){$tmpNoTradeSalary = $_POST['newsal'];}
	
	$insertSQL = sprintf("UPDATE playerscontractoffers set Contract=%s,Salary1=%s,Salary2=%s,Salary3=%s,Salary4=%s,Salary5=%s,Salary6=%s,Salary7=%s,Salary8=%s,Salary9=%s,Salary10=%s, NoTrade=%s, Bonus=%s, NoTradeSalary=%s, ContractType=%s, Compensation=%s WHERE PR_ID=%s",
            GetSQLValueString($_POST['contract'], "double"),
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
			GetSQLValueString($_POST['notradefin'], "text"),
			GetSQLValueString($_POST['bonusfin'], "int"),
			GetSQLValueString($_POST['bargain'], "int"),
			GetSQLValueString($_POST['distribute'], "int"),
			GetSQLValueString($_POST['Compensation'], "text"),
			GetSQLValueString($_POST['id'], "int"));
  			$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
 
	$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	    $updateGoTo = $_POST['location'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}


$PID_GetPlayer = "82";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetType = "player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}
$GetTarget = "1";
if (isset($_GET['target'])) {
  $GetTarget = (get_magic_quotes_gpc()) ? $_GET['target'] : addslashes($_GET['target']);
}
if($GetTarget == 1){
	$tmpLocation = "rfa-free-agents_w_offer.php";
} else if($GetTarget == 2){
	$tmpLocation = "rfa-free-agents_decide.php";
} 
$Contract_ID = "0";
if (isset($_GET['id'])) {
  $Contract_ID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$Contract_Step = "0";
if (isset($_GET['contract'])) {
  $Contract_Step = (get_magic_quotes_gpc()) ? $_GET['contract'] : addslashes($_GET['contract']);
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
	$query_GetPlayer = sprintf("SELECT P.*, '5' as Position FROM goalies as P WHERE P.Number=%s", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
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
	$INCREMENT=0.075;
	
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
	$query_GetPlayer = sprintf("SELECT P.* FROM players as P WHERE P.Number=%s", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
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
	$INCREMENT=0.12;
	
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

$CurrentPayroll = getTeamPayroll($_SESSION['U_ID'],1, $connection, $WaiverSalaryExemption);
$CurrentOffers = getTeamOffers($_SESSION['U_ID'],$connection, $WaiverSalaryExemption);

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


if($OverallRate > 70 && $row_GetPlayer['Age'] < 36 && $row_GetPlayer['Age'] >= $UFA){
	$expectedYears = 4;
	$expectedTotal = $YEAR_4_SALARY * 4;
	$expectedSalary = $YEAR_4_SALARY;
} else if($OverallRate > 70 && $row_GetPlayer['Age'] > 39){
	$expectedYears = 1;
	$expectedTotal = $YEAR_1_SALARY;
	$expectedSalary = $YEAR_1_SALARY;
} else if($OverallRate > 70 && $row_GetPlayer['Age'] > 35){
	$expectedYears = 2;
	$expectedTotal = $YEAR_2_SALARY * 2;
	$expectedSalary = $YEAR_2_SALARY * 2;
} else if($OverallRate < 60){
	$expectedYears = 1;
	$expectedTotal = $YEAR_1_SALARY;
	$expectedSalary = $YEAR_1_SALARY;
} else if($OverallRate > 70 && $row_GetPlayer['Age'] < $UFA){
	$expectedYears = 4;
	$expectedTotal = $YEAR_4_SALARY;
	$expectedSalary = $YEAR_4_SALARY;
	if($row_GetPlayer['Age'] + 4 >= $UFA){
		$expectedYears = 3 - (($row_GetPlayer['Age']+4) - $UFA);
	}
	if($expectedYears == 1 || $expectedYears == 0){
		$expectedYears = 1;
		$expectedTotal = $YEAR_1_SALARY;
		$expectedSalary = $YEAR_1_SALARY;
	} else if($expectedYears == 2){
		$expectedTotal = $YEAR_2_SALARY;
		$expectedSalary = $YEAR_2_SALARY;
	} else {
		$expectedTotal = $YEAR_3_SALARY;
		$expectedSalary = $YEAR_3_SALARY;
	} 
	
} else {
	$expectedYears = 2;
	$expectedTotal = $YEAR_2_SALARY * 2;
	$expectedSalary = $YEAR_2_SALARY;
}

$GetContract = mysql_query("SELECT * FROM playerscontractoffers WHERE PR_ID=".$Contract_ID, $connection) or die(mysql_error());
$row_GetContract = mysql_fetch_assoc($GetContract);

$tmpTxtItems = array("%item1","%item2","%item3");
$updatedTxtItems = array(number_format($SalaryCap - $CurrentPayroll,0), number_format($CurrentOffers + $row_GetContract['Salary1'],0), number_format($SalaryCap - $CurrentPayroll - $CurrentOffers + $row_GetContract['Salary1'],0));
$SummaryText4 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText4);

$tmpTxtItems = array("%item1","%item2","%item3");
$updatedTxtItems = array(number_format($SalaryCap - $CurrentPayroll,0), number_format($CurrentOffers + $row_GetContract['Salary1'],0), number_format($SalaryCap - $CurrentPayroll - $CurrentOffers + $row_GetContract['Salary1'],0));
$SummaryText5 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText5);

$query_GetAvgSalary = sprintf("SELECT AVG(Salary1 + Salary2 + Salary3 + Salary4 + Salary5 + Salary6 + Salary7 + Salary8 + Salary9 + Salary10 + bonus) as Salary FROM playerscontractoffers WHERE Player='%s'", $row_GetPlayer['Number']);
$GetAvgSalary = mysql_query($query_GetAvgSalary, $connection) or die(mysql_error());
$row_GetAvgSalary = mysql_fetch_assoc($GetAvgSalary);
$totalRows_GetAvgSalary = mysql_num_rows($GetAvgSalary);
if($totalRows_GetAvgSalary == 0 || $row_GetAvgSalary['Salary'] == ""){
	$GetAvgSalary = 0;
} else {
	$GetAvgSalary = $row_GetAvgSalary['Salary'];
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_OfferTitle; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
var AVERAGEOFFER = <?php echo $GetAvgSalary;?>;
var currentDistribute = 0;
var currentNoTrade = 0;
var bargain = 1;
var salaryCapRemaining = <?php echo (($SalaryCap * 1.05) - $CurrentPayroll - $CurrentOffers + $row_GetContract['Salary1']); ?>;
var expectedTotal = <?php echo $expectedTotal;?>;
var MinimumPlayerSalary = <?php echo $MinimumPlayerSalary;?>;
$('#UFAText').hide();
$('#NoTrade').hide();
$('#ExpectedText').hide();	
$('#BonusText').hide();	
resetSalary();
updateOffer();

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
		    
		if($('input[name=distribute]:radio:checked').val() == 1) {
	  		distributeSalary();
			currentDistribute = 1;
		} else {
			currentDistribute = 0;;
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
		
		if($('#bargain').val() == 6){
			bargain = 1.0;
		} else if($('#bargain').val() == 5){
			bargain = 0.9;
		} else if($('#bargain').val() == 4){
			bargain = 0.8;
		} else if($('#bargain').val() == 3){
			bargain = 0.7;
		} else if($('#bargain').val() == 2){
			bargain = 0.6;
		} else if($('#bargain').val() == 1){
			bargain = 0.5;
		} else if($('#bargain').val() == 7){
			bargain = 1.1;
		} else if($('#bargain').val() == 8){
			bargain = 1.2;
		} else if($('#bargain').val() == 9){
			bargain = 1.3;
		} else if($('#bargain').val() == 10){
			bargain = 1.4;
		} else if($('#bargain').val() == 11){
			bargain = 1.5;
		} else if($('#bargain').val() == 12){
			bargain = 1.75;
		} else if($('#bargain').val() == 13){
			bargain = 2;
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
		  	$("#ContractDetails").append("Signing Bonus = $" + formatCurrency(TOTAL_SALARY * .1) + "<br />");
			document.contract_form.bonusfin.value=(TOTAL_SALARY * .1);
			$('#BonusText').show();	
			$('#BonusText').html('<?php echo $SummaryText3;?>');
			$(".BonusTxt").html(formatCurrency(TOTAL_SALARY * .1));
		 	TOTAL_SALARY = TOTAL_SALARY + (TOTAL_SALARY * .1);
		} else {
			$('#BonusText').hide();	
			document.contract_form.bonusfin.value=0;
			$('#BonusText').empty();
		}
		if(currentNoTrade == 1){
			$('#NoTrade').show();
			$('#NoTrade').html('<?php echo $l_NoTradeCopy;?>');
			document.contract_form.notradefin.value=1;
		} else {
			$('#NoTrade').hide();
			document.contract_form.notradefin.value=0;
			$('#NoTrade').empty();
		}
		
		if(TOTAL_SALARY < expectedTotal){
			$('#ExpectedText').show();	
		} else {	
			$('#ExpectedText').hide();
		}
		
		$(".YourTotalSalaryTxt").html(formatCurrency(TOTAL_SALARY ));
		$(".YourYearlySalaryTxt").html(formatCurrency(TOTAL_SALARY/document.contract_form.contract.value));
		$(".RemainingCap").html(formatCurrency(salaryCapRemaining - YEAR_1_SALARY_DEMAND));
		
		
		document.contract_form.totalsalary.value=TOTAL_SALARY;
		$("#ContractDetails").append("<?php echo $l_totalContract;?> = $" + formatCurrency(TOTAL_SALARY) + "<br />");
		document.contract_form.contractsummary.value=$("#contractSummary").html();
		
		if((AVERAGEOFFER + (AVERAGEOFFER * 0.02)) < TOTAL_SALARY){
			$('#AverageSalary').html('<?php echo $AverageSalaryHigh;?>');
		} else if((AVERAGEOFFER - (AVERAGEOFFER * 0.02)) > TOTAL_SALARY){
			$('#AverageSalary').html('<?php echo $AverageSalaryLow;?>');
		} else {	
			$('#AverageSalary').html('<?php echo $AverageSalaryAvg;?>');
		}
		
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
		
		if(YEAR_1_SALARY_DEMAND < 1034249){
			$(".CompensationTxt").html('<?php echo $l_comp1;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp1;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 1034249){
			$(".CompensationTxt").html('<?php echo $l_comp2;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp2;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 1567043){
			$(".CompensationTxt").html('<?php echo $l_comp3;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp3;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 3134088){
			$(".CompensationTxt").html('<?php echo $l_comp4;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp4;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 4701131){
			$(".CompensationTxt").html('<?php echo $l_comp5;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp5;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 6268175){
			$(".CompensationTxt").html('<?php echo $l_comp6;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp6;?>";
		}
		if(YEAR_1_SALARY_DEMAND >= 7835219){
			$(".CompensationTxt").html('<?php echo $l_comp7;?>');
			document.contract_form.Compensation.value = "<?php echo $l_comp7;?>";
		}
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
#ContractDetails{ 
width:310px;
}
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
        <td colspan="3" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $l_OfferTitle." : ".$row_GetPlayer['Name']; ?></strong>
        <div style="width:50px; float:right"><?php echo checkUFA($row_GetPlayer['Age'], $row_GetPlayer['Salary1'],0,0,1,$row_GetPlayer['AgeDate']);?></div></td>
    </tr>
    <tr>
    	<td width="25%"><?php echo $l_CurrentSalary;?>: <strong>$<?php echo number_format($expectedTotal,0); ?></strong></td>
        <td width="15%"><?php echo $l_Age;?>: <strong><?php 
						if($row_GetPlayer['Retired']==0){
							echo getAge($row_GetPlayer['AgeDate']);
						} else {
							echo $row_GetPlayer['Age'];
						}	
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
        <td><?php echo $l_CurrentOffers;?>: <strong>$<?php echo number_format($CurrentOffers, 0); ?></strong></td>
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
?>
<form method="post" name="contract_form" id="contract_form" action="<?php echo $editFormAction; ?>">
<div id="loader">
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
			if($row_GetContract['Contract'] <= $counter){
				echo '<option value="'.$counter.'" '.$tmpSelected.'>'.$counter.' '.$l_Year.'</option>';
			}
		}
		?>
        </select>
        </div>
        
        <div class="rowElem">
        <label><?php echo $l_SalaryDistribution;?>:</label>
        <input name="distribute" type="radio" value="0" <?php if($row_GetContract['ContractType']==0){ echo 'checked="checked" '; } ?>><span style="margin-top:10px;"><?php echo $l_Even;?></span> <input name="distribute" type="radio" value="1" <?php if($row_GetContract['ContractType']==1){ echo 'checked="checked" '; } ?>><span style="margin-top:10px;"><?php echo $l_FrontLoad;?></span>
		</div>
        
        <div class="rowElem">
        <label><?php echo $l_NoTrade;?>:</label>
        <input name="notrade" type="radio" value="0" <?php if($row_GetContract['NoTrade']==0){ echo 'checked="checked" '; } ?>><span style="margin-top:10px;"><?php echo $l_NoneTxt;?></span> <input name="notrade" type="radio" value="1" <?php if($row_GetContract['NoTrade']==1){ echo 'checked="checked" '; } ?>><span style="margin-top:10px;"><?php echo $l_IncludeText;?></span>
       	</div>

        
        <div class="rowElem">
        <label><?php echo $l_SigningBonus;?>:</label>
        <input id="bonus" name="bonus" type="checkbox" <?php if($row_GetContract['bonus']> 0){ echo 'checked="checked" '; } ?>><span><?php echo $l_SigningBonusDetails;?></span>
       	</div>
        
        <div class="rowElem" style="padding-bottom:10px;">
        <label><?php echo $l_AgentBargain;?>:</label>
        <select id="bargain" size=1  name="bargain">
        <?php if($row_GetContract['NoTradeSalary']<=6){ ?><option value="6" <?php if($row_GetContract['NoTradeSalary']==6){ echo 'selected="selected"';}?>>100% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=5){ ?><option value="5" <?php if($row_GetContract['NoTradeSalary']==5){ echo 'selected="selected"';}?>>90% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=4){ ?><option value="4" <?php if($row_GetContract['NoTradeSalary']==4){ echo 'selected="selected"';}?>>80% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=3){ ?><option value="3" <?php if($row_GetContract['NoTradeSalary']==3){ echo 'selected="selected"';}?>>70% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=2){ ?><option value="2" <?php if($row_GetContract['NoTradeSalary']==2){ echo 'selected="selected"';}?>>60% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=1){ ?><option value="1" <?php if($row_GetContract['NoTradeSalary']==1){ echo 'selected="selected"';}?>>50% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=7){ ?><option value="7" <?php if($row_GetContract['NoTradeSalary']==7){ echo 'selected="selected"';}?>>110% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=8){ ?><option value="8" <?php if($row_GetContract['NoTradeSalary']==8){ echo 'selected="selected"';}?>>120% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=9){ ?><option value="9" <?php if($row_GetContract['NoTradeSalary']==9){ echo 'selected="selected"';}?>>130% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=10){ ?><option value="10" <?php if($row_GetContract['NoTradeSalary']==10){ echo 'selected="selected"';}?>>140% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=11){ ?><option value="11" <?php if($row_GetContract['NoTradeSalary']==11){ echo 'selected="selected"';}?>>150% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=12){ ?><option value="12" <?php if($row_GetContract['NoTradeSalary']==12){ echo 'selected="selected"';}?>>175% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
        <?php if($row_GetContract['NoTradeSalary']<=13){ ?><option value="13" <?php if($row_GetContract['NoTradeSalary']==13){ echo 'selected="selected"';}?>>200% <?php echo $AgentAskingPrice;?>.</option><?php } ?>
		</select>
        </div>
        
 		<div class="rowElem">
        <label><?php echo $ContractDetails;?>:</label>
        <div id="ContractDetails"></div>
        </div>
        
        <br /><br  clear="all" />
        <div align="center">
        <input type="submit" value="<?php echo $l_sendOffer;?>" id="buttonEmail" class="button email" >
        </div>
        
		<div style="display:block; font-size:11px; padding:10px; margin-top:10px;" id="ownerApproval"></div>
        
        <br />
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
          <tr>
            <th><a><?php echo $l_NewSalary;?></a></th>
            <th><a>Compensation</a></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><div align="left">$1,110,249 or below</div></td>
            <td><?php echo $l_comp1;?></td>
          </tr>
          <tr>
            <td><div align="left">Over $1,110,249 to $1,682,194</div></td>
            <td><?php echo $l_comp2;?></td>
          </tr>
          <tr>
            <td><div align="left">Over $1,682,194 to $3,364,391</div></td>
            <td><?php echo $l_comp3;?></td>
          </tr>
          <tr>
            <td><div align="left">Over $3,364,391 to $5,046,585</div></td>
            <td><?php echo $l_comp4;?></td>
          </tr>
          <tr>
            <td><div align="left">Over $5,046,585 to $6,728,781</div></td>
            <td><?php echo $l_comp5;?></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><div align="left">Over $6,728,781 To $8,410,976</div></td>
            <td><?php echo $l_comp6;?></td>
          </tr>
          <tr>
            <td><div align="left">Over $8,410,976</div></td>
            <td><?php echo $l_comp7;?></td>
          </tr>
          </tbody>
        </table>
        <p><?php echo $l_CompNote;?></p>
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
		
		echo "<p>".$l_Compensation."</p>";
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
			$tmpTxtItems = array("%item1");
			$updatedTxtItems = array(number_format($expectedTotal,0));
			$ExpectedSalary = str_replace($tmpTxtItems, $updatedTxtItems, $ExpectedSalary);
			?>
            <li style='color:red; font-size:12px;' id="ExpectedText"><?php echo $ExpectedSalary;?></li>
			
            <li style='font-size:12px;' id="AverageSalary"><?php echo $AverageSalaryAvg;?></li>
			
            </ul>
            <br clear="all" />
            </div>
        <p><strong>Note:</strong>  <?php echo $l_CompNote2;?></p>
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
<input type="hidden" name="contractsummary" value="" />
<input id="location" type="hidden" value="<?php echo $tmpLocation; ?>" name=location>
<input type="hidden" name="Compensation" value="None">
<input type="hidden" name="MM_edit" value="form">
<input type="hidden" name="id" value="<?php echo $Contract_ID; ?>">
</form>
<br clear="all" />
<?php 
}	 
?>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>
