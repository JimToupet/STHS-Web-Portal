<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php


$ID_GetAction = "0";
if (isset($_GET['action'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

set_time_limit(100000);
$uploaddir = 'File/'.$_SESSION['current_SeasonFolder']."/";
global $CurrentSeasonID;
$CurrentSeasonID = $_SESSION['current_SeasonID'];

//echo "<h4 align=center>Importing PLAYERS CSV</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['Players'];
	$updateGoTo = "import_csv_goalies.php?action=1";
} else {
	if (allowedExtension($_FILES['xmlFile']['name'],"csv")) {
		$file = $uploaddir . basename($_FILES['xmlFile']['name']);
		$updateGoTo = "upload.php";
		//$file = $uploaddir ."QMJHL0-ProTeam.xml";
		//echo basename($_FILES['xmlFile']['name']);
		if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
			$updateSQL = "UPDATE seasons SET Players='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

		} else {
			echo "<h5 align=center>Unable to process Players CSV file.  Please try uploading the file manually in previous page.</h5>";
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
global $current_status;
global $TMP_NAME;
global $TMP_URLLINK;
global $TMP_TEAM;
global $TMP_COUNTRY;
global $TMP_AGEDATE;
global $TMP_WEIGHT;
global $TMP_HEIGHT;
global $TMP_POSC;
global $TMP_POSLW;
global $TMP_POSRW;
global $TMP_POSD;
global $TMP_CONTRACT;
global $TMP_ROOKIE;
global $TMP_PPROTECTED;
global $TMP_NOAPPLYRERATE;
global $TMP_AVAILABLEFORTRADE;
global $TMP_NOTRADE;	
global $TMP_CANPLAYPRO;
global $TMP_CANPLAYFARM;
global $TMP_FORCEWAIVER;
global $TMP_STARPOWER;
global $TMP_SALARY1;
global $TMP_SALARY2;
global $TMP_SALARY3;
global $TMP_SALARY4;
global $TMP_SALARY5;
global $TMP_SALARY6;
global $TMP_SALARY7;
global $TMP_SALARY8;
global $TMP_SALARY9;
global $TMP_SALARY10;
global $TMP_INJURY;
global $TMP_NUMBEROFINJURY;
global $TMP_CONDITION;
global $TMP_SUSPENSION;
global $TMP_STATUS0;
global $TMP_STATUS1;
global $TMP_STATUS2;
global $TMP_STATUS3;
global $TMP_STATUS4;
global $TMP_STATUS5;
global $TMP_STATUS6;
global $TMP_STATUS7;
global $TMP_STATUS8;
global $TMP_STATUS9;
global $TMP_CK;
global $TMP_FG;
global $TMP_DI;
global $TMP_SK;
global $TMP_ST;
global $TMP_EN;
global $TMP_DU;
global $TMP_PH;
global $TMP_FO;
global $TMP_PA;
global $TMP_SC;
global $TMP_DF;
global $TMP_PS;
global $TMP_EX;
global $TMP_LD;
global $TMP_PO;
global $TMP_MO;
global $TMP_OVERALL;
global $TMP_PROGP;
global $TMP_PROSHOTS;
global $TMP_PROG;
global $TMP_PROA;
global $TMP_PROPOINT;
global $TMP_PROPLUSMINUS;
global $TMP_PROPIM;
global $TMP_PRO5PIM;
global $TMP_PROSHOTSBLOCK;
global $TMP_PROOWNSHOTSBLOCK;
global $TMP_PROOWNSHOTSMISSGOAL;
global $TMP_PROHITS;
global $TMP_PROHITSTOOK;
global $TMP_PROGW;
global $TMP_PROGT;
global $TMP_PROFACEOFFWON;
global $TMP_PROFACEOFFTOTAL;
global $TMP_PROPENALITYSHOTSSCORE;
global $TMP_PROPENALITYSHOTSTOTAL;
global $TMP_PROEMPTYNETGOAL;
global $TMP_PROMINUTEPLAY;
global $TMP_PROHATTRICK;
global $TMP_PROPPG;
global $TMP_PROPPA;
global $TMP_PROPPSHOTS;
global $TMP_PROPPMINUTEPLAY;
global $TMP_PROPKG;
global $TMP_PROPKA;
global $TMP_PROPKSHOTS;
global $TMP_PROPKMINUTEPLAY;
global $TMP_PROGIVEAWAY;
global $TMP_PROTAKEAWAY;
global $TMP_PROPUCKPOSSESIONTIME;
global $TMP_PROFIGHTW;
global $TMP_PROFIGHTL;
global $TMP_PROFIGHTT;
global $TMP_PROSTAR1;
global $TMP_PROSTAR2;
global $TMP_PROSTAR3;
global $TMP_FARMGP;
global $TMP_FARMSHOTS;
global $TMP_FARMG;
global $TMP_FARMA;
global $TMP_FARMPOINT;
global $TMP_FARMPLUSMINUS;
global $TMP_FARMPIM;
global $TMP_FARM5PIM;
global $TMP_FARMSHOTSBLOCK;
global $TMP_FARMOWNSHOTSBLOCK;
global $TMP_FARMOWNSHOTSMISSGOAL;
global $TMP_FARMHITS;
global $TMP_FARMHITSTOOK;
global $TMP_FARMGW;
global $TMP_FARMGT;
global $TMP_FARMFACEOFFWON;
global $TMP_FARMFACEOFFTOTAL;
global $TMP_FARMPENALITYSHOTSSCORE;
global $TMP_FARMPENALITYSHOTSTOTAL;
global $TMP_FARMEMPTYNETGOAL;
global $TMP_FARMMINUTEPLAY;
global $TMP_FARMHATTRICK;
global $TMP_FARMPPG;
global $TMP_FARMPPA;
global $TMP_FARMPPSHOTS;
global $TMP_FARMPPMINUTEPLAY;
global $TMP_FARMPKG;
global $TMP_FARMPKA;
global $TMP_FARMPKSHOTS;
global $TMP_FARMPKMINUTEPLAY;
global $TMP_FARMGIVEAWAY;
global $TMP_FARMTAKEAWAY;
global $TMP_FARMPUCKPOSSESIONTIME;
global $TMP_FARMFIGHTW;
global $TMP_FARMFIGHTL;
global $TMP_FARMFIGHTT;
global $TMP_FARMSTAR1;
global $TMP_FARMSTAR2;
global $TMP_FARMSTAR3;
global $TMP_GAMEINROWWITHAGOAL;
global $TMP_GAMEINROWWITHAPOINT;
global $TMP_GAMEINROWWITHOUTAGOAL;
global $TMP_GAMEINROWWITHOUTAPOINT;
global $TMP_EXCLUDEFROMPAYROLL;
global $TMP_FARMGW;
global $FarmPPMinutePlay;
global $TMP_FarmStarPower7Days;
global $TMP_FarmStarPower30Days;
global $TMP_FarmStarPowerYear;
global $TMP_ProStarPower7Days;
global $TMP_ProStarPower30Days;
global $TMP_ProStarPowerYear;
global $current_status;
global $current_injury;
global $current_suspension;
global $tmp_hostname_simhl;
global $tmp_database_simhl;
global $tmp_username_simhl;
global $tmp_password_simhl;
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
while (($data = fgetcsv($handle, 3000, ",")) !== FALSE) {
	
	//INSERT A RCORD TO THE DATABASE
	//mysql_query("INSERT INTO `table` (`field1`,`field2`,`field3`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}')");
	if ($row >> 0){
		
		$TMP_NAME = ParseSQL($data[1]);
		$TMP_NAME2 = $data[1];
		$TMP_NUMBER=$data[0];
		//echo $row." ".$TMP_NAME."<br>";
		
		mysql_select_db($tmp_database_simhl, $tmp_simhl);
		$query_CheckPlayer = sprintf("SELECT Name, Status0, Injury, Suspension FROM players WHERE Number=%s", $TMP_NUMBER);
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
			$current_status=$row_CheckPlayer['Status0'];
			$current_injury=$row_CheckPlayer['Injury'];
			$current_suspension=$row_CheckPlayer['Suspension'];
			$query_CheckSeason = sprintf("SELECT Season_ID FROM playerstats WHERE Number=%s AND Season_ID=%s AND Active='True'", $TMP_NUMBER, $ActiveSeason);
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
				
		$TMP_NUMBER=$data[0];
		$TMP_NAME=ParseSQL($data[1]);
		$TMP_URLLINK=$data[2];
		$TMP_TEAM=$data[3];
		$TMP_COUNTRY=$data[4];
		
		$timestamp=strftime($data[5]);
		
		if(substr_count($timestamp,"-") > 0){
			$DateDelim = "-";
		} elseif (substr_count($timestamp,".") > 0){
			$DateDelim = "0";
		} else {
			$DateDelim = "/";
		}
		
		$TMP_AGEDATE = date("m-d-Y", strtotime($data[5]));
		
		$TMP_AGEDATE=convertdate($timestamp,$_SESSION['current_DateFormat'],'usa',$DateDelim);
		$TMP_AgeDate=strftime("%m-%d-%Y", strtotime($TMP_AGEDATE));
		//echo $TMP_NAME." ".$timestamp." ".$TMP_AGEDATE." ".$TMP_AgeDate." - ".$_SESSION['current_DateFormat']." - age  ".getAge($timestamp)."<br>";
		//$TMP_AGEDATE=$data[5];
		$TMP_WEIGHT=$data[6];
		$TMP_HEIGHT=$data[7];
		$TMP_POSC=$data[8];
		$TMP_POSLW=$data[9];
		$TMP_POSRW=$data[10];
		$TMP_POSD=$data[11];
		$TMP_CONTRACT=$data[12];
		$TMP_ROOKIE=$data[13];
		$TMP_PPROTECTED=$data[14];
		$TMP_NOAPPLYRERATE=$data[15];
		$TMP_AVAILABLEFORTRADE=$data[16];
		$TMP_NOTRADE=$data[17];
		$TMP_CANPLAYPRO=$data[18];
		$TMP_CANPLAYFARM=$data[19];
		$TMP_FORCEWAIVER=$data[20];
		$TMP_STARPOWER=$data[21];
		$TMP_SALARY1=$data[22];
		$TMP_SALARY2=$data[23];
		$TMP_SALARY3=$data[24];
		$TMP_SALARY4=$data[25];
		$TMP_SALARY5=$data[26];
		$TMP_SALARY6=$data[27];
		$TMP_SALARY7=$data[28];
		$TMP_SALARY8=$data[29];
		$TMP_SALARY9=$data[30];
		$TMP_SALARY10=$data[31];
		$TMP_INJURY=$data[32];
		$TMP_NUMBEROFINJURY=$data[33];
		$TMP_CONDITION=$data[34];
		$TMP_SUSPENSION=$data[35];
		$TMP_STATUS0=$data[36];
		$TMP_STATUS1=$data[37];
		$TMP_STATUS2=$data[38];
		$TMP_STATUS3=$data[39];
		$TMP_STATUS4=$data[40];
		$TMP_STATUS5=$data[41];
		$TMP_STATUS6=$data[42];
		$TMP_STATUS7=$data[43];
		$TMP_STATUS8=$data[44];
		$TMP_STATUS9=$data[45];
		$TMP_CK=$data[46];
		$TMP_FG=$data[47];
		$TMP_DI=$data[48];
		$TMP_SK=$data[49];
		$TMP_ST=$data[50];
		$TMP_EN=$data[51];
		$TMP_DU=$data[52];
		$TMP_PH=$data[53];
		$TMP_FO=$data[54];
		$TMP_PA=$data[55];
		$TMP_SC=$data[56];
		$TMP_DF=$data[57];
		$TMP_PS=$data[58];
		$TMP_EX=$data[59];
		$TMP_LD=$data[60];
		$TMP_PO=$data[61];
		$TMP_MO=$data[62];
		$TMP_OVERALL=$data[63];
		$TMP_PROGP=$data[64];
		$TMP_PROSHOTS=$data[65];
		$TMP_PROG=$data[66];
		$TMP_PROA=$data[67];
		$TMP_PROPOINT=$data[68];
		$TMP_PROPLUSMINUS=$data[69];
		$TMP_PROPIM=$data[70];
		$TMP_PRO5PIM=$data[71];
		$TMP_PROSHOTSBLOCK=$data[72];
		$TMP_PROOWNSHOTSBLOCK=$data[73];
		$TMP_PROOWNSHOTSMISSGOAL=$data[74];
		$TMP_PROHITS=$data[75];
		$TMP_PROHITSTOOK=$data[76];
		$TMP_PROGW=$data[77];
		$TMP_PROGT=$data[78];
		$TMP_PROFACEOFFWON=$data[79];
		$TMP_PROFACEOFFTOTAL=$data[80];
		$TMP_PROPENALITYSHOTSSCORE=$data[81];
		$TMP_PROPENALITYSHOTSTOTAL=$data[82];
		$TMP_PROEMPTYNETGOAL=$data[83];
		$TMP_PROMINUTEPLAY=$data[84];
		$TMP_PROHATTRICK=$data[85];
		$TMP_PROPPG=$data[86];
		$TMP_PROPPA=$data[87];
		$TMP_PROPPSHOTS=$data[88];
		$TMP_PROPPMINUTEPLAY=$data[89];
		$TMP_PROPKG=$data[90];
		$TMP_PROPKA=$data[91];
		$TMP_PROPKSHOTS=$data[92];
		$TMP_PROPKMINUTEPLAY=$data[93];
		$TMP_PROGIVEAWAY=$data[94];
		$TMP_PROTAKEAWAY=$data[95];
		$TMP_PROPUCKPOSSESIONTIME=$data[96];
		$TMP_PROFIGHTW=$data[97];
		$TMP_PROFIGHTL=$data[98];
		$TMP_PROFIGHTT=$data[99];
		$TMP_PROSTAR1=$data[100];
		$TMP_PROSTAR2=$data[101];
		$TMP_PROSTAR3=$data[102];
		$TMP_ProStarPower7Days=$data[103];
		$TMP_ProStarPower30Days=$data[104];
		$TMP_ProStarPowerYear=$data[105];
		$TMP_FARMGP=$data[106];
		$TMP_FARMSHOTS=$data[107];
		$TMP_FARMG=$data[108];
		$TMP_FARMA=$data[109];
		$TMP_FARMPOINT=$data[110];
		$TMP_FARMPLUSMINUS=$data[111];
		$TMP_FARMPIM=$data[112];
		$TMP_FARM5PIM=$data[113];
		$TMP_FARMSHOTSBLOCK=$data[114];
		$TMP_FARMOWNSHOTSBLOCK=$data[115];
		$TMP_FARMOWNSHOTSMISSGOAL=$data[116];
		$TMP_FARMHITS=$data[117];
		$TMP_FARMHITSTOOK=$data[118];
		$TMP_FARMGW=$data[119];
		$TMP_FARMGT=$data[120];
		$TMP_FARMFACEOFFWON=$data[121];
		$TMP_FARMFACEOFFTOTAL=$data[122];
		$TMP_FARMPENALITYSHOTSSCORE=$data[123];
		$TMP_FARMPENALITYSHOTSTOTAL=$data[124];
		$TMP_FARMEMPTYNETGOAL=$data[125];
		$TMP_FARMMINUTEPLAY=$data[126];
		$TMP_FARMHATTRICK=$data[127];
		$TMP_FARMPPG=$data[128];
		$TMP_FARMPPA=$data[129];
		$TMP_FARMPPSHOTS=$data[130];
		$TMP_FARMPPMINUTEPLAY=$data[131];
		$TMP_FARMPKG=$data[132];
		$TMP_FARMPKA=$data[133];
		$TMP_FARMPKSHOTS=$data[134];
		$TMP_FARMPKMINUTEPLAY=$data[135];
		$TMP_FARMGIVEAWAY=$data[136];
		$TMP_FARMTAKEAWAY=$data[137];
		$TMP_FARMPUCKPOSSESIONTIME=$data[138];
		$TMP_FARMFIGHTW=$data[139];
		$TMP_FARMFIGHTL=$data[140];
		$TMP_FARMFIGHTT=$data[141];
		$TMP_FARMSTAR1=$data[142];
		$TMP_FARMSTAR2=$data[143];
		$TMP_FARMSTAR3=$data[144];
		$TMP_GAMEINROWWITHAGOAL=$data[145];
		$TMP_GAMEINROWWITHAPOINT=$data[146];
		$TMP_GAMEINROWWITHOUTAGOAL=$data[147];
		$TMP_GAMEINROWWITHOUTAPOINT=$data[148];
		$TMP_FarmStarPower7Days=$data[149];
		$TMP_FarmStarPower30Days=$data[150];
		$TMP_FarmStarPowerYear=$data[151];
		$TMP_EXCLUDEFROMPAYROLL=$data[152];	
		$TMP_PHOTO=$TMP_NAME.".jpg";
		if ($TMP_POSC=="True"){
			$TMP_POSITION=1;
		} else if ($TMP_POSLW=="True"){
			$TMP_POSITION=2;
		} else if ($TMP_POSRW=="True"){
			$TMP_POSITION=3;
		} else if ($TMP_POSD=="True"){
			$TMP_POSITION=4;
		} else {
			$TMP_POSITION=0;	
		}
		
		if ($TMP_TEAM == NULL) { $TMP_TEAM = 0; }
		if ($TMP_TEAM == "NULL") { $TMP_TEAM = 0; }
		if ($TMP_TEAM == "") { $TMP_TEAM = 0; }
		
		//echo $TMP_NAME." - ".$TMP_PROMINUTEPLAY." - ".$TMP_TEAM."<br>"; 			
		
		if ($SQLAction=="INSERT"){
//echo "sql action = 1<br>";
			$insertSQL = sprintf("INSERT INTO players (Name,Position,Photo,Number,URLLink, Team, Country, Age, AgeDate, Weight, Height, PosC, PosLW, PosRW, PosD, Contract, Rookie, Protected, NoApplyRerate, AvailableforTrade, NoTrade, CanPlayPro, CanPlayFarm, ForceWaiver, StarPower, Salary1, Salary2, Salary3, Salary4, Salary5, Salary6, Salary7, Salary8, Salary9, Salary10, Injury, NumberOfInjury, CON, Suspension, Status0, Status1, Status2, Status3, Status4, Status5, Status6, Status7, Status8, Status9, CK, FG, DI, SK, ST, EN, DU, PH, FO, PA, SC, DF, PS, EX, LD, PO, MO, Overall, DateCreated, Retired) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 0)",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_POSITION, "double"),
				GetSQLValueString($TMP_PHOTO, "text"),
				GetSQLValueString($TMP_NUMBER, "double"),
				GetSQLValueString($TMP_URLLINK,  "text"),
				GetSQLValueString($TMP_TEAM,  "int"),
				GetSQLValueString($TMP_COUNTRY, "text"),
				GetSQLValueString(getAge($TMP_AGEDATE), "int"),
				GetSQLValueString($TMP_AGEDATE, "text"),
				GetSQLValueString($TMP_WEIGHT, "double"),
				GetSQLValueString($TMP_HEIGHT, "double"),
				GetSQLValueString($TMP_POSC, "text"),
				GetSQLValueString($TMP_POSLW, "text"),
				GetSQLValueString($TMP_POSRW, "text"),
				GetSQLValueString($TMP_POSD, "text"),
				GetSQLValueString($TMP_CONTRACT, "double"),
				GetSQLValueString($TMP_ROOKIE, "text"),
				GetSQLValueString($TMP_PPROTECTED, "text"),
				GetSQLValueString($TMP_NOAPPLYRERATE, "text"),
				GetSQLValueString($TMP_AVAILABLEFORTRADE, "text"),
				GetSQLValueString($TMP_NOTRADE, "text"),
				GetSQLValueString($TMP_CANPLAYPRO, "text"),
				GetSQLValueString($TMP_CANPLAYFARM, "text"),
				GetSQLValueString($TMP_FORCEWAIVER, "text"),
				GetSQLValueString($TMP_STARPOWER, "double"),
				GetSQLValueString($TMP_SALARY1, "double"),
				GetSQLValueString($TMP_SALARY2, "double"),
				GetSQLValueString($TMP_SALARY3, "double"),
				GetSQLValueString($TMP_SALARY4, "double"),
				GetSQLValueString($TMP_SALARY5, "double"),
				GetSQLValueString($TMP_SALARY6, "double"),
				GetSQLValueString($TMP_SALARY7, "double"),
				GetSQLValueString($TMP_SALARY8, "double"),
				GetSQLValueString($TMP_SALARY9, "double"),
				GetSQLValueString($TMP_SALARY10, "double"),
				GetSQLValueString($TMP_INJURY, "text"),
				GetSQLValueString($TMP_NUMBEROFINJURY, "double"),
				GetSQLValueString($TMP_CONDITION, "int"),
				GetSQLValueString($TMP_SUSPENSION, "double"),
				GetSQLValueString($TMP_STATUS0, "double"),
				GetSQLValueString($TMP_STATUS1, "double"),
				GetSQLValueString($TMP_STATUS2, "double"),
				GetSQLValueString($TMP_STATUS3, "double"),
				GetSQLValueString($TMP_STATUS4, "double"),
				GetSQLValueString($TMP_STATUS5, "double"),
				GetSQLValueString($TMP_STATUS6, "double"),
				GetSQLValueString($TMP_STATUS7, "double"),
				GetSQLValueString($TMP_STATUS8, "double"),
				GetSQLValueString($TMP_STATUS9, "double"),
				GetSQLValueString($TMP_CK, "double"),
				GetSQLValueString($TMP_FG, "double"),
				GetSQLValueString($TMP_DI, "double"),
				GetSQLValueString($TMP_SK, "double"),
				GetSQLValueString($TMP_ST, "double"),
				GetSQLValueString($TMP_EN, "double"),
				GetSQLValueString($TMP_DU, "double"),
				GetSQLValueString($TMP_PH, "double"),
				GetSQLValueString($TMP_FO, "double"),
				GetSQLValueString($TMP_PA, "double"),
				GetSQLValueString($TMP_SC, "double"),
				GetSQLValueString($TMP_DF, "double"),
				GetSQLValueString($TMP_PS, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_MO, "double"),
				GetSQLValueString($TMP_OVERALL, "double"),
				GetSQLValueString($TodaysDate, "date")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());

//echo "sql action = 2<br>";
		
				$insertSQL = sprintf("INSERT INTO playerstats (Name, Number, Season_ID, ProGP, ProShots, ProG, ProA, ProPoint, ProPlusMinus, ProPim, Pro5Pim, ProShotsBlock, ProOwnShotsBlock, ProOwnShotsMissGoals,ProHits, ProHitsTook, ProGW, ProGT, ProFaceOffWon, ProFaceOffTotal, ProPenalityShotsScore, ProPenalityShotsTotal, ProEmptyNetGoal, ProMinutePlay, ProHatTrick, ProPPG, ProPPA, ProPPShots, ProPPMinutePlay, ProPKG, ProPKA, ProPKShots, ProPKMinutePlay, ProGiveAway, ProTakeAway, ProPuckPossesionTime, ProFightW, ProFightL, ProFightT, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGP, FarmShots, FarmG, FarmA, FarmPoint, FarmPlusMinus, FarmPim, Farm5Pim, FarmShotsBlock, FarmOwnShotsBlock, FarmOwnShotsMissGoals, FarmHits, FarmHitsTook, FarmGW, FarmGT, FarmFaceOffWon, FarmFaceOffTotal, FarmPenalityShotsScore, FarmPenalityShotsTotal, FarmEmptyNetGoal, FarmMinutePlay, FarmHatTrick, FarmPPG, FarmPPA, FarmPPShots, FarmPPMinutePlay, FarmPKG, FarmPKA, FarmPKShots, FarmPKMinutePlay, FarmGiveAway, FarmTakeAway, FarmPuckPossesionTime, FarmFightW, FarmFightL, FarmFightT, FarmStar1, FarmStar2, FarmStar3, GameInRowWithAGoal, GameInRowWithAPoint, GameInRowWithOutAGoal, GameInRowWithOutAPoint, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, ExcludeFromPayroll,Team,Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					GetSQLValueString($TMP_NAME, "text"),
					GetSQLValueString($TMP_NUMBER, "double"),
					GetSQLValueString($ActiveSeason, "int"),
					GetSQLValueString($TMP_PROGP, "double"),
					GetSQLValueString($TMP_PROSHOTS, "double"),
					GetSQLValueString($TMP_PROG, "double"),
					GetSQLValueString($TMP_PROA, "double"),
					GetSQLValueString($TMP_PROPOINT, "double"),
					GetSQLValueString($TMP_PROPLUSMINUS, "double"),
					GetSQLValueString($TMP_PROPIM, "double"),
					GetSQLValueString($TMP_PRO5PIM, "double"),
					GetSQLValueString($TMP_PROSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_PROOWNSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_PROOWNSHOTSMISSGOAL, "double"),
					GetSQLValueString($TMP_PROHITS, "double"),
					GetSQLValueString($TMP_PROHITSTOOK, "double"),
					GetSQLValueString($TMP_PROGW, "double"),
					GetSQLValueString($TMP_PROGT, "double"),
					GetSQLValueString($TMP_PROFACEOFFWON, "double"),
					GetSQLValueString($TMP_PROFACEOFFTOTAL, "double"),
					GetSQLValueString($TMP_PROPENALITYSHOTSSCORE, "double"),
					GetSQLValueString($TMP_PROPENALITYSHOTSTOTAL, "double"),
					GetSQLValueString($TMP_PROEMPTYNETGOAL, "double"),
					GetSQLValueString($TMP_PROMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROHATTRICK, "double"),
					GetSQLValueString($TMP_PROPPG, "double"),
					GetSQLValueString($TMP_PROPPA, "double"),
					GetSQLValueString($TMP_PROPPSHOTS, "double"),
					GetSQLValueString($TMP_PROPPMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROPKG, "double"),
					GetSQLValueString($TMP_PROPKA, "double"),
					GetSQLValueString($TMP_PROPKSHOTS, "double"),
					GetSQLValueString($TMP_PROPKMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROGIVEAWAY, "double"),
					GetSQLValueString($TMP_PROTAKEAWAY, "double"),
					GetSQLValueString($TMP_PROPUCKPOSSESIONTIME, "double"),
					GetSQLValueString($TMP_PROFIGHTW, "double"),
					GetSQLValueString($TMP_PROFIGHTL, "double"),
					GetSQLValueString($TMP_PROFIGHTT, "double"),
					GetSQLValueString($TMP_PROSTAR1, "double"),
					GetSQLValueString($TMP_PROSTAR2, "double"),
					GetSQLValueString($TMP_PROSTAR3, "double"),
					GetSQLValueString($TMP_ProStarPower7Days, "double"),
					GetSQLValueString($TMP_ProStarPower30Days, "double"),
					GetSQLValueString($TMP_ProStarPowerYear, "double"),
					GetSQLValueString($TMP_FARMGP, "double"),
					GetSQLValueString($TMP_FARMSHOTS, "double"),
					GetSQLValueString($TMP_FARMG, "double"),
					GetSQLValueString($TMP_FARMA, "double"),
					GetSQLValueString($TMP_FARMPOINT, "double"),
					GetSQLValueString($TMP_FARMPLUSMINUS, "double"),
					GetSQLValueString($TMP_FARMPIM, "double"),
					GetSQLValueString($TMP_FARM5PIM, "double"),
					GetSQLValueString($TMP_FARMSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_FARMOWNSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_FARMOWNSHOTSMISSGOAL, "double"),
					GetSQLValueString($TMP_FARMHITS, "double"),
					GetSQLValueString($TMP_FARMHITSTOOK, "double"),
					GetSQLValueString($TMP_FARMGW, "double"),
					GetSQLValueString($TMP_FARMGT, "double"),
					GetSQLValueString($TMP_FARMFACEOFFWON, "double"),
					GetSQLValueString($TMP_FARMFACEOFFTOTAL, "double"),
					GetSQLValueString($TMP_FARMPENALITYSHOTSSCORE, "double"),
					GetSQLValueString($TMP_FARMPENALITYSHOTSTOTAL, "double"),
					GetSQLValueString($TMP_FARMEMPTYNETGOAL, "double"),
					GetSQLValueString($TMP_FARMMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMHATTRICK, "double"),
					GetSQLValueString($TMP_FARMPPG, "double"),
					GetSQLValueString($TMP_FARMPPA, "double"),
					GetSQLValueString($TMP_FARMPPSHOTS, "double"),
					GetSQLValueString($TMP_FARMPPMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMPKG, "double"),
					GetSQLValueString($TMP_FARMPKA, "double"),
					GetSQLValueString($TMP_FARMPKSHOTS, "double"),
					GetSQLValueString($TMP_FARMPKMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMGIVEAWAY, "double"),
					GetSQLValueString($TMP_FARMTAKEAWAY, "double"),
					GetSQLValueString($TMP_FARMPUCKPOSSESIONTIME, "double"),
					GetSQLValueString($TMP_FARMFIGHTW, "double"),
					GetSQLValueString($TMP_FARMFIGHTL, "double"),
					GetSQLValueString($TMP_FARMFIGHTT, "double"),
					GetSQLValueString($TMP_FARMSTAR1, "double"),
					GetSQLValueString($TMP_FARMSTAR2, "double"),
					GetSQLValueString($TMP_FARMSTAR3, "double"),		
					GetSQLValueString($TMP_GAMEINROWWITHAGOAL, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHAPOINT, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHOUTAGOAL, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHOUTAPOINT, "double"),
					GetSQLValueString($TMP_FarmStarPower7Days, "double"),
					GetSQLValueString($TMP_FarmStarPower30Days, "double"),
					GetSQLValueString($TMP_FarmStarPowerYear, "double"),
					GetSQLValueString($TMP_EXCLUDEFROMPAYROLL, "text"),
					GetSQLValueString($TMP_TEAM,"int"),
					GetSQLValueString("True","text")
				);
			
				mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
//echo "sql action = 3<br>";
			
			$updateSQL = sprintf("UPDATE players set Name=%s, URLLink=%s, Team=%s, Country=%s, Age=%s, AgeDate=%s, Weight=%s, Height=%s, PosC=%s, PosLW=%s, PosRW=%s, PosD=%s, Contract=%s, Rookie=%s, Protected=%s, NoApplyRerate=%s, AvailableforTrade=%s, NoTrade=%s, CanPlayPro=%s, CanPlayFarm=%s, ForceWaiver=%s, StarPower=%s, Salary1=%s, Salary2=%s, Salary3=%s, Salary4=%s, Salary5=%s, Salary6=%s, Salary7=%s, Salary8=%s, Salary9=%s, Salary10=%s, Injury=%s, NumberOfInjury=%s, CON=%s, Suspension=%s, Status0=%s, Status1=%s, Status2=%s, Status3=%s, Status4=%s, Status5=%s, Status6=%s, Status7=%s, Status8=%s, Status9=%s, CK=%s, FG=%s, DI=%s, SK=%s, ST=%s, EN=%s, DU=%s, PH=%s, FO=%s, PA=%s, SC=%s, DF=%s, PS=%s, EX=%s, LD=%s, PO=%s, MO=%s, Overall=%s, DateCreated=%s  WHERE Number=%s AND Retired=0",
				GetSQLValueString($TMP_NAME, "text"),
				GetSQLValueString($TMP_URLLINK,  "text"),
				GetSQLValueString($TMP_TEAM,  "int"),
				GetSQLValueString($TMP_COUNTRY, "text"),
				GetSQLValueString(getAge($TMP_AGEDATE), "int"),
				GetSQLValueString($TMP_AGEDATE, "date"),
				GetSQLValueString($TMP_WEIGHT, "double"),
				GetSQLValueString($TMP_HEIGHT, "double"),
				GetSQLValueString($TMP_POSC, "text"),
				GetSQLValueString($TMP_POSLW, "text"),
				GetSQLValueString($TMP_POSRW, "text"),
				GetSQLValueString($TMP_POSD, "text"),
				GetSQLValueString($TMP_CONTRACT, "double"),
				GetSQLValueString($TMP_ROOKIE, "text"),
				GetSQLValueString($TMP_PPROTECTED, "text"),
				GetSQLValueString($TMP_NOAPPLYRERATE, "text"),
				GetSQLValueString($TMP_AVAILABLEFORTRADE, "text"),
				GetSQLValueString($TMP_NOTRADE, "text"),
				GetSQLValueString($TMP_CANPLAYPRO, "text"),
				GetSQLValueString($TMP_CANPLAYFARM, "text"),
				GetSQLValueString($TMP_FORCEWAIVER, "text"),
				GetSQLValueString($TMP_STARPOWER, "double"),
				GetSQLValueString($TMP_SALARY1, "double"),
				GetSQLValueString($TMP_SALARY2, "double"),
				GetSQLValueString($TMP_SALARY3, "double"),
				GetSQLValueString($TMP_SALARY4, "double"),
				GetSQLValueString($TMP_SALARY5, "double"),
				GetSQLValueString($TMP_SALARY6, "double"),
				GetSQLValueString($TMP_SALARY7, "double"),
				GetSQLValueString($TMP_SALARY8, "double"),
				GetSQLValueString($TMP_SALARY9, "double"),
				GetSQLValueString($TMP_SALARY10, "double"),
				GetSQLValueString($TMP_INJURY, "text"),
				GetSQLValueString($TMP_NUMBEROFINJURY, "double"),
				GetSQLValueString($TMP_CONDITION, "int"),
				GetSQLValueString($TMP_SUSPENSION, "double"),
				GetSQLValueString($TMP_STATUS0, "double"),
				GetSQLValueString($TMP_STATUS1, "double"),
				GetSQLValueString($TMP_STATUS2, "double"),
				GetSQLValueString($TMP_STATUS3, "double"),
				GetSQLValueString($TMP_STATUS4, "double"),
				GetSQLValueString($TMP_STATUS5, "double"),
				GetSQLValueString($TMP_STATUS6, "double"),
				GetSQLValueString($TMP_STATUS7, "double"),
				GetSQLValueString($TMP_STATUS8, "double"),
				GetSQLValueString($TMP_STATUS9, "double"),
				GetSQLValueString($TMP_CK, "double"),
				GetSQLValueString($TMP_FG, "double"),
				GetSQLValueString($TMP_DI, "double"),
				GetSQLValueString($TMP_SK, "double"),
				GetSQLValueString($TMP_ST, "double"),
				GetSQLValueString($TMP_EN, "double"),
				GetSQLValueString($TMP_DU, "double"),
				GetSQLValueString($TMP_PH, "double"),
				GetSQLValueString($TMP_FO, "double"),
				GetSQLValueString($TMP_PA, "double"),
				GetSQLValueString($TMP_SC, "double"),
				GetSQLValueString($TMP_DF, "double"),
				GetSQLValueString($TMP_PS, "double"),
				GetSQLValueString($TMP_EX, "double"),
				GetSQLValueString($TMP_LD, "double"),
				GetSQLValueString($TMP_PO, "double"),
				GetSQLValueString($TMP_MO, "double"),
				GetSQLValueString($TMP_OVERALL, "double"),
				GetSQLValueString($TodaysDate, "date"),
				GetSQLValueString($TMP_NUMBER, "double")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		
			if ($SQLSeasonAction=="INSERT" && $TMP_TEAM > 0){
//echo "sql action = 4<br>";
				
				$insertSQL = sprintf("INSERT INTO playerstats (Name, Number, Season_ID, ProGP, ProShots, ProG, ProA, ProPoint, ProPlusMinus, ProPim, Pro5Pim, ProShotsBlock, ProOwnShotsBlock, ProOwnShotsMissGoals,ProHits, ProHitsTook, ProGW, ProGT, ProFaceOffWon, ProFaceOffTotal, ProPenalityShotsScore, ProPenalityShotsTotal, ProEmptyNetGoal, ProMinutePlay, ProHatTrick, ProPPG, ProPPA, ProPPShots, ProPPMinutePlay, ProPKG, ProPKA, ProPKShots, ProPKMinutePlay, ProGiveAway, ProTakeAway, ProPuckPossesionTime, ProFightW, ProFightL, ProFightT, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGP, FarmShots, FarmG, FarmA, FarmPoint, FarmPlusMinus, FarmPim, Farm5Pim, FarmShotsBlock, FarmOwnShotsBlock, FarmOwnShotsMissGoals, FarmHits, FarmHitsTook, FarmGW, FarmGT, FarmFaceOffWon, FarmFaceOffTotal, FarmPenalityShotsScore, FarmPenalityShotsTotal, FarmEmptyNetGoal, FarmMinutePlay, FarmHatTrick, FarmPPG, FarmPPA, FarmPPShots, FarmPPMinutePlay, FarmPKG, FarmPKA, FarmPKShots, FarmPKMinutePlay, FarmGiveAway, FarmTakeAway, FarmPuckPossesionTime, FarmFightW, FarmFightL, FarmFightT, FarmStar1, FarmStar2, FarmStar3, GameInRowWithAGoal, GameInRowWithAPoint, GameInRowWithOutAGoal, GameInRowWithOutAPoint, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, ExcludeFromPayroll,Team,Active) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					GetSQLValueString($TMP_NAME, "text"),
					GetSQLValueString($TMP_NUMBER, "double"),
					GetSQLValueString($ActiveSeason, "int"),
					GetSQLValueString($TMP_PROGP, "double"),
					GetSQLValueString($TMP_PROSHOTS, "double"),
					GetSQLValueString($TMP_PROG, "double"),
					GetSQLValueString($TMP_PROA, "double"),
					GetSQLValueString($TMP_PROPOINT, "double"),
					GetSQLValueString($TMP_PROPLUSMINUS, "double"),
					GetSQLValueString($TMP_PROPIM, "double"),
					GetSQLValueString($TMP_PRO5PIM, "double"),
					GetSQLValueString($TMP_PROSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_PROOWNSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_PROOWNSHOTSMISSGOAL, "double"),
					GetSQLValueString($TMP_PROHITS, "double"),
					GetSQLValueString($TMP_PROHITSTOOK, "double"),
					GetSQLValueString($TMP_PROGW, "double"),
					GetSQLValueString($TMP_PROGT, "double"),
					GetSQLValueString($TMP_PROFACEOFFWON, "double"),
					GetSQLValueString($TMP_PROFACEOFFTOTAL, "double"),
					GetSQLValueString($TMP_PROPENALITYSHOTSSCORE, "double"),
					GetSQLValueString($TMP_PROPENALITYSHOTSTOTAL, "double"),
					GetSQLValueString($TMP_PROEMPTYNETGOAL, "double"),
					GetSQLValueString($TMP_PROMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROHATTRICK, "double"),
					GetSQLValueString($TMP_PROPPG, "double"),
					GetSQLValueString($TMP_PROPPA, "double"),
					GetSQLValueString($TMP_PROPPSHOTS, "double"),
					GetSQLValueString($TMP_PROPPMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROPKG, "double"),
					GetSQLValueString($TMP_PROPKA, "double"),
					GetSQLValueString($TMP_PROPKSHOTS, "double"),
					GetSQLValueString($TMP_PROPKMINUTEPLAY, "double"),
					GetSQLValueString($TMP_PROGIVEAWAY, "double"),
					GetSQLValueString($TMP_PROTAKEAWAY, "double"),
					GetSQLValueString($TMP_PROPUCKPOSSESIONTIME, "double"),
					GetSQLValueString($TMP_PROFIGHTW, "double"),
					GetSQLValueString($TMP_PROFIGHTL, "double"),
					GetSQLValueString($TMP_PROFIGHTT, "double"),
					GetSQLValueString($TMP_PROSTAR1, "double"),
					GetSQLValueString($TMP_PROSTAR2, "double"),
					GetSQLValueString($TMP_PROSTAR3, "double"),		
					GetSQLValueString($TMP_ProStarPower7Days, "double"),
					GetSQLValueString($TMP_ProStarPower30Days, "double"),
					GetSQLValueString($TMP_ProStarPowerYear, "double"),			
					GetSQLValueString($TMP_FARMGP, "double"),
					GetSQLValueString($TMP_FARMSHOTS, "double"),
					GetSQLValueString($TMP_FARMG, "double"),
					GetSQLValueString($TMP_FARMA, "double"),
					GetSQLValueString($TMP_FARMPOINT, "double"),
					GetSQLValueString($TMP_FARMPLUSMINUS, "double"),
					GetSQLValueString($TMP_FARMPIM, "double"),
					GetSQLValueString($TMP_FARM5PIM, "double"),
					GetSQLValueString($TMP_FARMSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_FARMOWNSHOTSBLOCK, "double"),
					GetSQLValueString($TMP_FARMOWNSHOTSMISSGOAL, "double"),
					GetSQLValueString($TMP_FARMHITS, "double"),
					GetSQLValueString($TMP_FARMHITSTOOK, "double"),
					GetSQLValueString($TMP_FARMGW, "double"),
					GetSQLValueString($TMP_FARMGT, "double"),
					GetSQLValueString($TMP_FARMFACEOFFWON, "double"),
					GetSQLValueString($TMP_FARMFACEOFFTOTAL, "double"),
					GetSQLValueString($TMP_FARMPENALITYSHOTSSCORE, "double"),
					GetSQLValueString($TMP_FARMPENALITYSHOTSTOTAL, "double"),
					GetSQLValueString($TMP_FARMEMPTYNETGOAL, "double"),
					GetSQLValueString($TMP_FARMMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMHATTRICK, "double"),
					GetSQLValueString($TMP_FARMPPG, "double"),
					GetSQLValueString($TMP_FARMPPA, "double"),
					GetSQLValueString($TMP_FARMPPSHOTS, "double"),
					GetSQLValueString($TMP_FARMPPMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMPKG, "double"),
					GetSQLValueString($TMP_FARMPKA, "double"),
					GetSQLValueString($TMP_FARMPKSHOTS, "double"),
					GetSQLValueString($TMP_FARMPKMINUTEPLAY, "double"),
					GetSQLValueString($TMP_FARMGIVEAWAY, "double"),
					GetSQLValueString($TMP_FARMTAKEAWAY, "double"),
					GetSQLValueString($TMP_FARMPUCKPOSSESIONTIME, "double"),
					GetSQLValueString($TMP_FARMFIGHTW, "double"),
					GetSQLValueString($TMP_FARMFIGHTL, "double"),
					GetSQLValueString($TMP_FARMFIGHTT, "double"),
					GetSQLValueString($TMP_FARMSTAR1, "double"),
					GetSQLValueString($TMP_FARMSTAR2, "double"),
					GetSQLValueString($TMP_FARMSTAR3, "double"),		
					GetSQLValueString($TMP_GAMEINROWWITHAGOAL, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHAPOINT, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHOUTAGOAL, "double"),
					GetSQLValueString($TMP_GAMEINROWWITHOUTAPOINT, "double"),
					GetSQLValueString($TMP_FarmStarPower7Days, "double"),
					GetSQLValueString($TMP_FarmStarPower30Days, "double"),
					GetSQLValueString($TMP_FarmStarPowerYear, "double"),
					GetSQLValueString($TMP_EXCLUDEFROMPAYROLL, "text"),
					GetSQLValueString($TMP_TEAM,"int"),
					GetSQLValueString("True","text")
				);
				
				mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			} elseif ($SQLSeasonAction=="UPDATE" && $TMP_TEAM > 0){
				$query_CheckSeason = sprintf("SELECT Season_ID FROM playerstats WHERE Number=%s AND Season_ID=%s", $TMP_NUMBER, $ActiveSeason);
				$CheckSeason = mysql_query($query_CheckSeason, $tmp_simhl) or die(mysql_error());
				$row_CheckSeason = mysql_fetch_assoc($CheckSeason);
				$totalRows_CheckSeason = mysql_num_rows($CheckSeason);				
				
				if ($totalRows_CheckSeason >> 1) {
//echo "sql action = 5<br>";
					
					$query_CheckStats = sprintf("SELECT SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProPoint) as ProPoint, SUM(ProGP) as ProGP,SUM(ProShots) as ProShots,SUM(ProG) as ProG,SUM(ProA) as ProA,SUM(Propoint) as Propoint,SUM(ProPlusMinus) as ProPlusMinus,SUM(ProPim) as ProPim, SUM(Pro5Pim) as Pro5Pim, SUM(ProShotsBlock) as ProShotsBlock, SUM(ProOwnShotsBlock) as ProOwnShotsBlock, SUM(ProOwnShotsMissGoals) as ProOwnShotsMissGoals, SUM(ProHits) as ProHits, SUM(ProHitsTook) as ProHitsTook, SUM(ProGW) as ProGW, SUM(ProGT) as ProGT, SUM(ProFaceOffWon) as ProFaceOffWon, SUM(ProFaceOffTotal) as ProFaceOffTotal, SUM(ProPenalityShotsScore) as ProPenalityShotsScore, SUM(ProPenalityShotsTotal) as ProPenalityShotsTotal, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProMinutePlay) as ProMinutePlay, SUM(ProHatTrick) as ProHatTrick, SUM(ProPPG) as ProPPG, SUM(ProPPA) as ProPPA, SUM(ProPPShots) as ProPPShots, SUM(ProPPMinutePlay) as ProPPMinutePlay, SUM(ProPKG) as ProPKG, SUM(ProPKA) as ProPKA, SUM(ProPKShots) as ProPKShots, SUM(ProPKMinutePlay) as ProPKMinutePlay, SUM(ProGiveAway) as ProGiveAway, SUM(ProTakeAway) as ProTakeAway, SUM(ProPuckPossesionTime) as ProPuckPossesionTime, SUM(ProFightW) as ProFightW, SUM(ProFightL) as ProFightL, SUM(ProFightT) as ProFightT, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGP) as FarmGP, SUM(FarmShots) as FarmShots, SUM(FarmG) as FarmG, SUM(FarmA) as FarmA, SUM(FarmPoint) as FarmPoint, SUM(FarmPlusMinus) as FarmPlusMinus, SUM(FarmPim) as FarmPim, SUM(Farm5Pim) as Farm5Pim, SUM(FarmShotsBlock) as FarmShotsBlock, SUM(FarmOwnShotsBlock) as FarmOwnShotsBlock, SUM(FarmOwnShotsMissGoals) as FarmOwnShotsMissGoals, SUM(FarmHits) as FarmHits, SUM(FarmHitsTook) as FarmHitsTook, SUM(FarmGW) as FarmGT, SUM(FarmGT) as FarmGT, SUM(FarmFaceOffWon) as FarmFaceOffWon, SUM(FarmFaceOffTotal) as FarmFaceOffTotal, SUM(FarmPenalityShotsScore) as FarmPenalityShotsScore, SUM(FarmPenalityShotsTotal) as FarmPenalityShotsTotal, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmMinutePlay) as FarmMinutePlay, SUM(FarmHatTrick) as FarmHatTrick, SUM(FarmPPG) as FarmPPG, SUM(FarmPPA) as FarmPPA, SUM(FarmPPShots) as FarmPPShots, SUM(FarmPPMinutePlay) as FarmPPMinutePla, SUM(FarmPKG) as FarmPKG, SUM(FarmPKA) as FarmPKA, SUM(FarmPKShots) as FarmPKShots, SUM(FarmPKMinutePlay) as FarmPKMinutePlay, SUM(FarmGiveAway) as FarmGiveAway, SUM(FarmTakeAway) as FarmTakeAway, SUM(FarmPuckPossesionTime) as FarmPuckPossesionTime, SUM(FarmFightW) as FarmFightW, SUM(FarmFightL) as FarmFightL, SUM(FarmFightT) as FarmFightT, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3, SUM(GameInRowWithAGoal) as GameInRowWithAGoal, SUM(GameInRowWithAPoint) as GameInRowWithAPoint, SUM(GameInRowWithOutAGoal) as GameInRowWithOutAGoal, SUM(GameInRowWithOutAPoint) as GameInRowWithOutAPoint, SUM(ExcludeFromPayroll) as ExcludeFromPayroll FROM playerstats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
					$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
					$row_CheckStats = mysql_fetch_assoc($CheckStats);	
					$totalRows_CheckStats = mysql_num_rows($CheckStats);		
					
					$query_CheckTeam = sprintf("SELECT Team FROM playerstats WHERE Name='%s' AND Season_ID=%s AND Active='True'", $TMP_NAME, $ActiveSeason);
					$CheckTeam = mysql_query($query_CheckTeam, $tmp_simhl) or die(mysql_error());
					$row_CheckTeam = mysql_fetch_assoc($CheckTeam);
					$totalRows_CheckTeam = mysql_num_rows($CheckTeam);	
					
					if ($row_CheckTeam['Team'] == $TMP_TEAM) {
						$updateSQL = sprintf("UPDATE playerstats set ProGP=%s, ProShots=%s, ProG=%s, ProA=%s, ProPoint=%s, ProPlusMinus=%s, ProPim=%s, Pro5Pim=%s, ProShotsBlock=%s, ProOwnShotsBlock=%s, ProOwnShotsMissGoals=%s, ProHits=%s, ProHitsTook=%s, ProGW=%s, ProGT=%s, ProFaceOffWon=%s, ProFaceOffTotal=%s, ProPenalityShotsScore=%s, ProPenalityShotsTotal=%s, ProEmptyNetGoal=%s, ProMinutePlay=%s, ProHatTrick=%s, ProPPG=%s, ProPPA=%s, ProPPShots=%s, ProPPMinutePlay=%s, ProPKG=%s, ProPKA=%s, ProPKShots=%s, ProPKMinutePlay=%s, ProGiveAway=%s, ProTakeAway=%s, ProPuckPossesionTime=%s, ProFightW=%s, ProFightL=%s, ProFightT=%s, ProStar1=%s, ProStar2=%s, ProStar3=%s, 
ProStarPower7Days=%s, ProStarPower30Days=%s, ProStarPowerYear=%s,FarmGP=%s, FarmShots=%s, FarmG=%s, FarmA=%s, FarmPoint=%s, FarmPlusMinus=%s, FarmPim=%s, Farm5Pim=%s, FarmShotsBlock=%s, FarmOwnShotsBlock=%s, FarmOwnShotsMissGoals=%s, FarmHits=%s, FarmHitsTook=%s, FarmGW=%s, FarmGT=%s, FarmFaceOffWon=%s, FarmFaceOffTotal=%s, FarmPenalityShotsScore=%s, FarmPenalityShotsTotal=%s, FarmEmptyNetGoal=%s, FarmMinutePlay=%s, FarmHatTrick=%s, FarmPPG=%s, FarmPPA=%s, FarmPPShots=%s, FarmPPMinutePlay=%s, FarmPKG=%s, FarmPKA=%s, FarmPKShots=%s, FarmPKMinutePlay=%s, FarmGiveAway=%s, FarmTakeAway=%s, FarmPuckPossesionTime=%s, FarmFightW=%s, FarmFightL=%s, FarmFightT=%s, FarmStar1=%s, FarmStar2=%s, FarmStar3=%s, GameInRowWithAGoal=%s, GameInRowWithAPoint=%s, GameInRowWithOutAGoal=%s, GameInRowWithOutAPoint=%s, FarmStarPower7Days=%s, FarmStarPower30Days=%s, FarmStarPowerYear=%s, ExcludeFromPayroll=%s, Team=%s WHERE Season_ID=$ActiveSeason AND Active='True' AND Number=%s",
							GetSQLValueString(number_format($TMP_PROGP - $row_CheckStats["ProGP"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTS - $row_CheckStats["ProShots"]), "double"),
							GetSQLValueString(number_format($TMP_PROG - $row_CheckStats["ProG"]), "double"),
							GetSQLValueString(number_format($TMP_PROA - $row_CheckStats["ProA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPOINT - $row_CheckStats["ProPoint"]), "double"),
							GetSQLValueString(number_format($TMP_PROPLUSMINUS - $row_CheckStats["ProPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_PROPIM - $row_CheckStats["ProPim"]), "double"),
							GetSQLValueString(number_format($TMP_PRO5PIM - $row_CheckStats["Pro5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTSBLOCK - $row_CheckStats["ProShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSBLOCK - $row_CheckStats["ProOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSMISSGOAL - $row_CheckStats["ProOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITS - $row_CheckStats["ProHits"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITSTOOK - $row_CheckStats["ProHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_PROGW - $row_CheckStats["ProGW"]), "double"),
							GetSQLValueString(number_format($TMP_PROGT - $row_CheckStats["ProGT"]), "double"),
							GetSQLValueString($TMP_PROFACEOFFWON - $row_CheckStats["ProFaceOffWon"], "double"),
							GetSQLValueString($TMP_PROFACEOFFTOTAL - $row_CheckStats["ProFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSSCORE - $row_CheckStats["ProPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSTOTAL - $row_CheckStats["ProPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_PROEMPTYNETGOAL - $row_CheckStats["ProEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_PROMINUTEPLAY - $row_CheckStats["ProMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROHATTRICK - $row_CheckStats["ProHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPG - $row_CheckStats["ProPPG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPA - $row_CheckStats["ProPPA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPSHOTS - $row_CheckStats["ProPPShots"]), "double"),
							GetSQLValueString($TMP_PROPPMINUTEPLAY - $row_CheckStats["ProPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROPKG - $row_CheckStats["ProPKG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKA - $row_CheckStats["ProPKA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKSHOTS - $row_CheckStats["ProPKShots"]), "double"),
							GetSQLValueString($TMP_PROPKMINUTEPLAY - $row_CheckStats["ProPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROGIVEAWAY - $row_CheckStats["ProGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROTAKEAWAY - $row_CheckStats["ProTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROPUCKPOSSESIONTIME - $row_CheckStats["ProPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTW - $row_CheckStats["ProFightW"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTL - $row_CheckStats["ProFightL"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTT - $row_CheckStats["ProFightT"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR1 - $row_CheckStats["ProStar1"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR2 - $row_CheckStats["ProStar2"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR3 - $row_CheckStats["ProStar3"]), "double"),						
							GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPowerYear - $row_CheckStats["ProStarPowerYear"]), "double"),				
							GetSQLValueString(number_format($TMP_FARMGP - $row_CheckStats["FarmGP"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTS - $row_CheckStats["FarmShots"]), "double"),
							GetSQLValueString(number_format($TMP_FARMG - $row_CheckStats["FarmG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMA - $row_CheckStats["FarmA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPOINT - $row_CheckStats["FarmPoint"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPLUSMINUS - $row_CheckStats["FarmPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPIM - $row_CheckStats["FarmPim"]), "double"),
							GetSQLValueString(number_format($TMP_FARM5PIM - $row_CheckStats["Farm5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTSBLOCK - $row_CheckStats["FarmShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSBLOCK - $row_CheckStats["FarmOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSMISSGOAL - $row_CheckStats["FarmOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITS - $row_CheckStats["FarmHits"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITSTOOK - $row_CheckStats["FarmHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGW - $row_CheckStats["FarmGW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGT - $row_CheckStats["FarmGT"]), "double"),
							GetSQLValueString($TMP_FARMFACEOFFWON - $row_CheckStats["FarmFaceOffWon"], "double"),
							GetSQLValueString($TMP_FARMFACEOFFTOTAL - $row_CheckStats["FarmFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSSCORE - $row_CheckStats["FarmPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSTOTAL - $row_CheckStats["FarmPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_FARMEMPTYNETGOAL - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_FARMMINUTEPLAY - $row_CheckStats["FarmMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMHATTRICK - $row_CheckStats["FarmHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPG - $row_CheckStats["FarmPPG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPA - $row_CheckStats["FarmPPA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPSHOTS - $row_CheckStats["FarmPPShots"]), "double"),
							GetSQLValueString($TMP_FARMPPMINUTEPLAY - $row_CheckStats["FarmPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMPKG - $row_CheckStats["FarmPKG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKA - $row_CheckStats["FarmPKA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKSHOTS - $row_CheckStats["FarmPKShots"]), "double"),
							GetSQLValueString($TMP_FARMPKMINUTEPLAY - $row_CheckStats["FarmPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMGIVEAWAY - $row_CheckStats["FarmGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMTAKEAWAY - $row_CheckStats["FarmTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPUCKPOSSESIONTIME - $row_CheckStats["FarmPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTW - $row_CheckStats["FarmFightW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTL - $row_CheckStats["FarmFightL"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTT - $row_CheckStats["FarmFightT"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR1 - $row_CheckStats["FarmStar1"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR2 - $row_CheckStats["FarmStar2"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR3 - $row_CheckStats["FarmStar3"]), "double"),		
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAGOAL - $row_CheckStats["GameInRowWithAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAPOINT - $row_CheckStats["GameInRowWithAPoint"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAGOAL - $row_CheckStats["GameInRowWithOutAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAPOINT - $row_CheckStats["GameInRowWithOutAPoint"]), "double"),					
							GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPowerYear - $row_CheckStats["FarmStarPowerYear"]), "double"),
							GetSQLValueString(number_format($TMP_EXCLUDEFROMPAYROLL - $row_CheckStats["ExcludeFromPayroll"]), "text"),
							GetSQLValueString($TMP_TEAM,"int"),
							GetSQLValueString($TMP_NUMBER, "double")
						);
						
						mysql_select_db($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
						
						
					} else {
//echo "sql action = 6<br>";
						
						$updateSQL = sprintf("UPDATE playerstats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
						mysql_select_db($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
					
						$insertSQL = sprintf("INSERT INTO playerstats (Name, Number, Season_ID, ProGP, ProShots, ProG, ProA, ProPoint, ProPlusMinus, ProPim, Pro5Pim, ProShotsBlock,  ProOwnShotsBlock, ProOwnShotsMissGoals, ProHits, ProHitsTook, ProGW, ProGT, ProFaceOffWon, ProFaceOffTotal, ProPenalityShotsScore, ProPenalityShotsTotal, ProEmptyNetGoal, ProMinutePlay, ProHatTrick, ProPPG, ProPPA, ProPPShots, ProPPMinutePlay, ProPKG, ProPKA, ProPKShots, ProPKMinutePlay, ProGiveAway, ProTakeAway, ProPuckPossesionTime, ProFightW, ProFightL, ProFightT, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGP, FarmShots, FarmG, FarmA, FarmPoint, FarmPlusMinus, FarmPim, Farm5Pim, FarmShotsBlock, FarmOwnShotsBlock, FarmOwnShotsMissGoals, FarmHits, FarmHitsTook, FarmGW, FarmGT, FarmFaceOffWon, FarmFaceOffTotal, FarmPenalityShotsScore, FarmPenalityShotsTotal, FarmEmptyNetGoal, FarmMinutePlay, FarmHatTrick, FarmPPG, FarmPPA, FarmPPShots, FarmPPMinutePlay, FarmPKG, FarmPKA, FarmPKShots, FarmPKMinutePlay, FarmGiveAway, FarmTakeAway, FarmPuckPossesionTime, FarmFightW, FarmFightL, FarmFightT, FarmStar1, FarmStar2, FarmStar3, GameInRowWithAGoal, GameInRowWithAPoint, GameInRowWithOutAGoal, GameInRowWithOutAPoint, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, ExcludeFromPayroll, Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s)",
							GetSQLValueString($TMP_NAME, "text"),
							GetSQLValueString($TMP_NUMBER, "double"),
							GetSQLValueString($ActiveSeason, "int"),
							GetSQLValueString(number_format($TMP_PROGP - $row_CheckStats["ProGP"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTS - $row_CheckStats["ProShots"]), "double"),
							GetSQLValueString(number_format($TMP_PROG - $row_CheckStats["ProG"]), "double"),
							GetSQLValueString(number_format($TMP_PROA - $row_CheckStats["ProA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPOINT - $row_CheckStats["ProPoint"]), "double"),
							GetSQLValueString(number_format($TMP_PROPLUSMINUS - $row_CheckStats["ProPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_PROPIM - $row_CheckStats["ProPim"]), "double"),
							GetSQLValueString(number_format($TMP_PRO5PIM - $row_CheckStats["Pro5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTSBLOCK - $row_CheckStats["ProShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSBLOCK - $row_CheckStats["ProOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSMISSGOAL - $row_CheckStats["ProOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITS - $row_CheckStats["ProHits"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITSTOOK - $row_CheckStats["ProHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_PROGW - $row_CheckStats["ProGW"]), "double"),
							GetSQLValueString(number_format($TMP_PROGT - $row_CheckStats["ProGT"]), "double"),
							GetSQLValueString($TMP_PROFACEOFFWON - $row_CheckStats["ProFaceOffWon"], "double"),
							GetSQLValueString($TMP_PROFACEOFFTOTAL - $row_CheckStats["ProFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSSCORE - $row_CheckStats["ProPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSTOTAL - $row_CheckStats["ProPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_PROEMPTYNETGOAL - $row_CheckStats["ProEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_PROMINUTEPLAY - $row_CheckStats["ProMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROHATTRICK - $row_CheckStats["ProHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPG - $row_CheckStats["ProPPG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPA - $row_CheckStats["ProPPA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPSHOTS - $row_CheckStats["ProPPShots"]), "double"),
							GetSQLValueString($TMP_PROPPMINUTEPLAY - $row_CheckStats["ProPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROPKG - $row_CheckStats["ProPKG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKA - $row_CheckStats["ProPKA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKSHOTS - $row_CheckStats["ProPKShots"]), "double"),
							GetSQLValueString($TMP_PROPKMINUTEPLAY - $row_CheckStats["ProPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROGIVEAWAY - $row_CheckStats["ProGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROTAKEAWAY - $row_CheckStats["ProTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROPUCKPOSSESIONTIME - $row_CheckStats["ProPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTW - $row_CheckStats["ProFightW"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTL - $row_CheckStats["ProFightL"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTT - $row_CheckStats["ProFightT"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR1 - $row_CheckStats["ProStar1"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR2 - $row_CheckStats["ProStar2"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR3 - $row_CheckStats["ProStar3"]), "double"),	
							GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPowerYear - $row_CheckStats["ProStarPowerYear"]), "double"),				
							GetSQLValueString(number_format($TMP_FARMGP - $row_CheckStats["FarmGP"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTS - $row_CheckStats["FarmShots"]), "double"),
							GetSQLValueString(number_format($TMP_FARMG - $row_CheckStats["FarmG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMA - $row_CheckStats["FarmA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPOINT - $row_CheckStats["FarmPoint"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPLUSMINUS - $row_CheckStats["FarmPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPIM - $row_CheckStats["FarmPim"]), "double"),
							GetSQLValueString(number_format($TMP_FARM5PIM - $row_CheckStats["Farm5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTSBLOCK - $row_CheckStats["FarmShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSBLOCK - $row_CheckStats["FarmOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSMISSGOAL - $row_CheckStats["FarmOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITS - $row_CheckStats["FarmHits"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITSTOOK - $row_CheckStats["FarmHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGW - $row_CheckStats["FarmGW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGT - $row_CheckStats["FarmGT"]), "double"),
							GetSQLValueString($TMP_FARMFACEOFFWON - $row_CheckStats["FarmFaceOffWon"], "double"),
							GetSQLValueString($TMP_FARMFACEOFFTOTAL - $row_CheckStats["FarmFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSSCORE - $row_CheckStats["FarmPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSTOTAL - $row_CheckStats["FarmPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_FARMEMPTYNETGOAL - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_FARMMINUTEPLAY - $row_CheckStats["FarmMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMHATTRICK - $row_CheckStats["FarmHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPG - $row_CheckStats["FarmPPG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPA - $row_CheckStats["FarmPPA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPSHOTS - $row_CheckStats["FarmPPShots"]), "double"),
							GetSQLValueString($TMP_FARMPPMINUTEPLAY - $row_CheckStats["FarmPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMPKG - $row_CheckStats["FarmPKG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKA - $row_CheckStats["FarmPKA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKSHOTS - $row_CheckStats["FarmPKShots"]), "double"),
							GetSQLValueString($TMP_FARMPKMINUTEPLAY - $row_CheckStats["FarmPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMGIVEAWAY - $row_CheckStats["FarmGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMTAKEAWAY - $row_CheckStats["FarmTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPUCKPOSSESIONTIME - $row_CheckStats["FarmPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTW - $row_CheckStats["FarmFightW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTL - $row_CheckStats["FarmFightL"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTT - $row_CheckStats["FarmFightT"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR1 - $row_CheckStats["FarmStar1"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR2 - $row_CheckStats["FarmStar2"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR3 - $row_CheckStats["FarmStar3"]), "double"),		
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAGOAL - $row_CheckStats["GameInRowWithAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAPOINT - $row_CheckStats["GameInRowWithAPoint"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAGOAL - $row_CheckStats["GameInRowWithOutAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAPOINT - $row_CheckStats["GameInRowWithOutAPoint"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPowerYear - $row_CheckStats["FarmStarPowerYear"]), "double"),
							GetSQLValueString(number_format($TMP_EXCLUDEFROMPAYROLL - $row_CheckStats["ExcludeFromPayroll"]), "text"),
							GetSQLValueString($TMP_TEAM,"int"),
							GetSQLValueString("True","text")
						);
						mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
					
					}
					mysql_free_result($CheckStats);		
					
				} else {
//echo "sql action = 7<br>";
					
					$query_CheckTeam = sprintf("SELECT Team FROM playerstats WHERE Number=%s AND Season_ID=%s AND Active='True'", $TMP_NUMBER, $ActiveSeason);
					$CheckTeam = mysql_query($query_CheckTeam, $tmp_simhl) or die(mysql_error());
					$row_CheckTeam = mysql_fetch_assoc($CheckTeam);
					$totalRows_CheckTeam = mysql_num_rows($CheckTeam);	
					
					if ($row_CheckTeam['Team'] == $TMP_TEAM) {
//echo "sql action = 8<br>";
					
						$updateSQL = sprintf("UPDATE playerstats set Name=%s, ProGP=%s, ProShots=%s, ProG=%s, ProA=%s, ProPoint=%s, ProPlusMinus=%s, ProPim=%s, Pro5Pim=%s, ProShotsBlock=%s, ProOwnShotsBlock=%s, ProOwnShotsBlock=%s, ProHits=%s, ProHitsTook=%s, ProGW=%s, ProGT=%s, ProFaceOffWon=%s, ProFaceOffTotal=%s, ProPenalityShotsScore=%s, ProPenalityShotsTotal=%s, ProEmptyNetGoal=%s, ProMinutePlay=%s, ProHatTrick=%s, ProPPG=%s, ProPPA=%s, ProPPShots=%s, ProPPMinutePlay=%s, ProPKG=%s, ProPKA=%s, ProPKShots=%s, ProPKMinutePlay=%s, ProGiveAway=%s, ProTakeAway=%s, ProPuckPossesionTime=%s, ProFightW=%s, ProFightL=%s, ProFightT=%s, ProStar1=%s, ProStar2=%s, ProStar3=%s, ProStarPower7Days=%s, ProStarPower30Days=%s, ProStarPowerYear=%s, FarmGP=%s, FarmShots=%s, FarmG=%s, FarmA=%s, FarmPoint=%s, FarmPlusMinus=%s, FarmPim=%s, Farm5Pim=%s, FarmShotsBlock=%s, FarmOwnShotsBlock=%s, FarmOwnShotsMissGoals=%s, FarmHits=%s, FarmHitsTook=%s, FarmGW=%s, FarmGT=%s, FarmFaceOffWon=%s, FarmFaceOffTotal=%s, FarmPenalityShotsScore=%s, FarmPenalityShotsTotal=%s, FarmEmptyNetGoal=%s, FarmMinutePlay=%s, FarmHatTrick=%s, FarmPPG=%s, FarmPPA=%s, FarmPPShots=%s, FarmPPMinutePlay=%s, FarmPKG=%s, FarmPKA=%s, FarmPKShots=%s, FarmPKMinutePlay=%s, FarmGiveAway=%s, FarmTakeAway=%s, FarmPuckPossesionTime=%s, FarmFightW=%s, FarmFightL=%s, FarmFightT=%s, FarmStar1=%s, FarmStar2=%s, FarmStar3=%s, GameInRowWithAGoal=%s, GameInRowWithAPoint=%s, GameInRowWithOutAGoal=%s, GameInRowWithOutAPoint=%s, FarmStarPower7Days=%s, FarmStarPower30Days=%s, FarmStarPowerYear=%s, ExcludeFromPayroll=%s, Team=%s WHERE Season_ID=$ActiveSeason AND Active='True' AND Number=%s",
							GetSQLValueString($TMP_NAME, "text"),
							GetSQLValueString($TMP_PROGP, "double"),
							GetSQLValueString($TMP_PROSHOTS, "double"),
							GetSQLValueString($TMP_PROG, "double"),
							GetSQLValueString($TMP_PROA, "double"),
							GetSQLValueString($TMP_PROPOINT, "double"),
							GetSQLValueString($TMP_PROPLUSMINUS, "double"),
							GetSQLValueString($TMP_PROPIM, "double"),
							GetSQLValueString($TMP_PRO5PIM, "double"),
							GetSQLValueString($TMP_PROSHOTSBLOCK, "double"),
							GetSQLValueString($TMP_PROOWNSHOTSBLOCK, "double"),
							GetSQLValueString($TMP_PROOWNSHOTSMISSGOAL, "double"),
							GetSQLValueString($TMP_PROHITS, "double"),
							GetSQLValueString($TMP_PROHITSTOOK, "double"),
							GetSQLValueString($TMP_PROGW, "double"),
							GetSQLValueString($TMP_PROGT, "double"),
							GetSQLValueString($TMP_PROFACEOFFWON, "double"),
							GetSQLValueString($TMP_PROFACEOFFTOTAL, "double"),
							GetSQLValueString($TMP_PROPENALITYSHOTSSCORE, "double"),
							GetSQLValueString($TMP_PROPENALITYSHOTSTOTAL, "double"),
							GetSQLValueString($TMP_PROEMPTYNETGOAL, "double"),
							GetSQLValueString($TMP_PROMINUTEPLAY, "double"),
							GetSQLValueString($TMP_PROHATTRICK, "double"),
							GetSQLValueString($TMP_PROPPG, "double"),
							GetSQLValueString($TMP_PROPPA, "double"),
							GetSQLValueString($TMP_PROPPSHOTS, "double"),
							GetSQLValueString($TMP_PROPPMINUTEPLAY, "double"),
							GetSQLValueString($TMP_PROPKG, "double"),
							GetSQLValueString($TMP_PROPKA, "double"),
							GetSQLValueString($TMP_PROPKSHOTS, "double"),
							GetSQLValueString($TMP_PROPKMINUTEPLAY, "double"),
							GetSQLValueString($TMP_PROGIVEAWAY, "double"),
							GetSQLValueString($TMP_PROTAKEAWAY, "double"),
							GetSQLValueString($TMP_PROPUCKPOSSESIONTIME, "double"),
							GetSQLValueString($TMP_PROFIGHTW, "double"),
							GetSQLValueString($TMP_PROFIGHTL, "double"),
							GetSQLValueString($TMP_PROFIGHTT, "double"),
							GetSQLValueString($TMP_PROSTAR1, "double"),
							GetSQLValueString($TMP_PROSTAR2, "double"),
							GetSQLValueString($TMP_PROSTAR3, "double"),	
							GetSQLValueString($TMP_ProStarPower7Days, "double"),
							GetSQLValueString($TMP_ProStarPower30Days, "double"),
							GetSQLValueString($TMP_ProStarPowerYear, "double"),				
							GetSQLValueString($TMP_FARMGP, "double"),
							GetSQLValueString($TMP_FARMSHOTS, "double"),
							GetSQLValueString($TMP_FARMG, "double"),
							GetSQLValueString($TMP_FARMA, "double"),
							GetSQLValueString($TMP_FARMPOINT, "double"),
							GetSQLValueString($TMP_FARMPLUSMINUS, "double"),
							GetSQLValueString($TMP_FARMPIM, "double"),
							GetSQLValueString($TMP_FARM5PIM, "double"),
							GetSQLValueString($TMP_FARMSHOTSBLOCK, "double"),
							GetSQLValueString($TMP_FARMOWNSHOTSBLOCK, "double"),
							GetSQLValueString($TMP_FARMOWNSHOTSMISSGOAL, "double"),
							GetSQLValueString($TMP_FARMHITS, "double"),
							GetSQLValueString($TMP_FARMHITSTOOK, "double"),
							GetSQLValueString($TMP_FARMGW, "double"),
							GetSQLValueString($TMP_FARMGT, "double"),
							GetSQLValueString($TMP_FARMFACEOFFWON, "double"),
							GetSQLValueString($TMP_FARMFACEOFFTOTAL, "double"),
							GetSQLValueString($TMP_FARMPENALITYSHOTSSCORE, "double"),
							GetSQLValueString($TMP_FARMPENALITYSHOTSTOTAL, "double"),
							GetSQLValueString($TMP_FARMEMPTYNETGOAL, "double"),
							GetSQLValueString($TMP_FARMMINUTEPLAY, "double"),
							GetSQLValueString($TMP_FARMHATTRICK, "double"),
							GetSQLValueString($TMP_FARMPPG, "double"),
							GetSQLValueString($TMP_FARMPPA, "double"),
							GetSQLValueString($TMP_FARMPPSHOTS, "double"),
							GetSQLValueString($TMP_FARMPPMINUTEPLAY, "double"),
							GetSQLValueString($TMP_FARMPKG, "double"),
							GetSQLValueString($TMP_FARMPKA, "double"),
							GetSQLValueString($TMP_FARMPKSHOTS, "double"),
							GetSQLValueString($TMP_FARMPKMINUTEPLAY, "double"),
							GetSQLValueString($TMP_FARMGIVEAWAY, "double"),
							GetSQLValueString($TMP_FARMTAKEAWAY, "double"),
							GetSQLValueString($TMP_FARMPUCKPOSSESIONTIME, "double"),
							GetSQLValueString($TMP_FARMFIGHTW, "double"),
							GetSQLValueString($TMP_FARMFIGHTL, "double"),
							GetSQLValueString($TMP_FARMFIGHTT, "double"),
							GetSQLValueString($TMP_FARMSTAR1, "double"),
							GetSQLValueString($TMP_FARMSTAR2, "double"),
							GetSQLValueString($TMP_FARMSTAR3, "double"),		
							GetSQLValueString($TMP_GAMEINROWWITHAGOAL, "double"),
							GetSQLValueString($TMP_GAMEINROWWITHAPOINT, "double"),
							GetSQLValueString($TMP_GAMEINROWWITHOUTAGOAL, "double"),
							GetSQLValueString($TMP_GAMEINROWWITHOUTAPOINT, "double"),
							GetSQLValueString($TMP_FarmStarPower7Days, "double"),
							GetSQLValueString($TMP_FarmStarPower30Days, "double"),
							GetSQLValueString($TMP_FarmStarPowerYear, "double"),
							GetSQLValueString($TMP_EXCLUDEFROMPAYROLL, "text"),
							GetSQLValueString($TMP_TEAM,"int"),
							GetSQLValueString($TMP_NUMBER, "double")
						);
						
						mysql_select_db($tmp_database_simhl, $tmp_simhl);
						$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
						
					} else {
//echo "sql action = 10<br>";

						if ($TMP_TEAM > 0){
//echo "sql action = 9<br>";
	
							$updateSQL = sprintf("UPDATE playerstats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
							mysql_select_db($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
						
							$query_CheckStats = sprintf("SELECT SUM(ProStarPower7Days) as ProStarPower7Days, SUM(ProStarPower30Days) as ProStarPower30Days, SUM(ProStarPowerYear) as ProStarPowerYear, SUM(FarmStarPower7Days) as FarmStarPower7Days, SUM(FarmStarPower30Days) as FarmStarPower30Days, SUM(FarmStarPowerYear) as FarmStarPowerYear, SUM(ProPoint) as ProPoint, SUM(ProGP) as ProGP,SUM(ProShots) as ProShots,SUM(ProG) as ProG,SUM(ProA) as ProA,SUM(Propoint) as Propoint,SUM(ProPlusMinus) as ProPlusMinus,SUM(ProPim) as ProPim, SUM(Pro5Pim) as Pro5Pim, SUM(ProShotsBlock) as ProShotsBlock, SUM(ProOwnShotsBlock) as ProOwnShotsBlock, SUM(ProOwnShotsMissGoals) as ProOwnShotsMissGoals, SUM(ProHits) as ProHits, SUM(ProHitsTook) as ProHitsTook, SUM(ProGW) as ProGW, SUM(ProGT) as ProGT, SUM(ProFaceOffWon) as ProFaceOffWon, SUM(ProFaceOffTotal) as ProFaceOffTotal, SUM(ProPenalityShotsScore) as ProPenalityShotsScore, SUM(ProPenalityShotsTotal) as ProPenalityShotsTotal, SUM(ProEmptyNetGoal) as ProEmptyNetGoal, SUM(ProMinutePlay) as ProMinutePlay, SUM(ProHatTrick) as ProHatTrick, SUM(ProPPG) as ProPPG, SUM(ProPPA) as ProPPA, SUM(ProPPShots) as ProPPShots, SUM(ProPPMinutePlay) as ProPPMinutePlay, SUM(ProPKG) as ProPKG, SUM(ProPKA) as ProPKA, SUM(ProPKShots) as ProPKShots, SUM(ProPKMinutePlay) as ProPKMinutePlay, SUM(ProGiveAway) as ProGiveAway, SUM(ProTakeAway) as ProTakeAway, SUM(ProPuckPossesionTime) as ProPuckPossesionTime, SUM(ProFightW) as ProFightW, SUM(ProFightL) as ProFightL, SUM(ProFightT) as ProFightT, SUM(ProStar1) as ProStar1, SUM(ProStar2) as ProStar2, SUM(ProStar3) as ProStar3, SUM(FarmGP) as FarmGP, SUM(FarmShots) as FarmShots, SUM(FarmG) as FarmG, SUM(FarmA) as FarmA, SUM(FarmPoint) as FarmPoint, SUM(FarmPlusMinus) as FarmPlusMinus, SUM(FarmPim) as FarmPim, SUM(Farm5Pim) as Farm5Pim, SUM(FarmShotsBlock) as FarmShotsBlock, SUM(FarmOwnShotsBlock) as FarmOwnShotsBlock, SUM(FarmOwnShotsMissGoals) as FarmOwnShotsMissGoals, SUM(FarmHits) as FarmHits, SUM(FarmHitsTook) as FarmHitsTook, SUM(FarmGW) as FarmGT, SUM(FarmGT) as FarmGT, SUM(FarmFaceOffWon) as FarmFaceOffWon, SUM(FarmFaceOffTotal) as FarmFaceOffTotal, SUM(FarmPenalityShotsScore) as FarmPenalityShotsScore, SUM(FarmPenalityShotsTotal) as FarmPenalityShotsTotal, SUM(FarmEmptyNetGoal) as FarmEmptyNetGoal, SUM(FarmMinutePlay) as FarmMinutePlay, SUM(FarmHatTrick) as FarmHatTrick, SUM(FarmPPG) as FarmPPG, SUM(FarmPPA) as FarmPPA, SUM(FarmPPShots) as FarmPPShots, SUM(FarmPPMinutePlay) as FarmPPMinutePla, SUM(FarmPKG) as FarmPKG, SUM(FarmPKA) as FarmPKA, SUM(FarmPKShots) as FarmPKShots, SUM(FarmPKMinutePlay) as FarmPKMinutePlay, SUM(FarmGiveAway) as FarmGiveAway, SUM(FarmTakeAway) as FarmTakeAway, SUM(FarmPuckPossesionTime) as FarmPuckPossesionTime, SUM(FarmFightW) as FarmFightW, SUM(FarmFightL) as FarmFightL, SUM(FarmFightT) as FarmFightT, SUM(FarmStar1) as FarmStar1, SUM(FarmStar2) as FarmStar2, SUM(FarmStar3) as FarmStar3, SUM(GameInRowWithAGoal) as GameInRowWithAGoal, SUM(GameInRowWithAPoint) as GameInRowWithAPoint, SUM(GameInRowWithOutAGoal) as GameInRowWithOutAGoal, SUM(GameInRowWithOutAPoint) as GameInRowWithOutAPoint, SUM(ExcludeFromPayroll) as ExcludeFromPayroll FROM playerstats WHERE Number=%s AND Season_ID=%s AND Team <> '%s'", $TMP_NUMBER, $ActiveSeason, $TMP_TEAM);
							$CheckStats = mysql_query($query_CheckStats, $tmp_simhl) or die(mysql_error());
							$row_CheckStats = mysql_fetch_assoc($CheckStats);		
							$totalRows_CheckStats = mysql_num_rows($CheckStats);		
						
							$updateSQL = sprintf("UPDATE playerstats set Active='False' WHERE Number=$TMP_NUMBER AND Season_ID=$ActiveSeason");
							mysql_select_db($tmp_database_simhl, $tmp_simhl);
							$Result2 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
							
							$insertSQL = sprintf("INSERT INTO playerstats (Name, Number, Season_ID, ProGP, ProShots, ProG, ProA, ProPoint, ProPlusMinus, ProPim, Pro5Pim, ProShotsBlock,  ProOwnShotsBlock, ProOwnShotsMissGoals, ProHits, ProHitsTook, ProGW, ProGT, ProFaceOffWon, ProFaceOffTotal, ProPenalityShotsScore, ProPenalityShotsTotal, ProEmptyNetGoal, ProMinutePlay, ProHatTrick, ProPPG, ProPPA, ProPPShots, ProPPMinutePlay, ProPKG, ProPKA, ProPKShots, ProPKMinutePlay, ProGiveAway, ProTakeAway, ProPuckPossesionTime, ProFightW, ProFightL, ProFightT, ProStar1, ProStar2, ProStar3, ProStarPower7Days, ProStarPower30Days, ProStarPowerYear, FarmGP, FarmShots, FarmG, FarmA, FarmPoint, FarmPlusMinus, FarmPim, Farm5Pim, FarmShotsBlock, FarmOwnShotsBlock, FarmOwnShotsMissGoals, FarmHits, FarmHitsTook, FarmGW, FarmGT, FarmFaceOffWon, FarmFaceOffTotal, FarmPenalityShotsScore, FarmPenalityShotsTotal, FarmEmptyNetGoal, FarmMinutePlay, FarmHatTrick, FarmPPG, FarmPPA, FarmPPShots, FarmPPMinutePlay, FarmPKG, FarmPKA, FarmPKShots, FarmPKMinutePlay, FarmGiveAway, FarmTakeAway, FarmPuckPossesionTime, FarmFightW, FarmFightL, FarmFightT, FarmStar1, FarmStar2, FarmStar3, GameInRowWithAGoal, GameInRowWithAPoint, GameInRowWithOutAGoal, GameInRowWithOutAPoint, FarmStarPower7Days, FarmStarPower30Days, FarmStarPowerYear, ExcludeFromPayroll, Team, Active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							GetSQLValueString($TMP_NAME, "text"),
							GetSQLValueString($TMP_NUMBER, "double"),
							GetSQLValueString($ActiveSeason, "int"),
							GetSQLValueString(number_format($TMP_PROGP - $row_CheckStats["ProGP"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTS - $row_CheckStats["ProShots"]), "double"),
							GetSQLValueString(number_format($TMP_PROG - $row_CheckStats["ProG"]), "double"),
							GetSQLValueString(number_format($TMP_PROA - $row_CheckStats["ProA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPOINT - $row_CheckStats["ProPoint"]), "double"),
							GetSQLValueString(number_format($TMP_PROPLUSMINUS - $row_CheckStats["ProPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_PROPIM - $row_CheckStats["ProPim"]), "double"),
							GetSQLValueString(number_format($TMP_PRO5PIM - $row_CheckStats["Pro5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_PROSHOTSBLOCK - $row_CheckStats["ProShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSBLOCK - $row_CheckStats["ProOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_PROOWNSHOTSMISSGOAL - $row_CheckStats["ProOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITS - $row_CheckStats["ProHits"]), "double"),
							GetSQLValueString(number_format($TMP_PROHITSTOOK - $row_CheckStats["ProHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_PROGW - $row_CheckStats["ProGW"]), "double"),
							GetSQLValueString(number_format($TMP_PROGT - $row_CheckStats["ProGT"]), "double"),
							GetSQLValueString($TMP_PROFACEOFFWON - $row_CheckStats["ProFaceOffWon"], "double"),
							GetSQLValueString($TMP_PROFACEOFFTOTAL - $row_CheckStats["ProFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSSCORE - $row_CheckStats["ProPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_PROPENALITYSHOTSTOTAL - $row_CheckStats["ProPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_PROEMPTYNETGOAL - $row_CheckStats["ProEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_PROMINUTEPLAY - $row_CheckStats["ProMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROHATTRICK - $row_CheckStats["ProHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPG - $row_CheckStats["ProPPG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPA - $row_CheckStats["ProPPA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPPSHOTS - $row_CheckStats["ProPPShots"]), "double"),
							GetSQLValueString($TMP_PROPPMINUTEPLAY - $row_CheckStats["ProPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROPKG - $row_CheckStats["ProPKG"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKA - $row_CheckStats["ProPKA"]), "double"),
							GetSQLValueString(number_format($TMP_PROPKSHOTS - $row_CheckStats["ProPKShots"]), "double"),
							GetSQLValueString($TMP_PROPKMINUTEPLAY - $row_CheckStats["ProPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_PROGIVEAWAY - $row_CheckStats["ProGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROTAKEAWAY - $row_CheckStats["ProTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_PROPUCKPOSSESIONTIME - $row_CheckStats["ProPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTW - $row_CheckStats["ProFightW"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTL - $row_CheckStats["ProFightL"]), "double"),
							GetSQLValueString(number_format($TMP_PROFIGHTT - $row_CheckStats["ProFightT"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR1 - $row_CheckStats["ProStar1"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR2 - $row_CheckStats["ProStar2"]), "double"),
							GetSQLValueString(number_format($TMP_PROSTAR3 - $row_CheckStats["ProStar3"]), "double"),	
							GetSQLValueString(number_format($TMP_ProStarPower7Days - $row_CheckStats["ProStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPower30Days - $row_CheckStats["ProStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_ProStarPowerYear - $row_CheckStats["ProStarPowerYear"]), "double"),				
							GetSQLValueString(number_format($TMP_FARMGP - $row_CheckStats["FarmGP"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTS - $row_CheckStats["FarmShots"]), "double"),
							GetSQLValueString(number_format($TMP_FARMG - $row_CheckStats["FarmG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMA - $row_CheckStats["FarmA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPOINT - $row_CheckStats["FarmPoint"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPLUSMINUS - $row_CheckStats["FarmPlusMinus"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPIM - $row_CheckStats["FarmPim"]), "double"),
							GetSQLValueString(number_format($TMP_FARM5PIM - $row_CheckStats["Farm5Pim"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSHOTSBLOCK - $row_CheckStats["FarmShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSBLOCK - $row_CheckStats["FarmOwnShotsBlock"]), "double"),
							GetSQLValueString(number_format($TMP_FARMOWNSHOTSMISSGOAL - $row_CheckStats["FarmOwnShotsMissGoals"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITS - $row_CheckStats["FarmHits"]), "double"),
							GetSQLValueString(number_format($TMP_FARMHITSTOOK - $row_CheckStats["FarmHitsTook"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGW - $row_CheckStats["FarmGW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMGT - $row_CheckStats["FarmGT"]), "double"),
							GetSQLValueString($TMP_FARMFACEOFFWON - $row_CheckStats["FarmFaceOffWon"], "double"),
							GetSQLValueString($TMP_FARMFACEOFFTOTAL - $row_CheckStats["FarmFaceOffTotal"], "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSSCORE - $row_CheckStats["FarmPenalityShotsScore"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPENALITYSHOTSTOTAL - $row_CheckStats["FarmPenalityShotsTotal"]), "double"),
							GetSQLValueString(number_format($TMP_FARMEMPTYNETGOAL - $row_CheckStats["FarmEmptyNetGoal"]), "double"),
							GetSQLValueString($TMP_FARMMINUTEPLAY - $row_CheckStats["FarmMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMHATTRICK - $row_CheckStats["FarmHatTrick"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPG - $row_CheckStats["FarmPPG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPA - $row_CheckStats["FarmPPA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPPSHOTS - $row_CheckStats["FarmPPShots"]), "double"),
							GetSQLValueString($TMP_FARMPPMINUTEPLAY - $row_CheckStats["FarmPPMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMPKG - $row_CheckStats["FarmPKG"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKA - $row_CheckStats["FarmPKA"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPKSHOTS - $row_CheckStats["FarmPKShots"]), "double"),
							GetSQLValueString($TMP_FARMPKMINUTEPLAY - $row_CheckStats["FarmPKMinutePlay"], "double"),
							GetSQLValueString(number_format($TMP_FARMGIVEAWAY - $row_CheckStats["FarmGiveAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMTAKEAWAY - $row_CheckStats["FarmTakeAway"]), "double"),
							GetSQLValueString(number_format($TMP_FARMPUCKPOSSESIONTIME - $row_CheckStats["FarmPuckPossesionTime"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTW - $row_CheckStats["FarmFightW"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTL - $row_CheckStats["FarmFightL"]), "double"),
							GetSQLValueString(number_format($TMP_FARMFIGHTT - $row_CheckStats["FarmFightT"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR1 - $row_CheckStats["FarmStar1"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR2 - $row_CheckStats["FarmStar2"]), "double"),
							GetSQLValueString(number_format($TMP_FARMSTAR3 - $row_CheckStats["FarmStar3"]), "double"),		
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAGOAL - $row_CheckStats["GameInRowWithAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHAPOINT - $row_CheckStats["GameInRowWithAPoint"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAGOAL - $row_CheckStats["GameInRowWithOutAGoal"]), "double"),
							GetSQLValueString(number_format($TMP_GAMEINROWWITHOUTAPOINT - $row_CheckStats["GameInRowWithOutAPoint"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower7Days - $row_CheckStats["FarmStarPower7Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPower30Days - $row_CheckStats["FarmStarPower30Days"]), "double"),
							GetSQLValueString(number_format($TMP_FarmStarPowerYear - $row_CheckStats["FarmStarPowerYear"]), "double"),
							GetSQLValueString(number_format($TMP_EXCLUDEFROMPAYROLL - $row_CheckStats["ExcludeFromPayroll"]), "text"),
							GetSQLValueString($TMP_TEAM,"int"),
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
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
				
			}
			
		
		if (($current_suspension <> $TMP_SUSPENSION) && $TMP_SUSPENSION == 0){
				$MailSubject = "$TMP_NAME returns from suspension";
  				$MailMessage = "<p>$TMP_NAME finished his suspension and is ready to return to the lineup.</p>";
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
				
				
			} else if (($current_suspension <> $TMP_SUSPENSION) && $current_suspension == 0){
				$MailSubject = "$TMP_NAME Suspension";
  				$MailMessage = "<p>$TMP_NAME has been suspended for $TMP_SUSPENSION days.</p>";
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
				$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($TMP_TEAM, "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
				$Result2 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
				
			}
			
		}
	
		$WaiverAlert="";
		$TMP_NUMBER="";
		$TMP_NAME="";
		$TMP_URLLINK="";
		$TMP_TEAM="";
		$TMP_COUNTRY="";
		$TMP_AGEDATE="";
		$TMP_WEIGHT="";
		$TMP_HEIGHT="";
		$TMP_POSC="";
		$TMP_POSLW="";
		$TMP_POSRW="";
		$TMP_POSD="";
		$TMP_CONTRACT="";
		$TMP_ROOKIE="";
		$TMP_PPROTECTED="";
		$TMP_NOAPPLYRERATE="";
		$TMP_AVAILABLEFORTRADE="";
		$TMP_NOTRADE="";
		$TMP_CANPLAYPRO="";
		$TMP_CANPLAYFARM="";
		$TMP_FORCEWAIVER="";
		$TMP_STARPOWER="";
		$TMP_SALARY1="";
		$TMP_SALARY2="";
		$TMP_SALARY3="";
		$TMP_SALARY4="";
		$TMP_SALARY5="";
		$TMP_SALARY6="";
		$TMP_SALARY7="";
		$TMP_SALARY8="";
		$TMP_SALARY9="";
		$TMP_SALARY10="";
		$TMP_INJURY="";
		$TMP_NUMBEROFINJURY="";
		$TMP_CONDITION="";
		$TMP_SUSPENSION="";
		$TMP_STATUS0="";
		$TMP_STATUS1="";
		$TMP_STATUS2="";
		$TMP_STATUS3="";
		$TMP_STATUS4="";
		$TMP_STATUS5="";
		$TMP_STATUS6="";
		$TMP_STATUS7="";
		$TMP_STATUS8="";
		$TMP_STATUS9="";
		$TMP_CK="";
		$TMP_FG="";
		$TMP_DI="";
		$TMP_SK="";
		$TMP_ST="";
		$TMP_EN="";
		$TMP_DU="";
		$TMP_PH="";
		$TMP_FO="";
		$TMP_PA="";
		$TMP_SC="";
		$TMP_DF="";
		$TMP_PS="";
		$TMP_EX="";
		$TMP_LD="";
		$TMP_PO="";
		$TMP_MO="";
		$TMP_OVERALL="";
		$TMP_PROGP=0;
		$TMP_PROSHOTS=0;
		$TMP_PROG=0;
		$TMP_PROA=0;
		$TMP_PROPOINT=0;
		$TMP_PROPLUSMINUS=0;
		$TMP_PROPIM=0;
		$TMP_PRO5PIM=0;
		$TMP_PROSHOTSBLOCK=0;
		$TMP_PROOWNSHOTSBLOCK=0;
		$TMP_PROOWNSHOTSMISSGOAL=0;
		$TMP_PROHITS=0;
		$TMP_PROHITSTOOK=0;
		$TMP_PROGW=0;
		$TMP_PROGT=0;
		$TMP_PROFACEOFFWON=0;
		$TMP_PROFACEOFFTOTAL=0;
		$TMP_PROPENALITYSHOTSSCORE=0;
		$TMP_PROPENALITYSHOTSTOTAL=0;
		$TMP_PROEMPTYNETGOAL=0;
		$TMP_PROMINUTEPLAY=0;
		$TMP_PROHATTRICK=0;
		$TMP_PROPPG=0;
		$TMP_PROPPA=0;
		$TMP_PROPPSHOTS=0;
		$TMP_PROPPMINUTEPLAY=0;
		$TMP_PROPKG=0;
		$TMP_PROPKA=0;
		$TMP_PROPKSHOTS=0;
		$TMP_PROPKMINUTEPLAY=0;
		$TMP_PROGIVEAWAY=0;
		$TMP_PROTAKEAWAY=0;
		$TMP_PROPUCKPOSSESIONTIME=0;
		$TMP_PROFIGHTW=0;
		$TMP_PROFIGHTL=0;
		$TMP_PROFIGHTT=0;
		$TMP_PROSTAR1=0;
		$TMP_PROSTAR2=0;
		$TMP_PROSTAR3=0;
		$TMP_FARMGP=0;
		$TMP_FARMSHOTS=0;
		$TMP_FARMG=0;
		$TMP_FARMA=0;
		$TMP_FARMPOINT=0;
		$TMP_FARMPLUSMINUS=0;
		$TMP_FARMPIM=0;
		$TMP_FARM5PIM=0;
		$TMP_FARMSHOTsSBLOCK=0;
		$TMP_FARMOWNSHOTSBLOCK=0;
		$TMP_FARMOWNSHOTSMISSGOAL=0;
		$TMP_FARMHITS=0;
		$TMP_FARMHITSTOOK=0;
		$TMP_FARMGW=0;
		$TMP_FARMGT=0;
		$TMP_FARMFACEOFFWON=0;
		$TMP_FARMFACEOFFTOTAL=0;
		$TMP_FARMPENALITYSHOTSSCORE=0;
		$TMP_FARMPENALITYSHOTSTOTAL=0;
		$TMP_FARMEMPTYNETGOAL=0;
		$TMP_FARMMINUTEPLAY=0;
		$TMP_FARMHATTRICK=0;
		$TMP_FARMPPG=0;
		$TMP_FARMPPA=0;
		$TMP_FARMPPSHOTS=0;
		$TMP_FARMPPMINUTEPLAY=0;
		$TMP_FARMPKG=0;
		$TMP_FARMPKA=0;
		$TMP_FARMPKSHOTS=0;
		$TMP_FARMPKMINUTEPLAY=0;
		$TMP_FARMGIVEAWAY=0;
		$TMP_FARMTAKEAWAY=0;
		$TMP_FARMPUCKPOSSESIONTIME=0;
		$TMP_FARMFIGHTW=0;
		$TMP_FARMFIGHTL=0;
		$TMP_FARMFIGHTT=0;
		$TMP_FARMSTAR1=0;
		$TMP_FARMSTAR2=0;
		$TMP_FARMSTAR3=0;
		$TMP_GAMEINROWWITHAGOAL=0;
		$TMP_GAMEINROWWITHAPOINT=0;
		$TMP_GAMEINROWWITHOUTAGOAL=0;
		$TMP_GAMEINROWWITHOUTAPOINT=0;
		$TMP_EXCLUDEFROMPAYROLL="";	
		$current_status="";
		
	}
	$row++;
}


$updateSQL = "UPDATE config SET LastModifiedPlayers='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF PLAYERS COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF PLAYERS COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>