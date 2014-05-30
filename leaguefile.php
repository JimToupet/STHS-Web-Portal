<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Download = "DOWNLOAD";
	$l_lastupdated = "Last Updated";
	break; 
	
case 'fr': 
	$l_Download = "T&eacute;L&eacute;CHARGER";
	$l_lastupdated = "Derni&egrave;re mise &agrave; jour";
	break; 
} 


$query_GetInfo = sprintf("SELECT LastModifiedLeagueFile, LeagueFile FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_sths_client;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_sths_client;?></h1>
<?php
switch ($lang){ 
case 'en': 
?>
	  <p>The data supplied to this website is from <a href="http://sths.simont.info" target="_blank"><strong>SimonT Hockey Simulator Version 2</strong></a>. </p>
	  <p>As the general manager of your hockey club, you will be required to download and install the <a href="http://sths.simont.info/Download_En.php" target="_blank"><strong>STHS Client V2</strong></a>.</p>  <p>The STHS Client is use by General Manager to make change to   there team (Roster, Lineup, ...).</p>
	  <p><strong>Installation Steps:</strong></p>
	  <ol style="list-style-type: decimal; margin-left: 40px;">
	    <li>Download and install the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=0856EACB-4362-4B0D-8EDD-AAB15C5E04F5&displaylang=en" target="_blank"><strong>Microsoft .NET Framework Version 2.0 Redistributable Package (x86)</strong></a> </li>
        <li>Download and install the <a href="http://sths.simont.info/DownloadFiles.php?id=STHS-V2-Client-0-9-9.zip" target="_blank"><strong>STHS Client V2</strong></a> </li>
	  </ol>
	  <p>After you have successfully download and installed the above three files successfully, then you have to download the <strong><a href="File/<?php echo $row_GetInfo['LeagueFile']; ?>" target="_blank">League File</a></strong>. You need to download and open this file with the STHS Client to make changes to your team. </p>

<?php
	break; 
?>


<?php
case 'fr': 
?>
	<p>Les donn&eacute;es fournies sur ce site Internet proviennent du <a href="http://sths.simont.info" target="_blank"><strong>SimonT Hockey Simulator Version 2</strong></a>. </p>
	  <p>Agissant comme le directeur-g&eacute;rant de votre club de hockey, vous serez tenus de t&eacute;l&eacute;charger et d'installer le <a href="http://sths.simont.info/Download_Fra.php" target="_blank"><strong>STHS Client</strong></a>.</p><p>Le STHS Client est utilis&eacute; par le Directeur-G&eacute;rant pour apporter des changements &agrave; son &eacute;quipe (Alignement, Trios, etc).</p>
	  <p><strong>&eacute;tapes d'installation:</strong></p>
	  <ol style="list-style-type: decimal; margin-left: 40px;">
	    <li>T&eacute;l&eacute;chargez et installez le <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=0856EACB-4362-4B0D-8EDD-AAB15C5E04F5&displaylang=en" target="_blank"><strong>Microsoft .NET Framework Version 2.0 Redistributable Package (x86)</strong></a> </li>
        <li>T&eacute;l&eacute;chargez et installez le <a href="http://sths.simont.info/DownloadFiles.php?id=STHS-V2-Client-0-9-11.zip" target="_blank"><strong>STHS Client V2</strong></a> </li>
	    </ol>
	  <p>Apr&egrave;s que vous avez t&eacute;l&eacute;charg&eacute; et install&eacute; avec succ&egrave;s les trois fichiers mentionn&eacute;s ci-haut, vous devez alors t&eacute;l&eacute;charger le <strong><a href="File/<?php echo $row_GetInfo['LeagueFile']; ?>" target="_blank">Fichier de la Ligue</a></strong>. Vous devez t&eacute;l&eacute;charger et ouvrir ce fichier avec le STHS Client pour apporter des changements &agrave; votre &eacute;quipe.</p>
	  
<?php
	break; 
} 
?>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
