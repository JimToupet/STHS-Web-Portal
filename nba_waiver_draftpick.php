<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
putenv($_SESSION['current_TimeZone']);


$GetPickID = "0";
if (isset($_POST['id'])) {
  $GetPickID = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
} 
$GetTeamID = "0";
if (isset($_POST['team'])) {
  $GetTeamID = (get_magic_quotes_gpc()) ? $_POST['team'] : addslashes($_POST['team']);
} 
$GET_POSITION = "0";
if (isset($_POST['position'])) {
  $GET_POSITION = (get_magic_quotes_gpc()) ? $_POST['position'] : addslashes($_POST['position']);
}
$GET_RATING= "Overall";
if (isset($_POST['rating'])) {
  $GET_RATING = (get_magic_quotes_gpc()) ? $_POST['rating'] : addslashes($_POST['rating']);
}
$GetDraftID = "0";
if (isset($_POST['draft'])) {
  $GetDraftID = (get_magic_quotes_gpc()) ? $_POST['draft'] : addslashes($_POST['draft']);
} 
$GET_ROUND= "0";
if (isset($_POST['round'])) {
  $GET_ROUND = (get_magic_quotes_gpc()) ? $_POST['round'] : addslashes($_POST['round']);
} 
$GET_OVERALL = "0";
if (isset($_POST['overall'])) {
  $GET_OVERALL= (get_magic_quotes_gpc()) ? $_POST['overall'] : addslashes($_POST['overall']);
} 
$GET_YEAR= "0";
if (isset($_POST['year'])) {
  $GET_YEAR = (get_magic_quotes_gpc()) ? $_POST['year'] : addslashes($_POST['year']);
} 

$query_GetDraftDetails = sprintf("SELECT * FROM waiver_draft WHERE D_ID=%s",$GetDraftID);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);

$query_GetDraftList = sprintf("SELECT d.*, p.Number, p.Email, p.EmailAlert, p.Number as Team FROM waiver_draftpicks as d, proteam as p WHERE d.D_ID=%s AND d.TeamName=p.Number",$GetPickID);
$GetDraftList = mysql_query($query_GetDraftList, $connection) or die(mysql_error());
$row_GetDraftList = mysql_fetch_assoc($GetDraftList);

$query_GetEuro = sprintf("SELECT COUNT(Name) as Euros FROM `players` WHERE Country NOT IN ('USA','CAN') AND Retired=0 AND Team=%s",$row_GetDraftList['Team']);
$GetEuro = mysql_query($query_GetEuro, $connection) or die(mysql_error());
$row_GetEuro = mysql_fetch_assoc($GetEuro);
$totalRows_GetEuro = mysql_num_rows($GetEuro);

$query_GetEuroG = sprintf("SELECT COUNT(Name) as Euros FROM `goalies` WHERE Country NOT IN ('USA','CAN') AND Retired=0 AND Team=%s",$row_GetDraftList['Team']);
$GetEuroG = mysql_query($query_GetEuroG, $connection) or die(mysql_error());
$row_GetEuroG = mysql_fetch_assoc($GetEuroG);
$totalRows_GetEuroG = mysql_num_rows($GetEuroG);

$totalEuros = $row_GetEuro['Euros'] + $row_GetEuroG['Euros'];

if($row_GetDraftDetails["Type"] == "Euro"){
	$extra_SQL = " AND Country NOT IN ('CAN', 'USA')";
} else {
	$extra_SQL = "";
}
if ($_SESSION['JuniorLeague'] == 'True'){
	$extra_SQL = $extra_SQL . " AND Age < 20 ";
}

$NBA = "";
$Found = 0;
$NBA_Number = 0;
$NextDraftList = $row_GetDraftList['DraftList'];
if ($row_GetDraftList['Name'] == ""){
if ($row_GetDraftList['DraftList'] != ""){
	$items = explode(',',$row_GetDraftList['DraftList']);
	foreach( $items as $item )
	{
		$query_GetRoster = sprintf("SELECT Name FROM waiver_draftpicks Where Draft_ID=%s AND Name='%s'", $GetDraftID, addslashes($item));
		$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
		$row_GetRoster = mysql_fetch_assoc($GetRoster);
		$totalRows_GetRoster = mysql_num_rows($GetRoster);
		if ($totalRows_GetRoster == 0 && $NBA == ""){
			$NBA = $item;	
			$NextDraftList = str_replace($item.",","",$NextDraftList);
			 break; 
		}
	}
	if ($NBA == ""){
		$query_GetRoster = sprintf("SELECT Name, Number,Overall,PO,LD,EX,DF,SC,PA,FO,PH,DU,ST,SK,DI,FG,CK FROM players WHERE (Contract = 0 OR Team='' OR Team IS NULL) AND Retired=0 AND Suspension<99 AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s UNION ALL SELECT Name, Number,Overall,PO,LD,EX,MO as DF,MO as SC, MO as PA,MO as FO,MO as PH,DU,EN as ST,SK,MO as DI,MO as FG,MO as CK FROM goalies WHERE (Contract = 0 OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99 AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s ORDER BY ".$GET_RATING." desc limit 0,1",$GetDraftID, $extra_SQL, $GetDraftID, $extra_SQL);
		$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
		$row_GetRoster = mysql_fetch_assoc($GetRoster);
		$totalRows_GetRoster = mysql_num_rows($GetRoster);
		
		if ($totalRows_GetRoster == 0){
			$query_GetRoster = sprintf("SELECT Name, Number, Overall FROM players WHERE ((Contract = 0 OR Team=''  OR Team IS NULL) OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s UNION ALL SELECT Name, Number, Overall FROM goalies WHERE (Contract = 0 OR Team=''  OR Team IS NULL)  AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s ORDER BY Overall desc limit 0,1", $GetDraftID, $extra_SQL, $GetDraftID, $extra_SQL);
			$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
			$row_GetRoster = mysql_fetch_assoc($GetRoster);
		}
		
		$NBA = $row_GetRoster['Name'];
		$NBA_Number = $row_GetRoster['Number'];
	}
} else {
	if($GET_POSITION == 0){
			$query_GetRoster = sprintf("SELECT Name, Number,Overall,PO,LD,EX,DF,SC,PA,FO,PH,DU,ST,SK,DI,FG,CK FROM players WHERE (Contract = 0 OR Team=''  OR Team IS NULL)  AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s UNION ALL SELECT Name, Number,Overall,PO,LD,EX,MO as DF,MO as SC, MO as PA,MO as FO,MO as PH,DU,EN as ST,SK,MO as DI,MO as FG,MO as CK FROM goalies WHERE (Contract = 0 OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s ORDER BY ".$GET_RATING." desc limit 0,1", $GetDraftID, $extra_SQL, $GetDraftID, $extra_SQL);
		
	} else if ($GET_POSITION == 5){
			$query_GetRoster = sprintf("SELECT Name, Number, Overall FROM goalies WHERE (Contract = 0 OR Team=''  OR Team IS NULL)  AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) %s ORDER BY ".$GET_RATING." desc limit 0,1", $GetDraftID, $extra_SQL);
		
	} else {
			if($GET_POSITION==1){
				$GET_POSITION_SQL = " AND PosC = 'True' ";
			} else if($GET_POSITION==2){
				$GET_POSITION_SQL = " AND PosLW = 'True' ";
			} else if($GET_POSITION==3){
				$GET_POSITION_SQL = " AND PosRW = 'True' ";
			} else if($GET_POSITION==D){
				$GET_POSITION_SQL = " AND PosD = 'True' ";
			}
			$query_GetRoster = sprintf("SELECT Name, Number,Overall,PO,LD,EX,DF,SC,PA,FO,PH,DU,ST,SK,DI,FG,CK FROM players WHERE (Contract = 0 OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT Name FROM waiver_draftpicks WHERE Draft_ID=%s) ".$GET_POSITION_SQL." %s ORDER BY ".$GET_RATING." desc limit 0,1", $GetDraftID, $extra_SQL, $GetDraftID, $extra_SQL);
		
	}
	$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
	$row_GetRoster = mysql_fetch_assoc($GetRoster);
	$totalRows_GetRoster = mysql_num_rows($GetRoster);
	
	if ($totalRows_GetRoster == 0){
		$query_GetRoster = sprintf("SELECT Name, Number, Overall FROM players WHERE ((Contract = 0 OR Team=''  OR Team IS NULL) OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99 AND Name NOT IN (SELECT p.Name FROM waiver_draftpicks as p WHERE p.Draft_ID=%s AND p.Name <> '') %s UNION ALL SELECT Name, Number, Overall FROM goalies WHERE (Contract = 0 OR Team=''  OR Team IS NULL) AND Retired=0 AND Suspension<99  AND Name NOT IN (SELECT p.Name FROM waiver_draftpicks as p WHERE p.Draft_ID=%s AND p.Name <> '') %s ORDER BY Overall desc limit 0,1", $GetDraftID, $extra_SQL, $GetDraftID, $extra_SQL);		
		$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
		$row_GetRoster = mysql_fetch_assoc($GetRoster);
	}

	$NBA = $row_GetRoster['Name'];
	$NBA_Number = $row_GetRoster['Number'];
}
if ($_SESSION['JuniorLeague'] == 'True'){
	$query_Get50ManAge = sprintf("select (select count(P_ID) as ID from prospects where TeamNumber=P.Number ) as Prospect, (select count(ID) as ID from players where Team=P.Number AND Retired=0) as PAge, (select count(ID) as ID from goalies where Team=P.Number AND Retired=0) as GAge, P.Number, P.Name from proteam as P WHERE P.Number=%s group by P.Number", $GetTeamID);
	$Get50ManAge = mysql_query($query_Get50ManAge, $connection) or die(mysql_error());
	$row_Get50ManAge = mysql_fetch_assoc($Get50ManAge);
	$RosterLimit = $row_Get50ManAge['PAge'] + $row_Get50ManAge['GAge'] + $row_Get50ManAge['Prospect'];
	if($RosterLimit >=50){
		$NBA = "Pass";
	}
}
if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros > 1){
	$MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetDraftList['Team'].": round ".$row_GetDraftList['Round'].", pick ".$row_GetDraftList['Overall']." selection";
	$MailMessage = '<p>Your team passed on this European selection because you would have exceeded the European limit for your roster.</p>';
	$NBA = "Pass";
} else {
	$MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetDraftList['Team'].": round ".$row_GetDraftList['Round'].", pick ".$row_GetDraftList['Overall']." selection";
	$MailMessage = '<p>'.$row_GetDraftDetails['DraftName'].' has assigned '.addslashes($NBA).' to your team as he was either the next best available on your list or he was the next best available in the overall draft.</p>';
	$updateSQL = "UPDATE players SET Team=".$GetTeamID." WHERE Number=".$NBA_Number;
    $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
}
if ($row_GetDraftList['EmailAlert']==1){
	sendMail($row_GetDraftList['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
}		

$updateSQL = sprintf("UPDATE waiver_draftpicks SET Name=%s, DateCreated=%s WHERE D_ID=%s",
		GetSQLValueString(addslashes($NBA) , "text"),	
		GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
		GetSQLValueString($GetPickID, "int"));
  	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
						GetSQLValueString($_SESSION['current_Season'], "text"),
						GetSQLValueString(addslashes($MailMessage), "text"),
						GetSQLValueString($row_GetDraftList['Number'], "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
	if($_SESSION['total_teams'] == $GET_OVERALL){
		$tmp_round = $GET_ROUND + 1;
	} else {		
		$tmp_round = $GET_ROUND;
	}
	$tmp_overall = $GET_OVERALL + 1;

	$query_GetRounds = sprintf("SELECT L.*, P.City, P.Name as TeamName, P.Number, P.EmailAlert, P.Email  FROM waiver_draftpicks as L, proteam as P WHERE L.Draft_ID=%s AND P.Number=L.TeamName  AND L.Overall=%s AND L.Round=%s",$GetDraftID,$tmp_overall,$tmp_round);
	$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
	$row_GetRounds = mysql_fetch_assoc($GetRounds);
	$totalRows_GetRounds = mysql_num_rows($GetRounds);

	if ($totalRows_GetRounds > 0){
		$query_GetLast10 = sprintf("SELECT Name FROM waiver_draftpicks WHERE Name <> '' Order By DateCreated desc limit 0,10",$GetPickID);
		$GetLast10 = mysql_query($query_GetLast10, $connection) or die(mysql_error());
		$row_GetLast10 = mysql_fetch_assoc($GetLast10);
		
		do{
			$Playerlist = $Playerlist.'<li>'.$row_GetLast10['Name'].'</li>'; 
		} while ($row_GetLast10 = mysql_fetch_assoc($GetLast10)); 
		
		$MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetRounds['City'].": round ".$tmp_round.", pick ".$tmp_overall;
		$MailMessage = '<p>It is now time to make your selection for the '.$row_GetDraftDetails['DraftName'].'.  You have '.$row_GetDraftDetails['DraftPickTime'].' minutes to log onto the site and make your selection.  If you fail to make your selection within '.$row_GetDraftDetails['DraftPickTime'].' minutes, the site will give you the top rated player on either the list you already created or the top rated player overall.</p><ul>'.$Playerlist.'</ul><p><a href="'.$_SESSION['DomainName'].'/waiver_draft.php" target=_blank>Go make my pick now</a></p>';
		if ($row_GetRounds['EmailAlert']==1){
			sendMail($row_GetRounds['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
		}		
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString($MailMessage, "text"),
							GetSQLValueString($row_GetRounds['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
		$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
	}
}

if(strlen($NextDraftList) > 5){
		$NextRound = $row_GetDraftList['Round'] + 1;
		$query_GetNextDraftList = sprintf("SELECT D_ID  FROM waiver_draftpicks as d WHERE d.Round=%s AND d.TeamName=%s AND d.Draft_ID=%s",$NextRound,$row_GetDraftList['Team'],$GetDraftID);
		$GetNextDraftList = mysql_query($query_GetNextDraftList, $connection) or die(mysql_error());
		$row_GetNextDraftList = mysql_fetch_assoc($GetNextDraftList);
		$totalRows_GetNextDraftLis = mysql_num_rows($GetNextDraftList);
		$RoundID=$row_GetNextDraftList['D_ID'];
	
	
	if ($totalRows_GetNextDraftLis > 0){
		$updateSQL = sprintf("UPDATE waiver_draftpicks SET DraftList=%s WHERE D_ID=%s",
			GetSQLValueString($NextDraftList, "text"),	
			GetSQLValueString($RoundID, "int"));
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
}

$updateGoTo = "waiver_draft.php";
header(sprintf("Location: %s", $updateGoTo));
?>