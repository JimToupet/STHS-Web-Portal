<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>

<?php
switch ($lang){ 
case 'en': 
	$l_AnyTeam = "Any team in the league.";
	$l_AssistantCaptain = "Assistant Captain";
	$l_AvailableTrade = "Available For Trade";
	$l_AvgCap = "Average Cap Hit"; 
	$l_AvgCapHit = "Avg. Cap Hit";
	$l_Awards = "Awards ";
	$l_Captain = "Captain";
	$l_career = "Career";
	$l_CareerPlayoff = "CAREER PLAYOFF SEASON STATISTICS";
	$l_CareerRegular = "CAREER REGULAR SEASON STATISTICS";
	$l_ContractDetails = "Contract Details";
	$l_ContractExt = "Contract Extension";
	$l_ContractLength = "Contract Length";
	$l_ContractType = "Contract Type";
	$l_CurrentStats = "Active Season Stats";
	$l_days = "Day(s)";
	$l_EditPlayer = "EDIT PLAYER";
	$l_Extended = "EXTENDED SUMMARY";
	$l_ExtSummary = "Ext. Summary";
	$l_FarmCareerStats = "Farm League Career Stats";
	$l_FarmTotals = "FARM TOTALS";
	$l_games = "Game(s)";
	$l_HitsFights = "Hits & Fights";
	$l_InjuredDesc = "Days remaining on injured reserve:";
	$l_Leader = "Leader";
	$l_Links = "LINKS";
	$l_NoNotes = "No notes available.";
	$l_Notes = "Notes";
	$l_NoTradeClause = "No Trade Clause";
	$l_Number = "Number";
	$l_OfferContract = "CONTRACT EXTENSION";
	$l_OneWay = "One Way Contract (PRO)";
	$l_OutsideLinks = "Profile Links:";
	$l_Over = "over";
	$l_PlayerNotes = "Player Notes";
	$l_PlayerRatings = "Player Ratings";
	$l_Playoffs = "Playoffs";
	$l_ProCareerStats = "Pro League Career Stats";
	$l_ProTotals = "PRO TOTALS";
	$l_RegularSeason = "Regular Season";
	$l_restricted_free_agents = "RESTRICTED FREE AGENT";
	$l_Roster = "Team Roster";
	$l_SalaryBySeason = "Salary Hit by Season";
	$l_Shootouts = "Shootouts";
	$l_SpecialTeams = "Special Teams";
	$l_StarPower = "Star Power";
	$l_Summary = "Summary";
	$l_t_years = "Year(s)";
	$l_TimeOnIce = "Time On Ice";
	$l_Total = "Total";
	$l_waivenotavailable = "Waive no trade clause only available half way through season.";
	$l_WaiveDesc = "The agent asks says you have a <strong>%item1% chance</strong> of getting him to waive his no trade clause.   If he decides to waive the no trade clause, he will select <strong>up to %item2 teams</strong> that he will be willing to be traded to.";
	$l_rejectWait = "The agent asks that you wait 24 hours before asking him to waive again.";
	$l_TradeRequest = "No Trade Claused Waived - Trade Requested";
	$l_TradeRequestExt = "Contract Extension Negotiations Ended - Trade Requested";
	$l_TradeRequestUFA = "Contract Extension Negotiations Ended - Ready for free agency";
	$l_TradeRequestDesc = "%item1 has ended contract extension negotiations with the %item2.  He would consider contract extension negotiations with any of the following teams: ";
	$l_TradeRequestDesc2 = "%item1 has ended contract extension negotiations with the %item2.  He <strong>will not</strong> consider contract extension negotiations with any team and will be going to free agency this off season.";
	$l_TradeRequestDesc1 = "%item1 has waived his no trade clause to be traded to any of the following teams:<br /> ";
	$l_TransactionHistory = "TRANSACTIONS HISTORY";
	$l_Transactions = "Transactions";
	$l_Transactions = "Transactions";
	$l_TwoWay = "Two Way Contract (Pro & Farm)";
	$l_unrestricted_free_agents = "UNRESTRICTED FREE AGENT";
	$l_year = "YEAR";
	$l_ContractExpiring = "Contract Expiring";
	$l_ContractExpiringDesc = "%item1 contract will be expiring at the end of this season.   The %item2 have <strong>%item3</strong> more attempts available to try to sign my client to an extension before he goes off to free agency.";
	$l_FutureTalks = "My Client has played for <strong>%item4</strong> team(s) this season.  He would only listen to <strong>%item5</strong> more team for possible extension talks.";
	$l_NoFutureTalks = "My Client has played for <strong>%item4</strong> team(s) this season.  He will no longer talk to any other teams for possible contract extensions.  He will go to free agency at the end of the season.";
	$SummaryText1 = 'The market value for his services is currently a <strong><span class="YearTxt1">%item1</span>-year</strong> contract worth a total of <strong>$<span class="TotalSalaryTxt">%item2</span></strong>, which equals <strong>$<span class="YearlySalaryTxt">%item3</span></strong> per season.';
	break; 

case 'fr': 
	$l_AnyTeam = "N’importe quelle formations dans la ligue.";
	$l_AssistantCaptain = "Assistant Capitaine";
	$l_AvailableTrade = "Disponible pour &eacute;change";
	$l_AvgCap = "Moyenne Masse Salariale";
	$l_AvgCapHit = "Moy. Masse Salariale";
	$l_Awards = "Troph&eacute;es ";
	$l_Captain = "Capitaine";
	$l_career = "Carri&egrave;re";
	$l_CareerPlayoff = "STATISTIQUES EN CARRI&Egrave;RE S&Eacute;RIE &Eacute;LIMINATOIRE";
	$l_CareerRegular = " STATISTIQUES EN CARRI&Egrave;RE SAISON R&Eacute;GULI&Egrave;RE ";
	$l_ContractDetails = "D&eacute;tail du Contrat";
	$l_ContractExt = "Extension de contrat";
	$l_ContractLength = "Dur&eacute;e du Contrat";
	$l_ContractType = "Type de Contrat";
	$l_CurrentStats = "Stats Saison Actuelle";
	$l_days = "Jour(s)";
	$l_EditPlayer = "MODIFIER JOUEUR";
	$l_Extended = "SOMMAIRE &Eacute;TENDU";
	$l_ExtSummary = "Sommaire &Eacute;tendu.";
	$l_FarmCareerStats = "Stats Farm en Carri&egrave;re";
	$l_FarmTotals = "TOTAL FARM";
	$l_games = "Match(s)";
	$l_HitsFights = "Mise en &eacute;chec";
	$l_InjuredDesc = "Jour(s) restant(s) sur la liste des bless&eacute; :";
	$l_Leader = "Meneur";
	$l_Links = "LIENS";
	$l_NoNotes = "Pas de notes disponibles";
	$l_Notes = "Notes";
	$l_NoTradeClause = "Clause de non-&eacute;change";
	$l_Number = "Num&eacute;ro";
	$l_OfferContract = "EXTENSION DE CONTRAT";
	$l_OneWay = "Contrat &agrave; sens unique (Pro)";
	$l_OutsideLinks = "LIENS :";
	$l_Over = "par ann&eacute;e pour";
	$l_PlayerNotes = "Notes sur le joueur";
	$l_PlayerRatings = "Cotes du gardien";
	$l_Playoffs = "S&eacute;ries &eacute;liminatoires";
	$l_ProCareerStats = "Stats Pro en Carri&egrave;re";
	$l_ProTotals = "TOTAL PRO";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_restricted_free_agents = " AGENTS LIBRES AVEC RESTRICTIONS ";
	$l_Roster = "Alignement";
	$l_SalaryBySeason = "Salaire par Saison";
	$l_Shootouts = "Blanchissages";
	$l_SpecialTeams = "Unit&egrave; Sp&eacute;ciale";
	$l_StarPower = "Impact de Vedette";
	$l_Summary = "Sommaire";
	$l_t_years = "an(s)";
	$l_TimeOnIce = "Temp de glace";
	$l_Total = "Total";
	$l_waivenotavailable = "N&apos;&eacute;cartez aucune clause commerciale seulement disponible &agrave; mi-terme de la saison.";
	$l_WaiveDesc = "L&apos;agent demande dit que vous avez une possibilit&eacute; de <strong>%item1% de l&apos;obliger</strong> &agrave; &eacute;carter sa clause du commerce de non. S&apos;il d&eacute;cide d&apos;&eacute;carter la clause du commerce de non, il choisira <strong>%item2 &eacute;quipes</strong> qu&apos;il sera dispos&eacute; &agrave; &ecirc;tre commerc&eacute; &agrave;.";
	$l_rejectWait = "L&apos;agent demande que vous attendez 24 heures avant de lui demander d&apos;&eacute;carter encore.";
	$l_TradeRequest = "&Eacute change Demand&eacute;";
	$l_TradeRequestExt = "Les n&eacute;gociations d&apos;extension de contrat ont fini - le commerce demand&eacute;";
	$l_TradeRequestUFA = "Les n&eacute;gociations d&apos;extension de contrat ont fini - pr&eacute;parez pour l&apos;agence libre";
	$l_TradeRequestDesc = "%item1 a fini des n&eacute;gociations d&apos;extension de contrat avec le %item2. Il consid&eacute;rerait des n&eacute;gociations d&apos;extension de contrat avec l&apos;un des apr&egrave;s des &eacute;quipes :";
	$l_TradeRequestDesc2 = "%item1 a fini des n&eacute;gociations d&apos;extension de contrat avec le %item2. Il ne consid&eacute;rera pas des n&eacute;gociations d&apos;extension de contrat avec aucune &eacute;quipe et ira &agrave; l&apos;agence libre ceci outre de la saison.";
	$l_TradeRequestDesc1 = "%item1 d&eacutesire n&eacutegocier un nouveau contrat avec les formations suivantes : ";
	$l_TransactionHistory = "HISTORIQUE DES TRANSACTIONS";
	$l_Transactions = "Transactions";
	$l_Transactions = "Transactions";
	$l_TwoWay = "Contrat &agrave;  double sens (Pro et Farm)";
	$l_unrestricted_free_agents = "AGENTS LIBRES SANS RESTRICTIONS";
	$l_year = "ANN&eacute;E";
	$l_ContractExpiring = "Contrat expirant";
	$l_ContractExpiringDesc = "Le contrat %item1 expirera &agrave; la fin de cette saison. Les %item2 ont <strong>%item3</strong> plus de tentatives disponibles &agrave; essayer de signer mon client &agrave; une prolongation avant qu&apos;il aille au loin &agrave; l&apos;agence libre.";
	$l_FutureTalks = "Mon client a jou&eacute; pour les &eacute;quipes %item4 cette saison. Il &eacute;couterait seulement %item5 plus d&apos;&eacute;quipe des entretiens possibles de prolongation.";
	$l_NoFutureTalks = "Mon client a jou&eacute; pour les &eacute;quipes %item4 cette saison. Il ne parlera plus &agrave; aucune autre &eacute;quipe pour les extensions de contrat possibles. Il ira &agrave; l&apos;agence libre &agrave; la fin de la saison.";
	$SummaryText1 = 'Le joueur estime que sa valeur marchande justifierait au moins a <strong><span class="YearTxt1">%item1</span>- ann&eacute;e</strong> contrat en valeur l un total de <strong>$<span class="TotalSalaryTxt">%item2</span></strong>, qui &eacute;gale<strong>$<span class="YearlySalaryTxt">%item3</span></strong> par saison.';
	break;
} 

$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);


$PID_GetPlayer = 0;
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetNumber = 0;
if (isset($_GET['number'])) {
  $GetNumber = (get_magic_quotes_gpc()) ? $_GET['number'] : addslashes($_GET['number']);
}

$query_GetPlayer = sprintf("SELECT * FROM goalies WHERE goalies.Number=%s", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetStats = sprintf("SELECT (SELECT Name FROM farmteam WHERE Number=goaliestats.Team) as FarmTeamName, proteam.Name as ProTeamName, goaliestats.*, seasons.Season FROM goaliestats, seasons, proteam WHERE proteam.Number=goaliestats.Team AND seasons.S_ID = goaliestats.Season_ID AND goaliestats.Number = %s  AND seasons.SeasonType=1 ORDER BY seasons.Season, goaliestats.STAT_ID ASC",$PID_GetPlayer);
$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats = mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetPlayoffStats = sprintf("SELECT (SELECT Name FROM farmteam WHERE Number=goaliestats.Team) as FarmTeamName, proteam.Name as ProTeamName, goaliestats.*, seasons.Season FROM goaliestats, seasons, proteam WHERE proteam.Number=goaliestats.Team AND seasons.S_ID = goaliestats.Season_ID AND goaliestats.Number = %s  AND seasons.SeasonType=0 ORDER BY seasons.Season, goaliestats.STAT_ID ASC",$PID_GetPlayer);
$GetPlayoffStats = mysql_query($query_GetPlayoffStats, $connection) or die(mysql_error());
$row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats);
$totalRows_GetPlayoffStats = mysql_num_rows($GetPlayoffStats);

$query_GetPlayerExtensionOffersCT = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s AND PlayerType='goalie' AND Type='Extension' ORDER BY DateCreated DESC ", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffersCT = mysql_query($query_GetPlayerExtensionOffersCT, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersCT = mysql_fetch_assoc($GetPlayerExtensionOffersCT);
$totalRows_GetPlayerExtensionOffersCT = mysql_num_rows($GetPlayerExtensionOffersCT);

$query_GetPlayerExtensionOffersTeams = sprintf("SELECT Team FROM playersextensionoffers WHERE Player=%s AND Type='Extension' GROUP BY Team ", $PID_GetPlayer);
$GetPlayerExtensionOffersTeams = mysql_query($query_GetPlayerExtensionOffersTeams, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersTeams = mysql_fetch_assoc($GetPlayerExtensionOffersTeams);
$totalRows_GetPlayerExtensionOffersTeams = mysql_num_rows($GetPlayerExtensionOffersTeams);

$query_GetTrophyPlayoffsChampions = sprintf("SELECT x.Season, p.Name, l.Name, q.ProGP FROM goaliestats as q, goalies as l, proteam as p, proteamstandings as s, seasons as x WHERE q.Number=%s AND q.ProGP > 0 AND q.Active='True' AND q.Name=l.Name AND l.Team=p.Number AND p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') group by x.Season order by x.Season desc",$PID_GetPlayer);
$GetTrophyPlayoffsChampions = mysql_query($query_GetTrophyPlayoffsChampions, $connection) or die(mysql_error());
$row_GetTrophyPlayoffsChampions = mysql_fetch_assoc($GetTrophyPlayoffsChampions);
$totalRows_GetTrophyPlayoffsChampions = mysql_num_rows($GetTrophyPlayoffsChampions);

$query_GetFarmTrophyPlayoffsChampions = sprintf("SELECT x.Season, p.Name, l.Name, q.FarmGP FROM goaliestats as q, goalies as l, farmteam as p, farmteamstandings as s, seasons as x WHERE q.Number=%s AND q.FarmGP > 0 AND q.Active='True' AND q.Name=l.Name AND l.Team=p.Number AND p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') group by x.Season order by x.Season desc",$PID_GetPlayer);
$GetFarmTrophyPlayoffsChampions = mysql_query($query_GetFarmTrophyPlayoffsChampions, $connection) or die(mysql_error());
$row_GetFarmTrophyPlayoffsChampions = mysql_fetch_assoc($GetFarmTrophyPlayoffsChampions);
$totalRows_GetFarmTrophyPlayoffsChampions = mysql_num_rows($GetFarmTrophyPlayoffsChampions);

$query_GetTrophyMVP = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.MVP=%s AND t.Season_ID=s.Season AND g.Number=t.MVP AND t.Team=0 AND g.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyMVP = mysql_query($query_GetTrophyMVP, $connection) or die(mysql_error());
$row_GetTrophyMVP = mysql_fetch_assoc($GetTrophyMVP);
$totalRows_GetTrophyMVP = mysql_num_rows($GetTrophyMVP);

$query_GetTrophyRookieOfTheYear = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.RookieOfTheYear=%s AND g.Number=t.RookieOfTheYear AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyRookieOfTheYear = mysql_query($query_GetTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyRookieOfTheYear = mysql_fetch_assoc($GetTrophyRookieOfTheYear);
$totalRows_GetTrophyRookieOfTheYear = mysql_num_rows($GetTrophyRookieOfTheYear);

$query_GetTrophyPlayoffMVP = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.PlayoffMVP=%s AND g.Number=t.PlayoffMVP AND t.Team=0 AND  g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyPlayoffMVP = mysql_query($query_GetTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetTrophyPlayoffMVP = mysql_fetch_assoc($GetTrophyPlayoffMVP);
$totalRows_GetTrophyPlayoffMVP = mysql_num_rows($GetTrophyPlayoffMVP);

$query_GetTrophyLowestGAA = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.LowestGAA=%s AND g.Number=t.LowestGAA AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyLowestGAA = mysql_query($query_GetTrophyLowestGAA, $connection) or die(mysql_error());
$row_GetTrophyLowestGAA = mysql_fetch_assoc($GetTrophyLowestGAA);
$totalRows_GetTrophyLowestGAA = mysql_num_rows($GetTrophyLowestGAA);

$query_GetTrophyGoalieOfTheYear = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.GoalieOfTheYear=%s AND g.Number=t.GoalieOfTheYear AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyGoalieOfTheYear = mysql_query($query_GetTrophyGoalieOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyGoalieOfTheYear  = mysql_fetch_assoc($GetTrophyGoalieOfTheYear );
$totalRows_GetTrophyGoalieOfTheYear  = mysql_num_rows($GetTrophyGoalieOfTheYear );

$query_GetFarmTrophyMVP = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.FarmMVP=%s AND t.Season_ID=s.Season AND g.Number=t.FarmMVP AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyMVP = mysql_query($query_GetFarmTrophyMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyMVP = mysql_fetch_assoc($GetFarmTrophyMVP);
$totalRows_GetFarmTrophyMVP = mysql_num_rows($GetFarmTrophyMVP);

$query_GetFarmTrophyRookieOfTheYear = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.FarmRookieOfTheYear=%s AND g.Number=t.FarmRookieOfTheYear AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyRookieOfTheYear = mysql_query($query_GetFarmTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyRookieOfTheYear = mysql_fetch_assoc($GetFarmTrophyRookieOfTheYear);
$totalRows_GetFarmTrophyRookieOfTheYear = mysql_num_rows($GetFarmTrophyRookieOfTheYear);

$query_GetFarmTrophyPlayoffMVP = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.FarmPlayoffMVP=%s AND g.Number=t.FarmPlayoffMVP AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyPlayoffMVP = mysql_query($query_GetFarmTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyPlayoffMVP = mysql_fetch_assoc($GetFarmTrophyPlayoffMVP);
$totalRows_GetFarmTrophyPlayoffMVP = mysql_num_rows($GetFarmTrophyPlayoffMVP);

$query_GetFarmTrophyLowestGAA = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.FarmLowestGAA=%s AND g.Number=t.FarmLowestGAA AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyLowestGAA = mysql_query($query_GetFarmTrophyLowestGAA, $connection) or die(mysql_error());
$row_GetFarmTrophyLowestGAA = mysql_fetch_assoc($GetFarmTrophyLowestGAA);
$totalRows_GetFarmTrophyLowestGAA = mysql_num_rows($GetFarmTrophyLowestGAA);

$query_GetFarmTrophyGoalieOfTheYear = sprintf("SELECT s.Season, g.Team FROM trophywinners as t, seasons as s, goaliestats as g WHERE t.FarmGoalieOfTheYear=%s AND g.Number=t.FarmGoalieOfTheYear AND t.Team=0  AND g.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyGoalieOfTheYear = mysql_query($query_GetFarmTrophyGoalieOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyGoalieOfTheYear  = mysql_fetch_assoc($GetFarmTrophyGoalieOfTheYear );
$totalRows_GetFarmTrophyGoalieOfTheYear  = mysql_num_rows($GetFarmTrophyGoalieOfTheYear );

$tmpStatus = $row_GetPlayer['Status1'];
$PID_GetPlayer=addslashes($row_GetPlayer['Name']);

$tmpStatus = $row_GetPlayer['Status1'];
$PID_GetPlayer=addslashes($row_GetPlayer['Name']);
if ($row_GetPlayer['Team']==""){
	$tmpTeamNumber = 0;
} else {
	$tmpTeamNumber = $row_GetPlayer['Team'];
}

if ($tmpStatus <= 1){
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, f.Number, f.Name, f.Abbre, f.City, f.HeaderImage, f.LogoLarge, f.LogoSmall, f.LogoTiny, f.PrimaryColor, f.SecondaryColor FROM farmteam as f, farmteamstandings as s WHERE f.Number=s.Number AND f.Number='%s' ", $tmpTeamNumber);
} else {
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, p.Number,  p.Name,  p.Abbre,  p.City,  p.HeaderImage, p.LogoLarge,  p.LogoSmall,  p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Number='%s' ", $tmpTeamNumber);
}
$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);

if($row_GetTeamInfo['HeaderImage']!=""){
	$HeaderImage=$row_GetTeamInfo['HeaderImage'];
	$SecondaryColor=$row_GetTeamInfo['SecondaryColor'];
	$PrimaryColor=$row_GetTeamInfo['PrimaryColor'];
} else {
	$HeaderImage=$_SESSION['current_HeaderImage'];
	$SecondaryColor=$_SESSION['current_SecondaryColor'];
	$PrimaryColor=$_SESSION['current_PrimaryColor'];
}
	
$tmpTeamCaptain = 0;
$tmpTeamAssistant1 = 0;
$tmpTeamAssistant2 = 0;
if ($row_GetTeamInfo['Captain'] == $row_GetPlayer['Number']){
	$tmpTeamCaptain = 1;
}
if ($row_GetTeamInfo['Assistant1'] == $row_GetPlayer['Number']){
	$tmpTeamAssistant1 = 1;
}
if ($row_GetTeamInfo['Assistant2'] == $row_GetPlayer['Number']){
	$tmpTeamAssistant2 = 1;
}

if ($tmpStatus==0){
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 <= 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 <= 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
} else {
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 > 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 > 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
}
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetContractExt = sprintf("SELECT * FROM playerscontractoffers as P WHERE P.Player=%s AND P.Type='Extension' AND PlayerType='goalie'", $row_GetPlayer['Number']);
$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
$totalRows_GetContractExt = mysql_num_rows($GetContractExt);

$query_GetWaivers = sprintf("SELECT Player FROM waiver WHERE Player='%s'", $PID_GetPlayer);
$GetWaivers = mysql_query($query_GetWaivers, $connection) or die(mysql_error());
$row_GetWaivers = mysql_fetch_assoc($GetWaivers);
$totalRows_GetWaivers = mysql_num_rows($GetWaivers);

$query_GetDraftInfo = sprintf("SELECT *, t.Name as OwnBy FROM seasons as s, draftpicks as p, draft as d, proteam as t WHERE t.Number=p.OwnBy AND p.Name='%s' AND d.Year=p.Year AND d.Season_ID=s.Season", $PID_GetPlayer);
$GetDraftInfo = mysql_query($query_GetDraftInfo, $connection) or die(mysql_error());
$row_GetDraftInfo = mysql_fetch_assoc($GetDraftInfo);
$totalRows_GetDraftInfo = mysql_num_rows($GetDraftInfo);

$query_GetTrophyNames = sprintf("SELECT * FROM trophies ");
$GetTrophyNames = mysql_query($query_GetTrophyNames, $connection) or die(mysql_error());
$row_GetTrophyNames = mysql_fetch_assoc($GetTrophyNames);
$totalRows_GetTrophyNames = mysql_num_rows($GetTrophyNames);

$division=$row_GetPlayer['Height']/12;   
$feet=intval(abs($division)); 
$decimal=abs($division)-intval(abs($division));
$inches=$decimal*12;
$ContractExtension=0;
$RecoveryRate=1;
$UFA=26;

$query_GetInfo = sprintf("SELECT AI_NOTRADE_TEAM_LIST, AI_NOTRADE_AVAILABLE, AI_WAIVE_NT, UFA, RecoveryRate, PlayerAI, ContractExtensionFormula FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$ContractExtension=$row_GetInfo['ContractExtensionFormula'];
$PlayerAI=$row_GetInfo['PlayerAI'];
$RecoveryRate=$row_GetInfo['RecoveryRate'];
$UFA=$row_GetInfo['UFA'];
$NT_ODDS = $row_GetInfo['AI_WAIVE_NT'];
$NT_TEAM_LIST = $row_GetInfo['AI_NOTRADE_TEAM_LIST'];
$NT_AVAILABLE = $row_GetInfo['AI_NOTRADE_AVAILABLE'];
mysql_free_result($GetInfo);

//teamhistory
$query_GetNotes = "SELECT Value FROM transactionhistory WHERE Value like '%".$PID_GetPlayer."%' ORDER BY Season_ID DESC, DateCreated desc";
$GetNotes = mysql_query($query_GetNotes, $connection) or die(mysql_error());
$row_GetNotes = mysql_fetch_assoc($GetNotes);
$totalRows_GetNotes = mysql_num_rows($GetNotes);

$query_GetRequestedTeams = sprintf("SELECT * FROM traderequests WHERE Player='%s' AND Season='%s'", $row_GetPlayer['Name'], $_SESSION['current_Season']);
$GetRequestedTeams = mysql_query($query_GetRequestedTeams, $connection) or die(mysql_error());
$row_GetRequestedTeams = mysql_fetch_assoc($GetRequestedTeams);
$totalRows_GetRequestedTeams = mysql_num_rows($GetRequestedTeams);



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">   



<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("#tabs").ttabs(); 
  $("table").tablesorter(); 
  $("#TeamPhoto").reflect({height:30,opacity:0.3});
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });

	$('#waiver_form').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var post_url = form.attr('action');
		var post_data = form.serialize();
		$('#loader').html('<div align="center" style="margin-top:50px;"><img src="image/common/ajax-load.gif" /></div>');
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
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $PrimaryColor;?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
a:active {color:#<?php echo $SecondaryColor; ?>;}
a:hover {color:#<?php echo $SecondaryColor; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $SecondaryColor; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $SecondaryColor; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $PrimaryColor; ?>;}
h3 {color:#<?php echo $PrimaryColor; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}

#JerseyNumber{
	display:block; 
	width:78px; 
	height:78px; 
	background-color:#<?php echo $PrimaryColor; ?>;
	border-style:solid;
	border-width:1px;
	border-color:#FFFFFF;
	color:#FFFFFF;
	font-size:60px;
	text-align:center;
	line-height:74px;
	font-weight:bold;
	font-family:Helvetica, sans-serif, Arial;
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
        	<td id="PlayerProfile" style="background-color:#<?php echo $PrimaryColor; ?>; padding:6px; width:35%;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td width="110" rowspan="2" style="vertical-align:top; width:110px;"><img src="<?php echo imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $PrimaryColor; ?>;" width="100" height="150"/></td>
                    <td rowspan="2" valign="top" height="150" style="vertical-align:middle;">
                        <div align="center" style="width:205px;">
                        	<?php if ($row_GetPlayer['UniformNumber'] > 0){ ?>
                            	<div style="float:left; width:125px;"><img align="right" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>" id="TeamPhoto" /></div>
                            	<div style="float:right;" id="JerseyNumber"><?php echo $row_GetPlayer['UniformNumber'];?></div>
							<?php } else { ?>
                            	<img align="right" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>" id="TeamPhoto" />
                            <?php } ?>
                        </div>
                        <?php if($_SESSION['current_Team_ID'] > 0 ){?>
                        <div style="position:absolute; z-index:10; top:300px; padding-left:20px;">
                            <FORM>
                            <SELECT ONCHANGE="location = this.options[this.selectedIndex].value;" style="font-size:0.85em; width:155px; text-align:center;">
                            <?php 
							if($row_GetPlayer['Retired']==0){
							echo "<option>".$l_Roster."</option>";
                            $tmpTargetFile="player.php";
                            do { 
                                if($row_GetRoster['Position']==16){
                                    $tmpTargetFile="goalie.php";
                                } else {
                                    $tmpTargetFile="player.php";
                                }
                                echo '<OPTION VALUE="'.$tmpTargetFile.'?player='.$row_GetRoster['Number'].'">'.$row_GetRoster['Name'].'</OPTION>';
                            } while ($row_GetRoster = mysql_fetch_assoc($GetRoster));
							}
                            ?>
                            </SELECT> 
                            </FORM>
                        </div>
                        <?php } ?>
                    </td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px; width:65%; vertical-align:top;">
                    
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
                    <tr>
                    	<td colspan="2" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $row_GetPlayer['Name']; ?></strong></td>
						<td>
						<?php 
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
								echo '<a href="edit_goalie.php?team='.$_SESSION['current_Team_ID'].'&player='.$row_GetPlayer['Number'].'" class="button edit">'.$l_EditPlayer.'</a>';
								if ($totalRows_GetContractExt == 0) {
									if ($row_GetPlayer['Contract'] ==1 && $ContractExtension == 1){
										echo '&nbsp;&nbsp;<a href="contractExtension.php?team='.$_SESSION["current_Team_ID"].'&player='.$row_GetPlayer["Number"].'&type=goalie" style="padding-left:20px" class="button like">'.$l_OfferContract.'</a></li>';
									}
								}
							}
						}
						?>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="vertical-align:bottom;">Position: <strong>
                        <?php echo "<li id='PositionsList'>".$l_Goalie."</li>";?>
                    	</strong></td>
                        <td>Status:
                        <?php
							echo "<strong>";
							if($row_GetPlayer['Status1'] == 0 && $row_GetPlayer['Retired']==0){
								echo "Not Active";
							} else if($row_GetPlayer['Status1'] == 1){
								echo "Farm Team";
							} else if($row_GetPlayer['Status1'] > 1){
								echo "Pro Team";
							} else if ($row_GetPlayer['Retired']==1){
								echo "Retired";
							}
							echo "</strong>";
							if($tmpTeamCaptain == 1){ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$l_Leader.":&nbsp;<strong>".$l_Captain."</strong>"; }
							if($tmpTeamAssistant1 == 1 || $tmpTeamAssistant2 == 1){ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$l_Leader.":&nbsp;<strong>".$l_AssistantCaptain."</strong>"; }
                        ?>
                        </td>
                    </tr>
                	<tr>
                        <td valign="top"><?php echo $l_DateOfBirth;?>: <strong><?php echo $row_GetPlayer['AgeDate']; ?></strong></td>
                        <td valign="top"><?php echo $l_Age;?>: <strong><?php 
						if($row_GetPlayer['Retired']==0){
							echo getAge($row_GetPlayer['AgeDate']);
						} else {
							echo $row_GetPlayer['Age'];
						}	
						?></strong></td> 
                        <td><?php echo $l_Country;?>: <strong><?php echo $row_GetPlayer['Country']."</strong>"; ?>&nbsp;<img height="12" width="12" src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetPlayer['Country']; ?>.png" border="0"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $l_Height;?>: <strong><?php echo $feet; ?>' <?php echo $inches ?>"</strong></td>
                        <td><?php echo $l_Weight;?>: <strong><?php echo $row_GetPlayer['Weight']; ?> lbs</strong></td>
                        <td><?php echo $l_StarPower;?>: <strong><?php echo $row_GetPlayer['StarPower']; ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <?php 
							echo "Drafted : ";
							if($totalRows_GetDraftInfo > 0){
								echo "<strong>".$row_GetDraftInfo['Round']."/".number_format(($row_GetDraftInfo['Round'] * $_SESSION['total_teams'] ) - $_SESSION['total_teams'] + $row_GetDraftInfo['Overall'],0)." in ".$row_GetDraftInfo['Season']." by the ".$row_GetDraftInfo['OwnBy']."</strong>"; 
							} else {
								echo "<strong>N/A</strong>";
							}
						?>
                        </td>
                        <td>
                        <?php
                        echo $l_AvgCap.": ";
						if($row_GetPlayer['Retired']==0){
							$tmpCapHit = 0;
							if ($row_GetPlayer['Salary1'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary1'];
							}
							if ($row_GetPlayer['Salary2'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary2'];
							}
							if ($row_GetPlayer['Salary3'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary3'];
							}
							if ($row_GetPlayer['Salary4'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary4'];
							}
							if ($row_GetPlayer['Salary5'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary5'];
							}
							if ($row_GetPlayer['Salary6'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary6'];
							}
							if ($row_GetPlayer['Salary7'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary7'];
							}
							if ($row_GetPlayer['Salary8'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary8'];
							}
							if ($row_GetPlayer['Salary9'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary9'];
							}
							if ($row_GetPlayer['Salary10'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary10'];
							}
							
							if($row_GetPlayer['Contract'] > 0){
								 $tmpNTC = "";
								if ($row_GetPlayer['NoTrade'] == "True" || $row_GetPlayer['NoTrade'] == "Vrai"){ $tmpNTC = $l_NoTradeClause;}
		                    	echo "<strong>$".number_format($tmpCapHit/$row_GetPlayer['Contract'],0)." ".$l_Over." ".$row_GetPlayer['Contract']." ".$l_t_years."</strong>&nbsp;";
								if ($row_GetPlayer['NoTrade'] == "True"){ echo $tmpNTC; }									
							} else {
								$query_RFA = sprintf("SELECT G.Name FROM goalies as G WHERE Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=G.Number AND E.Type='Extension' AND E.PlayerType='goalie') AND G.Age < %s AND G.Number=%s",$UFA, $row_GetPlayer['Number']);
								$GetRFA = mysql_query($query_RFA, $connection) or die(mysql_error());
								$row_GetRFA = mysql_fetch_assoc($GetRFA);
								$totalRows_GetRFA = mysql_num_rows($GetRFA);
								if($totalRows_GetRFA > 0){
									echo "<strong>".$l_restricted_free_agents."</strong>";
								} else {
									echo "<strong>".$l_unrestricted_free_agents."</strong>";
								}
							}
						}
						?></td>
                    </tr>
                    <?php 
						$tmpRowColorHTML = "";
						if ($row_GetPlayer['Injury'] <> "") {
							$tmpRowColorHTML = "background-color:#FFC1C1;";
						}	
					?>
                   <tr style="<?php echo $tmpRowColorHTML;?>">
                        <td colspan="2"><?php 
								echo $l_Condition.": <strong>";
								echo $row_GetPlayer['CON']."%"; 
								if ($row_GetPlayer['Injury'] <> '') {
									echo " | ".$row_GetPlayer['Injury'];
								}
								if ($row_GetPlayer['CON'] < 95){
									echo ", ".(95-$row_GetPlayer['CON'])."&nbsp;".$l_days;
								}
								echo "</strong>";
							?>
                        </td>
                        <td><?php echo $l_Suspension;?>: <strong><?php if ($row_GetPlayer['Suspension'] > 0){ echo $row_GetPlayer['Suspension']." ".$l_games; } else { echo 0;}  ?></strong></td>
                    </tr>
                                 
                </table>
            </td>
        </tr>
		</table>
          
        
        <?php if($totalRows_GetRequestedTeams > 0 || $row_GetPlayer['NoTrade'] == "True" || ($totalRows_GetContractExt == 0 && $row_GetPlayer['Contract']==1)){ ?>
        
          <div id="TradeRequest">
          <div style="float:right; display:block; text-align:center; font-size:9px; padding-left:10px;">
            	<?php echo getPlayerAgent($row_GetPlayer['Number'], $row_GetPlayer['Position'], $connection);?>
          </div>
          
        <?php $tradeRequest = 0;
		if($totalRows_GetRequestedTeams > 0 && $totalRows_GetContractExt == 0){ 
		
		  	if($totalRows_GetPlayerExtensionOffersTeams == 1){
				if($totalRows_GetPlayerExtensionOffersCT == 0){
					$RemainingOffers = 2;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 1){
					$RemainingOffers = 2;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 2){
					$RemainingOffers = 1;	
				} else {
					$RemainingOffers = 0;	
				}	
				
			} else if($totalRows_GetPlayerExtensionOffersTeams == 2){
				if($totalRows_GetPlayerExtensionOffersCT == 0){
					$RemainingOffers = 1;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 1){
					$RemainingOffers = 1;			
				} else {
					$RemainingOffers = 0;	
				} 
				
			} else if($totalRows_GetPlayerExtensionOffersTeams >= 3){
					$RemainingOffers = 0;	
				
			} else if($totalRows_GetPlayerExtensionOffersTeams == 0){
					$RemainingOffers = 3;	
			}
			
			
		  	if($row_GetRequestedTeams['RequestType'] == 'Extension' && $RemainingOffers==0 && $totalRows_GetPlayerExtensionOffersCT <= 3 && $totalRows_GetPlayerExtensionOffersTeams < 2){
				$tradeRequest = 1;
				echo "<h3>".$l_TradeRequestExt."</h3><br />";
				$tmpTxtItems = array("%item1","%item2");
				$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamInfo['City']." ".$row_GetTeamInfo['Name']);
				$l_TradeRequestDesc = str_replace($tmpTxtItems, $updatedTxtItems, $l_TradeRequestDesc);
				echo $l_TradeRequestDesc;
				$team = explode(",", $row_GetRequestedTeams['RequestedTeams']);
				if(count($team ) == $_SESSION['total_teams']){
					echo "<strong>".$l_AnyTeam."</strong>";
				} else if($row_GetRequestedTeams['RequestedTeams'] == 0){
					echo "<strong>".$l_None."</strong>";
				} else {
					for($i = 0; $i < count($team ); $i++){
						if($team [$i] > 0){
							$findTeamKey = array_search($team [$i], $_SESSION['MenuTeamsID']);
							echo "<a href='team.php?team=".$_SESSION['MenuTeamsID'][$findTeamKey]."'>".$_SESSION['MenuTeams'][$findTeamKey]."</a>";
							if (($i + 1) < count($team)){
								echo ", ";
							}
						}
					}
					echo "<br /><br />";
				}
			} else if($row_GetRequestedTeams['RequestType'] == 'Extension' && $RemainingOffers > 0 && $totalRows_GetPlayerExtensionOffersCT <= 3 && $totalRows_GetPlayerExtensionOffersTeams < 2){
				echo "<h3>".$l_ContractExpiring."</h3><br />";
				$tmpTxtItems = array("%item1","%item2","%item3");
				$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamInfo['City']." ".$row_GetTeamInfo['Name'],$RemainingOffers);
				$l_ContractExpiringDesc = str_replace($tmpTxtItems, $updatedTxtItems, $l_ContractExpiringDesc);
				echo $l_ContractExpiringDesc."<br><br>";
			
				$json = checkMarketValue($row_GetPlayer["Number"],'goalie', $connection);
				$arr = json_decode($json, true); 
				foreach($arr as $key1 => $value1) { 
					$MarketValueYears = $value1["years"];
					$MarketValueSalary = $value1["salary"];
					$MarketValueTotal = $value1["total"];
				}
				$tmpTxtItems = array("%item1", "%item2", "%item3");
				$updatedTxtItems = array($MarketValueYears, number_format($MarketValueTotal,0), number_format($MarketValueSalary,0));
				$SummaryText1 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText1);
				echo $SummaryText1."<br><br>";
				
			} else if($row_GetRequestedTeams['RequestType'] == 'NoTrade' && $row_GetPlayer['NoTrade'] == "True"){
				echo "<h3>".$l_TradeRequest."</h3><br />";
				$tmpTxtItems = array("%item1");
				$updatedTxtItems = array($row_GetPlayer['Name']);
				$l_TradeRequestDesc1 = str_replace($tmpTxtItems, $updatedTxtItems, $l_TradeRequestDesc1);
				echo $l_TradeRequestDesc1;
				$team = explode(",", $row_GetRequestedTeams['RequestedTeams']);
				if(count($team ) == $_SESSION['total_teams']){
					echo "<strong>".$l_AnyTeam."</strong>";
				} else {
					for($i = 0; $i < count($team ); $i++){
						if($team [$i] > 0){
							$findTeamKey = array_search($team [$i], $_SESSION['MenuTeamsID']);
							echo "<a href='team.php?team=".$_SESSION['MenuTeamsID'][$findTeamKey]."'>".$_SESSION['MenuTeams'][$findTeamKey]."</a>";
							if (($i + 1) < count($team)){
								echo ", ";
							}
						}
					}
					echo "<br><br>";
			
					$json = checkMarketValue($row_GetPlayer["Number"],'goalie', $connection);
					$arr = json_decode($json, true); 
					foreach($arr as $key1 => $value1) { 
						$MarketValueYears = $value1["years"];
						$MarketValueSalary = $value1["salary"];
						$MarketValueTotal = $value1["total"];
					}
					$tmpTxtItems = array("%item1", "%item2", "%item3");
					$updatedTxtItems = array($MarketValueYears, number_format($MarketValueTotal,0), number_format($MarketValueSalary,0));
					$SummaryText1 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText1);
					echo $SummaryText1."<br><br>";
				}
			} else {
				echo "<h3>".$l_TradeRequestUFA."</h3><br />";
				$tmpTxtItems = array("%item1","%item2");
				$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamInfo['City']." ".$row_GetTeamInfo['Name']);
				$l_TradeRequestDesc2 = str_replace($tmpTxtItems, $updatedTxtItems, $l_TradeRequestDesc2);
				if($RemainingOffers == 0){
					echo $l_TradeRequestDesc2."<br><br>";
				}
				$json = checkMarketValue($row_GetPlayer["Number"],'goalie', $connection);
				$arr = json_decode($json, true); 
				foreach($arr as $key1 => $value1) { 
					$MarketValueYears = $value1["years"];
					$MarketValueSalary = $value1["salary"];
					$MarketValueTotal = $value1["total"];
				}
				$tmpTxtItems = array("%item1", "%item2", "%item3");
				$updatedTxtItems = array($MarketValueYears, number_format($MarketValueTotal,0), number_format($MarketValueSalary,0));
				$SummaryText1 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText1);
				echo $SummaryText1."<br><br>";
			}
		 } else  if($totalRows_GetContractExt == 0 && $row_GetPlayer['Contract'] == 1){
		 
		  	if($totalRows_GetPlayerExtensionOffersTeams == 1){
				if($totalRows_GetPlayerExtensionOffersCT == 0){
					$RemainingOffers = 2;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 1){
					$RemainingOffers = 2;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 2){
					$RemainingOffers = 1;	
				} else {
					$RemainingOffers = 0;	
				}	
				
			} else if($totalRows_GetPlayerExtensionOffersTeams == 2){
				if($totalRows_GetPlayerExtensionOffersCT == 0){
					$RemainingOffers = 1;	
				} else if($totalRows_GetPlayerExtensionOffersCT == 1){
					$RemainingOffers = 1;			
				} else {
					$RemainingOffers = 0;	
				} 
				
			} else if($totalRows_GetPlayerExtensionOffersTeams >= 3){
					$RemainingOffers = 0;	
				
			} else if($totalRows_GetPlayerExtensionOffersTeams == 0){
					$RemainingOffers = 3;	
			}
			echo "<h3>".$l_ContractExpiring."</h3><br />";
			$tmpTxtItems = array("%item1","%item2","%item3");
			$updatedTxtItems = array($row_GetPlayer['Name'], $row_GetTeamInfo['City']." ".$row_GetTeamInfo['Name'],$RemainingOffers);
			$l_ContractExpiringDesc = str_replace($tmpTxtItems, $updatedTxtItems, $l_ContractExpiringDesc);
			echo $l_ContractExpiringDesc."<br><br>";
			
			$json = checkMarketValue($row_GetPlayer["Number"],'goalie', $connection);
			$arr = json_decode($json, true); 
			foreach($arr as $key1 => $value1) { 
				$MarketValueYears = $value1["years"];
				$MarketValueSalary = $value1["salary"];
				$MarketValueTotal = $value1["total"];
			}
			$tmpTxtItems = array("%item1", "%item2", "%item3");
			$updatedTxtItems = array($MarketValueYears, number_format($MarketValueTotal,0), number_format($MarketValueSalary,0));
			$SummaryText1 = str_replace($tmpTxtItems, $updatedTxtItems, $SummaryText1);
			echo $SummaryText1."<br><br>";
				
			if($totalRows_GetPlayerExtensionOffersTeams < 3){			
				$tmpTxtItems = array("%item4","%item5");
				$updatedTxtItems = array($totalRows_GetPlayerExtensionOffersTeams ,2-$totalRows_GetPlayerExtensionOffersTeams);
				$l_FutureTalks = str_replace($tmpTxtItems, $updatedTxtItems, $l_FutureTalks);
				echo $l_FutureTalks;
			} else if($totalRows_GetPlayerExtensionOffersTeams == 3 && $RemainingOffers == 0){			
				$tmpTxtItems = array("%item4","%item5");
				$updatedTxtItems = array($totalRows_GetPlayerExtensionOffersTeams ,2-$totalRows_GetPlayerExtensionOffersTeams);
				$l_NoFutureTalks = str_replace($tmpTxtItems, $updatedTxtItems, $l_NoFutureTalks);
				echo $l_NoFutureTalks;
			}
			
			} 
			if ($row_GetPlayer['NoTrade'] == "True"){
				
		?>
          
          
          <h3><?php echo $l_NoTradeClause;?></h3>
			<form method="post" name="waiver_form" id="waiver_form" action="waive_nt.php">
            <input type="hidden" name="type" value="goalie">
            <input type="hidden" name="player" value="<?php echo $row_GetPlayer['Number'];?>"> 
			<br /><div id="loader">
          <?php
				$tmpTxtItems = array("%item1", "%item2");
				$updatedTxtItems = array($NT_ODDS, $NT_TEAM_LIST);
				$l_WaiveDesc = str_replace($tmpTxtItems, $updatedTxtItems, $l_WaiveDesc);
				
				$query_GetTotalDays = "select schedule.Day FROM schedule WHERE schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day desc limit 0,1";
				$GetTotalDays = mysql_query($query_GetTotalDays, $connection) or die(mysql_error());
				$row_GetTotalDays = mysql_fetch_assoc($GetTotalDays);
				$totalRows_GetTotalDays = $row_GetTotalDays['Day'];
				$HalfSeason = number_format($totalRows_GetTotalDays / 2,0);
				
				$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Type='Extension' ORDER BY DateCreated DESC ", $row_GetPlayer['Number']);
				$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
				$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
				$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);
				$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
				
				$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
				$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
				$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
				$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
				if ($totalRows_GetLastDay==0){
					$Day_ID = 0;
				} else {
					$Day_ID = $row_GetLastDay['Day'];
				}

				if ($_SESSION['current_SeasonTypeID']==1){
					if($NT_AVAILABLE == 2){
						if($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
							$tradeRequest = 1;
							echo $l_WaiveDesc;
						} else {
							echo $l_rejectWait;
						}
					} else if ($NT_AVAILABLE == 3){
						if ($Day_ID >= $HalfSeason){
							if($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
								$tradeRequest = 1;
								echo $l_WaiveDesc;
							} else {
								echo $l_rejectWait;
							}
						} else {
							echo $l_waivenotavailable;
						}
					} else {
						echo $l_waivenotavailable;
					}
				} else if ($_SESSION['current_SeasonTypeID']==0 && $NT_AVAILABLE < 5){
					if($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
							$tradeRequest = 1;
							echo $l_WaiveDesc;
					} else {
						echo $l_rejectWait;
					}
				} else if ($_SESSION['current_SeasonTypeID']==2 && $NT_AVAILABLE == 1){
					if($ExtensionLastDate != strftime('%Y-%m-%d', strtotime('now'))){
							$tradeRequest = 1;
							echo $l_WaiveDesc;
					} else {
						echo $l_rejectWait;
					}
				} else {
					echo $l_waivenotavailable;
				}
				
				$query_GetPlayerExtensionOffersW = sprintf("SELECT DateCreated FROM playersextensionoffers WHERE Player=%s AND Type='Waive' ORDER BY DateCreated DESC ", $row_GetPlayer['Number']);
				$GetPlayerExtensionOffersW = mysql_query($query_GetPlayerExtensionOffersW, $connection) or die(mysql_error());
				$row_GetPlayerExtensionOffersW = mysql_fetch_assoc($GetPlayerExtensionOffersW);
				$totalRows_GetPlayerExtensionOffersW = mysql_num_rows($GetPlayerExtensionOffersW);
				$ExtensionLastDateW = $row_GetPlayerExtensionOffersW['DateCreated'];
				
				if($totalRows_GetPlayerExtensionOffersW > 0 && $row_GetPlayerExtensionOffersW["DateCreated"] == strftime('%Y-%m-%d', strtotime('now'))){
					$tradeRequest = 0;
				}
				
				if(isset($_SESSION['U_ID'])){
					if(($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1) && $tradeRequest == 1){
						echo '<br /><br /><div align="center"><input type="submit" value="Waive '.$tmpNTC.'" class="button email" ></div>';
					}
				}
				echo "</div></form>";
			}
			echo "</div>";
		}
		?>
        
        <br  clear="all" />
        
		<h3><?php echo $l_PlayerRatings;?></h3>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $PrimaryColor; ?>">
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
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
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
        <br />
            
  		<div id="tabs">
            <div id="tabs-1">
                <?php
					echo "<h3>".$l_Summary."</h3>";
					$tmpTotGP=0;
					$tmpTotStartGoaler=0;
                    $tmpTotW=$tmpTotW=0;
                    $tmpTotL=0;
                    $tmpTotOTL=0;
                    $tmpTotSA=0;
                    $tmpTotGA=0;
                    $tmpTotGAA=0;
                    $tmpTotPCT=0;
                    $tmpTotShutouts=0;
                    $tmpTotEmptyNetGoal=0;
                    $tmpTotProA=0;
                    $tmpTotProPim=0;
                    $tmpTotProMinPlay=0;
					$tmpTotFarmGP=0;
					$tmpTotFarmStartGoaler=0;
                    $tmpTotFarmW=$tmpTotW=0;
                    $tmpTotFarmL=0;
                    $tmpTotFarmOTL=0;
                    $tmpTotFarmSA=0;
                    $tmpTotFarmGA=0;
                    $tmpTotFarmGAA=0;
                    $tmpTotFarmPCT=0;
                    $tmpTotFarmShutouts=0;
                    $tmpTotFarmEmptyNetGoal=0;
                    $tmpTotFarmProA=0;
                    $tmpTotFarmProPim=0;
                    $tmpTotFarmProMinPlay=0;
					$tmpTotStar1=0;
					$tmpTotStar2=0;
					$tmpTotStar3=0;
					$tmpTotFarmStar1=0;
					$tmpTotFarmStar2=0;
					$tmpTotFarmStar3=0;
					if ($totalRows_GetStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_GS_D;?>"><?php echo $l_GS;?></a></th>
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>			
                    <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>	
                    <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
                    <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                    <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
                    <th><a title="<?php echo $l_EG_D;?>"><?php echo $l_G;?></a></th>		
                    <th><a title="<?php echo $l_A_D ;?>"><?php echo $l_A;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_MP_D;?>"><?php echo $l_MP;?></a></th>	
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmTeamName']; ?></td>       
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStartGoaler']; $tmpTotFarmStartGoaler=$tmpTotFarmStartGoaler+$row_GetStats['FarmStartGoaler'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmW']; $tmpTotFarmW=$tmpTotFarmW+$row_GetStats['FarmW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmL']; $tmpTotFarmL=$tmpTotFarmL+$row_GetStats['FarmL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmOTL']; $tmpTotFarmOTL=$tmpTotFarmOTL+$row_GetStats['FarmOTL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmSA']; $tmpTotFarmSA=$tmpTotFarmSA+$row_GetStats['FarmSA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGA']; $tmpTotFarmGA=$tmpTotFarmGA+$row_GetStats['FarmGA'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmMinPlay'] > 0){ echo number_format(($row_GetStats['FarmGA'] / minutes($row_GetStats['FarmMinPlay']))*60,2); } else { echo "0"; } ?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmMinPlay'] > 0){ echo number_format($row_GetStats['FarmSA'] / ($row_GetStats['FarmGA'] + $row_GetStats['FarmSA']),3); } else { echo "0"; } ?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmShutouts']; $tmpTotFarmShutouts=$tmpTotFarmShutouts+$row_GetStats['FarmShutouts'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmEmptyNetGoal']; $tmpTotFarmEmptyNetGoal=$tmpTotFarmEmptyNetGoal+$row_GetStats['FarmEmptyNetGoal'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmA']; $tmpTotFarmA=$tmpTotFarmA+$row_GetStats['FarmA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetStats['FarmMinPlay']); $tmpTotFarmMinPlay=$tmpTotFarmMinPlay+$row_GetStats['FarmMinPlay'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar1']; $tmpTotFarmStar1=$tmpTotFarmStar1+$row_GetStats['FarmStar1'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar2']; $tmpTotFarmStar2=$tmpTotFarmStar2+$row_GetStats['FarmStar2'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar3']; $tmpTotFarmStar3=$tmpTotFarmStar3+$row_GetStats['FarmStar3'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStartGoaler']; $tmpTotStartGoaler=$tmpTotStartGoaler+$row_GetStats['ProStartGoaler'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProW']; $tmpTotW=$tmpTotW+$row_GetStats['ProW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProL']; $tmpTotL=$tmpTotL+$row_GetStats['ProL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProOTL']; $tmpTotOTL=$tmpTotOTL+$row_GetStats['ProOTL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProSA']; $tmpTotSA=$tmpTotSA+$row_GetStats['ProSA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGA']; $tmpTotGA=$tmpTotGA+$row_GetStats['ProGA'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProMinPlay'] > 0){ echo number_format(($row_GetStats['ProGA'] / minutes($row_GetStats['ProMinPlay']))*60,2);  } else { echo "0"; } ?></td>
                    <td align="center"><?php if ($row_GetStats['ProMinPlay'] > 0){ echo number_format(($row_GetStats['ProSA'] - $row_GetStats['ProGA']) / $row_GetStats['ProSA'],3); } else { echo "0"; } ?></td>
                    <td align="center"><?php echo $row_GetStats['ProShutouts']; $tmpTotShutouts=$tmpTotShutouts+$row_GetStats['ProShutouts'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProEmptyNetGoal']; $tmpTotEmptyNetGoal=$tmpTotEmptyNetGoal+$row_GetStats['ProEmptyNetGoal'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProA']; $tmpTotProA=$tmpTotProA+$row_GetStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPim']; $tmpTotProPim=$tmpTotProPim+$row_GetStats['ProPim'];?></td>
                    <td align="center"><?php echo minutes($row_GetStats['ProMinPlay']); $tmpTotProMinPlay=$tmpTotProMinPlay+$row_GetStats['ProMinPlay'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetStats['ProStar1'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetStats['ProStar2'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar3']; $tmpTotStar3=$tmpTotStar3+$row_GetStats['ProStar3'];?></td>
                  </tr>
                  <?php }} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody> 
                <tfoot> 
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStartGoaler ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOTL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmSA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinPlay > 0){ echo number_format(($tmpTotFarmGA / minutes($tmpTotFarmMinPlay))*60,2);} else { echo "0"; } ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmSA > 0){echo number_format(($tmpTotFarmSA - $tmpTotFarmGA) / $tmpTotFarmSA,3);} else { echo "0"; } ?></td>
                   	<td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShutouts ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmEmptyNetGoal ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>	
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmMinPlay); ?></td>	
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar1 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar2 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar3 ,0); ?></td>		
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStartGoaler ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotSA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGA ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotProMinPlay > 0){ echo number_format(($tmpTotGA / minutes($tmpTotProMinPlay))*60,2);} else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpTotSA > 0){echo number_format(($tmpTotSA - $tmpTotGA) / $tmpTotSA,3);} else { echo "0"; } ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShutouts ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotEmptyNetGoal,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProPim ,0); ?></td>
                    <td align="center" ><?php echo minutes($tmpTotProMinPlay); ?></td>	
                    <td align="center" ><?php echo number_format($tmpTotStar1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar3 ,0); ?></td>	
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
                <?php 
					$tmpTotGP=0;
					$tmpTotStartGoaler=0;
                    $tmpTotW=$tmpTotW=0;
                    $tmpTotL=0;
                    $tmpTotOTL=0;
                    $tmpTotSA=0;
                    $tmpTotGA=0;
                    $tmpTotGAA=0;
                    $tmpTotPCT=0;
                    $tmpTotShutouts=0;
                    $tmpTotEmptyNetGoal=0;
                    $tmpTotProA=0;
                    $tmpTotProPim=0;
                    $tmpTotProMinPlay=0;
					$tmpTotFarmGP=0;
					$tmpTotFarmStartGoaler=0;
                    $tmpTotFarmW=$tmpTotW=0;
                    $tmpTotFarmL=0;
                    $tmpTotFarmOTL=0;
                    $tmpTotFarmSA=0;
                    $tmpTotFarmGA=0;
                    $tmpTotFarmGAA=0;
                    $tmpTotFarmPCT=0;
                    $tmpTotFarmShutouts=0;
                    $tmpTotFarmEmptyNetGoal=0;
                    $tmpTotFarmProA=0;
                    $tmpTotFarmProPim=0;
                    $tmpTotFarmProMinPlay=0;
					$tmpTotStar1=0;
					$tmpTotStar2=0;
					$tmpTotStar3=0;
					$tmpTotFarmStar1=0;
					$tmpTotFarmStar2=0;
					$tmpTotFarmStar3=0;
					if ($totalRows_GetPlayoffStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_GS_D;?>"><?php echo $l_GS;?></a></th>
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>			
                    <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>	
                    <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
                    <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                    <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
                    <th><a title="<?php echo $l_EG_D;?>"><?php echo $l_G;?></a></th>		
                    <th><a title="<?php echo $l_A_D ;?>"><?php echo $l_A;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_MP_D;?>"><?php echo $l_MP;?></a></th>	
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetPlayoffStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmTeamName']; ?></td>       
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetPlayoffStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStartGoaler']; $tmpTotFarmStartGoaler=$tmpTotFarmStartGoaler+$row_GetPlayoffStats['FarmStartGoaler'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmW']; $tmpTotFarmW=$tmpTotFarmW+$row_GetPlayoffStats['FarmW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmL']; $tmpTotFarmL=$tmpTotFarmL+$row_GetPlayoffStats['FarmL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmOTL']; $tmpTotFarmOTL=$tmpTotFarmOTL+$row_GetPlayoffStats['FarmOTL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmSA']; $tmpTotFarmSA=$tmpTotFarmSA+$row_GetPlayoffStats['FarmSA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGA']; $tmpTotFarmGA=$tmpTotFarmGA+$row_GetPlayoffStats['FarmGA'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmMinPlay'] > 0){echo number_format(($row_GetPlayoffStats['FarmGA'] / minutes($row_GetPlayoffStats['FarmMinPlay']))*60,2); } else { echo "0"; } ?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmMinPlay'] > 0){echo number_format(($row_GetPlayoffStats['FarmSA'] - $row_GetPlayoffStats['FarmGA']) / $row_GetPlayoffStats['FarmSA'],3); } else { echo "0"; }?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmShutouts']; $tmpTotFarmShutouts=$tmpTotFarmShutouts+$row_GetPlayoffStats['FarmShutouts'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmEmptyNetGoal']; $tmpTotFarmEmptyNetGoal=$tmpTotFarmEmptyNetGoal+$row_GetPlayoffStats['FarmEmptyNetGoal'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmA']; $tmpTotFarmA=$tmpTotFarmA+$row_GetPlayoffStats['FarmA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetPlayoffStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetPlayoffStats['FarmMinPlay']); $tmpTotFarmMinPlay=$tmpTotFarmMinPlay+$row_GetPlayoffStats['FarmMinPlay'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar1']; $tmpTotFarmStar1=$tmpTotFarmStar1+$row_GetPlayoffStats['FarmStar1'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar2']; $tmpTotFarmStar2=$tmpTotFarmStar2+$row_GetPlayoffStats['FarmStar2'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar3']; $tmpTotFarmStar3=$tmpTotFarmStar3+$row_GetPlayoffStats['FarmStar3'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStartGoaler']; $tmpTotStartGoaler=$tmpTotStartGoaler+$row_GetPlayoffStats['ProStartGoaler'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProW']; $tmpTotW=$tmpTotW+$row_GetPlayoffStats['ProW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProL']; $tmpTotL=$tmpTotL+$row_GetPlayoffStats['ProL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProOTL']; $tmpTotOTL=$tmpTotOTL+$row_GetPlayoffStats['ProOTL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProSA']; $tmpTotSA=$tmpTotSA+$row_GetPlayoffStats['ProSA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGA']; $tmpTotGA=$tmpTotGA+$row_GetPlayoffStats['ProGA'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProMinPlay'] > 0){echo number_format(($row_GetPlayoffStats['ProGA'] / minutes($row_GetPlayoffStats['ProMinPlay']))*60,2); } else { echo "0"; } ?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProMinPlay'] > 0){echo number_format(($row_GetPlayoffStats['ProSA'] - $row_GetPlayoffStats['ProGA']) / $row_GetPlayoffStats['ProSA'],3); } else { echo "0"; }?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProShutouts']; $tmpTotShutouts=$tmpTotShutouts+$row_GetPlayoffStats['ProShutouts'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProEmptyNetGoal']; $tmpTotEmptyNetGoal=$tmpTotEmptyNetGoal+$row_GetPlayoffStats['ProEmptyNetGoal'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProA']; $tmpTotProA=$tmpTotProA+$row_GetPlayoffStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPim']; $tmpTotProPim=$tmpTotProPim+$row_GetPlayoffStats['ProPim'];?></td>
                    <td align="center"><?php echo minutes($row_GetPlayoffStats['ProMinPlay']); $tmpTotProMinPlay=$tmpTotProMinPlay+$row_GetPlayoffStats['ProMinPlay'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetPlayoffStats['ProStar1'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetPlayoffStats['ProStar2'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar3']; $tmpTotStar3=$tmpTotStar3+$row_GetPlayoffStats['ProStar3'];?></td>
                  </tr>
                  <?php }} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>
                <tfoot> 
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStartGoaler ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOTL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmSA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinPlay > 0){ echo number_format(($tmpTotFarmGA / minutes($tmpTotFarmMinPlay))*60,2);} else { echo "0"; } ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmSA > 0){echo number_format(($tmpTotFarmSA - $tmpTotFarmGA) / $tmpTotFarmSA,3);} else { echo "0"; } ?></td>
                   	<td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShutouts ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmEmptyNetGoal ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>	
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmMinPlay); ?></td>	
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar1 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar2 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar3 ,0); ?></td>		
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStartGoaler ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotSA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGA ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotProMinPlay > 0){ echo number_format(($tmpTotGA / minutes($tmpTotProMinPlay))*60,2);} else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpTotSA > 0){echo number_format(($tmpTotSA - $tmpTotGA) / $tmpTotSA,3);} else { echo "0"; } ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShutouts ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotEmptyNetGoal,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProPim ,0); ?></td>
                    <td align="center" ><?php echo minutes($tmpTotProMinPlay); ?></td>	
                    <td align="center" ><?php echo number_format($tmpTotStar1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar3 ,0); ?></td>	
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
            </div>
			
			<div id="tabs-2">
            	<?php echo "<h3>".$l_Shootouts."</h3>"; 
				$tmpTotGP=0;
				$tmpTotFarmGP=0;				
				$tmpTotPenalityShotsScore=0;
				$tmpTotPenalityShotsTotal=0;
				$tmpTotFarmPenalityShotsScore=0;
				$tmpTotFarmPenalityShotsTotal=0;
				
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Shootouts; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                    <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                    <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetStats['Season'] != ""){?>
                <?php if ($row_GetStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmTeamName']; ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPenalityShotsGoals']; $tmpTotFarmPenalityShotsScore=$tmpTotFarmPenalityShotsScore+$row_GetStats['ProPenalityShotsGoals'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPenalityShotsShots']; $tmpTotFarmPenalityShotsTotal=$tmpTotFarmPenalityShotsTotal+$row_GetStats['ProPenalityShotsShots'];?></td>
                        <td align="center"><?php 
							if ($row_GetStats['FarmPenalityShotsShots'] > 0){ 
								$tmpSV = ($row_GetStats['FarmPenalityShotsGoals'] / $row_GetStats['FarmPenalityShotsShots']); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} ?></td>
                    </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPenalityShotsGoals']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetStats['ProPenalityShotsGoals'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPenalityShotsShots']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetStats['ProPenalityShotsShots'];?></td>
                  	<td align="center"><?php 
							if ($row_GetStats['ProPenalityShotsShots'] > 0){ 
								$tmpSV = ($row_GetStats['ProPenalityShotsGoals'] / $row_GetStats['ProPenalityShotsShots']); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} 
							?></td>
                  </tr>
                  <?php }}} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPenalityShotsScore; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPenalityShotsTotal; ?></td>
                    <td align="center" class="FarmStats"><?php 
							if ($tmpTotFarmPenalityShotsTotal > 0){ 
								$tmpSV = ($tmpTotFarmPenalityShotsScore / $tmpTotFarmPenalityShotsTotal); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							}  ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                    <td align="center" ><?php 
							if ($tmpTotPenalityShotsTotal > 0){ 
								$tmpSV = ($tmpTotPenalityShotsScore / $tmpTotPenalityShotsTotal); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							}  ?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
                
                <?php 
				$tmpTotGP=0;
				$tmpTotFarmGP=0;
				$tmpTotPenalityShotsScore=0;
				$tmpTotPenalityShotsTotal=0;
				$tmpTotFarmPenalityShotsScore=0;
				$tmpTotFarmPenalityShotsTotal=0;
				
				if ($totalRows_GetPlayoffStats > 0) { 
				mysql_data_seek($GetPlayoffStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Shootouts; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                    <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                    <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetPlayoffStats['Season'] != ""){?>
                <?php if ($row_GetPlayoffStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmTeamName']; ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetPlayoffStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPenalityShotsGoals']; $tmpTotFarmPenalityShotsScore=$tmpTotFarmPenalityShotsScore+$row_GetPlayoffStats['FarmPenalityShotsGoals'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPenalityShotsShots']; $tmpTotFarmPenalityShotsTotal=$tmpTotFarmPenalityShotsTotal+$row_GetPlayoffStats['FarmPenalityShotsShots'];?></td>
                        <td align="center" class="FarmStats"><?php 
							if ($row_GetPlayoffStats['FarmPenalityShotsShots'] > 0){ 
								$tmpSV = ($row_GetPlayoffStats['FarmPenalityShotsGoals'] / $row_GetPlayoffStats['FarmPenalityShotsShots']); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} ?></td>
                  </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPenalityShotsGoals']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetPlayoffStats['ProPenalityShotsGoals'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPenalityShotsShots']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetPlayoffStats['ProPenalityShotsShots'];?></td>
                  	<td align="center"><?php 
							if ($row_GetPlayoffStats['ProPenalityShotsShots'] > 0){ 
								$tmpSV = ($row_GetPlayoffStats['ProPenalityShotsGoals'] / $row_GetPlayoffStats['ProPenalityShotsShots']); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} 
							?></td>
                  </tr>
                  <?php }}} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPenalityShotsScore; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPenalityShotsTotal; ?></td>
                    <td align="center" class="FarmStats"><?php 
							if ($tmpTotFarmPenalityShotsTotal > 0){ 
								$tmpSV = ($tmpTotFarmPenalityShotsScore / $tmpTotFarmPenalityShotsTotal); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							}  ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                    <td align="center" ><?php 
							if ($tmpTotPenalityShotsTotal > 0){ 
								$tmpSV = ($tmpTotPenalityShotsScore / $tmpTotPenalityShotsTotal); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							}  ?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
			</div>
            
            <div id="tabs-3">
            <h3>Contract</h3>
            
                <div style="float:left; padding-bottom:0px">
            		<strong style="text-transform:uppercase;"><?php echo $l_SalaryBySeason; ?></strong>
                </div>
               
                <div style="font-size:9px; float:right; padding-top:4px; padding-bottom:0px">
                    * = <?php echo $l_NoTradeClause;?>
                </div>
                <?php 
				$tmpNTC = "";
				if ($row_GetPlayer['NoTrade'] == "True" || $row_GetPlayer['NoTrade'] == "Vrai"){ $tmpNTC = "<sup>&nbsp;*</sup>";}
				$tmpNTC2 = "";
				if ($row_GetContractExt['NoTrade']==1){ $tmpNTC2 = "<sup>&nbsp;*</sup>";}
				?>
                
             	<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <thead>
                <tr style="background-color:#<?php echo $PrimaryColor; ?>">
                    <th width="10%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+9)."-".substr($_SESSION['current_Season']+10, -2);?></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center"><?php if ($row_GetPlayer['Salary1'] > 0){ echo "$".number_format($row_GetPlayer['Salary1'],0).$tmpNTC;} else { echo "-"; } ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary2'] > 0){ echo "$".number_format($row_GetPlayer['Salary2'],0).$tmpNTC;} else if ($row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary3'] > 0){ echo "$".number_format($row_GetPlayer['Salary3'],0).$tmpNTC;} else if ($row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary4'] > 0){ echo "$".number_format($row_GetPlayer['Salary4'],0).$tmpNTC;} else if ($row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary5'] > 0){ echo "$".number_format($row_GetPlayer['Salary5'],0).$tmpNTC;} else if ($row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary6'] > 0){ echo "$".number_format($row_GetPlayer['Salary6'],0).$tmpNTC;} else if ($row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary7'] > 0){ echo "$".number_format($row_GetPlayer['Salary7'],0).$tmpNTC;} else if ($row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary8'] > 0){ echo "$".number_format($row_GetPlayer['Salary8'],0).$tmpNTC;} else if ($row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary9'] > 0){ echo "$".number_format($row_GetPlayer['Salary9'],0).$tmpNTC;} else if ($row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetPlayer['Salary10'] > 0){ echo "$".number_format($row_GetPlayer['Salary10'],0).$tmpNTC;} else if ($row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0).$tmpNTC2."</span>"; } else { echo "-"; }  ?></td>
                  </tr>
                </tbody>
                </table>
                
                <strong style="text-transform:uppercase;"><?php echo $l_ContractDetails; ?></strong>
            	<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <thead>
                <tr style="background-color:#<?php echo $PrimaryColor; ?>">
                    <th><?php echo $l_ContractLength; ?></th>
                    <th><?php echo $l_ContractType; ?></th>
                    <th><?php echo $l_NoTradeClause; ?></th>
                    <th><?php echo $l_AvailableTrade; ?></th>
                    <th><?php echo $l_ContractExt; ?></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayer['Contract']." ".$l_t_years; ?></td>
                    <td align="center"><?php if ($row_GetPlayer['CanPlayFarm'] == "False" || $row_GetPlayer['CanPlayFarm'] == "Faux"){ echo $l_OneWay;} else { echo $l_TwoWay; } ?></td>
                    <td align="center"><?php if ($row_GetPlayer['NoTrade'] == "True" || $row_GetPlayer['NoTrade'] == "Vrai"){ echo $l_Yes;} else { echo $l_No; } ?></td>
                    <td align="center"><?php if ($row_GetPlayer['AvailableforTrade'] == "True" || $row_GetPlayer['AvailableforTrade'] == "Vrai"){ echo $l_Yes;} else { echo $l_No; } ?></td>
                    <td align="center">
					<?php 
						if ($totalRows_GetContractExt > 0) {
							$tmpCapHit = 0;
							$tmpCapHitCount = 0;
							if ($row_GetContractExt['Salary1'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary1'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary2'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary2'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary3'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary3'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary4'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary4'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary5'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary5'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary6'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary6'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary7'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary7'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary8'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary8'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary9'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary9'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary10'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary10'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							echo $row_GetContractExt['Contract']." ".$l_t_years.", $".number_format($tmpCapHit / $tmpCapHitCount,0)." ".$l_AvgCapHit;
						} else { 
							if(isset($_SESSION['U_ID'])){
								if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
									if ($totalRows_GetContractExt == 0) {
										if ($row_GetPlayer['Contract'] ==1){
											echo '<a href="contract_extension.php?team='.$_SESSION["current_Team_ID"].'&player='.$row_GetPlayer["Number"].'&type=goalie"><strong>'.$l_OfferContract.'</strong></a></li>';
										}
									}
								} else {
									echo $l_No; 
								}
							} else {
								echo $l_No; 
							}
						} 
					?>
                    </td>
                  </tr>
                </tbody>
                </table>
			</div>
			<div id="tabs-4">
            	<?php echo "<h3>".$l_Transactions."</h3>"; ?>
                <strong style="text-transform:uppercase;"><?php echo $l_TransactionHistory; ?></strong>
                <br /><br />
               	<ul>
				<?php 
                if ($totalRows_GetNotes > 0){
					do {
						echo "<li>".$row_GetNotes['Value']."</li>";
					} while ($row_GetNotes = mysql_fetch_assoc($GetNotes));
                } else {
					echo "<li><?php echo $l_None; ?></li>";
                } 
                ?>
                </ul>
			</div>
            <div id="tabs-5">
            	<h3><?php echo $l_Notes; ?></h3>
                <?php if ($row_GetPlayer['BIO'] != ""){ echo $row_GetPlayer['BIO'];}?>
				<br clear="all" />
                
                <?php
                if ($totalRows_GetFarmTrophyPlayoffsChampions > 0 || $totalRows_GetTrophyPlayoffsChampions > 0 || $totalRows_GetTrophyLowestGAA > 0 || $totalRows_GetTrophyGoalieOfTheYear > 0 || $totalRows_GetTrophyRookieOfTheYear > 0 || $totalRows_GetTrophyPlayoffMVP > 0 || $totalRows_GetTrophyMVP > 0 || $totalRows_GetFarmTrophyLowestGAA > 0 || $totalRows_GetFarmTrophyGoalieOfTheYear > 0 || $totalRows_GetFarmTrophyRookieOfTheYear > 0 || $totalRows_GetFarmTrophyPlayoffMVP > 0 || $totalRows_GetFarmTrophyMVP > 0){

					echo '<strong style="text-transform:uppercase;">'.$l_Awards.'</strong>';
	               	echo '<br /><br /><ul style="list-style-type:disc; list-style-position:inside;">';

					if ($totalRows_GetTrophyPlayoffsChampions > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=PlayoffsChampions'>".$row_GetTrophyNames['PlayoffsChampions']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyPlayoffsChampions['Season'];
							if($i < $totalRows_GetTrophyPlayoffsChampions){ echo ", "; }
						} while ($row_GetTrophyPlayoffsChampions = mysql_fetch_assoc($GetTrophyPlayoffsChampions));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyMVP > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=MVP'>".$row_GetTrophyNames['MVP']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyMVP['Season'];
							if($i < $totalRows_GetTrophyMVP){ echo ", "; }
						} while ($row_GetTrophyMVP = mysql_fetch_assoc($GetTrophyMVP));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyPlayoffMVP > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=PlayoffMVP'>".$row_GetTrophyNames['PlayoffMVP']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyPlayoffMVP['Season'];
							if($i < $totalRows_GetTrophyPlayoffMVP){ echo ", "; }
						} while ($row_GetTrophyPlayoffMVP = mysql_fetch_assoc($GetTrophyPlayoffMVP));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyRookieOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=RookieOfTheYear'>".$row_GetTrophyNames['RookieOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyRookieOfTheYear['Season'];
							if($i < $totalRows_GetTrophyRookieOfTheYear){ echo ", "; }
						} while ($row_GetTrophyRookieOfTheYear = mysql_fetch_assoc($GetTrophyRookieOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyGoalieOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=GoalieOfTheYear'>".$row_GetTrophyNames['GoalieOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyGoalieOfTheYear['Season'];
							if($i < $totalRows_GetTrophyGoalieOfTheYea){ echo ", "; }
						} while ($row_GetTrophyGoalieOfTheYear = mysql_fetch_assoc($GetTrophyGoalieOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyLowestGAA > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=LowestGAA'>".$row_GetTrophyNames['LowestGAA']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyLowestGAA['Season'];
							if($i < $totalRows_GetTrophyLowestGAA){ echo ", "; }
						} while ($row_GetTrophyLowestGAA = mysql_fetch_assoc($GetTrophyLowestGAA));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyPlayoffsChampions > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmPlayoffsChampions'>".$row_GetTrophyNames['FarmPlayoffsChampions']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyPlayoffsChampions['Season'];
							if($i < $totalRows_GetFarmTrophyPlayoffsChampions){ echo ", "; }
						} while ($row_GetFarmTrophyPlayoffsChampions = mysql_fetch_assoc($GetFarmTrophyPlayoffsChampions));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyMVP > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmMVP'>".$row_GetTrophyNames['FarmMVP']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyMVP['Season'];
							if($i < $totalRows_GetFarmTrophyMVP){ echo ", "; }
						} while ($row_GetFarmTrophyMVP = mysql_fetch_assoc($GetFarmTrophyMVP));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyPlayoffMVP > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmPlayoffMVP'>".$row_GetTrophyNames['FarmPlayoffMVP']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyPlayoffMVP['Season'];
							if($i < $totalRows_GetFarmTrophyPlayoffMVP){ echo ", "; }
						} while ($row_GetFarmTrophyPlayoffMVP = mysql_fetch_assoc($GetFarmTrophyPlayoffMVP));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyRookieOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmRookieOfTheYear'>".$row_GetTrophyNames['FarmRookieOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyRookieOfTheYear['Season'];
							if($i < $totalRows_GetFarmTrophyRookieOfTheYear){ echo ", "; }
						} while ($row_GetFarmTrophyRookieOfTheYear = mysql_fetch_assoc($GetFarmTrophyRookieOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyGoalieOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmGoalieOfTheYear'>".$row_GetTrophyNames['FarmGoalieOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyGoalieOfTheYear['Season'];
							if($i < $totalRows_GetFarmTrophyGoalieOfTheYea){ echo ", "; }
						} while ($row_GetFarmTrophyGoalieOfTheYear = mysql_fetch_assoc($GetFarmTrophyGoalieOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyLowestGAA > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmLowestGAA'>".$row_GetTrophyNames['FarmLowestGAA']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyLowestGAA['Season'];
							if($i < $totalRows_GetFarmTrophyLowestGAA){ echo ", "; }
						} while ($row_GetFarmTrophyLowestGAA = mysql_fetch_assoc($GetFarmTrophyLowestGAA));
						echo "</li>";
					}
				
				echo '</ul><br /><br />';
				}
				?>
                
                <strong style="text-transform:uppercase;"><?php echo $l_Links; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <tbody>
                  <tr>
                    <td align="center"><a href="#" onClick="document.forcaster.submit()">CBC.ca - Forecaster</a></td>
					<td align="center"><a href="#" onClick="document.thestar.submit()">theStar.com - Way More Sports</a></td>
                    <td align="center"><a href="http://www.hockeydb.com/ihdb/stats/findplayer.php3?full_name=<?php echo $row_GetPlayer['Name']; ?>" target="_blank">The Internet Hockey Database</a></td>
					<td align="center"><a href="#" onClick="document.tsn.submit()">TSN.ca</a></td>
					<td align="center"><a href="#" onClick="document.nhl.submit()">NHL.com</a></td>
					<td align="center"><a href="#" onClick="document.hnews.submit()">Hockey News - Forecaster</a></td>
                  </tr>
                 </tbody>
                 </table>
                    <form method=post action='http://www.forecaster.ca/cbc/hockey/playerindex.cgi' name='forcaster' target='new'>
                    <input type="hidden" name="x_param" value="search" />
                    <input type="hidden" name="x_option" value="<?php echo $row_GetPlayer['Name']; ?>" />
                    </form>
                    <form method=post action='http://tsf.waymoresports.thestar.com/thestar/hockey/playerindex.cgi' name="thestar"  target='new'>
                    <input type="hidden" name='x_param' value='search' />
                    <input type="hidden" name='x_option' value="<?php echo $row_GetPlayer['Name']; ?>" />
                    </form>
                    <form method=post action='http://www.tsn.ca/nhl/teams/players/?name=<?php echo $row_GetPlayer['Name']; ?>' name="tsn" target='new'></form>
                    <form method=post action='http://www.nhl.com/ice/search.htm'  target='new'>
                    <input type="hidden" name='q' value="<?php echo $row_GetPlayer['Name']; ?>" />
                    <input type="hidden" name="component" value="$PlayerSearchComponent.$SimpleForm"/>
                    </form>
                    <form method=post action='http://forecaster.thehockeynews.com/hockeynews/hockey/playerindex.cgi' name="hnews" target='new'>
                    <input type="hidden" name="x_param" value="search" />
                    <input type="hidden" name="x_option" value="<?php echo $row_GetPlayer['Name']; ?>" />
                    </form>
                  
			</div>
		</div>
    </section>

</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
