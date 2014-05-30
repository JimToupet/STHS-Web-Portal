<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$deleteSQL = "DELETE FROM teamhistory ";
$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
$removeGoTo = "view_teamhistory.php";
header(sprintf("Location: %s", $removeGoTo));
?>