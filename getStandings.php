<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php
$query_GetStandings = sprintf("SELECT (SELECT AVG( Overall ) as Overall
FROM  `players` 
WHERE Team = p.Number
AND  `Status0` > 1) as Overall, s.*, p.* FROM proteamstandings as s, proteam as p WHERE p.Number=s.Number AND s.Season_ID='%s' ORDER BY s.StandingPlayoffTitle desc, s.Point desc, s.W desc,  s.PowerRanking asc", $_SESSION['current_SeasonID']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);
$totalRows_GetStandings = mysql_num_rows($GetStandings);

$jsonData = '[';
$tmpCurrentRnk = 0;
do {
	$tmpCurrentRnk = $tmpCurrentRnk + 1;	
	$id=$row_GetStandings['Number'];
	$city=$row_GetStandings['City'];
	$name=$row_GetStandings['Name'];
	$rank=$tmpCurrentRnk;
	$url=$DomainName."/team.php?team=".$row_GetStandings['Number'];
	$icon=$DomainName."/image/logos/small/".$row_GetStandings['LogoTiny'];
	$last10 = ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']);
	$streak = $row_GetStandings['Streak'];
	$point = $row_GetStandings['Point'];
	$tmpWinPoints = $row_GetStandings['W'] + (($row_GetStandings['OTL'] + $row_GetStandings['SOL'])/2);
	$teamOverall = ($row_GetStandings['Overall'] - 60);
	//echo "<BR>".$teamOverall;
	if ($tmpWinPoints > 0){
		$winpct = number_format((($tmpWinPoints / $row_GetStandings['GP']) * 80) + $teamOverall, 0);
	} else {
		$winpct = 0;
	}
	$jsonData = $jsonData . '
	{
	"id":"'.$id.'",
	"city":"'.$city.'",
	"name":"'.$name.'",
	"rank":"'.$rank.'",
	"url":"'.$url.'",
	"icon":"'.$icon.'",
	"last10":"'.$last10.'",
	"streak":"'.$streak.'",
	"point":"'.$point.'",
	"winpct":"'.$winpct.'"
	}';
	if($totalRows_GetStandings > $tmpCurrentRnk){
		$jsonData = $jsonData . ',';
	}
} while ($row_GetStandings = mysql_fetch_assoc($GetStandings));
$jsonData = $jsonData . ']';
//$jsonData = json_encode($jsonData);
echo $jsonData;
?>