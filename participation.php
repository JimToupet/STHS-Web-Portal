<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Change = "CHANGE SEASON";
	$l_TotalScore = "Total Score";
	$l_UploadLines = "Upload Lines";
	$l_Transactions = "Transactions";
	$l_Articles = "Articles";
	$l_Emails = "Emails";
	$l_Bonus = "Bonus";
	$l_Standings = "Standings Points";
	break; 

case 'fr': 
	$l_Change = "Changer de saison";
	$l_TotalScore = "Points totaux";
	$l_UploadLines = "Envoyer trios";
	$l_Transactions = "Transactions";
	$l_Articles = "Articles";
	$l_Emails = "Courriels";
	$l_Bonus = "Suppl&eacute;mentaire";
	$l_Standings = "Classement";
	break; 
} 

$season_id = 0;
if (isset($_POST['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $season_id = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}
if ($season_id == ""){ 
	$season_id = $_SESSION['current_SeasonID'];
}


$query_GetTeams = sprintf("SELECT proteam.City, proteam.Name, proteam.Number FROM proteam ORDER BY proteam.City");
$GetTeams = mysql_query($query_GetTeams, $connection) or die(mysql_error());
$row_GetTeams = mysql_fetch_assoc($GetTeams);

$query_GetSeasonInfo = sprintf("SELECT * FROM seasons where S_ID=%s", $season_id);
$GetSeasonInfo = mysql_query($query_GetSeasonInfo, $connection) or die(mysql_error());
$row_GetSeasonInfo = mysql_fetch_assoc($GetSeasonInfo);

$query_GetSeasonsList = sprintf("SELECT * FROM seasons");
$GetSeasonsList = mysql_query($query_GetSeasonsList, $connection) or die(mysql_error());
$row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_participation;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_participation;?></h1></div>

<div style="float:right; padding-top:5px;">
<form action="participation.php" method="post" name="form1">
<select name="season_id" id="season_id">
<?php do { 
if ($row_GetSeasonsList['SeasonType'] == 2){
	$SeasonType = $l_preseason;
} else if ($row_GetSeasonsList['SeasonType'] == 1){
	$SeasonType = $l_regularseason;
} else if ($row_GetSeasonsList['SeasonType'] == 0){
	$SeasonType = $l_playoffs;
} 
echo '<option value="'.$row_GetSeasonsList['S_ID'].'"'; 
if ($season_id == $row_GetSeasonsList['S_ID']){ echo "selected"; } 
echo '>'.$row_GetSeasonsList['Season'].' '.$SeasonType.'</option>';
} while ($row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList)); ?>
</select> <input type="submit" value="<?php echo $l_Change;?>"  class="button" />
</form>
</div>
<br clear="all"/>
    
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead> 
  <tr>
    <th><?php echo $l_nav_team;?></th>
    <th><strong><?php echo $l_TotalScore;?></strong></th>
    <th><?php echo $l_UploadLines;?></th>
    <th><?php echo $l_Transactions;?></th>
    <th><?php echo $l_Articles;?></th>
    <th><?php echo $l_Emails;?></th>
    <th><?php echo $l_Bonus;?></th>
    <th><?php echo $l_Standings;?></th>
</tr>
</thead>
<tbody>
<?php do { 

$query_GetParticipationUpload = sprintf("SELECT COUNT(T_ID) as TotalUpload FROM participation WHERE Type='Upload' AND Season_ID=%s AND Team='%s'", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Name']);
$GetParticipationUpload = mysql_query($query_GetParticipationUpload, $connection) or die(mysql_error());
$row_GetParticipationUpload = mysql_fetch_assoc($GetParticipationUpload);

$query_GetParticipationTransactions = sprintf("SELECT COUNT(T_ID) as TotalTransactions FROM participation WHERE Type='Transactions' AND Season_ID=%s AND Team='%s'", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Name']);
$GetParticipationTransactions = mysql_query($query_GetParticipationTransactions, $connection) or die(mysql_error());
$row_GetParticipationTransactions = mysql_fetch_assoc($GetParticipationTransactions);

$query_GetParticipationEmail = sprintf("SELECT COUNT(T_ID) as TotalEmail FROM participation WHERE Type='Email' AND Season_ID=%s AND Team='%s'", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Name']);
$GetParticipationEmail = mysql_query($query_GetParticipationEmail, $connection) or die(mysql_error());
$row_GetParticipationEmail = mysql_fetch_assoc($GetParticipationEmail);

$query_GetParticipationArticle = sprintf("SELECT COUNT(T_ID) as TotalArticle FROM participation WHERE Type='Article' AND Season_ID=%s AND Team='%s'", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Name']);
$GetParticipationArticle = mysql_query($query_GetParticipationArticle, $connection) or die(mysql_error());
$row_GetParticipationArticle = mysql_fetch_assoc($GetParticipationArticle);

$query_GetParticipationBonus = sprintf("SELECT COUNT(T_ID) as TotalBonus FROM participation WHERE Type='Bonus' AND Season_ID=%s AND Team='%s'", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Name']);
$GetParticipationBonus = mysql_query($query_GetParticipationBonus, $connection) or die(mysql_error());
$row_GetParticipationBonus = mysql_fetch_assoc($GetParticipationBonus);

$query_GetStandings = sprintf("SELECT Point FROM proteamstandings WHERE Season_ID=%s AND Number=%s", $row_GetSeasonInfo['S_ID'], $row_GetTeams['Number']);
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);

?>
		  <tr>
			<td><?php echo $row_GetTeams['City']." ".$row_GetTeams['Name']; ?></td>
			<td align="center"><strong>
			<?php 
				$TotalPoints =  $row_GetParticipationUpload['TotalUpload'] + $row_GetParticipationTransactions['TotalTransactions'] + $row_GetParticipationArticle['TotalArticle'] + $row_GetParticipationEmail['TotalEmail'] + $row_GetParticipationBonus['TotalBonus'] + ($row_GetStandings['Point']/2);
				echo number_format($TotalPoints,0);
			?>
            </strong></td>
            <td align="center" ><?php echo $row_GetParticipationUpload['TotalUpload']; ?></td>
			<td align="center" ><?php echo $row_GetParticipationTransactions['TotalTransactions']; ?></td>
			<td align="center" ><?php echo $row_GetParticipationArticle['TotalArticle']; ?></td>
			<td align="center" ><?php echo $row_GetParticipationEmail['TotalEmail']; ?></td>
			<td align="center" ><?php echo $row_GetParticipationBonus['TotalBonus']; ?></td>
			<td align="center" ><?php echo number_format($row_GetStandings['Point']/2,0); ?></td>
		</tr>
<?php 
	mysql_free_result($GetParticipationUpload);
	mysql_free_result($GetParticipationTransactions);
	mysql_free_result($GetParticipationArticle);
	mysql_free_result($GetParticipationEmail);
	mysql_free_result($GetParticipationBonus);
	mysql_free_result($GetStandings);
} while ($row_GetTeams = mysql_fetch_assoc($GetTeams)); ?>
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
