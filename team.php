<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_A  = "A";
	$l_A_Desc  = "Assist";
	$l_ActiveOf = "active of";
	$l_Add_Article = "Add Article";
	$l_Approval = "Approval";
	$l_AveAge = "Average Age";
	$l_AveHT = "Average Height";
	$l_AveWT = "Average Weight";
	$l_C  = "C";
	$l_Close="Close Me!";
	$l_CommishApprove = "Commish Approval";
	$l_Conference_Leaders = "CONFERENCE STANDINGS";
	$l_Contract = "CONTRACT";
	$l_Contract = "Contract";
	$l_CurrentActivities = "Current Activities";
	$l_D  = "D";
	$l_Date = "Date";
	$l_days = "Day(s)";
	$l_Days = "DAY(S)";
	$l_details = "DETAILS";
	$l_Div_leaders  = "DIVISION STANDINGS";
	$l_DivisionLeader = "Division Leader";
	$l_eliminated = "Eliminated from the playoffs";
	$l_EX_F = "Farm experience";
	$l_EX_P = "Pro experience";
	$l_FFacts = "Franchise Facts";
	$l_FreeAgentOffers = "Free Agent Offers";
	$l_FreeAgents = "Free Agent Offers";
	$l_FutureConsiderations="Future Considerations";
	$l_G  = "G";
	$l_GAA  = "GAA";
	$l_GAA_Desc  = "GAA";
	$l_GAA_leaders  = "GOALS AGAINST AVERAGE LEADERS";
	$l_Game = "Game";
	$l_GamePreview = "Game Preview & Match-up";
	$l_Games="Games";
	$l_GeneralManager = "General Manager";
	$l_GeneralManagerDetails = "General Manager Details";
	$l_GM = "G.M.";
	$l_GO  = "G";
	$l_GO_Desc  = "Goals";
	$l_GoalieLeader = "Goalie Leaders";
	$l_GP  = "GP";
	$l_GP = "GP";
	$l_GP_Desc  = "Games Played";
	$l_HomeRecord = "Home Record";
	$l_injuried_list = "Injuried List";
	$l_L  = "L";
	$l_L_Desc  = "Loss";
	$l_L10 = "LAST 10";
	$l_Last10 = "Last 10 Games";
	$l_Last10_D = "Last 10";
	$l_LastLoginDate = "Signed In";
	$l_LastUploadDate = "Lines Uploaded";
	$l_Leads=" leads ";
	$l_Leave  = "LEAVE";
	$l_LeaveDate = "Leave Date";
	$l_LinesLastLoaded = "Lines Uploaded";
	$l_LiveFrom = "Live from the";
	$l_LW  = "LW";
	$l_Messages = "Messages";
	$l_moredetails = "more details";
	$l_News = "News";
	$l_NextGameIn  = "NEXT GAME IN";
	$l_NoGames = "No games are scheduled.";
	$l_Note = "Note";
	$l_OTL  = "OTL";
	$l_OTL_Desc  = "Overtime Loss";
	$l_Over=" over ";
	$l_Overagers = "Overagers";
	$l_overview = "";
	$l_P_M  = "+/-";
	$l_P_M_Desc  = "Plus Minus";
	$l_Participation = "Participation";
	$l_PCT  = "PCT";
	$l_PCT_Desc  = "Save Percentage";
	$l_players = "players";
	$l_Playoff_E = "Clinched Playoff spot";
	$l_Playoff_P = "Clinched League Title";
	$l_Playoff_R1 = "Conference Quarter-Finals"; 
	$l_Playoff_R2 = "Conference Semi-Finals"; 
	$l_Playoff_R3 = "Conference Finals"; 
	$l_Playoff_R4 = "Finals"; 
	$l_Playoff_Y = "Clinched Division";
	$l_Playoff_Z = "Clinched Conference";
	$l_PlayoffSeries = "Playoff Series";
	$l_Pts  = "Pts";
	$l_Pts_Desc  = "Points";
	$l_Pts_leaders  = "POINTS LEADERS";
	$l_readmore = "READ MORE";
	$l_READMORE="READ MORE";
	$l_Record = "Overall Record";
	$l_Record="Record";
	$l_Return  = "RETURN";
	$l_ReturnDate = "Return Date";
	$l_RFAFreeAgents = "RFA";
	$l_RW  = "RW";
	$l_score = "Score";
	$l_ScoreLeader = "Scoring Leaders";
	$l_Send = "Send E-mail";
	$l_StarMonth = "STAR OF THE MONTH";
	$l_StarWeek = "STAR OF THE WEEK";
	$l_Status = "STATUS";
	$l_Status = "Status";
	$l_StatusUpdate = "Status Update";
	$l_streak_leaders = "Streak Leaders";
	$l_Team  = "TEAM";
	$l_team1 = "Team 1";
	$l_team1Approve = "Status";
	$l_team2 = "Team 2";
	$l_team2Approve = "Status";
	$l_TeamAwards = "TEAM AWARDS";
	$l_TeamHistory = "STHS Team History";
	$l_Tied = "&eacute;gal";
	$l_Tonight  = "NEXT GAME TONIGHT";
	$l_Tonight = "Tonight, ";
	$l_TotalSalary = "Total Salary";
	$l_TotRoster = "Total Roster";
	$l_TotProspect = "Total Prospects";
	$l_TradeOffers = "Trade Offers";
	$l_TransactionHistory = "Histoire";
	$l_TransactionsLog = "Transactions Log";
	$l_UFAFreeAgents = "UFA";
	$l_VisitorRecord = "Away Record";
	$l_W  = "W";
	$l_W_Desc  = "Wins";
	$l_Year = "YEAR";
	$l_Years = "YEARS";
	$l_Years = "years";
	break; 

case 'fr': 
	$l_A  = "A";
	$l_A_Desc  = "Assistance";
	$l_ActiveOf = "active de";
	$l_Add_Article = "Ajouter un article";
	$l_Approval = "Approuv&eacute;";
	$l_AveAge = "moyenne d’&acirc;ge ";
	$l_AveHT = "Taille moyenne";
	$l_AveWT = "Poids moyen";
	$l_C  = "C";
	$l_Close="Fermer !";
	$l_Close="Fermer";
	$l_CommishApprove = "Approbation du Commissaire";
	$l_Conference_Leaders = "CLASSEMENT DE CONF&Eacute;RENCE";
	$l_Contract = "CONTRAT";
	$l_Contract = "Contrat";
	$l_CurrentActivities = "Activit&eacute; Courante";
	$l_D  = "D";
	$l_Date = "Date";
	$l_days = "Jour(s)";
	$l_Days = "JOUR(S)";
	$l_details = "D&eacute;tails";
	$l_Div_leaders  = "CLASSEMENT DE DIVISION";
	$l_DivisionLeader = "Classement de Division";
	$l_eliminated = "&Eacute;limin&eacute; des s&eacute;ries";
	$l_EX_F = "Exp&eacute;rience Farm ";
	$l_EX_P = "Exp&eacute;rience Pro ";
	$l_FFacts = "Composition de votre franchise";
	$l_FreeAgentOffers = "Offres aux Agents Libres";
	$l_FreeAgents = "Offres aux Agents Libres";
	$l_FutureConsiderations="consid&eacute;rations futures";
	$l_GAA  = "MOY";
	$l_GAA_Desc  = "Moyenne";
	$l_GAA_leaders  = "MEILLEURE MOYENNE DE BUT ALLOU&Eacute;";
	$l_Game = "Match";
	$l_GamePreview = "Pr&eacute;vision de jeu";
	$l_Games="Parties";
	$l_GeneralManager = "Directeur G&eacute;n&eacute;ral";
	$l_GeneralManagerDetails = "D&eacute;tails du Directeur G&eacute;n&eacute;ral";
	$l_GM = "D.G.";
	$l_GO  = "B";
	$l_GO_Desc  = "Buts";
	$l_GoalieLeader = "Meilleur Gardien";
	$l_GP  = "PJ";
	$l_GP = "PJ";
	$l_GP_Desc  = "Parties jou&eacute;es";
	$l_HomeRecord = "Domicile";
	$l_injuried_list = "Liste des bless&eacute;s";
	$l_L  = "D";
	$l_L_Desc  = "D&eacute;faites";
	$l_L10 = "10 Derniers";
	$l_Last10 = " Derni&egrave;res 10 parties";
	$l_Last10_D = "10 Derniers";
	$l_LastLoginDate = "Dernier login";
	$l_LastUploadDate = "Trios envoy&eacute;s";
	$l_Leads="m&egrave;ne";
	$l_Leave  = "QUITTER";
	$l_LeaveDate = "Date de d&eacute;part";
	$l_LinesLastLoaded = "Lignes t&eacute;l&eacute;chargement";
	$l_LiveFrom = "En direct du";
	$l_LW  = "AG";
	$l_Messages = "Messages";
	$l_moredetails = "D&eacute;tails";
	$l_News = "Nouvelles";
	$l_NextGameIn  = "PROCHAIN MATCH DANS";
	$l_NoGames = "Aucun match de c&eacute;dul&eacute;.";
	$l_Note = "Note";
	$l_OTL  = "DP";
	$l_OTL_Desc  = "D&eacute;faites en prolongation";
	$l_Over="sur";
	$l_Overagers = "Joueurs d'impact";
	$l_overview = "Global";
	$l_P_M  = "+/-";
	$l_P_M_Desc  = "Plus et Moins";
	$l_Participation = "Participation";
	$l_PCT  = "%EFF";
	$l_PCT_Desc  = "Pourcentage d'efficacit&eacute;";
	$l_players = "joueurs";
	$l_Playoff_E = "assur&eacute; d’une place en s&eacute;rie";
	$l_Playoff_P = "assur&eacute; du titre de la ligue";
	$l_Playoff_R1 = "Quart de finale de conf&eacute;rence"; 
	$l_Playoff_R2 = "Demi-finale de conf&eacute;rence"; 
	$l_Playoff_R3 = "Finale de conf&eacute;rence"; 
	$l_Playoff_R4 = "Finale"; 
	$l_Playoff_Y = "assur&eacute; du titre de division";
	$l_Playoff_Z = "assur&eacute; du titre de conf&eacute;rence";
	$l_PlayoffSeries = "Ronde des S&eacuteries";
	$l_Pts  = "Pts";
	$l_Pts_Desc  = "Points";
	$l_Pts_leaders  = "MEILLEUR POINTEUR";
	$l_readmore = "LIRE PLUS";
	$l_READMORE="LIRE PLUS";
	$l_Record = "Fiche";
	$l_Record="Fiche";
	$l_Return  = "Retour";
	$l_ReturnDate = "Date de Retour";
	$l_RFAFreeAgents = "RFA";
	$l_RW  = "AD";
	$l_score = "Pointage";
	$l_ScoreLeader = "Meilleur Pointeur";
	$l_Send = "Envoyez le Courriel";
	$l_StarMonth = "&Eacute;TOILE DU MOIS";
	$l_StarWeek = "&Eacute;TOILE DE LA SEMAINE";
	$l_Status = "STATUS";
	$l_Status = "Status";
	$l_StatusUpdate = "Notification partie";
	$l_streak_leaders = "S&eacute;quences";
	$l_Team  = "&Eacute;QUIPE";
	$l_team1 = "&Eacute;quipe  1";
	$l_team1Approve = "Approbation";
	$l_team2 = "&Eacute;quipe  2";
	$l_team2Approve = "Approbation";
	$l_TeamAwards = "TROPH&Eacute;ES D’&Eacute;QUIPE";
	$l_TeamHistory = "Historique STHS de l’&eacute;quipe";
	$l_Tied = "&eacute;gal";
	$l_Tonight  = "PROCHAIN MATCH CE SOIR";
	$l_Tonight = "Ce soir, ";
	$l_TotalSalary = "Salaire en Totalit&eacute;";
	$l_TotRoster = "Alignement total ";
	$l_TotProspect = "Prospects total ";
	$l_TradeOffers = "Offres d’&eacute;changes";
	$l_TransactionHistory = "Historique des transactions";
	$l_TransactionsLog = "Transactions";
	$l_UFAFreeAgents = "UFA";
	$l_VisitorRecord = "Ext&eacute;rieur";
	$l_W  = "V";
	$l_W_Desc  = "Victoires";
	$l_Year = "ann&eacute;e";
	$l_Years = "ANN&Eacute;ES";
	$l_Years = "ann&eacute;es";
	break;
} 


$maxRows_GetTop5 = 5;
$pageNum_GetTop5 = 0;
if (isset($_GET['pageNum_GetTop5'])) {
  $pageNum_GetTop5 = $_GET['pageNum_GetTop5'];
}
$startRow_GetTop5 = $pageNum_GetTop5 * $maxRows_GetTop5;

$SID_GetTop5 = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
$DID_GetTop5 = "Atlantic";
if (isset($_SESSION['current_Division'])) {
  $DID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_Division'] : addslashes($_SESSION['current_Division']);
}
$CID_GetTop5 = "Eastern Conference";
if (isset($_SESSION['current_Conference'])) {
  $CID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_Conference'] : addslashes($_SESSION['current_Conference']);
}
$TID_GetTop5 = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}
$ZID_GetTop5 = "1";
if (isset($_SESSION['current_Farm_Team'])) {
  $ZID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_Farm_Team'] : addslashes($_SESSION['current_Farm_Team']);
}


$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);
$query_limit_GetTop5 = sprintf("SELECT SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, ((SUM(playerstats.ProStar1)*3)+(SUM(playerstats.ProStar2)*2)+(SUM(playerstats.ProStar3)*1)) as ProStar, SUM(playerstats.ProPlusMinus) as ProPlusMinus, SUM(playerstats.ProPim) as ProPim, playerstats.Name, SUM( playerstats.ProPoint ) AS ProPoint, SUM( playerstats.ProGP ) AS ProGP, SUM( playerstats.ProG ) AS ProG, SUM( playerstats.ProA ) AS ProA, players.Number
FROM playerstats, players
WHERE players.Team = '%s'
AND playerstats.Season_ID=%s
AND players.Name = playerstats.Name
AND ProGP > 0
GROUP BY playerstats.Name
ORDER BY ProPoint DESC , ProG DESC LIMIT  0,5", $TID_GetTop5,$SID_GetTop5);
$GetTop5 = mysql_query($query_limit_GetTop5, $connection) or die(mysql_error());
$row_GetTop5 = mysql_fetch_assoc($GetTop5);
$totalRows_GetTop5 = mysql_num_rows($GetTop5);

$query_GetTop2 = sprintf("SELECT ((SUM(goaliestats.ProStar1)*3)+(SUM(goaliestats.ProStar2)*2)+(SUM(goaliestats.ProStar3)*1)) as ProStar, goalies.Team, SUM(goaliestats.ProGA) as ProGA, SUM(goaliestats.ProSA) as ProSA, SUM(goaliestats.ProW) as ProW, SUM(goaliestats.ProGP) as ProGP, goaliestats.Name, SUM( goaliestats.ProShutouts ) AS ProShutouts, SUM( goaliestats.ProOTL ) AS ProOTL, SUM( goaliestats.ProMinPlay ) AS ProMinPlay, SUM( goaliestats.ProGP ) AS ProGP, SUM( goaliestats.ProL ) AS ProL, goalies.Number
FROM goaliestats, goalies
WHERE goalies.Name=goaliestats.Name 
AND goalies.Team='%s'
AND goaliestats.Season_ID = %s  
AND ProGP > 0
GROUP BY goaliestats.Name
ORDER BY goaliestats.ProW desc, ProGP desc
LIMIT  0,5", $TID_GetTop5,$SID_GetTop5);
$GetTop2 = mysql_query($query_GetTop2, $connection) or die(mysql_error());
$row_GetTop2 = mysql_fetch_assoc($GetTop2);
$totalRows_GetTop2 = mysql_num_rows($GetTop2);

$query_GetTeamHistory = sprintf("SELECT * FROM teamhistory WHERE Team='%s' ORDER BY DateCreated desc LIMIT 0,5", $_SESSION['current_Team']);
$GetTeamHistory = mysql_query($query_GetTeamHistory, $connection) or die(mysql_error());
$row_GetTeamHistory = mysql_fetch_assoc($GetTeamHistory);
$totalRows_GetTeamHistory = mysql_num_rows($GetTeamHistory);

$query_GetStandings = sprintf("SELECT proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteam.Name, proteam.Number, proteam.Abbre, proteam.City, proteam.Division, proteamstandings.Point,  proteamstandings.GP, proteamstandings.W, proteamstandings.L, proteamstandings.T, proteamstandings.OTW, proteamstandings.SOW, proteamstandings.OTL, proteamstandings.SOL, proteamstandings.GA, proteamstandings.GF FROM proteam, proteamstandings WHERE proteamstandings.Number=proteam.Number AND proteam.Division='%s' AND proteamstandings.Season_ID=%s ORDER BY proteamstandings.StandingPlayoffTitle desc, proteamstandings.Point desc, proteamstandings.GP asc, proteamstandings.W asc, proteamstandings.GF desc",$DID_GetTop5,$SID_GetTop5);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);
$totalRows_GetStandings = mysql_num_rows($GetStandings);

$query_GetConfStandings = sprintf("SELECT proteamstandings.StandingPlayoffTitle, proteam.Name, proteam.Number, proteam.Abbre, proteam.City, proteam.Division, proteamstandings.Point,  proteamstandings.GP, proteamstandings.W, proteamstandings.L, proteamstandings.T, proteamstandings.OTW, proteamstandings.SOW, proteamstandings.OTL, proteamstandings.SOL, proteamstandings.GA, proteamstandings.GF FROM proteam, proteamstandings WHERE proteamstandings.Number=proteam.Number AND proteam.Conference='%s' AND proteamstandings.Season_ID=%s ORDER BY proteamstandings.StandingPlayoffTitle desc, proteamstandings.DivisionLeader desc, proteamstandings.Point desc, proteamstandings.GP asc, proteamstandings.W asc, proteamstandings.GF desc",$CID_GetTop5,$SID_GetTop5);
$GetConfStandings = mysql_query($query_GetConfStandings, $connection) or die(mysql_error());
$row_GetConfStandings = mysql_fetch_assoc($GetConfStandings);

$query_GetTransactionHistory = sprintf("SELECT o.*, 'False' as PosG FROM playerscontractoffers as o, players as p WHERE o.Player=p.Name AND (o.TYPE='Extension' OR o.TYPE='Signed') AND (o.Team=%s OR o.Team='%s')  UNION ALL SELECT o.*, 'True' as PosG FROM playerscontractoffers as o, goalies as p WHERE o.Player=p.Name AND (o.TYPE='Extension' OR o.TYPE='Signed') AND (o.Team=%s OR o.Team='%s') ORDER BY DateCreated desc LIMIT 0,30", $_SESSION['current_Team_ID'], $_SESSION['current_Team'], $_SESSION['current_Team_ID'], $_SESSION['current_Team']);
$GetTransactionHistory = mysql_query($query_GetTransactionHistory, $connection) or die(mysql_error());
$row_GetTransactionHistory = mysql_fetch_assoc($GetTransactionHistory);
$totalRows_GetTransactionHistory = mysql_num_rows($GetTransactionHistory);

$query_GetTransactionTeamHistory = sprintf("SELECT * FROM teamhistory WHERE Team=%s ORDER BY Season_ID DESC, ID DESC LIMIT 0,30",$_SESSION['current_Team_ID']);
$GetTransactionTeamHistory = mysql_query($query_GetTransactionTeamHistory, $connection) or die(mysql_error());
$row_GetTransactionTeamHistory = mysql_fetch_assoc($GetTransactionTeamHistory);
$totalRows_GetTransactionTeamHistory = mysql_num_rows($GetTransactionTeamHistory);

$TID_GetTeamNews = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetTeamNews = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}
$query_limit_GetTeamNews = sprintf("SELECT a.DateCreated, a.A_ID, a.Headline, a.Image, a.Summary FROM articles as a WHERE a.Team=%s ORDER BY a.DateCreated desc LIMIT 0, 5", $TID_GetTeamNews);
$GetTeamNews = mysql_query($query_limit_GetTeamNews, $connection) or die(mysql_error());
$row_GetTeamNews = mysql_fetch_assoc($GetTeamNews);

$query_GetTeamGM = sprintf("SELECT proteam.oauth_provider, proteam.oauth_uid, proteam.AwayActive, proteam.Awayleave, proteam.AwayReturn, proteam.AwayNote, proteam.LastModifiedLines, proteam.LastVisit, proteam.Messenger, proteam.Name, proteam.City, proteam.Arena, proteam.GM, proteam.Email, proteam.Number, proteam.Avatar FROM proteam WHERE proteam.Number=%s",$TID_GetTop5);
$GetTeamGM = mysql_query($query_GetTeamGM, $connection) or die(mysql_error());
$row_GetTeamGM = mysql_fetch_assoc($GetTeamGM);

$query_GetInjuryList = "select Name, Number, Injury, CON, PosC,	PosLW, PosRW, PosD, 'False' as PosG from players where Injury <> '' AND Team='".$_SESSION['current_Team_ID']."'  UNION ALL SELECT Name, Number, Injury, CON, 'False' as PosC,	'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG from goalies where Injury <> '' AND Team='".$_SESSION['current_Team_ID']."'";
$GetInjuryList = mysql_query($query_GetInjuryList, $connection) or die(mysql_error());
$row_GetInjuryList = mysql_fetch_assoc($GetInjuryList);
$totalRows_GetInjuryList = mysql_num_rows($GetInjuryList);

$query_GetContracts = sprintf("SELECT e.*, p.PosC,	p.PosLW, p.PosRW, p.PosD, 'False' as PosG FROM playerscontractoffers as e, players as p WHERE e.Team='%s' AND e.Player=p.Name AND e.TYPE='Extension' UNION ALL SELECT e.*,'False' as PosC,'False' as PosLW,'False' as PosRW, 'False' as PosD, 'True' as PosG FROM playerscontractoffers as e, goalies as g WHERE e.Team='%s' AND e.Player=g.Name AND e.TYPE='Extension' ORDER BY DateCreated Desc", $_SESSION['current_Team'], $_SESSION['current_Team']);
$GetContracts = mysql_query($query_GetContracts, $connection) or die(mysql_error());
$row_GetContracts = mysql_fetch_assoc($GetContracts);
$totalRows_GetContracts = mysql_num_rows($GetContracts);

$query_GetPlayerWeek = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower7Days, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t, players as p WHERE p.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower7Days, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t, goalies as g WHERE g.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s ORDER BY ProStarPower7Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $TID_GetTop5, $_SESSION['current_SeasonID'], $TID_GetTop5);
$GetPlayerWeek = mysql_query($query_GetPlayerWeek, $connection) or die(mysql_error());
$row_GetPlayerWeek = mysql_fetch_assoc($GetPlayerWeek);
$totalRows_GetPlayerWeek = mysql_num_rows($GetPlayerWeek);

$query_GetPlayerMonth = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower30Days, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t, players as p WHERE p.Team=s.Team AND Season_ID=%s AND s.Team=t.Number AND s.Team=%s UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower30Days, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t, goalies as g WHERE g.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s ORDER BY ProStarPower30Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $TID_GetTop5, $_SESSION['current_SeasonID'], $TID_GetTop5);
$GetPlayerMonth = mysql_query($query_GetPlayerMonth, $connection) or die(mysql_error());
$row_GetPlayerMonth = mysql_fetch_assoc($GetPlayerMonth);
$totalRows_GetPlayerMonth = mysql_num_rows($GetPlayerMonth);

if(isset($_SESSION['Avatar'])){ 
	$avatar=$_SESSION['Avatar'];
} else { 
	$avatar = '/image/gm/'.$_SESSION['CommishIcon'];
}
if(isset($_SESSION['U_Team'])){ 
	$defaultname=$_SESSION['U_Team'];
} else { 
	$defaultname = $l_commissioner;
}

$query_GetRecentStatus = sprintf("
SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, c.Comment as Comment, c.A_ID as A_ID, p.Avatar, p.GM, p.oauth_provider, p.oauth_uid
FROM comments as c, proteam as p 
WHERE c.Team=%s
AND c.Team=p.Number 
AND c.Parent_ID=0 
ORDER BY DateModified DESC LIMIT 5",$_SESSION['current_Team_ID'],$_SESSION['current_Team_ID']);
$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);

$RecoveryRate=1;
$query_GetInfo = sprintf("SELECT TinyLeagueImage, FarmLeague, RecoveryRate, DisplayOffers, LastModifiedSchedule, LeagueFile FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$RecoveryRate=$row_GetInfo['RecoveryRate'];
$UserFarmleage=$row_GetInfo['FarmLeague'];
$tmpLeagueLogo=$row_GetInfo['TinyLeagueImage']; 



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $_SESSION['current_City']." ".$_SESSION['current_Team']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">       
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/newsrotator.css" />

<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.news.js"></script>

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
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  //Toggle Teaser
	$("a.collapse").click(function(){
		$(".main_image .block").slideToggle();
		$("a.collapse").toggleClass("show");
	});
  $("#TeamPhoto1").reflect({height:35,opacity:0.3});
  $("#TeamPhoto2").reflect({height:35,opacity:0.3});
  $("#TeamPhoto3").reflect({height:35,opacity:0.3});
  $("#TeamPhoto4").reflect({height:35,opacity:0.3});
  


});
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>; border-color:#a1a1a1; border-width:1px; border-style:solid;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
.fieldsetStarleft {float:left; width:215px; }
.fieldsetStarleft table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>; border-width:0px; border-style:none;}

.fieldsetleft {float:left; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:500px; }
.fieldsetright {float:right; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:500px;}
legend {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; font-weight:bold; font-size:1.2em;}
#divscrollerhead{background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; text-align:left; font-size: 9pt; padding: 3px; border-color:#999999; border-style:solid; border-width:1px; font-weight:bold; margin-top:10px; color:#<?php echo $_SESSION['current_TextColor']; ?>}
#divscroller{height:145px; overflow-x: hidden; padding:4px; vertical-align: top; line-height:17px; border-style:solid; border-width:1px; border-color:#a1a1a1; font-size:11px; margin-bottom:15px;}
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
    
    <?php 
	if(isset($_SESSION['U_ID'])){
		if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
			echo "<div style='padding:0px 5px 5px 0px; float:right;'><a href='add_article.php' class='button add'><strong>".$l_Add_Article."</strong></a></div><br clear='all' />";
		}
	}
	?>
    <div id="main" class="container">
        <div class="main_image">
            <img src="<?php echo ($_SESSION['DomainName']."/image/headlines/".$row_GetTeamNews['Image']); ?>" alt="- banner1" />
            <div class="desc">
                <a href="#" class="collapse"><?php echo $l_Close;?></a>
                <div class="block">
                    <h4><?php echo $row_GetTeamNews['Headline']; ?></h4>
                    <small><?php echo $row_GetTeamNews['DateCreated']; ?></small>
					<p><?php echo $row_GetTeamNews['Summary']; ?></p>
                    <p style="margin:0px 10px 0px 0px; font-weight:bold; font-size:0.9em; text-align:right;"><a href="<?php echo("news.php?article=".$row_GetTeamNews['A_ID']);?>" style="color:#FFFFFF; font-size:1em;"><?php echo $l_READMORE;?></a></p>
                </div>
            </div>
        </div>
        <div class="image_thumb">
            <ul>
            <?php do { ?>
                <li>
                    <a href="<?php echo ($_SESSION['DomainName']."/image/headlines/".$row_GetTeamNews['Image']); ?>"><img src="<?php echo ($_SESSION['DomainName']."/image/headlines/thumb/".$row_GetTeamNews['Image']); ?>" /></a>
                    <div class="block">
                        <h4><?php echo $row_GetTeamNews['Headline']; ?></h4>
                        <small><?php echo $row_GetTeamNews['DateCreated']; ?></small>
						<p><?php echo $row_GetTeamNews['Summary']; ?></p>
                    	<p style="margin-right:10px; margin-bottom:0px; font-weight:bold; font-size:0.9em; text-align:right;"><a href="<?php echo("news.php?article=".$row_GetTeamNews['A_ID']);?>" style="color:#FFFFFF; font-size:1em;"><?php echo $l_readmore;?></a></p>
                    </div>
                </li>
            <?php 
            } while ($row_GetTeamNews = mysql_fetch_assoc($GetTeamNews)); 
            mysql_free_result($GetTeamNews);
            ?>
            </ul>
        </div>
	</div>
		<Br /><Br />
    
  
<div id="tabs" class="fieldsetleft">
        <div id="tabs-1">
<?php
echo "<h3>".$_SESSION['current_City']." ".$_SESSION['current_Team']." ".$l_overview."</h3>";
$Day_ID = 0;
$TodaysDate = strftime('%Y-%m-%d', strtotime('now'));

if ($_SESSION['current_SeasonTypeID'] == 0){
	
	$query_GetPlayOff = sprintf("SELECT s.Day, s.Round, p.PlayOffEliminated, p.GP FROM proteamstandings as p, schedule as s WHERE p.Number=%s AND p.Season_ID=%s AND p.Season_ID=s.Season_ID AND (s.VisitorTeam=p.Number OR s.HomeTeam=p.Number) ORDER BY s.Day DESC LIMIT 0,1", $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID']);
	$GetPlayOff = mysql_query($query_GetPlayOff, $connection) or die(mysql_error());
	$row_GetPlayOff = mysql_fetch_assoc($GetPlayOff);
	$totalRows_GetPlayOff = mysql_num_rows($GetPlayOff);
	
	$tmpSeriesTitle=$l_Leads;
	if($row_GetPlayOff['PlayOffEliminated']=="True" || $row_GetPlayOff['PlayOffEliminated']=="Vrai"){$tmpSeriesTitle=$l_Over;}
	
	if($row_GetPlayOff['PlayOffEliminated']=="False" || $row_GetPlayOff['PlayOffEliminated']=="Faux" || $row_GetPlayOff['GP'] > 0 ){
	
	$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	if ($totalRows_GetLastDay==0){
		$Day_ID = 0;
	} else {
		$Day_ID = $row_GetLastDay['Day'];
	}
	
	$query_GetW = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND (VisitorTeam=%s OR HomeTeam=%s) AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID'], $row_GetPlayOff['Round']);
	$GetW = mysql_query($query_GetW, $connection) or die(mysql_error());
	$row_GetW = mysql_fetch_assoc($GetW);
	$totalRows_GetW = mysql_num_rows($GetW);
	
	if($_SESSION['current_Team_ID'] == $row_GetW['VisitorTeam']){
		 $tmpWinnerID=$row_GetW['HomeTeam'];
	 }else{
		 $tmpWinnerID=$row_GetW['VisitorTeam'];
	 }
				
	$query_GetTeamA = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $_SESSION['current_Team_ID']);
	$GetTeamA = mysql_query($query_GetTeamA, $connection) or die(mysql_error());
	$row_GetTeamA = mysql_fetch_assoc($GetTeamA);
	$totalRows_GetTeamA = mysql_num_rows($GetTeamA);
	
	
	$query_GetTeamB = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $tmpWinnerID);
	$GetTeamB = mysql_query($query_GetTeamB, $connection) or die(mysql_error());
	$row_GetTeamB = mysql_fetch_assoc($GetTeamB);
	$totalRows_GetTeamB = mysql_num_rows($GetTeamB);
	
	$tmpTS1=0;
	$tmpTS2=0;
	$k = 0;
	$CurrentRound = 0;
	do{
		if($k==0){
			 $lastHome=$row_GetW['HomeTeam']; 
			 $lastVisitor=$row_GetW['VisitorTeam'];
		}
		$k=$k+1;
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==1){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==1){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==2){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==2){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==3){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==3){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==4){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==4){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==5){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==5){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==6){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==6){$tmpTS2 = $tmpTS2 + 1;}	
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==7){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==7){$tmpTS2 = $tmpTS2 + 1;}
					
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && ($row_GetW['Play']=="True" OR $row_GetW['Play']=="Vrai")){$lastWin = "Visitor";}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && ($row_GetW['Play']=="True" OR $row_GetW['Play']=="Vrai")){$lastWin = "Home"; }
		
	} while ($row_GetW = mysql_fetch_assoc($GetW)); 
		
	if($CurrentRound != $_SESSION['current_Team_ID']){
		$CurrentRound = $_SESSION['current_Team_ID'];
			echo "<h2 align=center>";
			if($row_GetPlayOff['Round'] == 1){ 
				echo $l_Playoff_R1; 
			} else if($row_GetPlayOff['Round'] == 2){ 
				echo $l_Playoff_R2; 
			} else if($row_GetPlayOff['Round'] == 3){ 
				echo $l_Playoff_R3; 
			} else if($row_GetPlayOff['Round'] == 4){ 
				echo $l_Playoff_R4; 
			} 
			echo "</h2><br clear='all' />";
			echo '<table cellspacing="0" border="0" width="100%"><tr>';
			if($lastWin == "Visitor" && $lastVisitor==$row_GetTeamA['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></div></td>";

			} else if($lastWin == "Visitor" && $lastVisitor==$row_GetTeamB['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></div></td>";
			} else if($lastWin == "Home" && $lastVisitor==$row_GetTeamB['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></div></td>";
				
			} else if($lastWin == "Home" && $lastVisitor==$row_GetTeamA['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></div></td>";
			} else if ($tmpTS2 == $tmpTS1) {
				$tmpSeriesTitle=" tied ";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='pro_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></div></td>";
			}
			echo '</tr></table>';
			
			$query_GetSchedule = sprintf("SELECT schedule.S_ID, schedule.Day, schedule.VisitorTeam, schedule.HomeTeam FROM schedule WHERE (schedule.VisitorTeam='%s' OR schedule.HomeTeam='%s') AND schedule.Season_ID=%s AND schedule.Day >= %s AND (schedule.Play='False' OR schedule.Play='Faux') GROUP BY  schedule.Day asc Limit 0,1", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID'], $Day_ID);
			$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
			$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
			$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
			
			if ($newDate < $TodaysDate) {
				$Day_ID = $row_GetSchedule['Day'] - ($Day_ID + 1);
			} else {
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID;
			}
			echo '<h3 align=center>';
			if ($Day_ID == 0) {
				echo $l_Tonight;
				echo '&nbsp;&nbsp;&#8212;&nbsp;&nbsp;<a href="game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a>';
			
			} else if ($Day_ID < 0){
				echo $l_NoGames;
			} else {
				echo $l_NextGameIn.' '.$Day_ID.' '.$l_Days;
				echo '&nbsp;&nbsp;&#8212;&nbsp;&nbsp;<a href="game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a>';
			
			}
			echo '</h3>';
		echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
		echo '<thead>';
		echo '<tr><th>'.$l_Game.'</th><th>'.$l_Home.'</th><th>S</th><th>'.$l_Visitor.'</th><th>S</th></tr></thead><tbody>';
	}

	$tmpGameCount = 0;
	mysql_data_seek($GetW,0);
	while ($row_GetW = mysql_fetch_assoc($GetW)){
		$tmpGameCount = $tmpGameCount + 1;
		foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
			if($_SESSION['MenuTeamsID'][$TeamPage] == $row_GetW['HomeTeam']) {
				$HomeTeam=$_SESSION['MenuTeams'][$TeamPage];
			}
			if($_SESSION['MenuTeamsID'][$TeamPage] == $row_GetW['VisitorTeam']) {
				$VisitorTeam=$_SESSION['MenuTeams'][$TeamPage];
			}
		}

		$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Pro',CAST(".$row_GetW['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $_SESSION['current_SeasonID']);
		$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
		$row_GetLink = mysql_fetch_assoc($GetLink);
		$GameLink = $row_GetLink['Link'];
		if($GameLink==""){
			$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Pro'ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
			$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
			$row_GetLink = mysql_fetch_assoc($GetLink);
			$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
			$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
			$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetW['Number'].".html";
		}
		
		if($tmpSeriesTitle!=" over "){
			echo "<tr><td align=center width=75>";
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "<a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."'>Game ".$tmpGameCount."</a>";
			} else {
				echo "Game ".$tmpGameCount;	
			}
			echo "</td><td>".$HomeTeam."</td><td align=center width=20>".$row_GetW['HomeScore']."</td><td>".$VisitorTeam."</td><td align=center width=20>".$row_GetW['VisitorScore']."</td></tr>";
		} else {
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "<tr><td align=center width=75><a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."'>Game ".$tmpGameCount."</a></td><td>".$HomeTeam."</td><td align=center width=20>".$row_GetW['HomeScore']."</td><td>".$VisitorTeam."</td><td align=center width=20>".$row_GetW['VisitorScore']."</td></tr>";				
			}
		}
	} 
	echo '</tbody></table>';

	} else {
		echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
		echo '<thead><tr><th>'.$l_eliminated.'</th></tr></thead>';
		echo "<tbody><tr><td align='center'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/huge/".$_SESSION['current_LogoLarge']."'  vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$_SESSION['current_City']." ".$_SESSION['current_Team']."'></div></td></tr></tbody></table>";
	}

} else {
	
	$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	if ($totalRows_GetLastDay==0){
		$Day_ID = 0;
	} else {
		$Day_ID = $row_GetLastDay['Day'];
	}
	
	$WaiverDayID = $Day_ID;
		
		$query_GetSchedule = sprintf("SELECT schedule.Day, schedule.VisitorTeam, schedule.HomeTeam, schedule.S_ID FROM schedule WHERE (schedule.VisitorTeam='%s' OR schedule.HomeTeam='%s') AND schedule.Season_ID=%s AND schedule.Day >= %s AND (schedule.Play='False' OR schedule.Play='Faux') GROUP BY  schedule.Day asc Limit 0,1", $TID_GetTop5, $TID_GetTop5, $SID_GetTop5, $Day_ID);
		$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
		$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
		$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
		
		if ($totalRows_GetSchedule == 0){
			echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th style="font-size:16px;">'.$l_NoGames.'</th></tr></thead>';
			echo "<tbody><tr><td align='center'><div style='width:150px; float:left; text-align:center; padding-left:50px; '><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_LogoSmall']."'  vspace='6' hspace='6'  id='TeamPhoto1' border=0 alt='".$_SESSION['current_City']." ".$_SESSION['current_Team']."'></div>";
			echo "</td></tr></table>";
		} else {
		
			if ( $row_GetSchedule['VisitorTeam'] == $TID_GetTop5) {
				$NextGameTeam = $row_GetSchedule['HomeTeam'];
				$NextGameType = 1;
			}
			if ( $row_GetSchedule['HomeTeam'] == $TID_GetTop5) {
				$NextGameTeam = $row_GetSchedule['VisitorTeam'];
				$NextGameType = 0;
			}
		
			$query_GetNextGameTeam = sprintf("SELECT p.*, T.LastModifiedLines, T.City, T.Arena, T.LogoSmall FROM proteam as T, proteamstandings as p WHERE T.Number='%s' AND T.Number=p.Number AND p.Season_ID=%s", $NextGameTeam, $_SESSION['current_SeasonID']);
			$GetNextGameTeam = mysql_query($query_GetNextGameTeam, $connection) or die(mysql_error());
			$row_GetNextGameTeam = mysql_fetch_assoc($GetNextGameTeam);
			
			$query_GetHomeW = sprintf("SELECT P.*, T.LastModifiedLines FROM proteam as T, proteamstandings as P WHERE P.Number='%s' AND T.Number=P.Number AND P.Season_ID=%s", $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID']);
			$GetHomeW = mysql_query($query_GetHomeW, $connection) or die(mysql_error());
			$row_GetHomeW = mysql_fetch_assoc($GetHomeW);
			
			if ($newDate < $TodaysDate) {
				$NextDay = $row_GetLastDay['Day'] ;
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID - 1;
			} else {
				$NextDay = $row_GetLastDay['Day'] + 1;
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID;
			}
			if ($Day_ID < 0){
				echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th style="font-size:16px;">'.$l_NoGames.'</th></tr></thead>';
				echo "<tbody><tr><td align='center'><div style='width:150px; float:left; text-align:center; padding-left:50px; '><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_LogoSmall']."'  vspace='6' hspace='6'  id='TeamPhoto1' border=0 alt='".$_SESSION['current_City']." ".$_SESSION['current_Team']."'></div><div style='float:right; width:200px; text-align:center; padding-right:20px;'>";
				echo "<br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
				echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
				echo "<br /><br />".$l_LinesLastLoaded."<br /><strong>".$row_GetHomeW['LastModifiedLines']."</strong>";
				echo "</div></div>";
				echo "</td></tr></table>";
			} else {
			
				if ($Day_ID == 0) {
					echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th colspan=2 style="font-size:16px;">'.$l_Tonight.'</th></tr>';
				} else {
					echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th colspan=2 style="font-size:16px;">'.$l_NextGameIn.' '.$Day_ID.' '.$l_Days.'</th></tr>';
				}

				if ($NextGameType == 0){
					$query_GetArena = sprintf("SELECT Arena FROM proteam WHERE Number=%s", $_SESSION['current_Team_ID']);
					$GetArena = mysql_query($query_GetArena, $connection) or die(mysql_error());
					$row_GetArenam = mysql_fetch_assoc($GetArena);
					echo '<tr><th>'.$l_Visitor.'</th><th>'.$l_LiveFrom." ".$row_GetArenam['Arena'].'</th></tr></thead>';
				}
				
				
				if ($NextGameType == 1){
					$VisitWins = ($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW']) - ($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW']);
					$VisitLoss = $row_GetHomeW['L'] - $row_GetHomeW['HomeL'];
					$VisitOT= ($row_GetHomeW['OTL']+$row_GetHomeW['SOL']) - ($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL']);
					
					echo "<tbody><tr><td align='center' width='50%' style='padding:10px;'><div style='width:200px;'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_LogoSmall']."' vspace='6' hspace='6' style='float:left;'  id='TeamPhoto1' border=0 alt='".$_SESSION['current_City']." ".$_SESSION['current_Team']."'>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					echo "<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					echo "</div></div>";
					echo "</td><td align=center style='padding:10px;'><div style='width:200px;'><a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'>";
					echo "<img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$NextGameTeam."'></a>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					echo "<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW'])."-".$row_GetNextGameTeam['HomeL']."-".($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL'])."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					echo "</div></div>";
					echo "</td></tr>";
				} else {
					$VisitWins = ($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW']) - ($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW']);
					$VisitLoss = $row_GetNextGameTeam['L'] - $row_GetNextGameTeam['HomeL'];
					$VisitOT= ($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL']) - ($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL']);
					echo "<tbody><tr><td align=center style='padding:10px;'><div style='width:200px;'>";
					echo "<a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$NextGameTeam."'></a></div>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					echo "<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					echo "</td><td align='center' width='50%;' style='padding:10px;'><div style='width:200px;'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_LogoSmall']."' vspace='6' hspace='6' style='float:left;'  id='TeamPhoto1' border=0 alt='".$_SESSION['current_City']." ".$_SESSION['current_Team']."'>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					echo "<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					echo "</div></div>";			
					echo "</td></tr>";
				}
				echo '<tfoot><tr><td colspan=2 align=center><a href="game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a></td></tr></tfoot></table>';
			
				
			}
		}
	}
?> 

        <br clear="all" />
     	
        <?php if ($_SESSION['current_SeasonTypeID'] > 0 && $totalRows_GetStandings > 0){ ?>
        <div style="font-size:9px; float:right; padding-top:3px; padding-bottom:2px;">
            X = <?php echo $l_Playoff_E;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Y = <?php echo $l_Playoff_Y;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Z = <?php echo $l_Playoff_Z;?>
        </div>
        <br clear="all" />
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_DivisionLeader;?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
			<th><a title="<?php echo $l_Last10_D;?>"><?php echo $l_L10;?></a></th>
            <th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak;?></a></th>
        </tr>
        </thead>
        <tbody>
        <?php 
			do { 	
			$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
			$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
			?>
           <tr>
            <td><?php 
			if($row_GetStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z" && $row_GetStandings['PowerRanking']==1){
				echo "P -";
			}
			?><a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name'];?></a></td>
            <td align="center"><?php echo $row_GetStandings['GP'];?></td>
            <td align="center"><?php echo $TotalWins;?></td>
            <td align="center"><?php echo $row_GetStandings['L'];?></td>
            <td align="center"><?php echo $TotalOT;?></td>
            <td align="center"><?php echo $row_GetStandings['Point'];?></td>
            <td align="center"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
            <td align="center"><?php echo $row_GetStandings['Streak'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="8" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_standings.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        
        <?php } ?>
        
        <?php if($totalRows_GetTop5 > 0 ){ ?>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php $l_ScoreLeader;?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
            <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
            <th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak;?></a></th>
            <th><a title="Total Stars of game">STAR</a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetTop5['Number']; ?>"><?php echo $row_GetTop5['Name'];?></a></td>
            <td align="center"><?php echo $row_GetTop5['ProGP'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProG'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProA'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProPoint'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProPlusMinus'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProPim'];?></td>
            <td align="center"><?php echo $row_GetTop5['Streak'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProStar'];?></td>
          </tr>
          <?php } while ($row_GetTop5 = mysql_fetch_assoc($GetTop5)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_stats.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        <?php } ?>
        
        <?php if($totalRows_GetTop2 > 0 ){ ?>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_GoalieLeader;?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
            <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
            <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
            <th><a title="Total Stars of game">STAR</a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="goalie.php?player=<?php echo $row_GetTop2['Number']; ?>"><?php echo $row_GetTop2['Name'];?></a></td>
            <td align="center"><?php echo $row_GetTop2['ProGP'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProW'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProL'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProOTL'];?></td>
            <td align="center"><?php if ($row_GetTop2['ProMinPlay'] > 0){ echo number_format(($row_GetTop2['ProGA'] / minutes($row_GetTop2['ProMinPlay']))*60,2);  } else { echo "0"; } ?></td>
            <td align="center"><?php if ($row_GetTop2['ProGA'] > 0){ echo number_format(($row_GetTop2['ProSA'] - $row_GetTop2['ProGA'] ) / $row_GetTop2['ProSA'],3); } else { echo "0"; } ?></td>
            <td align="center"><?php echo $row_GetTop2['ProShutouts'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProStar'];?></td>
          </tr>
          <?php } while ($row_GetTop2 = mysql_fetch_assoc($GetTop2)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="10" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_stats.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        <?php } ?>
        
        
        <?php if($totalRows_GetPlayerWeek > 0){ ?>
        <div class="fieldsetStarleft">
        <h3><?php echo $l_StarWeek;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetPlayerWeek['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="goalie.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerWeek['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerWeek['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetPlayerWeek['stat1']."-".$row_GetPlayerWeek['stat2']."-".$row_GetPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerWeek['stat4'] > 0){ echo number_format(($row_GetPlayerWeek['stat5'] / minutes($row_GetPlayerWeek['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerWeek['stat4'] > 0){ echo number_format($row_GetPlayerWeek['stat6'] / ($row_GetPlayerWeek['stat5'] + $row_GetPlayerWeek['stat6']),3); } else { echo "0"; } ?></strong>
            <?php } else { 
			$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="player.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerWeek['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerWeek['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetPlayerWeek['stat6']." ".$l_Games;?> </strong><br>
            <?php } ?>
             </th>
        </tr>
        </table>
        </div>
        <?php } if($totalRows_GetPlayerMonth > 0){ ?>
        <div class="fieldsetStarleft" style="padding-left:5px;">
        <h3><?php echo $l_StarMonth;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetPlayerMonth['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="goalie.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerMonth['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerMonth['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetPlayerMonth['stat1']."-".$row_GetPlayerMonth['stat2']."-".$row_GetPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerMonth['stat4'] > 0){ echo number_format(($row_GetPlayerMonth['stat5'] / minutes($row_GetPlayerMonth['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerMonth['stat4'] > 0){ echo number_format($row_GetPlayerMonth['stat6'] / ($row_GetPlayerMonth['stat5'] + $row_GetPlayerMonth['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="player.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerMonth['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerMonth['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetPlayerMonth['stat6']." ".$l_Games;?> </strong><br>
             <?php } ?>
             </th>
        </tr>
        </table>
        </div>
        <?php } ?>
        
	</div>
    
    
<?php if($UserFarmleage == 'True'){

$query_limit_GetFarmTop5 = sprintf("SELECT SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, ((SUM(playerstats.FarmStar1)*3)+(SUM(playerstats.FarmStar2)*2)+(SUM(playerstats.FarmStar3)*1)) as FarmStar, SUM(playerstats.FarmPlusMinus) as FarmPlusMinus, SUM(playerstats.FarmPim) as FarmPim, playerstats.Name, SUM( playerstats.FarmPoint ) AS FarmPoint, SUM( playerstats.FarmGP ) AS FarmGP, SUM( playerstats.FarmG ) AS FarmG, SUM( playerstats.FarmA ) AS FarmA, players.Number
FROM playerstats, players
WHERE players.Team = '%s'
AND playerstats.Season_ID=%s
AND players.Name = playerstats.Name
AND FarmGP > 0
GROUP BY playerstats.Name
ORDER BY FarmPoint DESC , FarmG DESC LIMIT  0,5", $TID_GetTop5,$SID_GetTop5);
$GetFarmTop5 = mysql_query($query_limit_GetFarmTop5, $connection) or die(mysql_error());
$row_GetFarmTop5 = mysql_fetch_assoc($GetFarmTop5);
$totalRows_GetFarmTop5 = mysql_num_rows($GetFarmTop5);

$query_GetFarmTop2 = sprintf("SELECT ((SUM(goaliestats.FarmStar1)*3)+(SUM(goaliestats.FarmStar2)*2)+(SUM(goaliestats.FarmStar3)*1)) as FarmStar, goalies.Team, SUM(goaliestats.FarmGA) as FarmGA, SUM(goaliestats.FarmSA) as FarmSA, SUM(goaliestats.FarmW) as FarmW, SUM(goaliestats.FarmGP) as FarmGP, goaliestats.Name, SUM( goaliestats.FarmShutouts ) AS FarmShutouts, SUM( goaliestats.FarmOTL ) AS FarmOTL, SUM( goaliestats.FarmMinPlay ) AS FarmMinPlay, SUM( goaliestats.FarmGP ) AS FarmGP, SUM( goaliestats.FarmL ) AS FarmL, goalies.Number
FROM goaliestats, goalies
WHERE goalies.Name=goaliestats.Name 
AND goalies.Team='%s'
AND goaliestats.Season_ID = %s  
AND FarmGP > 0
GROUP BY goaliestats.Name
ORDER BY goaliestats.FarmW desc, FarmGP desc
LIMIT  0,5", $TID_GetTop5,$SID_GetTop5);
$GetFarmTop2 = mysql_query($query_GetFarmTop2, $connection) or die(mysql_error());
$row_GetFarmTop2 = mysql_fetch_assoc($GetFarmTop2);
$totalRows_GetFarmTop2 = mysql_num_rows($GetFarmTop2);

$query_GetFarmStandings = sprintf("SELECT farmteamstandings.Last10SOW, farmteamstandings.Last10SOL, farmteamstandings.Last10OTW, farmteamstandings.Last10OTL, farmteamstandings.Last10W, farmteamstandings.Last10L, farmteamstandings.Last10T, farmteamstandings.Streak, farmteamstandings.StandingPlayoffTitle, farmteam.Name, farmteam.Number, farmteam.Abbre, farmteam.City, farmteam.Division, farmteamstandings.Point,  farmteamstandings.GP, farmteamstandings.W, farmteamstandings.L, farmteamstandings.T, farmteamstandings.OTW, farmteamstandings.SOW, farmteamstandings.OTL, farmteamstandings.SOL, farmteamstandings.GA, farmteamstandings.GF FROM farmteam, farmteamstandings WHERE farmteam.Name=farmteamstandings.Name AND farmteam.Division='%s' AND farmteamstandings.Season_ID=%s ORDER BY farmteamstandings.StandingPlayoffTitle desc, farmteamstandings.Point desc, farmteamstandings.GP asc, farmteamstandings.W asc, farmteamstandings.GF desc",$DID_GetTop5,$SID_GetTop5);
$GetFarmStandings = mysql_query($query_GetFarmStandings, $connection) or die(mysql_error());
$row_GetFarmStandings = mysql_fetch_assoc($GetFarmStandings);
$totalRows_GetFarmStandings = mysql_num_rows($GetFarmStandings);

$query_GetFarmConfStandings = sprintf("SELECT farmteamstandings.StandingPlayoffTitle, farmteam.Number, farmteamstandings.StandingPlayoffTitle, farmteam.Name, farmteam.Abbre, farmteam.City, farmteam.Division, farmteamstandings.Point,  farmteamstandings.GP, farmteamstandings.W, farmteamstandings.L, farmteamstandings.T, farmteamstandings.OTW, farmteamstandings.SOW, farmteamstandings.OTL, farmteamstandings.SOL, farmteamstandings.GA, farmteamstandings.GF FROM farmteam, farmteamstandings WHERE farmteamstandings.ProTeamName=farmteam.ProTeamName AND farmteam.Conference='%s' AND farmteamstandings.Season_ID=%s ORDER BY farmteamstandings.StandingPlayoffTitle desc, farmteamstandings.DivisionLeader desc, farmteamstandings.Point desc, farmteamstandings.GP asc, farmteamstandings.W asc, farmteamstandings.GF desc",$CID_GetTop5,$SID_GetTop5);
$GetFarmConfStandings = mysql_query($query_GetFarmConfStandings, $connection) or die(mysql_error());
$row_GetFarmConfStandings = mysql_fetch_assoc($GetFarmConfStandings);

$query_GetFarmPlayerWeek = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower7Days, FarmG as stat1, FarmA as stat2,FarmPoint as stat3, FarmPim as stat4, FarmPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, farmteam as t, players as p WHERE p.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower7Days, FarmW as stat1, FarmL as stat2,FarmOTL as stat3, FarmMinPlay as stat4, FarmGA as stat5, FarmSA as stat6 FROM goaliestats as s, farmteam as t, goalies as g WHERE g.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s ORDER BY FarmStarPower7Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $TID_GetTop5, $_SESSION['current_SeasonID'], $TID_GetTop5);
$GetFarmPlayerWeek = mysql_query($query_GetFarmPlayerWeek, $connection) or die(mysql_error());
$row_GetFarmPlayerWeek = mysql_fetch_assoc($GetFarmPlayerWeek);
$totalRows_GetFarmPlayerWeek = mysql_num_rows($GetFarmPlayerWeek);

$query_GetFarmPlayerMonth = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower30Days, FarmG as stat1, FarmA as stat2,FarmPoint as stat3, FarmPim as stat4, FarmPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, farmteam as t, players as p WHERE p.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower30Days, FarmW as stat1, FarmL as stat2,FarmOTL as stat3, FarmMinPlay as stat4, FarmGA as stat5, FarmSA as stat6 FROM goaliestats as s, farmteam as t, goalies as g WHERE g.Team=s.Team AND s.Season_ID=%s AND s.Team=t.Number AND s.Team=%s ORDER BY FarmStarPower30Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $TID_GetTop5, $_SESSION['current_SeasonID'], $TID_GetTop5);
$GetFarmPlayerMonth = mysql_query($query_GetFarmPlayerMonth, $connection) or die(mysql_error());
$row_GetFarmPlayerMonth = mysql_fetch_assoc($GetFarmPlayerMonth);
$totalRows_GetFarmPlayerMonth = mysql_num_rows($GetFarmPlayerMonth);
	
?>
    <div id="tabs-2">
    <?php
echo "<h3>".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']." ".$l_overview."</h3>";


if ($_SESSION['current_SeasonTypeID'] == 0){
	$query_GetPlayOff = sprintf("SELECT s.Day, s.Round, p.PlayOffEliminated, p.GP FROM farmteamstandings as p, schedule as s WHERE p.Number=%s AND p.Season_ID=%s AND p.Season_ID=s.Season_ID AND (s.VisitorTeam=p.Number OR s.HomeTeam=p.Number) ORDER BY s.Day DESC LIMIT 0,1", $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID']);
	$GetPlayOff = mysql_query($query_GetPlayOff, $connection) or die(mysql_error());
	$row_GetPlayOff = mysql_fetch_assoc($GetPlayOff);
	$totalRows_GetPlayOff = mysql_num_rows($GetPlayOff);
	
	$tmpSeriesTitle=$l_Leads;
	if($row_GetPlayOff['PlayOffEliminated']=="True" || $row_GetPlayOff['PlayOffEliminated']=="Vrai"){$tmpSeriesTitle=$l_Over;}
	
	
	if($row_GetPlayOff['PlayOffEliminated']=="False" || $row_GetPlayOff['PlayOffEliminated']=="Faux" || $row_GetPlayOff['GP'] > 0 ){
	
	$query_GetLastDay = "select farmschedule.Day FROM farmschedule WHERE (farmschedule.Play='True' OR farmschedule.Play='Vrai') AND farmschedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY farmschedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	if ($totalRows_GetLastDay==0){
		$Day_ID = 0;
	} else {
		$Day_ID = $row_GetLastDay['Day'];
	}
	
	$query_GetW = sprintf("SELECT * FROM farmschedule WHERE Season_ID=%s AND (VisitorTeam=%s OR HomeTeam=%s) AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID'], $row_GetPlayOff['Round']);
	$GetW = mysql_query($query_GetW, $connection) or die(mysql_error());
	$row_GetW = mysql_fetch_assoc($GetW);
	$totalRows_GetW = mysql_num_rows($GetW);
	
	if($totalRows_GetW > 0){
	if($_SESSION['current_Team_ID'] == $row_GetW['VisitorTeam']){
		 $tmpWinnerID=$row_GetW['HomeTeam'];
	 }else{
		 $tmpWinnerID=$row_GetW['VisitorTeam'];
	 }
		
	$query_GetTeamA = sprintf("SELECT LogoSmall, Name, Number FROM farmteam WHERE Number=%s", $_SESSION['current_Team_ID']);
	$GetTeamA = mysql_query($query_GetTeamA, $connection) or die(mysql_error());
	$row_GetTeamA = mysql_fetch_assoc($GetTeamA);
	$totalRows_GetTeamA = mysql_num_rows($GetTeamA);
	
	
	$query_GetTeamB = sprintf("SELECT LogoSmall, Name, Number FROM farmteam WHERE Number=%s", $tmpWinnerID);
	$GetTeamB = mysql_query($query_GetTeamB, $connection) or die(mysql_error());
	$row_GetTeamB = mysql_fetch_assoc($GetTeamB);
	$totalRows_GetTeamB = mysql_num_rows($GetTeamB);
	
	$tmpTS1=0;
	$tmpTS2=0;
	$k = 0;
	$CurrentRound = 0;
	do{
		if($k==0){
			 $lastHome=$row_GetW['HomeTeam']; 
			 $lastVisitor=$row_GetW['VisitorTeam'];
		}
		$k=$k+1;
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==1){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==1){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==2){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==2){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==3){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==3){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==4){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==4){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==5){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==5){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==6){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==6){$tmpTS2 = $tmpTS2 + 1;}	
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==7){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==7){$tmpTS2 = $tmpTS2 + 1;}
					
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && ($row_GetW['Play']=="True" OR $row_GetW['Play']=="Vrai")){$lastWin = "Visitor";}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && ($row_GetW['Play']=="True" OR $row_GetW['Play']=="Vrai")){$lastWin = "Home"; }
		
	} while ($row_GetW = mysql_fetch_assoc($GetW)); 
	}
	
	if($CurrentRound != $_SESSION['current_Team_ID']){
		$CurrentRound = $_SESSION['current_Team_ID'];
			echo "<h2 align=center>";
			if($row_GetPlayOff['Round'] == 1){ 
				echo $l_Playoff_R1; 
			} else if($row_GetPlayOff['Round'] == 2){ 
				echo $l_Playoff_R2; 
			} else if($row_GetPlayOff['Round'] == 3){ 
				echo $l_Playoff_R3; 
			} else if($row_GetPlayOff['Round'] == 4){ 
				echo $l_Playoff_R4; 
			} 
			echo "</h2><br clear='all' />";
			echo '<table cellspacing="0" border="0" width="100%"><tr>';
			if($lastWin == "Visitor" && $lastVisitor==$row_GetTeamA['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['Name']."'></a></div></td>";

			} else if($lastWin == "Visitor" && $lastVisitor==$row_GetTeamB['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['Name']."'></a></div></td>";
			} else if($lastWin == "Home" && $lastVisitor==$row_GetTeamB['Number']){
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['Name']."'></a></div></td>";
				
			} else if($lastWin == "Home" && $lastVisitor==$row_GetTeamA['Number']){
				echo $lastVisitor." ".$row_GetW['HomeTeam'];
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['Name']."'></a></div></td>";
			} else if ($tmpTS2 == $tmpTS1) {
				$tmpSeriesTitle=" tied ";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamB['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$row_GetTeamB['Name']."'></a></div></td>";
				echo "<td style='vertical-align:middle;' width='10%'><h1>".$tmpTS2." - ".$tmpTS1."<h3></td>";
				echo "<td style='vertical-align:middle;' width='40%'><div align=center><a href='farm_roster.php?team=".$row_GetTeamA['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' vspace='6' hspace='6' id='TeamPhoto1' border=0 alt='".$row_GetTeamA['Name']."'></a></div></td>";
			}
			echo '</tr></table>';
			
			$query_GetSchedule = sprintf("SELECT S_ID, Day, VisitorTeam, HomeTeam FROM farmschedule WHERE (VisitorTeam='%s' OR HomeTeam='%s') AND Season_ID=%s AND Day >= %s AND (Play='False' OR Play='Faux') GROUP BY Day asc Limit 0,1", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID'], $Day_ID);
			$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
			$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
			$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
			
			if ($newDate < $TodaysDate) {
				$Day_ID = $row_GetSchedule['Day'] - ($Day_ID + 1);
			} else {
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID;
			}
			echo '<h3 align=center>';
			if ($Day_ID == 0) {
				echo $l_Tonight;
				echo '&nbsp;&nbsp;&#8212;&nbsp;&nbsp;<a href="farm_game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a>';
			} else if ($Day_ID < 0){
				echo $l_NoGames;
			} else {
				echo $l_NextGameIn.' '.$Day_ID.' '.$l_Days;
				echo '&nbsp;&nbsp;&#8212;&nbsp;&nbsp;<a href="farm_game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a>';
			}
			echo '</h3>';
			
		echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
		echo '<thead>';
		echo '<tr><th>'.$l_Game.'</th><th>'.$l_Home.'</th><th>S</th><th>'.$l_Visitor.'</th><th>S</th></tr></thead><tbody>';
	}

	$tmpGameCount = 0;
	if($totalRows_GetW > 0){
	mysql_data_seek($GetW,0);
	while ($row_GetW = mysql_fetch_assoc($GetW)){
		$tmpGameCount = $tmpGameCount + 1;
		$query_GetHT = sprintf("SELECT Name FROM farmteam WHERE Number=%s", $row_GetW['HomeTeam']);
		$GetHT = mysql_query($query_GetHT, $connection) or die(mysql_error());
		$row_GetHT = mysql_fetch_assoc($GetHT);
		$HomeTeam=$row_GetHT['Name'];
		
		$query_GetVT = sprintf("SELECT Name FROM farmteam WHERE Number=%s", $row_GetW['VisitorTeam']);
		$GetVT = mysql_query($query_GetVT, $connection) or die(mysql_error());
		$row_GetVT = mysql_fetch_assoc($GetVT);
		$VisitorTeam=$row_GetVT['Name'];

		$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetW['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $_SESSION['current_SeasonID']);
		$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
		$row_GetLink = mysql_fetch_assoc($GetLink);
		$GameLink = $row_GetLink['Link'];
		if($tmpSeriesTitle!=" over "){
			echo "<tr><td align=center width=75>";
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "<a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."'>Game ".$tmpGameCount."</a>";
			} else {
				echo "Game ".$tmpGameCount;	
			}
			echo "</td><td>".$HomeTeam."</td><td align=center width=20>".$row_GetW['HomeScore']."</td><td>".$VisitorTeam."</td><td align=center width=20>".$row_GetW['VisitorScore']."</td></tr>";
		} else {
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "<tr><td align=center width=75><a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."'>Game ".$tmpGameCount."</a></td><td>".$HomeTeam."</td><td align=center width=20>".$row_GetW['HomeScore']."</td><td>".$VisitorTeam."</td><td align=center width=20>".$row_GetW['VisitorScore']."</td></tr>";				
			}
		}
	} 
	}
	echo '</tbody></table>';

	} else {
		echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
		echo '<thead><tr><th>'.$l_eliminated.'</th></tr></thead>';
		echo "<tbody><tr><td align='center'><div align=center><img src='".$_SESSION['DomainName']."/image/logos/huge/".$_SESSION['current_Farm_LogoLarge']."'  vspace='6' hspace='6' id='TeamPhoto2' border=0 alt='".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']."'></div></td></tr></tbody></table>";
	}
	
} else {
	
	$query_GetLastDay = "select farmschedule.Day FROM farmschedule WHERE (farmschedule.Play='True' OR farmschedule.Play='Vrai') AND farmschedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY farmschedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	if ($totalRows_GetLastDay==0){
		$Day_ID = 0;
	} else {
		$Day_ID = $row_GetLastDay['Day'];
	}
		
		$query_GetSchedule = sprintf("SELECT farmschedule.S_ID, farmschedule.Day, farmschedule.VisitorTeam, farmschedule.HomeTeam FROM farmschedule WHERE (farmschedule.VisitorTeam='%s' OR farmschedule.HomeTeam='%s') AND farmschedule.Season_ID=%s AND farmschedule.Day >= %s AND (farmschedule.Play='FALSE' OR farmschedule.Play='Faux') GROUP BY  farmschedule.Day asc Limit 0,1", $TID_GetTop5, $TID_GetTop5, $SID_GetTop5, $Day_ID);
		$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
		$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
		$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
		
		if ($totalRows_GetSchedule == 0){
			echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th style="font-size:16px;">'.$l_NoGames.'</th></tr></thead>';
			echo "<tbody><tr><td align='center'><div style='width:150px; float:left; text-align:center; padding-left:50px; '><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_Farm_LogoSmall']."' id='TeamPhoto3'  vspace='6' hspace='6'  id='TeamPhoto1' border=0 alt='".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']."'></div><div style='float:right; width:200px; text-align:center; padding-right:20px;'>";
			//echo "<br />".$l_LinesLastLoaded."<br /><strong>".$row_GetHomeW['LastModifiedLines']."</strong>";
			echo "</div></div>";
			echo "</td></tr></table>";
		} else {
		
			if ( $row_GetSchedule['VisitorTeam'] == $TID_GetTop5) {
				$NextGameTeam = $row_GetSchedule['HomeTeam'];
				$NextGameType = 1;
			}
			if ( $row_GetSchedule['HomeTeam'] == $TID_GetTop5) {
				$NextGameTeam = $row_GetSchedule['VisitorTeam'];
				$NextGameType = 0;
			}
		
			$query_GetNextGameTeam = sprintf("SELECT P.*, T.Name, T.LogoSmall FROM farmteam as T, farmteamstandings as P WHERE T.Number='%s' AND T.Number=P.Number AND P.Season_ID=%s", $NextGameTeam, $_SESSION['current_SeasonID']);
			$GetNextGameTeam = mysql_query($query_GetNextGameTeam, $connection) or die(mysql_error());
			$row_GetNextGameTeam = mysql_fetch_assoc($GetNextGameTeam);
			
			$query_GetHomeW = sprintf("SELECT P.*, T.Name, T.LogoSmall FROM farmteam as T, farmteamstandings as P WHERE T.Number='%s' AND T.Number=P.Number AND P.Season_ID=%s", $_SESSION['current_Team_ID'], $_SESSION['current_SeasonID']);
			$GetHomeW = mysql_query($query_GetHomeW, $connection) or die(mysql_error());
			$row_GetHomeW = mysql_fetch_assoc($GetHomeW);
			
			if ($newDate < $TodaysDate) {
				$NextDay = $row_GetLastDay['Day'] ;
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID - 1;
			} else {
				$NextDay = $row_GetLastDay['Day'] + 1;
				$Day_ID = $row_GetSchedule['Day'] - $Day_ID;
			}
			if ($Day_ID < 0){
				echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th style="font-size:16px;">'.$l_NoGames.'</th></tr></thead>';
				echo "<tbody><tr><td align='center'><div style='width:150px; float:left; text-align:center; padding-left:50px; '><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_Farm_LogoSmall']."'  vspace='6' hspace='6'  id='TeamPhoto3' border=0 alt='".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']."'></div><div style='float:right; width:200px; text-align:center; padding-right:20px;'>";
				echo "<br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
				echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
				echo "<br /><br />".$l_LinesLastLoaded."<br /><strong>".$row_GetHomeW['LastModifiedLines']."</strong>";
				echo "</div></div>";
				echo "</td></tr></table>";
			} else {
			
				if ($Day_ID == 0) {
					echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th colspan=2 style="font-size:16px;">'.$l_Tonight.'</th></tr>';
				} else {
					echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates" ><thead><tr><th colspan=2 style="font-size:16px;">'.$l_NextGameIn.' '.$Day_ID.' '.$l_Days.'</th></tr>';
				}			
				echo '<tr><th>'.$l_Visitor.'</th><th>'.$l_Home.'</th></tr></thead>';
			
				if ($NextGameType == 1){
					$VisitWins = ($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW']) - ($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW']);
					$VisitLoss = $row_GetHomeW['L'] - $row_GetHomeW['HomeL'];
					$VisitOT= ($row_GetHomeW['OTL']+$row_GetHomeW['SOL']) - ($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL']);
					echo "<tbody><tr><td align='center' width='50%' style='padding:10px;'><div style='width:200px;'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_Farm_LogoSmall']."' vspace='6' hspace='6' style='float:left;'  id='TeamPhoto3' border=0 alt='".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']."'>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					echo "<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					echo "</div></div>";
					echo "</td><td align=center style='padding:10px;'><div style='width:200px;'><a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'>";
					echo "<img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='float:left;' id='TeamPhoto4' border=0 alt='".$row_GetNextGameTeam['Name']."'></a>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					echo "<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW'])."-".$row_GetNextGameTeam['HomeL']."-".($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL'])."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					echo "</div></div>";
					echo "</td></tr>";
				} else {
					$VisitWins = ($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW']) - ($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW']);
					$VisitLoss = $row_GetNextGameTeam['L'] - $row_GetNextGameTeam['HomeL'];
					$VisitOT= ($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL']) - ($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL']);
					echo "<tbody><tr><td align=center style='padding:10px;'><div style='width:200px;'>";
					echo "<a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='float:left;' id='TeamPhoto4' border=0 alt='".$row_GetNextGameTeam['Name']."'></a></div>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					echo "<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					echo "</td><td align='center' width='50%;' style='padding:10px;'><div style='width:200px;'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_Farm_LogoSmall']."' vspace='6' hspace='6' style='float:left;'  id='TeamPhoto3' border=0 alt='".$_SESSION['current_Farm_City']." ".$_SESSION['current_Farm_Team']."'>";
					echo "<div style='float:right;'>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					echo "<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
					echo "<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					echo "</div></div>";			
					echo "</td></tr>";
				}
				echo '<tfoot><tr><td colspan=2 align=center><a href="farm_game_preview.php?id='.$row_GetSchedule['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a></td></tr></tfoot></table>';
			
			}
		}
	}
?> 

        <br clear="all" />
     	
        <?php if ($_SESSION['current_SeasonTypeID'] > 0 && $totalRows_GetFarmStandings > 0){ ?>
        <div style="font-size:9px; float:right; padding-top:3px; padding-bottom:2px;">
            X = <?php echo $l_Playoff_E;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Y = <?php echo $l_Playoff_Y;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Z = <?php echo $l_Playoff_Z;?>
        </div>
        <br clear="all" />
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th>Division Standings</th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
			<th><a title="<?php echo $l_Last10_D;?>"><?php echo $l_L10;?></a></th>
            <th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak;?></a></th>
        </tr>
        </thead>
        <tbody>
        <?php 
			do { 	
			$TotalWins = $row_GetFarmStandings['W'] + $row_GetFarmStandings['OTW'] + $row_GetFarmStandings['SOW'];
			$TotalOT = $row_GetFarmStandings['OTL'] + $row_GetFarmStandings['SOL'];
			?>
           <tr>
            <td><?php 
			if($row_GetFarmStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetFarmStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetFarmStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetFarmStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetFarmStandings['StandingPlayoffTitle']=="Z" && $row_GetFarmStandings['PowerRanking']==1){
				echo "P -";
			}
			?><a href="farm_roster.php?team=<?php echo $row_GetFarmStandings['Number']; ?>"><?php echo $row_GetFarmStandings['City']." ".$row_GetFarmStandings['Name'];?></a></td>
            <td align="center"><?php echo $row_GetFarmStandings['GP'];?></td>
            <td align="center"><?php echo $TotalWins;?></td>
            <td align="center"><?php echo $row_GetFarmStandings['L'];?></td>
            <td align="center"><?php echo $TotalOT;?></td>
            <td align="center"><?php echo $row_GetFarmStandings['Point'];?></td>
            <td align="center"><?php echo ($row_GetFarmStandings['Last10W'] + $row_GetFarmStandings['Last10OTW'] + $row_GetFarmStandings['Last10SOW'])."-".$row_GetFarmStandings['Last10L']."-".($row_GetFarmStandings['Last10OTL']+$row_GetFarmStandings['Last10SOL']); ?></td>
            <td align="center"><?php echo $row_GetFarmStandings['Streak'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetFarmStandings = mysql_fetch_assoc($GetFarmStandings)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="8" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_standings.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        
        <?php } ?>
        
        <?php if($totalRows_GetFarmTop5 > 0 ){ ?>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th>Scoring Leaders</th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
            <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
            <th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak;?></a></th>
            <th><a title="Total Stars of game">STAR</a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetFarmTop5['Number']; ?>"><?php echo $row_GetFarmTop5['Name'];?></a></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmGP'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmG'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmA'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmPoint'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmPlusMinus'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmPim'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['Streak'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmStar'];?></td>
          </tr>
          <?php } while ($row_GetFarmTop5 = mysql_fetch_assoc($GetFarmTop5)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="10" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_stats.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        <?php } ?>
        
        
        <?php if($totalRows_GetFarmTop2 > 0 ){ ?>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th>Goalie Leaders</th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
            <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
            <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
            <th><a title="Total Stars of game">STAR</a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="goalie.php?player=<?php echo $row_GetFarmTop2['Number']; ?>"><?php echo $row_GetFarmTop2['Name'];?></a></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmGP'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmW'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmL'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmOTL'];?></td>
            <td align="center"><?php if ($row_GetFarmTop2['FarmMinPlay'] > 0){ echo number_format(($row_GetFarmTop2['FarmGA'] / minutes($row_GetFarmTop2['FarmMinPlay']))*60,2);  } else { echo "0"; } ?></td>
            <td align="center"><?php if ($row_GetFarmTop2['FarmMinPlay'] > 0){ echo number_format(($row_GetFarmTop2['FarmSA'] - $row_GetFarmTop2['FarmGA']) /$row_GetFarmTop2['FarmSA'],3); } else { echo "0"; } ?></td>
			<td align="center"><?php echo $row_GetFarmTop2['FarmShutouts'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmStar'];?></td>
          </tr>
          <?php } while ($row_GetFarmTop2 = mysql_fetch_assoc($GetFarmTop2)); ?>
        </tbody> 
            <tfoot>
                <tr>
                    <td colspan="10" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_stats.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
        </table>
        <?php } ?>
        
        <?php if($totalRows_GetFarmPlayerWeek > 0){ ?>
        <div class="fieldsetStarleft">
        <h3><?php echo $l_StarWeek;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetFarmPlayerWeek['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetFarmPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="goalie.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerWeek['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerWeek['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerWeek['stat1']."-".$row_GetFarmPlayerWeek['stat2']."-".$row_GetFarmPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerWeek['stat4'] > 0){ echo number_format(($row_GetFarmPlayerWeek['stat5'] / minutes($row_GetFarmPlayerWeek['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerWeek['stat4'] > 0){ echo number_format($row_GetFarmPlayerWeek['stat6'] / ($row_GetFarmPlayerWeek['stat5'] + $row_GetFarmPlayerWeek['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			 $query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetFarmPlayerWeek['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="player.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerWeek['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerWeek['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat4'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat5'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerWeek['stat6']." ".$l_Games;?> </strong><br>
            <?php } ?>
             </th>
        </tr>
        </table>
        </div>
        <?php } if($totalRows_GetFarmPlayerMonth > 0){ ?>
        <div class="fieldsetStarleft" style="padding-left:5px;">
        <h3><?php echo $l_StarMonth;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetFarmPlayerMonth['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetFarmPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <th height="98"><a href="goalie.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerMonth['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerMonth['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerMonth['stat1']."-".$row_GetFarmPlayerMonth['stat2']."-".$row_GetFarmPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerMonth['stat4'] > 0){ echo number_format(($row_GetFarmPlayerMonth['stat5'] / minutes($row_GetFarmPlayerMonth['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerMonth['stat4'] > 0){ echo number_format($row_GetFarmPlayerMonth['stat6'] / ($row_GetFarmPlayerMonth['stat5'] + $row_GetFarmPlayerMonth['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			 $query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetFarmPlayerMonth['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			 ?>
             <th height="98"><a href="player.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerMonth['Name']; ?>"/></a></th>
             <th bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerMonth['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat4'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat5'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerMonth['stat6']." ".$l_Games;?> </strong><br>
              <?php } ?>
             </th>
        </tr>
        </table>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

    
    <div id="tabs2" class="fieldsetright">
    
        <div id="tabs2-1"><h3><?php echo $l_GeneralManagerDetails;?></h3>
<?php 
$query_GetParticipationUpload = sprintf("SELECT COUNT(T_ID) as TotalUpload FROM participation WHERE Type='Upload' AND Season_ID=%s AND Team='%s'", $_SESSION['current_SeasonID'], $_SESSION['current_Team']);
$GetParticipationUpload = mysql_query($query_GetParticipationUpload, $connection) or die(mysql_error());
$row_GetParticipationUpload = mysql_fetch_assoc($GetParticipationUpload);

$query_GetParticipationTransactions = sprintf("SELECT COUNT(T_ID) as TotalTransactions FROM participation WHERE Type='Transactions' AND Season_ID=%s AND Team='%s'", $_SESSION['current_SeasonID'], $_SESSION['current_Team']);
$GetParticipationTransactions = mysql_query($query_GetParticipationTransactions, $connection) or die(mysql_error());
$row_GetParticipationTransactions = mysql_fetch_assoc($GetParticipationTransactions);

$query_GetParticipationEmail = sprintf("SELECT COUNT(T_ID) as TotalEmail FROM participation WHERE Type='Email' AND Season_ID=%s AND Team='%s'", $_SESSION['current_SeasonID'], $_SESSION['current_Team']);
$GetParticipationEmail = mysql_query($query_GetParticipationEmail, $connection) or die(mysql_error());
$row_GetParticipationEmail = mysql_fetch_assoc($GetParticipationEmail);

$query_GetParticipationArticle = sprintf("SELECT COUNT(T_ID) as TotalArticle FROM participation WHERE Type='Article' AND Season_ID=%s AND Team='%s'", $_SESSION['current_SeasonID'], $_SESSION['current_Team']);
$GetParticipationArticle = mysql_query($query_GetParticipationArticle, $connection) or die(mysql_error());
$row_GetParticipationArticle = mysql_fetch_assoc($GetParticipationArticle);

$query_GetParticipationBonus = sprintf("SELECT COUNT(T_ID) as TotalBonus FROM participation WHERE Type='Bonus' AND Season_ID=%s AND Team='%s'", $_SESSION['current_SeasonID'], $_SESSION['current_Team']);
$GetParticipationBonus = mysql_query($query_GetParticipationBonus, $connection) or die(mysql_error());
$row_GetParticipationBonus = mysql_fetch_assoc($GetParticipationBonus);

$query_GetStandings = sprintf("SELECT TotalAttendance, TotalIncome, TotalPlayersSalaries, Finance, Morale, Point FROM proteamstandings WHERE Season_ID=%s AND Number=%s", $_SESSION['current_SeasonID'], $_SESSION['current_Team_ID']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

$TeamMorale =  $row_GetStandings['Morale'];     
$TotalPoints =  $row_GetParticipationUpload['TotalUpload'] + $row_GetParticipationTransactions['TotalTransactions'] + $row_GetParticipationArticle['TotalArticle'] + $row_GetParticipationEmail['TotalEmail'] + $row_GetParticipationBonus['TotalBonus'] + ($row_GetStandings['Point']/2);
$TotalPlayersSalaries = $row_GetStandings['TotalPlayersSalaries'];  
$Finance = $row_GetStandings['Finance']; 
$TotalAttendance = $row_GetStandings['TotalAttendance']; 
$TotalIncome = $row_GetStandings['TotalIncome']; 

mysql_free_result($GetParticipationUpload);
mysql_free_result($GetParticipationTransactions);
mysql_free_result($GetParticipationArticle);
mysql_free_result($GetParticipationEmail);
mysql_free_result($GetParticipationBonus);
mysql_free_result($GetStandings)
			?>
        
        <table border="0" cellpadding="0" cellspacing="0" class="tablesorterRates" style="width:420px;border-width:0px;">
        <tr>
            <td width="100" valign="top" style="vertical-align:middle; text-align:center; border-width:0px;"><img src="<?php echo getAvatar($row_GetTeamGM['oauth_uid'], $row_GetTeamGM['oauth_provider'], $_SESSION['current_Team_ID'], $connection); ?>" width="100" border="0" alt="<?php echo $row_GetTeamGM['GM'];?>" /></td>
            <td align="left" valign="top" style="vertical-align:top; border-width:0px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablesorterRates">
                <tr>
                    <td height="20" colspan="2"><?php echo $l_GeneralManager;?>:&nbsp;<strong><a href="bio.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $row_GetTeamGM['GM'];?></a></strong></td>
                </tr>
                <tr>
                    <td height="20" colspan="2"><?php echo $l_Participation. " ".$l_score;?>:&nbsp;<strong><?php echo $TotalPoints;?></strong></td>
                </tr>
                <tr>
                    <td width="65%"><?php echo $l_LastLoginDate;?>: <strong><?php if($row_GetTeamGM['LastVisit'] < strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))) { echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetTeamGM['LastVisit']);} else { echo 0;}?></strong></td>
                    <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                    <td><?php echo $l_LastUploadDate;?>:&nbsp;<strong><?php echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetTeamGM['LastModifiedLines']);?></strong></td>
                    <td>Team Morale:<strong>&nbsp;<?php echo $TeamMorale;?></strong></td>
                </tr>
                </table>
                </td>
        </tr>
        </table>
        		
        <h3>Finances</h3> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablesorterRates" style="width:420px;">
        <tr>
            <td height="20">Pro Payroll:&nbsp;</td><td><strong>$<?php echo number_format($TotalPlayersSalaries,0) ;?></strong></td>
            <td>Attendance:&nbsp;</td><td><strong><?php echo number_format($TotalAttendance,0) ;?></strong></td>
        </tr>
        <tr>
            <td height="20">Current Funds:&nbsp;</td><td><strong>$<?php echo number_format($Finance,0) ;?></strong></td>
            <td>Total New Income:&nbsp;</td><td><strong>$<?php echo number_format($TotalIncome,0) ;?></strong></td>
        </tr>
        </table>
        <?php
		$query_GetFactsRoster = sprintf("SELECT COUNT(*) as TotalResult FROM ( SELECT p.ID FROM `players` as p WHERE p.Team=%s AND p.Retired=0 AND p.Contract > 0 UNION ALL SELECT g.ID FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0 AND g.Contract > 0) as TotalResul", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsRoster = mysql_query($query_GetFactsRoster, $connection) or die(mysql_error());
		$row_GetFactsRoster = mysql_fetch_assoc($GetFactsRoster);
		$totalRows_GetFactsRoster = mysql_num_rows($GetFactsRoster);

		$query_GetFactsProspect = sprintf("SELECT COUNT(*) as TotalResult FROM `prospects` WHERE TeamNumber=%s", $_SESSION['current_Team_ID']);
		$GetFactsProspect = mysql_query($query_GetFactsProspect, $connection) or die(mysql_error());
		$row_GetFactsProspect = mysql_fetch_assoc($GetFactsProspect);
		$totalRows_GetFactsProspect = mysql_num_rows($GetFactsProspect);
		
		$query_GetFactsOverager = sprintf("SELECT COUNT(*) as TotalResult FROM ( SELECT p.ID FROM `players` as p WHERE p.Team=%s AND p.Retired=0 AND p.Age=20 AND p.Status0=3 UNION ALL SELECT g.ID FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0 AND g.Age=20 AND g.Status1=3) as TotalResult", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsOverager = mysql_query($query_GetFactsOverager, $connection) or die(mysql_error());
		$row_GetFactsOverager = mysql_fetch_assoc($GetFactsOverager);
		$totalRows_GetFactsOverager = mysql_num_rows($GetFactsOverager);
		
		$query_GetFactsOveragerTot = sprintf("SELECT COUNT(*) as TotalResult FROM ( SELECT p.ID FROM `players` as p WHERE p.Team=%s AND p.Retired=0 AND p.Age=20 UNION ALL SELECT g.ID FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0 AND g.Age=20) as TotalResult", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsOveragerTot = mysql_query($query_GetFactsOveragerTot, $connection) or die(mysql_error());
		$row_GetFactsOveragerTot = mysql_fetch_assoc($GetFactsOveragerTot);
		$totalRows_GetFactsOveragerTot = mysql_num_rows($GetFactsOveragerTot);
		
		$query_GetFactsAvgAge = sprintf("SELECT AVG(p.Age) as pAge FROM `players` as p WHERE p.Team=%s AND p.Retired=0 UNION ALL SELECT AVG(g.Age) as pAge FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsAvgAge = mysql_query($query_GetFactsAvgAge, $connection) or die(mysql_error());
		$row_GetFactsAvgAge = mysql_fetch_assoc($GetFactsAvgAge);
		$totalRows_GetFactsAvgAge = mysql_num_rows($GetFactsAvgAge);
		
		$query_GetFactsAvgHT = sprintf("SELECT AVG(p.Height) as pHeight FROM `players` as p WHERE p.Team=%s AND p.Retired=0 UNION ALL SELECT AVG(g.Height) as pHeight FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsAvgHT = mysql_query($query_GetFactsAvgHT, $connection) or die(mysql_error());
		$row_GetFactsAvgHT = mysql_fetch_assoc($GetFactsAvgHT);
		$totalRows_GetFactsAvgHT = mysql_num_rows($GetFactsAvgHT);
		
		$query_GetFactsAvgWT = sprintf("SELECT AVG(p.Weight) as pWeight FROM `players` as p WHERE p.Team=%s AND p.Retired=0 UNION ALL SELECT AVG(g.Weight) as pWeight FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsAvgWT = mysql_query($query_GetFactsAvgWT, $connection) or die(mysql_error());
		$row_GetFactsAvgWT = mysql_fetch_assoc($GetFactsAvgWT);
		$totalRows_GetFactsAvgWT = mysql_num_rows($GetFactsAvgWT);
		
		$query_GetFactsAvgPro = sprintf("SELECT SUM(ps.ProGP) as TotalResult FROM `players` as p, `playerstats` as ps, `seasons` as s WHERE s.SeasonType<2 AND p.Number=ps.Number AND ps.Season_ID=s.S_ID AND p.Team=%s AND p.Retired=0 UNION ALL SELECT SUM(gs.ProGP) as TotalResult FROM `goalies` as g, `goaliestats` as gs, `seasons` as ss WHERE ss.SeasonType<2 AND g.Number=gs.Number AND gs.Season_ID=ss.S_ID AND g.Team=%s AND g.Retired=0", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsAvgPro = mysql_query($query_GetFactsAvgPro, $connection) or die(mysql_error());
		$row_GetFactsAvgPro = mysql_fetch_assoc($GetFactsAvgPro);
		$totalRows_GetFactsAvgPro = mysql_num_rows($GetFactsAvgPro);
		
		$query_GetFactsAvgFarm = sprintf("SELECT SUM(ps.FarmGP) as TotalResult FROM `players` as p, `playerstats` as ps, `seasons` as s WHERE s.SeasonType<2 AND p.Number=ps.Number AND ps.Season_ID=s.S_ID AND p.Team=%s AND p.Retired=0 UNION ALL SELECT SUM(gs.FarmGP) as TotalResult FROM `goalies` as g, `goaliestats` as gs, `seasons` as ss WHERE ss.SeasonType<2 AND g.Number=gs.Number AND gs.Season_ID=ss.S_ID AND g.Team=%s AND g.Retired=0", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsAvgFarm = mysql_query($query_GetFactsAvgFarm, $connection) or die(mysql_error());
		$row_GetFactsAvgFarm = mysql_fetch_assoc($GetFactsAvgFarm);
		$totalRows_GetFactsAvgFarm = mysql_num_rows($GetFactsAvgFarm);
		
		$query_GetFactsCountry = sprintf("SELECT COUNT(Country) as CountryTot, Country FROM (SELECT p.Country as Country FROM `players` as p WHERE p.Team=%s AND p.Retired=0 UNION ALL SELECT g.Country as Country FROM `goalies` as g WHERE g.Team=%s AND g.Retired=0) as TotalResult GROUP BY Country ASC", $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID'], $_SESSION['current_Team_ID']);
		$GetFactsCountry = mysql_query($query_GetFactsCountry, $connection) or die(mysql_error());
		$row_GetFactsCountry = mysql_fetch_assoc($GetFactsCountry);
		$totalRows_GetFactsCountry = mysql_num_rows($GetFactsCountry);
		?>		
        <h3>Franchise Facts</h3> 
		<table cellspacing="0" border="0" width="100%" class="tablesorterRates" style="width:420px;">
       	<tbody>
        <tr>
        	<td valign="top" style="border-width:0px;">
           		<table cellspacing="0" cellpadding="2" border="0" width="100%">
                <tr>
                    <td><strong><?php echo $l_TotRoster;?>:</strong></td>
                    <td><?php echo $row_GetFactsRoster['TotalResult'];?></td>
                </tr>
				<?php if ($_SESSION['JuniorLeague'] == 'True'){ ?>
                <tr>
                    <td><strong><?php echo $l_Overagers;?>:</strong></td>
                    <td><?php echo $row_GetFactsOverager['TotalResult']." ".$l_ActiveOf." ".$row_GetFactsOveragerTot['TotalResult'];?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><strong><?php echo $l_TotProspect;?>:</strong></td>
                    <td><?php echo $row_GetFactsProspect['TotalResult'];?></td>
                </tr>
            	<tr>
                    <td><strong><?php echo $l_AveAge;?>:</strong></td>
                    <td><?php echo number_format($row_GetFactsAvgAge['pAge'],2)." ".$l_Years;?></td>
                </tr>
                <tr>
                    <td><strong><?php echo $l_AveHT;?>:</strong></td>
                    <td><?php 
						$division=$row_GetFactsAvgHT['pHeight']/12;   
						$feet=intval(abs($division)); 
						$decimal=abs($division)-intval(abs($division));
						$inches=$decimal*12;
						echo $feet."' ".number_format($inches,0);
						?>"</td>
                </tr>
                <tr>
                    <td><strong><?php echo $l_AveWT;?>:</strong></td>
                    <td><?php echo number_format($row_GetFactsAvgWT['pWeight'],0);?> lbs</td>
                </tr>
                <tr>
                    <td><strong><?php echo $l_EX_P;?>:</strong></td>
                    <td><?php echo $row_GetFactsAvgPro['TotalResult']." ".$l_GP;?></td>
                </tr>
                <?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
                <tr>
                    <td><strong><?php echo $l_EX_F;?>:</strong></td>
                    <td><?php echo $row_GetFactsAvgFarm['TotalResult']." ".$l_GP;?></td>
                </tr>
                <?php } ?>
            	</table>
            </td>
            
            <td valign="top" style="border-width:0px;">
            	<table cellspacing="0" cellpadding="2" border="0" width="100%">
                <?php do { ?>
                <tr>
                    <td width="20" align="center"><img width="16" height="16" src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetFactsCountry['Country']; ?>.png" border="0"/></td>
                    <td><?php echo $row_GetFactsCountry['CountryTot']; ?> players</td>
                </tr>
                <?php } while ($row_GetFactsCountry = mysql_fetch_assoc($GetFactsCountry));   ?>
                </table>
            </td>
            
        </tr>
        </tbody>
        </table>
        
         
    	<br clear="all" />
		    
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
