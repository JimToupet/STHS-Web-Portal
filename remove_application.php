<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$ID = $_SESSION['U_ID'];
if (isset($_GET["team"])) {
  $ID = (get_magic_quotes_gpc()) ? $_GET["team"] : $_GET["team"];
}

$updateSQL = "UPDATE proteam SET oauth_uid='',oauth_provider='', access_token='', post_game_results='True',  post_approvals='True',  forward_messages='False'  WHERE Number=".$ID;
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $removeGoTo = "edit_applications.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $removeGoTo .= (strpos($removeGoTo, '?')) ? "&" : "?";
    $removeGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $removeGoTo));
?>