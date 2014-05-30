<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Check Messages";
	$l_Inbox  = "Inbox";
	$l_SentItems  = "Sent Items";
	$l_CreateNewMessage  = "Create New Message";
	$l_Date  = "Date";
	$l_Title  = "Title";
	$l_Sender = "Sender";
	$l_Viewed = "Viewed";
	$l_Empty = "Empty In Box";
	break; 

case 'fr': 
	$l_PageTitle = "Boîte de r&eacute;ception";
	$l_Inbox  = "Boîte de r&eacute;ception";
	$l_SentItems  = "Messages envoy&eacute;s";
	$l_CreateNewMessage  = "&Eacute;crire un message";
	$l_Date  = "Date";
	$l_Title  = "Objet";
	$l_Sender = "De";
	$l_Viewed = "Vu";
	$l_Empty = "Vider";
	break;
}

$SORT = "DateCreated";
if (isset($_GET['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_GET['sort'] : addslashes($_GET['sort']);
}

$query_GetMail = sprintf("SELECT mail.M_ID, mail.DateCreated, mail.Title, mail.Viewed, proteam.Name, proteam.City, proteam.GM FROM mail LEFT JOIN proteam ON mail.Sender_U_ID=proteam.Number WHERE mail.Receiver_U_ID=%s ORDER BY %s desc", $_SESSION['current_Team_ID'], $SORT);
$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
$row_GetMail = mysql_fetch_assoc($GetMail);
$totalRows_GetMail = mysql_num_rows($GetMail);
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
	<span class="graytitle"><?php echo $l_nav_email; ?></span>
	<ul class="pageitem">    	
        <li class="menu"><span class="name"><a href="create_message.php?team=<?php echo $_SESSION['current_Team_ID'];?>&type=new"><?php echo $l_CreateNewMessage;?></a></span><span class="arrow"></span></a></li> 
		<?php
		if($totalRows_GetMail > 0){
		do { 
		?>
		<li class="menu"><a href="view_message.php?team=<?php echo $_SESSION['current_Team_ID']; ?>&id=<?php echo $row_GetMail['M_ID']; ?>&type=inbox">
		<span class="name"><?php echo $row_GetMail['DateCreated']." - ".$row_GetMail['Name']." - ".$row_GetMail['Title']; ?></span><span class="arrow"></span></a></li> 
        <?php 
		} while ($row_GetMail = mysql_fetch_assoc($GetMail)); 
		} else {
			echo '<li class="textbox"><span class="header">'.$l_Empty.'</span></li>';	
		}
		mysql_free_result($GetMail);
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
