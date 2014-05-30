<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$GetTeam = "0";
if (isset($_GET['team'])) {
  $GetTeam = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
}


$updateSQL = "DELETE FROM mail WHERE Receiver_U_ID=".$GetTeam;
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateGoTo = "check_messages.php";
header(sprintf("Location: %s", $updateGoTo));
?>