<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
unset($_SESSION['current_Team']);
unset($_SESSION['current_Team_ID']);
$_SESSION['current_Team'] = "SIMHL";
$_SESSION['current_Team_ID'] = 0;
$updateGoTo = "home.php";
header(sprintf("Location: %s", $updateGoTo));
?>