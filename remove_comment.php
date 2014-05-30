<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if ($_SESSION['U_ID']=="") {
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

$ID = "0";
$ID_Article = "0";
if (isset($_GET["id"])) {
  $ID = (get_magic_quotes_gpc()) ? $_GET["id"] : addslashes($_GET["id"]);
}
if (isset($_GET["A_ID"])) {
  $ID_Article = (get_magic_quotes_gpc()) ? $_GET["A_ID"] : addslashes($_GET["A_ID"]);
}
$RemoveSQL = "DELETE FROM comments WHERE ID=".$ID;
$Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());

  $removeGoTo = "news.php?article=".$ID_Article;  
  header(sprintf("Location: %s", $removeGoTo));
?>