<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_News = "News";
	$l_PC = 'To go to the PC site for full website, touch the "PC Site" button above.';
	$l_Choose = "Choose Team";
	break; 

case 'fr': 
	$l_News = "Nouvelles";
	$l_PC = "Pour aller à l'emplacement de PC pour le plein site Web, touchez le  PC Site bouton ci-dessus.";
	$l_Choose = "Choisissez l'équipe";
	break;
} 

$query_limit_GetTeamNews = sprintf("SELECT a.DateCreated, a.A_ID, a.Headline, a.Image, a.Summary, a.Team, a.Team as Number FROM articles as a  WHERE a.League='True' ORDER BY a.DateCreated desc, A_ID desc LIMIT 0, 5");
$GetTeamNews = mysql_query($query_limit_GetTeamNews, $connection) or die(mysql_error());
$row_GetTeamNews = mysql_fetch_assoc($GetTeamNews);
$totalRows_GetTeamNews = mysql_num_rows($GetTeamNews);

$query_GetConfigInfo = sprintf("SELECT UFA, SmallLeagueLogo, FarmLeague, RecoveryRate, DisplayOffers, LastModifiedSchedule, LeagueFile FROM config");
$GetConfigInfo = mysql_query($query_GetConfigInfo, $connection) or die(mysql_error());
$row_GetConfigInfo = mysql_fetch_assoc($GetConfigInfo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['TouchIcon'];?>" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $_SESSION['SiteName'] ; ?></title>
<meta content="STHS Web Portal" name="keywords" />
</head>

<body>

<div id="topbar"> 
	<div id="title"> 
		<?php echo $_SESSION['SiteName'] ; ?></div> 
	<div id="leftbutton"> 
		<a href="<?php echo $_SESSION['DomainName']; ?>/home.php" class="noeffect">PC Site</a> </div> 
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div> 

<div id="tributton"> 
	<div class="links"> 
		<a id="pressed" href="index.php"><?php echo $l_nav_home;?></a><a href="scores.php"><?php echo $l_nav_scores;?></a><a href="schedule.php"><?php echo $l_nav_schedules;?></a></div> 
</div> 

<div id="content">
    	<ul class="pageitem"> 
<li class="select"><select name="d" onchange="location = this.options[this.selectedIndex].value;" ><option value="#"><?php echo $l_Choose;?></option>
<?php
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$tmpSelect = "";	
	echo '<option value="team.php?team='.$_SESSION['MenuTeamsID'][$TeamPage].'" '.$tmpSelect.'>'.$_SESSION['MenuTeams'][$TeamPage].'</option>';
}
?>
</select><span class="arrow"></span> </li>
</ul>
	<ul class="pageitem"> 
		<li class="textbox"><span class="header"><?php echo $l_News;?></span><p><?php echo $l_PC;?></p> 
		</li> 
        <?php
		if($totalRows_GetTeamNews > 0){
		do { 
		if($row_GetTeamNews['Team']==""){$row_GetTeamNews['Team']=0;}
		$query_limit_GetTeamLogo = sprintf("SELECT p.LogoTiny FROM proteam as p WHERE p.Number=%s",$row_GetTeamNews['Team']);
			$GetTeamLogo = mysql_query($query_limit_GetTeamLogo, $connection) or die(mysql_error());
			$row_GetTeamLogo = mysql_fetch_assoc($GetTeamLogo);
			$totalRows_GetTeamLogo = mysql_num_rows($GetTeamLogo);
			if($totalRows_GetTeamLogo > 0){
				$tmpLogo = $row_GetTeamLogo['LogoTiny'];
			} else {
				$tmpLogo = $row_GetConfigInfo['SmallLeagueLogo'];
			}
		?>
		<li class="menu"><a href="news.php?team=<?php if($row_GetTeamNews['Number'] != ""){ echo $row_GetTeamNews['Number']; } else { echo 0; }?>&article=<?php echo $row_GetTeamNews['A_ID'];?>">
		<img src="<?php echo $_SESSION['DomainName']."/image/logos/small/".$tmpLogo; ?>" />
        <span class="name"><?php echo $row_GetTeamNews['Headline']; ?></span><span class="arrow"></span></a></li> 
        <?php 
		} while ($row_GetTeamNews = mysql_fetch_assoc($GetTeamNews)); 
		}
		mysql_free_result($GetTeamNews);
		?>
	</ul>
</div>

<div id="footer">
	<a class="noeffect" href="http://www.simhl.net"><?php echo $l_footer_2; ?> STHS WEB PORTAL</a>
	&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php
    $currentFile = $_SERVER["SCRIPT_NAME"]; 
    $parts = Explode('/', $currentFile); 
    $currentFile = $parts[count($parts) - 1]; 
    if($lang=='en'){
        echo '<a class="noeffect"href="langswitch.php?lang=fr&prevpage='.$currentFile.'">Fran&ccedil;ais</a>';
    } else {
        echo '<a class="noeffect"href="langswitch.php?lang=en&prevpage='.$currentFile.'">English</a>';
    }
    ?>
</div>

</body>

</html>
