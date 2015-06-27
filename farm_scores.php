<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PreviousDay   = "Previous Day Games";
	$l_GameDay = "Games for day";
	$l_NextGame = "Next Day Games";
	$l_First = "First";
	$l_Previous = "Previous";
	$l_Next = "Next";
	$l_Last = "Last";
	$l_ScoreGoalie = "Goal Scorers / Goalies";
	$l_Teams = "Teams";
	$l_NoGames = "No games available";
	break; 
	
case 'fr': 	
	$l_PreviousDay   = "Parties jour pr&eacute;c&eacute;dent";
	$l_GameDay = "Jour";
	$l_NextGame = "Parties jour suivant";
	$l_First = "Premiere";
	$l_Previous = "Pr&eacute;c&eacute;dent";
	$l_Next = "Prochaine";
	$l_Last = "Derni&egrave;re";
	$l_ScoreGoalie = "Marqueurs de but / Gardiens";
	$l_Teams = "&eacute;quipes";
	$l_NoGames = $l_None;
	break; 
} 



$SID_GetSchedule= "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetSchedule= (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
$Day_ID = "0";
if (isset($_GET['pageNum_GetScheduleDay'])) {
  $Day_ID = (get_magic_quotes_gpc()) ? $_GET['pageNum_GetScheduleDay'] : addslashes($_GET['pageNum_GetScheduleDay']);
}


$query_GetLastDay = sprintf("select farmschedule.Day FROM farmschedule WHERE (farmschedule.Play='TRUE' OR farmschedule.Play='Vrai') AND farmschedule.Season_ID=%s GROUP BY farmschedule.Day Desc Limit 0,1", $SID_GetSchedule);
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);

if ($Day_ID == 0){
	$Day_ID = $row_GetLastDay['Day'];
}

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_GetScheduleDay = 1;
$pageNum_GetScheduleDay = $Day_ID;
if (isset($_GET['pageNum_GetScheduleDay'])) {
  $pageNum_GetScheduleDay = $_GET['pageNum_GetScheduleDay'];
}
$startRow_GetScheduleDay = $pageNum_GetScheduleDay * $maxRows_GetScheduleDay;

$query_GetScheduleDay = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s GROUP BY farmschedule.Day ORDER BY farmschedule.Day", $SID_GetSchedule);
$query_limit_GetScheduleDay = sprintf("%s LIMIT %d, %d", $query_GetScheduleDay, $startRow_GetScheduleDay, $maxRows_GetScheduleDay);
$GetScheduleDay = mysql_query($query_limit_GetScheduleDay, $connection) or die(mysql_error());
$row_GetScheduleDay = mysql_fetch_assoc($GetScheduleDay);

// Bug fix : max day in calendar
if (isset($_GET['totalRows_GetScheduleDay'])) {
  $totalRows_GetScheduleDay = $_GET['totalRows_GetScheduleDay'];
} else {
	$resQuery = mysql_query("SELECT MAX(day) days FROM farmschedule WHERE Season_ID =".$SID_GetSchedule, $connection) or die(mysql_error());
	$totalRows_GetScheduleDay = mysql_result($resQuery, 0, 0);
}

$totalPages_GetScheduleDay = ceil($totalRows_GetScheduleDay/$maxRows_GetScheduleDay);
$queryString_GetScheduleDay = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_GetScheduleDay") == false && 
        stristr($param, "totalRows_GetScheduleDay") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_GetScheduleDay = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_GetScheduleDay = sprintf("&totalRows_GetScheduleDay=%d%s", $totalRows_GetScheduleDay, $queryString_GetScheduleDay);
if($Day_ID > 0){
	$query_GetSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s AND farmschedule.Day=%s ORDER BY farmschedule.Number", $SID_GetSchedule,$Day_ID);
} else {
	$query_GetSchedule = sprintf("SELECT farmschedule.* FROM farmschedule  WHERE farmschedule.Season_ID=%s ORDER BY farmschedule.Number", $SID_GetSchedule);
}
$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
$row_GetSchedule= mysql_fetch_assoc($GetSchedule);
$totalRows_GetSchedule = mysql_num_rows($GetSchedule);

$query_GetSeasons = sprintf("SELECT Folder FROM seasons WHERE Active=1");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$tmpDay = $Day_ID;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_scores." - ".$l_GameDay." ".$tmpDay;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
  
<h1><?php 
echo $l_nav_scores;
if ($totalRows_GetScheduleDay > 0){
	echo " - ".$l_GameDay." ".$tmpDay." / ".$totalRows_GetScheduleDay; 
} ?></h1>
<br />
<table cellspacing="0" border="0" width="100%" class="tablesorterRates">
<thead>
<tr>
    <th width="23%" align="center"><?php if ($pageNum_GetScheduleDay > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_GetScheduleDay=1", $currentPage, 0, $queryString_GetScheduleDay); ?>" style="font-weight:bold;"><?php echo $l_First;?></a>
        <?php } else { echo $l_First ;} // Show if not first page ?> </th>
    <th width="31%" align="center"><?php if ($pageNum_GetScheduleDay > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_GetScheduleDay=%d%s", $currentPage, max(0, $pageNum_GetScheduleDay - 1), $queryString_GetScheduleDay); ?>" style="font-weight:bold;"><?php echo $l_Previous;?></a>
        <?php } else { echo $l_Previous ;}// Show if not first page ?></th>
    <th width="23%" align="center"><?php if ($pageNum_GetScheduleDay < $totalPages_GetScheduleDay) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_GetScheduleDay=%d%s", $currentPage, min($totalPages_GetScheduleDay, $pageNum_GetScheduleDay + 1), $queryString_GetScheduleDay); ?>" style="font-weight:bold;"><?php echo $l_Next;?></a>
        <?php } else { echo $l_Next ;} // Show if not last page ?></th>
    <th width="23%" align="center"><?php if ($pageNum_GetScheduleDay < $totalPages_GetScheduleDay) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_GetScheduleDay=%d%s", $currentPage, $totalPages_GetScheduleDay, $queryString_GetScheduleDay); ?>" style="font-weight:bold;"><?php echo $l_Last;?></a>
        <?php } else { echo $l_Last ;} // Show if not last page ?></th>
  </tr>
 </thead>
</table>

<?php 
if ($totalRows_GetSchedule > 0) {
$CellCount = 0;

do { 
$query_GetHomeTeam = sprintf("SELECT farmteam.LogoTiny, farmteam.City, farmteam.Number, farmteam.Name, farmteam.Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetSchedule['HomeTeam']);
$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);
$query_GetVisitorTeam = sprintf("SELECT farmteam.LogoTiny, farmteam.City, farmteam.Number, farmteam.Name, farmteam.Abbre FROM farmteam WHERE farmteam.Number=%s",$row_GetSchedule['VisitorTeam']);
$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);

$query_GetLink = sprintf("SELECT * FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetSchedule['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $SID_GetSchedule);
$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
$row_GetLink = mysql_fetch_assoc($GetLink);
$totalRows_GetLink = mysql_num_rows($GetLink);
if($totalRows_GetLink > 0){
	$GameLink = $row_GetLink['Link'];
} else {
	$query_GetLink = sprintf("SELECT * FROM todaysgame WHERE Season_ID=%s AND Type='Farm'ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
	$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
	$row_GetLink = mysql_fetch_assoc($GetLink);
	$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
	$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
	$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetSchedule['Number'].".html";
}

if ($row_GetSchedule['Overtime'] == "True"){
	$tmpGameType = "OT";
} else if ($row_GetSchedule['ShootOut'] == "True"){
	$tmpGameType = "SO";
} else {
	$tmpGameType = "F";
}
?>
<div style="display:inline-block; width:465px; margin:5px; vertical-align:top">
<table cellspacing="0" border="0" width="100%" class="tablesorterRates" height="125">
<thead>
<tr>
	<th><?php echo $row_GetSchedule['Number'];?></th>
    <th style="text-align:left"><?php echo $l_Teams;?></th>
	<th><?php echo $l_ScoreGoalie;?></th>
	<th><?php echo $tmpGameType;?></th>
</tr>
</thead>
<tbody>
<tr>
	<td width="25" style="vertical-align:middle;"><a href="farm_roster.php?team=<?php echo $row_GetHomeTeam['Number']; ?>"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetHomeTeam['LogoTiny']; ?>" /></a></td>
	<td width="100" style="vertical-align:middle;"><a href="farm_roster.php?team=<?php echo $row_GetHomeTeam['Number']; ?>"><?php echo $row_GetHomeTeam['Name']; ?></a></td>
	<td width="315" style="vertical-align:top;"><?php echo $row_GetLink['HomeTeamGoal']."<br style='margin-bottom:5px;' />".$row_GetLink['HomeTeamGoaler']; ?></td>
	<td width="25" align="center" style="font-size:24px; vertical-align:middle"><strong><?php echo $row_GetSchedule['HomeScore']; ?></strong></td>
</tr>
<tr>
    <td style="vertical-align:middle;"><a href="roster.php?team=<?php echo $row_GetVisitorTeam['Number']; ?>"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetVisitorTeam['LogoTiny']; ?>" /></a></td>
    <td style="vertical-align:middle;"><a href="roster.php?team=<?php echo $row_GetVisitorTeam['Number']; ?>"><?php echo $row_GetVisitorTeam['Name']; ?></a></td>
	<td style="vertical-align:top;"><?php echo $row_GetLink['VisitorTeamGoal']."<br style='margin-bottom:5px;' />".$row_GetLink['VisitorTeamGoaler']; ?></td>
    <td align="center" style="font-size:24px; vertical-align:middle"><strong><?php echo $row_GetSchedule['VisitorScore']; ?></strong></td>
</tr>
</tbody>
</table>
<?php if ($row_GetLink['Link'] != ""){ ?>
<div align="right" style="margin-bottom:15px;">
<a href="File/<?php echo $row_GetSeasons['Folder']."/".$GameLink; ?>" target="_blank" style="margin: 0px 4px 0 0;font-size:12px; font-weight:bold;"><span><?php echo $l_Boxscore;?>  &rsaquo;</span></a>
</div>
<?php } ?>
</div>
<?php 
mysql_free_result($GetHomeTeam);
mysql_free_result($GetVisitorTeam);
} while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)); 
} else {
	echo "No games available.";
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
