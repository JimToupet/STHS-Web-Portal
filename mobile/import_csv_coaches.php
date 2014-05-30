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
	$file = $uploaddir . $row_GetSeasons['Coaches'];
	$updateGoTo = "import_csv_prospects.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET Coaches='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process Coaches file.  Please try uploading the file manually in previous page.</h5>";
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
global $TMP_NUMBER;
global $TMP_TEAM;
global $TMP_COUNTRY;
global $TMP_AGE;
global $TMP_PH;
global $TMP_DF;
global $TMP_OF;
global $TMP_PD;
global $TMP_EX;
global $TMP_LD;
global $TMP_PO;
global $TMP_CONTRACT;
global $TMP_SALARY;
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
		$TMP_NAME = ParseSQL($data[0]);
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPlayer = sprintf("SELECT Name FROM coaches WHERE Name='%s'", $TMP_NAME);
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
			
		$TMP_NUMBER=$data[1];
		$TMP_TEAM=$data[2];
		$TMP_COUNTRY=$data[3];
		$TMP_AGE=$data[4];
		$TMP_PH=$data[5];
		$TMP_DF=$data[6];
		$TMP_OF=$data[7];
		$TMP_PD=$data[8];
		$TMP_EX=$data[9];
		$TMP_LD=$data[10];
		$TMP_PO=$data[11];
		$TMP_CONTRACT=$data[12];
		$TMP_SALARY=$data[13];
		$TMP_PROFARM = 'Farm';
		
		if (in_array($TMP_TEAM, $_SESSION['MenuTeamsName'])) {
			$TMP_PROFARM = 'Pro';
		}
		
		echo $TMP_NAME . " " . $TMP_PROFARM . "<br>";

		if ($SQLAction=="INSERT"){
			$insertSQL = sprintf("INSERT INTO coaches (Name,Photo,Number,Team,Country,Age,PH,DF,OF,PD,EX,LD,PO,CONTRACT,SALARY, DateCreated, FarmPro) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_PHOTO, "text"),
				GetSQLValueString($TMP_NUMBER, "double"),
				GetSQLValueString($TMP_TEAM,  "text"),
				GetSQLValueString($TMP_COUNTRY, "text"),
				GetSQLValueString($TMP_AGE, "double"),
				GetSQLValueString($TMP_PH, "double"),
				GetSQLValueString($TMP_DF, "double"),
				GetSQLValueString($TMP_OF, "double"),
				GetSQLValueString($TMP_PD, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_CONTRACT, "double"),
				GetSQLValueString($TMP_SALARY, "int"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_PROFARM, "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			
			$updateSQL = sprintf("UPDATE coaches set Name=%s, Team=%s, Country=%s, Age=%s, PH=%s,DF=%s,OF=%s,PD=%s,EX=%s,LD=%s,PO=%s,CONTRACT=%s,SALARY=%s, DateCreated=%s, FarmPro=%s WHERE Number=%s",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_TEAM,  "text"),
				GetSQLValueString($TMP_COUNTRY, "text"),
				GetSQLValueString($TMP_AGE, "double"),
				GetSQLValueString($TMP_PH, "double"),
				GetSQLValueString($TMP_DF, "double"),
				GetSQLValueString($TMP_OF, "double"),
				GetSQLValueString($TMP_PD, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_CONTRACT, "double"),
				GetSQLValueString($TMP_SALARY, "int"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_PROFARM, "text"),
				GetSQLValueString($TMP_NUMBER, "double")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		}
		$TMP_NAME="";
		$TMP_NUMBER="";
		$TMP_TEAM="";
		$TMP_COUNTRY="";
		$TMP_AGE="";
		$TMP_PH="";
		$TMP_DF="";
		$TMP_OF="";
		$TMP_PD="";
		$TMP_EX="";
		$TMP_LD="";
		$TMP_PO="";
		$TMP_CONTRACT="";
		$TMP_SALARY="";
	}
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedCoaches='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b></h6>\n";
	//header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	//header(sprintf("Location: %s", $updateGoTo));
}
?>