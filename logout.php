<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php 
$targetFile = $_SESSION['DomainName']."/index.php";
session_start(); 
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['oauth_provider']);
// set the expiration date to one hour ago
setcookie ("username", "", time() - 3600);
setcookie ("password", "", time() - 3600);
session_destroy(); 
header(sprintf("Location: %s", $targetFile));
?>

