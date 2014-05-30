<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if ($_SESSION['U_ID']=="") {
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

$ID_RemoveArticle = "0";
if (isset($_GET["article"])) {
  $ID_RemoveArticle = (get_magic_quotes_gpc()) ? $_GET["article"] : addslashes($_GET["article"]);
}
$RemoveSQL = "DELETE FROM articles WHERE A_ID=".$ID_RemoveArticle;
  
  $Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());
  $removeGoTo = "team.php?Team=".$_SESSION['current_Team_ID'];
  if ($_SESSION['current_Team_ID'] == 0) {
  	$removeGoTo = "index.php";
  } else {
  	$removeGoTo = "team.php?Team=".$_SESSION['current_Team_ID'];
  }
  header(sprintf("Location: %s", $removeGoTo));
?>