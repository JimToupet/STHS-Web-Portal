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
	$file = $uploaddir . $row_GetSeasons['Transactions'];
	$updateGoTo = "import_send.php";
} else {
	if (allowedExtension($_FILES['xmlFile']['name'],"csv")) {
		$file = $uploaddir . basename($_FILES['xmlFile']['name']);
		$updateGoTo = "upload.php";
		//$file = $uploaddir ."QMJHL0-ProTeam.xml";
		//echo basename($_FILES['xmlFile']['name']);
		if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
			$updateSQL = "UPDATE seasons SET Transactions='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

		} else {
			echo "<h5 align=center>Unable to process transactions file.  Please try uploading the file manually in previous page.</h5>";
			exit();
		}
	}
	else {
		echo "<FORM><div align=center><h3>Unable to upload file.  Please try again.</h3><INPUT TYPE='button' VALUE='Go Back' onClick='history.back()'></FORM></div>";
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

$query_GetInfo = sprintf("SELECT LeagueFile FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);


 //SPIN THROUGH THE RECORDS
//$handle = fopen($_FILES['file']['tmp_name'], "r");
$handle = fopen($file, "r");
$row=0;

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 0){
	
		$TMP_ID=intval($data[0]);
		$TMP_Value=$data[1];
		
		if(is_int($TMP_ID)){
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckHistory = sprintf("SELECT ID FROM transactionhistory WHERE ID=%s AND Season_ID=%s", $TMP_ID, $CurrentSeasonID);
		$CheckHistory = mysql_query($query_CheckHistory, $tmp_simhl) or die(mysql_error());
		$row_CheckHistory = mysql_fetch_assoc($CheckHistory);
		$totalRows_CheckHistory = mysql_num_rows($CheckHistory);				
		if ($totalRows_CheckHistory == 0) {
			$SQLAction="INSERT";
		} else {
			$SQLAction="UPDATE";		
		}
		mysql_free_result($CheckHistory);
		
		if ($SQLAction=="INSERT" && $TMP_Value != ""){
			$TMP_Value = str_replace("\n", " ", $TMP_Value);  
			$TMP_Value = str_replace(chr(10), " ", $TMP_Value); 
			$TMP_Value = str_replace(chr(13), " ", $TMP_Value); 
			$TMP_Value = mysql_real_escape_string($TMP_Value);
			//echo $TMP_ID." ".$TMP_Value."<br>";
			
			 $insertSQL = sprintf("INSERT INTO transactionhistory (Value, DateCreated, ID, Season_ID) VALUES (%s, %s, %s, %s)",
				GetSQLValueString($TMP_Value, "text"),
				GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
				GetSQLValueString($TMP_ID, "int"),
				GetSQLValueString($CurrentSeasonID, "int")
			);
		
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			//echo substr($TMP_Value,strpos($TMP_Value,"] - ") + 4, strpos($TMP_Value," lines for next game are empty")-25)."<BR>";
			if (strpos($TMP_Value,"empty") <> "" ){
				$TMP_NAME = substr($TMP_Value,strpos($TMP_Value,"] - ") + 4, strpos($TMP_Value," lines for next game are empty")-26);
				$query_CheckTeam = sprintf("SELECT Email, EmailAlert FROM proteam WHERE Name='%s'", $TMP_NAME);
				$CheckTeam = mysql_query($query_CheckTeam, $tmp_simhl) or die(mysql_error());
				$row_CheckTeam = mysql_fetch_assoc($CheckTeam);
				$totalRows_CheckTeam = mysql_num_rows($CheckTeam);	
				//echo $TMP_NAME.": ".$totalRows_CheckTeam."<bR>";
				//Hat Trick!
				//Exhaustion
				//completes suspension
				//[8/9/2011 10:16:02 PM] - Last 7 Days Pro Star : 1 - Mike Ribeiro / 2 - Patrick Marleau / 3 - Daniel Alfredsson

				$MailSubject = $tmp_siteName.": ".$TMP_NAME." has invalid lines for next game.";
				$MailMessage = '<h1>Warning!</h1>
				<p>The '.$TMP_NAME.' lines are empty for thier next game.  Please download the league file and update the lineup. </p><p>Having an invalid lineup can either result in the STHS simulator AUTO fixing the lineup or the STHS simulator may not even be able to simulate that evenings schedule.  This could result in a financial fine to your hockey team.</p>
					<div align="center"><br><a href="'.$tmp_DomainName.'/File/'.$row_GetInfo['LeagueFile'].'" target=_blank>DOWNLOAD LEAGUE FILE</a><br><br>'.$tmp_DomainName.'/File/'.$row_GetInfo['LeagueFile'].'</div>
				</td>
				</tr>
				</table>';
				
				if ($row_CheckTeam['Email'] == 1 && $row_CheckTeam['Email'] != ""){
					sendMail($row_CheckTeam['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
				}
				 mysql_free_result($CheckTeam);

			}
		}
	}
	}
	$TMP_ID="";
	$TMP_Value="";

	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedTransactionHistory='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF SCHEDULE COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>