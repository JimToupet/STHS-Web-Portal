<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>

<?php
if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

switch ($lang){ 
case 'en': 
	$l_LeagueFile = "League File";
	$l_Category = "Category";
	$l_LastUpload = "Last Upload";
	$l_XML = "XML and CSV Files";
	$l_UploadXML = "Upload&nbsp;XML";
	$l_UploadCSV = "Upload&nbsp;CSV";
	$l_UploadLeagueFile = "Upload&nbsp;League&nbsp;File";
	$l_Uploading = "Processing XML/CSV File(s)";
	$l_Auto = "Automated Import (Imports all files in the Files folder on the FTP server)";
	$l_Note = "Note: For this to work, all files must have been uploaded manually below at least once after you created and activated a new season.";
	$l_ImportFiles = "Import&nbsp;All&nbsp;Files";
	$l_Note_Send = "Click this button to e-mail game results, upcoming games and unread messages to the general managers.";
	$l_SendMail = "Send Game Reports";
	break; 
	
case 'fr': 	
	$l_LeagueFile = "Fichier de la Ligue";
	$l_Category = "Cat&eacute;gorie";
	$l_LastUpload = "Derni&egrave;re Mise &agrave; Jour";
	$l_XML = "Fichiers XML";
	$l_UploadXML = "Mettre&nbsp;&agrave;&nbsp;jour&nbsp;XML";
	$l_UploadCSV = "Mettre&nbsp;&agrave;&nbsp;jour&nbsp;CSV";
	$l_UploadLeagueFile = "Mettre&nbsp;&agrave;&nbsp;jour&nbsp;le&nbsp;fichier&nbsp;Ligue";
	$l_Uploading = "Mise &agrave; jour des fichiers";
	$l_Auto = "Importation automatis&eacute;e (importations tous les dossiers dans le dossier de dossiers sur le ftp server)";
	$l_Note = "Note : Pour que ceci travaille, tous les dossiers doivent avoir &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;s manuellement ci-dessous au moins par le pass&eacute; apr&egrave;s vous ont cr&eacute;&eacute; et ont activ&eacute; une nouvelle saison.";
	$l_ImportFiles = "Importez&nbsp;tout&nbsp;le&nbsp;XML/CSV";
	$l_Note_Send = "Cliquez sur ce bouton aux r&eacute;sultats de jeu d'email, aux jeux prochains et aux messages non lus aux directeurs g&eacute;n&eacute;raux.";
	$l_SendMail = "Envoyez les rapports de jeu";
	break; 
} 


$query_GetSeasonInfo = sprintf("SELECT * FROM config");
$GetSeasonInfo = mysql_query($query_GetSeasonInfo, $connection) or die(mysql_error());
$row_GetSeasonInfo = mysql_fetch_assoc($GetSeasonInfo);

$query_GetSeasonFiles = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
$GetSeasonFiles = mysql_query($query_GetSeasonFiles, $connection) or die(mysql_error());
$row_GetSeasonFiles = mysql_fetch_assoc($GetSeasonFiles);
$totalRows_GetSeasonFiles = mysql_num_rows($GetSeasonFiles);

if ($row_GetSeasonFiles['LeagueFile'] != "" && $row_GetSeasonFiles['ProTeams'] != "" && $row_GetSeasonFiles['Players'] != "" && $row_GetSeasonFiles['Goalies'] != "" && $row_GetSeasonFiles['Schedule'] != "" && $row_GetSeasonFiles['TodaysGames'] != "" && $row_GetSeasonFiles['Waivers'] != "" && $row_GetSeasonFiles['Coaches'] != "" && $row_GetSeasonFiles['Prospects'] != "" && $row_GetSeasonFiles['DraftPicks'] != ""   && $row_GetSeasonFiles['TeamHistory'] != "" && $row_GetSeasonFiles['Transactions'] != ""){
	$ServerImport = 1;	
} else {
	$ServerImport = 0;	
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_upload_files;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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

<script language=javascript type='text/javascript'> 
function hidediv() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideShow').style.visibility = 'hidden'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideShow.visibility = 'hidden'; 
} 
else { // IE 4 
document.all.hideShow.style.visibility = 'hidden'; 
} 
} 
} 
function showdiv() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideShow').style.visibility = 'visible'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideShow.visibility = 'visible'; 
} 
else { // IE 4 
document.all.hideShow.style.visibility = 'visible'; 
} 
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
#progress-bar, #upload-frame {
	display: none;
}
</style>

</head>
<body onLoad="hidediv()">
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
	<h1><?php echo $l_nav_upload_files;?></h1>
	
    <div id="hideShow" style="text-align:center; padding-top:190px; position:absolute; top:0px; left:0px; width:100%; height:100%;background: transparent; background-color:#CCCCCC; opacity: .9; filter:alpha(opacity=90); /* IE's opacity*/ ;">
    	<h3 align=center><?php echo $l_Uploading;?></h3><br>
        <div align=center><img src='<?php echo $_SESSION['DomainName']; ?>/image/common/progressbar.gif' width=245 height=16 border=0 /></div>
   	</div> 


<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
<thead>
<tr>
    <th><?php echo $l_Auto;?></th>
</tr>
</thead>
<tbody>
<tr>
    <form action="upload_league_file.php?action=1" method="post" onSubmit="showdiv()">
    <td align="center"><input type="submit" value="<?php echo $l_ImportFiles;?>" <?php if ($ServerImport == 0){ echo "disabled"; }?> >
	    <p><?php echo $l_Note;?></p>
    </td>
    </form>
</tr>
</tbody>
</table>
<br />

<h3><?php echo $l_LeagueFile;?></h3>
<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
<thead>
<tr>
    <th width="200"><strong><?php echo $l_Category;?></strong></th>
    <th width="100"><strong><?php echo $l_LastUpload;?></strong></th>
    <th width="250"><strong>File</strong></th>
	<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
    <td>League File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedLeagueFile']; ?></td>
    <td align="center"><a href="File/<?php echo $row_GetSeasonInfo['LeagueFile']; ?>" target="_blank"><?php echo $row_GetSeasonFiles['LeagueFile']; ?></a></td>
    <form action="upload_league_file.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="leagueFile">&nbsp;<input type="submit" value="<?php echo $l_UploadLeagueFile;?>"></td>
	</form>
</tr>
</tbody>
</table>
<br />

<?php
if ($totalRows_GetSeasonFiles > 0) {
?>
<h3 align="left"><?php echo $l_XML;?></h3>
<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
<thead>
<tr>
    <th width="110"><strong><?php echo $l_Category;?></strong></th>
    <th width="80"><strong>TYPE</strong></th>
    <th width="100"><strong><?php echo $l_LastUpload;?></strong></th>
    <th width="250"><strong>File</strong></th>
	<th>&nbsp;</th>
</tr>
</thead>
<tbody>
  <tr>
    <td><?php echo $l_nav_proteam; ?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedProTeams']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['ProTeams']; ?></td>
    <form action="import_csv_proteam.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <?php if($_SESSION['current_FarmLeague'] == "True"){?>
  <tr>
    <td><?php echo $l_nav_farmteam; ?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedFarmTeams']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['FarmTeams']; ?></td>
    <form action="import_csv_farmteam.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <?php } ?>
  <tr>
    <td nowrap><?php echo $l_nav_players;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedPlayers']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Players']; ?></td>
    <form action="import_csv_players.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
    <tr>
    <td nowrap><?php echo $l_Goalies;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedGoalies']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Goalies']; ?></td>
    <form action="import_csv_goalies.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <td>Pro <?php echo $l_nav_schedules;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedSchedule']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Schedule']; ?></td>
    <form action="import_csv_schedule.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <?php if($_SESSION['current_FarmLeague'] == "True"){?>
  <tr>
    <td>Farm <?php echo $l_nav_schedules;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedFarmSchedule']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['FarmSchedule']; ?></td>
    <form action="import_csv_farmschedule.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <?php } ?>
  <tr>
    <td>Todays Games</td>
    <td align="center">XML File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedTodaysGames']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['TodaysGames']; ?></td>
    <form action="import_todaysgame.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadXML;?>"></td>
	</form>
  </tr>
  <tr>
    <td><?php echo $l_nav_waiver_list;?></td>
    <td align="center">XML File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedWaivers']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Waivers']; ?></td>
    <form action="import_waivers.php" name="form1" id="form1" enctype='multipart/form-data' method="post"  onsubmit="showdiv()">
	<input type="hidden" name="type" value="waivers">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadXML;?>"></td>
	</form>
  </tr>
  <tr>
    <td><?php echo $l_nav_coaches;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedCoaches']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Coaches']; ?></td>
    <form action="import_csv_coaches.php" method="post" enctype="multipart/form-data" onSubmit="showdiv()">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <td><?php echo $l_nav_prospects;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedProspects']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Prospects']; ?></td>
    <form action="import_csv_prospects.php" name="form1" id="form1" enctype='multipart/form-data' method="post"  onsubmit="showdiv()">
	<input type="hidden" name="type" value="prospects">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <td><?php echo $l_nav_draft;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedDraftPicks']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['DraftPicks']; ?></td>
    <form action="import_csv_draftpicks.php" name="form1" id="form1" enctype='multipart/form-data' method="post"  onsubmit="showdiv()">
	<input type="hidden" name="type" value="draftpicks">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <td>GM <?php echo $l_nav_transactions;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedTeamHistory']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['TeamHistory']; ?></td>
    <form action="import_csv_teamhistory.php" name="form1" id="form1" enctype='multipart/form-data' method="post"  onsubmit="showdiv()">
	<input type="hidden" name="type" value="teamhistory">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <td><?php echo $l_nav_transactions;?></td>
    <td align="center">CSV File</td>
    <td align="center"><?php echo $row_GetSeasonInfo['LastModifiedTransactionHistory']; ?></td>
    <td align="center"><?php echo $row_GetSeasonFiles['Transactions']; ?></td>
    <form action="import_csv_transaction.php" name="form1" id="form1" enctype='multipart/form-data' method="post"  onsubmit="showdiv()">
	<input type="hidden" name="type" value="transactionhistory">
	<td align="right"><input type="file" name="xmlFile">&nbsp;<input type="submit" value="<?php echo $l_UploadCSV;?>"></td>
	</form>
  </tr>
  <tr>
    <form action="import_send.php" method="post" onSubmit="showdiv()">
    <td align="center" colspan="5"><input type="submit" value="<?php echo $l_SendMail;?>">
	    <p><?php echo $l_Note_Send;?></p>
    </td>
    </form>
</tr>
</tbody>
</table>
<?php 
} else {
	echo "<h3>XML Files from STHS</h3><p><b>To upload the XML data files to update the website, you mush first create a season.  You can do that by clicking on the seasons button in the ADMIN menu or <a href='seasons.php'>click here</a>.</b></p>";
}
?>

</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
