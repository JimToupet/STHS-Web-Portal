<?php include('Connections/simhl-setup.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php

mysql_select_db($database_simhl, $simhl);
if (isset($_GET['id'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$deleteSQL = "DELETE FROM playerscontractoffers WHERE playerscontractoffers.Type='Signed' AND Not Exists (SELECT 1 FROM playersextensionoffers AS E, goalies as G, proteam as T WHERE E.Player=G.Number AND playerscontractoffers.Player=G.Name AND playerscontractoffers.Team=T.Number AND G.Retired=0)";
$Result1 = mysql_query($deleteSQL, $simhl) or die(mysql_error());
$removeGoTo = "ufa-free-agents_signed.php";
header(sprintf("Location: %s", $removeGoTo));
?>