<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
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
	$l_CareerPlayoff = "STATISTICS";
	$l_CareerRegular = "STATISTICS";
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
	$l_EditPlayer = "EDIT PLAYER";
	$l_AvgCapHit = "Avg. Cap Hit";
	$l_Roster = "Team Roster";
	$l_Over = "over";
	$l_AssistantCaptain = "Assistant Captain";
	$l_Captain = "Captain";
	$l_Number = "Number";
	$l_Leader = "Leader";
	$l_Change  = "CHANGE SEASON";
	$l_TradeTo = "Team";
	$l_TradedToNote = "* No longer a member of this team";
	$l_team_stats = "TEAM STATS";
	$l_ScoringSummary = "Scoring Summary";
	$l_GoalieSummary = "Goalie Summary";
	break; 

case 'fr': 
	$l_CurrentStats = "Stats Saison Actuelle";
	$l_ProCareerStats = "Stats Pro en Carri&egrave;re";
	$l_FarmCareerStats = "Stats Farm en Carri&egrave;re";
	$l_Awards = "Troph&eacute;es ";
	$l_career = "Carri&egrave;re";
	$l_days = "jour(s)";
	$l_games = "Match(s)";
	$l_t_years = "ann&eacute;e(s)";
	$l_Playoffs = "S&eacute;ries &eacute;liminatoires";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_PlayerRatings = "Cotes du joueur";
	$l_PlayerNotes = "Notes sur le joueur";
	$l_year = "ANN&eacute;E";
	$l_NoNotes = "Pas de notes disponibles";
	$l_InjuredDesc = "Jour(s) restant(s) sur la liste des bless&eacute;:";
	$l_OutsideLinks = "LIENS :";
	$l_Transactions = "Transactions";
	$l_Total = "Total";
	$l_OneWay = "Contrat a sens unique (PRO)";
	$l_OfferContract = "Offer la extension de contrat";
	$l_TwoWay = "Contrat a double sens (Pro et Mineur)";
	$l_ContractLength = "Dur&eacute;e du Contrat";
	$l_ContractType = "Type de Contrat";
	$l_NoTradeClause = "Clause de non echange";
	$l_AvailableTrade = "Disponible a un echange";
	$l_ContractExt = "Extension de contrat ";
	$l_SalaryBySeason = "Salaire par Saison";
	$l_Links = "Liens";
	$l_ContractDetails = "Detail du Contrat";
	$l_ProTotals = "TOTAL PRO";
	$l_FarmTotals = "TOTAL MINEUR";
	$l_TransactionHistory = "HISTORIQUE DE TRANSACTIONS";
	$l_CareerPlayoff = "STATISTICS";
	$l_CareerRegular = "STATISTICS";
	$l_Extended = "Sommaire exhaustif";
	$l_Shootouts = "Blanchissages";
	$l_Notes = "Notes";
	$l_Transactions = "Transactions";
	$l_TimeOnIce = "Temp de glace";
	$l_HitsFights = "Mise en &eacute;cheque & Bagarre";
	$l_SpecialTeams = "Unit&eacute; sp&eacute;ciale";
	$l_ExtSummary = "Sommaire Ex.";
	$l_Summary = "Sommaire";
	$l_StarPower = "Impact de Vedette";
	$l_AvgCap = "Moyenne des Couts de la Masse Salariale"; 
	$l_EditPlayer = "Modifier";
	$l_AvgCapHit = "Moy. Des Couts de la Masse Salariale";
	$l_Roster = "Alignement";
	$l_Over = "au dessus";
	$l_AssistantCaptain = "Assistant Capitaine";
	$l_Captain = "Capitaine";
	$l_Number = "Num&eacute;ro";
	$l_Leader = "Meneur";
	$l_Change  = "Changer de saison";
	$l_TradeTo = "&eacute;quipe";	
	$l_TradedToNote = "* No longer a member of this team";
	$l_team_stats = "STATS JOUEURS";
	$l_ScoringSummary = "Sommaire";
	$l_GoalieSummary = "Gardiens";
	break;
} 

$SID_GetSkaters = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
if (isset($_POST['season_id'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}

$SORT_GOALIE = "ProW";
if (isset($_GET['sort_goalie'])) {
  $SORT_GOALIE = (get_magic_quotes_gpc()) ? $_GET['sort_goalie'] : addslashes($_GET['sort_goalie']);
}

$TID_GetSkaters = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetSkaters = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}

mysql_query("set sql_big_selects=1");

$query_GetStats = sprintf("SELECT playerstats.*, players.Name, players.Number, players.Team, players.Team as ActiveTeam FROM playerstats, players WHERE playerstats.Team=%s AND playerstats.FarmGP > 0 AND playerstats.Season_ID=%s AND players.Name=playerstats.Name GROUP BY playerstats.Name ORDER BY FarmPoint desc", $TID_GetSkaters, $SID_GetSkaters);
$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats = mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetGoalieStats = sprintf("SELECT goaliestats.*, goalies.Name, goalies.Number, goalies.Team, goalies.Team as ActiveTeam  FROM goaliestats, goalies WHERE goaliestats.Team=%s AND goaliestats.FarmGP > 0 AND goaliestats.Season_ID=%s AND goalies.Name=goaliestats.Name GROUP BY goaliestats.Name ORDER BY FarmW desc", $TID_GetSkaters,$SID_GetSkaters);
$GetGoalieStats = mysql_query($query_GetGoalieStats, $connection) or die(mysql_error());
$row_GetGoalieStats = mysql_fetch_assoc($GetGoalieStats);
$totalRows_GetGoalieStats = mysql_num_rows($GetGoalieStats);

$query_GetSeasonsLink = sprintf("SELECT * FROM seasons");
$GetSeasonsLink = mysql_query($query_GetSeasonsLink, $connection) or die(mysql_error());
$row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink);



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Farm Statistics - <?php echo $_SESSION['SiteName'] ; ?></title>

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

#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_Farm_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;
}
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

	<form action="farm_stats.php" method="post" name="form1">
		
	<div style="float:left; padding-bottom:2px"><h1><?php echo $l_team_stats." : ".($_SESSION['current_Season']-1)."-".$_SESSION['current_Season']." ".$_SESSION['current_SeasonType']; ?></h1></div>

		<div style="float:right; padding-top:5px;">
        	<select name="season_id" id="season_id">
			<?php do { 
            if ($row_GetSeasonsLink['SeasonType'] == 2){
            $SeasonType = $l_preseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            $SeasonType = $l_regularseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            $SeasonType = $l_playoffs;
            } 
            ?>
            <option value="<?php echo $row_GetSeasonsLink['S_ID']; ?>" <?php if ($SID_GetSkaters == $row_GetSeasonsLink['S_ID']){ echo "selected"; } ?>>
			<?php 
			if ($row_GetSeasonsLink['SeasonType'] == 2){
            echo $row_GetSeasonsLink['Season']." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            echo $row_GetSeasonsLink['Season']."-".($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            echo ($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } 
			
			?></option>
            <?php } while ($row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink)); ?>
            </select><input type="submit" value="<?php echo $l_Change;?>"  class="button" />

        </form></div>
        
        <br clear="all" />
		<br />

  		<div id="tabs">
            <div id="tabs-1">
 			<?php
					echo "<h3>".$l_ScoringSummary."</h3>";
					$tmpTotGP=0;
					$tmpTotG=0;
					$tmpTotA=0;
					$tmpTotPoint=0;
					$tmpTotPlusMinus=0;
					$tmpTotPim=0;
					$tmpTotShots=0;
					$tmpTotPPG=0;
					$tmpTotPKG=0;
					$tmpTotGW=0;
					$tmpTotGT=0;
					$tmpTotShots=0;
		
					if ($totalRows_GetStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_ScoringSummary; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                    <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_PP_D;?>"><?php echo $l_PP;?></a></th>	
                    <th><a title="<?php echo $l_SH_D;?>"><?php echo $l_SH;?></a></th>				
                    <th><a title="<?php echo $l_GW_D;?>"><?php echo $l_GW;?></a></th>	
                    <th><a title="<?php echo $l_GT_D;?>"><?php echo $l_GT;?></a></th>	
                    <th><a title="<?php echo $l_SHT_D ;?>"><?php echo $l_SHT;?></a></th>	
                    <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmG']; $tmpTotG=$tmpTotG+$row_GetStats['FarmG'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmA']; $tmpTotA=$tmpTotA+$row_GetStats['FarmA'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPoint']; $tmpTotPoint=$tmpTotPoint+$row_GetStats['FarmPoint'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPlusMinus']; $tmpTotPlusMinus=$tmpTotPlusMinus+$row_GetStats['FarmPlusMinus'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPim']; $tmpTotPim=$tmpTotPim+$row_GetStats['FarmPim'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetStats['FarmPPG'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetStats['FarmPKG'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmGW']; $tmpTotGW=$tmpTotGW+$row_GetStats['FarmGW'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmGT']; $tmpTotGT=$tmpTotGT+$row_GetStats['FarmGT'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmShots']; $tmpTotShots=$tmpTotShots+$row_GetStats['FarmShots'];?></td>
                    <td align="center"><?php if ($row_GetStats['FarmShots'] > 0){ echo number_format(($row_GetStats['FarmG'] / $row_GetStats['FarmShots']) * 100,1); } else { echo 0;}?></td>
                  </tr>
                  <?php }} while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
                </tbody> 
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPoint ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPlusMinus ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPPG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPKG ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShots ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotShots > 0){ echo number_format(($tmpTotG / $tmpTotShots) * 100,1); } else { echo 0; }?></td>			
                </tr>
              	</tfoot>
                </table>
                <?php } ?>
     
        	</div>
            
           <div id="tabs-2">
                <?php   echo "<h3>".$l_ExtSummary."</h3>"; 
				$tmpTotGP=0;
				$tmpTotHits=0;
				$tmpTotPoint=0;
				$tmpTotHitsTook=0;
				$tmpTotShotsBlock=0;
				$tmpTotOwnShotsBlock=0;
				$tmpTotOwnShotsMissGoals=0;
				$tmpTotGiveAway=0;
				$tmpTotTakeAway=0;
				$tmpTotFaceOffWon=0;
				$tmpTotFaceOffTotal=0;
				$tmpTotHatTrick=0;
				
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Extended; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HatTrick_D;?>"><?php echo $l_HatTrick;?></a></th>
                    <th><a title="<?php echo $l_SB_D;?>"><?php echo $l_SB;?></a></th>
                    <th><a title="<?php echo $l_OSB_D;?>"><?php echo $l_OSB;?></a></th>
                    <th><a title="<?php echo $l_OMG_D;?>"><?php echo $l_OMG;?></a></th>
                    <th><a title="<?php echo $l_GIVEAWAY_D;?>"><?php echo $l_GIVEAWAY?></a></th>	
                    <th><a title="<?php echo $l_TAKEAWAY_D;?>"><?php echo $l_TAKEAWAY;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffWon_D;?>"><?php echo $l_FaceOffWon;?></a></th>	
                    <th><a title="<?php echo $l_FaceOffTotal_D;?>"><?php echo $l_FaceOffTotal;?></a></th>				
                    <th><a title="<?php echo $l_FaceOffPCT_D;?>"><?php echo $l_FaceOffPCT;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetStats = mysql_fetch_assoc($GetStats)) { ?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmHatTrick']; $tmpTotHatTrick=$tmpTotHatTrick+$row_GetStats['FarmHatTrick'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmShotsBlock']; $tmpTotShotsBlock=$tmpTotShotsBlock+$row_GetStats['FarmShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmOwnShotsBlock']; $tmpTotOwnShotsBlock=$tmpTotOwnShotsBlock+$row_GetStats['FarmOwnShotsBlock'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmOwnShotsMissGoals']; $tmpTotOwnShotsMissGoals=$tmpTotOwnShotsMissGoals+$row_GetStats['FarmOwnShotsMissGoals'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmGiveAway']; $tmpTotGiveAway=$tmpTotGiveAway+$row_GetStats['FarmGiveAway'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmTakeAway']; $tmpTotTakeAway=$tmpTotTakeAway+$row_GetStats['FarmTakeAway'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmFaceOffWon']; $tmpTotFaceOffWon=$tmpTotFaceOffWon+$row_GetStats['FarmFaceOffWon'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmFaceOffTotal']; $tmpTotFaceOffTotal=$tmpTotFaceOffTotal+$row_GetStats['FarmFaceOffTotal'];?></td>
                    <td align="center"><?php if ($row_GetStats['FarmFaceOffWon'] > 0){ echo number_format(($row_GetStats['FarmFaceOffWon'] / $row_GetStats['FarmFaceOffTotal']) * 100,1); } else { echo 0; }?></td>
                  </tr>
                  <?php }} ; ?>
                </tbody>                
                <tfoot>
                <tr>
                  	<td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHatTrick ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOwnShotsMissGoals ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGiveAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotTakeAway ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffWon ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFaceOffTotal ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotFaceOffWon > 0){ echo number_format(($tmpTotFaceOffWon / $tmpTotFaceOffTotal) * 100,1); } else { echo 0; }?></td>
                </tr>
              	</tfoot>
                </table>
                <?php } ?>
            </div>
            
            <div id="tabs-3">
            	<?php  echo "<h3>".$l_TimeOnIce."</h3>"; 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				$tmpTotPuckPossesionTime=0;
				$tmpCount = 0;
				 
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_TimeOnIce; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_ES_TOI_D;?>"><?php echo $l_ES_TOI;?></a></th>
                    <th><a title="<?php echo $l_ES_TOIG_D;?>"><?php echo $l_ES_TOIG;?></a></th>
                    <th><a title="<?php echo $l_SH_TOI_D;?>"><?php echo $l_SH_TOI;?></a></th>
                    <th><a title="<?php echo $l_SH_TOIG_D;?>"><?php echo $l_SH_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PP_TOI_D;?>"><?php echo $l_PP_TOI;?></a></th>
                    <th><a title="<?php echo $l_PP_TOIG_D;?>"><?php echo $l_PP_TOIG?></a></th>	
                    <th><a title="<?php echo $l_TOI_D;?>"><?php echo $l_TOI;?></a></th>	
                    <th><a title="<?php echo $l_TOIG_D;?>"><?php echo $l_TOIG;?></a></th>
                    <th><a title="<?php echo $l_PuckPossesionTime_D;?>"><?php echo $l_PuckPossesionTime;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetStats = mysql_fetch_assoc($GetStats)) { ?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                    <td align="center"><?php echo minutes($row_GetStats['FarmMinutePlay'] - $row_GetStats['FarmPKMinutePlay'] - $row_GetStats['FarmPPMinutePlay']); ?></td>
					<td align="center"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes(($row_GetStats['FarmMinutePlay'] - $row_GetStats['FarmPKMinutePlay'] - $row_GetStats['FarmPPMinutePlay'])/$row_GetStats['FarmGP']); } else { echo 0; }?></td>
					<td align="center"><?php echo minutes($row_GetStats['FarmPKMinutePlay']); $tmpTotPKMinutePlay=$tmpTotPKMinutePlay+$row_GetStats['FarmPKMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['FarmPKMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPKMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetStats['FarmPPMinutePlay']); $tmpTotPPMinutePlay=$tmpTotPPMinutePlay+$row_GetStats['FarmPPMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['FarmPPMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPPMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
                    <td align="center"><?php echo minutes($row_GetStats['FarmMinutePlay']); $tmpTotMinutePlay=$tmpTotMinutePlay+$row_GetStats['FarmMinutePlay'];?></td>
                    <td align="center"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes($row_GetStats['FarmMinutePlay'] / $row_GetStats['FarmGP']); } else { echo 0; }?></td>
                    <td align="center"><?php if ($row_GetStats['FarmMinutePlay'] > 0){ echo minutes($row_GetStats['FarmPuckPossesionTime'] / $tmpTotGP); } else { echo 0; } $tmpTotPuckPossesionTime=$tmpTotPuckPossesionTime+$row_GetStats['FarmPuckPossesionTime']; ?></td>
                  </tr>
                  <?php  $tmpCount = $tmpCount+1; }} ; ?>
                </tbody>                
                <tfoot>
                <tr>
                  	<td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay);  } else { echo minutes($tmpTotMinutePlay); };?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes(($tmpTotMinutePlay - $tmpTotPPMinutePlay - $tmpTotPKMinutePlay) / $tmpTotGP);  } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPKMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPKMinutePlay > 0){ echo minutes($tmpTotPKMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotPPMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotPPMinutePlay > 0){ echo minutes($tmpTotPPMinutePlay / $tmpTotGP); } else { echo 0; }; ?></td>
                    <td align="center" ><?php echo minutes($tmpTotMinutePlay); ?></td>
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotMinutePlay / $tmpTotGP); } else { echo 0; } ?></td>	
                    <td align="center" ><?php if ($tmpTotMinutePlay > 0){ echo minutes($tmpTotPuckPossesionTime / $tmpTotGP); } else { echo 0; }  ?></td>	
                </tr>
              	</tfoot>
                </table>
                <?php } ?>
            </div>
            
            <div id="tabs-4">
                <?php echo "<h3>".$l_HitsFights."</h3>"; 
				$tmpTotGP=0;
				$tmpTotPim=0;
				$tmpTot5Pim=0;
				$tmpTotHits=0;
				$tmpTotHitsTook=0;
				$tmpTotFightW=0;
				$tmpTotFightL=0;
				$tmpTotFightT=0;
				$tmpTotStar1=0;
				$tmpTotStar2=0;
				$tmpTotStar3=0;
				
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_HitsFights; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                    <th><a title="<?php echo $l_HTT_D;?>"><?php echo $l_HTT;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_5PIM_D;?>"><?php echo $l_5PIM;?></a></th>
                    <th><a title="<?php echo $l_FightWin_D;?>"><?php echo $l_FightWin;?></a></th>	
                    <th><a title="<?php echo $l_FightLoss_D;?>"><?php echo $l_FightLoss;?></a></th>	
                    <th><a title="<?php echo $l_FightTie_D;?>"><?php echo $l_FightTie;?></a></th>
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetStats = mysql_fetch_assoc($GetStats)) { ?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php  if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmHits']; $tmpTotHits=$tmpTotHits+$row_GetStats['FarmHits'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmHitsTook']; $tmpTotHitsTook=$tmpTotHitsTook+$row_GetStats['FarmHitsTook'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPim']; $tmpTotPim=$tmpTotPim+$row_GetStats['FarmPim'];?></td>
                    <td align="center"><?php echo $row_GetStats['Farm5Pim']; $tmpTot5Pim=$tmpTot5Pim+$row_GetStats['Farm5Pim'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmFightW']; $tmpTotFightW=$tmpTotFightW+$row_GetStats['FarmFightW'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmFightL']; $tmpTotFightL=$tmpTotFightL+$row_GetStats['FarmFightL'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmFightT']; $tmpTotFightT=$tmpTotFightT+$row_GetStats['FarmFightT'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetStats['FarmStar1'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetStats['FarmStar2'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmStar3']; $tmpTotStar3=$tmpTotStar1+$row_GetStats['FarmStar3'];?></td>
                  </tr>
                  <?php }} ; ?>
                </tbody>                
                <tfoot>
                <tr>
                  	<td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHits ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotHitsTook ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTot5Pim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotFightT ,0); ?></td>	
                    <td align="center" ><?php echo number_format($tmpTotStar1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar3 ,0); ?></td>		
                </tr>
              	</tfoot>
                </table>
                <?php } ?>
              
              </div>
              
              <div id="tabs-5">
                <?php  echo "<h3>".$l_SpecialTeams."</h3>"; 
				$tmpTotGP=0;
				$tmpTotESG=0;
                $tmpTotESA=0;
                $tmpTotESP=0;
                $tmpTotESShots=0;
                $tmpTotPPG=0;
                $tmpTotPPA=0;
                $tmpTotPPPoint=0;
                $tmpTotPPShots=0;
                $tmpTotPKG=0;
                $tmpTotPKA=0;
                $tmpTotPKPoint=0;
                $tmpTotPKShots=0;
				
				if ($totalRows_GetStats > 0) { 
				mysql_data_seek($GetStats,0);
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_SpecialTeams; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_G_D;?>"><?php echo $l_EvenStrength.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_EvenStrength_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_G_D;?>"><?php echo $l_PowerPlay.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_PowerPlay_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_G_D;?>"><?php echo $l_ShortHanded.": ".$l_G;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_A_D;?>"><?php echo $l_A;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_ShortHanded_D.": ".$l_SHT_D;?>"><?php echo $l_SHT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetStats = mysql_fetch_assoc($GetStats)) { 	?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php  if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG']; $tmpTotESG=$tmpTotESG+($row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG']);?></td>
                    <td align="center"><?php echo $row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']; $tmpTotESA=$tmpTotESA+($row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']);?></td>
                    <td align="center"><?php echo $row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG'] + $row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']; $tmpTotESP=$tmpTotESP+($row_GetStats['FarmG']-$row_GetStats['FarmPPG']-$row_GetStats['FarmPKG'] + ($row_GetStats['FarmA']-$row_GetStats['FarmPPA']-$row_GetStats['FarmPKA']));?></td>
                    <td align="center"><?php echo $row_GetStats['FarmShots']-$row_GetStats['FarmPPShots']-$row_GetStats['FarmPKShots']; $tmpTotESShots=$tmpTotESShots+($row_GetStats['FarmShots'] - $row_GetStats['FarmPPShots'] -$row_GetStats['FarmPKShots']);?></td>
                  	<td align="center"><?php echo $row_GetStats['FarmPPG']; $tmpTotPPG=$tmpTotPPG+$row_GetStats['FarmG'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPPA']; $tmpTotPPA=$tmpTotPPA+$row_GetStats['FarmA'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPPG']+$row_GetStats['FarmPPA']; $tmpTotPPPoint=$tmpTotPPPoint+($row_GetStats['FarmPPG']+$row_GetStats['FarmPPA']);?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPPShots']; $tmpTotPPShots=$tmpTotPPShots+$row_GetStats['FarmPPShots'];?></td>
                  	<td align="center"><?php echo $row_GetStats['FarmPKG']; $tmpTotPKG=$tmpTotPKG+$row_GetStats['FarmG'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPKA']; $tmpTotPKA=$tmpTotPKA+$row_GetStats['FarmA'];?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPKG']+$row_GetStats['FarmPKA']; $tmpTotPKPoint=$tmpTotPKPoint+($row_GetStats['FarmPKG']+$row_GetStats['FarmPKA']);?></td>
                    <td align="center"><?php echo $row_GetStats['FarmPKShots']; $tmpTotPKShots=$tmpTotPKShots+$row_GetStats['FarmPKShots'];?></td>
                  </tr>
                  <?php }} ; ?>
                </tbody>                
                <tfoot>
                <tr>
                  	<td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo $tmpTotGP; ?></td>
                    <td align="center" ><?php echo $tmpTotESG; ?></td>
                    <td align="center" ><?php echo $tmpTotESA; ?></td>
                    <td align="center" ><?php echo $tmpTotESP; ?></td>
                    <td align="center" ><?php echo $tmpTotESShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPPG; ?></td>
                    <td align="center" ><?php echo $tmpTotPPA; ?></td>
                    <td align="center" ><?php echo $tmpTotPPPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPPShots; ?></td>
                    <td align="center" ><?php echo $tmpTotPKG; ?></td>
                    <td align="center" ><?php echo $tmpTotPKA; ?></td>
                    <td align="center" ><?php echo $tmpTotPKPoint; ?></td>
                    <td align="center" ><?php echo $tmpTotPKShots; ?></td>
                </tr>
                </tfoot>
                </table>
                <?php } ?>
                
                </div>
                
            <div id="tabs-6">
                <?php
					echo "<h3>".$l_GoalieSummary."</h3>";
					$tmpTotGP=0;
					$tmpTotStartGoaler=0;
                    $tmpTotW=$tmpTotW=0;
                    $tmpTotL=0;
                    $tmpTotOTL=0;
                    $tmpTotSA=0;
                    $tmpTotGA=0;
                    $tmpTotGAA=0;
                    $tmpTotPCT=0;
                    $tmpTotShutouts=0;
                    $tmpTotEmptyNetGoal=0;
                    $tmpTotProA=0;
                    $tmpTotProPim=0;
                    $tmpTotProMinPlay=0;
					$tmpTotStar1=0;
					$tmpTotStar2=0;
					$tmpTotStar3=0;
					
				if ($totalRows_GetGoalieStats > 0) { 
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_GoalieSummary; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_GS_D;?>"><?php echo $l_GS;?></a></th>
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>			
                    <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>	
                    <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
                    <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                    <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
                    <th><a title="<?php echo $l_EG_D;?>"><?php echo $l_G;?></a></th>		
                    <th><a title="<?php echo $l_A_D ;?>"><?php echo $l_A;?></a></th>	
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>	
                    <th><a title="<?php echo $l_MP_D;?>"><?php echo $l_MP;?></a></th>	
                    <th><a title="<?php echo $l_Star1_D;?>"><?php echo $l_Star1;?></a></th>	
                    <th><a title="<?php echo $l_Star2_D;?>"><?php echo $l_Star2;?></a></th>				
                    <th><a title="<?php echo $l_Star3_D;?>"><?php echo $l_Star3;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php do { 	?>
                <?php if ($_SESSION['current_Team_ID'] != $row_GetGoalieStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                <?php  if ($row_GetGoalieStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                  <tr>
                    <td align="center"><a href="goalie.php?player=<?php echo $row_GetGoalieStats['Number']; ?>"><?php echo $row_GetGoalieStats['Name'].$tmpTeamStatus; ?></a></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetGoalieStats['FarmGP'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmStartGoaler']; $tmpTotStartGoaler=$tmpTotStartGoaler+$row_GetGoalieStats['FarmStartGoaler'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmW']; $tmpTotW=$tmpTotW+$row_GetGoalieStats['FarmW'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmL']; $tmpTotL=$tmpTotL+$row_GetGoalieStats['FarmL'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmOTL']; $tmpTotOTL=$tmpTotOTL+$row_GetGoalieStats['FarmOTL'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmSA']; $tmpTotSA=$tmpTotSA+$row_GetGoalieStats['FarmSA'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmGA']; $tmpTotGA=$tmpTotGA+$row_GetGoalieStats['FarmGA'];?></td>
                    <td align="center"><?php if ($row_GetGoalieStats['FarmMinPlay'] > 0){ echo number_format(($row_GetGoalieStats['FarmGA'] / minutes($row_GetGoalieStats['FarmMinPlay']))*60,2);  } else { echo "0"; } ?></td>
                    <td align="center"><?php if ($row_GetGoalieStats['FarmMinPlay'] > 0){ echo number_format(($row_GetGoalieStats['FarmSA'] - $row_GetGoalieStats['FarmGA']) / $row_GetGoalieStats['FarmSA'],3); } else { echo "0"; } ?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmShutouts']; $tmpTotShutouts=$tmpTotShutouts+$row_GetGoalieStats['FarmShutouts'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmEmptyNetGoal']; $tmpTotEmptyNetGoal=$tmpTotEmptyNetGoal+$row_GetGoalieStats['FarmEmptyNetGoal'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmA']; $tmpTotProA=$tmpTotProA+$row_GetGoalieStats['FarmA'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmPim']; $tmpTotProPim=$tmpTotProPim+$row_GetGoalieStats['FarmPim'];?></td>
                    <td align="center"><?php echo minutes($row_GetGoalieStats['FarmMinPlay']); $tmpTotProMinPlay=$tmpTotProMinPlay+$row_GetGoalieStats['FarmMinPlay'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmStar1']; $tmpTotStar1=$tmpTotStar1+$row_GetGoalieStats['FarmStar1'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmStar2']; $tmpTotStar2=$tmpTotStar2+$row_GetGoalieStats['FarmStar2'];?></td>
                    <td align="center"><?php echo $row_GetGoalieStats['FarmStar3']; $tmpTotStar3=$tmpTotStar3+$row_GetGoalieStats['FarmStar3'];?></td>
                  </tr>
                  <?php }} while ($row_GetGoalieStats = mysql_fetch_assoc($GetGoalieStats)); ?>
                </tbody> 
                <tfoot> 
                <tr>
                  	<td align="right" ><?php echo $l_FarmTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStartGoaler ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotSA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotGA ,0); ?></td>
                    <td align="center" ><?php if ($tmpTotProMinPlay > 0){ echo number_format(($tmpTotGA / minutes($tmpTotProMinPlay))*60,2);} else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpTotSA > 0){echo number_format(($tmpTotSA - $tmpTotGA) / $tmpTotSA,3);} else { echo "0"; } ?></td>
                    <td align="center" ><?php echo number_format($tmpTotShutouts ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotEmptyNetGoal,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotProPim ,0); ?></td>
                    <td align="center" ><?php echo minutes($tmpTotProMinPlay); ?></td>	
                    <td align="center" ><?php echo number_format($tmpTotStar1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpTotStar3 ,0); ?></td>	
                </tr>
              	</tfoot>
                </table>
                <?php } ?>
                
            </div>
            
            
                
                <div id="tabs-7">
            	<?php echo "<h3>".$l_Shootouts."</h3>"; 
				$tmpTotGP=0;
				$tmpTotMinutePlay=0;
				$tmpTotPKMinutePlay=0;
				$tmpTotPPMinutePlay=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Shootouts; ?></strong>
                <div style="font-size:9px; float:right; padding-top:2px; clear:both;">
					<?php echo $l_TradedToNote;?>
                </div>
                
                <br />
                <Table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                	<td width="49%">
                    
                        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                        <thead>
                        <tr>
                            <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
                            <th><a title="<?php echo $l_ShotsFor_D;?>"><?php echo $l_ShotsFor;?></a></th>
                            <th><a title="<?php echo $l_SHTPCT_D;?>"><?php echo $l_SHTPCT;?></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($totalRows_GetStats > 0) { 
                            mysql_data_seek($GetStats,0);
                            while ($row_GetStats = mysql_fetch_assoc($GetStats)) { 	
                        ?>
                		<?php if ($_SESSION['current_Team_ID'] != $row_GetStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                        <?php  if ($row_GetStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                          <tr>
                            <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Name']; ?>"><?php echo $row_GetStats['Name'].$tmpTeamStatus; ?></a></td>
                            <td align="center"><?php echo $row_GetStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['FarmGP'];?></td>
                            <td align="center"><?php echo $row_GetStats['FarmPenalityShotsScore']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetStats['FarmPenalityShotsScore'];?></td>
                            <td align="center"><?php echo $row_GetStats['FarmPenalityShotsTotal']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetStats['FarmPenalityShotsTotal'];?></td>
                            <td align="center"><?php echo number_format($row_GetStats['FarmPenalityShotsTotal'] - $row_GetStats['FarmPenalityShotsScore'],1);?></td>
                          </tr>
                          <?php }} ; } ?>
                        </tbody>                
                        <tfoot>             
                        <tr>
                            <td align="right" ><?php echo $l_FarmTotals; ?></td>			
                            <td align="center" ><?php echo $tmpTotGP; ?></td>
                            <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                            <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                            <td align="center" ><?php echo number_format($tmpTotPenalityShotsTotal - $tmpTotPenalityShotsScore,1); ?></td>
                        </tr>
                        </tfoot>
                        </table>

                </td>
                <td width="2">&nbsp;</td>
                <td width="49%">
                	
                    <?php
					$tmpTotGP=0;
					$tmpTotPenalityShotsScore=0;
					$tmpTotPenalityShotsTotal=0;
					
					if ($totalRows_GetGoalieStats > 0) {
						mysql_data_seek($GetGoalieStats,0);
					?>
                    <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                    <thead>
                    <tr>
                        <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                        <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                        <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                        <th><a title="<?php echo $l_SA_D;?>"><?php echo $l_SA;?></a></th>
                        <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row_GetGoalieStats = mysql_fetch_assoc($GetGoalieStats)) { 	?>
                	<?php if ($_SESSION['current_Team_ID'] != $row_GetGoalieStats['ActiveTeam']){ $tmpTeamStatus=" * "; } else  {$tmpTeamStatus=""; }?>
                    <?php  if ($row_GetGoalieStats['FarmGP'] > 0 || $tmpStatus == 0){ ?>
                      <tr>
                        <td align="center"><a href="goalie.php?player=<?php echo $row_GetGoalieStats['Number']; ?>"><?php echo $row_GetGoalieStats['Name'].$tmpTeamStatus; ?></a></td>
                        <td align="center"><?php echo $row_GetGoalieStats['FarmGP']; $tmpTotGP=$tmpTotGP+$row_GetGoalieStats['FarmGP'];?></td>
                        <td align="center"><?php echo $row_GetGoalieStats['FarmPenalityShotsGoals']; $tmpTotPenalityShotsScore=$tmpTotPenalityShotsScore+$row_GetGoalieStats['FarmPenalityShotsGoals'];?></td>
                        <td align="center"><?php echo $row_GetGoalieStats['FarmPenalityShotsShots']; $tmpTotPenalityShotsTotal=$tmpTotPenalityShotsTotal+$row_GetGoalieStats['FarmPenalityShotsShots'];?></td>
                        <td align="center"><?php 
							if ($row_GetGoalieStats['FarmPenalityShotsShots'] > 0){ 
								$tmpSV = ($row_GetGoalieStats['FarmPenalityShotsGoals'] / $row_GetGoalieStats['FarmPenalityShotsShots']); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} 
							?></td>
                      </tr>
                      <?php }} ; ?>
                    </tbody>                
                    <tfoot>
                    <tr>
                        <td align="right" ><?php echo $l_FarmTotals; ?></td>			
                        <td align="center" ><?php echo $tmpTotGP; ?></td>
                        <td align="center" ><?php echo $tmpTotPenalityShotsScore; ?></td>
                        <td align="center" ><?php echo $tmpTotPenalityShotsTotal; ?></td>
                        <td align="center" ><?php 
							if ($tmpTotPenalityShotsTotal > 0){ 
								$tmpSV = ($tmpTotPenalityShotsScore / $tmpTotPenalityShotsTotal); 
								echo number_format(1 - $tmpSV,3);
							} else { 
								echo "0"; 
							} ?></td>
                    </tr>
                    </tfoot>
                    </table>
                    <?php } ?>
                
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
