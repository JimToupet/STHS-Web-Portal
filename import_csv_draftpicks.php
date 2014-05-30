<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php


$ID_GetAction = "0";
if (isset($_GET['action'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

set_time_limit(1500);
$uploaddir = 'File/'.$_SESSION['current_SeasonFolder']."/";
global $CurrentSeasonID;
$CurrentSeasonID = $_SESSION['current_SeasonID'];

//echo "<h4 align=center>Importing Draft Picks XML</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['DraftPicks'];
	$updateGoTo = "import_csv_teamhistory.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET DraftPicks='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process the Draft Picks file.  Please try uploading the file manually in previous page.</h5>";
		exit();
	}
}

global $FieldName;
global $RowName;
global $RowActive;
global $LastRow;
global $RowSkip;
global $SQLAction;
global $ActiveSeason;
global $tmp_hostname_simhl;
global $tmp_database_simhl;
global $tmp_username_simhl;
global $tmp_password_simhl;
global $tmp_simhl;
global $TMP_Year;
global $TMP_TeamName;
global $TMP_Round;
global $TMP_OwnBy;
global $TMP_Overall;
global $tmpCurrentYear;

$tmp_hostname_simhl = DB_SERVER;
$tmp_database_simhl = DB_DATABASE;
$tmp_username_simhl = DB_USERNAME;
$tmp_password_simhl = DB_PASSWORD;
$tmp_simhl = $connection;
$tmpCurrentYear=0;
		
mysql_select_db($tmp_database_simhl, $connection);
$query_GetActiveSeason = "SELECT seasons.S_ID FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$ActiveSeason=$row_GetActiveSeason['S_ID'];
mysql_free_result($GetActiveSeason);

$query_GetInfo = sprintf("SELECT * FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);	

if($row_GetInfo['DivisionLeader'] == 'True'){
	$tmpDivisionLeaderSQL = " DivisionLeader desc, ";
} else {
	$tmpDivisionLeaderSQL = "";
}

if ($_SESSION['current_SeasonTypeID'] == 2){
	$tmpSeason = $_SESSION['current_Season']-1;
} else {
	$tmpSeason = $_SESSION['current_Season'];
}
include("update_draft_order.php");


 //SPIN THROUGH THE RECORDS
//$handle = fopen($_FILES['file']['tmp_name'], "r");
$handle = fopen($file, "r");
$row=0;
$LastRound = 0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 0){	
		$TMP_OwnBy=$data[0];
		$TMP_TeamName=$data[1];
		$TMP_Year=$data[2]+1;
		$TMP_Round=$data[3];
		
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPick = "SELECT OwnBy FROM draftpicks WHERE Year=".$TMP_Year." AND TeamName=".$TMP_TeamName." AND Round=".$TMP_Round;
		$CheckPick = mysql_query($query_CheckPick, $tmp_simhl) or die(mysql_error());
		$row_CheckPick = mysql_fetch_assoc($CheckPick);
		$totalRows_CheckPick = mysql_num_rows($CheckPick);				
		if ($totalRows_CheckPick == 0) {
			$SQLAction="INSERT";
		} else {
			$SQLAction="UPDATE";		
		}
		mysql_free_result($CheckPick);
		
		if ($SQLAction=="INSERT"){
			$insertSQL = sprintf("INSERT INTO draftpicks (Year, TeamName, Round, OwnBy) VALUES (%s, %s, %s, %s)",
				GetSQLValueString($TMP_Year, "int"),
				GetSQLValueString($TMP_TeamName, "int"),
				GetSQLValueString($TMP_Round,  "int"),
				GetSQLValueString($TMP_OwnBy, "int")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			
			if ($TMP_Year==$tmpCurrentYear){
					if ($TMP_Round == 1){
						for( $j = 1; $j <= ($i+5); $j++ ){
							if(isset($teamList[$j]) && $TMP_TeamName == $teamList[$j]){
								$TMP_Overall = $TMP_Round * $j;
							}
						}
					} else {
						$tmpCount = 1;
						for( $j = 1; $j <= ($i+5); $j++ ){
							if(isset($teamOtherList[$j]) && $TMP_TeamName == $teamOtherList[$j]){
								$tmpCount = $tmpCount + 1;
								$TMP_Overall = ($TMP_Round * $_SESSION['total_teams']) - $_SESSION['total_teams'] + $j;
								//echo $j." * ".$TMP_Round." = ".$TMP_Overall." alt=".$tmpCount."<BR>";
							}
						}
					}
				
				$updateSQL = sprintf("UPDATE draftpicks set OwnBy=%s, Overall=%s WHERE Year=%s AND TeamName=%s AND Round=%s",
					GetSQLValueString($TMP_OwnBy, "int"),
					GetSQLValueString($TMP_Overall,  "int"),
					GetSQLValueString($TMP_Year, "int"),
					GetSQLValueString($TMP_TeamName, "int"),
					GetSQLValueString($TMP_Round,  "int")
				);
				
					//echo $TMP_Year." ".$tmpCurrentYear." <b>".$TMP_TeamName."</b> - ".$TMP_Round." : ".$TMP_Overall."<Br>";
			} else {
				$updateSQL = sprintf("UPDATE draftpicks set OwnBy=%s WHERE Year=%s AND TeamName=%s AND Round=%s",
					GetSQLValueString($TMP_OwnBy, "int"),
					GetSQLValueString($TMP_Year, "int"),
					GetSQLValueString($TMP_TeamName, "int"),
					GetSQLValueString($TMP_Round,  "int")
				);
			}
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		}
		
		//echo $TMP_OwnBy." - Team ".$TMP_TeamName." - Year ".$TMP_Year." - Round ".$TMP_Round." Overall:".$TMP_Overall." - ".$SQLAction."<br>"; // O\'reilly
			
		$TMP_Year="";
		$TMP_TeamName="";
		$TMP_Round="";
		$TMP_OwnBy="";
		$TMP_Overall="";
		$LastRound = $data[3];
	}
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedDraftPicks='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}
?>