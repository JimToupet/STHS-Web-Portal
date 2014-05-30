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
	$l_PlayoffMVP = "Most Valuable Player in Playoffs";
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
	$l_SelectWinner = "Select a Winner";
	$l_Submit = "Submit Award Winners";
	break; 
} 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("Update trophywinners set TopScorer=%s,MVP=%s,GoalieOfTheYear=%s,DefensemanOfTheYear=%s,RookieOfTheYear=%s,BestDefensiveForward=%s,MostSportsmanlikePlayer=%s,TopGoalScorer=%s,LowestPIM=%s,FarmTopScorer=%s,FarmMVP=%s,FarmGoalieOfTheYear=%s,FarmDefensemanOfTheYear=%s,FarmRookieOfTheYear=%s,FarmBestDefensiveForward=%s,FarmMostSportsmanlikePlayer=%s,FarmTopGoalScorer=%s,FarmLowestPIM=%s WHERE Team=%s AND Season_ID=%s",
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
					   	GetSQLValueString($_POST['Team'], "int"),
					   	GetSQLValueString($_POST['Season_ID'], "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  $updateGoTo = "pro_team_awards.php";
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

$query_GetWinners = sprintf("SELECT * FROM trophywinners WHERE Season_ID=%s AND Team=%s",$season_year, $team_id);
$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
$row_GetWinners = mysql_fetch_assoc($GetWinners);
$totalRows_GetWinners = mysql_num_rows($GetWinners);

$query_GetSeasonID = sprintf("SELECT S_ID, Season FROM seasons WHERE Season=%s AND SeasonType=1", $season_year);
$GetSeasonID = mysql_query($query_GetSeasonID, $connection) or die(mysql_error());
$row_GetSeasonID = mysql_fetch_assoc($GetSeasonID);
$totalRows_GetSeasonID = mysql_num_rows($GetSeasonID);
$season_id = $row_GetSeasonID['S_ID'];
$season_selected = $row_GetSeasonID['Season'];
$AgeMod = 26 + ($_SESSION['current_Season'] - $row_GetSeasonID['Season']);


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
$query_GetTopScorer = sprintf("SELECT Name, Number, ProPoint FROM playerstats WHERE Season_ID=%s AND Team=%s ORDER BY ProPoint desc, ProG desc LIMIT 0, 1", $season_id, $team_id);
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
$query_TopGoalScorer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProG FROM playerstats WHERE playerstats.Season_ID=%s  AND playerstats.Team=%s ORDER BY playerstats.ProG desc LIMIT 0, 1", $season_id, $team_id );
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
$query_RookieOfTheYear = sprintf("SELECT players.Rookie, playerstats.Name, playerstats.Number, playerstats.ProPoint FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s AND playerstats.Team=%s AND players.Age <= %s GROUP BY players.Number ORDER BY playerstats.ProPoint desc, playerstats.ProG desc  ", $season_id, $team_id, $AgeMod);
$RookieOfTheYear = mysql_query($query_RookieOfTheYear, $connection) or die(mysql_error());
$row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear);
$totalRows_RookieOfTheYear = mysql_num_rows($RookieOfTheYear);
$query_RookieOfTheYear2 = sprintf("SELECT goalies.Rookie, goaliestats.Name, goaliestats.Number, goaliestats.ProW as STAT1, goaliestats.ProShutouts as STAT2  FROM goaliestats, goalies WHERE goaliestats.Name=goalies.Name AND goaliestats.Season_ID=%s AND goalies.Team=%s AND goalies.Age <= %s ORDER BY STAT1 desc, STAT2 desc LIMIT 0,2", $season_id, $team_id, $AgeMod);
$RookieOfTheYear2 = mysql_query($query_RookieOfTheYear2, $connection) or die(mysql_error());
$row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2);
$totalRows_RookieOfTheYear2 = mysql_num_rows($RookieOfTheYear2);
?>
<div class="rowElem">
<label for="RookieOfTheYear"><?php echo $l_RookieOfTheYear; ?>:</label>
<select name="RookieOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
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
$query_DefensemanOfTheYear = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProShotsBlock, playerstats.ProMinutePlay, playerstats.ProPoint, playerstats.ProPlusMinus FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s  AND playerstats.Team=%s AND (players.PosD='True' OR players.PosD='Vrai') GROUP BY players.Number ORDER BY playerstats.ProMinutePlay desc, playerstats.ProPoint desc, playerstats.ProShotsBlock desc, playerstats.ProPlusMinus desc", $season_id, $team_id);
$DefensemanOfTheYear = mysql_query($query_DefensemanOfTheYear, $connection) or die(mysql_error());
$row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear);
$totalRows_DefensemanOfTheYear = mysql_num_rows($DefensemanOfTheYear);
?>
<div class="rowElem">
<label for="DefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear; ?>:</label>
<select name="DefensemanOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['DefensemanOfTheYear'] == $row_DefensemanOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_DefensemanOfTheYear['Number']; ?>"><?php echo $row_DefensemanOfTheYear['Name']." - ".minutes($row_DefensemanOfTheYear['ProMinutePlay'])." Minutes Played, +".$row_DefensemanOfTheYear['ProPoint']." Points, ".$row_DefensemanOfTheYear['ProShotsBlock']." blocked shots, ".$row_DefensemanOfTheYear['ProPlusMinus']." +/-"; ?></option>
<?php } while ($row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear)); ?>
</select>
<?php mysql_free_result($DefensemanOfTheYear);?>			
</div>

<?php 
$query_BestDefensiveForward = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProPKMinutePlay, playerstats.ProPlusMinus, playerstats.ProShotsBlock  FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s AND playerstats.Team=%s AND (players.PosC='True' OR players.PosRW='True' OR players.PosLW='True' OR players.PosC='Vrai' OR players.PosRW='Vrai' OR players.PosLW='Vrai') GROUP BY players.Number ORDER BY playerstats.ProPKMinutePlay desc, playerstats.ProPlusMinus desc, playerstats.ProShotsBlock desc ", $season_id, $team_id);
$BestDefensiveForward = mysql_query($query_BestDefensiveForward, $connection) or die(mysql_error());
$row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward);
$totalRows_BestDefensiveForward = mysql_num_rows($BestDefensiveForward);
?>
<div class="rowElem">
<label for="BestDefensiveForward"><?php echo $l_BestDefensiveForward; ?>:</label>
<select name="BestDefensiveForward" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['BestDefensiveForward'] == $row_BestDefensiveForward['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_BestDefensiveForward['Number']; ?>"><?php echo $row_BestDefensiveForward['Name'].", ".minutes($row_BestDefensiveForward['ProPKMinutePlay'])." PK Minutes, ".$row_BestDefensiveForward['ProShotsBlock']." Blocked Shots, ".$row_BestDefensiveForward['ProPlusMinus']." +/-  "; ?></option>
<?php } while ($row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward)); ?>
</select>
<?php mysql_free_result($BestDefensiveForward);?>
</div>

<?php 
$query_MostSportsmanlikePlayer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProMinutePlay, players.NumberOfInjury, playerstats.ProGP  FROM playerstats, players WHERE playerstats.Season_ID=%s AND playerstats.Team=%s AND players.Name=playerstats.Name GROUP BY players.Number ORDER BY playerstats.ProMinutePlay desc, players.NumberOfInjury desc", $season_id, $team_id );
$MostSportsmanlikePlayer = mysql_query($query_MostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer);
$totalRows_MostSportsmanlikePlayer = mysql_num_rows($MostSportsmanlikePlayer);
?>
<div class="rowElem">
<label for="MostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer; ?>:</label>
<select name="MostSportsmanlikePlayer" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['MostSportsmanlikePlayer'] == $row_MostSportsmanlikePlayer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_MostSportsmanlikePlayer['Number']; ?>"><?php echo $row_MostSportsmanlikePlayer['Name']." - ".$row_MostSportsmanlikePlayer['NumberOfInjury']." Injuries - ".$row_MostSportsmanlikePlayer['ProGP']." GP"; ?></option>
<?php } while ($row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer)); ?>
</select>
<?php mysql_free_result($MostSportsmanlikePlayer);?>
</div>

<?php 
$query_LowestPIM = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProPim, playerstats.ProMinutePlay FROM playerstats WHERE playerstats.Season_ID=%s AND playerstats.Team=%s ORDER BY playerstats.ProMinutePlay desc, playerstats.ProPim ", $season_id, $team_id );
$LowestPIM = mysql_query($query_LowestPIM, $connection) or die(mysql_error());
$row_LowestPIM = mysql_fetch_assoc($LowestPIM);
$totalRows_LowestPIM = mysql_num_rows($LowestPIM);
?>
<div class="rowElem">
<label for="LowestPIM"><?php echo $l_LowestPIM; ?>:</label>
<select name="LowestPIM" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['LowestPIM'] == $row_LowestPIM['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestPIM['Number']; ?>"><?php echo $row_LowestPIM['Name']." - ".$row_LowestPIM['ProPim']." PIM, ".minutes($row_LowestPIM['ProMinutePlay'])." Minutes Played"; ?></option>
<?php } while ($row_LowestPIM = mysql_fetch_assoc($LowestPIM)); ?>
</select>
<?php mysql_free_result($LowestPIM); ?>
</div>

<?php 
$query_GoalieOfTheYear = sprintf("SELECT goaliestats.Name, goaliestats.Number,  goaliestats.ProGA, goaliestats.ProSA, goaliestats.ProMinPlay, ((goaliestats.ProGA / goaliestats.ProMinPlay) * 60) as GAA FROM goaliestats WHERE goaliestats.Season_ID=%s AND goaliestats.Team=%s AND goaliestats.ProMinPlay > 0 AND goaliestats.ProGP > 1 ORDER BY goaliestats.ProMinPlay desc, GAA desc LIMIT 0, 2", $season_id, $team_id);
$GoalieOfTheYear = mysql_query($query_GoalieOfTheYear, $connection) or die(mysql_error());
$row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear);
$totalRows_GoalieOfTheYear = mysql_num_rows($GoalieOfTheYear);
?>
<div class="rowElem">
<label for="GoalieOfTheYear"><?php echo $l_GoalieOfTheYear; ?>:</label>
<select name="GoalieOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<?php if($row_GoalieOfTheYear['ProMinPlay']==0 || $row_GoalieOfTheYear['ProMinPlay']== NULL){
	echo "<option ";
	if ($row_GetWinners['GoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } 
	echo 'value="'.$row_GoalieOfTheYear["Name"].'">'.$row_GoalieOfTheYear['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['GoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GoalieOfTheYear['Number']; ?>"><?php echo $row_GoalieOfTheYear['Name']." - ".number_format($row_GoalieOfTheYear['ProSA'] / ($row_GoalieOfTheYear['ProGA'] + $row_GoalieOfTheYear['ProSA']),3)." PCT, ".number_format(($row_GoalieOfTheYear['ProGA'] / minutes($row_GoalieOfTheYear['ProMinPlay']))*60,2)." GAA. ".minutes($row_GoalieOfTheYear['ProMinPlay'])." Minutes Played"; ?></option>
<?php }} while ($row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear)); ?>
</select>
<?php mysql_free_result($GoalieOfTheYear);?>
</div>

<?php 
$query_GetMVP = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.ProPoint as STAT1, playerstats.ProG as STAT2 FROM playerstats WHERE playerstats.Season_ID=%s AND playerstats.Team=%s  GROUP BY playerstats.Number ORDER BY STAT1 desc, STAT2 desc ", $season_id, $team_id);
$GetMVP = mysql_query($query_GetMVP, $connection) or die(mysql_error());
$row_GetMVP = mysql_fetch_assoc($GetMVP);
$totalRows_GetMVP = mysql_num_rows($GetMVP);
$query_GetMVP2 = sprintf("SELECT goaliestats.Name, goaliestats.Number,  goaliestats.ProW as STAT1, goaliestats.ProShutouts as STAT2  FROM goaliestats WHERE goaliestats.Season_ID=%s AND goaliestats.Team=%s ORDER BY STAT1 desc, STAT2 desc LIMIT 0,2", $season_id, $team_id);
$GetMVP2 = mysql_query($query_GetMVP2, $connection) or die(mysql_error());
$row_GetMVP2 = mysql_fetch_assoc($GetMVP2);
$totalRows_GetMVP2 = mysql_num_rows($GetMVP2);
?>
<div class="rowElem">
<label for="MVP"><?php echo $l_MVP; ?>:</label>
<select name="MVP" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['MVP'] == $row_GetMVP['Number'] ){ echo 'selected'; } ?>  value="<?php echo $row_GetMVP['Number']; ?>"><?php echo $row_GetMVP['Name']." - ".$row_GetMVP['STAT1']." Points"; ?></option>
<?php } while ($row_GetMVP = mysql_fetch_assoc($GetMVP)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['MVP'] == ($row_GetMVP2['Number']+10000) ){ echo 'selected'; } ?>  value="<?php echo ($row_GetMVP2['Number']+10000); ?>"><?php echo $row_GetMVP2['Name']." - ".$row_GetMVP2['STAT1']." Wins"; ?></option>
<?php } while ($row_GetMVP2 = mysql_fetch_assoc($GetMVP2)); ?>
</select>
<?php
mysql_free_result($GetMVP);
mysql_free_result($GetMVP2);
?>	
</div>

<br /><br /><br /><br />
<h3><?php echo $l_nav_farmleague;?></h3>
<br />
<?php 
$query_GetTopScorer = sprintf("SELECT Name, Number, FarmPoint FROM playerstats WHERE Season_ID=%s AND Team=%s ORDER BY FarmPoint desc, FarmG desc LIMIT 0, 1", $season_id, $team_id);
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
$query_TopGoalScorer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmG FROM playerstats WHERE playerstats.Season_ID=%s  AND playerstats.Team=%s GROUP BY playerstats.Number  ORDER BY playerstats.FarmG desc LIMIT 0, 1", $season_id, $team_id );
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
$query_RookieOfTheYear = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmPoint FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s AND playerstats.Team=%s AND players.Age <= %s GROUP BY players.Number  ORDER BY playerstats.FarmPoint desc, playerstats.FarmG desc  ", $season_id, $team_id, $AgeMod);
$RookieOfTheYear = mysql_query($query_RookieOfTheYear, $connection) or die(mysql_error());
$row_RookieOfTheYear = mysql_fetch_assoc($RookieOfTheYear);
$totalRows_RookieOfTheYear = mysql_num_rows($RookieOfTheYear);
$query_RookieOfTheYear2 = sprintf("SELECT goaliestats.Name, goaliestats.Number,  goaliestats.FarmW as STAT1, goaliestats.FarmShutouts as STAT2  FROM goaliestats, goalies WHERE goaliestats.Name=goalies.Name AND goaliestats.Season_ID=%s AND goalies.Team=%s AND goalies.Age <= %s ORDER BY STAT1 desc, STAT2 desc LIMIT 0,2", $season_id, $team_id, $AgeMod);
$RookieOfTheYear2 = mysql_query($query_RookieOfTheYear2, $connection) or die(mysql_error());
$row_RookieOfTheYear2 = mysql_fetch_assoc($RookieOfTheYear2);
$totalRows_RookieOfTheYear2 = mysql_num_rows($RookieOfTheYear2);
?>
<div class="rowElem">
<label for="FarmRookieOfTheYear"><?php echo $l_RookieOfTheYear; ?>:</label>
<select name="FarmRookieOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
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
$query_DefensemanOfTheYear = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmShotsBlock, playerstats.FarmMinutePlay, playerstats.FarmPoint, playerstats.FarmPlusMinus FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s  AND playerstats.Team=%s AND (players.PosD='True' OR players.PosD='Vrai') AND playerstats.FarmGP > 0 GROUP BY players.Number   ORDER BY playerstats.FarmMinutePlay desc, playerstats.FarmPoint desc, playerstats.FarmShotsBlock desc, playerstats.FarmPlusMinus desc", $season_id, $team_id);
$DefensemanOfTheYear = mysql_query($query_DefensemanOfTheYear, $connection) or die(mysql_error());
$row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear);
$totalRows_DefensemanOfTheYear = mysql_num_rows($DefensemanOfTheYear);
?>
<div class="rowElem">
<label for="FarmDefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear; ?>:</label>
<select name="FarmDefensemanOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmDefensemanOfTheYear'] == $row_DefensemanOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_DefensemanOfTheYear['Number']; ?>"><?php echo $row_DefensemanOfTheYear['Name']." - ".minutes($row_DefensemanOfTheYear['FarmMinutePlay'])." Minutes Played, +".$row_DefensemanOfTheYear['FarmPoint']." Points, ".$row_DefensemanOfTheYear['FarmShotsBlock']." blocked shots, ".$row_DefensemanOfTheYear['FarmPlusMinus']." +/-"; ?></option>
<?php } while ($row_DefensemanOfTheYear = mysql_fetch_assoc($DefensemanOfTheYear)); ?>
</select>
<?php mysql_free_result($DefensemanOfTheYear);?>			
</div>

<?php 
$query_BestDefensiveForward = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmPKMinutePlay, playerstats.FarmPlusMinus, playerstats.FarmShotsBlock  FROM playerstats, players WHERE playerstats.Name=players.Name AND playerstats.Season_ID=%s AND playerstats.Team=%s AND (players.PosC='True' OR players.PosRW='True' OR players.PosLW='True' OR players.PosC='Vrai' OR players.PosRW='Vrai' OR players.PosLW='Vrai')  AND playerstats.FarmGP > 0 GROUP BY players.Number  ORDER BY playerstats.FarmPKMinutePlay desc, playerstats.FarmPlusMinus desc, playerstats.FarmShotsBlock desc ", $season_id, $team_id);
$BestDefensiveForward = mysql_query($query_BestDefensiveForward, $connection) or die(mysql_error());
$row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward);
$totalRows_BestDefensiveForward = mysql_num_rows($BestDefensiveForward);
?>
<div class="rowElem">
<label for="FarmBestDefensiveForward"><?php echo $l_BestDefensiveForward; ?>:</label>
<select name="FarmBestDefensiveForward" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmBestDefensiveForward'] == $row_BestDefensiveForward['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_BestDefensiveForward['Number']; ?>"><?php echo $row_BestDefensiveForward['Name'].", ".minutes($row_BestDefensiveForward['FarmPKMinutePlay'])." PK Minutes, ".$row_BestDefensiveForward['FarmShotsBlock']." Blocked Shots, ".$row_BestDefensiveForward['FarmPlusMinus']." +/-  "; ?></option>
<?php } while ($row_BestDefensiveForward = mysql_fetch_assoc($BestDefensiveForward)); ?>
</select>
<?php mysql_free_result($BestDefensiveForward);?>
</div>

<?php 
$query_MostSportsmanlikePlayer = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmMinutePlay, players.NumberOfInjury, playerstats.FarmGP  FROM playerstats, players WHERE playerstats.Season_ID=%s AND playerstats.Team=%s AND players.Status1 <= 1 AND players.Name=playerstats.Name  AND playerstats.FarmGP > 0  GROUP BY players.Number  ORDER BY playerstats.FarmMinutePlay desc, players.NumberOfInjury desc", $season_id, $team_id );
$MostSportsmanlikePlayer = mysql_query($query_MostSportsmanlikePlayer, $connection) or die(mysql_error());
$row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer);
$totalRows_MostSportsmanlikePlayer = mysql_num_rows($MostSportsmanlikePlayer);
?>
<div class="rowElem">
<label for="FarmMostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer; ?>:</label>
<select name="FarmMostSportsmanlikePlayer" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmMostSportsmanlikePlayer'] == $row_MostSportsmanlikePlayer['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_MostSportsmanlikePlayer['Number']; ?>"><?php echo $row_MostSportsmanlikePlayer['Name']." - ".$row_MostSportsmanlikePlayer['NumberOfInjury']." Injurys - ".$row_MostSportsmanlikePlayer['FarmGP']." GP"; ?></option>
<?php } while ($row_MostSportsmanlikePlayer = mysql_fetch_assoc($MostSportsmanlikePlayer)); ?>
</select>
<?php mysql_free_result($MostSportsmanlikePlayer);?>
</div>

<?php 
$query_LowestPIM = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmPim, playerstats.FarmMinutePlay FROM playerstats WHERE playerstats.Season_ID=%s AND playerstats.Team=%s   AND playerstats.FarmGP > 1  GROUP BY playerstats.Number  ORDER BY playerstats.FarmMinutePlay desc, playerstats.FarmPim ", $season_id, $team_id );
$LowestPIM = mysql_query($query_LowestPIM, $connection) or die(mysql_error());
$row_LowestPIM = mysql_fetch_assoc($LowestPIM);
$totalRows_LowestPIM = mysql_num_rows($LowestPIM);
?>
<div class="rowElem">
<label for="FarmLowestPIM"><?php echo $l_LowestPIM; ?>:</label>
<select name="FarmLowestPIM" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmLowestPIM'] == $row_LowestPIM['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_LowestPIM['Number']; ?>"><?php echo $row_LowestPIM['Name']." - ".$row_LowestPIM['FarmPim']." PIM, ".minutes($row_LowestPIM['FarmMinutePlay'])." Minutes Played"; ?></option>
<?php } while ($row_LowestPIM = mysql_fetch_assoc($LowestPIM)); ?>
</select>
<?php mysql_free_result($LowestPIM); ?>
</div>

<?php 
$query_GoalieOfTheYear = sprintf("SELECT goaliestats.Name, goaliestats.Number,  goaliestats.FarmGA, goaliestats.FarmSA, goaliestats.FarmMinPlay, ((goaliestats.FarmGA / goaliestats.FarmMinPlay) * 60) as GAA FROM goaliestats WHERE goaliestats.Season_ID=%s AND goaliestats.Team=%s AND goaliestats.FarmMinPlay > 0 ORDER BY goaliestats.FarmMinPlay desc, GAA desc LIMIT 0, 2", $season_id, $team_id);
$GoalieOfTheYear = mysql_query($query_GoalieOfTheYear, $connection) or die(mysql_error());
$row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear);
$totalRows_GoalieOfTheYear = mysql_num_rows($GoalieOfTheYear);
?>
<div class="rowElem">
<label for="FarmGoalieOfTheYear"><?php echo $l_GoalieOfTheYear; ?>:</label>
<select name="FarmGoalieOfTheYear" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<?php if($row_GoalieOfTheYear['FarmMinPlay']==0 || $row_GoalieOfTheYear['FarmMinPlay']== NULL){
	echo "<option ";
	if ($row_GetWinners['FarmGoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } 
	echo 'value="'.$row_GoalieOfTheYear["Name"].'">'.$row_GoalieOfTheYear['Name'].'</option>';
} else {
	?>
<option <?php if ($row_GetWinners['FarmGoalieOfTheYear'] != "" && $row_GetWinners['FarmGoalieOfTheYear'] == $row_GoalieOfTheYear['Number'] ){ echo 'selected'; } ?> value="<?php echo $row_GoalieOfTheYear['Number']; ?>"><?php echo $row_GoalieOfTheYear['Name']." - ".number_format($row_GoalieOfTheYear['FarmSA'] / ($row_GoalieOfTheYear['FarmGA'] + $row_GoalieOfTheYear['FarmSA']),3)." PCT, ".number_format(($row_GoalieOfTheYear['FarmGA'] / minutes($row_GoalieOfTheYear['FarmMinPlay']))*60,2)." GAA. ".minutes($row_GoalieOfTheYear['FarmMinPlay'])." Minutes Played"; ?></option>
<?php }} while ($row_GoalieOfTheYear = mysql_fetch_assoc($GoalieOfTheYear)); ?>
</select>
<?php mysql_free_result($GoalieOfTheYear);?>
</div>

<?php 
$query_GetMVP = sprintf("SELECT playerstats.Name, playerstats.Number, playerstats.FarmPoint as STAT1, playerstats.FarmG as STAT2 FROM playerstats WHERE playerstats.Season_ID=%s AND playerstats.Team=%s AND playerstats.FarmGP > 0  GROUP BY playerstats.Number  ORDER BY STAT1 desc, STAT2 desc ", $season_id, $team_id);
$GetMVP = mysql_query($query_GetMVP, $connection) or die(mysql_error());
$row_GetMVP = mysql_fetch_assoc($GetMVP);
$totalRows_GetMVP = mysql_num_rows($GetMVP);
$query_GetMVP2 = sprintf("SELECT goaliestats.Name, goaliestats.Number,  goaliestats.FarmW as STAT1, goaliestats.FarmShutouts as STAT2  FROM goaliestats WHERE goaliestats.Season_ID=%s AND goaliestats.Team=%s   ORDER BY STAT1 desc, STAT2 desc LIMIT 0,2", $season_id, $team_id);
$GetMVP2 = mysql_query($query_GetMVP2, $connection) or die(mysql_error());
$row_GetMVP2 = mysql_fetch_assoc($GetMVP2);
$totalRows_GetMVP2 = mysql_num_rows($GetMVP2);
?>
<div class="rowElem">
<label for="FarmMVP"><?php echo $l_MVP; ?>:</label>
<select name="FarmMVP" size="1">
<option selected="selected" value="0"><?php echo $l_SelectWinner;?></option>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmMVP'] == $row_GetMVP['Number'] ){ echo 'selected'; } ?>  value="<?php echo $row_GetMVP['Number']; ?>"><?php echo $row_GetMVP['Name']." - ".$row_GetMVP['STAT1']." Points"; ?></option>
<?php } while ($row_GetMVP = mysql_fetch_assoc($GetMVP)); ?>
<?php do {  ?>
<option <?php if ($row_GetWinners['FarmMVP'] == ($row_GetMVP2['Number']+10000) ){ echo 'selected'; } ?>  value="<?php echo ($row_GetMVP2['Number']+10000); ?>"><?php echo $row_GetMVP2['Name']." - ".$row_GetMVP2['STAT1']." Wins"; ?></option>
<?php } while ($row_GetMVP2 = mysql_fetch_assoc($GetMVP2)); ?>
</select>
<?php
mysql_free_result($GetMVP);
mysql_free_result($GetMVP2);
?>	
</div>

<div class="rowElem">
<label for="submit"></label>
<input type="submit" value="<?php echo $l_Submit;?>" class="button edit" />
</div>

<input type="hidden" name="Season_ID" value="<?php echo $season_year; ?>">
<input type="hidden" name="Team" value="<?php echo $team_id; ?>">
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
