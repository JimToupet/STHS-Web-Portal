<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Notes = "<p>SIM Hockey League uses <a href='http://sths.simont.info/' target='_blank'>SimonT Hockey Simulator (STHS)</a>.</p><p>Each GM is required to download and install the <a href='http://sths.simont.info/Download_En.php' target='_blank'>STHS Client</a> (Windows only).  Each time the GM wishes to update their team's lines, the will have to download the league file, and open it up with the <a href='http://sths.simont.info/Download_En.php' target='_blank'>STHS Client </a>software. </p><p>Once the GM is finished adjusting their lines and saving the changes to an external file, they can then come to this page and upload that file to the server.</p>";
	$l_UploadBTN = "UPLOAD";	
	$l_Alert1 = "You must be logged in to upload the team lines.";
	$l_Alert2 = "Select a file on your computer";
	break; 

case 'fr': 
	$l_Notes = "<p>Le SIM Hockey League web portal utilise le <a href='http://sths.simont.info/' target='_blank'>SimonT Hockey Simulator (STHS)</a>.</p><p>Chaque DG doit t&eacute;l&eacute;charger et installer le  <a href='http://sths.simont.info/Download_En.php' target='_blank'>STHS Client</a> (Windows seulement). &Agrave; chaque fois que le DG souhaite mettre &agrave; jour les lignes et l'alignement de son &eacute;quipe, il devra t&eacute;l&eacute;charger le fichier de la ligue et l'ouvrir &agrave; l'aide du logiciel  <a href='http://sths.simont.info/Download_En.php' target='_blank'>STHS Client</a>. </p><p>Une fois que le DG a termin&eacute; d'ajuster ses lignes et qu'il a sauvegard&eacute; le tout dans un fichier , il peut venir sur cette page et mettre &agrave; jour ce fichier sur le serveur.</p>";
	$l_UploadBTN = "Mettre &agrave; jour";
	$l_Alert1 = "Vous devez vous connecter pour mettre &agrave; jour votre alignement.";
	$l_Alert2 = "S&eacute;lectionner un fichier sur votre ordinateur";
	break;
} 

 
$errortxt = "";;
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

	if (allowedExtension($_FILES['userfile']['name'],"shl")) {

		$uploaddir = 'File/GMLines/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			$errortxt = "Congratulations, the file is valid, and was successfully uploaded.\n";


			$updateSQL = "UPDATE proteam SET LastModifiedLines='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE Name='".$_SESSION['current_Team']."'";
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
			$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
				GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
				GetSQLValueString($_SESSION['U_Team'], "text"),
				GetSQLValueString($_SESSION['current_SeasonID'], "int"),
				GetSQLValueString("Upload", "text"));
			$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
		} else {
			$errortxt = "";
		}
	}
	else {
		$errorxt = "Error uploading your file";
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_upload_lines;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_upload_lines;?></h1>
    <form name="form1" id="form1" enctype='multipart/form-data' method="post" action="<?php echo $editFormAction; ?>"> 
    <?php
    if ($errortxt != ""){
        echo "<h3>".$errortxt."</h3>";
    } else {
		echo $l_Notes;
        if(!isset($_SESSION['U_ID']))
        {
            echo $l_Alert1.' <input type="file" name="userfile" disabled="disabled"> <input type="submit" value="'.$l_UploadBTN.'" disabled="disabled">';
        } else {
            echo $l_Alert2.' <input type="file" name="userfile"> <input type="submit" value="'.$l_UploadBTN.'" class="button save">';
        }
    }
    ?>
    
	<input type="hidden" name="MM_update" value="form1">
   </form>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
