<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

// Security measure to avoid loading the page directly by using its name
if($_SESSION['U_Admin']!=1){
  die( "You must be an administrator to view this page." );  
}

$ID_Year = "2007";
if (isset($_GET['year'])) {
  $ID_Year  = (get_magic_quotes_gpc()) ? $_GET['year'] : addslashes($_GET['year']);
}
$updateSQL = "DELETE FROM draftpicks WHERE Year=".$ID_Year;
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
$updateGoTo = "draft-picks.php";
header(sprintf("Location: %s", $updateGoTo));
?>