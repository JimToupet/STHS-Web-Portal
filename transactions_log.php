<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Approve = "Approved";
	$l_NoTrade = "No&nbsp;Trade";
	break; 
	
case 'fr': 
	$l_Approve = "Approuv&eacute;e";
	$l_NoTrade = "A annonc&eacute; sa Retraite";
	break; 
} 

$SORT = "DateCreated";
if (isset($_GET['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_GET['sort'] : addslashes($_GET['sort']);
}

$query_GetTransactions = sprintf("SELECT o.*, 'False' as PosG, p.Number FROM playerscontractoffers as o, players as p WHERE o.Player=p.Number AND (o.Type='Extension' OR o.Type='Signed') AND o.Approved='True' UNION ALL SELECT o.*, 'True' as PosG, p.Number FROM playerscontractoffers as o, goalies as p WHERE o.Player=p.Number AND (o.Type='Extension' OR o.Type='Signed') AND o.Approved='True' ORDER BY DateCreated");
$GetTransactions = mysql_query($query_GetTransactions, $connection) or die(mysql_error());
$row_GetTransactions = mysql_fetch_assoc($GetTransactions);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_transactions_log;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <h1><?php echo $l_nav_transactions_log;?></h1>
		<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><?php echo $l_Name;?></th>
			<th><?php echo $l_nav_team;?></th>
			<th>Type</th>
			<th width="60"><?php echo $l_Contract;?></th>
			<th><?php echo $l_Salary;?></th>
			<th width="70"><?php echo $l_NoTrade;?></th>
			<th width="70"><?php echo $l_Approve?></th>
			<th width="120" align="right">Date</th>
		</tr>
        </thead>
        <tbody>
		<?php do { 
			if($row_GetTransactions['PosG']=="True"){
				$tmpTargetFile="goalie.php";
			} else {
				$tmpTargetFile="player.php";
			}
			?>
		  <tr>
			<td><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetTransactions['Number']; ?>"><?php echo $row_GetTransactions['Player']; ?></a></td>
			<td align="center" <?php if ($SORT=="Team") echo"bgcolor='#cccccc'" ?>><?php
			$query_GetStandings = sprintf("SELECT Name FROM proteam WHERE Number='%s'",$row_GetTransactions['Team']);
			$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
			$row_GetStandings = mysql_fetch_assoc($GetStandings);
			$totalRows_GetStandings = mysql_num_rows($GetStandings);

			if($totalRows_GetStandings > 0){
				echo $row_GetStandings['Name'];
			} else {
			 	echo $row_GetTransactions['Team']; 
			}			 
			 ?></td>
			<td align="center" <?php if ($SORT=="Type") echo"bgcolor='#cccccc'" ?>><?php echo $row_GetTransactions['Type']; ?></td>
			<td align="center" <?php if ($SORT=="Contract") echo"bgcolor='#cccccc'" ?>><?php echo $row_GetTransactions['Contract']; ?></td>
			<td align="center" <?php if ($SORT=="Salary") echo"bgcolor='#cccccc'" ?>>$<?php echo number_format(($row_GetTransactions['Salary1']+$row_GetTransactions['Salary2']+$row_GetTransactions['Salary3']+$row_GetTransactions['Salary4']+$row_GetTransactions['Salary5']+$row_GetTransactions['Salary6']+$row_GetTransactions['Salary7']+$row_GetTransactions['Salary8']+$row_GetTransactions['Salary9']+$row_GetTransactions['Salary10']),0); ?></td>
			<td align="center" <?php if ($SORT=="Contract") echo"bgcolor='#cccccc'" ?>><?php if ($row_GetTransactions['NoTrade']==1){ echo "True"; } else { echo "False"; }  ?></td>
			<td align="center" <?php if ($SORT=="Approved") echo"bgcolor='#cccccc'" ?>><?php echo $row_GetTransactions['Approved']; ?></td>
			<td align="center" <?php if ($SORT=="DateCreated") echo"bgcolor='#cccccc'" ?>><?php echo $row_GetTransactions['DateCreated']; ?></td>
		  </tr>
		  <?php } while ($row_GetTransactions = mysql_fetch_assoc($GetTransactions)); ?>	
		</tbody>
        </table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetTransactions);
?>