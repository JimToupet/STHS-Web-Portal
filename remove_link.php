<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if ($_SESSION['U_ID']=="") {
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

$ID_RemoveID = "0";
if (isset($_GET["id"])) {
  $ID_RemoveID = (get_magic_quotes_gpc()) ? $_GET["id"] : addslashes($_GET["id"]);
}

$RemoveSQL = "DELETE FROM links WHERE ID=".$ID_RemoveID;
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());
$removeGoTo = "links.php";
header(sprintf("Location: %s", $removeGoTo));
?>