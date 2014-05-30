<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
 

switch ($lang){ 
case 'en': 
	$l_Award = "Award";
	$l_Recent = "Most recent recipient";	
	$l_MVP = "Most Valuable Player";
	$l_LowestPIM = "Player who Displays Gentlemanly Conduct";
	$l_GoalieOfTheYear = "Top Goalie";
	$l_RookieOfTheYear = "Rookie of the Year";
	$l_TopScorer = "Top Point Scorer";
	$l_DefensemanOfTheYear = "Top Defenseman";
	$l_MostSportsmanlikePlayer = "Qualities of Perseverance and Sportsmanship";
	$l_BestDefensiveForward = "Top Defensive Forward";
	$l_TopGoalScorer = "Top Goal Scorer";
	$l_LowestGAA = "Goalie With the Fewest Goals Scored Against";
	$l_PlayoffMVP = "Most Valuable Player <br>in the Playoffs";
	$l_CoachOfTheYear = "Coach of the Year";
	$l_GeneralManager = "G.M. of the Year";
	$l_SelectWinner = "Select a Winner";
	$l_Submit = "Submit Award Winners";
	break; 
	
case 'fr': 	
	$l_Award = "Troph&eacute;e";
	$l_Recent = "R&eacute;cipiendaire le plus r&eacute;cent";
	$l_MVP = "Joueur le plus utile";
	$l_LowestPIM = "Joueur qui d&eacute;montre une conduite Gentilhomme";
	$l_GoalieOfTheYear = "Meilleur Gardien ";
	$l_RookieOfTheYear = "Recrue de l'ann&eacute;e";
	$l_TopScorer = "Meilleur Pointeur ";
	$l_DefensemanOfTheYear = "Meilleur Defenseur ";
	$l_MostSportsmanlikePlayer = "Qualit&eacute;s de pers&eacute;v&eacute;rance et de sportivit&eacute;";
	$l_BestDefensiveForward = "Meilleur attaquant defensif ";
	$l_TopGoalScorer = "Meilleur Buteur ";
	$l_LowestGAA = "Gardien(s) avec le Moins de Buts Allou&eacute;s";
	$l_PlayoffMVP = "Joueur le plus utile en series";
	$l_CoachOfTheYear = "Entraineur de l'ann&eacute;e";
	$l_GeneralManager = "G.M. of the Year";
	$l_SelectWinner = "Select a Winner";
	$l_Submit = "Submit Award Winners";
	break; 
} 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("Update trophywinners set TopScorer=%s, MVP=%s, GoalieOfTheYear=%s, DefensemanOfTheYear=%s, RookieOfTheYear=%s, BestDefensiveForward=%s, MostSportsmanlikePlayer=%s, TopGoalScorer=%s, LowestPIM=%s, FarmTopScorer=%s, FarmMVP=%s, FarmGoalieOfTheYear=%s, FarmDefensemanOfTheYear=%s, FarmRookieOfTheYear=%s, FarmBestDefensiveForward=%s, FarmMostSportsmanlikePlayer=%s, FarmTopGoalScorer=%s, FarmLowestPIM=%s, CoachOfTheYear=%s, FarmCoachOfTheYear=%s, GeneralManager=%s, PlayoffMVP=%s, FarmPlayoffMVP=%s WHERE Team=0 AND Season_ID=%s",
                        GetSQLValueString($_POST['TopScorer'], "int"),
						GetSQLValueString($_POST['MVP'], "int"),
						GetSQLValueString($_POST['GoalieOfTheYear'], "int"),
						GetSQLValueString($_POST['DefensemanOfTheYear'], "int"),
						GetSQLValueString($_POST['RookieOfTheYear'], "int"),
						GetSQLValueString($_POST['BestDefensiveForward'], "int"),
						GetSQLValueString($_POST['MostSportsmanlikePlayer'], "int"),
						GetSQLValueString($_POST['TopGoalScorer'], "int"),
						GetSQLValueString($_POST['LowestPIM'], "int"),
						GetSQLValueString($_POST['FarmTopScorer'], "int"),
						GetSQLValueString($_POST['FarmMVP'], "int"),
						GetSQLValueString($_POST['FarmGoalieOfTheYear'], "int"),
						GetSQLValueString($_POST['FarmDefensemanOfTheYear'], "int"),
						GetSQLValueString($_POST['FarmRookieOfTheYear'], "int"),
						GetSQLValueString($_POST['FarmBestDefensiveForward'], "int"),
						GetSQLValueString($_POST['FarmMostSportsmanlikePlayer'], "int"),
						GetSQLValueString($_POST['FarmTopGoalScorer'], "int"),
						GetSQLValueString($_POST['FarmLowestPIM'], "int"),
						GetSQLValueString($_POST['CoachOfTheYear'], "int"),
						GetSQLValueString($_POST['FarmCoachOfTheYear'], "int"),
						GetSQLValueString($_POST['GeneralManager'], "text"),
						GetSQLValueString($_POST['PlayoffMVP'], "int"),
						GetSQLValueString($_POST['PlayoffFarmMVP'], "int"),
					   	GetSQLValueString($_POST['Season_ID'], "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $updateGoTo = "pro_awards.php";
  header(sprintf("Location: %s", $updateGoTo));
}

$team_id=0;
if (isset($_GET['team'])) {
  $team_id = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
}

$season_year=0;
if (isset($_GET['season'])) {
  $season_year = (get_magic_quotes_gpc()) ? $_GET['season'] : addslashes($_GET['season']);
}



$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);
$query_GetTrophies = sprintf("SELECT * FROM trophies");
$GetTrophies = mysql_query($query_GetTrophies, $connection) or die(mysql_error());
$row_GetTrophies = mysql_fetch_assoc($GetTrophies);
$totalRows_GetTrophies = mysql_num_rows($GetTrophies);

$query_GetWinners = sprintf("SELECT * FROM trophywinners WHERE Season_ID=%s AND Team=0",$season_year, $team_id);
$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
$row_GetWinners = mysql_fetch_assoc($GetWinners);
$totalRows_GetWinners = mysql_num_rows($GetWinners);

$query_GetSeasonID = sprintf("SELECT S_ID FROM seasons WHERE Season=%s AND SeasonType=1", $season_year);
$GetSeasonID = mysql_query($query_GetSeasonID, $connection) or die(mysql_error());
$row_GetSeasonID = mysql_fetch_assoc($GetSeasonID);
$totalRows_GetSeasonID = mysql_num_rows($GetSeasonID);
$season_id = $row_GetSeasonID['S_ID'];


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $_SESSION['SiteName'] ; ?></title>

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
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
<h3><?php echo $l_nav_proleague;?></h3>
<br />
<?php 
$query_GetTopScorer = sprintf("SELECT Name, Number, ProPoint FROM playerstats WHERE Season_ID=%s ORDER BY ProPoint desc, ProG desc LIMIT 0, 1", $season_id);
$GetTopScorer = mysql_query($query_GetTopScorer, $connection) or die(mysql_error());
$row_GetTopScorer = mysql_fetch_assoc($GetTopScorer);
$totalRows_GetTopScorer = mysql_num_rows($GetTopScorer);
?>
<div class="rowElem">
<label for="TopScorer"><?php echo $l_TopScorer; ?>:</label>
<select name="TopScorer" size="1">
<?php do {  ?>
<option <?php if ($row_GetWinners['TopScorer'] == $row_GetTopScorer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GetTopScorer['Number']; ?>"><?php echo $row_GetTopScorer['Name']." - ".$row_GetTopScorer['ProPoint']." Points"; ?></option>
<?php } while ($row_GetTopScorer = mysql_fetch_assoc($GetTopScorer)); ?>
</select>
<?php mysql_free_result($GetTopScorer);?>
</div>

<?php 
$query_TopGoalScorer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProG FROM playerstats WHERE playerstats.Season_ID=%s ORDER BY playerstats.ProG desc LIMIT 0, 1", $season_id);
$TopGoalScorer = mysql_query($query_TopGoalScorer, $connection) or die(mysql_error());
$row_TopGoalScorer = mysql_fetch_assoc($TopGoalScorer);
$totalRows_TopGoalScorer = mysql_num_rows($TopGoalScorer);
?>
<div class="rowElem">
<label for="TopGoalScorer"><?php echo $l_TopGoalScorer; ?>:</label>
<select name="TopGoalScorer" size="1">
<?php do {  ?>
<option <?php if ($row_GetWinners['TopGoalScorer'] == $row_TopGoalScorer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_TopGoalScorer['Number']; ?>"><?php echo $row_TopGoalScorer['Name']." - ".$row_TopGoalScorer['ProG']." Goals"; ?></option>
<?php } while ($row_TopGoalScorer = mysql_fetch_assoc($TopGoalScorer)); ?>
</select>
<?php mysql_free_result($TopGoalScorer);?>		
</div>

<?php 
$query_RookieOfTheYear = sprintf("SELECT p.Name, p.Number, p.ProPoint FROM playerstats as p, players as r, trophywinners as t WHERE t.RookieOfTheYear=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.ProPoint desc, p.ProG desc", $season_id);
$RookieOfTheYear = mysql_query($query_RookieOfTheYear, $connection) or die(mysql_error());
$row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear);
$totalRows_RookieOfTheYear = mysql_num_rows($RookieOfTheYear);
$query_RookieOfTheYear2 = sprintf("SELECT g.Name, g.Number, g.ProW as STAT1, g.ProShutouts as STAT2  FROM goaliestats as g, goalies as r, trophywinners as t WHERE t.RookieOfTheYear=g.Number AND t.Team > 0 AND g.Number=r.Number  AND g.Season_ID=%s GROUP BY r.Number ORDER BY STAT1 desc, STAT2 desc", $season_id);
$RookieOfTheYear2 = mysql_query($query_RookieOfTheYear2, $connection) or die(mysql_error());
$row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2);
$totalRows_RookieOfTheYear2 = mysql_num_rows($RookieOfTheYear2);
?>
<div class="rowElem">
<label for="RookieOfTheYear"><?php echo $l_RookieOfTheYear; ?>:</label>
<select name="RookieOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['RookieOfTheYear'] == $row_RookieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_RookieOfTheYear['Number']; ?>"><?php echo $row_RookieOfTheYear['Name']." - ".$row_RookieOfTheYear['ProPoint']." Points"; ?></option>
<?php } while ($row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['RookieOfTheYear'] == ($row_RookieOfTheYear2['Number']+10000) ){ echo 'selected'; } ?> value="<?php echo ($row_RookieOfTheYear2['Number']+10000); ?>"><?php echo $row_RookieOfTheYear2['Name']." - ".$row_RookieOfTheYear2['STAT1']." Wins"; ?></option>
<?php } while ($row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2)); ?>
</select>
<?php
mysql_free_result($RookieOfTheYear);
mysql_free_result($RookieOfTheYear2);
?>
</div>

<?php 
$query_DefensemanOfTheYear = sprintf("SELECT p.Name, p.Number, p.ProShotsBlock, p.ProMinutePlay, p.ProPoint, p.ProPlusMinus FROM playerstats as p, players as r, trophywinners as t WHERE t.DefensemanOfTheYear=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.ProMinutePlay desc, p.ProPoint desc, p.ProShotsBlock desc, p.ProPlusMinus", $season_id);
$DefensemanOfTheYear = mysql_query($query_DefensemanOfTheYear, $connection) or die(mysql_error());
$row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear);
$totalRows_DefensemanOfTheYear = mysql_num_rows($DefensemanOfTheYear);
?>
<div class="rowElem">
<label for="DefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear; ?>:</label>
<select name="DefensemanOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['DefensemanOfTheYear'] == $row_DefensemanOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_DefensemanOfTheYear['Number']; ?>"><?php echo $row_DefensemanOfTheYear['Name']." - ".minutes($row_DefensemanOfTheYear['ProMinutePlay'])." Minutes Played, +".$row_DefensemanOfTheYear['ProPoint']." Points, ".$row_DefensemanOfTheYear['ProShotsBlock']." blocked shots, ".$row_DefensemanOfTheYear['ProPlusMinus']." +/-"; ?></option>
<?php } while ($row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear)); ?>
</select>
<?php mysql_free_result($DefensemanOfTheYear);?>			
</div>

<?php 
$query_BestDefensiveForward = sprintf("SELECT p.Name, p.Number, p.ProPKMinutePlay, p.ProPlusMinus, p.ProShotsBlock  FROM playerstats as p, players as r, trophywinners as t WHERE t.BestDefensiveForward=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.ProPKMinutePlay desc, p.ProPlusMinus desc, p.ProShotsBlock desc", $season_id);
$BestDefensiveForward = mysql_query($query_BestDefensiveForward, $connection) or die(mysql_error());
$row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward);
$totalRows_BestDefensiveForward = mysql_num_rows($BestDefensiveForward);
?>
<div class="rowElem">
<label for="BestDefensiveForward"><?php echo $l_BestDefensiveForward; ?>:</label>
<select name="BestDefensiveForward" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['BestDefensiveForward'] == $row_BestDefensiveForward['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_BestDefensiveForward['Number']; ?>"><?php echo $row_BestDefensiveForward['Name'].", ".minutes($row_BestDefensiveForward['ProPKMinutePlay'])." PK Minutes, ".$row_BestDefensiveForward['ProShotsBlock']." Blocked Shots, ".$row_BestDefensiveForward['ProPlusMinus']." +/-  "; ?></option>
<?php } while ($row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward)); ?>
</select>
<?php mysql_free_result($BestDefensiveForward);?>
</div>

<?php 
$query_MostSportsmanlikePlayer = sprintf("SELECT p.Name, p.Number,  p.ProMinutePlay, r.NumberOfInjury  FROM playerstats as p, players as r, trophywinners as t WHERE t.MostSportsmanlikePlayer=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY r.NumberOfInjury desc, p.ProMinutePlay desc", $season_id);
$MostSportsmanlikePlayer = mysql_query($query_MostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer);
$totalRows_MostSportsmanlikePlayer = mysql_num_rows($MostSportsmanlikePlayer);
?>
<div class="rowElem">
<label for="MostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer; ?>:</label>
<select name="MostSportsmanlikePlayer" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['MostSportsmanlikePlayer'] == $row_MostSportsmanlikePlayer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_MostSportsmanlikePlayer['Number']; ?>"><?php echo $row_MostSportsmanlikePlayer['Name']." - ".$row_MostSportsmanlikePlayer['NumberOfInjury']." Injurys"; ?></option>
<?php } while ($row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer)); ?>
</select>
<?php mysql_free_result($MostSportsmanlikePlayer);?>
</div>

<?php 
$query_LowestPIM = sprintf("SELECT p.Name, p.Number, p.ProPim, p.ProMinutePlay FROM playerstats as p, players as r, trophywinners as t WHERE t.LowestPIM=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.ProMinutePlay desc, p.ProPim", $season_id);
$LowestPIM = mysql_query($query_LowestPIM, $connection) or die(mysql_error());
$row_LowestPIM = mysql_fetch_assoc($LowestPIM);
$totalRows_LowestPIM = mysql_num_rows($LowestPIM);
?>
<div class="rowElem">
<label for="LowestPIM"><?php echo $l_LowestPIM; ?>:</label>
<select name="LowestPIM" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['LowestPIM'] == $row_LowestPIM['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestPIM['Number']; ?>"><?php echo $row_LowestPIM['Name']." - ".$row_LowestPIM['ProPim']." PIM, ".minutes($row_LowestPIM['ProMinutePlay'])." Minutes Played"; ?></option>
<?php } while ($row_LowestPIM = mysql_fetch_assoc($LowestPIM)); ?>
</select>
<?php mysql_free_result($LowestPIM); ?>
</div>

<?php 
$query_GoalieOfTheYear = sprintf("SELECT g.Name, g.Number, g.ProGA, g.ProSA, g.ProMinPlay, ((g.ProGA / g.ProMinPlay) * 60) as GAA FROM goaliestats as g, trophywinners as t WHERE t.GoalieOfTheYear=g.Number AND t.Team > 0 AND g.Season_ID=%s AND g.ProMinPlay > 0 GROUP BY g.Number ORDER BY g.ProMinPlay desc, GAA desc", $season_id);
$GoalieOfTheYear = mysql_query($query_GoalieOfTheYear, $connection) or die(mysql_error());
$row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear);
$totalRows_GoalieOfTheYear = mysql_num_rows($GoalieOfTheYear);
?>
<div class="rowElem">
<label for="GoalieOfTheYear"><?php echo $l_GoalieOfTheYear; ?>:</label>
<select name="GoalieOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['GoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GoalieOfTheYear['Number']; ?>"><?php echo $row_GoalieOfTheYear['Name']." - ".number_format($row_GoalieOfTheYear['ProSA'] / ($row_GoalieOfTheYear['ProGA'] + $row_GoalieOfTheYear['ProSA']),3)." PCT, ".number_format(($row_GoalieOfTheYear['ProGA'] / minutes($row_GoalieOfTheYear['ProMinPlay']))*60,2)." GAA. ".minutes($row_GoalieOfTheYear['ProMinPlay'])." Minutes Played"; ?></option>
<?php } while ($row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear)); ?>
</select>
<?php mysql_free_result($GoalieOfTheYear);?>
</div>

<?php 
$query_LowestGAA = sprintf("SELECT g.Name, g.Number, g.ProGA, g.ProSA, g.ProMinPlay, ((g.ProGA / g.ProMinPlay) * 60) as GAA FROM goaliestats as g WHERE g.Season_ID=%s AND g.ProGP >= 25 GROUP BY g.Number ORDER BY GAA asc , g.ProMinPlay desc limit 0,20", $season_id);
$LowestGAA = mysql_query($query_LowestGAA, $connection) or die(mysql_error());
$row_LowestGAA = mysql_fetch_assoc($LowestGAA);
$totalRows_LowestGAA = mysql_num_rows($LowestGAA);
?>
<div class="rowElem">
<label for="LowestGAA"><?php echo $l_LowestGAA; ?>:</label>
<select name="LowestGAA" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['LowestGAA'] == $row_LowestGAA['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestGAA['Number']; ?>"><?php echo $row_LowestGAA['Name']." - ".number_format(($row_LowestGAA['ProGA'] / minutes($row_LowestGAA['ProMinPlay']))*60,2)." GAA. ".minutes($row_LowestGAA['ProMinPlay'])." Minutes Played"; ?></option>
<?php } while ($row_LowestGAA = mysql_fetch_assoc($LowestGAA)); ?>
</select>
<?php mysql_free_result($LowestGAA);?>
</div>

<?php 
$query_CoachOfTheYear = sprintf("SELECT c.Name, c.Number, p.City, s.Point, s.W, s.L, s.T, s.OTL, s.OTW, s.SOL, s.SOW, s.GF FROM coaches as c, proteam as p, proteamstandings as s WHERE c.Team=p.Name AND p.Number=s.Number AND s.Season_ID=%s GROUP BY c.Number ORDER BY s.Point, s.W, s.GF", $season_id);
$CoachOfTheYear = mysql_query($query_CoachOfTheYear, $connection) or die(mysql_error());
$row_CoachOfTheYear = mysql_fetch_assoc($CoachOfTheYear);
$totalRows_CoachOfTheYear = mysql_num_rows($CoachOfTheYear);
?>
<div class="rowElem">
<label for="CoachOfTheYear"><?php echo $l_CoachOfTheYear; ?>:</label>
<select name="CoachOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['CoachOfTheYear'] == $row_CoachOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_CoachOfTheYear['Number']; ?>"><?php echo $row_CoachOfTheYear['Name']." - ".$row_CoachOfTheYear['City']." - ".$row_CoachOfTheYear['Point']." Points, ".($row_CoachOfTheYear['W']+$row_CoachOfTheYear['OTW']+$row_CoachOfTheYear['SOW'])."-".($row_CoachOfTheYear['L']+$row_CoachOfTheYear['OTL']+$row_CoachOfTheYear['SOL'])."-".$row_CoachOfTheYear['T'].", ".$row_CoachOfTheYear['GF']." goals for"; ?></option>
<?php } while ($row_CoachOfTheYear = mysql_fetch_assoc($CoachOfTheYear)); ?>
</select>
<?php mysql_free_result($CoachOfTheYear);?>			
</div>

<?php 
$query_GetMVP = sprintf("SELECT p.Name, p.Number, p.ProPoint as STAT1, p.ProG as STAT2 FROM playerstats as p, trophywinners as t WHERE t.MVP=p.Number AND t.Team > 0 AND p.Season_ID=%s GROUP BY p.Number ORDER BY STAT1 desc, STAT2 desc", $season_id);
$GetMVP = mysql_query($query_GetMVP, $connection) or die(mysql_error());
$row_GetMVP = mysql_fetch_assoc($GetMVP);
$totalRows_GetMVP = mysql_num_rows($GetMVP);
$query_GetMVP2 = sprintf("SELECT g.Name, g.Number, g.ProW as STAT1, g.ProShutouts as STAT2  FROM goaliestats as g, trophywinners as t WHERE t.MVP=g.Number AND t.Team > 0 AND g.Season_ID=%s GROUP BY g.Number ORDER BY STAT1 desc, STAT2 desc", $season_id);
$GetMVP2 = mysql_query($query_GetMVP2, $connection) or die(mysql_error());
$row_GetMVP2 = mysql_fetch_assoc($GetMVP2);
$totalRows_GetMVP2 = mysql_num_rows($GetMVP2);
?>
<div class="rowElem">
<label for="MVP"><?php echo $l_MVP; ?>:</label>
<select name="MVP" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['MVP'] == $row_GetMVP['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GetMVP['Number']; ?>"><?php echo $row_GetMVP['Name']." - ".$row_GetMVP['STAT1']." Points"; ?></option>
<?php } while ($row_GetMVP = mysql_fetch_assoc($GetMVP)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['MVP'] == ($row_GetMVP2['Number']+10000) ){ echo 'selected'; } ?> value="<?php echo ($row_GetMVP2['Number']+10000); ?>"><?php echo $row_GetMVP2['Name']." - ".$row_GetMVP2['STAT1']." Wins"; ?></option>
<?php } while ($row_GetMVP2 = mysql_fetch_assoc($GetMVP2)); ?>
</select>
<?php
mysql_free_result($GetMVP);
mysql_free_result($GetMVP2);
?>	
</div>

<?php 
$query_GetPlayoffMVP = sprintf("SELECT p.Name, p.Number, p.ProPoint as STAT1, p.ProG as STAT2, p.ProMinutePlay as STAT3, p.ProG, p.ProGP, p.ProPlusMinus, p.ProPKMinutePlay, p.ProShotsBlock FROM playerstats as p, seasons as s WHERE s.S_ID=p.Season_ID  AND s.Season=%s AND s.SeasonType=0 GROUP BY p.Number ORDER BY STAT1 desc, STAT2 desc, STAT3 desc, p.ProShotsBlock desc limit 0,20", $season_year);
$GetPlayoffMVP = mysql_query($query_GetPlayoffMVP, $connection) or die(mysql_error());
$row_GetPlayoffMVP = mysql_fetch_assoc($GetPlayoffMVP);
$totalRows_GetPlayoffMVP = mysql_num_rows($GetPlayoffMVP);
$query_GetPlayoffMVP2 = sprintf("SELECT g.Name, g.Number, g.ProW, g.ProGA as STAT1, g.ProSA as STAT2, g.ProMinPlay as STAT3  FROM goaliestats as g, seasons as s WHERE s.S_ID=g.Season_ID  AND  s.Season=%s AND s.SeasonType=0 GROUP BY g.Number ORDER BY g.ProW desc, STAT3 desc, STAT1 asc, STAT2 desc limit 0,10", $season_year);
$GetPlayoffMVP2 = mysql_query($query_GetPlayoffMVP2, $connection) or die(mysql_error());
$row_GetPlayoffMVP2 = mysql_fetch_assoc($GetPlayoffMVP2);
$totalRows_GetPlayoffMVP2 = mysql_num_rows($GetPlayoffMVP2);
?>
<div class="rowElem">
<label for="PlayoffMVP"><?php echo $l_PlayoffMVP; ?>:</label>
<select name="PlayoffMVP" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['PlayoffMVP'] == $row_GetPlayoffMVP['Number'] ){ echo 'selected'; } ?>  value="<?php echo $row_GetPlayoffMVP['Number']; ?>"><?php echo $row_GetPlayoffMVP['Name']." - ".$row_GetPlayoffMVP['ProG']." Goals ".$row_GetPlayoffMVP['STAT1']." Points, ".minutes($row_GetPlayoffMVP['ProPKMinutePlay'])." PK Minutes, ".$row_GetPlayoffMVP['ProShotsBlock']." Blocked Shots, ".$row_GetPlayoffMVP['ProPlusMinus']." +/-  "; ?></option>
<?php } while ($row_GetPlayoffMVP = mysql_fetch_assoc($GetPlayoffMVP)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['PlayoffMVP'] == ($row_GetPlayoffMVP2['Number']+10000) ){ echo 'selected'; } ?>  value="<?php echo ($row_GetPlayoffMVP2['Number']+10000); ?>"><?php echo $row_GetPlayoffMVP2['Name']." - Wins ".$row_GetPlayoffMVP2['ProW']." - ".number_format($row_GetPlayoffMVP2['STAT2'] / ($row_GetPlayoffMVP2['STAT1'] + $row_GetPlayoffMVP2['STAT2']),3)." PCT, ".number_format(($row_GetPlayoffMVP2['STAT1'] / minutes($row_GetPlayoffMVP2['STAT3']))*60,2)." GAA. ".minutes($row_GetPlayoffMVP2['STAT3'])." Minutes Played"; ?></option>
<?php } while ($row_GetPlayoffMVP2 = mysql_fetch_assoc($GetPlayoffMVP2)); ?>
</select>
<?php
mysql_free_result($GetPlayoffMVP);
mysql_free_result($GetPlayoffMVP2);
?>	
</div>

<?php 
$query_GeneralManager = sprintf("SELECT p.GM, p.City, s.Point, s.W, s.L, s.T, s.OTL, s.OTW, s.SOL, s.SOW, s.GF FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND s.Season_ID=%s ORDER BY s.Point, s.W, s.GF", $season_id);
$GeneralManager = mysql_query($query_GeneralManager, $connection) or die(mysql_error());
$row_GeneralManager = mysql_fetch_assoc($GeneralManager);
$totalRows_GeneralManager = mysql_num_rows($GeneralManager);
?>
<div class="rowElem">
<label for="GeneralManager"><?php echo $l_GeneralManager; ?>:</label>
<select name="GeneralManager" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['GeneralManager'] == $row_GeneralManager['GM'] ){ echo 'selected'; } ?> value="<?php echo $row_GeneralManager['GM']; ?>"><?php echo $row_GeneralManager['GM']." - ".$row_GeneralManager['City']." - ".$row_GeneralManager['Point']." Points, ".($row_GeneralManager['W']+$row_GeneralManager['OTW']+$row_GeneralManager['SOW'])."-".($row_GeneralManager['L']+$row_GeneralManager['OTL']+$row_GeneralManager['SOL'])."-".$row_GeneralManager['T'].", ".$row_GeneralManager['GF']." goals for"; ?></option>
<?php } while ($row_GeneralManager = mysql_fetch_assoc($GeneralManager)); ?>
</select>
<?php mysql_free_result($GeneralManager);?>			
</div>

<br /><br /><br /><br />
<h3><?php echo $l_nav_farmleague;?></h3>
<br />
<?php 
$query_GetTopScorer = sprintf("SELECT Name, Number, ProPoint FROM playerstats WHERE Season_ID=%s ORDER BY FarmPoint desc, FarmG desc LIMIT 0, 1", $season_id);
$GetTopScorer = mysql_query($query_GetTopScorer, $connection) or die(mysql_error());
$row_GetTopScorer = mysql_fetch_assoc($GetTopScorer);
$totalRows_GetTopScorer = mysql_num_rows($GetTopScorer);
?>
<div class="rowElem">
<label for="FarmTopScorer"><?php echo $l_TopScorer; ?>:</label>
<select name="FarmTopScorer" size="1">
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmTopScorer'] == $row_GetTopScorer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GetTopScorer['Number']; ?>"><?php echo $row_GetTopScorer['Name']." - ".$row_GetTopScorer['FarmPoint']." Points"; ?></option>
<?php } while ($row_GetTopScorer = mysql_fetch_assoc($GetTopScorer)); ?>
</select>
<?php mysql_free_result($GetTopScorer);?>
</div>

<?php 
$query_TopGoalScorer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmG FROM playerstats WHERE playerstats.Season_ID=%s ORDER BY playerstats.FarmG desc LIMIT 0, 1", $season_id);
$TopGoalScorer = mysql_query($query_TopGoalScorer, $connection) or die(mysql_error());
$row_TopGoalScorer = mysql_fetch_assoc($TopGoalScorer);
$totalRows_TopGoalScorer = mysql_num_rows($TopGoalScorer);
?>
<div class="rowElem">
<label for="FarmTopGoalScorer"><?php echo $l_TopGoalScorer; ?>:</label>
<select name="FarmTopGoalScorer" size="1">
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmTopGoalScorer'] == $row_TopGoalScorer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_TopGoalScorer['Number']; ?>"><?php echo $row_TopGoalScorer['Name']." - ".$row_TopGoalScorer['FarmG']." Goals"; ?></option>
<?php } while ($row_TopGoalScorer = mysql_fetch_assoc($TopGoalScorer)); ?>
</select>
<?php mysql_free_result($TopGoalScorer);?>		
</div>

<?php 
$query_RookieOfTheYear = sprintf("SELECT p.Name, p.Number, p.FarmPoint FROM playerstats as p, players as r, trophywinners as t WHERE t.FarmRookieOfTheYear=p.Number AND t.Team > 0 AND p.Number=r.Number  AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.FarmPoint desc, p.FarmG desc", $season_id);
$RookieOfTheYear = mysql_query($query_RookieOfTheYear, $connection) or die(mysql_error());
$row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear);
$totalRows_RookieOfTheYear = mysql_num_rows($RookieOfTheYear);
$query_RookieOfTheYear2 = sprintf("SELECT g.Name, g.Number, g.FarmW as STAT1, g.FarmShutouts as STAT2  FROM goaliestats as g, goalies as r, trophywinners as t WHERE t.FarmRookieOfTheYear=g.Number AND t.Team > 0 AND g.Name=r.Name  AND g.Season_ID=%s GROUP BY r.Number ORDER BY STAT1 desc, STAT2 desc", $season_id);
$RookieOfTheYear2 = mysql_query($query_RookieOfTheYear2, $connection) or die(mysql_error());
$row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2);
$totalRows_RookieOfTheYear2 = mysql_num_rows($RookieOfTheYear2);
?>
<div class="rowElem">
<label for="FarmRookieOfTheYear"><?php echo $l_RookieOfTheYear; ?>:</label>
<select name="FarmRookieOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmRookieOfTheYear'] == $row_RookieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_RookieOfTheYear['Number']; ?>"><?php echo $row_RookieOfTheYear['Name']." - ".$row_RookieOfTheYear['FarmPoint']." Points"; ?></option>
<?php } while ($row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmRookieOfTheYear'] == ($row_RookieOfTheYear2['Number']+10000) ){ echo 'selected'; } ?> value="<?php echo ($row_RookieOfTheYear2['Number']+10000); ?>"><?php echo $row_RookieOfTheYear2['Name']." - ".$row_RookieOfTheYear2['STAT1']." Wins"; ?></option>
<?php } while ($row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2)); ?>
</select>
<?php
mysql_free_result($RookieOfTheYear);
mysql_free_result($RookieOfTheYear2);
?>
</div>

<?php 
$query_DefensemanOfTheYear = sprintf("SELECT p.Name, p.Number, p.FarmShotsBlock, p.FarmMinutePlay, p.FarmPoint, p.FarmPlusMinus FROM playerstats as p, players as r, trophywinners as t WHERE t.FarmDefensemanOfTheYear=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.FarmMinutePlay desc, p.FarmPoint desc, p.FarmShotsBlock desc, p.FarmPlusMinus", $season_id);
$DefensemanOfTheYear = mysql_query($query_DefensemanOfTheYear, $connection) or die(mysql_error());
$row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear);
$totalRows_DefensemanOfTheYear = mysql_num_rows($DefensemanOfTheYear);
?>
<div class="rowElem">
<label for="FarmDefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear; ?>:</label>
<select name="FarmDefensemanOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmDefensemanOfTheYear'] == $row_DefensemanOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_DefensemanOfTheYear['Number']; ?>"><?php echo $row_DefensemanOfTheYear['Name']." - ".minutes($row_DefensemanOfTheYear['FarmMinutePlay'])." Minutes Played, +".$row_DefensemanOfTheYear['FarmPoint']." Points, ".$row_DefensemanOfTheYear['FarmShotsBlock']." blocked shots, ".$row_DefensemanOfTheYear['FarmPlusMinus']." +/-"; ?></option>
<?php } while ($row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear)); ?>
</select>
<?php mysql_free_result($DefensemanOfTheYear);?>			
</div>

<?php 
$query_BestDefensiveForward = sprintf("SELECT p.Name, p.Number, p.FarmPKMinutePlay, p.FarmPlusMinus, p.FarmShotsBlock  FROM playerstats as p, players as r, trophywinners as t WHERE t.FarmBestDefensiveForward=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.FarmPKMinutePlay desc, p.FarmPlusMinus desc, p.FarmShotsBlock desc", $season_id);
$BestDefensiveForward = mysql_query($query_BestDefensiveForward, $connection) or die(mysql_error());
$row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward);
$totalRows_BestDefensiveForward = mysql_num_rows($BestDefensiveForward);
?>
<div class="rowElem">
<label for="FarmBestDefensiveForward"><?php echo $l_BestDefensiveForward; ?>:</label>
<select name="FarmBestDefensiveForward" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmBestDefensiveForward'] == $row_BestDefensiveForward['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_BestDefensiveForward['Number']; ?>"><?php echo $row_BestDefensiveForward['Name'].", ".minutes($row_BestDefensiveForward['FarmPKMinutePlay'])." PK Minutes, ".$row_BestDefensiveForward['FarmShotsBlock']." Blocked Shots, ".$row_BestDefensiveForward['FarmPlusMinus']." +/-  "; ?></option>
<?php } while ($row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward)); ?>
</select>
<?php mysql_free_result($BestDefensiveForward);?>
</div>

<?php 
$query_MostSportsmanlikePlayer = sprintf("SELECT p.Name, p.Number, p.FarmMinutePlay, r.NumberOfInjury  FROM playerstats as p, players as r, trophywinners as t WHERE t.FarmMostSportsmanlikePlayer=p.Number AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY r.NumberOfInjury desc, p.FarmMinutePlay desc", $season_id);
$MostSportsmanlikePlayer = mysql_query($query_MostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer);
$totalRows_MostSportsmanlikePlayer = mysql_num_rows($MostSportsmanlikePlayer);
?>
<div class="rowElem">
<label for="FarmMostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer; ?>:</label>
<select name="FarmMostSportsmanlikePlayer" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmMostSportsmanlikePlayer'] == $row_MostSportsmanlikePlayer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_MostSportsmanlikePlayer['Number']; ?>"><?php echo $row_MostSportsmanlikePlayer['Name']." - ".$row_MostSportsmanlikePlayer['NumberOfInjury']." Injurys"; ?></option>
<?php } while ($row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer)); ?>
</select>
<?php mysql_free_result($MostSportsmanlikePlayer);?>
</div>

<?php 
$query_LowestPIM = sprintf("SELECT p.Name, p.Number, p.FarmPim, p.FarmMinutePlay FROM playerstats as p, players as r, trophywinners as t WHERE t.FarmLowestPIM=p.Name AND t.Team > 0 AND p.Number=r.Number AND p.Season_ID=%s GROUP BY r.Number ORDER BY p.FarmMinutePlay desc, p.FarmPim", $season_id);
$LowestPIM = mysql_query($query_LowestPIM, $connection) or die(mysql_error());
$row_LowestPIM = mysql_fetch_assoc($LowestPIM);
$totalRows_LowestPIM = mysql_num_rows($LowestPIM);
?>
<div class="rowElem">
<label for="FarmLowestPIM"><?php echo $l_LowestPIM; ?>:</label>
<select name="FarmLowestPIM" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmLowestPIM'] == $row_LowestPIM['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestPIM['Number']; ?>"><?php echo $row_LowestPIM['Name']." - ".$row_LowestPIM['FarmPim']." PIM, ".minutes($row_LowestPIM['FarmMinutePlay'])." Minutes Played"; ?></option>
<?php } while ($row_LowestPIM = mysql_fetch_assoc($LowestPIM)); ?>
</select>
<?php mysql_free_result($LowestPIM); ?>
</div>

<?php 
$query_GoalieOfTheYear = sprintf("SELECT g.Name, g.Number, g.FarmGA, g.FarmSA, g.FarmMinPlay, ((g.FarmGA / g.FarmMinPlay) * 60) as GAA FROM goaliestats as g, trophywinners as t WHERE t.FarmGoalieOfTheYear=g.Number AND t.Team > 0 AND g.Season_ID=%s AND g.FarmMinPlay > 0 GROUP BY g.Number ORDER BY g.FarmMinPlay desc, GAA desc", $season_id);
$GoalieOfTheYear = mysql_query($query_GoalieOfTheYear, $connection) or die(mysql_error());
$row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear);
$totalRows_GoalieOfTheYear = mysql_num_rows($GoalieOfTheYear);
?>
<div class="rowElem">
<label for="FarmGoalieOfTheYear"><?php echo $l_GoalieOfTheYear; ?>:</label>
<select name="FarmGoalieOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<?php if($row_GoalieOfTheYear['FarmMinPlay']==0 || $row_GoalieOfTheYear['FarmMinPlay']== NULL){
	echo "<option ";
	if ($row_GetWinners['FarmMVP'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } 
	echo 'value="'.$row_GoalieOfTheYear["Number"].'">'.$row_GoalieOfTheYear['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['FarmGoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GoalieOfTheYear['Number']; ?>"><?php echo $row_GoalieOfTheYear['Name']." - ".number_format($row_GoalieOfTheYear['FarmSA'] / ($row_GoalieOfTheYear['FarmGA'] + $row_GoalieOfTheYear['FarmSA']),3)." PCT, ".number_format(($row_GoalieOfTheYear['FarmGA'] / minutes($row_GoalieOfTheYear['FarmMinPlay']))*60,2)." GAA. ".minutes($row_GoalieOfTheYear['FarmMinPlay'])." Minutes Played"; ?></option>
<?php }} while ($row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear)); ?>
</select>
<?php mysql_free_result($GoalieOfTheYear);?>
</div>

<?php 
$query_LowestGAA = sprintf("SELECT g.Name, g.Number, g.FarmGA, g.FarmSA, g.FarmMinPlay, ((g.FarmGA / g.FarmMinPlay) * 60) as GAA FROM goaliestats as g WHERE g.Season_ID=%s AND g.FarmGP >= 25 GROUP BY g.Number ORDER BY GAA asc , g.FarmMinPlay desc limit 0,20", $season_id);
$LowestGAA = mysql_query($query_LowestGAA, $connection) or die(mysql_error());
$row_LowestGAA = mysql_fetch_assoc($LowestGAA);
$totalRows_LowestGAA = mysql_num_rows($LowestGAA);
?>
<div class="rowElem">
<label for="FarmLowestGAA"><?php echo $l_LowestGAA; ?>:</label>
<select name="FarmLowestGAA" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<?php if($row_LowestGAA['FarmMinPlay']==0 || $row_LowestGAA['FarmMinPlay']== NULL){
	echo "<option ";
	if ($row_GetWinners['FarmMVP'] == $row_LowestGAA['Number'] ){ echo 'selected'; } 
	echo 'value="'.$row_LowestGAA["Number"].'">'.$row_LowestGAA['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['FarmLowestGAA'] == $row_LowestGAA['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestGAA['Number']; ?>"><?php echo $row_LowestGAA['Name']." - ".number_format(($row_LowestGAA['FarmGA'] / minutes($row_LowestGAA['FarmMinPlay']))*60,2)." GAA. ".minutes($row_LowestGAA['FarmMinPlay'])." Minutes Played"; ?></option>
<?php }} while ($row_LowestGAA = mysql_fetch_assoc($LowestGAA)); ?>
</select>
<?php mysql_free_result($LowestGAA);?>
</div>

<?php 
$query_CoachOfTheYear = sprintf("SELECT c.Number, c.Name, p.Name as City, s.Point, s.W, s.L, s.T, s.OTL, s.OTW, s.SOL, s.SOW, s.GF FROM coaches as c, farmteam as p, farmteamstandings as s WHERE c.Team=p.Name AND p.Number=s.Number AND s.Season_ID=%s GROUP BY c.Number ORDER BY s.Point, s.W, s.GF", $season_id);
$CoachOfTheYear = mysql_query($query_CoachOfTheYear, $connection) or die(mysql_error());
$row_CoachOfTheYear = mysql_fetch_assoc($CoachOfTheYear);
$totalRows_CoachOfTheYear = mysql_num_rows($CoachOfTheYear);
?>
<div class="rowElem">
<label for="FarmCoachOfTheYear"><?php echo $l_CoachOfTheYear; ?>:</label>
<select name="FarmCoachOfTheYear" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmCoachOfTheYear'] == $row_CoachOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_CoachOfTheYear['Number']; ?>"><?php echo $row_CoachOfTheYear['Name']." - ".$row_CoachOfTheYear['City']." - ".$row_CoachOfTheYear['Point']." Points, ".($row_CoachOfTheYear['W']+$row_CoachOfTheYear['OTW']+$row_CoachOfTheYear['SOW'])."-".($row_CoachOfTheYear['L']+$row_CoachOfTheYear['OTL']+$row_CoachOfTheYear['SOL'])."-".$row_CoachOfTheYear['T'].", ".$row_CoachOfTheYear['GF']." goals for"; ?></option>
<?php } while ($row_CoachOfTheYear = mysql_fetch_assoc($CoachOfTheYear)); ?>
</select>
<?php mysql_free_result($CoachOfTheYear);?>			
</div>

<?php 
$query_GetMVP = sprintf("SELECT p.Name, p.Number, p.FarmShotsBlock, p.FarmPoint as STAT1, p.FarmG as STAT2 FROM playerstats as p, trophywinners as t WHERE t.FarmMVP=p.Number AND t.Team > 0 AND p.Season_ID=%s GROUP BY p.Number ORDER BY STAT1 desc, STAT2 desc, p.FarmShotsBlock desc", $season_id);
$GetMVP = mysql_query($query_GetMVP, $connection) or die(mysql_error());
$row_GetMVP = mysql_fetch_assoc($GetMVP);
$totalRows_GetMVP = mysql_num_rows($GetMVP);
$query_GetMVP2 = sprintf("SELECT g.Name, g.Number, g.FarmW as STAT1, g.FarmShutouts as STAT2  FROM goaliestats as g, trophywinners as t WHERE t.FarmMVP=g.Number AND t.Team > 0 AND g.Season_ID=%s GROUP BY g.Number ORDER BY STAT1 desc, STAT2 desc", $season_id);
$GetMVP2 = mysql_query($query_GetMVP2, $connection) or die(mysql_error());
$row_GetMVP2 = mysql_fetch_assoc($GetMVP2);
$totalRows_GetMVP2 = mysql_num_rows($GetMVP2);
?>
<div class="rowElem">
<label for="FarmMVP"><?php echo $l_MVP; ?>:</label>
<select name="FarmMVP" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmMVP'] == $row_GetMVP['Number'] ){ echo 'selected'; } ?>  value="<?php echo $row_GetMVP['Number']; ?>"><?php echo $row_GetMVP['Name']." - ".$row_GetMVP['STAT1']." Points"; ?></option>
<?php } while ($row_GetMVP = mysql_fetch_assoc($GetMVP)); ?>
<?php do {  ?>
<?php if($row_GetMVP2['STAT3']==0 || $row_GetMVP2['STAT3']== NULL){
	echo "<option ";
	if ($row_GetWinners['FarmMVP'] == ($row_GetMVP2['Number']+10000) ){ echo 'selected'; } 
	echo 'value="'.($row_GetMVP2["Number"]+10000).'">'.$row_GetMVP2['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['FarmMVP'] == ($row_GetMVP2['Number']+10000) ){ echo 'selected'; } ?>  value="<?php echo ($row_GetMVP2['Number']+10000); ?>"><?php echo $row_GetMVP2['Name']." - ".$row_GetMVP2['STAT1']." Wins"; ?></option>
<?php }} while ($row_GetMVP2 = mysql_fetch_assoc($GetMVP2)); ?>
</select>
<?php
mysql_free_result($GetMVP);
mysql_free_result($GetMVP2);
?>	
</div>

<?php 
$query_GetPlayoffMVP = sprintf("SELECT p.Name, p.Number, p.FarmPoint as STAT1, p.FarmG as STAT2, p.FarmMinutePlay as STAT3, p.FarmG, p.FarmGP, p.FarmPlusMinus, p.FarmPKMinutePlay, p.FarmShotsBlock FROM playerstats as p, seasons as s WHERE s.S_ID=p.Season_ID  AND s.Season=%s AND s.SeasonType=0 GROUP BY p.Number ORDER BY p.FarmGP desc, STAT1 desc, STAT2 desc, STAT3 desc limit 0,20", $season_year);
$GetPlayoffMVP = mysql_query($query_GetPlayoffMVP, $connection) or die(mysql_error());
$row_GetPlayoffMVP = mysql_fetch_assoc($GetPlayoffMVP);
$totalRows_GetPlayoffMVP = mysql_num_rows($GetPlayoffMVP);
$query_GetPlayoffMVP2 = sprintf("SELECT g.Name, g.Number, g.FarmW, g.FarmGA as STAT1, g.FarmSA as STAT2, g.FarmMinPlay as STAT3  FROM goaliestats as g, seasons as s WHERE s.S_ID=g.Season_ID  AND  s.Season=%s AND s.SeasonType=0 GROUP BY g.Number ORDER BY g.FarmW desc, STAT3 desc, STAT1 asc, STAT2 desc limit 0,10", $season_year);
$GetPlayoffMVP2 = mysql_query($query_GetPlayoffMVP2, $connection) or die(mysql_error());
$row_GetPlayoffMVP2 = mysql_fetch_assoc($GetPlayoffMVP2);
$totalRows_GetPlayoffMVP2 = mysql_num_rows($GetPlayoffMVP2);
?>
<div class="rowElem">
<label for="FarmPlayoffMVP"><?php echo $l_PlayoffMVP; ?>:</label>
<select name="FarmPlayoffMVP" size="1">
<option selected="selected" value=""><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmPlayoffMVP'] == $row_PlayoffMVP['Number'] ){ echo 'selected'; } ?>  value="<?php echo $row_GetPlayoffMVP['Number']; ?>"><?php echo $row_GetPlayoffMVP['Name']." - ".$row_GetPlayoffMVP['FarmG']." Goals ".$row_GetPlayoffMVP['STAT1']." Points, ".minutes($row_GetPlayoffMVP['FarmPKMinutePlay'])." PK Minutes, ".$row_GetPlayoffMVP['FarmShotsBlock']." Blocked Shots, ".$row_GetPlayoffMVP['FarmPlusMinus']." +/-  "; ?></option>
<?php } while ($row_GetPlayoffMVP = mysql_fetch_assoc($GetPlayoffMVP)); ?>
<?php do {  ?>
<?php if($row_GetPlayoffMVP2['STAT3']==0 || $row_GetPlayoffMVP2['STAT3']== NULL){
	echo "<option ";
	if ($row_GetWinners['FarmPlayoffMVP'] == ($row_GetPlayoffMVP2['Number']+10000) ){ echo 'selected'; } 
	echo 'value="'.($row_GetPlayoffMVP2["Number"]+10000).'">'.$row_GetPlayoffMVP2['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['FarmPlayoffMVP'] == ($row_GetPlayoffMVP2['Number']+10000) ){ echo 'selected'; } ?>  value="<?php echo ($row_GetPlayoffMVP2['Number']+10000); ?>"><?php echo $row_GetPlayoffMVP2['Name']." - Wins ".$row_GetPlayoffMVP2['FarmW']." - ".number_format($row_GetPlayoffMVP2['STAT2'] / ($row_GetPlayoffMVP2['STAT1'] + $row_GetPlayoffMVP2['STAT2']),3)." PCT, ".number_format(($row_GetPlayoffMVP2['STAT1'] / minutes($row_GetPlayoffMVP2['STAT3']))*60,2)." GAA. ".minutes($row_GetPlayoffMVP2['STAT3'])." Minutes Played"; ?></option>
<?php }} while ($row_GetPlayoffMVP2 = mysql_fetch_assoc($GetPlayoffMVP2)); ?>
</select>
<?php
mysql_free_result($GetPlayoffMVP);
mysql_free_result($GetPlayoffMVP2);
?>	
</div>

<div class="rowElem">
<label for="submit"></label>
<input type="submit" value="<?php echo $l_Submit;?>" class="button edit" />
</div>

<input type="hidden" name="Season_ID" value="<?php echo $season_year; ?>">
<input type="hidden" name="MM_insert" value="form1">
</form>

<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
