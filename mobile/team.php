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
		<?php echo $_SESSION['current_City']." ".$_SESSION['current_Team']; ?></div> 
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div> 

<div id="content">
	<span class="graytitle"><?php echo $l_nav_gm." : ".$_SESSION['U_Name'];?></span> 
    
    <ul class="pageitem"> 
    <li class="select"><select name="d" onchange="location = this.options[this.selectedIndex].value;" >
    <?php
    foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
        if($_SESSION['MenuTeamsID'][$TeamPage] == $_SESSION['current_Team_ID']){
            $tmpSelect = 'selected="selected"';
        } else {
                $tmpSelect = "";	
        }
        echo '<option value="team.php?team='.$_SESSION['MenuTeamsID'][$TeamPage].'" '.$tmpSelect.'>'.$_SESSION['MenuTeams'][$TeamPage].'</option>';
    }
    ?>
    </select><span class="arrow"></span> </li>
    </ul>

	<ul class="pageitem"> 
		<li class="textbox"><span class="header"><img src="<?php echo $_SESSION['DomainName']."/image/logos/medium/".$_SESSION['current_LogoSmall']; ?>" style="float:left; padding-right:10px;" />
		<?php echo $_SESSION['current_City']." ".$_SESSION['current_Team']."<br />".$_SESSION['current_GM'];?></span> 
		</li> 
        <?php if(isset($_SESSION['U_ID'])){if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){ ?>
		<li class="menu"><a href="check_messages.php?team=<?php echo $_SESSION['current_Team_ID'];?>">		
        <span class="name"><?php echo $l_nav_email;?></span><span class="arrow"></span></a></li>
        <li class="menu"><a href="trade.php">		
        <span class="name"><?php echo $l_nav_trade;?></span><span class="arrow"></span></a></li>
        <?php }} ?>
		<li class="menu"><a href="pro_roster.php?team=<?php echo $_SESSION['current_Team_ID'];?>">		
        <span class="name"><?php echo $l_nav_proteam;?></span><span class="arrow"></span></a></li> 
		<li class="menu"><a href="farm_roster.php?team=<?php echo $_SESSION['current_Team_ID'];?>">		
        <span class="name"><?php echo $l_nav_farmteam;?></span><span class="arrow"></span></a></li> 
		<li class="menu"><a href="prospects.php?team=<?php echo $_SESSION['current_Team_ID'];?>">		
        <span class="name"><?php echo $l_nav_prospects;?></span><span class="arrow"></span></a></li>
		<li class="menu"><a href="draft_picks.php?team=<?php echo $_SESSION['current_Team_ID'];?>">		
        <span class="name"><?php echo $l_nav_draft;?></span><span class="arrow"></span></a></li> 
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
