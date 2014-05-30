<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$ID_Player = "0";
if (isset($_GET["player"])) {
  $ID_Player = (get_magic_quotes_gpc()) ? $_GET["player"] : addslashes($_GET["player"]);
}

$ID_POS = "0";
if (isset($_GET["position"])) {
  $ID_POS = (get_magic_quotes_gpc()) ? $_GET["position"] : addslashes($_GET["position"]);
}

if ($ID_POS == 5) {


$RemoveSQL = "DELETE FROM goalies WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

$RemoveSQL = "DELETE FROM goaliestats WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

} else {


$RemoveSQL = "DELETE FROM players WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

$RemoveSQL = "DELETE FROM playerstats WHERE Number='".$ID_Player."'";
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

}

  $removeGoTo = "players-report.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
    $removeGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $removeGoTo));
?>