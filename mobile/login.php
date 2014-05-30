<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
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
		<a id="pressed" href="index.php">Home</a><a href="scores.php">Scores</a><a href="schedule.php">Next Games</a></div> 
</div> 

<div id="content">
	<form method="post" action="check_login.php">
		<fieldset><span class="graytitle"><?php echo $l_login;?></span>
		<ul class="pageitem">
			<li class="bigfield"><input name="username" type="text" /></li>
			<li class="bigfield">
			<input name="password" type="password" /></li>
		</ul>
        <li class="button">
			<input name="Submit input" type="submit" value="<?php echo $l_login;?>" /></li>
		</ul>
		</fieldset></form>
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
