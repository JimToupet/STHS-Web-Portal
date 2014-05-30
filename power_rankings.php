<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Playoff_Z = "Clinched Conference";
	$l_Playoff_E = "Clinched Playoff spot";
	$l_Playoff_Y = "Clinched Division";
	$l_Playoff_P = "Clinched League Title";
	$l_Playoff_X = "";
	$l_GF_D = "Goals For";
	$l_GA_D = "Goals Against";
	$l_TeamName  = "Team";
	$l_Rank  = "Rank";
	$l_W  = "W";
	$l_L  = "L";
	$l_OT  = "OT";
	$l_Key = "Key Injuries";
	$l_Record = "Overall Record";
	$l_Last10 = "Last 10 Games";
	$l_Streak = "Streak";
	break; 

case 'fr': 
	$l_Playoff_Z = "assur&eacute; du titre de conf&eacute;rence";
	$l_Playoff_E = "assur&eacute; d&Acirc;€™une place en s&eacute;ries";
	$l_Playoff_Y = "assur&eacute; du titre de division";
	$l_Playoff_P = "assur&eacute; du titre de league";
	$l_GF_D = "But";
	$l_GA_D = "But contre";
	$l_TeamName  = "&eacute;quipe";
	$l_Rank  = "Rank";
	$l_W  = "V";
	$l_L  = "D";
	$l_OT  = "PR";
	$l_Key = "Key Injuries";
	$l_Record = "Overall Record";
	$l_Last10 = "Last 10 Games";
	$l_Streak = "Streak";
	break; 
} 

$season_id = 0;
if (isset($_POST['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}
if ($season_id == ""){ 
	$season_id = $_SESSION['current_SeasonID'];
}


$query_GetStandings = sprintf("SELECT proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.PowerRanking, ((proteamstandings.W + proteamstandings.OTW + proteamstandings.SOW) / proteamstandings.GP) as WinPercentage, (proteamstandings.GF / proteamstandings.GA) as GoalPercentage, proteam.LogoSmall, proteam.LogoTiny, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' ORDER BY proteamstandings.PowerRanking asc",$_SESSION['current_SeasonID']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_PowerRankings;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
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
<h1><?php echo $l_nav_PowerRankings;?></h1>

<br clear="all" />
<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
<thead>
<tr>
	<th width="20"><?php echo $l_Rank;?></th>
	<th width="20"></th>
	<th width="150"><?php echo $l_TeamName;?></th>
	<th width="100"><?php echo $l_Last10;?></th>
	<th width="100"><?php echo $l_Streak;?></th>
	<th><?php echo $l_Key;?></th>
</tr>
</thead>
<tbody>
<?php do {
			$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
			$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
			$HomeWins = $row_GetStandings['HomeW'] + $row_GetStandings['HomeOTW'] + $row_GetStandings['HomeSOW'];
			$HomeOTLosses = $row_GetStandings['HomeOTL'] + $row_GetStandings['HomeSOL'];
			$HomeRecord = $HomeWins."-".$row_GetStandings['HomeL']."-".$HomeOTLosses;
			
			$VisitWins = $TotalWins - $HomeWins;
			$VisitOTLosses = $TotalOT - $HomeOTLosses;
			$VisitLoss = $row_GetStandings['L'] - $row_GetStandings['HomeL'];
			$VisitRecord = $VisitWins."-".$VisitLoss."-".$VisitOTLosses;
			
			?>
<tr>
	<td align="center"><?php echo $row_GetStandings['PowerRanking']; ?></td>
	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetStandings['LogoTiny']; ?>"></img></td>
	<td nowrap="nowrap" align="center"><a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name']; ?></a></td>
	<td align="center"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
	<td align="center"><?php echo $row_GetStandings['Streak']; ?></td>
	<td align="center"><?php 

$query_GetSkaters = sprintf("SELECT players.Name, '1' as Position FROM players WHERE players.Team='%s' AND players.Injury <> '' AND players.Overall > 65 UNION ALL SELECT goalies.Name, '5' as Position FROM goalies WHERE goalies.Team='%s' AND goalies.Injury <> '' AND goalies.Overall > 65", $row_GetStandings['Number'], $row_GetStandings['Number'] );
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);
$TempSkaterCount = 1;
do {
	if($row_GetSkaters['Position']==5){
		$tmpTargetFile="goalie.php";
	} else {
		$tmpTargetFile="player.php";
	}
	echo '<a href="'.$tmpTargetFile.'?team='.$row_GetStandings['Number'].'&Player='.$row_GetSkaters['Name'].'">'.$row_GetSkaters['Name']."</a>";
	if ($TempSkaterCount << ($totalRows_GetSkaters) && $totalRows_GetSkaters != 0){
		echo ", ";
	}
	$TempSkaterCount = $TempSkaterCount + 1;
} while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
mysql_free_result($GetSkaters);
$TempSkaterCount = 0;
?></td>
</tr>
<?php
		} while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); 
		echo "</tbody></table>";
?>   
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
