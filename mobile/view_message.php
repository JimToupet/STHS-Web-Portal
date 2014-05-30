<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_Reply = "Reply";
	break; 

case 'fr': 
	$l_Reply = "R&eacute;ponse";
	break;
}

$ID_GetMail = "1";
if (isset($_GET['id'])) {
  $ID_GetMail = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$GetType = "Inbox";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}

$query_GetMail = sprintf("SELECT mail.*, proteam.Name, proteam.City, proteam.GM, proteam.Avatar FROM mail LEFT JOIN proteam ON mail.Sender_U_ID=proteam.Number WHERE mail.M_ID=%s", $ID_GetMail);
$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
$row_GetMail = mysql_fetch_assoc($GetMail);
if ($GetType <> "sent") {
	$updateSQL = "UPDATE mail SET mail.Viewed = 'True' WHERE mail.M_ID=".$ID_GetMail;
	
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
}
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
		<a href="check_messages.php?team=<?php echo $_SESSION['current_Team_ID']; ?>"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<span class="graytitle">
		<?php echo date("l, F j, Y - G:i A", strtotime($row_GetMail['DateCreated']));?></span>
		
     <ul class="pageitem">
		<li class="textbox"><span class="header">
   	 	<?php 
		if ($row_GetMail['GM'] == ""){
            echo "League";
        } else {
            echo $row_GetMail['GM']." (".$row_GetMail['City']." ".$row_GetMail['Name'].")"; 
        }
        ?>
        </span>
		<?php echo $row_GetMail['Content']; ?>
        </li>
        <li class="menu"><span class="name"><a href="create_message.php?team=<?php echo $_SESSION['current_Team_ID'].'&id='.$row_GetMail['M_ID'];?>&type=reply"><?php echo $l_Reply;?></a></span><span class="arrow"></span></a></li> 
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
