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

//echo "<h4 align=center>Importing Goalies CSV</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['Goalies'];
	$updateGoTo = "import_csv_schedule.php?action=1";
} else {
	if (allowedExtension($_FILES['xmlFile']['name'],"csv")) {
		$file = $uploaddir . basename($_FILES['xmlFile']['name']);
		$updateGoTo = "upload.php";
		//$file = $uploaddir ."QMJHL0-ProTeam.xml";
		//echo basename($_FILES['xmlFile']['name']);
		if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
			$updateSQL = "UPDATE seasons SET Goalies='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

		} else {
			echo "<h5 align=center>Unable to process Goalies CSV file.  Please try uploading the file manually in previous page.</h5>";
			exit();
		}
	}
	else {
		echo "<FORM><div align=center><h3>Unable to upload file.  Please try again.</h3><INPUT TYPE='button' VALUE='Go Back' onClick='history.back()'></FORM></div>";
		exit();
	}
}

global $TodaysDate;
$TodaysDate = strftime('%Y-%m-%d', strtotime('now'));
global $WaiverAlert;
global $FieldName;
global $RowName;
global $RowActive;
global $LastRow;
global $RowSkip;
global $SQLAction;
global $SQLSeasonAction;
global $ActiveSeason;
global $tmp_hostname_simhl;
global $tmp_database_simhl;
global $tmp_username_simhl;
global $tmp_password_simhl;
global $tmp_simhl;
global $TMP_TEAM;
global $current_status;
global $TMP_NUMBER;
global $TMP_NAME;
global $TMP_URLLink;
global $TMP_TEAM;
global $TMP_Country;
global $TMP_AgeDate;
global $TMP_Weight;
global $TMP_Height;
global $TMP_Contract;
global $TMP_Rookie;
global $TMP_PProtected;
global $TMP_NoApplyRerate;
global $TMP_AvailableforTrade;
global $TMP_NoTrade;
global $TMP_CanPlayPro;
global $TMP_CanPlayFarm;
global $TMP_ForceWaiver;
global $TMP_StarPower;
global $TMP_Salary1;
global $TMP_Salary2;
global $TMP_Salary3;
global $TMP_Salary4;
global $TMP_Salary5;
global $TMP_Salary6;
global $TMP_Salary7;
global $TMP_Salary8;
global $TMP_Salary9;
global $TMP_Salary10;
global $TMP_Injury;
global $TMP_NUMBEROfInjury;
global $TMP_Condition;
global $TMP_Suspension;
global $TMP_Status1;
global $TMP_Status2;
global $TMP_Status3;
global $TMP_Status4;
global $TMP_Status5;
global $TMP_Status6;
global $TMP_Status7;
global $TMP_Status8;
global $TMP_Status9;
global $TMP_Status10;
global $TMP_SK;
global $TMP_DU;
global $TMP_EN;
global $TMP_SZ;
global $TMP_AG;
global $TMP_RB;
global $TMP_SC;
global $TMP_HS;
global $TMP_RT;
global $TMP_PC;
global $TMP_PS;
global $TMP_EX;
global $TMP_LD;
global $TMP_PO;
global $TMP_MO;
global $TMP_Overall;
global $TMP_ProGP;
global $TMP_ProMinPlay;
global $TMP_ProW;
global $TMP_ProL;
global $TMP_ProOTL;
global $TMP_ProShutouts;
global $TMP_ProGA;
global $TMP_ProSA;
global $TMP_ProPim;
global $TMP_ProA;
global $TMP_ProPenalityShotsShots;
global $TMP_ProPenalityShotsGoals;
global $TMP_ProStartGoaler;
global $TMP_ProBackupGoaler;
global $TMP_ProEmptyNetGoal;
global $TMP_ProStar1;
global $TMP_ProStar2;
global $TMP_ProStar3;
global $TMP_FarmGp;
global $TMP_FarmMinPlay;
global $TMP_FarmW;
global $TMP_FarmL;
global $TMP_FarmOTL;
global $TMP_FarmShutouts;
global $TMP_FarmGA;
global $TMP_FarmSA;
global $TMP_FarmPim;
global $TMP_FarmA;
global $TMP_FarmPenalityShotsShots;
global $TMP_FarmPenalityShotsGoals;
global $TMP_FarmStartGoaler;
global $TMP_FarmBackupGoaler;
global $TMP_FarmEmptyNetGoal;
global $TMP_FarmStar1;
global $TMP_FarmStar2;
global $TMP_FarmStar3;
global $TMP_ExcludeFromPayroll;
global $TMP_FarmStarPower7Days;
global $TMP_FarmStarPower30Days;
global $TMP_FarmStarPowerYear;
global $TMP_FarmSARebound;
global $TMP_ProStarPower7Days;
global $TMP_ProStarPower30Days;
global $TMP_ProStarPowerYear;
global $TMP_ProSARebound;
global $TMP_NumberOfInjury;
global $TMP_PROMINPLAY ;
global $TMP_INJURY;
global $TMP_PROSA;
global $TMP_PROSAREBOUND;
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
	
			$TMP_NUMBER=$data[0];		
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$query_CheckPlayer = sprintf("SELECT Status1, Name, Injury, Suspension FROM goalies WHERE Number='%s' AND Retired=0", $TMP_NUMBER);
			$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
			$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
			$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);				
			if ($totalRows_CheckPlayer == 0) {
				$current_status=1;
				$current_injury="";
				$current_suspension=0;
				$SQLAction="INSERT";
				$SQLSeasonAction="INSERT";
			} else {
				$SQLAction="UPDATE";
				$current_status=$row_CheckPlayer['Status1'];
				$current_injury=$row_CheckPlayer['Injury'];
				$current_suspension=$row_CheckPlayer['Suspension'];
				$query_CheckSeason = sprintf("SELECT Season_ID FROM goaliestats WHERE Number=%s AND Season_ID=%s", $TMP_NUMBER, $ActiveSeason);
				$CheckSeason = mysql_query($query_CheckSeason, $tmp_simhl) or die(mysql_error());
				$row_CheckSeason = mysql_fetch_assoc($CheckSeason);
				$totalRows_CheckSeason = mysql_num_rows($CheckSeason);				
				if ($totalRows_CheckSeason == 0) {
					$SQLSeasonAction="INSERT";
				} else {
					$SQLSeasonAction="UPDATE";		
				}
				mysql_free_result($CheckSeason);		
			}
			mysql_free_result($CheckPlayer);
							
			//echo $TMP_NAME." - ".$SQLAction." - ".$SQLSeasonAction." - Status=".$current_status."<br>";
		
			$TMP_NUMBER=$data[0];
			$TMP_NAME=ParseSQL($data[1]);
			$TMP_URLLink=$data[2];
			$TMP_TEAM=$data[3];
			$TMP_Country=$data[4];
			
			$timestamp=strftime($data[5]);
		
			if(substr_count($timestamp,"-") > 0){
				$DateDelim = "-";
			} elseif (substr_count($timestamp,".") > 0){
				$DateDelim = "0";
			} else {
				$DateDelim = "/";
			}
			
			//$TMP_AGEDATE = date("m-d-Y", strtotime($data[5]));
			$TMP_AGEDATE=convertdate($timestamp,$_SESSION['current_DateFormat'],'usa',$DateDelim);
			$TMP_AgeDate=strftime("%m-%d-%Y", strtotime($TMP_AGEDATE));
			//echo $TMP_NAME." - ".$newDate." - age  ".getAge($newDate)."<br>";
			//$TMP_AGEDATE=$data[5];
			$TMP_Weight=$data[6];
			$TMP_Height=$data[7];
			$TMP_Contract=$data[8];
			$TMP_Rookie=$data[9];
			$TMP_PProtected=$data[10];
			$TMP_NoApplyRerate=$data[11];
			$TMP_AvailableforTrade=$data[12];
			$TMP_NoTrade=$data[13];
			$TMP_CanPlayPro=$data[14];
			$TMP_CanPlayFarm=$data[15];
			$TMP_ForceWaiver=$data[16];
			$TMP_StarPower=$data[17];
			$TMP_Salary1=$data[18];
			$TMP_Salary2=$data[19];
			$TMP_Salary3=$data[20];
			$TMP_Salary4=$data[21];
			$TMP_Salary5=$data[22];
			$TMP_Salary6=$data[23];
			$TMP_Salary7=$data[24];
			$TMP_Salary8=$data[25];
			$TMP_Salary9=$data[26];
			$TMP_Salary10=$data[27];
			$TMP_Injury=$data[28];
			$TMP_NUMBEROfInjury=$data[29];
			$TMP_Condition=$data[30];
			$TMP_Suspension=$data[31];
			$TMP_Status1=$data[32];
			$TMP_Status2=$data[33];
			$TMP_Status3=$data[34];
			$TMP_Status4=$data[35];
			$TMP_Status5=$data[36];
			$TMP_Status6=$data[37];
			$TMP_Status7=$data[38];
			$TMP_Status8=$data[39];
			$TMP_Status9=$data[40];
			$TMP_Status10=$data[41];
			$TMP_SK=$data[42];
			$TMP_DU=$data[43];
			$TMP_EN=$data[44];
			$TMP_SZ=$data[45];
			$TMP_AG=$data[46];
			$TMP_RB=$data[47];
			$TMP_SC=$data[48];
			$TMP_HS=$data[49];
			$TMP_RT=$data[50];
			$TMP_PC=$data[51];
			$TMP_PS=$data[52];
			$TMP_EX=$data[53];
			$TMP_LD=$data[54];
			$TMP_PO=$data[55];
			$TMP_MO=$data[56];
			$TMP_Overall=$data[57];
			$TMP_ProGP=$data[58];
			$TMP_ProMinPlay=$data[59];
			$TMP_ProW=$data[60];
			$TMP_ProL=$data[61];
			$TMP_ProOTL=$data[62];
			$TMP_ProShutouts=$data[63];
			$TMP_ProGA=$data[64];
			$TMP_ProSA=$data[65];
			$TMP_ProSARebound=$data[66];
			$TMP_ProPim=$data[67];
			$TMP_ProA=$data[68];
			$TMP_ProPenalityShotsShots=$data[69];
			$TMP_ProPenalityShotsGoals=$data[70];
			$TMP_ProStartGoaler=$data[71];
			$TMP_ProBackupGoaler=$data[72];
			$TMP_ProEmptyNetGoal=$data[73];
			$TMP_ProStar1=$data[74];
			$TMP_ProStar2=$data[75];
			$TMP_ProStar3=$data[76];
			$TMP_ProStarPower7Days=$data[77];
			$TMP_ProStarPower30Days=$data[78];
			$TMP_ProStarPowerYear=$data[79];
			$TMP_FarmGp=$data[80];
			$TMP_FarmMinPlay=$data[81];
			$TMP_FarmW=$data[82];
			$TMP_FarmL=$data[83];
			$TMP_FarmOTL=$data[84];
			$TMP_FarmShutouts=$data[85];
			$TMP_FarmGA=$data[86];
			$TMP_FarmSA=$data[87];
			$TMP_FarmSARebound=$data[88];
			$TMP_FarmPim=$data[89];
			$TMP_FarmA=$data[90];
			$TMP_FarmPenalityShotsShots=$data[91];
			$TMP_FarmPenalityShotsGoals=$data[92];
			$TMP_FarmStartGoaler=$data[93];
			$TMP_FarmBackupGoaler=$data[94];
			$TMP_FarmEmptyNetGoal=$data[95];
			$TMP_FarmStar1=$data[96];
			$TMP_FarmStar2=$data[97];
			$TMP_FarmStar3=$data[98];
			$TMP_FarmStarPower7Days=$data[99];
			$TMP_FarmStarPower30Days=$data[100];
			$TMP_FarmStarPowerYear=$data[101];
			$TMP_ExcludeFromPayroll=$data[102];
			$TMP_PHOTO=$TMP_NAME.".jpg";
	
		if ($SQLAction=="INSERT"){
		
			$insertSQL = sprintf("INSERT INTO goalies (Number, Name, Photo, URLLink, Team, Country, Age, AgeDate, Weight, Height, Contract, Rookie, Protected, NoApplyRerate, AvailableforTrade, NoTrade, CanPlayPro, CanPlayFarm, ForceWaiver, StarPower, Salary1, Salary2, Salary3, Salary4, Salary5, Salary6, Salary7, Salary8, Salary9, Salary10, Injury, NumberOfInjury, CON, Suspension, Status1, Status2, Status3, Status4, Status5, Status6, Status7, Status8, Status9, Status10, SK, DU, EN, SZ, AG, RB, SC, HS, RT, PC, PS, EX, LD, PO, MO, Overall, ExcludeFromPayroll, DateCreated, Retired) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 0)",
				GetSQLValueString($TMP_NUMBER, "double"),
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_PHOTO, "text"),
				GetSQLValueString($TMP_URLLink, "text"),
				GetSQLValueString($TMP_TEAM, "int"),
				GetSQLValueString($TMP_Country, "text"),
				GetSQLValueString(getAge($TMP_AGEDATE), "int"),
				GetSQLValueString($TMP_AGEDATE, "text"),
				GetSQLValueString($TMP_Weight, "double"),
				GetSQLValueString($TMP_Height, "double"),
				GetSQLValueString($TMP_Contract, "double"),
				GetSQLValueString($TMP_Rookie, "text"),
				GetSQLValueString($TMP_PProtected, "text"),
				GetSQLValueString($TMP_NoApplyRerate, "text"),
				GetSQLValueString($TMP_AvailableforTrade, "text"),
				GetSQLValueString($TMP_NoTrade, "text"),
				GetSQLValueString($TMP_CanPlayPro, "text"),
				GetSQLValueString($TMP_CanPlayFarm, "text"),
				GetSQLValueString($TMP_ForceWaiver, "text"),
				GetSQLValueString($TMP_StarPower, "double"),
				GetSQLValueString($TMP_Salary1, "double"),
				GetSQLValueString($TMP_Salary2, "double"),
				GetSQLValueString($TMP_Salary3, "double"),
				GetSQLValueString($TMP_Salary4, "double"),
				GetSQLValueString($TMP_Salary5, "double"),
				GetSQLValueString($TMP_Salary6, "double"),
				GetSQLValueString($TMP_Salary7, "double"),
				GetSQLValueString($TMP_Salary8, "double"),
				GetSQLValueString($TMP_Salary9, "double"),
				GetSQLValueString($TMP_Salary10, "double"),
				GetSQLValueString($TMP_Injury, "text"),
				GetSQLValueString($TMP_NumberOfInjury, "double"),
				GetSQLValueString($TMP_Condition, "int"),
				GetSQLValueString($TMP_Suspension, "double"),
				GetSQLValueString($TMP_Status1, "double"),
				GetSQLValueString($TMP_Status2, "double"),
				GetSQLValueString($TMP_Status3, "double"),
				GetSQLValueString($TMP_Status4, "double"),
				GetSQLValueString($TMP_Status5, "double"),
				GetSQLValueString($TMP_Status6, "double"),
				GetSQLValueString($TMP_Status7, "double"),
				GetSQLValueString($TMP_Status8, "double"),
				GetSQLValueString($TMP_Status9, "double"),
				GetSQLValueString($TMP_Status10, "double"),
				GetSQLValueString($TMP_SK, "double"),
				GetSQLValueString($TMP_DU, "double"),
				GetSQLValueString($TMP_EN, "double"),
				GetSQLValueString($TMP_SZ, "double"),
				GetSQLValueString($TMP_AG, "double"),
				GetSQLValueString($TMP_RB, "double"),
				GetSQLValueString($TMP_SC, "double"),
				GetSQLValueString($TMP_HS, "double"),
				GetSQLValueString($TMP_RT, "double"),
				GetSQLValueString($TMP_PC, "double"),
				GetSQLValueString($TMP_PS, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_MO, "double"),
				GetSQLValueString($TMP_Overall, "double"),
				GetSQLValueString($TMP_ExcludeFromPayroll, "text"),
				GetSQLValueString($TodaysDate, "date")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			$insertSQL = sprintf("INSERT INTO goaliestats (Name, Number, Season_ID, ProGP, ProMinPlay, ProW, ProL, ProOTL, ProShutouts, ProGA, ProSA, ProSARebound, ProPim, ProA, ProPenalityShotsShots, ProPenalityShotsGoals, ProStartGoaler, ProBackupGoaler, ProEmptyNetGoal, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGp, FarmMinPlay, FarmW, FarmL, FarmOTL, FarmShutouts, FarmGA, FarmSA, FarmSARebound, FarmPim, FarmA, FarmPenalityShotsShots, FarmPenalityShotsGoals, FarmStartGoaler, FarmBackupGoaler, FarmEmptyNetGoal, FarmStar1, FarmStar2, FarmStar3, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_NUMBER, "double"),
				GetSQLValueString($ActiveSeason, "int"),
				GetSQLValueString($TMP_ProGP, "double"),
				GetSQLValueString($TMP_ProMinPlay, "double"),
				GetSQLValueString($TMP_ProW, "double"),
				GetSQLValueString($TMP_ProL, "double"),
				GetSQLValueString($TMP_ProOTL, "double"),
				GetSQLValueString($TMP_ProShutouts, "double"),
				GetSQLValueString($TMP_ProGA, "double"),
				GetSQLValueString($TMP_ProSA, "double"),
				GetSQLValueString($TMP_ProSARebound, "double"),
				GetSQLValueString($TMP_ProPim, "double"),
				GetSQLValueString($TMP_ProA, "double"),
				GetSQLValueString($TMP_ProPenalityShotsShots, "double"),
				GetSQLValueString($TMP_ProPenalityShotsGoals, "double"),
				GetSQLValueString($TMP_ProStartGoaler, "double"),
				GetSQLValueString($TMP_ProBackupGoaler, "double"),
				GetSQLValueString($TMP_ProEmptyNetGoal, "double"),
				GetSQLValueString($TMP_ProStar1, "double"),
				GetSQLValueString($TMP_ProStar2, "double"),
				GetSQLValueString($TMP_ProStar3, "double"),
				GetSQLValueString($TMP_ProStarPower7Days, "int"),
				GetSQLValueString($TMP_ProStarPower30Days, "int"),
				GetSQLValueString($TMP_ProStarPowerYear, "int"),
				GetSQLValueString($TMP_FarmGp, "double"),
				GetSQLValueString($TMP_FarmMinPlay, "double"),
				GetSQLValueString($TMP_FarmW, "double"),
				GetSQLValueString($TMP_FarmL, "double"),
				GetSQLValueString($TMP_FarmOTL, "double"),
				GetSQLValueString($TMP_FarmShutouts, "double"),
				GetSQLValueString($TMP_FarmGA, "double"),
				GetSQLValueString($TMP_FarmSA, "double"),
				GetSQLValueString($TMP_FarmSARebound, "double"),
				GetSQLValueString($TMP_FarmPim, "double"),
				GetSQLValueString($TMP_FarmA, "double"),
				GetSQLValueString($TMP_FarmPenalityShotsShots, "double"),
				GetSQLValueString($TMP_FarmPenalityShotsGoals, "double"),
				GetSQLValueString($TMP_FarmStartGoaler, "double"),
				GetSQLValueString($TMP_FarmBackupGoaler, "double"),
				GetSQLValueString($TMP_FarmEmptyNetGoal, "double"),
				GetSQLValueString($TMP_FarmStar1, "double"),
				GetSQLValueString($TMP_FarmStar2, "double"),
				GetSQLValueString($TMP_FarmStar3, "double"),
				GetSQLValueString($TMP_FarmStarPower7Days, "int"),
				GetSQLValueString($TMP_FarmStarPower30Days, "int"),
				GetSQLValueString($TMP_FarmStarPowerYear, "int"),
				GetSQLValueString($TMP_TEAM, "int"),
				GetSQLValueString("True", "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
	
		} elseif ($SQLAction=="UPDATE"){
			$updateSQL = sprintf("UPDATE goalies set Name=%s, URLLink=%s, Team=%s, Country=%s, Age=%s, AgeDate=%s, Weight=%s, Height=%s, Contract=%s, Rookie=%s, Protected=%s, NoApplyRerate=%s, AvailableforTrade=%s, NoTrade=%s, CanPlayPro=%s, CanPlayFarm=%s, ForceWaiver=%s, StarPower=%s, Salary1=%s, Salary2=%s, Salary3=%s, Salary4=%s, Salary5=%s, Salary6=%s, Salary7=%s, Salary8=%s, Salary9=%s, Salary10=%s, Injury=%s, NumberOfInjury=%s, CON=%s, Suspension=%s, Status1=%s, Status2=%s, Status3=%s, Status4=%s, Status5=%s, Status6=%s, Status7=%s, Status8=%s, Status9=%s, Status10=%s, SK=%s, DU=%s, EN=%s, SZ=%s, AG=%s, RB=%s, SC=%s, HS=%s, RT=%s, PC=%s, PS=%s, EX=%s, LD=%s, PO=%s, MO=%s, Overall=%s, ExcludeFromPayroll=%s, DateCreated=%s  WHERE Retired=0 AND Number=%s",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_URLLink, "text"),
				GetSQLValueString($TMP_TEAM, "int"),
				GetSQLValueString($TMP_Country, "text"),
				GetSQLValueString(getAge($TMP_AGEDATE), "int"),
				GetSQLValueString($TMP_AGEDATE, "text"),
				GetSQLValueString($TMP_Weight, "double"),
				GetSQLValueString($TMP_Height, "double"),
				GetSQLValueString($TMP_Contract, "double"),
				GetSQLValueString($TMP_Rookie, "text"),
				GetSQLValueString($TMP_PProtected, "text"),
				GetSQLValueString($TMP_NoApplyRerate, "text"),
				GetSQLValueString($TMP_AvailableforTrade, "text"),
				GetSQLValueString($TMP_NoTrade, "text"),
				GetSQLValueString($TMP_CanPlayPro, "text"),
				GetSQLValueString($TMP_CanPlayFarm, "text"),
				GetSQLValueString($TMP_ForceWaiver, "text"),
				GetSQLValueString($TMP_StarPower, "double"),
				GetSQLValueString($TMP_Salary1, "double"),
				GetSQLValueString($TMP_Salary2, "double"),
				GetSQLValueString($TMP_Salary3, "double"),
				GetSQLValueString($TMP_Salary4, "double"),
				GetSQLValueString($TMP_Salary5, "double"),
				GetSQLValueString($TMP_Salary6, "double"),
				GetSQLValueString($TMP_Salary7, "double"),
				GetSQLValueString($TMP_Salary8, "double"),
				GetSQLValueString($TMP_Salary9, "double"),
				GetSQLValueString($TMP_Salary10, "double"),
				GetSQLValueString($TMP_Injury, "text"),
				GetSQLValueString($TMP_NumberOfInjury, "double"),
				GetSQLValueString($TMP_Condition, "int"),
				GetSQLValueString($TMP_Suspension, "double"),
				GetSQLValueString($TMP_Status1, "double"),
				GetSQLValueString($TMP_Status2, "double"),
				GetSQLValueString($TMP_Status3, "double"),
				GetSQLValueString($TMP_Status4, "double"),
				GetSQLValueString($TMP_Status5, "double"),
				GetSQLValueString($TMP_Status6, "double"),
				GetSQLValueString($TMP_Status7, "double"),
				GetSQLValueString($TMP_Status8, "double"),
				GetSQLValueString($TMP_Status9, "double"),
				GetSQLValueString($TMP_Status10, "double"),
				GetSQLValueString($TMP_SK, "double"),
				GetSQLValueString($TMP_DU, "double"),
				GetSQLValueString($TMP_EN, "double"),
				GetSQLValueString($TMP_SZ, "double"),
				GetSQLValueString($TMP_AG, "double"),
				GetSQLValueString($TMP_RB, "double"),
				GetSQLValueString($TMP_SC, "double"),
				GetSQLValueString($TMP_HS, "double"),
				GetSQLValueString($TMP_RT, "double"),
				GetSQLValueString($TMP_PC, "double"),
				GetSQLValueString($TMP_PS, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_MO, "double"),
				GetSQLValueString($TMP_Overall, "double"),
				GetSQLValueString($TMP_ExcludeFromPayroll, "text"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_NUMBER, "double")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
			if ($SQLSeasonAction=="INSERT" && $TMP_TEAM > 0){

				if ($TMP_TEAM >> 0 ){
				
				$query_CheckStats = sprintf("SELECT SUM(ProSARebound) as ProSARebound, SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmSARebound) as FarmSARebound, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProGP) as ProGP,SUM(ProMinPlay) as ProMinPlay,SUM(ProW) as ProW,SUM(ProL) as ProL,SUM(ProOTL) as ProOTL, SUM(ProShutouts) as ProShutouts, SUM(ProGA) as ProGA, SUM(ProSA) as ProSA, SUM(ProPim) as ProPim, SUM(ProA) as ProA, SUM(ProPenalityShotsShots) as ProPenalityShotsShots, SUM(ProPenalityShotsGoals) as ProPenalityShotsGoals, SUM(ProStartGoaler) as ProStartGoaler, SUM(ProBackupGoaler) as ProBackupGoaler, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGp) as FarmGp, SUM(FarmMinPlay) as FarmMinPlay, SUM(FarmW) as FarmW, SUM(FarmL) as FarmL, SUM(FarmOTL) as FarmOTL, SUM(FarmShutouts) as FarmShutouts, SUM(FarmGA) as FarmGA, SUM(FarmSA) as FarmSA, SUM(FarmPim) as FarmPim, SUM(FarmA) as FarmA, SUM(FarmPenalityShotsShots) as FarmPenalityShotsShots, SUM(FarmPenalityShotsGoals) as FarmPenalityShotsGoals, SUM(FarmStartGoaler) as FarmStartGoaler, SUM(FarmBackupGoaler) as FarmBackupGoaler, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3 FROM goaliestats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
					$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
					$row_CheckStats = mysql_fetch_assoc($CheckStats);	
					$totalRows_CheckStats = mysql_num_rows($CheckStats);	
					
					$updateSQL = sprintf("UPDATE goaliestats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
							mysql_select_db($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());		
						
			
					if ($row_CheckStats["ProMinPlay"] > 0){
						$TMP_NEW_PROMINPLAY = $TMP_PROMINPLAY - $row_CheckStats["ProMinPlay"];
					} else {
						$TMP_NEW_PROMINPLAY = 0;
					}
					if ($row_CheckStats["ProSA"] > 0){
						$TMP_NEW_PROSA = $TMP_PROSA - $row_CheckStats["ProSA"];
					} else {
						$TMP_NEW_PROSA = 0;
					}
					if ($row_CheckStats["ProSARebound"] > 0){
						$TMP_NEW_PROSAREBOUND = $TMP_PROSAREBOUND - $row_CheckStats["ProSARebound"];
					} else {
						$TMP_NEW_PROSAREBOUND = 0;
					}
					if ($row_CheckStats["FarmSARebound"] > 0){
						$TMP_NEW_FARMSAREBOUND = $TMP_FARMSAREBOUND - $row_CheckStats["FarmSARebound"];
					} else {
						$TMP_NEW_FARMSAREBOUND = 0;
					}
					if ($row_CheckStats["FarmMinPlay"] > 0){
						$TMP_NEW_FARMMINPLAY = $TMP_FARMMINPLAY - $row_CheckStats["FarmMinPlay"];
					} else {
						$TMP_NEW_FARMMINPLAY = 0;
					}
					if ($row_CheckStats["FarmSA"] > 0){
						$TMP_NEW_FARMSA = $TMP_FARMSA - $row_CheckStats["FarmSA"];
					} else {
						$TMP_NEW_FARMSA = 0;
					}
						
				$insertSQL = sprintf("INSERT INTO goaliestats (Name, Number, Season_ID, ProGP, ProMinPlay, ProW, ProL, ProOTL, ProShutouts, ProGA, ProSA, ProSARebound, ProPim, ProA, ProPenalityShotsShots, ProPenalityShotsGoals, ProStartGoaler, ProBackupGoaler, ProEmptyNetGoal, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGp, FarmMinPlay, FarmW, FarmL, FarmOTL, FarmShutouts, FarmGA, FarmSA, FarmSARebound, FarmPim, FarmA, FarmPenalityShotsShots, FarmPenalityShotsGoals, FarmStartGoaler, FarmBackupGoaler, FarmEmptyNetGoal, FarmStar1, FarmStar2, FarmStar3, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					GetSQLValueString($TMP_NAME, "text"),
					GetSQLValueString($TMP_NUMBER, "double"),
					GetSQLValueString($ActiveSeason, "int"),
					GetSQLValueString(number_format($TMP_ProGP - $row_CheckStats["ProGP"]), "double"),
					GetSQLValueString($TMP_ProMinPlay - $row_CheckStats["ProMinPlay"], "double"),
					GetSQLValueString(number_format($TMP_ProW - $row_CheckStats["ProW"]), "double"),
					GetSQLValueString(number_format($TMP_ProL - $row_CheckStats["ProL"]), "double"),
					GetSQLValueString(number_format($TMP_ProOTL - $row_CheckStats["ProOTL"]), "double"),
					GetSQLValueString(number_format($TMP_ProShutouts - $row_CheckStats["ProShutouts"]), "double"),
					GetSQLValueString(number_format($TMP_ProGA - $row_CheckStats["ProGA"]), "double"),
					GetSQLValueString($TMP_ProSA - $row_CheckStats["ProSA"], "double"),
					GetSQLValueString($TMP_ProSARebound - $row_CheckStats["ProSARebound"], "double"),
					GetSQLValueString(number_format($TMP_ProPim - $row_CheckStats["ProPim"]), "double"),
					GetSQLValueString(number_format($TMP_ProA - $row_CheckStats["ProA"]), "double"),
					GetSQLValueString(number_format($TMP_ProPenalityShotsShots - $row_CheckStats["ProPenalityShotsShots"]), "double"),
					GetSQLValueString(number_format($TMP_ProPenalityShotsGoals - $row_CheckStats["ProPenalityShotsGoals"]), "double"),
					GetSQLValueString(number_format($TMP_ProStartGoaler - $row_CheckStats["ProStartGoaler"]), "double"),
					GetSQLValueString(number_format($TMP_ProBackupGoaler - $row_CheckStats["ProBackupGoaler"]), "double"),
					GetSQLValueString(number_format($TMP_ProEmptyNetGoal - $row_CheckStats["ProEmptyNetGoal"]), "double"),
					GetSQLValueString(number_format($TMP_ProStar1 - $row_CheckStats["ProStar1"]), "double"),
					GetSQLValueString(number_format($TMP_ProStar2 - $row_CheckStats["ProStar2"]), "double"),
					GetSQLValueString(number_format($TMP_ProStar3 - $row_CheckStats["ProStar3"]), "double"),
					GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "int"),
					GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
					GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
					GetSQLValueString(number_format($TMP_FarmGp - $row_CheckStats["Farm"]), "double"),
					GetSQLValueString($TMP_FarmMinPlay - $row_CheckStats["FarmMinPlay"], "double"),
					GetSQLValueString(number_format($TMP_FarmW - $row_CheckStats["FarmW"]), "double"),
					GetSQLValueString(number_format($TMP_FarmL - $row_CheckStats["FarmL"]), "double"),
					GetSQLValueString(number_format($TMP_FarmOTL - $row_CheckStats["FarmOTL"]), "double"),
					GetSQLValueString(number_format($TMP_FarmShutouts - $row_CheckStats["FarmShutouts"]), "double"),
					GetSQLValueString(number_format($TMP_FarmGA - $row_CheckStats["FarmGA"]), "double"),
					GetSQLValueString($TMP_FarmSA - $row_CheckStats["FarmSA"], "double"),
					GetSQLValueString($TMP_FarmSARebound - $row_CheckStats["FarmSARebound"], "double"),
					GetSQLValueString(number_format($TMP_FarmPim - $row_CheckStats["FarmPim"]), "double"),
					GetSQLValueString(number_format($TMP_FarmA - $row_CheckStats["FarmA"]), "double"),
					GetSQLValueString(number_format($TMP_FarmPenalityShotsShots - $row_CheckStats["FarmPenalityShotsShots"]), "double"),
					GetSQLValueString(number_format($TMP_FarmPenalityShotsGoals - $row_CheckStats["FarmPenalityShotsGoals"]), "double"),
					GetSQLValueString(number_format($TMP_FarmStartGoaler - $row_CheckStats["FarmStartGoaler"]), "double"),
					GetSQLValueString(number_format($TMP_FarmBackupGoaler - $row_CheckStats["FarmBackupGoaler"]), "double"),
					GetSQLValueString(number_format($TMP_FarmEmptyNetGoal - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
					GetSQLValueString(number_format($TMP_FarmStar1 - $row_CheckStats["FarmStar1"]), "double"),
					GetSQLValueString(number_format($TMP_FarmStar2 - $row_CheckStats["FarmStar2"]), "double"),
					GetSQLValueString(number_format($TMP_FarmStar3 - $row_CheckStats["FarmStar3"]), "double"),
					GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "int"),
					GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
					GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
					GetSQLValueString($TMP_TEAM, "int"),
					GetSQLValueString("True", "text")
				);
				
				mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
				
				}
				
			} elseif ($SQLSeasonAction=="UPDATE" && $TMP_TEAM > 0 ){
			
				$query_CheckSeason = sprintf("SELECT Season_ID FROM goaliestats WHERE Name='%s' AND Season_ID=%s", $TMP_NAME, $ActiveSeason);
					$CheckSeason = mysql_query($query_CheckSeason, $tmp_simhl) or die(mysql_error());
					$row_CheckSeason = mysql_fetch_assoc($CheckSeason);
					$totalRows_CheckSeason = mysql_num_rows($CheckSeason);		
			
				if ($totalRows_CheckSeason >> 1) {
	
					$query_CheckStats = sprintf("SELECT SUM(ProSARebound) as ProSARebound, SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmSARebound) as FarmSARebound, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProGP) as ProGP,SUM(ProMinPlay) as ProMinPlay,SUM(ProW) as ProW,SUM(ProL) as ProL,SUM(ProOTL) as ProOTL, SUM(ProShutouts) as ProShutouts, SUM(ProGA) as ProGA, SUM(ProSA) as ProSA, SUM(ProPim) as ProPim, SUM(ProA) as ProA, SUM(ProPenalityShotsShots) as ProPenalityShotsShots, SUM(ProPenalityShotsGoals) as ProPenalityShotsGoals, SUM(ProStartGoaler) as ProStartGoaler, SUM(ProBackupGoaler) as ProBackupGoaler, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGp) as FarmGp, SUM(FarmMinPlay) as FarmMinPlay, SUM(FarmW) as FarmW, SUM(FarmL) as FarmL, SUM(FarmOTL) as FarmOTL, SUM(FarmShutouts) as FarmShutouts, SUM(FarmGA) as FarmGA, SUM(FarmSA) as FarmSA, SUM(FarmPim) as FarmPim, SUM(FarmA) as FarmA, SUM(FarmPenalityShotsShots) as FarmPenalityShotsShots, SUM(FarmPenalityShotsGoals) as FarmPenalityShotsGoals, SUM(FarmStartGoaler) as FarmStartGoaler, SUM(FarmBackupGoaler) as FarmBackupGoaler, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3 FROM goaliestats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
					$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
					$row_CheckStats = mysql_fetch_assoc($CheckStats);	
					$totalRows_CheckStats = mysql_num_rows($CheckStats);		
					
					$query_CheckTeam = sprintf("SELECT Team FROM goaliestats WHERE Name='%s' AND Season_ID=%s AND Active='True'", $TMP_NAME, $ActiveSeason);
					$CheckTeam = mysql_query($query_CheckTeam, $tmp_simhl) or die(mysql_error());
					$row_CheckTeam = mysql_fetch_assoc($CheckTeam);
					$totalRows_CheckTeam = mysql_num_rows($CheckTeam);	

					if ($row_CheckTeam['Team'] == $TMP_TEAM) {

						if ($row_CheckStats["ProMinPlay"] > 0){
							$TMP_NEW_PROMINPLAY = $TMP_PROMINPLAY - $row_CheckStats["ProMinPlay"];
						} else {
							$TMP_NEW_PROMINPLAY = 0;
						}
						if ($row_CheckStats["ProSA"] > 0){
							$TMP_NEW_PROSA = $TMP_PROSA - $row_CheckStats["ProSA"];
						} else {
							$TMP_NEW_PROSA = 0;
						}
						if ($row_CheckStats["ProSARebound"] > 0){
							$TMP_NEW_PROSAREBOUND = $TMP_PROSAREBOUND - $row_CheckStats["ProSARebound"];
						} else {
							$TMP_NEW_PROSAREBOUND = 0;
						}
						if ($row_CheckStats["FarmSARebound"] > 0){
							$TMP_NEW_FARMSAREBOUND = $TMP_FARMSAREBOUND - $row_CheckStats["FarmSARebound"];
						} else {
							$TMP_NEW_FARMSAREBOUND = 0;
						}
						if ($row_CheckStats["FarmMinPlay"] > 0){
							$TMP_NEW_FARMMINPLAY = $TMP_FARMMINPLAY - $row_CheckStats["FarmMinPlay"];
						} else {
							$TMP_NEW_FARMMINPLAY = 0;
						}
						if ($row_CheckStats["FarmSA"] > 0){
							$TMP_NEW_FARMSA = $TMP_FARMSA - $row_CheckStats["FarmSA"];
						} else {
							$TMP_NEW_FARMSA = 0;
						}
							
							$updateSQL = sprintf("UPDATE goaliestats set ProGP=%s, ProMinPlay=%s, ProW=%s, ProL=%s, ProOTL=%s, ProShutouts=%s, ProGA=%s, ProSA=%s, ProSARebound=%s, ProPim=%s, ProA=%s, ProPenalityShotsShots=%s, ProPenalityShotsGoals=%s, ProStartGoaler=%s, ProBackupGoaler=%s, ProEmptyNetGoal=%s, ProStar1=%s, ProStar2=%s, ProStar3=%s, ProStarPower7Days=%s, ProStarPower30Days=%s, ProStarPowerYear=%s, FarmGp=%s, FarmMinPlay=%s, FarmW=%s, FarmL=%s, FarmOTL=%s, FarmShutouts=%s, FarmGA=%s, FarmSA=%s, FarmSARebound=%s, FarmPim=%s, FarmA=%s, FarmPenalityShotsShots=%s, FarmPenalityShotsGoals=%s, FarmStartGoaler=%s, FarmBackupGoaler=%s, FarmEmptyNetGoal=%s, FarmStar1=%s, FarmStar2=%s, FarmStar3=%s, FarmStarPower7Days=%s, FarmStarPower30Days=%s, FarmStarPowerYear=%s, Team=%s WHERE Season_ID=$ActiveSeason AND Active='True' AND Number=%s",
							GetSQLValueString(number_format($TMP_ProGP - $row_CheckStats["ProGP"]), "double"),
							GetSQLValueString($TMP_ProMinPlay - $row_CheckStats["ProMinPlay"], "double"),
							GetSQLValueString(number_format($TMP_ProW - $row_CheckStats["ProW"]), "double"),
							GetSQLValueString(number_format($TMP_ProL - $row_CheckStats["ProL"]), "double"),
							GetSQLValueString(number_format($TMP_ProOTL - $row_CheckStats["ProOTL"]), "double"),
							GetSQLValueString(number_format($TMP_ProShutouts - $row_CheckStats["Pro"]), "double"),
							GetSQLValueString(number_format($TMP_ProGA - $row_CheckStats["ProGA"]), "double"),
							GetSQLValueString($TMP_ProSA - $row_CheckStats["ProSA"], "double"),
							GetSQLValueString($TMP_ProSARebound - $row_CheckStats["ProSARebound"], "double"),
							GetSQLValueString(number_format($TMP_ProPim - $row_CheckStats["ProPim"]), "double"),
							GetSQLValueString(number_format($TMP_ProA - $row_CheckStats["ProA"]), "double"),
							GetSQLValueString(number_format($TMP_ProPenalityShotsShots - $row_CheckStats["ProPenalityShotsShots"]), "double"),
							GetSQLValueString(number_format($TMP_ProPenalityShotsGoals - $row_CheckStats["ProPenalityShotsGoals"]), "double"),
							GetSQLValueString(number_format($TMP_ProStartGoaler - $row_CheckStats["ProStartGoaler"]), "double"),
							GetSQLValueString(number_format($TMP_ProBackupGoaler - $row_CheckStats["ProBackupGoaler"]), "double"),
							GetSQLValueString(number_format($TMP_ProEmptyNetGoal - $row_CheckStats["ProEmptyNetGoal"]), "double"),
							GetSQLValueString(number_format($TMP_ProStar1 - $row_CheckStats["ProStar1"]), "double"),
							GetSQLValueString(number_format($TMP_ProStar2 - $row_CheckStats["ProStar2"]), "double"),
							GetSQLValueString(number_format($TMP_ProStar3 - $row_CheckStats["ProStar3"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "int"),
							GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
							GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
							GetSQLValueString(number_format($TMP_FarmGp - $row_CheckStats["FarmGp"]), "double"),
							GetSQLValueString($TMP_FarmMinPlay - $row_CheckStats["FarmMinPlay"], "double"),
							GetSQLValueString(number_format($TMP_FarmW - $row_CheckStats["FarmW"]), "double"),
							GetSQLValueString(number_format($TMP_FarmL - $row_CheckStats["FarmL"]), "double"),
							GetSQLValueString(number_format($TMP_FarmOTL - $row_CheckStats["FarmOTL"]), "double"),
							GetSQLValueString(number_format($TMP_FarmShutouts - $row_CheckStats["FarmShutouts"]), "double"),
							GetSQLValueString(number_format($TMP_FarmGA - $row_CheckStats["FarmGA"]), "double"),
							GetSQLValueString($TMP_FarmSA - $row_CheckStats["FarmSA"], "double"),
							GetSQLValueString($TMP_FarmSARebound - $row_CheckStats["FarmSARebound"], "double"),
							GetSQLValueString(number_format($TMP_FarmPim - $row_CheckStats["FarmPim"]), "double"),
							GetSQLValueString(number_format($TMP_FarmA - $row_CheckStats["FarmA"]), "double"),
							GetSQLValueString(number_format($TMP_FarmPenalityShotsShots - $row_CheckStats["FarmPenalityShotsShots"]), "double"),
							GetSQLValueString(number_format($TMP_FarmPenalityShotsGoals - $row_CheckStats["FarmPenalityShotsGoals"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStartGoaler - $row_CheckStats["FarmStartGoaler"]), "double"),
							GetSQLValueString(number_format($TMP_FarmBackupGoaler - $row_CheckStats["FarmBackupGoaler"]), "double"),
							GetSQLValueString(number_format($TMP_FarmEmptyNetGoal - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStar1 - $row_CheckStats["FarmStar1"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStar2 - $row_CheckStats["FarmStar2"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStar3 - $row_CheckStats["FarmStar3"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "int"),
							GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
							GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
							GetSQLValueString($TMP_TEAM, "int"),
							GetSQLValueString($TMP_NUMBER, "double")
						);
						
						mysql_select_db($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
				
					} else {
					
						if ($TMP_TEAM > 0 ){
							
							$query_CheckStats = sprintf("SELECT SUM(ProSARebound) as ProSARebound, SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmSARebound) as FarmSARebound, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProGP) as ProGP,SUM(ProMinPlay) as ProMinPlay,SUM(ProW) as ProW,SUM(ProL) as ProL,SUM(ProOTL) as ProOTL, SUM(ProShutouts) as ProShutouts, SUM(ProGA) as ProGA, SUM(ProSA) as ProSA, SUM(ProPim) as ProPim, SUM(ProA) as ProA, SUM(ProPenalityShotsShots) as ProPenalityShotsShots, SUM(ProPenalityShotsGoals) as ProPenalityShotsGoals, SUM(ProStartGoaler) as ProStartGoaler, SUM(ProBackupGoaler) as ProBackupGoaler, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGp) as FarmGp, SUM(FarmMinPlay) as FarmMinPlay, SUM(FarmW) as FarmW, SUM(FarmL) as FarmL, SUM(FarmOTL) as FarmOTL, SUM(FarmShutouts) as FarmShutouts, SUM(FarmGA) as FarmGA, SUM(FarmSA) as FarmSA, SUM(FarmPim) as FarmPim, SUM(FarmA) as FarmA, SUM(FarmPenalityShotsShots) as FarmPenalityShotsShots, SUM(FarmPenalityShotsGoals) as FarmPenalityShotsGoals, SUM(FarmStartGoaler) as FarmStartGoaler, SUM(FarmBackupGoaler) as FarmBackupGoaler, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3 FROM goaliestats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
							$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
							$row_CheckStats = mysql_fetch_assoc($CheckStats);	
							$totalRows_CheckStats = mysql_num_rows($CheckStats);		
							
							$updateSQL = sprintf("UPDATE goaliestats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
							mysql_select_db($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());		
						
								if ($row_CheckStats["ProMinPlay"] > 0){
									$TMP_NEW_PROMINPLAY = $TMP_PROMINPLAY - $row_CheckStats["ProMinPlay"];
								} else {
									$TMP_NEW_PROMINPLAY = 0;
								}
								if ($row_CheckStats["ProSA"] > 0){
									$TMP_NEW_PROSA = $TMP_PROSA - $row_CheckStats["ProSA"];
								} else {
									$TMP_NEW_PROSA = 0;
								}
								
								if ($row_CheckStats["ProSARebound"] > 0){
									$TMP_NEW_PROSAREBOUND = $TMP_PROSAREBOUND - $row_CheckStats["ProSARebound"];
								} else {
									$TMP_NEW_PROSAREBOUND = 0;
								}
								if ($row_CheckStats["FarmSARebound"] > 0){
									$TMP_NEW_FARMSAREBOUND = $TMP_FARMSAREBOUND - $row_CheckStats["FarmSARebound"];
								} else {
									$TMP_NEW_FARMSAREBOUND = 0;
								}

								if ($row_CheckStats["FarmMinPlay"] > 0){
									$TMP_NEW_FARMMINPLAY = $TMP_FARMMINPLAY - $row_CheckStats["FarmMinPlay"];
								} else {
									$TMP_NEW_FARMMINPLAY = 0;
								}
								if ($row_CheckStats["FarmSA"] > 0){
									$TMP_NEW_FARMSA = $TMP_FARMSA - $row_CheckStats["FarmSA"];
								} else {
									$TMP_NEW_FARMSA = 0;
								}
							
							$insertSQL = sprintf("INSERT INTO goaliestats (Name, Number, Season_ID, ProGP, ProMinPlay, ProW, ProL, ProOTL, ProShutouts, ProGA, ProSA, ProSARebound, ProPim, ProA, ProPenalityShotsShots, ProPenalityShotsGoals, ProStartGoaler, ProBackupGoaler, ProEmptyNetGoal, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGp, FarmMinPlay, FarmW, FarmL, FarmOTL, FarmShutouts, FarmGA, FarmSA, FarmSARebound, FarmPim, FarmA, FarmPenalityShotsShots, FarmPenalityShotsGoals, FarmStartGoaler, FarmBackupGoaler, FarmEmptyNetGoal, FarmStar1, FarmStar2, FarmStar3, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
								GetSQLValueString($TMP_NAME, "text"),
								GetSQLValueString($TMP_NUMBER, "double"),
								GetSQLValueString($ActiveSeason, "int"),
								GetSQLValueString(number_format($TMP_ProGP - $row_CheckStats["ProGP"]), "double"),
								GetSQLValueString($TMP_ProMinPlay - $row_CheckStats["ProMinPlay"], "double"),
								GetSQLValueString(number_format($TMP_ProW - $row_CheckStats["ProW"]), "double"),
								GetSQLValueString(number_format($TMP_ProL - $row_CheckStats["ProL"]), "double"),
								GetSQLValueString(number_format($TMP_ProOTL - $row_CheckStats["ProOTL"]), "double"),
								GetSQLValueString(number_format($TMP_ProShutouts - $row_CheckStats["ProShutouts"]), "double"),
								GetSQLValueString(number_format($TMP_ProGA - $row_CheckStats["ProGA"]), "double"),
								GetSQLValueString($TMP_ProSA - $row_CheckStats["ProSA"], "double"),
								GetSQLValueString($TMP_ProSARebound - $row_CheckStats["ProSARebound"], "double"),
								GetSQLValueString(number_format($TMP_ProPim - $row_CheckStats["ProPim"]), "double"),
								GetSQLValueString(number_format($TMP_ProA - $row_CheckStats["ProA"]), "double"),
								GetSQLValueString(number_format($TMP_ProPenalityShotsShots - $row_CheckStats["ProPenalityShotsShots"]), "double"),
								GetSQLValueString(number_format($TMP_ProPenalityShotsGoals - $row_CheckStats["ProPenalityShotsGoals"]), "double"),
								GetSQLValueString(number_format($TMP_ProStartGoaler - $row_CheckStats["ProStartGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_ProBackupGoaler - $row_CheckStats["ProBackupGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_ProEmptyNetGoal - $row_CheckStats["ProEmptyNetGoal"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar1 - $row_CheckStats["ProStar1"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar2 - $row_CheckStats["ProStar2"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar3 - $row_CheckStats["ProStar3"]), "double"),
								GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "int"),
								GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
								GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "int"),
								GetSQLValueString(number_format($TMP_FarmGp - $row_CheckStats["Farm"]), "double"),
								GetSQLValueString($TMP_FarmMinPlay - $row_CheckStats["FarmMinPlay"], "double"),
								GetSQLValueString(number_format($TMP_FarmW - $row_CheckStats["FarmW"]), "double"),
								GetSQLValueString(number_format($TMP_FarmL - $row_CheckStats["FarmL"]), "double"),
								GetSQLValueString(number_format($TMP_FarmOTL - $row_CheckStats["FarmOTL"]), "double"),
								GetSQLValueString(number_format($TMP_FarmShutouts - $row_CheckStats["FarmShutouts"]), "double"),
								GetSQLValueString(number_format($TMP_FarmGA - $row_CheckStats["FarmGA"]), "double"),
								GetSQLValueString($TMP_FarmSA - $row_CheckStats["FarmSA"], "double"),
								GetSQLValueString($TMP_FarmSARebound - $row_CheckStats["FarmSARebound"], "double"),
								GetSQLValueString(number_format($TMP_FarmPim - $row_CheckStats["FarmPim"]), "double"),
								GetSQLValueString(number_format($TMP_FarmA - $row_CheckStats["FarmA"]), "double"),
								GetSQLValueString(number_format($TMP_FarmPenalityShotsShots - $row_CheckStats["FarmPenalityShotsShots"]), "double"),
								GetSQLValueString(number_format($TMP_FarmPenalityShotsGoals - $row_CheckStats["FarmPenalityShotsGoals"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStartGoaler - $row_CheckStats["FarmStartGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_FarmBackupGoaler - $row_CheckStats["FarmBackupGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_FarmEmptyNetGoal - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar1 - $row_CheckStats["FarmStar1"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar2 - $row_CheckStats["FarmStar2"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar3 - $row_CheckStats["FarmStar3"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "int"),
								GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
								GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "int"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString("True","text")
							);
							
							mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
								
							}
							
						}
						
					mysql_free_result($CheckStats);		
				
				} else {
					
					$query_CheckTeam = sprintf("SELECT Team FROM goaliestats WHERE Name='%s' AND Season_ID=%s AND Active='True'", $TMP_NAME, $ActiveSeason);
					$CheckTeam = mysql_query($query_CheckTeam, $tmp_simhl) or die(mysql_error());
					$row_CheckTeam = mysql_fetch_assoc($CheckTeam);
					$totalRows_CheckTeam = mysql_num_rows($CheckTeam);	
					
					if ($row_CheckTeam['Team'] == $TMP_TEAM) {
		
						$updateSQL = sprintf("UPDATE goaliestats set ProGP=%s, ProMinPlay=%s, ProW=%s, ProL=%s, ProOTL=%s, ProShutouts=%s, ProGA=%s, ProSA=%s, ProSARebound=%s, ProPim=%s, ProA=%s, ProPenalityShotsShots=%s, ProPenalityShotsGoals=%s, ProStartGoaler=%s, ProBackupGoaler=%s, ProEmptyNetGoal=%s, ProStar1=%s, ProStar2=%s, ProStar3=%s, ProStarPower7Days=%s, ProStarPower30Days=%s, ProStarPowerYear=%s, FarmGp=%s, FarmMinPlay=%s, FarmW=%s, FarmL=%s, FarmOTL=%s, FarmShutouts=%s, FarmGA=%s, FarmSA=%s, FarmSARebound=%s, FarmPim=%s, FarmA=%s, FarmPenalityShotsShots=%s, FarmPenalityShotsGoals=%s, FarmStartGoaler=%s, FarmBackupGoaler=%s, FarmEmptyNetGoal=%s, FarmStar1=%s, FarmStar2=%s, FarmStar3=%s, FarmStarPower7Days=%s, FarmStarPower30Days=%s, FarmStarPowerYear=%s, Team=%s WHERE Season_ID=$ActiveSeason AND Active='True' AND Number=%s",
							GetSQLValueString($TMP_ProGP, "double"),
							GetSQLValueString($TMP_ProMinPlay, "double"),
							GetSQLValueString($TMP_ProW, "double"),
							GetSQLValueString($TMP_ProL, "double"),
							GetSQLValueString($TMP_ProOTL, "double"),
							GetSQLValueString($TMP_ProShutouts, "double"),
							GetSQLValueString($TMP_ProGA, "double"),
							GetSQLValueString($TMP_ProSA, "double"),
							GetSQLValueString($TMP_ProSARebound, "double"),
							GetSQLValueString($TMP_ProPim, "double"),
							GetSQLValueString($TMP_ProA, "double"),
							GetSQLValueString($TMP_ProPenalityShotsShots, "double"),
							GetSQLValueString($TMP_ProPenalityShotsGoals, "double"),
							GetSQLValueString($TMP_ProStartGoaler, "double"),
							GetSQLValueString($TMP_ProBackupGoaler, "double"),
							GetSQLValueString($TMP_ProEmptyNetGoal, "double"),
							GetSQLValueString($TMP_ProStar1, "double"),
							GetSQLValueString($TMP_ProStar2, "double"),
							GetSQLValueString($TMP_ProStar3, "double"),
							GetSQLValueString($TMP_ProStarPower7Days, "int"),
							GetSQLValueString($TMP_ProStarPower30Days, "int"),
							GetSQLValueString($TMP_ProStarPowerYear, "int"),
							GetSQLValueString($TMP_FarmGp, "double"),
							GetSQLValueString($TMP_FarmMinPlay, "double"),
							GetSQLValueString($TMP_FarmW, "double"),
							GetSQLValueString($TMP_FarmL, "double"),
							GetSQLValueString($TMP_FarmOTL, "double"),
							GetSQLValueString($TMP_FarmShutouts, "double"),
							GetSQLValueString($TMP_FarmGA, "double"),
							GetSQLValueString($TMP_FarmSA, "double"),
							GetSQLValueString($TMP_FarmSARebound, "double"),
							GetSQLValueString($TMP_FarmPim, "double"),
							GetSQLValueString($TMP_FarmA, "double"),
							GetSQLValueString($TMP_FarmPenalityShotsShots, "double"),
							GetSQLValueString($TMP_FarmPenalityShotsGoals, "double"),
							GetSQLValueString($TMP_FarmStartGoaler, "double"),
							GetSQLValueString($TMP_FarmBackupGoaler, "double"),
							GetSQLValueString($TMP_FarmEmptyNetGoal, "double"),
							GetSQLValueString($TMP_FarmStar1, "double"),
							GetSQLValueString($TMP_FarmStar2, "double"),
							GetSQLValueString($TMP_FarmStar3, "double"),
							GetSQLValueString($TMP_FarmStarPower7Days, "int"),
							GetSQLValueString($TMP_FarmStarPower30Days, "int"),
							GetSQLValueString($TMP_FarmStarPowerYear, "int"),
							GetSQLValueString($TMP_TEAM, "int"),
							GetSQLValueString($TMP_NUMBER, "double")
						);
						
						mysql_select_db($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());

					} else {		
					
						if ($TMP_TEAM > 0){
							
							$query_CheckStats = sprintf("SELECT SUM(ProSARebound) as ProSARebound, SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmSARebound) as FarmSARebound, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProGP) as ProGP,SUM(ProMinPlay) as ProMinPlay,SUM(ProW) as ProW,SUM(ProL) as ProL,SUM(ProOTL) as ProOTL, SUM(ProShutouts) as ProShutouts, SUM(ProGA) as ProGA, SUM(ProSA) as ProSA, SUM(ProPim) as ProPim, SUM(ProA) as ProA, SUM(ProPenalityShotsShots) as ProPenalityShotsShots, SUM(ProPenalityShotsGoals) as ProPenalityShotsGoals, SUM(ProStartGoaler) as ProStartGoaler, SUM(ProBackupGoaler) as ProBackupGoaler, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGp) as FarmGp, SUM(FarmMinPlay) as FarmMinPlay, SUM(FarmW) as FarmW, SUM(FarmL) as FarmL, SUM(FarmOTL) as FarmOTL, SUM(FarmShutouts) as FarmShutouts, SUM(FarmGA) as FarmGA, SUM(FarmSA) as FarmSA, SUM(FarmPim) as FarmPim, SUM(FarmA) as FarmA, SUM(FarmPenalityShotsShots) as FarmPenalityShotsShots, SUM(FarmPenalityShotsGoals) as FarmPenalityShotsGoals, SUM(FarmStartGoaler) as FarmStartGoaler, SUM(FarmBackupGoaler) as FarmBackupGoaler, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3 FROM goaliestats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
							$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
							$row_CheckStats = mysql_fetch_assoc($CheckStats);	
							$totalRows_CheckStats = mysql_num_rows($CheckStats);		
							
							$updateSQL = sprintf("UPDATE goaliestats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
							mysql_select_db($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
							
							if ($row_CheckStats["ProMinPlay"] > 0){
								$TMP_NEW_PROMINPLAY = $TMP_PROMINPLAY - $row_CheckStats["ProMinPlay"];
							} else {
								$TMP_NEW_PROMINPLAY = 0;
							}
							if ($row_CheckStats["ProSA"] > 0){
								$TMP_NEW_PROSA = $TMP_PROSA - $row_CheckStats["ProSA"];
							} else {
								$TMP_NEW_PROSA = 0;
							}
							if ($row_CheckStats["ProSARebound"] > 0){
								$TMP_NEW_PROSAREBOUND = $TMP_PROSAREBOUND - $row_CheckStats["ProSARebound"];
							} else {
								$TMP_NEW_PROSAREBOUND = 0;
							}
							if ($row_CheckStats["FarmSARebound"] > 0){
								$TMP_NEW_FARMSAREBOUND = $TMP_FARMSAREBOUND - $row_CheckStats["FarmSARebound"];
							} else {
								$TMP_NEW_FARMSAREBOUND = 0;
							}
							if ($row_CheckStats["FarmMinPlay"] > 0){
								$TMP_NEW_FARMMINPLAY = $TMP_FARMMINPLAY - $row_CheckStats["FarmMinPlay"];
							} else {
								$TMP_NEW_FARMMINPLAY = 0;
							}
							if ($row_CheckStats["FarmSA"] > 0){
								$TMP_NEW_FARMSA = $TMP_FARMSA - $row_CheckStats["FarmSA"];
							} else {
								$TMP_NEW_FARMSA = 0;
							}
						
							$insertSQL = sprintf("INSERT INTO goaliestats (Name, Number, Season_ID, ProGP, ProMinPlay, ProW, ProL, ProOTL, ProShutouts, ProGA, ProSA, ProSARebound, ProPim, ProA, ProPenalityShotsShots, ProPenalityShotsGoals, ProStartGoaler, ProBackupGoaler, ProEmptyNetGoal, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGp, FarmMinPlay, FarmW, FarmL, FarmOTL, FarmShutouts, FarmGA, FarmSA, FarmSARebound, FarmPim, FarmA, FarmPenalityShotsShots, FarmPenalityShotsGoals, FarmStartGoaler, FarmBackupGoaler, FarmEmptyNetGoal, FarmStar1, FarmStar2, FarmStar3, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear,  Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
								GetSQLValueString($TMP_NAME, "text"),
								GetSQLValueString($TMP_NUMBER, "double"),
								GetSQLValueString($ActiveSeason, "int"),
								GetSQLValueString(number_format($TMP_ProGP - $row_CheckStats["ProGP"]), "double"),
								GetSQLValueString($TMP_ProMinPlay - $row_CheckStats["ProMinPlay"], "double"),
								GetSQLValueString(number_format($TMP_ProW - $row_CheckStats["ProW"]), "double"),
								GetSQLValueString(number_format($TMP_ProL - $row_CheckStats["ProL"]), "double"),
								GetSQLValueString(number_format($TMP_ProOTL - $row_CheckStats["ProOTL"]), "double"),
								GetSQLValueString(number_format($TMP_ProShutouts - $row_CheckStats["ProShutouts"]), "double"),
								GetSQLValueString(number_format($TMP_ProGA - $row_CheckStats["ProGA"]), "double"),
								GetSQLValueString($TMP_ProSA - $row_CheckStats["ProSA"], "double"),
								GetSQLValueString($TMP_ProSARebound - $row_CheckStats["ProSARebound"], "double"),
								GetSQLValueString(number_format($TMP_ProPim - $row_CheckStats["ProPim"]), "double"),
								GetSQLValueString(number_format($TMP_ProA - $row_CheckStats["ProA"]), "double"),
								GetSQLValueString(number_format($TMP_ProPenalityShotsShots - $row_CheckStats["ProPenalityShotsShots"]), "double"),
								GetSQLValueString(number_format($TMP_ProPenalityShotsGoals - $row_CheckStats["ProPenalityShotsGoals"]), "double"),
								GetSQLValueString(number_format($TMP_ProStartGoaler - $row_CheckStats["ProStartGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_ProBackupGoaler - $row_CheckStats["ProBackupGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_ProEmptyNetGoal - $row_CheckStats["ProEmptyNetGoal"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar1 - $row_CheckStats["ProStar1"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar2 - $row_CheckStats["ProStar2"]), "double"),
								GetSQLValueString(number_format($TMP_ProStar3 - $row_CheckStats["ProStar3"]), "double"),
								GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "double"),
								GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "double"),
								GetSQLValueString(number_format($TMP_ProStarPowerYear - $row_CheckStats["ProStarPowerYear"]), "double"),
								GetSQLValueString(number_format($TMP_FarmGp - $row_CheckStats["Farm"]), "double"),
								GetSQLValueString($TMP_FarmMinPlay - $row_CheckStats["FarmMinPlay"], "double"),
								GetSQLValueString(number_format($TMP_FarmW - $row_CheckStats["FarmW"]), "double"),
								GetSQLValueString(number_format($TMP_FarmL - $row_CheckStats["FarmL"]), "double"),
								GetSQLValueString(number_format($TMP_FarmOTL - $row_CheckStats["FarmOTL"]), "double"),
								GetSQLValueString(number_format($TMP_FarmShutouts - $row_CheckStats["FarmShutouts"]), "double"),
								GetSQLValueString(number_format($TMP_FarmGA - $row_CheckStats["FarmGA"]), "double"),
								GetSQLValueString($TMP_FarmSA - $row_CheckStats["FarmSA"], "double"),
								GetSQLValueString($TMP_FarmSARebound - $row_CheckStats["FarmSARebound"], "double"),
								GetSQLValueString(number_format($TMP_FarmPim - $row_CheckStats["FarmPim"]), "double"),
								GetSQLValueString(number_format($TMP_FarmA - $row_CheckStats["FarmA"]), "double"),
								GetSQLValueString(number_format($TMP_FarmPenalityShotsShots - $row_CheckStats["FarmPenalityShotsShots"]), "double"),
								GetSQLValueString(number_format($TMP_FarmPenalityShotsGoals - $row_CheckStats["FarmPenalityShotsGoals"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStartGoaler - $row_CheckStats["FarmStartGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_FarmBackupGoaler - $row_CheckStats["FarmBackupGoaler"]), "double"),
								GetSQLValueString(number_format($TMP_FarmEmptyNetGoal - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar1 - $row_CheckStats["FarmStar1"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar2 - $row_CheckStats["FarmStar2"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStar3 - $row_CheckStats["FarmStar3"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "double"),
								GetSQLValueString(number_format($TMP_FarmStarPowerYear - $row_CheckStats["FarmStarPowerYear"]), "double"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString("True","text")
							);
							
							mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
							
						}
					}
				}
			}
				
			if (($current_injury <> $TMP_INJURY) && trim($TMP_INJURY) == ""){
				$MailSubject = "$TMP_NAME returns from injury";
  				$MailMessage = "<p>$TMP_NAME says he is now 100% and is ready to play.</p>";
				
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
  								
				
			} else if (($current_injury <> $TMP_INJURY) && trim($current_injury) == ""){
				$MailSubject = "$TMP_NAME suffers injury";
  				$MailMessage = "<p>$TMP_NAME has suffered an injury in the $TMP_INJURY.</p>";
				
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
 				
			}
			
		
		if (($current_suspension <> $TMP_Suspension) && $TMP_Suspension == 0){
				$MailSubject = "$TMP_NAME returns from suspension";
  				$MailMessage = "<p>$TMP_NAME finished his suspension and is ready to return to the lineup.</p>";
				
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
  				
				
			} else if (($current_suspension <> $TMP_Suspension) && $current_suspension == 0){
				$MailSubject = "$TMP_NAME Suspension";
  				$MailMessage = "<p>$TMP_NAME has been suspended for $TMP_Suspension days.</p>";
				
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			}
			
		$WaiverAlert="";
		$TMP_NUMBER="";
		$TMP_NAME="";
		$TMP_URLLink="";
		$TMP_TEAM="";
		$TMP_Country="";
		$TMP_AgeDate="";
		$TMP_Weight="";
		$TMP_Height="";
		$TMP_Contract="";
		$TMP_Rookie="";
		$TMP_PProtected="";
		$TMP_NoApplyRerate="";
		$TMP_AvailableforTrade="";
		$TMP_NoTrade="";
		$TMP_CanPlayPro="";
		$TMP_CanPlayFarm="";
		$TMP_ForceWaiver="";
		$TMP_StarPower="";
		$TMP_Salary1="";
		$TMP_Salary2="";
		$TMP_Salary3="";
		$TMP_Salary4="";
		$TMP_Salary5="";
		$TMP_Salary6="";
		$TMP_Salary7="";
		$TMP_Salary8="";
		$TMP_Salary9="";
		$TMP_Salary10="";
		$TMP_Injury="";
		$TMP_NumberOfInjury="";
		$TMP_Condition="";
		$TMP_Suspension="";
		$TMP_Status1="";
		$TMP_Status2="";
		$TMP_Status3="";
		$TMP_Status4="";
		$TMP_Status5="";
		$TMP_Status6="";
		$TMP_Status7="";
		$TMP_Status8="";
		$TMP_Status9="";
		$TMP_Status10="";
		$TMP_SK="";
		$TMP_DU="";
		$TMP_EN="";
		$TMP_SZ="";
		$TMP_AG="";
		$TMP_RB="";
		$TMP_SC="";
		$TMP_HS="";
		$TMP_RT="";
		$TMP_PC="";
		$TMP_PS="";
		$TMP_EX="";
		$TMP_LD="";
		$TMP_PO="";
		$TMP_MO="";
		$TMP_Overall="";
		$TMP_ProGP="";
		$TMP_ProMinPlay="";
		$TMP_ProW="";
		$TMP_ProL="";
		$TMP_ProOTL="";
		$TMP_ProShutouts="";
		$TMP_ProGA="";
		$TMP_ProSA="";
		$TMP_ProPim="";
		$TMP_ProA="";
		$TMP_ProPenalityShotsShots="";
		$TMP_ProPenalityShotsGoals="";
		$TMP_ProStartGoaler="";
		$TMP_ProBackupGoaler="";
		$TMP_ProEmptyNetGoal="";
		$TMP_ProStar1="";
		$TMP_ProStar2="";
		$TMP_ProStar3="";
		$TMP_FarmGp="";
		$TMP_FarmMinPlay="";
		$TMP_FarmW="";
		$TMP_FarmL="";
		$TMP_FarmOTL="";
		$TMP_FarmShutouts="";
		$TMP_FarmGA="";
		$TMP_FarmSA="";
		$TMP_FarmPim="";
		$TMP_FarmA="";
		$TMP_FarmPenalityShotsShots="";
		$TMP_FarmPenalityShotsGoals="";
		$TMP_FarmStartGoaler="";
		$TMP_FarmBackupGoaler="";
		$TMP_FarmEmptyNetGoal="";
		$TMP_FarmStar1="";
		$TMP_FarmStar2="";
		$TMP_FarmStar3="";
		$TMP_ExcludeFromPayroll="";
		$current_status="";
		}
	}
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedGoalies='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF PLAYERS COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF PLAYERS COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>