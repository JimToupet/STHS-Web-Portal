<?php
$ID_GetAction = "0";
if (isset($_GET['year'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['year'] : addslashes($_GET['year']);
}

//$tmpSeason=$_SESSION['current_Season'];
//echo $_SESSION['current_Season'];
$query_GetDraftPicks = sprintf("SELECT d.*, s.S_ID FROM draft as d, seasons as s WHERE s.SeasonType=1 AND s.Season=d.Season_ID AND d.Season_ID=%s",$tmpSeason);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$totalRows_GetDraftPicks = mysql_num_rows($GetDraftPicks);

if($totalRows_GetDraftPicks > 0){

	$tmpTeamList = $row_GetDraftPicks['LotteryWinner'];
	$tmpCurrentYear = $row_GetDraftPicks['Year'];
	$tmpDivisionLeaderSQL = " DivisionLeader desc, ";
	$tmpGetChamp = 0;
	$tmpLeagueStatusSQL = "";
	if ($_SESSION['JuniorLeague'] == 'False'){	
		$tmpLeagueStatusSQL = " proteamstandings.StandingPlayoffTitle asc, ";
	}
	
	$query_GetStandings = sprintf("SELECT proteam.Number FROM proteamstandings, proteam, seasons WHERE seasons.S_ID=proteamstandings.Season_ID AND proteam.Number=proteamstandings.Number AND seasons.Season=%s AND seasons.SeasonType=1 ORDER BY %s proteamstandings.Point asc, proteamstandings.W asc, proteamstandings.GF asc, proteamstandings.GA desc,  proteamstandings.PowerRanking asc", $row_GetDraftPicks['Season_ID'], $tmpLeagueStatusSQL);
	$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
	$row_GetStandings = mysql_fetch_assoc($GetStandings);
	$totalRows_GetStandings = mysql_num_rows($GetStandings);
	
if ($_SESSION['JuniorLeague'] == 'False'){	

	$query_GetChamp = sprintf("SELECT s.Number FROM proteam as p, proteamstandings as s, seasons as x WHERE p.Number=s.Number AND x.Season=%s AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') AND x.SeasonType=0 ", $row_GetDraftPicks['Season_ID']);
	$GetChamp = mysql_query($query_GetChamp, $connection) or die(mysql_error());
	$row_GetChamp = mysql_fetch_assoc($GetChamp);
	$totalRows_GetChamp = mysql_num_rows($GetChamp);
	
	if($totalRows_GetChamp > 0){
			$tmpTeamList = $tmpTeamList.",".$row_GetChamp['Number'];
			$tmpGetChamp = $row_GetChamp['Number'];
	}
	
	$query_GetRunnerUp = sprintf("SELECT s.Number FROM proteam as p, proteamstandings as s, seasons as x WHERE p.Number=s.Number AND x.Season=%s AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='True' OR s.PlayOffEliminated='Vrai') AND x.SeasonType=0 ORDER BY s.W DESC LIMIT 0,1", $row_GetDraftPicks['Season_ID']);
	$GetRunnerUp= mysql_query($query_GetRunnerUp, $connection) or die(mysql_error());
	$row_GetRunnerUp = mysql_fetch_assoc($GetRunnerUp);
	$totalRows_GetRunnerUp = mysql_num_rows($GetRunnerUp);
	
	if($totalRows_GetRunnerUp > 0){$tmpTeamList = $tmpTeamList.",".$row_GetRunnerUp['Number'];}
	$query_GetConfLooserA = sprintf("SELECT s.VisitorTeam as Number FROM schedule s, seasons as t WHERE t.Season=%s AND t.SeasonType=0 AND s.Season_ID=t.S_ID AND (s.HomeTeam=%s) ORDER BY Day DESC, Number DESC LIMIT 4,1", $row_GetDraftPicks['Season_ID'], $tmpGetChamp);
	$GetConfLooserA= mysql_query($query_GetConfLooserA, $connection) or die(mysql_error());
	$row_GetConfLooserA = mysql_fetch_assoc($GetConfLooserA);
	$totalRows_GetConfLooserA = mysql_num_rows($GetConfLooserA);
	$iFound=0;
	$TeamRecordA=0;
	if($totalRows_GetConfLooserA > 0){
		do {
			if($row_GetConfLooserA['Number']!=$tmpGetChamp && $iFound==0){
				$iFound=1;
				$tmpTeamList = $tmpTeamList.",".$row_GetConfLooserA['Number'];
				$tmpTeamA = $row_GetConfLooserA['Number'];
				$query_GetRegSeason = sprintf("SELECT s.Point, s.StandingPlayoffTitle FROM proteamstandings s, seasons as t WHERE t.Season=%s AND t.SeasonType=1 AND s.Season_ID=t.S_ID AND s.Number=%s", $row_GetDraftPicks['Season_ID'], $row_GetConfLooserA['Number']);
				$GetRegSeason= mysql_query($query_GetRegSeason, $connection) or die(mysql_error());
				$row_GetRegSeason = mysql_fetch_assoc($GetRegSeason);
				$totalRows_GetRegSeason = mysql_num_rows($GetRegSeason);
				$TeamRecordA = $row_GetRegSeason ['Point'];

			}
		} while ($row_GetConfLooserA = mysql_fetch_assoc($GetConfLooserA)); 
	}
	
	$query_GetConfLooserB = sprintf("SELECT s.VisitorTeam as Number FROM schedule s, seasons as t WHERE t.Season=%s AND t.SeasonType=0 AND s.Season_ID=t.S_ID AND (s.HomeTeam=%s) ORDER BY Day DESC, Number DESC LIMIT 4,1", $row_GetDraftPicks['Season_ID'], $row_GetRunnerUp['Number']);
	$GetConfLooserB= mysql_query($query_GetConfLooserB, $connection) or die(mysql_error());
	$row_GetConfLooserB = mysql_fetch_assoc($GetConfLooserB);
	$totalRows_GetConfLooserB = mysql_num_rows($GetConfLooserB);
	$iFound=0;
	$TeamRecordB=0;
	if($totalRows_GetConfLooserB > 0){
		do {
			if($row_GetConfLooserB['Number']!=$row_GetRunnerUp['Number'] && $iFound==0){
				$iFound=1;
				$tmpTeamList = $tmpTeamList.",".$row_GetConfLooserB['Number'];
				$tmpTeamB = $row_GetConfLooserB['Number'];
				$query_GetRegSeason = sprintf("SELECT s.Point, s.StandingPlayoffTitle FROM proteamstandings s, seasons as t WHERE t.Season=%s AND t.SeasonType=1 AND s.Season_ID=t.S_ID AND s.Number=%s", $row_GetDraftPicks['Season_ID'], $row_GetConfLooserB['Number']);
				$GetRegSeason= mysql_query($query_GetRegSeason, $connection) or die(mysql_error());
				$row_GetRegSeason = mysql_fetch_assoc($GetRegSeason);
				$totalRows_GetRegSeason = mysql_num_rows($GetRegSeason);
				$TeamRecordB = $row_GetRegSeason ['Point'];
			}
		} while ($row_GetConfLooserB = mysql_fetch_assoc($GetConfLooserB)); 
	}

	$query_Get1stRound = sprintf("SELECT proteam.Number FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' AND proteam.Number NOT IN (%s) ORDER BY proteamstandings.StandingPlayoffTitle asc, ".$tmpDivisionLeaderSQL." proteamstandings.Point asc, proteamstandings.W asc, proteamstandings.GF desc, proteamstandings.GA asc, proteamstandings.PowerRanking desc", $row_GetDraftPicks['S_ID'], $tmpTeamList);
	$Get1stRound = mysql_query($query_Get1stRound, $connection) or die(mysql_error());
	$row_Get1stRound = mysql_fetch_assoc($Get1stRound);
	$totalRows_Get1stRound = mysql_num_rows($Get1stRound);

	$teamList = array();
	$i = 0;
	do {
		$i = $i + 1;
		$teamList[$i] = $row_Get1stRound['Number'];
	} while ($row_Get1stRound = mysql_fetch_assoc($Get1stRound)); 
	
	
	$teamOtherList = array();
	$i = 0;
	do {
		$i = $i + 1;
		$teamOtherList[$i] = $row_GetStandings['Number'];
		//echo $row_GetStandings['Number'];
	} while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); 
	
	array_unshift($teamList, -(count($teamList) + 1), $row_GetDraftPicks['LotteryWinner']);
	//echo  $tmpTeamA." ".$tmpTeamB."<hr>";
	if($TeamRecordB > $TeamRecordA){
		array_push($teamList, $tmpTeamA, $tmpTeamB, $row_GetRunnerUp['Number'], $tmpGetChamp);
	} else {
		array_push($teamList, $tmpTeamB, $tmpTeamA, $row_GetRunnerUp['Number'], $tmpGetChamp);
	}
	
for( $j = 1; $j <= ($i+5); $j++ )
	{
	//echo $j.". ".$teamList[$j]."<br>";
	
	}
	
	
} else {
	// Junior League
	$teamList = array();
	$teamOtherList = array();
	$i = 0;
	do {
		$i = $i + 1;
		$teamList[$i] = $row_GetStandings['Number'];
		$teamOtherList[$i] = $row_GetStandings['Number'];
	} while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); 
}

} else {
	$teamList="";
	$teamOtherList = "";
}

?>