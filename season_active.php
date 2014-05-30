<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$ID_GetID = "0";
if (isset($_GET['id'])) {
  $ID_GetID  = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}


$updateSQL = "UPDATE seasons SET Active=0";
$Result0 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateSQL = "UPDATE seasons SET Active=1 WHERE S_ID=".$ID_GetID;
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$query_GetActiveSeason = "SELECT * FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$_SESSION['current_SeasonID']=$row_GetActiveSeason['S_ID'];
$_SESSION['current_Season']=$row_GetActiveSeason['Season'];
$_SESSION['current_SeasonTypeID']=$row_GetActiveSeason['SeasonType'];
$_SESSION['current_SeasonFolder']=$row_GetActiveSeason['Folder'];
if ($row_GetActiveSeason['SeasonType'] == 2){
	$_SESSION['current_SeasonType']="Pre-Season";
} else if ($row_GetActiveSeason['SeasonType'] == 1){
	$_SESSION['current_SeasonType']="Regular Season";
} else if ($row_GetActiveSeason['SeasonType'] == 0){
	$_SESSION['current_SeasonType']="Playoffs";
}
mysql_free_result($GetActiveSeason);
	
$updateGoTo = "seasons.php";
header(sprintf("Location: %s", $updateGoTo));
?>