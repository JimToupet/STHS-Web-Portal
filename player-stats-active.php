<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$PID_GetPosition = "1";
if (isset($_GET['position'])) {
  $PID_GetPosition = (get_magic_quotes_gpc()) ? $_GET['position'] : addslashes($_GET['position']);
}
$STAT_ID = "1";
if (isset($_GET['STAT_ID'])) {
  $STAT_ID = (get_magic_quotes_gpc()) ? $_GET['STAT_ID'] : addslashes($_GET['STAT_ID']);
}


if ($PID_GetPosition == 5){
	$updateSQL = "UPDATE goaliestats SET Active='False'  WHERE Name='".addslashes($PID_GetPlayer)."'";
	$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
	$updateSQL = "UPDATE goaliestats SET Active='True'  WHERE STAT_ID=".$STAT_ID;
	$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
} else {
	$updateSQL = "UPDATE playerstats SET Active='False'  WHERE Name='".addslashes($PID_GetPlayer)."'";
	$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
	$updateSQL = "UPDATE playerstats SET Active='True' WHERE STAT_ID=".$STAT_ID;
	$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
}

$updateGoTo = "players-stats-report.php";
header(sprintf("Location: %s", $updateGoTo));
?>