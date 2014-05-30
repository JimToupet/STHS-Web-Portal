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
	$l_DraftYear   = "Ann&eacute;e Repecher";
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


$query_GetSalarys = "SELECT Number, Name, Team, Status1, AgeDate, PosRW, PosLW, PosC, PosD, 'False' as PosG, Country, Injury, Salary1, Contract FROM players WHERE Retired = 0 AND Name LIKE '".$GET_GetLetter."%' UNION ALL SELECT Number, Name, Team, Status1, AgeDate, 'False' as PosRW, 'False' as PosLW, 'False' as PosC, 'False' as PosD, 'True' as PosG, Country, Injury, Salary1, Contract FROM goalies WHERE Retired = 0 AND  Name LIKE '".$GET_GetLetter."%' ORDER BY Name asc";
$GetSalarys = mysql_query($query_GetSalarys, $connection) or die(mysql_error());
$row_GetSalarys = mysql_fetch_assoc($GetSalarys);
$totalRows_GetSalarys = mysql_num_rows($GetSalarys);

$query_GetPlayerTotal = "SELECT COUNT(ID) as TotalRows FROM players";
$GetPlayerTotal = mysql_query($query_GetPlayerTotal, $connection) or die(mysql_error());
$row_GetPlayerTotal = mysql_fetch_assoc($GetPlayerTotal);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_player_lists;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    	
        <h1><?php echo $l_nav_player_lists;?></h1>
        <br />
	
        <table cellpadding="3" cellspacing="0" border="0" width="100%">
        <tr>
            <td>
                    <a href="player_list.php?letter=All"><?php echo $l_All;?></a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=A">A</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=B">B</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=C">C</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=D">D</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=E">E</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=F">F</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=G">G</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=H">H</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=I">I</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=J">J</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=K">K</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=L">L</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=M">M</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=N">N</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=O">O</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=P">P</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=Q">Q</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=R">R</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=S">S</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=T">T</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=U">U</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=V">V</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=W">W</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=X">X</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=Y">Y</a>&nbsp;&nbsp;&nbsp;
                    <a href="player_list.php?letter=Z">Z</a>&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        </table>

		<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><?php echo $l_Name;?></th>
			<th><?php echo $l_Position;?></th>
			<th><?php echo $l_Country;?></th>
			<th><?php echo $l_Age;?></th>	
			<th><?php echo $l_nav_team;?></th>
			<th><?php echo $l_Salary;?></th>	
			<th><?php echo $l_Contract;?></th>	
		</tr>
        </thead>
        <tbody>
		<?php do { 
				if ($row_GetSalarys['PosG'] == "True" || $row_GetSalarys['PosG'] == "Vrai"){
					$tmpTarget="goalie.php";
				} else {
					$tmpTarget="player.php";
				}
		?>
		  <tr>
			<td><a href="<?php echo $tmpTarget; ?>?player=<?php echo $row_GetSalarys['Number']; ?>"><?php echo $row_GetSalarys['Name']; ?></a></td>
			<td align="center"><?php 
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSalarys['PosC'] == "True" || $row_GetSalarys['PosC'] == "Vrai"){
						echo $l_C;
					} else { echo "&nbsp;"; }
					echo '</div>';
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSalarys['PosLW'] == "True" || $row_GetSalarys['PosLW'] == "Vrai"){
						echo $l_LW;
					} else { echo "&nbsp;"; }
					echo '</div>';
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSalarys['PosRW'] == "True" || $row_GetSalarys['PosRW'] == "Vrai"){
						echo $l_RW;
					} else { echo "&nbsp;"; }
					echo '</div>';
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSalarys['PosD'] == "True" || $row_GetSalarys['PosD'] == "Vrai"){
						echo $l_D;
					} else { echo "&nbsp;"; }
					echo '</div>';
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSalarys['PosG'] == "True" || $row_GetSalarys['PosG'] == "Vrai"){
						echo $l_G;					
					} else { echo "&nbsp;"; }
					echo '</div>';
					?>
			</td>
			<td align="center"><?php echo $row_GetSalarys['Country']; ?>&nbsp;<img height="12" width="12" src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetSalarys['Country']; ?>.png" border="0"/></td>
			<td align="center"><?php echo getAge($row_GetSalarys['AgeDate']); ?></td>
			<td align="center"><?php 
				if ($row_GetSalarys['Contract'] > 0){
					if ($row_GetSalarys['Status1']  <= 1){
						$query_GetTeam = sprintf("SELECT Number, Name FROM farmteam WHERE Number=%s",$row_GetSalarys['Team']);
						$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
						$row_GetTeam = mysql_fetch_assoc($GetTeam);
						echo "<a href='farm_roster.php?team=".$row_GetSalarys['Team']."'>".$row_GetTeam['Name']."</a>";
					} else {
						$query_GetTeam = sprintf("SELECT City, Number, Name FROM proteam WHERE Number=%s",$row_GetSalarys['Team']);
						$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
						$row_GetTeam = mysql_fetch_assoc($GetTeam);
						echo "<a href='pro_roster.php?team=".$row_GetSalarys['Team']."'>".$row_GetTeam['City']." ".$row_GetTeam['Name']."</a>";
					}
					
				} else {
					echo "Free Agent";
				}
			?></td>
			<td align="center">$<?php echo number_format($row_GetSalarys['Salary1'],0); ?></td>
			<td align="center"><?php echo $row_GetSalarys['Contract']; ?></td>
		  </tr>
		  <?php } while ($row_GetSalarys = mysql_fetch_assoc($GetSalarys)); ?>	
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
