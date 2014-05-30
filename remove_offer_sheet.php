<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$PID_GetPlayer = "1";
if (isset($_GET['id'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$deleteSQL = "DELETE FROM playerscontractoffers WHERE PR_ID=". $PID_GetPlayer;
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
$removeGoTo = "ufa-free-agents_w_offer.php";
header(sprintf("Location: %s", $removeGoTo));
?>