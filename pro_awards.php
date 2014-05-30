<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_CoachOfTheYear = "Coach of the Year";
	$l_GeneralManager = "General Manager of the Year";
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
	$l_Conference = "Conference Champion";
	$l_League = "Season League Champion";
	$l_PlayoffConference = "Runner-Up";
	$l_PlayoffLeague = "Stanley Cup Champion";
	$l_LeagueAwards = "League Awards";
	$l_Championships = "Championships";
	$l_ChampionshipBanners = "Championship Banners";
	$l_TeamAwards = "Team Awards";
	break; 
	
case 'fr': 	
	$l_CoachOfTheYear = "Entraineur de l'ann&eacute;e";
	$l_GeneralManager = "Directeur G&eacute;n&eacute;rale de l'ann&eacute;e";
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
	$l_Division = "Champions de Division";
	$l_Conference = "Champions de conf&eacute;rence de saison r&eacute;guli&egrave;re";
	$l_League = "Regular Season League Champions";
	$l_PlayoffConference = "Champion de conference";
	$l_PlayoffLeague = "Champions de tasse de Stanley";
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

$query_GetWinnerYears = sprintf("SELECT S.Season, T.Season_ID FROM trophywinners as T, seasons as S WHERE T.Team=0 AND T.Season_ID=S.Season GROUP BY T.Season_ID ORDER BY T.Season_ID ASC");
$GetWinnerYears = mysql_query($query_GetWinnerYears, $connection) or die(mysql_error());
$row_GetWinnerYears = mysql_fetch_assoc($GetWinnerYears);
$totalRows_GetWinnerYears = mysql_num_rows($GetWinnerYears);

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
#trophy{display:block; float:left; width:300px; margin:5px; vertical-align:top;}
#trophy td{height:30px; vertical-align:middle; text-align:center; font-size:10px; font-weight:bold;}
#trophy th {border-style:solid; line-height:16px; border-width:1px; border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; vertical-align:middle; height:45px;}
#banner {display:block; float:left; vertical-align:top; width:140px; margin:5px; }
#banner_top {text-align:center; vertical-align:middle; height:55px; background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; color:#FFF;  font-size:24px; font-weight:bold;}
#banner_bottom {background:url(image/common/banner_bottom.gif) no-repeat bottom; text-align:center; vertical-align:top; height:200px; background-color:#FFF; color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; font-size:18px; font-weight:bold;}
#banner_bottom_div {padding-top:10px; border-left-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; border-left-style:solid; border-left-width:1px; border-right-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; border-right-style:solid; border-right-width:1px; width:140px; height:130px;}
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
        
                
<div id="tabs-1"><h3><?php echo $l_LeagueAwards;?></h3>
<div style="float:right;">
<?php 
if(isset($_SESSION['U_ID'])){
	if($_SESSION['U_Admin']==1){
	do {
		echo "<div style='display:inline; padding-right:10px; float:left'><a class='button edit'href='edit_awards.php?team=".$ID_GetTeam."&season=".$row_GetWinnerYears['Season']."'><strong>".$l_Edit." ".$row_GetWinnerYears['Season_ID']."</strong></a></div>";
	} while ($row_GetWinnerYears = mysql_fetch_assoc($GetWinnerYears));

	}
}
?>
</div>
<br clear="all"/>

<?php 
//$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.MVP=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season UNION ALL SELECT t.*, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=0 AND t.MVP=(p.Number+10000) AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season  ORDER BY Season_ID Desc");
$query_GetAward = sprintf("SELECT T.*, p.Name, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND p.Number=T.MVP
			AND T.Team=0 
			AND p.ProGP > 60 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.*, p.Name, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND (p.Number+10000)=T.MVP
			AND T.Team=0 
			AND p.ProGP > 45 
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=MVP"><?php echo $l_MVP."<br />".$row_GetTrophies['MVP']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=MVP"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['MVPPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['MVP']; ?>" /></a></td></tr>
<?php do { 
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['MVP']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>


<?php 
$query_GetAward = sprintf("SELECT t.*, g.Name FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.GoalieOfTheYear=g.Number AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=GoalieOfTheYear"><?php echo $l_GoalieOfTheYear."<br />".$row_GetTrophies['GoalieOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=GoalieOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['GoalieOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['GoalieOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="goalie.php?player=<?php echo $row_GetAward['GoalieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.DefensemanOfTheYear=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=DefensemanOfTheYear"><?php echo $l_DefensemanOfTheYear."<br />".$row_GetTrophies['DefensemanOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=DefensemanOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['DefensemanOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['DefensemanOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['DefensemanOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<br clear="all"/>
<?php 
//$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.RookieOfTheYear=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season UNION ALL SELECT t.*, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=0 AND t.RookieOfTheYear=(p.Number+10000) AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season  ORDER BY Season_ID Desc");
$query_GetAward = sprintf("SELECT T.RookieOfTheYear, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND p.Number=T.RookieOfTheYear
			AND T.Team=0 
			AND p.ProGP > 60 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.RookieOfTheYear, p.Name, T.Season_ID, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND (p.Number+10000)=T.RookieOfTheYear 
			AND T.Team=0 
			AND p.ProGP > 45 
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=RookieOfTheYear"><?php echo $l_RookieOfTheYear."<br />".$row_GetTrophies['RookieOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=RookieOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['RookieOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['RookieOfTheYear']; ?>" /></a></td></tr>
<?php do { 
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['RookieOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.TopScorer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season  ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=TopScorer"><?php echo $l_TopScorer."<br />".$row_GetTrophies['TopScorer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=TopScorer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['TopScorerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['TopScorer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['TopScorer'];?>"><?php echo $row_GetAward['Name'];?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.TopGoalScorer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season  ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=TopGoalScorer"><?php echo $l_TopGoalScorer."<br />".$row_GetTrophies['TopGoalScorer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=TopGoalScorer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['TopGoalScorerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['TopGoalScorer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['TopGoalScorer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<br clear="all"/>
<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.BestDefensiveForward=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=BestDefensiveForward"><?php echo $l_BestDefensiveForward."<br />".$row_GetTrophies['BestDefensiveForward']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=BestDefensiveForward"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['BestDefensiveForwardPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['BestDefensiveForward']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['BestDefensiveForward']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.MostSportsmanlikePlayer=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=MostSportsmanlikePlayer"><?php echo $l_MostSportsmanlikePlayer."<br />".$row_GetTrophies['MostSportsmanlikePlayer']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=MostSportsmanlikePlayer"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['MostSportsmanlikePlayerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['MostSportsmanlikePlayer']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['MostSportsmanlikePlayer']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.LowestPIM=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=LowestPIM"><?php echo $l_LowestPIM."<br />".$row_GetTrophies['LowestPIM']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=LowestPIM"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['LowestPIMPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['LowestPIM']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="player.php?player=<?php echo $row_GetAward['LowestPIM']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<br clear="all"/>
<?php 
$query_GetAward = sprintf("SELECT t.*, g.Name FROM trophywinners as t, goaliestats as g, seasons as s WHERE t.Team=0 AND t.LowestGAA=g.Number AND t.Season_ID=s.Season AND g.Season_ID=s.S_ID  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=LowestGAA"><?php echo $l_LowestGAA."<br />".$row_GetTrophies['LowestGAA']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=LowestGAA"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['LowestGAAPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['LowestGAA']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="goalie.php?player=<?php echo $row_GetAward['LowestGAA']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
//$query_GetAward = sprintf("SELECT t.*, p.Name FROM trophywinners as t, playerstats as p, seasons as s WHERE t.Team=0 AND t.PlayoffMVP=p.Number AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season UNION ALL SELECT t.*, p.Name FROM trophywinners as t, goaliestats as p, seasons as s WHERE t.Team=0 AND t.PlayoffMVP=(p.Number+10000) AND t.Season_ID=s.Season AND p.Season_ID=s.S_ID  GROUP BY s.Season  ORDER BY Season_ID Desc");
$query_GetAward = sprintf("SELECT T.PlayoffMVP, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=0
			AND p.Number=T.PlayoffMVP 
			AND T.Team=0 
			AND p.ProGP > 20 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.PlayoffMVP, p.Name, T.Season_ID, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=0
			AND (p.Number+10000)=T.PlayoffMVP 
			AND T.Team=0 
			AND p.ProGP > 20 
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);
?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=PlayoffMVP"><?php echo $l_PlayoffMVP."<br />".$row_GetTrophies['PlayoffMVP']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=PlayoffMVP"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['PlayoffMVPPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['PlayoffMVP']; ?>" /></a></td></tr>
<?php do { 
if ($row_GetAward['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}
?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetAward['PlayoffMVP']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<?php 
$query_GetAward = sprintf("SELECT t.*, c.Name FROM trophywinners as t, coaches as c, seasons as s WHERE t.Team=0 AND t.CoachOfTheYear=c.Number AND t.Season_ID=s.Season  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=CoachOfTheYear"><?php echo $l_CoachOfTheYear."<br />".$row_GetTrophies['CoachOfTheYear']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=CoachOfTheYear"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['CoachOfTheYearPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['CoachOfTheYear']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><a href="coach.php?coach=<?php echo $row_GetAward['CoachOfTheYear']; ?>"><?php echo $row_GetAward['Name']; ?></a></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>

<br clear="all"/>
<?php 
$query_GetAward = sprintf("SELECT t.* FROM trophywinners as t, seasons as s WHERE t.Team=0 AND t.Season_ID=s.Season  GROUP BY s.Season ORDER BY s.Season Desc");
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
$totalRows_GetAward = mysql_num_rows($GetAward);

?>
<div id="trophy">
<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th colspan="2"><a href="trophy.php?trophy=GeneralManager"><?php echo $l_GeneralManager."<br />".$row_GetTrophies['GeneralManager']; ?></a></th></tr>
</thead>
<tbody>
<tr><td colspan="2" style="height:190px;"><a href="trophy.php?trophy=GeneralManager"><img width="120" heigth="175" src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['GeneralManagerPhoto']; ?>" border="0" alt="<?php echo $row_GetTrophies['GeneralManager']; ?>" /></a></td></tr>
<?php do { ?>
<tr><td width="50"><?php echo $row_GetAward['Season_ID']."-".substr($row_GetAward['Season_ID']+1, -2); ?></td><td width="250"  style="font-size:12px;"><?php echo $row_GetAward['GeneralManager']; ?></td></tr>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward)); ?>
</tbody>
</table>
</div>
           
<br clear="all" />
 </div>

        <div id="tabs-2"><h3><?php echo $l_Championships;?></h3>

<table cellspacing="0" border="0" class="tablesorterRates">
<thead>
<tr><th>Season</th><th width="19%"><?php echo $l_PlayoffLeague;?></th><th width="19%"><?php echo $l_PlayoffConference;?></th><th width="19%"><?php echo $l_League;?></th><th width="19%"><?php echo $l_Conference;?></th><th width="19%"><?php echo $l_Conference;?></th></tr>
</thead>
<tbody>
<?php 
$query_GetSeasons = sprintf("SELECT * FROM seasons as s WHERE SeasonType=0 GROUP BY s.Season ORDER BY s.Season Desc");
$GetSeasons= mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons= mysql_num_rows($GetSeasons);

if($totalRows_GetSeasons > 0){
do {
?>
<tr>
	<td width="50" align="center"><?php echo $row_GetSeasons['Season']."-".substr($row_GetSeasons['Season']+1, -2); ?></td>
<?php 
$query_GetAward = sprintf("SELECT x.S_ID, p.City, p.Name, s.Number FROM proteam as p, proteamstandings as s, seasons as x WHERE p.Number=s.Number AND x.Season=%s AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') AND x.SeasonType=0 ",$row_GetSeasons['Season']);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
?>
    <td align="center"><a href="pro_stats.php?team=<?php echo $row_GetAward['Number']; ?>&season_id=<?php echo $row_GetAward['S_ID']; ?>"><?php echo $row_GetAward['City']." ".$row_GetAward['Name']; ?></a></td>
<?php
$query_GetAward = sprintf("SELECT x.S_ID, p.City, p.Name, s.Number FROM proteam as p, proteamstandings as s, seasons as x WHERE p.Number=s.Number AND x.Season=%s AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='True' OR s.PlayOffEliminated='Vrai') AND x.SeasonType=0 ORDER BY s.W DESC LIMIT 0,1",$row_GetSeasons['Season']);
$GetAward= mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
?>
    <td align="center"><a href="pro_stats.php?team=<?php echo $row_GetAward['Number']; ?>&season_id=<?php echo $row_GetAward['S_ID']; ?>"><?php echo $row_GetAward['City']." ".$row_GetAward['Name']; ?></a></td>
<?php
$query_GetAward = sprintf("SELECT x.S_ID, p.City, p.Name, s.Number  FROM proteamstandings as s, proteam as p, seasons as x  WHERE x.Season=%s AND x.S_ID=s.Season_ID AND s.Number=p.Number AND s.StandingPlayoffTitle = 'Z' AND x.SeasonType=1 ORDER BY s.Point desc, s.W desc LIMIT 0,1",$row_GetSeasons['Season']);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
?>
    <td align="center"><a href="pro_stats.php?team=<?php echo $row_GetAward['Number']; ?>&season_id=<?php echo $row_GetAward['S_ID']; ?>"><?php echo $row_GetAward['City']." ".$row_GetAward['Name']; ?></a></td>
<?php 
$query_GetAward = sprintf("SELECT x.S_ID, p.City, p.Name, s.Number  FROM proteamstandings as s, proteam as p, seasons as x  WHERE x.Season=%s AND x.S_ID=s.Season_ID AND s.Number=p.Number AND s.StandingPlayoffTitle = 'Z' AND x.SeasonType=1 ORDER BY p.Conference, s.Point desc, s.W desc",$row_GetSeasons['Season']);
$GetAward = mysql_query($query_GetAward, $connection) or die(mysql_error());
$row_GetAward = mysql_fetch_assoc($GetAward);
do{
?>
    <td align="center"><a href="pro_stats.php?team=<?php echo $row_GetAward['Number']; ?>&season_id=<?php echo $row_GetAward['S_ID']; ?>"><?php echo $row_GetAward['City']." ".$row_GetAward['Name']; ?></a></td>
<?php } while ($row_GetAward = mysql_fetch_assoc($GetAward));?>
</tr>
<?php } while ($row_GetSeasons = mysql_fetch_assoc($GetSeasons)); }?>
</tbody>
</table>

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
