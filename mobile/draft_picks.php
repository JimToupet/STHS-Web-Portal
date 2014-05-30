<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_Year = "Year";
	$l_draftpicks = "Draft Picks";
	$l_Year = "Year";
	$l_Round = "Round";
	break; 

case 'fr': 
	$l_Year = "Ann&eacute;e";
	$l_draftpicks = "Choix au rep&ecirc;chage";
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


$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre, proteam.LogoTiny FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s ORDER BY draftpicks.Year, draftpicks.Round", $_SESSION['current_Team_ID']);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$totalRows_GetDraftPicks = mysql_num_rows($GetDraftPicks);

$query_GetSeasons = sprintf("SELECT * FROM draftpicks group by Year Order By Year");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$totalRows_GetSeasons = mysql_num_rows($GetSeasons);


// Draft picks!
$iRounds = 8;
$iYear = $row_GetSeasons[ 'Year' ];

// Select the picks and sort them in a way that will make them easier to display
do {
	$pick = new draft_pick;
	$pick->iYearIdx = $row_GetDraftPicks['Year'];
	$pick->iRound = $row_GetDraftPicks['Round'];
	$pick->strPickOwner = $row_GetDraftPicks['OwnBy'];
	$pick->strTeam = $row_GetDraftPicks['Abbre'];
	$a_Picks[$row_GetDraftPicks['Year']][$row_GetDraftPicks['Round']][] = (object)$pick;
} while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks));
 
$query_GetRounds = sprintf("SELECT * FROM draft ORDER BY Year desc");
$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
$row_GetRounds = mysql_fetch_assoc($GetRounds);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['TouchIcon'];?>" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $_SESSION['SiteName'] ; ?></title>
<meta content="STHS Web Portal" name="keywords" />
</head>

<body>

<div id="topbar">
	<div id="title"><?php echo $_SESSION['current_City']." ".$_SESSION['current_Team'];?></div>
	<div id="leftnav">
		<a href="team.php?team=<?php echo $_SESSION['current_Team_ID']; ?>"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<span class="graytitle"><?php echo $l_nav_draft; ?></span>
	<ul class="pageitem">
		<?php
		for( $i = $iYear; $i < $iYear + $totalRows_GetSeasons; $i++ )
	 	 {
			echo '<li class="menu"><span class="name">'.(($_SESSION['current_Season']-1) + $i)." - ";
			for( $j = 1; $j <= $iRounds; $j++ )
			{
			
				for( $k = 0; $k < count( $a_Picks[$i][$j] ); $k++ )
				{
					$pick = (object) $a_Picks[$i][$j][$k];
					echo $pick->strTeam.' '.$pick->iRound;
					echo ", ";
				}
			}
			echo '</li></span>';
		 }
		?>
	</ul>
</div>

<div id="footer">
	<a class="noeffect" href="http://www.simhl.net"><?php echo $l_footer_2; ?> STHS WEB PORTAL</a>
	&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php
    $currentFile = $_SERVER["SCRIPT_NAME"]; 
    $parts = Explode('/', $currentFile); 
    $currentFile = $parts[count($parts) - 1]; 
    if($lang=='en'){
        echo '<a class="noeffect"href="langswitch.php?lang=fr&prevpage='.$currentFile.'">Fran&ccedil;ais</a>';
    } else {
        echo '<a class="noeffect"href="langswitch.php?lang=en&prevpage='.$currentFile.'">English</a>';
    }
    ?>
</div>

</body>

</html>
