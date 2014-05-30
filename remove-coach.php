<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$ID_Player = "0";
if (isset($_GET["coach"])) {
  $ID_Player = (get_magic_quotes_gpc()) ? $_GET["coach"] : addslashes($_GET["coach"]);
}


$RemoveSQL = "DELETE FROM coaches WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

$RemoveSQL = "DELETE FROM coachestats WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

  $removeGoTo = "players-report.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
    $removeGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $removeGoTo));
?>