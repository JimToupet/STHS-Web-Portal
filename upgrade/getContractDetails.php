<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php

$PID_GetPlayer = "741";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetType = "player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}


$query_GetWebInfo = sprintf("SELECT AvgerageSalary, MaxContract, UFA, MinimumPlayerSalary, MaximumPlayerSalary, PlayerAI, MaximumPlayerSalary, MinimumPlayerSalary,TradeDeadlineDay FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);

$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
$MaximumPlayerSalary=$row_GetWebInfo['MaximumPlayerSalary'];
$TradeDeadlineDay=$row_GetWebInfo['TradeDeadlineDay'];
$PlayerAI=$row_GetWebInfo['PlayerAI'];
$UFA=$row_GetWebInfo['UFA'];
$AvgerageSalary=$row_GetWebInfo['AvgerageSalary'];


if ($GetType == 'goalie'){
	$query_GetPlayer = sprintf("SELECT P.* FROM goalies as P, goaliestats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
	$query_GetAvg = sprintf("SELECT AVG(SK) as SK, AVG(DU) as DU, AVG(EN) as EN, AVG(SZ) as SZ, AVG(AG) as AG, AVG(RB) as RB, AVG(SC) as SC, AVG(HS) as HS, AVG(RT) as RT, AVG(PC) as PC, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM goalies WHERE Retired=0 AND SK > 50 AND DU > 50 AND EN > 40 AND SZ > 50 AND AG > 50 AND RB > 50 AND SC > 50 AND PS AND LD > 50 AND EX > 50");
	$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
	$row_GetAvg = mysql_fetch_assoc($GetAvg);
	$totalRows_GetAvg = mysql_num_rows($GetAvg);
	
	$SK_MOD=0.85;
	$DU_MOD=1.10;
	$EN_MOD=1.00;
	$SZ_MOD=1.10;
	$AG_MOD=0.85;
	$RB_MOD=1.05;
	$SC_MOD=0.90;
	$HS_MOD=0.75;
	$RT_MOD=0.85;
	$PC_MOD=0.80;
	$PS_MOD=0.75;
	$EX_MOD=0.50;
	$LD_MOD=0.50;
	
	$BASE_MOD_1 = 1.15;
	$BASE_MOD_2 = 1.1;
	$BASE_MOD_3 = 1.05;
	$BASE_MOD_4 = 1;
	$INCREMENT=0.075;
	
	echo "<h1>".$row_GetPlayer['Name']."</h1><h3>Ratings multiplied by percentage modify</h3>";
	echo number_format($row_GetPlayer['SK'],0)." * ".number_format($SK_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['DU'],0)." * ".number_format($DU_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['EN'],0)." * ".number_format($EN_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['SZ'],0)." * ".number_format($SZ_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['AG'],0)." * ".number_format($AG_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['RB'],0)." * ".number_format($RB_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['SC'],0)." * ".number_format($SC_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['HS'],0)." * ".number_format($HS_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['RT'],0)." * ".number_format($RT_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['PC'],0)." * ".number_format($PC_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['PS'],0)." * ".number_format($PS_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['EX'],0)." * ".number_format($EX_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['LD'],0)." * ".number_format($LD_MOD * 100)."%<Br>";
	echo "<br><br><h3>Average League Rating multiplied by percentage modifier  ----  Player Rating multiplied by percentage modifier</h3>";
	var_dump("Avg. League SK = ".($row_GetAvg['SK'] * $CK_MOD)." -  Player SK = ".($row_GetPlayer['SK'] * $SK_MOD)); echo "<BR>";
	var_dump("Avg. League DU = ".($row_GetAvg['DU'] * $DU_MOD)." -  Player DU = ".($row_GetPlayer['DU'] * $DU_MOD)); echo "<BR>";
	var_dump("Avg. League EN = ".($row_GetAvg['EN'] * $EN_MOD)." -  Player EN = ".($row_GetPlayer['EN'] * $EN_MOD)); echo "<BR>";
	var_dump("Avg. League SZ = ".($row_GetAvg['SZ'] * $SZ_MOD)." -  Player SZ = ".($row_GetPlayer['SZ'] * $SZ_MOD)); echo "<BR>";
	var_dump("Avg. League AG = ".($row_GetAvg['AG'] * $AG_MOD)." -  Player AG = ".($row_GetPlayer['AG'] * $AG_MOD)); echo "<BR>";
	var_dump("Avg. League RB = ".($row_GetAvg['RB'] * $RB_MOD)." -  Player RB = ".($row_GetPlayer['RB'] * $RB_MOD)); echo "<BR>";
	var_dump("Avg. League SC = ".($row_GetAvg['SC'] * $SC_MOD)." -  Player SC = ".($row_GetPlayer['SC'] * $SC_MOD)); echo "<BR>";
	var_dump("Avg. League HS = ".($row_GetAvg['HS'] * $HS_MOD)." -  Player HS = ".($row_GetPlayer['HS'] * $HS_MOD)); echo "<BR>";
	var_dump("Avg. League RT = ".($row_GetAvg['RT'] * $RT_MOD)." -  Player RT = ".($row_GetPlayer['RT'] * $RT_MOD)); echo "<BR>";
	var_dump("Avg. League PC = ".($row_GetAvg['PC'] * $PC_MOD)." -  Player PC = ".($row_GetPlayer['PC'] * $PC_MOD)); echo "<BR>";
	var_dump("Avg. League PS = ".($row_GetAvg['PS'] * $PS_MOD)." -  Player PS = ".($row_GetPlayer['PS'] * $PS_MOD)); echo "<BR>";
	var_dump("Avg. League EX = ".($row_GetAvg['EX'] * $EX_MOD)." -  Player EX = ".($row_GetPlayer['EX'] * $EX_MOD)); echo "<BR>";
	var_dump("Avg. League LD = ".($row_GetAvg['LD'] * $LD_MOD)." -  Player LD = ".($row_GetPlayer['LD'] * $LD_MOD)); echo "<BR>";
	
	$WEIGHTED_AVE_RATE = ((($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['SZ'] * $SZ_MOD) + ($row_GetAvg['AG'] * $AG_MOD) + ($row_GetAvg['RB'] * $RB_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['HS'] * $HS_MOD) + ($row_GetAvg['RT'] * $RT_MOD) + ($row_GetAvg['PC'] * $PC_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 13);
	$PLAYER_AVE_RATE = ((($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['SZ'] * $SZ_MOD) + ($row_GetPlayer['AG'] * $AG_MOD) + ($row_GetPlayer['RB'] * $RB_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['HS'] * $HS_MOD) + ($row_GetPlayer['RT'] * $RT_MOD) + ($row_GetPlayer['PC'] * $PC_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 13);
	$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
	
	if($row_GetPlayer['PO'] > 99){ $POTENTIAL_MOD = 1.25; 
	} else if($row_GetPlayer['PO'] >= 95 && $row_GetPlayer['PO'] < 99){ $POTENTIAL_MOD = 1.2; 
	} else if($row_GetPlayer['PO'] >= 90 && $row_GetPlayer['PO'] < 95){ $POTENTIAL_MOD = 1.15; 
	} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.1; 
	} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.075; 
	} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.05; 
	} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.025; 
	} else { $POTENTIAL_MOD = 1;}
	
	$YEAR_1_MOD = ($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_2_MOD = ($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_3_MOD = ($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_4_MOD = ($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	if($row_GetPlayer['Salary1'] > ($YEAR_1_MOD * $AvgerageSalary)){
		$BONUS = floor(($row_GetPlayer['Salary1'] - $AvgerageSalary) * 0.2);
	} else {
		$BONUS = 0;
	}
	
	$YEAR_1_SALARY = floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1));
	$YEAR_2_SALARY = floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95));
	$YEAR_3_SALARY = floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9));
	$YEAR_4_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85));
	$YEAR_5_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8));
	$YEAR_6_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75));
	$YEAR_7_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7));
	$YEAR_8_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65));
	$YEAR_9_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6));
	$YEAR_10_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5));
	$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;
	
	echo "<br><br><h3>Values to go into Salary Formula</h3>";	
	var_dump("WEIGHTED_AVE_RATE = ".$WEIGHTED_AVE_RATE); echo "<BR>";
	var_dump("PLAYER_AVE_RATE = ".$PLAYER_AVE_RATE); echo "<BR>";
	var_dump("FINAL_BASE_RATE = ".$FINAL_BASE_RATE); echo "<BR>";
	var_dump("POTENTIAL_MOD = ".$POTENTIAL_MOD); echo "<BR>";
	var_dump("YEAR_1_MOD = ".$YEAR_1_MOD); echo "<BR>";
	var_dump("YEAR_2_MOD = ".$YEAR_2_MOD); echo "<BR>";
	var_dump("YEAR_3_MOD = ".$YEAR_3_MOD); echo "<BR>";
	var_dump("YEAR_4_MOD = ".$YEAR_4_MOD); echo "<BR>";
	var_dump("CURRENT SALARY = $".number_format($row_GetPlayer['Salary1'],0)); echo "<BR>";
	var_dump("PAY CUT BONUS = $".number_format($BONUS,0)); echo "<BR>";
	var_dump("CURRENT AVERAGE SIMHL LEAGUE SALARY = $".number_format($row_GetAvg['Salary'],0)); echo "<BR>";
	var_dump("REAL LIFE AVERAGE NHL SALARY = $".number_format($AvgerageSalary,0)); echo "<BR>";
	
	echo "<br><br><h3>New Salary Requests</h3>";	
	var_dump("YEAR_1_SALARY = $".number_format(abs($YEAR_1_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_2_SALARY = $".number_format(abs($YEAR_2_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_3_SALARY = $".number_format(abs($YEAR_3_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_4_SALARY = $".number_format(abs($YEAR_4_SALARY - $BONUS),0)); echo "<BR>";
	
	
	echo "<br><br><h3>New Salary Requests with Pay Cut Bonus</h3>";	
	var_dump("YEAR_1_SALARY = $".number_format($YEAR_1_SALARY,0)); echo "<BR>";
	var_dump("YEAR_2_SALARY = $".number_format($YEAR_2_SALARY,0)); echo "<BR>";
	var_dump("YEAR_3_SALARY = $".number_format($YEAR_3_SALARY,0)); echo "<BR>";
	var_dump("YEAR_4_SALARY = $".number_format($YEAR_4_SALARY,0)); echo "<BR>";
	
}else{
	$query_GetPlayer = sprintf("SELECT P.* FROM players as P, playerstats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $PID_GetPlayer);
	$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
	$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
	$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
	$query_GetAvg = sprintf("SELECT AVG(Salary1) as Salary, AVG(CK) as CK, AVG(FG) as FG, AVG(DI) as DI, AVG(SK) as SK, AVG(ST) as ST, AVG(EN) as EN, AVG(DU) as DU, AVG(PH) as PH, AVG(FO) as FO, AVG(PA) as PA, AVG(SC) as SC, AVG(DF) as DF, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM players WHERE Retired=0 AND CK > 50 AND FG > 50 AND DI > 40 AND SK > 50 AND ST > 50 AND EN > 50 AND DU > 50 AND PH > 50 AND FO > 50 AND PA > 50 AND SC > 50 AND DF > 50 AND PS > 50 AND LD > 50 AND EX > 50");
	$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
	$row_GetAvg = mysql_fetch_assoc($GetAvg);
	$totalRows_GetAvg = mysql_num_rows($GetAvg);
	
	if ($row_GetPlayer['Position'] > 0 && $row_GetPlayer['Position'] < 4){
		$CK_MOD=0.65;
		$FG_MOD=0.50;
		$DI_MOD=0.50;
		$SK_MOD=0.50;
		$ST_MOD=0.80;
		$EN_MOD=0.80;
		$DU_MOD=0.70;
		$PH_MOD=0.80;
		$FO_MOD=0.65;
		$PA_MOD=1.10;
		$SC_MOD=1.30;
		$DF_MOD=1.10;
		$PS_MOD=0.60;
		$EX_MOD=0.50;
		$LD_MOD=0.50;
	} else {
		$CK_MOD=0.90;
		$FG_MOD=0.50;
		$DI_MOD=0.60;
		$SK_MOD=0.75;
		$ST_MOD=0.80;
		$EN_MOD=0.80;
		$DU_MOD=1.10;
		$PH_MOD=0.80;
		$FO_MOD=0.20;
		$PA_MOD=1.05;
		$SC_MOD=1.00;
		$DF_MOD=1.30;
		$PS_MOD=0.20;
		$EX_MOD=0.50;
		$LD_MOD=0.50;
	} 
	
	$BASE_MOD_1 = 1.15;
	$BASE_MOD_2 = 1.1;
	$BASE_MOD_3 = 1.05;
	$BASE_MOD_4 = 1;
	$INCREMENT=0.12;
	
	echo "<h1>".$row_GetPlayer['Name']."</h1><h3>Ratings multiplied by percentage modify</h3>";
	echo number_format($row_GetPlayer['CK'],0)." * ".number_format($CK_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['FG'],0)." * ".number_format($FG_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['DI'],0)." * ".number_format($DI_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['SK'],0)." * ".number_format($SK_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['ST'],0)." * ".number_format($ST_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['EN'],0)." * ".number_format($EN_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['DU'],0)." * ".number_format($DU_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['PH'],0)." * ".number_format($PH_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['FO'],0)." * ".number_format($FO_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['PA'],0)." * ".number_format($PA_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['SC'],0)." * ".number_format($SC_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['DF'],0)." * ".number_format($DF_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['PS'],0)." * ".number_format($PS_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['EX'],0)." * ".number_format($EX_MOD * 100)."%<Br>";
	echo number_format($row_GetPlayer['LD'],0)." * ".number_format($LD_MOD * 100)."%<Br>";
	echo "<br><br><h3>Average League Rating multiplied by percentage modifier  ----  Player Rating multiplied by percentage modifier</h3>";
	var_dump("Avg. League CK = ".($row_GetAvg['CK'] * $CK_MOD)." -  Player CK = ".($row_GetPlayer['CK'] * $CK_MOD)); echo "<BR>";
	var_dump("Avg. League FG = ".($row_GetAvg['FG'] * $FG_MOD)." -  Player FG = ".($row_GetPlayer['FG'] * $FG_MOD)); echo "<BR>";
	var_dump("Avg. League DI = ".($row_GetAvg['DI'] * $DI_MOD)." -  Player DI = ".($row_GetPlayer['DI'] * $DI_MOD)); echo "<BR>";
	var_dump("Avg. League SK = ".($row_GetAvg['SK'] * $SK_MOD)." -  Player SK = ".($row_GetPlayer['SK'] * $SK_MOD)); echo "<BR>";
	var_dump("Avg. League ST = ".($row_GetAvg['ST'] * $ST_MOD)." -  Player ST = ".($row_GetPlayer['ST'] * $ST_MOD)); echo "<BR>";
	var_dump("Avg. League EN = ".($row_GetAvg['EN'] * $EN_MOD)." -  Player EN = ".($row_GetPlayer['EN'] * $EN_MOD)); echo "<BR>";
	var_dump("Avg. League DU = ".($row_GetAvg['DU'] * $DU_MOD)." -  Player DU = ".($row_GetPlayer['DU'] * $DU_MOD)); echo "<BR>";
	var_dump("Avg. League PH = ".($row_GetAvg['PH'] * $PH_MOD)." -  Player PH = ".($row_GetPlayer['PH'] * $PH_MOD)); echo "<BR>";
	var_dump("Avg. League FO = ".($row_GetAvg['FO'] * $FO_MOD)." -  Player FO = ".($row_GetPlayer['FO'] * $FO_MOD)); echo "<BR>";
	var_dump("Avg. League PA = ".($row_GetAvg['PA'] * $PA_MOD)." -  Player PA = ".($row_GetPlayer['PA'] * $PA_MOD)); echo "<BR>";
	var_dump("Avg. League SC = ".($row_GetAvg['SC'] * $SC_MOD)." -  Player SC = ".($row_GetPlayer['SC'] * $SC_MOD)); echo "<BR>";
	var_dump("Avg. League DF = ".($row_GetAvg['DF'] * $DF_MOD)." -  Player DF = ".($row_GetPlayer['DF'] * $DF_MOD)); echo "<BR>";
	var_dump("Avg. League PS = ".($row_GetAvg['PS'] * $PS_MOD)." -  Player PS = ".($row_GetPlayer['PS'] * $PS_MOD)); echo "<BR>";
	var_dump("Avg. League EX = ".($row_GetAvg['EX'] * $EX_MOD)." -  Player EX = ".($row_GetPlayer['EX'] * $EX_MOD)); echo "<BR>";
	var_dump("Avg. League LD = ".($row_GetAvg['LD'] * $LD_MOD)." -  Player LD = ".($row_GetPlayer['LD'] * $LD_MOD)); echo "<BR>";
	
	$WEIGHTED_AVE_RATE = ((($row_GetAvg['CK'] * $CK_MOD) + ($row_GetAvg['FG'] * $FG_MOD) + ($row_GetAvg['DI'] * $DI_MOD) + ($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['ST'] * $ST_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['PH'] * $PH_MOD) + ($row_GetAvg['FO'] * $FO_MOD) + ($row_GetAvg['PA'] * $PA_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['DF'] * $DF_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 15);
	$PLAYER_AVE_RATE = ((($row_GetPlayer['CK'] * $CK_MOD) + ($row_GetPlayer['FG'] * $FG_MOD) + ($row_GetPlayer['DI'] * $DI_MOD) + ($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['ST'] * $ST_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['PH'] * $PH_MOD) + ($row_GetPlayer['FO'] * $FO_MOD) + ($row_GetPlayer['PA'] * $PA_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['DF'] * $DF_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 15);
	$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
	
	if($row_GetPlayer['PO'] > 99){ $POTENTIAL_MOD = 1.25; 
	} else if($row_GetPlayer['PO'] >= 95 && $row_GetPlayer['PO'] < 99){ $POTENTIAL_MOD = 1.2; 
	} else if($row_GetPlayer['PO'] >= 90 && $row_GetPlayer['PO'] < 95){ $POTENTIAL_MOD = 1.15; 
	} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.1; 
	} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.075; 
	} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.05; 
	} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.025; 
	} else { $POTENTIAL_MOD = 1;}
	
	$YEAR_1_MOD = ($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_2_MOD = ($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_3_MOD = ($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	$YEAR_4_MOD = ($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD;
	if($row_GetPlayer['Salary1'] > ($YEAR_1_MOD * $AvgerageSalary)){
		$BONUS = floor(($row_GetPlayer['Salary1'] - $AvgerageSalary) * 0.2);
	} else {
		$BONUS = 0;
	}
	
	$YEAR_1_SALARY = floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1));
	$YEAR_2_SALARY = floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95));
	$YEAR_3_SALARY = floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9));
	$YEAR_4_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85));
	$YEAR_5_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8));
	$YEAR_6_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75));
	$YEAR_7_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7));
	$YEAR_8_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65));
	$YEAR_9_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6));
	$YEAR_10_SALARY = floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5));
	$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;
	
	echo "<br><br><h3>Values to go into Salary Formula</h3>";	
	var_dump("WEIGHTED_AVE_RATE = ".$WEIGHTED_AVE_RATE); echo "<BR>";
	var_dump("PLAYER_AVE_RATE = ".$PLAYER_AVE_RATE); echo "<BR>";
	var_dump("FINAL_BASE_RATE = ".$FINAL_BASE_RATE); echo "<BR>";
	var_dump("POTENTIAL_MOD = ".$POTENTIAL_MOD); echo "<BR>";
	var_dump("YEAR_1_MOD = ".$YEAR_1_MOD); echo "<BR>";
	var_dump("YEAR_2_MOD = ".$YEAR_2_MOD); echo "<BR>";
	var_dump("YEAR_3_MOD = ".$YEAR_3_MOD); echo "<BR>";
	var_dump("YEAR_4_MOD = ".$YEAR_4_MOD); echo "<BR>";
	var_dump("CURRENT SALARY = $".number_format($row_GetPlayer['Salary1'],0)); echo "<BR>";
	var_dump("PAY CUT BONUS = $".number_format($BONUS,0)); echo "<BR>";
	var_dump("CURRENT AVERAGE SIMHL LEAGUE SALARY = $".number_format($row_GetAvg['Salary'],0)); echo "<BR>";
	var_dump("REAL LIFE AVERAGE NHL SALARY = $".number_format($AvgerageSalary,0)); echo "<BR>";
	
	echo "<br><br><h3>New Salary Requests</h3>";	
	var_dump("YEAR_1_SALARY = $".number_format(abs($YEAR_1_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_2_SALARY = $".number_format(abs($YEAR_2_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_3_SALARY = $".number_format(abs($YEAR_3_SALARY - $BONUS),0)); echo "<BR>";
	var_dump("YEAR_4_SALARY = $".number_format(abs($YEAR_4_SALARY - $BONUS),0)); echo "<BR>";
	
	
	echo "<br><br><h3>New Salary Requests with Pay Cut Bonus</h3>";	
	var_dump("YEAR_1_SALARY = $".number_format($YEAR_1_SALARY,0)); echo "<BR>";
	var_dump("YEAR_2_SALARY = $".number_format($YEAR_2_SALARY,0)); echo "<BR>";
	var_dump("YEAR_3_SALARY = $".number_format($YEAR_3_SALARY,0)); echo "<BR>";
	var_dump("YEAR_4_SALARY = $".number_format($YEAR_4_SALARY,0)); echo "<BR>";
	
}

$PlayerName=$row_GetPlayer['Name'];
$Position=$row_GetPlayer['Position'];
$currentSalary=$row_GetPlayer['Salary1'];



$query_GetTotalDays = "select schedule.Day FROM schedule WHERE schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day desc limit 0,1";
$GetTotalDays = mysql_query($query_GetTotalDays, $connection) or die(mysql_error());
$row_GetTotalDays = mysql_fetch_assoc($GetTotalDays);
$totalRows_GetTotalDays = $row_GetTotalDays['Day'];

$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
if ($totalRows_GetLastDay==0){
	$Day_ID = 0;
} else {
	$Day_ID = $row_GetLastDay['Day'];
}

$query_GetPlayerExtensionOffers = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s ORDER BY DateCreated DESC ", $PID_GetPlayer);
$GetPlayerExtensionOffers = mysql_query($query_GetPlayerExtensionOffers, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffers = mysql_fetch_assoc($GetPlayerExtensionOffers);
$totalRows_GetPlayerExtensionOffers = mysql_num_rows($GetPlayerExtensionOffers);

$query_GetPlayerExtensionOffersCT = sprintf("SELECT Attempt,DateCreated FROM playersextensionoffers WHERE Player=%s AND Team=%s ORDER BY DateCreated DESC ", $PID_GetPlayer, $row_GetPlayer['Team']);
$GetPlayerExtensionOffersCT = mysql_query($query_GetPlayerExtensionOffersCT, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersCT = mysql_fetch_assoc($GetPlayerExtensionOffersCT);
$totalRows_GetPlayerExtensionOffersCT = mysql_num_rows($GetPlayerExtensionOffersCT);

$query_GetPlayerExtensionOffersTeams = sprintf("SELECT COUNT(Team) FROM playersextensionoffers WHERE Player=%s GROUP BY Team ", $PID_GetPlayer);
$GetPlayerExtensionOffersTeams = mysql_query($query_GetPlayerExtensionOffersTeams, $connection) or die(mysql_error());
$row_GetPlayerExtensionOffersTeams = mysql_fetch_assoc($GetPlayerExtensionOffersTeams);
$totalRows_GetPlayerExtensionOffersTeams = mysql_num_rows($GetPlayerExtensionOffersTeams);

$ExtensionAttempts = 0;
$ExtensionAttemptsValue = 0;
$ExtensionLastDate="2009-01-01";
$RemainingOffers = 0;	
$NegWithMe = "True";	

if($totalRows_GetPlayerExtensionOffersTeams == 1){
	if($totalRows_GetPlayerExtensionOffersCT == 0){
		$ExtensionAttempts=0;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate="2009-01-01";	
		$RemainingOffers = 3;	
	} else if($totalRows_GetPlayerExtensionOffersCT == 1){
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 2;	
	} else if($totalRows_GetPlayerExtensionOffersCT == 2){
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 1;	
	} else {
		$ExtensionAttempts = 3;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 0;	
	}	
	
} else if($totalRows_GetPlayerExtensionOffersTeams == 2){
	if($totalRows_GetPlayerExtensionOffersCT == 0){
		$ExtensionAttempts=0;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate="2009-01-01";
		$RemainingOffers = 2;			
	} else {
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate = $row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 1;	
	} 
	
} else if($totalRows_GetPlayerExtensionOffersTeams >= 3){
	if($totalRows_GetPlayerExtensionOffersCT == 0){
		$ExtensionAttempts=0;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate="2009-01-01";
		$RemainingOffers = 2;			
	} else if($totalRows_GetPlayerExtensionOffersCT == 1){	
		$ExtensionAttempts=3;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate="2009-01-01";
		$RemainingOffers = 1;	
	} else {
		$ExtensionAttempts = $totalRows_GetPlayerExtensionOffersCT;
		$ExtensionAttemptsValue = ($totalRows_GetPlayerExtensionOffersCT * 20);
		$ExtensionLastDate=$row_GetPlayerExtensionOffers['DateCreated'];
		$RemainingOffers = 0;	
	}
	
} else if($totalRows_GetPlayerExtensionOffersTeams == 0){
		$ExtensionAttempts = 0;
		$ExtensionAttemptsValue = 0;
		$ExtensionLastDate = "2009-01-01";
		$RemainingOffers = 3;	
}

$OfferAccepted = false;
$OfferYears = 1;
$offerSalary = $MinimumPlayerSalary;
$OfferNoTrade = 0;
$modifier = 1;
$odds = 90;

$HalfSeason = number_format($totalRows_GetTotalDays / 2,0);

if ($_SESSION['current_SeasonTypeID']==2){
	$timeofyear = 0;
} else if ($_SESSION['current_SeasonTypeID']==1){
	if ($Day_ID > $HalfSeason){
		$timeofyear = 10;		
	} else {
		$timeofyear = 5;
	}
} else {
	$timeofyear = 15;

}
$odds = $odds - $timeofyear;


echo "<br><br><h3>Data Returned to Website for Negotiation</h3>";	
$jsonData = '[';
	$jsonData = $jsonData . '
	{
	"name":"'.$row_GetPlayer['Name'].'",
	"YearSalary1":"'.$YEAR_1_SALARY.'",
	"YearSalary2":"'.$YEAR_2_SALARY.'",
	"YearSalary3":"'.$YEAR_3_SALARY.'",
	"YearSalary4":"'.$YEAR_4_SALARY.'",
	"YearSalary5":"'.$YEAR_5_SALARY.'",
	"YearSalary6":"'.$YEAR_6_SALARY.'",
	"YearSalary7":"'.$YEAR_7_SALARY.'",
	"YearSalary8":"'.$YEAR_8_SALARY.'",
	"YearSalary9":"'.$YEAR_9_SALARY.'",
	"YearSalary10":"'.$YEAR_10_SALARY.'"
	"ExtensionAttempts":"'.$ExtensionAttempts.'"
	"ExtensionAttemptsValue:"'.$ExtensionAttemptsValue.'"
	"ExtensionLastDate:"'.$ExtensionLastDate.'"
	"RemainingOffers:"'.$RemainingOffers.'"
	"Odds:"'.$odds.'"
	"MinimumPlayerSalary:"'.$MinimumPlayerSalary.'"
	"MaximumPlayerSalary:"'.$MaximumPlayerSalary.'"
	"UFA:"'.$UFA.'"
	}';
$jsonData = $jsonData . ']';
//$jsonData = json_encode($jsonData);
var_dump($jsonData);

?>