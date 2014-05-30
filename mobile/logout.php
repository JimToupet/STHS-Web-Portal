<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php 
$targetFile = "index.php";
session_start(); 
session_destroy(); 
header(sprintf("Location: %s", $targetFile));
?>

