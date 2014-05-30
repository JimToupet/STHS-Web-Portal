<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_Assets = "Assets";
	$l_Select  = "Select a team to trade with";
	$l_PageTitle = "Trade - Step 1/3";
	$l_Step = "Step";
	$l_FutureConsiderations="Future Considerations";
	$l_Note = "Check here if the GM of team agrees to this trade.";
	$l_Submit = "Next";
	break; 

case 'fr': 
	$l_PageTitle = "&Eacute;changese - Step 1/3";
	$l_FutureConsiderations="Futures considérations";
	$l_Step = "Step";
	$l_Assets = "Articles";
	$l_Select  = "Choisissez une &eacute;quipe";
	$l_Note = "Vérifiez ici si le GM est d'accord de ce commerce.";
	$l_Submit = "Prochaine";
	break;
} 

$GetTeamID = $_SESSION['U_ID'];


if($_SESSION['current_SeasonTypeID'] == 2){
$tmpSeason = $_SESSION['current_Season'] - 1;
} else {
$tmpSeason = $_SESSION['current_Season'];
}
$query_GetYear = sprintf("SELECT Year FROM draft WHERE Season_ID=%s ORDER BY D_ID ASC LIMIT 0,1",$tmpSeason);
$GetYear = mysql_query($query_GetYear, $connection) or die(mysql_error());
$row_GetYear = mysql_fetch_assoc($GetYear);
$totalRows_GetYear = mysql_num_rows($GetYear);
$tmpYear = 0;
if($totalRows_GetYear > 0){
	$tmpYear = $row_GetYear['Year'];
}

$query_GetTeamList = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number <> %s ORDER BY proteam.City",$_SESSION['U_ID']);
$GetTeamList = mysql_query($query_GetTeamList, $connection) or die(mysql_error());
$row_GetTeamList = mysql_fetch_assoc($GetTeamList);
$totalRows_GetTeamList = mysql_num_rows($GetTeamList);

$query_GetTeam1 = sprintf("SELECT Name, City, Number FROM proteam WHERE Number=%s", $_SESSION['U_ID']);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);

$query_GetRoster = sprintf("SELECT players.Name, players.Number, players.Contract FROM players WHERE players.Team='%s' AND (players.NoTrade='False' or players.NoTrade='Faux') UNION ALL SELECT goalies.Name, goalies.Number, goalies.Contract FROM goalies WHERE goalies.Team='%s' AND (goalies.NoTrade='False' or goalies.NoTrade='Faux') ORDER BY Name", $row_GetTeam1['Number'], $row_GetTeam1['Number']);
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetProspects = sprintf("SELECT prospects.* FROM prospects WHERE prospects.TeamNumber='%s' ORDER BY prospects.Name", $row_GetTeam1['Number']);
$GetProspects = mysql_query($query_GetProspects, $connection) or die(mysql_error());
$row_GetProspects = mysql_fetch_assoc($GetProspects);

$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year >=%s ORDER BY draftpicks.Year, draftpicks.Round", $row_GetTeam1['Number'], $tmpYear);
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);	
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
		<a href="team.php"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<form method="post" action="trade2.php">
		<fieldset><span class="graytitle"><?php echo $l_PageTitle;?></span>
		<ul class="pageitem">
			<li class="textbox"><br /><span class="header"><?php echo $row_GetTeam1['City']." ".$l_Assets; ?></span>
            <ul class="pageitem"> 
			<?php do { 
        		if ($row_GetRoster['Contract'] > 0){ 
			?>
        	<li class="checkbox"><span class="name"><?php echo $row_GetRoster['Name']; ?></span><input name="select4[]" type="checkbox" value="<?php echo $row_GetRoster['Name']; ?>" /></li> 
        	<?php 
            	}
        	} while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); 
			?>	
			<?php do { ?>
            	<li class="checkbox"><span class="name">Prospect: <?php echo $row_GetProspects['Name']; ?></span><input name="select4[]" type="checkbox" value="Prospect: <?php echo $row_GetProspects['Name']; ?>" /></li> 
        	<?php } while ($row_GetProspects = mysql_fetch_assoc($GetProspects)); ?>	
            <?php do { ?>
            	<li class="checkbox"><span class="name">Year <?php echo $row_GetDraftPicks['Year']." - Draft Pick: ".$row_GetDraftPicks['Abbre']." - Round ".$row_GetDraftPicks['Round']; ?></span><input name="select4[]" type="checkbox" value="Year <?php echo $row_GetDraftPicks['Year']." - Draft Pick: ".$row_GetDraftPicks['Abbre']." - Round ".$row_GetDraftPicks['Round']; ?>" /></li> 
            <?php } while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks)); ?>	
            
           
			<li class="textbox"><br /><span class="header"><?php echo $l_FutureConsiderations;?></span><textarea name="FutureConsiderations" rows="4"></textarea></li> 
                       
            <li class="select">
            <select name="TEAM2">
              <option value="0" selected="selected"><?php echo $l_Select;?></option>
				<?php do { ?>
                <option value="<?php echo $row_GetTeamList['Number']; ?>" <?php if ($tmpGM==$row_GetTeamList['Number']){ echo "selected"; }?>><?php echo $row_GetTeamList['City']." ".$row_GetTeamList['Name']." (".$row_GetTeamList['GM']; ?>)</option>
                <?php } while ($row_GetTeamList = mysql_fetch_assoc($GetTeamList)); ?>
              </select></li>
              
            <li class="checkbox"><span class="name"><?php echo $l_Note;?></span> <input name="TEAM1_CONFIRM[]" type="checkbox" value="True" /> </li> 
            
            </ul>  <br /> <br />
			
        <li class="button">
			<input type="hidden" name="TEAM1" value="<?php echo $GetTeamID;?>" />
			<input name="Submit input" type="submit" value="<?php echo $l_Submit;?>" /></li>
		</ul>
        
		</fieldset></form>
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
