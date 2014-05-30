<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

$deleteSQL = "DELETE FROM playerscontractoffers WHERE Type='Extension'";
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
$removeGoTo = "admin_report.php";
header(sprintf("Location: %s", $removeGoTo));
?>