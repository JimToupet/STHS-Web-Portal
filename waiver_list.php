<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_NewSalary = "New Salary";
	$l_Contract = "Contract";
	$l_Placed = "Placed on Waivers by";
	$l_By = "Claims";
	$l_DayPlaced = "Waived Date";
	$l_DayCleared = "Clear Date";
	$l_ViewClaims = "View Claim(s)";
	$l_Claim = "Claim Player";
	$l_Cleared = "Cleared Waivers";
	$l_Day = "Day";
	break; 

case 'fr': 
	$l_NewSalary = "Nouveau Salaire";
	$l_Contract = "Ann&eacute;e(s)";
	$l_Placed = "Envoy&eacute; au Ballottage par";
	$l_By = "R&eacute;clam&eacute; par";
	$l_DayPlaced = "Date plac&eacute;";
	$l_DayCleared = "Date restant";
	$l_ViewClaims = "View Claim(s)";
	$l_Claim = "Claim Player";
	$l_Cleared = "Cleared Waivers";
	$l_Day = "jour";
	break;
} 

$SID_GetScores = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetScores = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}

$query_GetSkaters = sprintf("SELECT w.*, p.Contract, p.Salary1, p.Name, p.Overall, p.Number, p.PosC, p.PosLW, p.PosRW, p.PosD, 'False' as PosG FROM waiver as w, players as p WHERE w.Player = p.Number AND w.FromTeam=p.Team UNION ALL SELECT w.*, g.Contract, g.Salary1, g.Name, g.Overall, g.Number, 'False' as PosC, 'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG FROM waiver as w, goalies as g WHERE (w.Player-10000) = g.Number AND w.FromTeam=g.Team ");
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);

$query_GetLastDay = sprintf("select schedule.Day FROM schedule WHERE (schedule.Play='TRUE' OR schedule.Play='Vrai') AND schedule.Season_ID=%s GROUP BY schedule.Day Desc Limit 0,1",$SID_GetScores);
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$CurrentDay = $row_GetLastDay['Day'];


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_waiver_list;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
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
        <h1><?php echo $l_nav_waiver_list;?></h1> 
        <br /> 
            <table  cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_Name;?></th>
                    <th width="100"><?php echo $l_Position;?></th>
                    <th><?php echo $l_Salary;?></td>	
                    <th width="60"><?php echo $l_Contract;?></td>	
                    <th width="80"><?php echo $l_DayPlaced;?></td>
                    <th><?php echo $l_DayCleared;?></td>
                    <th><?php echo $l_By;?></td>
                </tr>
                </thead>
                <tbody>
                <?php
                    if ($totalRows_GetSkaters > 0) {
					do { 
                       if($row_GetSkaters['PosG']=="True"){
							$tmpTargetFile="goalie.php";
						} else {
							$tmpTargetFile="player.php";
						}
                    ?>
                  <tr>
                    <td align="left"><a href="<?php echo $tmpTargetFile;?>?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a></td>
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
					echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
					if ($row_GetSkaters['PosG'] == "True" || $row_GetSkaters['PosG'] == "Vrai"){
						echo $l_G;
					} else { echo "&nbsp;"; }
					echo '</div>';
                    ?>
                    </td>
                    <td align="center">$<?php echo number_format($row_GetSkaters['Salary1'],0); ?></td>
					<td align="center"><?php echo $row_GetSkaters['Contract']; ?></td>
					<td align="center">Day&nbsp;<?php echo $row_GetSkaters['DayPutOnWaiver']; ?></td>
                    <td align="center">Day&nbsp;<?php echo $row_GetSkaters['DayRemoveFromWaiver'];?></td>
                     
					<td align="center">
                    <?php
						$query_GetClaims = sprintf("SELECT c.WC_ID, p.Abbre, p.Number FROM waiver_claims as c, waiver as w, proteam as p where c.Team=p.Number AND w.Player='%s' AND w.WID=c.W_ID ORDER BY p.Abbre",addslashes($row_GetSkaters['Player']) );
						$GetClaims = mysql_query($query_GetClaims, $connection) or die(mysql_error());
						$row_GetClaims = mysql_fetch_assoc($GetClaims);
						$totalRows_GetClaims = mysql_num_rows($GetClaims);
						if ($totalRows_GetClaims > 0) {
							$i=0;
							$tmpPlacedBid = 0;
							do {
								echo $row_GetClaims['Abbre'];
								$i=$i+1;
								if ($i < $totalRows_GetClaims){
									echo ", ";
								}
								if($row_GetClaims['Number']==$_SESSION['U_ID']){
									$tmpPlacedBid = 1;
								}
							} while ($row_GetClaims = mysql_fetch_assoc($GetClaims)); 
						} 
						if ($CurrentDay <= $row_GetSkaters['DayRemoveFromWaiver']){ 
							if($tmpPlacedBid==0 && $_SESSION['U_ID'] > 0){
								echo '&nbsp;&nbsp;<a href="waiver_action.php?id='.$row_GetSkaters['WID'].'&team='.$_SESSION['U_ID'].'&player='.$row_GetSkaters['Player'].'&action=claim">'.$l_Claim.'</a>';
							}
						} else {
							echo $l_Cleared;
							if($_SESSION['U_Admin']==1){
								echo '&nbsp; - &nbsp;<a href="waiver_action.php?id='.$row_GetSkaters['WID'].'&team='.$_SESSION['U_ID'].'&player='.$row_GetSkaters['Player'].'&action=decline">'.$l_Remove.'</a>';	
							}
						}
						?>
                    </td>
                  </tr>
                  <?php
                   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
				   }
                   ?>	
                 </table>
                <br />
                
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
