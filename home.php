<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_tonights_results = "TONIGHTS RESULTS";
	$l_Top10 = "Top 10 Power Rankings";
	$l_PointStreaks = "Point Streaks";
	$l_team = "TM";
	$l_team1 = "Team 1";
	$l_team2 = "Team 2";
	$l_team1Approve = "Approval";
	$l_team2Approve = "Approval";
	$l_CommishApprove = "Commish Approval";
	$l_eliminated = "Eliminated from the playoffs";
	$l_PlayoffSeries = "Playoff Series";
	$l_overview = "Overview";
	$l_Playoff_Z = "Clinched Conference";
	$l_Playoff_E = "Clinched Playoff spot";
	$l_Playoff_Y = "Clinched Division";
	$l_Playoff_P = "Clinched League Title";
	$l_DivisionLeader = "Division Leader";
	$l_LinesLastLoaded = "Lines Uploaded";
	$l_HomeRecord = "Home Record";
	$l_VisitorRecord = "Away Record";
	$l_L10 = "LAST 10";
	$l_Last10 = "Last 10 Games";
	$l_Record = "Overall Record";
	$l_readmore = "READ MORE";
	$l_Close="Close Me!";
	$l_details = "DETAILS";
	$l_News = "News";
	$l_Add_Article = "Add Article";
	$l_Pts_leaders  = "POINTS LEADERS";
	$l_GAA_leaders  = "GOALS AGAINST AVERAGE LEADERS";
	$l_Div_leaders  = "DIVISION STANDINGS";
	$l_Conference_Leaders = "CONFERENCE STANDINGS";
	$l_FreeAgents = "Free Agent Offers";
	$l_Years = "YEARS";
	$l_Year = "YEAR";
	$l_Leave  = "LEAVE";
	$l_days = "Day(s)";
	$l_Return  = "RETURN";
	$l_Contract = "CONTRACT";
	$l_Status = "STATUS";
	$l_Team  = "TEAM";
	$l_NextGameIn  = "NEXT GAME IN";
	$l_Tonight  = "TONIGHT";
	$l_LiveFrom = "Live from the";
	$l_LastLoginDate = "Signed In";
	$l_LastUploadDate = "Lines Uploaded";
	$l_TransactionHistory = "History";
	$l_NoGames = "No games are scheduled.";
	$l_injuried_list = "Injuried List";
	$l_streak_leaders = "Streak Leaders";
	$l_TeamAwards = "TEAM AWARDS";
	$l_GP  = "GP";
	$l_Pts  = "Pts";
	$l_GAA  = "GAA";
	$l_W  = "W";
	$l_L  = "L";
	$l_OTL  = "OTL";
	$l_PCT  = "PCT";
	$l_GO  = "G";
	$l_A  = "A";
	$l_P_M  = "+/-";
	$l_GP_Desc  = "Games Played";
	$l_Pts_Desc  = "Points";
	$l_GAA_Desc  = "GAA";
	$l_W_Desc  = "Wins";
	$l_L_Desc  = "Loss";
	$l_OTL_Desc  = "Overtime Loss";
	$l_PCT_Desc  = "Save Percentage";
	$l_GO_Desc  = "Goals";
	$l_A_Desc  = "Assist";
	$l_P_M_Desc  = "Plus Minus";
	$l_C  = "C";
	$l_LW  = "LW";
	$l_RW  = "RW";
	$l_D  = "D";
	$l_G  = "G";
	$l_Days = "DAY(S)";
	$l_GM = "G.M.";
	$l_Send = "Send E-mail";
	$l_AwayNotice = "Away Notice";
	$l_Note = "Note";
	$l_Day = "Day";
	$l_Date = "Date";
	$l_TodaysTransactions="Todays Transactions";
	$l_Waivers = "Waivers";
	$l_moredetails = "more details";
	$l_FreeAgents = "Free Agents";
	$l_Type = "Type";
	$l_TradingBlock = "Trading Block";
	$l_UFAFreeAgents = "UFA Free Agents";
	$l_RFAFreeAgents = "RFA Free Agents";
	$l_Team = "Team";
	$l_Trades = "Trades";
	$l_FutureConsiderations="Future Considerations";
	$l_TransactionsLog = "Transactions Log";
	$l_TeamHistory = "STHS League History";
	$l_RookieLeaders = "Rookie Leaders";
	$l_HotTeams = "HOT TEAMS";
	$l_HotPlayers = "HOT PLAYERS";
	$l_StarGame = "STAR OF THE GAME RATINGS";
	$l_ScoreLeader = "Scoring Leaders";
	$l_GoalieLeader = "Goalie Leaders";
	$l_Players = "Players";
	$l_1st = "1st";
	$l_2nd = "2nd";
	$l_3rd = "3rd";
	$l_Score = "Score";
	$l_StarMonth = "STAR OF THE MONTH";
	$l_StarWeek = "STAR OF THE WEEK";
	$l_StarSeason = "STAR OF THE SEASON";
	$l_ProLeagueOverview = "Pro League Overview";
	$l_FarmLeagueOverview = "Farm League Overview";
	$l_Leads="leads";
	$l_Over="over";
	$l_Tied = "tied";
	$l_Playoff_R1 = "Conference Quarter-Finals"; 
	$l_Playoff_R2 = "Conference Semi-Finals"; 
	$l_Playoff_R3 = "Conference Finals"; 
	$l_Playoff_R4 = "Finals";
	$l_Top10PowerRankings = "Top 10 Power Rankings";	
	$l_StatusUpdate = "Status Update";
	$l_Games = "games";
	$l_Last10_D = "Last 10";
	$l_Rank = "Rank";
	$l_Round = "Round";
	$l_player = "Player";
	$l_OwnBy = "Owned By";
	$l_TimeLeft = "Time Left";
	$l_Overall = "Overall";
	break; 

case 'fr': 
	$l_tonights_results = "R&eacute;SULTATS DE CE SOIR";
	$l_Top10 = "10 Meneurs au Super Classement";
	$l_PointStreaks = "S&eacute;quences de Point";
	$l_team = "EQ";
	$l_team1 = "&eacute;quipe  1";
	$l_team2 = "&eacute;quipe  2";
	$l_team1Approve = "Approbation";
	$l_team2Approve = "Approbation";
	$l_CommishApprove = "Approbation du Pr&eacute;sident";
	$l_Tonight = "Ce soir, ";
	$l_eliminated = "Equipes &eacute;limin&eacute; des series";
	$l_PlayoffSeries = "Ronde des S&eacute;ries";
	$l_overview = "Global";
	$l_Playoff_Z = "assur&eacute; du titre de conf&eacute;rence";
	$l_Playoff_E = "assur&eacute; d'une place en s&eacute;ries";
	$l_Playoff_Y = "assur&eacute; du titre de division";
	$l_Playoff_P = "assur&eacute; du titre de league";
	$l_DivisionLeader = "M&egrave;neurs de la Division";
	$l_LinesLastLoaded = "Lignes t&eacute;l&eacute;chargement";
	$l_HomeRecord = "Domicile ";
	$l_VisitorRecord = "Ext&eacute;rieur";
	$l_L10 = "10 Derniers";
	$l_Last10 = "Dernieres 10 parties";
	$l_Record = "Global";
	$l_readmore = "Lire plus";
	$l_Close="Fermer";
	$l_details = "D&eacute;tails";
	$l_News = "Nouvelles";
	$l_Add_Article = "Ajout&eacute; un article";
	$l_Pts_leaders  = "M&egrave;neurs au pointage";
	$l_GAA_leaders  = "M&egrave;neurs en moyenne de buts allou&egrave;es";
	$l_Div_leaders  = "Le classement division";
	$l_Conference_Leaders = "Le classement conf&eacute;rence";
	$l_FreeAgents = "Offres du agents libre";
	$l_Years = "Ann&eacute;es";
	$l_Year = "Saison";
	$l_Leave  = "Partie";
	$l_days = "jour(s)";
	$l_Return  = "Retour";
	$l_Contract = "Contract";
	$l_Status = "Status";
	$l_Team  = "&eacute;quipe";
	$l_NextGameIn  = "Prochain match dans";
	$l_Tonight  = "Ce soir";
	$l_LiveFrom = "En direct du";
	$l_LastLoginDate = "Dernier login";
	$l_LastUploadDate = "Trios envoy&eacute;s";
	$l_TransactionHistory = "Transactions de l'&eacute;quipe";
	$l_NoGames = "Aucun match c&eacute;dul&eacute;.";
	$l_injuried_list = "Liste des bless&eacute;s";
	$l_streak_leaders = "S&eacute;quences";
	$l_TeamAwards = "Troph&eacute;es d'equipe";
	$l_GP  = "PJ";
	$l_Pts  = "Pts";
	$l_GAA  = "MOY";
	$l_W  = "V";
	$l_L  = "D";
	$l_OTL  = "DP";
	$l_PCT  = "%EFF";
	$l_GO  = "B";
	$l_A  = "A";
	$l_P_M  = "PeM";
	$l_GP_Desc  = "Parties jou&eacute;es";
	$l_Pts_Desc  = "Points";
	$l_GAA_Desc  = "Moyenne";
	$l_W_Desc  = "Victoires";
	$l_L_Desc  = "D&eacute;faites";
	$l_OTL_Desc  = "D&eacute;faites en prolongation";
	$l_PCT_Desc  = "pourcentage d'efficacit&eacute;";
	$l_GO_Desc  = "But";
	$l_A_Desc  = "Assistance";
	$l_P_M_Desc  = "Plus et moins";
	$l_C  = "C";
	$l_LW  = "AG";
	$l_RW  = "AD";
	$l_D  = "D";
	$l_Days = "JOUR(S)";
	$l_GM = "D.G.";
	$l_Send = "Envoyez message";
	$l_AwayNotice = "Notification partie";
	$l_Note = "Note";
	$l_TodaysTransactions="Transactions du jour";
	$l_Day = "Jour";
	$l_Date = "Date";
	$l_Waivers = "Ballottage";
	$l_moredetails = "D&eacute;tails";
	$l_FreeAgents = "Offres aux Agents Libre";
	$l_Type = "Type";
	$l_TradingBlock = "Joueurs sur le March&eacute; des &eacute;changes";
	$l_UFAFreeAgents = "UFA";
	$l_RFAFreeAgents = "RFA";
	$l_Team = "&Eacute;quipe";
	$l_Trades = "&Eacute;changes";
	$l_FutureConsiderations="Futures consid&eacute;rations";
	$l_TransactionsLog = "Transactions";
	$l_TeamHistory = "Historique de la ligue STHS";
	$l_RookieLeaders = "M&egrave;neurs de la recrue";
	$l_HotTeams = "&eacute;quipes en bonne s&eacute;quences";
	$l_HotPlayers = "Joueur en bonne s&eacute;quences";
	$l_StarGame = "Statistiques des &eacute;toiles des parties";
	$l_ScoreLeader = "Meilleur Pointeur";
	$l_GoalieLeader = "Meilleur Gardien";
	$l_Players = "Joueurs";
	$l_1st = "1ere";
	$l_2nd = "2ieme";
	$l_3rd = "3ieme";
	$l_Score = "Score";
	$l_StarMonth = "&Eacute;toile du mois";
	$l_StarWeek = "&Eacute;toile de la semaine";
	$l_StarSeason = "&Eacute;toile de la saison";
	$l_ProLeagueOverview = "Pr&eacute;sentation de la Ligue Pro";
	$l_FarmLeagueOverview = "Pr&eacute;sentation de la ligue affili&eacute;e";
	$l_Leads="avance";
	$l_Over="au dessus";
	$l_Tied = "soir&eacute;e";
	$l_Playoff_R1 = "Division Semi-Final Conference"; 
	$l_Playoff_R2 = "S&eacute;rie Demi-finale de conf&eacute;rence"; 
	$l_Playoff_R3 = "Semi-Final Series"; 
	$l_Playoff_R4 = "Finals";
	$l_Top10PowerRankings = "10 Meneurs au Super Classement";
	$l_StatusUpdate = "Notification partie";
	$l_Games = "match";
	$l_Last10_D = "Last 10";
	$l_Rank = "Classement";
	$l_Round = "Rond";
	$l_player = "Joueur";
	$l_OwnBy = "Propri&eacute;taire";
	$l_TimeLeft = "Le temps est parti";
	$l_Overall = "Rank";
	break;
} 


$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);
$query_limit_GetTeamNews = sprintf("SELECT a.DateCreated, a.A_ID, a.Headline, a.Image, a.Summary, a.Team, a.Team as Number FROM articles as a  WHERE a.League='True' ORDER BY a.DateCreated desc, A_ID DESC LIMIT 0, 5");
$GetTeamNews = mysql_query($query_limit_GetTeamNews, $connection) or die(mysql_error());
$row_GetTeamNews = mysql_fetch_assoc($GetTeamNews);
$totalRows_GetTeamNews = mysql_num_rows($GetTeamNews);

$query_limit_GetTop5 = sprintf("SELECT players.Team, proteam.Abbre, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, SUM(playerstats.ProStar1 + playerstats.ProStar2 + playerstats.ProStar3) as ProStar, SUM(playerstats.ProPlusMinus) as ProPlusMinus, SUM(playerstats.ProPim) as ProPim, playerstats.Name, SUM( playerstats.ProPoint ) AS ProPoint, SUM( playerstats.ProGP ) AS ProGP, SUM( playerstats.ProG ) AS ProG, SUM( playerstats.ProA ) AS ProA, players.Number
FROM playerstats, players, proteam
WHERE playerstats.Season_ID=%s
AND proteam.Number=players.Team
AND players.Name = playerstats.Name
AND ProGP > 0
GROUP BY playerstats.Name
ORDER BY ProPoint DESC , ProG DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetTop5 = mysql_query($query_limit_GetTop5, $connection) or die(mysql_error());
$row_GetTop5 = mysql_fetch_assoc($GetTop5);

$query_GetTop2 = sprintf("SELECT goalies.Team, proteam.Abbre, SUM(goaliestats.ProStar1 + goaliestats.ProStar2 + goaliestats.ProStar3) as ProStar, goalies.Team, SUM(goaliestats.ProGA) as ProGA, SUM(goaliestats.ProSA) as ProSA, SUM(goaliestats.ProW) as ProW, SUM(goaliestats.ProGP) as ProGP, goaliestats.Name, SUM( goaliestats.ProShutouts ) AS ProShutouts, SUM( goaliestats.ProOTL ) AS ProOTL, SUM( goaliestats.ProMinPlay ) AS ProMinPlay, SUM( goaliestats.ProGP ) AS ProGP, SUM( goaliestats.ProL ) AS ProL, goalies.Number
FROM goaliestats, goalies, proteam
WHERE goalies.Name=goaliestats.Name
AND proteam.Number=goalies.Team 
AND goaliestats.Season_ID = %s  
AND ProGP > 0
GROUP BY goaliestats.Name
ORDER BY goaliestats.ProW desc, ProGP desc
LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetTop2 = mysql_query($query_GetTop2, $connection) or die(mysql_error());
$row_GetTop2 = mysql_fetch_assoc($GetTop2);


$query_limit_GetRookieTop5 = sprintf("SELECT players.Team, proteam.Abbre, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, SUM(playerstats.ProStar1 + playerstats.ProStar2 + playerstats.ProStar3) as ProStar, SUM(playerstats.ProPlusMinus) as ProPlusMinus, SUM(playerstats.ProPim) as ProPim, playerstats.Name, SUM( playerstats.ProPoint ) AS ProPoint, SUM( playerstats.ProGP ) AS ProGP, SUM( playerstats.ProG ) AS ProG, SUM( playerstats.ProA ) AS ProA, players.Number
FROM playerstats, players, proteam
WHERE playerstats.Season_ID=%s
AND proteam.Number=players.Team
AND players.Name = playerstats.Name
AND (players.Rookie = 'True' or players.Rookie = 'Vrai')
AND ProGP > 0
GROUP BY playerstats.Name
ORDER BY ProPoint DESC , ProG DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetRookieTop5 = mysql_query($query_limit_GetRookieTop5, $connection) or die(mysql_error());
$row_GetRookieTop5 = mysql_fetch_assoc($GetRookieTop5);

$query_limit_GetHotTop5 = sprintf("SELECT players.Name, players.MO, players.Team, proteam.Abbre, playerstats.GameInRowWithAPoint, playerstats.GameInRowWithAGoal, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, players.Number
FROM playerstats, players, proteam
WHERE playerstats.Season_ID=%s
AND proteam.Number=players.Team
AND players.Name = playerstats.Name
AND ProGP > 0
AND players.Status1>1
GROUP BY playerstats.Name
ORDER BY Streak DESC , GameInRowWithAGoal DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetHotTop5 = mysql_query($query_limit_GetHotTop5, $connection) or die(mysql_error());
$row_GetHotTop5 = mysql_fetch_assoc($GetHotTop5);


$query_GetAttendance = sprintf("SELECT s.TotalAttendance, s.TotalIncome, p.City, p.Number, p.Name FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND s.Season_ID=%s ORDER BY s.TotalAttendance DESC, TotalIncome DESC LIMIT 0,10", $_SESSION['current_SeasonID']);
$GetAttendance = mysql_query($query_GetAttendance, $connection) or die(mysql_error());
$row_GetAttendance = mysql_fetch_assoc($GetAttendance);

$query_limit_GetStars = sprintf("SELECT 'False' as PosG, playerstats.Name, SUM(playerstats.ProStar1) as Star1, SUM(playerstats.ProStar2) as Star2, SUM(playerstats.ProStar3) as Star3, ((SUM(playerstats.ProStar1)*3)+(SUM(playerstats.ProStar2)*2)+(SUM(playerstats.ProStar3)*1)) as TotalStars, playerstats.Number
FROM playerstats, proteam
WHERE playerstats.Season_ID=%s
AND proteam.Number=playerstats.Team
AND playerstats.ProGP > 0
GROUP BY playerstats.Name
UNION ALL 
SELECT 'True' as PosG, goaliestats.Name, SUM(goaliestats.ProStar1) as Star1, SUM(goaliestats.ProStar2) as Star2, SUM(goaliestats.ProStar3) as Star3, ((SUM(goaliestats.ProStar1)*3)+(SUM(goaliestats.ProStar2)*2)+(SUM(goaliestats.ProStar3)*1)) as TotalStars, goaliestats.Number
FROM goaliestats, proteam
WHERE goaliestats.Season_ID=%s
AND proteam.Number=goaliestats.Team
AND goaliestats.ProGP > 0
GROUP BY goaliestats.Name
ORDER BY TotalStars DESC, Star1 DESC , Star2 DESC, Star3 DESC LIMIT  0,10", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetStars = mysql_query($query_limit_GetStars, $connection) or die(mysql_error());
$row_GetStars = mysql_fetch_assoc($GetStars);

$query_GetTransactionHistory = sprintf("SELECT * FROM transactionhistory ORDER BY DateCreated desc, ID desc LIMIT 0,30");
$GetTransactionHistory = mysql_query($query_GetTransactionHistory, $connection) or die(mysql_error());
$row_GetTransactionHistory = mysql_fetch_assoc($GetTransactionHistory);
$totalRows_GetTransactionHistory = mysql_num_rows($GetTransactionHistory);

$query_GetTB = sprintf("SELECT p.Salary1, p.Overall, p.Name, p.PosC, p.PosLW, p.PosRW, p.PosD, 'False' as PosG, t.Abbre, t.Number, p.Number as PNumber FROM players as p, proteam as t WHERE p.Team=t.Number AND (p.AvailableforTrade = 'True' or p.AvailableforTrade = 'Vrai') UNION ALL SELECT g.Salary1, g.Overall, g.Name, 'False' as PosC, 'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG, t.Abbre, t.Number, g.Number as PNumber FROM goalies as g, proteam as t WHERE g.Team=t.Number AND (g.AvailableforTrade = 'True' or g.AvailableforTrade = 'Vrai') ORDER BY Overall DESC LIMIT 0,5");
$GetTB = mysql_query($query_GetTB, $connection) or die(mysql_error());
$row_GetTB = mysql_fetch_assoc($GetTB);
$totalRows_GetTB = mysql_num_rows($GetTB);

$query_GetTransactions = sprintf("SELECT o.*, 'False' as PosG, p.Number, p.Name FROM playerscontractoffers as o, players as p WHERE o.Player=p.Number AND o.PlayerType='player' AND (o.Type='Extension' OR o.Type='Signed') AND o.Approved='True' UNION ALL SELECT o.*, 'True' as PosG, p.Number, p.Name FROM playerscontractoffers as o, goalies as p WHERE o.Player=p.Number AND o.PlayerType='goalie' AND (o.Type='Extension' OR o.Type='Signed') AND o.Approved='True' ORDER BY DateCreated DESC LIMIT 0,50");
$GetTransactions = mysql_query($query_GetTransactions, $connection) or die(mysql_error());
$row_GetTransactions = mysql_fetch_assoc($GetTransactions);
$totalRows_GetTransactions = mysql_num_rows($GetTransactions);

$query_GetFA = sprintf("SELECT p.Name, p.Number, p.Overall, p.Age, p.StarPower, p.Country, p.PosC, p.PosLW, p.PosRW, p.PosD, 'False' as PosG FROM players as p WHERE (p.Contract=0 OR p.Team=0) AND p.Retired=0 UNION ALL SELECT g.Name, g.Number, g.Overall, g.Age, g.StarPower, g.Country, 'False' as PosC, 'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG FROM goalies as g WHERE (g.Contract=0 OR g.Team=0)  AND g.Retired=0 ORDER BY Overall desc LIMIT 0,5" );
$GetFA = mysql_query($query_GetFA, $connection) or die(mysql_error());
$row_GetFA = mysql_fetch_assoc($GetFA);
$totalRows_GetFA = mysql_num_rows($GetFA);

$query_GetTrades = sprintf("SELECT * FROM transactions WHERE Team1Approved='True' AND Team2Approved='True' ORDER BY DateCreated desc LIMIT 0, 5");
$GetTrades = mysql_query($query_GetTrades, $connection) or die(mysql_error());
$row_GetTrades = mysql_fetch_assoc($GetTrades);
$totalRows_GetTrades = mysql_num_rows($GetTrades);

$query_GetPlayerWeek = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower7Days, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower7Days, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY ProStarPower7Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetPlayerWeek = mysql_query($query_GetPlayerWeek, $connection) or die(mysql_error());
$row_GetPlayerWeek = mysql_fetch_assoc($GetPlayerWeek);
$totalRows_GetPlayerWeek = mysql_num_rows($GetPlayerWeek);

$query_GetPlayerMonth = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower30Days, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower30Days, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY ProStarPower30Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetPlayerMonth = mysql_query($query_GetPlayerMonth, $connection) or die(mysql_error());
$row_GetPlayerMonth = mysql_fetch_assoc($GetPlayerMonth);
$totalRows_GetPlayerMonth = mysql_num_rows($GetPlayerMonth);

$query_GetPlayerSeason = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPowerYear, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPowerYear, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY ProStarPowerYear DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetPlayerSeason = mysql_query($query_GetPlayerSeason, $connection) or die(mysql_error());
$row_GetPlayerSeason = mysql_fetch_assoc($GetPlayerSeason);
$totalRows_GetPlayerSeason = mysql_num_rows($GetPlayerSeason);

$query_GetComments = sprintf("SELECT comments.*, proteam.Number, proteam.GM, proteam.City, proteam.LogoTiny, proteam.SecondaryColor, articles.Headline, articles.A_ID FROM articles, comments LEFT JOIN proteam ON comments.Team=proteam.Number WHERE comments.A_ID=articles.A_ID order by comments.DateCreated DESC LIMIT 0,5");
$GetComments = mysql_query($query_GetComments, $connection) or die(mysql_error());
$row_GetComments = mysql_fetch_assoc($GetComments);
$totalRows_GetComments = mysql_num_rows($GetComments);

$RecoveryRate=1;
$query_GetConfigInfo = sprintf("SELECT DivisionLeader, UFA, SmallLeagueLogo, FarmLeague, RecoveryRate, DisplayOffers, LastModifiedSchedule, LeagueFile FROM config");
$GetConfigInfo = mysql_query($query_GetConfigInfo, $connection) or die(mysql_error());
$row_GetConfigInfo = mysql_fetch_assoc($GetConfigInfo);
$RecoveryRate=$row_GetConfigInfo['RecoveryRate'];
$UserFarmleage=$row_GetConfigInfo['FarmLeague'];
$UFA=$row_GetConfigInfo['UFA'];
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

if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }

$query_GetRecentStatus = sprintf("
SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, DateModified, c.Comment as Comment, c.A_Type, c.A_ID as A_ID, p.Avatar, p.GM, p.oauth_provider, p.oauth_uid,
(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=%s) as LikeComment
FROM comments as c LEFT JOIN proteam as p 
ON c.Team=p.Number
WHERE c.Parent_ID=0 
 GROUP BY c.ID
UNION ALL

SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, DateModified, c.Comment as Comment, c.A_Type, c.A_ID as A_ID, '%s', '%s', '', '', (0) as LikeComment
FROM comments as c 
WHERE c.Team=0
AND c.Parent_ID=0 
  GROUP BY c.ID
ORDER BY DateModified DESC LIMIT 10",$userID, $avatar, $defaultname);
$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">-->
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $_SESSION['SiteName'] ; ?></title>
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
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/status.css" />

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.elastic.js"></script>

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
  //Toggle Teaser
	$("a.collapse").click(function(){
		$(".main_image .block").slideToggle();
		$("a.collapse").toggleClass("show");
	});
  $("#star1").reflect({height:25,opacity:0.3});
  $("#star2").reflect({height:25,opacity:0.3});
  $("#star3").reflect({height:25,opacity:0.3});
  $("#star4").reflect({height:25,opacity:0.3});
  $("#star5").reflect({height:25,opacity:0.3});
  $("#star6").reflect({height:25,opacity:0.3});
  
$(".input_box").elastic().css("height","30px");
$(".input_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "So what's on your mind?"
}).val("").css("color","#000000");
});
$(".input_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("So what's on your mind?").css("color","#808080");
});


$("#share").click(function(){
	$(".loading").show();
	var status=$(".input_box").val();
	if(status == "So what's on your mind?"){
		$(".loading").hide();
	}else{
		
		if ($('#SHARE').is(':checked')){
			var sharetype = SHARE.value;
		} else {
			var sharetype = "";
		}
		
		var DATA = 'status=' + status + '&share=' + sharetype;
		$.ajax({
		type: "POST",
		url: "status_update.php",
		data: DATA,
		cache: false,
		success: function(data){
		$(".load_status_out").append(data);
		$(".loading").hide();
		$(".input_box").val("So what's on your mind?").css("color","#808080").css("height","30px");
	}
	});
	}
	return false;
});


$(".light_blue").click(function() 
{
	var ID = $(this).attr("id");
	$("#comment_ui"+ID).css({'visibility' : 'visible'});	
	$("#comment_ui"+ID).css({'height' : '35px'});
	$("#comment_ui"+ID).focus();
});


$(".view_comments").live('click', function()
{
	var ID = $(this).attr("id");
	$.ajax({
		type: "POST",
		url: "viewajax.php",
		data: "id="+ ID, 
		cache: false,
		success: function(html){
			$("#view_comments"+ID).prepend(html);
			$("#view"+ID).remove();
			$("#two_comments"+ID).remove();
		}
		
	});
	return false;
});

$(".GetOlderPosts").live('click', function() {
	var ID = $(this).attr("id");
	var POSTTYPE = "league";
	$.ajax({
		type: "POST",
		url: "viewolderposts.php",
		data: "id="+ ID + "&type=" + POSTTYPE, 
		cache: false,
		success: function(html){
			$("#olderposts").replaceWith(html);
		}
		
	});
	return false;
});

$(".comment_box").elastic().css("height","15px");
$(".comment_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "Write a comment..."
}).val("").css("color","#000000");
});
$(".comment_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("Write a comment...").css("color","#808080");
});

$(".comment_box").keypress(function(e) {
	var ID = $(this).attr("id");
	code= (e.keyCode ? e.keyCode : e.which);
	if (code == 13) {
		$(".loading").show();
		var status=$(this).val();
		if(status == "Write a comment..."){
			$(".loading").hide();
		}else{
			var DATA = 'status=' + status + '&id=' + ID + '&type=0';
			$.ajax({
				type: "POST",
				url: "comment_update.php",
				data: DATA,
				cache: false,
				success: function(data){
					$(".loading").hide();
					$(".comment_box").val("Write a comment...").css("color","#808080").css("height","15px").blur();
					$("#view_comments"+ID).prepend(data);
				}
			});
		}
		return false;
	}
});


$(".remove_comment").live('click', function()
{
	var ID = $(this).attr("id");
	var answer = confirm("Are you sure you want to remove this comment?")
	if (answer){
		$.ajax({
			type: "POST",
			url: "remove_status_comment.php",
			data: "id="+ ID, 
			cache: false,
			success: function(html){
				$("#load_status"+ID).remove();
			}
		});
	}
	return false;
});

$(".remove_status").live('click', function()
{
	var ID = $(this).attr("id");
	var answer = confirm("Are you sure you want to remove this comment?")
	if (answer){
		$.ajax({
			type: "POST",
			url: "remove_status_comment.php",
			data: "id="+ ID, 
			cache: false,
			success: function(html){
				$("#two_comments"+ID).remove();
			}
		});
	}
	return false;
});


$(".remove_comment").hover(function () 
{	
	$(this).css("opacity", "1");
	$(this).css("filter", "alpha(opacity=1)");
  }, 
  function () {
	$(this).css("opacity", "0.1");
	$(this).css("filter", "alpha(opacity=10)");
  }
);

	
});;
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
.fieldsetleft {display:display:block; float:left; width:456px; margin:0px 5px 0px 5px;}
.fieldsetright {display:display:block; float:left; width:456px; margin:0px 5px 0px 5px;}
.fieldsettile {display:display:block; float:left; width:300px; margin:0px 5px 0px 5px;}

legend {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; font-weight:bold; font-size:1.2em;}
.fieldsettile table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>; border-width:0px; border-style:none;}
#divscrollerhead{background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; text-align:left; font-size: 9pt; padding: 3px; border-color:#999999; border-style:solid; border-width:1px; font-weight:bold; margin-top:10px}
#divscroller{height:400px; overflow-x: hidden; padding:4px; vertical-align: top; line-height:17px; border-style:solid; border-width:1px; border-color:#a1a1a1; font-size:11px; margin-bottom:15px;}
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
			echo "<div style='padding:0px 5px 5px 0px; float:right;'><a href='add_article.php' class='button add'><strong>".$l_Add_Article."</strong></a></div><br clear='all' />";
	}
	if($row_GetTeamNews['Image']==""){
		$tmpImage = $_SESSION['current_HeadlineImage'];
	} else {
		$tmpImage = $row_GetTeamNews['Image'];	
	}
	?>
    <div id="main" class="container">
        <div class="main_image">
            <img src="<?php echo ($_SESSION['DomainName']."/image/headlines/".$tmpImage); ?>" alt="- banner1" />
            <div class="desc">
                <a href="#" class="collapse"><?php echo $l_Close;?></a>
                <div class="block">
                    <h4><?php echo $row_GetTeamNews['Headline']; ?></h4>
                    <small><?php echo $row_GetTeamNews['DateCreated']; ?></small>
					<p><?php echo $row_GetTeamNews['Summary']; ?></p>
                    <p style="margin:0px 10px 0px 0px; font-weight:bold; font-size:0.9em; text-align:right;"><a href="news.php?team=<?php if($row_GetTeamNews['Number'] != ""){ echo $row_GetTeamNews['Number']; } else { echo 0; }?>&article=<?php echo $row_GetTeamNews['A_ID'];?>" style="color:#FFFFFF; font-size:1em;"><?php echo $l_readmore;?></a></p>
                </div>
            </div>
        </div>
        <div class="image_thumb">
            <ul>
            <?php 
			if($totalRows_GetTeamNews > 0){
			do { 
			if($row_GetTeamNews['Team']==""){$row_GetTeamNews['Team']=0;}
			$query_limit_GetTeamLogo = sprintf("SELECT p.LogoTiny FROM proteam as p WHERE p.Number=%s",$row_GetTeamNews['Team']);
			$GetTeamLogo = mysql_query($query_limit_GetTeamLogo, $connection) or die(mysql_error());
			$row_GetTeamLogo = mysql_fetch_assoc($GetTeamLogo);
			$totalRows_GetTeamLogo = mysql_num_rows($GetTeamLogo);
			if($totalRows_GetTeamLogo > 0){
				$tmpLogo = $_SESSION['DomainName']."/image/logos/small/" . $row_GetTeamLogo['LogoTiny'];
			} else {
				$tmpLogo = $_SESSION['DomainName']."/image/logos/small/" . $row_GetConfigInfo['SmallLeagueLogo'];
			}
			if ($row_GetTeamNews['Team']==100) {$tmpLogo = $_SESSION['DomainName']."/image/gm/theflys.jpg";}
			if($row_GetTeamNews['Image']==""){
				$tmpImage = $_SESSION['current_HeadlineImage'];
			} else {
				$tmpImage = $row_GetTeamNews['Image'];	
			}
			?>
                <li>
                    <a href="<?php echo ($_SESSION['DomainName']."/image/headlines/".$tmpImage); ?>"><img src="<?php echo $tmpLogo; ?>" /></a>
                    <div class="block">
                        <h4><?php echo $row_GetTeamNews['Headline']; ?></h4>
                        <small><?php echo $row_GetTeamNews['DateCreated']; ?></small>
						<p><?php echo $row_GetTeamNews['Summary']; ?></p>
                    	<p style="margin-right:10px; margin-bottom:0px; font-weight:bold; font-size:0.9em; text-align:right;"><a href="news.php?team=<?php if($row_GetTeamNews['Number'] != ""){ echo $row_GetTeamNews['Number']; } else { echo 0; }?>&article=<?php echo $row_GetTeamNews['A_ID'];?>" style="color:#FFFFFF; font-size:1em;"><?php echo $l_readmore;?></a></p>
                    </div>
                </li>
            <?php 
            } while ($row_GetTeamNews = mysql_fetch_assoc($GetTeamNews)); 
			}
            mysql_free_result($GetTeamNews);
            ?>
            </ul>
        </div>
	</div>
    <Br /><Br />
    
	<div id="tabs">
    	
    <div id="tabs-1"><h3><?php echo $l_TodaysTransactions;?></h3>
        
     <h2><?php echo $_SESSION['current_Season']."-".substr($_SESSION['current_Season']+1, -2)." ".$_SESSION['current_SeasonType']." ".$l_Day." : ".$Day_ID;?></h2>
       
     <div id="tabs2" class="fieldsetleft">
    	
        <h3><?php echo $l_StatusUpdate;?></h3>
			<div class="con">
                <?php if(isset($_SESSION['U_ID'])){ ?>
                    <div class="pd">
                        <div class="share">Share:</div>
                        <div class="status">Status</div>
                        <div class="loading"></div>
                    </div>
                    <div class="img_top"></div>
                    <div class="text_status">
                    	<textarea class="input_box">So what's on your mind?</textarea>
                    </div>
                    <div style="float:left;">
                    <?php if(isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'twitter'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="twitter" /> <img src="image/common/tweet.png" width="55" height="20" alt="Tweet">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else if (isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'facebook'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="facebook" /> <img src="image/common/fb_share.png" width="59" height="18" alt="Share">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else { ?>
                    <input name="SHARE" type="hidden" value="" />
                    <?php } ?>
                    </div>
                    <div class="button_outside_border_blue" id="share">
                        <div class="button_inside_border_blue">
                            Share
                        </div>
                    </div>
                <div class="clear"></div>
                <div class="load_status_out"></div>
                
               <?php 
				}
				
				if($totalRows_GetRecentStatus > 0){
					
					$tmpID=0;
					$tmpCounter=0;
					do { 
					$currentLikes = 0;
					$query_GetLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$row_GetRecentStatus['ID']);
					$GetLikes = mysql_query($query_GetLikes, $connection) or die(mysql_error());
					$row_GetLikes = mysql_fetch_assoc($GetLikes);
					$currentLikes = $row_GetLikes['TotalLikes'];
					if($tmpID != $row_GetRecentStatus['ID']){
						if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }
						$query_GetComments = sprintf("SELECT c.*,(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=%s) as LikeComment FROM comments as c WHERE c.Parent_ID = %s ORDER BY c.ID DESC", $userID, $row_GetRecentStatus['ID']);
						$GetComments = mysql_query($query_GetComments, $connection) or die(mysql_error());
						$row_GetComments = mysql_fetch_assoc($GetComments);
						$totalRows_GetComments = mysql_num_rows($GetComments);
						if($totalRows_GetComments > 0){ $commentID = $row_GetComments['ID'];} else { $commentID=0;}
                        
						if($row_GetRecentStatus['A_ID'] > 0){
							$query_GetArticle = sprintf("SELECT Headline, Summary FROM articles WHERE A_ID=%s",$row_GetRecentStatus['A_ID']);
							$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
							$row_GetArticle = mysql_fetch_assoc($GetArticle);
							$totalRows_GetArticle = mysql_num_rows($GetArticle);
						}
						
						$currentCommentLikes = 0;
						$query_GetCommentLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$commentID);
						$GetCommentLikes = mysql_query($query_GetCommentLikes, $connection) or die(mysql_error());
						$row_GetCommentLikes = mysql_fetch_assoc($GetCommentLikes);
						$currentCommentLikes = $row_GetCommentLikes['TotalLikes'];
						
                        echo '<div class="load_status" id="load_status'.$row_GetRecentStatus['ID'].'">
						<div class="status_img"><img src="'.getAvatar($row_GetRecentStatus['oauth_uid'], $row_GetRecentStatus['oauth_provider'], $row_GetRecentStatus['Team'], $connection).'" width="50" height="50" border="0" /></div>';
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$row_GetRecentStatus['Team'] || $_SESSION['U_Admin']==1){
								echo '<div class="remove_comment" id="'.$row_GetRecentStatus['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
							}
						}
						echo '<div class="status_text" id="'.$row_GetRecentStatus['ID'].'"><a href="view_comments.php?id='.$row_GetRecentStatus['ID'].'" class="blue">'.$row_GetRecentStatus['GM'].'</a>';
						echo '<p class="text">'.$row_GetRecentStatus['Comment'].'</p>';
						if($row_GetRecentStatus['A_ID'] > 0 && $row_GetRecentStatus['A_Type'] == 1 && $totalRows_GetArticle > 0){
							echo '<p class="text" style="margin-left:20px; font-size:10px;"><a href="news.php?article='.$row_GetRecentStatus['A_ID'].'"><strong>'.$row_GetArticle['Headline'].'</strong></a><br /><em>'.$row_GetArticle['Summary'].'</em></p>';
						}
						echo '<div style="margin:5px;">';
						if(isset($_SESSION['U_ID'])){
							if($row_GetRecentStatus['LikeComment'] > 0){
								if($currentLikes-1 > 0){
									echo '<span style="color:#333333; font-size:12px;">&#8226; You and '.number_format($currentLikes-1).' other(s) Like this</span>';
								} else {
									echo '<span style="color:#333333; font-size:12px;">&#8226; You Like this</span>';
								}
							} else {
								echo '<span style="color:#333333; font-size:12px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$row_GetRecentStatus['ID'].'">'.$currentLikes.'</span>)</span>';
							}
							echo '&nbsp;&nbsp;<a href="javascript:void();" class="light_blue" id="'.$row_GetRecentStatus['ID'].'">Comment</a>';
						} else {
								echo '<span style="color:#333333; font-size:12px;">&#8226; '.$currentLikes.' teams Like this</span>';
						}
						//echo '<div class="date">'.$row_GetRecentStatus['DateCreated'];
						echo '&nbsp;&nbsp;<span class="date">'.dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetRecentStatus['DateCreated']);
						echo '</span></div></div>';
						
						
						if($totalRows_GetComments>0){
							echo '<div class="comment_ui" id="view'.$row_GetRecentStatus['ID'].'">';
							if($totalRows_GetComments>1){
								$second_count=$totalRows_GetComments-1;
								echo '<div><a href="#" class="view_comments" id="'.$row_GetRecentStatus['ID'].'">View all '.$totalRows_GetComments.' comments</a></div>';
							} else {
								$second_count=0;
							}
							$query_GetCommentsDetails = sprintf("SELECT c.*, p.oauth_provider, p.oauth_uid, p.Avatar, p.GM, p.Number FROM comments as c, proteam as p WHERE c.Team=p.Number AND c.Parent_ID = %s UNION ALL SELECT c.*, '', '', '".$avatar."', '".$defaultname."', 0 FROM comments as c WHERE c.Team=0 AND c.Parent_ID = %s ORDER BY ID ASC LIMIT %s,1",$row_GetRecentStatus['ID'], $row_GetRecentStatus['ID'], $second_count);
							$GetCommentsDetails = mysql_query($query_GetCommentsDetails, $connection) or die(mysql_error());
							$row_GetCommentsDetails = mysql_fetch_assoc($GetCommentsDetails);
							echo '<div id="two_comments'.$row_GetRecentStatus['ID'].'">';
									echo '<div class="comment_text">';
										echo '<div class="comment_img"><img src="'.getAvatar($row_GetCommentsDetails['oauth_uid'], $row_GetCommentsDetails['oauth_provider'], $row_GetCommentsDetails['Number'], $connection).'" width="32" height="32" border="0" /></div>';
										if(isset($_SESSION['U_ID'])){
											if($_SESSION['U_ID']==$row_GetCommentsDetails['Team'] || $_SESSION['U_Admin']==1){
												echo '<div class="remove_status" id="'.$row_GetCommentsDetails['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
											}
										}
										echo '<div class="comment_actual_text" id="'.$row_GetCommentsDetails['ID'].'"><a href="bio.php?team='.$row_GetCommentsDetails['Number'].'">'.$row_GetCommentsDetails['GM'].'</a> '.$row_GetCommentsDetails['Comment'].'</div><br />';
										echo '<div class="date" style="font-size:11px;">';
										//echo $row_GetCommentsDetails['DateCreated'];
										echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetCommentsDetails['DateCreated']);
										
										if(isset($_SESSION['U_ID'])){
											if($row_GetComments['LikeComment'] > 0){
												if($currentCommentLikes-1 > 0){
													echo '&nbsp;&nbsp;<span style="color:#333333; font-size:12px;">You and '.number_format($currentCommentLikes-1).' other(s) Like this</span>';
												} else {
													echo '&nbsp&nbsp;;<span style="color:#333333; font-size:12px;">You Like this</span>';
												}
											} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$row_GetComments['ID'].'">'.$currentCommentLikes.'</span>)</span>';
											}
										} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">'.$currentCommentLikes.' teams Like this</span>';
										}
									echo '</div>';
									echo '</div>';
									echo '</div>';
							
							echo '</div>';
						}
						echo '<div id="view_comments'.$row_GetRecentStatus['ID'].'"></div>';
						if(isset($_SESSION['U_ID'])){
							echo '<div class="comment_ui" style="visibility:hidden; height:1px;" id="comment_ui'.$row_GetRecentStatus['ID'].'"><input type="text" maxlength="255" id="'.$row_GetRecentStatus['ID'].'" class="comment_box" style="font-size:11px;" value="Write a comment..." /></div>';
						}
						echo '<div class="clear" clear="both"></div></div>';
					}
					$tmpCounter=$tmpCounter+1;
					$tmpID=$row_GetRecentStatus['ID'];
					if($tmpCounter==$totalRows_GetRecentStatus){
						echo '<div class="olderposts" id="olderposts" align="center"><a href="#" class="GetOlderPosts" id="'.$tmpCounter.'">Older Posts</a></div>';
					}
					} while ($row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus));  
					
					
				}
				
				?>
                </div>
	</div>

       
    <div id="tabs" class="fieldsetright"> 
    	<?php 
		if ($_SESSION['JuniorLeague'] == 'True'){ 
			$query_GetLinks = sprintf("SELECT URL FROM links");
			$GetLinks = mysql_query($query_GetLinks, $connection) or die(mysql_error());
			$row_GetLinks = mysql_fetch_assoc($GetLinks);
			$totalRows_GetLinks = mysql_num_rows($GetLinks);
			
			if($totalRows_GetLinks > 0){
				$row = 0;
				$rowstar = 0;
				$leagues = array();
				$sortedStandings = array();
				$sortedWeek = array();
				
				do {
					$leagues[] = array( "URL" => $row_GetLinks["URL"]);
					$row = $row + 1;
				} while ($row_GetLinks = mysql_fetch_assoc($GetLinks));
				$leagues[] = array( "URL" => $_SESSION['DomainName']);
				//echo sizeof($leagues);
				
				if(sizeof($leagues) > 0){
				$rowCounter = 0;
				foreach ($leagues as $i => $league) {
						
					$jsonurl = $league["URL"]."/getStandings.php";
					$json = file_get_contents($jsonurl);
					
					$arr = json_decode($json, true); 
					foreach($arr as $key1 => $value1) { 
						 
						if(is_array($value1)) { 
							foreach($value1 as $key2 => $value2) { 				
								if($key2 == "id"){ $teamsStandings["id"][$row] = $value2; }
								if($key2 == "city"){ $teamsStandings["city"][$row] = $value2; }
								if($key2 == "name"){ $teamsStandings["name"][$row] = $value2; }
								if($key2 == "rank"){ $teamsStandings["rank"][$row] = $value2; }
								if($key2 == "url"){ $teamsStandings["url"][$row] = $value2; }
								if($key2 == "icon"){ $teamsStandings["icon"][$row] = $value2; }
								if($key2 == "last10"){ $teamsStandings["last10"][$row] = $value2; }
								if($key2 == "streak"){ $teamsStandings["streak"][$row] = $value2; } 
								if($key2 == "point"){ $teamsStandings["point"][$row] = $value2; }
								if($key2 == "winpct"){ $teamsStandings["winpct"][$row] = $value2; }
							}
							
							$sortedStandings[] = array( "id" => $teamsStandings["id"][$row], 
									  "city" => $teamsStandings["city"][$row],
									  "name" => $teamsStandings["name"][$row],
									  "rank" => $teamsStandings["rank"][$row],
									  "url" => $teamsStandings["url"][$row],
									  "icon" => $teamsStandings["icon"][$row],
									  "last10" => $teamsStandings["last10"][$row],
									  "streak" => $teamsStandings["streak"][$row],
									  "point" => $teamsStandings["point"][$row],
									  "winpct" => $teamsStandings["winpct"][$row]
									,);
							$row = $row + 1;
						} 
					}
					
					$jsonurl = $league["URL"]."/getStarWeek.php";
					$json = file_get_contents($jsonurl);
					
					$arr = json_decode($json, true); 
					foreach($arr as $key1 => $value1) { 
						 
						if(is_array($value1)) { 
							foreach($value1 as $key2 => $value2) { 				
								if($key2 == "number"){ $StarWeek["number"][$rowstar] = $value2; }
								if($key2 == "name"){ $StarWeek["name"][$rowstar] = $value2; }
								if($key2 == "rank"){ $StarWeek["rank"][$rowstar] = $value2; }
								if($key2 == "url"){ $StarWeek["url"][$rowstar] = $value2; }
								if($key2 == "icon"){ $StarWeek["icon"][$rowstar] = $value2; }
								if($key2 == "photo"){ $StarWeek["photo"][$rowstar] = $value2; }
								if($key2 == "pos"){ $StarWeek["pos"][$rowstar] = $value2; }
								if($key2 == "stat1"){ $StarWeek["stat1"][$rowstar] = $value2; }
								if($key2 == "stat2"){ $StarWeek["stat2"][$rowstar] = $value2; }
								if($key2 == "stat3"){ $StarWeek["stat3"][$rowstar] = $value2; }
								if($key2 == "stat4"){ $StarWeek["stat4"][$rowstar] = $value2; }
								if($key2 == "stat5"){ $StarWeek["stat5"][$rowstar] = $value2; }
								if($key2 == "stat6"){ $StarWeek["stat6"][$rowstar] = $value2; }
							}
							
							$sortedWeek[] = array( "number" => $StarWeek["number"][$rowstar], 
									  "name" => $StarWeek["name"][$rowstar],
									  "rank" => $StarWeek["rank"][$rowstar],
									  "url" => $StarWeek["url"][$rowstar],
									  "icon" => $StarWeek["icon"][$rowstar],
									  "photo" => $StarWeek["photo"][$rowstar],
									  "pos" => $StarWeek["pos"][$rowstar],
									  "stat1" => $StarWeek["stat1"][$rowstar],
									  "stat2" => $StarWeek["stat2"][$rowstar],
									  "stat3" => $StarWeek["stat3"][$rowstar],
									  "stat4" => $StarWeek["stat4"][$rowstar],
									  "stat5" => $StarWeek["stat5"][$rowstar],
									  "stat6" => $StarWeek["stat6"][$rowstar]
									,);
							$row = $row + 1;
							$rowstar = $rowstar + 1;
						} 
					}
					++$rowCounter;
					//echo $rowCounter." ".$row."<br>";
				}
				}
				
				$sortedTeamsByRank = sort2d($sortedStandings,"winpct");
				$sortedStarsByRank = sort2d($sortedWeek,"rank");
				$rowCounter = 0;
				
		}	
        ?>

   		<?php if($totalRows_GetLinks > 0){
		echo "<h3>Interleague <?php echo $l_StarWeek;?></h3>";
		if(sizeof($sortedWeek) > 0){
			$rowCounter = 0;
			foreach ($sortedWeek as $i => $star) {	
		?>
				<table cellspacing="0" border="0" style="width:222px; font-family:arial; background-color: #dedede; margin:10px 5px 20px 0px; font-size: 8pt; text-align: left; float:left;" >
				<thead>
				<tr>
                
					 <td height="98"><a href="<?php echo $star["url"]; ?>"><img src="<?php echo $star["photo"]; ?>" border="0" align="left" width="65" height="98" alt="<?php echo $star["name"]; ?>"/></a></td>
					 <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
                     <img src='<?php echo $star["icon"];?>' align="right" border=0>
					 <a href="<?php echo $star["url"]; ?>" style="font-size:14px"><?php echo $star["name"]; ?></a>
                     <?php if($star["pos"] == "g") { ?>
					 <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $star["stat1"]."-".$star["stat2"]."-".$star["stat3"];?></strong>
					 <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($star["stat4"] > 0){ echo number_format(($star["stat5"] / minutes($star["stat4"]))*60,2);  } else { echo "0"; } ?></strong>
					 <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($star["stat4"] > 0){ echo number_format($star["stat6"] / ($star["stat5"] + $star["stat6"]),3); } else { echo "0"; } ?></strong>
					<?php } else { ?>
					 <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $star["stat1"];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $star["stat2"];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $star["stat3"];?></strong>
					 <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $star["stat5"] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $star["stat4"] ?></strong>
					 <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $star["stat6"]." ".$l_Games;?> </strong><br>
					<?php } ?>
					 </td>
				</tr>
				</table>
        <?php
				++$rowCounter;
				if($rowCounter == 2){ break; }
			}
		}
		
		$rowCounter = 0;
		if(sizeof($sortedStandings) > 0){
		?>
            <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
            <thead>
            <tr>
                <th><a title="<?php echo $l_Rank;?>"><?php echo $l_Rank;?></a></th>
                <th><a title="Interleague <?php echo $l_nav_PowerRankings;?>">Interleague <?php echo $l_nav_PowerRankings;?></a></th>
                <th><a title="<?php echo $l_Last10_D;?>"><?php echo $l_L10;?></a></th>
            	<th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak;?></a></th>	
            </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($sortedTeamsByRank as $i => $team) {	
                ?>
               <tr>
                <td align="center" style="vertical-align:middle;"><?php echo $rowCounter+1;?></td>
                <td align="left" style="vertical-align:middle;"><a href="<?php echo $team["url"]; ?>" style="margin-top:15px;"><img border="0" src="<?php echo $team["icon"] ?>" style="float:left; padding:0px 10px 0px 10px;" /><?php echo $team["city"]." ".$team["name"];?></a></td>
                <td align="center" style="vertical-align:middle;"><?php echo $team["last10"];?></td>
                <td align="center" style="vertical-align:middle;"><?php echo $team["streak"];?></td>
              </tr>
              <?php 
               		++$rowCounter;
					if($rowCounter == 10){ break; }
				} ?>
            </tbody> 
            </table>
        <?php
		} } 
		}
		?>
        
        <?php if ($totalRows_GetTrades > 0){?>
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
            <tbody>
            <?php 
			$lastDate = "";
			do { 
               $query_GetTeam1 = sprintf("SELECT Abbre, LogoTiny, City, Name FROM proteam WHERE proteam.Number='%s'", $row_GetTrades['Team1']);
				$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
				$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
				$query_GetTeam2 = sprintf("SELECT Abbre, LogoTiny, City, Name FROM proteam WHERE proteam.Number='%s'", $row_GetTrades['Team2']);
				$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
				$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
				if($lastDate != substr($row_GetTrades['DateCreated'],0,10)){
					echo '<tr><td colspan="2" style="background-color:#eee"><strong>'.$l_Trades.' : '.substr($row_GetTrades['DateCreated'],0,10).'</strong></td></tr>';					
				}
            ?>
            <tr>
                <td width="50%"><span style="width:25px; float:left;"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetTeam1['LogoTiny']; ?>"></img></span>
                    <span style="display:block; width:185px; float:right"><?php echo $row_GetTrades['Team1List']; ?></span></td>
                <td width="50%"><span style="width:25px; float:left;"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetTeam2['LogoTiny']; ?>"></img></span>
                	<span style="display:block; width:185px; float:right"><?php echo $row_GetTrades['Team2List']; ?></span></td>
            </tr>
            <?php
				if($row_GetTrades['FutureConsiderations'] != "" && $row_GetTrades['FutureConsiderations'] != "N/A"){
					 echo "<tr><td colspan=2><a title='".$l_FutureConsiderations."'>FUT</a>: ".$row_GetTrades['FutureConsiderations']."</td></tr>";
				}      
				$lastDate = substr($row_GetTrades['DateCreated'],0,10);
            } while ($row_GetTrades = mysql_fetch_assoc($GetTrades));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="transactions.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
            </table>
        <?php } ?>
        
        
    	<?php		
		if ($_SESSION['JuniorLeague'] == 'False'){ 
		if ($totalRows_GetFA > 0){
		?>  
        <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
            <thead>
            <tr>
            <th style="text-align:left" width="125"><?php echo $l_FreeAgents;?></th><th width="100"><?php echo $l_Position;?></th><th width="50"><?php echo $l_Country;?></th><th width="50"><?php echo $l_overall;?></th><th><?php echo $l_Type;?></th>
            </tr>
            </thead>
            <tbody>
            <?php do { 
               if($row_GetFA['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
					$query_RFA = sprintf("SELECT P.Name FROM goalies as P WHERE Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=P.Number) AND P.Age < %s AND P.Number=%s",$UFA, $row_GetFA['Number']);
					$GetRFA = mysql_query($query_RFA, $connection) or die(mysql_error());
					$row_GetRFA = mysql_fetch_assoc($GetRFA);
					$totalRows_GetRFA = mysql_num_rows($GetRFA);
                } else {
                    $tmpTargetFile="player.php";
					$query_RFA = sprintf("SELECT P.Name FROM players as P WHERE Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=P.Number) AND P.Age < %s AND P.Number=%s",$UFA, $row_GetFA['Number']);
					$GetRFA = mysql_query($query_RFA, $connection) or die(mysql_error());
					$row_GetRFA = mysql_fetch_assoc($GetRFA);
					$totalRows_GetRFA = mysql_num_rows($GetRFA);
                }
            ?>
            <tr>
                <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetFA['Number']; ?>"><?php echo $row_GetFA['Name']; ?></a></td>
                <td width="100">
               <?php 
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetFA['PosC'] == "True" || $row_GetFA['PosC'] == "Vrai"){
                    echo $l_C;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetFA['PosLW'] == "True" || $row_GetFA['PosLW'] == "Vrai"){
                    echo $l_LW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetFA['PosRW'] == "True" || $row_GetFA['PosRW'] == "Vrai"){
                    echo $l_RW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetFA['PosD'] == "True" || $row_GetFA['PosD'] == "Vrai"){
                    echo $l_D;
                } else { echo "&nbsp;"; }
                echo '</div>';
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetFA['PosG'] == "True" || $row_GetFA['PosG'] == "Vrai"){
                    echo $l_G;
                } else { echo "&nbsp;"; }
                echo '</div>';
                ?>
                </td>
                <td align="center"><?php echo $row_GetFA['Country']; ?></td>
                <td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetFA['Overall']; } else { echo "-"; } ?></td>
                <td align="center"><?php 
				if($totalRows_GetRFA > 0){
					echo "RFA"; 
				} else { 
					echo "UFA"; 
				} 
				?></td>
            </tr>
            <?php } while ($row_GetFA = mysql_fetch_assoc($GetFA));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="ufa-free-agents.php"><?php echo $l_UFAFreeAgents;?></a> &nbsp;&nbsp;&#8250;&#8250;&nbsp;<a href="rfa-free-agents.php.php"><?php echo $l_RFAFreeAgents;?></a></td>
                </tr>
            </tfoot>
            </table>
            <?php } ?>
            
        
         <?php       
            $query_GetWaiver = sprintf("SELECT w.*, P.Salary1, P.Name, P.Number, P.Overall, P.PosC, P.PosLW, P.PosRW, P.PosD, 'False' as PosG FROM waiver as w, players as P WHERE w.Player = P.Number AND w.FromTeam=P.Team AND w.DayPutOnWaiver <= %s AND w.DayRemoveFromWaiver >= %s UNION ALL SELECT w.*, g.Salary1, g.Name, g.Number, g.Overall, 'False' as PosC, 'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG FROM waiver as w, goalies as g WHERE (w.Player-10000) = g.Number AND w.FromTeam=g.Team AND w.DayPutOnWaiver <= %s AND w.DayRemoveFromWaiver >= %s ", $Day_ID, $Day_ID, $Day_ID, $Day_ID);
            $GetWaiver = mysql_query($query_GetWaiver, $connection) or die(mysql_error());
            $row_GetWaiver = mysql_fetch_assoc($GetWaiver);
            $totalRows_GetWaiver = mysql_num_rows($GetWaiver);
			if($totalRows_GetWaiver>0){
            ?>
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
            <thead>
            <tr>
            <th style="text-align:left" width="125"><?php echo $l_Waivers;?></th><th width="100"><?php echo $l_Position;?></th><th width="50"><?php $l_Date;?></th><th width="50"><?php echo $l_overall;?></th><th><?php echo $l_Salary;?></th>
            </tr>
            </thead>
            <tbody>
            <?php do { 
               if($row_GetWaiver['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
            ?>
            <tr>
                <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetWaiver['Number']; ?>"><?php echo $row_GetWaiver['Name']; ?></a></td>
                <td width="100">
               <?php 
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetWaiver['PosC'] == "True" || $row_GetWaiver['PosC'] == "Vrai"){
                    echo $l_C;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetWaiver['PosLW'] == "True" || $row_GetWaiver['PosLW'] == "Vrai"){
                    echo $l_LW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetWaiver['PosRW'] == "True" || $row_GetWaiver['PosRW'] == "Vrai"){
                    echo $l_RW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetWaiver['PosD'] == "True" || $row_GetWaiver['PosD'] == "Vrai"){
                    echo $l_D;
                } else { echo "&nbsp;"; }
                echo '</div>';
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetWaiver['PosG'] == "True" || $row_GetWaiver['PosG'] == "Vrai"){
                    echo $l_G;
                } else { echo "&nbsp;"; }
                echo '</div>';
                ?>
                </td>
                <td align=center><?php echo "Day ".$row_GetWaiver['DayRemoveFromWaiver'];?></td>
                <td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetWaiver['Overall']; } else { echo "-"; } ?></td>
                <td align="center">$<?php echo number_format($row_GetWaiver['Salary1'],0); ?></td>
            </tr>
            <?php } while ($row_GetWaiver = mysql_fetch_assoc($GetWaiver));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="waiver_list.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
            </table>
        <?php } else {
		
			$query_GetInjuryList = "select Name, Number, Injury, CON, PosC,	PosLW, PosRW, PosD, 'False' as PosG from players where Injury <> ''  UNION ALL SELECT Name, Number, Injury, CON, 'False' as PosC,	'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG from goalies where Injury <> '' ORDER BY CON asc LIMIT 0,5";
			$GetInjuryList = mysql_query($query_GetInjuryList, $connection) or die(mysql_error());
			$row_GetInjuryList = mysql_fetch_assoc($GetInjuryList);
			$totalRows_GetInjuryList = mysql_num_rows($GetInjuryList);
			if ($totalRows_GetInjuryList > 0){
		?>
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
            <thead>
            <tr>
            <th style="text-align:left" width="125"><?php echo $l_injuried_list;?></th><th width="100"><?php echo $l_Position;?></th><th width="20"><?php echo $l_Condition;?></th><th><?php echo $l_Injury;?></th>
            </tr>
            </thead>
            <tbody>
            <?php do { 
               if($row_GetWaiver['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
            ?>
            <tr>
                <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetInjuryList['Number']; ?>"><?php echo $row_GetInjuryList['Name']; ?></a></td>
                <td width="100">
               <?php 
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosC'] == "True" || $row_GetInjuryList['PosC'] == "Vrai"){
                    echo $l_C;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosLW'] == "True" || $row_GetInjuryList['PosLW'] == "Vrai"){
                    echo $l_LW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosRW'] == "True" || $row_GetInjuryList['PosRW'] == "Vrai"){
                    echo $l_RW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosD'] == "True" || $row_GetInjuryList['PosD'] == "Vrai"){
                    echo $l_D;
                } else { echo "&nbsp;"; }
                echo '</div>';
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosG'] == "True" || $row_GetInjuryList['PosG'] == "Vrai"){
                    echo $l_G;
                } else { echo "&nbsp;"; }
                echo '</div>';
                ?>
                </td>
                <td align=center><?php echo $row_GetInjuryList['CON'];?></td>
                <td align="center"><?php echo $row_GetInjuryList['Injury'];?></td>
            </tr>
            <?php } while ($row_GetInjuryList = mysql_fetch_assoc($GetInjuryList));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_injured.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
            </table>
        <?php } } ?>

        
        <?php } else { 
		
			$query_GetInjuryList = "select Name, Number, Injury, CON, PosC,	PosLW, PosRW, PosD, 'False' as PosG from players where Injury <> ''  UNION ALL SELECT Name, Number, Injury, CON, 'False' as PosC,	'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG from goalies where Injury <> '' ORDER BY CON asc LIMIT 0,5";
			$GetInjuryList = mysql_query($query_GetInjuryList, $connection) or die(mysql_error());
			$row_GetInjuryList = mysql_fetch_assoc($GetInjuryList);
			$totalRows_GetInjuryList = mysql_num_rows($GetInjuryList);
			if ($totalRows_GetInjuryList > 0){
		?>
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
            <thead>
            <tr>
            <th style="text-align:left" width="125"><?php echo $l_injuried_list;?></th><th width="100"><?php echo $l_Position;?></th><th width="20"><?php echo $l_Condition;?></th><th><?php echo $l_Injury;?></th>
            </tr>
            </thead>
            <tbody>
            <?php do { 
               if($row_GetInjuryList['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
            ?>
            <tr>
                <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetInjuryList['Number']; ?>"><?php echo $row_GetInjuryList['Name']; ?></a></td>
                <td width="100">
               <?php 
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosC'] == "True" || $row_GetInjuryList['PosC'] == "Vrai"){
                    echo $l_C;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosLW'] == "True" || $row_GetInjuryList['PosLW'] == "Vrai"){
                    echo $l_LW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosRW'] == "True" || $row_GetInjuryList['PosRW'] == "Vrai"){
                    echo $l_RW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosD'] == "True" || $row_GetInjuryList['PosD'] == "Vrai"){
                    echo $l_D;
                } else { echo "&nbsp;"; }
                echo '</div>';
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetInjuryList['PosG'] == "True" || $row_GetInjuryList['PosG'] == "Vrai"){
                    echo $l_G;
                } else { echo "&nbsp;"; }
                echo '</div>';
                ?>
                </td>
                <td align=center><?php echo $row_GetInjuryList['CON'];?></td>
                <td align="center"><?php echo $row_GetInjuryList['Injury'];?></td>
            </tr>
            <?php } while ($row_GetInjuryList = mysql_fetch_assoc($GetInjuryList));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_injured.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
            </table>
        <?php 
			}
			} 
		 ?>
        
            
        <?php if ($totalRows_GetTB > 0){?>
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
            <thead>
            <tr>
            <th style="text-align:left" width="125"><?php echo $l_TradingBlock;?></th><th width="100"><?php echo $l_Position;?></th><th width="50"><?php echo $l_Team;?></th><th width="50"><?php echo $l_overall;?></th><th><?php echo $l_Salary;?></th>
            </tr>
            </thead>
            <tbody>
            <?php do { 
               if($row_GetTB['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
            ?>
            <tr>
                <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetTB['PNumber']; ?>"><?php echo $row_GetTB['Name']; ?></a></td>
                <td width="100">
               <?php 
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetTB['PosC'] == "True" || $row_GetTB['PosC'] == "Vrai"){
                    echo $l_C;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetTB['PosLW'] == "True" || $row_GetTB['PosLW'] == "Vrai"){
                    echo $l_LW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetTB['PosRW'] == "True" || $row_GetTB['PosRW'] == "Vrai"){
                    echo $l_RW;
                } else { echo "&nbsp;"; }
                        echo '</div>';
                        echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetTB['PosD'] == "True" || $row_GetTB['PosD'] == "Vrai"){
                    echo $l_D;
                } else { echo "&nbsp;"; }
                echo '</div>';
                echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                if ($row_GetTB['PosG'] == "True" || $row_GetTB['PosG'] == "Vrai"){
                    echo $l_G;
                } else { echo "&nbsp;"; }
                echo '</div>';
                ?>
                </td>
                <td align="center"><a href="pro_roster.php?team=<?php echo $row_GetTB['PNumber']; ?>"><?php echo $row_GetTB['Abbre']; ?></a></td>
                <td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetTB['Overall']; } else { echo "-"; } ?></td>
                <td align="center">$<?php echo number_format($row_GetTB['Salary1'],0); ?></td>
            </tr>
            <?php } while ($row_GetTB = mysql_fetch_assoc($GetTB));  ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="trading_block.php"><?php echo $l_moredetails;?></a></td>
                </tr>
            </tfoot>
            </table>
            <?php } ?>
            <?php 
			if ($_SESSION['JuniorLeague'] == 'False'){ 
			?>
            <div id="divscrollerhead"><?php echo $l_TransactionsLog;?></div>
            <div id="divscroller">
             <?php 
			if($totalRows_GetTransactions > 0){
                do { 
					$query_GetTranTeam = sprintf("SELECT Name FROM proteam WHERE Number='%s'",$row_GetTransactions['Team']);
					$GetTranTeam = mysql_query($query_GetTranTeam, $connection) or die(mysql_error());
					$row_GetTranTeam = mysql_fetch_assoc($GetTranTeam);
					$totalRows_GetTranTeam = mysql_num_rows($GetTranTeam);
					if($totalRows_GetTranTeam > 0){
						$tmpTranTeam = $row_GetTranTeam['Name'];
					} else {
						$tmpTranTeam = $row_GetTransactions['Team']; 
					}	
					if($row_GetTransactions['PosG']=="True"){
						$tmpTargetFile="goalie.php";
					} else {
						$tmpTargetFile="player.php";
					}
                    echo '['.$row_GetTransactions['DateCreated'].'] - <a href="'.$tmpTargetFile.'?player='.$row_GetTransactions['Number'].'">'.$row_GetTransactions['Name'].'</a> - '.$row_GetTransactions['Type'].' - $'.number_format(($row_GetTransactions['Salary1']+$row_GetTransactions['Salary2']+$row_GetTransactions['Salary3']+$row_GetTransactions['Salary4']+$row_GetTransactions['Salary5']+$row_GetTransactions['Salary6']+$row_GetTransactions['Salary7']+$row_GetTransactions['Salary8']+$row_GetTransactions['Salary9']+$row_GetTransactions['Salary10']),0).' - '.$row_GetTransactions['Contract'].' years / '.$tmpTranTeam.'.<br />';
                } while ($row_GetTransactions = mysql_fetch_assoc($GetTransactions));  
			}
            ?>
            </div>
        <?php } ?>
            <div id="divscrollerhead"><?php echo $l_TeamHistory;?></div>
                <div id="divscroller">
                <?php 
                if($totalRows_GetTransactionHistory > 0){
                    do { 
                        echo $row_GetTransactionHistory['Value']."<br />";
                    } while ($row_GetTransactionHistory = mysql_fetch_assoc($GetTransactionHistory)); 
                }
                ?>
                </div>
           </div>   
           <br clear="all" />     
        </div>
        
        <div id="tabs-2"><h3><?php echo $l_ProLeagueOverview;?></h3>
        
        <?php 
		if ($_SESSION['current_SeasonTypeID'] > 0){ 
		?>
        
        <div style="font-size:9px; float:right; padding:15px 16px 2px 0px;";">
            X = <?php echo $l_Playoff_E;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Y = <?php echo $l_Playoff_Y;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Z = <?php echo $l_Playoff_Z;?>
        </div>
        <div style="float:left;padding-bottom:2px"><h3><?php echo $l_nav_standings;?></h3></div>
        <br clear="all" />
       <?php
		$query_GetDivision = sprintf("SELECT proteam.Division, proteam.Conference FROM proteam GROUP BY proteam.Division ORDER BY proteam.Conference, proteam.Division ");
		$GetDivision = mysql_query($query_GetDivision, $connection) or die(mysql_error());
		$row_GetDivision = mysql_fetch_assoc($GetDivision);
		$totalRows_GetDivision = mysql_num_rows($GetDivision);
		
		if($totalRows_GetDivision <= 4){
			$tmpBoxCount = 3;
			$tmpFieldWidth = ' style="width:440px;"';
		} else {
			$tmpBoxCount = 4;
			$tmpFieldWidth = "";
		}
		
		$tmpLastConference="";
		$tmpLastDivision="";
		$tmpDivCount=1;
		if($row_GetConfigInfo['DivisionLeader'] == 'True'){
			$tmpDivisionLeaderSQL = " DivisionLeader desc, ";
		} else {
			$tmpDivisionLeaderSQL = "";
		}
		
		do { 
			$tmpLastConference=$row_GetDivision['Conference'];
			$query_GetConfStandings = sprintf("SELECT  proteamstandings.PowerRanking, proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.DivisionLeader, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number, proteam.LogoTiny FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' AND proteam.Division='%s' ORDER BY proteamstandings.StandingPlayoffTitle desc, ".$tmpDivisionLeaderSQL." proteamstandings.Point desc, proteamstandings.W desc, proteamstandings.PowerRanking asc", $_SESSION['current_SeasonID'], $row_GetDivision['Division']);
			$GetConfStandings = mysql_query($query_GetConfStandings, $connection) or die(mysql_error());
			$row_GetConfStandings = mysql_fetch_assoc($GetConfStandings);
		?>
        <div class="fieldsettile" <?php echo $tmpFieldWidth;?>>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th colspan="2"><?php echo $row_GetDivision['Division'];?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php 
			do { 	
			$TotalWins = $row_GetConfStandings['W'] + $row_GetConfStandings['OTW'] + $row_GetConfStandings['SOW'];
			$TotalOT = $row_GetConfStandings['OTL'] + $row_GetConfStandings['SOL'];
			?>
           <tr>
           	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetConfStandings['LogoTiny']; ?>"></img></td>
            <td style="vertical-align:middle;"><?php 
			if($row_GetConfStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Z" && $row_GetConfStandings['PowerRanking']==1){
				echo "P -";
			}
			?><a href="pro_roster.php?team=<?php echo $row_GetConfStandings['Number']; ?>"><?php echo $row_GetConfStandings['City']." ".$row_GetConfStandings['Name'];?></a></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['GP'];?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $TotalWins;?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['L'];?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $TotalOT;?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['Point'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetConfStandings = mysql_fetch_assoc($GetConfStandings)); ?>
        </tbody> 
        </table>
        </div>
        <?php 
			$tmpDivCount=$tmpDivCount+1;
		if($tmpDivCount==$tmpBoxCount){echo "<br clear='all' />";}
		} while ($row_GetDivision = mysql_fetch_assoc($GetDivision));
		
		} else {
		
			echo "<h3 style='padding-left:6px;'>";
			if($PlayoffRound == 1){ 
				echo $l_Playoff_R1; 
				$tmpDivWidth="215px";
				$tmpImageWidth = "50px;";
			} else if($PlayoffRound == 2){ 
				echo $l_Playoff_R2; 
				$tmpDivWidth="215px";
				$tmpImageWidth = "50px;";
			} else if($PlayoffRound == 3){ 
				echo $l_Playoff_R3; 
				$tmpDivWidth="450px";
				$tmpImageWidth = "";
			} else if($PlayoffRound == 4){ 
				echo $l_Playoff_R4; 
				$tmpDivWidth="450px";
				$tmpImageWidth = "";
			} 
			echo "</h3><br clear='all' />";
			
			$query_GetRounds = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $PlayoffRound);
			$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
			$row_GetRounds = mysql_fetch_assoc($GetRounds);
			$totalRows_GetRounds = mysql_num_rows($GetRounds);
			
			$i=0;
			$teamA = array();
			$teamB = array();
			$teamCurrent = array();
			$Round = array();
			$tmpRound=0;
			$tmpSkipFirst=0;
			$tmpRound = 0;
			$CurrentRound = 0;
			$tmpSkipFirst=0;
			$FinalsCount=0;
			
			do {
				if($tmpRound != $row_GetRounds['Round']){$tmpRound = $row_GetRounds['Round'];}
			
				if (! in_array($row_GetRounds['VisitorTeam'], $teamA)) { 	
					if (! in_array($row_GetRounds['HomeTeam'], $teamA)) { 
						$i = $i + 1;
						$Round[$i] = $row_GetRounds['Round'];
						$teamA[$i] = $row_GetRounds['VisitorTeam']; 
						$teamB[$i] = $row_GetRounds['HomeTeam'];
					}
				}
			} while ($row_GetRounds = mysql_fetch_assoc($GetRounds)); 
			
			$tmpRound = 0;
			$boxCount=0;
			for( $j = 1; $j <= $i; $j++ )
			{
				$query_GetTeamA = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $teamA[$j]);
				$GetTeamA = mysql_query($query_GetTeamA, $connection) or die(mysql_error());
				$row_GetTeamA = mysql_fetch_assoc($GetTeamA);
				$totalRows_GetTeamA = mysql_num_rows($GetTeamA);
			
				
				$query_GetTeamB = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $teamB[$j]);
				$GetTeamB = mysql_query($query_GetTeamB, $connection) or die(mysql_error());
				$row_GetTeamB = mysql_fetch_assoc($GetTeamB);
				$totalRows_GetTeamB = mysql_num_rows($GetTeamB);
				
				
				$query_GetW = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND (VisitorTeam=%s OR HomeTeam=%s) AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $teamA[$j], $teamA[$j], $PlayoffRound);
				$GetW = mysql_query($query_GetW, $connection) or die(mysql_error());
				$row_GetW = mysql_fetch_assoc($GetW);
				$totalRows_GetW = mysql_num_rows($GetW);
				
				$tmpTS1=0;
				$tmpTS2=0;
				$k = 0;
				do{
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
								
					if($row_GetW['VisitorScore'] > $row_GetW['HomeScore']){$lastWin = "Visitor"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
					if($row_GetW['VisitorScore'] < $row_GetW['HomeScore']){$lastWin = "Home"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
				} while ($row_GetW = mysql_fetch_assoc($GetW)); 
				
		if($CurrentRound != $teamA[$j]){
			$CurrentRound = $teamA[$j];


			$tmpSeriesTitle="&nbsp;".$l_Leads."&nbsp;";
			echo '<div class="fieldsetright" style="width:'.$tmpDivWidth.'">';
			echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
			
			if($tmpTS1 > $tmpTS2){				
				if($tmpTS1==4){$tmpSeriesTitle="&nbsp;".$l_Over."&nbsp;";}
				echo '<thead><tr><th colspan=3>'.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].',&nbsp;'.$tmpTS1.'&nbsp;-&nbsp;'.$tmpTS2.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";

			} else if($tmpTS1 < $tmpTS2){
				if($tmpTS2==4){$tmpSeriesTitle="&nbsp;".$l_Over."&nbsp;";}
				echo '<thead><tr><th colspan=3>'.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].',&nbsp;'.$tmpTS2.'&nbsp;-&nbsp;'.$tmpTS1.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
			} else {
				$tmpSeriesTitle="&nbsp;".$l_Tied."&nbsp;";
				echo '<thead><tr><th colspan=3>'.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].',&nbsp;'.$tmpTS1.'&nbsp;-&nbsp;'.$tmpTS2.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";
			}
			echo '</tr>';
			echo '<tr><td align=center colspan=3 style="line-height:16px; padding:2px;">';
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
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "&#8226;&nbsp;<a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."' target='_blank'>".$l_Game."&nbsp;".$tmpGameCount."</a>&nbsp; ";
			}
			
		} 
		echo '</td></tr></tbody></table></div>';
			
		$boxCount=$boxCount+1;
		if($boxCount==4){
			$boxCount=0;
			echo '<br clear="all" />';
		}
		}
	}
?>
        
        <br clear="all" /><br clear="all" />
        
        <h3 style="padding-left:6px;"><?php echo $l_nav_playerstats;?></h3>
     	<div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_ScoreLeader;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetTop5['Number']; ?>"><?php echo $row_GetTop5['Name'];?></a></td>
            <td align="center"><a href="pro_roster.php?team=<?php echo $row_GetTop5['Team']; ?>"><?php echo $row_GetTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetTop5['ProGP'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProG'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProA'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProPoint'];?></td>
            <td align="center"><?php echo $row_GetTop5['ProPlusMinus'];?></td>
          </tr>
          <?php } while ($row_GetTop5 = mysql_fetch_assoc($GetTop5)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        <div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_GoalieLeader;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="goalie.php?player=<?php echo $row_GetTop2['Number']; ?>"><?php echo $row_GetTop2['Name'];?></a></td>
            <td align="center"><a href="pro_roster.php?team=<?php echo $row_GetTop2['Team']; ?>"><?php echo $row_GetTop2['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetTop2['ProGP'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProW'];?></td>
            <td align="center"><?php echo $row_GetTop2['ProL'] + $row_GetTop2['ProOTL'];?></td>
            <td align="center"><?php if ($row_GetTop2['ProMinPlay'] > 0 && $row_GetTop2['ProGA'] > 0){ echo number_format(($row_GetTop2['ProGA'] / minutes($row_GetTop2['ProMinPlay']))*60,2);  } else { echo "0"; } ?></td>
            <td align="center"><?php if ($row_GetTop2['ProMinPlay'] > 0 && $row_GetTop2['ProSA'] > 0){ echo number_format(($row_GetTop2['ProSA'] - $row_GetTop2['ProGA']) / $row_GetTop2['ProSA'],3); } else { echo "0"; } ?></td>
          </tr>
          <?php } while ($row_GetTop2 = mysql_fetch_assoc($GetTop2)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        <div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_RookieLeaders;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetRookieTop5['Number']; ?>"><?php echo $row_GetRookieTop5['Name'];?></a></td>
            <td align="center"><a href="pro_roster.php?team=<?php echo $row_GetRookieTop5['Team']; ?>"><?php echo $row_GetRookieTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetRookieTop5['ProGP'];?></td>
            <td align="center"><?php echo $row_GetRookieTop5['ProG'];?></td>
            <td align="center"><?php echo $row_GetRookieTop5['ProA'];?></td>
            <td align="center"><?php echo $row_GetRookieTop5['ProPoint'];?></td>
            <td align="center"><?php echo $row_GetRookieTop5['ProPlusMinus'];?></td>
          </tr>
          <?php } while ($row_GetRookieTop5 = mysql_fetch_assoc($GetRookieTop5)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
         <br clear="all" /><br clear="all" />
         
        <?php 
		if ($_SESSION['current_SeasonTypeID'] > 0){ 
		?>
        <div class="fieldsettile">
        <h3><?php echo $l_HotTeams;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_Top10PowerRankings;?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php 
			$query_GetPowerStandings = sprintf("SELECT proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.PowerRanking, ((proteamstandings.W + proteamstandings.OTW + proteamstandings.SOW) / proteamstandings.GP) as WinPercentage, (proteamstandings.GF / proteamstandings.GA) as GoalPercentage, proteam.LogoSmall, proteam.LogoTiny, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' ORDER BY proteamstandings.PowerRanking asc limit 0,10", $_SESSION['current_SeasonID']);
			$GetPowerStandings = mysql_query($query_GetPowerStandings, $connection) or die(mysql_error());
			$row_GetPowerStandings = mysql_fetch_assoc($GetPowerStandings);
			do { 	
			$TotalWins = $row_GetPowerStandings['W'] + $row_GetPowerStandings['OTW'] + $row_GetPowerStandings['SOW'];
			$TotalOT = $row_GetPowerStandings['OTL'] + $row_GetPowerStandings['SOL'];
			?>
           <tr>
            <td><a href="pro_roster.php?team=<?php echo $row_GetPowerStandings['Number']; ?>"><?php echo $row_GetPowerStandings['City']." ".$row_GetPowerStandings['Name'];?></a></td>
            <td align="center"><?php echo $row_GetPowerStandings['GP'];?></td>
            <td align="center"><?php echo $TotalWins;?></td>
            <td align="center"><?php echo $row_GetPowerStandings['L'];?></td>
            <td align="center"><?php echo $TotalOT;?></td>
            <td align="center"><?php echo $row_GetPowerStandings['Point'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetPowerStandings = mysql_fetch_assoc($GetPowerStandings)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_power_rankings.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>    
        </div>
        
        
        <div class="fieldsettile">
        <h3><?php echo $l_HotPlayers;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th>Point Streaks</th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_MO_D;?>"><?php echo $l_MO;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetHotTop5['Number']; ?>"><?php echo $row_GetHotTop5['Name'];?></a></td>
            <td align="center"><a href="pro_roster.php?team=<?php echo $row_GetHotTop5['Team']; ?>"><?php echo $row_GetHotTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetHotTop5['Streak'];?></td>
            <td align="center"><?php echo $row_GetHotTop5['GameInRowWithAGoal'];?></td>
            <td align="center"><?php echo $row_GetHotTop5['GameInRowWithAPoint']-$row_GetHotTop5['GameInRowWithAGoal'];?></td>
            <td align="center"><?php echo $row_GetHotTop5['GameInRowWithAPoint'];?></td>
            <td align="center"><?php echo $row_GetHotTop5['MO'];?></td>
          </tr>
          <?php } while ($row_GetHotTop5 = mysql_fetch_assoc($GetHotTop5)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        
        <div class="fieldsettile">
        <h3><?php echo $l_StarGame;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_Players;?></th>
            <th><?php echo $l_1st;?></th>
            <th><?php echo $l_2nd;?></th>
            <th><?php echo $l_3rd;?></th>
            <th><?php echo $l_Score;?></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	
				if($row_GetStars['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
			?>
           <tr>
            <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetStars['Number']; ?>"><?php echo $row_GetStars['Name'];?></a></td>
            <td align="center"><?php echo $row_GetStars['Star1']; ?></td>
            <td align="center"><?php echo $row_GetStars['Star2']; ?></td>
            <td align="center"><?php echo $row_GetStars['Star3']; ?></td>
            <td align="center"><?php echo $row_GetStars['TotalStars']; ?></td>
          </tr>
          <?php } while ($row_GetStars = mysql_fetch_assoc($GetStars)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="pro_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        <br clear="all" />
        
        <?php if($totalRows_GetPlayerWeek > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarWeek;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetPlayerWeek['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerWeek['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerWeek['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetPlayerWeek['stat1']."-".$row_GetPlayerWeek['stat2']."-".$row_GetPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerWeek['stat4'] > 0){ echo number_format(($row_GetPlayerWeek['stat5'] / minutes($row_GetPlayerWeek['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerWeek['stat4'] > 0){ echo number_format($row_GetPlayerWeek['stat6'] / ($row_GetPlayerWeek['stat5'] + $row_GetPlayerWeek['stat6']),3); } else { echo "0"; } ?></strong>
            <?php } else { 
			$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerWeek['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerWeek['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetPlayerWeek['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetPlayerWeek['stat6']." ".$l_Games;?> </strong><br>
            <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;"><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetPlayerWeek['LogoSmall']."' id='star1' name='star1' border=0>";?></td>
        </tr>
        </table>
        </div>
        <?php } if($totalRows_GetPlayerMonth > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarMonth;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetPlayerMonth['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerMonth['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerMonth['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetPlayerMonth['stat1']."-".$row_GetPlayerMonth['stat2']."-".$row_GetPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerMonth['stat4'] > 0){ echo number_format(($row_GetPlayerMonth['stat5'] / minutes($row_GetPlayerMonth['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerMonth['stat4'] > 0){ echo number_format($row_GetPlayerMonth['stat6'] / ($row_GetPlayerMonth['stat5'] + $row_GetPlayerMonth['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerMonth['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerMonth['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetPlayerMonth['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetPlayerMonth['stat6']." ".$l_Games;?> </strong><br>
             <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;"><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetPlayerMonth['LogoSmall']."' id='star2' name='star2' border=0>";?></td>
        </tr>
        </table>
        </div>
        <?php } if($totalRows_GetPlayerSeason > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarSeason;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetPlayerSeason['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerSeason['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetPlayerSeason['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerSeason['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetPlayerSeason['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerSeason['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetPlayerSeason['stat1']."-".$row_GetPlayerSeason['stat2']."-".$row_GetPlayerSeason['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerSeason['stat4'] > 0){ echo number_format(($row_GetPlayerSeason['stat5'] / minutes($row_GetPlayerSeason['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetPlayerSeason['stat4'] > 0){ echo number_format($row_GetPlayerSeason['stat6'] / ($row_GetPlayerSeason['stat5'] + $row_GetPlayerSeason['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerSeason['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetPlayerSeason['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetPlayerSeason['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetPlayerSeason['Number']; ?>" style="font-size:14px"><?php echo $row_GetPlayerSeason['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetPlayerSeason['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetPlayerSeason['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetPlayerSeason['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetPlayerSeason['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetPlayerSeason['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetPlayerSeason['stat6']." ".$l_Games;?> </strong><br>
             <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;"><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetPlayerSeason['LogoSmall']."' id='star3' name='star3' border=0>";?></td>
        </tr>
        </table>
        </div>
        <?php }} ?>
        
        <br clear="all" />
        </div>
        
<?php if($UserFarmleage == 'True'){

$query_limit_GetFarmTop5 = sprintf("SELECT players.Team, farmteam.Abbre, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, SUM(playerstats.FarmStar1 + playerstats.FarmStar2 + playerstats.FarmStar3) as FarmStar, SUM(playerstats.FarmPlusMinus) as FarmPlusMinus, SUM(playerstats.FarmPim) as FarmPim, playerstats.Name, SUM( playerstats.FarmPoint ) AS FarmPoint, SUM( playerstats.FarmGP ) AS FarmGP, SUM( playerstats.FarmG ) AS FarmG, SUM( playerstats.FarmA ) AS FarmA, players.Number
FROM playerstats, players, farmteam
WHERE playerstats.Season_ID=%s
AND farmteam.Number=players.Team
AND players.Name = playerstats.Name
AND FarmGP > 0
GROUP BY playerstats.Name
ORDER BY FarmPoint DESC , FarmG DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetFarmTop5 = mysql_query($query_limit_GetFarmTop5, $connection) or die(mysql_error());
$row_GetFarmTop5 = mysql_fetch_assoc($GetFarmTop5);

$query_GetFarmTop2 = sprintf("SELECT goalies.Team, farmteam.Abbre, SUM(goaliestats.FarmStar1 + goaliestats.FarmStar2 + goaliestats.FarmStar3) as FarmStar, goalies.Team, SUM(goaliestats.FarmGA) as FarmGA, SUM(goaliestats.FarmSA) as FarmSA, SUM(goaliestats.FarmW) as FarmW, SUM(goaliestats.FarmGP) as FarmGP, goaliestats.Name, SUM( goaliestats.FarmShutouts ) AS FarmShutouts, SUM( goaliestats.FarmOTL ) AS FarmOTL, SUM( goaliestats.FarmMinPlay ) AS FarmMinPlay, SUM( goaliestats.FarmGP ) AS FarmGP, SUM( goaliestats.FarmL ) AS FarmL, goalies.Number
FROM goaliestats, goalies, farmteam
WHERE goalies.Name=goaliestats.Name 
AND farmteam.Number=goalies.Team 
AND goaliestats.Season_ID = %s  
AND FarmGP > 0
GROUP BY goaliestats.Name
ORDER BY goaliestats.FarmW desc, FarmGP desc
LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetFarmTop2 = mysql_query($query_GetFarmTop2, $connection) or die(mysql_error());
$row_GetFarmTop2 = mysql_fetch_assoc($GetFarmTop2);

$query_limit_GetFarmRookieTop5 = sprintf("SELECT players.Team, farmteam.Abbre, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, SUM(playerstats.FarmStar1 + playerstats.FarmStar2 + playerstats.FarmStar3) as FarmStar, SUM(playerstats.FarmPlusMinus) as FarmPlusMinus, SUM(playerstats.FarmPim) as FarmPim, playerstats.Name, SUM( playerstats.FarmPoint ) AS FarmPoint, SUM( playerstats.FarmGP ) AS FarmGP, SUM( playerstats.FarmG ) AS FarmG, SUM( playerstats.FarmA ) AS FarmA, players.Number
FROM playerstats, players, farmteam
WHERE playerstats.Season_ID=%s
AND farmteam.Number=players.Team
AND players.Name = playerstats.Name
AND (players.Rookie = 'True' or players.Rookie = 'Vrai')
AND FarmGP > 0
GROUP BY playerstats.Name
ORDER BY FarmPoint DESC , FarmG DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetFarmRookieTop5 = mysql_query($query_limit_GetFarmRookieTop5, $connection) or die(mysql_error());
$row_GetFarmRookieTop5 = mysql_fetch_assoc($GetFarmRookieTop5);

$query_limit_GetFarmHotTop5 = sprintf("SELECT players.Name, players.MO, players.Team, farmteam.Abbre, playerstats.GameInRowWithAPoint, playerstats.GameInRowWithAGoal, SUM(playerstats.GameInRowWithAPoint + playerstats.GameInRowWithAGoal) as Streak, players.Number
FROM playerstats, players, farmteam
WHERE playerstats.Season_ID=%s
AND farmteam.Number=players.Team
AND players.Name = playerstats.Name
AND FarmGP > 0
AND players.Status1<=1
GROUP BY playerstats.Name
ORDER BY Streak DESC , GameInRowWithAGoal DESC LIMIT  0,10", $_SESSION['current_SeasonID']);
$GetFarmHotTop5 = mysql_query($query_limit_GetFarmHotTop5, $connection) or die(mysql_error());
$row_GetFarmHotTop5 = mysql_fetch_assoc($GetFarmHotTop5);

$query_limit_GetFarmStars = sprintf("SELECT 'False' as PosG, playerstats.Name, SUM(playerstats.FarmStar1) as Star1, SUM(playerstats.FarmStar2) as Star2, SUM(playerstats.FarmStar3) as Star3, ((SUM(playerstats.FarmStar1)*3)+(SUM(playerstats.FarmStar2)*2)+(SUM(playerstats.FarmStar3)*1)) as TotalStars, playerstats.Number
FROM playerstats, farmteam
WHERE playerstats.Season_ID=%s
AND farmteam.Number=playerstats.Team
AND playerstats.FarmGP > 0
GROUP BY playerstats.Name
UNION ALL
SELECT 'True' as PosG, goaliestats.Name, SUM(goaliestats.FarmStar1) as Star1, SUM(goaliestats.FarmStar2) as Star2, SUM(goaliestats.FarmStar3) as Star3, ((SUM(goaliestats.FarmStar1)*3)+(SUM(goaliestats.FarmStar2)*2)+(SUM(goaliestats.FarmStar3)*1)) as TotalStars, goaliestats.Number
FROM goaliestats, farmteam
WHERE goaliestats.Season_ID=%s
AND farmteam.Number=goaliestats.Team
AND goaliestats.FarmGP > 0
GROUP BY goaliestats.Name
ORDER BY TotalStars DESC, Star1 DESC , Star2 DESC, Star3 DESC LIMIT  0,10", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetFarmStars = mysql_query($query_limit_GetFarmStars, $connection) or die(mysql_error());
$row_GetFarmStars = mysql_fetch_assoc($GetFarmStars);

$query_GetFarmPlayerWeek = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower7Days, FarmG as stat1, FarmA as stat2,FarmPoint as stat3, FarmPim as stat4, FarmPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower7Days, FarmW as stat1, FarmL as stat2,FarmOTL as stat3, FarmMinPlay as stat4, FarmGA as stat5, FarmSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY FarmStarPower7Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetFarmPlayerWeek = mysql_query($query_GetFarmPlayerWeek, $connection) or die(mysql_error());
$row_GetFarmPlayerWeek = mysql_fetch_assoc($GetFarmPlayerWeek);
$totalRows_GetFarmPlayerWeek = mysql_num_rows($GetFarmPlayerWeek);

$query_GetFarmPlayerMonth = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower30Days, FarmG as stat1, FarmA as stat2,FarmPoint as stat3, FarmPim as stat4, FarmPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPower30Days, FarmW as stat1, FarmL as stat2,FarmOTL as stat3, FarmMinPlay as stat4, FarmGA as stat5, FarmSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY FarmStarPower30Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetFarmPlayerMonth = mysql_query($query_GetFarmPlayerMonth, $connection) or die(mysql_error());
$row_GetFarmPlayerMonth = mysql_fetch_assoc($GetFarmPlayerMonth);
$totalRows_GetFarmPlayerMonth = mysql_num_rows($GetFarmPlayerMonth);

$query_GetFarmPlayerSeason = sprintf("SELECT 'False' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPowerYear, FarmG as stat1, FarmA as stat2,FarmPoint as stat3, FarmPim as stat4, FarmPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.FarmStarPowerYear, FarmW as stat1, FarmL as stat2,FarmOTL as stat3, FarmMinPlay as stat4, FarmGA as stat5, FarmSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY FarmStarPowerYear DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetFarmPlayerSeason = mysql_query($query_GetFarmPlayerSeason, $connection) or die(mysql_error());
$row_GetFarmPlayerSeason = mysql_fetch_assoc($GetFarmPlayerSeason);
$totalRows_GetFarmPlayerSeason = mysql_num_rows($GetFarmPlayerSeason);

?>    
        <div id="tabs-3"><h3><?php echo $l_FarmLeagueOverview;?></h3>
        
       <?php 
		if ($_SESSION['current_SeasonTypeID'] > 0){ 
		?>
        
        <div style="font-size:9px; float:right; padding:15px 16px 2px 0px;";">
            X = <?php echo $l_Playoff_E;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Y = <?php echo $l_Playoff_Y;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Z = <?php echo $l_Playoff_Z;?>
        </div>
        <div style="float:left;padding-bottom:2px"><h3><?php echo $l_nav_standings;?></h3></div>
        <br clear="all" />
       <?php
		$query_GetDivision = sprintf("SELECT farmteam.Division, farmteam.Conference FROM farmteam GROUP BY farmteam.Division ORDER BY farmteam.Conference, farmteam.Division ");
		$GetDivision = mysql_query($query_GetDivision, $connection) or die(mysql_error());
		$row_GetDivision = mysql_fetch_assoc($GetDivision);
		
		$totalRows_GetDivision = mysql_num_rows($GetDivision);
		
		if($totalRows_GetDivision <= 4){
			$tmpBoxCount = 3;
			$tmpFieldWidth = ' style="width:440px;"';
		} else {
			$tmpBoxCount = 4;
			$tmpFieldWidth = "";
		}
		
		$tmpLastConference="";
		$tmpLastDivision="";
		$tmpDivCount=1;
		if($row_GetConfigInfo['DivisionLeader'] == 'True'){
			$tmpDivisionLeaderSQL = " DivisionLeader desc, ";
		} else {
			$tmpDivisionLeaderSQL = "";
		}
		
		do { 
			$tmpLastConference=$row_GetDivision['Conference'];
			$query_GetConfStandings = sprintf("SELECT  farmteamstandings.PowerRanking, farmteamstandings.Last10SOW, farmteamstandings.Last10SOL, farmteamstandings.Last10OTW, farmteamstandings.Last10OTL, farmteamstandings.Last10W, farmteamstandings.Last10L, farmteamstandings.Last10T, farmteamstandings.Streak, farmteamstandings.StandingPlayoffTitle, farmteamstandings.DivisionLeader, farmteamstandings.HomeW, farmteamstandings.HomeL, farmteamstandings.HomeSOL, farmteamstandings.HomeSOW, farmteamstandings.HomeOTL, farmteamstandings.HomeOTW, farmteamstandings.GP, farmteamstandings.W, farmteamstandings.Point, farmteamstandings.L, farmteamstandings.OTW, farmteamstandings.GF, farmteamstandings.GA, farmteamstandings.OTL, farmteamstandings.SOW, farmteamstandings.SOL, farmteam.Division, farmteam.Conference, farmteam.Name, farmteam.City, farmteam.Number, farmteam.LogoTiny FROM farmteamstandings, farmteam WHERE farmteam.Number=farmteamstandings.Number AND farmteamstandings.Season_ID='%s' AND farmteam.Division='%s' ORDER BY farmteamstandings.StandingPlayoffTitle desc, ".$tmpDivisionLeaderSQL." farmteamstandings.Point desc, farmteamstandings.W desc, farmteamstandings.PowerRanking asc", $_SESSION['current_SeasonID'], $row_GetDivision['Division']);
			$GetConfStandings = mysql_query($query_GetConfStandings, $connection) or die(mysql_error());
			$row_GetConfStandings = mysql_fetch_assoc($GetConfStandings);
		?>
        <div class="fieldsettile" <?php echo $tmpFieldWidth;?>>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th colspan="2"><?php echo $row_GetDivision['Division'];?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php 
			do { 	
			$TotalWins = $row_GetConfStandings['W'] + $row_GetConfStandings['OTW'] + $row_GetConfStandings['SOW'];
			$TotalOT = $row_GetConfStandings['OTL'] + $row_GetConfStandings['SOL'];
			?>
           <tr>
           	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetConfStandings['LogoTiny']; ?>"></img></td>
            <td style="vertical-align:middle;"><?php 
			if($row_GetConfStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetConfStandings['StandingPlayoffTitle']=="Z" && $row_GetConfStandings['PowerRanking']==1){
				echo "P -";
			}
			?><a href="farm_roster.php?team=<?php echo $row_GetConfStandings['Number']; ?>"><?php echo $row_GetConfStandings['City']." ".$row_GetConfStandings['Name'];?></a></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['GP'];?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $TotalWins;?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['L'];?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $TotalOT;?></td>
            <td align="center" style="vertical-align:middle;"><?php echo $row_GetConfStandings['Point'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetConfStandings = mysql_fetch_assoc($GetConfStandings)); ?>
        </tbody> 
        </table>
        </div>
        <?php 
		$tmpDivCount=$tmpDivCount+1;
		if($tmpDivCount==$tmpBoxCount){echo "<br clear='all' />";}
		} while ($row_GetDivision = mysql_fetch_assoc($GetDivision));
		
		} else {
		
			echo "<h3 style='padding-left:6px;'>";
			if($PlayoffRound == 1){ 
				echo $l_Playoff_R1; 
				$tmpDivWidth="215px";
				$tmpImageWidth = "50px;";
			} else if($PlayoffRound == 2){ 
				echo $l_Playoff_R2; 
				$tmpDivWidth="215px";
				$tmpImageWidth = "50px;";
			} else if($PlayoffRound == 3){ 
				echo $l_Playoff_R3; 
				$tmpDivWidth="450px";
				$tmpImageWidth = "";
			} else if($PlayoffRound == 4){ 
				echo $l_Playoff_R4; 
				$tmpDivWidth="450px";
				$tmpImageWidth = "";
			} 
			echo "</h3><br clear='all' />";
			
			$query_GetRounds = sprintf("SELECT * FROM farmschedule WHERE Season_ID=%s AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $PlayoffRound);
			$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
			$row_GetRounds = mysql_fetch_assoc($GetRounds);
			$totalRows_GetRounds = mysql_num_rows($GetRounds);
			
			$i=0;
			$teamA = array();
			$teamB = array();
			$teamCurrent = array();
			$Round = array();
			$tmpRound=0;
			$tmpSkipFirst=0;
			$tmpRound = 0;
			$CurrentRound = 0;
			$tmpSkipFirst=0;
			$FinalsCount=0;
			
			do {
				if($tmpRound != $row_GetRounds['Round']){$tmpRound = $row_GetRounds['Round'];}
			
				if (! in_array($row_GetRounds['VisitorTeam'], $teamA)) { 	
					if (! in_array($row_GetRounds['HomeTeam'], $teamA)) { 
						$i = $i + 1;
						$Round[$i] = $row_GetRounds['Round'];
						$teamA[$i] = $row_GetRounds['VisitorTeam']; 
						$teamB[$i] = $row_GetRounds['HomeTeam'];
					}
				}
			} while ($row_GetRounds = mysql_fetch_assoc($GetRounds)); 
			
			$tmpRound = 0;
			$boxCount=1;
			for( $j = 1; $j <= $i; $j++ )
			{
				$query_GetTeamA = sprintf("SELECT LogoSmall, City, Name, Number FROM farmteam WHERE Number=%s", $teamA[$j]);
				$GetTeamA = mysql_query($query_GetTeamA, $connection) or die(mysql_error());
				$row_GetTeamA = mysql_fetch_assoc($GetTeamA);
				$totalRows_GetTeamA = mysql_num_rows($GetTeamA);
			
				
				$query_GetTeamB = sprintf("SELECT LogoSmall, City, Name, Number FROM farmteam WHERE Number=%s", $teamB[$j]);
				$GetTeamB = mysql_query($query_GetTeamB, $connection) or die(mysql_error());
				$row_GetTeamB = mysql_fetch_assoc($GetTeamB);
				$totalRows_GetTeamB = mysql_num_rows($GetTeamB);
				
				
				$query_GetW = sprintf("SELECT * FROM farmschedule WHERE Season_ID=%s AND (VisitorTeam=%s OR HomeTeam=%s) AND Round=%s ORDER BY Day asc", $_SESSION['current_SeasonID'], $teamA[$j], $teamA[$j], $PlayoffRound);
				$GetW = mysql_query($query_GetW, $connection) or die(mysql_error());
				$row_GetW = mysql_fetch_assoc($GetW);
				$totalRows_GetW = mysql_num_rows($GetW);
				
				$tmpTS1=0;
				$tmpTS2=0;
				$k = 0;
				do{
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
								
					if($row_GetW['VisitorScore'] > $row_GetW['HomeScore']){$lastWin = "Visitor"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
					if($row_GetW['VisitorScore'] < $row_GetW['HomeScore']){$lastWin = "Home"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
				} while ($row_GetW = mysql_fetch_assoc($GetW)); 
				
		if($CurrentRound != $teamA[$j]){
			$CurrentRound = $teamA[$j];


			$tmpSeriesTitle="&nbsp;".$l_Leads."&nbsp;";
			echo '<div class="fieldsetright" style="width:'.$tmpDivWidth.'">';
			echo '<table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
			
			if($tmpTS1 > $tmpTS2){				
				if($tmpTS1==4){$tmpSeriesTitle="&nbsp;".$l_Over."	&nbsp;";}
				echo '<thead><tr><th colspan=3>'.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].',&nbsp;'.$tmpTS1.'&nbsp;-&nbsp;'.$tmpTS2.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";

			} else if($tmpTS1 < $tmpTS2){
				if($tmpTS2==4){$tmpSeriesTitle="&nbsp;".$l_Over."&nbsp;";}
				echo '<thead><tr><th colspan=3>'.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].',&nbsp;'.$tmpTS2.'&nbsp;-&nbsp;'.$tmpTS1.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
			} else {
				$tmpSeriesTitle="&nbsp;".$l_Tied."&nbsp;";
				echo '<thead><tr><th colspan=3>'.$row_GetTeamA['City'].'&nbsp;'.$row_GetTeamA['Name'].'&nbsp;'.$tmpSeriesTitle.' '.$row_GetTeamB['City'].'&nbsp;'.$row_GetTeamB['Name'].',&nbsp;'.$tmpTS1.'&nbsp;-&nbsp;'.$tmpTS2.'</th></tr></thead><tbody>';
				echo "<td style='vertical-align:middle;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' id='TeamPhoto1' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></a></td>";
				echo "<td style='vertical-align:middle; height:70px;' width='50%'><div align=center><a href='farm_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$_SESSION['current_SeasonID']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' id='TeamPhoto2' style='width:".$tmpImageWidth."' border=0 alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></a></td>";
			}
			echo '</tr>';
			echo '<tr><td align=center colspan=3 style="line-height:16px; padding:2px;">';
		}
		
		$tmpGameCount = 0;
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
	
			if($GameLink==""){
				$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Farm'ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
				$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
				$row_GetLink = mysql_fetch_assoc($GetLink);
				$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
				$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
				$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetW['Number'].".html";
			}
			if($row_GetW['Play']=="True" || $row_GetW['Play']=="Vrai"){
				echo "&#8226;&nbsp;<a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."' target='_blank'>".$l_Game."&nbsp;".$tmpGameCount."</a>&nbsp; ";
			}
			
		} 
		echo '</td></tr></tbody></table></div>';
			
		
		}
	}
?>
        
        <br clear="all" /><br clear="all" />
        
        
        <h3 style="padding-left:6px;"><?php echo $l_nav_playerstats;?></h3>
     	<div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_ScoreLeader;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetFarmTop5['Number']; ?>"><?php echo $row_GetFarmTop5['Name'];?></a></td>
            <td align="center"><a href="farm_roster.php?team=<?php echo $row_GetFarmTop5['Team']; ?>"><?php echo $row_GetFarmTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmGP'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmG'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmA'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmPoint'];?></td>
            <td align="center"><?php echo $row_GetFarmTop5['FarmPlusMinus'];?></td>
          </tr>
          <?php } while ($row_GetFarmTop5 = mysql_fetch_assoc($GetFarmTop5)); ?>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot> 
        </table>
        </div>
        
        <div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_GoalieLeader;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="goalie.php?player=<?php echo $row_GetFarmTop2['Number']; ?>"><?php echo $row_GetFarmTop2['Name'];?></a></td>
            <td align="center"><a href="farm_roster.php?team=<?php echo $row_GetFarmTop2['Team']; ?>"><?php echo $row_GetFarmTop2['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmGP'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmW'];?></td>
            <td align="center"><?php echo $row_GetFarmTop2['FarmL'] + $row_GetFarmTop2['FarmOTL'];?></td>
            <td align="center"><?php if ($row_GetFarmTop2['FarmMinPlay'] > 0 && $row_GetFarmTop2['FarmGA'] > 0){ echo number_format(($row_GetFarmTop2['FarmGA'] / minutes($row_GetFarmTop2['FarmMinPlay']))*60,2);  } else { echo "0"; } ?></td>
            <td align="center"><?php if ($row_GetFarmTop2['FarmMinPlay'] > 0 && $row_GetFarmTop2['FarmSA'] > 0){ echo number_format(($row_GetFarmTop2['FarmSA'] - $row_GetFarmTop2['FarmGA']) / $row_GetFarmTop2['FarmSA'],3); } else { echo "0"; } ?></td>
          </tr>
          <?php } while ($row_GetFarmTop2 = mysql_fetch_assoc($GetFarmTop2)); ?>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot> 
        </table>
        </div>
        
        <div class="fieldsettile">
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_RookieLeaders;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetFarmRookieTop5['Number']; ?>"><?php echo $row_GetFarmRookieTop5['Name'];?></a></td>
            <td align="center"><a href="farm_roster.php?team=<?php echo $row_GetFarmRookieTop5['Team']; ?>"><?php echo $row_GetFarmRookieTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetFarmRookieTop5['FarmGP'];?></td>
            <td align="center"><?php echo $row_GetFarmRookieTop5['FarmG'];?></td>
            <td align="center"><?php echo $row_GetFarmRookieTop5['FarmA'];?></td>
            <td align="center"><?php echo $row_GetFarmRookieTop5['FarmPoint'];?></td>
            <td align="center"><?php echo $row_GetFarmRookieTop5['FarmPlusMinus'];?></td>
          </tr>
          <?php } while ($row_GetFarmRookieTop5 = mysql_fetch_assoc($GetFarmRookieTop5)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        <br clear="all" /><br clear="all" />
		<?php 
		if ($_SESSION['current_SeasonTypeID'] > 0){ 
		?>

        <div class="fieldsettile">
        <h3><?php echo $l_HotTeams;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_Top10;?></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_Desc;?>"><?php echo $l_W;?></a></th>	
            <th><a title="<?php echo $l_L_Desc;?>"><?php echo $l_L;?></a></th>	
            <th><a title="<?php echo $l_OTL_Desc;?>"><?php echo $l_OTL;?></a></th>
            <th><a title="<?php echo $l_Pts_Desc;?>"><?php echo $l_Pts;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php 
			$query_GetPowerStandings = sprintf("SELECT farmteamstandings.Last10SOW, farmteamstandings.Last10SOL, farmteamstandings.Last10OTW, farmteamstandings.Last10OTL, farmteamstandings.Last10W, farmteamstandings.Last10L, farmteamstandings.Last10T, farmteamstandings.Streak, farmteamstandings.StandingPlayoffTitle, farmteamstandings.PowerRanking, ((farmteamstandings.W + farmteamstandings.OTW + farmteamstandings.SOW) / farmteamstandings.GP) as WinPercentage, (farmteamstandings.GF / farmteamstandings.GA) as GoalPercentage, farmteam.LogoSmall, farmteam.LogoTiny, farmteamstandings.HomeW, farmteamstandings.HomeL, farmteamstandings.HomeSOL, farmteamstandings.HomeSOW, farmteamstandings.HomeOTL, farmteamstandings.HomeOTW, farmteamstandings.GP, farmteamstandings.W, farmteamstandings.Point, farmteamstandings.L, farmteamstandings.OTW, farmteamstandings.GF, farmteamstandings.GA, farmteamstandings.OTL, farmteamstandings.SOW, farmteamstandings.SOL, farmteam.Division, farmteam.Conference, farmteam.Name, farmteam.City, farmteam.Number FROM farmteamstandings, farmteam WHERE farmteam.Number=farmteamstandings.Number AND farmteamstandings.Season_ID='%s' ORDER BY farmteamstandings.PowerRanking asc limit 0,10", $_SESSION['current_SeasonID']);
			$GetPowerStandings = mysql_query($query_GetPowerStandings, $connection) or die(mysql_error());
			$row_GetPowerStandings = mysql_fetch_assoc($GetPowerStandings);
			do { 	
			$TotalWins = $row_GetPowerStandings['W'] + $row_GetPowerStandings['OTW'] + $row_GetPowerStandings['SOW'];
			$TotalOT = $row_GetPowerStandings['OTL'] + $row_GetPowerStandings['SOL'];
			?>
           <tr>
            <td><a href="farm_roster.php?team=<?php echo $row_GetPowerStandings['Number']; ?>"><?php echo $row_GetPowerStandings['City']." ".$row_GetPowerStandings['Name'];?></a></td>
            <td align="center"><?php echo $row_GetPowerStandings['GP'];?></td>
            <td align="center"><?php echo $TotalWins;?></td>
            <td align="center"><?php echo $row_GetPowerStandings['L'];?></td>
            <td align="center"><?php echo $TotalOT;?></td>
            <td align="center"><?php echo $row_GetPowerStandings['Point'];?></td>
          </tr>
          <?php 
		  	$TotalWins = 0;
			$TotalOT = 0;
		  	} while ($row_GetPowerStandings = mysql_fetch_assoc($GetPowerStandings)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_power_rankings.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>    
        </div>
        
        
        <div class="fieldsettile">
        <h3><?php echo $l_HotPlayers;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_PointStreaks;?></th>
            <th><a title="<?php echo $l_nav_team;?>"><?php echo $l_team;?></a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_MO_D;?>"><?php echo $l_MO;?></a></th>	
        </tr>
        </thead>
        <tbody>
        <?php do { 	?>
           <tr>
            <td><a href="player.php?player=<?php echo $row_GetFarmHotTop5['Number']; ?>"><?php echo $row_GetFarmHotTop5['Name'];?></a></td>
            <td align="center"><a href="farm_roster.php?team=<?php echo $row_GetFarmHotTop5['Team']; ?>"><?php echo $row_GetFarmHotTop5['Abbre'];?></a></td>
            <td align="center"><?php echo $row_GetFarmHotTop5['Streak'];?></td>
            <td align="center"><?php echo $row_GetFarmHotTop5['GameInRowWithAGoal'];?></td>
            <td align="center"><?php echo $row_GetFarmHotTop5['GameInRowWithAPoint']-$row_GetFarmHotTop5['GameInRowWithAGoal'];?></td>
            <td align="center"><?php echo $row_GetFarmHotTop5['GameInRowWithAPoint'];?></td>
            <td align="center"><?php echo $row_GetFarmHotTop5['MO'];?></td>
          </tr>
          <?php } while ($row_GetFarmHotTop5 = mysql_fetch_assoc($GetFarmHotTop5)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
        
        <div class="fieldsettile">
        <h3><?php echo $l_StarGame;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_Players;?></th>
            <th><?php echo $l_1st;?>1st</th>
            <th><?php echo $l_2nd;?></th>
            <th><?php echo $l_3rd;?></th>
            <th><?php echo $l_Score;?></th>
        </tr>
        </thead>
        <tbody>
        <?php do { 	
				if($row_GetFarmStars['PosG'] == "True"){
                    $tmpTargetFile="goalie.php";
                } else {
                    $tmpTargetFile="player.php";
                }
			?>
           <tr>
            <td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetFarmStars['Number']; ?>"><?php echo $row_GetFarmStars['Name'];?></a></td>
            <td align="center"><?php echo $row_GetFarmStars['Star1']; ?></td>
            <td align="center"><?php echo $row_GetFarmStars['Star2']; ?></td>
            <td align="center"><?php echo $row_GetFarmStars['Star3']; ?></td>
            <td align="center"><?php echo $row_GetFarmStars['TotalStars']; ?></td>
          </tr>
          <?php } while ($row_GetFarmStars = mysql_fetch_assoc($GetFarmStars)); ?>
        </tbody> 
        <tfoot>
        	<tr>
            	<td colspan="7" style="text-align:right;"> &#8250;&#8250;&nbsp;<a href="farm_leaders.php"><?php echo $l_moredetails;?></a></td>
            </tr>
        </tfoot>
        </table>
        </div>
		<?php } ?>
        <br clear="all" />
        
        
        <?php if($totalRows_GetFarmPlayerWeek > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarWeek;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetFarmPlayerWeek['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetFarmPlayerWeek['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerWeek['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerWeek['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerWeek['stat1']."-".$row_GetFarmPlayerWeek['stat2']."-".$row_GetFarmPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerWeek['stat4'] > 0){ echo number_format(($row_GetFarmPlayerWeek['stat5'] / minutes($row_GetFarmPlayerWeek['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerWeek['stat4'] > 0){ echo number_format($row_GetFarmPlayerWeek['stat6'] / ($row_GetFarmPlayerWeek['stat5'] + $row_GetFarmPlayerWeek['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			 $query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetFarmPlayerWeek['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerWeek['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetFarmPlayerWeek['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerWeek['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetFarmPlayerWeek['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerWeek['stat6']." ".$l_Games;?> </strong><br>
            <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;"><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetFarmPlayerWeek['LogoSmall']."' id='star4' name='star4' border=0>";?></td>
        </tr>
        </table>
        </div>
        <?php } if($totalRows_GetFarmPlayerMonth > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarMonth;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			<?php if($row_GetFarmPlayerMonth['PosG'] == "True"){ 
			$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetFarmPlayerMonth['Number']);
			$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerMonth['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerMonth['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerMonth['stat1']."-".$row_GetFarmPlayerMonth['stat2']."-".$row_GetFarmPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerMonth['stat4'] > 0){ echo number_format(($row_GetFarmPlayerMonth['stat5'] / minutes($row_GetFarmPlayerMonth['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerMonth['stat4'] > 0){ echo number_format($row_GetFarmPlayerMonth['stat6'] / ($row_GetFarmPlayerMonth['stat5'] + $row_GetFarmPlayerMonth['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			 $query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetFarmPlayerMonth['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			 ?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerMonth['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="player.php?player=<?php echo $row_GetFarmPlayerMonth['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerMonth['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetFarmPlayerMonth['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerMonth['stat6']." ".$l_Games;?> </strong><br>
              <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;"><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetFarmPlayerMonth['LogoSmall']."' id='star5' name='star5' border=0>";?></td>
        </tr>
        </table>
        </div>        
        <?php } if($totalRows_GetFarmPlayerSeason > 0){ ?>
        <div class="fieldsettile">
        <h3><?php echo $l_StarSeason;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr>
   			 <?php if($row_GetFarmPlayerSeason['PosG'] == "True"){ 
			 $query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetFarmPlayerSeason['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			 ?>
             <td height="98"><a href="goalie.php?player=<?php echo $row_GetFarmPlayerSeason['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerSeason['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			 <a href="goalie.php?player=<?php echo $row_GetFarmPlayerSeason['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerSeason['Name']; ?></a>
             <br><br><?php echo $l_Record;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerSeason['stat1']."-".$row_GetFarmPlayerSeason['stat2']."-".$row_GetFarmPlayerSeason['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_AVE_D."'>".$l_AVE."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerSeason['stat4'] > 0){ echo number_format(($row_GetFarmPlayerSeason['stat5'] / minutes($row_GetFarmPlayerSeason['stat4']))*60,2);  } else { echo "0"; } ?></strong>
             <br><br><?php echo "<a title='".$l_PCT_D."'>".$l_PCT."</a>";?>:&nbsp;<strong><?php if ($row_GetFarmPlayerSeason['stat4'] > 0){ echo number_format($row_GetFarmPlayerSeason['stat6'] / ($row_GetFarmPlayerSeason['stat5'] + $row_GetFarmPlayerSeason['stat6']),3); } else { echo "0"; } ?></strong>
             <?php } else { 
			 $query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetFarmPlayerSeason['Number']);
			 $GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
			 $row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			$totalRows_GetPhoto = mysql_num_rows($GetPhoto);
			 ?>
             <td height="98"><a href="player.php?player=<?php echo $row_GetFarmPlayerSeason['Number']; ?>"><img src="<?php echo imageExists("/image/players/".$row_GetPhoto['Photo']); ?>" border="0" align="left" width="65" height="98" alt="<?php echo $row_GetFarmPlayerSeason['Name']; ?>"/></a></td>
             <td bgcolor="#FFCC00" align="center" style="vertical-align:top; padding:10px 0px 10px 0px;">
			  <a href="player.php?player=<?php echo $row_GetFarmPlayerSeason['Number']; ?>" style="font-size:14px"><?php echo $row_GetFarmPlayerSeason['Name']; ?></a>
             <br><br><?php echo "<a title='".$l_G_D."'>".$l_G."</a>";?>:<strong><?php echo $row_GetFarmPlayerSeason['stat1'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_A_D."'>".$l_A."</a>";?>:<strong><?php echo $row_GetFarmPlayerSeason['stat2'];?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_P_D."'>".$l_P."</a>";?>:<strong><?php echo $row_GetFarmPlayerSeason['stat3'];?></strong>
             <br><br><?php echo "<a title='".$l_P_M_D."'>".$l_P_M."</a>";?>:<strong><?php echo $row_GetFarmPlayerSeason['stat5'] ?></strong>&nbsp;&nbsp;<?php echo "<a title='".$l_PIM_D."'>".$l_PIM."</a>";?>:<strong><?php echo $row_GetFarmPlayerSeason['stat4'] ?></strong>
             <br><br><?php echo $l_Streak_D;?>:&nbsp;<strong><?php echo $row_GetFarmPlayerSeason['stat6']." ".$l_Games;?> </strong><br>
            <?php } ?>
             </td>
             <td style="padding-right:5px; width:80px;" ><?php echo "<img height='70' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetFarmPlayerSeason['LogoSmall']."' id='star6' name='star6' border=0>";?></td>
        </tr>
        </table>
        </div>
        <?php } ?>
        
        <br clear="all" />
        </div>
		<?php } ?>
        
    </div>
        
 	</section>
</article>
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
