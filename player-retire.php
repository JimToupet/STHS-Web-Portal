<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php




$ID_Player = 0;
if (isset($_GET["player"])) {
  $ID_Player = (get_magic_quotes_gpc()) ? $_GET["player"] : addslashes($_GET["player"]);
}
$ID_POS = "0";
if (isset($_GET["position"])) {
  $ID_POS = (get_magic_quotes_gpc()) ? $_GET["position"] : addslashes($_GET["position"]);
}


	
if ($ID_POS == 5) {
	$query_GetPlayer = "SELECT Number FROM `goalies` WHERE Retired=1 Order By Number Desc LIMIT 0,1";
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$tmpNumberCount = $row_GetPlayer['Number']+1;
	$insertSQL = sprintf("UPDATE goalies SET Retired=1, Team=0, Number=%s WHERE Number=%s",$tmpNumberCount, $ID_Player);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	$insertSQL = sprintf("UPDATE goaliestats SET Number=%s WHERE Number=%s",$tmpNumberCount, $ID_Player);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
} else {	
	$query_GetPlayer = "SELECT Number FROM `players` WHERE Retired=1 Order By Number Desc LIMIT 0,1";
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$tmpNumberCount = $row_GetPlayer['Number']+1;
	$insertSQL = sprintf("UPDATE players SET Retired=1, Team=0, Number=%s WHERE Number=%s", $tmpNumberCount, $ID_Player);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	$insertSQL = sprintf("UPDATE playerstats SET Number=%s WHERE Number=%s",$tmpNumberCount, $ID_Player);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}


$query_GetTrophyMVP = sprintf("UPDATE trophywinners SET MVP=%s WHERE MVP=%s",$tmpNumberCount,$ID_Player);
$GetTrophyMVP = mysql_query($query_GetTrophyMVP, $connection) or die(mysql_error());
$row_GetTrophyMVP = mysql_fetch_assoc($GetTrophyMVP);
$totalRows_GetTrophyMVP = mysql_num_rows($GetTrophyMVP);

$query_GetTrophyRookieOfTheYear = sprintf("UPDATE trophywinners SET RookieOfTheYear=%s WHERE RookieOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetTrophyRookieOfTheYear = mysql_query($query_GetTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyRookieOfTheYear = mysql_fetch_assoc($GetTrophyRookieOfTheYear);
$totalRows_GetTrophyRookieOfTheYear = mysql_num_rows($GetTrophyRookieOfTheYear);

$query_GetTrophyPlayoffMVP = sprintf("UPDATE trophywinners SET PlayoffMVP=%s WHERE PlayoffMVP=%s",$tmpNumberCount,$ID_Player);
$GetTrophyPlayoffMVP = mysql_query($query_GetTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetTrophyPlayoffMVP = mysql_fetch_assoc($GetTrophyPlayoffMVP);
$totalRows_GetTrophyPlayoffMVP = mysql_num_rows($GetTrophyPlayoffMVP);

$query_GetTrophyLowestGAA = sprintf("UPDATE trophywinners SET LowestGAA=%s WHERE LowestGAA=%s",$tmpNumberCount,$ID_Player);
$GetTrophyLowestGAA = mysql_query($query_GetTrophyLowestGAA, $connection) or die(mysql_error());
$row_GetTrophyLowestGAA = mysql_fetch_assoc($GetTrophyLowestGAA);
$totalRows_GetTrophyLowestGAA = mysql_num_rows($GetTrophyLowestGAA);

$query_GetTrophyGoalieOfTheYear = sprintf("UPDATE trophywinners SET GoalieOfTheYear=%s WHERE GoalieOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetTrophyGoalieOfTheYear = mysql_query($query_GetTrophyGoalieOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyGoalieOfTheYear  = mysql_fetch_assoc($GetTrophyGoalieOfTheYear );
$totalRows_GetTrophyGoalieOfTheYear  = mysql_num_rows($GetTrophyGoalieOfTheYear );

$query_GetFarmTrophyMVP = sprintf("UPDATE trophywinners SET FarmMVP=%s WHERE FarmMVP=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyMVP = mysql_query($query_GetFarmTrophyMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyMVP = mysql_fetch_assoc($GetFarmTrophyMVP);
$totalRows_GetFarmTrophyMVP = mysql_num_rows($GetFarmTrophyMVP);

$query_GetFarmTrophyRookieOfTheYear = sprintf("UPDATE trophywinners SET FarmRookieOfTheYear=%s WHERE FarmRookieOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyRookieOfTheYear = mysql_query($query_GetFarmTrophyRookieOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyRookieOfTheYear = mysql_fetch_assoc($GetFarmTrophyRookieOfTheYear);
$totalRows_GetFarmTrophyRookieOfTheYear = mysql_num_rows($GetFarmTrophyRookieOfTheYear);

$query_GetFarmTrophyPlayoffMVP = sprintf("UPDATE trophywinners SET FarmPlayoffMVP=%s WHERE FarmPlayoffMVP=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyPlayoffMVP = mysql_query($query_GetFarmTrophyPlayoffMVP, $connection) or die(mysql_error());
$row_GetFarmTrophyPlayoffMVP = mysql_fetch_assoc($GetFarmTrophyPlayoffMVP);
$totalRows_GetFarmTrophyPlayoffMVP = mysql_num_rows($GetFarmTrophyPlayoffMVP);

$query_GetFarmTrophyLowestGAA = sprintf("UPDATE trophywinners SET FarmLowestGAA=%s WHERE FarmLowestGAA=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyLowestGAA = mysql_query($query_GetFarmTrophyLowestGAA, $connection) or die(mysql_error());
$row_GetFarmTrophyLowestGAA = mysql_fetch_assoc($GetFarmTrophyLowestGAA);
$totalRows_GetFarmTrophyLowestGAA = mysql_num_rows($GetFarmTrophyLowestGAA);

$query_GetFarmTrophyGoalieOfTheYear = sprintf("UPDATE trophywinners SET FarmGoalieOfTheYear=%s WHERE FarmGoalieOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyGoalieOfTheYear = mysql_query($query_GetFarmTrophyGoalieOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyGoalieOfTheYear  = mysql_fetch_assoc($GetFarmTrophyGoalieOfTheYear );
$totalRows_GetFarmTrophyGoalieOfTheYear  = mysql_num_rows($GetFarmTrophyGoalieOfTheYear );


$query_GetTrophyTopScorer = sprintf("UPDATE trophywinners SET TopScorer=%s WHERE TopScorer=%s",$tmpNumberCount,$ID_Player);
$GetTrophyTopScorer = mysql_query($query_GetTrophyTopScorer, $connection) or die(mysql_error());
$row_GetTrophyTopScorer = mysql_fetch_assoc($GetTrophyTopScorer);
$totalRows_GetTrophyTopScorer = mysql_num_rows($GetTrophyTopScorer);

$query_GetTrophyTopGoalScorer = sprintf("UPDATE trophywinners SET TopGoalScorer=%s WHERE TopGoalScorer=%s",$tmpNumberCount,$ID_Player);
$GetTrophyTopGoalScorer = mysql_query($query_GetTrophyTopGoalScorer, $connection) or die(mysql_error());
$row_GetTrophyTopGoalScorer = mysql_fetch_assoc($GetTrophyTopGoalScorer);
$totalRows_GetTrophyTopGoalScorer = mysql_num_rows($GetTrophyTopGoalScorer);

$query_GetTrophyDefensemanOfTheYear = sprintf("UPDATE trophywinners SET DefensemanOfTheYear=%s WHERE DefensemanOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetTrophyDefensemanOfTheYear = mysql_query($query_GetTrophyDefensemanOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetTrophyDefensemanOfTheYear);
$totalRows_GetTrophyDefensemanOfTheYear = mysql_num_rows($GetTrophyDefensemanOfTheYear);

$query_GetTrophyBestDefensiveForward = sprintf("UPDATE trophywinners SET BestDefensiveForward=%s WHERE BestDefensiveForward=%s",$tmpNumberCount,$ID_Player);
$GetTrophyBestDefensiveForward = mysql_query($query_GetTrophyBestDefensiveForward, $connection) or die(mysql_error());
$row_GetTrophyBestDefensiveForward = mysql_fetch_assoc($GetTrophyBestDefensiveForward);
$totalRows_GetTrophyBestDefensiveForward = mysql_num_rows($GetTrophyBestDefensiveForward);

$query_GetTrophyMostSportsmanlikePlayer = sprintf("UPDATE trophywinners SET MostSportsmanlikePlayer=%s WHERE MostSportsmanlikePlayer=%s",$tmpNumberCount,$ID_Player);
$GetTrophyMostSportsmanlikePlayer = mysql_query($query_GetTrophyMostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_GetTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetTrophyMostSportsmanlikePlayer);
$totalRows_GetTrophyMostSportsmanlikePlayer = mysql_num_rows($GetTrophyMostSportsmanlikePlayer);

$query_GetTrophyLowestPIM = sprintf("UPDATE trophywinners SET LowestPIM=%s WHERE LowestPIM=%s",$tmpNumberCount,$ID_Player);
$GetTrophyLowestPIM = mysql_query($query_GetTrophyLowestPIM, $connection) or die(mysql_error());
$row_GetTrophyLowestPIM = mysql_fetch_assoc($GetTrophyLowestPIM);
$totalRows_GetTrophyLowestPIM = mysql_num_rows($GetTrophyLowestPIM);

$query_GetFarmTrophyTopScorer = sprintf("UPDATE trophywinners SET FarmTopScorer=%s WHERE FarmTopScorer=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyTopScorer = mysql_query($query_GetFarmTrophyTopScorer, $connection) or die(mysql_error());
$row_GetFarmTrophyTopScorer = mysql_fetch_assoc($GetFarmTrophyTopScorer);
$totalRows_GetFarmTrophyTopScorer = mysql_num_rows($GetFarmTrophyTopScorer);

$query_GetFarmTrophyTopGoalScorer = sprintf("UPDATE trophywinners SET FarmTopGoalScorer=%s WHERE FarmTopGoalScorer=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyTopGoalScorer = mysql_query($query_GetFarmTrophyTopGoalScorer, $connection) or die(mysql_error());
$row_GetFarmTrophyTopGoalScorer = mysql_fetch_assoc($GetFarmTrophyTopGoalScorer);
$totalRows_GetFarmTrophyTopGoalScorer = mysql_num_rows($GetFarmTrophyTopGoalScorer);

$query_GetFarmTrophyDefensemanOfTheYear = sprintf("UPDATE trophywinners SET FarmDefensemanOfTheYear=%s WHERE FarmDefensemanOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyDefensemanOfTheYear = mysql_query($query_GetFarmTrophyDefensemanOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyDefensemanOfTheYear = mysql_fetch_assoc($GetFarmTrophyDefensemanOfTheYear);
$totalRows_GetFarmTrophyDefensemanOfTheYear = mysql_num_rows($GetFarmTrophyDefensemanOfTheYear);

$query_GetFarmTrophyBestDefensiveForward = sprintf("UPDATE trophywinners SET FarmBestDefensiveForward=%s WHERE FarmBestDefensiveForward=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyBestDefensiveForward = mysql_query($query_GetFarmTrophyBestDefensiveForward, $connection) or die(mysql_error());
$row_GetFarmTrophyBestDefensiveForward = mysql_fetch_assoc($GetFarmTrophyBestDefensiveForward);
$totalRows_GetFarmTrophyBestDefensiveForward = mysql_num_rows($GetFarmTrophyBestDefensiveForward);

$query_GetFarmTrophyMostSportsmanlikePlayer = sprintf("UPDATE trophywinners SET FarmMostSportsmanlikePlayer=%s WHERE FarmMostSportsmanlikePlayer=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyMostSportsmanlikePlayer = mysql_query($query_GetFarmTrophyMostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_GetFarmTrophyMostSportsmanlikePlayer = mysql_fetch_assoc($GetFarmTrophyMostSportsmanlikePlayer);
$totalRows_GetFarmTrophyMostSportsmanlikePlayer = mysql_num_rows($GetFarmTrophyMostSportsmanlikePlayer);

$query_GetFarmTrophyLowestPIM = sprintf("UPDATE trophywinners SET FarmLowestPIM=%s WHERE FarmLowestPIM=%s",$tmpNumberCount,$ID_Player);
$GetFarmTrophyLowestPIM = mysql_query($query_GetFarmTrophyLowestPIM, $connection) or die(mysql_error());
$row_GetFarmTrophyLowestPIM = mysql_fetch_assoc($GetFarmTrophyLowestPIM);
$totalRows_GetFarmTrophyLowestPIM = mysql_num_rows($GetFarmTrophyLowestPIM);

$removeGoTo = "players-report.php";
if (isset($_SERVER['QUERY_STRING'])) {
	$removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
	$removeGoTo .= $_SERVER['QUERY_STRING'];
} 
header(sprintf("Location: %s", $removeGoTo));
?>