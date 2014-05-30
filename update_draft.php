<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$ID_Season = "2011";
if (isset($_POST['Season'])) {
 $ID_Season  = (get_magic_quotes_gpc()) ? $_POST['Season'] : addslashes($_POST['Season']);
}
$ID_draftyear = "2007";
if (isset($_POST['draftyear'])) {
  $ID_draftyear  = (get_magic_quotes_gpc()) ? $_POST['draftyear'] : addslashes($_POST['draftyear']);
}
$updateSQL = "UPDATE seasons SET draftyear='".$ID_draftyear."' WHERE S_ID=".$ID_Season." AND SeasonType=1";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
$updateGoTo = "draft-picks.php";
header(sprintf("Location: %s", $updateGoTo));
?>