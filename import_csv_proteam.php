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

//echo "<h4 align=center>Importing PROTEAM CSV</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['ProTeams'];
	if($_SESSION['current_FarmLeague'] == "True"){
		$updateGoTo = "import_csv_farmteam.php?action=1";
	} else {
		$updateGoTo = "import_csv_players.php?action=1";
	}
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET ProTeams='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process Proteam CSV file.  Please try uploading the file manually in previous page.</h5>";
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
global $TMP_Number;
global $TMP_Name;
global $TMP_Abbre;
global $TMP_City;
global $TMP_GM;
global $TMP_Messenger;
global $TMP_Email;
global $TMP_Arena;
global $TMP_Division;
global $TMP_Conference;
global $TMP_Captain;
global $TMP_Assistant1;
global $TMP_Assistant2;
global $TMP_ArenaCapacity1;
global $TMP_ArenaCapacity2;
global $TMP_ArenaCapacity3;
global $TMP_ArenaCapacity4;
global $TMP_ArenaCapacity5;
global $TMP_TicketPrice1;
global $TMP_TicketPrice2;
global $TMP_TicketPrice3;
global $TMP_TicketPrice4;
global $TMP_TicketPrice5;
global $TMP_Attendance1;
global $TMP_Attendance2;
global $TMP_Attendance3;
global $TMP_Attendance4;
global $TMP_Attendance5;
global $TMP_SeasonTicketPCT;
global $TMP_Finance;
global $TMP_Payroll;
global $TMP_TotalAttendance;
global $TMP_TotalIncome;
global $TMP_CoachID;
global $TMP_ScheduleGameInAYear;
global $TMP_Morale;
global $TMP_PlayOffEliminated;
global $TMP_PowerRanking;
global $TMP_LinesLoad;
global $TMP_PlayOffWinRound;
global $TMP_LuxuryTaxeTotal;
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

$updateSQL = sprintf("UPDATE proteamstandings set DivisionLeader='False' WHERE Season_ID=%s",
	GetSQLValueString($ActiveSeason, "int")
);
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());


 //SPIN THROUGH THE RECORDS
//$handle = fopen($_FILES['file']['tmp_name'], "r");
$handle = fopen($file, "r");
$row=0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 1){
	
		$TMP_Number=$data[0];
		$TMP_Name = addslashes($data[1]);
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPlayer = sprintf("SELECT GM, Name, Number FROM proteam WHERE Number=%s", $TMP_Number);
		$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
		$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
		$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);		
	
		if ($totalRows_CheckPlayer == 0) {
			$SQLAction="INSERT";
			$SQLSeasonAction="INSERT";
		} else {
			$SQLAction="UPDATE";	
			$query_CheckSeason = sprintf("SELECT Season_ID FROM proteamstandings WHERE Number=%s AND Season_ID=%s", $row_CheckPlayer['Number'], $ActiveSeason);
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
		
		$query_GetCoach = sprintf("SELECT Number, Name FROM coaches WHERE Team='%s'",  $TMP_Name);
		$GetCoach = mysql_query($query_GetCoach, $tmp_simhl) or die(mysql_error());
		$row_GetCoach = mysql_fetch_assoc($GetCoach);
		$totalRows_GetCoach = mysql_num_rows($GetCoach);
		
		mysql_free_result($CheckPlayer);
		//echo $TMP_Name." - ".$SQLAction." - ".$SQLSeasonAction."<br>"; // O\'reilly
		
		$TMP_Number=$data[0];
		$TMP_Name=ParseSQL($data[1]);
		$TMP_Abbre=$data[2];
		$TMP_City=ParseSQL($data[3]);
		$TMP_GM=$data[4];
		$TMP_Messenger=$data[5];
		$TMP_Email=$data[6];
		$TMP_Arena=$data[7];
		$TMP_Division=ParseSQL($data[8]);
		$TMP_Conference=ParseSQL($data[9]);
		$TMP_Captain=$data[10];
		$TMP_Assistant1=$data[11];
		$TMP_Assistant2=$data[12];
		$TMP_ArenaCapacity1=$data[13];
		$TMP_ArenaCapacity2=$data[14];
		$TMP_ArenaCapacity3=$data[15];
		$TMP_ArenaCapacity4=$data[16];
		$TMP_ArenaCapacity5=$data[17];
		$TMP_TicketPrice1=$data[18];
		$TMP_TicketPrice2=$data[19];
		$TMP_TicketPrice3=$data[20];
		$TMP_TicketPrice4=$data[21];
		$TMP_TicketPrice5=$data[22];
		$TMP_Attendance1=$data[23];
		$TMP_Attendance2=$data[24];
		$TMP_Attendance3=$data[25];
		$TMP_Attendance4=$data[26];
		$TMP_Attendance5=$data[27];
		$TMP_SeasonTicketPCT=$data[28];
		$TMP_Finance=$data[29];
		$TMP_Payroll=$data[30];
		$TMP_TotalPlayersSalaries=$data[31];
		$TMP_ExpensePerDay=$data[32];
		$TMP_TotalAttendance=$data[33];
		$TMP_TotalIncome=$data[34];
		$TMP_CoachID=$data[35];
		$TMP_ScheduleGameInAYear=$data[36];
		$TMP_Morale=$data[37];
		$TMP_PlayOffEliminated=$data[38];
		$TMP_PowerRanking=$data[39];
		$TMP_LinesLoad=$data[40];
		$TMP_PlayOffWinRound=$data[41];
		$TMP_LuxuryTaxeTotal=$data[42];
		$TMP_StandingPlayoffTitle=$data[43];
		$TMP_Streak=$data[44];
		$TMP_Last10W=$data[45];
		$TMP_Last10L=$data[46];
		$TMP_Last10T=$data[47];
		$TMP_Last10OTW=$data[48];
		$TMP_Last10OTL=$data[49];
		$TMP_Last10SOW=$data[50];
		$TMP_Last10SOL=$data[51];
		$TMP_GP=$data[52];
		$TMP_W=$data[53];
		$TMP_L=$data[54];
		$TMP_T=$data[55];
		$TMP_OTW=$data[56];
		$TMP_OTL=$data[57];
		$TMP_SOW=$data[58];
		$TMP_SOL=$data[59];
		$TMP_Points=$data[60];
		$TMP_GF=$data[61];
		$TMP_GA=$data[62];
		$TMP_HomeGP=$data[63];
		$TMP_HomeW=$data[64];
		$TMP_HomeL=$data[65];
		$TMP_HomeT=$data[66];
		$TMP_HomeOTW=$data[67];
		$TMP_HomeOTL=$data[68];
		$TMP_HomeSOW=$data[69];
		$TMP_HomeSOL=$data[70];
		$TMP_HomeGF=$data[71];
		$TMP_HomeGA=$data[72];
		$TMP_PPAttemp=$data[73];
		$TMP_PPGoal=$data[74];
		$TMP_PKAttemp=$data[75];
		$TMP_PKGoalGA=$data[76];
		$TMP_PKGoalGF=$data[77];
		$TMP_ShotsFor=$data[78];
		$TMP_ShotsAga=$data[79];
		$TMP_ShotsBlock=$data[80];
		$TMP_ShotsPerPeriod1=$data[81];
		$TMP_ShotsPerPeriod2=$data[82];
		$TMP_ShotsPerPeriod3=$data[83];
		$TMP_ShotsPerPeriod4=$data[84];
		$TMP_GoalsPerPeriod1=$data[85];
		$TMP_GoalsPerPeriod2=$data[86];
		$TMP_GoalsPerPeriod3=$data[87];
		$TMP_GoalsPerPeriod4=$data[88];
		$TMP_PuckTimeInZoneDF=$data[89];
		$TMP_PuckTimeInZoneOF=$data[90];
		$TMP_PuckTimeInZoneNT=$data[91];
		$TMP_PuckTimeControlinZoneDF=$data[92];
		$TMP_PuckTimeControlinZoneOF=$data[93];
		$TMP_PuckTimeControlinZoneNT=$data[94];
		$TMP_Shutouts=$data[95];
		$TMP_TotalGoal=$data[96];
		$TMP_TotalAssist=$data[97];
		$TMP_TotalPoint=$data[98];
		$TMP_Pim=$data[99];
		$TMP_Hits=$data[100];
		$TMP_FaceOffWon1=$data[101];
		$TMP_FaceOffTotal1=$data[102];
		$TMP_FaceOffWon2=$data[103];
		$TMP_FaceOffTotal2=$data[104];
		$TMP_FaceOffWon3=$data[105];
		$TMP_FaceOffTotal3=$data[106];
		$TMP_EmptyNetGoal=$data[107];
		$DivLeader = "False";
		
		if ($TMP_StandingPlayoffTitle == ""){ $TMP_StandingPlayoffTitle = "E";}
		
		$query_CheckDivLeader = "SELECT P.Number FROM proteamstandings as P, proteam as T WHERE T.Number=P.Number AND P.Season_ID=".$ActiveSeason." AND T.Division='".$TMP_Division."' ORDER BY P.StandingPlayoffTitle desc, P.Point desc, P.GP asc Limit 0,1";
		$CheckDivLeader = mysql_query($query_CheckDivLeader, $tmp_simhl) or die(mysql_error());
		$row_CheckDivLeader = mysql_fetch_assoc($CheckDivLeader);
		if ($row_CheckDivLeader['Number'] == $TMP_Number){
			$DivLeader = "True";
		} else {
			$DivLeader = "False";
		}
				
		$RowActive=0;
		if ($SQLAction=="INSERT"){
			
			$insertSQL = sprintf("INSERT INTO proteam (HeaderImage,LogoSmall,LogoLarge,LogoTiny,Name, Number, Abbre, GM, Email, Messenger, City, Arena, Division, Conference, PrimaryColor, SecondaryColor, Username, Password, Administrator, Avatar, Awayleave, AwayReturn, AwayActive) VALUES ('DefaultHeaderImage.jpg','DefaultLogoSmall.jpg','DefaultLogoLarge.jpg','DefaultLogoTiny.jpg',%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, '0000-00-00', '0000-00-00', 'FALSE')",
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString($TMP_Number, "int"),
				GetSQLValueString($TMP_Abbre, "text"),
				GetSQLValueString($TMP_GM, "text"),
				GetSQLValueString($TMP_Email, "text"),
				GetSQLValueString($TMP_Messenger, "text"),
				GetSQLValueString($TMP_City, "text"),
				GetSQLValueString($TMP_Arena, "text"),
				GetSQLValueString($TMP_Division, "text"),
				GetSQLValueString($TMP_Conference, "text"),
				GetSQLValueString("000000", "text"),
				GetSQLValueString("FFFFFF", "text"),
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString("0", "int"),
				GetSQLValueString("defaultgm.jpg", "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			$insertSQL = sprintf("INSERT INTO proteamstandings (Number, Season_ID, Captain, Assistant1, Assistant2, ArenaCapacity1, ArenaCapacity2, ArenaCapacity3, ArenaCapacity4, ArenaCapacity5, TicketPrice1, TicketPrice2, TicketPrice3, TicketPrice4, TicketPrice5, Attendance1, Attendance2, Attendance3, Attendance4, Attendance5, SeasonTicketPCT, Finance, Payroll, TotalAttendance, TotalIncome, CoachID, ScheduleGameInAYear, Morale, PlayOffEliminated, PowerRanking, LinesLoad, PlayOffWinRound, LuxuryTaxeTotal, StandingPlayoffTitle, Streak, Last10W, Last10L, Last10T, Last10OTW, Last10OTL, Last10SOW, Last10SOL, GP, W, L, T, OTW, OTL, SOW, SOL, Point, GF, GA, HomeGP, HomeW, HomeL, HomeT, HomeOTW, HomeOTL, HomeSOW, HomeSOL, HomeGF, HomeGA, PPAttemp, PPGoal, PKAttemp, PKGoalGA, PKGoalGF, ShotsFor, ShotsAga, ShotsBlock, ShotsPerPeriod1, ShotsPerPeriod2, ShotsPerPeriod3, ShotsPerPeriod4, GoalsPerPeriod1, GoalsPerPeriod2, GoalsPerPeriod3, GoalsPerPeriod4, PuckTimeInZoneDF, PuckTimeInZoneOF, PuckTimeInZoneNT, PuckTimeControlinZoneDF, PuckTimeControlinZoneOF, PuckTimeControlinZoneNT, Shutouts, Goals, Assists, TotalPoint, Pim, Hits, FaceOffWonDF, FaceOffTotalDF, FaceOffWonOF, FaceOffTotalOF, FaceOffWonNT, FaceOffTotalNT, EmptyNetGoal, TotalPlayersSalaries, ExpensePerDay, DivisionLeader) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_Number, "int"),
				GetSQLValueString($ActiveSeason, "int"),
				GetSQLValueString($TMP_Captain, "int"),
				GetSQLValueString($TMP_Assistant1, "int"),
				GetSQLValueString($TMP_Assistant2, "int"),
				GetSQLValueString($TMP_ArenaCapacity1, "int"),
				GetSQLValueString($TMP_ArenaCapacity2, "int"),
				GetSQLValueString($TMP_ArenaCapacity3, "int"),
				GetSQLValueString($TMP_ArenaCapacity4, "int"),
				GetSQLValueString($TMP_ArenaCapacity5, "int"),
				GetSQLValueString($TMP_TicketPrice1, "double"),
				GetSQLValueString($TMP_TicketPrice2, "double"),
				GetSQLValueString($TMP_TicketPrice3, "double"),
				GetSQLValueString($TMP_TicketPrice4, "double"),
				GetSQLValueString($TMP_TicketPrice5, "double"),
				GetSQLValueString($TMP_Attendance1, "double"),
				GetSQLValueString($TMP_Attendance2, "double"),
				GetSQLValueString($TMP_Attendance3, "double"),
				GetSQLValueString($TMP_Attendance4, "double"),
				GetSQLValueString($TMP_Attendance5, "double"),
				GetSQLValueString($TMP_SeasonTicketPCT, "double"),
				GetSQLValueString($TMP_Finance, "double"),
				GetSQLValueString($TMP_Payroll, "double"),
				GetSQLValueString($TMP_TotalAttendance, "double"),
				GetSQLValueString($TMP_TotalIncome, "double"),
				GetSQLValueString($TMP_CoachID, "int"),
				GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
				GetSQLValueString($TMP_Morale, "double"),
				GetSQLValueString($TMP_PlayOffEliminated, "text"),
				GetSQLValueString($TMP_PowerRanking, "double"),
				GetSQLValueString($TMP_LinesLoad, "double"),
				GetSQLValueString($TMP_PlayOffWinRound, "double"),
				GetSQLValueString($TMP_LuxuryTaxeTotal, "double"),
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
				GetSQLValueString($DivLeader, "text")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());

			
		} elseif ($SQLAction=="UPDATE"){
			$updateSQL = sprintf("UPDATE proteam set Name=%s, Abbre=%s, GM=%s, Email=%s, Messenger=%s, City=%s, Arena=%s, Division=%s, Conference=%s  WHERE Number=%s",
				GetSQLValueString($TMP_Name, "text"),
				GetSQLValueString($TMP_Abbre, "text"),
				GetSQLValueString($TMP_GM, "text"),
				GetSQLValueString($TMP_Email, "text"),
				GetSQLValueString($TMP_Messenger, "text"),
				GetSQLValueString($TMP_City, "text"),
				GetSQLValueString($TMP_Arena, "text"),
				GetSQLValueString($TMP_Division, "text"),
				GetSQLValueString($TMP_Conference, "text"),
				GetSQLValueString($TMP_Number, "int")
			);
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
			
			
			if ($SQLSeasonAction=="INSERT"){
			
				$insertSQL = sprintf("INSERT INTO proteamstandings (Number, Season_ID, Captain, Assistant1, Assistant2, ArenaCapacity1, ArenaCapacity2, ArenaCapacity3, ArenaCapacity4, ArenaCapacity5, TicketPrice1, TicketPrice2, TicketPrice3, TicketPrice4, TicketPrice5, Attendance1, Attendance2, Attendance3, Attendance4, Attendance5, SeasonTicketPCT, Finance, Payroll, TotalAttendance, TotalIncome, CoachID, ScheduleGameInAYear, Morale, PlayOffEliminated, PowerRanking, LinesLoad, PlayOffWinRound, LuxuryTaxeTotal, StandingPlayoffTitle, Streak, Last10W, Last10L, Last10T, Last10OTW, Last10OTL, Last10SOW, Last10SOL, GP, W, L, T, OTW, OTL, SOW, SOL, Point, GF, GA, HomeGP, HomeW, HomeL, HomeT, HomeOTW, HomeOTL, HomeSOW, HomeSOL, HomeGF, HomeGA, PPAttemp, PPGoal, PKAttemp, PKGoalGA, PKGoalGF, ShotsFor, ShotsAga, ShotsBlock, ShotsPerPeriod1, ShotsPerPeriod2, ShotsPerPeriod3, ShotsPerPeriod4, GoalsPerPeriod1, GoalsPerPeriod2, GoalsPerPeriod3, GoalsPerPeriod4, PuckTimeInZoneDF, PuckTimeInZoneOF, PuckTimeInZoneNT, PuckTimeControlinZoneDF, PuckTimeControlinZoneOF, PuckTimeControlinZoneNT, Shutouts, Goals, Assists, TotalPoint, Pim, Hits, FaceOffWonDF, FaceOffTotalDF, FaceOffWonOF, FaceOffTotalOF, FaceOffWonNT, FaceOffTotalNT, EmptyNetGoal, TotalPlayersSalaries, ExpensePerDay, DivisionLeader) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					GetSQLValueString($TMP_Number, "int"),
					GetSQLValueString($ActiveSeason, "int"),
					GetSQLValueString($TMP_Captain, "int"),
					GetSQLValueString($TMP_Assistant1, "int"),
					GetSQLValueString($TMP_Assistant2, "int"),
					GetSQLValueString($TMP_ArenaCapacity1, "int"),
					GetSQLValueString($TMP_ArenaCapacity2, "int"),
					GetSQLValueString($TMP_ArenaCapacity3, "int"),
					GetSQLValueString($TMP_ArenaCapacity4, "int"),
					GetSQLValueString($TMP_ArenaCapacity5, "int"),
					GetSQLValueString($TMP_TicketPrice1, "double"),
					GetSQLValueString($TMP_TicketPrice2, "double"),
					GetSQLValueString($TMP_TicketPrice3, "double"),
					GetSQLValueString($TMP_TicketPrice4, "double"),
					GetSQLValueString($TMP_TicketPrice5, "double"),
					GetSQLValueString($TMP_Attendance1, "double"),
					GetSQLValueString($TMP_Attendance2, "double"),
					GetSQLValueString($TMP_Attendance3, "double"),
					GetSQLValueString($TMP_Attendance4, "double"),
					GetSQLValueString($TMP_Attendance5, "double"),
					GetSQLValueString($TMP_SeasonTicketPCT, "double"),
					GetSQLValueString($TMP_Finance, "double"),
					GetSQLValueString($TMP_Payroll, "double"),
					GetSQLValueString($TMP_TotalAttendance, "double"),
					GetSQLValueString($TMP_TotalIncome, "double"),
					GetSQLValueString($TMP_CoachID, "int"),
					GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
					GetSQLValueString($TMP_Morale, "double"),
					GetSQLValueString($TMP_PlayOffEliminated, "text"),
					GetSQLValueString($TMP_PowerRanking, "double"),
					GetSQLValueString($TMP_LinesLoad, "double"),
					GetSQLValueString($TMP_PlayOffWinRound, "double"),
					GetSQLValueString($TMP_LuxuryTaxeTotal, "double"),
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
					GetSQLValueString($DivLeader, "text")
				);
				
				mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
			} elseif ($SQLSeasonAction=="UPDATE"){
			
				$updateSQL = sprintf("UPDATE proteamstandings set Captain=%s, Assistant1=%s, Assistant2=%s, ArenaCapacity1=%s, ArenaCapacity2=%s, ArenaCapacity3=%s, ArenaCapacity4=%s, ArenaCapacity5=%s, TicketPrice1=%s, TicketPrice2=%s, TicketPrice3=%s, TicketPrice4=%s, TicketPrice5=%s, Attendance1=%s, Attendance2=%s, Attendance3=%s, Attendance4=%s, Attendance5=%s, SeasonTicketPCT=%s, Finance=%s, Payroll=%s, TotalAttendance=%s, TotalIncome=%s, CoachID=%s, ScheduleGameInAYear=%s, Morale=%s, PlayOffEliminated=%s, PowerRanking=%s, LinesLoad=%s, PlayOffWinRound=%s, LuxuryTaxeTotal=%s, StandingPlayoffTitle=%s, Streak=%s, Last10W=%s, Last10L=%s, Last10T=%s, Last10OTW=%s, Last10OTL=%s, Last10SOW=%s, Last10SOL=%s, GP=%s, W=%s, L=%s, T=%s, OTW=%s, OTL=%s, SOW=%s, SOL=%s, Point=%s, GF=%s, GA=%s, HomeGP=%s, HomeW=%s, HomeL=%s, HomeT=%s, HomeOTW=%s, HomeOTL=%s, HomeSOW=%s, HomeSOL=%s, HomeGF=%s, HomeGA=%s, PPAttemp=%s, PPGoal=%s, PKAttemp=%s, PKGoalGA=%s, PKGoalGF=%s, ShotsFor=%s, ShotsAga=%s, ShotsBlock=%s, ShotsPerPeriod1=%s, ShotsPerPeriod2=%s, ShotsPerPeriod3=%s, ShotsPerPeriod4=%s, GoalsPerPeriod1=%s, GoalsPerPeriod2=%s, GoalsPerPeriod3=%s, GoalsPerPeriod4=%s, PuckTimeInZoneDF=%s, PuckTimeInZoneOF=%s, PuckTimeInZoneNT=%s, PuckTimeControlinZoneDF=%s, PuckTimeControlinZoneOF=%s, PuckTimeControlinZoneNT=%s, Shutouts=%s, Goals=%s, Assists=%s, Points=%s, Pim=%s, Hits=%s, FaceOffWonDF=%s, FaceOffTotalDF=%s, FaceOffWonOF=%s, FaceOffTotalOF=%s, FaceOffWonNT=%s, FaceOffTotalNT=%s, EmptyNetGoal=%s, TotalPlayersSalaries=%s, ExpensePerDay=%s, DivisionLeader=%s WHERE Number=%s AND Season_ID=%s",
					GetSQLValueString($TMP_Captain, "int"),
					GetSQLValueString($TMP_Assistant1, "int"),
					GetSQLValueString($TMP_Assistant2, "int"),
					GetSQLValueString($TMP_ArenaCapacity1, "int"),
					GetSQLValueString($TMP_ArenaCapacity2, "int"),
					GetSQLValueString($TMP_ArenaCapacity3, "int"),
					GetSQLValueString($TMP_ArenaCapacity4, "int"),
					GetSQLValueString($TMP_ArenaCapacity5, "int"),
					GetSQLValueString($TMP_TicketPrice1, "double"),
					GetSQLValueString($TMP_TicketPrice2, "double"),
					GetSQLValueString($TMP_TicketPrice3, "double"),
					GetSQLValueString($TMP_TicketPrice4, "double"),
					GetSQLValueString($TMP_TicketPrice5, "double"),
					GetSQLValueString($TMP_Attendance1, "double"),
					GetSQLValueString($TMP_Attendance2, "double"),
					GetSQLValueString($TMP_Attendance3, "double"),
					GetSQLValueString($TMP_Attendance4, "double"),
					GetSQLValueString($TMP_Attendance5, "double"),
					GetSQLValueString($TMP_SeasonTicketPCT, "double"),
					GetSQLValueString($TMP_Finance, "double"),
					GetSQLValueString($TMP_Payroll, "double"),
					GetSQLValueString($TMP_TotalAttendance, "double"),
					GetSQLValueString($TMP_TotalIncome, "double"),
					GetSQLValueString($TMP_CoachID, "int"),
					GetSQLValueString($TMP_ScheduleGameInAYear, "double"),
					GetSQLValueString($TMP_Morale, "double"),
					GetSQLValueString($TMP_PlayOffEliminated, "text"),
					GetSQLValueString($TMP_PowerRanking, "double"),
					GetSQLValueString($TMP_LinesLoad, "double"),
					GetSQLValueString($TMP_PlayOffWinRound, "double"),
					GetSQLValueString($TMP_LuxuryTaxeTotal, "double"),
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
					GetSQLValueString($DivLeader, "text"),
					GetSQLValueString($TMP_Number, "int"),
					GetSQLValueString($ActiveSeason, "int")
				);
				
				mysql_select_db($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
				
				$query_GetGM = sprintf("SELECT Name FROM gmstats WHERE Name='%s' AND Season_ID=%s",  $TMP_GM, $ActiveSeason );
				$GetGM = mysql_query($query_GetGM, $tmp_simhl) or die(mysql_error());
				$row_GetGM = mysql_fetch_assoc($GetGM);
				$totalRows_GetGM = mysql_num_rows($GetGM);
				
				if($totalRows_GetGM > 0){
					$insertSQL = sprintf("UPDATE gmstats SET Team=%s, ProGP=%s, ProW=%s, ProL=%s, ProT=%s, ProOTW=%s, ProOTL=%s, ProSOW=%s, ProSOL=%s, ProGF=%s, ProGA=%s, ProPim=%s, ProHits=%s  WHERE Name=%s AND Season_ID=%s",
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
						GetSQLValueString($TMP_GM, "text"),
						GetSQLValueString($ActiveSeason, "int")
					);
					
					mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
					$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());

				} else {

					$insertSQL = sprintf("INSERT INTO gmstats (Team, Name, Season_ID, ProGP, ProW, ProL, ProT, ProOTW, ProOTL, ProSOW, ProSOL, ProGF, ProGA, ProPim, ProHits) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
						GetSQLValueString($TMP_Number, "int"),
						GetSQLValueString($TMP_GM, "text"),
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
				
				
				if($totalRows_GetCoach > 0){
					$query_GetCoachStats = sprintf("SELECT Number FROM coachestats WHERE Number=%s AND Season_ID=%s",  $row_GetCoach['Number'], $ActiveSeason );
					$GetCoachStats = mysql_query($query_GetCoachStats, $tmp_simhl) or die(mysql_error());
					$row_GetCoachStats = mysql_fetch_assoc($GetCoachStats);
					$totalRows_GetCoachStats = mysql_num_rows($GetCoachStats);
										
					if($totalRows_GetCoachStats > 0){
						$insertSQL = sprintf("UPDATE coachestats SET Team=%s, ProGP=%s, ProW=%s, ProL=%s, ProT=%s, ProOTW=%s, ProOTL=%s, ProSOW=%s, ProSOL=%s, ProGF=%s, ProGA=%s, ProPim=%s, ProHits=%s  WHERE Number=%s AND Season_ID=%s",
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
							GetSQLValueString($row_GetCoach['Number'], "text"),
							GetSQLValueString($ActiveSeason, "int")
						);
						
						mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());

					} else {

						$insertSQL = sprintf("INSERT INTO coachestats (Team, Name, Number, Season_ID, ProGP, ProW, ProL, ProT, ProOTW, ProOTL, ProSOW, ProSOL, ProGF, ProGA, ProPim, ProHits) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
		$TMP_ArenaCapacity1="";
		$TMP_ArenaCapacity2="";
		$TMP_ArenaCapacity3="";
		$TMP_ArenaCapacity4="";
		$TMP_ArenaCapacity5="";
		$TMP_TicketPrice1="";
		$TMP_TicketPrice2="";
		$TMP_TicketPrice3="";
		$TMP_TicketPrice4="";
		$TMP_TicketPrice5="";
		$TMP_Attendance1="";
		$TMP_Attendance2="";
		$TMP_Attendance3="";
		$TMP_Attendance4="";
		$TMP_Attendance5="";
		$TMP_SeasonTicketPCT="";
		$TMP_Finance="";
		$TMP_Payroll="";
		$TMP_TotalAttendance="";
		$TMP_TotalIncome="";
		$TMP_CoachID="";
		$TMP_ScheduleGameInAYear="";
		$TMP_Morale="";
		$TMP_PlayOffEliminated="";
		$TMP_PowerRanking="";
		$TMP_LinesLoad="";
		$TMP_PlayOffWinRound="";
		$TMP_LuxuryTaxeTotal="";
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
$query_GetDivisions = "SELECT Division FROM proteam";
$GetDivisions = mysql_query($query_GetDivisions, $tmp_simhl) or die(mysql_error());
$row_GetDivisions = mysql_fetch_assoc($GetDivisions);

do {
	$query_CheckDivLeader = "SELECT P.Number FROM proteamstandings as P, proteam as T WHERE T.Number=P.Number AND P.Season_ID=".$ActiveSeason." AND T.Division='".$GetDivisions['Division']."' ORDER BY P.StandingPlayoffTitle desc, P.Point desc, P.GP asc Limit 0,1";
	$CheckDivLeader = mysql_query($query_CheckDivLeader, $tmp_simhl) or die(mysql_error());
	$row_CheckDivLeader = mysql_fetch_assoc($CheckDivLeader);

	$updateSQL = sprintf("UPDATE proteamstandings set DivisionLeader=%s WHERE Number=%s AND Season_ID=%s",					
		GetSQLValueString("True", "text"),
		GetSQLValueString($row_CheckDivLeader['Number'], "int"),
		GetSQLValueString($ActiveSeason, "int")
	);
	$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
				
} while ($row_GetDivisions = mysql_fetch_assoc($GetDivisions));

$updateSQL = "UPDATE config SET LastModifiedProTeams='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF PLAYERS COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF PROTEAM COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}
?>