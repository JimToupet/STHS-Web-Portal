<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_C  = "C";
	$l_LW  = "LW";
	$l_RW  = "RW";
	$l_D  = "D";
	$l_G  = "G";
break; 

case 'fr':  
	$l_C  = "C";
	$l_LW  = "AG";
	$l_RW  = "AD";
	$l_D  = "D";
	$l_G  = "G";
	break; 
} 

$SQL_STRING="";
$SORT = "Name";
if (isset($_POST['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_POST['sort'] : addslashes($_POST['sort']);
}
$GET_POSITION = "-";
if (isset($_POST['POSITION'])) {
  $GET_POSITION = (get_magic_quotes_gpc()) ? $_POST['POSITION'] : addslashes($_POST['POSITION']);
}
if ($GET_POSITION == 1){
	$SQL_STRING.=" AND PosC = 'True'";
} else if ($GET_POSITION == 2){
	$SQL_STRING.=" AND PosLW = 'True'";
} else if ($GET_POSITION == 3){
	$SQL_STRING.=" AND PosRW = 'True'";
} else if ($GET_POSITION == 4){
	$SQL_STRING.=" AND PosD = 'True'";
} else if ($GET_POSITION == 0){
	$SQL_STRING.=" AND (PosC = 'True' OR PosLW = 'True' OR PosRW = 'True' OR PosD = 'True') ";
} 

$GET_CONTRACT = "-";
if (isset($_POST['CONTRACT'])) {
  $GET_CONTRACT = (get_magic_quotes_gpc()) ? $_POST['CONTRACT'] : addslashes($_POST['CONTRACT']);
}
$SQL_STRING.=" AND Contract >=".$GET_CONTRACT;
$GET_SALARY = "-";
if (isset($_POST['SALARY'])) {
  $GET_SALARY = (get_magic_quotes_gpc()) ? $_POST['SALARY'] : addslashes($_POST['SALARY']);
}
$SQL_STRING.=" AND Salary1 >=".$GET_SALARY;
$GET_RATING = "-";
if (isset($_POST['RATING'])) {
  $GET_RATING = (get_magic_quotes_gpc()) ? $_POST['RATING'] : addslashes($_POST['RATING']);
}
$GET_VALUE = "-";
if (isset($_POST['VALUE'])) {
  $GET_VALUE = (get_magic_quotes_gpc()) ? $_POST['VALUE'] : addslashes($_POST['VALUE']);
}
$SQL_STRING.=" AND ".$GET_RATING." >= ".$GET_VALUE;

if ($GET_GetLetter == "All"){
	$GET_GetLetter="";
}

if ($GET_POSITION == 5){
	$query_GetSkaters = sprintf("SELECT * FROM goalies WHERE 1=1 ".$SQL_STRING." ORDER BY %s desc",$GET_RATING );
} else {
	$query_GetSkaters = sprintf("SELECT * FROM players WHERE 1=1 ".$SQL_STRING." ORDER BY %s desc",$GET_RATING );
}
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);


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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jQuery.bubbletip-1.0.6.js"></script>

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
    <h1><?php echo $l_nav_search;?></h1>
    
<?php if ($GET_POSITION == 5){ ?>
		<table  cellspacing="0" border="0" width="100%" class="tablesorter">
        <thead>
		<tr>
			<th><?php echo $l_Name;?></th>
			<th><a title="<?php echo $l_Age;?>"><?php echo $l_Age;?></a></th>	
			<th><a title="<?php echo $l_Country;?>"><?php echo $l_Country;?></a></th>
            <th><a title="<?php echo $l_SK_D;?>">SK</a></th>
			<th><a title="<?php echo $l_DU_D;?>">DU</a></th>
			<th><a title="<?php echo $l_EN_D;?>">EN</a></th>	
			<th><a title="<?php echo $l_SZ_D;?>">SZ</a></th>	
			<th><a title="<?php echo $l_AG_D;?>">AG</a></th>	
			<th><a title="<?php echo $l_RB_D;?>">RB</a></th>	
			<th><a title="<?php echo $l_STC_D;?>">SC</a></th>				
			<th><a title="<?php echo $l_HS_D;?>">HS</a></th>	
			<th><a title="<?php echo $l_RT_D;?>">RT</a></th>	
			<th><a title="<?php echo $l_PC_D;?>">PC</a></th>	
			<th><a title="<?php echo $l_PenS_D;?>">PS</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
		</tr>
        </thead>
		<tbody>
		<?php 
		if ($totalRows_GetSkaters > 0) {
			do { 
				?>
		  <tr>
			<td><a href="goalie.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a></td>
			<td align="center"><?php echo getAge($row_GetSkaters['AgeDate']); ?></td>
			<td align="center"><?php echo $row_GetSkaters['Country']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['SK']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['DU']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['EN']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['SZ']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['AG']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['RB']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['SC']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['HS']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['RT']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PC']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PS']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['EX']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['LD']; ?></td>			
			<td align="center"><?php echo $row_GetSkaters['MO']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PO']; ?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetSkaters['Overall'];} else { echo 0;} ?></td>
		</tr><?php 
		   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
		  }
		   ?>
		</tbody>
		</table>
        <br />
        
<?php } else { ?>
	<table  cellspacing="0" border="0" width="100%" class="tablesorter">
        <thead>
		<tr>
			<th><?php echo $l_Name;?></th>
			<th><a title="<?php echo $l_Position;?>">POS</a></th>
            <th><a title="<?php echo $l_Age;?>"><?php echo $l_Age;?></a></th>	
			<th><a title="<?php echo $l_Country;?>"><?php echo $l_Country;?></a></th>
			<th><a title="<?php echo $l_CK_D;?>">CK</a></th>
			<th><a title="<?php echo $l_FG_D;?>">FG</a></th>
			<th><a title="<?php echo $l_DI_D;?>">DI</a></th>	
			<th><a title="<?php echo $l_SK_D;?>">SK</a></th>	
			<th><a title="<?php echo $l_ST_D;?>">ST</a></th>	
			<th><a title="<?php echo $l_EN_D;?>">EN</a></th>	
			<th><a title="<?php echo $l_DU_D;?>">DU</a></th>				
			<th><a title="<?php echo $l_PH_D;?>">PH</a></th>	
			<th><a title="<?php echo $l_FO_D;?>">FO</a></th>	
			<th><a title="<?php echo $l_PA_D;?>">PA</a></th>	
			<th><a title="<?php echo $l_SC_D;?>">SC</a></th>	
			<th><a title="<?php echo $l_DF_D;?>">DF</a></th>	
			<th><a title="<?php echo $l_PenS_D;?>">PS</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
		</tr>
        </thead>
        <tbody>
		<?php 
		if ($totalRows_GetSkaters > 0) {
			do { 
				?>
		  <tr>
			<td><a href="player.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a></td>
			<td align="left">
           <?php 
			echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetSkaters['PosC'] == "True" || $row_GetSkaters['PosC'] == "Vrai"){
				echo $l_C;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetSkaters['PosLW'] == "True" || $row_GetSkaters['PosLW'] == "Vrai"){
				echo $l_LW;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetSkaters['PosRW'] == "True" || $row_GetSkaters['PosRW'] == "Vrai"){
				echo $l_RW;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetSkaters['PosD'] == "True" || $row_GetSkaters['PosD'] == "Vrai"){
				echo $l_D;
			} else { echo "&nbsp;"; }
			echo '</div>';
			?>
            </td>
			<td align="center"><?php echo getAge($row_GetSkaters['AgeDate']); ?></td>
			<td align="center"><?php echo $row_GetSkaters['Country']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['CK']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['FG']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['DI']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['SK']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['ST']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['EN']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['DU']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PH']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['FO']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PA']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['SC']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['DF']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PS']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['EX']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['LD']; ?></td>			
			<td align="center"><?php echo $row_GetSkaters['MO']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PO']; ?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetSkaters['Overall'];} ?></td>
		</tr>
		  <?php 
		   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
		  }
		   ?>
           </tbody>
		</table>

<?php } ?>
		<br /><br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
