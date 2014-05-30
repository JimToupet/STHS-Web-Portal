<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

$GetPlayer = "1";
if (isset($_GET['player'])) {
  $GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetLocation = "prospect_list.php";
if (isset($_GET['target'])) {
  $GetLocation = (get_magic_quotes_gpc()) ? $_GET['target'] : addslashes($_GET['target']);
}

$updateSQL = "DELETE FROM prospects WHERE Name='".$GetPlayer."'";
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
$updateGoTo = $GetLocation;
header(sprintf("Location: %s", $updateGoTo));
?>