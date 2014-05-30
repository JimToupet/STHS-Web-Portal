<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php



$ID_Player = 0;
if (isset($_GET["coach"])) {
  $ID_Player = (get_magic_quotes_gpc()) ? $_GET["coach"] : addslashes($_GET["coach"]);
}



$query_GetPlayer = "SELECT Number FROM `coaches` WHERE Retired=1 Order By Number Desc LIMIT 0,1";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$tmpNumberCount = $row_GetPlayer['Number']+1;
$insertSQL = sprintf("UPDATE coaches SET Retired=1, Team=0, Number=%s WHERE Number=%s", $tmpNumberCount, $ID_Player);
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
$insertSQL = sprintf("UPDATE coachestats SET Number=%s WHERE Number=%s",$tmpNumberCount, $ID_Player);
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$query_GetCoach= sprintf("UPDATE trophywinners SET FarmCoachOfTheYear=%s WHERE FarmCoachOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetCoach= mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach= mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach= mysql_num_rows($GetCoach);

$query_GetCoach= sprintf("UPDATE trophywinners SET CoachOfTheYear=%s WHERE CoachOfTheYear=%s",$tmpNumberCount,$ID_Player);
$GetCoach= mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach= mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach= mysql_num_rows($GetCoach);

$removeGoTo = "players-report.php";
if (isset($_SERVER['QUERY_STRING'])) {
	$removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
	$removeGoTo .= $_SERVER['QUERY_STRING'];
} 
header(sprintf("Location: %s", $removeGoTo));
?>