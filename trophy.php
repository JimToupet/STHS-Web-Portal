<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_GeneralManager = "This is an annual award presented to the general manager adjudged to have contributed the most to his team's success.";
	$l_MVP = "The trophy is presented to the most valuable player during the regular season.";
	$l_LowestPIM = "The trophy is an annual award given to the player adjudged to have exhibited the best type of sportsmanship and gentlemanly conduct combined with a high standard of playing ability. ";
	$l_GoalieOfTheYear = "This trophy is for the goaltender judged to be the best at his position in the opinion of the general managers.";
	$l_RookieOfTheYear = "This awarded to the player judged to be the most proficient in his first season.";
	$l_TopScorer = "This award is presented annually to the points leader during the regular season.";
	$l_DefensemanOfTheYear = "This trophy is presented annually to the defenseman who demonstrates the greatest all-around ability in his position.";
	$l_MostSportsmanlikePlayer = "An annual award goes to the player who best exemplifies the qualities of perseverance, sportsmanship and dedication to hockey.";
	$l_BestDefensiveForward = "This award recognizes the forward who best excels in the defensive aspects of the game.";
	$l_TopGoalScorer = "This award is presented annually to the goal-scoring leader during the regular season.";
	$l_LowestGAA = "This trophy is awarded annually to the goalkeeper(s) having played a minimum of 25 games for the team with the fewest goals scored against.";
	$l_PlayoffMVP = "The trophy is for the most valuable player in each season's playoff competition.";
	$l_CoachOfTheYear = "This is an annual award presented to the coach adjudged to have contributed the most to his team's success.";
	$l_PlayoffsChampions = "This trophy is awarded annually to the league playoff champion.";
	$l_FarmPlayoffsChampions = "This trophy is awarded annually to the farm league playoff champion.";
	break; 
	
case 'fr': 	
	$l_GeneralManager = "C&apos;est une r&eacute;compense annuelle pr&eacute;sent&eacute;e au directeur g&eacute;n&eacute;ral adjug&eacute; pour avoir contribu&eacute; les la plupart &agrave; son succ&egrave;s d&apos;&eacute;quipes.";
	$l_MVP = "Le troph&eacute;e est pr&eacute;sent&eacute; au joueur le plus valable pendant la saison r&eacute;guli&egrave;re.";
	$l_LowestPIM = "Le troph&eacute;e est une r&eacute;compense annuelle donn&eacute;e au joueur adjug&eacute; pour avoir exhib&eacute; le meilleur type de la sportivit&eacute; et de conduite courtoise combin&eacute;es avec un niveau &eacute;lev&eacute; de jouer la capacit&eacute;.";
	$l_GoalieOfTheYear = "Ce troph&eacute;e est pour le guardien de but jug&eacute; &ecirc;tre le meilleur &agrave; sa position selon l&apos;opinion des directeurs g&eacute;n&eacute;raux.";
	$l_RookieOfTheYear = "Ceci attribu&eacute; au joueur jug&eacute; &ecirc;tre le plus comp&eacute;tent dans sa premi&egrave;re saison.";
	$l_TopScorer = "Cette r&eacute;compense est pr&eacute;sent&eacute;e annuellement au chef de points pendant la saison r&eacute;guli&egrave;re.";
	$l_DefensemanOfTheYear = "Ce troph&eacute;e est pr&eacute;sent&eacute; annuellement au d&eacute;fenseur qui d&eacute;montre la plus grande capacit&eacute; totale en sa position.";
	$l_MostSportsmanlikePlayer = "Une r&eacute;compense annuelle va au joueur qui exemplifie mieux les qualit&eacute;s de la pers&eacute;v&eacute;rance, de la sportivit&eacute; et de l&apos;attachement &agrave; l&apos;hockey.";
	$l_BestDefensiveForward = "Cette r&eacute;compense identifie le vers l&apos;avant qui le meilleur excelle dans les aspects d&eacute;fensifs du jeu.";
	$l_TopGoalScorer = "Cette r&eacute;compense est pr&eacute;sent&eacute;e annuellement au chef de but-marquage pendant la saison r&eacute;guli&egrave;re.";
	$l_LowestGAA = "Ce troph&eacute;e est attribu&eacute; annuellement aux guardiens de but ayant jou&eacute; 25 jeux au minimum pour l&apos;&eacute;quipe avec les quelques buts marqu&eacute;s contre.";
	$l_PlayoffMVP = "Le troph&eacute;e est pour le joueur le plus valable en chaque concurrence de finale de saisons.";
	$l_CoachOfTheYear = "C&apos;est une r&eacute;compense annuelle pr&eacute;sent&eacute;e &agrave; l&apos;entra&icirc;neur adjug&eacute; pour avoir contribu&eacute; les la plupart &agrave; son succ&egrave;s d&apos;&eacute;quipes..";
	$l_PlayoffsChampions = "Ce troph&eacute;e est attribu&eacute; annuellement au champion de finale de ligue.";
	$l_FarmPlayoffsChampions = "Ce troph&eacute;e est attribu&eacute; annuellement au champion de finale de ligue de ferme.";
	break; 
} 


$ID_GetTrophy = "PlayoffsChampions";
if (isset($_GET['trophy'])) {
  $ID_GetTrophy = (get_magic_quotes_gpc()) ? $_GET['trophy'] : addslashes($_GET['trophy']);
}
$ID_GetTrophyPhoto = $ID_GetTrophy."Photo";


$query_GetTrophies = sprintf("SELECT %s as TROPHY, $ID_GetTrophyPhoto as PHOTO FROM trophies", $ID_GetTrophy);
$GetTrophies = mysql_query($query_GetTrophies, $connection) or die(mysql_error());
$row_GetTrophies = mysql_fetch_assoc($GetTrophies);
$totalRows_GetTrophies = mysql_num_rows($GetTrophies);

if($ID_GetTrophy  == "PlayoffsChampions"){
	$query_GetWinners = sprintf("SELECT x.S_ID, x.Season as Season_ID, p.Name, p.City, p.Number FROM proteam as p, proteamstandings as s, seasons as x WHERE p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') order by x.Season desc");
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else if ($ID_GetTrophy  == "FarmPlayoffsChampions"){
	$query_GetWinners = sprintf("SELECT x.S_ID, x.Season as Season_ID, p.Name, p.Number FROM farmteam as p, farmteamstandings as s, seasons as x WHERE p.Number=s.Number  AND x.SeasonType=0 AND x.S_ID=s.Season_ID AND (s.PlayOffEliminated='False' OR s.PlayOffEliminated='Faux') order by x.Season desc");
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else if ($ID_GetTrophy  == "CoachOfTheYear" || $ID_GetTrophy  == "FarmCoachOfTheYear"){
	$query_GetWinners = sprintf("SELECT T.%s as WINNERS, c.Name, T.Season_ID FROM trophywinners as T, coaches as c  WHERE c.Number=T.%s AND T.Team=0 GROUP BY T.Season_ID ORDER BY Season_ID Desc", $ID_GetTrophy, $ID_GetTrophy);
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else if ($ID_GetTrophy  == "GoalieOfTheYear" || $ID_GetTrophy  == "LowestGAA" || $ID_GetTrophy  == "FarmGoalieOfTheYear" || $ID_GetTrophy  == "FarmLowestGAA"){
	$query_GetWinners = sprintf("SELECT T.%s as WINNERS, g.Name, T.Season_ID, 'True' as PosG FROM trophywinners as T, goaliestats as g WHERE g.Number=T.%s AND T.Team=0  GROUP BY T.Season_ID ORDER BY Season_ID Desc", $ID_GetTrophy, $ID_GetTrophy);
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);

} else  if ($ID_GetTrophy == "PlayoffMVP"){
	$query_GetWinners = sprintf("SELECT T.PlayoffMVP as WINNERS, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=0
			AND p.Number=T.PlayoffMVP 
			AND T.Team=0 
			AND p.ProGP > 20 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.PlayoffMVP as WINNERS, p.Name, T.Season_ID, 'True' as PosG 
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
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else  if ($ID_GetTrophy == "FarmPlayoffMVP"){
	$query_GetWinners = sprintf("SELECT T.FarmPlayoffMVP as WINNERS, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=0
			AND p.Number=T.FarmPlayoffMVP 
			AND T.Team=0 
			AND p.FarmGP > 20 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.FarmPlayoffMVP as WINNERS, p.Name, T.Season_ID, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=0
			AND (p.Number+10000)=T.FarmPlayoffMVP 
			AND T.Team=0 
			AND p.FarmGP > 20 
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			");
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else  if ($ID_GetTrophy == "FarmRookieOfTheYear" || $ID_GetTrophy == "FarmMVP"){
	$query_GetWinners = sprintf("SELECT T.%s as WINNERS, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND p.Number=T.%s
			AND T.Team=0 
			AND p.FarmGP > 60 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.%s as WINNERS, p.Name, T.Season_ID, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND (p.Number+10000)=T.%s 
			AND T.Team=0 
			AND p.FarmGP > 45 
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			", $ID_GetTrophy, $ID_GetTrophy, $ID_GetTrophy, $ID_GetTrophy);
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else  if ($ID_GetTrophy == "RookieOfTheYear" || $ID_GetTrophy == "MVP"){
	$query_GetWinners = sprintf("SELECT T.%s as WINNERS, p.Name, T.Season_ID, 'False' as PosG 
			FROM trophywinners as T, playerstats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND p.Number=T.%s
			AND T.Team=0 
			AND p.ProGP > 60 
			GROUP BY T.Season_ID 
			UNION ALL
			SELECT T.%s as WINNERS, p.Name, T.Season_ID, 'True' as PosG 
			FROM trophywinners as T, goaliestats as p, seasons as s
			WHERE T.Season_ID=s.Season
			AND s.S_ID=p.Season_ID
			AND s.SeasonType=1
			AND (p.Number+10000)=T.%s 
			AND T.Team=0 
			AND p.ProGP > 45
			GROUP BY T.Season_ID 
			ORDER BY Season_ID Desc
			", $ID_GetTrophy, $ID_GetTrophy, $ID_GetTrophy, $ID_GetTrophy);
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else if ($ID_GetTrophy  == "GeneralManager"){
$query_GetWinners = sprintf("SELECT t.GeneralManager as WINNERS, t.GeneralManager as Name, t.Season_ID FROM trophywinners as t GROUP BY t.Season_ID ORDER BY t.Season_ID Desc");
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
} else {
	$query_GetWinners = sprintf("SELECT T.%s as WINNERS, p.Name, T.Season_ID, 'False' as PosG FROM trophywinners as T, playerstats as p  WHERE p.Number=T.%s AND T.Team=0 GROUP BY T.Season_ID ORDER BY Season_ID Desc", $ID_GetTrophy, $ID_GetTrophy);
	$GetWinners = mysql_query($query_GetWinners, $connection) or die(mysql_error());
	$row_GetWinners = mysql_fetch_assoc($GetWinners);
	$totalRows_GetWinners = mysql_num_rows($GetWinners);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $row_GetTrophies['TROPHY']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<h1><?php echo $row_GetTrophies['TROPHY']; ?></h1>
<div style="float:left;"><p>
<?php 
if ($ID_GetTrophy == "GeneralManager"){
	echo $l_GeneralManager;
} else if ($ID_GetTrophy == "MVP"){
	echo $l_MVP;
} else if ($ID_GetTrophy == "LowestPIM"){
	echo $l_LowestPIM;
} else if ($ID_GetTrophy == "GoalieOfTheYear"){
	echo $l_GoalieOfTheYear;
} else if ($ID_GetTrophy == "RookieOfTheYear"){
	echo $l_RookieOfTheYear;
} else if ($ID_GetTrophy == "TopScorer"){
	echo $l_TopScorer;
} else if ($ID_GetTrophy == "DefensemanOfTheYear"){
	echo $l_DefensemanOfTheYear;
} else if ($ID_GetTrophy == "MostSportsmanlikePlayer"){
	echo $l_MostSportsmanlikePlayer;
} else if ($ID_GetTrophy == "BestDefensiveForward"){
	echo $l_BestDefensiveForward;
} else if ($ID_GetTrophy == "BestDefensiveForward"){
	echo $l_BestDefensiveForward;
} else  if ($ID_GetTrophy == "TopGoalScorer"){
	echo $l_TopGoalScorer;
} else  if ($ID_GetTrophy == "LowestGAA"){
	echo $l_LowestGAA;
} else  if ($ID_GetTrophy == "PlayoffMVP"){
	echo $l_PlayoffMVP;
} else  if ($ID_GetTrophy == "CoachOfTheYear"){
	echo $l_CoachOfTheYear;
} else if ($ID_GetTrophy == "GeneralManager"){
	echo $l_GeneralManager;
} else if ($ID_GetTrophy == "FarmMVP"){
	echo $l_MVP;
} else if ($ID_GetTrophy == "FarmLowestPIM"){
	echo $l_LowestPIM;
} else if ($ID_GetTrophy == "FarmGoalieOfTheYear"){
	echo $l_GoalieOfTheYear;
} else if ($ID_GetTrophy == "FarmRookieOfTheYear"){
	echo $l_RookieOfTheYear;
} else if ($ID_GetTrophy == "FarmTopScorer"){
	echo $l_TopScorer;
} else if ($ID_GetTrophy == "FarmDefensemanOfTheYear"){
	echo $l_DefensemanOfTheYear;
} else if ($ID_GetTrophy == "FarmMostSportsmanlikePlayer"){
	echo $l_MostSportsmanlikePlayer;
} else if ($ID_GetTrophy == "FarmBestDefensiveForward"){
	echo $l_BestDefensiveForward;
} else if ($ID_GetTrophy == "FarmBestDefensiveForward"){
	echo $l_BestDefensiveForward;
} else  if ($ID_GetTrophy == "FarmTopGoalScorer"){
	echo $l_TopGoalScorer;
} else  if ($ID_GetTrophy == "FarmLowestGAA"){
	echo $l_LowestGAA;
} else  if ($ID_GetTrophy == "FarmPlayoffMVP"){
	echo $l_PlayoffMVP;
} else  if ($ID_GetTrophy == "FarmCoachOfTheYear"){
	echo $l_CoachOfTheYear;
} else  if ($ID_GetTrophy == "PlayoffsChampions"){
	echo $l_PlayoffsChampions;
} else  if ($ID_GetTrophy == "FarmPlayoffsChampions"){
	echo $l_FarmPlayoffsChampions;
}
?>
</p></div>
<div style="float:right;">
<?php 
if(isset($_SESSION['U_ID'])){
	if($_SESSION['U_Admin']==1){
		echo "<div style='display:inline; padding-right:10px; float:left'><a href='edit_trophy.php?trophy=".$row_GetTrophies['TROPHY']."'><strong>EDIT TROPHYS</strong></a></div>";
	}
}
?>
</div>
<br clear="all"/>

<div style="float:right; width:400px; text-align:center; padding-top:10px;">
<?php if ($row_GetTrophies['PHOTO'] <> ""){ ?>
<img src="<?php echo $_SESSION['DomainName']; ?>/image/trophys/<?php echo $row_GetTrophies['PHOTO']; ?>" border="0" alt="<?php echo $row_GetTrophies['TROPHY']; ?>" />
<?php } ?>
</div>
	
<table cellspacing="0" border="0" class="tablesorterRates" style="float:left; width:500px;">
<thead>
<tr>
<th>Season</th>
<th>Winner(s)</th>
</tr>
</thead>
<tbody>
<?php 
do {
if ($row_GetWinners['PosG'] == "True"){ 
	$tmpPlayerFile = "goalie.php";
} else {
	$tmpPlayerFile = "player.php";
}	
?>
        <tr>
            <td align="center"><?php echo $row_GetWinners['Season_ID']."-".substr($row_GetWinners['Season_ID']+1, -2);; ?></td>
            <?php if($ID_GetTrophy  == "PlayoffsChampions"){	?>	
				<td align="center"><a href="pro_stats.php?team=<?php echo $row_GetWinners['Number']; ?>&season_id=<?php echo $row_GetWinners['S_ID']; ?>"><?php echo $row_GetWinners['City']." ".$row_GetWinners['Name']; ?></a></td>
			<?php } else if($ID_GetTrophy  == "FarmPlayoffsChampions"){	?>	
				<td align="center"><a href="farm_stats.php?team=<?php echo $row_GetWinners['Number']; ?>&season_id=<?php echo $row_GetWinners['S_ID']; ?>"><?php echo $row_GetWinners['Name']; ?></a></td>
			<?php } else if ($ID_GetTrophy  == "CoachOfTheYear" || $ID_GetTrophy  == "FarmCoachOfTheYear"){	?>	
				<td align="center"><a href="coach.php?coach=<?php echo $row_GetWinners['WINNERS']; ?>"><?php echo $row_GetWinners['Name']; ?></a></td>
			<?php } else if ($ID_GetTrophy  == "GeneralManager"){	?>	
           	 <td align="center"><?php echo $row_GetWinners['Name']; ?></td>
            <?php } else { ?>
				<td align="center"><a href="<?php echo $tmpPlayerFile; ?>?player=<?php echo $row_GetWinners['WINNERS']; ?>"><?php echo $row_GetWinners['Name']; ?></a></td>
            <?php } ?>
        </tr>
<?php } while ($row_GetWinners = mysql_fetch_assoc($GetWinners)); ?>
    </tbody>
</table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
