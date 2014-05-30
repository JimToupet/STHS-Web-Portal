<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php


if (isset($_GET['id'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$deleteSQL = "DELETE FROM playerscontractoffers WHERE Type='Signed' OR Type='Goalie Signed'";
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
$removeGoTo = "ufa-free-agents_signed.php";
header(sprintf("Location: %s", $removeGoTo));
?>