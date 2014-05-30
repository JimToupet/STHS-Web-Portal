<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_RemoveNote = "Remove all draft picks";
	$l_Year = "Year";
	$l_Alert1 = "Are you sure you want to remove these draft picks?  This cannot be undone!";
	$l_Note = "To remove draft picks from the website, click 'Remove all draft picks' link for the year below.";
	break; 
	
case 'fr': 	
	$l_RemoveNote = "Remove all draft picks";
	$l_Year = "Ann&eacute;e";
	$l_Alert1 = "&agrave;^tes-vous sur que vous voulez &eacute;ffacer cette choix au Rep&ecirc;chage?";
	$l_Note = "To remove draft picks from the website, click 'Remove all draft picks' link for the year below.";
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$query_GetDraftPicks = sprintf("SELECT DraftPicks FROM config");
	$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
	$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
	
	for ( $counter = 1; $counter <= $row_GetDraftPicks['DraftPicks']; $counter += 1) {
		$query_GetTeams = sprintf("SELECT Name FROM proteam ORDER BY Name");
		$GetTeams = mysql_query($query_GetTeams, $connection) or die(mysql_error());
		$row_GetTeams = mysql_fetch_assoc($GetTeams);
	
		do {
  		$insertSQL = sprintf("insert into draftpicks (Year, TeamName, Round, OwnBy) values (%s, %s, %s, %s)",
				GetSQLValueString($_POST['YEAR'], "int"),
				GetSQLValueString($row_GetTeams['Name'], "text"),
				GetSQLValueString($counter, "int"),
				GetSQLValueString($row_GetTeams['Name'], "text"));
  		$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		} while ($row_GetTeams = mysql_fetch_assoc($GetTeams));
		mysql_free_result($GetTeams);
	}	
	
	mysql_free_result($GetDraftPicks);
	
  $updateGoTo = "draft-picks.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
   header(sprintf("Location: %s", $updateGoTo));
}

$query_GetDraftPicks = sprintf("SELECT Year FROM draftpicks group by Year");
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);
$totalRows_GetDraftPicks = mysql_num_rows($GetDraftPicks);
$query_GetTeams = sprintf("SELECT proteam.City, proteam.Name FROM proteam ORDER BY proteam.City");
$GetTeams = mysql_query($query_GetTeams, $connection) or die(mysql_error());
$row_GetTeams = mysql_fetch_assoc($GetTeams);
$query_GetTeams2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam ORDER BY proteam.City");
$GetTeams2 = mysql_query($query_GetTeams2, $connection) or die(mysql_error());
$row_GetTeams2 = mysql_fetch_assoc($GetTeams2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_draft_picks;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_draft_picks;?></h1>
<p><?php echo $l_Note;?></p>
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
	<th><?php echo $l_Year;?></th>
	<th width="180" align="right"><a ><?php echo $l_Remove;?></a></th>
</tr>
</thead>
<tbody>
<?php 
$tmpLastSeason=2;
do { 
$tmpLastSeason=$row_GetDraftPicks['Year'];
?>
<tr>
	<td align="center">Year <?php echo $row_GetDraftPicks['Year']; ?></td>
	<td align="center"><a href="javascript:confirmDelete('remove_draftpicks.php?year=<?php echo $row_GetDraftPicks['Year']; ?>')"><?php echo $l_RemoveNote;?></a></td>
</tr>
<?php } while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks)); ?>	
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
