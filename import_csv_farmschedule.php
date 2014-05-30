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

//echo "<h4 align=center>Importing Schedule XML</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['FarmSchedule'];
	$updateGoTo = "import_todaysgame.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET FarmSchedule='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process Schedule file.  Please try uploading the file manually in previous page.</h5>";
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
global $TMP_GameNumber;
global $TMP_Day;
global $TMP_Play;
global $TMP_VisitorTeam;
global $TMP_VisitorScore;
global $TMP_HomeTeam;
global $TMP_HomeScore;
global $TMP_Overtime;
global $TMP_ShootOut;
global $PlayoffRound;
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

$PlayoffRound = 0;
if($_SESSION['current_SeasonType']==0){
	$query_PlayoffRound = "SELECT Round FROM farmschedule WHERE Season_ID=".$_SESSION['current_SeasonID']." ORDER BY Round DESC LIMIT 0,1";
	$PlayoffRound = mysql_query($query_PlayoffRound, $connection) or die(mysql_error());
	$row_PlayoffRound = mysql_fetch_assoc($PlayoffRound);
	$totalRows_PlayoffRound = mysql_num_rows($PlayoffRound);
	if($totalRows_PlayoffRound > 0){
		$PlayoffRound=$row_PlayoffRound['Round'];
	} else {
		$PlayoffRound = 0;
	}
}




 //SPIN THROUGH THE RECORDS
//$handle = fopen($_FILES['file']['tmp_name'], "r");
$handle = fopen($file, "r");
$row=0;
$RoundCount=0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 0){
	
		$TMP_GameNumber = $data[0];
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$query_CheckPlayer = sprintf("SELECT Number FROM farmschedule WHERE Number=%s AND Season_ID=%s", $TMP_GameNumber, $ActiveSeason);
			$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
			$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
			$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);				
			if ($totalRows_CheckPlayer == 0) {
				$SQLAction="INSERT";
			} else {
				$SQLAction="UPDATE";		
			}
			mysql_free_result($CheckPlayer);
			
			//echo $TMP_GameNumber." - ".$SQLAction."<br>"; // O\'reilly
		
			$TMP_Day=$data[1];
			$TMP_Play=$data[2];
			$TMP_VisitorTeam=$data[3];
			$TMP_VisitorScore=$data[4];
			$TMP_HomeTeam=$data[5];
			$TMP_HomeScore=$data[6];
			$TMP_Overtime=$data[7];
			$TMP_ShootOut=$data[8];
		
		if ($SQLAction=="INSERT"){
			if($RoundCount==0 && $_SESSION['current_SeasonType']==0){
				$PlayoffRound=$PlayoffRound+1;
				$RoundCount=1;
			}
			$insertSQL = sprintf("INSERT INTO farmschedule (Number,Day,Play,VisitorTeam,VisitorScore,HomeTeam,HomeScore,Overtime,ShootOut,Round,Season_ID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_GameNumber, "double"),
				GetSQLValueString($TMP_Day, "double"),
				GetSQLValueString($TMP_Play, "text"),
				GetSQLValueString($TMP_VisitorTeam,  "text"),
				GetSQLValueString($TMP_VisitorScore, "double"),
				GetSQLValueString($TMP_HomeTeam, "text"),
				GetSQLValueString($TMP_HomeScore, "double"),
				GetSQLValueString($TMP_Overtime, "text"),
				GetSQLValueString($TMP_ShootOut, "text"),
				GetSQLValueString(intval($PlayoffRound), "double"),
				GetSQLValueString($ActiveSeason, "int")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			
			$updateSQL = sprintf("UPDATE farmschedule set Day=%s,Play=%s,VisitorTeam=%s,VisitorScore=%s,HomeTeam=%s,HomeScore=%s,Overtime=%s,ShootOut=%s WHERE Number=%s AND Season_ID=$ActiveSeason",
				GetSQLValueString($TMP_Day, "double"),
				GetSQLValueString($TMP_Play, "text"),
				GetSQLValueString($TMP_VisitorTeam,  "text"),
				GetSQLValueString($TMP_VisitorScore, "double"),
				GetSQLValueString($TMP_HomeTeam, "text"),
				GetSQLValueString($TMP_HomeScore, "double"),
				GetSQLValueString($TMP_Overtime, "text"),
				GetSQLValueString($TMP_ShootOut, "text"),
				GetSQLValueString($TMP_GameNumber, "double")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		}	
	}
	
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedFarmSchedule='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>