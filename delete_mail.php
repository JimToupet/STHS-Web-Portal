<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$GetTeam = "0";
if (isset($_GET['team'])) {
  $GetTeam = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
}

$GetID = "0";
if (isset($_GET['id'])) {
  $GetID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}

$GetTarget = "inbox";
if (isset($_GET['target'])) {
  $GetTarget = (get_magic_quotes_gpc()) ? $_GET['target'] : addslashes($_GET['target']);
}


$updateSQL = "DELETE FROM mail WHERE M_ID=".$GetID;
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($GetTarget == "inbox"){
	$updateGoTo = "check_messages.php";
} else {
	$updateGoTo = "check_messages.php";
}
header(sprintf("Location: %s", $updateGoTo));
?>