<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	break; 

case 'fr': 
	break;
} 

$SID_GetSkaters = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
if (isset($_POST['season_id'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $SID_GetSkaters = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}
if (isset($_GET['team'])) {
  $ID_GetTeam = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
}



if($_SESSION['current_Team_ID'] == 0){
$query_GetInjuryList = "select Name, Number, Injury, CON, PosC,	PosLW, PosRW, PosD, 'False' as PosG from players where Injury <> '' AND Status0>1  UNION ALL SELECT Name, Number, Injury, CON, 'False' as PosC,	'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG from goalies where Injury <> '' AND Status1>1 ORDER BY CON asc";
} else {
$query_GetInjuryList = "select Name, Number, Injury, CON, PosC,	PosLW, PosRW, PosD, 'False' as PosG from players where Injury <> '' AND Status0>1 AND Team='".$_SESSION['current_Team_ID']."'  UNION ALL SELECT Name, Number, Injury, CON, 'False' as PosC,	'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG from goalies where Injury <> '' AND Status1>1 AND Team='".$_SESSION['current_Team_ID']."' ORDER BY CON asc";
}
$GetInjuryList = mysql_query($query_GetInjuryList, $connection) or die(mysql_error());
$row_GetInjuryList = mysql_fetch_assoc($GetInjuryList);
$totalRows_GetInjuryList = mysql_num_rows($GetInjuryList);

$RecoveryRate=1;
$query_GetInfo = sprintf("SELECT TinyLeagueImage, FarmLeague, RecoveryRate, DisplayOffers, LastModifiedSchedule, LeagueFile FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$RecoveryRate=$row_GetInfo['RecoveryRate'];



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_InjuredReserve;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">     


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
    	
    <h1><?php echo $l_InjuredReserve;?></h1><Br />
		<table cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
        <tr>
            <th style="text-align:left"><?php echo $l_nav_players;?></th>
            <th width="30"><?php echo $l_Condition;?></th>	
            <th><?php echo $l_Injury;?></th>
            <th width="50"><?php echo $l_Days;?></th>	
        </tr>
        </thead>
        <tbody>
  		<?php
		do {
			if($row_GetInjuryList['PosG']=='True'){
				$tmpTargetFile="goalie.php";
			} else {
				$tmpTargetFile="player.php";
			}
			echo "<tr>";
			echo "<td><a href='".$tmpTargetFile."?player=".$row_GetInjuryList['Number']."' >".$row_GetInjuryList['Name']."</a></td>";
			echo "<td align='center'>".$row_GetInjuryList['CON']."</td><td>".$row_GetInjuryList['Injury']."</td><td align='center'>".number_format(((100 - $row_GetInjuryList['CON']) / $RecoveryRate),0)." ".$l_Days."</td></tr>";
		} while ($row_GetInjuryList = mysql_fetch_assoc($GetInjuryList)); 
		?>
        </tbody></table>
        
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
