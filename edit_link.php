<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Edit Link";
	$l_Title  = "TITLE";
	$l_Submit  = "SUBMIT";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un link";
	$l_Title  = "TITRE";
	$l_Submit  = "POSTER";
	break;
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	$UPLOADED_ICON = "";
	
	$uploaddir = "image/logos/";
	$uploadfile = $uploaddir . basename($_FILES['NEW_ICON']['name']);
	include('includes/SimpleImage.php');
	
	if (move_uploaded_file($_FILES['NEW_ICON']['tmp_name'], $uploadfile)) {
		$image = new SimpleImage();
		$image->load($uploadfile);	
		$image->resize(25,25);
		$image->save($uploadfile);
		$UPLOADED_PHOTO = basename($_FILES['NEW_ICON']['name']);
	}else{
		$UPLOADED_PHOTO = $_POST['ICON'];
	}

	$updateSQL = sprintf("UPDATE links SET League=%s, URL=%s, Icon=%s WHERE ID=%s",
                        GetSQLValueString($_POST['LEAGUE'], "text"),
                        GetSQLValueString($_POST['URL'], "text"),
                        GetSQLValueString($UPLOADED_PHOTO, "text"),
					   	GetSQLValueString($_POST['ID'], "int"));
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  	
	$updateGoTo = "links.php";
  
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$ID_GetLink = "0";
if (isset($_GET["id"])) {
  $ID_GetLink = (get_magic_quotes_gpc()) ? $_GET["id"] : ParseSQL($_GET["id"]);
}
$query_GetLinkDetails = sprintf("SELECT * FROM links WHERE ID=%s",  $ID_GetLink);
$GetLinkDetails = mysql_query($query_GetLinkDetails, $connection) or die(mysql_error());
$row_GetLinkDetails = mysql_fetch_assoc($GetLinkDetails);
$totalRows_GetLinkDetails = mysql_num_rows($GetLinkDetails);
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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.datepicker.js"></script>
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
  $('.date-pick').datepicker().val(new Date().asString()).trigger('change');
});;
</script>
<script language="javascript">
function checkit(){
	if (document.form1.LEAGUE.value.length==0){
		alert("<?php echo $l_Alert1;?>");
		return false;
	}
	if (document.form1.URL.value.length==0){
		alert("<?php echo $l_Alert2;?>");
		return false;
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

<h1><?php echo $l_PageTitle;?></h1>
<br />
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>

<div class="rowElem">
<label for="LEAGUE"><?php echo $l_nav_proleague;?>:</label>
<input type="text" name="LEAGUE" size="80" value="<?php echo $row_GetLinkDetails['League']; ?>"  maxlength="255">
</div>

<div class="rowElem">
<label for="URL">URL:</label>
<input type="text" name="URL" size="80" value="<?php echo $row_GetLinkDetails['URL']; ?>"  maxlength="255">
</div>


<div class="rowElem">
<label for="NEW_ICON">UPLOAD ICON:</label>
<input type="file" name="NEW_ICON"><img src="<?php echo $_SESSION['DomainName']."/image/logos/".$row_GetLinkDetails['Icon']; ?>">
<input type="hidden" name="ICON" value="<?php echo $row_GetLinkDetails['Icon']; ?>">
</div>

<div class="rowElem">
<label for="submit"></label>
<input type="submit" value="<?php echo $l_PageTitle;?>" class="button edit">
</div>
<br /><br />

<input type="hidden" name="MM_update" value="form1">
<input type="hidden" name="ID" value="<?php echo $row_GetLinkDetails['ID']; ?>">
</form>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
