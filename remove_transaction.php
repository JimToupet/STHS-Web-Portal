<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}
$ID = "0";
if (isset($_GET["id"])) {
  $ID = (get_magic_quotes_gpc()) ? $_GET["id"] : addslashes($_GET["id"]);
}
$RemoveSQL = "DELETE FROM playerscontractoffers WHERE PR_ID=".$ID;
  
  $Result1 = mysql_query($RemoveSQL, $connection) or die(mysql_error());
  $removeGoTo = "admin_report.php";
  header(sprintf("Location: %s", $removeGoTo));
?>