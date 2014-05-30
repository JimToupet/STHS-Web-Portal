<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	// Create the position references array
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = $l_LeftWing;
	$a_Positions[ "3" ] = $l_RightWing;
	$a_Positions[ "1"  ] = $l_Center;
	$a_Positions[ "4"  ] = $l_Defense;
	$a_Positions[ "5"  ] = $l_Goalie;
	$l_Year = "Year";
	$l_Round = "Round";
	break; 

case 'fr': 
	// Create the position references array
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = $l_LeftWing;
	$a_Positions[ "3" ] = $l_RightWing;
	$a_Positions[ "1"  ] = $l_Center;
	$a_Positions[ "4"  ] = $l_Defense;
	$a_Positions[ "5"  ] = $l_Goalie;
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
$totalRows_GetProspects = mysql_num_rows($GetProspects);
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
	<div id="title"><?php echo $_SESSION['current_City']." ".$_SESSION['current_Team'];?></div>
	<div id="leftnav">
		<a href="team.php?team=<?php echo $_SESSION['current_Team_ID']; ?>"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<span class="graytitle"><?php echo $l_nav_prospects; ?></span>
	<ul class="pageitem">
		<?php
		if($totalRows_GetProspects > 0){
		do { 
		?>
		<li class="menu"><span class="name"><?php echo $row_GetProspects['Name']." - ".$a_Positions[ $row_GetProspects[ 'Position' ] ]." - ".$row_GetProspects['ProspectGrade'] . $row_GetProspects['ProspectLevel'];?></span></li> 
        <?php 
        } while ($row_GetProspects = mysql_fetch_assoc($GetProspects)); 
		} else {
			echo '<li class="textbox"><span class="header">'.$l_Empty.'</span></li>';	
		}
		mysql_free_result($GetProspects);
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
