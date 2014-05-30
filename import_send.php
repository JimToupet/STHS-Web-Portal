<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("facebook/facebook.php") ?>
<?php include("twitter/twitteroauth.php") ?>
<?php include("includes/shorturl.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Check Messages";
	$l_Inbox  = "Inbox";
	$l_SentItems  = "Sent Items";
	$l_CreateNewMessage  = "Create New Message";
	$l_Date  = "Date";
	$l_Title  = "Title";
	$l_Sender = "Sender";
	$l_Viewed = "Viewed";
	$l_Empty = "Empty In Box";
	$l_Change  = "CHANGE SEASON";
	$l_Day = "Day";
	$l_Game = "Game";
	$l_VisitorTeam = "Visitor Team";
	$l_Score = "Score";
	$l_HomeTeam = "Home Team";
	$l_Overtime = "Overtime";
	$l_ShootOut = "Shoot Out";
	$l_Link = "Game Details";
	$l_PreviousDay   = "Previous Day Games";
	$l_GameDay = "Games for day";
	$l_NextGame = "Next Day Games";
	$l_First = "First";
	$l_Previous = "Previous";
	$l_Next = "Next";
	$l_Last = "Last";
	$l_ScoreGoalie = "Goal Scorers / Goalies";
	$l_Teams = "Teams";
	$l_NoGames = "No games available";
	$l_team1 = "Team 1";
	$l_team2 = "Team 2";
	$l_team1Approve = "Status";
	$l_team2Approve = "Status";
	$l_CommishApprove = "Commish Approval";
	$l_eliminated = "Eliminated from the playoffs";
	$l_PlayoffSeries = "Playoff Series";
	$l_overview = "";
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
	$l_Tonight  = "NEXT GAME TONIGHT";
	$l_LiveFrom = "Live from the";
	$l_LastLoginDate = "Signed In";
	$l_LastUploadDate = "Lines Uploaded";
	$l_TransactionHistory = "Histoire";
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
	$l_TransactionsLog = "Transactions Log";
	$l_TeamHistory = "STHS Team History";
	$l_score = "Score";
	$l_GeneralManager = "General Manager";
	$l_Participation = "Participation";
	$l_GeneralManagerDetails = "General Manager Details";
	$l_moredetails = "more details";
	$l_Approval = "Approval";
	$l_TradeOffers = "Trade Offers";
	$l_UFAFreeAgents = "UFA";
	$l_RFAFreeAgents = "RFA";
	$l_FreeAgentOffers = "Free Agent Offers";
	$l_Status = "Status";
	$l_TotalSalary = "Total Salary";
	$l_Contract = "Contract";
	$l_CurrentActivities = "Current Activities";
	$l_Messages = "Messages";
	$l_Date = "Date";
	$l_LeaveDate = "Leave Date";
	$l_ReturnDate = "Return Date";
	$l_StarMonth = "STAR OF THE MONTH";
	$l_StarWeek = "STAR OF THE WEEK";
	$l_Game = "Game";
	$l_READMORE="READ MORE";
	$l_Close="Close Me!";
	$l_GamePreview = "Game Preview & Match-up";
	$l_Leads=" leads ";
	$l_Over=" over ";
	$l_Playoff_R1 = "Conference Quarter-Finals"; 
	$l_Playoff_R2 = "Conference Semi-Finals"; 
	$l_Playoff_R3 = "Conference Finals"; 
	$l_Playoff_R4 = "Finals"; 
	$l_Games="Games";
	$l_FutureConsiderations="Future Considerations";
	$l_Record="Record";
	$l_ScoreLeader = "Scoring Leaders";
	$l_GoalieLeader = "Goalie Leaders";
	$l_GP = "GP";
	$l_Years = "years";
	$l_EX_P = "Pro experience";
	$l_EX_F = "Farm experience";
	$l_players = "players";
	$l_TotRoster = "Total Roster";
	$l_FFacts = "Franchise Facts";
	$l_Overagers = "Overagers";
	$l_AveAge = "Average Age";
	$l_AveHT = "Average Height";
	$l_AveWT = "Average Weight";
	$l_ActiveOf = "active of";
	break; 

case 'fr': 
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
	$l_Playoff_E = "assur&eacute; d&Acirc;€™une place en s&eacute;ries";
	$l_Playoff_Y = "assur&eacute; du titre de division";
	$l_Playoff_P = "assur&eacute; du titre de league";
	$l_DivisionLeader = "M&egrave;neurs de la Division";
	$l_LinesLastLoaded = "Lignes t&eacute;l&eacute;chargement";
	$l_HomeRecord = "Domicile ";
	$l_VisitorRecord = "Ext&eacute;rieur";
	$l_L10 = "10 Derniers";
	$l_Last10 = "Dernieres 10 parties";
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
	$l_TeamAwards = "Troph&eacute;es d'&eacute;quipe";
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
	$l_TransactionsLog = "Transactions";
	$l_TeamHistory = "Historique de la ligue STHS";
	$l_score = "Total";
	$l_GeneralManager = "Directeur G&eacute;n&eacute;rale";
	$l_Participation = "Participation";
	$l_GeneralManagerDetails = "D&eacute;tails a Directeur G&eacute;n&eacute;rale";
	$l_moredetails = "D&eacute;tails";
	$l_Approval = "Approval";
	$l_TradeOffers = "Offres du &eacute;changes";
	$l_UFAFreeAgents = "UFA";
	$l_RFAFreeAgents = "RFA";
	$l_FreeAgentOffers = "Offres aux Agents libres";
	$l_Status = "Status";
	$l_TotalSalary = "Salaire en Totalit&eacute;";
	$l_Contract = "Contract";
	$l_CurrentActivities = "Activit&eacute; Courante";
	$l_Messages = "Messages";
	$l_Date = "Date";
	$l_LeaveDate = "Date que vous Quitter";
	$l_ReturnDate = "Date de Retour";
	$l_StarMonth = "&Eacute;toile du mois";
	$l_StarWeek = "&Eacute;toile de la semaine";
	$l_Game = "Match";
	$l_READMORE="Lire plus";
	$l_Close="Fermer";
	$l_GamePreview = "Pr&eacute;vision de jeu";
	$l_Leads="avance";
	$l_Over="au dessus";
	$l_Tied = "soir&eacute;e";
	$l_Playoff_R1 = "Division Semi-Final Conference"; 
	$l_Playoff_R2 = "S&eacute;rie Demi-finale de conf&eacute;rence"; 
	$l_Playoff_R3 = "Semi-Final Series"; 
	$l_Playoff_R4 = "Finals"; 
	$l_Games="Parties";
	$l_FutureConsiderations="Futures consid&eacute;rations";
	$l_Record="Record";
	$l_ScoreLeader = "Meilleur Pointeur";
	$l_GoalieLeader = "Meilleur Gardien";
	$l_GP = "PJ";
	$l_Years = "ann&eacute;es";
	$l_EX_P = "Exp&eacute;rience Pro";
	$l_EX_F = "Exp&eacute;rience Farm";
	$l_players = "joueurs";
	$l_TotRoster = "Alignement total";
	$l_FFacts = "Faits de &eacute;quipe";
	$l_Overagers = "Joueurs d'impact";
	$l_AveAge = "&Acirc;ge moyen";
	$l_AveHT = "Taille moyen";
	$l_AveWT = "Poids moyen";
	$l_ActiveOf = "active de";
	$l_PageTitle = "Bo&icircte de r&eacute;ception";
	$l_Inbox  = "Bo&icircte de r&eacute;ception";
	$l_SentItems  = "Messages envoy&eacute;s";
	$l_CreateNewMessage  = "&Eacute;crire un message";
	$l_Date  = "Date";
	$l_Title  = "Objet";
	$l_Sender = "De";
	$l_Viewed = "Vu";
	$l_Empty = "Vider";
	$l_Change  = "Changer de saison";
	$l_Day = "Jour";
	$l_Game = "Partie";
	$l_VisitorTeam = "Visiteur";
	$l_Score = "Score";
	$l_HomeTeam = "Domicile";
	$l_Overtime = "Prolongation";
	$l_ShootOut = "Fusillade";
	$l_Link = "Game Details";
	$l_PreviousDay   = "Parties jour pr&eacute;c&eacute;dent";
	$l_GameDay = "Jour";
	$l_NextGame = "Parties jour suivant";
	$l_First = "Premiere";
	$l_Previous = "Pr&eacute;c&eacute;dent";
	$l_Next = "Prochaine";
	$l_Last = "Derni&egrave;re";
	$l_ScoreGoalie = "Marqueurs de but / Gardiens";
	$l_Teams = "&eacute;quipes";
	$l_NoGames = $l_None;
	break; 
	
} 

$url = $_SESSION['DomainName'].'/pro_scores.php';
$farmurl = $_SESSION['DomainName'].'/farm_scores.php';

$ID_GetAction = "0";
if (isset($_GET['action'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

set_time_limit(1500);
global $CurrentSeasonID;
$CurrentSeasonID = $_SESSION['current_SeasonID'];
global $tmp_DomainName;
global $tmp_current_Season;
global $tmp_current_Folder;
global $tmp_siteName;
global $FieldName;
global $RowName;
global $RowActive;
global $LastRow;
global $RowSkip;
global $SQLAction;
global $ActiveSeason;
global $tmp_hostname_simhl;
global $tmp_database_simhl;
global $tmp_username_simhl;
global $tmp_password_simhl;
global $tmp_simhl;
global $TMP_GameNumber;
global $TMP_Link;
global $TMP_VisitorTeam;
global $TMP_VisitorTeamScore;
global $TMP_VisitorTeamGoal;
global $TMP_VisitorTeamGoaler;
global $TMP_HomeTeam;
global $TMP_HomeTeamScore;
global $TMP_HomeTeamGoal;
global $TMP_HomeTeamGoaler;
global $TMP_GameResultForward;
 

$tmp_DomainName = $_SESSION['DomainName'];
$tmp_current_Season = $_SESSION['current_Season'];
$tmp_siteName = $_SESSION['SiteName'];

$query_GetInfo = sprintf("SELECT LastModifiedLeagueFile, LeagueFile, GameResultForward, ConsecutiveDays FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$TMP_GameResultForward=$row_GetInfo['GameResultForward'];
$TMP_ConsecutiveDays=$row_GetInfo['ConsecutiveDays'];

$query_GetActiveSeason = "SELECT seasons.S_ID, seasons.Folder FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$ActiveSeason=$row_GetActiveSeason['S_ID'];
$tmp_current_Folder = $row_GetActiveSeason['Folder'];
mysql_free_result($GetActiveSeason);

$tmpemail = str_replace("&#64;", "@", $_SESSION['site_Email']);

if($TMP_GameResultForward==1){

	//Send todays results for PRO TEAMS;
	
	$query_GetLastDay = "select schedule.Day, schedule.Round FROM schedule WHERE (schedule.Play='TRUE' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	
	if($totalRows_GetLastDay > 0 ){
		$Day_ID = $row_GetLastDay['Day'] - ($TMP_ConsecutiveDays-1);
		$NextDay = $row_GetLastDay['Day'];
		
		if($totalRows_GetLastDay > 0 ){
			$query_GetDayResults = sprintf("select Overtime, ShootOut, S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Pro' as GameType FROM schedule WHERE Day>=%s AND Day<=%s AND Season_ID=%s ORDER BY Day asc", $Day_ID, $NextDay, $_SESSION['current_SeasonID']);
		} else {
			$query_GetDayResults = sprintf("select Overtime, ShootOut, S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Pro' as GameType FROM schedule WHERE Day=0 AND Season_ID=%s ORDER BY Day asc", $_SESSION['current_SeasonID']);
		}
		$GetDayResults = mysql_query($query_GetDayResults, $connection) or die(mysql_error());
		$row_GetDayResults = mysql_fetch_assoc($GetDayResults);
		$totalRows_GetDayResults = mysql_num_rows($GetDayResults);
		
		if ($_SESSION['current_FarmLeague'] == 'True'){
			if($totalRows_GetLastDay > 0 ){
				$query_GetDayFarmResults = sprintf("select Overtime, ShootOut, S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Farm' as GameType FROM farmschedule WHERE Day>=%s AND Day<=%s AND Season_ID=%s ORDER BY Day asc", $Day_ID, $NextDay, $_SESSION['current_SeasonID']);
			} else {
				$query_GetDayFarmResults = sprintf("select Overtime, ShootOut, S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Farm' as GameType FROM farmschedule WHERE Day=0 AND Season_ID=%s ORDER BY Day asc", $_SESSION['current_SeasonID']);
			}
			$GetDayFarmResults = mysql_query($query_GetDayFarmResults, $connection) or die(mysql_error());
			$row_GetDayFarmResults = mysql_fetch_assoc($GetDayFarmResults);
			$totalRows_GetDayFarmResults = mysql_num_rows($GetDayFarmResults);
		}
		
		$query_GetTeamMenu = "SELECT Name, City, Number, Email, LogoSmall, oauth_provider, access_token, post_game_results  FROM proteam ORDER BY City";
		$GetTeamMenu = mysql_query($query_GetTeamMenu, $connection) or die(mysql_error());
		$row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu);
		$totalRows_GetTeamMenu = mysql_num_rows($GetTeamMenu);
		
		do {
			//echo $_SESSION['current_SeasonID']." ".$Day_ID." ".$NextDay." ".$row_GetTeamMenu['Number']."<br><br>";
			
			$query_GetMail = sprintf("SELECT COUNT(chat.id) as TotalUnread FROM chat WHERE chat.to='%s' AND chat.recd=0", str_replace(" ","_",$row_GetTeamMenu['Name']));
			$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
			$row_GetMail = mysql_fetch_assoc($GetMail);
			$totalRows_GetMail = mysql_num_rows($GetMail);
				
			$query_GetNote = sprintf("SELECT COUNT(ID) as TotalUnread FROM teamhistory WHERE Team=%s AND Viewed='False'", $row_GetTeamMenu['Number']);
			$GetNote = mysql_query($query_GetNote, $connection) or die(mysql_error());
			$row_GetNote = mysql_fetch_assoc($GetNote);
			$totalRows_GetNote = mysql_num_rows($GetNote);
			
			$query_GetNextGame = sprintf("SELECT schedule.Day, schedule.VisitorTeam, schedule.HomeTeam, schedule.S_ID FROM schedule WHERE (schedule.VisitorTeam='%s' OR schedule.HomeTeam='%s') AND schedule.Season_ID=%s AND schedule.Day >= %s AND (schedule.Play='False' OR schedule.Play='Faux') GROUP BY  schedule.Day asc Limit 0,1", $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number'], $_SESSION['current_SeasonID'], $Day_ID);
			$GetNextGame = mysql_query($query_GetNextGame, $connection) or die(mysql_error());
			$row_GetNextGame = mysql_fetch_assoc($GetNextGame);
			$totalRows_GetNextGame = mysql_num_rows($GetNextGame);	
		 
			if($totalRows_GetNextGame > 0){	
				$tmpNextGame = '<br clear="all" /><table cellspacing="0" border="0" width="100%"><thead>';
				
				if ( $row_GetNextGame['VisitorTeam'] == $row_GetTeamMenu['Number']) {
					$NextGameTeam = $row_GetNextGame['HomeTeam'];
					$NextGameType = 1;
				}
				if ( $row_GetNextGame['HomeTeam'] == $row_GetTeamMenu['Number']) {
					$NextGameTeam = $row_GetNextGame['VisitorTeam'];
					$NextGameType = 0;
				}
			
				$query_GetNextGameTeam = sprintf("SELECT p.*, T.LastModifiedLines, T.City, T.Name, T.Arena, T.LogoSmall FROM proteam as T, proteamstandings as p WHERE T.Number='%s' AND T.Number=p.Number AND p.Season_ID=%s", $NextGameTeam, $_SESSION['current_SeasonID']);
				$GetNextGameTeam = mysql_query($query_GetNextGameTeam, $connection) or die(mysql_error());
				$row_GetNextGameTeam = mysql_fetch_assoc($GetNextGameTeam);
				$totalRows_GameTeam = mysql_num_rows($GetNextGameTeam);	
			
				$query_GetHomeW = sprintf("SELECT P.*, T.LastModifiedLines FROM proteam as T, proteamstandings as P WHERE P.Number='%s' AND T.Number=P.Number AND P.Season_ID=%s", $row_GetTeamMenu['Number'], $_SESSION['current_SeasonID']);
				$GetHomeW = mysql_query($query_GetHomeW, $connection) or die(mysql_error());
				$row_GetHomeW = mysql_fetch_assoc($GetHomeW);
				
				if ($NextGameType == 0){
					$query_GetArena = sprintf("SELECT Arena FROM proteam WHERE Number=%s", $row_GetTeamMenu['Number']);
					$GetArena = mysql_query($query_GetArena, $connection) or die(mysql_error());
					$row_GetArenam = mysql_fetch_assoc($GetArena);
				}
				
				$tmpNextGame = $tmpNextGame.'<tr><th colspan=2><h3>'.$l_NextGameIn.' '.number_format($row_GetNextGame[Day]-$Day_ID,0).' '.$l_days.' '.$l_LiveFrom." ".$row_GetArenam['Arena'].'</th></tr></thead>';
			
				if ($NextGameType == 1){
					$VisitWins = ($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW']) - ($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW']);
					$VisitLoss = $row_GetHomeW['L'] - $row_GetHomeW['HomeL'];
					$VisitOT= ($row_GetHomeW['OTL']+$row_GetHomeW['SOL']) - ($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL']);
					
					$tmpNextGame = $tmpNextGame."<tbody><tr><td width='50%' style='padding:5px;'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamMenu['LogoSmall']."' vspace='6' hspace='6' style='max-width: 120px; float:left;'  id='TeamPhoto1' border=0 alt='".$row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name']."'>";
					$tmpNextGame = $tmpNextGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."</td></tr></table>";
					$tmpNextGame = $tmpNextGame."</td><td style='padding:5px;' width='50%'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><a href='".$_SESSION['DomainName']."/pro_roster.php?team=".$row_GetNextGameTeam['Number']."'>";
					$tmpNextGame = $tmpNextGame."<img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='max-width: 120px; float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$row_GetNextGameTeam['Name']."'></a>";
					$tmpNextGame = $tmpNextGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW'])."-".$row_GetNextGameTeam['HomeL']."-".($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."</td></tr></table>";
					$tmpNextGame = $tmpNextGame."</td></tr></tbody>";
				} else {
					$VisitWins = ($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW']) - ($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW']);
					$VisitLoss = $row_GetNextGameTeam['L'] - $row_GetNextGameTeam['HomeL'];
					$VisitOT= ($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL']) - ($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL']);
					$tmpNextGame = $tmpNextGame."<tbody><tr><td style='padding:5px;' width='50%'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center>";
					$tmpNextGame = $tmpNextGame."<a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='max-width: 120px; float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$row_GetNextGameTeam['Name']."'></a></div>";
					$tmpNextGame = $tmpNextGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."</td></tr></table>";
					$tmpNextGame = $tmpNextGame."</td><td width='50%' style='padding:5px;'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamMenu['LogoSmall']."' vspace='6' hspace='6' style='max-width: 120px; float:left;'  id='TeamPhoto1' border=0 alt='".$row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name']."'>";
					$tmpNextGame = $tmpNextGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
					$tmpNextGame = $tmpNextGame."</td></tr></table>";			
					$tmpNextGame = $tmpNextGame."</td></tr></tbody>";
				}
				$tmpNextGame = $tmpNextGame.'<tfoot><tr><td colspan=2 align=center><a href="'.$tmp_DomainName.'/game_preview.php?id='.$row_GetNextGame['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a></td></tr></tfoot></table>';
			} else {
				$tmpNextGame = 'No game is scheduled';
			}
			
			if ($_SESSION['current_FarmLeague'] == 'True'){
				if($row_GetTeamMenu['Number']>0){
					$tmpFarmNumber=$row_GetTeamMenu['Number'];
				} else {
					$tmpFarmNumber=0;
				}			
				$query_GetFarmTeam = "SELECT Name, City, LogoSmall  FROM farmteam WHERE Number=".$tmpFarmNumber;
				$GetFarmTeam = mysql_query($query_GetFarmTeam, $connection) or die(mysql_error());
				$row_GetFarmTeam = mysql_fetch_assoc($GetFarmTeam);
				$totalRows_GetFarmTeam = mysql_num_rows($GetFarmTeam);
		
				$query_GetNextGame = sprintf("SELECT farmschedule.Day, farmschedule.VisitorTeam, farmschedule.HomeTeam, farmschedule.S_ID FROM farmschedule WHERE (farmschedule.VisitorTeam='%s' OR farmschedule.HomeTeam='%s') AND farmschedule.Season_ID=%s AND farmschedule.Day >= %s AND (farmschedule.Play='False' OR farmschedule.Play='Faux') GROUP BY  farmschedule.Day asc Limit 0,1", $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number'], $_SESSION['current_SeasonID'], $Day_ID);
				$GetNextGame = mysql_query($query_GetNextGame, $connection) or die(mysql_error());
				$row_GetNextGame = mysql_fetch_assoc($GetNextGame);
				$totalRows_GetNextGame = mysql_num_rows($GetNextGame);	
			 
				if($totalRows_GetNextGame > 0){	
					$tmpNextFarmGame = '<br><br><table cellspacing="0" border="0" width="100%"><thead>';
					
					if ( $row_GetNextGame['VisitorTeam'] == $row_GetTeamMenu['Number']) {
						$NextGameTeam = $row_GetNextGame['HomeTeam'];
						$NextGameType = 1;
					}
					if ( $row_GetNextGame['HomeTeam'] == $row_GetTeamMenu['Number']) {
						$NextGameTeam = $row_GetNextGame['VisitorTeam'];
						$NextGameType = 0;
					}
				
					$query_GetNextGameTeam = sprintf("SELECT p.*, T.City, T.Name, T.LogoSmall FROM farmteam as T, farmteamstandings as p WHERE T.Number='%s' AND T.Number=p.Number AND p.Season_ID=%s", $NextGameTeam, $_SESSION['current_SeasonID']);
					$GetNextGameTeam = mysql_query($query_GetNextGameTeam, $connection) or die(mysql_error());
					$row_GetNextGameTeam = mysql_fetch_assoc($GetNextGameTeam);
					$totalRows_GameTeam = mysql_num_rows($GetNextGameTeam);	
				
					$query_GetHomeW = sprintf("SELECT P.* FROM farmteam as T, farmteamstandings as P WHERE P.Number='%s' AND T.Number=P.Number AND P.Season_ID=%s", $row_GetTeamMenu['Number'], $_SESSION['current_SeasonID']);
					$GetHomeW = mysql_query($query_GetHomeW, $connection) or die(mysql_error());
					$row_GetHomeW = mysql_fetch_assoc($GetHomeW);
					
					$tmpNextFarmGame = $tmpNextFarmGame.'<tr><th colspan=2><h3>'.$l_NextGameIn.' '.number_format($row_GetNextGame[Day]-$Day_ID,0).' '.$l_days.'</h3></th></tr></thead>';
				
					if ($NextGameType == 1){
						$VisitWins = ($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW']) - ($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW']);
						$VisitLoss = $row_GetHomeW['L'] - $row_GetHomeW['HomeL'];
						$VisitOT= ($row_GetHomeW['OTL']+$row_GetHomeW['SOL']) - ($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL']);
						
						$tmpNextFarmGame = $tmpNextFarmGame."<tbody><tr><td width='50%' style='padding:5px;'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetFarmTeam['LogoSmall']."' vspace='6' hspace='6' style='max-width: 120px; float:left;'  id='TeamPhoto1' border=0 alt='".$row_GetFarmTeam['City']." ".$row_GetFarmTeam['Name']."'>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></table>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td style='padding:5px;' width='50%'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><a href='".$_SESSION['DomainName']."/pro_roster.php?team=".$row_GetNextGameTeam['Number']."'>";
						$tmpNextFarmGame = $tmpNextFarmGame."<img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='max-width: 120px; float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$row_GetNextGameTeam['Name']."'></a>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW'])."-".$row_GetNextGameTeam['HomeL']."-".($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></table>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></tbody>";
					} else {
						$VisitWins = ($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW']) - ($row_GetNextGameTeam['HomeW'] + $row_GetNextGameTeam['HomeOTW'] + $row_GetNextGameTeam['HomeSOW']);
						$VisitLoss = $row_GetNextGameTeam['L'] - $row_GetNextGameTeam['HomeL'];
						$VisitOT= ($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL']) - ($row_GetNextGameTeam['HomeOTL']+$row_GetNextGameTeam['HomeSOL']);
						$tmpNextFarmGame = $tmpNextFarmGame."<tbody><tr><td style='padding:5px;' width='50%'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center>";
						$tmpNextFarmGame = $tmpNextFarmGame."<a href='pro_roster.php?team=".$row_GetNextGameTeam['Number']."'><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetNextGameTeam['LogoSmall']."' vspace='6' hspace='6' border='0' style='max-width: 120px; float:left;' id='TeamPhoto2' border=0 alt='".$row_GetNextGameTeam['City']." ".$row_GetNextGameTeam['Name']."'></a></div>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetNextGameTeam['Last10W'] + $row_GetNextGameTeam['Last10OTW'] + $row_GetNextGameTeam['Last10SOW'])."-".$row_GetNextGameTeam['Last10L']."-".($row_GetNextGameTeam['Last10OTL']+$row_GetNextGameTeam['Last10SOL'])." (".$row_GetNextGameTeam['Streak'].")</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_VisitorRecord."<br /><strong>".$VisitWins."-".$VisitLoss."-".$VisitOT."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_Record."<br /><strong>".($row_GetNextGameTeam['W'] + $row_GetNextGameTeam['OTW'] + $row_GetNextGameTeam['SOW'])."-".$row_GetNextGameTeam['L']."-".($row_GetNextGameTeam['OTL']+$row_GetNextGameTeam['SOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></table>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td width='50%' style='padding:5px;'><table cellpadding=0 cellspacing=0 border=0><tr><td style='width:120px;' align=center><img src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetFarmTeam['LogoSmall']."' vspace='6' hspace='6' style='max-width: 120px; float:left;'  id='TeamPhoto1' border=0 alt='".$row_GetFarmTeam['City']." ".$row_GetFarmTeam['Name']."'>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td><td align=center>".$l_Last10."<br /><strong>".($row_GetHomeW['Last10W'] + $row_GetHomeW['Last10OTW'] + $row_GetHomeW['Last10SOW'])."-".$row_GetHomeW['Last10L']."-".($row_GetHomeW['Last10OTL']+$row_GetHomeW['Last10SOL'])." (".$row_GetHomeW['Streak'].")</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_HomeRecord."<br /><strong>".($row_GetHomeW['HomeW'] + $row_GetHomeW['HomeOTW'] + $row_GetHomeW['HomeSOW'])."-".$row_GetHomeW['HomeL']."-".($row_GetHomeW['HomeOTL']+$row_GetHomeW['HomeSOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."<br /><br />".$l_Record."<br /><strong>".($row_GetHomeW['W'] + $row_GetHomeW['OTW'] + $row_GetHomeW['SOW'])."-".$row_GetHomeW['L']."-".($row_GetHomeW['OTL']+$row_GetHomeW['SOL'])."</strong>";
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></table>";			
						$tmpNextFarmGame = $tmpNextFarmGame."</td></tr></tbody>";
					}
					$tmpNextFarmGame = $tmpNextFarmGame.'<tfoot><tr><td colspan=2 align=center><a href="'.$tmp_DomainName.'/farm_game_preview.php?id='.$row_GetNextGame['S_ID'].'"><strong>'.$l_GamePreview.'</strong></a></td></tr></tfoot></table>';
				} else {
					$tmpNextFarmGame = 'No farm game is scheduled';
				}
			} else {
				$tmpNextFarmGame = '';
			}
			
			if($totalRows_GetLastDay > 0 ){
				$query_GetSchedule = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s AND schedule.Day>=%s AND schedule.Day<=%s AND (schedule.HomeTeam=%s OR schedule.VisitorTeam=%s)", $_SESSION['current_SeasonID'], $Day_ID, $NextDay, $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number']);
			} else {
				$query_GetSchedule = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s AND schedule.Day=0 AND (schedule.HomeTeam=%s OR schedule.VisitorTeam=%s)", $_SESSION['current_SeasonID'], $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number']);
			}			
			$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
			$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
			$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
		
			if ($_SESSION['current_FarmLeague'] == 'True'){
				if($totalRows_GetLastDay > 0 ){
					$query_GetFarmSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s AND farmschedule.Day>=%s AND farmschedule.Day<=%s AND (farmschedule.HomeTeam=%s OR farmschedule.VisitorTeam=%s)", $_SESSION['current_SeasonID'], $Day_ID, $NextDay, $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number']);
				} else {
					$query_GetFarmSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s AND farmschedule.Day=0 AND (farmschedule.HomeTeam=%s OR farmschedule.VisitorTeam=%s)", $_SESSION['current_SeasonID'], $row_GetTeamMenu['Number'], $row_GetTeamMenu['Number']);
				}			
				$GetFarmSchedule = mysql_query($query_GetFarmSchedule, $connection) or die(mysql_error());
				$row_GetFarmSchedule = mysql_fetch_assoc($GetFarmSchedule);
				$totalRows_GetFarmSchedule = mysql_num_rows($GetFarmSchedule);
			}
			
			if($totalRows_GetSchedule > 0){
				
			mysql_data_seek($GetSchedule,0);
			while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)){ 
			
				$query_GetHomeTeam = sprintf("SELECT LogoTiny, Email, City, Name, Abbre FROM proteam WHERE proteam.Number=%s",$row_GetSchedule['HomeTeam']);
				$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
				$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);			
				$totalRows_GetHomeTeam = mysql_num_rows($GetHomeTeam);
				
				$query_GetVisitorTeam = sprintf("SELECT LogoTiny, Email, City, Name, Abbre FROM proteam WHERE proteam.Number=%s",$row_GetSchedule['VisitorTeam']);
				$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
				$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);
				$totalRows_GetVisitorTeam = mysql_num_rows($GetVisitorTeam);
	
				$query_GetLink = sprintf("SELECT * FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Pro',CAST(".$row_GetSchedule['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $_SESSION['current_SeasonID']);
				$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
				$row_GetLink = mysql_fetch_assoc($GetLink);
				$TMP_Link = $row_GetLink['Link'];
				
				if($TMP_Link==""){
					$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Pro' ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
					$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
					$row_GetLink = mysql_fetch_assoc($GetLink);
					$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
					$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
					$TMP_Link = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetSchedule['Number'].".html";
				}
				
				$SocialMessage = $l_Day." ".$Day_ID." : ".$row_GetHomeTeam["City"]." ".$row_GetSchedule["HomeScore"]." - ".$row_GetVisitorTeam["City"]." ".$row_GetSchedule["VisitorScore"];
				$ScoreDetails = $row_GetHomeTeam["Abbre"]." : ".$row_GetLink["HomeTeamGoal"]." ".$row_GetLink["HomeTeamGoaler"]." | ".$row_GetVisitorTeam["Abbre"]." : ".$row_GetLink["VisitorTeamGoal"]." ".$row_GetLink["VisitorTeamGoaler"];

				if($row_GetTeamMenu['oauth_provider'] == "facebook" && $row_GetTeamMenu['post_game_results'] == "True"){
					//facebook application
					$facebook = new Facebook(array(
					  'appId'  => APP_ID,
					  'secret' => APP_SECRET,
					  'cookie' => true,
					));
					
					$post =  array(
						'access_token' => $row_GetTeamMenu['access_token'],
						'link' => $url,
						'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
						'name' => $_SESSION['SiteName'],
						'message' =>  $SocialMessage,
						'description' => $ScoreDetails
					);
					
					try {
						//and make the request
						$res = $facebook->api('/'.$row_GetTeamMenu['oauth_uid'].'/feed', 'POST', $post);
					} catch (FacebookApiException $e) {}
					
				}
				if($row_GetTeamMenu['oauth_provider']=='twitter' && $row_GetTeamMenu['post_game_results']=='True'){
					$tinyURL = ShortUrl::create($url,'tinyurl');
					$SocialMessage = $_SESSION['SiteName']." : ".$SocialMessage." - ".$tinyURL;
					/* Get user access tokens out of the session. */
					$access_token = explode(",", $row_GetTeamMenu['access_token']);
					$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
					$response = $twitter_connection->post('statuses/update', array('status' => substr($SocialMessage, 0, 140)));
				}
				
				$tmpGameResults = '<table cellspacing="0" border="1" width="100%" height="125">
				<thead>
				<tr>
					<th colspan="2" style="text-align:left">'.$l_GameResults.'</th>
					<th>'.$l_ScoreGoalie.'</th>
					<th>'.$tmpGameType.'</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td width="25" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/pro_roster.php?team='.$row_GetHomeTeam["Number"].'"><img border="0" src="'.$_SESSION["DomainName"].'/image/logos/small/'.$row_GetHomeTeam["LogoTiny"].'" /></a></td>
					<td width="100" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/pro_roster.php?team='.$row_GetHomeTeam["Number"].'">'.$row_GetHomeTeam["City"].'</a></td>
					<td width="315" style="vertical-align:top; font-size:11px;">'.$row_GetLink["HomeTeamGoal"].'<br style="margin-bottom:5px;" />'.$row_GetLink["HomeTeamGoaler"].'</td>
					<td width="25" align="center" style="font-size:24px; vertical-align:middle"><strong>'.$row_GetSchedule["HomeScore"].'</strong></td>
				</tr>
				<tr>
					<td width="25" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/pro_roster.php?team='.$row_GetVisitorTeam["Number"].'"><img border="0" src="'.$_SESSION["DomainName"].'/image/logos/small/'.$row_GetVisitorTeam["LogoTiny"].'" /></a></td>
					<td width="100" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/pro_roster.php?team='.$row_GetVisitorTeam["Number"].'">'.$row_GetVisitorTeam["City"].'</a></td>
					<td width="315" style="vertical-align:top; font-size:11px;">'.$row_GetLink["VisitorTeamGoal"].'<br style="margin-bottom:5px;" />'.$row_GetLink["VisitorTeamGoaler"].'</td>
					<td width="25" align="center" style="font-size:24px; vertical-align:middle"><strong>'.$row_GetSchedule["VisitorScore"].'</strong></td>
				</tr>
				</tbody>
				</table>
				
				<div align="right" style="margin-bottom:15px;">
				<a href="'.$tmp_DomainName.'/File/'.$tmp_current_Folder.'/'.$TMP_Link.'" target=_blank>'.$l_Boxscore.'</a>
				</div>';
			}
			} else {
				$tmpGameResults = '<br><div align="center">No scheduled game today</div><br><br>';
			}
			
			if ($_SESSION['current_FarmLeague'] == 'True'){
				if($totalRows_GetFarmSchedule > 0){
					
				mysql_data_seek($GetFarmSchedule,0);
				while ($row_GetFarmSchedule = mysql_fetch_assoc($GetFarmSchedule)){ 
				
					$query_GetHomeTeam = sprintf("SELECT LogoTiny, City, Name, Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetFarmSchedule['HomeTeam']);
					$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
					$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);			
					$totalRows_GetHomeTeam = mysql_num_rows($GetHomeTeam);
					
					$query_GetVisitorTeam = sprintf("SELECT LogoTiny, City, Name, Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetFarmSchedule['VisitorTeam']);
					$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
					$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);
					$totalRows_GetVisitorTeam = mysql_num_rows($GetVisitorTeam);
		
					$query_GetLink = sprintf("SELECT * FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetFarmSchedule['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $_SESSION['current_SeasonID']);
					$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
					$row_GetLink = mysql_fetch_assoc($GetLink);
					$TMP_Link = $row_GetLink['Link'];
					
					if($TMP_Link==""){
						$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Farm' ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
						$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
						$row_GetLink = mysql_fetch_assoc($GetLink);
						$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
						$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
						$TMP_Link = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetFarmSchedule['Number'].".html";
					}
					
					$SocialMessage = $l_Day." ".$Day_ID." : ".$row_GetHomeTeam["City"]." ".$row_GetSchedule["HomeScore"]." - ".$row_GetVisitorTeam["City"]." ".$row_GetSchedule["VisitorScore"];
					$ScoreDetails = $row_GetHomeTeam["Abbre"]." : ".$row_GetLink["HomeTeamGoal"]." ".$row_GetLink["HomeTeamGoaler"]." | ".$row_GetVisitorTeam["Abbre"]." : ".$row_GetLink["VisitorTeamGoal"]." ".$row_GetLink["VisitorTeamGoaler"];
									
					if($row_GetTeamMenu['oauth_provider'] == "facebook" && $row_GetTeamMenu['post_game_results'] == "True"){
						//facebook application
						$facebook = new Facebook(array(
						  'appId'  => APP_ID,
						  'secret' => APP_SECRET,
						  'cookie' => true,
						));
						
						$post =  array(
							'access_token' => $row_GetTeamMenu['access_token'],
							'link' => $farmurl,
							'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
							'name' => $_SESSION['SiteName'],
							'message' =>  $SocialMessage,
							'description' => $ScoreDetails
						);
						
						try {
							//and make the request
							$res = $facebook->api('/'.$row_GetTeamMenu['oauth_uid'].'/feed', 'POST', $post);
						} catch (FacebookApiException $e) {}
						
					}
					if($row_GetTeamMenu['oauth_provider']=='twitter' && $row_GetTeamMenu['post_game_results']=='True'){
						$tinyURL = ShortUrl::create($farmurl,'tinyurl');
						$SocialMessage = $_SESSION['SiteName']." : ".$SocialMessage." - ".$tinyURL;
						/* Get user access tokens out of the session. */
						$access_token = explode(",", $row_GetTeamMenu['access_token']);
						$twitter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token[0], $access_token[1]);
						$response = $twitter_connection->post('statuses/update', array('status' => substr($SocialMessage, 0, 140)));
					}
					
					$tmpFarmGameResults = '<table cellspacing="0" border="1" width="100%" height="125">
					<thead>
					<tr>
						<th colspan="2" style="text-align:left">'.$l_GameResults.'</th>
						<th>'.$l_ScoreGoalie.'</th>
						<th>'.$tmpGameType.'</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td width="25" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/farm_roster.php?team='.$row_GetHomeTeam["Number"].'"><img border="0" src="'.$_SESSION["DomainName"].'/image/logos/small/'.$row_GetHomeTeam["LogoTiny"].'" /></a></td>
						<td width="100" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/farm_roster.php?team='.$row_GetHomeTeam["Number"].'">'.$row_GetHomeTeam["City"].'</a></td>
						<td width="315" style="vertical-align:top; font-size:11px;">'.$row_GetLink["HomeTeamGoal"].'<br style="margin-bottom:5px;" />'.$row_GetLink["HomeTeamGoaler"].'</td>
						<td width="25" align="center" style="font-size:24px; vertical-align:middle"><strong>'.$row_GetFarmSchedule["HomeScore"].'</strong></td>
					</tr>
					<tr>
						<td width="25" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/farm_roster.php?team='.$row_GetVisitorTeam["Number"].'"><img border="0" src="'.$_SESSION["DomainName"].'/image/logos/small/'.$row_GetVisitorTeam["LogoTiny"].'" /></a></td>
						<td width="100" style="vertical-align:middle;"><a href="'.$tmp_DomainName.'/farm_roster.php?team='.$row_GetVisitorTeam["Number"].'">'.$row_GetVisitorTeam["City"].'</a></td>
						<td width="315" style="vertical-align:top; font-size:11px;">'.$row_GetLink["VisitorTeamGoal"].'<br style="margin-bottom:5px;" />'.$row_GetLink["VisitorTeamGoaler"].'</td>
						<td width="25" align="center" style="font-size:24px; vertical-align:middle"><strong>'.$row_GetFarmSchedule["VisitorScore"].'</strong></td>
					</tr>
					</tbody>
					</table>
					
					<div align="right" style="margin-bottom:15px;">
					<a href="'.$tmp_DomainName.'/File/'.$tmp_current_Folder.'/'.$TMP_Link.'" target=_blank>'.$l_Boxscore.'</a>
					</div>';
				}
				} else {
					$tmpFarmGameResults = '<br><div align="center">No scheduled farm game today</div><br><br>';
				}
			} else {
				$tmpFarmGameResults = '';
			}
			
			$MailSubject = $tmp_siteName.": ".$row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name']." Report";
			$MailMessage = '
				<body>
				<style media="all" type="text/css">html,body{ font-family: arial, verdanna; font-size:12px;} td{font-size:11px;} th{font-size:11px; font-weight:bold; padding:2px;}</style>
				<table cellpadding="2" cellspacing="0" border="0"  align="center" style="min-width:360px; max-width:600px;">
				<tr>
					<td valign="top"><h1>'.$tmp_siteName.' Day '.$Day_ID.'</h1><hr></td>
				</tr>
				<tr>
					<td valign="top" height="125">
						<blockquote>
						<h3>Todays Results</h3>
						'.$tmpGameResults.'
						'.$tmpFarmGameResults.'
						</blockquote>
					</td>
				</tr>
				';
				if($totalRows_GetDayResults > 0){
				$MailMessage = $MailMessage.'
				<tr>
					<td valign="top">
						<blockquote>
						<h3>Other Results</h3>
						<table cellspacing="0" border="1" width="100%">
						<thead>
						<tr>
							<th>'.$l_Game.'</th>
							<th>'.$l_VisitorTeam.'</th>
							<th>'.$l_Score.'</th>
							<th>'.$l_HomeTeam.'</th>
							<th>'.$l_Score.'</th>
							<th>'.$l_Overtime.'</th>
							<th>'.$l_ShootOut.'</th>
							<th>'.$l_Link.'</th>
						</tr>
						</thead>
						<tbody>
						';
						mysql_data_seek($GetDayResults,0);
						while ($row_GetDayResults = mysql_fetch_assoc($GetDayResults)){ 
							$query_GetHomeTeamR = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number=%s",$row_GetDayResults['HomeTeam']);
							$GetHomeTeamR = mysql_query($query_GetHomeTeamR, $connection) or die(mysql_error());
							$row_GetHomeTeamR = mysql_fetch_assoc($GetHomeTeamR);
							
							$query_GetVisitorTeamR = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number=%s",$row_GetDayResults['VisitorTeam']);
							$GetVisitorTeamR = mysql_query($query_GetVisitorTeamR, $connection) or die(mysql_error());
							$row_GetVisitorTeamR = mysql_fetch_assoc($GetVisitorTeamR);
				
							if ($row_GetDayResults['Link'] == ""){
								$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Pro',CAST(".$row_GetDayResults['Number']." as CHAR)) AND todaysgame.Season_ID=%s",$_SESSION['current_SeasonID']);
								$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
								$row_GetLink = mysql_fetch_assoc($GetLink);
								$GameLink = $row_GetLink['Link'];
							} else {
								$GameLink = $row_GetDayResults['Link'];
							}
							if ($row_GetDayResults['Overtime'] != "False"){ $tmp_Overtime = "X"; } else { $tmp_Overtime =  "-"; }
							if ($row_GetDayResults['ShootOut'] != "False"){ $tmp_ShootOut = "X"; } else { $tmp_ShootOut = "-"; }
						
							$MailMessage = $MailMessage.'
							<tr>
								<td align="center">'.$row_GetDayResults['Number'].'</td>
								<td align="center">'.$row_GetVisitorTeamR['City'].'</a></td>
								<td align="center">'.$row_GetDayResults['VisitorScore'].'</td>
								<td align="center">'.$row_GetHomeTeamR['City'].'</td>
								<td align="center">'.$row_GetDayResults['HomeScore'].'</td>
								<td align="center">'.$tmp_Overtime.'</td>
								<td align="center">'.$tmp_ShootOut.'</td>
								<td align="center"><a href="'.$_SESSION['DomainName'].'/File/'.$tmp_current_Folder.'/'.$GameLink.'" target="_blank">'.$l_nav_scores.'</a></td>
							</tr>
							';
						}
						
						if($totalRows_GetDayFarmResults > 0){
						
						mysql_data_seek($GetDayFarmResults,0);
						while ($row_GetDayFarmResults = mysql_fetch_assoc($GetDayFarmResults)){ 
							$query_GetHomeTeamR = sprintf("SELECT farmteam.City, farmteam.Name FROM farmteam WHERE farmteam.Number=%s",$row_GetDayFarmResults['HomeTeam']);
							$GetHomeTeamR = mysql_query($query_GetHomeTeamR, $connection) or die(mysql_error());
							$row_GetHomeTeamR = mysql_fetch_assoc($GetHomeTeamR);
							
							$query_GetVisitorTeamR = sprintf("SELECT farmteam.City, farmteam.Name FROM farmteam WHERE farmteam.Number=%s",$row_GetDayFarmResults['VisitorTeam']);
							$GetVisitorTeamR = mysql_query($query_GetVisitorTeamR, $connection) or die(mysql_error());
							$row_GetVisitorTeamR = mysql_fetch_assoc($GetVisitorTeamR);
				
							if ($row_GetDayFarmResults['Link'] == ""){
								$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetDayFarmResults['Number']." as CHAR)) AND todaysgame.Season_ID=%s",$_SESSION['current_SeasonID']);
								$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
								$row_GetLink = mysql_fetch_assoc($GetLink);
								$GameLink = $row_GetLink['Link'];
							} else {
								$GameLink = $row_GetDayFarmResults['Link'];
							}
							if ($row_GetDayFarmResults['Overtime'] != "False"){ $tmp_Overtime = "X"; } else { $tmp_Overtime =  "-"; }
							if ($row_GetDayFarmResults['ShootOut'] != "False"){ $tmp_ShootOut = "X"; } else { $tmp_ShootOut = "-"; }
						
							$MailMessage = $MailMessage.'
							<tr>
								<td align="center">'.$row_GetDayFarmResults['Number'].'</td>
								<td align="center">'.$row_GetVisitorTeamR['City'].'</a></td>
								<td align="center">'.$row_GetDayFarmResults['VisitorScore'].'</td>
								<td align="center">'.$row_GetHomeTeamR['City'].'</td>
								<td align="center">'.$row_GetDayFarmResults['HomeScore'].'</td>
								<td align="center">'.$tmp_Overtime.'</td>
								<td align="center">'.$tmp_ShootOut.'</td>
								<td align="center"><a href="'.$_SESSION['DomainName'].'/File/'.$tmp_current_Folder.'/'.$GameLink.'" target="_blank">'.$l_nav_scores.'</a></td>
							</tr>
							';
						}  
						}
					
					$MailMessage = $MailMessage.'
						</body>
						</table>
							</blockquote>
							<br><br>
						</td>
						
					</tr>
					';
					}  
					$MailMessage = $MailMessage.'
					<tr>
						<td>
							<blockquote>
							'.$tmpNextGame.'
							<br><br>
							'.$tmpNextFarmGame.'
							</blockquote>
							<br><br>
						</td>
					</tr>
					';
					
					
					$MailMessage = $MailMessage.'
					</table>
					</body>
					';
					
				//echo $MailSubject."<br>".$MailMessage;
				sendMail($row_GetTeamMenu['Email'], $tmpemail, $MailSubject, $MailMessage);
				 
			} while ($row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu)); 
			mysql_free_result($GetTeamMenu);
			
	}
}

$updateGoTo = "import_warning.php";
header(sprintf("Location: %s", $updateGoTo));


?>