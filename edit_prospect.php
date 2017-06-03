<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$UPLOADED_PHOTO ="";
	$uploaddir = "image/players/";
	$uploadfile = $uploaddir . basename($_FILES['NEW_PHOTO']['name']);
	include('includes/SimpleImage.php');
	if (move_uploaded_file($_FILES['NEW_PHOTO']['tmp_name'], $uploadfile)) {
		$image = new SimpleImage();
		$image->load($uploadfile);	
		$image->resize(100,150);
		$image->save($uploadfile);
		$UPLOADED_PHOTO = basename($_FILES['NEW_PHOTO']['name']);
	}else{
		$UPLOADED_PHOTO = ParseSQL($_POST['PHOTO']);
	}
	
	if( isset($_POST['GRADE']) ){
		$dGrade = $_POST['GRADE'];
	} else {
		$dGrade = "NULL";
	}

   $updateSQL = "UPDATE prospects SET prospects.DraftYear='".$_POST['DRAFTYEAR']."', prospects.Bio='".$_POST['BIO']."', prospects.Photo='".$UPLOADED_PHOTO."', prospects.Position='".$_POST['POSITION']."', prospects.ProspectGrade=".$dGrade.", prospects.ProspectLevel='".$_POST['LEVEL']."' WHERE prospects.Name='".ParseSQL($_POST['Player'])."'";
   //echo $_POST['BIO'];
  
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  $updateGoTo = "prospect.php?player=".stripslashes($_POST['Player']);
  header(sprintf("Location: %s", $updateGoTo));
}


switch ($lang){ 
case 'en': 
	// Create the position references array
	$l_C  = "C";
	$l_LW  = "LW";
	$l_RW  = "RW";
	$l_D  = "D";
	$l_G  = "G";
	$l_Save = "Save";
	$l_MustLogIn = "Sorry, ou must log in to edit prospect information.";
	$l_PhotoNote = "<p>You may change the players photograph by uploaded a new photograph from your computer.</p><p>Please make sure all player photographs at 100 pixels in width and 150 pixels in height and saved as JPGs.</p>";
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = "LW";
	$a_Positions[ "3" ] = "RW";
	$a_Positions[ "1"  ] = "C";
	$a_Positions[ "4"  ] = "D";
	$a_Positions[ "5"  ] = "G";
	$l_PotentialTitle = "Realistic Potential Rating (1-10)";
	$l_DraftPicks= "Draft Picks";
	$l_DraftYear = "Draft Year";
	$l_Potential = "Potential";
	$l_Rank_10 = "Generational talent";
	$l_Rank_9 = "Elite forward / defenseman / goaltender";
	$l_Rank_8 = "First line forward / No. 2 defenseman / No. 1 goaltender";
	$l_Rank_7 = "Second line forward / No. 3-4 defenseman / journeyman No. 1 goaltender";
	$l_Rank_6 = "Third line forward / No. 5-6 defenseman / Backup Goaltender";
	$l_Rank_5 = "Fourth line forward / No. 7 defenseman / depth goaltender";
	$l_Rank_4 = "Top minor league forward / defenseman / goaltender";
	$l_Rank_3 = "Average minor league forward / defenseman / goaltender";
	$l_Rank_2 = "Minor league role-player";
	$l_Rank_1 = "Borderline minor league player";
	$l_J_Rank_10 = "Generational talent (ex. Sidney Crosby)";
	$l_J_Rank_9 = "1st round draft pick (1-3)";
	$l_J_Rank_8 = "1st round draft pick (4-10)";
	$l_J_Rank_7 = "1st round draft pick (11-22)";
	$l_J_Rank_6 = "2nd round draft pick";
	$l_J_Rank_5 = "3rd round draft pick";
	$l_J_Rank_4 = "4th round draft pick";
	$l_J_Rank_3 = "5th round draft pick";
	$l_J_Rank_2 = "6th round through 9th round draft pick";
	$l_J_Rank_1 = "10th round or greater draft pick";
	$l_J_Grade_A = "All but guaranteed to play in CHL";
	$l_J_Grade_B = "Should play in CHL, could drop 1 rating";
	$l_J_Grade_C = "May play in CHL, could drop 2 ratings";
	$l_J_Grade_D = "Unlikely to play in CHL, could drop 3 ratings";
	$l_J_Grade_E = "A player that will not report to their CHL team";
	$l_J_Grade_F = "A player with no chance of playing in the CHL";
	$l_PotentialGradeTitle = "Realistic Probability Rating (A-F)";
	$l_Grade_A = "All but guaranteed to reach potential";
	$l_Grade_B = "Should reach potential, could drop 1 rating";
	$l_Grade_C = "May reach potential, could drop 2 ratings";
	$l_Grade_D = "Unlikely to reach potential, could drop 3 ratings";
	$l_Grade_E = "A player that will not report to their CHL team";
	$l_Grade_F = "A player possessing little potential";
	$l_upcomingDraft = "Upcoming Draft(s):";
	$l_fullDetails = "Full Details of the Chart at HockeysFuture.com";
	$l_Year = "Year";
	$l_Round = "Round";
	$l_OutsideLinks = "PROFILE LINKS:";
	$l_NoNotes = "No notes available.";
	$l_Rights = "Rights owned by";
	$l_profileedit = "PLAYER PROFILE / BIOGRAPHY:";
	break; 

case 'fr': 
	// Create the position references array
	$l_C  = "C";
	$l_LW  = "AG";
	$l_RW  = "AD";
	$l_D  = "D";
	$l_G  = "G";
	$l_Save = "Sauvegarder";
	$l_MustLogIn = "Vous devez &ecirc;tre enregistr&eacute; pour modifier un joueur.";
	$l_PhotoNote = "<p>Vous pouvez changer la photo du joueur en envoyant une photo de votre ordinateur.</p><p>Assurez vous d'envoyer des photos d'une dimension de 100 pixels par 150, en format JPG.</p>";
	$a_Positions = array();
	$a_Positions[ "" ]   = "N/A";
	$a_Positions[ "2" ] = "AG";
	$a_Positions[ "3" ] = "AD";
	$a_Positions[ "1"  ] = "C";
	$a_Positions[ "4"  ] = "D";
	$a_Positions[ "5"  ] = "G";
	$l_PotentialTitle = "Potentiel de Production (0-10)";
	$l_DraftPicks= "Choix au Rep&ecirc;chage";
	$l_DraftYear = "Ann&eacute;e Repecher";
	$l_Potential = "Potentiel";
	$l_Rank_10 = "Talent g&eacute;n&eacute;ratione";
	$l_Rank_9 = "Attaquants Elite / d&eacute;fenseur / goaltender";
	$l_Rank_8 = "Attaquants Premi&egrave;re line  / No. 2 d&eacute;fenseur / No. 1 gardien de but";
	$l_Rank_7 = "Attaquants Deuxi&egrave;me line / No. 3-4 d&eacute;fenseur / journeyman No. 1 gardien de but";
	$l_Rank_6 = "Attaquants Troisi&egrave;me line / No. 5-6 d&eacute;fenseur / Backup gardien de but";
	$l_Rank_5 = "Attaquants Quatri&egrave;me line / No. 7 d&eacute;fenseur / depth gardien de but";
	$l_Rank_4 = "Top minor league forward / d&eacute;fenseur / gardien de but";
	$l_Rank_3 = "Average minor league forward / d&eacute;fenseur / gardien de but";
	$l_Rank_2 = "Minor league role-player";
	$l_Rank_1 = "Borderline minor league player";
	$l_J_Rank_10 = "Generational talent (ex. Sidney Crosby)";
	$l_J_Rank_9 = "Choix de Premi&egrave;re Ronde (1-3)";
	$l_J_Rank_8 = "Choix de Premi&egrave;re Ronde (4-10)";
	$l_J_Rank_7 = "Choix de Premi&egrave;re Ronde (11-22)";
	$l_J_Rank_6 = "Choix de Deuxi&egrave;me Ronde";
	$l_J_Rank_5 = "Choix de Troisi&egrave;me Ronde";
	$l_J_Rank_4 = "Choix de Quatri&egrave;me Ronde";
	$l_J_Rank_3 = "Choix de Cinqi&egrave;me Ronde";
	$l_J_Rank_2 = "Choix de Sixi&egrave;me Ronde";
	$l_J_Rank_1 = "Choix de Dixi&egrave;me Ronde";
	$l_J_Grade_A = "Tout sauf garantie de jouer dans la ligue junior";
	$l_J_Grade_B = "Devrait jouer dans la ligue junior, pourrait descendre d'une cote de Production";
	$l_J_Grade_C = "Pourrait jouer dans la ligue junior, pourrait descendre de 2 cote de Production";
	$l_J_Grade_D = "Pourrait jouer dans la ligue junior, pourrait descendre de 3 cote de Production";
	$l_J_Grade_E = "Un joueur qui jouera probablement carriere dans la ligue junior";
	$l_J_Grade_F = "Un joueur qui ne jouera que dans la ligue junior et meme la ...";
	$l_PotentialGradeTitle = "Potentiel de Valeur (A-F)";
	$l_Grade_A = "Tout sauf garantie de jouer";
	$l_Grade_B = "Devrait jouer, pourrait descendre d'une cote de Production";
	$l_Grade_C = "Pourrait jouer, pourrait descendre de 2 cote de Production";
	$l_Grade_D = "Jouera probablement pas, pourrait descendre de 3 cote de Production";
	$l_Grade_E = "Un joueur qui jouera probablement carriere dans la ligue junior";
	$l_Grade_F = "Un joueur qui ne jouera que dans la ligue junior et meme la ...";
	$l_upcomingDraft = "Future choix au rep&ecirc;chage:";
	$l_fullDetails = "HockeysFuture.com";	
	$l_Year = "Ann&eacute;e";
	$l_Round = "Ronde";
	$l_OutsideLinks = "Liens :";
	$l_NoNotes = "Pas de notes disponibles";
	$l_Rights = "Droits appartient au";
	$l_profileedit = "Bio:";
	break;
}


$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : ParseSQL($_GET['player']);
}

$PID_GetPlayer = ParseSQL($PID_GetPlayer);


$query_GetPlayer = sprintf("SELECT * FROM prospects WHERE prospects.Name='%s'", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetInfo = sprintf("SELECT JuniorLeague FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$totalRows_GetInfo = mysql_num_rows($GetInfo);
$JuniorLeague = $row_GetInfo['JuniorLeague'];

$strPositions = "";
foreach( $a_Positions as $strKey => $strName ) {
	$strSelected = "";
	if( trim($row_GetPlayer[ 'Position' ]) == trim( $strKey ) ) {
		$strSelected = " selected=\"selected\"";
	}
	$strPositions .= '<OPTION VALUE = "' . $strKey . '"' . $strSelected . '>' . $strName . '</OPTION>';
}
			
// Create the grades combo box
$a_Grades = array();
$a_Grades[ "0.0" ]  = "0.0";
$a_Grades[ "0.5" ]  = "0.5";
$a_Grades[ "1.0" ]  = "1.0";
$a_Grades[ "1.5" ]  = "1.5";
$a_Grades[ "2.0" ]  = "2.0";
$a_Grades[ "2.5" ]  = "2.5";
$a_Grades[ "3.0" ]  = "3.0";
$a_Grades[ "3.5" ]  = "3.5";
$a_Grades[ "4.0" ]  = "4.0";
$a_Grades[ "4.5" ]  = "4.5";
$a_Grades[ "5.0" ]  = "5.0";
$a_Grades[ "5.5" ]  = "5.5";
$a_Grades[ "6.0" ]  = "6.0";
$a_Grades[ "6.5" ]  = "6.5";
$a_Grades[ "7.0" ]  = "7.0";
$a_Grades[ "7.5" ]  = "7.5";
$a_Grades[ "8.0" ]  = "8.0";
$a_Grades[ "8.5" ]  = "8.5";
$a_Grades[ "9.0" ]  = "9.0";
$a_Grades[ "9.5" ]  = "9.5";
$a_Grades[ "10.0" ] = "10.0";
$strGrades = "";
foreach( $a_Grades as $strKey => $strName ) {
	$strSelected = "";
	if( trim($row_GetPlayer[ 'ProspectGrade' ]) == trim( $strKey ) ) {
		$strSelected = " selected=\"selected\"";
	}
	$strGrades .= '<OPTION VALUE = "' . $strKey . '"' . $strSelected . '>' . $strName . '</OPTION>';
}

// Create the levels combo box
$a_Levels = array();
$a_Levels[ " " ] = " ";
$a_Levels[ "A" ] = "A";
$a_Levels[ "B" ] = "B";
$a_Levels[ "C" ] = "C";
$a_Levels[ "D" ] = "D";
$a_Levels[ "E" ] = "E";
$a_Levels[ "F" ] = "F";
$strLevels = "";
foreach( $a_Levels as $strKey => $strName ) {
	$strSelected = "";
	if( trim($row_GetPlayer[ 'ProspectLevel' ]) == trim( $strKey ) ) {
		$strSelected = " selected=\"selected\"";
	}
	$strLevels .= '<OPTION VALUE = "' . $strKey . '"' . $strSelected . '>' . $strName . '</OPTION>';
}		 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">   



<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("table").tablesorter(); 
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
    <form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
	<?php 
    if(isset($_SESSION['U_ID'])){
        if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
    ?>	
    	<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
        <tr>
        	<td id="PlayerProfile" style="background-color:#ededed; padding:6px; width:120px;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td><img src="<?php echo  imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px;vertical-align:top;">

				<h1><?php echo $l_Edit." : ".$row_GetPlayer['Name']; ?></h1>
				<br /><br />
				
                <div class="rowElem">
				<label for="NEW_PHOTO" style="width:80px; font-size:14px; ">Photo:</label>
				<input name="NEW_PHOTO" type="file" /><input type="hidden" name="PHOTO" value="<?php echo $row_GetPlayer['Photo']; ?>" /><?php echo $l_PhotoNote;?>
                </div>
            </td>
            </tr>
            </table>
            <br /><br />

		<table class="tablesorterRates" >
        <thead>
        <tr>
            <th><?php echo $l_Position;?></th>
            <th><?php echo $l_PotentialTitle;?></th>
            <th><?php echo $l_PotentialGradeTitle;?></th>
            <th><?php echo $l_DraftYear;?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><SELECT NAME="POSITION"><?php echo $strPositions; ?></SELECT></td>
            <td><SELECT NAME="GRADE"><?php echo $strGrades; ?></SELECT></td>
            <td><SELECT NAME="LEVEL"><?php echo $strLevels; ?></SELECT></td>
            <td><input type="text" maxlength="4" name="DRAFTYEAR" size="4" value="<?php echo $row_GetPlayer['DraftYear']; ?>" /></td>
         </tr>
         </tbody>
         </table>
         

		<?php if ($JuniorLeague == "False") { ?>
        <table width="100%">
        <tr><td valign="top">
            <strong><?php echo $l_PotentialTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" nowrap="nowrap" style="font-size:11px;">10 -</td><td style="font-size:11px;"><?php echo $l_Rank_10;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">9 -</td><td style="font-size:11px;"><?php echo $l_Rank_9;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">8 -</td><td style="font-size:11px;"><?php echo $l_Rank_8;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">7 -</td><td style="font-size:11px;"><?php echo $l_Rank_7;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">6 -</td><td style="font-size:11px;"><?php echo $l_Rank_6;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">5 -</td><td style="font-size:11px;"><?php echo $l_Rank_5;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">4 -</td><td style="font-size:11px;"><?php echo $l_Rank_4;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">3 -</td><td style="font-size:11px;"><?php echo $l_Rank_3;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">2 -</td><td style="font-size:11px;"><?php echo $l_Rank_2;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">1 -</td><td style="font-size:11px;"><?php echo $l_Rank_1;?></td></tr>
            </table>
            
        </td><td width="10"></td>
        <td valign="top">
            
            <strong><?php echo $l_PotentialGradeTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_Grade_A;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_Grade_B;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_Grade_C;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_Grade_D;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_Grade_E;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_Grade_F;?></td></tr>
            </table>
        </td>
        </tr>
        </table>

            <p ><a href="http://www.hockeysfuture.com/playerprojections/" target="_blank"><?php echo $l_fullDetails;?></a></p>
<?php } else { ?>

            <table width="100%">
        <tr><td valign="top">
            <strong><?php echo $l_PotentialTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" nowrap="nowrap" style="font-size:11px;">10 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_10;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">9 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_9;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">8 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_8;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">7 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_7;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">6 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_6;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">5 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_5;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">4 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_4;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">3 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_3;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">2 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_2;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">1 -</td><td style="font-size:11px;"><?php echo $l_J_Rank_1;?></td></tr>
            </table>
            
            
    </td><td width="10"></td>
        <td valign="top">
            
            <strong><?php echo $l_PotentialGradeTitle;?></strong><br />
            <table cellspacing="0" border="0" width="100%" class="tablesorterRates" >
			<tr><td valign="top" style="font-size:11px;">A -</td><td style="font-size:11px;"><?php echo $l_J_Grade_A;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">B -</td><td style="font-size:11px;"><?php echo $l_J_Grade_B;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">C -</td><td style="font-size:11px;"><?php echo $l_J_Grade_C;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">D -</td><td style="font-size:11px;"><?php echo $l_J_Grade_D;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">E -</td><td style="font-size:11px;"><?php echo $l_J_Grade_E;?></td></tr>
            <tr><td valign="top" style="font-size:11px;">F -</td><td style="font-size:11px;"><?php echo $l_J_Grade_F;?></td></tr>
            </table>
            </td>
        </tr>
        </table>
    <?php } ?>
    
          		<h3><?php echo $l_profileedit;?></h3>
                <br />
				<textarea name='BIO' cols='50' rows='10'><?php echo $row_GetPlayer['Bio']; ?></textarea>
				<script type="text/javascript" >
		   
						CKEDITOR.replace('BIO',{
							width: 950
					});
				</script>
				
       		<br />
			<div align="center">
            <input type="submit" value="<?php echo $l_Save;?>"  class='button save' />
            <input type="hidden" name="MM_update" value="form1">
		  	<input type="hidden" name="Player" value="<?php echo $PID_GetPlayer; ?>">
            </div>
		</form>


			<?php
                } else {
                    echo "<h1>Sorry</h1><p>You must log in to edit player information.</p>";
                }
            } else {
                echo "<h1>Sorry</h1><p>You must log in to edit player information.</p>";
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
mysql_free_result($GetPlayer);
?>