<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Playoff_Z = "Clinched Conference";
	$l_Playoff_E = "Clinched Playoff spot";
	$l_Playoff_Y = "Clinched Division";
	$l_Playoff_P = "Clinched League Title";
	$l_Playoff_X = "";
	$l_Change  = "CHANGE SEASON";
	$l_GF_D = "Goals For";
	$l_GA_D = "Goals Against";
	$l_GP  = "GP";
	$l_P  = "Pts";
	$l_W  = "W";
	$l_L  = "L";
	$l_OT  = "OT";
	$l_PCT  = "PCT";
	$l_GP_D  = "Games Played";
	$l_P_D  = "Points";
	$l_W_D  = "Wins";
	$l_L_D  = "Loss";
	$l_OT_D  = "Overtime";
	$l_HomeTeam = "HOME";
	$l_AwayTeam = "AWAY";
	$l_PointsSystem = "Point System";
	$l_Win = "Win";
	$l_Loss = "Loss";
	$l_OTW = "OT Win";
	$l_OTL = "OT Loss";
	$l_SHOOT = "Shootout";
	$l_Record = "Overall Record";
	$l_Last10 = "Last 10 Games";
	$l_L10 = "LAST 10";
	$l_GF = "GF";
	$l_GA = "GA";
	$l_Streak = "Streak";
	$l_PlayoffsbyRound = "Playoffs by Round";
	$l_PlayoffsbyRecord = "Playoffs by Record";
	$l_Playoff_R1 = "Conference Quarter-Finals"; 
	$l_Playoff_R2 = "Conference Semi-Finals"; 
	$l_Playoff_R3 = "Conference Finals"; 
	$l_Playoff_R4 = "Finals";
	$l_Leads="leads";
	$l_Over="over";
	$l_Tied = "tied";
	$l_Series = "Series";
	$l_Winner = "Winner";
	$l_Looser = "Looser";
	break; 

case 'fr': 
	$l_Playoff_Z = "assur&eacute; du titre de conf&eacute;rence";
	$l_Playoff_E = "assur&eacute; d&Acirc;€™une place en s&eacute;ries";
	$l_Playoff_Y = "assur&eacute; du titre de division";
	$l_Playoff_P = "assur&eacute; du titre de league";
	$l_Change  = "Changer de saison";
	$l_GF_D = "But";
	$l_GA_D = "But contre";
	$l_GP  = "PJ";
	$l_P  = "Pts";
	$l_W  = "V";
	$l_L  = "D";
	$l_OT  = "PR";
	$l_PCT  = "%EFF";
	$l_GP_D  = "Parties jou&eacute;es";
	$l_P_D  = "Points";
	$l_GAA_D  = "Moyenne";
	$l_W_D  = "Victoires";
	$l_L_D  = "D&eacute;faites";
	$l_OT_D  = "Prolongation";
	$l_HomeTeam = "DOMICILE";
	$l_AwayTeam = "&Agrave; L'&Eacute;TRANGER";
	$l_PointsSystem = "Syst&egrave;me de pointage";
	$l_Win = "Victoire";
	$l_Loss = "D&eacute;faite";
	$l_OTW = "Victoire en prolongation";
	$l_OTL = "D&eacute;faite en prolongation";
	$l_SHOOT = "D&eacute;faite en fusillade";
	$l_Record = "Global";
	$l_Last10 = "Dernieres 10 parties";
	$l_L10 = "10 Derniers";
	$l_GF = "BP";
	$l_GA = "BC";
	$l_Streak = "S&eacute;quence";
	$l_PlayoffsbyRound = "S&eacute;ries &eacute;liminatoires par rond";
	$l_PlayoffsbyRecord = "S&eacute;ries &eacute;liminatoires";
	$l_Leads="leads";
	$l_Over="au dessus";
	$l_Tied = "tied";
	$l_Playoff_R1 = "Division Semi-Final Conference"; 
	$l_Playoff_R2 = "S&eacute;rie Demi-finale de conf&eacute;rence"; 
	$l_Playoff_R3 = "Semi-Final Series"; 
	$l_Playoff_R4 = "Finals";
	$l_Series = "S&eacute;ries";
	$l_Winner = "Gagnant";
	$l_Looser = "D&eacute;faite";
	break; 
} 

$season_id = $_SESSION['current_SeasonID'];

if (isset($_POST['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}
$SID_GetStandings=$season_id;

$SORT = "Conference";
if (isset($_GET['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_GET['sort'] : addslashes($_GET['sort']);
}


$query_GetInfo = sprintf("SELECT * FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);	

if($row_GetInfo['DivisionLeader'] == 'True'){
	$tmpDivisionLeaderSQL = " DivisionLeader desc, ";
} else {
	$tmpDivisionLeaderSQL = "";
}

$query_GetSeasonInfo = sprintf("SELECT * FROM seasons where S_ID=%s", $season_id);
$GetSeasonInfo = mysql_query($query_GetSeasonInfo, $connection) or die(mysql_error());
$row_GetSeasonInfo = mysql_fetch_assoc($GetSeasonInfo);

$query_GetSeasonsLink = sprintf("SELECT * FROM seasons");
$GetSeasonsLink = mysql_query($query_GetSeasonsLink, $connection) or die(mysql_error());
$row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink);
$totalRows_GetSeasonsLink = mysql_num_rows($GetSeasonsLink);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_standings;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    	<div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_standings;?></h1></div>

		<div style="float:right; padding-top:5px;">
        	<form action="pro_standings.php?sort=<?php echo $SORT; ?>" method="post" name="form1">
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
            <option value="<?php echo $row_GetSeasonsLink['S_ID']; ?>" <?php if ($SID_GetStandings == $row_GetSeasonsLink['S_ID']){ echo "selected"; } ?>>
			<?php 
			if ($row_GetSeasonsLink['SeasonType'] == 2){
            echo $row_GetSeasonsLink['Season']." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            echo $row_GetSeasonsLink['Season']."-".($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            echo ($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } 
			
			?></option>
            <?php } while ($row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink)); ?>
            </select><input type="submit" value="<?php echo $l_Change;?>"  class="button" />
			</form>
        </div>
        
        <br clear="all" />
		<br />

		<?php if ($row_GetSeasonInfo['SeasonType'] == 0){ ?>
        <div id="tabs">
        
            <div id="tabs-1">
				<h3><?php echo $l_PlayoffsbyRound;?></h3>

<?php
$query_GetTotalRounds = sprintf("SELECT Round FROM schedule WHERE Season_ID=%s GROUP BY Round ORDER BY Round desc LIMIT 0,1", $SID_GetStandings);
$GetTotalRounds = mysql_query($query_GetTotalRounds, $connection) or die(mysql_error());
$row_GetTotalRounds = mysql_fetch_assoc($GetTotalRounds);
$totalRows_GetTotalRounds = mysql_num_rows($GetTotalRounds);

$query_GetRounds = sprintf("SELECT * FROM schedule WHERE Season_ID=%s GROUP BY Round ORDER BY Round desc, Day", $SID_GetStandings);
$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
$row_GetRounds = mysql_fetch_assoc($GetRounds);
$totalRows_GetRounds = mysql_num_rows($GetRounds);

for( $r = $row_GetTotalRounds['Round']; $r > 0; $r-- ){

$query_GetRounds = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND Round=%s ORDER BY Round desc, VisitorTeam, Day", $SID_GetStandings, $r);
$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
$row_GetRounds = mysql_fetch_assoc($GetRounds);
$totalRows_GetRounds = mysql_num_rows($GetRounds);

$i=0;
$teamA = array();
$teamB = array();
$teamCurrent = array();
$Round = array();
$tmpRound=0;
$tmpSkipFirst=0;
$tmpRound = 0;
$CurrentRound = 0;
$tmpSkipFirst=0;
$FinalsCount=0;

do {
	if($tmpRound != $row_GetRounds['Round']){$tmpRound = $row_GetRounds['Round'];}

	if (! in_array($row_GetRounds['VisitorTeam'], $teamA)) { 	
		if (! in_array($row_GetRounds['HomeTeam'], $teamA)) { 
			$i = $i + 1;
			$Round[$i] = $row_GetRounds['Round'];
			$teamA[$i] = $row_GetRounds['VisitorTeam']; 
			$teamB[$i] = $row_GetRounds['HomeTeam'];
		}
	}
} while ($row_GetRounds = mysql_fetch_assoc($GetRounds)); 


for( $j = 1; $j <= $i; $j++ )
{	
	$query_GetTeamA = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $teamA[$j]);
	$GetTeamA = mysql_query($query_GetTeamA, $connection) or die(mysql_error());
	$row_GetTeamA = mysql_fetch_assoc($GetTeamA);
	$totalRows_GetTeamA = mysql_num_rows($GetTeamA);

	$query_GetTeamB = sprintf("SELECT LogoSmall, City, Name, Number FROM proteam WHERE Number=%s", $teamB[$j]);
	$GetTeamB = mysql_query($query_GetTeamB, $connection) or die(mysql_error());
	$row_GetTeamB = mysql_fetch_assoc($GetTeamB);
	$totalRows_GetTeamB = mysql_num_rows($GetTeamB);
	
	$query_GetW = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND (VisitorTeam=%s OR HomeTeam=%s) AND Round=%s ORDER BY Day asc", $SID_GetStandings, $teamA[$j], $teamA[$j], $r);
	$GetW = mysql_query($query_GetW, $connection) or die(mysql_error());
	$row_GetW = mysql_fetch_assoc($GetW);
	$totalRows_GetW = mysql_num_rows($GetW);
	
	$tmpTS1=0;
	$tmpTS2=0;
	$k = 0;
	$lastWin = "Home";
	do{
		$k=$k+1;
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==1){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==1){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==2){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==2){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==3){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==3){$tmpTS2 = $tmpTS2 + 1;}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==4){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==4){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==5){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==5){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore'] && $k==6){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] < $row_GetW['VisitorScore'] && $k==6){$tmpTS2 = $tmpTS2 + 1;}	
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore'] && $k==7){$tmpTS1 = $tmpTS1 + 1;}
		if($row_GetW['HomeScore'] > $row_GetW['VisitorScore'] && $k==7){$tmpTS2 = $tmpTS2 + 1;}
		
		if($row_GetW['VisitorScore'] > $row_GetW['HomeScore']){$lastWin = "Visitor"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
		if($row_GetW['VisitorScore'] < $row_GetW['HomeScore']){$lastWin = "Home"; $lastHome=$row_GetW['HomeTeam']; $lastVisitor=$row_GetW['VisitorTeam'];}
		
	} while ($row_GetW = mysql_fetch_assoc($GetW)); 

	
	if($r != $CurrentRound){
		$CurrentRound = $r;
		if($j >= 1){
			echo '</tbody></table><br clear="all" />';
		}
		echo '<h3>';
		if($r == 1){ 
			echo $l_Playoff_R1; 
		} else if($r == 2){ 
			echo $l_Playoff_R2; 
		} else if($r == 3){ 
			echo $l_Playoff_R3; 
		} else if($r == 4){ 
			echo $l_Playoff_R4; 
		} 
		echo '</h3>';
		echo '<table cellspacing="0" border="0" width="100%" class="tablesorter">';
		echo '<thead>';
		echo '<tr>';
		echo '<th width="50">'.$l_Series.'</th>';
		echo '<th width="200">'.$l_Winner.'</th>';
		echo '<th width="200">'.$l_Looser.'</th>';	
		echo '<th>'.$l_view_details.'</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
	}
	
	echo "<tr><td align=center style='vertical-align:middle;'><h1>";
	
	if($tmpTS1 > $tmpTS2){
		echo $tmpTS1."-".$tmpTS2;
	} else if($tmpTS1 < $tmpTS2){
		echo $tmpTS2."-".$tmpTS1;
	} else {
		echo $tmpTS2."-".$tmpTS1;
	}
	echo "</h1></td>";
	if($lastWin=="Home"){
		if($lastHome==$row_GetTeamB['Number']){
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></img></a></td>";
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></img></a></td>";
		} else {
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></img></a></td>";	
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></img></a></td>";
		}
	} else if($lastWin=="Visitor") {
		if($lastVisitor==$row_GetTeamB['Number']){
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></img></a></td>";
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></img></a></td>";
		} else {
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamA['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamA['LogoSmall']."' alt='".$row_GetTeamA['City']." ".$row_GetTeamA['Name']."'></img></a></td>";	
			echo "<td align=center style='vertical-align:middle; height:150px'><a href='pro_stats.php?team=".$row_GetTeamB['Number']."&season_id=".$SID_GetStandings."'><img border='0' src='".$_SESSION['DomainName']."/image/logos/medium/".$row_GetTeamB['LogoSmall']."' alt='".$row_GetTeamB['City']." ".$row_GetTeamB['Name']."'></img></a></td>";
		}
	}
	echo "<td align=center>";

	echo "<table width=100%>";
	$tmpGameCount = 0;
	mysql_data_seek($GetW,0);
	while ($row_GetW = mysql_fetch_assoc($GetW)){
		$tmpGameCount = $tmpGameCount + 1;
		foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
			if($_SESSION['MenuTeamsID'][$TeamPage] == $row_GetW['HomeTeam']) {
				$HomeTeam=$_SESSION['MenuTeams'][$TeamPage];
			}
			if($_SESSION['MenuTeamsID'][$TeamPage] == $row_GetW['VisitorTeam']) {
				$VisitorTeam=$_SESSION['MenuTeams'][$TeamPage];
			}
		}

		$query_GetLink = sprintf("SELECT todaysgame.Link FROM todaysgame WHERE todaysgame.GameNumber=CONCAT('Pro',CAST(".$row_GetW['Number']." as CHAR)) AND todaysgame.Season_ID=%s", $SID_GetStandings);
		$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
		$row_GetLink = mysql_fetch_assoc($GetLink);
		$GameLink = $row_GetLink['Link'];

		echo "<tr><td align=center width=75><a href='".$_SESSION['DomainName']."/File/".$row_GetSeasons['Folder']."/".$GameLink."'>Game ".$tmpGameCount."</a></td><td>".$HomeTeam."</td><td align=center width=20>".$row_GetW['HomeScore']."</td><td>".$VisitorTeam."</td><td align=center width=20>".$row_GetW['VisitorScore']."</td></tr>";
	} 
	echo "</table>";
	
	echo "</td>";
	echo "</tr>";
	$tmpRound = $r;
	}
}
echo "</table>";
?>

                </div>
                
            <div id="tabs-2">
				<h3><?php echo $l_PlayoffsbyRecord;?></h3>
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th colspan="2"><div align="left"></div></th>
	<th width="30"><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
	<th width="30"><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
	<th width="30"><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
	<th width="30"><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>		
	<th width="30"><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
	<th width="50"><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
	<th width="50"><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
	<th width="80"><a title="<?php echo $l_HomeTeam;?>"><?php echo $l_HomeTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_AwayTeam;?>"><?php echo $l_AwayTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_Last10;?>"><?php echo $l_L10;?></a></th>
	<th width="80"><?php echo $l_Streak;?></th>
</tr>
</thead>
<tbody>
<?php
$query_GetStandings = sprintf("SELECT  proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.DivisionLeader, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number, proteam.LogoTiny FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' AND proteamstandings.GP > 0 ORDER BY proteamstandings.StandingPlayoffTitle desc, ".$tmpDivisionLeaderSQL." proteamstandings.Point desc, proteamstandings.W desc, proteamstandings.PowerRanking asc", $SID_GetStandings);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

do {
	$tmpCurrentRnk = $tmpCurrentRnk + 1;
	$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
	$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
	$HomeWins = $row_GetStandings['HomeW'] + $row_GetStandings['HomeOTW'] + $row_GetStandings['HomeSOW'];
	$HomeOTLosses = $row_GetStandings['HomeOTL'] + $row_GetStandings['HomeSOL'];
	$HomeRecord = $HomeWins."-".$row_GetStandings['HomeL']."-".$HomeOTLosses;
	
	$VisitWins = $TotalWins - $HomeWins;
	$VisitOTLosses = $TotalOT - $HomeOTLosses;
	$VisitLoss = $row_GetStandings['L'] - $row_GetStandings['HomeL'];
	$VisitRecord = $VisitWins."-".$VisitLoss."-".$VisitOTLosses;
?>
<tr>
	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetStandings['LogoTiny']; ?>"></img></td>
	<td nowrap="nowrap" style="vertical-align:middle;"><?php 
			if($row_GetStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z" && $row_GetStandings['PowerRanking']==1){
				echo "P -";
			}
			?>
            <a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name']; ?></a></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GP']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalWins; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['L']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalOT; ?></td>		
	<td align="center" style="vertical-align:middle;"><strong><?php echo $row_GetStandings['Point']; ?></strong></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GF']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GA']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $HomeRecord; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $VisitRecord; ?></td>
    <td align="center" style="vertical-align:middle;"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['Streak']; ?></td>
</tr>
<?php } while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); ?>
</tbody>
</table>
<br />
            </div>
        </div>
        
        
		<?php } else { ?>
  		<div id="tabs">
            <div id="tabs-1"><h3>Division</h3>

<?php
$query_GetDivision = sprintf("SELECT proteam.Division, proteam.Conference FROM proteam GROUP BY proteam.Division ORDER BY proteam.Conference, proteam.Division ");
$GetDivision = mysql_query($query_GetDivision, $connection) or die(mysql_error());
$row_GetDivision = mysql_fetch_assoc($GetDivision);

$tmpLastConference="";
$tmpLastDivision="";

do { 
	if ($tmpLastConference != $row_GetDivision['Conference']){
		echo "<h3 style='float:left;'>".$row_GetDivision['Conference']."</h3>";
	}
	$tmpLastConference=$row_GetDivision['Conference'];
?>
<div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
    X = <?php echo $l_Playoff_E;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Y = <?php echo $l_Playoff_Y;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Z = <?php echo $l_Playoff_Z;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    P = <?php echo $l_Playoff_P;?>
</div>
<br clear="all" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th colspan="2"><div align="left"><?php echo $row_GetDivision['Division']; ?></div></th>
	<th width="30"><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
	<th width="30"><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
	<th width="30"><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
	<th width="30"><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>		
	<th width="30"><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
	<th width="50"><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
	<th width="50"><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
	<th width="80"><a title="<?php echo $l_HomeTeam;?>"><?php echo $l_HomeTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_AwayTeam;?>"><?php echo $l_AwayTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_Last10;?>"><?php echo $l_L10;?></a></th>
	<th width="80"><?php echo $l_Streak;?></th>
</tr>
</thead>
<tbody>
<?php
$query_GetStandings = sprintf("SELECT  proteamstandings.PowerRanking, proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.DivisionLeader, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number, proteam.LogoTiny FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' AND proteam.Division='%s' ORDER BY proteamstandings.StandingPlayoffTitle desc, ".$tmpDivisionLeaderSQL." proteamstandings.Point desc, proteamstandings.W desc, proteamstandings.PowerRanking asc", $SID_GetStandings, $row_GetDivision['Division']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);
$tmpCurrentRnk = 0;

do {
	$tmpCurrentRnk = $tmpCurrentRnk + 1;
	$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
	$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
	$HomeWins = $row_GetStandings['HomeW'] + $row_GetStandings['HomeOTW'] + $row_GetStandings['HomeSOW'];
	$HomeOTLosses = $row_GetStandings['HomeOTL'] + $row_GetStandings['HomeSOL'];
	$HomeRecord = $HomeWins."-".$row_GetStandings['HomeL']."-".$HomeOTLosses;
	
	$VisitWins = $TotalWins - $HomeWins;
	$VisitOTLosses = $TotalOT - $HomeOTLosses;
	$VisitLoss = $row_GetStandings['L'] - $row_GetStandings['HomeL'];
	$VisitRecord = $VisitWins."-".$VisitLoss."-".$VisitOTLosses;
?>
<tr>
	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetStandings['LogoTiny']; ?>"></img></td>
	<td nowrap="nowrap" style="vertical-align:middle;"><?php 
			if($row_GetStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z" && $row_GetStandings['PowerRanking']==1){
				echo "P -";
			}
			?>
            <a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name']; ?></a></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GP']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalWins; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['L']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalOT; ?></td>		
	<td align="center" style="vertical-align:middle;"><strong><?php echo $row_GetStandings['Point']; ?></strong></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GF']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GA']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $HomeRecord; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $VisitRecord; ?></td>
    <td align="center" style="vertical-align:middle;"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['Streak']; ?></td>
</tr>
<?php } while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); ?>
</tbody>
</table>
<?php } while ($row_GetDivision = mysql_fetch_assoc($GetDivision)); ?>
<br />
            </div>
            
            <div id="tabs-2">
				<h3><?php echo $l_Conference;?></h3>
<?php
$query_GetDivision = sprintf("SELECT proteam.Division, proteam.Conference FROM proteam GROUP BY proteam.Conference ORDER BY proteam.Conference");
$GetDivision = mysql_query($query_GetDivision, $connection) or die(mysql_error());
$row_GetDivision = mysql_fetch_assoc($GetDivision);

$tmpLastConference="";

do { 
	if ($tmpLastConference != $row_GetDivision['Conference']){
		echo "<h3 style='float:left;'>".$row_GetDivision['Conference']."</h3>";
	}
	$tmpLastConference=$row_GetDivision['Conference'];
?>
<div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
    X = <?php echo $l_Playoff_E;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Y = <?php echo $l_Playoff_Y;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Z = <?php echo $l_Playoff_Z;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    P = <?php echo $l_Playoff_P;?>
</div>
<br clear="all" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th colspan="2"><div align="left"></div></th>
	<th width="30"><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
	<th width="30"><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
	<th width="30"><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
	<th width="30"><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>		
	<th width="30"><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
	<th width="50"><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
	<th width="50"><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
	<th width="80"><a title="<?php echo $l_HomeTeam;?>"><?php echo $l_HomeTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_AwayTeam;?>"><?php echo $l_AwayTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_Last10;?>"><?php echo $l_L10;?></a></th>
	<th width="80"><?php echo $l_Streak;?></th>
</tr>
</thead>
<tbody>
<?php
$query_GetStandings = sprintf("SELECT  proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.DivisionLeader, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number, proteam.LogoTiny FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' AND proteam.Conference='%s' ORDER BY proteamstandings.StandingPlayoffTitle desc, proteamstandings.Point desc, ".$tmpDivisionLeaderSQL." proteamstandings.W desc, proteamstandings.PowerRanking asc", $SID_GetStandings, $row_GetDivision['Conference']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

do {
	$tmpCurrentRnk = $tmpCurrentRnk + 1;
	$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
	$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
	$HomeWins = $row_GetStandings['HomeW'] + $row_GetStandings['HomeOTW'] + $row_GetStandings['HomeSOW'];
	$HomeOTLosses = $row_GetStandings['HomeOTL'] + $row_GetStandings['HomeSOL'];
	$HomeRecord = $HomeWins."-".$row_GetStandings['HomeL']."-".$HomeOTLosses;
	
	$VisitWins = $TotalWins - $HomeWins;
	$VisitOTLosses = $TotalOT - $HomeOTLosses;
	$VisitLoss = $row_GetStandings['L'] - $row_GetStandings['HomeL'];
	$VisitRecord = $VisitWins."-".$VisitLoss."-".$VisitOTLosses;
?>
<tr>
	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetStandings['LogoTiny']; ?>"></img></td>
	<td nowrap="nowrap" style="vertical-align:middle;"><?php 
			if($row_GetStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z" && $row_GetStandings['PowerRanking']==1){
				echo "P -";
			}
			?>
            <a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name']; ?></a></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GP']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalWins; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['L']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalOT; ?></td>		
	<td align="center" style="vertical-align:middle;"><strong><?php echo $row_GetStandings['Point']; ?></strong></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GF']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GA']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $HomeRecord; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $VisitRecord; ?></td>
    <td align="center" style="vertical-align:middle;"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['Streak']; ?></td>
</tr>
<?php } while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); ?>
</tbody>
</table>
<?php } while ($row_GetDivision = mysql_fetch_assoc($GetDivision)); ?>
<br />
            </div>
            
            <div id="tabs-3">
				<h3><?php echo $l_nav_league;?></h3>
                
<div style="float:left;"><h3><?php echo $l_nav_league;?></h3></div>
<div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
    X = <?php echo $l_Playoff_E;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Y = <?php echo $l_Playoff_Y;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    Z = <?php echo $l_Playoff_Z;?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    P = <?php echo $l_Playoff_P;?>
</div>
<br clear="all" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th colspan="2"><div align="left"></div></th>
	<th width="30"><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
	<th width="30"><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
	<th width="30"><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
	<th width="30"><a title="<?php echo $l_OT_D;?>"><?php echo $l_OT;?></a></th>		
	<th width="30"><a title="<?php echo $l_P_D;?>"><?php echo $l_P;?></a></th>
	<th width="50"><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
	<th width="50"><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
	<th width="80"><a title="<?php echo $l_HomeTeam;?>"><?php echo $l_HomeTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_AwayTeam;?>"><?php echo $l_AwayTeam;?></a></th>
	<th width="80"><a title="<?php echo $l_Last10;?>"><?php echo $l_L10;?></a></th>
	<th width="80"><?php echo $l_Streak;?></th>
</tr>
</thead>
<tbody>
<?php
$query_GetStandings = sprintf("SELECT  proteamstandings.Last10SOW, proteamstandings.Last10SOL, proteamstandings.Last10OTW, proteamstandings.Last10OTL, proteamstandings.Last10W, proteamstandings.Last10L, proteamstandings.Last10T, proteamstandings.Streak, proteamstandings.StandingPlayoffTitle, proteamstandings.DivisionLeader, proteamstandings.HomeW, proteamstandings.HomeL, proteamstandings.HomeSOL, proteamstandings.HomeSOW, proteamstandings.HomeOTL, proteamstandings.HomeOTW, proteamstandings.GP, proteamstandings.W, proteamstandings.Point, proteamstandings.L, proteamstandings.OTW, proteamstandings.GF, proteamstandings.GA, proteamstandings.OTL, proteamstandings.SOW, proteamstandings.SOL, proteam.Division, proteam.Conference, proteam.Name, proteam.City, proteam.Number, proteam.LogoTiny FROM proteamstandings, proteam WHERE proteam.Number=proteamstandings.Number AND proteamstandings.Season_ID='%s' ORDER BY proteamstandings.StandingPlayoffTitle desc, proteamstandings.Point desc, ".$tmpDivisionLeaderSQL." proteamstandings.W desc,  proteamstandings.PowerRanking asc", $SID_GetStandings);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

do {
	$tmpCurrentRnk = $tmpCurrentRnk + 1;
	$TotalWins = $row_GetStandings['W'] + $row_GetStandings['OTW'] + $row_GetStandings['SOW'];
	$TotalOT = $row_GetStandings['OTL'] + $row_GetStandings['SOL'];
	$HomeWins = $row_GetStandings['HomeW'] + $row_GetStandings['HomeOTW'] + $row_GetStandings['HomeSOW'];
	$HomeOTLosses = $row_GetStandings['HomeOTL'] + $row_GetStandings['HomeSOL'];
	$HomeRecord = $HomeWins."-".$row_GetStandings['HomeL']."-".$HomeOTLosses;
	
	$VisitWins = $TotalWins - $HomeWins;
	$VisitOTLosses = $TotalOT - $HomeOTLosses;
	$VisitLoss = $row_GetStandings['L'] - $row_GetStandings['HomeL'];
	$VisitRecord = $VisitWins."-".$VisitLoss."-".$VisitOTLosses;
?>
<tr>
	<td align="center"><img border="0" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/small/<?php echo $row_GetStandings['LogoTiny']; ?>"></img></td>
	<td nowrap="nowrap" style="vertical-align:middle;"><?php 
			if($row_GetStandings['StandingPlayoffTitle']=="E"){
				echo "";
			} else if($row_GetStandings['StandingPlayoffTitle']=="X"){
				echo "X -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Y"){
				echo "Y -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z"){
				echo "Z -";
			} else if($row_GetStandings['StandingPlayoffTitle']=="Z" && $row_GetStandings['PowerRanking']==1){
				echo "P -";
			}
			?>
            <a href="pro_roster.php?team=<?php echo $row_GetStandings['Number']; ?>"><?php echo $row_GetStandings['City']." ".$row_GetStandings['Name']; ?></a></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GP']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalWins; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['L']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $TotalOT; ?></td>		
	<td align="center" style="vertical-align:middle;"><strong><?php echo $row_GetStandings['Point']; ?></strong></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GF']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['GA']; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $HomeRecord; ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $VisitRecord; ?></td>
    <td align="center" style="vertical-align:middle;"><?php echo ($row_GetStandings['Last10W'] + $row_GetStandings['Last10OTW'] + $row_GetStandings['Last10SOW'])."-".$row_GetStandings['Last10L']."-".($row_GetStandings['Last10OTL']+$row_GetStandings['Last10SOL']); ?></td>
	<td align="center" style="vertical-align:middle;"><?php echo $row_GetStandings['Streak']; ?></td>
</tr>
<?php } while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); ?>
</tbody>
</table>
<br />
                
            </div>
        </div>
        <?php } ?>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
