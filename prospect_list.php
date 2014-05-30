<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_DraftYear   = "Draft Year";
	$l_Overall = "Overall Pick";
	$l_Rating = "Rating";
	$l_Total = "Total";
	$l_All = "All";
	break; 
	
case 'fr': 	
	$l_DraftYear   = "Ann&eacute;e Rep&ecirc;ch&eacute;e";
	$l_Overall = "Overall Pick";
	$l_Rating = "Cote";
	$l_Total = "Total de";
	$l_All = "Tous";
	break; 
} 

$GET_GetLetter = "A";
if (isset($_GET['letter'])) {
  $GET_GetLetter = (get_magic_quotes_gpc()) ? $_GET['letter'] : addslashes($_GET['letter']);
}
if ($GET_GetLetter == "All"){
	$GET_GetLetter="";
}


$query_GetSalarys = "SELECT prospects.*, proteam.City, proteam.Name as TeamName FROM prospects LEFT JOIN proteam ON prospects.TeamNumber=proteam.Number WHERE prospects.Name LIKE '".$GET_GetLetter."%' ORDER BY prospects.Name asc";
$GetSalarys = mysql_query($query_GetSalarys, $connection) or die(mysql_error());
$row_GetSalarys = mysql_fetch_assoc($GetSalarys);
$totalRows_GetSalarys = mysql_num_rows($GetSalarys);

$query_GetPlayerTotal = "SELECT COUNT(P_ID) as TotalRows FROM prospects";
$GetPlayerTotal = mysql_query($query_GetPlayerTotal, $connection) or die(mysql_error());
$row_GetPlayerTotal = mysql_fetch_assoc($GetPlayerTotal);

// Create the position references array
$a_Positions = array();
$a_Positions[ "" ]  = "N/A";
$a_Positions[ "2" ] = $l_LeftWing;
$a_Positions[ "3" ] = $l_RightWing;
$a_Positions[ "1"  ] = $l_Center;
$a_Positions[ "4"  ] = $l_Defence;
$a_Positions[ "5"  ] = $l_Goalie;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_prospect_list;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
    	
        <h1><?php echo $l_nav_prospect_list;?></h1>
        <br />
	
        <table cellpadding="3" cellspacing="0" border="0" width="100%">
        <tr>
            <td>
                    <a href="prospect_list.php?letter=All"><?php echo $l_All;?></a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=A">A</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=B">B</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=C">C</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=D">D</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=E">E</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=F">F</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=G">G</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=H">H</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=I">I</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=J">J</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=K">K</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=L">L</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=M">M</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=N">N</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=O">O</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=P">P</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=Q">Q</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=R">R</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=S">S</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=T">T</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=U">U</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=V">V</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=W">W</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=X">X</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=Y">Y</a>&nbsp;&nbsp;&nbsp;
                    <a href="prospect_list.php?letter=Z">Z</a>&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        </table>

		<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><?php echo $l_Name;?></th>
			<th><?php echo $l_Position;?></th>
			<th><?php echo $l_DraftYear;?></th>
			<th><?php echo $l_Overall;?></th>
            <th><?php echo $l_nav_team;?></th>
			<th><?php echo $l_Rating;?></th>
            <?php if ($_SESSION['U_Admin'] == 1){?>
            <th>ACTION</th>	
            <?php } ?>
		</tr>
        </thead>
        <tbody>
		<?php $tmpCount=0; do { ?>
		  <tr>
			<td><a href="prospect.php?player=<?php echo $row_GetSalarys['Name']; ?>"><?php echo $row_GetSalarys['Name']; ?></a></td>
			<td align="center"><?php echo $a_Positions[ $row_GetSalarys['Position'] ];?></td>
			<td align="center"><?php echo $row_GetSalarys['DraftYear']; ?></td>
			<td align="center"><?php echo $row_GetSalarys['OverallPick']; ?></td>
			<td align="center"><?php echo $row_GetSalarys['City']." ".$row_GetSalarys['TeamName']; ?></td>
			<td align="center"><?php echo $row_GetSalarys['ProspectGrade'] . $row_GetSalarys['ProspectLevel']; ?></td>
            <?php if ($_SESSION['U_Admin'] == 1){?>
			<td align="center"><a href="remove_prospect.php?player=<?php echo $row_GetSalarys['Name']; ?>&target=prospect_list.php"><?php echo $l_Remove; ?></a></td>
            <?php } ?>
		  </tr>
		  <?php 
		  $tmpCount = $tmpCount+1; 
		  } while ($row_GetSalarys = mysql_fetch_assoc($GetSalarys)); 
		  ?>	
          </tbody>
		</table>
		<br />
		<div align="center"><?php echo $l_Total." ".$row_GetPlayerTotal['TotalRows']; ?></div>
        <br /><br />
        
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
