<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_GM_Video = "General Manager Videos";
	$l_GM_Video_1 = "How to use the STHS Client Software";
	$l_GM_Video_2 = "How to edit your lines"; 
	$l_GM_Video_3 = "How to use the Web Portal as a GM"; 
	$l_GM_Video_4 = "How to use the Web Portal with a Mobile device"; 
	$l_ADMIN_Video = "Administrator Videos";
	$l_ADMIN_Video_1 = "How to Install";
	$l_ADMIN_Video_2 = "How to upgrade from STHS v1.1.9";
	break; 
	
case 'fr': 	
	$l_GM_Video = "Vid&eacute;os pour Directeurs G&eacute;rants";
	$l_GM_Video_1 = "Comment employer le logiciel de client de STHS";
	$l_GM_Video_2 = "Comment &eacute;diter vos lignes"; 
	$l_GM_Video_3 = "Comment employer le portail Internet comme DG"; 
	$l_GM_Video_4 = "Comment employer le portail Internet avec un dispositif mobile"; 
	$l_ADMIN_Video = "Vid&eacute;os pour Administrateur";
	$l_ADMIN_Video_1 = "Comment installer";
	$l_ADMIN_Video_2 = "Comment am&eacute;liorer de STHS v1.1.9";
	break; 
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_video_tutorials;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_video_tutorials;?></h1>
	  <br /> <br />
	  <p><strong><?php echo $l_GM_Video;?></strong></p>
	  <ul style="list-style-type: decimal; margin-left: 40px;">
	    <li><a href="http://www.simhl.net/video/STHSv2-Client/STHSv2-Client.html" target="_blank"><?php echo $l_GM_Video_1;?><br />
	      <br />
	    </a></li>
	    <li><a href="http://www.simhl.net/video/STHSv2-GM/STHSv2-GM.html" target="_blank"><?php echo $l_GM_Video_3;?></a>  <br />
	      <br />
	    </li>
	    <li><a href="http://www.simhl.net/video/STHSv2-Mobile/STHSv2-Mobile.html" target="_blank"><?php echo $l_GM_Video_4;?></a></li>
	    </ul>
        <br /> <br />
	  <p><strong><?php echo $l_ADMIN_Video;?></strong></p>
	  <ul style="list-style-type: decimal; margin-left: 40px;">
	     <li><a href="http://www.simhl.net/video/STHSv2-Install/STHSv2-Install.html" target="_blank"><?php echo $l_ADMIN_Video_1;?></a><br />
		    <br />
		  </li>
		  <li><a href="http://www.simhl.net/video/STHSv2-Upgrade/STHSv2-Upgrade.html" target="_blank"><?php echo $l_ADMIN_Video_2;?></a><br />
		    <br />
		  </li>
	  </ul>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
