<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_OV_D = "OV";
	break; 

case 'fr': 
	$l_OV_D = "Total";
	break;
} 
$SID_GetTop5 = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}


$query_GetSkaters = sprintf("SELECT * FROM players WHERE Team=%s AND Status0 <= 1  AND Retired=0 ORDER BY Position, Overall desc", $_SESSION['current_Team_ID']);
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);

$query_GetGoalies = sprintf("SELECT * FROM goalies WHERE Team=%s AND Status1 <= 1  AND Retired=0 ORDER BY Overall desc", $_SESSION['current_Team_ID']);
$GetGoalies = mysql_query($query_GetGoalies, $connection) or die(mysql_error());
$row_GetGoalies = mysql_fetch_assoc($GetGoalies);
$totalRows_GetGoalies = mysql_num_rows($GetGoalies);
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
	<span class="graytitle"><?php echo $l_nav_farmteam; ?></span>
	<ul class="pageitem">
    
		<?php 
		$LastPost = "";
		do { 
		if($row_GetSkaters['Position'] == 1 && $LastPost!=1){ $LastPost=1; echo '<li class="textbox"><span class="header"><br />'.$l_Center.'</span></li>'; }
		if($row_GetSkaters['Position'] == 2 && $LastPost!=2){ $LastPost=2; echo '<li class="textbox"><span class="header"><br />'.$l_LeftWing.'</span></li>'; }
		if($row_GetSkaters['Position'] == 3 && $LastPost!=3){ $LastPost=3; echo '<li class="textbox"><span class="header"><br />'.$l_RightWing.'</span></li>'; }
		if($row_GetSkaters['Position'] == 4 && $LastPost!=4){ $LastPost=4; echo '<li class="textbox"><span class="header"><br />'.$l_Defence.'</span></li>'; }		
		?>
        <li class="menu"><a href="player.php?player=<?php echo $row_GetSkaters['Number'];?>"><span class="name">
		<?php 
			echo $row_GetSkaters['Name'];
			if ($_SESSION['DisplayOV'] == 1) {  echo " (".$row_GetSkaters['Overall'].")"; }
		?></span><span class="arrow"></span></a></li> 
        <?php 
        } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
		mysql_free_result($GetSkaters);
		
		echo '<li class="textbox"><span class="header"><br />'.$l_Goalie.'</span></li>';
		do { 
		?>
        <li class="menu"><a href="goalie.php?player=<?php echo $row_GetGoalies['Number'];?>"><span class="name">
		<?php 
			echo $row_GetGoalies['Name'];
			if ($_SESSION['DisplayOV'] == 1) {  echo " (".$row_GetGoalies['Overall'].")"; }
		?></span><span class="arrow"></span></a></li> 
        <?php 
        } while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 
		mysql_free_result($GetGoalies);
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
