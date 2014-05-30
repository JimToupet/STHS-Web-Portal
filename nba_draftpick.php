<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
putenv($_SESSION['current_TimeZone']);



$GetPickID = "0";
if (isset($_POST['id'])) {
  $GetPickID = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
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


$query_GetDraftDetails = sprintf("SELECT DraftName FROM draft WHERE D_ID=%s",$GetDraftID);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);

$query_GetDraftList = sprintf("SELECT d.*, p.Number, p.Email, p.EmailAlert, p.Number as Team FROM draftpicks as d, proteam as p WHERE d.D_ID=%s AND d.OwnBy=p.Number",$GetPickID);
$GetDraftList = mysql_query($query_GetDraftList, $connection) or die(mysql_error());
$row_GetDraftList = mysql_fetch_assoc($GetDraftList);

$NBA = "";
$Found = 0;
$NextDraftList = $row_GetDraftList['DraftList'];
if ($row_GetDraftList['Name'] == ""){
if ($row_GetDraftList['DraftList'] != ""){
	$items = explode(',',$row_GetDraftList['DraftList']);
	foreach( $items as $item )
	{
		$query_GetRoster = sprintf("SELECT Name FROM draftpicks Where Year=%s AND Name='%s'", $GET_YEAR, addslashes($item));
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
			$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY Name", $GET_YEAR);
		
		$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
		$row_GetRoster = mysql_fetch_assoc($GetRoster);
		$totalRows_GetRoster = mysql_num_rows($GetRoster);
		
		if ($totalRows_GetRoster == 0){
			$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY Name", $GET_YEAR);
				
			$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
			$row_GetRoster = mysql_fetch_assoc($GetRoster);
		}
		
		$NBA = $row_GetRoster['Name'];
	}
} else {
	if($GET_POSITION == 0){
		$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY  ProspectGrade desc, ProspectLevel asc", $GET_YEAR);
		
	} else if ($GET_POSITION == 5){
		$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '')  AND Position=5 ORDER BY ProspectGrade desc, ProspectLevel asc", $GET_YEAR);
		
	} else {
		$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '')  AND Position = ".$GET_POSITION." ORDER BY  ProspectGrade desc, ProspectLevel asc", $GET_YEAR);
		
	}
	$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
	$row_GetRoster = mysql_fetch_assoc($GetRoster);
	$totalRows_GetRoster = mysql_num_rows($GetRoster);
	
	if ($totalRows_GetRoster == 0){
		$query_GetRoster = sprintf("SELECT Name FROM prospects WHERE (TeamNumber=0 OR TeamNumber='') AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY ProspectGrade desc, ProspectLevel asc", $GET_YEAR);
			
		$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
		$row_GetRoster = mysql_fetch_assoc($GetRoster);
	}
	
	$NBA = $row_GetRoster['Name'];
}

$updateSQL = sprintf("UPDATE draftpicks SET Name=%s, DateCreated=%s WHERE D_ID=%s",
		GetSQLValueString(addslashes($NBA) , "text"),	
		GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
		GetSQLValueString($GetPickID, "int"));
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  
    $MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetDraftList['Team'].": round ".$row_GetDraftList['Round'].", pick ".$row_GetDraftList['Overall']." selection";
	$MailMessage = '<p>'.$row_GetDraftDetails['DraftName'].' has assigned '.addslashes($NBA).' to your team as he was either the next best available on your list or he was the next best available in the overall draft.</p>';
	if ($row_GetDraftList['EmailAlert']==1){
		sendMail($row_GetRounds['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
	}
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

	$query_GetRounds = sprintf("SELECT L.*, P.City, P.Name as TeamName, P.Number, P.EmailAlert, P.Email  FROM draftpicks as L, proteam as P WHERE L.Year=%s AND P.Number=L.OwnBy  AND L.Overall=%s AND L.Round=%s",$GET_YEAR,$tmp_overall,$tmp_round);
	$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
	$row_GetRounds = mysql_fetch_assoc($GetRounds);
	$totalRows_GetRounds = mysql_num_rows($GetRounds);

	if ($totalRows_GetRounds > 0){
		$query_GetLast10 = sprintf("SELECT Name FROM draftpicks WHERE Name <> '' Order By DateCreated desc limit 0,10",$GetPickID);
		$GetLast10 = mysql_query($query_GetLast10, $connection) or die(mysql_error());
		$row_GetLast10 = mysql_fetch_assoc($GetLast10);
		
		do{
			$Playerlist = $Playerlist.'<li>'.$row_GetLast10['Name'].'</li>'; 
		} while ($row_GetLast10 = mysql_fetch_assoc($GetLast10)); 
		
		$MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetRounds['City'].": round ".$tmp_round.", pick ".$tmp_overall;
		$MailMessage = '<p>It is now time to make your selection for the '.$row_GetDraftDetails['DraftName'].'.  You have '.$row_GetDraftDetails['DraftPickTime'].' minutes to log onto the site and make your selection.  If you fail to make your selection within '.$row_GetDraftDetails['DraftPickTime'].' minutes, the site will give you the top rated player on either the list you already created or the top rated player overall.</p><ul>'.$Playerlist.'</ul><p><a href="'.$_SESSION['DomainName'].'/entry_draft.php" target=_blank>Go make my pick now</a></p>';
		if ($row_GetRounds['EmailAlert']==1){
			sendMail($row_GetRounds['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
		}
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
						GetSQLValueString($_SESSION['current_Season'], "text"),
						GetSQLValueString(addslashes($MailMessage), "text"),
						GetSQLValueString($row_GetRounds['Number'], "text"),
						GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
		$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
				
	}
}

if(strlen($NextDraftList) > 5){
	$NextRound = $row_GetDraftList['Round'] + 1;
		$query_GetNextDraftList = sprintf("SELECT D_ID FROM draftpicks as d WHERE d.Round=%s AND d.Year=%s AND d.TeamName=%s",$NextRound,$GET_YEAR,$row_GetDraftList['Team']);
		$GetNextDraftList = mysql_query($query_GetNextDraftList, $connection) or die(mysql_error());
		$row_GetNextDraftList = mysql_fetch_assoc($GetNextDraftList);
		$totalRows_GetNextDraftLis = mysql_num_rows($GetNextDraftList);
		$RoundID=$row_GetNextDraftList['D_ID'];
	
	if ($totalRows_GetNextDraftLis > 0){
		$updateSQL = sprintf("UPDATE draftpicks SET DraftList=%s WHERE D_ID=%s",
			GetSQLValueString($NextDraftList, "text"),	
			GetSQLValueString($RoundID, "int"));
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
}

$updateGoTo = "entry_draft.php";
header(sprintf("Location: %s", $updateGoTo));
?>