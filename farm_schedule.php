<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Change  = "CHANGE SEASON";
	$l_Day = "Day";
	$l_Game = "Game";
	$l_VisitorTeam = "Visitor Team";
	$l_Score = "Score";
	$l_HomeTeam = "Home Team";
	$l_Overtime = "Overtime";
	$l_ShootOut = "Shoot Out";
	$l_Link = "Game Details";
	break; 

case 'fr': 
	$l_Change  = "Changer de saison";
	$l_Day = "Jour";
	$l_Game = "Partie";
	$l_VisitorTeam = "Visiteur";
	$l_Score = "Score";
	$l_HomeTeam = "Domicile";
	$l_Overtime = "Prolongation";
	$l_ShootOut = "Fusillade";
	$l_Link = "D&eacute;tails de jeu";
	break; 
} 

$season_id = 0;
if (isset($_POST['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}
$TID_GetSchedule = "0";
if (isset($_SESSION['current_Team'])) {
  $TID_GetSchedule = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}
if ($season_id > 0){
	$SID_GetSchedule = $season_id;
} else {
	$SID_GetSchedule = "1";
	if (isset($_SESSION['current_SeasonID'])) {
	  $SID_GetSchedule = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
	}
}

if ($_SESSION['current_Team_ID']==0) {
	$query_GetSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s  ORDER BY farmschedule.Number", $SID_GetSchedule);
} else {
	$query_GetSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE (farmschedule.VisitorTeam='%s' OR farmschedule.HomeTeam='%s') AND farmschedule.Season_ID=%s ORDER BY farmschedule.Number", $TID_GetSchedule, $TID_GetSchedule, $SID_GetSchedule);
}
$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
$totalRows_GetSchedule = mysql_num_rows($GetSchedule);

$query_GetSeasons = sprintf("SELECT Folder FROM seasons WHERE S_ID=%s",$SID_GetSchedule);
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);

$query_GetSeasonsLink = sprintf("SELECT * FROM seasons");
$GetSeasonsLink = mysql_query($query_GetSeasonsLink, $connection) or die(mysql_error());
$row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink);

$TradeDeadlineDay=0;

$query_GetInfo = sprintf("SELECT TradeDeadlineDay FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$TradeDeadlineDay=$row_GetInfo['TradeDeadlineDay'];
mysql_free_result($GetInfo);

$DisplayTradeDeadline = false;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_schedules;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
  $("table").tablesorter(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">

#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_Farm_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;
}
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
   <div style="float:left; padding-bottom:2px"> <h1><?php echo $l_nav_schedules;?></h1></h1></div>

        <div style="float:right; padding-top:5px;">
        <form action="farm_schedule.php" method="post" name="form1">
        <select name="season_id" id="season_id">
        <?php do { 
            if ($row_GetSeasonsLink['SeasonType'] == 2){
            $SeasonType = $l_preseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            $SeasonType = $l_regularseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            $SeasonType = $l_playoffs;
            } 
            ?>
        <option value="<?php echo $row_GetSeasonsLink['S_ID']; ?>" <?php if ($SID_GetSchedule == $row_GetSeasonsLink['S_ID']){ echo "selected"; } ?>>
		<?php 
			if ($row_GetSeasonsLink['SeasonType'] == 2){
            echo $row_GetSeasonsLink['Season']." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            echo $row_GetSeasonsLink['Season']."-".($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            echo ($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } 
			
			?>
        </option>
        <?php } while ($row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink)); ?>
        </select> <input type="submit" value="<?php echo $l_Change;?>"  class="button" />
        </form></div>
        
        <br clear="all" />
		<br />

	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
    <tr>
        <th><?php echo $l_Day;?></th>
		<th><?php echo $l_Game;?></a></th>
		<th><?php echo $l_VisitorTeam;?></a></th>
		<th><?php echo $l_Score;?></a></th>
		<th><?php echo $l_HomeTeam;?></a></th>
		<th><?php echo $l_Score;?></a></th>
		<th><?php echo $l_Overtime;?></a></th>
		<th><?php echo $l_ShootOut;?></a></th>
		<th><?php echo $l_Link;?></a></th>
	</tr>
    </thead>
    <tbody>
	<?php 
	$tmpRowColor="000000";
	$tmpRowCount=0;
	if($totalRows_GetSchedule > 0){
		do { 
			if ($tmpRowCount==1){
				$tmpRowColor="E9ECF3";
				$tmpRowCount=0;
			} else {
				$tmpRowColor="FFFFFF";
				$tmpRowCount=1;
			}
			
			$query_GetHomeTeam = sprintf("SELECT farmteam.LogoTiny, farmteam.City, farmteam.Number, farmteam.Name, farmteam.Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetSchedule['HomeTeam']);
			$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
			$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);
			$query_GetVisitorTeam = sprintf("SELECT farmteam.LogoTiny, farmteam.City, farmteam.Number, farmteam.Name, farmteam.Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetSchedule['VisitorTeam']);
			$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
			$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);

			$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetSchedule['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $SID_GetSchedule);
			$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
			$row_GetLink = mysql_fetch_assoc($GetLink);
			$GameLink = $row_GetLink['Link'];
	
   	if ($TradeDeadlineDay == $row_GetSchedule['Day'] && $DisplayTradeDeadline == false){
		echo "<tr><td colspan=9 align=center bgcolor=#ffff00><strong>Trade Deadline</strong></td></tr>";
		$DisplayTradeDeadline = true;
	}
	?>
    <tr>
		<td align="center"><?php echo $row_GetSchedule['Day']; ?></td>
		<td align="center"><?php echo $row_GetSchedule['Number']; ?></td>
		<td align="center"><?php if($_SESSION['current_Team_ID'] == $row_GetSchedule['VisitorTeam']){echo $row_GetVisitorTeam['City']." ".$row_GetVisitorTeam['Name']; } else { echo "<a href='farm_roster.php?team=".$row_GetSchedule['VisitorTeam']."'>".$row_GetVisitorTeam['City']." ".$row_GetVisitorTeam['Name']."</a>"; } ?></td>
		<td align="center"><?php echo $row_GetSchedule['VisitorScore']; ?></td>
		<td align="center"><?php if($_SESSION['current_Team_ID'] == $row_GetSchedule['HomeTeam']){echo $row_GetHomeTeam['City']." ".$row_GetHomeTeam['Name']; } else { echo "<a href='farm_roster.php?team=".$row_GetSchedule['HomeTeam']."'>".$row_GetHomeTeam['City']." ".$row_GetHomeTeam['Name']."</a>"; } ?></td>
		<td align="center"><?php echo $row_GetSchedule['HomeScore']; ?></td>
		<td align="center"><?php if ($row_GetSchedule['Overtime'] != "False"){ echo $row_GetSchedule['Overtime']; } else { echo "-"; } ?></td>
		<td align="center"><?php if ($row_GetSchedule['ShootOut'] != "False"){ echo $row_GetSchedule['ShootOut']; } else { echo "-"; } ?></td>
		<td align="center"><?php if ($row_GetSchedule['Play'] == "True" || $row_GetSchedule['Play'] == "Vrai") { ?><a href="<?php echo $_SESSION['DomainName']; ?>/File/<?php echo $row_GetSeasons['Folder']; ?>/<?php echo $GameLink ?>" target="_blank"><?php echo $l_nav_scores;?></a><?php }?></td>
	</tr>
   <?php 
   	mysql_free_result($GetLink);
	} while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)); 
	}
	?>
   </tbody> 
   </table>
   
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
