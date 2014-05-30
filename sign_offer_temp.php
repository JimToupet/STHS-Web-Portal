<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

$PID_GetPlayer = "Eric O&#039;Dell";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : ParseSQL($_GET['player']);
}
$GetType = "player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}
if($GetType == "goalie"){
	$ContractType="Goalie Offer Sheet Final";
	$ContractSigned="Goalie Signed";
	$query_GetPlayer= sprintf("SELECT Name, Position, Overall FROM goalies WHERE Number=%s ",$PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
} else {
	$ContractType="Offer Sheet Final";	
	$ContractSigned="Signed";
	$query_GetPlayer= sprintf("SELECT Name, Position, Overall FROM players WHERE Number=%s ",$PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
}

$query_GetStatus= sprintf("SELECT  (O.Salary1 + O.Salary2 + O.Salary3 + O.Salary4 + O.Salary5 + O.Salary6 + O.Salary7 + O.Salary8 + O.Salary9 + O.Salary10 + O.bonus + (O.NoTrade * 500000)) as TotalOffer, 
							O.bonus, O.NoTrade, O.NoTradeSalary, O.Salary1, O.Salary2, O.Salary3, O.Salary4, O.Salary5, O.Salary6, O.Salary7, O.Salary8, O.Salary9, O.Salary10, 
							O.Contract, O.Type, O.DateCreated, O.PR_ID, O.Team, 
							T.City, T.Name as TeamName
							FROM playerscontractoffers AS O, proteam AS T 
							WHERE O.Player=%s 
							AND O.Type='%s' 
							AND O.Team=T.Number 
							Order By TotalOffer desc",$PID_GetPlayer, $ContractType);
$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
$row_GetStatus = mysql_fetch_assoc($GetStatus);
$totalRows_GetStatus = mysql_num_rows($GetStatus);
$TeamOfferList = "0";

if($_SESSION['PlayerAI'] == 1){
	$tmpCity = $row_GetStatus['City'];
	$tmpTeamSigned = $row_GetStatus['PR_ID'];
	$rand = 100;
} else {
$rand = rand(1,100);
$tmpRow = 0;
$tmpTeamSigned = 0;
$tmpTeamRow = 0;
$tmpChance = 100;

$tmpCity = "";
$tmpTeamName = "";
$tmpContract = 0;
$tmpSalary1 = 0;
$maxoffer = 0;

$Winner1 = "%item1 choose %item2 because they offered the highest financial package.";
$Winner2 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
$Winner3 = "%item1 takes less money and shocks the hockey world and choose %item2 because because he felt they were a better fit for his career.";

if($totalRows_GetStatus == 3){
	$OfferChance1 = 70;
	$OfferChance2 = 20;
	$OfferChance3 = 10;
} else if($totalRows_GetStatus == 2){
	$OfferChance1 = 70;
	$OfferChance2 = 30;
	$OfferChance3 = 0;
}

echo "<h3>".$row_GetPlayer['Name']." decision time results - ".$row_GetPlayer['Position']." - ".$row_GetPlayer['Overall']."</h3>";


echo "Default odds for team 1 = 70%<br>";
echo "Default odds for team 2 = 20%<br>";
echo "Default odds for team 3 = 10%<br><br>";

echo "<table width=800 border=1 cellpadding=5>";
echo "<tr><td>Team</td><td>years</td><td>Salary1</td><td>no trade</td><td>bonus</td><td align=center>Total Offer</td><td>Difference</td><td>Offset&nbsp;%</td><td>ice time</td><td>Rank</td></tr>";
do { 
	if($maxoffer == 0) { $maxoffer = $row_GetStatus['TotalOffer']; }
	echo "<tr>";
	$tmpRow = $tmpRow + 1;
	if($tmpRow == 1){
		$tmpCity1 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	} else if($tmpRow == 2){
		$tmpCity2 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	}if($tmpRow == 3){
		$tmpCity3 = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
	}
	if($tmpRow == $tmpTeamRow){
		$tmpTeamSigned = $row_GetStatus['PR_ID'];
		$tmpCity = $row_GetStatus['City']." ".$row_GetStatus['TeamName'];
		$tmpTeamName = $row_GetStatus['Team'];
		$tmpContract = $row_GetStatus['Contract'];
		$tmpSalary1 = $row_GetStatus['Salary1'];
		$tmpSalary2 = $row_GetStatus['Salary2'];
		$tmpSalary3 = $row_GetStatus['Salary3'];
		$tmpSalary4 = $row_GetStatus['Salary4'];
		$tmpSalary5 = $row_GetStatus['Salary5'];
		$tmpSalary6 = $row_GetStatus['Salary6'];
		$tmpSalary7 = $row_GetStatus['Salary7'];
		$tmpSalary8 = $row_GetStatus['Salary8'];
		$tmpSalary9 = $row_GetStatus['Salary9'];
		$tmpSalary10 = $row_GetStatus['Salary10'];
		$tmpBonus = $row_GetStatus['bonus'];
	} else {
		$TeamOfferList = $TeamOfferList.",".$row_GetStatus['PR_ID'];	
	}
	if ($row_GetStatus['NoTrade'] == 0){
		$tmpNoTrade = "False";
		$tmpNoTradeDescription = "";
	} else {
		$tmpNoTrade = "True";	
		$tmpNoTradeDescription = " He also has a no trade clause added to his contract. ";
	}
	
	$iceTimeTracker = checkPlayersFuture($row_GetStatus['Team'], $row_GetPlayer['Position'], $row_GetPlayer['Overall'], $connection);
	$offerPct = number_format(($row_GetStatus['TotalOffer']/$maxoffer)*100,0);
	
	if($tmpRow == 2){
		if($offerPct >= 75 && $iceTimeTracker == 0 && $totalRows_GetStatus == 3){	
			$OfferChance1 = 50;
			$OfferChance2 = 40;
			$OfferChance3 = 10;
			$Winner1 = "%item1 choose %item2 because they offered the highest financial package.";
			$Winner2 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
			$Winner3 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
		} else if($offerPct >= 75 && $iceTimeTracker == 0 && $totalRows_GetStatus == 2){	
			$OfferChance1 = 50;
			$OfferChance2 = 50;
			$OfferChance3 = 0;
			$Winner1 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
			$Winner2 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
			$Winner3 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
		}
	} else if ($tmpRow == 3){
		if($offerPct >= 75 && $iceTimeTracker == 0 && $OfferChance2 > 20){	
			$OfferChance1 = 35;
			$OfferChance2 = 35;
			$OfferChance3 = 30;
			$Winner1 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
			$Winner2 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
			$Winner3 = "All the teams offered a package that was very simular so %item1 choose the team that was a better fit for his career.";
		} else if($offerPct >= 75 && $iceTimeTracker == 0 && $OfferChance2 == 20){	
			$OfferChance1 = 50;
			$OfferChance2 = 25;
			$OfferChance3 = 25;
			$Winner1 = "%item1 choose %item2 because they offered the highest financial package.";
			$Winner2 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
			$Winner3 = "Even though offered the %item3 offered the highest financial package, %item1 choose %item2 because because he felt they were a better fit for his career.";
		}
	} 
	
	echo "<tr><td>".$row_GetStatus['City']."</td><td>".$row_GetStatus['Contract']."</td><td>$".number_format($row_GetStatus['Salary1'],0)."</td><td>".$tmpNoTrade."</td><td>$".number_format($row_GetStatus['bonus'],0)."</td><td align=center>$".number_format($row_GetStatus['TotalOffer'],0)."</td><td>-$".number_format($maxoffer-$row_GetStatus['TotalOffer'],0)."</td><td>".$offerPct."%</td><td>".$iceTimeTracker."</td><td>".$tmpRow."</td></tr>";

	echo "</tr>";
} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
mysql_free_result($GetStatus);
echo "</table>";
}

if ($totalRows_GetStatus == 3){
	if ($rand > 0 && $rand < $OfferChance3){
		$tmpTeamRow = 3;
		$Winner = $tmpCity3;
	} else if ($rand >= $OfferChance3 && $rand < ($OfferChance3 + $OfferChance2)){
		$tmpTeamRow = 2;
		$Winner = $tmpCity2;
	} else {
		$tmpTeamRow = 1;
		$Winner = $tmpCity1;
	}
} else if ($totalRows_GetStatus == 2){
	if ($rand > 0 && $rand < $OfferChance2){
		$tmpTeamRow = 2;
		$Winner = $tmpCity2;
	} else {
		$tmpTeamRow = 1;
		$Winner = $tmpCity1;
	}
} else {
	$tmpTeamRow = 1;
	$Winner = $tmpCity1;
}
$Looser = $tmpCity1;

echo "<Br>New odds for team 1 = ".$OfferChance1."%<br>";
echo "New odds for team 2 = ".$OfferChance2."%<br>";
echo "New odds for team 3 = ".$OfferChance3."%<br>";
echo "<p>".$row_GetPlayer['Name']." rolls his magic dice and rolls a <b>".$rand." out of 100</b>.  So, that means, he decides to sign with <b>".$Winner."</b>. </p>";

$tmpTxtItems = array("%item1", "%item2", "%item3");
$updatedTxtItems = array($row_GetPlayer['Name'], $Winner, $Looser);
$Winner1 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner1);
$Winner2 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner2);
$Winner3 = str_replace($tmpTxtItems, $updatedTxtItems, $Winner3);

if($tmpTeamRow == 1){
	echo "<p>".$Winner1."</p>";
} else if ($tmpTeamRow == 2){
	echo "<p>".$Winner2."</p>";	
} else {
	echo "<p>".$Winner3."</p>";
}
?>