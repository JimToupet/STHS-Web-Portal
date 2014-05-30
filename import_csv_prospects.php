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
	$file = $uploaddir . $row_GetSeasons['Prospects'];
	$updateGoTo = "import_csv_draftpicks.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET Prospects='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process Prospects file.  Please try uploading the file manually in previous page.</h5>";
		exit();
	}
}

global $TodaysDate;
$TodaysDate = strftime('%Y-%m-%d', strtotime('now'));
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
global $TMP_NAME;
global $TMP_TEAMNUMBER;
global $TMP_PHOTO;
global $ActiveSeason;
global $CurrentSeasonID;

$tmp_hostname_simhl = DB_SERVER;
$tmp_database_simhl = DB_DATABASE;
$tmp_username_simhl = DB_USERNAME;
$tmp_password_simhl = DB_PASSWORD;
$tmp_simhl = $connection;
mysql_select_db($tmp_database_simhl, $connection);
$query_GetActiveSeason = "SELECT seasons.S_ID FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$ActiveSeason=$row_GetActiveSeason['S_ID'];
mysql_free_result($GetActiveSeason);





 //SPIN THROUGH THE RECORDS
//$handle = fopen($_FILES['file']['tmp_name'], "r");
$handle = fopen($file, "r");
$row=0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 0){			
		
		$TMP_TEAMNUMBER=$data[0];
		$TMP_NAME=ParseSQL($data[1]);
		$TMP_Year=$data[2];
		$TMP_Round=$data[3];
		$TMP_PHOTO=$TMP_NAME.".jpg";

		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPlayer = sprintf("SELECT Name FROM prospects WHERE Name='%s'", $TMP_NAME);
		$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
		$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
		$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);				
		if ($totalRows_CheckPlayer == 0) {
			$SQLAction="INSERT";
		} else {
			$SQLAction="UPDATE";		
		}
		mysql_free_result($CheckPlayer);
		
		//echo $TMP_NAME." - ".$SQLAction."<br>"; // O\'reilly
			
		if ($SQLAction=="INSERT"){
			$insertSQL = sprintf("INSERT INTO prospects (Name,Photo,DateCreated,TeamNumber,DraftYear,OverallPick) VALUES (%s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_PHOTO, "text"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_TEAMNUMBER, "double"),
				GetSQLValueString($TMP_Year, "double"),
				GetSQLValueString($TMP_Round, "double")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			$updateSQL = sprintf("UPDATE prospects set TeamNumber=%s, DateCreated=%s, OverallPick=%s  WHERE Name=%s",
				GetSQLValueString($TMP_TEAMNUMBER, "double"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_Round, "double"),
				GetSQLValueString($TMP_NAME, "text")
			);
			
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		} 
		$TMP_Year="";
		$TMP_TeamName="";
		$TMP_Round="";
		$TMP_OwnBy="";
	}
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedProspects='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE 1</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE 2</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}
?>