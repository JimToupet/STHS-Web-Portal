<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_ProPayRoll = "Pro Payroll";
	$l_FarmPayRoll = "Farm Payroll";
	$l_Years = "Years";
	$l_Year = "Year";
	$l_SalaryCommitment = "Salary Commitment";
	$l_Attendance = "Attendance";
	$l_ArenaCapacity = "Arena Capacity";
	$l_TicketPrice = "Ticket Price";
	$l_Total = "Total";
	$l_Level = "Level"; 
	$l_Luxury = "Luxury";
	$l_Income = "Income";
	$l_HomeGamesLeft = "Home Games Left";
	$l_AverageAttendance = "Average Attendance - %";
	$l_AverageIncome = "Average Income per Game";
	$l_EstimatedRevenue = "Year to Date Revenue";
	$l_ProjectedRevenue = "Projected Revenue";
	$l_ProjectedExpenses = "Projected Expenses";
	$l_EstimatedRevenueRemaining = "Estimated Revenue";
	$l_Expense = "Expense";
	$l_CoachPayroll = "Coach Payroll";
	$l_GamesRemaining = "Games Remaining";
	$l_DaysRemaining = "Days Remaining";
	$l_ExpensesPerGame = "Expenses Per Game";
	$l_EstimatedSeasonExpenses = "Estimated Season Expenses";
	$l_CurrentFunds = "Current Funds";
	$l_ProjectedBankAccount = "Projected Bank Account";
	$l_TotalPayroll = "Total Payroll";
	$l_SalaryCap = "Salary Cap";
	$l_RemainingCapSpace = "Remaining Cap Space";
	$l_TotalAttendance = "Total Attendance";
	$l_ProTotals = "PRO TOTALS";
	$l_FarmTotals = "FARM TOTALS";
	$l_CoachTotal = "COACHING TOTALS";
	$l_proteam_overview = "Pro Team Payroll";
	$l_farmteam_overview = "Farm Team Payroll";
	$l_organization_overview = "Organization Overview";
	$l_C  = "C";
	$l_LW  = "LW";
	$l_RW  = "RW";
	$l_D  = "D";
	$l_G  = "G";
	$l_FarmTotalCap = "SALARY CAP TOTALS";
	$l_BalanceSheet = "Balance Sheet";
	$l_Yeartodate = "Year to date";
	$l_YearEstimatedRevenue = "End Year Estimated Revenue";
	$l_coach_overview = "Coaching Payroll";
	$l_LuxuryTaxeTotal = "Luxury Tax Total";
	$l_BankAccount = "Bank Account";
	$l_ProExDay = "Pro Expenses Per Days";
	$l_FarmExDay = "Farm Expenses Per Days";
	$l_ProExYear = "Pro Year To Date Expenses";
	$l_FarmExYear = "Farm Year To Date Expenses";
	$l_NoTradeClause = "No Trade Clause";
	break; 

case 'fr': 
	$l_ProPayRoll = "Salaires (pro)";
	$l_FarmPayRoll = "Salaires (farm)";
	$l_Years = "Ann&eacute;e(s)";
	$l_Year = "Ann&eacute;e";
	$l_SalaryCommitment = "Engagements futurs";
	$l_Attendance = "Assistance";
	$l_ArenaCapacity = "Capacit&eacute; de l'ar&eacute;na";
	$l_TicketPrice = "Prix";
	$l_Total = "Total"; 
	$l_Level = "Niveau"; 
	$l_Luxury = "Loges";
	$l_Income = "Revenus";
	$l_HomeGamesLeft = "Matchs &agrave; domicile restants";
	$l_AverageAttendance = "Foule moyenne - %";
	$l_AverageIncome = "Revenus moyens";
	$l_EstimatedRevenue = "Revenus estim&eacute;s";
	$l_EstimatedRevenueRemaining = "Estimated Revenue";
	$l_ProjectedRevenue = "Projected Revenue";
	$l_ProjectedExpenses = "Projected Expenses";
	$l_Expense = "D&eacute;penses";
	$l_CoachPayroll = "Salaires (entra&icircneurs)";
	$l_GamesRemaining = "Matchs restants";
	$l_DaysRemaining = "Days Remaining";
	$l_ExpensesPerGame = "D&eacute;penses par match";
	$l_EstimatedSeasonExpenses = "Estimation&nbsp;d&eacute;penses&nbsp;de&nbsp;la&nbsp;saison";
	$l_CurrentFunds = "Fonds en banque";
	$l_ProjectedBankAccount = "Fonds projet&eacute;s";
	$l_TotalPayroll = "Masse salariale totale";
	$l_SalaryCap = "Plafond salarial";
	$l_RemainingCapSpace = "Marge de manoeuvre";
	$l_TotalAttendance = "Billets vendus (total)";
	$l_proteam_overview = "Pro";
	$l_farmteam_overview = "Mineur";
	$l_organization_overview = "Finances Organization";
	$l_ProTotals = "TOTAL PRO";
	$l_FarmTotals = "TOTAL MINEUR";
	$l_C  = "C";
	$l_LW  = "AG";
	$l_RW  = "AD";
	$l_D  = "D";
	$l_G  = "G";
	$l_FarmTotalCap = "TOTAL MASSE SALARIALE";
	$l_BalanceSheet = "Compte banque";
	$l_Yeartodate = "Courant";
	$l_YearEstimatedRevenue = "Revenus estim&eacute;s pour la saison";
	$l_coach_overview = "Entra&icirc;neurs";
	$l_LuxuryTaxeTotal = "Total d'argent d'une &eacute;quipe peut d&eacute;penser";
	$l_BankAccount = "L'argent en banque";
	$l_ProExDay = "Les d&eacute;penses de l'&eacute;quipe professionnelle estim&eacute;e par jours";
	$l_FarmExDay = "Les d&eacute;penses de l'&eacute;quipe mineure estim&eacute;e par jours";
	$l_ProExYear = "Les d&eacute;penses de l'&eacute;quipe professionnelle estim&eacute;e par saison";
	$l_FarmExYear = "Les d&eacute;penses de l'&eacute;quipe mineure estim&eacute;e par saison";
	$l_NoTradeClause = "Clause de non echange";
	break;
} 

$TID_GetSalarys = "1";
if (isset($_SESSION['current_Team'])) {
  $TID_GetSalarys = (get_magic_quotes_gpc()) ? $_SESSION['current_Team'] : addslashes($_SESSION['current_Team']);
}
$TID_GetFinance = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetFinance = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}
$FarmSalaryPercentage=27;


$query_GetInfo = sprintf("SELECT WaiverSalaryExemption, UFA, PayrollFarm, PayrollCoach, SalaryCap, FarmSalaryPercentage FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$FarmSalaryPercentage=$row_GetInfo['FarmSalaryPercentage'];
$FarmSalaryInclude=$row_GetInfo['PayrollFarm'];
$CoachSalaryInclude=$row_GetInfo['PayrollCoach'];
$SalaryCap = $row_GetInfo['SalaryCap'];
$UFA = $row_GetInfo['UFA'];
$WaiverSalaryExemption=$row_GetInfo['WaiverSalaryExemption'];

$query_GetSalarys = sprintf("SELECT  p.NoTrade, p.Number, p.AgeDate, p.Name, p.Salary1, p.Salary2, p.Salary3, p.Salary4, p.Salary5, p.Salary6, p.Salary7, p.Salary8, p.Salary9, p.Salary10, p.Contract, PosRW, PosLW, PosC, PosD, 'False' as PosG, p.Status1, p.Suspension FROM players as p WHERE p.Team='%s' AND p.Retired = 0 AND p.Status0 > 1 UNION ALL SELECT g.NoTrade, g.Number, g.AgeDate, g.Name, g.Salary1, g.Salary2, g.Salary3, g.Salary4, g.Salary5, g.Salary6, g.Salary7, g.Salary8, g.Salary9, g.Salary10, g.Contract, 'False' as PosRW, 'False' as PosLW, 'False' as PosC, 'False' as PosD, 'True' as PosG, g.Status1, g.Suspension FROM goalies as g WHERE g.Team='%s' AND g.Retired = 0  AND g.Status1 > 1 ORDER BY Salary1 desc, Contract desc, Name", $TID_GetFinance, $TID_GetFinance );
$GetSalarys = mysql_query($query_GetSalarys, $connection) or die(mysql_error());
$row_GetSalarys = mysql_fetch_assoc($GetSalarys);

$query_GetHomeGP = sprintf("SELECT COUNT(HomeTeam) as HomeGamesPlayed FROM schedule WHERE HomeTeam=%s AND Season_ID=%s AND Play='True'", $TID_GetFinance, $_SESSION['current_SeasonID'] );
$GetHomeGP = mysql_query($query_GetHomeGP, $connection) or die(mysql_error());
$row_GetHomeGP = mysql_fetch_assoc($GetHomeGP);

$query_GetFarmHomeGP = sprintf("SELECT COUNT(HomeTeam) as HomeGamesPlayed FROM farmschedule WHERE HomeTeam=%s AND Season_ID=%s AND Play='True'", $TID_GetFinance, $_SESSION['current_SeasonID'] );
$GetFarmHomeGP = mysql_query($query_GetFarmHomeGP, $connection) or die(mysql_error());
$row_GetFarmHomeGP = mysql_fetch_assoc($GetFarmHomeGP);

$query_GetLastDay = sprintf("SELECT DAY FROM  `schedule` ORDER BY DAY DESC LIMIT 0 , 1");
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);

$query_GetCurrentDay = sprintf("SELECT DAY FROM  `schedule` WHERE Play='True' OR Play ='Vraux' ORDER BY DAY DESC LIMIT 0 , 1");
$GetCurrentDay = mysql_query($query_GetCurrentDay, $connection) or die(mysql_error());
$row_GetCurrentDay = mysql_fetch_assoc($GetCurrentDay);
$daysRemaining = $row_GetLastDay ["DAY"] - $row_GetCurrentDay ["DAY"] + 1;

$query_GetFarmSalarys = sprintf("SELECT p.Suspension, p.NoTrade, p.Number, p.AgeDate, p.Name, p.Salary1, p.Salary2, p.Salary3, p.Salary4, p.Salary5, p.Salary6, p.Salary7, p.Salary8, p.Salary9, p.Salary10, p.Contract, PosRW, PosLW, PosC, PosD, 'False' as PosG FROM players as p WHERE p.Team='%s' AND p.Retired = 0 AND p.Status0 <= 1 UNION ALL SELECT g.Suspension, g.NoTrade, g.Number, g.AgeDate, g.Name, g.Salary1, g.Salary2, g.Salary3, g.Salary4, g.Salary5, g.Salary6, g.Salary7, g.Salary8, g.Salary9, g.Salary10, g.Contract, 'False' as PosRW, 'False' as PosLW, 'False' as PosC, 'False' as PosD, 'True' as PosG FROM goalies as g WHERE g.Team='%s' AND g.Retired = 0 AND g.Status1 <= 1 ORDER BY Salary1 desc, Contract desc, Name", $TID_GetFinance, $TID_GetFinance );
$GetFarmSalarys = mysql_query($query_GetFarmSalarys, $connection) or die(mysql_error());
$row_GetFarmSalarys = mysql_fetch_assoc($GetFarmSalarys);

$query_GetTeamFinance = sprintf("SELECT * FROM proteamstandings WHERE proteamstandings.Number=%s AND Season_ID=%s", $TID_GetFinance, $_SESSION['current_SeasonID'] );
$GetTeamFinance = mysql_query($query_GetTeamFinance, $connection) or die(mysql_error());
$row_GetTeamFinance = mysql_fetch_assoc($GetTeamFinance);

$query_GetFarmTeamFinance = sprintf("SELECT * FROM farmteamstandings WHERE farmteamstandings.Number=%s AND Season_ID=%s", $TID_GetFinance, $_SESSION['current_SeasonID'] );
$GetFarmTeamFinance = mysql_query($query_GetFarmTeamFinance, $connection) or die(mysql_error());
$row_GetFarmTeamFinance = mysql_fetch_assoc($GetFarmTeamFinance);

$query_GetCoachSalary = sprintf("SELECT * FROM coaches WHERE coaches.Team='%s' ", $TID_GetSalarys);
$GetCoachSalary = mysql_query($query_GetCoachSalary, $connection) or die(mysql_error());
$row_GetCoachSalary = mysql_fetch_assoc($GetCoachSalary);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_finance;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">     


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("#tabs").ttabs(); 
  $("table").tablesorter(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
    <h1><?php echo $l_nav_finance;?></h1>
    <br clear="all" />
            
	<div id="tabs">
        <div id="tabs-1">
            <?php echo "<h3>".$l_proteam_overview."</h3>";?>
           
                <div style="float:left; padding-bottom:0px">
                    <strong style="text-transform:uppercase;"><?php echo $l_nav_finance;?> - <?php echo $l_proteam_overview; ?></strong>
                  </div>
               
                <div style="font-size:9px; float:right; padding-top:4px; padding-bottom:0px">
                    B = Bonus &nbsp;&nbsp;&nbsp; * = <?php echo $l_NoTradeClause;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_players;?></th>
					<th><?php echo $l_Positions;?></th>
                    <th><?php echo $l_Age;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpSalary1 = 0;
				$tmpSalary2 = 0;
				$tmpSalary3 = 0;
				$tmpSalary4 = 0;
				$tmpSalary5 = 0;
				$tmpSalary6 = 0;
				$tmpSalary7 = 0;
				$tmpSalary8 = 0;
				$tmpSalary9 = 0;
				$tmpSalary10 = 0;
				do { 
					$UFADisplayed = 0;
					if ($row_GetSalarys['Contract'] > 0 AND $row_GetSalarys['Suspension'] < 1){
						if($row_GetSalarys['PosG'] == "True"){
							$tmpTargetFile="goalie.php";
							$tmpPlayerType='goalie';
						} else {
							$tmpTargetFile="player.php";
							$tmpPlayerType='player';
						}
						$query_GetContractExt = sprintf("SELECT P.* FROM playerscontractoffers as P WHERE P.Player=%s AND P.Type='Extension' AND P.PlayerType='%s'", $row_GetSalarys['Number'],$tmpPlayerType);
						$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
						$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
						$totalRows_GetContractExt = mysql_num_rows($GetContractExt);
				?>
                  <tr>
                    <td><a href="<?php echo $tmpTargetFile ?>?player=<?php echo $row_GetSalarys['Number']; ?>"><?php echo $row_GetSalarys['Name']; ?></a></td>
                	<td align="left" width="100">
				   <?php 
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetSalarys['PosC'] == "True" || $row_GetSalarys['PosC'] == "Vrai"){
                        echo $l_C;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetSalarys['PosLW'] == "True" || $row_GetSalarys['PosLW'] == "Vrai"){
                        echo $l_LW;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetSalarys['PosRW'] == "True" || $row_GetSalarys['PosRW'] == "Vrai"){
                        echo $l_RW;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetSalarys['PosD'] == "True" || $row_GetSalarys['PosD'] == "Vrai"){
                        echo $l_D;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetSalarys['PosG'] == "True" || $row_GetSalarys['PosG'] == "Vrai"){
                        echo $l_G;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
					$tmpNTC = "";
					if ($row_GetSalarys['NoTrade'] == "True" || $row_GetSalarys['NoTrade'] == "Vrai"){ $tmpNTC = "<sup>&nbsp;*</sup>";}
					$tmpNTC2 = "";
					if ($row_GetContractExt['NoTrade']==1){ $tmpNTC2 = "<sup>&nbsp;*</sup>";}
                    ?>
                    </td>
                    <td align="center"><?php echo getAge($row_GetSalarys['AgeDate']); ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary1'] > 0){ echo "$".number_format($row_GetSalarys['Salary1'],0).$tmpNTC; $tmpSalary1 = $tmpSalary1 + $row_GetSalarys['Salary1']; } else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary1'],0,0,0,$row_GetSalarys['AgeDate']); } ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary2'] > 0){ echo "$".number_format($row_GetSalarys['Salary2'],0).$tmpNTC; $tmpSalary2 = $tmpSalary2 + $row_GetSalarys['Salary2']; } else if ($row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0).$tmpNTC2."</span>"; if($row_GetContractExt['Compensation'] > 0){echo "&nbsp;<span style='color:#0183da; font-size:0.8em; vertical-align:top; position: relative;	top: -0.4em;'>B</span>";};  $tmpSalary2 = $tmpSalary2 + $row_GetContractExt['Salary1'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary2'],$row_GetContractExt['Salary1'],$UFADisplayed,1,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary3'] > 0){ echo "$".number_format($row_GetSalarys['Salary3'],0).$tmpNTC; $tmpSalary3 = $tmpSalary3 + $row_GetSalarys['Salary3']; } else if ($row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0).$tmpNTC2."</span>";  $tmpSalary3 = $tmpSalary3 + $row_GetContractExt['Salary2'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary3'],$row_GetContractExt['Salary2'],$UFADisplayed,2,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary4'] > 0){ echo "$".number_format($row_GetSalarys['Salary4'],0).$tmpNTC; $tmpSalary4 = $tmpSalary4 + $row_GetSalarys['Salary4']; } else if ($row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0).$tmpNTC2."</span>";  $tmpSalary4 = $tmpSalary4 + $row_GetContractExt['Salary3'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary4'],$row_GetContractExt['Salary3'],$UFADisplayed,3,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary5'] > 0){ echo "$".number_format($row_GetSalarys['Salary5'],0).$tmpNTC; $tmpSalary5 = $tmpSalary5 + $row_GetSalarys['Salary5']; } else if ($row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0).$tmpNTC2."</span>";  $tmpSalary5 = $tmpSalary5 + $row_GetContractExt['Salary4'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary5'],$row_GetContractExt['Salary4'],$UFADisplayed,4,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary6'] > 0){ echo "$".number_format($row_GetSalarys['Salary6'],0).$tmpNTC; $tmpSalary6 = $tmpSalary6 + $row_GetSalarys['Salary6']; } else if ($row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0).$tmpNTC2."</span>";  $tmpSalary6 = $tmpSalary6 + $row_GetContractExt['Salary5'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary6'],$row_GetContractExt['Salary5'],$UFADisplayed,5,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary7'] > 0){ echo "$".number_format($row_GetSalarys['Salary7'],0).$tmpNTC; $tmpSalary7 = $tmpSalary7 + $row_GetSalarys['Salary7']; } else if ($row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0).$tmpNTC2."</span>";  $tmpSalary7 = $tmpSalary7 + $row_GetContractExt['Salary6'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary7'],$row_GetContractExt['Salary6'],$UFADisplayed,6,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary8'] > 0){ echo "$".number_format($row_GetSalarys['Salary8'],0).$tmpNTC; $tmpSalary8 = $tmpSalary8 + $row_GetSalarys['Salary8']; } else if ($row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0).$tmpNTC2."</span>";  $tmpSalary8 = $tmpSalary8 + $row_GetContractExt['Salary7'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary8'],$row_GetContractExt['Salary7'],$UFADisplayed,7,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary9'] > 0){ echo "$".number_format($row_GetSalarys['Salary9'],0).$tmpNTC; $tmpSalary9 = $tmpSalary9 + $row_GetSalarys['Salary9']; } else if ($row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0).$tmpNTC2."</span>";  $tmpSalary9 = $tmpSalary9 + $row_GetContractExt['Salary8'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary9'],$row_GetContractExt['Salary8'],$UFADisplayed,8,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['Salary10'] > 0){ echo "$".number_format($row_GetSalarys['Salary10'],0).$tmpNTC; $tmpSalary10 = $tmpSalary10 + $row_GetSalarys['Salary10']; } else if ($row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0).$tmpNTC2."</span>";  $tmpSalary10 = $tmpSalary10 + $row_GetContractExt['Salary9'];} else { echo checkUFA(getAge($row_GetSalarys['AgeDate']),$row_GetSalarys['Salary10'],$row_GetContractExt['Salary9'],$UFADisplayed,9,$row_GetSalarys['AgeDate']); }  ?></td>
                  </tr>
                <?php 
					}
				} while ($row_GetSalarys = mysql_fetch_assoc($GetSalarys)); 
				?>
                </tbody>
                <tfoot>
                <tr>
                	<td colspan="3" align="right">Bonus</td>
                	<td align="center"><?php $CurrentBonus = ($row_GetTeamFinance['TotalPlayersSalaries'] - $tmpSalary1); if($CurrentBonus > 1000){ echo "$".number_format($CurrentBonus,0); } else { echo "-"; } ?></td>
                	<td align="center"><?php $NextYearBonus = getBonus($TID_GetFinance, $connection); if($NextYearBonus > 0){ echo "$".number_format($NextYearBonus,0); } else { echo "-"; } ?></td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                	<td align="center">-</td>
                  </tr>
                <tr>
                	<td colspan="3" align="right"><?php echo $l_ProTotals; ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary1 + $CurrentBonus,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary2 + $NextYearBonus,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary3,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary4,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary5,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary6,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary7,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary8,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary9,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpSalary10,0); ?></td>
                  </tr>
              	</tfoot>
                </table>
            </div>
            
            <div id="tabs-2">
            <?php echo "<h3>".$l_farmteam_overview."</h3>";?>
            
            <strong style="text-transform:uppercase;"><?php echo $l_nav_finance;?> - <?php echo $l_farmteam_overview; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_players;?></th>
					<th><?php echo $l_Positions;?></th>
                    <th><?php echo $l_Age;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpFSalary1 = 0;
				$tmpFSalary2 = 0;
				$tmpFSalary3 = 0;
				$tmpFSalary4 = 0;
				$tmpFSalary5 = 0;
				$tmpFSalary6 = 0;
				$tmpFSalary7 = 0;
				$tmpFSalary8 = 0;
				$tmpFSalary9 = 0;
				$tmpFSalary10 = 0;
				do { 
					$UFADisplayed=0;
					if ($row_GetFarmSalarys['Contract'] > 0 AND $row_GetFarmSalarys['Suspension'] < 1){
						if($row_GetFarmSalarys['PosG'] == "True"){
							$tmpTargetFile="goalie.php";
							$tmpPlayerType='goalie';
						} else {
							$tmpTargetFile="player.php";
							$tmpPlayerType='player';
						}
						
						$query_GetContractExt = sprintf("SELECT P.* FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension' AND P.PlayerType='%s'", $row_GetFarmSalarys['Number'],$tmpPlayerType);
						$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
						$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
						$totalRows_GetContractExt = mysql_num_rows($GetContractExt);
				?>
                  <tr>
                    <td><a href="<?php echo $tmpTargetFile ?>?player=<?php echo $row_GetFarmSalarys['Number']; ?>"><?php echo $row_GetFarmSalarys['Name']; ?></a></td>
                	<td align="left" width="100">
				   <?php 
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetFarmSalarys['PosC'] == "True" || $row_GetFarmSalarys['PosC'] == "Vrai"){
                        echo $l_C;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetFarmSalarys['PosLW'] == "True" || $row_GetFarmSalarys['PosLW'] == "Vrai"){
                        echo $l_LW;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetFarmSalarys['PosRW'] == "True" || $row_GetFarmSalarys['PosRW'] == "Vrai"){
                        echo $l_RW;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
                    if ($row_GetFarmSalarys['PosD'] == "True" || $row_GetFarmSalarys['PosD'] == "Vrai"){
                        echo $l_D;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
					echo '<div style="display:block; float:left; text-align:center; vertical-align:middle">';
                    if ($row_GetFarmSalarys['PosG'] == "True" || $row_GetFarmSalarys['PosG'] == "Vrai"){
                        echo $l_G;
                    } else { echo "&nbsp;"; }
                    echo '</div>';
					$tmpNTC = "";
					if ($row_GetSalarys['NoTrade'] == "True" || $row_GetSalarys['NoTrade'] == "Vrai"){ $tmpNTC = "<sup>&nbsp;*</sup>";}
					$tmpNTC2 = "";
					if ($row_GetContractExt['NoTrade']==1){ $tmpNTC2 = "<sup>&nbsp;*</sup>";}
                    ?>
                    </td>
                    <td align="center"><?php echo getAge($row_GetFarmSalarys['AgeDate']); ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary1'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary1'],0).$tmpNTC; $tmpFSalary1 = $tmpFSalary1 + $row_GetFarmSalarys['Salary1']; } else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary1'],0,0,0,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary2'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary2'],0).$tmpNTC; $tmpFSalary2 = $tmpFSalary2 + $row_GetFarmSalarys['Salary2']; } else if ($row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0).$tmpNTC2."</span>";  $tmpFSalary2 = $tmpFSalary2 + $row_GetContractExt['Salary1'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary2'],$row_GetContractExt['Salary1'],$UFADisplayed,1,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary3'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary3'],0).$tmpNTC; $tmpFSalary3 = $tmpFSalary3 + $row_GetFarmSalarys['Salary3']; } else if ($row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0).$tmpNTC2."</span>";  $tmpFSalary3 = $tmpFSalary3 + $row_GetContractExt['Salary2'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary3'],$row_GetContractExt['Salary2'],$UFADisplayed,2,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary4'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary4'],0).$tmpNTC; $tmpFSalary4 = $tmpFSalary4 + $row_GetFarmSalarys['Salary4']; } else if ($row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0).$tmpNTC2."</span>";  $tmpFSalary4 = $tmpFSalary4 + $row_GetContractExt['Salary3'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary4'],$row_GetContractExt['Salary3'],$UFADisplayed,3,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary5'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary5'],0).$tmpNTC; $tmpFSalary5 = $tmpFSalary5 + $row_GetFarmSalarys['Salary5']; } else if ($row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0).$tmpNTC2."</span>";  $tmpFSalary5 = $tmpFSalary5 + $row_GetContractExt['Salary4'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary5'],$row_GetContractExt['Salary4'],$UFADisplayed,4,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary6'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary6'],0).$tmpNTC; $tmpFSalary6 = $tmpFSalary6 + $row_GetFarmSalarys['Salary6']; } else if ($row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0).$tmpNTC2."</span>";  $tmpFSalary6 = $tmpFSalary6 + $row_GetContractExt['Salary5'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary6'],$row_GetContractExt['Salary5'],$UFADisplayed,5,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary7'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary7'],0).$tmpNTC; $tmpFSalary7 = $tmpFSalary7 + $row_GetFarmSalarys['Salary7']; } else if ($row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0).$tmpNTC2."</span>";  $tmpFSalary7 = $tmpFSalary7 + $row_GetContractExt['Salary6'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary7'],$row_GetContractExt['Salary6'],$UFADisplayed,6,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary8'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary8'],0).$tmpNTC; $tmpFSalary8 = $tmpFSalary8 + $row_GetFarmSalarys['Salary8']; } else if ($row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0).$tmpNTC2."</span>";  $tmpFSalary8 = $tmpFSalary8 + $row_GetContractExt['Salary7'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary8'],$row_GetContractExt['Salary7'],$UFADisplayed,7,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary9'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary9'],0).$tmpNTC; $tmpFSalary9 = $tmpFSalary9 + $row_GetFarmSalarys['Salary9']; } else if ($row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0).$tmpNTC2."</span>";  $tmpFSalary9 = $tmpFSalary9 + $row_GetContractExt['Salary8'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary9'],$row_GetContractExt['Salary8'],$UFADisplayed,8,$row_GetSalarys['AgeDate']); }  ?></td>
                    <td align="center"><?php if ($row_GetFarmSalarys['Salary10'] > 0){ echo "$".number_format($row_GetFarmSalarys['Salary10'],0).$tmpNTC; $tmpFSalary10 = $tmpFSalary10 + $row_GetFarmSalarys['Salary10']; } else if ($row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0).$tmpNTC2."</span>";  $tmpFSalary10 = $tmpFSalary10 + $row_GetContractExt['Salary9'];} else { echo checkUFA(getAge($row_GetFarmSalarys['AgeDate']),$row_GetFarmSalarys['Salary10'],$row_GetContractExt['Salary9'],$UFADisplayed,9,$row_GetSalarys['AgeDate']); }  ?></td>
                  </tr>
                <?php 
					}
				} while ($row_GetFarmSalarys = mysql_fetch_assoc($GetFarmSalarys)); 
				?>
                </tbody>
                <tfoot> 
                <tr>
                	<td colspan="3" align="right"><?php echo $l_FarmTotals; ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary1,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary2,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary3,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary4,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary5,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary6,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary7,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary8,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary9,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpFSalary10,0); ?></td>
                 </tr>
                 <?php if($FarmSalaryInclude == 'True'){ ?>
                 <tr>
                	<td colspan="3" align="right"><?php echo $l_FarmTotalCap; ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary1 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary2 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary3 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary4 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary5 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary6 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary7 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary8 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary9 * $FarmSalaryPercentage),0); ?></td>
                	<td align="center"><?php echo "$".number_format(($tmpFSalary10 * $FarmSalaryPercentage),0); ?></td>
                </tr>
                <?php } ?>
              	</tfoot>
                </table>
            </div>
            
            <div id="tabs-3">
            <?php echo "<h3>".$l_coach_overview."</h3>";?>
            <strong style="text-transform:uppercase;"><?php echo $l_nav_finance;?> - <?php echo $l_coach_overview; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_players;?></th>
					<th><?php echo $l_Age;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpCSalary1 = 0;
				$tmpCSalary2 = 0;
				$tmpCSalary3 = 0;
				$tmpCSalary4 = 0;
				$tmpCSalary5 = 0;
				$tmpCSalary6 = 0;
				$tmpCSalary7 = 0;
				$tmpCSalary8 = 0;
				$tmpCSalary9 = 0;
				$tmpCSalary10 = 0;
				do { 
					if ($row_GetCoachSalary['Contract'] > 0 ){
						$tmpPlayerType='coach';
						$query_GetContractExt = sprintf("SELECT P.* FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension' AND P.PlayerType='%s'", $row_GetCoachSalary['Number'],$tmpPlayerType);
						$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
						$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
						$totalRows_GetContractExt = mysql_num_rows($GetContractExt);
				?>
                <tr>
                	<td><a href="coach.php?coach=<?php echo $row_GetCoachSalary['Number']; ?>"><?php echo $row_GetCoachSalary['Name']; ?></a></td>
                	<td align="center"><?php echo $row_GetCoachSalary['Age']; ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 0){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary1 = $tmpCSalary1 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 1){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary2 = $tmpCSalary2 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 2){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary3 = $tmpCSalary3 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 3){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary4 = $tmpCSalary4 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 4){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary5 = $tmpCSalary5 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 5){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary6 = $tmpCSalary6 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 6){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary7 = $tmpCSalary7 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 7){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary8 = $tmpCSalary8 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 8){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary9 = $tmpCSalary9 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>
                	<td align="center"><?php if ($row_GetCoachSalary['Contract'] > 9){ echo "$".number_format($row_GetCoachSalary['Salary'],0); $tmpCSalary10 = $tmpCSalary10 + $row_GetCoachSalary['Salary']; } else { echo "-"; } ?></td>                
                </tr>
                <?php 
					}
				} while ($row_GetCoachSalary = mysql_fetch_assoc($GetCoachSalary)); 
				?>
                </tbody>
                <tfoot> 
                <tr>
                	<td colspan="2" align="right"><?php echo $l_CoachTotal; ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary1,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary2,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary3,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary4,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary5,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary6,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary7,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary8,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary9,0); ?></td>
                	<td align="center"><?php echo "$".number_format($tmpCSalary10,0); ?></td>
                </tr>
              	</tfoot>
                </table>
                  
            </div>
            
            <div id="tabs-4">
            <?php echo "<h3>".$l_Attendance."</h3>";?>
            
            <strong style="text-transform:uppercase;">PRO <?php echo $l_Attendance;?> - <?php echo $row_GetHomeGP["HomeGamesPlayed"];?> Games</strong>
            
           	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <thead>
            <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                <th><?php echo $l_ArenaCapacity;;?></th>
                <th><?php echo $l_Attendance;?></th>
                <th><?php echo $l_Attendance;?> Per Game</th>
                <th>PCT</th>
                <th><?php echo $l_TicketPrice;?></th>
                <th><?php echo $l_Total;?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="center"><?php echo $l_Level;?> 1: <?php echo $row_GetTeamFinance['ArenaCapacity1']; ?></td>
                <td align="center"><?php echo number_format($row_GetTeamFinance['Attendance1'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance1'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($row_GetTeamFinance['Attendance1'] / $row_GetHomeGP["HomeGamesPlayed"]),0);} else { echo 0; }  ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance1'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['Attendance1'] / $row_GetHomeGP["HomeGamesPlayed"]) / $row_GetTeamFinance['ArenaCapacity1']) * 100,0); } else { echo 0; } ?>%</td>
                <td align="center">$<?php echo $row_GetTeamFinance['TicketPrice1']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetTeamFinance['TicketPrice1'] * $row_GetTeamFinance['Attendance1']);
					echo "$".number_format($row_GetTeamFinance['TicketPrice1'] * $row_GetTeamFinance['Attendance1'],"0");
                ?>
                </td>
        	</tr>
            <tr>
                <td align="center"><?php echo $l_Level;?> 2: <?php echo $row_GetTeamFinance['ArenaCapacity2']; ?></td>
                <td align="center"><?php echo number_format($row_GetTeamFinance['Attendance2'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance2'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($row_GetTeamFinance['Attendance2'] / $row_GetHomeGP["HomeGamesPlayed"]),0); } else { echo 0; }?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance2'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['Attendance2'] / $row_GetHomeGP["HomeGamesPlayed"]) / $row_GetTeamFinance['ArenaCapacity2']) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">$<?php echo $row_GetTeamFinance['TicketPrice2']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetTeamFinance['TicketPrice2'] * $row_GetTeamFinance['Attendance2']);
					echo "$".number_format($row_GetTeamFinance['TicketPrice2'] * $row_GetTeamFinance['Attendance2'],"0");
                ?>
                </td>
        	</tr>            
            <tr>
                <td align="center"><?php echo $l_Level;?> 3: <?php echo $row_GetTeamFinance['ArenaCapacity3']; ?></td>
                <td align="center"><?php echo number_format($row_GetTeamFinance['Attendance3'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance3'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($row_GetTeamFinance['Attendance3'] / $row_GetHomeGP["HomeGamesPlayed"]),0);} else { echo 0; } ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance3'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['Attendance3'] / $row_GetHomeGP["HomeGamesPlayed"]) / $row_GetTeamFinance['ArenaCapacity3']) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">$<?php echo $row_GetTeamFinance['TicketPrice3']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetTeamFinance['TicketPrice3'] * $row_GetTeamFinance['Attendance3']);
					echo "$".number_format($row_GetTeamFinance['TicketPrice3'] * $row_GetTeamFinance['Attendance3'],"0");
                ?>
                </td>
        	</tr>
            <tr>
                <td align="center"><?php echo $l_Level;?> 4: <?php echo $row_GetTeamFinance['ArenaCapacity4']; ?></td>
                <td align="center"><?php echo number_format($row_GetTeamFinance['Attendance4'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance4'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($row_GetTeamFinance['Attendance4'] / $row_GetHomeGP["HomeGamesPlayed"]),0);} else { echo 0; }?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance4'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['Attendance4'] / $row_GetHomeGP["HomeGamesPlayed"]) / $row_GetTeamFinance['ArenaCapacity4']) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">$<?php echo $row_GetTeamFinance['TicketPrice4']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetTeamFinance['TicketPrice4'] * $row_GetTeamFinance['Attendance4']);
					echo "$".number_format($row_GetTeamFinance['TicketPrice4'] * $row_GetTeamFinance['Attendance4'],"0");
                ?>
                </td>
        	</tr>
            <tr>
                <td align="center"><?php echo $l_Level;?> 5: <?php echo $row_GetTeamFinance['ArenaCapacity5']; ?></td>
                <td align="center"><?php echo number_format($row_GetTeamFinance['Attendance5'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance5'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($row_GetTeamFinance['Attendance5'] / $row_GetHomeGP["HomeGamesPlayed"]),0);} else { echo 0; } ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['Attendance5'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['Attendance5'] / $row_GetHomeGP["HomeGamesPlayed"]) / $row_GetTeamFinance['ArenaCapacity5']) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">$<?php echo $row_GetTeamFinance['TicketPrice5']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetTeamFinance['TicketPrice5'] * $row_GetTeamFinance['Attendance5']);
					echo "$".number_format($row_GetTeamFinance['TicketPrice5'] * $row_GetTeamFinance['Attendance5'],"0");
                ?>
                </td>
        	</tr>
            </tbody>
            <tfoot>
            <?php $tmpTotalCap = $row_GetTeamFinance['ArenaCapacity1'] + $row_GetTeamFinance['ArenaCapacity2'] + $row_GetTeamFinance['ArenaCapacity3'] + $row_GetTeamFinance['ArenaCapacity4'] + $row_GetTeamFinance['ArenaCapacity5']; ?>
            <tr>
                <td align="right"><?php echo $l_TotalAttendance;?>:</td>
                <td align="center"><?php echo number_format ($row_GetTeamFinance['TotalAttendance'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetTeamFinance['TotalAttendance'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format($row_GetTeamFinance['TotalAttendance'] / $row_GetHomeGP["HomeGamesPlayed"],0); } else { echo 0; }?></td>
                <td align="center"><?php if($row_GetTeamFinance['TotalAttendance'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format((($row_GetTeamFinance['TotalAttendance'] / $row_GetHomeGP["HomeGamesPlayed"]) / $tmpTotalCap) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">-</td>
                <td align="center">$<?php echo number_format($row_GetTeamFinance['TotalIncome'],"0"); ?></td>
        	</tr>
            </tfoot>
            </table>
            
            
            <?php if($row_GetFarmTeamFinance['ArenaCapacity1'] > 0){ ?>
            <br />
            <strong style="text-transform:uppercase;">FARM <?php echo $l_Attendance;?> - <?php echo $row_GetFarmHomeGP["HomeGamesPlayed"];?> Games</strong>
            
           	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <thead>
            <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                <th><?php echo $l_ArenaCapacity;;?></th>
                <th><?php echo $l_Attendance;?></th>
                <th><?php echo $l_Attendance;?> Per Game</th>
                <th>PCT</th>
                <th><?php echo $l_TicketPrice;?></th>
                <th><?php echo $l_Total;?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="center"><?php echo $l_Level;?> 1: <?php echo $row_GetFarmTeamFinance['ArenaCapacity1']; ?></td>
                <td align="center"><?php echo number_format($row_GetFarmTeamFinance['Attendance1'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetFarmTeamFinance['Attendance1'] > 0){ echo number_format(($row_GetFarmTeamFinance['Attendance1'] / $row_GetFarmHomeGP["HomeGamesPlayed"]),0);} else { echo 0; }  ?>&nbsp;</td>
                <td align="center"><?php if($row_GetFarmTeamFinance['Attendance1'] > 0){ echo number_format((($row_GetFarmTeamFinance['Attendance1'] / $row_GetFarmHomeGP["HomeGamesPlayed"]) / $row_GetFarmTeamFinance['ArenaCapacity1']) * 100,0); } else { echo 0; } ?>%</td>
                <td align="center">$<?php echo $row_GetFarmTeamFinance['TicketPrice1']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetFarmTeamFinance['TicketPrice1'] * $row_GetFarmTeamFinance['Attendance1']);
					echo "$".number_format($row_GetFarmTeamFinance['TicketPrice1'] * $row_GetFarmTeamFinance['Attendance1'],"0");
                ?>
                </td>
        	</tr>
            <tr>
                <td align="center"><?php echo $l_Level;?> 2: <?php echo $row_GetFarmTeamFinance['ArenaCapacity2']; ?></td>
                <td align="center"><?php echo number_format($row_GetFarmTeamFinance['Attendance2'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetFarmTeamFinance['Attendance2'] > 0){ echo number_format(($row_GetFarmTeamFinance['Attendance2'] / $row_GetFarmHomeGP["HomeGamesPlayed"]),0); } else { echo 0; }?>&nbsp;</td>
                <td align="center"><?php if($row_GetFarmTeamFinance['Attendance2'] > 0){ echo number_format((($row_GetFarmTeamFinance['Attendance2'] / $row_GetFarmHomeGP["HomeGamesPlayed"]) / $row_GetFarmTeamFinance['ArenaCapacity2']) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">$<?php echo $row_GetFarmTeamFinance['TicketPrice2']; ?>&nbsp;</td>
                <td align="center">
				<?php 
					$tmpPect =  0;
					$tmpIncome = 0;
					$tmpIncome = $tmpIncome + ($row_GetFarmTeamFinance['TicketPrice2'] * $row_GetFarmTeamFinance['Attendance2']);
					echo "$".number_format($row_GetFarmTeamFinance['TicketPrice2'] * $row_GetFarmTeamFinance['Attendance2'],"0");
                ?>
                </td>
        	</tr>            
            </tbody>
            <tfoot>
            <?php $tmpTotalCap = $row_GetFarmTeamFinance['ArenaCapacity1'] + $row_GetFarmTeamFinance['ArenaCapacity2']; ?>
            <tr>
                <td align="right"><?php echo $l_TotalAttendance;?>:</td>
                <td align="center"><?php echo number_format ($row_GetFarmTeamFinance['TotalAttendance'],0); ?>&nbsp;</td>
                <td align="center"><?php if($row_GetFarmTeamFinance['TotalAttendance'] > 0){ echo number_format($row_GetFarmTeamFinance['TotalAttendance'] / $row_GetFarmHomeGP["HomeGamesPlayed"],0); } else { echo 0; }?></td>
                <td align="center"><?php if($row_GetFarmTeamFinance['TotalAttendance'] > 0){ echo number_format((($row_GetFarmTeamFinance['TotalAttendance'] / $row_GetFarmHomeGP["HomeGamesPlayed"]) / $tmpTotalCap) * 100,0); } else { echo 0; }?>%</td>
                <td align="center">-</td>
                <td align="center">$<?php echo number_format($row_GetFarmTeamFinance['TotalIncome'],"0"); ?></td>
        	</tr>
            </tfoot>
            </table>
            <?php } ?>
            </div>
            
            
            <div id="tabs-5">
            <?php echo "<h3>".$l_BalanceSheet."</h3>";?>
            <?php $totalCapacity = $row_GetTeamFinance['ArenaCapacity1'] + $row_GetTeamFinance['ArenaCapacity2'] + $row_GetTeamFinance['ArenaCapacity3'] + $row_GetTeamFinance['ArenaCapacity4'] + $row_GetTeamFinance['ArenaCapacity5'];?>
            <Table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td width="49%">
					
                    <strong style="text-transform:uppercase;"><?php echo $l_Income;?></strong>                
                    <table width="100%" cellspacing="0" border="0" class="tablesorterRates" >
                    <tbody>
                    <tr>
                        <td><?php echo $l_HomeGamesLeft;?></td>
                        <td align="right"><?php $tmpHomeGamesLeft = ($row_GetTeamFinance['ScheduleGameInAYear'] / 2) - $row_GetTeamFinance['HomeGP']; echo number_format($tmpHomeGamesLeft,0); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $l_AverageAttendance;?></td>
                        <td align="right"><?php if($row_GetTeamFinance['TotalAttendance'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format($row_GetTeamFinance['TotalAttendance']/$row_GetHomeGP["HomeGamesPlayed"],0); ?> (<?php echo number_format(($row_GetTeamFinance['TotalAttendance'] / ($totalCapacity * $row_GetHomeGP["HomeGamesPlayed"])) * 100,0); } else { echo "0"; }?>%)</td>
                    </tr>
                    <tr>
                        <td><?php echo $l_AverageIncome;?></td>
                        <td align="right">$<?php  if($row_GetTeamFinance['TotalIncome'] > 0 && $row_GetHomeGP["HomeGamesPlayed"] > 0){ $tmpAvgIncome = $row_GetTeamFinance['TotalIncome']; echo number_format($tmpAvgIncome/$row_GetHomeGP["HomeGamesPlayed"],"0"); } else { $tmpAvgIncome = 0; echo "0"; } ?></td>
                    </tr>
                    <tr>
                        <td><em><?php echo $l_EstimatedRevenue;?></em></td>
                        <td align="right">$
						<?php 
							if($row_GetFarmTeamFinance['TotalIncome'] > 0){
								$tmpIncome = $row_GetFarmTeamFinance['TotalIncome'] + $row_GetTeamFinance['TotalIncome'];
							} else {
								$tmpIncome = $row_GetTeamFinance['TotalIncome'];
							}
							echo number_format($tmpIncome,"0"); 
						?></td>
                    </tr>
                    <tr>
                        <td><em><?php echo $l_EstimatedRevenueRemaining;?></em></td>
                        <td align="right">$<?php if($row_GetHomeGP["HomeGamesPlayed"] > 0){ echo number_format(($tmpAvgIncome/$row_GetHomeGP["HomeGamesPlayed"]) * $tmpHomeGamesLeft,"0"); } else { echo 0;} ?></td>
                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="right"><em><?php echo $l_YearEstimatedRevenue;?></em></td>
                            <td align="right"><em>$<?php if($row_GetHomeGP["HomeGamesPlayed"] > 0){  $tmpEstimatedIncome = ($tmpHomeGamesLeft * ($tmpAvgIncome/$row_GetHomeGP["HomeGamesPlayed"])) + $row_GetTeamFinance['TotalIncome'];} else { $tmpEstimatedIncome = 0;} echo number_format($tmpEstimatedIncome ,"0"); ?></em></td>
                        </tr>
                    </tfoot>
                    </table>
                
            	</td>    
                <td width="2">&nbsp;</td>
                <td width="49%">
                        
                    <strong style="text-transform:uppercase;"><?php echo $l_Expense;?></strong>                
                    <table width="100%" cellspacing="0" border="0" class="tablesorterRates" >
                    <tbody>
                    <tr>
                        <td><?php echo $l_DaysRemaining;?></td>
                        <td align="right"><?php echo $daysRemaining; ?></td>
                    </tr>   
                    <tr>
                        <td><?php echo $l_ProExDay;?></td>
                        <td align="right">$<?php echo number_format($row_GetTeamFinance['ExpensePerDay'],0); ?></td>
                    </tr>             
                    <tr>
                        <td><?php echo $l_ProExYear;?></td>
                        <td align="right">$<?php echo number_format($row_GetTeamFinance['ExpensePerDay'] * $daysRemaining,0);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $l_FarmExDay;?></td>
                        <td align="right">$<?php echo number_format($row_GetFarmTeamFinance['ExpensePerDay'],0); ?></td>
                    </tr>    
                    <tr>
                        <td><?php echo $l_FarmExYear;?></td>
                        <td align="right">$<?php echo number_format($row_GetFarmTeamFinance['ExpensePerDay'] * $daysRemaining,0);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $l_ProPayRoll;?></td>
                        <td align="right">$<?php echo  number_format($row_GetTeamFinance['TotalPlayersSalaries'],"0"); $Salarys = $row_GetTeamFinance['TotalPlayersSalaries']; ?></td>
                    </tr>
                    <?php if($FarmSalaryInclude == 'True'){ ?>
                    <tr>
                        <td class="leftAlignedColumn"><?php echo $l_FarmPayRoll;?></td>
                        <td align="right">$<?php echo  number_format($tmpFSalary1 * $FarmSalaryPercentage,"0"); $Salarys = $Salarys + ($tmpFSalary1 * $FarmSalaryPercentage); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if($CoachSalaryInclude == 'True'){ ?>
                    <tr>
                        <td><?php echo $l_CoachPayroll;?></td>
                        <td align="right">$<?php echo  number_format($tmpCSalary1,"0"); $Salarys = $Salarys + $tmpCSalary1; ?></td>
                    </tr>
                    <?php } ?>
					<?php if($row_GetTeamFinance['LuxuryTaxeTotal'] > 0){ ?>
                    <tr>
                        <td><?php echo $l_LuxuryTaxeTotal;?></td>
                        <td align="right">$<?php echo  number_format($row_GetTeamFinance['LuxuryTaxeTotal'],"0"); $Salarys = $Salarys + $row_GetTeamFinance['LuxuryTaxeTotal']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    	<tr>
                            <td align="right"><em><?php echo $l_EstimatedSeasonExpenses;?></em></td>
                            <?php $EstSeasonExp = $Salarys + ($row_GetFarmTeamFinance['ExpensePerDay'] * $daysRemaining) + ($row_GetTeamFinance['ExpensePerDay'] * $daysRemaining); ?>
                            <td align="right"><em>$<?php echo  number_format($EstSeasonExp,"0"); ?></em></td>
                        </tr>
                    </tfoot>
                    </table>
                    
                </td>
            </tr>
            <tr>
            	<td>
                <br />
                <strong style="text-transform:uppercase;"><?php echo $l_BankAccount;?></strong>                
                    
                <table width="100%" cellspacing="0" border="0" class="tablesorterRates" >
                <tbody>
                <tr>
                    <td><?php echo $l_CurrentFunds;?></td>
                    <td align="right">$<?php echo number_format($row_GetTeamFinance['Finance'],"0"); ?></td>
                </tr>
                <tr>
                    <td><?php echo $l_ProjectedRevenue;?> +</td>
                    <td align="right">$<?php echo number_format($tmpEstimatedIncome,"0"); ?></td>
                </tr>
                <tr>
                    <td><?php echo $l_ProjectedExpenses ;?> -</td>
                    <td align="right">$<?php echo number_format($EstSeasonExp,"0"); 
					?></td>
                </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><?php echo $l_ProjectedBankAccount;?></td>
                        <td align="right">$<?php echo number_format(($row_GetTeamFinance['Finance'] + $tmpEstimatedIncome - $EstSeasonExp),"0"); ?></td>
                    </tr>
                </tfoot>
                </table>
                    
                    
                </td>
                <td width="2">&nbsp;</td>
                
                <td>
                <br />
                <strong style="text-transform:uppercase;"><?php echo $l_SalaryCap;?></strong>         
                       
                <table width="100%" cellspacing="0" border="0" class="tablesorterRates" >
                <tbody>
                <tr>
                    <td><?php echo $l_SalaryCap;?></td>
                    <td align="right">$<?php echo number_format($SalaryCap,"0"); ?></td>
                </tr>
                <tr>
                    <td><?php echo $l_TotalPayroll;?></td>
                    <td align="right">$<?php 
                    $TotalPayroll = $row_GetTeamFinance['TotalPlayersSalaries'];
                    echo  number_format($TotalPayroll,"0"); ?></td>
                </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><?php echo $l_RemainingCapSpace;?></td>
                        <td align="right">$<?php 
							$RemainingCap = $SalaryCap - $TotalPayroll;
							echo number_format($RemainingCap,"0");
							?></td>
                    </tr>
                </tfoot>
                </table>
                
                </td>
            </tr>
            </Table>
            </div>
		</div>
        
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetInfo);
mysql_free_result($GetSalarys);
mysql_free_result($GetFarmSalarys);
mysql_free_result($GetTeamFinance);
mysql_free_result($GetCoachSalary);
?>