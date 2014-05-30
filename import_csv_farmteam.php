<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php


$ID_GetAction = "0";
if (isset($_GET['action'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

set_time_limit(3500);
$uploaddir = 'File/'.$_SESSION['current_SeasonFolder']."/";
global $CurrentSeasonID;
$CurrentSeasonID = $_SESSION['current_SeasonID'];

	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['FarmTeams'];
	$updateGoTo = "import_csv_players.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET FarmTeams='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process Farm Team file.  Please try uploading the file manually in previous page.</h5>";
		exit();
	}
}

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
global $TMP_ProTeamName;
global $TMP_Number;
global $TMP_Name;
global $TMP_Abbre;
global $TMP_City;
global $TMP_Division;
global $TMP_Conference;
global $TMP_Captain;
global $TMP_Assistant1;
global $TMP_Assistant2;
global $TMP_Payroll;
global $TMP_CoachID;
global $TMP_ScheduleGameInAYear;
global $TMP_Morale;
global $TMP_PlayOffEliminated;
global $TMP_PowerRanking;
global $TMP_PlayOffWinRound;
global $TMP_StandingPlayoffTitle;
global $TMP_Streak;
global $TMP_Last10W;
global $TMP_Last10L;
global $TMP_Last10T;
global $TMP_Last10OTW;
global $TMP_Last10OTL;
global $TMP_Last10SOW;
global $TMP_Last10SOL;
global $TMP_GP;
global $TMP_W;
global $TMP_L;
global $TMP_T;
global $TMP_OTW;
global $TMP_OTL;
global $TMP_SOW;
global $TMP_SOL;
global $TMP_Points;
global $TMP_GF;
global $TMP_GA;
global $TMP_HomeGP;
global $TMP_HomeW;
global $TMP_HomeL;
global $TMP_HomeT;
global $TMP_HomeOTW;
global $TMP_HomeOTL;
global $TMP_HomeSOW;
global $TMP_HomeSOL;
global $TMP_HomeGF;
global $TMP_HomeGA;
global $TMP_PPAttemp;
global $TMP_PPGoal;
global $TMP_PKAttemp;
global $TMP_PKGoalGA;
global $TMP_PKGoalGF;
global $TMP_ShotsFor;
global $TMP_ShotsAga;
global $TMP_ShotsBlock;
global $TMP_ShotsPerPeriod1;
global $TMP_ShotsPerPeriod2;
global $TMP_ShotsPerPeriod3;
global $TMP_ShotsPerPeriod4;
global $TMP_GoalsPerPeriod1;
global $TMP_GoalsPerPeriod2;
global $TMP_GoalsPerPeriod3;
global $TMP_GoalsPerPeriod4;
global $TMP_PuckTimeInZoneDF;
global $TMP_PuckTimeInZoneOF;
global $TMP_PuckTimeInZoneNT;
global $TMP_PuckTimeControlinZoneDF;
global $TMP_PuckTimeControlinZoneOF;
global $TMP_PuckTimeControlinZoneNT;
global $TMP_Shutouts;
global $TMP_TotalGoal;
global $TMP_TotalAssist;
global $TMP_TotalPoint;
global $TMP_Pim;
global $TMP_Hits;
global $TMP_FaceOffWon1;
global $TMP_FaceOffTotal1;
global $TMP_FaceOffWon2;
global $TMP_FaceOffTotal2;
global $TMP_FaceOffWon3;
global $TMP_FaceOffTotal3;
global $TMP_EmptyNetGoal;
global $TMP_TotalPlayersSalaries;
global $TMP_ExpensePerDay;
global $TMP_ArenaCapacity1;
global $TMP_ArenaCapacity2;
global $TMP_TicketPrice1;
global $TMP_TicketPrice2;
global $TMP_TicketPrice5;
global $TMP_Attendance1;
global $TMP_Attendance2;
global $TMP_SeasonTicketPCT;
global $TMP_TotalAttendance;
global $TMP_TotalIncome;

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

		$TMP_Number = addslashes($data[0]);
		$TMP_Name = addslashes($data[1]);
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPlayer = sprintf("SELECT Name FROM farmteam WHERE Number='%s'", $TMP_Number);
		$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
		$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
		$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);		
				
		if ($totalRows_CheckPlayer == 0) {
			$SQLAction="INSERT";
			$SQLSeasonAction="INSERT";
		} else {
			$SQLAction="UPDATE";	
			
			$query_CheckSeason = sprintf("SELECT Season_ID FROM farmteamstandings WHERE Number='%s' AND Season_ID=%s", $TMP_Number, $ActiveSeason);
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
		
		$query_GetCoach = sprintf("SELECT Name, Number FROM coaches WHERE Team='%s'", $TMP_Name);
		$GetCoach = mysql_query($query_GetCoach, $tmp_simhl) or die(mysql_error());
		$row_GetCoach = mysql_fetch_assoc($GetCoach);
		$totalRows_GetCoach = mysql_num_rows($GetCoach);
		
		//echo $TMP_Name." - ".$SQLAction." - ".$SQLSeasonAction."<br>"; // O\'reilly
			
		$TMP_Number=$data[0];
		$TMP_Name=$data[1];
		$TMP_Abbre=$data[2];
		$TMP_City=addslashes($data[3]);
		$TMP_Division=addslashes($data[4]);
		$TMP_Conference=addslashes($data[5]);
		$TMP_Captain=$data[6];
		$TMP_Assistant1=$data[7];
		$TMP_Assistant2=$data[8];
		$TMP_Payroll=$data[9];
		$TMP_TotalPlayersSalaries=$data[10];
		$TMP_ExpensePerDay=$data[11];
		$TMP_CoachID=$data[12];
		$TMP_ScheduleGameInAYear=$data[13];
		$TMP_Morale=$data[14];
		$TMP_PlayOffEliminated=$data[15];
		$TMP_PowerRanking=$data[16];
		$TMP_PlayOffWinRound=$data[17];
		$TMP_StandingPlayoffTitle=$data[18];
		$TMP_Streak=$data[19];
		$TMP_Last10W=$data[20];
		$TMP_Last10L=$data[21];
		$TMP_Last10T=$data[22];
		$TMP_Last10OTW=$data[23];
		$TMP_Last10OTL=$data[24];
		$TMP_Last10SOW=$data[25];
		$TMP_Last10SOL=$data[26];
		$TMP_GP=$data[27];
		$TMP_W=$data[28];
		$TMP_L=$data[29];
		$TMP_T=$data[30];
		$TMP_OTW=$data[31];
		$TMP_OTL=$data[32];
		$TMP_SOW=$data[33];
		$TMP_SOL=$data[34];
		$TMP_Points=$data[35];
		$TMP_GF=$data[36];
		$TMP_GA=$data[37];
		$TMP_HomeGP=$data[38];
		$TMP_HomeW=$data[39];
		$TMP_HomeL=$data[40];
		$TMP_HomeT=$data[41];
		$TMP_HomeOTW=$data[42];
		$TMP_HomeOTL=$data[43];
		$TMP_HomeSOW=$data[44];
		$TMP_HomeSOL=$data[45];
		$TMP_HomeGF=$data[46];
		$TMP_HomeGA=$data[47];
		$TMP_PPAttemp=$data[48];
		$TMP_PPGoal=$data[49];
		$TMP_PKAttemp=$data[50];
		$TMP_PKGoalGA=$data[51];
		$TMP_PKGoalGF=$data[52];
		$TMP_ShotsFor=$data[53];
		$TMP_ShotsAga=$data[54];
		$TMP_ShotsBlock=$data[55];
		$TMP_ShotsPerPeriod1=$data[56];
		$TMP_ShotsPerPeriod2=$data[57];
		$TMP_ShotsPerPeriod3=$data[58];
		$TMP_ShotsPerPeriod4=$data[59];
		$TMP_GoalsPerPeriod1=$data[60];
		$TMP_GoalsPerPeriod2=$data[61];
		$TMP_GoalsPerPeriod3=$data[62];
		$TMP_GoalsPerPeriod4=$data[63];
		$TMP_PuckTimeInZoneDF=$data[64];
		$TMP_PuckTimeInZoneOF=$data[65];
		$TMP_PuckTimeInZoneNT=$data[66];
		$TMP_PuckTimeControlinZoneDF=$data[67];
		$TMP_PuckTimeControlinZoneOF=$data[68];
		$TMP_PuckTimeControlinZoneNT=$data[69];
		$TMP_Shutouts=$data[70];
		$TMP_TotalGoal=$data[71];
		$TMP_TotalAssist=$data[72];
		$TMP_TotalPoint=$data[73];
		$TMP_Pim=$data[74];
		$TMP_Hits=$data[75];
		$TMP_FaceOffWon1=$data[76];
		$TMP_FaceOffTotal1=$data[77];
		$TMP_FaceOffWon2=$data[78];
		$TMP_FaceOffTotal2=$data[79];
		$TMP_FaceOffWon3=$data[80];
		$TMP_FaceOffTotal3=$data[81];
		$TMP_EmptyNetGoal=$data[82];
		$TMP_ArenaCapacity1=$data[83];
		$TMP_ArenaCapacity2=$data[84];
		$TMP_TicketPrice1=$data[85];
		$TMP_TicketPrice2=$data[86];
		$TMP_Attendance1=$data[87];
		$TMP_Attendance2=$data[88];
		$TMP_SeasonTicketPCT=$data[89];
		$TMP_TotalAttendance=$data[90];
		$TMP_TotalIncome=$data[91];
		$DivLeader = "False";
		
		if ($TMP_StandingPlayoffTitle == ""){ $TMP_StandingPlayoffTitle = "E";}
		
		mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
		
		
		if ($SQLAction=="INSERT"){
		
			$insertSQL = sprintf("INSERT INTO farmteam (Name, Number, Abbre, City, Division, Conference) VALUES (%s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString($TMP_Number, "int"),
				GetSQLValueString($TMP_Abbre, "text"),
				GetSQLValueString($TMP_City, "text"),
				GetSQLValueString($TMP_Division, "text"),
				GetSQLValueString($TMP_Conference, "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			$insertSQL = sprintf("INSERT INTO farmteamstandings (Name, Number, Season_ID, Captain, Assistant1, Assistant2, Payroll, CoachID, ScheduleGameInAYear, Morale, PlayOffEliminated, PowerRanking, PlayOffWinRound, StandingPlayoffTitle, Streak, Last10W, Last10L, Last10T, Last10OTW, Last10OTL, Last10SOW, Last10SOL, GP, W, L, T, OTW, OTL, SOW, SOL, Point, GF, GA, HomeGP, HomeW, HomeL, HomeT, HomeOTW, HomeOTL, HomeSOW, HomeSOL, HomeGF, HomeGA, PPAttemp, PPGoal, PKAttemp, PKGoalGA, PKGoalGF, ShotsFor, ShotsAga, ShotsBlock, ShotsPerPeriod1, ShotsPerPeriod2, ShotsPerPeriod3, ShotsPerPeriod4, GoalsPerPeriod1, GoalsPerPeriod2, GoalsPerPeriod3, GoalsPerPeriod4, PuckTimeInZoneDF, PuckTimeInZoneOF, PuckTimeInZoneNT, PuckTimeControlinZoneDF, PuckTimeControlinZoneOF, PuckTimeControlinZoneNT, Shutouts, Goals, Assists, TotalPoint, Pim, Hits, FaceOffWonDF, FaceOffTotalDF, FaceOffWonOF, FaceOffTotalOF, FaceOffWonNT, FaceOffTotalNT, EmptyNetGoal, TotalPlayersSalaries, ExpensePerDay, TicketPrice1, TicketPrice2, Attendance1, Attendance2, ArenaCapacity1, ArenaCapacity2, SeasonTicketPCT, TotalAttendance, TotalIncome, DivisionLeader) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString($TMP_Number, "int"),
				GetSQLValueString($ActiveSeason, "int"),
				GetSQLValueString($TMP_Captain, "int"),
				GetSQLValueString($TMP_Assistant1, "int"),
				GetSQLValueString($TMP_Assistant2, "int"),
				GetSQLValueString($TMP_Payroll, "double"),
				GetSQLValueString($TMP_CoachID, "int"),
				GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
				GetSQLValueString($TMP_Morale, "double"),
				GetSQLValueString($TMP_PlayOffEliminated, "text"),
				GetSQLValueString($TMP_PowerRanking, "double"),
				GetSQLValueString($TMP_PlayOffWinRound, "double"),
				GetSQLValueString($TMP_StandingPlayoffTitle, "text"),
				GetSQLValueString($TMP_Streak, "text"),
				GetSQLValueString($TMP_Last10W, "double"),
				GetSQLValueString($TMP_Last10L, "double"),
				GetSQLValueString($TMP_Last10T, "double"),
				GetSQLValueString($TMP_Last10OTW, "double"),
				GetSQLValueString($TMP_Last10OTL, "double"),
				GetSQLValueString($TMP_Last10SOW, "double"),
				GetSQLValueString($TMP_Last10SOL, "double"), 
				GetSQLValueString($TMP_GP, "double"),
				GetSQLValueString($TMP_W, "double"),
				GetSQLValueString($TMP_L, "double"),
				GetSQLValueString($TMP_T, "double"),
				GetSQLValueString($TMP_OTW, "double"),
				GetSQLValueString($TMP_OTL, "double"),
				GetSQLValueString($TMP_SOW, "double"),
				GetSQLValueString($TMP_SOL, "double"),
				GetSQLValueString($TMP_Points, "double"),
				GetSQLValueString($TMP_GF, "double"),
				GetSQLValueString($TMP_GA, "double"),
				GetSQLValueString($TMP_HomeGP, "double"),
				GetSQLValueString($TMP_HomeW, "double"),
				GetSQLValueString($TMP_HomeL, "double"),
				GetSQLValueString($TMP_HomeT, "double"),
				GetSQLValueString($TMP_HomeOTW, "double"),
				GetSQLValueString($TMP_HomeOTL, "double"),
				GetSQLValueString($TMP_HomeSOW, "double"),
				GetSQLValueString($TMP_HomeSOL, "double"),
				GetSQLValueString($TMP_HomeGF, "double"),
				GetSQLValueString($TMP_HomeGA, "double"),
				GetSQLValueString($TMP_PPAttemp, "double"),
				GetSQLValueString($TMP_PPGoal, "double"),
				GetSQLValueString($TMP_PKAttemp, "double"),
				GetSQLValueString($TMP_PKGoalGA, "double"),
				GetSQLValueString($TMP_PKGoalGF, "double"),
				GetSQLValueString($TMP_ShotsFor, "double"),
				GetSQLValueString($TMP_ShotsAga, "double"),
				GetSQLValueString($TMP_ShotsBlock, "double"),
				GetSQLValueString($TMP_ShotsPerPeriod1, "double"),
				GetSQLValueString($TMP_ShotsPerPeriod2, "double"),				
				GetSQLValueString($TMP_ShotsPerPeriod3, "double"),
				GetSQLValueString($TMP_ShotsPerPeriod4, "double"),
				GetSQLValueString($TMP_GoalsPerPeriod1, "double"),
				GetSQLValueString($TMP_GoalsPerPeriod2, "double"),
				GetSQLValueString($TMP_GoalsPerPeriod3, "double"),
				GetSQLValueString($TMP_GoalsPerPeriod4, "double"),
				GetSQLValueString($TMP_PuckTimeInZoneDF, "int"),
				GetSQLValueString($TMP_PuckTimeInZoneOF, "int"),
				GetSQLValueString($TMP_PuckTimeInZoneNT, "int"),
				GetSQLValueString($TMP_PuckTimeControlinZoneDF, "int"),
				GetSQLValueString($TMP_PuckTimeControlinZoneOF, "int"),
				GetSQLValueString($TMP_PuckTimeControlinZoneNT, "int"),
				GetSQLValueString($TMP_Shutouts, "double"),
				GetSQLValueString($TMP_TotalGoal, "double"),
				GetSQLValueString($TMP_TotalAssist, "double"),
				GetSQLValueString($TMP_TotalPoint, "double"),
				GetSQLValueString($TMP_Pim, "double"),
				GetSQLValueString($TMP_Hits, "double"),
				GetSQLValueString($TMP_FaceOffWon1, "double"),
				GetSQLValueString($TMP_FaceOffWon2, "double"),
				GetSQLValueString($TMP_FaceOffWon3, "double"),
				GetSQLValueString($TMP_FaceOffTotal1, "double"),
				GetSQLValueString($TMP_FaceOffTotal2, "double"),
				GetSQLValueString($TMP_FaceOffTotal3, "double"),				
				GetSQLValueString($TMP_EmptyNetGoal, "double"),		
				GetSQLValueString($TMP_TotalPlayersSalaries, "double"),				
				GetSQLValueString($TMP_ExpensePerDay, "double"),
				GetSQLValueString($TMP_ArenaCapacity1, "int"),
				GetSQLValueString($TMP_ArenaCapacity2, "int"),
				GetSQLValueString($TMP_TicketPrice1, "double"),
				GetSQLValueString($TMP_TicketPrice2, "double"),
				GetSQLValueString($TMP_Attendance1, "double"),
				GetSQLValueString($TMP_Attendance2, "double"),
				GetSQLValueString($TMP_SeasonTicketPCT, "double"),
				GetSQLValueString($TMP_TotalAttendance, "double"),
				GetSQLValueString($TMP_TotalIncome, "double"),
				GetSQLValueString($DivLeader, "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			$updateSQL = sprintf("UPDATE farmteam set Name=%s, Abbre=%s, City=%s, Division=%s, Conference=%s  WHERE Number=%s",
				GetSQLValueString($TMP_Name,  "text"),
				GetSQLValueString($TMP_Abbre, "text"),
				GetSQLValueString($TMP_City, "text"),
				GetSQLValueString($TMP_Division, "text"),
				GetSQLValueString($TMP_Conference, "text"),
				GetSQLValueString($TMP_Number, "text")
			);
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
			
			
			if ($SQLSeasonAction=="INSERT"){
			
				$insertSQL = sprintf("INSERT INTO farmteamstandings (Name, Number, Season_ID, Captain, Assistant1, Assistant2, Payroll, CoachID, ScheduleGameInAYear, Morale, PlayOffEliminated, PowerRanking, PlayOffWinRound, StandingPlayoffTitle, Streak, Last10W, Last10L, Last10T, Last10OTW, Last10OTL, Last10SOW, Last10SOL, GP, W, L, T, OTW, OTL, SOW, SOL, Point, GF, GA, HomeGP, HomeW, HomeL, HomeT, HomeOTW, HomeOTL, HomeSOW, HomeSOL, HomeGF, HomeGA, PPAttemp, PPGoal, PKAttemp, PKGoalGA, PKGoalGF, ShotsFor, ShotsAga, ShotsBlock, ShotsPerPeriod1, ShotsPerPeriod2, ShotsPerPeriod3, ShotsPerPeriod4, GoalsPerPeriod1, GoalsPerPeriod2, GoalsPerPeriod3, GoalsPerPeriod4, PuckTimeInZoneDF, PuckTimeInZoneOF, PuckTimeInZoneNT, PuckTimeControlinZoneDF, PuckTimeControlinZoneOF, PuckTimeControlinZoneNT, Shutouts, Goals, Assists, TotalPoint, Pim, Hits, FaceOffWonDF, FaceOffTotalDF, FaceOffWonOF, FaceOffTotalOF, FaceOffWonNT, FaceOffTotalNT, EmptyNetGoal, TotalPlayersSalaries, ExpensePerDay, TicketPrice1, TicketPrice2, Attendance1, Attendance2, ArenaCapacity1, ArenaCapacity2, SeasonTicketPCT, TotalAttendance, TotalIncome, DivisionLeader) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					GetSQLValueString($TMP_Name, "text"),
					GetSQLValueString($TMP_Number, "int"),
					GetSQLValueString($ActiveSeason, "int"),
					GetSQLValueString($TMP_Captain, "int"),
					GetSQLValueString($TMP_Assistant1, "int"),
					GetSQLValueString($TMP_Assistant2, "int"),
					GetSQLValueString($TMP_Payroll, "double"),
					GetSQLValueString($TMP_CoachID, "int"),
					GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
					GetSQLValueString($TMP_Morale, "double"),
					GetSQLValueString($TMP_PlayOffEliminated, "text"),
					GetSQLValueString($TMP_PowerRanking, "double"),
					GetSQLValueString($TMP_PlayOffWinRound, "double"),
					GetSQLValueString($TMP_StandingPlayoffTitle, "text"),
					GetSQLValueString($TMP_Streak, "text"),
					GetSQLValueString($TMP_Last10W, "double"),
					GetSQLValueString($TMP_Last10L, "double"),
					GetSQLValueString($TMP_Last10T, "double"),
					GetSQLValueString($TMP_Last10OTW, "double"),
					GetSQLValueString($TMP_Last10OTL, "double"),
					GetSQLValueString($TMP_Last10SOW, "double"),
					GetSQLValueString($TMP_Last10SOL, "double"), 
					GetSQLValueString($TMP_GP, "double"),
					GetSQLValueString($TMP_W, "double"),
					GetSQLValueString($TMP_L, "double"),
					GetSQLValueString($TMP_T, "double"),
					GetSQLValueString($TMP_OTW, "double"),
					GetSQLValueString($TMP_OTL, "double"),
					GetSQLValueString($TMP_SOW, "double"),
					GetSQLValueString($TMP_SOL, "double"),
					GetSQLValueString($TMP_Points, "double"),
					GetSQLValueString($TMP_GF, "double"),
					GetSQLValueString($TMP_GA, "double"),
					GetSQLValueString($TMP_HomeGP, "double"),
					GetSQLValueString($TMP_HomeW, "double"),
					GetSQLValueString($TMP_HomeL, "double"),
					GetSQLValueString($TMP_HomeT, "double"),
					GetSQLValueString($TMP_HomeOTW, "double"),
					GetSQLValueString($TMP_HomeOTL, "double"),
					GetSQLValueString($TMP_HomeSOW, "double"),
					GetSQLValueString($TMP_HomeSOL, "double"),
					GetSQLValueString($TMP_HomeGF, "double"),
					GetSQLValueString($TMP_HomeGA, "double"),
					GetSQLValueString($TMP_PPAttemp, "double"),
					GetSQLValueString($TMP_PPGoal, "double"),
					GetSQLValueString($TMP_PKAttemp, "double"),
					GetSQLValueString($TMP_PKGoalGA, "double"),
					GetSQLValueString($TMP_PKGoalGF, "double"),
					GetSQLValueString($TMP_ShotsFor, "double"),
					GetSQLValueString($TMP_ShotsAga, "double"),
					GetSQLValueString($TMP_ShotsBlock, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod1, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod2, "double"),				
					GetSQLValueString($TMP_ShotsPerPeriod3, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod4, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod1, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod2, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod3, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod4, "double"),
					GetSQLValueString($TMP_PuckTimeInZoneDF, "int"),
					GetSQLValueString($TMP_PuckTimeInZoneOF, "int"),
					GetSQLValueString($TMP_PuckTimeInZoneNT, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneDF, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneOF, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneNT, "int"),
					GetSQLValueString($TMP_Shutouts, "double"),
					GetSQLValueString($TMP_TotalGoal, "double"),
					GetSQLValueString($TMP_TotalAssist, "double"),
					GetSQLValueString($TMP_TotalPoint, "double"),
					GetSQLValueString($TMP_Pim, "double"),
					GetSQLValueString($TMP_Hits, "double"),
					GetSQLValueString($TMP_FaceOffWon1, "double"),
					GetSQLValueString($TMP_FaceOffWon2, "double"),
					GetSQLValueString($TMP_FaceOffWon3, "double"),
					GetSQLValueString($TMP_FaceOffTotal1, "double"),
					GetSQLValueString($TMP_FaceOffTotal2, "double"),
					GetSQLValueString($TMP_FaceOffTotal3, "double"),				
					GetSQLValueString($TMP_EmptyNetGoal, "double"),		
					GetSQLValueString($TMP_TotalPlayersSalaries, "double"),				
					GetSQLValueString($TMP_ExpensePerDay, "double"),
					GetSQLValueString($TMP_ArenaCapacity1, "int"),
					GetSQLValueString($TMP_ArenaCapacity2, "int"),
					GetSQLValueString($TMP_TicketPrice1, "double"),
					GetSQLValueString($TMP_TicketPrice2, "double"),
					GetSQLValueString($TMP_Attendance1, "double"),
					GetSQLValueString($TMP_Attendance2, "double"),
					GetSQLValueString($TMP_SeasonTicketPCT, "double"),
					GetSQLValueString($TMP_TotalAttendance, "double"),
					GetSQLValueString($TMP_TotalIncome, "double"),
					GetSQLValueString($DivLeader, "text")
				);
				
				mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			} elseif ($SQLSeasonAction=="UPDATE"){
			
				$updateSQL = sprintf("UPDATE farmteamstandings set Name=%s, Captain=%s, Assistant1=%s, Assistant2=%s, Payroll=%s, CoachID=%s, ScheduleGameInAYear=%s, Morale=%s, PlayOffEliminated=%s, PowerRanking=%s, PlayOffWinRound=%s, StandingPlayoffTitle=%s, Streak=%s, Last10W=%s, Last10L=%s, Last10T=%s, Last10OTW=%s, Last10OTL=%s, Last10SOW=%s, Last10SOL=%s, GP=%s, W=%s, L=%s, T=%s, OTW=%s, OTL=%s, SOW=%s, SOL=%s, Point=%s, GF=%s, GA=%s, HomeGP=%s, HomeW=%s, HomeL=%s, HomeT=%s, HomeOTW=%s, HomeOTL=%s, HomeSOW=%s, HomeSOL=%s, HomeGF=%s, HomeGA=%s, PPAttemp=%s, PPGoal=%s, PKAttemp=%s, PKGoalGA=%s, PKGoalGF=%s, ShotsFor=%s, ShotsAga=%s, ShotsBlock=%s, ShotsPerPeriod1=%s, ShotsPerPeriod2=%s, ShotsPerPeriod3=%s, ShotsPerPeriod4=%s, GoalsPerPeriod1=%s, GoalsPerPeriod2=%s, GoalsPerPeriod3=%s, GoalsPerPeriod4=%s, PuckTimeInZoneDF=%s, PuckTimeInZoneOF=%s, PuckTimeInZoneNT=%s, PuckTimeControlinZoneDF=%s, PuckTimeControlinZoneOF=%s, PuckTimeControlinZoneNT=%s, Shutouts=%s, Goals=%s, Assists=%s, TotalPoint=%s, Pim=%s, Hits=%s, FaceOffWonDF=%s, FaceOffTotalDF=%s, FaceOffWonOF=%s, FaceOffTotalOF=%s, FaceOffWonNT=%s, FaceOffTotalNT=%s, EmptyNetGoal=%s, TotalPlayersSalaries=%s, ExpensePerDay=%s, TicketPrice1=%s, TicketPrice2=%s, Attendance1=%s, Attendance2=%s, ArenaCapacity1=%s, ArenaCapacity2=%s, SeasonTicketPCT=%s, TotalAttendance=%s, TotalIncome=%s, DivisionLeader=%s WHERE Number=%s AND Season_ID=%s",
					GetSQLValueString($TMP_Name, "text"),
					GetSQLValueString($TMP_Captain, "int"),
					GetSQLValueString($TMP_Assistant1, "int"),
					GetSQLValueString($TMP_Assistant2, "int"),
					GetSQLValueString($TMP_Payroll, "double"),
					GetSQLValueString($TMP_CoachID, "int"),
					GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
					GetSQLValueString($TMP_Morale, "double"),
					GetSQLValueString($TMP_PlayOffEliminated, "text"),
					GetSQLValueString($TMP_PowerRanking, "double"),
					GetSQLValueString($TMP_PlayOffWinRound, "double"),
					GetSQLValueString($TMP_StandingPlayoffTitle, "text"),
					GetSQLValueString($TMP_Streak, "text"),
					GetSQLValueString($TMP_Last10W, "double"),
					GetSQLValueString($TMP_Last10L, "double"),
					GetSQLValueString($TMP_Last10T, "double"),
					GetSQLValueString($TMP_Last10OTW, "double"),
					GetSQLValueString($TMP_Last10OTL, "double"),
					GetSQLValueString($TMP_Last10SOW, "double"),
					GetSQLValueString($TMP_Last10SOL, "double"), 
					GetSQLValueString($TMP_GP, "double"),
					GetSQLValueString($TMP_W, "double"),
					GetSQLValueString($TMP_L, "double"),
					GetSQLValueString($TMP_T, "double"),
					GetSQLValueString($TMP_OTW, "double"),
					GetSQLValueString($TMP_OTL, "double"),
					GetSQLValueString($TMP_SOW, "double"),
					GetSQLValueString($TMP_SOL, "double"),
					GetSQLValueString($TMP_Points, "double"),
					GetSQLValueString($TMP_GF, "double"),
					GetSQLValueString($TMP_GA, "double"),
					GetSQLValueString($TMP_HomeGP, "double"),
					GetSQLValueString($TMP_HomeW, "double"),
					GetSQLValueString($TMP_HomeL, "double"),
					GetSQLValueString($TMP_HomeT, "double"),
					GetSQLValueString($TMP_HomeOTW, "double"),
					GetSQLValueString($TMP_HomeOTL, "double"),
					GetSQLValueString($TMP_HomeSOW, "double"),
					GetSQLValueString($TMP_HomeSOL, "double"),
					GetSQLValueString($TMP_HomeGF, "double"),
					GetSQLValueString($TMP_HomeGA, "double"),
					GetSQLValueString($TMP_PPAttemp, "double"),
					GetSQLValueString($TMP_PPGoal, "double"),
					GetSQLValueString($TMP_PKAttemp, "double"),
					GetSQLValueString($TMP_PKGoalGA, "double"),
					GetSQLValueString($TMP_PKGoalGF, "double"),
					GetSQLValueString($TMP_ShotsFor, "double"),
					GetSQLValueString($TMP_ShotsAga, "double"),
					GetSQLValueString($TMP_ShotsBlock, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod1, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod2, "double"),				
					GetSQLValueString($TMP_ShotsPerPeriod3, "double"),
					GetSQLValueString($TMP_ShotsPerPeriod4, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod1, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod2, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod3, "double"),
					GetSQLValueString($TMP_GoalsPerPeriod4, "double"),
					GetSQLValueString($TMP_PuckTimeInZoneDF, "int"),
					GetSQLValueString($TMP_PuckTimeInZoneOF, "int"),
					GetSQLValueString($TMP_PuckTimeInZoneNT, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneDF, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneOF, "int"),
					GetSQLValueString($TMP_PuckTimeControlinZoneNT, "int"),
					GetSQLValueString($TMP_Shutouts, "double"),
					GetSQLValueString($TMP_TotalGoal, "double"),
					GetSQLValueString($TMP_TotalAssist, "double"),
					GetSQLValueString($TMP_TotalPoint, "double"),
					GetSQLValueString($TMP_Pim, "double"),
					GetSQLValueString($TMP_Hits, "double"),
					GetSQLValueString($TMP_FaceOffWon1, "double"),
					GetSQLValueString($TMP_FaceOffWon2, "double"),
					GetSQLValueString($TMP_FaceOffWon3, "double"),
					GetSQLValueString($TMP_FaceOffTotal1, "double"),
					GetSQLValueString($TMP_FaceOffTotal2, "double"),
					GetSQLValueString($TMP_FaceOffTotal3, "double"),				
					GetSQLValueString($TMP_EmptyNetGoal, "double"),		
					GetSQLValueString($TMP_TotalPlayersSalaries, "double"),				
					GetSQLValueString($TMP_ExpensePerDay, "double"),
					GetSQLValueString($TMP_ArenaCapacity1, "int"),
					GetSQLValueString($TMP_ArenaCapacity2, "int"),
					GetSQLValueString($TMP_TicketPrice1, "double"),
					GetSQLValueString($TMP_TicketPrice2, "double"),
					GetSQLValueString($TMP_Attendance1, "double"),
					GetSQLValueString($TMP_Attendance2, "double"),
					GetSQLValueString($TMP_SeasonTicketPCT, "double"),
					GetSQLValueString($TMP_TotalAttendance, "double"),
					GetSQLValueString($TMP_TotalIncome, "double"),
					GetSQLValueString($DivLeader, "text"),
					GetSQLValueString($TMP_Number, "int"),
					GetSQLValueString($ActiveSeason, "int")
				);
				
				mysql_select_db($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
				
				if($totalRows_GetCoach > 0){
					$query_GetCoachStats = sprintf("SELECT Number FROM coachestats WHERE Number=%s AND Season_ID=%s",  $row_GetCoach['Number'], $ActiveSeason );
					$GetCoachStats = mysql_query($query_GetCoachStats, $tmp_simhl) or die(mysql_error());
					$row_GetCoachStats = mysql_fetch_assoc($GetCoachStats);
					$totalRows_GetCoachStats = mysql_num_rows($GetCoachStats);
										
					if($totalRows_GetCoachStats > 0){
						$insertSQL = sprintf("UPDATE coachestats SET Team=%s, FarmGP=%s, FarmW=%s, FarmL=%s, FarmT=%s, FarmOTW=%s, FarmOTL=%s, FarmSOW=%s, FarmSOL=%s, FarmGF=%s, FarmGA=%s, FarmPim=%s, FarmHits=%s  WHERE Name=%s AND Season_ID=%s",
							GetSQLValueString($TMP_Number, "int"),
							GetSQLValueString($TMP_GP, "double"),
							GetSQLValueString($TMP_W, "double"),
							GetSQLValueString($TMP_L, "double"),
							GetSQLValueString($TMP_T, "double"),
							GetSQLValueString($TMP_OTW, "double"),
							GetSQLValueString($TMP_OTL, "double"),
							GetSQLValueString($TMP_SOW, "double"),
							GetSQLValueString($TMP_SOL, "double"),
							GetSQLValueString($TMP_GF, "double"),
							GetSQLValueString($TMP_GA, "double"),
							GetSQLValueString($TMP_Pim, "double"),
							GetSQLValueString($TMP_Hits, "double"),
							GetSQLValueString($row_GetCoach['Name'], "text"),
							GetSQLValueString($ActiveSeason, "int")
						);
						
						mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());

					} else {

						$insertSQL = sprintf("INSERT INTO coachestats (Team, Name, Number, Season_ID, FarmGP, FarmW, FarmL, FarmT, FarmOTW, FarmOTL, FarmSOW, FarmSOL, FarmGF, FarmGA, FarmPim, FarmHits) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							GetSQLValueString($TMP_Number, "int"),
							GetSQLValueString($row_GetCoach['Name'], "text"),
							GetSQLValueString($row_GetCoach['Number'], "text"),
							GetSQLValueString($ActiveSeason, "int"),
							GetSQLValueString($TMP_GP, "double"),
							GetSQLValueString($TMP_W, "double"),
							GetSQLValueString($TMP_L, "double"),
							GetSQLValueString($TMP_T, "double"),
							GetSQLValueString($TMP_OTW, "double"),
							GetSQLValueString($TMP_OTL, "double"),
							GetSQLValueString($TMP_SOW, "double"),
							GetSQLValueString($TMP_SOL, "double"),
							GetSQLValueString($TMP_GF, "double"),
							GetSQLValueString($TMP_GA, "double"),
							GetSQLValueString($TMP_Pim, "double"),
							GetSQLValueString($TMP_Hits, "double")
						);
						
						mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
					}
				}
			}
			
		}
		$TMP_Number="";
		$TMP_Name="";
		$TMP_Abbre="";
		$TMP_City="";
		$TMP_GM="";
		$TMP_Messenger="";
		$TMP_Email="";
		$TMP_Arena="";
		$TMP_Division="";
		$TMP_Conference="";
		$TMP_Captain="";
		$TMP_Assistant1="";
		$TMP_Assistant2="";
		$TMP_Payroll="";
		$TMP_CoachID="";
		$TMP_ScheduleGameInAYear="";
		$TMP_Morale="";
		$TMP_PlayOffEliminated="";
		$TMP_PowerRanking="";
		$TMP_PlayOffWinRound="";
		$TMP_StandingPlayoffTitle="";
		$TMP_Streak="";
		$TMP_Last10W="";
		$TMP_Last10L="";
		$TMP_Last10T="";
		$TMP_Last10OTW="";
		$TMP_Last10OTL="";
		$TMP_Last10SOW="";
		$TMP_Last10SOL="";
		$TMP_GP="";
		$TMP_W="";
		$TMP_L="";
		$TMP_T="";
		$TMP_OTW="";
		$TMP_OTL="";
		$TMP_SOW="";
		$TMP_SOL="";
		$TMP_Points="";
		$TMP_GF="";
		$TMP_GA="";
		$TMP_HomeGP="";
		$TMP_HomeW="";
		$TMP_HomeL="";
		$TMP_HomeT="";
		$TMP_HomeOTW="";
		$TMP_HomeOTL="";
		$TMP_HomeSOW="";
		$TMP_HomeSOL="";
		$TMP_HomeGF="";
		$TMP_HomeGA="";
		$TMP_PPAttemp="";
		$TMP_PPGoal="";
		$TMP_PKAttemp="";
		$TMP_PKGoalGA="";
		$TMP_PKGoalGF="";
		$TMP_ShotsFor="";
		$TMP_ShotsAga="";
		$TMP_ShotsBlock="";
		$TMP_ShotsPerPeriod1="";
		$TMP_ShotsPerPeriod2="";
		$TMP_ShotsPerPeriod3="";
		$TMP_ShotsPerPeriod4="";
		$TMP_GoalsPerPeriod1="";
		$TMP_GoalsPerPeriod2="";
		$TMP_GoalsPerPeriod3="";
		$TMP_GoalsPerPeriod4="";
		$TMP_PuckTimeInZoneDF="";
		$TMP_PuckTimeInZoneOF="";
		$TMP_PuckTimeInZoneNT="";
		$TMP_PuckTimeControlinZoneDF="";
		$TMP_PuckTimeControlinZoneOF="";
		$TMP_PuckTimeControlinZoneNT="";
		$TMP_Shutouts="";
		$TMP_TotalGoal="";
		$TMP_TotalAssist="";
		$TMP_TotalPoint="";
		$TMP_Pim="";
		$TMP_Hits="";
		$TMP_FaceOffWon1="";
		$TMP_FaceOffTotal1="";
		$TMP_FaceOffWon2="";
		$TMP_FaceOffTotal2="";
		$TMP_FaceOffWon3="";
		$TMP_FaceOffTotal3="";
		$TMP_EmptyNetGoal="";	
	}
	$row++;
}

mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
$query_GetDivisions = "SELECT Division FROM farmteam";
$GetDivisions = mysql_query($query_GetDivisions, $tmp_simhl) or die(mysql_error());
$row_GetDivisions = mysql_fetch_assoc($GetDivisions);

do {
	$query_CheckDivLeader = "SELECT P.Number FROM farmteamstandings as P, farmteam as T WHERE T.Number=P.Number AND P.Season_ID=".$ActiveSeason." AND T.Division='".$GetDivisions['Division']."' ORDER BY P.StandingPlayoffTitle desc, P.Point desc, P.GP asc Limit 0,1";
	$CheckDivLeader = mysql_query($query_CheckDivLeader, $tmp_simhl) or die(mysql_error());
	$row_CheckDivLeader = mysql_fetch_assoc($CheckDivLeader);

	$updateSQL = sprintf("UPDATE farmteamstandings set DivisionLeader=%s WHERE Number=%s AND Season_ID=%s",					
		GetSQLValueString("True", "text"),
		GetSQLValueString($row_CheckDivLeader['Number'], "int"),
		GetSQLValueString($ActiveSeason, "int")
	);
	$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
				
} while ($row_GetDivisions = mysql_fetch_assoc($GetDivisions));


$updateSQL = "UPDATE config SET LastModifiedFarmTeams='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//secho "<h6 align=center><b>IMPORT OF FARM TEAMS COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF FARM TEAMS COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>