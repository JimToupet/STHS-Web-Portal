<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
$SID_GetSchedule= "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetSchedule= (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
$Day_ID = "0";
if (isset($_GET['pageNum_GetScheduleDay'])) {
  $Day_ID = (get_magic_quotes_gpc()) ? $_GET['pageNum_GetScheduleDay'] : addslashes($_GET['pageNum_GetScheduleDay']);
}


$query_GetLastDay = sprintf("select schedule.Day FROM schedule WHERE (schedule.Play='False' OR schedule.Play='Faux') AND schedule.Season_ID=%s ORDER BY schedule.Day asc Limit 0,1", $SID_GetSchedule);
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);

if ($totalRows_GetLastDay > 0){
	$Day_ID = $row_GetLastDay['Day'];
}

$query_GetSchedule = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s AND schedule.Day=%s", $SID_GetSchedule, $Day_ID);
$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
$totalRows_GetSchedule = mysql_num_rows($GetSchedule);

$query_GetSeasons = sprintf("SELECT Folder FROM seasons WHERE Active=1");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$tmpDay = $Day_ID;
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
		<a href="index.php"><?php echo $l_nav_home;?></a><a href="scores.php"><?php echo $l_nav_scores;?></a><a id="pressed" href="schedule.php"><?php echo $l_nav_schedules;?></a></div> 
</div>

<div id="content">
	<ul class="pageitem"> 
		<li class="textbox"><span class="header"><?php echo $l_nav_schedules;?></span><p></p> 
		</li> 
<?php 
if ($totalRows_GetSchedule > 0) {
$CellCount = 0;

do { 
$query_GetHomeTeam = sprintf("SELECT proteam.LogoTiny, proteam.City, proteam.Number, proteam.Name, proteam.Abbre FROM proteam WHERE proteam.Number=%s",$row_GetSchedule['HomeTeam']);
$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);
$query_GetVisitorTeam = sprintf("SELECT proteam.LogoTiny, proteam.City, proteam.Number, proteam.Name, proteam.Abbre FROM proteam WHERE proteam.Number=%s",$row_GetSchedule['VisitorTeam']);
$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);
?>
		<li class="menu">
		<span class="name"><?php echo $row_GetHomeTeam['City']." ".$l_vs." ".$row_GetVisitorTeam['City']; ?></span></li> 
<?php 	
mysql_free_result($GetHomeTeam);
mysql_free_result($GetVisitorTeam);
} while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)); 
} else {
	echo '<li class="menu"><span class="name">No games available</span></li>';
}
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
