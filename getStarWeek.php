<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php

$query_GetPlayerWeek = sprintf("SELECT 'False' as PosG, t.LogoTiny, s.Name, s.Number, s.ProStarPower7Days, ProG as stat1, ProA as stat2,ProPoint as stat3, ProPim as stat4, ProPlusMinus as stat5, GameInRowWithAPoint as stat6 FROM playerstats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number UNION ALL SELECT 'True' as PosG, t.LogoSmall, s.Name, s.Number, s.ProStarPower7Days, ProW as stat1, ProL as stat2,ProOTL as stat3, ProMinPlay as stat4, ProGA as stat5, ProSA as stat6 FROM goaliestats as s, proteam as t WHERE s.Season_ID=%s AND s.Team=t.Number ORDER BY ProStarPower7Days DESC LIMIT 0, 1", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetPlayerWeek = mysql_query($query_GetPlayerWeek, $connection) or die(mysql_error());
$row_GetPlayerWeek = mysql_fetch_assoc($GetPlayerWeek);
$totalRows_GetPlayerWeek = mysql_num_rows($GetPlayerWeek);

$jsonData = '[';
$tmpCurrentRnk = 0;
do {
	if($row_GetPlayerWeek['PosG'] == "True"){ 
		$query_GetPhoto = sprintf("SELECT Photo FROM goalies WHERE Number=%s", $row_GetPlayerWeek['Number']);
		$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
		$url=$DomainName."/goalie.php?player=".$row_GetPlayerWeek['Number'];
		$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
		$pos="g";	
	} else {
		$query_GetPhoto = sprintf("SELECT Photo FROM players WHERE Number=%s", $row_GetPlayerWeek['Number']);
		$GetPhoto = mysql_query($query_GetPhoto, $connection) or die(mysql_error());
		$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
		$url=$DomainName."/player.php?player=".$row_GetPlayerWeek['Number'];
		$pos="s";	
	}
	$number=$row_GetPlayerWeek['Number'];
	$name=$row_GetPlayerWeek['Name'];
	$rank=$row_GetPlayerWeek['ProStarPower7Days'];
	$stat1=$row_GetPlayerWeek['stat1'];
	$stat2=$row_GetPlayerWeek['stat2'];
	$stat3=$row_GetPlayerWeek['stat3'];
	$stat4=$row_GetPlayerWeek['stat4'];
	$stat5=$row_GetPlayerWeek['stat5'];
	$stat6=$row_GetPlayerWeek['stat6'];
	$icon=$DomainName."/image/logos/small/".$row_GetPlayerWeek['LogoTiny'];
	$photo=$DomainName."/image/players/".$row_GetPhoto['Photo'];	
	$jsonData = $jsonData . '
	{
	"number":"'.$number.'",
	"name":"'.$name.'",
	"rank":"'.$rank.'",
	"url":"'.$url.'",
	"icon":"'.$icon.'",
	"photo":"'.$photo.'",
	"pos":"'.$pos.'",
	"stat1":"'.$stat1.'",
	"stat2":"'.$stat2.'",
	"stat3":"'.$stat3.'",
	"stat4":"'.$stat4.'",
	"stat5":"'.$stat5.'",
	"stat6":"'.$stat6.'"
	}';
} while ($row_GetPlayerWeek = mysql_fetch_assoc($GetPlayerWeek));
$jsonData = $jsonData . ']';
//$jsonData = json_encode($jsonData);
echo $jsonData;
?>