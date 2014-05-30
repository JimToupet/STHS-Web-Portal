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
	$l_BestDefensiveForward = "Top Defensive Forward";
	$l_LowestGAA = "Goalie With the Fewest Goals Scored Against";
	$l_PlayoffMVP = "Most Valuable Player in Playoffs";
	$l_Division = "Division Champions";
	$l_Conference = "Regular Season Conference Champions";
	$l_League = "Regular Season League Champions";
	$l_PlayoffConference = "Playoff Conference Champions";
	$l_PlayoffLeague = "Playoff Champions";
	$l_LeagueAwards = "League Awards";
	$l_Championships = "Championships";
	$l_ChampionshipBanners = "Championship Banners";
	$l_TeamAwards = "Team Awards";
	break; 
	
case 'fr': 	
	$l_Award = "Troph&eacute;e";
	$l_Recent = "R&eacute;cipiendaire le plus r&eacute;cent";
	$l_MVP = "Joueur le plus utile";
	$l_LowestPIM = "Joueur qui d&eacute;montre une conduite Gentilhomme";
	$l_GoalieOfTheYear = "Meilleur Gardien";
	$l_RookieOfTheYear = "Recrue de l'ann&eacute;e";
	$l_TopScorer = "Meilleur Pointeur";
	$l_DefensemanOfTheYear = "Meilleur Defenseur";
	$l_MostSportsmanlikePlayer = "Qualit&eacute;s de pers&eacute;v&eacute;rance et de sportivit&eacute;";
	$l_BestDefensiveForward = "Meilleur attaquant defensif ";
	$l_TopGoalScorer = "Meilleur Buteur";
	$l_LowestGAA = "Gardien(s) avec le Moins de Buts Allou&eacute;s";
	$l_PlayoffMVP = "Joueur le plus utile en series";
	$l_Division = "Champion de division";
	$l_Conference = "Champion de conference de Saison R&eacute;guli&egrave;re";
	$l_League = "League Champions de Saison R&eacute;guli&egrave;re ";
	$l_PlayoffConference = "Champion de conference";
	$l_PlayoffLeague = "Champion des series Eliminatoires";
	$l_LeagueAwards = "Troph&eacute;es de ligue";
	$l_Championships = "Championships";
	$l_ChampionshipBanners = "Banieres des champions";
	$l_TeamAwards = "Troph&eacute;es d'&eacute;quipe";
	break; 
} 

$ID_GetSeason = "2010";
if (isset($_SESSION['current_Season'])) {
  $ID_GetSeason = (get_magic_quotes_gpc()) ? $_SESSION['current_Season'] : addslashes($_SESSION['current_Season']);
}

$ID_GetTeam = "0";
if (isset($_SESSION['current_Team_ID'])) {
  $ID_GetTeam = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}


$query_GetTrophies = sprintf("SELECT * FROM trophies");
$GetTrophies = mysql_query($query_GetTrophies, $connection) or die(mysql_error());
$row_GetTrophies = mysql_fetch_assoc($GetTrophies);
$totalRows_GetTrophies = mysql_num_rows($GetTrophies);

$query_GetWinnerYears = sprintf("SELECT S.Season, T.Season_ID FROM trophywinners as T, seasons as S WHERE T.Team=%s AND T.Season_ID=S.Season GROUP BY S.Season desc ORDER BY T.Season_ID ASC",$ID_GetTeam);
$GetWinnerYears = mysql_query($query_GetWinnerYears, $connection) or die(mysql_error());
$row_GetWinnerYears = mysql_fetch_assoc($GetWinnerYears);
$totalRows_GetWinnerYears = mysql_num_rows($GetWinnerYears);

$iCount = 0;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_awards;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">

#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_Farm_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
a:active {color:#<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>;}
a:hover {color:#<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;
}
#trophy{display:block; float:left; width:300px; margin:5px; vertical-align:top;}
#trophy td{height:30px; vertical-align:middle; text-align:center; font-size:10px; font-weight:bold;}
#trophy th {border-style:solid; line-height:16px; border-width:1px; border-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>; vertical-align:middle; height:45px;}
#banner {display:block; float:left; vertical-align:top; width:140px; margin:5px; }
#banner_top {text-align:center; vertical-align:middle; height:55px; background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>; color:#FFF;  font-size:24px; font-weight:bold;}
#banner_bottom {background:url(image/common/banner_bottom.gif) no-repeat bottom; text-align:center; vertical-align:top; height:200px; background-color:#FFF; color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>; font-size:18px; font-weight:bold;}
#banner_bottom_div {padding-top:10px; border-left-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>; border-left-style:solid; border-left-width:1px; border-right-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>; border-right-style:solid; border-right-width:1px; width:140px; height:130px;}
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
    <h1><?php echo $l_nav_awards;?></h1>
    <br />
    <div id="tabs">
    
     <div id="tabs-1"><h3><?php echo $l_TeamAwards;?></h3>
<div style="float:right;">
<?php 
if(isset($_SESSION['U_ID'])){
	if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
	do {
		echo "<div style='display:inline; padding-right:10px; float:left'><a href='edit_team_awards.php?team=".$ID_GetTeam."&season=".$row_GetWinnerYears['Season']."'><strong>".$l_Edit." ".$row_GetWinnerYears['Season_ID']."</strong></a></div>";
	} while ($row_GetWinnerYears = mysql_fetch_assoc($GetWinnerYears));

	}
}
?>
</div>
<br clear="all"/>
<?php 
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND p.Team=%s AND t.FarmMVP=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season UNION ALL SELECT t.*, p.Number, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=%s AND p.Team=%s AND t.FarmMVP=(p.Number+10000) AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY Season_ID Desc",$ID_GetTeam,$ID_GetTeam,$ID_GetTeam,$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>

<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_MVP; ?></th></tr>
</thead>
<tbody>
<?php do { 
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile;?>?player=<?php echo $row_GetAward['FarmMVP']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=%s AND t.FarmGoalieOfTheYear=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_GoalieOfTheYear; ?></th></tr>
</thead>
<tbody>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="goalie.php?player=<?php echo $row_GetAward['FarmGoalieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmDefensemanOfTheYear=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_DefensemanOfTheYear; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmDefensemanOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND p.Team=%s AND t.FarmRookieOfTheYear=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season UNION ALL SELECT t.*, p.Number, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=%s AND p.Team=%s AND t.FarmRookieOfTheYear=(p.Number+10000) AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY Season_ID Desc",$ID_GetTeam,$ID_GetTeam,$ID_GetTeam,$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_RookieOfTheYear; ?></th></tr>
</thead>
<tbody>
<?php 
do{
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['FarmRookieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmTopScorer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_TopScorer; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmTopScorer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmTopGoalScorer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_TopGoalScorer; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmTopGoalScorer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmBestDefensiveForward=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead colspan="2">
<tr><th colspan="2"><?php echo $l_BestDefensiveForward; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmBestDefensiveForward']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmMostSportsmanlikePlayer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_MostSportsmanlikePlayer; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmMostSportsmanlikePlayer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Number, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=%s AND t.FarmLowestPIM=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY Season_ID Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><?php echo $l_LowestPIM; ?></th></tr>
</thead>
<tbody>
<?php do{?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmLowestPIM']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)) ;  ?>
</tbody>
</table>
</div>
<br clear="all" />

		</div>
        
                
<div id="tabs-2"><h3><?php echo $l_LeagueAwards;?></h3>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name, p.Number, s.Season as S, 'False' as PosG FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmMVP=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season UNION ALL SELECT t.*, g.Name, g.Number, s.Season as S, 'True' as PosG FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.FarmMVP=(g.Number+10000) AND g.Team=%s AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID GROUP BY s.Season ORDER BY S Desc",$ID_GetTeam,$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmMVP"><?php echo $l_MVP."<br />".$row_GetTrophies['FarmMVP']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmMVP"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmMVPPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmMVP']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['FarmMVP']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, g.Name FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.FarmGoalieOfTheYear=g.Number AND g.Team=%s AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmGoalieOfTheYear"><?php echo  $l_GoalieOfTheYear."<br />".$row_GetTrophies['FarmGoalieOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmGoalieOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmGoalieOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmGoalieOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="goalie.php?player=<?php echo $row_GetAward['FarmGoalieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmDefensemanOfTheYear=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmDefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear."<br>".$row_GetTrophies['FarmDefensemanOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmDefensemanOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmDefensemanOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmDefensemanOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmDefensemanOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name, p.Number, s.Season as S, 'False' as PosG, p.Number FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmRookieOfTheYear=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season UNION ALL SELECT t.*, g.Name, g.Number, s.Season as S, 'True' as PosG, g.Number FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.FarmRookieOfTheYear=(g.Number+10000) AND g.Team=%s AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY S Desc",$ID_GetTeam,$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmRookieOfTheYear"><?php echo $l_RookieOfTheYear."<br>".$row_GetTrophies['FarmRookieOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmRookieOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmRookieOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmRookieOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['FarmRookieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmTopScorer=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmTopScorer"><?php echo $l_TopScorer."<br>".$row_GetTrophies['FarmTopScorer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmTopScorer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmTopScorerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmTopScorer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmTopScorer'];?>"><?php echo $row_GetAward['Name'];?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmTopGoalScorer=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmTopGoalScorer"><?php echo $l_TopGoalScorer."<br>".$row_GetTrophies['FarmTopGoalScorer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmTopGoalScorer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmTopGoalScorerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmTopGoalScorer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmTopGoalScorer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmBestDefensiveForward=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmBestDefensiveForward"><?php echo $l_BestDefensiveForward."<br>".$row_GetTrophies['FarmBestDefensiveForward']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmBestDefensiveForward"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmBestDefensiveForwardPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmBestDefensiveForward']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmBestDefensiveForward']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmMostSportsmanlikePlayer=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmMostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer."<br>".$row_GetTrophies['FarmMostSportsmanlikePlayer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmMostSportsmanlikePlayer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmMostSportsmanlikePlayerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmMostSportsmanlikePlayer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['FarmMostSportsmanlikePlayer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmLowestPIM=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmLowestPIM"><?php echo $l_LowestPIM."<br>".$row_GetTrophies['FarmLowestPIM']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmLowestPIM"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmLowestPIMPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmLowestPIM']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['Name']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, g.Name FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.FarmLowestGAA=g.Number AND g.Team=%s AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmLowestGAA"><?php echo $l_LowestGAA."<br>".$row_GetTrophies['FarmLowestGAA']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=LowestGAA"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmLowestGAAPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmLowestGAA']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="goalie.php?player=<?php echo $row_GetAward['Name']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name, p.Number, s.Season as S, 'False' as PosG FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.FarmPlayoffMVP=p.Number AND p.Team=%s AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID GROUP BY s.Season UNION ALL SELECT t.*, g.Name, g.Number, s.Season as S, 'True' as PosG FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.FarmPlayoffMVP=(g.Number+10000) AND g.Team=%s AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID GROUP BY s.Season  ORDER BY S Desc",$ID_GetTeam,$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=FarmPlayoffMVP"><?php echo $l_PlayoffMVP."<br>".$row_GetTrophies['FarmPlayoffMVP']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=FarmPlayoffMVP"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['FarmPlayoffMVPPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['FarmPlayoffMVP']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['PlayoffMVP']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>

<?php 
$query_GetAward = sprintf("SELECT t.* FROM trophywinners as t, proteam as p, proteamstandings as ps, seasons as s WHERE t.Team=0 AND t.GeneralManager=p.GM AND p.Number=%s AND t.Season_ID=s.Season AND p.Number=ps.Number AND ps.Season_ID=s.S_ID GROUP BY s.Season ORDER BY s.Season Desc",$ID_GetTeam);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
if($totalRows_GetAward > 0){
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=GeneralManager"><?php echo $l_GeneralManager."<br>".$row_GetTrophies['GeneralManager']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=GeneralManager"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['GeneralManagerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['GeneralManager']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="bio.php?team=<?php echo $ID_GetTeam;?>"><?php echo $row_GetAward['GeneralManager']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
<?php 
$iCount = $iCount + 1;
if($iCount == 3){ echo '<br clear="all" />'; $iCount = 0; }
} 
?>
           
<br clear="all" />
            </div>
             
          
	    <div id="tabs-3"><h3><?php echo $l_ChampionshipBanners;?></h3>
        
<?php 
$query_GetSeasons = sprintf("SELECT * FROM seasons as s WHERE s.SeasonType < 2 ORDER BY s.Season Desc");
$GetSeasons= mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons= mysql_num_rows($GetSeasons);
if($totalRows_GetSeasons > 0){
do {
$tmpAward = $l_League; 
if($row_GetSeasons['SeasonType'] == 0){
$query_GetLeagueChamp = sprintf("SELECT Number FROM farmteamstandings WHERE Season_ID=%s AND StandingPlayoffTitle = 'Z' ORDER BY Point desc, W desc LIMIT 0,1", $row_GetSeasons['S_ID']);
$GetLeagueChamp= mysql_query($query_GetLeagueChamp, $connection) or die(mysql_error());
$row_GetLeagueChamp = mysql_fetch_assoc($GetLeagueChamp);$totalRows_GetLeagueChamp= mysql_num_rows($GetLeagueChamp);
if($totalRows_GetLeagueChamp > 0 && $row_GetLeagueChamp['Number'] == $ID_GetTeam){
?>
<div id="banner">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="banner_top"><?php echo $row_GetSeasons['Season']."-".substr($row_GetSeasons['Season']+1, -2);?></td></tr>
<tr><td id="banner_bottom"><div id="banner_bottom_div"><?php echo '<a href="farm_stats.php?team='.$ID_GetTeam.'&season_id='.$row_GetSeasons['S_ID'].'" style="text-decoration:none;">'.$tmpAward.'</a>'; ?><br /><br /></div><?php echo '<a href="farm_stats.php?team='.$ID_GetTeam.'&season_id='.$row_GetSeasons['S_ID'].'" style="text-decoration:none;"><img src="'.$_SESSION['DomainName'].'/image/logos/medium/'.$_SESSION['current_Farm_LogoSmall'].'" border=0 alt="'.$_SESSION["current_Farm_City"].' '.$_SESSION["current_Farm_Team"].'" style="position:relative; top:-70px;"></a>';?></td></tr>
</table>
</div>
<?php
}
}

if($row_GetSeasons['SeasonType'] == 0){
$query_GetRegular = sprintf("SELECT StandingPlayoffTitle, Season_ID FROM farmteamstandings WHERE Season_ID=%s AND Number=%s AND StandingPlayoffTitle IN ('Y','Z') ORDER BY Point, StandingPlayoffTitle desc", $row_GetSeasons['S_ID'],$ID_GetTeam);
$GetRegular= mysql_query($query_GetRegular, $connection) or die(mysql_error());
$row_GetRegular = mysql_fetch_assoc($GetRegular);
$totalRows_GetRegular= mysql_num_rows($GetRegular);
if($totalRows_GetRegular > 0){
	do {
		if($row_GetRegular['StandingPlayoffTitle']=="Z"){
			$tmpAward = $l_Conference; 
		} else if($row_GetRegular['StandingPlayoffTitle']=="Y"){
			$tmpAward = $l_Division; 
		}
?>
<div id="banner">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="banner_top"><?php echo $row_GetSeasons['Season']."-".substr($row_GetSeasons['Season']+1, -2);?></td></tr>
<tr><td id="banner_bottom"><div id="banner_bottom_div"><?php echo '<a href="farm_stats.php?team='.$ID_GetTeam.'&season_id='.$row_GetRegular['Season_ID'].'" style="text-decoration:none;">'.$tmpAward.'</a>'; ?><br /><br /></div><?php echo '<a href="farm_stats.php?team='.$ID_GetTeam.'&season_id='.$row_GetRegular['Season_ID'].'" style="text-decoration:none;"><img src="'.$_SESSION["DomainName"].'/image/logos/medium/'.$_SESSION["current_Farm_LogoSmall"].'" border=0 alt="'.$_SESSION["current_Farm_Team"].'" style="position:relative; top:-70px;"></a>';?></td></tr>
</table>
</div>
<?php
	} while ($row_GetRegular = mysql_fetch_assoc($GetRegular));
}
}

if($row_GetSeasons['SeasonType']==0){
$query_GetChamps = sprintf("SELECT p.Conference, s.W, s.Season_ID as S_ID, s.Number  FROM farmteam as p, farmteamstandings as s WHERE p.Number=s.Number AND s.Season_ID=%s AND s.Number=%s AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux')", $row_GetSeasons['S_ID'],$ID_GetTeam);
$GetChamps= mysql_query($query_GetChamps, $connection) or die(mysql_error());
$row_GetChamps = mysql_fetch_assoc($GetChamps);
$totalRows_GetChamps= mysql_num_rows($GetChamps);
if($totalRows_GetChamps > 0){
echo '<div id="banner">';
echo '<table cellpadding="0" cellspacing="0" border="0">';
echo '<tr><td id="banner_top">'.$row_GetSeasons["Season"].'-'.substr($row_GetSeasons["Season"]+1, -2).'</td></tr>';
echo '<tr><td id="banner_bottom"><div id="banner_bottom_div"><a href="farm_stats.php?team='.$row_GetChamps['Number'].'&season_id='.$row_GetChamps['S_ID'].'" style="text-decoration:none;">'.$l_PlayoffConference.'</a><br /><br /></div><a href="farm_stats.php?team='.$row_GetChamps['Number'].'&season_id='.$row_GetChamps['S_ID'].'" style="text-decoration:none;"><img src="'.$_SESSION["DomainName"].'/image/logos/medium/'.$_SESSION["current_Farm_LogoSmall"].'" border=0 alt="'.$_SESSION["current_Farm_Team"].'" style="position:relative; top:-70px;"></a></td></tr>';
echo '</table>';
echo '</div>';

echo '<div id="banner">';
echo '<table cellpadding="0" cellspacing="0" border="0">';
echo '<tr><td id="banner_top">'.$row_GetSeasons["Season"].'-'.substr($row_GetSeasons["Season"]+1, -2).'</td></tr>';
echo '<tr><td id="banner_bottom"><div id="banner_bottom_div"><a href="farm_stats.php?team='.$row_GetChamps['Number'].'&season_id='.$row_GetChamps['S_ID'].'" style="text-decoration:none;">'.$l_PlayoffLeague.'</a><br /><br /></div><a href="farm_stats.php?team='.$row_GetChamps['Number'].'&season_id='.$row_GetChamps['S_ID'].'" style="text-decoration:none;"><img src="'.$_SESSION["DomainName"].'/image/logos/medium/'.$_SESSION["current_Farm_LogoSmall"].'" border=0 alt="'.$_SESSION["current_Farm_Team"].'" style="position:relative; top:-70px;"></a></td></tr>';
echo '</table>';
echo '</div>';
}

$query_GetLoosers = sprintf("SELECT s.Number, s.Season_ID as S_ID FROM farmteamstandings as s WHERE s.Season_ID=%s AND (s.PlayOffEliminated='True' OR s.PlayOffEliminated='Vrai') ORDER BY s.W desc LIMIT 0,1", $row_GetSeasons['S_ID'],$row_GetChamps['W']);
$GetLoosers= mysql_query($query_GetLoosers, $connection) or die(mysql_error());
$row_GetLoosers = mysql_fetch_assoc($GetLoosers);
$totalRows_GetLoosers= mysql_num_rows($GetLoosers);
if($row_GetLoosers['Number'] == $ID_GetTeam){
echo '<div id="banner">';
echo '<table cellpadding="0" cellspacing="0" border="0">';
echo '<tr><td id="banner_top">'.$row_GetSeasons["Season"].'-'.substr($row_GetSeasons["Season"]+1, -2).'</td></tr>';
echo '<tr><td id="banner_bottom"><div id="banner_bottom_div"><a href="farm_stats.php?team='.$row_GetLoosers['Number'].'&season_id='.$row_GetLoosers['S_ID'].'" style="text-decoration:none;">'.$l_PlayoffConference.'</a><br /><br /></div><a href="farm_stats.php?team='.$row_GetLoosers['Number'].'&season_id='.$row_GetLoosers['S_ID'].'" style="text-decoration:none;"><img src="'.$_SESSION["DomainName"].'/image/logos/medium/'.$_SESSION["current_Farm_LogoSmall"].'" border=0 alt="'.$_SESSION["current_Farm_Team"].'" style="position:relative; top:-70px;"></a></td></tr>';
echo '</table>';
echo '</div>';
}
}

} while ($row_GetSeasons = mysql_fetch_assoc($GetSeasons));
} 
?>

           
<br clear="all" />
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
