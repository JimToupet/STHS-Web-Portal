<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}
$GetID = "1";
if (isset($_GET['id'])) {
  $GetID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}

$updateSQL = "DELETE FROM waitinglist WHERE W_ID=".$GetID;
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());
$updateGoTo = "contact.php";
header(sprintf("Location: %s", $updateGoTo));
?>