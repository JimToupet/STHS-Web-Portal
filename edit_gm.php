<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Avatar  = "Avatar";
	$l_Administrator = "Administrator";
	$l_MessageForwarding  = "Message Forwarding";
	$l_BIO = "BIO";
	$l_AWAY_Status = "Not available";
	$l_LeaveDate = "Leave Date";
	$l_ReturnDate = "Return Date";
	$l_Note = "Note";
	$l_email = "E-mail";
	$l_MessageForwardingDesc = "This will send all website messages to the G.M.'s e-mail account.";
	$l_VACATION_NOTICE = "VACATION NOTICE";
	$l_AWAY_Desc = "This will tell all the G.M.s that your are not available to respond to their e-mails between the dates you select below.";
	$l_PrimaryColor = "Primary Color";
	$l_SecondaryColor  = "Secondary Color";
	$l_NavLogo  = "Navigation Bar Logo";
	$l_TinyLogo  = "Schedule Logo";
	$l_SmallLogo  = "Next Game Logo";
	$l_LargeLogo  = "Large Team Logo";
	$l_HeaderImage  = "Header Image";
	$l_MaxWidth   = "Max. Width ";
	$l_Save  = "Save Changes";
	$l_True  = "TRUE";
	$l_False  = "FALSE";
	$l_GM_Info = "General Manager Information";
	$l_Graphic = "graphics";
	$l_JersyAway = "Away Jersey";
	$l_JersyHome = "Home Jersey";
	break; 

case 'fr': 
	$l_Avatar  = "Avatar";
	$l_Administrator = "Administrateur";
	$l_MessageForwarding  = "Exp&eacute;dition de message";
	$l_BIO = "BIO";
	$l_AWAY_Status = "Vacances";
	$l_LeaveDate = "Date que vous Quitter";
	$l_ReturnDate = "Date de Retour";
	$l_Note = "Note";
	$l_email = "Courriel";
	$l_MessageForwardingDesc = "Ceci enverra tous les messages de site Web au G.M.' ; compte de courrier.";
	$l_VACATION_NOTICE = "Avis de Vacance";
	$l_AWAY_Desc = "Ceci indiquera tout le G.M.s que votre ne soyez pas disponible pour r&eacute;pondre &agrave;  leurs email entre les dates o&agrave;¹ vous choisissez ci-dessous.";
	$l_PrimaryColor = "Couleur Primaire";
	$l_SecondaryColor  = "Couleur Secondaire";
	$l_NavLogo  = "Logo de la navigation";
	$l_TinyLogo  = "Logo de la c&eacute;dule";
	$l_SmallLogo  = "Logo de la prochaine partie";
	$l_LargeLogo  = "Logo d'&eacute;quipe grand";
	$l_HeaderImage  = "Image sup&eacute;rieure";
	$l_MaxWidth   = "Max.";
	$l_Save  = "Sauvegarder";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_GM_Info = "Directeur general / Information sur le compte";
	$l_Graphic = "graphiques";
	$l_JersyAway = "Chandail &agrave;  l&Acirc;€™Ext&eacute;rieur";
	$l_JersyHome = "Chandail &agrave;  Domicile ";
	break;
} 


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$UPLOADED_PHOTO ="";
$UPLOADED_LOGO_TINY ="";
$UPLOADED_LOGO_SMALL ="";
$UPLOADED_LOGO_LARGE ="";
$UPLOADED_HEADER ="";
$UPLOADED_FARM_LOGO_TINY ="";
$UPLOADED_FARM_LOGO_SMALL ="";
$UPLOADED_FARM_LOGO_LARGE ="";
$UPLOADED_FARM_HEADER ="";

include('includes/SimpleImage.php');

$uploaddir = "image/gm/";
$uploadfile = $uploaddir . basename($_FILES['NEW_PHOTO']['name']);
if (move_uploaded_file($_FILES['NEW_PHOTO']['tmp_name'], $uploadfile)) {
	$image1 = new SimpleImage();
	$image1->load($uploadfile);	
	if ($image1->getWidth($uploadfile) > 65 || $image1->getWidth($uploadfile) < 65){
		$image1->resize(65,65);
	}
	$image1->save($uploadfile);			
	$UPLOADED_PHOTO = basename($_FILES['NEW_PHOTO']['name']);
	$_SESSION['Avatar']=$UPLOADED_PHOTO;
}else{
	$UPLOADED_PHOTO = $_POST['PHOTO'];
}

$uploaddir = "image/logos/nav/";
$uploadfile = $uploaddir . basename($_FILES['NEW_LOGO_NAV']['name']);
if (move_uploaded_file($_FILES['NEW_LOGO_NAV']['tmp_name'], $uploadfile)) {
	$image2 = new SimpleImage();
	$image2->load($uploadfile);
	if ($image2->getWidth($uploadfile) > 25 || $image2->getWidth($uploadfile) < 25){
		$image2->resize(25,25);
	}
	$image2->save($uploadfile);
	$UPLOADED_LOGO_NAV = basename($_FILES['NEW_LOGO_NAV']['name']);
}else{
	$UPLOADED_LOGO_NAV = $_POST['LOGO_NAV'];
}

	
$uploaddir = "image/logos/small/";
$uploadfile = $uploaddir . basename($_FILES['NEW_LOGO_TINY']['name']);
if (move_uploaded_file($_FILES['NEW_LOGO_TINY']['tmp_name'], $uploadfile)) {
	$image3 = new SimpleImage();
	$image3->load($uploadfile);
	if ($image3->getWidth($uploadfile) > 25 || $image3->getWidth($uploadfile) < 25){
		$image3->resize(25,25);
	}
	$image3->save($uploadfile);
	$UPLOADED_LOGO_TINY = basename($_FILES['NEW_LOGO_TINY']['name']);
}else{
	$UPLOADED_LOGO_TINY = $_POST['LOGO_TINY'];
}

$uploaddir = "image/logos/medium/";
$uploadfile = $uploaddir . basename($_FILES['NEW_LOGO_SMALL']['name']);
if (move_uploaded_file($_FILES['NEW_LOGO_SMALL']['tmp_name'], $uploadfile)) {
	$image4 = new SimpleImage();
	$image4->load($uploadfile);
	if ($image4->getWidth($uploadfile) > 80 || $image4->getWidth($uploadfile) < 80){
		$image4->resize(80,80);
	}
	$image4->save($uploadfile);
	$UPLOADED_LOGO_SMALL = basename($_FILES['NEW_LOGO_SMALL']['name']);
}else{
	$UPLOADED_LOGO_SMALL = $_POST['LOGO_SMALL'];
}

$uploaddir = "image/logos/huge/";
$uploadfile = $uploaddir . basename($_FILES['NEW_LOGO_LARGE']['name']);
if (move_uploaded_file($_FILES['NEW_LOGO_LARGE']['tmp_name'], $uploadfile)) {
	$image5 = new SimpleImage();
	$image5->load($uploadfile);
	if ($image5->getWidth($uploadfile) > 120 || $image->getWidth($uploadfile) < 120){
		$image5->resize(120,120);
	}
	$image5->save($uploadfile);
	$UPLOADED_LOGO_LARGE = basename($_FILES['NEW_LOGO_LARGE']['name']);
}else{
	$UPLOADED_LOGO_LARGE = $_POST['LOGO_LARGE'];
}


$uploaddir = "image/headlines/";
$uploaddir2 = "image/headlines/thumb/";
$uploadfile = $uploaddir . basename($_FILES['NEW_HEADLINE']['name']);
$uploadfile2 = $uploaddir2 . basename($_FILES['NEW_HEADLINE']['name']);
if (move_uploaded_file($_FILES['NEW_HEADLINE']['tmp_name'], $uploadfile)) {
	$image6 = new SimpleImage();
	$image6->load($uploadfile);
	if ($image6->getWidth($uploadfile) > 480 || $image6->getWidth($uploadfile) < 480){
		$image6->resize(480,285);
		$image6->save($uploadfile);
	}
	$UPLOADED_HEADLINE = basename($_FILES['NEW_HEADLINE']['name']);
	$thumb = new SimpleImage();
	$thumb->load($uploadfile);
	$thumb->resize(35,25);
	$thumb->save($uploadfile2);
	
}else{
	$UPLOADED_HEADLINE = $_POST['HEADLINE'];
}

$uploaddir = "image/headers/";
$uploadfile = $uploaddir . basename($_FILES['NEW_HEADER']['name']);
if (move_uploaded_file($_FILES['NEW_HEADER']['tmp_name'], $uploadfile)) {
	$image7 = new SimpleImage();
	$image7->load($uploadfile);
	if ($image7->getWidth($uploadfile) > 998 || $image7->getWidth($uploadfile) < 998){
		$image7->resize(998,100);
	}
	$image7->save($uploadfile);
	$UPLOADED_HEADER = basename($_FILES['NEW_HEADER']['name']);
}else{
	$UPLOADED_HEADER = $_POST['HEADER'];
}


$uploaddir = "image/logos/small/";
$uploadfile = $uploaddir . basename($_FILES['NEW_FARM_LOGO_TINY']['name']);
if (move_uploaded_file($_FILES['NEW_FARM_LOGO_TINY']['tmp_name'], $uploadfile)) {
	$image8 = new SimpleImage();
	$image8->load($uploadfile);
	if ($image8->getWidth($uploadfile) > 25 || $image8->getWidth($uploadfile) < 25){
		$image8->resize(25,25);
	}
	$image8->save($uploadfile);
	$UPLOADED_FARM_LOGO_TINY = basename($_FILES['NEW_FARM_LOGO_TINY']['name']);
}else{
	$UPLOADED_FARM_LOGO_TINY = $_POST['FARM_LOGO_TINY'];
}


$uploaddir = "image/logos/medium/";
$uploadfile = $uploaddir . basename($_FILES['NEW_FARM_LOGO_SMALL']['name']);
if (move_uploaded_file($_FILES['NEW_FARM_LOGO_SMALL']['tmp_name'], $uploadfile)) {
	$image9 = new SimpleImage();
	$image9->load($uploadfile);
	if ($image9->getWidth($uploadfile) > 80 || $image9->getWidth($uploadfile) < 80){
		$image9->resize(80,80);
	}
	$image9->save($uploadfile);
	$UPLOADED_FARM_LOGO_SMALL = basename($_FILES['NEW_FARM_LOGO_SMALL']['name']);
}else{
	$UPLOADED_FARM_LOGO_SMALL = $_POST['FARM_LOGO_SMALL'];
}


$uploaddir = "image/logos/huge/";
$uploadfile = $uploaddir . basename($_FILES['NEW_FARM_LOGO_LARGE']['name']);
if (move_uploaded_file($_FILES['NEW_FARM_LOGO_LARGE']['tmp_name'], $uploadfile)) {
	$image10 = new SimpleImage();
	$image10->load($uploadfile);
	if ($image10->getWidth($uploadfile) > 140 || $image10->getWidth($uploadfile) < 140){
		$image10->resize(140,120);
	}
	$image10->save($uploadfile);
	$UPLOADED_FARM_LOGO_LARGE = basename($_FILES['NEW_FARM_LOGO_LARGE']['name']);
}else{
	$UPLOADED_FARM_LOGO_LARGE = $_POST['FARM_LOGO_LARGE'];
}


$uploaddir = "image/headers/";
$uploadfile = $uploaddir . basename($_FILES['NEW_FARM_HEADER']['name']);
if (move_uploaded_file($_FILES['NEW_FARM_HEADER']['tmp_name'], $uploadfile)) {
	$image11 = new SimpleImage();
	$image11->load($uploadfile);
	if ($image11->getWidth($uploadfile) > 998 || $image11->getWidth($uploadfile) < 998){
		$image11->resize(998,100);
	}
	$image11->save($uploadfile);
	$UPLOADED_FARM_HEADER = basename($_FILES['NEW_FARM_HEADER']['name']);
}else{
	$UPLOADED_FARM_HEADER = $_POST['FARM_HEADER'];
}


$uploaddir = "image/jersys/home/";
$uploadfile = $uploaddir . basename($_FILES['NEW_JERSEY']['name']);
if (move_uploaded_file($_FILES['NEW_JERSEY']['tmp_name'], $uploadfile)) {
	
	$image12 = new SimpleImage();
	$image12->load($uploadfile);
	if ($image12->getWidth($uploadfile) > 440 || $image12->getWidth($uploadfile) < 440){
		$image12->resize(440,210);
	}
	$image12->save($uploadfile);
	$UPLOADED_JERSEY = basename($_FILES['NEW_JERSEY']['name']);
}else{
	$UPLOADED_JERSEY = $_POST['JERSEY'];
}


$uploaddir = "image/jersys/visitor/";
$uploadfile = $uploaddir . basename($_FILES['NEW_JERSEY_AWAY']['name']);
if (move_uploaded_file($_FILES['NEW_JERSEY_AWAY']['tmp_name'], $uploadfile)) {
	$image13 = new SimpleImage();
	$image13->load($uploadfile);
	if ($image13->getWidth($uploadfile) > 440 || $image13->getWidth($uploadfile) < 440){
		$image13->resize(440,210);
	}
	$image13->save($uploadfile);
	$UPLOADED_JERSEY_AWAY = basename($_FILES['NEW_JERSEY_AWAY']['name']);
}else{
	$UPLOADED_JERSEY_AWAY = $_POST['JERSEY_AWAY'];
}


$uploaddir = "image/jersys/home/";
$uploadfile = $uploaddir . basename($_FILES['FARM_NEW_JERSEY']['name']);
if (move_uploaded_file($_FILES['FARM_NEW_JERSEY']['tmp_name'], $uploadfile)) {
	$image14 = new SimpleImage();
	$image14->load($uploadfile);
	if ($image14->getWidth($uploadfile) > 440 || $image14->getWidth($uploadfile) < 440){
		$image14->resize(440,210);
	}
	$image14->save($uploadfile);
	$UPLOADED_FARM_JERSEY = basename($_FILES['FARM_NEW_JERSEY']['name']);
}else{
	$UPLOADED_FARM_JERSEY = $_POST['FARM_JERSEY'];
}


$uploaddir = "image/jersys/visitor/";
$uploadfile = $uploaddir . basename($_FILES['FARM_NEW_JERSEY_AWAY']['name']);
if (move_uploaded_file($_FILES['FARM_NEW_JERSEY_AWAY']['tmp_name'], $uploadfile)) {
	$image15 = new SimpleImage();
	$image15->load($uploadfile);
	if ($image15->getWidth($uploadfile) > 440 || $image15->getWidth($uploadfile) < 440){
		$image15->resize(440,210);
	}
	$image15->save($uploadfile);
	$UPLOADED_FARM_JERSEY_AWAY = basename($_FILES['FARM_NEW_JERSEY_AWAY']['name']);
}else{
	$UPLOADED_FARM_JERSEY_AWAY = $_POST['FARM_JERSEY_AWAY'];
}

  
  
  $updateSQL = "UPDATE proteam SET JerseyHome='".$UPLOADED_JERSEY."',JerseyAway='".$UPLOADED_JERSEY_AWAY."', HeadlineImage='".$UPLOADED_HEADLINE."', HeaderImage='".$UPLOADED_HEADER."', LogoNav='".$UPLOADED_LOGO_NAV."', LogoTiny='".$UPLOADED_LOGO_TINY."', LogoSmall='".$UPLOADED_LOGO_SMALL."', LogoLarge='".$UPLOADED_LOGO_LARGE."', PrimaryColor='".$_POST['PrimaryColor']."', SecondaryColor='".$_POST['SecondaryColor']."', Avatar='".$UPLOADED_PHOTO."', Email='".$_POST['email']."', Username='".$_POST['username']."', Password='".$_POST['password']."', Administrator=".$_POST['administrator'].", EmailAlert=".$_POST['EmailAlert'].", BIO='".$_POST['Bio']."' WHERE Number=".$_POST['team'];
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  
  $updateSQLFarm = "UPDATE farmteam SET JerseyHome='".$UPLOADED_FARM_JERSEY."',JerseyAway='".$UPLOADED_FARM_JERSEY_AWAY."', HeaderImage='".$UPLOADED_FARM_HEADER."', LogoTiny='".$UPLOADED_FARM_LOGO_TINY."', LogoSmall='".$UPLOADED_FARM_LOGO_SMALL."', LogoLarge='".$UPLOADED_FARM_LOGO_LARGE."', PrimaryColor='".$_POST['FARM_PrimaryColor']."', SecondaryColor='".$_POST['FARM_SecondaryColor']."' WHERE Number=".$_POST['team'];
  $Result1 = mysql_query($updateSQLFarm, $connection) or die(mysql_error());
	
	unset($_SESSION['current_PrimaryColor']);
	unset($_SESSION['current_SecondaryColor']);
	unset($_SESSION['current_HeaderImage']);
	unset($_SESSION['current_LogoLarge']);
	unset($_SESSION['current_LogoSmall']);
	$_SESSION['current_PrimaryColor'] = $_POST['PrimaryColor'];
	$_SESSION['current_SecondaryColor'] = $_POST['SecondaryColor'];
	$_SESSION['current_HeaderImage'] = $UPLOADED_HEADER;
	$_SESSION['current_LogoLarge'] = $UPLOADED_LOGO_LARGE;
	$_SESSION['current_LogoSmall'] = $UPLOADED_LOGO_SMALL;
	$_SESSION['current_Email'] = $_POST['email'];
	
  $updateGoTo = "edit_gm.php?team=".$_SESSION['current_Team_ID'];
  header(sprintf("Location: %s", $updateGoTo));
}

$query_EditGM = sprintf("SELECT * FROM proteam WHERE Number=".$_SESSION['current_Team_ID']);
$EditGM = mysql_query($query_EditGM, $connection) or die(mysql_error());
$row_EditGM = mysql_fetch_assoc($EditGM);

$query_FARM_EditGM = sprintf("SELECT * FROM farmteam WHERE Number=".$_SESSION['current_Team_ID']);
$FARM_EditGM = mysql_query($query_FARM_EditGM, $connection) or die(mysql_error());
$row_FARM_EditGM = mysql_fetch_assoc($FARM_EditGM);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_edit_gm;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
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
  $('.date-pick').datePicker().val(new Date().asString()).trigger('change');
  
  //hide the all of the element with class msg_body
	$(".msg_body").hide();
	$(".msg_body:first").slideToggle(250);
	
	//toggle the componenet with class msg_body
	$(".msg_head").click(function(){
		$(".msg_body").hide();
		$(this).next(".msg_body").slideToggle(250);
	});

});;
</script>
<script type="text/javascript">
<!--
function validate_form ( )
{
    valid = true;
    if ( document.form1.username.value == "" )
    {
        alert ( "Please fill in the 'Username' box." );
        valid = false;
    }
	if ( document.form1.password.value == "" )
    {
        alert ( "Please fill in the 'Password' box." );
        valid = false;
    }
    return valid;
}
//-->
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
.msg_list {
	width: 100%;
}
.msg_head {
	padding: 5px 10px;
	cursor: pointer;
	position: relative;
	background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;
	font-weight:bold;
	clear:both;
	margin-bottom:1px;
}
.msg_body {
	margin-bottom:30px;
	display:block;
}
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
    <h1><?php echo $l_nav_edit_gm;?></h1>
    <br />
    
	<?php 
		if(isset($_SESSION['U_ID'])){
			if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
		?>
		<form method="post" name="form1" id="form1"  enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onSubmit="return validate_form();">
<div class="msg_list">

    <p class="msg_head"><?php echo $l_GM_Info;?></p>
    <div class="msg_body">
        
        <div class="rowElem">
        <label for="NEW_PHOTO"><?php echo $l_Avatar;?>:</label>
        <input name="NEW_PHOTO" type="file" /><input type="hidden" name="PHOTO" value="<?php echo $row_EditGM['Avatar']; ?>" />
        <?php if ($row_EditGM['Avatar'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName']; ?>/image/gm/<?php echo $row_EditGM['Avatar'].'" width="65" height="65" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="username"><?php echo $l_username;?>:</label>
        <input type="text" name="username" value="<?php echo $row_EditGM['Username']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="password"><?php echo $l_password;?>:</label>
        <input type="text" name="password" value="<?php echo $row_EditGM['Password']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="email"><?php echo $l_email;?>:</label>
        <input type="text" name="email" value="<?php echo $row_EditGM['Email']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="EmailAlert"><?php echo $l_MessageForwarding;?>:</label>
        <select name="EmailAlert" >
        <option value="1" <?php if ($row_EditGM['EmailAlert']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
        <option value="0" <?php if ($row_EditGM['EmailAlert']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
        </select>
        </div>
        
        <?php if ($_SESSION['U_Admin']==1){ ?>
        <div class="rowElem">
        <label for="FarmLowestPIM"><?php echo $l_Administrator;?>:</label>
        <select name="administrator" >
        <option value="1" <?php if ($row_EditGM['Administrator']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
        <option value="0" <?php if ($row_EditGM['Administrator']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
        </select>
        </div>
        <?php } else { echo "<input type='hidden' name='administrator' value='".$row_EditGM['Administrator']."' />";}?>
                   
    </div>
    
    <p class="msg_head"><?php echo $l_nav_proteam." ".$l_Graphic;?></p>
    <div class="msg_body">
            
        <div class="rowElem">
        <label for="PrimaryColor"><?php echo $l_PrimaryColor;?>:</label>
        <input type="text" name="PrimaryColor" maxlength="6" style="width:100px;" value="<?php echo $row_EditGM['PrimaryColor']; ?>" />
        <div style="margin:0px 0px 0px 260px; display:block; width:25px; height:25px; background-color:#<?php echo $row_EditGM['PrimaryColor']; ?>;"></div>
        </div>
        
        <div class="rowElem">
        <label for="SecondaryColor"><?php echo $l_SecondaryColor;?>:</label>
        <input type="text" name="SecondaryColor" maxlength="6" style="width:100px;" value="<?php echo $row_EditGM['SecondaryColor']; ?>" />
        <div style="margin:0px 0px 0px 260px; display:block; width:25px; height:25px; background-color:#<?php echo $row_EditGM['SecondaryColor']; ?>;"></div>
        </div>
        
        <div class="rowElem">
        <label for="NEW_HEADER"><?php echo $l_HeaderImage;?>:</label>
        <input type="hidden" name="HEADER" value="<?php echo $row_EditGM['HeaderImage']; ?>" /><input name="NEW_HEADER" type="file" />
        <?php if ($row_EditGM['HeaderImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headers/'.$row_EditGM['HeaderImage'].'" width="575" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_HEADLINE">Headline Collage:</label>
        <input type="hidden" name="HEADLINE" value="<?php echo $row_EditGM['HeadlineImage']; ?>" /><input name="NEW_HEADLINE" type="file" />
        <?php if ($row_EditGM['HeadlineImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headlines/'.$row_EditGM['HeadlineImage'].'" width="480" border="1" />';
        }
        ?>
        </div>
                
        <div class="rowElem">
        <label for="NEW_LOGO_NAV"><?php echo $l_NavLogo;?>:</label>
        <input type="hidden" name="LOGO_NAV" value="<?php echo $row_EditGM['LogoNav']; ?>" /><input name="NEW_LOGO_NAV" type="file" />
        <?php if ($row_EditGM['LogoNav'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/nav/'.$row_EditGM['LogoNav'].'" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_LOGO_TINY"><?php echo $l_TinyLogo;?>:</label>
        <input type="hidden" name="LOGO_TINY" value="<?php echo $row_EditGM['LogoTiny']; ?>" /><input name="NEW_LOGO_TINY" type="file" />
        <?php if ($row_EditGM['LogoTiny'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/small/'.$row_EditGM['LogoTiny'].'" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_LOGO_SMALL"><?php echo $l_SmallLogo;?>:</label>
        <input type="hidden" name="LOGO_SMALL" value="<?php echo $row_EditGM['LogoSmall']; ?>" /><input name="NEW_LOGO_SMALL" type="file" />
        <?php if ($row_EditGM['LogoSmall'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/medium/'.$row_EditGM['LogoSmall'].'"  border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_LOGO_LARGE"><?php echo $l_LargeLogo;?>:</label>
        <input type="hidden" name="LOGO_LARGE" value="<?php echo $row_EditGM['LogoLarge']; ?>" /><input name="NEW_LOGO_LARGE" type="file" />
        <?php if ($row_EditGM['LogoLarge'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/huge/'.$row_EditGM['LogoLarge'].'"  border="1" />';
        }
        ?>
        </div>
        
        
        <div class="rowElem">
        <label for="NEW_JERSEY"><?php echo $l_JersyHome;?>:</label>
        <input type="hidden" name="JERSEY" value="<?php echo $row_EditGM['JerseyHome']; ?>" /><input name="NEW_JERSEY" type="file" />
        <?php if ($row_EditGM['JerseyHome'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/jersys/home/'.$row_EditGM['JerseyHome'].'"  border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_JERSEY_AWAY"><?php echo $l_JersyAway;?>:</label>
        <input type="hidden" name="JERSEY_AWAY" value="<?php echo $row_EditGM['JerseyAway']; ?>" /><input name="NEW_JERSEY_AWAY" type="file" />
        <?php if ($row_EditGM['JerseyAway'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/jersys/visitor/'.$row_EditGM['JerseyAway'].'"  border="1" />';
        }
        ?>
        </div>
             
    </div>
    
    <p class="msg_head"><?php echo $l_nav_farmteam." ".$l_Graphic;?></p>
    <div class="msg_body">
        
       <div class="rowElem">
        <label for="FARM_PrimaryColor"><?php echo $l_PrimaryColor;?>:</label>
        <input type="text" name="FARM_PrimaryColor" maxlength="6" style="width:100px;" value="<?php echo $row_FARM_EditGM['PrimaryColor']; ?>" />
        <div style="margin:0px 0px 0px 260px; display:block; width:25px; height:25px; background-color:#<?php echo $row_FARM_EditGM['PrimaryColor']; ?>;"></div>
        </div>
        
        <div class="rowElem">
        <label for="FARM_SecondaryColor"><?php echo $l_SecondaryColor;?>:</label>
        <input type="text" name="FARM_SecondaryColor" maxlength="6" style="width:100px;" value="<?php echo $row_FARM_EditGM['SecondaryColor']; ?>" />
        <div style="margin:0px 0px 0px 260px; display:block; width:25px; height:25px; background-color:#<?php echo $row_FARM_EditGM['SecondaryColor']; ?>;"></div>
        </div>
        
        <div class="rowElem">
        <label for="FARM_HEADER"><?php echo $l_HeaderImage;?>:</label>
        <input type="hidden" name="FARM_HEADER" value="<?php echo $row_FARM_EditGM['HeaderImage']; ?>" /><input name="NEW_FARM_HEADER" type="file" />
        <?php if ($row_FARM_EditGM['HeaderImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headers/'.$row_FARM_EditGM['HeaderImage'].'" width="575" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_FARM_LOGO_TINY"><?php echo $l_TinyLogo;?>:</label>
        <input type="hidden" name="FARM_LOGO_TINY" value="<?php echo $row_FARM_EditGM['LogoTiny']; ?>" /><input name="NEW_FARM_LOGO_TINY" type="file" />
        <?php if ($row_FARM_EditGM['LogoTiny'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/small/'.$row_FARM_EditGM['LogoTiny'].'" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_FARM_LOGO_SMALL"><?php echo $l_SmallLogo;?>:</label>
        <input type="hidden" name="FARM_LOGO_SMALL" value="<?php echo $row_FARM_EditGM['LogoSmall']; ?>" /><input name="NEW_FARM_LOGO_SMALL" type="file" />
        <?php if ($row_FARM_EditGM['LogoSmall'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/medium/'.$row_FARM_EditGM['LogoSmall'].'"  border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="NEW_FARM_LOGO_LARGE"><?php echo $l_LargeLogo;?>:</label>
        <input type="hidden" name="FARM_LOGO_LARGE" value="<?php echo $row_FARM_EditGM['LogoLarge']; ?>" /><input name="NEW_FARM_LOGO_LARGE" type="file" />
        <?php if ($row_FARM_EditGM['LogoLarge'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/logos/huge/'.$row_FARM_EditGM['LogoLarge'].'"  border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="FARM_NEW_JERSEY"><?php echo $l_JersyHome;?>:</label>
        <input type="hidden" name="FARM_JERSEY" value="<?php echo $row_FARM_EditGM['JerseyHome']; ?>" /><input name="FARM_NEW_JERSEY" type="file" />
        <?php if ($row_FARM_EditGM['JerseyHome'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/jersys/home/'.$row_FARM_EditGM['JerseyHome'].'"  border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="FARM_NEW_JERSEY_AWAY"><?php echo $l_JersyAway;?>:</label>
        <input type="hidden" name="FARM_JERSEY_AWAY" value="<?php echo $row_FARM_EditGM['JerseyAway']; ?>" /><input name="FARM_NEW_JERSEY_AWAY" type="file" />
        <?php if ($row_FARM_EditGM['JerseyAway'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;"  src="'.$_SESSION['DomainName'].'/image/jersys/visitor/'.$row_FARM_EditGM['JerseyAway'].'"  border="1" />';
        }
        ?>
        </div>
        
        
    </div>
    <p class="msg_head"><?php echo $l_BIO;?></p>
    <div class="msg_body">
            <?php
            if ($_SESSION['RichTextEditor'] == 0){
                echo "<textarea name='Bio' cols='50' rows='10'></textarea>";
            } else {
                // Include CKEditor class.
                include_once "ckeditor/ckeditor.php";
                // The initial value to be displayed in the editor.
                $initialValue = '<p>This is some <strong>sample text</strong>.</p>';
                // Create class instance.
                $CKEditor = new CKEditor();
                // Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
                //   $CKEditor->basePath = '/ckeditor/'
                // If not set, CKEditor will try to detect the correct path.
                $CKEditor->basePath = 'ckeditor/';
                $CKEditor->config['width'] = 950;
                // Create textarea element and attach CKEditor to it.
                $CKEditor->editor("Bio", $row_EditGM['Bio']);
            }
            ?>
            
    </div>
</div>
    
<div align="center"><input type="submit" value="<?php echo $l_Save;?>" class="button save" /></div>
 <input type="hidden" name="MM_update" value="form1">
 <input type="hidden" name="team" value="<?php echo $_GET['team']; ?>">
 <input type="hidden" name="Name" value="<?php echo $row_EditGM['Name']; ?>">
</form>
        <br /><br />
		<?php
			} else {
				echo "<h1>Sorry</h1><p>You must log in to edit the GM information.</p>";
			}
		} else {
			echo "<h1>Sorry</h1><p>You must log in to edit the GM information.</p>";
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
<?php
mysql_free_result($EditGM);
?>