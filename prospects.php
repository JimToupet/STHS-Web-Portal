<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	// Create the position references array
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = "LW";
	$a_Positions[ "3" ] = "RW";
	$a_Positions[ "1"  ] = "C";
	$a_Positions[ "4"  ] = "D";
	$a_Positions[ "5"  ] = "G";
	$l_PotentialTitle = "Realistic Potential Rating (1-10)";
	$l_DraftPicks= "Draft Picks";
	$l_DraftYear = "Draft Year";
	$l_Potential = "Potential";
	$l_Rank_10 = "Generational talent";
	$l_Rank_9 = "Elite forward / defenseman / goaltender";
	$l_Rank_8 = "First line forward / No. 2 defenseman / No. 1 goaltender";
	$l_Rank_7 = "Second line forward / No. 3-4 defenseman / journeyman No. 1 goaltender";
	$l_Rank_6 = "Third line forward / No. 5-6 defenseman / Backup Goaltender";
	$l_Rank_5 = "Fourth line forward / No. 7 defenseman / depth goaltender";
	$l_Rank_4 = "Top minor league forward / defenseman / goaltender";
	$l_Rank_3 = "Average minor league forward / defenseman / goaltender";
	$l_Rank_2 = "Minor league role-player";
	$l_Rank_1 = "Borderline minor league player";
	$l_J_Rank_10 = "Generational talent (ex. Sidney Crosby)";
	$l_J_Rank_9 = "1st round draft pick (1-3)";
	$l_J_Rank_8 = "1st round draft pick (4-10)";
	$l_J_Rank_7 = "1st round draft pick (11-22)";
	$l_J_Rank_6 = "2nd round draft pick";
	$l_J_Rank_5 = "3rd round draft pick";
	$l_J_Rank_4 = "4th round draft pick";
	$l_J_Rank_3 = "5th round draft pick";
	$l_J_Rank_2 = "6th round through 9th round draft pick";
	$l_J_Rank_1 = "10th round or greater draft pick";
	$l_J_Grade_A = "All but guaranteed to play in CHL";
	$l_J_Grade_B = "Should play in CHL, could drop 1 rating";
	$l_J_Grade_C = "May play in CHL, could drop 2 ratings";
	$l_J_Grade_D = "Unlikely to play in CHL, could drop 3 ratings";
	$l_J_Grade_E = "A player that will not report to their CHL team";
	$l_J_Grade_F = "A player with no chance of playing in the CHL";
	$l_PotentialGradeTitle = "Realistic Probability Rating (A-F)";
	$l_Grade_A = "All but guaranteed to reach potential";
	$l_Grade_B = "Should reach potential, could drop 1 rating";
	$l_Grade_C = "May reach potential, could drop 2 ratings";
	$l_Grade_D = "Unlikely to reach potential, could drop 3 ratings";
	$l_Grade_E = "A player that will not report to their CHL team";
	$l_Grade_F = "A player possessing little potential";
	$l_upcomingDraft = "Upcoming Draft(s):";
	$l_fullDetails = "Full Details of the Chart at HockeysFuture.com";
	$l_Year = "Year";
	$l_Round = "Round";
	break; 

case 'fr': 
	// Create the position references array
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = "AG";
	$a_Positions[ "3" ] = "AD";
	$a_Positions[ "1"  ] = "C";
	$a_Positions[ "4"  ] = "D";
	$a_Positions[ "5"  ] = "G";
	$l_PotentialTitle = "Potentiel de Production (0-10)";
	$l_DraftPicks= "Choix au Rep&ecirc;chage";
	$l_DraftYear = "Ann&eacute;e Rep&ecirc;ch&eacute;e";
	$l_Potential = "Potentiel";
	$l_Rank_10 = "Talent g&eacute;n&eacute;rationel";
	$l_Rank_9 = "Attaquant &eacute;lite / D&eacute;fenseur / Gardien";
	$l_Rank_8 = "Attaquant 1&egrave;re ligne  / D&eacute;fenseur #2 / Gardien #1";
	$l_Rank_7 = "Attaquant 2e ligne / D&eacute;fenseur #3-4 / Gardien #1 occasionnel";
	$l_Rank_6 = "Attaquant 3e ligne / D&eacute;fenseur #5-6 / Gardien #2";
	$l_Rank_5 = "Attaquant 4e ligne / D&eacute;fenseur #7 / Gardien de profondeur";
	$l_Rank_4 = "Top Attaquant / D&eacute;fenseur / Gardien des ligues mineures";
	$l_Rank_3 = "Attaquant / D&eacute;fenseur / Gardien des ligues mineures moyen";
	$l_Rank_2 = "Plombier des lignes mineures";
	$l_Rank_1 = "Joueur occasionnel des ligues mineures";
	$l_J_Rank_10 = "Talent g&eacute;n&eacute;rationnel (ex. Sidney Crosby)";
	$l_J_Rank_9 = "Choix de Premi&egrave;re Ronde (1-3)";
	$l_J_Rank_8 = "Choix de Premi&egrave;re Ronde (4-10)";
	$l_J_Rank_7 = "Choix de Premi&egrave;re Ronde (11-22)";
	$l_J_Rank_6 = "Choix de Deuxi&egrave;me Ronde";
	$l_J_Rank_5 = "Choix de Troisi&egrave;me Ronde";
	$l_J_Rank_4 = "Choix de Quatri&egrave;me Ronde";
	$l_J_Rank_3 = "Choix de Cinqi&egrave;me Ronde";
	$l_J_Rank_2 = "Choix de Sixi&egrave;me Ronde";
	$l_J_Rank_1 = "Choix de Dixi&egrave;me Ronde";
	$l_J_Grade_A = "Tout sauf garantie de jouer dans la ligue junior";
	$l_J_Grade_B = "Devrait jouer dans la ligue junior, pourrait descendre d'une cote de Production";
	$l_J_Grade_C = "Pourrait jouer dans la ligue junior, pourrait descendre de 2 cote de Production";
	$l_J_Grade_D = "Pourrait jouer dans la ligue junior, pourrait descendre de 3 cote de Production";
	$l_J_Grade_E = "Un joueur qui jouera probablement carriere dans la ligue junior";
	$l_J_Grade_F = "Un joueur qui ne jouera que dans la ligue junior et meme la ...";
	$l_PotentialGradeTitle = "Potentiel de Valeur (A-F)";
	$l_Grade_A = "Tout sauf garantie de jouer";
	$l_Grade_B = "Devrait jouer, pourrait descendre d'une cote de Production";
	$l_Grade_C = "Pourrait jouer, pourrait descendre de 2 cotes de Production";
	$l_Grade_D = "Jouera probablement pas, pourrait descendre de 3 cotes de Production";
	$l_Grade_E = "Un joueur qui jouera probablement toute sa carri&egrave;re dans les ligues mineures";
	$l_Grade_F = "Un joueur qui ne jouera que dans les ligues mineures junior et m&ecirc;me l&agrave; ...";
	$l_upcomingDraft = "Futurs choix au rep&ecirc;chage:";
	$l_fullDetails = "HockeysFuture.com";	
	$l_Year = "Ann&eacute;e";
	$l_Round = "Ronde";
	break;
} 


$TID_GetProspects = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetProspects = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}

$query_GetProspects = sprintf("SELECT prospects.* FROM prospects WHERE prospects.TeamNumber='%s' ORDER BY prospects.ProspectGrade DESC, prospects.ProspectLevel, prospects.Name", $TID_GetProspects );
$GetProspects = mysql_query($query_GetProspects, $connection) or die(mysql_error());
$row_GetProspects = mysql_fetch_assoc($GetProspects);
$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Name AND draftpicks.OwnBy='%s' ORDER BY draftpicks.Year, draftpicks.Round", $_SESSION['current_Team']);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$query_GetSeasons = sprintf("SELECT * FROM draftpicks group by Year Order By Year");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons = mysql_num_rows($GetSeasons);
$query_GetInfo = sprintf("SELECT JuniorLeague FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_prospects;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_prospects;?></h1>
    
    <Table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td width="49%">
             <br /> 
            <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <thead>
            <tr>
                <th><a>#</a></th>
                <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
                <th><a title="<?php echo $l_Position;?>"><?php echo $l_Position;?></a></th>
                <th><a title="<?php echo $l_Potential;?>"><?php echo $l_Potential;?></a></th>
                <th><a title="<?php echo $l_DraftYear;?>"><?php echo $l_DraftYear;?></a></th>
                <?php if (isset($_SESSION['U_Admin']) && $_SESSION['U_Admin'] == 1){ echo "<th></th>"; } ?>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php $tmpCount = 0; do { ?>
            <tr>
                <td align="center"><?php echo $tmpCount+1; ?></td>
                <td><a href="prospect.php?player=<?php echo $row_GetProspects['Name']; ?>"><?php echo $row_GetProspects['Name'] ?></a></td>
                <td align="center"><?php echo $a_Positions[ $row_GetProspects[ 'Position' ] ]; ?></td>
                <td align="center"><?php echo $row_GetProspects['ProspectGrade'] . $row_GetProspects['ProspectLevel']; ?></td>
                <td align="center"><?php echo $row_GetProspects['DraftYear']; ?></td>
                <?php 
                if (isset($_SESSION['U_Admin']) && $_SESSION['U_Admin'] == 1){
                    echo '<td align="right"><a href="remove_prospect.php?player='.$row_GetProspects['Name'].'&target=prospects.php">Remove Prospect</a></td>';
                }
                ?>
            </tr>
            <?php 
                $tmpCount = $tmpCount+1;
                } while ($row_GetProspects = mysql_fetch_assoc($GetProspects));
            ?>
            </tbody>
            </table>
    
    	 </td>
        <td width="2">&nbsp;</td>
        <td width="49%">
        	<?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
					<strong><?php echo $l_PotentialTitle;?></strong><br />
					<table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
					<tr><td valign="top" nowrap="nowrap" style="font-size:11px;">10 -</td><td style="font-size:11px;"><?php echo $l_Rank_10;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">9 -</td><td style="font-size:11px;"><?php echo $l_Rank_9;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">8 -</td><td style="font-size:11px;"><?php echo $l_Rank_8;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">7 -</td><td style="font-size:11px;"><?php echo $l_Rank_7;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">6 -</td><td style="font-size:11px;"><?php echo $l_Rank_6;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">5 -</td><td style="font-size:11px;"><?php echo $l_Rank_5;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">4 -</td><td style="font-size:11px;"><?php echo $l_Rank_4;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">3 -</td><td style="font-size:11px;"><?php echo $l_Rank_3;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">2 -</td><td style="font-size:11px;"><?php echo $l_Rank_2;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">1 -</td><td style="font-size:11px;"><?php echo $l_Rank_1;?></td></tr>
					</table>
					
					<bR /><br />
					
					<strong><?php echo $l_PotentialGradeTitle;?></strong><br />
					<table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
					<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_Grade_A;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_Grade_B;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_Grade_C;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_Grade_D;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_Grade_E;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_Grade_F;?></td></tr>
					</table>

					<p ><a href="http://www.hockeysfuture.com/playerprojections/" target="_blank"><?php echo $l_fullDetails;?></a></p>
			<?php } else { ?>
		
					<strong><?php echo $l_PotentialTitle;?></strong><br />
					<table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
					<tr><td valign="top" nowrap="nowrap" style="font-size:11px;">10 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_10;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">9 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_9;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">8 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_8;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">7 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_7;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">6 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_6;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">5 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_5;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">4 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_4;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">3 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_3;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">2 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_2;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">1 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_1;?></td></tr>
					</table>
					
					<bR /><br />
					
					<strong><?php echo $l_PotentialGradeTitle;?></strong><br />
					<table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
					<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_J_Grade_A;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_J_Grade_B;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_J_Grade_C;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_J_Grade_D;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_J_Grade_E;?></td></tr>
					<tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_J_Grade_F;?></td></tr>
					</table>	
			<?php } ?>
        
            </td>
        </tr>
        </Table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
