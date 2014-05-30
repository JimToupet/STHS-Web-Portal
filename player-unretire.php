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
	
	$insertSQL = sprintf("UPDATE goalies SET Retired=0 WHERE Number=%s", $ID_Player);
	mysql_real_escape_string(DB_DATABASE, $connection);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
} else {
	
	$insertSQL = sprintf("UPDATE players SET Retired=0 WHERE Number=%s", $ID_Player);
	mysql_real_escape_string(DB_DATABASE, $connection);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

$removeGoTo = "retired_players.php";
if (isset($_SERVER['QUERY_STRING'])) {
	$removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
	$removeGoTo .= $_SERVER['QUERY_STRING'];
} 
header(sprintf("Location: %s", $removeGoTo));
?>