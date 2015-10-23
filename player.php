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
	$l_ChangePlayer = "OPTIONS";
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
	$l_rejectWait = "The agent asks that you wait 24 hours before asking him to waive his no trade clause again.";
	$l_TradeRequest = "No Trade Claused Waived - Trade Requested";
	$l_TradeRequestExt = "Contract Extension Negotiations Ended - Trade Requested";
	$l_TradeRequestUFA = "Contract Extension Negotiations Ended - Ready for free agency";
	$l_TradeRequestDesc = "%item1 has ended contract extension negotiations with the %item2.  He would consider contract extension negotiations with any of the following teams: ";
	$l_TradeRequestDesc2 = "%item1 has ended contract extension negotiations with the %item2.  He <strong>will not</strong> consider contract extension negotiations with any team and will be going to free agency this off season.";
	$l_TradeRequestDesc1 = "%item1 has waived his no trade clause to be traded to any of the following teams:<br />";
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
	$l_ChangePlayer = "OPTIONS";
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
	$l_PlayerRatings = "Cotes du joueur";
	$l_Playoffs = "S&eacute;ries &eacute;liminatoires";
	$l_ProCareerStats = "Stats Pro en Carri&egrave;re";
	$l_ProTotals = "TOTAL PRO";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_restricted_free_agents = " AGENTS LIBRES AVEC RESTRICTIONS ";
	$l_Roster = "Alignement";
	$l_SalaryBySeason = "Salaire par Saison";
	$l_Shootouts = "Tir de Barrage";
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

$query_GetPlayer = sprintf("SELECT * FROM players WHERE players.Number=%s", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetStats = sprintf("SELECT (SELECT Name FROM farmteam WHERE Number=playerstats.Team) as FarmTeamName, proteam.Name as ProTeamName, playerstats.*,  seasons.Season FROM playerstats, seasons, proteam WHERE proteam.Number= playerstats.Team AND seasons.S_ID = playerstats.Season_ID AND playerstats.Number = %s AND seasons.SeasonType=1 ORDER BY seasons.Season, playerstats.STAT_ID ASC",$PID_GetPlayer);
$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats = mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetPlayoffStats = sprintf("SELECT (SELECT Name FROM farmteam WHERE Number=playerstats.Team) as FarmTeamName, proteam.Name as ProTeamName, playerstats.*, seasons.Season FROM playerstats, seasons, proteam WHERE proteam.Number= playerstats.Team AND seasons.S_ID = playerstats.Season_ID AND playerstats.Number = %s AND seasons.SeasonType=0 ORDER BY seasons.Season, playerstats.STAT_ID ASC",$PID_GetPlayer);
$GetPlayoffStats = mysql_query($query_GetPlayoffStats, $connection) or die(mysql_error());
$row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats);
$totalRows_GetPlayoffStats = mysql_num_rows($GetPlayoffStats);

$query_GetPlayerExtensionOffersCT = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s AND Type='Extension' ORDER BY DateCreated DESC ", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffersCT = mysql_query($query_GetPlayerExtensionOffersCT, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersCT = mysql_fetch_assoc($GetPlayerExtensionOffersCT);
$totalRows_GetPlayerExtensionOffersCT = mysql_num_rows($GetPlayerExtensionOffersCT);

$query_GetPlayerExtensionOffersTeams = sprintf("SELECT Team FROM playersextensionoffers WHERE Player=%s AND Type='Extension' GROUP BY Team ", $PID_GetPlayer);
$GetPlayerExtensionOffersTeams = mysql_query($query_GetPlayerExtensionOffersTeams, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersTeams = mysql_fetch_assoc($GetPlayerExtensionOffersTeams);
$totalRows_GetPlayerExtensionOffersTeams = mysql_num_rows($GetPlayerExtensionOffersTeams);

$query_GetTrophyNames = sprintf("SELECT * FROM trophies ");
$GetTrophyNames = mysql_query($query_GetTrophyNames, $connection) or die(mysql_error());
$row_GetTrophyNames = mysql_fetch_assoc($GetTrophyNames);
$totalRows_GetTrophyNames = mysql_num_rows($GetTrophyNames);

$query_GetTrophyPlayoffsChampions = sprintf("SELECT x.Season, p.Name, l.Name, q.ProGP FROM playerstats as q, players as l, proteam as p, proteamstandings as s, seasons as x WHERE q.Name='%s' AND q.ProGP > 0 AND q.Active='True' AND q.Name=l.Name AND l.Team=p.Number AND p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') group by x.Season order by x.Season desc",$PID_GetPlayer);
$GetTrophyPlayoffsChampions = mysql_query($query_GetTrophyPlayoffsChampions, $connection) or die(mysql_error());
$row_GetTrophyPlayoffsChampions = mysql_fetch_assoc($GetTrophyPlayoffsChampions);
$totalRows_GetTrophyPlayoffsChampions = mysql_num_rows($GetTrophyPlayoffsChampions);

$query_GetTrophyMVP = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.MVP=%s AND p.Number=MVP AND t.Season_ID=s.Season AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyMVP = mysql_query($query_GetTrophyMVP, $connection) or die(mysql_error());
$row_GetTrophyMVP = mysql_fetch_assoc($GetTrophyMVP);
$totalRows_GetTrophyMVP = mysql_num_rows($GetTrophyMVP);

$query_GetTrophyRookieOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.RookieOfTheYear=%s AND p.Number=RookieOfTheYear AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyRookieOfTheYear = mysql_query($query_GetTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyRookieOfTheYear = mysql_fetch_assoc($GetTrophyRookieOfTheYear);
$totalRows_GetTrophyRookieOfTheYear = mysql_num_rows($GetTrophyRookieOfTheYear);

$query_GetTrophyPlayoffMVP = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.PlayoffMVP=%s AND p.Number=PlayoffMVP AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyPlayoffMVP = mysql_query($query_GetTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetTrophyPlayoffMVP = mysql_fetch_assoc($GetTrophyPlayoffMVP);
$totalRows_GetTrophyPlayoffMVP = mysql_num_rows($GetTrophyPlayoffMVP);

$query_GetTrophyTopScorer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.TopScorer=%s AND p.Number=TopScorer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyTopScorer = mysql_query($query_GetTrophyTopScorer, $connection) or die(mysql_error());
$row_GetTrophyTopScorer = mysql_fetch_assoc($GetTrophyTopScorer);
$totalRows_GetTrophyTopScorer = mysql_num_rows($GetTrophyTopScorer);

$query_GetTrophyTopGoalScorer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.TopGoalScorer=%s AND p.Number=TopGoalScorer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyTopGoalScorer = mysql_query($query_GetTrophyTopGoalScorer, $connection) or die(mysql_error());
$row_GetTrophyTopGoalScorer = mysql_fetch_assoc($GetTrophyTopGoalScorer);
$totalRows_GetTrophyTopGoalScorer = mysql_num_rows($GetTrophyTopGoalScorer);

$query_GetTrophyDefensemanOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.DefensemanOfTheYear=%s AND p.Number=DefensemanOfTheYear AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyDefensemanOfTheYear = mysql_query($query_GetTrophyDefensemanOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetTrophyDefensemanOfTheYear);
$totalRows_GetTrophyDefensemanOfTheYear = mysql_num_rows($GetTrophyDefensemanOfTheYear);

$query_GetTrophyBestDefensiveForward = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.BestDefensiveForward=%s AND p.Number=BestDefensiveForward AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyBestDefensiveForward = mysql_query($query_GetTrophyBestDefensiveForward, $connection) or die(mysql_error());
$row_GetTrophyBestDefensiveForward = mysql_fetch_assoc($GetTrophyBestDefensiveForward);
$totalRows_GetTrophyBestDefensiveForward = mysql_num_rows($GetTrophyBestDefensiveForward);

$query_GetTrophyMostSportsmanlikePlayer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.MostSportsmanlikePlayer=%s AND p.Number=MostSportsmanlikePlayer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyMostSportsmanlikePlayer = mysql_query($query_GetTrophyMostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_GetTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetTrophyMostSportsmanlikePlayer);
$totalRows_GetTrophyMostSportsmanlikePlayer = mysql_num_rows($GetTrophyMostSportsmanlikePlayer);

$query_GetTrophyLowestPIM = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.LowestPIM=%s AND p.Number=LowestPIM AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetTrophyLowestPIM = mysql_query($query_GetTrophyLowestPIM, $connection) or die(mysql_error());
$row_GetTrophyLowestPIM = mysql_fetch_assoc($GetTrophyLowestPIM);
$totalRows_GetTrophyLowestPIM = mysql_num_rows($GetTrophyLowestPIM);

$query_GetFarmTrophyPlayoffsChampions = sprintf("SELECT x.Season, p.Name, l.Name, q.FarmGP FROM playerstats as q, players as l, farmteam as p, farmteamstandings as s, seasons as x WHERE q.Name=%s AND q.FarmGP > 0 AND q.Active='True' AND q.Name=l.Name AND l.Team=p.Number AND p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') group by x.Season order by x.Season desc",$PID_GetPlayer);
$GetFarmTrophyPlayoffsChampions = mysql_query($query_GetFarmTrophyPlayoffsChampions, $connection) or die(mysql_error());
$row_GetFarmTrophyPlayoffsChampions = mysql_fetch_assoc($GetFarmTrophyPlayoffsChampions);
$totalRows_GetFarmTrophyPlayoffsChampions = mysql_num_rows($GetFarmTrophyPlayoffsChampions);

$query_GetFarmTrophyMVP = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmMVP=%s AND p.Number=FarmMVP AND t.Season_ID=s.Season AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyMVP = mysql_query($query_GetFarmTrophyMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyMVP = mysql_fetch_assoc($GetFarmTrophyMVP);
$totalRows_GetFarmTrophyMVP = mysql_num_rows($GetFarmTrophyMVP);

$query_GetFarmTrophyRookieOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmRookieOfTheYear=%s AND p.Number=FarmRookieOfTheYear AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyRookieOfTheYear = mysql_query($query_GetFarmTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyRookieOfTheYear = mysql_fetch_assoc($GetFarmTrophyRookieOfTheYear);
$totalRows_GetFarmTrophyRookieOfTheYear = mysql_num_rows($GetFarmTrophyRookieOfTheYear);

$query_GetFarmTrophyPlayoffMVP = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmPlayoffMVP=%s AND p.Number=FarmPlayoffMVP AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyPlayoffMVP = mysql_query($query_GetFarmTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyPlayoffMVP = mysql_fetch_assoc($GetFarmTrophyPlayoffMVP);
$totalRows_GetFarmTrophyPlayoffMVP = mysql_num_rows($GetFarmTrophyPlayoffMVP);

$query_GetFarmTrophyTopScorer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmTopScorer=%s AND p.Number=FarmTopScorer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyTopScorer = mysql_query($query_GetFarmTrophyTopScorer, $connection) or die(mysql_error());
$row_GetFarmTrophyTopScorer = mysql_fetch_assoc($GetFarmTrophyTopScorer);
$totalRows_GetFarmTrophyTopScorer = mysql_num_rows($GetFarmTrophyTopScorer);

$query_GetFarmTrophyTopGoalScorer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmTopGoalScorer=%s AND p.Number=FarmTopGoalScorer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyTopGoalScorer = mysql_query($query_GetFarmTrophyTopGoalScorer, $connection) or die(mysql_error());
$row_GetFarmTrophyTopGoalScorer = mysql_fetch_assoc($GetFarmTrophyTopGoalScorer);
$totalRows_GetFarmTrophyTopGoalScorer = mysql_num_rows($GetFarmTrophyTopGoalScorer);

$query_GetFarmTrophyDefensemanOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmDefensemanOfTheYear=%s AND p.Number=FarmDefensemanOfTheYear AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyDefensemanOfTheYear = mysql_query($query_GetFarmTrophyDefensemanOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetFarmTrophyDefensemanOfTheYear);
$totalRows_GetFarmTrophyDefensemanOfTheYear = mysql_num_rows($GetFarmTrophyDefensemanOfTheYear);

$query_GetFarmTrophyBestDefensiveForward = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmBestDefensiveForward=%s AND p.Number=FarmBestDefensiveForward AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyBestDefensiveForward = mysql_query($query_GetFarmTrophyBestDefensiveForward, $connection) or die(mysql_error());
$row_GetFarmTrophyBestDefensiveForward = mysql_fetch_assoc($GetFarmTrophyBestDefensiveForward);
$totalRows_GetFarmTrophyBestDefensiveForward = mysql_num_rows($GetFarmTrophyBestDefensiveForward);

$query_GetFarmTrophyMostSportsmanlikePlayer = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmMostSportsmanlikePlayer=%s AND p.Number=FarmMostSportsmanlikePlayer AND t.Team=0 AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyMostSportsmanlikePlayer = mysql_query($query_GetFarmTrophyMostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_GetFarmTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetFarmTrophyMostSportsmanlikePlayer);
$totalRows_GetFarmTrophyMostSportsmanlikePlayer = mysql_num_rows($GetFarmTrophyMostSportsmanlikePlayer);

$query_GetFarmTrophyLowestPIM = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, playerstats as p WHERE t.FarmLowestPIM=%s AND t.Team=0 AND p.Number=FarmLowestPIM AND p.Season_ID=s.S_ID AND s.Season=t.Season_ID GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetPlayer);
$GetFarmTrophyLowestPIM = mysql_query($query_GetFarmTrophyLowestPIM, $connection) or die(mysql_error());
$row_GetFarmTrophyLowestPIM = mysql_fetch_assoc($GetFarmTrophyLowestPIM);
$totalRows_GetFarmTrophyLowestPIM = mysql_num_rows($GetFarmTrophyLowestPIM);

$tmpStatus = $row_GetPlayer['Status0'];
$PID_GetPlayer=addslashes($row_GetPlayer['Name']);
if ($row_GetPlayer['Team']==""){
	$tmpTeamNumber = 0;
} else {
	$tmpTeamNumber = $row_GetPlayer['Team'];
}

if ($tmpStatus==0){
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, f.Number, f.Name, f.Abbre, f.City, f.LogoLarge, f.LogoSmall, f.HeaderImage, f.LogoTiny, f.PrimaryColor, f.SecondaryColor FROM farmteam as f, farmteamstandings as s WHERE f.Number=s.Number AND f.Number=%s ", $tmpTeamNumber);
} else {
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, p.Number,  p.Name,  p.Abbre,  p.City,  p.LogoLarge,  p.LogoSmall,  p.HeaderImage, p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Number=%s ", $tmpTeamNumber);
}
$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);
$totalRows_GetTeamInfo = mysql_num_rows($GetTeamInfo);

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

if ($tmpStatus <= 1){
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 <= 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 <= 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
} else {
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 > 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 > 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
}
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetContractExt = sprintf("SELECT * FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension' AND PlayerType='player'", $row_GetPlayer['Number']);
$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
$totalRows_GetContractExt = mysql_num_rows($GetContractExt);

$query_GetWaivers = sprintf("SELECT Player FROM waiver WHERE Player='%s'", $PID_GetPlayer);
$GetWaivers = mysql_query($query_GetWaivers, $connection) or die(mysql_error());
$row_GetWaivers = mysql_fetch_assoc($GetWaivers);
$totalRows_GetWaivers = mysql_num_rows($GetWaivers);

$query_GetDraftInfo = sprintf("SELECT D.*, S.Season, t.Name as OwnBy FROM seasons as S, draftpicks as D, draft as DD, proteam as t WHERE t.Number=D.OwnBy AND D.Name='%s' AND D.Year=DD.Year AND DD.Season_ID=S.Season", $PID_GetPlayer);
$GetDraftInfo = mysql_query($query_GetDraftInfo, $connection) or die(mysql_error());
$row_GetDraftInfo = mysql_fetch_assoc($GetDraftInfo);
$totalRows_GetDraftInfo = mysql_num_rows($GetDraftInfo);


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
$PlayerAI=$row_GetInfo['PlayerAI'];
$RecoveryRate=$row_GetInfo['RecoveryRate'];
$UFA = $row_GetInfo['UFA'];
$ContractExtensionFormula = $row_GetInfo['ContractExtensionFormula'];
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
								echo '<a href="edit_player.php?team='.$_SESSION['current_Team_ID'].'&player='.$row_GetPlayer['Number'].'" class="button edit">'.$l_EditPlayer.'</a>';
								if ($totalRows_GetContractExt == 0) {
									if ($row_GetPlayer['Contract'] ==1 && $ContractExtensionFormula == 1){
										echo '&nbsp;&nbsp;<a href="contractExtension.php?team='.$_SESSION["current_Team_ID"].'&player='.$row_GetPlayer["Number"].'" style="padding-left:20px" class="button like">'.$l_OfferContract.'</a></li>';
									}
								}
								
							}
						}
						?>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="vertical-align:bottom;">Position(s): <strong>
                        <?php
							if ($row_GetPlayer['PosC'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_Center."</li>";
							}
							if ($row_GetPlayer['PosLW'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_LeftWing."</li>";
							}
							if ($row_GetPlayer['PosRW'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_RightWing."</li>";
							}
							if ($row_GetPlayer['PosD'] == "True" || $row_GetPlayer['PosD'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_Defence."</li>";
							}
							
							
						?>
                    	</strong></td>
                        <td>Status:
                        <?php
							echo "<strong>";
							if($row_GetPlayer['Status0'] == 0 && $row_GetPlayer['Retired']==0){
								echo "Not Active";
							} else if($row_GetPlayer['Status0'] == 1){
								echo "Farm Team";
							} else if($row_GetPlayer['Status0'] > 1){
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
								$query_RFA = sprintf("SELECT P.Name FROM players as P WHERE Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=P.Number AND E.Type='Extension' AND E.PlayerType <> 'goalie') AND P.Age < %s AND P.Number=%s",$UFA, $row_GetPlayer['Number']);
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
								echo $l_Condition.":<strong>";
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
          
        <?php 
			$tradeRequest = 0;
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
			
				$json = checkMarketValue($row_GetPlayer["Number"],'player', $connection);
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
			
					$json = checkMarketValue($row_GetPlayer["Number"],'player', $connection);
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
				$json = checkMarketValue($row_GetPlayer["Number"],'player', $connection);
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
			
			$json = checkMarketValue($row_GetPlayer["Number"],'player', $connection);
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
            <input type="hidden" name="type" value="player">
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
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
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
        <br />
            
  		<div id="tabs">
            <div id="tabs-1">
                <?php
					echo "<h3>".$l_Summary."</h3>";
					$tmpTotGP=0;
					$tmpTotG=0;
					$tmpTotA=0;
					$tmpTotPoint=0;
					$tmpTotPlusMinus=0;
					$tmpTotPim=0;
					$tmpTotShots=0;
					$tmpTotPPG=0;
					$tmpTotPKG=0;
					$tmpTotGW=0;
					$tmpTotGT=0;
					$tmpTotShots=0;
					$tmpTotFarmGP=0;
					$tmpTotFarmG=0;
					$tmpTotFarmA=0;
					$tmpTotFarmPoint=0;
					$tmpTotFarmPlusMinus=0;
					$tmpTotFarmPim=0;
					$tmpTotFarmShots=0;
					$tmpTotFarmPPG=0;
					$tmpTotFarmPKG=0;
					$tmpTotFarmGW=0;
					$tmpTotFarmGT=0;
					$tmpTotFarmShots=0;
					if ($totalRows_GetStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                    <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_PP_D;?>"><?php echo $l_PP;?></a></th>	
                    <th><a title="<?php echo $l_SH_D;?>"><?php echo $l_SH;?></a></th>				
                    <th><a title="<?php echo $l_GW_D;?>"><?php echo $l_GW;?></a></th>	
                    <th><a title="<?php echo $l_GT_D;?>"><?php echo $l_GT;?></a></th>	
                    <th><a title="<?php echo $l_SHT_D ;?>"><?php echo $l_SHT;?></a></th>	
                    <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmTeamName']; ?></td>       
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmG']; $tmpTotFarmG=$tmpTotFarmG+$row_GetStats['FarmG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmA']; $tmpTotFarmA=$tmpTotFarmA+$row_GetStats['FarmA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPoint']; $tmpTotFarmPoint=$tmpTotFarmPoint+$row_GetStats['FarmPoint'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPlusMinus']; $tmpTotFarmPlusMinus=$tmpTotFarmPlusMinus+$row_GetStats['FarmPlusMinus'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPPG']; $tmpTotFarmPPG=$tmpTotFarmPPG+$row_GetStats['FarmPPG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPKG']; $tmpTotFarmPKG=$tmpTotFarmPKG+$row_GetStats['FarmPKG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGW']; $tmpTotFarmGW=$tmpTotFarmGW+$row_GetStats['FarmGW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGT']; $tmpTotFarmGT=$tmpTotFarmGT+$row_GetStats['FarmGT'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmShots']; $tmpTotFarmShots=$tmpTotFarmShots+$row_GetStats['FarmShots'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmShots'] > 0){ echo number_format(($row_GetStats['FarmG'] / $row_GetStats['FarmShots']) * 100,1); } else { echo 0;}?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>           
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProG']; $tmpTotG=$tmpTotG+$row_GetStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProA']; $tmpTotA=$tmpTotA+$row_GetStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPoint']; $tmpTotPoint=$tmpTotPoint+$row_GetStats['ProPoint'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPlusMinus']; $tmpTotPlusMinus=$tmpTotPlusMinus+$row_GetStats['ProPlusMinus'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPim']; $tmpTotPim=$tmpTotPim+$row_GetStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetStats['ProPPG'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetStats['ProPKG'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGW']; $tmpTotGW=$tmpTotGW+$row_GetStats['ProGW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGT']; $tmpTotGT=$tmpTotGT+$row_GetStats['ProGT'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProShots']; $tmpTotShots=$tmpTotShots+$row_GetStats['ProShots'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProShots'] > 0){ echo number_format(($row_GetStats['ProG'] / $row_GetStats['ProShots']) * 100,1); } else { echo 0;}?></td>
                  </tr>
                  <?php }} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody> 
                <tfoot> 
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPoint ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPlusMinus ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPPG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPKG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGT ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShots ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmShots > 0){ echo number_format(($tmpTotFarmG / $tmpTotFarmShots) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPoint ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPlusMinus ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPPG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPKG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShots ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotShots > 0){ echo number_format(($tmpTotG / $tmpTotShots) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
                <?php 
					$tmpTotGP=0;
					$tmpTotG=0;
					$tmpTotA=0;
					$tmpTotPoint=0;
					$tmpTotPlusMinus=0;
					$tmpTotPim=0;
					$tmpTotShots=0;
					$tmpTotPPG=0;
					$tmpTotPKG=0;
					$tmpTotGW=0;
					$tmpTotGT=0;
					$tmpTotShots=0;
					$tmpTotFarmGP=0;
					$tmpTotFarmG=0;
					$tmpTotFarmA=0;
					$tmpTotFarmPoint=0;
					$tmpTotFarmPlusMinus=0;
					$tmpTotFarmPim=0;
					$tmpTotFarmShots=0;
					$tmpTotFarmPPG=0;
					$tmpTotFarmPKG=0;
					$tmpTotFarmGW=0;
					$tmpTotFarmGT=0;
					$tmpTotFarmShots=0;
					if ($totalRows_GetPlayoffStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                    <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_PP_D;?>"><?php echo $l_PP;?></a></th>	
                    <th><a title="<?php echo $l_SH_D;?>"><?php echo $l_SH;?></a></th>				
                    <th><a title="<?php echo $l_GW_D;?>"><?php echo $l_GW;?></a></th>	
                    <th><a title="<?php echo $l_GT_D;?>"><?php echo $l_GT;?></a></th>	
                    <th><a title="<?php echo $l_SHT_D ;?>"><?php echo $l_SHT;?></a></th>	
                    <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetPlayoffStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmTeamName']; ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetPlayoffStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmG']; $tmpTotFarmG=$tmpTotFarmG+$row_GetPlayoffStats['FarmG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmA']; $tmpTotFarmA=$tmpTotFarmA+$row_GetPlayoffStats['FarmA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPoint']; $tmpTotFarmPoint=$tmpTotFarmPoint+$row_GetPlayoffStats['FarmPoint'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPlusMinus']; $tmpTotPFarmlusMinus=$tmpTotFarmPlusMinus+$row_GetPlayoffStats['FarmPlusMinus'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetPlayoffStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPPG']; $tmpTotFarmPPG=$tmpTotFarmPPG+$row_GetPlayoffStats['FarmPPG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPKG']; $tmpTotFarmPKG=$tmpTotFarmPKG+$row_GetPlayoffStats['FarmPKG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGW']; $tmpTotFarmGW=$tmpTotFarmGW+$row_GetPlayoffStats['FarmGW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGT ']; $tmpTotFarmGT=$tmpTotFarmGT+$row_GetPlayoffStats['FarmGT '];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmShots']; $tmpTotFarmShots=$tmpTotFarmShots+$row_GetPlayoffStats['FarmShots'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmShots'] > 0){ echo number_format(($row_GetPlayoffStats['FarmG'] / $row_GetPlayoffStats['FarmShots']) * 100,1); } else { echo 0;}?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProG']; $tmpTotG=$tmpTotG+$row_GetPlayoffStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProA']; $tmpTotA=$tmpTotA+$row_GetPlayoffStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPoint']; $tmpTotPoint=$tmpTotPoint+$row_GetPlayoffStats['ProPoint'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPlusMinus']; $tmpTotPlusMinus=$tmpTotPlusMinus+$row_GetPlayoffStats['ProPlusMinus'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPim']; $tmpTotPim=$tmpTotPim+$row_GetPlayoffStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetPlayoffStats['ProPPG'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetPlayoffStats['ProPKG'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGW']; $tmpTotGW=$tmpTotGW+$row_GetPlayoffStats['ProGW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGT']; $tmpTotGT=$tmpTotGT+$row_GetPlayoffStats['ProGT'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProShots']; $tmpTotShots=$tmpTotShots+$row_GetPlayoffStats['ProShots'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProShots'] > 0){ echo number_format(($row_GetPlayoffStats['ProG'] / $row_GetPlayoffStats['ProShots']) * 100,1); } else { echo 0;}?></td>
                  </tr>
                  <?php }} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>
                <tfoot> 
                <?php if ($tmpTotFarmGP > 0){?>       
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmA ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPoint ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPlusMinus ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPPG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPKG ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGT ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShots ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmShots > 0){ echo number_format(($tmpTotFarmG / $tmpTotFarmShots) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPoint ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPlusMinus ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPPG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPKG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShots ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotShots > 0){echo number_format(($tmpTotG / $tmpTotShots) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
            </div>
			<div id="tabs-2">
                <?php   echo "<h3>".$l_ExtSummary."</h3>"; 
				$tmpTotGP=0;
				$tmpTotHits=0;
				$tmpTotPoint=0;
				$tmpTotHitsTook=0;
				$tmpTotShotsBlock=0;
				$tmpTotOwnShotsBlock=0;
				$tmpTotOwnShotsMissGoals=0;
				$tmpTotGiveAway=0;
				$tmpTotTakeAway=0;
				$tmpTotFaceOffWon=0;
				$tmpTotFaceOffTotal=0;
				$tmpTotHatTrick=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmHits=0;
				$tmpTotFarmPoint=0;
				$tmpTotFarmHitsTook=0;
				$tmpTotFarmShotsBlock=0;
				$tmpTotFarmOwnShotsBlock=0;
				$tmpTotFarmOwnShotsMissGoals=0;
				$tmpTotFarmGiveAway=0;
				$tmpTotFarmTakeAway=0;
				$tmpTotFarmFaceOffWon=0;
				$tmpTotFarmFaceOffTotal=0;
				$tmpTotFarmEmptyNetGoal=0;
				$tmpTotFarmHatTrick=0;
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Extended; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HatTrick_D;?>"><?php echo $l_HatTrick;?></a></th>
                    <th><a title="<?php echo $l_SB_D;?>"><?php echo $l_SB;?></a></th>
                    <th><a title="<?php echo $l_OSB_D;?>"><?php echo $l_OSB;?></a></th>
                    <th><a title="<?php echo $l_OMG_D;?>"><?php echo $l_OMG;?></a></th>
                    <th><a title="<?php echo $l_GIVEAWAY_D;?>"><?php echo $l_GIVEAWAY?></a></th>	
                    <th><a title="<?php echo $l_TAKEAWAY_D;?>"><?php echo $l_TAKEAWAY;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffWon_D;?>"><?php echo $l_FaceOffWon;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffTotal_D;?>"><?php echo $l_FaceOffTotal;?></a></th>				
                    <th><a title="<?php echo $l_FaceOffPCT_D;?>"><?php echo $l_FaceOffPCT;?></a></th>	
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
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmHatTrick']; $tmpTotFarmHatTrick=$tmpTotFarmHatTrick+$row_GetStats['FarmHatTrick'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmShotsBlock']; $tmpTotFarmShotsBlock=$tmpTotShotsFarmBlock+$row_GetStats['FarmShotsBlock'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmOwnShotsBlock']; $tmpTotFarmOwnShotsBlock=$tmpTotFarmOwnShotsBlock+$row_GetStats['FarmOwnShotsBlock'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmOwnShotsMissGoals']; $tmpTotFarmOwnShotsMissGoals=$tmpTotFarmOwnShotsMissGoals+$row_GetStats['FarmOwnShotsMissGoals'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGiveAway']; $tmpTotFarmGiveAway=$tmpTotFarmGiveAway+$row_GetStats['FarmGiveAway'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmTakeAway']; $tmpTotFarmTakeAway=$tmpTotFarmTakeAway+$row_GetStats['FarmTakeAway'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmFaceOffWon']; $tmpTotFarmFaceOffWon=$tmpTotFarmFaceOffWon+$row_GetStats['FarmFaceOffWon'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmFaceOffTotal']; $tmpTotFarmFaceOffTotal=$tmpTotFarmFaceOffTotal+$row_GetStats['FarmFaceOffTotal'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmFaceOffWon'] > 0){ echo number_format(($row_GetStats['FarmFaceOffWon'] / $row_GetStats['FarmFaceOffTotal']) * 100,1); } else { echo 0; }?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProHatTrick']; $tmpTotHatTrick=$tmpTotHatTrick+$row_GetStats['ProHatTrick'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProShotsBlock']; $tmpTotShotsBlock=$tmpTotShotsBlock+$row_GetStats['ProShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProOwnShotsBlock']; $tmpTotOwnShotsBlock=$tmpTotOwnShotsBlock+$row_GetStats['ProOwnShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProOwnShotsMissGoals']; $tmpTotOwnShotsMissGoals=$tmpTotOwnShotsMissGoals+$row_GetStats['ProOwnShotsMissGoals'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGiveAway']; $tmpTotGiveAway=$tmpTotGiveAway+$row_GetStats['ProGiveAway'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProTakeAway']; $tmpTotTakeAway=$tmpTotTakeAway+$row_GetStats['ProTakeAway'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProFaceOffWon']; $tmpTotFaceOffWon=$tmpTotFaceOffWon+$row_GetStats['ProFaceOffWon'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProFaceOffTotal']; $tmpTotFaceOffTotal=$tmpTotFaceOffTotal+$row_GetStats['ProFaceOffTotal'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProFaceOffWon'] > 0){ echo number_format(($row_GetStats['ProFaceOffWon'] / $row_GetStats['ProFaceOffTotal']) * 100,1); } else { echo 0; }?></td>
                  </tr>
                  <?php }}} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHatTrick ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShotsBlock ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOwnShotsBlock ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOwnShotsMissGoals ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGiveAway ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmTakeAway ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFaceOffWon ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFaceOffTotal ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmFaceOffTotal > 0){ echo number_format(($tmpTotFarmFaceOffWon / $tmpTotFarmFaceOffTotal) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHatTrick ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsMissGoals ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGiveAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotTakeAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffWon ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffTotal ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotFaceOffTotal > 0){ echo number_format(($tmpTotFaceOffWon / $tmpTotFaceOffTotal) * 100,1); } else { echo 0; }?></td>
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
                <?php 
				$tmpTotGP=0;
				$tmpTotHits=0;
				$tmpTotPoint=0;
				$tmpTotHitsTook=0;
				$tmpTotShotsBlock=0;
				$tmpTotOwnShotsBlock=0;
				$tmpTotOwnShotsMissGoals=0;
				$tmpTotGiveAway=0;
				$tmpTotTakeAway=0;
				$tmpTotFaceOffWon=0;
				$tmpTotFaceOffTotal=0;
				$tmpTotEmptyNetGoal=0;
				$tmpTotHatTrick=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmHits=0;
				$tmpTotFarmPoint=0;
				$tmpTotFarmHitsTook=0;
				$tmpTotFarmShotsBlock=0;
				$tmpTotFarmOwnShotsBlock=0;
				$tmpTotFarmOwnShotsMissGoals=0;
				$tmpTotFarmGiveAway=0;
				$tmpTotFarmTakeAway=0;
				$tmpTotFarmFaceOffWon=0;
				$tmpTotFarmFaceOffTotal=0;
				$tmpTotFarmEmptyNetGoal=0;
				$tmpTotFarmHatTrick=0;
				if ($totalRows_GetPlayoffStats > 0) { 
				mysql_data_seek($GetPlayoffStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Extended; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HatTrick_D;?>"><?php echo $l_HatTrick;?></a></th>
                    <th><a title="<?php echo $l_SB_D;?>"><?php echo $l_SB;?></a></th>
                    <th><a title="<?php echo $l_OSB_D;?>"><?php echo $l_OSB;?></a></th>
                    <th><a title="<?php echo $l_OMG_D;?>"><?php echo $l_OMG;?></a></th>
                    <th><a title="<?php echo $l_GIVEAWAY_D;?>"><?php echo $l_GIVEAWAY?></a></th>	
                    <th><a title="<?php echo $l_TAKEAWAY_D;?>"><?php echo $l_TAKEAWAY;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffWon_D;?>"><?php echo $l_FaceOffWon;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffTotal_D;?>"><?php echo $l_FaceOffTotal;?></a></th>				
                    <th><a title="<?php echo $l_FaceOffPCT_D;?>"><?php echo $l_FaceOffPCT;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($row_GetPlayoffStats['Season'] != ""){?>
                <?php if ($row_GetPlayoffStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmTeamName']; ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGP']; $tmpTotFarmGP=$tmpTotFarmGP+$row_GetPlayoffStats['ProGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmHatTrick']; $tmpTotFarmHatTrick=$tmpTotFarmHatTrick+$row_GetPlayoffStats['FarmHatTrick'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmShotsBlock']; $tmpTotFarmShotsBlock=$tmpTotShotsFarmBlock+$row_GetPlayoffStats['FarmShotsBlock'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmOwnShotsBlock']; $tmpTotFarmOwnShotsBlock=$tmpTotFarmOwnShotsBlock+$row_GetPlayoffStats['FarmOwnShotsBlock'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmOwnShotsMissGoals']; $tmpTotFarmOwnShotsMissGoals=$tmpTotFarmOwnShotsMissGoals+$row_GetPlayoffStats['FarmOwnShotsMissGoals'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGiveAway']; $tmpTotFarmGiveAway=$tmpTotFarmGiveAway+$row_GetPlayoffStats['FarmGiveAway'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmTakeAway']; $tmpTotFarmTakeAway=$tmpTotFarmTakeAway+$row_GetPlayoffStats['FarmTakeAway'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmFaceOffWon']; $tmpTotFarmFaceOffWon=$tmpTotFarmFaceOffWon+$row_GetPlayoffStats['FarmFaceOffWon'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmFaceOffTotal']; $tmpTotFarmFaceOffTotal=$tmpTotFarmFaceOffTotal+$row_GetPlayoffStats['FarmFaceOffTotal'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmFaceOffWon'] > 0){ echo number_format(($row_GetPlayoffStats['FarmFaceOffTotal'] / $row_GetPlayoffStats['FarmFaceOffWon']) * 100,1); } else { echo 0; }?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProHatTrick']; $tmpTotHatTrick=$tmpTotHatTrick+$row_GetPlayoffStats['ProHatTrick'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProShotsBlock']; $tmpTotShotsBlock=$tmpTotShotsBlock+$row_GetPlayoffStats['ProShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProOwnShotsBlock']; $tmpTotOwnShotsBlock=$tmpTotOwnShotsBlock+$row_GetPlayoffStats['ProOwnShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProOwnShotsMissGoals']; $tmpTotOwnShotsMissGoals=$tmpTotOwnShotsMissGoals+$row_GetPlayoffStats['ProOwnShotsMissGoals'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGiveAway']; $tmpTotGiveAway=$tmpTotGiveAway+$row_GetPlayoffStats['ProGiveAway'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTakeAway']; $tmpTotTakeAway=$tmpTotTakeAway+$row_GetPlayoffStats['ProTakeAway'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProFaceOffWon']; $tmpTotFaceOffWon=$tmpTotFaceOffWon+$row_GetPlayoffStats['ProFaceOffWon'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProFaceOffTotal']; $tmpTotFaceOffTotal=$tmpTotFaceOffTotal+$row_GetPlayoffStats['ProFaceOffTotal'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProFaceOffWon'] > 0){ echo number_format(($row_GetPlayoffStats['ProFaceOffWon'] / $row_GetPlayoffStats['ProFaceOffTotal']) * 100,1); } else { echo 0; }?></td>
                  </tr>
                  <?php }}} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGP ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHatTrick ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmShotsBlock ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOwnShotsBlock ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmOwnShotsMissGoals ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmGiveAway ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmTakeAway ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFaceOffWon ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFaceOffTotal ,0); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmFaceOffTotal > 0){ echo number_format(($tmpTotFarmFaceOffWon / $tmpTotFarmFaceOffTotal) * 100,1); } else { echo 0; }?></td>			
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHatTrick ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsMissGoals ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGiveAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotTakeAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffWon ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffTotal ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotFaceOffTotal > 0){ echo number_format(($tmpTotFaceOffWon / $tmpTotFaceOffTotal) * 100,1); } else { echo 0; }?></td>
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
			</div>
			<div id="tabs-3">
            	<?php  echo "<h3>".$l_TimeOnIce."</h3>"; 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				$tmpTotPuckPossesionTime=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmMinutePlay=0;
				$tmpTotFarmPKMinutePlay=0;
				$tmpTotFarmPPMinutePlay=0;
				$tmpTotFarmPuckPossesionTime=0;
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_TimeOnIce; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_ES_TOI_D;?>"><?php echo $l_ES_TOI;?></a></th>
                    <th><a title="<?php echo $l_ES_TOIG_D;?>"><?php echo $l_ES_TOIG;?></a></th>
                    <th><a title="<?php echo $l_SH_TOI_D;?>"><?php echo $l_SH_TOI;?></a></th>
                    <th><a title="<?php echo $l_SH_TOIG_D;?>"><?php echo $l_SH_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PP_TOI_D;?>"><?php echo $l_PP_TOI;?></a></th>
                    <th><a title="<?php echo $l_PP_TOIG_D;?>"><?php echo $l_PP_TOIG?></a></th>	
                    <th><a title="<?php echo $l_TOI_D;?>"><?php echo $l_TOI;?></a></th>	
                    <th><a title="<?php echo $l_TOIG_D;?>"><?php echo $l_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PuckPossesionTime_D;?>"><?php echo $l_PuckPossesionTime;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetStats['FarmMinutePlay'] - $row_GetStats['FarmPKMinutePlay'] - $row_GetStats['FarmPPMinutePlay']);?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes(($row_GetStats['FarmMinutePlay'] - $row_GetStats['FarmPKMinutePlay'] - $row_GetStats['FarmPPMinutePlay'])/$row_GetStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetStats['FarmPKMinutePlay']); $tmpTotFarmPKMinutePlay=$tmpTotFarmPKMinutePlay+$row_GetStats['FarmPKMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmPKMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPKMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetStats['FarmPPMinutePlay']); $tmpTotFarmPPMinutePlay=$tmpTotFarmPPMinutePlay+$row_GetStats['FarmPPMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmPPMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPPMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetStats['FarmMinutePlay']); $tmpTotFarmMinutePlay=$tmpTotFarmMinutePlay+$row_GetStats['FarmMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes($row_GetStats['FarmMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
	                    <td align="center" class="FarmStats"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPuckPossesionTime']);  } else { echo 0; } $tmpTotFarmPuckPossesionTime=$tmpTotFarmPuckPossesionTime+$row_GetStats['FarmPuckPossesionTime']; ?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>           
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo minutes($row_GetStats['ProMinutePlay'] - $row_GetStats['ProPKMinutePlay'] - $row_GetStats['ProPPMinutePlay']); ?></td>
					<td align="center"><?php if ($row_GetStats['ProMinutePlay'] > 0){ echo minutes(($row_GetStats['ProMinutePlay'] - $row_GetStats['ProPKMinutePlay'] - $row_GetStats['ProPPMinutePlay'])/$row_GetStats['ProGP']); } else { echo 0; }?></td>
					<td align="center"><?php echo minutes($row_GetStats['ProPKMinutePlay']); $tmpTotPKMinutePlay=$tmpTotPKMinutePlay+$row_GetStats['ProPKMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProPKMinutePlay'] > 0){ echo minutes($row_GetStats['ProPKMinutePlay'] / $row_GetStats['ProGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetStats['ProPPMinutePlay']); $tmpTotPPMinutePlay=$tmpTotPPMinutePlay+$row_GetStats['ProPPMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProPPMinutePlay'] > 0){ echo minutes($row_GetStats['ProPPMinutePlay'] / $row_GetStats['ProGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetStats['ProMinutePlay']); $tmpTotMinutePlay=$tmpTotMinutePlay+$row_GetStats['ProMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['ProMinutePlay'] > 0){ echo minutes($row_GetStats['ProMinutePlay'] / $row_GetStats['ProGP']); } else { echo 0; }?></td>
                    <td align="center"><?php if ($row_GetStats['ProMinutePlay'] > 0){ echo minutes($row_GetStats['ProPuckPossesionTime'] / $tmpTotGP); } else { echo 0; } $tmpTotPuckPossesionTime=$tmpTotPuckPossesionTime+$row_GetStats['ProPuckPossesionTime']; ?></td>
                  </tr>
                  <?php }}} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody>                
                <tfoot>
				<?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPKMinutePlay > 0){ echo minutes($tmpTotFarmMinutePlay - $tmpTotFarmPPMinutePlay - $tmpTotFarmPKMinutePlay);  } else { echo minutes($tmpTotFarmMinutePlay); };?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes(($tmpTotFarmMinutePlay - $tmpTotFarmPPMinutePlay - $tmpTotFarmPKMinutePlay) / $tmpTotFarmGP); } else { echo 0; }; ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmPKMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPKMinutePlay > 0){ echo minutes($tmpTotFarmPKMinutePlay / $tmpTotFarmGP); } else { echo 0; }; ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmPPMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPPMinutePlay > 0){ echo minutes($tmpTotFarmPPMinutePlay / $tmpTotFarmGP); } else { echo 0; }; ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes($tmpTotFarmMinutePlay / $tmpTotFarmGP); } else { echo 0; } ?></td>	
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes($tmpTotFarmPuckPossesionTime / $tmpTotFarmGP); } else { echo 0; }  ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay);  } else { echo minutes($tmpTotMinutePlay); };?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes(($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay) / $tmpTotGP);  } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPKMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotPKMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPPMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPPMinutePlay > 0){ echo minutes($tmpTotPPMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotMinutePlay / $tmpTotGP); } else { echo 0; } ?></td>	
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotPuckPossesionTime / $tmpTotGP); } else { echo 0; }  ?></td>	
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
                <?php 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				$tmpTotPuckPossesionTime=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmMinutePlay=0;
				$tmpTotFarmPKMinutePlay=0;
				$tmpTotFarmPPMinutePlay=0;
				$tmpTotFarmPuckPossesionTime=0;
				if ($totalRows_GetPlayoffStats > 0) { 
				mysql_data_seek($GetPlayoffStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_TimeOnIce; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_ES_TOI_D;?>"><?php echo $l_ES_TOI;?></a></th>
                    <th><a title="<?php echo $l_ES_TOIG_D;?>"><?php echo $l_ES_TOIG;?></a></th>
                    <th><a title="<?php echo $l_SH_TOI_D;?>"><?php echo $l_SH_TOI;?></a></th>
                    <th><a title="<?php echo $l_SH_TOIG_D;?>"><?php echo $l_SH_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PP_TOI_D;?>"><?php echo $l_PP_TOI;?></a></th>
                    <th><a title="<?php echo $l_PP_TOIG_D;?>"><?php echo $l_PP_TOIG?></a></th>	
                    <th><a title="<?php echo $l_TOI_D;?>"><?php echo $l_TOI;?></a></th>	
                    <th><a title="<?php echo $l_TOIG_D;?>"><?php echo $l_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PuckPossesionTime_D;?>"><?php echo $l_PuckPossesionTime;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetPlayoffStats['FarmMinutePlay'] - $row_GetPlayoffStats['FarmPKMinutePlay'] - $row_GetPlayoffStats['FarmPPMinutePlay']);?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmMinutePlay'] > 0){ echo minutes(($row_GetPlayoffStats['FarmMinutePlay'] - $row_GetPlayoffStats['FarmPKMinutePlay'] - $row_GetPlayoffStats['FarmPPMinutePlay'])/$row_GetPlayoffStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetPlayoffStats['FarmPKMinutePlay']); $tmpTotFarmPKMinutePlay=$tmpTotFarmPKMinutePlay+$row_GetPlayoffStats['FarmPKMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmPKMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['FarmPKMinutePlay'] / $row_GetPlayoffStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetPlayoffStats['FarmPPMinutePlay']); $tmpTotFarmPPMinutePlay=$tmpTotFarmPPMinutePlay+$row_GetPlayoffStats['FarmPPMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmPPMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['FarmPPMinutePlay'] / $row_GetPlayoffStats['FarmGP']); } else { echo 0; }?></td>
                        <td align="center" class="FarmStats"><?php echo minutes($row_GetPlayoffStats['FarmMinutePlay']); $tmpTotFarmMinutePlay=$tmpTotFarmMinutePlay+$row_GetPlayoffStats['FarmMinutePlay'];?></td>
                        <td align="center" class="FarmStats"><?php if ($row_GetPlayoffStats['FarmMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['FarmMinutePlay'] / $row_GetPlayoffStats['FarmGP']); } else { echo 0; }?></td>
	                    <td align="center"><?php if ($row_GetPlayoffStats['FarmMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['FarmPuckPossesionTime']); } else { echo 0; } $tmpTotFarmPuckPossesionTime=$tmpTotFarmPuckPossesionTime+$row_GetPlayoffStats['FarmPuckPossesionTime']; ?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo minutes($row_GetPlayoffStats['ProMinutePlay'] - $row_GetPlayoffStats['ProPKMinutePlay'] - $row_GetPlayoffStats['ProPPMinutePlay']); ?></td>
					<td align="center"><?php if ($row_GetPlayoffStats['ProMinutePlay'] > 0){ echo minutes(($row_GetPlayoffStats['ProMinutePlay'] - $row_GetPlayoffStats['ProPKMinutePlay'] - $row_GetPlayoffStats['ProPPMinutePlay'])/$row_GetPlayoffStats['ProGP']); } else { echo 0; }?></td>
					<td align="center"><?php echo minutes($row_GetPlayoffStats['ProPKMinutePlay']); $tmpTotPKMinutePlay=$tmpTotPKMinutePlay+$row_GetPlayoffStats['ProPKMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProPKMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['ProPKMinutePlay'] / $row_GetPlayoffStats['ProGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetPlayoffStats['ProPPMinutePlay']); $tmpTotPPMinutePlay=$tmpTotPPMinutePlay+$row_GetPlayoffStats['ProPPMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProPPMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['ProPPMinutePlay'] / $row_GetPlayoffStats['ProGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetPlayoffStats['ProMinutePlay']); $tmpTotMinutePlay=$tmpTotMinutePlay+$row_GetPlayoffStats['ProMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetPlayoffStats['ProMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['ProMinutePlay'] / $row_GetPlayoffStats['ProGP']); } else { echo 0; }?></td>
                  	<td align="center"><?php if ($row_GetPlayoffStats['ProMinutePlay'] > 0){ echo minutes($row_GetPlayoffStats['ProPuckPossesionTime'] / $tmpTotGP); } else { echo 0; } $tmpTotPuckPossesionTime=$tmpTotPuckPossesionTime+$row_GetPlayoffStats['ProPuckPossesionTime']; ?></td>
                  </tr>
                  <?php }}} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>                
                <tfoot>
				<?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPKMinutePlay > 0){ echo minutes($tmpTotFarmMinutePlay - $tmpTotFarmPPMinutePlay - $tmpTotFarmPKMinutePlay); } else { echo minutes($tmpTotFarmMinutePlay); };  ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes(($tmpTotFarmMinutePlay - $tmpTotFarmPPMinutePlay - $tmpTotFarmPKMinutePlay) / $tmpTotFarmGP); } else { echo 0; };  ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmPKMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPKMinutePlay > 0){ echo minutes($tmpTotFarmPKMinutePlay / $tmpTotFarmGP); } else { echo 0; }; ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmPPMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmPPMinutePlay > 0){ echo minutes($tmpTotFarmPPMinutePlay / $tmpTotFarmGP); } else { echo 0; }; ?></td>
                    <td align="center" class="FarmStats"><?php echo minutes($tmpTotFarmMinutePlay); ?></td>
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes($tmpTotFarmMinutePlay / $tmpTotFarmGP); } else { echo 0; } ?></td>	
                    <td align="center" class="FarmStats"><?php if ($tmpTotFarmMinutePlay > 0){ echo minutes($tmpTotFarmPuckPossesionTime / $tmpTotFarmGP);  } else { echo 0; } ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay); } else { echo minutes($tmpTotMinutePlay); };  ?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes(($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay) / $tmpTotGP); } else { echo 0; };  ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPKMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotPKMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPPMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPPMinutePlay > 0){ echo minutes($tmpTotPPMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotMinutePlay / $tmpTotGP); } else { echo 0; } ?></td>	
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotPuckPossesionTime / $tmpTotGP);  } else { echo 0; } ?></td>		
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
			</div>
			<div id="tabs-4">
                <?php echo "<h3>".$l_HitsFights."</h3>"; 
				$tmpTotGP=0;
				$tmpTotPim=0;
				$tmpTot5Pim=0;
				$tmpTotHits=0;
				$tmpTotHitsTook=0;
				$tmpTotFightW=0;
				$tmpTotFightL=0;
				$tmpTotFightT=0;
				$tmpTotStar1=0;
				$tmpTotStar2=0;
				$tmpTotStar3=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmPim=0;
				$tmpTotFarm5Pim=0;
				$tmpTotFarmHits=0;
				$tmpTotFarmHitsTook=0;
				$tmpTotFarmFightW=0;
				$tmpTotFarmFightL=0;
				$tmpTotFarmFightT=0;
				$tmpTotFarmStar1=0;
				$tmpTotFarmStar2=0;
				$tmpTotFarmStar3=0;
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_HitsFights; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                    <th><a title="<?php echo $l_HTT_D;?>"><?php echo $l_HTT;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_5PIM_D;?>"><?php echo $l_5PIM;?></a></th>
                    <th><a title="<?php echo $l_FightWin_D;?>"><?php echo $l_FightWin;?></a></th>	
                    <th><a title="<?php echo $l_FightLoss_D;?>"><?php echo $l_FightLoss;?></a></th>	
                    <th><a title="<?php echo $l_FightTie_D;?>"><?php echo $l_FightTie;?></a></th>
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
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
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmHits']; $tmpTotFarmHits=$tmpTotFarmHits+$row_GetStats['FarmHits'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmHitsTook']; $tmpTotFarmHitsTook=$tmpTotFarmHitsTook+$row_GetStats['FarmHitsTook'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['Farm5Pim']; $tmpTotFarm5Pim=$tmpTotFarm5Pim+$row_GetStats['Farm5Pim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmFightW']; $tmpTotFarmFightW=$tmpTotFarmFightW+$row_GetStats['FarmFightW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmFightL']; $tmpTotFarmFightL=$tmpTotFarmFightL+$row_GetStats['FarmFightL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmFightT']; $tmpTotFarmFightT=$tmpTotFarmFightT+$row_GetStats['FarmFightT'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar1']; $tmpTotFarmStar1=$tmpTotFarmStar1+$row_GetStats['FarmStar1'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar2']; $tmpTotFarmStar2=$tmpTotFarmStar2+$row_GetStats['FarmStar2'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmStar3']; $tmpTotFarmStar3=$tmpTotFarmStar1+$row_GetStats['FarmStar3'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>           
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProHits']; $tmpTotHits=$tmpTotHits+$row_GetStats['ProHits'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProHitsTook']; $tmpTotHitsTook=$tmpTotHitsTook+$row_GetStats['ProHitsTook'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPim']; $tmpTotPim=$tmpTotPim+$row_GetStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetStats['Pro5Pim']; $tmpTot5Pim=$tmpTot5Pim+$row_GetStats['Pro5Pim'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProFightW']; $tmpTotFightW=$tmpTotFightW+$row_GetStats['ProFightW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProFightL']; $tmpTotFightL=$tmpTotFightL+$row_GetStats['ProFightL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProFightT']; $tmpTotFightT=$tmpTotFightT+$row_GetStats['ProFightT'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetStats['ProStar1'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetStats['ProStar2'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProStar3']; $tmpTotStar3=$tmpTotStar1+$row_GetStats['ProStar3'];?></td>
                  </tr>
                  <?php }}} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHits ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHitsTook ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarm5Pim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightT ,0); ?></td>	
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar1 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar2 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar3 ,0); ?></td>	
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHits ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHitsTook ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTot5Pim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightT ,0); ?></td>	
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
				$tmpTotPim=0;
				$tmpTot5Pim=0;
				$tmpTotHits=0;
				$tmpTotHitsTook=0;
				$tmpTotFightW=0;
				$tmpTotFightL=0;
				$tmpTotFightT=0;
				$tmpTotStar1=0;
				$tmpTotStar2=0;
				$tmpTotStar3=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmPim=0;
				$tmpTotFarm5Pim=0;
				$tmpTotFarmHits=0;
				$tmpTotFarmHitsTook=0;
				$tmpTotFarmFightW=0;
				$tmpTotFarmFightL=0;
				$tmpTotFarmFightT=0;
				$tmpTotFarmStar1=0;
				$tmpTotFarmStar2=0;
				$tmpTotFarmStar3=0;
				if ($totalRows_GetPlayoffStats > 0) { 
				mysql_data_seek($GetPlayoffStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_HitsFights; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                    <th><a title="<?php echo $l_HTT_D;?>"><?php echo $l_HTT;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_5PIM_D;?>"><?php echo $l_5PIM;?></a></th>
                    <th><a title="<?php echo $l_FightWin_D;?>"><?php echo $l_FightWin;?></a></th>	
                    <th><a title="<?php echo $l_FightLoss_D;?>"><?php echo $l_FightLoss;?></a></th>	
                    <th><a title="<?php echo $l_FightTie_D;?>"><?php echo $l_FightTie;?></a></th>
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
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
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmHits']; $tmpTotFarmHits=$tmpTotFarmHits+$row_GetPlayoffStats['FarmHits'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmHitsTook']; $tmpTotFarmHitsTook=$tmpTotFarmHitsTook+$row_GetPlayoffStats['FarmHitsTook'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPim']; $tmpTotFarmPim=$tmpTotFarmPim+$row_GetPlayoffStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['Farm5Pim']; $tmpTotFarm5Pim=$tmpTotFarm5Pim+$row_GetPlayoffStats['Farm5Pim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmFightW']; $tmpTotFarmFightW=$tmpTotFarmFightW+$row_GetPlayoffStats['FarmFightW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmFightL']; $tmpTotFarmFightL=$tmpTotFarmFightL+$row_GetPlayoffStats['FarmFightL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmFightT']; $tmpTotFarmFightT=$tmpTotFarmFightT+$row_GetPlayoffStats['FarmFightT'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar1']; $tmpTotFarmStar1=$tmpTotFarmStar1+$row_GetPlayoffStats['FarmStar1'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar2']; $tmpTotFarmStar2=$tmpTotFarmStar2+$row_GetPlayoffStats['FarmStar2'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmStar3']; $tmpTotFarmStar3=$tmpTotFarmStar1+$row_GetPlayoffStats['FarmStar3'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProHits']; $tmpTotHits=$tmpTotHits+$row_GetPlayoffStats['ProHits'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProHitsTook']; $tmpTotHitsTook=$tmpTotHitsTook+$row_GetPlayoffStats['ProHitsTook'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPim']; $tmpTotPim=$tmpTotPim+$row_GetPlayoffStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['Pro5Pim']; $tmpTot5Pim=$tmpTot5Pim+$row_GetPlayoffStats['Pro5Pim'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProFightW']; $tmpTotFightW=$tmpTotFightW+$row_GetPlayoffStats['ProFightW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProFightL']; $tmpTotFightL=$tmpTotFightL+$row_GetPlayoffStats['ProFightL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProFightT']; $tmpTotFightT=$tmpTotFightT+$row_GetPlayoffStats['ProFightT'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetPlayoffStats['ProStar1'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetPlayoffStats['ProStar2'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProStar3']; $tmpTotStar3=$tmpTotStar1+$row_GetPlayoffStats['ProStar3'];?></td>
                  </tr>
                  <?php }}} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHits ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmHitsTook ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmPim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarm5Pim ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightW ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightL ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmFightT ,0); ?></td>	
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar1 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar2 ,0); ?></td>
                    <td align="center" class="FarmStats"><?php echo number_format($tmpTotFarmStar3 ,0); ?></td>	
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHits ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHitsTook ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTot5Pim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightT ,0); ?></td>	
                    <td align="center" ><?php echo number_format($tmpTotStar1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar3 ,0); ?></td>		
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
                <?php } ?>
                
			</div>
			<div id="tabs-5">
                <?php  echo "<h3>".$l_SpecialTeams."</h3>"; 
				$tmpTotGP=0;
				$tmpTotESG=0;
                $tmpTotESA=0;
                $tmpTotESP=0;
                $tmpTotESShots=0;
                $tmpTotPPG=0;
                $tmpTotPPA=0;
                $tmpTotPPPoint=0;
                $tmpTotPPShots=0;
                $tmpTotPKG=0;
                $tmpTotPKA=0;
                $tmpTotPKPoint=0;
                $tmpTotPKShots=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmESG=0;
                $tmpTotFarmESA=0;
                $tmpTotFarmESP=0;
                $tmpTotFarmESShots=0;
                $tmpTotFarmPPG=0;
                $tmpTotFarmPPA=0;
                $tmpTotFarmPPPoint=0;
                $tmpTotFarmPPShots=0;
                $tmpTotFarmPKG=0;
                $tmpTotFarmPKA=0;
                $tmpTotFarmPKPoint=0;
                $tmpTotFarmPKShots=0;
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_SpecialTeams; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_G_D;?>"><?php echo $l_EvenStrength.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_G_D;?>"><?php echo $l_PowerPlay.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_G_D;?>"><?php echo $l_ShortHanded.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG']; $tmpTotFarmESG=$tmpTotFarmESG+($row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']; $tmpTotFarmESA=$tmpTotFarmESA+($row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG'] + $row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']; $tmpTotFarmESP=$tmpToFarmtESP+($row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG'] + ($row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']));?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmShots']-$row_GetStats['FarmPPShots']-$row_GetStats['FarmPKShots']; $tmpTotFarmESShots=$tmpTotFarmESShots+($row_GetStats['FarmShots'] - $row_GetStats['FarmPPShots'] -$row_GetStats['FarmPKShots']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPPG']; $tmpTotFarmPPG=$tmpTotFarmPPG+$row_GetStats['FarmPPG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPPA']; $tmpTotFarmPPA=$tmpTotFarmPPA+$row_GetStats['FarmPPA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPPG']+$row_GetStats['FarmPPA']; $tmpTotFarmPPPoint=$tmpTotFarmPPPoint+($row_GetStats['FarmPPG']+$row_GetStats['FarmPPA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPPShots']; $tmpTotFarmPPShots=$tmpTotFarmPPShots+$row_GetStats['FarmPPShots'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPKG']; $tmpTotFarmPKG=$tmpTotFarmPKG+$row_GetStats['FarmPKG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPKA']; $tmpTotFarmPKA=$tmpTotFarmPKA+$row_GetStats['FarmPKA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPKG']+$row_GetStats['FarmPKA']; $tmpTotFarmPKPoint=$tmpTotFarmPKPoint+($row_GetStats['FarmPKG']+$row_GetStats['FarmPKA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPKShots']; $tmpTotFarmPKShots=$tmpTotFarmPKShots+$row_GetStats['FarmPKShots'];?></td>
                    </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>           
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProG']-$row_GetStats['ProPPG']-$row_GetStats['ProPKG']; $tmpTotESG=$tmpTotESG+($row_GetStats['ProG']-$row_GetStats['ProPPG']-$row_GetStats['ProPKG']);?></td>
                    <td align="center"><?php echo $row_GetStats['ProA']-$row_GetStats['ProPPA']-$row_GetStats['ProPKA']; $tmpTotESA=$tmpTotESA+($row_GetStats['ProA']-$row_GetStats['ProPPA']-$row_GetStats['ProPKA']);?></td>
                    <td align="center"><?php echo $row_GetStats['ProG']-$row_GetStats['ProPPG']-$row_GetStats['ProPKG'] + $row_GetStats['ProA']-$row_GetStats['ProPPA']-$row_GetStats['ProPKA']; $tmpTotESP=$tmpTotESP+($row_GetStats['ProG']-$row_GetStats['ProPPG']-$row_GetStats['ProPKG'] + ($row_GetStats['ProA']-$row_GetStats['ProPPA']-$row_GetStats['ProPKA']));?></td>
                    <td align="center"><?php echo $row_GetStats['ProShots']-$row_GetStats['ProPPShots']-$row_GetStats['ProPKShots']; $tmpTotESShots=$tmpTotESShots+($row_GetStats['ProShots'] - $row_GetStats['ProPPShots'] -$row_GetStats['ProPKShots']);?></td>
                  	<td align="center"><?php echo $row_GetStats['ProPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPPA']; $tmpTotPPA=$tmpTotPPA+$row_GetStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPPG']+$row_GetStats['ProPPA']; $tmpTotPPPoint=$tmpTotPPPoint+($row_GetStats['ProPPG']+$row_GetStats['ProPPA']);?></td>
                    <td align="center"><?php echo $row_GetStats['ProPPShots']; $tmpTotPPShots=$tmpTotPPShots+$row_GetStats['ProPPShots'];?></td>
                  	<td align="center"><?php echo $row_GetStats['ProPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPKA']; $tmpTotPKA=$tmpTotPKA+$row_GetStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPKG']+$row_GetStats['ProPKA']; $tmpTotPKPoint=$tmpTotPKPoint+($row_GetStats['ProPKG']+$row_GetStats['ProPKA']);?></td>
                    <td align="center"><?php echo $row_GetStats['ProPKShots']; $tmpTotPKShots=$tmpTotPKShots+$row_GetStats['ProPKShots'];?></td>
                  </tr>
                  <?php }}} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESShots; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPPoint; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPShots; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKPoint; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKShots; ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotESG; ?></td>
                    <td align="center" ><?php echo $tmpTotESA; ?></td>
                    <td align="center" ><?php echo $tmpTotESP; ?></td>
                    <td align="center" ><?php echo $tmpTotESShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPPG; ?></td>
                    <td align="center" ><?php echo $tmpTotPPA; ?></td>
                    <td align="center" ><?php echo $tmpTotPPPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPPShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPKG; ?></td>
                    <td align="center" ><?php echo $tmpTotPKA; ?></td>
                    <td align="center" ><?php echo $tmpTotPKPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPKShots; ?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
                
                
                <?php 
				$tmpTotGP=0;
				$tmpTotESG=0;
                $tmpTotESA=0;
                $tmpTotESP=0;
                $tmpTotESShots=0;
                $tmpTotPPG=0;
                $tmpTotPPA=0;
                $tmpTotPPPoint=0;
                $tmpTotPPShots=0;
                $tmpTotPKG=0;
                $tmpTotPKA=0;
                $tmpTotPKPoint=0;
                $tmpTotPKShots=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmESG=0;
                $tmpTotFarmESA=0;
                $tmpTotFarmESP=0;
                $tmpTotFarmESShots=0;
                $tmpTotFarmPPG=0;
                $tmpTotFarmPPA=0;
                $tmpTotFarmPPPoint=0;
                $tmpTotFarmPPShots=0;
                $tmpTotFarmPKG=0;
                $tmpTotFarmPKA=0;
                $tmpTotFarmPKPoint=0;
                $tmpTotFarmPKShots=0;
				if ($totalRows_GetPlayoffStats > 0) { 
				mysql_data_seek($GetPlayoffStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_SpecialTeams; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_season; ?>"><?php echo $l_season; ?></a></th>
					<th><a title="<?php echo $l_nav_team;?>"><?php echo $l_nav_team;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_G_D;?>"><?php echo $l_EvenStrength.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_G_D;?>"><?php echo $l_PowerPlay.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_G_D;?>"><?php echo $l_ShortHanded.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmG']-$row_GetPlayoffStats['FarmPPG']-$row_GetPlayoffStats['FarmPKG']; $tmpTotFarmESG=$tmpTotFarmESG+($row_GetPlayoffStats['FarmG']-$row_GetPlayoffStats['FarmPPG']-$row_GetPlayoffStats['FarmPKG']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmA']-$row_GetPlayoffStats['FarmPPA']-$row_GetPlayoffStats['FarmPKA']; $tmpTotFarmESA=$tmpTotFarmESA+($row_GetPlayoffStats['FarmA']-$row_GetPlayoffStats['FarmPPA']-$row_GetPlayoffStats['FarmPKA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmG']-$row_GetPlayoffStats['FarmPPG']-$row_GetPlayoffStats['FarmPKG'] + $row_GetPlayoffStats['FarmA']-$row_GetPlayoffStats['FarmPPA']-$row_GetPlayoffStats['FarmPKA']; $tmpTotFarmESP=$tmpToFarmtESP+($row_GetPlayoffStats['FarmG']-$row_GetPlayoffStats['FarmPPG']-$row_GetPlayoffStats['FarmPKG'] + ($row_GetPlayoffStats['FarmA']-$row_GetPlayoffStats['FarmPPA']-$row_GetPlayoffStats['FarmPKA']));?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmShots']-$row_GetPlayoffStats['FarmPPShots']-$row_GetPlayoffStats['FarmPKShots']; $tmpTotFarmESShots=$tmpTotFarmESShots+($row_GetPlayoffStats['FarmShots'] - $row_GetPlayoffStats['FarmPPShots'] -$row_GetPlayoffStats['FarmPKShots']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPPG']; $tmpTotFarmPPG=$tmpTotFarmPPG+$row_GetPlayoffStats['FarmPPG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPPA']; $tmpTotFarmPPA=$tmpTotFarmPPA+$row_GetPlayoffStats['FarmPPA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPPG']+$row_GetPlayoffStats['FarmPPA']; $tmpTotFarmPPPoint=$tmpTotFarmPPPoint+($row_GetPlayoffStats['FarmPPG']+$row_GetPlayoffStats['FarmPPA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPPShots']; $tmpTotFarmPPShots=$tmpTotFarmPPShots+$row_GetPlayoffStats['FarmPPShots'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPKG']; $tmpTotFarmPKG=$tmpTotFarmPKG+$row_GetPlayoffStats['FarmPKG'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPKA']; $tmpTotFarmPKA=$tmpTotFarmPKA+$row_GetPlayoffStats['FarmPKA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPKG']+$row_GetPlayoffStats['FarmPKA']; $tmpTotFarmPKPoint=$tmpTotFarmPKPoint+($row_GetPlayoffStats['FarmPKG']+$row_GetPlayoffStats['FarmPKA']);?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPKShots']; $tmpTotFarmPKShots=$tmpTotFarmPKShots+$row_GetPlayoffStats['FarmPKShots'];?></td>
                    </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProG']-$row_GetPlayoffStats['ProPPG']-$row_GetPlayoffStats['ProPKG']; $tmpTotESG=$tmpTotESG+($row_GetPlayoffStats['ProG']-$row_GetPlayoffStats['ProPPG']-$row_GetPlayoffStats['ProPKG']);?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProA']-$row_GetPlayoffStats['ProPPA']-$row_GetPlayoffStats['ProPKA']; $tmpTotESG=$tmpTotESA+($row_GetPlayoffStats['ProA']-$row_GetPlayoffStats['ProPPA']-$row_GetPlayoffStats['ProPKA']);?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProG']-$row_GetPlayoffStats['ProPPG']-$row_GetPlayoffStats['ProPKG'] + $row_GetPlayoffStats['ProA']-$row_GetPlayoffStats['ProPPA']-$row_GetPlayoffStats['ProPKA']; $tmpTotESP=$tmpTotESP+($row_GetPlayoffStats['ProG']-$row_GetPlayoffStats['ProPPG']-$row_GetPlayoffStats['ProPKG'] + ($row_GetPlayoffStats['ProA']-$row_GetPlayoffStats['ProPPA']-$row_GetPlayoffStats['ProPKA']));?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProShots']-$row_GetPlayoffStats['ProPPShots']-$row_GetPlayoffStats['ProPKShots']; $tmpTotESShots=$tmpTotPenalityShotsTotal+($row_GetPlayoffStats['ProShots'] - $row_GetPlayoffStats['ProPPShots'] -$row_GetPlayoffStats['ProPKShots']);?></td>
                  	<td align="center"><?php echo $row_GetPlayoffStats['ProPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetPlayoffStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPPA']; $tmpTotPPA=$tmpTotPPA+$row_GetPlayoffStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPPG']+$row_GetPlayoffStats['ProPPA']; $tmpTotPPPoint=$tmpTotPPPoint+($row_GetPlayoffStats['ProPPG']+$row_GetPlayoffStats['ProPPA']);?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPPShots']; $tmpTotPPShots=$tmpTotPPShots+$row_GetPlayoffStats['ProPPShots'];?></td>
                  	<td align="center"><?php echo $row_GetPlayoffStats['ProPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetPlayoffStats['ProG'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPKA']; $tmpTotPKA=$tmpTotPKA+$row_GetPlayoffStats['ProA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPKG']+$row_GetPlayoffStats['ProPKA']; $tmpTotPKPoint=$tmpTotPKPoint+($row_GetPlayoffStats['ProPKG']+$row_GetPlayoffStats['ProPKA']);?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPKShots']; $tmpTotPKShots=$tmpTotPKShots+$row_GetPlayoffStats['ProPKShots'];?></td>
                  </tr>
                  <?php }}} while ($row_GetPlayoffStats = mysql_fetch_assoc($GetPlayoffStats)); ?>
                </tbody>                
                <tfoot>
                <?php if ($tmpTotFarmGP > 0){?>                
                <tr>
                  	<td align="center" class="FarmStats">&nbsp;</td>			
                    <td align="center" class="FarmStats"><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmGP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESP; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmESShots; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPPoint; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPPShots; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKG; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKA; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKPoint; ?></td>
                    <td align="center" class="FarmStats"><?php echo $tmpTotFarmPKShots; ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotESG; ?></td>
                    <td align="center" ><?php echo $tmpTotESA; ?></td>
                    <td align="center" ><?php echo $tmpTotESP; ?></td>
                    <td align="center" ><?php echo $tmpTotESShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPPG; ?></td>
                    <td align="center" ><?php echo $tmpTotPPA; ?></td>
                    <td align="center" ><?php echo $tmpTotPPPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPPShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPKG; ?></td>
                    <td align="center" ><?php echo $tmpTotPKA; ?></td>
                    <td align="center" ><?php echo $tmpTotPKPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPKShots; ?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
                
			</div>
			<div id="tabs-6">
            	<?php echo "<h3>".$l_Shootouts."</h3>"; 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmMinutePlay=0;
				$tmpTotFarmPKMinutePlay=0;
				$tmpTotFarmPPMinutePlay=0;
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
                    <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                    <th><a title="<?php echo $l_ShotsFor_D;?>"><?php echo $l_ShotsFor;?></a></th>
                    <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPenalityShotsScore']; $tmpTotFarmPenalityShotsScore=$tmpTotFarmPenalityShotsScore+$row_GetStats['FarmPenalityShotsScore'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPenalityShotsTotal']; $tmpTotFarmPenalityShotsTotal=$tmpTotFarmPenalityShotsTotal+$row_GetStats['FarmPenalityShotsTotal'];?></td>
                        <td align="center"><?php if($row_GetPlayoffStats['FarmPenalityShotsTotal'] > 0){ echo number_format(($row_GetStats['FarmPenalityShotsScore'] / $row_GetStats['FarmPenalityShotsTotal']) * 100,0); } else { echo 0; }?></td>
                    </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0 || $tmpStatus > 1){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetStats['Season']."-".substr($row_GetStats['Season']+1, -2); ?></td>           
                    <td align="center"><?php echo $row_GetStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPenalityShotsScore']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetStats['ProPenalityShotsScore'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPenalityShotsTotal']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetStats['ProPenalityShotsTotal'];?></td>
                  	<td align="center"><?php if($row_GetStats['ProPenalityShotsTotal'] > 0){ echo number_format(($row_GetStats['ProPenalityShotsScore'] / $row_GetStats['ProPenalityShotsTotal']) * 100,0); } else { echo 0; } ?></td>
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
                    <td align="center" class="FarmStats"><?php if($tmpTotFarmPenalityShotsTotal > 0) { echo number_format(($tmpTotFarmPenalityShotsScore / $tmpTotFarmPenalityShotsTotal) * 100,0); } else { echo "0"; } ?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>                
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                    <td align="center" ><?php if($tmpTotPenalityShotsTotal > 0) { echo number_format(($tmpTotPenalityShotsScore / $tmpTotPenalityShotsTotal) * 100,0); } else { echo "0"; } ?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
                
                <?php 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				$tmpTotFarmGP=0;
				$tmpTotFarmMinutePlay=0;
				$tmpTotFarmPKMinutePlay=0;
				$tmpTotFarmPPMinutePlay=0;
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
                    <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                    <th><a title="<?php echo $l_ShotsFor_D;?>"><?php echo $l_ShotsFor;?></a></th>
                    <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
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
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPenalityShotsScore']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetPlayoffStats['FarmPenalityShotsScore'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPenalityShotsTotal']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetPlayoffStats['FarmPenalityShotsTotal'];?></td>
                        <td align="center" class="FarmStats"><?php if($row_GetPlayoffStats['FarmPenalityShotsTotal'] > 0){ echo number_format(($row_GetPlayoffStats['FarmPenalityShotsScore'] / $row_GetPlayoffStats['FarmPenalityShotsTotal']) * 100,0); } else { echo "0"; }?></td>
                  </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                  <tr>
                    <td align="center"><?php echo $row_GetPlayoffStats['Season']."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProTeamName']; ?></td>            
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPenalityShotsScore']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetPlayoffStats['ProPenalityShotsScore'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPenalityShotsTotal']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetPlayoffStats['ProPenalityShotsTotal'];?></td>
                  	<td align="center"><?php if($row_GetPlayoffStats['ProPenalityShotsTotal'] > 0){ echo number_format(($row_GetPlayoffStats['ProPenalityShotsScore'] / $row_GetPlayoffStats['ProPenalityShotsTotal']) * 100,0); } else { echo "0"; }?></td>
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
                    <td align="center" class="FarmStats"><?php if($tmpTotFarmPenalityShotsTotal > 0){ echo number_format(($tmpTotFarmPenalityShotsScore / $tmpTotFarmPenalityShotsTotal) * 100,0);  } else { echo "0"; }?></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0){?>  
                <tr>
                  	<td align="center" >&nbsp;</td>			
                    <td align="center" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                    <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                    <td align="center" ><?php if($tmpTotPenalityShotsTotal > 0){ echo number_format(($tmpTotPenalityShotsScore / $tmpTotPenalityShotsTotal) * 100,0);  } else { echo "0"; }?></td>
                </tr>
              	<?php } ?>
                </tfoot>
                </table>
                <?php } ?>
			</div>
            
            <div id="tabs-7">
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
											echo '<a href="contract_extension.php?team='.$_SESSION["current_Team_ID"].'&player='.$row_GetPlayer["Number"].'"><strong>'.$l_OfferContract.'</strong></a></li>';
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
			<div id="tabs-8">
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
            <div id="tabs-9">
            	<h3><?php echo $l_Notes; ?></h3>
                <?php if ($row_GetPlayer['BIO'] != ""){ echo $row_GetPlayer['BIO'];}?>
				<br clear="all" />
                
                <?php
                if ($totalRows_GetTrophyPlayoffsChampions > 0 || $totalRows_GetTrophyRookieOfTheYear > 0 || $totalRows_GetTrophyPlayoffMVP > 0 || $totalRows_GetTrophyMVP > 0 || $totalRows_GetTrophyTopScorer > 0 || $totalRows_GetTrophyTopGoalScorer > 0 || $totalRows_GetTrophyDefensemanOfTheYear > 0 || $totalRows_GetTrophyBestDefensiveForward > 0 || $totalRows_GetTrophyMostSportsmanlikePlayer > 0 || $totalRows_GetTrophyLowestPIM > 0 || $totalRows_GetFarmTrophyPlayoffsChampions > 0 || $totalRows_GetFarmTrophyRookieOfTheYear > 0 || $totalRows_GetFarmTrophyPlayoffMVP > 0 || $totalRows_GetFarmTrophyMVP > 0 || $totalRows_GetFarmTrophyTopScorer > 0 || $totalRows_GetFarmTrophyTopGoalScorer > 0 || $totalRows_GetFarmTrophyDefensemanOfTheYear > 0 || $totalRows_GetFarmTrophyBestDefensiveForward > 0 || $totalRows_GetFarmTrophyMostSportsmanlikePlayer > 0 || $totalRows_GetFarmTrophyLowestPIM > 0){

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
					
					if ($totalRows_GetTrophyTopScorer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=TopScorer'>".$row_GetTrophyNames['TopScorer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyTopScorer['Season'];
							if($i < $totalRows_GetTrophyTopScorer){ echo ", "; }
						} while ($row_GetTrophyTopScorer = mysql_fetch_assoc($GetTrophyTopScorer));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyTopGoalScorer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=TopGoalScorer'>".$row_GetTrophyNames['TopGoalScorer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyTopGoalScorer['Season'];
							if($i < $totalRows_GetTrophyTopGoalScorer){ echo ", "; }
						} while ($row_GetTrophyTopGoalScorer = mysql_fetch_assoc($GetTrophyTopGoalScorer));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyDefensemanOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=DefensemanOfTheYear'>".$row_GetTrophyNames['DefensemanOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyDefensemanOfTheYear['Season'];
							if($i < $totalRows_GetTrophyDefensemanOfTheYear){ echo ", "; }
						} while ($row_GetTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetTrophyDefensemanOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyBestDefensiveForward > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=BestDefensiveForward'>".$row_GetTrophyNames['BestDefensiveForward']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyBestDefensiveForward['Season'];
							if($i < $totalRows_GetTrophyBestDefensiveForward){ echo ", "; }
						} while ($row_GetTrophyBestDefensiveForward = mysql_fetch_assoc($GetTrophyBestDefensiveForward));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyMostSportsmanlikePlayer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=MostSportsmanlikePlayer'>".$row_GetTrophyNames['MostSportsmanlikePlayer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyMostSportsmanlikePlayer['Season'];
							if($i < $totalRows_GetTrophyMostSportsmanlikePlayer){ echo ", "; }
						} while ($row_GetTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetTrophyMostSportsmanlikePlayer));
						echo "</li>";
					}
					
					if ($totalRows_GetTrophyLowestPIM > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=LowestPIM'>".$row_GetTrophyNames['LowestPIM']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetTrophyLowestPIM['Season'];
							if($i < $totalRows_GetTrophyLowestPIM){ echo ", "; }
						} while ($row_GetTrophyLowestPIM = mysql_fetch_assoc($GetTrophyLowestPIM));
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
					
					if ($totalRows_GetFarmTrophyTopScorer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmTopScorer'>".$row_GetTrophyNames['FarmTopScorer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyTopScorer['Season'];
							if($i < $totalRows_GetFarmTrophyTopScorer){ echo ", "; }
						} while ($row_GetFarmTrophyTopScorer = mysql_fetch_assoc($GetFarmTrophyTopScorer));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyTopGoalScorer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmTopGoalScorer'>".$row_GetTrophyNames['FarmTopGoalScorer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyTopGoalScorer['Season'];
							if($i < $totalRows_GetFarmTrophyTopGoalScorer){ echo ", "; }
						} while ($row_GetFarmTrophyTopGoalScorer = mysql_fetch_assoc($GetFarmTrophyTopGoalScorer));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyDefensemanOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmDefensemanOfTheYear'>".$row_GetTrophyNames['FarmDefensemanOfTheYear']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyDefensemanOfTheYear['Season'];
							if($i < $totalRows_GetFarmTrophyDefensemanOfTheYear){ echo ", "; }
						} while ($row_GetFarmTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetFarmTrophyDefensemanOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyBestDefensiveForward > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmBestDefensiveForward'>".$row_GetTrophyNames['FarmBestDefensiveForward']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyBestDefensiveForward['Season'];
							if($i < $totalRows_GetFarmTrophyBestDefensiveForward){ echo ", "; }
						} while ($row_GetFarmTrophyBestDefensiveForward = mysql_fetch_assoc($GetFarmTrophyBestDefensiveForward));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyMostSportsmanlikePlayer > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmMostSportsmanlikePlayer'>".$row_GetTrophyNames['FarmMostSportsmanlikePlayer']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyMostSportsmanlikePlayer['Season'];
							if($i < $totalRows_GetFarmTrophyMostSportsmanlikePlayer){ echo ", "; }
						} while ($row_GetFarmTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetFarmTrophyMostSportsmanlikePlayer));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyLowestPIM > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmLowestPIM'>".$row_GetTrophyNames['FarmLowestPIM']."</a> : ";
						$i = 0;
						do {
							$i = $i + 1;
							echo $row_GetFarmTrophyLowestPIM['Season'];
							if($i < $totalRows_GetFarmTrophyLowestPIM){ echo ", "; }
						} while ($row_GetFarmTrophyLowestPIM = mysql_fetch_assoc($GetFarmTrophyLowestPIM));
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
