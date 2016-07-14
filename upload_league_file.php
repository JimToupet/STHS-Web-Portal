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

if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$filename = $row_GetSeasons['LeagueFile'];
	$updateGoTo = "import_csv_proteam.php?action=1";
	
} else {
	if (allowedExtension($_FILES['leagueFile']['name'],"stc")) {

		$file = $uploaddir . basename($_FILES['leagueFile']['name']);
		$filename = basename($_FILES['leagueFile']['name']);
		//echo basename($_FILES['xmlFile']['name']);
		if (move_uploaded_file($_FILES['leagueFile']['tmp_name'], $file)) {
			//echo "<h4 align=center>Uploading League File</h4>";
			$updateSQL = "UPDATE seasons SET LeagueFile='".$filename."' where S_ID=".$CurrentSeasonID;
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
		} else {
			echo "<FORM><div align=center><h3>Unable to upload file.  Please try again.</h3><INPUT TYPE='button' VALUE='Go Back' onClick='history.back()'></FORM></div>";
			exit();
		}
		$updateGoTo = "upload.php";
	}
	else {
		echo "<FORM><div align=center><h3>Unable to upload file.  Please try again.</h3><INPUT TYPE='button' VALUE='Go Back' onClick='history.back()'></FORM></div>";
		exit();
	}
}

$updateSQL = "UPDATE config SET LastModifiedLeagueFile='".strftime('%Y-%m-%d', strtotime('now'))."', LeagueFile='".$filename."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

header(sprintf("Location: %s", $updateGoTo));
?>