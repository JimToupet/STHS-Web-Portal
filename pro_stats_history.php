<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_team_stats = "TEAM STATS";
	$l_Change  = "CHANGE SEASON";
	$l_CurrentStats = "Active Season Stats";
	$l_ProCareerStats = "Pro League Career Stats";
	$l_FarmCareerStats = "Farm League Career Stats";
	$l_CareerPlayoff = "STATISTICS";
	$l_CareerRegular = "STATISTICS";
	$l_Summary = "Summary";
	$l_ProTotals = "PRO TOTALS";
	$l_IceTime = "Ice Time";
	$l_Shooting = "Shooting";
	$l_Home = "Home Record";
	$l_Away = "Away Record";
	$l_Specialty = "Specialty Teams";
	$l_Rnk_D = "Power Rankings";
	$l_Rnk = "Rank";
	break; 

case 'fr': 
	$l_team_stats = "STATS JOUEURS";
	$l_Change  =  "Changer de saison";
	$l_CurrentStats = "Statistiques de saison";
	$l_ProCareerStats = "Statistiques de cariere PRO";
	$l_FarmCareerStats = "Statistiques de cariere mineur";
	$l_CareerPlayoff = "Statistiques";
	$l_CareerRegular = "Statistiques";
	$l_Summary = "Sommaire";
	$l_ProTotals = "TOTAL PRO";
	$l_IceTime = "Minute sur la glace";
	$l_Shooting = "Lancers";
	$l_Home = "Domicile";
	$l_Away = "&Eacute;tranger";
	$l_Specialty = "&eacute;quipes de sp&eacute;cialit&eacute;";
	$l_Rnk_D = "Super Classement";
	$l_Rnk = "Classement";
	break; 
} 

$SID_GetSeasonsStats= "1";
if (isset($_SESSION['current_SeasonTypeID'])) {
  $SID_GetSeasonsStats= (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonTypeID'] : addslashes($_SESSION['current_SeasonTypeID']);
}
if (isset($_POST['season_id'])) {
  $SID_GetSeasonsStats= (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $SID_GetSeasonsStats= (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}


$query_GetSeasonsStats= sprintf("SELECT * FROM proteamstandings as P, seasons as S WHERE S.S_ID = P.Season_ID AND S.SeasonType = %s AND P.Number = %s ORDER BY S.Season Asc", $SID_GetSeasonsStats, $_SESSION['current_Team_ID']);
$GetSeasonsStats= mysql_query($query_GetSeasonsStats, $connection) or die(mysql_error());
$row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats);
$totalRows_GetSeasonsStats = mysql_num_rows($GetSeasonsStats);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_team_stats ." - ".$_SESSION['SiteName'] ; ?></title>

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
    <form action="pro_stats_history.php" method="post" name="form1">

	<div style="float:left; padding-bottom:2px"><h1><?php echo $l_team_stats." : "." ".$_SESSION['current_SeasonType']; ?></h1></div>

		<div style="float:right; padding-top:5px;">
        	<select name="season_id" id="season_id">
            <option value="2" <?php if ($SID_GetSeasonsStats == 2){ echo "selected"; } ?>><?php echo $l_preseason;?></option>
            <option value="1" <?php if ($SID_GetSeasonsStats == 1){ echo "selected"; } ?>><?php echo $l_regularseason;?></option>
            <option value="0" <?php if ($SID_GetSeasonsStats == 0){ echo "selected"; } ?>><?php echo $l_playoffs;?></option>
            </select>
            <input type="submit" value="<?php echo $l_Change;?>"  class="button" />

        </form></div>
        
        <br clear="all" />
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
                    $tmpPoint=0;
                    $tmpGF=0;
                    $tmpGA=0;
                    $tmpEmptyNetGoals=0;
                    $tmpShutouts=0;
                    $tmpPim=0;
                    $tmpHits=0;
					$tmpGP=0;
					$tmpPowerRanking=0;
					$tmpEmptyNetGoal=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_Summary; ?></strong>
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
                    <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
                    <th><a title="<?php echo $l_Rnk_D;?>"><?php echo $l_Rnk;?></a></th>
                    <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                    <th><a title="<?php echo $l_EG_D;?>"><?php echo $l_EG;?></a></th>
                    <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>
                    <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                    <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php do { ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GP']; $tmpGP=$tmpGP+$row_GetSeasonsStats['GP'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['W']; $tmpW=$tmpW+$row_GetSeasonsStats['W'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['L']; $tmpL=$tmpL+$row_GetSeasonsStats['L'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['T']; $tmpT=$tmpT+$row_GetSeasonsStats['T'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['OTW']; $tmpOTW=$tmpOTW+$row_GetSeasonsStats['OTW'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['OTL']; $tmpOTL=$tmpOTL+$row_GetSeasonsStats['OTL'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['SOW']; $tmpSOW=$tmpSOW+$row_GetSeasonsStats['SOW'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['SOL']; $tmpSOL=$tmpSOL+$row_GetSeasonsStats['SOL'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Point']; $tmpPoint=$tmpPoint+$row_GetSeasonsStats['Point'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PowerRanking']; $tmpPowerRanking=$tmpPowerRanking+$row_GetSeasonsStats['PowerRanking'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GF']; $tmpGF=$tmpGF+$row_GetSeasonsStats['GF'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GA']; $tmpGA=$tmpGA+$row_GetSeasonsStats['GA'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['EmptyNetGoal']; $tmpEmptyNetGoal=$tmpEmptyNetGoal+$row_GetSeasonsStats['EmptyNetGoal'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Shutouts']; $tmpShutouts=$tmpShutouts+$row_GetSeasonsStats['Shutouts'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Pim']; $tmpPim=$tmpPim+$row_GetSeasonsStats['Pim'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Hits']; $tmpHits=$tmpHits+$row_GetSeasonsStats['Hits'];?></td>
                </tr>
                <?php } while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)); ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>		
                    <td align="center" ><?php echo number_format($tmpGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpSOL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPoint ,0); ?></td>
                    <td align="center" ><?php if($tmpPowerRanking > 0){ echo number_format($tmpPowerRanking / $totalRows_GetSeasonsStats, 0); } else { echo 0;} ?></td>	
                    <td align="center" ><?php echo number_format($tmpGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpEmptyNetGoals ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpShutouts ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPim ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHits ,0); ?></td>
                </tr>
              	</tfoot>
                </table>
            </div>
            
            <div id="tabs-2">
            	<h3><?php echo $l_Specialty; ?></h3>
                <?php 
				mysql_data_seek($GetSeasonsStats,0);
				$tmpGP = 0;
                $tmpPPAttemp = 0;
                $tmpPPGoal = 0;
                $tmpPPPCT = 0;
                $tmpPKAttemp = 0;
                $tmpPKGoalGA = 0;
                $tmpPKPCT = 0;
                $tmpPKGoalGF = 0;
                $tmpFaceOffWonOF = 0;
                $tmpFaceOffWonDF = 0;
                $tmpFaceOffWonNF = 0;
				$tmpFaceOffTotalOF=0;
				$tmpFaceOffTotalDF=0;
				$tmpFaceOffTotalNT=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_Specialty; ?></strong>

                    
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_PPAttemp_D;?>"><?php echo $l_PPAttemp;?></a></th>
                    <th><a title="<?php echo $l_PPG_D;?>"><?php echo $l_PPG;?></a></th>
                    <th><a title="<?php echo $l_PPPCT_D;?>"><?php echo $l_PPPCT;?></a></th>	
                    <th><a title="<?php echo $l_PKAttemp_D;?>"><?php echo $l_PKAttemp;?></a></th>	
                    <th><a title="<?php echo $l_PKGoalGA_D;?>"><?php echo $l_PKGoalGA;?></a></th>	
                    <th><a title="<?php echo $l_PKPCT_D;?>"><?php echo $l_PKPCT;?></a></th>	
                    <th><a title="<?php echo $l_PKGoalGF_D;?>"><?php echo $l_PKGoalGF;?></a></th>
                    <th><a title="<?php echo $l_FaceOffWonOF_D;?>"><?php echo $l_FaceOffWonOF;?></a></th>
                    <th><a title="<?php echo $l_FaceOffWonDF_D;?>"><?php echo $l_FaceOffWonDF;?></a></th>
                    <th><a title="<?php echo $l_FaceOffWonNT_D;?>"><?php echo $l_FaceOffWonNT;?></a></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)){ ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GP']; $tmpGP=$tmpGP+$row_GetSeasonsStats['GP'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PPAttemp']; $tmpPPAttemp=$tmpPPAttemp+$row_GetSeasonsStats['PPAttemp']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PPGoal']; $tmpPPGoal=$tmpPPGoal+$row_GetSeasonsStats['PPGoal']; ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['PPAttemp'] > 0){ $PPPCT = number_format($row_GetSeasonsStats['PPGoal']/$row_GetSeasonsStats['PPAttemp']*100,0);} else { $PPPCT = 0;} echo $PPPCT; $tmpPPPCT=$tmpPPPCT+$PPPCT; ?>%</td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PKAttemp']; $tmpPKAttemp=$tmpPKAttemp+$row_GetSeasonsStats['PKAttemp']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PKGoalGA']; $tmpPKGoalGA=$tmpPKGoalGA+$row_GetSeasonsStats['PKGoalGA']; ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['PKAttemp'] > 0){ $PKPCT = 100 - number_format($row_GetSeasonsStats['PKGoalGA']/$row_GetSeasonsStats['PKAttemp']*100,0);} else { $PKPCT = 0;} echo $PKPCT; $tmpPKPCT=$tmpPKPCT+$PKPCT; ?>%</td>
                    <td align="center"><?php echo $row_GetSeasonsStats['PKGoalGF']; $tmpPKGoalGF=$tmpPKGoalGF+$row_GetSeasonsStats['PKGoalGF']; ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['FaceOffWonOF']>0) { echo number_format($row_GetSeasonsStats['FaceOffWonOF'] / str_replace(",","",$row_GetSeasonsStats['FaceOffTotalOF']) * 100,0); } else { echo "0"; } ; $tmpFaceOffTotalOF=$tmpFaceOffTotalOF+$row_GetSeasonsStats['FaceOffTotalOF'];?>%</td>
                    <td align="center"><?php if ($row_GetSeasonsStats['FaceOffWonDF']>0) { echo number_format($row_GetSeasonsStats['FaceOffWonDF'] / str_replace(",","",$row_GetSeasonsStats['FaceOffTotalDF']) * 100,0); } else { echo "0"; } ; $tmpFaceOffTotalDF=$tmpFaceOffTotalDF+$row_GetSeasonsStats['FaceOffTotalDF'];?>%</td>
                    <td align="center"><?php if ($row_GetSeasonsStats['FaceOffWonNF']>0) { echo number_format($row_GetSeasonsStats['FaceOffWonNT'] / str_replace(",","",$row_GetSeasonsStats['FaceOffTotalNT']) * 100,0); } else { echo "0"; } ; $tmpFaceOffTotalNT=$tmpFaceOffTotalNT+$row_GetSeasonsStats['FaceOffTotalNT'];?>%</td>
                </tr>
                <?php } ; ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPPAttemp ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPPGoal ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPPPCT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPKAttemp ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPKGoalGA ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPKPCT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpPKGoalGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpFaceOffWonOF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpFaceOffWonDF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpFaceOffWonNF ,0); ?></td>
                </tr>
              	</tfoot>
                </table>


            </div>
            
            <div id="tabs-3">
            	<h3><?php echo $l_IceTime; ?></h3>
                <?php 
				mysql_data_seek($GetSeasonsStats,0);
				$tmpGP = 0;
				$tmPuckTimeInZoneDF = 0;
				$tmpPuckTimeControlinZoneDF = 0;
				$tmPuckTimeInZoneOF = 0;
				$tmpPuckTimeControlinZoneOF = 0;
				$tmPuckTimeInZoneNT = 0;
				$tmpPuckTimeControlinZoneNT = 0;
				$tmpPuckTimeInZoneD=0;
				$tmpPuckTimeInZoneOF=0;
				$tmpPuckTimeInZoneNT=0;
				$tmpPuckTimeInZoneDF=0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_IceTime; ?></strong>
    
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_PTDF_D;?>"><?php echo $l_PTDF;?></a></th>
                    <th><a title="<?php echo $l_PCDF_D;?>"><?php echo $l_PCDF;?></a></th>
                    <th><a title="<?php echo $l_PTOF_D;?>"><?php echo $l_PTOF;?></a></th>
                    <th><a title="<?php echo $l_PCOF_D;?>"><?php echo $l_PCOF;?></a></th>
                    <th><a title="<?php echo $l_PTNT_D;?>"><?php echo $l_PTNT;?></a></th>
                    <th><a title="<?php echo $l_PCNT_D;?>"><?php echo $l_PCNT;?></a></th>
                    
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)){ ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GP']; $tmpGP=$tmpGP+$row_GetSeasonsStats['GP'];?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeInZoneDF'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeInZoneDF=$tmpPuckTimeInZoneDF+$row_GetSeasonsStats['PuckTimeInZoneDF']; } else { echo "0"; } ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeControlinZoneDF'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeControlinZoneDF=$tmpPuckTimeControlinZoneDF+$row_GetSeasonsStats['PuckTimeControlinZoneDF'];  } else { echo "0"; } ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeInZoneOF'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeInZoneOF=$tmpPuckTimeInZoneOF+$row_GetSeasonsStats['PuckTimeInZoneOF'];  } else { echo "0"; } ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeControlinZoneOF'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeControlinZoneOF=$tmpPuckTimeControlinZoneOF+$row_GetSeasonsStats['PuckTimeControlinZoneOF'];  } else { echo "0"; } ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeInZoneNT'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeInZoneNT=$tmpPuckTimeInZoneNT+$row_GetSeasonsStats['PuckTimeInZoneNT'];  } else { echo "0"; } ?></td>
                    <td align="center"><?php if($row_GetSeasonsStats['GP'] > 0) { echo minutes($row_GetSeasonsStats['PuckTimeControlinZoneNT'] / $row_GetSeasonsStats['GP']); $tmpPuckTimeControlinZoneNT=$tmpPuckTimeControlinZoneNT+$row_GetSeasonsStats['PuckTimeControlinZoneNT'];  } else { echo "0"; } ?></td>
                </tr>
                <?php } ; ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpGP ,0); ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeInZoneDF/$tmpGP); } else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeControlinZoneDF/$tmpGP); } else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeInZoneOF/$tmpGP); } else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeControlinZoneOF/$tmpGP); } else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeInZoneNT/$tmpGP); } else { echo "0"; } ?></td>
                    <td align="center" ><?php if ($tmpGP>0){ echo minutes($tmpPuckTimeControlinZoneNT/$tmpGP); } else { echo "0"; } ?></td>
                </tr>
              	</tfoot>
                </table>
            </div>

            <div id="tabs-4">
            	<h3><?php echo $l_Shooting; ?></h3>
                <?php 
				mysql_data_seek($GetSeasonsStats,0);
				$tmpGP = 0;
				$tmpShotsFor = 0;
				$tmpShotsAga = 0;
                $tmpShotsBlock = 0;
                $tmpShotsPerPeriod1 = 0;       
                $tmpGoalsPerPeriod1 = 0;   
                $tmpShotsPerPeriod2 = 0;
                $tmpGoalsPerPeriod2 = 0;
                $tmpShotsPerPeriod3 = 0;
                $tmpGoalsPerPeriod3 = 0;
                $tmpShotsPerPeriod4 = 0;
                $tmpGoalsPerPeriod4 = 0;
				?>
                <strong style="text-transform:uppercase;"><?php echo $l_Shooting; ?></strong>
                    
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                    <th><a title="<?php echo $l_ShotsFor_D;?>"><?php echo $l_ShotsFor ;?></a></th>
                    <th><a title="<?php echo $l_ShotsAga_D;?>"><?php echo $l_ShotsAga;?></a></th>	
                    <th><a title="<?php echo $l_ShotsBlock_D;?>"><?php echo $l_ShotsBlock;?></a></th>
                    <th><a title="<?php echo $l_ShotsPerPeriod1_D;?>"><?php echo $l_ShotsPerPeriod1;?></a></th>
                    <th><a title="<?php echo $l_GoalsPerPeriod1_D;?>"><?php echo $l_GoalsPerPeriod1;?></a></th>
                    <th><a title="">SHT1%</a></th>
                    <th><a title="<?php echo $l_ShotsPerPeriod2_D;?>"><?php echo $l_ShotsPerPeriod2;?></a></th>
                    <th><a title="<?php echo $l_GoalsPerPeriod2_D;?>"><?php echo $l_GoalsPerPeriod2;?></a></th>
                    <th><a title="">SHT2%</a></th>
                    <th><a title="<?php echo $l_ShotsPerPeriod3_D;?>"><?php echo $l_ShotsPerPeriod3;?></a></th>
                    <th><a title="<?php echo $l_GoalsPerPeriod3_D;?>"><?php echo $l_GoalsPerPeriod3;?></a></th>
                    <th><a title="">SHT3%</a></th>
                    <th><a title="<?php echo $l_ShotsPerPeriod4_D;?>"><?php echo $l_ShotsPerPeriod4;?></a></th>
                    <th><a title="<?php echo $l_GoalsPerPeriod4_D;?>"><?php echo $l_GoalsPerPeriod4;?></a></th>
                    <th><a title="">SHT4%</a></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)) { ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GP']; $tmpGP=$tmpGP+$row_GetSeasonsStats['GP'];?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsFor']; $tmpShotsFor=$tmpShotsFor+$row_GetSeasonsStats['ShotsFor']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsAga']; $tmpShotsAga=$tmpShotsAga+$row_GetSeasonsStats['ShotsAga']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsBlock']; $tmpShotsBlock=$tmpShotsBlock+$row_GetSeasonsStats['ShotsBlock']; ?></td>    
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsPerPeriod1']; $tmpShotsPerPeriod1=$tmpShotsPerPeriod1+$row_GetSeasonsStats['ShotsPerPeriod1']; ?></td>        
                    <td align="center"><?php echo $row_GetSeasonsStats['GoalsPerPeriod1']; $tmpGoalsPerPeriod1=$tmpGoalsPerPeriod1+$row_GetSeasonsStats['GoalsPerPeriod1']; ?></td>       
                    <td align="center"><?php if ($row_GetSeasonsStats['ShotsPerPeriod1']>0){ echo number_format($row_GetSeasonsStats['ShotsPerPeriod1'] / $row_GetSeasonsStats['GoalsPerPeriod1'],0); } else { echo "0"; } ?>%</td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsPerPeriod2']; $tmpShotsPerPeriod2=$tmpShotsPerPeriod2+$row_GetSeasonsStats['ShotsPerPeriod2']; ?></td>  
                    <td align="center"><?php echo $row_GetSeasonsStats['GoalsPerPeriod2']; $tmpGoalsPerPeriod2=$tmpGoalsPerPeriod2+$row_GetSeasonsStats['GoalsPerPeriod2']; ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['ShotsPerPeriod2']>0){ echo number_format($row_GetSeasonsStats['ShotsPerPeriod2'] / $row_GetSeasonsStats['GoalsPerPeriod2'],0); } else { echo "0"; } ?>%</td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsPerPeriod3']; $tmpShotsPerPeriod3=$tmpShotsPerPeriod3+$row_GetSeasonsStats['ShotsPerPeriod3']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GoalsPerPeriod3']; $tmpGoalsPerPeriod3=$tmpGoalsPerPeriod3+$row_GetSeasonsStats['GoalsPerPeriod3']; ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['ShotsPerPeriod3']>0){ echo number_format($row_GetSeasonsStats['ShotsPerPeriod3'] / $row_GetSeasonsStats['GoalsPerPeriod3'],0); } else { echo "0"; } ?>%</td>
                    <td align="center"><?php echo $row_GetSeasonsStats['ShotsPerPeriod4']; $tmpShotsPerPeriod4=$tmpShotsPerPeriod4+$row_GetSeasonsStats['ShotsPerPeriod4']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['GoalsPerPeriod4']; $tmpGoalsPerPeriod4=$tmpGoalsPerPeriod4+$row_GetSeasonsStats['GoalsPerPeriod4']; ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['ShotsPerPeriod4']>0){ echo number_format($row_GetSeasonsStats['ShotsPerPeriod4'] / $row_GetSeasonsStats['GoalsPerPeriod4'],0); } else { echo "0"; } ?>%</td>
                </tr>
                <?php } ; ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpShotsFor ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpShotsAga ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpShotsBlock ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpShotsPerPeriod1 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGoalsPerPeriod1 ,0); ?></td>
                    <td align="center" ><?php if ($tmpShotsPerPeriod1>0){ echo number_format($tmpShotsPerPeriod1/$tmpGoalsPerPeriod1 ,0); } else { echo "0"; }  ?>%</td>
                    <td align="center" ><?php echo number_format($tmpShotsPerPeriod2 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGoalsPerPeriod2 ,0); ?></td>
                    <td align="center" ><?php if ($tmpShotsPerPeriod2>0){ echo number_format($tmpShotsPerPeriod2/$tmpGoalsPerPeriod2 ,0); } else { echo "0"; } ?>%</td>
                    <td align="center" ><?php echo number_format($tmpShotsPerPeriod3 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGoalsPerPeriod3 ,0); ?></td>
                    <td align="center" ><?php if ($tmpShotsPerPeriod3>0){ echo number_format($tmpShotsPerPeriod3/$tmpGoalsPerPeriod3 ,0); } else { echo "0"; } ?>%</td>
                    <td align="center" ><?php echo number_format($tmpShotsPerPeriod4 ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpGoalsPerPeriod4 ,0); ?></td>
                    <td align="center" ><?php if ($tmpShotsPerPeriod4>0){ echo number_format($tmpShotsPerPeriod4/$tmpGoalsPerPeriod4 ,0); } else { echo "0"; } ?>%</td>
                </tr>
              	</tfoot>
                </table>                
            </div>
            
            <div id="tabs-5"><h3><?php echo $l_Home; ?></h3>
            <?php 
				mysql_data_seek($GetSeasonsStats,0);				
				$tmpHomeGP = 0;
				$tmpHomeW = 0;
				$tmpHomeL = 0;
				$tmpHomeT = 0;
				$tmpHomeOTW = 0;
				$tmpHomeOTL = 0;
				$tmpHomeSOW = 0;
				$tmpHomeSOL = 0;
				$tmpHomeGF = 0;
				$tmpHomeGA = 0;
			?>
                <strong style="text-transform:uppercase;"><?php echo $l_Home; ?></strong>
       
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
                    <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></td>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)) { ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGP'] > 0) { echo $row_GetSeasonsStats['HomeGP']; $tmpHomeGP=$tmpHomeGP+$row_GetSeasonsStats['HomeGP']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeW'] > 0) { echo $row_GetSeasonsStats['HomeW']; $tmpHomeW=$tmpHomeW+$row_GetSeasonsStats['HomeW']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeL'] > 0) { echo $row_GetSeasonsStats['HomeL']; $tmpHomeL=$tmpHomeL+$row_GetSeasonsStats['HomeL']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeT'] > 0) { echo $row_GetSeasonsStats['HomeT']; $tmpHomeT=$tmpHomeT+$row_GetSeasonsStats['HomeT']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeOTW'] > 0) { echo $row_GetSeasonsStats['HomeOTW']; $tmpHomeOTW=$tmpHomeOTW+$row_GetSeasonsStats['HomeOTW']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeOTL'] > 0) { echo $row_GetSeasonsStats['HomeOTL']; $tmpHomeOTL=$tmpHomeOTL+$row_GetSeasonsStats['HomeOTL']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeSOW'] > 0) { echo $row_GetSeasonsStats['HomeSOW']; $tmpHomeSOW=$tmpHomeSOW+$row_GetSeasonsStats['HomeSOW']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeSOL'] > 0) { echo $row_GetSeasonsStats['HomeSOL']; $tmpHomeSOL=$tmpHomeSOL+$row_GetSeasonsStats['HomeSOL']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGF'] > 0) { echo $row_GetSeasonsStats['HomeGF']; $tmpHomeGA=$tmpHomeGA+$row_GetSeasonsStats['HomeGA']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGA'] > 0) { echo $row_GetSeasonsStats['HomeGA']; $tmpHomeGF=$tmpHomeGF+$row_GetSeasonsStats['HomeGF']; } else { echo 0; } ?></td>
                 </tr>
                <?php } ; ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpHomeGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeOTW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeSOW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeSOL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeGA ,0); ?></td>
                </tr>
              	</tfoot>
                </table>
                
            </div>
            
            <div id="tabs-6"><h3><?php echo $l_Away; ?></h3>
            
            <?php 
				mysql_data_seek($GetSeasonsStats,0);
				$tmpHomeGP = 0;
				$tmpHomeW = 0;
				$tmpHomeL = 0;
				$tmpHomeT = 0;
				$tmpHomeOTW = 0;
				$tmpHomeOTL = 0;
				$tmpHomeSOW = 0;
				$tmpHomeSOL = 0;
				$tmpHomeGF = 0;
				$tmpHomeGA = 0;
			?>
                <strong style="text-transform:uppercase;"><?php echo $l_Away; ?></strong>
     
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
                    <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></td>
                    <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)) { ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGP'] > 0) { echo $row_GetSeasonsStats['GP'] - $row_GetSeasonsStats['HomeGP']; $tmpHomeGP=$tmpHomeGP+($row_GetSeasonsStats['GP'] - $row_GetSeasonsStats['HomeGP']); } else if ($row_GetSeasonsStats['HomeGP'] == 0 && $row_GetSeasonsStats['GP'] > 0) { echo $row_GetSeasonsStats['GP']; $tmpHomeGP=$tmpHomeGP+$row_GetSeasonsStats['GP']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeW'] > 0) { echo $row_GetSeasonsStats['W'] - $row_GetSeasonsStats['HomeW']; $tmpHomeW=$tmpHomeW+($row_GetSeasonsStats['W'] - $row_GetSeasonsStats['HomeW']); }  else if ($row_GetSeasonsStats['HomeW'] == 0 && $row_GetSeasonsStats['W'] > 0) { echo 0; $tmpHomeW=$tmpHomeW+$row_GetSeasonsStats['W']; } else { echo 0; }   ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeL'] > 0) { echo $row_GetSeasonsStats['L'] - $row_GetSeasonsStats['HomeL']; $tmpHomeL=$tmpHomeL+($row_GetSeasonsStats['L'] - $row_GetSeasonsStats['HomeL']); }  else if ($row_GetSeasonsStats['HomeL'] == 0 && $row_GetSeasonsStats['L'] > 0) { echo 0; $tmpHomeL=$tmpHomeL+$row_GetSeasonsStats['L']; } else { echo 0; }  ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeT'] > 0) { echo $row_GetSeasonsStats['T'] - $row_GetSeasonsStats['HomeT']; $tmpHomeT=$tmpHomeT+($row_GetSeasonsStats['T'] - $row_GetSeasonsStats['HomeT']); }  else if ($row_GetSeasonsStats['HomeT'] == 0 && $row_GetSeasonsStats['T'] > 0) { echo 0; $tmpHomeT=$tmpHomeT+$row_GetSeasonsStats['T']; } else { echo 0; }   ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeOTW'] > 0) { echo $row_GetSeasonsStats['OTW'] - $row_GetSeasonsStats['HomeOTW']; $tmpHomeOTW=$tmpHomeOTW+($row_GetSeasonsStats['OTW'] - $row_GetSeasonsStats['HomeOTW']); }  else if ($row_GetSeasonsStats['HomeOTW'] == 0 && $row_GetSeasonsStats['OTW'] > 0) { echo 0; $tmpHomeOTW=$tmpHomeOTW+$row_GetSeasonsStats['OTW']; } else { echo 0; }   ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeOTL'] > 0) { echo $row_GetSeasonsStats['OTL'] - $row_GetSeasonsStats['HomeOTL']; $tmpHomeOTL=$tmpHomeGP+($row_GetSeasonsStats['OTL'] - $row_GetSeasonsStats['HomeOTL']); }  else if ($row_GetSeasonsStats['HomeOTL'] == 0 && $row_GetSeasonsStats['OTL'] > 0) { echo 0; $tmpHomeOTL=$tmpHomeOTL+$row_GetSeasonsStats['OTL']; } else { echo 0; }  ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeSOW'] > 0) { echo $row_GetSeasonsStats['SOW'] - $row_GetSeasonsStats['HomeSOW']; $tmpHomeSOW=$tmpHomeSOW+($row_GetSeasonsStats['SOW'] - $row_GetSeasonsStats['HomeSOW']); }  else if ($row_GetSeasonsStats['HomeSOW'] == 0 && $row_GetSeasonsStats['SOW'] > 0) { echo 0; $tmpHomeSOW=$tmpHomeSOW+$row_GetSeasonsStats['SOW']; } else { echo 0; } ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeSOL'] > 0) { echo $row_GetSeasonsStats['SOL'] - $row_GetSeasonsStats['HomeSOL']; $tmpHomeSOL=$tmpHomeSOL+($row_GetSeasonsStats['SOL'] - $row_GetSeasonsStats['HomeSOL']); }  else if ($row_GetSeasonsStats['HomeSOL'] == 0 && $row_GetSeasonsStats['SOL'] > 0) { echo 0; $tmpHomeSOL=$tmpHomeSOL+$row_GetSeasonsStats['SOL']; } else { echo 0; }  ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGF'] > 0) { echo $row_GetSeasonsStats['GF'] - $row_GetSeasonsStats['HomeGF']; $tmpHomeGF=$tmpHomeGF+($row_GetSeasonsStats['GF'] - $row_GetSeasonsStats['HomeGF']); }  else if ($row_GetSeasonsStats['HomeGF'] == 0 && $row_GetSeasonsStats['GF'] > 0) { echo 0; $tmpHomeGF=$tmpHomeGF+$row_GetSeasonsStats['GF']; } else { echo 0; }  ?></td>
                    <td align="center"><?php if ($row_GetSeasonsStats['HomeGA'] > 0) { echo $row_GetSeasonsStats['GA'] - $row_GetSeasonsStats['HomeGA']; $tmpHomeGA=$tmpHomeGA+($row_GetSeasonsStats['GA'] - $row_GetSeasonsStats['HomeGA']); }  else if ($row_GetSeasonsStats['HomeGA'] == 0 && $row_GetSeasonsStats['GA'] > 0) { echo 0; $tmpHomeGA=$tmpHomeGA+$row_GetSeasonsStats['GA']; } else { echo 0; } ?></td>
                 </tr>
                <?php } ; ?>	
                </tbody>
                <tfoot> 
                <tr>		
                    <td align="right" ><?php echo $l_ProTotals; ?></td>			
                    <td align="center" ><?php echo number_format($tmpHomeGP ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeT ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeOTW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeOTL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeSOW ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeSOL ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeGF ,0); ?></td>
                    <td align="center" ><?php echo number_format($tmpHomeGA ,0); ?></td>
                </tr>
              	</tfoot>
                </table>
                
            </div>
            
            <div id="tabs-7"><h3><?php echo $l_L10_D; ?></h3>
            <strong style="text-transform:uppercase;"><?php echo $l_L10_D; ?></strong>
    		
            	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr>
                    <th><?php echo $l_season;?></th>
                    <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>	
                    <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>	
                    <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                    <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
                    <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>	
                    <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>	
                    <th><a title="<?php echo $l_Streak_D;?>"><?php echo $l_Streak_D;?></a></th>	
                </tr>
                </thead>
                <tbody>
                <?php 
				mysql_data_seek($GetSeasonsStats,0);
				while ($row_GetSeasonsStats= mysql_fetch_assoc($GetSeasonsStats)) { ?>
                <tr>
                    <td align="center"><?php echo $row_GetSeasonsStats['Season']."-".substr($row_GetSeasonsStats['Season']+1, -2); ?></td>
                    <td align="center">10</td>
                    <td align="center"><?php echo ($row_GetSeasonsStats['Last10W'] + $row_GetSeasonsStats['Last10OTW'] + $row_GetSeasonsStats['Last10SOW']); ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Last10L']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Last10T']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Last10OTL']; ?></td>
                   	<td align="center"><?php echo $row_GetSeasonsStats['Last10SOL']; ?></td>
                    <td align="center"><?php echo $row_GetSeasonsStats['Streak']; ?></td>
                 </tr>
                <?php } ; ?>
                </tbody>
                </table>
                
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
