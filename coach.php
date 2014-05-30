<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	// Create the position references array
	$l_EditPlayer = "EDIT COACH";
	$l_CurrentStats = "Active Season Stats";
	$l_ProCareerStats = "Pro League Career Stats";
	$l_FarmCareerStats = "Farm League Career Stats";
	$l_Awards = "Awards ";
	$l_career = "Career";
	$l_days = "Day(s)";
	$l_games = "Game(s)";
	$l_t_years = "Year(s)";
	$l_Playoffs = "Playoffs";
	$l_RegularSeason = "Regular Season";
	$l_PlayerRatings = "Player Ratings";
	$l_PlayerNotes = "Player Notes";
	$l_year = "YEAR";
	$l_NoNotes = "No notes available.";
	$l_InjuredDesc = "Days remaining on injured reserve:";
	$l_OutsideLinks = "Profile Links:";
	$l_Transactions = "Transactions";
	$l_Total = "Total";
	$l_OneWay = "One Way Contract (PRO)";
	$l_OfferContract = "OFFER A CONTRACT EXTENSION";
	$l_TwoWay = "Two Way Contract (Pro & Farm)";
	$l_ContractLength = "CONTRACT LENGTH";
	$l_ContractType = "CONTRACT TYPE";
	$l_NoTradeClause = "NO TRADE CLAUSE";
	$l_AvailableTrade = "AVAILABLE FOR A TRADE";
	$l_ContractExt = "CONTRACT EXTENSION";
	$l_SalaryBySeason = "Salary Hit by Season";
	$l_Links = "LINKS";
	$l_ContractDetails = "Contract Details";
	$l_ProTotals = "PRO TOTALS";
	$l_FarmTotals = "FARM TOTALS";
	$l_TransactionHistory = "TRANSACTIONS HISTORY";
	$l_CareerPlayoff = "CAREER PLAYOFF SEASON STATISTICS";
	$l_CareerRegular = "CAREER REGULAR SEASON STATISTICS";
	$l_Extended = "EXTENDED SUMMARY";
	$l_Shootouts = "Shootouts";
	$l_Notes = "Notes";
	$l_Transactions = "Transactions";
	$l_TimeOnIce = "Time On Ice";
	$l_HitsFights = "Hits & Fights";
	$l_SpecialTeams = "Special Teams";
	$l_ExtSummary = "Ext. Summary";
	$l_Summary = "Summary";
	$l_StarPower = "Star Power";
	$l_AvgCap = "Average Cap Hit"; 
	$l_AvgCapHit = "Avg. Cap Hit";
	$l_Roster = "Team Roster";
	$l_Over = "over";
	$l_AssistantCaptain = "Assistant Captain";
	$l_Captain = "Captain";
	$l_Number = "Number";
	$l_Leader = "Leader";
	break; 

case 'fr': 
	$l_CurrentStats = "Stats Saison Actuelle";
	$l_ProCareerStats = "Stats Pro en Carri&egrave;re";
	$l_FarmCareerStats = "Stats Farm en Carri&egrave;re";
	$l_Awards = "Troph&eacute;es";
	$l_career = "Carri&egrave;re";
	$l_days = "jour(s)";
	$l_games = "Game(s)";
	$l_t_years = "ann&eacute;e(s)";
	$l_Playoffs = "S&eacute;ries &eacute;liminatoires";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_PlayerRatings = "Cotes du joueur";
	$l_PlayerNotes = "Notes sur le joueur";
	$l_year = "ANN&Eacute;E";
	$l_NoNotes = "Pas de notes disponibles";
	$l_InjuredDesc = "Jour(s) restant(s) sur la liste des bless&eacute;:";
	$l_OutsideLinks = "Liens :";
	$l_Transactions = "Transactions";
	$l_Total = "Total";
	$l_OneWay = "Contrat a sens unique (PRO)";
	$l_OfferContract = "Offer la extension de contrat";
	$l_TwoWay = "Contrat a double sens (Pro et Mineur)";
	$l_ContractLength = "Dur&eacute;e du Contrat";
	$l_ContractType = "Type de Contrat";
	$l_NoTradeClause = "Clause de non echange";
	$l_AvailableTrade = "Disponible a un echange";
	$l_ContractExt = "Extension de contrat";
	$l_SalaryBySeason = "Salaire par Saison";
	$l_Links = "Liens";
	$l_ContractDetails = "Detail du Contrat";
	$l_ProTotals = "TOTAL PRO";
	$l_FarmTotals = "TOTAL MINEUR";
	$l_TransactionHistory = "HISTORIQUE DE TRANSACTIONS";
	$l_CareerPlayoff = "Statistiques cariere pour s&eacute;rie &eacute;liminatoire";
	$l_CareerRegular = "Statistiques cariere pour saison r&eacute;guliere";
	$l_Extended = "Sommaire exhaustif";
	$l_Shootouts = "Shootouts";
	$l_Notes = "Notes";
	$l_Transactions = "Transactions";
	$l_TimeOnIce = "Temp de glace";
	$l_HitsFights = "Mise en &eacute;cheque & Bagarre";
	$l_SpecialTeams = "Unit&eacute; sp&eacute;ciale";
	$l_ExtSummary = "Sommaire Ex.";
	$l_Summary = "Sommaire";
	$l_StarPower = "Impact de Vedette";
	$l_AvgCap = "Moyenne des Couts de la Masse Salariale"; 
	$l_EditPlayer = "Modifier Entra&icirc;neur";
	$l_AvgCapHit = "Moy. Des Couts de la Masse Salariale";
	$l_Roster = "Alignement";
	$l_Over = "au dessus";
	$l_AssistantCaptain = "Assistant Capitaine";
	$l_Captain = "Capitaine";
	$l_Number = "Num&eacute;ro";
	$l_Leader = "Leader";
	break;
} 

$PID_GetCoach = 0;
if (isset($_GET['coach'])) {
  $PID_GetCoach = (get_magic_quotes_gpc()) ? $_GET['coach'] : addslashes($_GET['coach']);
}


$query_GetCoach = sprintf("SELECT coaches.*, proteam.Name As Team FROM coaches LEFT JOIN proteam ON coaches.Team = proteam.Name WHERE coaches.Number=%s", $PID_GetCoach);
$GetCoach = mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach = mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach = mysql_num_rows($GetCoach);

$query_GetStats= sprintf("SELECT * FROM coachestats as C, seasons as S WHERE S.S_ID = C.Season_ID AND C.Number=%s AND S.SeasonType=1 ORDER BY S.Season Asc", $PID_GetCoach);
$GetStats= mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats= mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetPlayoffStats= sprintf("SELECT * FROM coachestats as C, seasons as S WHERE S.S_ID = C.Season_ID AND C.Number=%s AND S.SeasonType=0 ORDER BY S.Season Asc", $PID_GetCoach);
$GetPlayoffStats= mysql_query($query_GetPlayoffStats, $connection) or die(mysql_error());
$row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats);
$totalRows_GetPlayoffStats = mysql_num_rows($GetPlayoffStats);

$query_GetTrophyCoachOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, coaches as p WHERE t.CoachOfTheYear=%s AND t.Season_ID=s.Season AND p.Number=t.CoachOfTheYear AND t.Team=0 GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetCoach);
$GetTrophyCoachOfTheYear = mysql_query($query_GetTrophyCoachOfTheYear, $connection) or die(mysql_error());
$row_GetTrophyCoachOfTheYear = mysql_fetch_assoc($GetTrophyCoachOfTheYear);
$totalRows_GetTrophyCoachOfTheYear = mysql_num_rows($GetTrophyCoachOfTheYear);

$query_GetFarmTrophyCoachOfTheYear = sprintf("SELECT s.Season, p.Team FROM trophywinners as t, seasons as s, coaches as p WHERE t.FarmCoachOfTheYear=%s AND t.Season_ID=s.Season AND p.Number=t.FarmCoachOfTheYear AND t.Team=0 GROUP BY s.Season ORDER BY s.Season desc ",$PID_GetCoach);
$GetFarmTrophyCoachOfTheYear = mysql_query($query_GetFarmTrophyCoachOfTheYear, $connection) or die(mysql_error());
$row_GetFarmTrophyCoachOfTheYear = mysql_fetch_assoc($GetFarmTrophyCoachOfTheYear);
$totalRows_GetFarmTrophyCoachOfTheYear = mysql_num_rows($GetFarmTrophyCoachOfTheYear);

$PID_GetCoach=addslashes($row_GetCoach['Name']);

$query_GetTeamInfo = sprintf("SELECT p.Number,  p.Name,  p.Abbre,  p.City,  p.LogoLarge,  p.LogoSmall,  p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Name='%s' ", $row_GetCoach['Team']);
$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);

$query_GetNotes = "SELECT Value FROM transactionhistory WHERE Value like '%".$PID_GetCoach."%' ORDER BY Season_ID DESC, DateCreated desc";
$GetNotes = mysql_query($query_GetNotes, $connection) or die(mysql_error());
$row_GetNotes = mysql_fetch_assoc($GetNotes);
$totalRows_GetNotes = mysql_num_rows($GetNotes);

$query_GetContractExt = sprintf("SELECT * FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension' AND PlayerType='coach'", $row_GetCoach['Number']);
$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
$totalRows_GetContractExt = mysql_num_rows($GetContractExt);

$query_GetTrophyNames = sprintf("SELECT * FROM trophies ");
$GetTrophyNames = mysql_query($query_GetTrophyNames, $connection) or die(mysql_error());
$row_GetTrophyNames = mysql_fetch_assoc($GetTrophyNames);
$totalRows_GetTrophyNames = mysql_num_rows($GetTrophyNames);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $row_GetCoach['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
  $("#TeamPhoto").reflect({height:30,opacity:0.3});
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
    <table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
        <tr>
        	<td id="PlayerProfile" style="background-color:#<?php echo $row_GetTeamInfo['PrimaryColor']; ?>; padding:6px; width:35%;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td width="110" rowspan="2" style="vertical-align:top; width:110px;"><img src="<?php echo imageExists("/image/coaches/".$row_GetCoach['Photo']); ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
                    <td rowspan="2" valign="top" height="150" style="vertical-align:middle;">
                        <div align="center"><img src="<?php echo $_SESSION['DomainName']; ?>/image/logos/huge/<?php echo $row_GetTeamInfo['LogoLarge']; ?>"id="TeamPhoto" /></div>
                    </td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px; width:65%; vertical-align:top;">
                    
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
                    <tr>
                    	<td colspan="2" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $row_GetCoach['Name']; ?></strong></td>
						<td>
						<?php 
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
								echo '<a href="edit_coach.php?coach='.$row_GetCoach['Number'].'" class="button edit">'.$l_EditPlayer.'</a>';
								if ($totalRows_GetContractExt == 0) {
									if ($row_GetCoach['Contract']==1){
										echo '&nbsp;&nbsp;<a href="coach_contract_extension.php?team='.$_SESSION["current_Team_ID"].'&coach='.$row_GetCoach["Number"].'" style="padding-left:20px" class="button next">'.$l_OfferContract.'</a></li>';
									}
								}
							}
						}
						?>
                        </td>
                     </tr>
                     <tr>
                        <td valign="top"><?php echo $l_Age;?>: <strong><?php echo $row_GetCoach['Age'];?></strong></td> 
                        <td colspan="2"><?php echo $l_Country;?>: <strong><?php echo $row_GetCoach['Country']."</strong>"; ?>&nbsp;<img height="12" width="12" src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetCoach['Country']; ?>.png" border="0"/></strong></td>
                     </tr>
                     <tr>
                        <td colspan="3"><?php echo $l_Salary.": <strong>$".number_format($row_GetCoach['Salary'],0)." ".$l_Over." ".$row_GetCoach['Contract']." ".$l_t_years."</strong>";?></td>
                    </tr>
                     </table>
                     
                  </td>
          	</tr>
          </table>
          
         
          <br />
		<h3><?php echo $l_PlayerRatings;?></h3>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
			<th><?php echo $l_PH_D;?></th>	
			<th><?php echo $l_DF_D;?></th>	
			<th><?php echo $l_OF_D;?></th>	
			<th><?php echo $l_PD_D;?></th>	
			<th><?php echo $l_EX_D;?></th>	
			<th><?php echo $l_LD_D;?></th>
			<th><?php echo $l_PO_D;?></th>
		</tr>
        </thead>
		<tbody>
		  <tr>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['PH']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['DF']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['OF']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['PD']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['EX']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['LD']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetCoach['PO']; ?></td>
		</tr>
		</tbody>
		</table>
        <br />
        
        <div id="tabs">
            <div id="tabs-1">
                <?php
					echo "<h3>".$l_Summary."</h3>";
					$tmpTotGP=0;
					$tmpW=0;
                    $tmpL=0;
                    $tmpT=0;
                    $tmpOTW=0;
                    $tmpOTL=0;
                    $tmpSOW=0;
                    $tmpSOL=0;
                    $tmpGF=0;
                    $tmpGA=0;
                    $tmpPim=0;
                    $tmpHits=0;
					$tmpFarmGP=0;
					$tmpFarmW=0;
                    $tmpFarmL=0;
                    $tmpFarmT=0;
                    $tmpFarmOTW=0;
                    $tmpFarmOTL=0;
                    $tmpFarmSOW=0;
                    $tmpFarmSOL=0;
                    $tmpFarmGF=0;
                    $tmpFarmGA=0;
                    $tmpFarmPim=0;
                    $tmpFarmHits=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
                    <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
                    <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
                    <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
                    <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
                    <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { ?>
                <?php if ($row_GetStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo ($row_GetStats['Season'])."-".substr($row_GetStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGP']; $tmpFarmGP=$tmpFarmGP+$row_GetStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmW']; $tmpFarmW=$tmpFarmW+$row_GetStats['FarmW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmL']; $tmpFarmL=$tmpFarmL+$row_GetStats['FarmL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmT']; $tmpFarmT=$tmpFarmT+$row_GetStats['FarmT'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmOTW']; $tmpFarmOTW=$tmpFarmOTW+$row_GetStats['FarmOTW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmOTL']; $tmpFarmOTL=$tmpFarmOTL+$row_GetStats['FarmOTL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmSOW']; $tmpFarmSOW=$tmpFarmSOW+$row_GetStats['FarmSOW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmSOL']; $tmpFarmSOL=$tmpFarmSOL+$row_GetStats['FarmSOL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGF']; $tmpFarmGF=$tmpFarmGF+$row_GetStats['FarmGF'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmGA']; $tmpFarmGA=$tmpFarmGA+$row_GetStats['FarmGA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmPim']; $tmpFarmPim=$tmpFarmPim+$row_GetStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetStats['FarmHits']; $tmpFarmHits=$tmpFarmHits+$row_GetStats['FarmHits'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetStats['ProGP'] > 0){ ?>
                <tr>
                    <td align="center"><?php echo ($row_GetStats['Season'])."-".substr($row_GetStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProW']; $tmpW=$tmpW+$row_GetStats['ProW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProL']; $tmpL=$tmpL+$row_GetStats['ProL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProT']; $tmpT=$tmpT+$row_GetStats['ProT'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProOTW']; $tmpOTW=$tmpOTW+$row_GetStats['ProOTW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProOTL']; $tmpOTL=$tmpOTL+$row_GetStats['ProOTL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProSOW']; $tmpSOW=$tmpSOW+$row_GetStats['ProSOW'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProSOL']; $tmpSOL=$tmpSOL+$row_GetStats['ProSOL'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGF']; $tmpGF=$tmpGF+$row_GetStats['ProGF'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProGA']; $tmpGA=$tmpGA+$row_GetStats['ProGA'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProPim']; $tmpPim=$tmpPim+$row_GetStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetStats['ProHits']; $tmpHits=$tmpHits+$row_GetStats['ProHits'];?></td>
                </tr>
                <?php }} while ($row_GetStats= mysql_fetch_assoc($GetStats)); ?>	
                </tbody>
                <tfoot>
                <?php if ($tmpFarmGP > 0){?>                
                <tr>
                    <td align="right" ><em><?php echo $l_FarmTotals; ?></em></td>		
                    <td align="center" ><em><?php echo number_format($tmpFarmGP ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmT ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmOTW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmOTL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmSOW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmSOL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmGF ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmGA ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmPim ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmHits ,0); ?></em></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>		
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHits ,0); ?></td>
                </tr>
                 <?php } ?>
              	</tfoot>
                </table>
                
                <?php
					$tmpTotGP=0;
					$tmpW=0;
                    $tmpL=0;
                    $tmpT=0;
                    $tmpOTW=0;
                    $tmpOTL=0;
                    $tmpSOW=0;
                    $tmpSOL=0;
                    $tmpGF=0;
                    $tmpGA=0;
                    $tmpPim=0;
                    $tmpHits=0;
					$tmpFarmGP=0;
					$tmpFarmW=0;
                    $tmpFarmL=0;
                    $tmpFarmT=0;
                    $tmpFarmOTW=0;
                    $tmpFarmOTL=0;
                    $tmpFarmSOW=0;
                    $tmpFarmSOL=0;
                    $tmpFarmGF=0;
                    $tmpFarmGA=0;
                    $tmpFarmPim=0;
                    $tmpFarmHits=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Summary; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
                    <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
                    <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
                    <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
                    <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
                    <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { ?>
                <?php if ($row_GetPlayoffStats['FarmGP'] > 0){?>
                	<tr>
                        <td align="center" class="FarmStats"><?php echo ($row_GetPlayoffStats['Season'])."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>            
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGP']; $tmpFarmGP=$tmpFarmGP+$row_GetPlayoffStats['FarmGP'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmW']; $tmpFarmW=$tmpFarmW+$row_GetPlayoffStats['FarmW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmL']; $tmpFarmL=$tmpFarmL+$row_GetPlayoffStats['FarmL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmT']; $tmpFarmT=$tmpFarmT+$row_GetPlayoffStats['FarmT'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmOTW']; $tmpFarmOTW=$tmpFarmOTW+$row_GetPlayoffStats['FarmOTW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmOTL']; $tmpFarmOTL=$tmpFarmOTL+$row_GetPlayoffStats['FarmOTL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmSOW']; $tmpFarmSOW=$tmpFarmSOW+$row_GetPlayoffStats['FarmSOW'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmSOL']; $tmpFarmSOL=$tmpFarmSOL+$row_GetPlayoffStats['FarmSOL'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGF']; $tmpFarmGF=$tmpFarmGF+$row_GetPlayoffStats['FarmGF'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmGA']; $tmpFarmGA=$tmpFarmGA+$row_GetPlayoffStats['FarmGA'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmPim']; $tmpFarmPim=$tmpFarmPim+$row_GetPlayoffStats['FarmPim'];?></td>
                        <td align="center" class="FarmStats"><?php echo $row_GetPlayoffStats['FarmHits']; $tmpFarmHits=$tmpFarmHits+$row_GetPlayoffStats['FarmHits'];?></td>
                      </tr>
                <?php } ?>
                <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
                <tr>
                    <td align="center"><?php echo ($row_GetPlayoffStats['Season'])."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProW']; $tmpW=$tmpW+$row_GetPlayoffStats['ProW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProL']; $tmpL=$tmpL+$row_GetPlayoffStats['ProL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProT']; $tmpT=$tmpT+$row_GetPlayoffStats['ProT'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProOTW']; $tmpOTW=$tmpOTW+$row_GetPlayoffStats['ProOTW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProOTL']; $tmpOTL=$tmpOTL+$row_GetPlayoffStats['ProOTL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProSOW']; $tmpSOW=$tmpSOW+$row_GetPlayoffStats['ProSOW'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProSOL']; $tmpSOL=$tmpSOL+$row_GetPlayoffStats['ProSOL'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGF']; $tmpGF=$tmpGF+$row_GetPlayoffStats['ProGF'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProGA']; $tmpGA=$tmpGA+$row_GetPlayoffStats['ProGA'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProPim']; $tmpPim=$tmpPim+$row_GetPlayoffStats['ProPim'];?></td>
                    <td align="center"><?php echo $row_GetPlayoffStats['ProHits']; $tmpHits=$tmpHits+$row_GetPlayoffStats['ProHits'];?></td>
                </tr>
                <?php }} while ($row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats)); ?>	
                </tbody>
                <tfoot>
                <?php if ($tmpFarmGP > 0){?>                
                <tr>
                    <td align="right" ><em><?php echo $l_FarmTotals; ?></em></td>		
                    <td align="center" ><em><?php echo number_format($tmpFarmGP ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmT ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmOTW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmOTL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmSOW ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmSOL ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmGF ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmGA ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmPim ,0); ?></em></td>
                    <td align="center" ><em><?php echo number_format($tmpFarmHits ,0); ?></em></td>
                </tr>
                <?php } ?>
                <?php if ($tmpTotGP > 0) { ?>
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>		
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHits ,0); ?></td>
                </tr>
                 <?php } ?>
              	</tfoot>
                </table>
                
             </div>
             
             <div id="tabs-2">
            <h3>Contract</h3>
            <strong style="text-transform:uppercase;"><?php echo $l_SalaryBySeason; ?></strong>
                
             	<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th width="10%"><?php echo ($_SESSION['current_Season']-1)."-".substr($_SESSION['current_Season'], -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="10%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 1){ echo "$".number_format($row_GetCoach['Salary'],0);} else { echo "-"; } ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 2){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 3){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 4){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 5){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 6){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 7){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 8){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 9){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0)."</span>"; } else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Contract'] > 0 && $row_GetCoach['Contract'] == 10){ echo "$".number_format($row_GetCoach['Salary'],0);} else if ($row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0)."</span>"; } else { echo "-"; }  ?></td>
                  </tr>
                </tbody>
                </table>
                
                <strong style="text-transform:uppercase;"><?php echo $l_ContractDetails; ?></strong>
            	<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_ContractLength; ?></th>
                    <th><?php echo $l_ContractExt; ?></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center"><?php echo $row_GetCoach['Contract']." ".$l_t_years; ?></td>
                    <td align="center">
					<?php 
						if ($totalRows_GetContractExt > 0) {
							$tmpCapHit = 0;
							$tmpCapHitCount = 0;
							if ($row_GetContractExt['Salary1'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary1'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary2'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary2'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary3'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary3'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary4'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary4'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary5'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary5'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary6'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary6'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary7'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary7'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary8'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary8'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary9'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary9'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							if ($row_GetContractExt['Salary10'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetContractExt['Salary10'];
								$tmpCapHitCount = $tmpCapHitCount + 1;
							}
							echo $row_GetContractExt['Contract']." ".$l_t_years.", $".number_format($tmpCapHit / $tmpCapHitCount,0)." ".$l_AvgCapHit;
						} else { 
							if(isset($_SESSION['U_ID'])){
								if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
									if ($totalRows_GetContractExt == 0) {
										echo '<a href="coach_contract_extension.php?team='.$_SESSION["current_Team_ID"].'&coach='.$row_GetCoach["Number"].'"><strong>'.$l_OfferContract.'</strong></a></li>';
									}
									
								} else {
									echo $l_No; 
								}
							} else {
								echo $l_No; 
							}
						} 
					?>
                    </td>
                  </tr>
                </tbody>
                </table>
			</div>
            
            <div id="tabs-3">
            	<?php echo "<h3>".$l_Transactions."</h3>"; ?>
                <strong style="text-transform:uppercase;"><?php echo $l_TransactionHistory; ?></strong>
                <br /><br />
               	<ul>
				<?php 
                if ($totalRows_GetNotes > 0){
					do {
						echo "<li>".$row_GetNotes['Value']."</li>";
					} while ($row_GetNotes = mysql_fetch_assoc($GetNotes));
                } else {
					echo "<li><?php echo $l_None; ?></li>";
                } 
                ?>
                </ul>
			</div>
            
            <div id="tabs-4">
            	<h3><?php echo $l_Notes; ?></h3>
                
                <?php if ($row_GetCoach['Bio'] != ""){ echo $row_GetCoach['Bio'];}?>
                <br clear="all" />
                
                <?php
                if ($totalRows_GetTrophyCoachOfTheYear > 0 || $totalRows_GetFarmTrophyCoachOfTheYear > 0){

                echo '<strong style="text-transform:uppercase;">'.$l_Awards.'</strong>';
                echo '<br /><br /><ul style="list-style-type:disc; list-style-position:inside;">';

					if ($totalRows_GetTrophyCoachOfTheYear > 0 || $totalRows_GetFarmTrophyCoachOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=CoachOfTheYear'>".$row_GetTrophyNames['CoachOfTheYear']."</a> : ";
						$i = 1;
						do {
							echo $row_GetTrophyCoachOfTheYear['Season'];
							if($i < $totalRows_GetTrophyCoachOfTheYear){ echo ", "; }
						} while ($row_GetTrophyCoachOfTheYear = mysql_fetch_assoc($GetTrophyCoachOfTheYear));
						echo "</li>";
					}
					
					if ($totalRows_GetFarmTrophyCoachOfTheYear > 0){
						echo "<li style='padding-bottom:5px;'><a href='trophy.php?trophy=FarmCoachOfTheYear'>".$row_GetTrophyNames['FarmCoachOfTheYear']."</a> : ";
						$i = 1;
						do {
							echo $row_GetFarmTrophyCoachOfTheYear['Season'];
							if($i < $totalRows_GetFarmTrophyCoachOfTheYear){ echo ", "; }
						} while ($row_GetFarmTrophyCoachOfTheYear = mysql_fetch_assoc($GetFarmTrophyCoachOfTheYear));
						echo "</li>";
					}
					
				echo '</ul><br /><br />';	
				}
				?>
                
                <strong style="text-transform:uppercase;"><?php echo $l_Links; ?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
                <tbody>
                  <tr>
                    <td align="center"><a href="http://www.hockeydb.com/ihdb/stats/findplayer.php3?full_name=<?php echo $row_GetCoach['Name']; ?>" target="_blank">The Internet Hockey Database</a></td>
					<td align="center"><a href="#" onClick="document.tsn.submit()">TSN.ca</a></td>
					
                  </tr>
                 </tbody>
                 </table>
                    
                    <form method=post action='http://www.tsn.ca/nhl/teams/players/?name=<?php echo $row_GetCoach['Name']; ?>' name="tsn"  target='new'></form>
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
