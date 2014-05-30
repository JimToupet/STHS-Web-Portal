<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_DraftYear   = "Draft Year";
	$l_Rating = "Rating";
	$l_Total = "Total";
	$l_All = "All";
	break; 
	
case 'fr': 	
	$l_DraftYear   = "Ann&eacute;e Repecher";
	$l_Rating = "Cote";
	$l_Total = "Total de";
	$l_All = "Tous";
	break; 
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_search;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_search;?></h1><br />

<div style="float:left; width:450px; display:block;">
<h3>SKATERS</h3><br />
<form id="form1" name="form1" method="post" action="search_results.php">
<div class="rowElem">
<label for="POSITION"><?php echo $l_Position;?>:</label>
      <select name="POSITION" size="1" id="POSITION" tabindex="1">
         <option value="0" selected="selected">All</option>
         <option value="1"><?php echo $l_Center;?></option>
        <option value="2"><?php echo $l_LeftWing;?></option>
        <option value="3"><?php echo $l_RightWing;?></option>
        <option value="4"><?php echo $l_Defence;?></option>
      </select>
</div>

<div class="rowElem">
<label for="CONTRACT"><?php echo $l_Contract;?>:</label>
<select name="CONTRACT" size="1" id="CONTRACT" tabindex="3">
         <option value="0" selected="selected">Greater than 0 years</option>
         <option value="1">Greater than 1 year</option>
        <option value="2">Greater than 2 years</option>
        <option value="3">Greater than 3 years</option>
        <option value="4">Greater than 4 years</option>
      </select>
</div>

<div class="rowElem">
<label for="SALARY"><?php echo $l_Salary;?>:</label>
    <td><select name="SALARY" size="1" id="SALARY" tabindex="4">
         <option value="0" selected="selected">Greater than $0</option>
         <option value="450000">Greater than $450,000</option>
        <option value="1000000">Greater than $1,000,000</option>
        <option value="2000000">Greater than $2,000,000</option>
        <option value="3000000">Greater than $3,000,000</option>
        <option value="4000000">Greater than $4,000,000</option>
        <option value="5000000">Greater than $5,000,000</option>
      </select>
</div>

<div class="rowElem">
<label for="RATING">Rating:</label>
<select name="RATING" size="1" id="RATING" tabindex="5">
         <option value="Overall" selected="selected">Overall</option>
         <option value="PO">Potential</option>
        <option value="LD">Leadership</option>
        <option value="EX">Experience</option>
        <option value="PS">Pentalty Shot</option>
        <option value="DF">Defence</option>
        <option value="SC">Scoring</option>
        <option value="PA">Passing</option>
        <option value="FO">Face Off</option>
        <option value="PH">Puck Handling</option>
        <option value="EN">Endurance</option>
        <option value="DU">Durability</option>
        <option value="ST">Strength</option>
        <option value="SK">Skating</option>
        <option value="DI">Disipline</option>
        <option value="FG">Fighting</option>
        <option value="CK">Checking</option>
      </select>
</div>

<div class="rowElem">
<label for="VALUE">Rating Value:</label>
<select name="VALUE" size="1" id="VALUE" tabindex="6">
         <option value="50" selected="selected">Great than 50</option>
         <option value="55">Greater than 55</option>
        <option value="60">Greater than 60</option>
        <option value="65">Greater than 65</option>
        <option value="70">Greater than 70</option>
        <option value="75">Greater than 75</option>
        <option value="80">Greater than 80</option>
      </select>
</div>
<div class="rowElem">
<label for="VALUE"></label><input name="SUBMIT" type="submit" value="<?php echo $l_nav_search;?>" class="button" /></div>
<br /><br />
</form>
</div>


<div style="float:right; width:450px; display:block;">
<h3>GOALIES</h3><br />
<form id="form1" name="form1" method="post" action="search_results.php">
<div class="rowElem">
<label for="POSITION"><?php echo $l_Position;?>:</label>
      <select name="POSITION" size="1" id="POSITION" tabindex="1">
        <option value="5"><?php echo $l_Goalie;?></option>
      </select>
</div>

<div class="rowElem">
<label for="CONTRACT"><?php echo $l_Contract;?>:</label>
<select name="CONTRACT" size="1" id="CONTRACT" tabindex="3">
         <option value="0" selected="selected">Greater than 0 years</option>
         <option value="1">Greater than 1 year</option>
        <option value="2">Greater than 2 years</option>
        <option value="3">Greater than 3 years</option>
        <option value="4">Greater than 4 years</option>
      </select>
</div>

<div class="rowElem">
<label for="SALARY"><?php echo $l_Salary;?>:</label>
    <td><select name="SALARY" size="1" id="SALARY" tabindex="4">
         <option value="0" selected="selected">Greater than $0</option>
         <option value="450000">Greater than $450,000</option>
        <option value="1000000">Greater than $1,000,000</option>
        <option value="2000000">Greater than $2,000,000</option>
        <option value="3000000">Greater than $3,000,000</option>
        <option value="4000000">Greater than $4,000,000</option>
        <option value="5000000">Greater than $5,000,000</option>
      </select>
</div>

<div class="rowElem">
<label for="RATING">Rating:</label>
<select name="RATING" size="1" id="RATING" tabindex="5">
         <option value="Overall" selected="selected">Overall</option>
         <option value="PO">Potential</option>
        <option value="LD">Leadership</option>
        <option value="EX">Experience</option>
        <option value="PS">Pentalty Shot</option>
        <option value="PC">Puck Control</option>
        <option value="RT">Reaction Time</option>
        <option value="HS">Hand Speed</option>
        <option value="SC">Style Control</option>
        <option value="RB">Rebound Control</option>
        <option value="AG">Agility</option>
        <option value="SZ">Size</option>
        <option value="EN">Endurance</option>
        <option value="DU">Durability</option>
        <option value="SK">Skating</option>
      </select>
</div>

<div class="rowElem">
<label for="VALUE">Rating Value:</label>
<select name="VALUE" size="1" id="VALUE" tabindex="6">
         <option value="50" selected="selected">Great than 50</option>
         <option value="55">Greater than 55</option>
        <option value="60">Greater than 60</option>
        <option value="65">Greater than 65</option>
        <option value="70">Greater than 70</option>
        <option value="75">Greater than 75</option>
        <option value="80">Greater than 80</option>
      </select>
</div>
<div class="rowElem">
<label for="VALUE"></label><input name="SUBMIT" type="submit" value="<?php echo $l_nav_search;?>" class="button" /></div>
<br /><br />
</form>
</div>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
