<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Make Selection";
	$l_Title  = "DRAFT TITLE";
	$l_Submit  = "SUBMIT";
	$l_DraftList = "List (Order from highest to lowest)";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un draft";
	$l_Submit  = "POSTER";
	$l_DraftList = "Liste (Ordre du plus haut au plus bas)";
	break;
} 

 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
   $updateSQL = sprintf("UPDATE draftpicks SET DraftList=%s WHERE D_ID=%s",
		GetSQLValueString($_POST['teamlist'], "text"),	
		GetSQLValueString($_POST['id'], "int"));
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

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
$GetYear = "0";
if (isset($_GET['year'])) {
  $GetYear = (get_magic_quotes_gpc()) ? $_GET['year'] : addslashes($_GET['year']);
}


$query_GetDraftDetails = sprintf("SELECT * FROM draft WHERE D_ID=%s",$GetDraftID);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);

$query_GetDraftList = sprintf("SELECT DraftList FROM draftpicks WHERE D_ID=%s",$GetPickID);
$GetDraftList = mysql_query($query_GetDraftList, $connection) or die(mysql_error());
$row_GetDraftList = mysql_fetch_assoc($GetDraftList);

$query_GetRoster = sprintf("SELECT Name, ProspectGrade, ProspectLevel FROM prospects WHERE (TeamNumber = '' OR TeamNumber = 0) AND Name NOT IN (SELECT Name FROM draftpicks WHERE Year=%s AND Name <> '') ORDER BY ProspectGrade desc,ProspectLevel asc, Name", $GetYear);

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
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css"><link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/datePicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/date.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/date.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.bgiframe.min.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  
  $('#add').click(function() {
    return !$('#select1 option:selected').remove().appendTo('#select2');
   });
   $('#remove').click(function() {
    return !$('#select2 option:selected').remove().appendTo('#select1');
   });
   
 $('form').submit(function() {
	 $('#select2 option').each(function(i) {
	  $(this).attr("selected", "selected");
	 });
	 var str1 = "";
	 $("#select2 option:selected").each(function () {
		str1 += $(this).val() + ",";
	  });
	 $('#teamlist').val(str1);
 });

});
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

<h1><?php echo $l_PageTitle;?></h1>
<br />
<form action="<?php echo $editFormAction; ?>" method="post" name="form" id="form">
<input type="hidden" name="id" value="<?php echo $GetPickID; ?>" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th><?php echo $l_nav_players;?></th>
    <th><?php echo $l_DraftList;?></th>
</tr>
</thead>
<tbody>
<tr>
	<td>
        <select name="select1" size="10" multiple id="select1" style="width:460px; height:400px;"> 
        <?php
        	do { 
				if(stristr($row_GetDraftList['DraftList'], $row_GetRoster['Name']) == FALSE) { 
					echo '<option value="'.$row_GetRoster['Name'].'">'.$row_GetRoster['Name'].' - '.$row_GetRoster['ProspectGrade'].$row_GetRoster['ProspectLevel'].'</option>';
				}
			} while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); 
        ?>	
        </select>
        <br />
         <div align="right" style="padding-right:8px;"><input type="button" id="add" value="Add &gt;&gt;" /></div>
         
		</td>
		<td>
        	<select name="select2" multiple id="select2" size="10" style="width:460px; height:400px;">
            <?php
			if ($row_GetDraftList['DraftList'] != ""){
			$items = explode(',',$row_GetDraftList['DraftList']);
			foreach( $items as $item )
			{
			if($item != ""){
				echo '<option value="'.$item.'">'.$item.'</option>';
			}
			}
			}
			?>
            </select>
			<input type="hidden" name="teamlist" id="teamlist" value="" />
            <br />
            <input type="button" id="remove" value="&lt;&lt; Remove" />
		</td>
	</tr>
</tbody>
</table>
<br />

<div align="center"><input type="submit" value="<?php echo $l_Submit;?>"></div>

  <input type="hidden" name="MM_insert" value="form1">
</form>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
