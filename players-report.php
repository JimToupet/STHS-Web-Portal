<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_NoUpdate = "No outdataed players available";
	$l_LastUpload = "Last Upload";
	$l_Alert1 = "Are you sure you want to remove this player?";
	$l_Alert2 = "Are you sure you want to retire this player?";
	$l_Retire = "Retire";
	$l_prospects = "Prospects";
	break; 
	
case 'fr': 	
	$l_NoUpdate = "Pas de joueurs pass&eacute;s date disponibles";
	$l_LastUpload = "Derni&egrave;re Mise &agrave; Jour";
	$l_Alert1 = "&Ecirc;tes-vous sur de vouloir effacer ce joueur?";
	$l_Alert2 = "&Ecirc;tes-vous sur de vouloir envoyer &agrave; la retraite ce joueur?";
	$l_Retire = "Retir&eacute;s";
	$l_prospects = "Rel&egrave;ve";
	break; 
} 

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}



$query_GetInfo = sprintf("SELECT LastModifiedProspects, LastModifiedPlayers, LastModifiedGoalies,LastModifiedCoaches FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$query_GetRoster = sprintf("SELECT p.DateCreated, p.Number, p.Name, PosRW, PosLW, PosC, PosD, 'False' as PosG, p.Team FROM players as p WHERE Retired=0 AND p.DateCreated < '%s' UNION ALL SELECT g.DateCreated, g.Number, g.Name, 'False' as PosRW, 'False' as PosLW, 'False' as PosC, 'False' as PosD, 'True' as PosG, g.Team FROM goalies as g WHERE Retired=0 AND g.DateCreated < '%s' ORDER BY Name", $row_GetInfo['LastModifiedPlayers'], $row_GetInfo['LastModifiedGoalies']);
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetProspect= sprintf("SELECT DateCreated, Name, Position, TeamNumber FROM prospects WHERE DateCreated < '%s'  ORDER BY Position, Name", $row_GetInfo['LastModifiedProspects']);
$GetProspect = mysql_query($query_GetProspect, $connection) or die(mysql_error());
$row_GetProspect = mysql_fetch_assoc($GetProspect);
$totalRows_GetProspect = mysql_num_rows($GetProspect);

$query_GetCoach= sprintf("SELECT DateCreated, Name, Number, Team FROM coaches WHERE DateCreated < '%s' ", $row_GetInfo['LastModifiedCoaches']);
$GetCoach = mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach = mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach = mysql_num_rows($GetCoach);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_outdated_players;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
function confirmRetire(delUrl) {
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
    <h1><?php echo $l_nav_outdated_players;?> (<?php echo $l_LastUpload;?> <?php echo $row_GetInfo['LastModifiedLeagueFile']; ?>)</h1>
	<?php echo $row_GetRoster; ?>
	<table class="tablesorterRates">
    <thead>
   <tr>
		<th width="120"><?php echo $l_Position;?></th>
		<th align="center"><?php echo $l_Name;?></th>
		<th align="center"><?php echo $l_LastUpload;?></th>
		<th align="center" width="100">Action</th>
	</tr>
    </thead>
    <tbody>
	<?php 
    if ($row_GetRoster > 0) {
        $tmpTargetFile="player.php";
	do { 
	if($row_GetRoster['PosG'] == "True"){
		$tmpTargetFile="goalie.php";
	} else {
		$tmpTargetFile="player.php";
	}
	?>	
	<tr>
		<td align="center"><?php 
		echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
		if ($row_GetRoster['PosC'] == "True" || $row_GetRoster['PosC'] == "Vrai"){
			echo $l_C;
			$tmpPostion = 1;
		} else { echo "&nbsp;"; }
		echo '</div>';
		echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
		if ($row_GetRoster['PosLW'] == "True" || $row_GetRoster['PosLW'] == "Vrai"){
			echo $l_LW;
			$tmpPostion = 2;
		} else { echo "&nbsp;"; }
		echo '</div>';
		echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
		if ($row_GetRoster['PosRW'] == "True" || $row_GetRoster['PosRW'] == "Vrai"){
			echo $l_RW;
			$tmpPostion = 3;
		} else { echo "&nbsp;"; }
		echo '</div>';
		echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
		if ($row_GetRoster['PosD'] == "True" || $row_GetRoster['PosD'] == "Vrai"){
			echo $l_D;
			$tmpPostion = 4;
		} else { echo "&nbsp;"; }
		echo '</div>';
		echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
		if ($row_GetRoster['PosG'] == "True" || $row_GetRoster['PosG'] == "Vrai"){
			echo $l_G;
			$tmpPostion = 5;
		} else { echo "&nbsp;"; }
		echo '</div>';
		?></td>
		<td align="center"><a href="<?php echo $tmpTargetFile ?>?player=<?php echo $row_GetRoster['Number']; ?>"><?php echo $row_GetRoster['Name']; ?></a></td>
		<td align="center"><?php echo $row_GetRoster['DateCreated']; ?></td>
		<td align="center"><a href="javascript:confirmDelete('remove-player.php?player=<?php echo $row_GetRoster['Number']; ?>&position=<?php echo $tmpPostion; ?>');"><?php echo $l_Remove;?></a> &nbsp;|&nbsp; <a href="javascript:confirmDelete('player-retire.php?player=<?php echo $row_GetRoster['Number']; ?>&position=<?php echo $tmpPostion; ?>');"><?php echo $l_Retire;?></a></td>
	</tr>
	<?php 
		} while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); 
	} else {
		echo "<tr><td colspan=4>".$l_NoUpdate."</td></tr>";
	}
	?>
	</tbody>
	</table>
	<bR /><br />
     
            
   <table class="tablesorterRates">
   <thead>
   <tr>
		<th><?php echo $l_Position;?></th>
		<th align="center"><?php echo $l_Name;?></th>
		<th align="center"><?php echo $l_LastUpload;?></th>
		<th align="center">Action</th>
	</tr>
    </thead>
    <tbody>
	<?php 
    if ($totalRows_GetProspect > 0) {
        $tmpTargetFile="prospect.php";
        do { 
        ?>	
        <tr>
        <td><?php 
            if ($row_GetProspect['Position']==1){
                echo $l_Center;
            } elseif ($row_GetProspect['Position']==2){
                echo $l_LeftWing;
            } elseif ($row_GetProspect['Position']==3){
                echo $l_RightWing;
            } elseif ($row_GetProspect['Position']==4){
                echo $l_Defence;
            } elseif ($row_GetProspect['Position']==5){
                echo $l_Goalie;
            }
            ?></td>
            <td align="center"><a href="<?php echo $tmpTargetFile ?>?team=<?php echo $_SESSION['current_Team_ID']; ?>&player=<?php echo $row_GetProspect['Name']; ?>"><?php echo $row_GetProspect['Name']; ?></a></td>
            <td align="center"><?php echo $row_GetProspect['DateCreated']; ?></td>
            <td align="center"><a href="javascript:confirmDelete('remove-prospect.php?player=<?php echo str_replace("'","\'", $row_GetProspect['Name']); ?>');"><?php echo $l_Remove;?></a></td>
        </tr>
    <?php 
        } while ($row_GetProspect = mysql_fetch_assoc($GetProspect)); 
    } else {
        echo "<tr><td colspan=4>".$l_NoUpdate."</td></tr>";
    }
    ?>
    </tbody>
     </table>
     
     <table class="tablesorterRates">
   <thead>
   <tr>
		<th align="center"><?php echo $l_Name;?></th>
		<th align="center"><?php echo $l_LastUpload;?></th>
		<th align="center">Action</th>
	</tr>
    </thead>
    <tbody>
	<?php 
    if ($totalRows_GetCoach > 0) {
        $tmpTargetFile="coach.php";
        do { 
        ?>	
        <tr>
            <td align="center"><a href="<?php echo $tmpTargetFile ?>?coach=<?php echo $row_GetCoach['Number']; ?>"><?php echo $row_GetCoach['Name']; ?></a></td>
            <td align="center"><?php echo $row_GetCoach['DateCreated']; ?></td>
            <td align="center"><a href="javascript:confirmDelete('remove-coach.php?coach=<?php echo $row_GetCoach['Number']; ?>');"><?php echo $l_Remove;?></a> &nbsp;|&nbsp; <a href="javascript:confirmDelete('coach-retire.php?coach=<?php echo $row_GetCoach['Number']; ?>');"><?php echo $l_Retire;?></a></td>
        </tr>
    <?php 
        } while ($row_GetCoach = mysql_fetch_assoc($GetCoach)); 
    } else {
        echo "<tr><td colspan=4>".$l_NoUpdate."</td></tr>";
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
