<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	// Create the position references array
	$l_C  = "C";
	$l_LW  = "LW";
	$l_RW  = "RW";
	$l_D  = "D";
	$l_G  = "G";
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
	$l_OutsideLinks = "Profile Links:";
	$l_NoNotes = "No notes available.";
	$l_Rights = "Rights owned by";
	$l_EditPlayer = "EDIT PROSPECT";
	$l_Activate = "ACTIVATE";
	break; 

case 'fr': 
	// Create the position references array
	$l_C  = "C";
	$l_LW  = "AG";
	$l_RW  = "AD";
	$l_D  = "D";
	$l_G  = "G";
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
	$l_OutsideLinks = "LIENS :";
	$l_NoNotes = "Pas de notes disponibles";
	$l_Rights = "Droits appartiennent aux";
	$l_EditPlayer = "Modifier Rel&#232;ve";
	$l_Activate = "Activer";
	break;
} 


$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}

$PID_GetPlayer = ParseSQL($PID_GetPlayer);


$query_GetPlayer = sprintf("SELECT prospects.*, proteam.Name As Team FROM prospects LEFT JOIN proteam ON prospects.TeamNumber = proteam.Number WHERE prospects.Name='%s'", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetProspects = sprintf("SELECT prospects.Name, prospects.Position FROM prospects WHERE prospects.TeamNumber=%s ORDER BY Name", $_SESSION['current_Team_ID'] );
$GetProspects = mysql_query($query_GetProspects, $connection) or die(mysql_error());
$row_GetProspects = mysql_fetch_assoc($GetProspects);

$query_GetInfo = sprintf("SELECT JuniorLeague FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);

if ($row_GetPlayer['TeamNumber']==""){
	$tmpTeamNumber = 0;
} else {
	$tmpTeamNumber = $row_GetPlayer['TeamNumber'];
}

$query_GetTeamInfo = sprintf("SELECT p.Number,  p.Name,  p.Abbre,  p.City,  p.LogoLarge,  p.LogoSmall,  p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Number=%s ", $tmpTeamNumber);
$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
.prospects li {	display:inline; 	position: relative; float: left; margin-right:10px;}
.prospects li a {margin-right:30px;}
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
                    <td width="110" rowspan="2" style="vertical-align:top; width:110px;"><img src="<?php echo imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
                    <td rowspan="2" valign="top" height="150" style="vertical-align:middle;">
                        <div align="center"><img src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>"id="TeamPhoto" /></div>
                        <div style="position:absolute; z-index:10; top:308px; padding-left:20px; ">
                            <FORM>
                            <SELECT ONCHANGE="location = this.options[this.selectedIndex].value;" style="font-size:0.85em; width:150px; text-align:center;">
                            <?php 
							echo "<option>".$l_nav_prospects."</option>";
                            $tmpTargetFile="prospect.php";
                            do { 
                                echo '<OPTION VALUE="'.$tmpTargetFile.'?player='.$row_GetProspects['Name'].'">'.$row_GetProspects['Name'].'</OPTION>';
                            } while ($row_GetProspects = mysql_fetch_assoc($GetProspects));
                            ?>
                            </SELECT> 
                            </FORM>
                        </div>
                    </td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px; width:65%; vertical-align:top;">
                    
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
                    <tr>
                    	<td colspan="2" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $row_GetPlayer['Name']; ?></strong></td>
						<td>
						<?php 
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
								echo '<a href="edit_prospect.php?player='.$row_GetPlayer['Name'].'" class="button edit">'.$l_EditPlayer.'</a>&nbsp;&nbsp;&nbsp;';
								echo '<a href="activate_prospect.php?player='.$row_GetPlayer["Name"].'" style="padding-left:20px" class="button star">'.$l_Activate.'</a></li>';
							}
						}
						?>
                        </td>
                     </tr>
                     <tr>
                        <td style="vertical-align:bottom;">Position(s): <strong>
                        <?php
							if ($row_GetPlayer['Position']==1){
								echo $l_Center;
							} elseif ($row_GetPlayer['Position']==2){
								echo $l_LeftWing;
							} elseif ($row_GetPlayer['Position']==3){
								echo $l_RightWing;
							} elseif ($row_GetPlayer['Position']==4){
								echo $l_Defence;
							} elseif ($row_GetPlayer['Position']==5){
								echo $l_Goalie;
							} 
						?>
                    	</strong></td>
                        <td><?php echo $l_PotentialTitle;?>: <strong><?php echo $row_GetPlayer['ProspectGrade'] . $row_GetPlayer['ProspectLevel']; ?></strong></td>
                        <td><?php echo $l_DraftYear;?>: <strong><?php echo $row_GetPlayer['DraftYear']; ?></strong></td>
                    </tr>
                    <tr>
                    	<td colspan="3"><?php if ($row_GetPlayer['Bio'] <> ""){echo $row_GetPlayer['Bio'];  } else {  echo $l_NoNotes; } ?></td>
                    </tr>
                    <tr>
                    <form method=post action='http://www.forecaster.ca/cbc/hockey/playerindex.cgi' target='new'>
                    <input type="hidden" name='x_param' value='search' />
                    <input type="hidden" name='x_option' value="<?php echo $row_GetPlayer['Name']; ?>" />
                    </form>
                    <form method=post action='http://tsf.waymoresports.thestar.com/thestar/hockey/playerindex.cgi'  target='new'>
                    <input type="hidden" name='x_param' value='search' />
                    <input type="hidden" name='x_option' value="<?php echo $row_GetPlayer['Name']; ?>" />
                    </form>
                        <td colspan="3">
                            
                            <ul class="prospects"><li><?php echo $l_OutsideLinks;?></li>
                            <li><a href="http://www.hockeysfuture.com/prospects/<?php echo str_replace( " ", "_", $row_GetPlayer['Name'] ); ?>" target='new'><strong>Hockey's Future</strong></a></li>                            
                            <li><a href="javascript:document.forms[1].submit();"><strong>CBC.ca - Forecaster</strong></a></li>
                            <li><a href="javascript:document.forms[2].submit();"><strong>theStar.com - Way More Sports</strong></a></li>
                            </li>
                        </td>
                     </tr>
                     </table>
                     
                  </td>
          	</tr>
          </table>
          
          <br /><br />
		<?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
        <table width="100%">
        <tr><td valign="top">
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
            
        </td><td width="10"></td>
        <td valign="top">
            
            <strong><?php echo $l_PotentialGradeTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_Grade_A;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_Grade_B;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_Grade_C;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_Grade_D;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_Grade_E;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_Grade_F;?></td></tr>
            </table>
        </td>
        </tr>
        </table>

            <p ><a href="http://www.hockeysfuture.com/playerprojections/" target="_blank"><?php echo $l_fullDetails;?></a></p>
<?php } else { ?>

            <table width="100%">
        <tr><td valign="top">
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
            
            
    </td><td width="10"></td>
        <td valign="top">
            
            <strong><?php echo $l_PotentialGradeTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_J_Grade_A;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_J_Grade_B;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_J_Grade_C;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_J_Grade_D;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_J_Grade_E;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_J_Grade_F;?></td></tr>
            </table>
            </td>
        </tr>
        </table>
    <?php } ?><br /><br />
          
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
