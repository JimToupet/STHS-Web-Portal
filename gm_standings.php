<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_GMS = "GENERAL MANAGERS";
	$l_Email = "E-mail Address";
	$l_Summary = "Summary";
	$l_ProTotals = "PRO TOTALS";
	$l_RegularSeason = "Regular Season";
	$l_PlayerRatings = "Player Ratings";
	$l_CareerPlayoff = "CAREER PLAYOFF SEASON STATISTICS";
	$l_CareerRegular = "CAREER REGULAR SEASON STATISTICS";
	break; 
	
case 'fr': 	
	$l_GMS = "DIRECTEURS G&eacute;RANTS";
	$l_Email = "Courriel";
	$l_Summary = "Sommaire";
	$l_ProTotals = "TOTAL PRO";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_PlayerRatings = "Cotes du joueur";
	$l_CareerPlayoff = "Statistiques cariere pour s&eacute;rie &eacute;liminatoire";
	$l_CareerRegular = "Statistiques cariere pour saison r&eacute;guliere";
	break; 
} 

$ID_GetTeam = "";
if (isset($_GET['team'])) {
	$ID_GetTeam = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
	if($ID_GetTeam > 0){
	  $ID_GetTeam  = " AND G.Team=".$ID_GetTeam;
	}
}

$query_GetStats= sprintf("SELECT G.Name, SUM(G.ProGP) as ProGP, SUM(G.ProW) as ProW, SUM(G.ProL) as ProL, SUM(G.ProT) as ProT, SUM(G.ProOTW) as ProOTW, SUM(G.ProOTL) as ProOTL, SUM(G.ProSOW) as ProSOW, SUM(G.ProSOL) as ProSOL, SUM(G.ProGF) as ProGF, SUM(G.ProGA) as ProGA, SUM(G.ProPim) as ProPim, SUM(G.ProHits) as ProHits FROM gmstats as G, seasons as S WHERE S.S_ID = G.Season_ID AND S.SeasonType=1 %s GROUP BY G.Name ORDER BY ProW DESC", $ID_GetTeam);
$GetStats= mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats= mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetPlayoffStats= sprintf("SELECT G.Name, SUM(G.ProGP) as ProGP, SUM(G.ProW) as ProW, SUM(G.ProL) as ProL, SUM(G.ProT) as ProT, SUM(G.ProOTW) as ProOTW, SUM(G.ProOTL) as ProOTL, SUM(G.ProSOW) as ProSOW, SUM(G.ProSOL) as ProSOL, SUM(G.ProGF) as ProGF, SUM(G.ProGA) as ProGA, SUM(G.ProPim) as ProPim, SUM(G.ProHits) as ProHits FROM gmstats as G, seasons as S WHERE S.S_ID = G.Season_ID AND S.SeasonType=0 %s GROUP BY G.Name ORDER BY ProW DESC", $ID_GetTeam);
$GetPlayoffStats= mysql_query($query_GetPlayoffStats, $connection) or die(mysql_error());
$row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats);
$totalRows_GetPlayoffStats = mysql_num_rows($GetPlayoffStats);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_gm_standings;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">    


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
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
  $("#tabs").ttabs(); 
  $("table").tablesorter();  
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
<h1><?php echo $l_nav_gm_standings;?></h1>
<br>
<div id="tabs">
    <div id="tabs-1"><?php echo "<h3>".$l_CareerRegular."</h3>";?>
    <?php
        $tmpTotGP=0;
        $tmpW=0;
        $tmpL=0;
        $tmpT=0;
        $tmpOTW=0;
        $tmpOTL=0;
        $tmpSOW=0;
        $tmpSOL=0;
        $tmpGF=0;
        $tmpGA=0;
        $tmpPim=0;
        $tmpHits=0;
    ?>
    <?php  if ($row_GetStats['ProGP'] > 0){ ?>
    <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
    <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
    <tr>
        <th><?php echo $l_nav_gm ;?></th>
        <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
        <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
        <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
        <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
        <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
        <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
        <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
        <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
        <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
        <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
        <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
        <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
    </tr>
    </thead>
    <tbody>
    <?php do { ?>
    <tr>
        <td align="center"><a href="bio.php?gm=<?php echo $row_GetStats['Name'];?>"><?php echo $row_GetStats['Name'];?></a></td>
        <td align="center"><?php echo $row_GetStats['ProGP'];?></td>
        <td align="center"><?php echo $row_GetStats['ProW'];?></td>
        <td align="center"><?php echo $row_GetStats['ProL'];?></td>
        <td align="center"><?php echo $row_GetStats['ProT'];?></td>
        <td align="center"><?php echo $row_GetStats['ProOTW'];?></td>
        <td align="center"><?php echo $row_GetStats['ProOTL'];?></td>
        <td align="center"><?php echo $row_GetStats['ProSOW'];?></td>
        <td align="center"><?php echo $row_GetStats['ProSOL'];?></td>
        <td align="center"><?php echo $row_GetStats['ProGF'];?></td>
        <td align="center"><?php echo $row_GetStats['ProGA'];?></td>
        <td align="center"><?php echo $row_GetStats['ProPim'];?></td>
        <td align="center"><?php echo $row_GetStats['ProHits'];?></td>
    </tr>
    <?php } while ($row_GetStats= mysql_fetch_assoc($GetStats)); ?>	
    </tbody>
    </table>
     <?php } ?>
    </div>
    
    <div id="tabs-2"><?php echo "<h3>".$l_CareerPlayoff."</h3>";?>
    <?php
        $tmpTotGP=0;
        $tmpW=0;
        $tmpL=0;
        $tmpT=0;
        $tmpOTW=0;
        $tmpOTL=0;
        $tmpSOW=0;
        $tmpSOL=0;
        $tmpGF=0;
        $tmpGA=0;
        $tmpPim=0;
        $tmpHits=0;
    ?>
    <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
    <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
    <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
    <tr>
        <th><?php echo $l_nav_gm ;?></th>
        <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
        <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
        <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
        <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
        <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
        <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
        <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
        <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
        <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
        <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
        <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
        <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
    </tr>
    </thead>
    <tbody>
    <?php do { ?>
    <tr>
        <td align="center"><a href="bio.php?gm=<?php echo $row_GetPlayoffStats['Name'];?>"><?php echo $row_GetPlayoffStats['Name'];?></a></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProGP'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProW'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProL'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProT'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProOTW'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProOTL'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProSOW'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProSOL'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProGF'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProGA'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProPim'];?></td>
        <td align="center"><?php echo $row_GetPlayoffStats['ProHits'];?></td>
    </tr>
    <?php } while ($row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats)); ?>	
    </tbody>
    </table>
     <?php } ?>
    </div>

</div>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
