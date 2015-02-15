<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Award = "Award";
	$l_Year = "Year";
	$l_AddPreSeason = "Create Next Years Pre-Season";
	$l_AddRegularSeason = "Create Regular Season";
	$l_AddPostSeason = "Create Playoffs";
	$l_activate_season = "Activate Season";
	$l_activated = "Activated";
	$l_instruction_chk = "Check this checkbox if you wish to finish the ";
	$l_instruction_yes = "Yes, I want to create the ";
	$l_Must = "You must activate you last created season in order to create any further seasons.";
	$l_Check0 = "<p>Check this checkbox if you wish to finish the playoffs <Br />and you wish to create the <strong>Pre-Season</strong> for next year. </p>";
	$l_Check1 = "<p>Check this checkbox if you wish to finish the regular season<br />and you wish to create the  <strong>Playoffs</strong>. </p>";
	$l_Check2 = "<p>Check this checkbox if you wish to finish the pre-season <br />and you wish to create the  <strong>Regular Season</strong>.</p>";
	$l_Install = '<p>You have yet to install a season for this hockey simulator website. <Br />Please verify the year you wish to have and click "Create Pre=season".</p>';
	$l_STHSYear = "STHS Generated Year";
	break; 
	
case 'fr': 	
	$l_Award = "Troph&eacute;e";
	$l_Year = "Ann&eacute;e";
	$l_AddPreSeason = "Ajoutez Pr&eacute;-saison";
	$l_AddRegularSeason = "Ajoutez Saison R&eacute;guli&egrave;re";
	$l_AddPostSeason = "Ajoutez S&eacute;ries &eacute;liminatoires";
	$l_activate_season = "Activ&eacute; la saison";
	$l_activated = "Activ&eacute;";
	$l_instruction_chk = "Cliquer cette case si vous voulez finir la ";
	$l_instruction_yes = "Oui, je veux cr&eacute;er la ";
	$l_Must = "Vous devez vous activer avez pour la derni&egrave;re fois cr&eacute;&eacute; la saison afin de cr&eacute;er toute autre saison.";
	$l_Check0 = "<p>Cliquer cette case si vous voulez finir la  s&eacute;ries &eacute;liminatoires <Br />et vous voulez cr&eacute;er <strong>pr&eacute;-saison</strong> pour l'ann&eacute;e prochaine. </p>";
	$l_Check1 = "<p>Cliquer cette case si vous voulez finir la  saison r&eacute;guli&egrave;re<br />et vous voulez cr&eacute;er  <strong>s&eacute;ries &eacute;liminatoires</strong>. </p>";
	$l_Check2 = "<p>Cliquer cette case si vous voulez finir la  pr&eacute;-saison <br />et vous voulez cr&eacute;er <strong>saison r&eacute;guli&egrave;re</strong>.</p>";
	$l_Install = "<p>Vous avez installer encore une saison pour ce site Web de simulateur. <Br />Veuillez v&eacute;rifier l'ann&eacute;e o&agrave;¹ vous souhaitez avoir et <strong>pr&eacute;-saison</strong></p>";
	$l_STHSYear = "Ann&eacute;e G&eacute;n&eacute;rer par la STHS";
	break; 
} 

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && $_POST['action'] == "update") {
	
	$tmpYear = $_POST['YEAR'];
	
	if(isset($_POST['AdjustYear'])){
		if($_POST['AdjustYear'] == 1){
			$tmpYear = $_POST['YEAR'] + 1;
		}
	}
	
  if(isset($_POST['CreateNextSeason'])){
  	if ($_POST['CreateNextSeason'] == 2 && $_POST['AdjustYear'] == 1){
		$NewSeason = $tmpYear."-PreSeason";
		$NewSeasonName = $tmpYear;
		
		if (!mkdir("File/".$NewSeason, 0777, true)) {
			die("Failed to create folders..../File/".$NewSeason);
		}
		else {		
			$insertSQL = sprintf("insert into seasons (Season, SeasonType, Active, Folder) values (%s, %s, 0, %s)",
						GetSQLValueString($tmpYear, "text"),
						GetSQLValueString($_POST['CreateNextSeason'], "int"),
						GetSQLValueString($NewSeason, "text"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		}
		
	} else if ($_POST['CreateNextSeason'] == 1){
		$NewSeason = $tmpYear."-RegularSeason";
		
		if (!mkdir("File/".$NewSeason, 0777, true)) {
			die("Failed to create folders..../File/".$NewSeason);
		}
		else {		
			$insertSQL = sprintf("insert into seasons (Season, SeasonType, Active, Folder) values (%s, %s, 0, %s)",
						GetSQLValueString($tmpYear, "text"),
						GetSQLValueString($_POST['CreateNextSeason'], "int"),
						GetSQLValueString($NewSeason, "text"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		}
		
	} else if ($_POST['CreateNextSeason'] == 0){
		$NewSeason = $tmpYear."-Playoffs";
		
		if (!mkdir("File/".$NewSeason, 0777, true)) {
			die("Failed to create folders..../File/".$NewSeason);
		}
		else {		
			$insertSQL = sprintf("insert into seasons (Season, SeasonType, Active, Folder) values (%s, %s, 0, %s)",
						GetSQLValueString($tmpYear, "text"),
						GetSQLValueString($_POST['CreateNextSeason'], "int"),
						GetSQLValueString($NewSeason, "text"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
						
			$insertSQL = sprintf("INSERT INTO trophywinners (Season_ID,Team) values (%s,0)",
					   	GetSQLValueString($tmpYear, "int"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
			foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
				$insertSQL = sprintf("INSERT INTO trophywinners (Season_ID,Team) values (%s,%s)",
					   	GetSQLValueString($tmpYear, "int"),
						GetSQLValueString($_SESSION['MenuTeamsID'][$TeamPage], "int"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
				
				$MailSubject = $_SESSION['SiteName']." end of Regular Season and Team Awards";
				$MailMessage = '<p>It is the end of the regular season and it is now time for you to select the winners of your team awards.  The winners of your team awards will then be a canidate to win the league award in the same category.</p><div align="center"><a href="'.$_SESSION['DomainName'].'/pro_team_awards.php?team='.$_SESSION['MenuTeamsID'][$TeamPage].'">Login and select your team Awards</div>';
				$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
				$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString($_SESSION['MenuTeamsID'][$TeamPage], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
							
  						$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
			}
		}
  
	} else if ($_POST['CreateNextSeason'] == 2){
		$NewSeason = $tmpYear."-PreSeason - here";	
		
		if (!mkdir("File/".$NewSeason, 0777, true)) {
			die("Failed to create folders..../File/".$NewSeason);
		}
		else {		
		
			$insertSQL = sprintf("insert into seasons (Season, SeasonType, Active, Folder) values (%s, 2, 0, %s)",
						GetSQLValueString($tmpYear, "text"),
						GetSQLValueString($NewSeason, "text"));
						$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		}
	}
  
  }
  $updateGoTo = "seasons.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
} else if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && $_POST['action'] == "create") {
	
	if (!mkdir("File/".$tmpYear."-PreSeason", 0700, true)) {
			die("Failed to create folders..../File/".$NewSeason);
		}
	else {		
	
		$insertSQL = sprintf("insert into seasons (Season, SeasonType, Active) values (%s, 0, 1)",
                        GetSQLValueString($tmpYear, "text"));
		$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		$updateGoTo = "seasons.php";
	
		if (isset($_SERVER['QUERY_STRING'])) {
			$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
			$updateGoTo .= $_SERVER['QUERY_STRING'];
		}
		header(sprintf("Location: %s", $updateGoTo));
	}
}


$query_GetSeasonDetails = sprintf("SELECT * FROM seasons");
$GetSeasonDetails = mysql_query($query_GetSeasonDetails, $connection) or die(mysql_error());
$row_GetSeasonDetails = mysql_fetch_assoc($GetSeasonDetails);
$totalRows_GetSeasonDetails = mysql_num_rows($GetSeasonDetails);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_seasons;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_seasons;?></h1>
    
<?php if ($totalRows_GetSeasonDetails > 0) { ?>
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
	<th><?php echo $l_Year;?></th>
	<th>Type</th>
	<th><?php echo $l_STHSYear;?></th>
	<th>Active</th>
</tr>
</thead>
<tbody>
<?php 
$tmpType = 0;
$tmpYear = "2010";
$tmpRowCount = 0;
do {
$tmpRowCount=$tmpRowCount+1;
$tmpLastYear = $row_GetSeasonDetails['S_ID'];
$query_GetDraftPicks = sprintf("SELECT * FROM draft WHERE Season_ID=%s",($row_GetSeasonDetails['Season']-1));
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$totalRows_GetDraftPicks = mysql_num_rows($GetDraftPicks);
?>
<tr>
	<td align="center"><?php echo $row_GetSeasonDetails['Season']; ?></td>
	<td align="center"><?php 
		if ($row_GetSeasonDetails['SeasonType']==2){
			echo $l_preseason;
		} else if ($row_GetSeasonDetails['SeasonType']==1){
			echo $l_regularseason;
		} else if ($row_GetSeasonDetails['SeasonType']==0){
			echo $l_playoffs;
		} 
		?>
    </td>
    <td align="center"><?php 
	if($row_GetSeasonDetails['SeasonType']==2){
	if($totalRows_GetDraftPicks > 0){
	do { 
		echo '<a href="edit_draft.php?id='.$row_GetDraftPicks['D_ID'].'">'.$row_GetDraftPicks['DraftName'].'</a> ';
	} while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks));
	} else {
		if($tmpRowCount > 1){ echo '<a href="add_draft.php">'.$l_Add.'</a> ';}
	}
	}
	?>
    </td>
	<td align="center"><?php 
		if ($row_GetSeasonDetails['Active'] == 1){
		 	echo $l_activated; 
			$tmpType = $row_GetSeasonDetails['SeasonType'];
			$tmpYear = $row_GetSeasonDetails['Season'];
		} else {
		 	echo "<a href='season_active.php?id=".$row_GetSeasonDetails['S_ID']."'>".$l_activate_season."</a>";
		}
		?>
     </td>
</tr>
<?php } while ($row_GetSeasonDetails = mysql_fetch_assoc($GetSeasonDetails)); ?>
</tbody>
</table>

<form method="post" name="form1"  action="<?php echo $editFormAction; ?>">
<?php 
if ($tmpLastYear != $_SESSION['current_SeasonID']){
	echo "<strong>".$l_Must."</strong>";
} else {
?>
	<?php if ($tmpType=="0" ){?>
       	<?php echo $l_Check0;?>
        <input type="checkbox" name="CreateNextSeason" value="2" /> 
        <br /><?php echo $l_instruction_yes." ".$l_preseason;?>
        <br><br><input type="submit" value="<?php echo $l_AddPreSeason;?>">
        <input type="hidden" name="AdjustYear" value="1">
    
    <?php } else if ($tmpType=="1" ) { ?>
        <?php echo $l_Check1;?>
        <input type="checkbox" name="CreateNextSeason" value="0" /> 
        <br /><?php echo $l_instruction_yes." ".$l_playoffs;?>
        <br><br><input type="submit" value="<?php echo $l_AddPostSeason;?>">
   		<input type="hidden" name="AdjustYear" value="0">
        
    <?php } else if ($tmpType=="2" ) { ?>
       <?php echo $l_Check2;?>
        <input type="checkbox" name="CreateNextSeason" value="1" />  
        <br /><?php echo $l_instruction_yes." ".$l_regularseason;?>
        <br><br><input type="submit" value="<?php echo $l_AddRegularSeason;?>">
    	<input type="hidden" name="AdjustYear" value="0">
    <?php } ?>

    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="YEAR" value="<?php echo $tmpYear; ?>">
    </form>
<?php
} 
} else { 
$tmpYear = strftime('%Y', strtotime('now'));
?>
    <form method="post" name="form1"  action="<?php echo $editFormAction; ?>">
    <?php echo $l_Install;?>

<div class="rowElem">
<label for="HEADLINE"><?php echo $l_Year;?> :</label><input type="text" name="YEAR" maxlength="4" size="4" value="<?php echo $tmpYear; ?>" />
    <input type="submit" value="<?php echo $l_AddPreSeason;?>"></div>
    <input type="hidden" name="CreateNextSeason" value="2" />
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="AdjustYear" value="0">
    <input type="hidden" name="action" value="update">
    </form>
<?php } ?>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
