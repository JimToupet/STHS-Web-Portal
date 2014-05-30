<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_D_G  = "Defence and Goalies";
	$l_forwards = "Forwards";
	$l_Year = "Year";
	$l_draftpicks = "Draft Picks";
	$l_Prospects = "Prospects";
	$l_NextYear = "Next Season";
	$l_CurrentYear = "Current Season";
	$l_OV_D = "Overall";
	break; 

case 'fr': 
	$l_D_G  = "D&eacute;fenseurs/Gardiens";
	$l_forwards = "Attaquants";
	$l_Year = "Ann&eacute;e";
	$l_draftpicks = "Choix au rep&ecirc;chage";
	$l_Prospects = "Rel&#232;ve";
	$l_NextYear = "Saison prochaine";
	$l_CurrentYear = "Saison courante";
	$l_OV_D = "Total";
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

// Class player
class player
{
	var $iID;
	var $iAge;
	var $iPos;
	var $iCountry;
	var $iPO;
	var $strName;
	var $strTeam;
	var $iOV;
	var $fSalary;
	var $iYearsLeft;
	var $iStatus;
	var $bRookie;
}

$strTmp = "";
$text = "";
$ACTION = "";
$SQL_ACTION = "";
$SQL_ACTION_GOALIE = "";
if (isset($_GET['action'])) {
  $ACTION = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

if ($ACTION == "next"){
	$SQL_ACTION = " AND (players.Contract > 1 OR players.Number = (SELECT playerscontractoffers.Player FROM playerscontractoffers  WHERE playerscontractoffers.Player=players.Number AND playerscontractoffers.Type='Extension' AND PlayerType='player')) ";
	$SQL_ACTION_GOALIE = " AND (goalies.Contract > 1 OR goalies.Number = (SELECT playerscontractoffers.Player FROM playerscontractoffers  WHERE playerscontractoffers.Player=goalies.Number AND playerscontractoffers.Type='Extension' AND PlayerType='goalie')) ";
} 
if ($_SESSION['JuniorLeague'] == 'True'){
	$SQL_ACTION = 	$SQL_ACTION."  AND players.Suspension < 99 ";
	$SQL_ACTION_GOALIE = 	$SQL_ACTION_GOALIE."  AND goalies.Suspension < 99 ";	
}

$SORT = "Overall";
if (isset($_GET['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_GET['sort'] : addslashes($_GET['sort']);
}
$SORT_GOALIE = "Overall";
if (isset($_GET['sort_goalie'])) {
  $SORT_GOALIE = (get_magic_quotes_gpc()) ? $_GET['sort_goalie'] : addslashes($_GET['sort_goalie']);
}

$SID_GetTop5 = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
$TID_GetTop5 = "1";
if (isset($_SESSION['current_Team'])) {
  $TID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_Team'] : addslashes($_SESSION['current_Team']);
}

$TID_GetProspects = "1";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetProspects = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}

$query_GetSkaters = sprintf( "SELECT players.* FROM playerstats, players WHERE players.Team=%s AND playerstats.Season_ID=%s AND players.Name=playerstats.Name AND players.Retired=0 AND players.Contract > 0 ".$SQL_ACTION." GROUP BY players.Name ORDER BY players.Position, players.Overall DESC", $TID_GetProspects, $SID_GetTop5 );
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);

$query_GetGoalies = sprintf( "SELECT goalies.* FROM goaliestats, goalies WHERE goalies.Team=%s AND goaliestats.Season_ID=%s AND goalies.Name=goaliestats.Name AND goalies.Retired=0 AND goalies.Contract > 0 ".$SQL_ACTION_GOALIE." GROUP BY goalies.Name ORDER BY goalies.Overall DESC", $TID_GetProspects, $SID_GetTop5 );
$GetGoalies = mysql_query($query_GetGoalies, $connection) or die(mysql_error());
$row_GetGoalies = mysql_fetch_assoc($GetGoalies);
$totalRows_GetGoalies = mysql_num_rows($GetGoalies);

$query_GetProspects = sprintf("SELECT prospects.* FROM prospects WHERE prospects.TeamNumber=%s ORDER BY prospects.Position, prospects.ProspectGrade DESC, prospects.ProspectLevel, prospects.Name", $TID_GetProspects );
$GetProspects = mysql_query($query_GetProspects, $connection) or die(mysql_error());
$totalRows_GetProspects = mysql_num_rows($GetProspects);

$tmpYear = $_SESSION['current_DraftYear'];

$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre, proteam.LogoTiny FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year >=%s ORDER BY draftpicks.Year, draftpicks.Round", $_SESSION['current_Team_ID'],$tmpYear);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());

$query_GetSeasons = sprintf("SELECT * FROM draftpicks WHERE Year >= %s group by Year Order By Year",$tmpYear);
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons = mysql_num_rows($GetSeasons);

// Initialize the players array
$a_players = array();
$a_players[ 1 ] = array();
$a_players[ 2 ] = array();
$a_players[ 3 ] = array();
$a_players[ 4 ] = array();
$a_players[ 5 ] = array();
$a_players[ 6 ] = array();

$a_prospects = array();

// Draft picks!
$iRounds = 8;
$iYear = $row_GetSeasons[ 'Year' ];

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

// Retrieve all players from the database
// Store in a structure indexed on player positions
do { 
	$a_player = new player;
	$a_player->iID = $row_GetSkaters[ 'ID' ];
	$a_player->strName = $row_GetSkaters[ 'Name' ];
	$a_player->strNumber = $row_GetSkaters[ 'Number' ];
	$a_player->iAge = $row_GetSkaters[ 'Age' ];
	$a_player->iCountry = $row_GetSkaters[ 'Country' ];
	$a_player->iPO = $row_GetSkaters[ 'PO' ];
	$a_player->iPos = $row_GetSkaters[ 'Position' ];
	if ($_SESSION['DisplayOV'] == 1) { 
		$a_player->iOV = $row_GetSkaters[ 'Overall' ];
	} else {
		$a_player->iOV = "N/A";
	}
	$a_player->bRookie = $row_GetSkaters[ 'Rookie' ] == "True";
	$a_player->iContract = $row_GetSkaters[ 'Contract' ];
	$a_players[ $a_player->iPos ][] = (object)$a_player;
} while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 

do {
	$a_player = new player;
	$a_player->iID = $row_GetGoalies[ 'ID' ];
	$a_player->strName = $row_GetGoalies[ 'Name' ];
	$a_player->strNumber = $row_GetGoalies[ 'Number' ];
	$a_player->iAge = $row_GetGoalies[ 'Age' ];
	$a_player->iCountry = $row_GetGoalies[ 'Country' ];
	$a_player->iPO = $row_GetGoalies[ 'PO' ];
	$a_player->iPos = $row_GetGoalies[ 'Position' ];
	if ($_SESSION['DisplayOV'] == 1) { 
		$a_player->iOV = $row_GetGoalies[ 'Overall' ];
	} else {
		$a_player->iOV = "N/A";
	}
	$a_player->bRookie = $row_GetGoalies[ 'Rookie' ] == "True";
	$a_player->iContract = $row_GetGoalies[ 'Contract' ];
	$a_players[ $a_player->iPos ][] = (object)$a_player;
} while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 

// Now find the highest count for the forward positions to properly structure the grid
$iMax = 0;
if( count($a_players[ 1 ]) > $iMax ) { $iMax = count($a_players[1]); }
if( count($a_players[ 2 ]) > $iMax ) { $iMax = count($a_players[2]); }
if( count($a_players[ 3 ]) > $iMax ) { $iMax = count($a_players[3]); }

// Retrieve the prospects now
while($row = mysql_fetch_assoc($GetProspects))
{
	$a_player = new player;
	$a_player->iID = $row[ 'P_ID' ];
	$a_player->strName = $row[ 'Name' ];
	if($row[ 'Position' ] <> ''){
		$a_player->strPos = $row[ 'Position' ];
	}else{
		$a_player->strPos = '1';
	}
	$a_player->iOV = number_format( $row[ 'ProspectGrade' ], 1, '.', '' ) . $row[ 'ProspectLevel' ];
	$a_prospects[ $a_player->strPos ][] = (object)$a_player;

} 

// Select the picks and sort them in a way that will make them easier to display
while($row = mysql_fetch_assoc($GetDraftPicks))
{
	$pick = new draft_pick;
	$pick->iYearIdx = $row['Year'];
	$pick->iRound = $row['Round'];
	$pick->strPickOwner = $row['OwnBy'];
	$pick->strTeam = $row['LogoTiny'];
	$a_Picks[$row['Year']][$row['Round']][] = (object)$pick;
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_depth;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
 	<?php 
	if ($ACTION == "next"){
       echo '<table align="right" border="0"><tr><td><a href="depth_chart.php">'.$l_CurrentYear.'</a></td></tr></table>';
	} else {
       echo '<table align="right" border="0"><tr><td><a href="depth_chart.php?action=next">'.$l_NextYear.'</a></td></tr></table>';
	}
	?><h1><?php echo $l_nav_depth;?></h1>
    <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
	  <tr>
	    <th colspan="3" colspan="3" align="center"><?php echo $l_forwards;?></th>
	  </tr>
	  <tr>
            <th width="33%"><?php echo $l_LeftWing;?></th>
            <th width="33%"><?php echo $l_Center;?></th>
            <th width="33%"><?php echo $l_RightWing;?></th>
	  </tr>
      </thead>
      <tbody>
	  <?php
	  $tmpRowColor="000000";
	  $tmpRowCount=0;
	  $tmpCount=0;
	
	  for( $i = 0; $i < $iMax; $i++ ) {
	  
		// Change row color
		if ($tmpRowCount==1){
		  $tmpRowColor="E9ECF3";
		  $tmpRowCount=0;
		}
		else {
		  $tmpRowColor="FFFFFF";
	      $tmpRowCount=1;
		}
		if ($i==3){
			$ProBorderStyle = 'style="border-bottom-width:2px; border-bottom-style:dotted; border-bottom-color:#'.$_SESSION['current_PrimaryColor'].';"';
		} else {
			$ProBorderStyle = '';
		}
		echo( '<tr bgcolor="#'.$tmpRowColor.'" '.$ProBorderStyle.'>');
	
		// Show left wings
		echo( "<td style='width:33%'>" );
		
		if( count( $a_players[ 2 ] ) > $i )
		{
			$a_player = (object)$a_players[ 2 ][$i];
			echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
			echo( '<a href="player.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
			if( $a_player->bRookie ) { echo( '*' ); }
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
			echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
		}
		else {
			echo( "&nbsp" );
		}
		echo( "</td>" );
	
		// Show centers
		echo( "<td style='text-align:center;width:33%'>" );
		if( count( $a_players[ 1 ] ) > $i )
		{
			$a_player = $a_players[ 1 ][$i];
			echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
			echo( '<a href="player.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
			if( $a_player->bRookie ) { echo( '*' ); }
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
			echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
		}
		else {
			echo( "&nbsp" );
		}
		echo( "</td>" );
	
		// Show right wings
		echo( "<td style='text-align:center;width:33%'>" );
		if( count( $a_players[ 3 ] ) > $i )
		{
			$a_player = $a_players[ 3 ][$i];
			echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
			echo( '<a href="player.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
			if( $a_player->bRookie ) { echo( '*' ); }
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
			echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
		}
		else {
			echo( "&nbsp" );
		}
		echo( $strTmp .= "</td>" );
	
		// End of row
		echo( "</tr>" );
	}

	?>
    </tbody>
	</table>
	<br clear="all" />
    
    <table  cellspacing="0" border="0" width="100%" class="tablesorter" style="border-bottom-style:ridge">
    <thead>
	  <tr>
	    <th colspan="3"><?php echo $l_D_G;?></th>
	  </tr>
	  <tr>
				<th width="33%"><?php echo $l_Defence;?> 1</th>
				<th width="33%"><?php echo $l_Defence;?> 2</th>
				<th width="33%"><?php echo $l_Goalie;?></th>
	  </tr>
	  </thead>
      <tbody>
	  <?php
		// Show the defense players and goalies
		// First find the highest count for the defence players to properly structure the grid
		$iMax = 0;
		if( (count($a_players[ 4 ]) % 2) == 1 )
		{
			$iDefRows = floor((count($a_players[ 4 ]) / 2) + 1);
		}
		else
		{
			$iDefRows = floor((count($a_players[ 4 ]) / 2));
		}

		if( $iDefRows > $iMax ) { $iMax = $iDefRows; }
		if( count($a_players[ 5 ]) > $iMax ) { $iMax = count($a_players[5]); }
		
		$tmpRowColor="000000";
		$tmpRowCount=0;
		$tmpCount=0;
	  
		for( $i = 0; $i < $iMax; $i++ ) {
			// Change row color
			if ($tmpRowCount==1){
				$tmpRowColor="E9ECF3";
				$tmpRowCount=0;
			}
			else {
				$tmpRowColor="FFFFFF";
				$tmpRowCount=1;
			}
			
			if ($i==2){
				$ProBorderStyle = 'style="border-bottom-width:2px; border-bottom-style:dotted; border-bottom-color:#'.$_SESSION['current_PrimaryColor'].';"';
			} else {
				$ProBorderStyle = '';
			}
		
			echo( '<tr bgcolor="#'.$tmpRowColor.'" '.$ProBorderStyle.'>');
	
			// Show 1st D
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_players[ 4 ] ) > (2*$i) )
			{
				$a_player = (object)$a_players[ 4 ][2*$i];
				echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
				echo( '<a href="player.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
				if( $a_player->bRookie ) { echo( '*' ); }
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
				echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			echo( "</td>" );
	
			// Show 2nd D
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_players[ 4 ] ) > (2*$i)+1 )
			{
				$a_player = $a_players[ 4 ][(2*$i)+1];
				echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
				echo( '<a href="player.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
				if( $a_player->bRookie ) { echo( '*' ); }
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
				echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			
			echo( $text .= "</td>" );
	
			// Show goalie
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_players[ 5 ] ) > $i )
			{
				$a_player = $a_players[ 5 ][$i];
				echo '<div style="display:block; float:left; width:140px; text-align:center; vertical-align:middle">';
				echo( '<a href="goalie.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strNumber . '">' );
				if( $a_player->bRookie == true ) { echo( '*' ); }
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:30px; text-align:left; vertical-align:middle"><img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$a_player->iCountry.'.png" border="0"/></div>';
				echo '<div style="display:block; float:left; width:50px; text-align:left; vertical-align:middle">AGE:'.$a_player->iAge.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iPO.'</div>';
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">OV:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			echo( "</td>" );
	
			// End of row
			echo( "</tr>" );
		}
		
	  ?>
      </tbody>
	</table>
	<br clear="all" />
    
	<?php
	$iMax = 0;
	
	if($totalRows_GetProspects > 0){
		// Now find the highest count for the forward positions to properly structure the grid
		$iMax = 0;
		if (array_key_exists('1',$a_prospects)){ if( count($a_prospects[1]) > $iMax ) { $iMax = count($a_prospects['1']); }}
		if (array_key_exists('2',$a_prospects)){ if( count($a_prospects[2]) > $iMax ) { $iMax = count($a_prospects['2']); }}
		if (array_key_exists('3',$a_prospects)){ if( count($a_prospects[3]) > $iMax ) { $iMax = count($a_prospects['3']); }}
	?>
	<h1><?php echo $l_Prospects ;?></h1>
	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
	  <tr>
	    <th colspan="3" colspan="3" align="center"><?php echo $l_forwards;?></th>
	  </tr>
	  <tr>
            <th width="33%"><?php echo $l_LeftWing;?></th>
            <th width="33%"><?php echo $l_Center;?></th>
            <th width="33%"><?php echo $l_RightWing;?></th>
	  </tr>
      </thead>
      <tbody>
	  <?php
	  $tmpRowColor="000000";
	  $tmpRowCount=0;
	  $tmpCount=0;
	  for( $i = 0; $i < $iMax; $i++ ) {
	  
		// Change row color
		if ($tmpRowCount==1){
		  $tmpRowColor="E9ECF3";
		  $tmpRowCount=0;
		}
		else {
		  $tmpRowColor="FFFFFF";
	      $tmpRowCount=1;
		}
		echo( '<tr bgcolor="#' . $tmpRowColor . '">');
	
		// Show left wings
		echo( "<td style='text-align:center;width:33%'>" );
		if (array_key_exists('2',$a_prospects)){
		if( count( $a_prospects[2] ) > $i )
		{
			$a_player = (object)$a_prospects[2][$i];
			echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
			echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';
		}
		else {
			echo( "&nbsp" );
		}
		}
		echo( "</td>" );
	
		// Show centers
		echo( "<td style='text-align:center;width:33%'>" );
		if (array_key_exists('1',$a_prospects)){
		if( count( $a_prospects[1] ) > $i )
		{
			$a_player = $a_prospects[1][$i];
			echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
			echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';
		}
		else {
			echo( "&nbsp" );
		}
		}
		echo( "</td>" );
	
		// Show right wings
		echo( "<td style='text-align:center;width:33%'>" );
		if (array_key_exists('3',$a_prospects)){
		if( count( $a_prospects[3] ) > $i )
		{
			$a_player = $a_prospects[3][$i];
			echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
			echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
			echo( $a_player->strName . '</a></div>');
			echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';	
		}
		else {
			echo( "&nbsp" );
		}
		}
		echo( $strTmp .= "</td>" );
	
		// End of row
		echo( "</tr>" );
	}

	?>
    </tbody>
	</table>
	<br clear="all" />
    
	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
	  <tr>
	    <th colspan="3"><?php echo $l_D_G;?></th>
	  </tr>
	  <tr>
				<th width="33%"><?php echo $l_Defence;?> 1</th>
				<th width="33%"><?php echo $l_Defence;?> 2</th>
				<th width="33%"><?php echo $l_Goalie;?></th>
	  </tr>
	  </thead>
      <tbody>
	  <?php
		// Show the defense players and goalies
		// First find the highest count for the defence players to properly structure the grid
		$iMax = 0;
		if (array_key_exists(4,$a_prospects) || array_key_exists(5,$a_prospects)){
		if( (count($a_prospects['4']) % 2) == 1 )
		{
			$iDefRows = floor((count($a_prospects[4]) / 2) + 1);
		}
		else
		{
			$iDefRows = floor((count($a_prospects[4]) / 2));
		}
		}
		if(isset($a_prospects['5']) && count($a_prospects['5']) > 0 )
		{
			$iDefRows = $iDefRows + count($a_prospects['5']);
		}
		
		if( $iDefRows > $iMax ) { $iMax = $iDefRows; }
		if (array_key_exists(4,$a_prospects) || array_key_exists(5,$a_prospects) ){;
		if( count($a_prospects[4]) + count($a_prospects[5]) > $iMax ) { $iMax = count($a_prospects[4]) + count($a_prospects[5]); }
		
		$tmpRowColor="000000";
		$tmpRowCount=0;
		$tmpCount=0;
	
		for( $i = 0; $i < $iMax; $i++ ) {
			// Change row color
			if ($tmpRowCount==1){
				$tmpRowColor="E9ECF3";
				$tmpRowCount=0;
			}
			else {
				$tmpRowColor="FFFFFF";
				$tmpRowCount=1;
			}
			
			echo( '<tr bgcolor="#' . $tmpRowColor . '">');
	
			// Show 1st D
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_prospects[4] ) > (2*$i) )
			{
				$a_player = (object)$a_prospects[4][2*$i];
				echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
				echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			echo( "</td>" );
	
			// Show 2nd D
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_prospects[4] ) > (2*$i)+1 )
			{
				$a_player = $a_prospects[4][(2*$i)+1];				
				echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
				echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			
			echo( $text .= "</td>" );
	
			// Show goalie
			echo( "<td style='text-align:center;width:33%'>" );
			if( count( $a_prospects[5] ) > $i )
			{
				$a_player = $a_prospects[5][$i];				
				echo '<div style="display:block; float:left; width:220px; text-align:center; vertical-align:middle; padding-left:40px;">';
				echo( '<a href="prospect.php?team=' . $_SESSION['current_Team_ID'] . '&player=' . $a_player->strName . '">' );
				echo( $a_player->strName . '</a></div>');
				echo '<div style="display:block; float:left; width:40px; text-align:left; vertical-align:middle">PO:'.$a_player->iOV.'</div>';
			}
			else {
				echo( "&nbsp" );
			}
			echo( "</td>" );
	
			// End of row
			echo( "</tr>" );
		}
		}
	  ?>
      </tbody>
	</table>
    <?php } ?>
	<br clear="all" />
    
	<h1><?php echo $l_draftpicks;?></h1>
	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
	  <tr>
        <th width="50"><?php echo $l_Year;?></th>
        <?php
            for( $i = 0; $i < $iRounds; $i++ ) 
            {
                echo ("<th>R" . ($i+1) . "</th>" );
            }
        ?>
	  </tr>
      </thead>
      <tbody>
	  <?php
	  $tmpRowCount=0;
	  $tmpRowColor="FFFFFF";	
			
	  // Now, display the picks for each year
	  for( $i = $iYear; $i < $iYear + $totalRows_GetSeasons; $i++ )
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
		echo( "<td align=center>" . ($i) . "</td>" );
		for( $j = 1; $j <= $iRounds; $j++ )
		{
			echo( "<td align=center>" );
		
			if( count( isset($a_Picks[$i][$j] )) == 0 ) {
				echo( "&nbsp" );
			}
			if (isset($a_Picks[$i][$j])){
			for( $k = 0; $k < count( $a_Picks[$i][$j] ); $k++ )
			{
				$pick = (object) $a_Picks[$i][$j][$k];
				echo( '<img src="image/logos/small/' . str_replace( "%20", " ", $pick->strTeam) . '" alt="' . $pick->strTeam . '">' );
			}
			}
			echo( "</td>" );
		}
		echo( "</tr>" );
	}
	?>
    </tbody>
	</table>
       
    <br clear="all" />
    
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
