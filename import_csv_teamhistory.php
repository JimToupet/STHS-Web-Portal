<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php

set_time_limit(600);

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
	$file = $uploaddir . $row_GetSeasons['TeamHistory'];
	$updateGoTo = "import_csv_transaction.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET TeamHistory='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process team history file.  Please try uploading the file manually in previous page.</h5>";
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
global $TMP_ID;
global $TMP_Value;
global $TMP_Team;
global $tmp_siteName;
global $tmp_DomainName;
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
	
		$TMP_ID=$data[0];
		$TMP_Team=addslashes($data[1]);
		$TMP_Value=addslashes($data[2]);
		
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckHistory = sprintf("SELECT ID FROM teamhistory WHERE ID=%s AND Season_ID", $TMP_ID, $CurrentSeasonID);
		$CheckHistory = mysql_query($query_CheckHistory, $tmp_simhl) or die(mysql_error());
		$row_CheckHistory = mysql_fetch_assoc($CheckHistory);
		$totalRows_CheckHistory = mysql_num_rows($CheckHistory);				
		if ($totalRows_CheckHistory == 0) {
			$SQLAction="INSERT";
		} else {
			$SQLAction="UPDATE";		
		}
		mysql_free_result($CheckHistory);
		
		if ($SQLAction=="INSERT"){
		
			$insertSQL = sprintf("INSERT INTO teamhistory (Value,Team,DateCreated, ID, Season_ID) VALUES (%s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_Value, "text"),
				GetSQLValueString($TMP_Team, "text"),
				GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
				GetSQLValueString($TMP_ID, "int"),
				GetSQLValueString($CurrentSeasonID, "int")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			/*
			$query_GetPhoto = sprintf("SELECT HeadlineImage FROM proteam WHERE Number=%s", $TMP_Team);
			$GetPhoto = mysql_query($query_GetPhoto, $tmp_simhl) or die(mysql_error());
			$row_GetPhoto = mysql_fetch_assoc($GetPhoto);
			$totalRows_GetPhoto = mysql_num_rows($GetPhoto);	
						
			$dateStartPos = strpos($TMP_Value, '[', 1);
			$dateEndPos = strpos($TMP_Value, ']');
			$tmpDate = substr($TMP_Value, $dateStartPos+1, $dateEndPos-1 );
			$tmpDate = date('Y-m-d', strtotime($tmpDate));
			$tmpHeadlinePos = strpos($TMP_Value, ']');
			$tmpHeadline = substr($TMP_Value, $tmpHeadlinePos+4, strlen($TMP_Value)-($tmpHeadlinePos+4) );
			
			$insertSQL = sprintf("INSERT INTO articles (Headline,Content,Summary,Image,DateCreated,Team,League) values (%s,%s,%s,%s,%s,%s,%s)",
                        GetSQLValueString($tmpHeadline, "text"),
                        GetSQLValueString(ParseSQL($TMP_Value), "text"),
                        GetSQLValueString($tmpHeadline, "text"),
                        GetSQLValueString($row_GetPhoto['HeadlineImage'], "text"),
                       	GetSQLValueString($tmpDate, "date"),
					   	GetSQLValueString($TMP_Team, "text"),
                        GetSQLValueString("False", "text"));
  			$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
			*/
		}
	}
	$TMP_ID="";
	$TMP_Value="";
	$TMP_Team="";

	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedTeamHistory='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF TEAM HISTORY COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF TEAM HISTORY COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}
?>