<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){
case 'en': 
	$l_Year = "Year";
	$l_draftpicks = "Draft Picks";
	$l_Round = "Round";
	$l_UpcomingDraftPicks = "Upcoming Draft Picks";
	$l_PastDraftPicks = "Past Draft Picks";
	break; 

case 'fr': 
	$l_Year = "Ann&eacute;e";
	$l_draftpicks = "Choix au rep&ecirc;chage";
	$l_Round = "Rond";
	$l_UpcomingDraftPicks = "Choix au rep&ecirc;chage prochaine";
	$l_PastDraftPicks = "Choix au rep&ecirc;chage pr&eacute;c&eacute;dent";
	break; 
}

// Class draft picks
class draft_pick
{
	var $iYearIdx;
	var $iRound;
	var $strPickOwner;
	var $strTeam;
}




$tmpYear = $_SESSION['current_DraftYear'];

$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre, proteam.LogoTiny FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year >= %s ORDER BY draftpicks.Year, draftpicks.Round", $_SESSION['current_Team_ID'], $tmpYear);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$totalRows_GetDraftPicks = mysql_num_rows($GetDraftPicks);

$query_GetSeasons = sprintf("SELECT draftpicks.* FROM draftpicks WHERE draftpicks.Year >= %s group by draftpicks.Year Order By draftpicks.Year",$tmpYear);
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons = mysql_num_rows($GetSeasons);


$query_GetOldDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre, proteam.LogoTiny FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year < %s ORDER BY draftpicks.Year desc, draftpicks.Round asc", $_SESSION['current_Team_ID'], $tmpYear);
$GetOldDraftPicks = mysql_query($query_GetOldDraftPicks, $connection) or die(mysql_error());
$row_GetOldDraftPicks = mysql_fetch_assoc($GetOldDraftPicks);
$totalRows_GetOldDraftPicks = mysql_num_rows($GetOldDraftPicks);

$query_GetOldSeasons = sprintf("SELECT Year FROM draftpicks WHERE Year < %s group by Year Order By Year desc",$tmpYear);
$GetOldSeasons = mysql_query($query_GetOldSeasons, $connection) or die(mysql_error());
$row_GetOldSeasons = mysql_fetch_assoc($GetOldSeasons);
$totalRows_GetOldSeasons = mysql_num_rows($GetOldSeasons);

// Draft picks!
$iRounds = 8;
$iYear = $row_GetSeasons[ 'Year' ];
$iOldRounds = 8;
$iOldYear = $row_GetOldSeasons[ 'Year' ];

// Initialize the structures that will be used to store the draft picks
$a_Picks = array();
for( $i = $iYear; $i < $iYear + $totalRows_GetSeasons; $i++ )
{
	$a_Picks[ $i ] = array();
	for( $j = 0; $j < $iRounds; $j++ )
	{
		$a_Picks[$i][$j] = array();
	}
}
$a_OldPicks = array();
for( $i = $iOldYear; $i < $iOldYear + $totalRows_GetOldSeasons; $i++ )
{
	$a_OldPicks[ $i ] = array();
	for( $j = 0; $j < $iOldRounds; $j++ )
	{
		$a_OldPicks[$i][$j] = array();
	}
}

// Select the picks and sort them in a way that will make them easier to display
do {
	$pick = new draft_pick;
	$pick->iYearIdx = $row_GetDraftPicks['Year'];
	$pick->iRound = $row_GetDraftPicks['Round'];
	$pick->strPickOwner = $row_GetDraftPicks['OwnBy'];
	$pick->strTeam = $row_GetDraftPicks['Abbre'];
	$a_Picks[$row_GetDraftPicks['Year']][$row_GetDraftPicks['Round']][] = (object)$pick;
} while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks));
 
$query_GetRounds = sprintf("SELECT * FROM draft WHERE Year <= %s ORDER BY Year desc",$tmpYear);
$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
$row_GetRounds = mysql_fetch_assoc($GetRounds);
$totalRows_GetRounds = mysql_num_rows($GetRounds);

// Select the picks and sort them in a way that will make them easier to display
do {
	$Oldpick = new draft_pick;
	$Oldpick->iYearIdx = $row_GetOldDraftPicks['Year'];
	$Oldpick->iRound = $row_GetOldDraftPicks['Round'];
	$Oldpick->strPickOwner = $row_GetOldDraftPicks['OwnBy'];
	$Oldpick->strTeam = $row_GetOldDraftPicks['Abbre'];
	$a_OldPicks[$row_GetOldDraftPicks['Year']][$row_GetOldDraftPicks['Round']][] = (object)$Oldpick;
} while ($row_GetOldDraftPicks = mysql_fetch_assoc($GetOldDraftPicks));
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_draft;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
.fieldsetleft {float:left; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:500px; }
.fieldsetright {float:right; width:450px; border: 1px solid #eeeeee; padding: 10px; min-height:500px;}
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
    <h1><?php echo $l_nav_draft;?></h1>
    <br clear="all" />
    
    <div class="fieldsetleft">
    <?php
	do{
		echo "<h3>".$row_GetRounds['DraftName']."</h3>";
		echo '<table class="tablesorterRates">';
		echo '<thead>';
		echo '<tr>';
			echo '<th width=30>'.$l_Round.'</th>';
			echo '<th width=30>'.$l_overall.'</th>';
			echo '<th>'.$l_nav_players.'</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		if($totalRows_GetRounds > 0){
		$query_GetPlayers = sprintf("SELECT * FROM draftpicks WHERE Year=%s AND OwnBy=%s ORDER BY Round asc, Overall asc", $row_GetRounds['Year'], $_SESSION['current_Team_ID']);
		$GetPlayers = mysql_query($query_GetPlayers, $connection) or die(mysql_error());
		$row_GetPlayers = mysql_fetch_assoc($GetPlayers);
		$totalRows_GetPlayers = mysql_num_rows($GetPlayers);

		do{
			$query_GetPlayer = sprintf("SELECT 'Player' as Type, Number FROM players WHERE Name='%s' UNION ALL SELECT 'Goalie' as Type, Number FROM goalies WHERE Name='%s' UNION ALL SELECT 'Prospect' as Type, Name as Number FROM prospects WHERE Name='%s' ", $row_GetPlayers["Name"],$row_GetPlayers["Name"],$row_GetPlayers["Name"]);
			$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
			$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
			$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
			
			echo '<tr>';
				echo '<td align=center>'.$row_GetPlayers["Round"].'</td>';
				echo '<td align=center>'.$row_GetPlayers["Overall"].'</td>';
				echo '<td align=center>';
				if($row_GetPlayer['Type']=='Player'){
					echo '<a href="player.php?player='.$row_GetPlayer["Number"].'">'.$row_GetPlayers["Name"].'</a>';
				} else if($row_GetPlayer['Type']=='Goalie'){
					echo '<a href="goalie.php?player='.$row_GetPlayer["Number"].'">'.$row_GetPlayers["Name"].'</a>';
				} else if($row_GetPlayer['Type']=='Prospect'){
					echo '<a href="prospect.php?player='.$row_GetPlayer["Number"].'">'.$row_GetPlayers["Name"].'</a>';
				} else {
					echo $row_GetPlayers["Name"];
				}
				echo '</td>';
			echo '</tr>';
		} while ($row_GetPlayers = mysql_fetch_assoc($GetPlayers)); 
		}	 
		echo '</tbody>';
		echo '</table><br clear="all" />';
	} while ($row_GetRounds = mysql_fetch_assoc($GetRounds)); 	 
	?>
    </div>
    
    <div class="fieldsetright">
    <h3><?php echo $l_UpcomingDraftPicks;?></h3>
    
    <table class="tablesorterRates">
    <thead>
    <tr>
        <th><?php echo $l_Year;?></th>
        <th><?php echo $l_nav_draft;?></th>
    </tr>
    </thead>
    <tbody>
    <?php
	  $tmpRowCount=0;
	  $tmpRowColor="FFFFFF";	
	  $iCounter = 0;
	  
	  // Now, display the picks for each year
	  for( $i = $iYear; $i < $iYear + $totalRows_GetSeasons; $i++ )
	  {
	  	$iCounter = $iCounter + 1;
		if ($tmpRowCount==1){
				$tmpRowColor="E9ECF3";
				$tmpRowCount=0;
		}
		else {
				$tmpRowColor="FFFFFF";
				$tmpRowCount=1;
		}
		echo( '<tr>');
		echo( "<td align='center' valign='middle' style='padding-top:10px;; width:80px;'>" . (($_SESSION['current_Season']) + $iCounter) . "</td>" );
		echo( "<td valign='middle' style='padding-top:10px;'>" );
		for( $j = 1; $j <= $iRounds; $j++ )
		{
			if(isset($a_Picks[$i][$j])){
			if( count( $a_Picks[$i][$j] ) == 0 ) {
				echo( " " );
			}
		
			for( $k = 0; $k < count( $a_Picks[$i][$j] ); $k++ )
			{
				$pick = (object) $a_Picks[$i][$j][$k];
				echo $pick->strTeam.' '.$pick->iRound;
				echo ", ";
			}
			}
		}
		echo( "</td>" );
		echo( "</tr>" );
	}
	?>
     </tbody>
     </table>  
     
     <h3><?php echo $l_PastDraftPicks;?></h3>
    
    <table class="tablesorterRates">
    <thead>
    <tr>
        <th><?php echo $l_Year;?></th>
        <th><?php echo $l_nav_draft;?></th>
    </tr>
    </thead>
    <tbody>
    <?php
	  $tmpRowCount=0;
	  $tmpRowColor="FFFFFF";	
			
	  // Now, display the picks for each year
	  for( $i = $iOldYear; $i > $iOldYear - $totalRows_GetOldSeasons-1; $i--)
	  {
		if ($tmpRowCount==1){
				$tmpRowColor="E9ECF3";
				$tmpRowCount=0;
		}
		else {
				$tmpRowColor="FFFFFF";
				$tmpRowCount=1;
		}
		echo( '<tr>');
		echo( "<td align='center' valign='middle' style='padding-top:10px; width:80px;'>" . (($_SESSION['current_Season']-2) - ($totalRows_GetOldSeasons - $i)) . "</td>" );
		echo( "<td valign='middle' style='padding-top:10px;'>" );
		for( $j = 1; $j <= $iOldRounds; $j++ )
		{
		
			if( count( $a_OldPicks[$i][$j] ) == 0 ) {
				echo( " " );
			}
		
			for( $k = 0; $k < count( $a_OldPicks[$i][$j] ); $k++ )
			{
				$Oldpick = (object) $a_OldPicks[$i][$j][$k];
				echo $Oldpick->strTeam.' '.$Oldpick->iRound;
				echo ", ";
			}
		}
		echo( "</td>" );
		echo( "</tr>" );
	}
	?>
     </tbody>
     </table>           
 	</div>
    
    <br clear="all" />
    </section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetInfo);
mysql_free_result($GetSeasons);
mysql_free_result($GetDraftPicks);
?>