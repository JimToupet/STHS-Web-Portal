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


$query_GetLastDay = sprintf("select schedule.Day FROM schedule WHERE (schedule.Play='TRUE' OR schedule.Play='Vrai') AND schedule.Season_ID=%s GROUP BY schedule.Day Desc Limit 0,1", $SID_GetSchedule);
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);

if ($Day_ID == 0){
	$Day_ID = $row_GetLastDay['Day'];
}

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_GetScheduleDay = 1;
$pageNum_GetScheduleDay = $Day_ID;
if (isset($_GET['pageNum_GetScheduleDay'])) {
  $pageNum_GetScheduleDay = $_GET['pageNum_GetScheduleDay'];
}
$startRow_GetScheduleDay = $pageNum_GetScheduleDay * $maxRows_GetScheduleDay;

$query_GetScheduleDay = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s GROUP BY schedule.Day ORDER BY schedule.Day", $SID_GetSchedule);
$query_limit_GetScheduleDay = sprintf("%s LIMIT %d, %d", $query_GetScheduleDay, $startRow_GetScheduleDay, $maxRows_GetScheduleDay);
$GetScheduleDay = mysql_query($query_limit_GetScheduleDay, $connection) or die(mysql_error());
$row_GetScheduleDay = mysql_fetch_assoc($GetScheduleDay);
$totalRows_GetScheduleDay = mysql_num_rows($GetScheduleDay);

if (isset($_GET['totalRows_GetScheduleDay'])) {
  $totalRows_GetScheduleDay = $_GET['totalRows_GetScheduleDay'];
} else {
  $all_GetScheduleDay = mysql_query($query_GetScheduleDay);
  $totalRows_GetScheduleDay = mysql_num_rows($all_GetScheduleDay);
}
$totalPages_GetScheduleDay = ceil($totalRows_GetScheduleDay/$maxRows_GetScheduleDay);
$queryString_GetScheduleDay = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_GetScheduleDay") == false && 
        stristr($param, "totalRows_GetScheduleDay") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_GetScheduleDay = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_GetScheduleDay = sprintf("&totalRows_GetScheduleDay=%d%s", $totalRows_GetScheduleDay, $queryString_GetScheduleDay);
if($Day_ID > 0){
$query_GetSchedule = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s AND schedule.Day=%s ORDER BY schedule.Number", $SID_GetSchedule,$Day_ID);
} else {
$query_GetSchedule = sprintf("SELECT schedule.* FROM schedule  WHERE schedule.Season_ID=%s ORDER BY schedule.Number", $SID_GetSchedule);	
}
$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
$row_GetSchedule= mysql_fetch_assoc($GetSchedule);
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
		<a href="index.php"><?php echo $l_nav_home;?></a><a id="pressed" href="scores.php"><?php echo $l_nav_scores;?></a><a href="schedule.php"><?php echo $l_nav_schedules;?></a></div> 
</div> 

<div id="content">
	<ul class="pageitem"> 
		<li class="textbox"><span class="header"><?php echo $l_nav_scores;?></span><p></p> 
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

$query_GetLink = sprintf("SELECT * FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Pro',CAST(".$row_GetSchedule['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $SID_GetSchedule);
$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
$row_GetLink = mysql_fetch_assoc($GetLink);
$totalRows_GetLink = mysql_num_rows($GetLink);
if($totalRows_GetLink > 0){
	$GameLink = $row_GetLink['Link'];
} else {
	$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Pro'ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
	$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
	$row_GetLink = mysql_fetch_assoc($GetLink);
	$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
	$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
	$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetSchedule['Number'].".html";
}
?>
		<li class="menu"><a href="<?php echo $_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink; ?>">
		<span class="name"><?php echo $row_GetHomeTeam['City']." ".$l_vs." ".$row_GetVisitorTeam['City']." : ".$row_GetSchedule['HomeScore']."-".$row_GetSchedule['VisitorScore']; ?></span><span class="arrow"></span></a></li> 
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
