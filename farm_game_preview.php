<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_HomeRecord = "Home Record";
	$l_VisitorRecord = "Away Record";
	$l_L10 = "Last 10";
	$l_Last10 = "Last 10 Games";
	$l_Record = "Overall Record";
	break; 

case 'fr': 
	$l_HomeRecord = "Home Record";
	$l_VisitorRecord = "Away Record";
	$l_L10 = "Last 10";
	$l_Last10 = "Last 10 Games";
	$l_Record = "Overall Record";
	break;
} 


$SID_GetTop5 = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
$Game_ID = 0;
if (isset($_GET['id'])) {
  $Game_ID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}


$query_GetGame = sprintf("SELECT * FROM farmschedule WHERE S_ID=%s", $Game_ID);
$GetGame = mysql_query($query_GetGame, $connection) or die(mysql_error());
$row_GetGame = mysql_fetch_assoc($GetGame);
$totalRows_GetGame = mysql_num_rows($GetGame);

$query_GetHT = sprintf("SELECT * FROM farmteam as p, farmteamstandings as s WHERE p.Number=s.Number AND p.Number=%s AND s.Season_ID=%s", $row_GetGame['HomeTeam'], $_SESSION['current_SeasonID']);
$GetHT = mysql_query($query_GetHT, $connection) or die(mysql_error());
$row_GetHT = mysql_fetch_assoc($GetHT);
$HomeTeam=$row_GetHT['Name'];

$query_GetHTRoster = sprintf("SELECT p.*, SUM(s.FarmGP) as FarmGP, SUM(s.FarmG) as FarmG, SUM(s.FarmA) AS FarmA, SUM(s.FarmPoint) as FarmPoint, SUM(s.FarmPim) as FarmPim, SUM(s.FarmPlusMinus) as FarmPlusMinus FROM players as p, playerstats as s WHERE p.Name=s.Name AND p.Team=%s AND s.Season_ID=%s AND p.Status1 < 2 GROUP BY s.Name ORDER BY FarmPoint DESC, FarmG DESC, FarmGP asc", $row_GetGame['HomeTeam'], $SID_GetTop5);
$GetHTRoster = mysql_query($query_GetHTRoster, $connection) or die(mysql_error());
$row_GetHTRoster = mysql_fetch_assoc($GetHTRoster);

$query_GetHTGoalies = sprintf("SELECT g.*, SUM(s.FarmGP) as FarmGP, SUM(s.FarmW) as FarmW, SUM(s.FarmL) AS FarmL, SUM(s.FarmMinPlay) as FarmMinPlay, SUM(s.FarmGA) as FarmGA, SUM(s.FarmSA) as FarmSA, SUM(s.FarmShutouts) as FarmShutouts, SUM(FarmOTL) as FarmOTL FROM goalies as g, goaliestats as s WHERE g.Name=s.Name AND g.Team=%s AND s.Season_ID=%s AND g.Status1 < 2 GROUP BY s.Name ORDER BY FarmW DESC, FarmMinPlay DESC, FarmGP asc", $row_GetGame['HomeTeam'], $SID_GetTop5);
$GetHTGoalies = mysql_query($query_GetHTGoalies, $connection) or die(mysql_error());
$row_GetHTGoalies = mysql_fetch_assoc($GetHTGoalies);

$query_GetVT = sprintf("SELECT * FROM farmteam as p, farmteamstandings as s WHERE p.Number=s.Number AND p.Number=%s AND s.Season_ID=%s", $row_GetGame['VisitorTeam'], $_SESSION['current_SeasonID']);
$GetVT = mysql_query($query_GetVT, $connection) or die(mysql_error());
$row_GetVT = mysql_fetch_assoc($GetVT);
$VisitorTeam=$row_GetVT['Name'];

$query_GetVTRoster = sprintf("SELECT p.*, SUM(s.FarmGP) as FarmGP, SUM(s.FarmG) as FarmG, SUM(s.FarmA) AS FarmA, SUM(s.FarmPoint) as FarmPoint, SUM(s.FarmPim) as FarmPim, SUM(s.FarmPlusMinus) as FarmPlusMinus FROM players as p, playerstats as s WHERE p.Name=s.Name AND p.Team=%s AND s.Season_ID=%s AND p.Status1 < 2 GROUP BY s.Name ORDER BY FarmPoint DESC, FarmG DESC, FarmGP asc", $row_GetGame['VisitorTeam'], $SID_GetTop5);
$GetVTRoster = mysql_query($query_GetVTRoster, $connection) or die(mysql_error());
$row_GetVTRoster = mysql_fetch_assoc($GetVTRoster);

$query_GetVTGoalies = sprintf("SELECT g.*, SUM(s.FarmGP) as FarmGP, SUM(s.FarmW) as FarmW, SUM(s.FarmL) AS FarmL, SUM(s.FarmMinPlay) as FarmMinPlay, SUM(s.FarmGA) as FarmGA, SUM(s.FarmSA) as FarmSA, SUM(s.FarmShutouts) as FarmShutouts, SUM(FarmOTL) as FarmOTL FROM goalies as g, goaliestats as s WHERE g.Name=s.Name AND g.Team=%s AND s.Season_ID=%s AND g.Status1 < 2 GROUP BY s.Name ORDER BY FarmW DESC, FarmMinPlay DESC, FarmGP asc", $row_GetGame['VisitorTeam'], $SID_GetTop5);
$GetVTGoalies = mysql_query($query_GetVTGoalies, $connection) or die(mysql_error());
$row_GetVTGoalies = mysql_fetch_assoc($GetVTGoalies);

$query_GetRecord = sprintf("SELECT * FROM farmschedule as p, seasons as s WHERE Season = '%s' AND p.Season_ID=s.S_ID AND p.VisitorTeam=%s AND p.HomeTeam=%s AND s.SeasonType < 2 UNION ALL SELECT * FROM farmschedule as p, seasons as s WHERE Season = '%s' AND p.Season_ID=s.S_ID AND p.HomeTeam=%s AND p.VisitorTeam=%s AND s.SeasonType < 2 ORDER BY Season desc, SeasonType DESC, Day asc", $_SESSION['current_Season'], $row_GetGame['VisitorTeam'], $row_GetGame['HomeTeam'], $_SESSION['current_Season'], $row_GetGame['VisitorTeam'], $row_GetGame['HomeTeam']);
$GetRecord = mysql_query($query_GetRecord, $connection) or die(mysql_error());
$row_GetRecord = mysql_fetch_assoc($GetRecord);
$totalRows_GetRecord = mysql_num_rows($GetRecord);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Game <?php echo $row_GetGame['Number']." Preview: ".$row_GetVT['Name']." at ".$row_GetHT['Name'];?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jQuery.bubbletip-1.0.6.js"></script>

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
  $("#TeamPhoto1").reflect({height:55,opacity:0.3});
  $("#TeamPhoto2").reflect({height:55,opacity:0.3});
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
fieldset{
border:1px solid #333;
border-bottom:1px solid #666;
border-right:1px solid #666;
padding:10px;
}

.fieldsetright {display:display:block; float:left; width:450px; margin:0px 12px 0px 12px;}
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
    	<h1>Game <?php echo $row_GetGame['Number']." Preview: ".$row_GetVT['Name']." at ".$row_GetHT['Name'];?></h1>
        <br clear="all" />


<div style="margin:20px 0px 20px 0px; width:100%;">
<?php
if($totalRows_GetRecord > 0){
$ShowSeason=0;
$iCount=0;
$tmpTS1 = 0;
$tmpTS2 = 0;
do{
	if($row_GetRecord['VisitorScore'] > $row_GetRecord['HomeScore']){$tmpTS1 = $tmpTS1 + 1;}
	if($row_GetRecord['HomeScore'] > $row_GetRecord['VisitorScore']){$tmpTS2 = $tmpTS2 + 1;}
	if($ShowSeason != $row_GetRecord['Folder']){
		if($iCount != 0){
			echo "</tbody></table>";
		}
		$iCount=$iCount+1;
		echo '<strong style="text-transform:uppercase;">'.$row_GetRecord["Season"].'-'.substr($row_GetRecord["Season"]+1, -2).' ';
		if($row_GetRecord['SeasonType']==0){
			echo "Playoffs";
		}elseif($row_GetRecord['SeasonType']==1){
			echo "Regular Season";
		} else {
			echo "Pre-Season";
		}
		echo '</strong><table cellspacing="0" border="0" width="100%" class="tablesorterRates">';
		echo '<thead>';
		echo '<tr><th>'.$l_Day.'</th><th>'.$l_Game.'</th><th colspan=2>'.$l_Visitor.'</th><th>S</th><th colspan=2>'.$l_Home.'</th><th>S</th><th>OT</th><th>'.$l_Boxscore.'</th></tr></thead><tbody>';
		$ShowSeason=$row_GetRecord['Folder'];
	}
	$tmpGameCount = $tmpGameCount + 1;
	$query_GetHT2 = sprintf("SELECT LogoTiny, City, Name FROM farmteam WHERE Number=%s", $row_GetRecord['HomeTeam']);
	$GetHT2 = mysql_query($query_GetHT2, $connection) or die(mysql_error());
	$row_GetHT2 = mysql_fetch_assoc($GetHT2);
	$HomeTeam=$row_GetHT2['Name'];
	
	$query_GetVT2 = sprintf("SELECT LogoTiny, City, Name FROM farmteam WHERE Number=%s", $row_GetRecord['VisitorTeam']);
	$GetVT2 = mysql_query($query_GetVT2, $connection) or die(mysql_error());
	$row_GetVT2 = mysql_fetch_assoc($GetVT2);
	$VisitorTeam=$row_GetVT2['Name'];

	$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Farm',CAST(".$row_GetRecord['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $row_GetRecord['S_ID']);
	$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
	$row_GetLink = mysql_fetch_assoc($GetLink);
	$GameLink = $row_GetLink['Link'];
		echo "<tr><td style='width:75px; vertical-align:middle; text-align:center'>".$row_GetRecord['Day']."</td><td style='width:75px; vertical-align:middle; text-align:center'>".$row_GetRecord['Number']."</td>";
		if($row_GetRecord['Play'] == "True" || $row_GetRecord['Play'] == "Vrai"){
			echo "</td><td style='width:15px; vertical-align:middle;'><img border=0 src='".$_SESSION['DomainName']."/image/logos/small/".$row_GetVT2['LogoTiny']."' width=15></img></td><td style='vertical-align:middle;'>".$VisitorTeam."</td><td style='width:20px; vertical-align:middle; text-align:center;'>".$row_GetRecord['VisitorScore']."</td><td style='width:15px; vertical-align:middle;'><img border=0 src='".$_SESSION['DomainName']."/image/logos/small/".$row_GetHT2['LogoTiny']."' width=15></img></td><td style='vertical-align:middle;'>".$HomeTeam."</td><td style='width:20px; vertical-align:middle; text-align:center;'>".$row_GetRecord['HomeScore']."</td>";
		} else {
			echo "</td><td style='width:15px; vertical-align:middle;'><img border=0 src='".$_SESSION['DomainName']."/image/logos/small/".$row_GetVT2['LogoTiny']."' width=15></img></td><td style='vertical-align:middle;'>".$VisitorTeam."</td><td style='width:20px; vertical-align:middle; text-align:center;'>-</td><td style='width:15px; vertical-align:middle;'><img border=0 src='".$_SESSION['DomainName']."/image/logos/small/".$row_GetHT2['LogoTiny']."' width=15></img></td><td style='vertical-align:middle;'>".$HomeTeam."</td><td style='width:20px; vertical-align:middle; text-align:center;'>-</td>";
		}
		if($row_GetRecord['Overtime'] == "True" || $row_GetRecord['Overtime'] == "Vrai"){
			echo "<td style='width:35px; vertical-align:middle; text-align:center'>".$row_GetRecord['Overtime']."</td>";
		} else {
			echo "<td style='width:35px; vertical-align:middle; text-align:center'>-</td>";
		}
		if($GameLink != ""){
			echo "<td style='width:50px; vertical-align:middle; text-align:center'><a href='".$_SESSION['DomainName']."/File/".$row_GetRecord['Folder']."/".$GameLink."'>Boxscore</a></td>";
		} elseif ($GameLink == "" && ($row_GetRecord['Play'] == "True" || $row_GetRecord['Play'] == "Vrai") ){
			$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Farm'ORDER BY Link DESC limit 0,1", $row_GetRecord['S_ID']);
			$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
			$row_GetLink = mysql_fetch_assoc($GetLink);
			$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
			$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
			$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetRecord['Number'].".html";
			echo "<td style='width:50px; vertical-align:middle; text-align:center'><a href='".$_SESSION['DomainName']."/File/".$row_GetRecord['Folder']."/".$GameLink."'>Boxscore</a></td>";
		} else {
			echo "<td style='width:50px; vertical-align:middle; text-align:center'>-</td>";	
		}
		echo "</tr>";
} while ($row_GetRecord = mysql_fetch_assoc($GetRecord));
echo '</tbody></table>';
}
?>
</div>

        <div class="fieldsetright">
        <table style="height:220px; width:100%">
        <tr><td></td><td align="center">
        <?php if($row_GetVT['JerseyAway'] != ""){
        	echo "<img src='".$_SESSION['DomainName']."/image/jersys/visitor/".$row_GetVT['JerseyAway']."' vspace='6' border=0>";
		} else {
        	echo "<img src='".$_SESSION['DomainName']."/image/logos/huge/".$row_GetVT['LogoLarge']."' vspace='6' id='TeamPhoto2' border=0>";
		}
		echo "</td><td></td></tr></table>";
        $awayW = ($row_GetVT['W'] + $row_GetVT['OTW'] + $row_GetVT['SOW'])-($row_GetVT['HomeW'] + $row_GetVT['HomeOTW'] + $row_GetVT['HomeSOW']);
		$awayOT = ($row_GetVT['OTL']+$row_GetVT['SOL'])-($row_GetVT['HomeOTL']+$row_GetVT['HomeSOL']);
		echo "<div style='text-align:center; font-size:12px; text-transform:uppercase;'>WINS VERSUS ".$row_GetHT['Name']." : <strong>".$tmpTS2."</strong>";
		echo "<br /><br />".$l_Last10." : <strong>".($row_GetVT['Last10W'] + $row_GetVT['Last10OTW'] + $row_GetVT['Last10SOW'])."-".$row_GetVT['Last10L']."-".($row_GetVT['Last10OTL']+$row_GetVT['Last10SOL'])." (".$row_GetVT['Streak'].")</strong>";
		echo "<br /><br />".$l_VisitorRecord." : <strong>".$awayW."-".($row_GetVT['L']-$row_GetVT['HomeL'])."-".$awayOT."</strong>";
		echo "<br /><br />".$l_Record." : <strong>".($row_GetVT['W'] + $row_GetVT['OTW'] + $row_GetVT['SOW'])."-".$row_GetVT['L']."-".($row_GetVT['OTL']+$row_GetVT['SOL'])."</strong>";
		echo "</div>";
		?>
        <br clear="all" />
       
        <strong style="text-transform:uppercase;"><?php echo $l_Skaters;?></strong>
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
            <th><a title="<?php echo $l_Condition;?>">CON</a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
            <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
        </tr>
        </thead>
        <tbody>
		<?php
		do{
		if($row_GetVTRoster['Injury'] == "" || $row_GetVTRoster['Injury'] == NULL){
		echo "<tr>";
		echo "<td><a href='player.php?player=".$row_GetVTRoster['Name']."'>".$row_GetVTRoster['Name']."</a></td>";
		echo "<td align=center>".$row_GetVTRoster['CON']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmGP']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmG']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmA']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPoint']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPlusMinus']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPim']."</td>";
		echo "</tr>";
		}
		} while ($row_GetVTRoster = mysql_fetch_assoc($GetVTRoster));
		?>
        </tbody>
        <tfoot style="border-color:#FF0000;">
        <?php
		$ShowInjuried=0;
		mysql_data_seek($GetVTRoster,0);
		do{
		if($row_GetVTRoster['Injury'] != "" || $row_GetVTRoster['Injury'] != NULL){
		if($ShowInjuried==0){
			echo '<tr><td colspan=8 style="padding-top:10px;"><strong style="text-transform:uppercase;">'.$l_InjuredReserve.'</strong></td></tr>';
			$ShowInjuried=1;
		}
		echo "<tr>";
		echo "<td><a href='player.php?player=".$row_GetVTRoster['Name']."'>".$row_GetVTRoster['Name']."</a></td>";
		echo "<td align=center>".$row_GetVTRoster['CON']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmGP']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmG']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmA']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPoint']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPlusMinus']."</td>";
		echo "<td align=center>".$row_GetVTRoster['FarmPim']."</td>";
		echo "</tr>";
		}
		} while ($row_GetVTRoster = mysql_fetch_assoc($GetVTRoster));
		?>
        </tfoot>
        </table>
        <br clear="all" />
        
       
        <strong style="text-transform:uppercase;"><?php echo $l_Goalies;?></strong>
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
            <th><a title="<?php echo $l_Condition;?>">CON</a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
            <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
            <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
        </tr>
        </thead>
        <tbody>
		<?php
		do{
		if($row_GetVTGoalies['Injury'] == "" || $row_GetVTGoalies['Injury'] == NULL){
		echo "<tr>";
		echo "<td><a href='goalie.php?player=".$row_GetVTGoalies['Number']."'>".$row_GetVTGoalies['Name']."</a></td>";
		echo "<td align=center>".$row_GetVTGoalies['CON']."</td>";
		echo '<td align="center">'.$row_GetVTGoalies['FarmGP'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmW'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmL'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmOTL'].'</td>';
        if ($row_GetVTGoalies['FarmMinPlay'] > 0){
			echo '<td align="center">'.number_format(($row_GetVTGoalies['FarmGA'] / minutes($row_GetVTGoalies['FarmMinPlay']))*60,2).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        if ($row_GetVTGoalies['FarmMinPlay'] > 0){ 
			echo '<td align="center">'.number_format($row_GetVTGoalies['FarmSA'] / ($row_GetVTGoalies['FarmGA'] + $row_GetVTGoalies['FarmSA']),3).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        echo '<td align="center">'.$row_GetVTGoalies['FarmShutouts'].'</td>';
		echo "</tr>";
		}
		} while ($row_GetVTGoalies = mysql_fetch_assoc($GetVTGoalies));
		?>
        </tbody>
         <tfoot style="border-color:#FF0000;">
        <?php
		mysql_data_seek($GetVTGoalies,0);
		$ShowInjuried=0;
		do{
		if($row_GetVTGoalies['Injury'] != "" || $row_GetVTGoalies['Injury'] != NULL){
		if($ShowInjuried==0){
			echo '<tr><td colspan=9 style="padding-top:10px;"><strong style="text-transform:uppercase;">Injured Reserve</strong></td></tr>';
			$ShowInjuried=1;
		}
		echo "<tr>";
		echo "<td><a href='goalie.php?player=".$row_GetVTGoalies['Number']."'>".$row_GetVTGoalies['Name']."</a></td>";
		echo "<td align=center>".$row_GetVTGoalies['CON']."</td>";
		echo '<td align="center">'.$row_GetVTGoalies['FarmGP'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmW'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmL'].'</td>';
        echo '<td align="center">'.$row_GetVTGoalies['FarmOTL'].'</td>';
        if ($row_GetVTGoalies['FarmMinPlay'] > 0){
			echo '<td align="center">'.number_format(($row_GetVTGoalies['FarmGA'] / minutes($row_GetVTGoalies['FarmMinPlay']))*60,2).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        if ($row_GetVTGoalies['FarmMinPlay'] > 0){ 
			echo '<td align="center">'.number_format($row_GetVTGoalies['FarmSA'] / ($row_GetVTGoalies['FarmGA'] + $row_GetVTGoalies['FarmSA']),3).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        echo '<td align="center">'.$row_GetVTGoalies['FarmShutouts'].'</td>';
		echo "</tr>";
		}
		} while ($row_GetVTGoalies = mysql_fetch_assoc($GetVTGoalies));
		?>
        </tfoot>
        </table>
        <br clear="all" />
        
        </div>
        
        
        
        <div class="fieldsetright">
        
        <table style="height:220px; width:100%">
        <tr><td></td><td align="center">
        <?php if($row_GetHT['JerseyHome'] != ""){
        	echo "<img src='".$_SESSION['DomainName']."/image/jersys/home/".$row_GetHT['JerseyHome']."' vspace='6' border=0>";
		} else {
        	echo "<img src='".$_SESSION['DomainName']."/image/logos/huge/".$row_GetHT['LogoLarge']."' vspace='6' id='TeamPhoto1' border=0>";
		}
		echo "</td><td></td></tr></table>";
		echo "<div style='text-align:center; font-size:12px; text-transform:uppercase;'>WINS VERSUS ".$row_GetVT['Name']." : <strong>".$tmpTS1."</strong>";
		echo "<br /><br />".$l_Last10." : <strong>".($row_GetHT['Last10W'] + $row_GetHT['Last10OTW'] + $row_GetHT['Last10SOW'])."-".$row_GetHT['Last10L']."-".($row_GetHT['Last10OTL']+$row_GetHT['Last10SOL'])." (".$row_GetHT['Streak'].")</strong>";
		echo "<br /><br />".$l_HomeRecord." : <strong>".($row_GetHT['HomeW'] + $row_GetHT['HomeOTW'] + $row_GetHT['HomeSOW'])."-".$row_GetHT['HomeL']."-".($row_GetHT['HomeOTL']+$row_GetHT['HomeSOL'])."</strong>";
		echo "<br /><br />".$l_Record." : <strong>".($row_GetHT['W'] + $row_GetHT['OTW'] + $row_GetHT['SOW'])."-".$row_GetHT['L']."-".($row_GetHT['OTL']+$row_GetHT['SOL'])."</strong>";
		echo "</div>";
		?>
        <br clear="all" />
       
        <strong style="text-transform:uppercase;"><?php echo $l_Skaters;?></strong>
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
            <th><a title="<?php echo $l_Condition;?>">CON</a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_G_D;?>"><?php echo $l_G;?></a></th>
            <th><a title="<?php echo $l_A_D;?>"><?php echo $l_A;?></a></th>
            <th><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
            <th><a title="<?php echo $l_P_M_D;?>"><?php echo $l_P_M;?></a></th>	
            <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
        </tr>
        </thead>
        <tbody>
		<?php
		do{
		if($row_GetHTRoster['Injury'] == "" || $row_GetHTRoster['Injury'] == NULL){
		echo "<tr>";
		echo "<td><a href='player.php?player=".$row_GetHTRoster['Name']."'>".$row_GetHTRoster['Name']."</a></td>";
		echo "<td align=center>".$row_GetHTRoster['CON']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmGP']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmG']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmA']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPoint']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPlusMinus']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPim']."</td>";
		echo "</tr>";
		}
		} while ($row_GetHTRoster = mysql_fetch_assoc($GetHTRoster));
		?>
        </tbody>
        <tfoot style="border-color:#FF0000;">
        <?php
		$ShowInjuried=0;
		mysql_data_seek($GetHTRoster,0);
		do{
		if($row_GetHTRoster['Injury'] != "" || $row_GetHTRoster['Injury'] != NULL){
		if($ShowInjuried==0){
			echo '<tr><td colspan=8 style="padding-top:10px;"><strong style="text-transform:uppercase;">Injured Reserve</strong></td></tr>';
			$ShowInjuried=1;
		}
		echo "<tr>";
		echo "<td><a href='player.php?player=".$row_GetHTRoster['Name']."'>".$row_GetHTRoster['Name']."</a></td>";
		echo "<td align=center>".$row_GetHTRoster['CON']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmGP']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmG']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmA']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPoint']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPlusMinus']."</td>";
		echo "<td align=center>".$row_GetHTRoster['FarmPim']."</td>";
		echo "</tr>";
		}
		} while ($row_GetHTRoster = mysql_fetch_assoc($GetHTRoster));
		?>
        </tfoot>
        </table>
        <br clear="all" />
        
       
        <strong style="text-transform:uppercase;"><?php echo $l_Goalies;?></strong>
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><a title="<?php echo $l_Name; ?>"><?php echo $l_Name;?></a></th>
            <th><a title="<?php echo $l_Condition;?>">CON</a></th>
            <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
            <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
            <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
            <th><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>	
            <th><a title="<?php echo $l_AVE_D;?>"><?php echo $l_AVE;?></a></th>	
            <th><a title="<?php echo $l_PCT_D;?>"><?php echo $l_PCT;?></a></th>
            <th><a title="<?php echo $l_Shutouts_D;?>"><?php echo $l_Shutouts;?></a></th>	
        </tr>
        </thead>
        <tbody>
		<?php
		do{
		if($row_GetHTGoalies['Injury'] == "" || $row_GetHTGoalies['Injury'] == NULL){
		echo "<tr>";
		echo "<td><a href='goalie.php?player=".$row_GetHTGoalies['Number']."'>".$row_GetHTGoalies['Name']."</a></td>";
		echo "<td align=center>".$row_GetHTGoalies['CON']."</td>";
		echo '<td align="center">'.$row_GetHTGoalies['FarmGP'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmW'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmL'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmOTL'].'</td>';
        if ($row_GetHTGoalies['FarmMinPlay'] > 0){
			echo '<td align="center">'.number_format(($row_GetHTGoalies['FarmGA'] / minutes($row_GetHTGoalies['FarmMinPlay']))*60,2).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        if ($row_GetHTGoalies['FarmMinPlay'] > 0){ 
			echo '<td align="center">'.number_format($row_GetHTGoalies['FarmSA'] / ($row_GetHTGoalies['FarmGA'] + $row_GetHTGoalies['FarmSA']),3).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        echo '<td align="center">'.$row_GetHTGoalies['FarmShutouts'].'</td>';
		echo "</tr>";
		}
		} while ($row_GetHTGoalies = mysql_fetch_assoc($GetHTGoalies));
		?>
        </tbody>
         <tfoot style="border-color:#FF0000;">
        <?php
		mysql_data_seek($GetHTGoalies,0);
		$ShowInjuried=0;
		do{
		if($row_GetHTGoalies['Injury'] != "" || $row_GetHTGoalies['Injury'] != NULL){
		if($ShowInjuried==0){
			echo '<tr><td colspan=9 style="padding-top:10px;"><strong style="text-transform:uppercase;">Injured Reserve</strong></td></tr>';
			$ShowInjuried=1;
		}
		echo "<tr>";
		echo "<td><a href='goalie.php?player=".$row_GetHTGoalies['Number']."'>".$row_GetHTGoalies['Name']."</a></td>";
		echo "<td align=center>".$row_GetHTGoalies['CON']."</td>";
		echo '<td align="center">'.$row_GetHTGoalies['FarmGP'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmW'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmL'].'</td>';
        echo '<td align="center">'.$row_GetHTGoalies['FarmOTL'].'</td>';
        if ($row_GetHTGoalies['FarmMinPlay'] > 0){
			echo '<td align="center">'.number_format(($row_GetHTGoalies['FarmGA'] / minutes($row_GetHTGoalies['FarmMinPlay']))*60,2).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        if ($row_GetHTGoalies['FarmMinPlay'] > 0){ 
			echo '<td align="center">'.number_format($row_GetHTGoalies['FarmSA'] / ($row_GetHTGoalies['FarmGA'] + $row_GetHTGoalies['FarmSA']),3).'</td>';
		} else { 
			echo '<td align="center">0</td>'; 
		}
        echo '<td align="center">'.$row_GetHTGoalies['FarmShutouts'].'</td>';
		echo "</tr>";
		}
		} while ($row_GetHTGoalies = mysql_fetch_assoc($GetHTGoalies));
		?>
        </tfoot>
        </table>
        <br clear="all" />
        
        </div>
        
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
