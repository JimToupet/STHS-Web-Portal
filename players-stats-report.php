<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_NoUpdate = "No outdataed players available";
	$l_LastUpload = "Last Upload";
	$l_Alert1 = "Are you sure you want to remove these stats?";
	$l_Alert2 = "Are you sure you want to make this team his current active team?";
	$l_Retire = "Retire";
	$l_prospects = "Prospects";
	break; 
	
case 'fr': 	
	$l_NoUpdate = "Pas de joueurs pass&eacute;s date disponibles";
	$l_LastUpload = "Derni&egrave;re Mise &agrave; Jour";
	$l_Alert1 = "&Ecirc;tes-vous sur de vouloir effacer ce stats?";
	$l_Alert2 = "Are you sure you want to make this team his current active team?";
	$l_Retire = "Retir&eacute;s";
	$l_prospects = "Rel&egrave;ve";
	break; 
} 

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}




$query_GetRoster = sprintf("SELECT P.Name, PosRW, PosLW, PosC, PosD, 'False' as PosG, P.Team FROM players as P WHERE (SELECT COUNT(STAT_ID) FROM playerstats WHERE Name=P.Name AND Season_ID=%s) > 1 UNION ALL  SELECT P.Name, 'False' as PosRW, 'False' as PosLW, 'False' as PosC, 'False' as PosD, 'True' as PosG, P.Team FROM goalies as P WHERE (SELECT COUNT(STAT_ID) FROM goaliestats WHERE Name=P.Name AND Season_ID=%s) > 1 ", $_SESSION['current_SeasonID'], $_SESSION['current_SeasonID']);
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_stats_cleaner;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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

<script>
function confirmDelete(delUrl) {
  if (confirm("<?php echo $l_Alert1;?>")) {
    document.location = delUrl;
  }
}
function confirmActive(delUrl) {
  if (confirm("<?php echo $l_Alert2;?>")) {
    document.location = delUrl;
  }
}
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
    <h1><?php echo $l_nav_stats_cleaner;?></h1>

	<table class="tablesorterRates">
    <thead>
    <tr>
        <th><?php echo $l_Name;?></th>
        <th colspan="7" style="text-align:left"><?php echo $l_nav_team;?></th>
        <th>Active Team</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php 
    if ($row_GetRoster > 0) {
        $tmpTargetFile="goalie.php";
		do { 
			
				if($row_GetRoster['PosG']=="True"){
						$tmpTargetFile="goalie.php";
						$query_GetCurrentStats = sprintf("SELECT goaliestats.*,((goaliestats.ProGA / goaliestats.ProMinPlay) * 60) as GAA, (goaliestats.ProSA / (goaliestats.ProGA + goaliestats.ProSA)) as PCT, proteam.Name as Team FROM goaliestats, proteam WHERE goaliestats.Team=proteam.Number AND goaliestats.Name='%s' AND goaliestats.Season_ID=%s ORDER BY goaliestats.STAT_ID ASC",addslashes($row_GetRoster['Name']), $_SESSION['current_SeasonID']);
						$GetCurrentStats = mysql_query($query_GetCurrentStats, $connection) or die(mysql_error());
						$row_GetCurrentStats = mysql_fetch_assoc($GetCurrentStats);
						$totalRows_GetCurrentStats = mysql_num_rows($GetCurrentStats);
			$i = 0;
			$tmpPostion = 5;
			do { 
			?>
				<tr>
					<td align="center"><?php if($i == 0){ ?><a href="<?php echo $tmpTargetFile ?>?team=<?php echo $_SESSION['current_Team_ID']; ?>&Player=<?php echo $row_GetRoster['Name']; ?>"><?php echo $row_GetRoster['Name']; ?></a><?php } ?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['Team']; ?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['ProGP'];?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['ProW'];?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['ProL'];?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['ProOTL'];?></td>
                    <td align="center"><?php echo number_format($row_GetCurrentStats['PCT'],3); ?>%</td>
                    <td align="center"><?php echo number_format($row_GetCurrentStats['GAA'],2); ?></td>
                    <td align="center"><?php echo $row_GetCurrentStats['Active']; ?></td>
                    <td align="center"> <?php if ($row_GetCurrentStats['Active'] == "False"){ ?><a href="javascript:confirmActive('player-stats-active.php?player=<?php echo str_replace("'","\'", $row_GetRoster['Name']); ?>&position=<?php echo $tmpPostion; ?>&STAT_ID=<?php echo $row_GetCurrentStats['STAT_ID'];?>');">Make Active Team</a> &nbsp;&nbsp;|&nbsp;&nbsp; <?php } ?><a href="javascript:confirmDelete('player-stats-delete.php?player=<?php echo str_replace("'","\'", $row_GetRoster['Name']); ?>&position=<?php echo $tmpPostion; ?>&STAT_ID=<?php echo $row_GetCurrentStats['STAT_ID'];?>');">Delete Stats</a></td>
				</tr>
            
            <?php
			$i = $i + 1;
			} while ($row_GetCurrentStats = mysql_fetch_assoc($GetCurrentStats)); 
		
					
					} else {
						$tmpTargetFile="player.php";
						$query_GetCurrentStats = sprintf("SELECT playerstats.*, proteam.Name as Team FROM playerstats, proteam WHERE playerstats.Team=proteam.Number AND playerstats.Name='%s' AND playerstats.Season_ID=%s ORDER BY playerstats.STAT_ID ASC",addslashes($row_GetRoster['Name']), $_SESSION['current_SeasonID']);
						$GetCurrentStats = mysql_query($query_GetCurrentStats, $connection) or die(mysql_error());
						$row_GetCurrentStats = mysql_fetch_assoc($GetCurrentStats);
						$totalRows_GetCurrentStats = mysql_num_rows($GetCurrentStats);
			$i = 0;
			$tmpPostion = 1;
			do { 				
			?>
				<tr class="statsRow" bgcolor="#<?php echo $tmpRowColor ?>">
					<td class="leftAlignedColumn"><?php if($i == 0){ ?><a href="<?php echo $tmpTargetFile ?>?team=<?php echo $_SESSION['current_Team_ID']; ?>&Player=<?php echo $row_GetRoster['Name']; ?>"><?php echo $row_GetRoster['Name']; ?></a><?php } ?></td>
                    <td align="left"><?php echo $row_GetCurrentStats['Team']; ?></td>
                    
                    <td align="right" ><?php echo $row_GetCurrentStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetCurrentStats['ProGP'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['ProG']; $tmpTotG=$tmpTotG+$row_GetCurrentStats['ProG'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['ProA']; $tmpTotA=$tmpTotA+$row_GetCurrentStats['ProA'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['ProPoint']; $tmpTotPoint=$tmpTotPoint+$row_GetCurrentStats['ProPoint'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['ProPlusMinus']; $tmpTotPlusMinus=$tmpTotPlusMinus+$row_GetCurrentStats['ProPlusMinus'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['ProPim']; $tmpTotPim=$tmpTotPim+$row_GetCurrentStats['ProPim'];?></td>
                    <td align="right" ><?php echo $row_GetCurrentStats['Active']; ?></td>
					<td align="right"> <?php if ($row_GetCurrentStats['Active'] == "False"){ ?><a href="javascript:confirmActive('player-stats-active.php?player=<?php echo str_replace("'","\'", $row_GetRoster['Name']); ?>&position=<?php echo $tmpPostion; ?>&STAT_ID=<?php echo $row_GetCurrentStats['STAT_ID'];?>');">Make Active Team</a> &nbsp;&nbsp;|&nbsp;&nbsp; <?php } ?><a href="javascript:confirmDelete('player-stats-delete.php?player=<?php echo str_replace("'","\'", $row_GetRoster['Name']); ?>&position=<?php echo $tmpPostion; ?>&STAT_ID=<?php echo $row_GetCurrentStats['STAT_ID'];?>');">Delete Stats</a></td>
				</tr>
            
            <?php
			$i = $i + 1;
			} while ($row_GetCurrentStats = mysql_fetch_assoc($GetCurrentStats)); 
			} 
				} while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); 
			} else {
				echo "<tr><td colspan=10>".$l_NoUpdate."</td></tr>";
			}
			?>
				</table>
			
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
