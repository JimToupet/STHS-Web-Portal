<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
putenv($_SESSION['current_TimeZone']);

switch ($lang){ 
case 'en': 
	$l_PageTitle = "Make a draft choice";
	$l_Submit  = "SUBMIT";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un draft";
	$l_Submit  = "POSTER";
	break;
} 

 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
$GetPickID = "0";
if (isset($_POST['id'])) {
  $GetPickID = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}
$GetDraftID = "0";
if (isset($_POST['draft'])) {
  $GetDraftID = (get_magic_quotes_gpc()) ? $_POST['draft'] : addslashes($_POST['draft']);
}
	
	$timeStamp = strtotime('now');
	$NewTime = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp));

   $updateSQL = sprintf("UPDATE draftpicks SET Name=%s, DateCreated=%s WHERE D_ID=%s",
		GetSQLValueString($_POST['sel1'], "text"),	
		GetSQLValueString($NewTime, "date"),
		GetSQLValueString($_POST['id'], "int"));
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	$query_GetDraftDetails = sprintf("SELECT * FROM draft WHERE D_ID=%s",$GetDraftID);
	$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
	$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);
	$totalRows_GetDraftDetails = mysql_num_rows($GetDraftDetails);

	if($_SESSION['total_teams'] == $_POST['overall']){
		$tmp_round = $_POST['round'] + 1;
		$tmp_overall = $_POST['overall'] + 1;
	} else {		
		$tmp_round = $_POST['round'];
		$tmp_overall = $_POST['overall'] + 1;
	}
	
	$query_GetRounds = sprintf("SELECT L.*, P.City, P.Name as TeamName, P.Number, P.EmailAlert, P.Email  FROM draftpicks as L, proteam as P WHERE L.Year=%s AND P.Number=L.OwnBy  AND L.Overall=%s AND L.Round=%s",$row_GetDraftDetails['Year'],$tmp_overall,$tmp_round);
	$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
	$row_GetRounds = mysql_fetch_assoc($GetRounds);
	$totalRows_GetRounds = mysql_num_rows($GetRounds);

	$timeStamp = strtotime('now');
	$NewTime = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp + (10*60)));
	
	$updateSQL = sprintf("UPDATE draftpicks SET DateCreated=%s WHERE D_ID=%s",
		GetSQLValueString($NewTime, "date"),
		GetSQLValueString($row_GetRounds['D_ID'], "int"));
  	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  
	if ($totalRows_GetRounds > 0){
		$query_GetLast10 = sprintf("SELECT Name FROM draftpicks WHERE Name <> '' Order By DateCreated desc limit 0,10");
		$GetLast10 = mysql_query($query_GetLast10, $connection) or die(mysql_error());
		$row_GetLast10 = mysql_fetch_assoc($GetLast10);
		$totalRows_GetLast10 = mysql_num_rows($GetLast10);

		do{
			$Playerlist = $Playerlist.'<li>'.$row_GetLast10['Name'].'</li>'; 
		} while ($row_GetLast10 = mysql_fetch_assoc($GetLast10)); 
		
		$MailSubject = $row_GetDraftDetails['DraftName']." - ".$row_GetRounds['City'].": round ".$tmp_round.", pick ".$tmp_overall;
		$MailMessage = '<p>It is now time to make your selection for the '.$row_GetDraftDetails['DraftName'].'.  You have '.$row_GetDraftDetails['DraftPickTime'].' minutes to log onto the site and make your selection.  If you fail to make your selection within '.$row_GetDraftDetails['DraftPickTime'].' minutes, the site will give you the top rated player on either the list you already created or the top rated player overall.</p><ul>'.$Playerlist.'</ul><p><a href="'.$_SESSION['DomainName'].'/entry_draft.php" target=_blank>Go make my pick now</a></p>';		
		if ($row_GetRounds['EmailAlert']==1){
			sendMail($row_GetRounds['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
		}		
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
		$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(addslashes($MailMessage), "text"),
							GetSQLValueString($row_GetRounds['OwnBy'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
		$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
	}
	
	$updateGoTo = "entry_draft.php";
 	header(sprintf("Location: %s", $updateGoTo));
}

$GetPickID = "0";
if (isset($_GET['id'])) {
  $GetPickID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$GetDraftID = "0";
if (isset($_GET['draft'])) {
  $GetDraftID = (get_magic_quotes_gpc()) ? $_GET['draft'] : addslashes($_GET['draft']);
}

$query_GetDraftDetails = sprintf("SELECT * FROM draft WHERE D_ID=%s",$GetDraftID);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);

$query_GetDraftList = sprintf("SELECT * FROM draftpicks WHERE D_ID=%s",$GetPickID);
$GetDraftList = mysql_query($query_GetDraftList, $connection) or die(mysql_error());
$row_GetDraftList = mysql_fetch_assoc($GetDraftList);


$query_GetRoster = sprintf("SELECT Name, ProspectGrade, ProspectLevel FROM prospects WHERE (TeamNumber = '' OR TeamNumber = 0) AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY ProspectGrade desc,ProspectLevel asc, Name", $row_GetDraftDetails['Year']);

$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);
$totalRows_GetRoster = mysql_num_rows($GetRoster);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_PageTitle;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
.fieldsetright {display:display:block; float:left; width:450px; margin:0px 8px 0px 8px;}
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
     <h1><?php echo $l_PageTitle;?></h1>
	<br>
<div class="fieldsetright">
<form action="<?php echo $editFormAction; ?>" method="post" name="form" id="form">
<input type="hidden" name="id" value="<?php echo $GetPickID; ?>" />
<input type="hidden" name="draft" value="<?php echo $GetDraftID; ?>" />
<input type="hidden" name="round" value="<?php echo $row_GetDraftList['Round']; ?>" />
<input type="hidden" name="overall" value="<?php echo $row_GetDraftList['Overall']; ?>" />
<input type="hidden" name="year" value="<?php echo $row_GetDraftDetails['Year']; ?>" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th>Select your player</th>
</tr>
</thead>
<tbody>
<tr>
  <td width="50%" valign="top">
	<select name="sel1" size="10" id="sel1" style="width:400px;"> 
		<?php 
		do { 
			echo '<option value="'.$row_GetRoster['Name'].'">'.$row_GetRoster['Name'].' - '.$row_GetRoster['ProspectGrade'].$row_GetRoster['ProspectLevel'].'</option>';
		} while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); 
		?>	
		</select>
		</td>
</tr>
<tr>
   <td align="center"><input type="submit" value="<?php echo $l_Submit;?>"></td>
</tr>	
</tbody>
</table>
<input type="hidden" name="MM_insert" value="form1">
</form>
</div>


<div class="fieldsetright">
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th colspan="2">Next Best Available</th>
</tr>
</thead>
<tbody>
<form action="nba_draftpick.php" method="post" name="form" id="form">
<input type="hidden" name="id" value="<?php echo $GetPickID; ?>" />
<input type="hidden" name="draft" value="<?php echo $GetDraftID; ?>" />
<input type="hidden" name="round" value="<?php echo $row_GetDraftList['Round']; ?>" />
<input type="hidden" name="overall" value="<?php echo $row_GetDraftList['Overall']; ?>" />
<input type="hidden" name="year" value="<?php echo $row_GetDraftDetails['Year']; ?>" />
    <tr>
    	<td>Position:</td>
        <td><select name="position">
        	<option value="0" selected="selected">All</option>
            <option value="1">Center</option>
            <option value="2">Leftwing</option>
            <option value="3">Rightwing</option>
            <option value="4">Defense</option>
            <option value="5">Goalie</option>
			</select>
          </td>
     </tr>      
	<tr>
   		<td colspan="2" align="center"><input type="submit" value="<?php echo $l_Submit;?>"></td>
	</tr>
</table>
</div>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
