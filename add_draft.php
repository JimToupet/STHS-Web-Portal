<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Edit Draft";
	$l_Title  = "DRAFT TITLE";
	$l_Summary  = "TYPE";
	$l_Season  = "SEASON";
	$l_Lottery  = "Lottery Winner";
	$l_Ranking = "Draft Order";
	$l_Champs  = "League Champions";
	$l_Loosers  = "Lost in Championship Finals";
	$l_STHSYear = "STHS Generated Year";
	$l_DateCreated  = "START DATE";
	$lTime  = "TIME BETWEEN PICKS";
	$l_Submit  = "SUBMIT";
	$l_minperpick = "minutes per pick";
	$l_Order = "Team Order";
	$l_OrderNote = "The order of the draft is based on the standings of the selected season.";
	$l_Alert1 = "Please enter a title.  Please keep the title lest than 30 characters.";
	$l_Alert2 = "Please select a season.";
	$l_Instructions = "The season will determine the order of the draft picks.  If the order of the team standings changes after this, please go into the EDIT DRAFT page and UPDATE the draft so the order of the draft will relect the final team standings.";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un rep&ecirc;chage";
	$l_Title  = "Titre";
	$l_Summary  = "Sommaire";
	$$l_Season  = "Saison";
	$l_Lottery  = "Gagnant de la loterie";
	$l_Ranking = "Ordre d'&eacute;bauche";
	$l_Champs  = "Champions de la ligue";
	$l_Loosers  = "Perdu dans les finales de la coupe";
	$l_STHSYear = "Ann&eacute;e produite par la STHS";
	$l_DateCreated  = "Date";
	$lTime  = "Temps allouer entre les choix";
	$l_Submit  = "POSTER";
	$l_minperpick = "minutes par choix";
	$l_Order = "Ordre des &eacute;quipes";
	$l_OrderNote = "L'ordre de l'&eacute;bauche et baser sur le classement de la saison s&eacute;lectionner.";
	$l_Alert1 = "Veuillez &eacute;crire un titre.  SVP Gardez le titre &agrave; moins de 30 caract&egrave;res.";
	$l_Alert2 = "SVP S&eacute;lectionnez une saison.";
	$l_Instructions = "La saison va d&eacute;terminer l’ordre du rep&ecirc;chage. Si le classement des &eacute;quipes change apr&egrave;s, svp aller a la page d’&eacute;dition du rep&ecirc;chage (EDIT DRAFT page) et faites la mise &agrave; jour du rep&ecirc;chage pour que l’ordre du rep&ecirc;chage soit refl&eacute;ter dans le classement final des &eacute;quipes.";
	break;
} 
 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	$insertSQL = sprintf("INSERT INTO draft (DraftName,DraftPickTime,Year,Season_ID,LotteryWinner,DraftStatus) values (%s,%s,%s,%s,%s,'False')",
							GetSQLValueString($_POST['DraftName'], "text"),
							GetSQLValueString($_POST['DraftPickTime'], "text"),
							GetSQLValueString($_POST['Year'], "int"),
							GetSQLValueString($_POST['Season_ID'], "int"),
							GetSQLValueString($_POST['LotteryWinner'], "int"));
	  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$tmpSeason=$_POST['Season_ID'];
include("update_draft_order.php");

  	$updateGoTo = "entry_draft.php";
 
   if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$query_GetSeasonsList = sprintf("SELECT * FROM seasons WHERE SeasonType=1 ORDER by Season desc");
$GetSeasonsList = mysql_query($query_GetSeasonsList, $connection) or die(mysql_error());
$row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList);
$totalRows_GetSeasonsList = mysql_num_rows($GetSeasonsList);

$query_GetDraftYear = sprintf("SELECT Year FROM draftpicks group by Year Order By Year");
$GetDraftYear = mysql_query($query_GetDraftYear, $connection) or die(mysql_error());
$row_GetDraftYear = mysql_fetch_assoc($GetDraftYear);
$totalRows_GetDraftYear = mysql_num_rows($GetDraftYear);

$query_GetTeam2 = sprintf("SELECT City, Name, Number FROM proteam ORDER by City");
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
$totalRows_GetTeam2 = mysql_num_rows($GetTeam2);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $_SESSION['SiteName'] ; ?></title>

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
  $('.date-pick').datePicker().val(new Date().asString()).trigger('change');
});;
</script>
<script language="javascript">
function checkit(){
	if (document.form1.DraftName.value.length==0){
		alert("<?php echo $l_Alert1;?>");
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
<form method="post" name="form" id="form" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>
<div class="rowElem">
<label for="DraftName"><?php echo $l_Title;?>:</label>
<input type="text" name="DraftName" size="30" value="<?php echo $_SESSION['current_Season'];?> Prospect Draft" size="30">
</div>

<div class="rowElem">
<label for="LotteryWinner"><?php echo $l_Lottery ;?>:</label>
<select name="LotteryWinner" size="1"><option value="0"><?php echo $l_None; ?></option>
    <?php do { ?>
    <option value="<?php echo $row_GetTeam2['Number']; ?>"><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></option>
    <?php } while ($row_GetTeam2 = mysql_fetch_assoc($GetTeam2)); ?>
      </select>
</div>

<div class="rowElem">
<label for="Season_ID"><?php echo $l_Ranking;?>:</label>
<select name="Season_ID" size="1">
 <?php do { ?>
  <option value="<?php echo $row_GetSeasonsList['Season']; ?>" <?php if($row_GetSeasonsList['Season']==($_SESSION['current_Season']-1)){ echo 'selected';}?>><?php echo $row_GetSeasonsList['Season']; ?></option>
<?php } while ($row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList)); ?>
  </select>
  &nbsp;<sub><?php echo $l_OrderNote;?></sub>
</div>

<div class="rowElem">
<label for="Year"><?php echo $l_STHSYear;?>:</label>
<select name="Year" size="1">
 <?php do { 
 
$query_CheckDraftPicks = sprintf("SELECT * FROM draft WHERE Year=%s",$row_GetDraftYear['Year']);
$CheckDraftPicks = mysql_query($query_CheckDraftPicks, $connection) or die(mysql_error());
$row_CheckDraftPicks = mysql_fetch_assoc($CheckDraftPicks);
$totalRows_CheckDraftPicks = mysql_num_rows($CheckDraftPicks);

	do { 
		if($row_CheckDraftPicks['Year']!=$row_GetDraftYear['Year']){
			echo '<option value="'.$row_GetDraftYear['Year'].'">Year '.$row_GetDraftYear['Year'].'</option>';
		}
	} while ($row_CheckDraftPicks = mysql_fetch_assoc($CheckDraftPicks));
	
  ?>
<?php } while ($row_GetDraftYear = mysql_fetch_assoc($GetDraftYear)); ?>
  </select>
</div>

<div class="rowElem">
<label for="DraftPickTime"><?php echo $lTime;?>:</label>
<select name="DraftPickTime" size="1">
  <option value="5">5 <?php echo $l_minperpick;?></option>
  <option value="10" selected="selected">10 <?php echo $l_minperpick;?></option>
  <option value="15">15 <?php echo $l_minperpick;?></option><option value="30">30 <?php echo $l_minperpick;?></option><option value="60">60 <?php echo $l_minperpick;?></option>
  </select>
</div>

<br clear="all" /><div align="center"><input type="submit" value="<?php echo $l_Submit;?>" class="button add"></div><br />

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
