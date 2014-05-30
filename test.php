<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$query_GetSkaters = "SELECT players.* FROM playerstats, players WHERE players.Team=30 AND playerstats.Season_ID=22 AND players.Name=playerstats.Name AND players.Retired=0 AND players.Contract > 0 GROUP BY players.Name ORDER BY players.Position, players.Overall DESC";
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);

do { 
echo $row_GetSkaters[ 'Name' ];
} while ($row = mysql_fetch_assoc($GetSkaters)); 

?>