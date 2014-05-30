<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_InjuredReserve = "Injured Reserve";
	$l_Suspended = "Suspended";
	$l_Offer = "Offer Contract";
	$l_Deadline = "Deadline";
	$l_Signed = "Signed a contract";
	$l_Done = "Done";
	$l_OfferSent = "Offer&nbsp;Sheet&nbsp;Sent";
	$l_OfferAccepted = "Contract&nbsp;Accepted";
	$l_tab1 = "UFA's No Offers";
	$l_tab2 = "UFA's with Offers";
	$l_tab3 = "UFA's Deciding";
	$l_tab4 = "UFA's Signed";
	$l_Choose = "Choose Offer(s)";
	$l_Send = "Send Offer";
	$l_Sign = "Sign Offer";
	break; 

case 'fr': 
	$l_InjuredReserve = "Bless&eacute;";
	$l_Suspended = "Suspendu";
	$l_Offer = "Offre";
	$l_Deadline = "Date limite";
	$l_Signed = "A sign&eacute; un contrat.";
	$l_Done = "Finis";
	$l_OfferSent = "Feuille d'Offre Envoy&eacute;e";
	$l_OfferAccepted = "Offre Accept&eacute;e";
	$l_tab1 = "UFA Aucune Offre";
	$l_tab2 = "UFA Avec Offre";
	$l_tab3 = "UFA en R&eacute;flexion";
	$l_tab4 = "UFA &agrave;  Signer";
	$l_Choose = "Choisissez l'offre";
	$l_Send = "Envoyez l'offre";
	$l_Sign = "Signe";
	break;
} 


$query_GetInfo = sprintf("SELECT UFA, JuniorLeague FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$UFA=$row_GetInfo['UFA'];

$GetDateAge = mktime(0,0,0,date("m"),date("d")+1,date("Y")-$UFA);
$UFA_DATE=date("m/d/Y", $GetDateAge);
mysql_free_result($GetInfo);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_unassigned_players;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
        <h1><?php echo $l_nav_unassigned_players;?></h1> 
		<div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
            R = <?php echo $l_Rookie;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            ** = <?php echo $l_InjuredReserve ;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            *** = <?php echo $l_Suspended;?>
        </div>
        <br clear="all" />
       
		   <?php 
				$query_GetSkaters = sprintf("SELECT P.* FROM players as P WHERE (P.Contract=0 OR P.Team = 0) AND P.Retired=0 ORDER BY Overall desc" );
				$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
				$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
				$totalRows_GetSkaters = mysql_num_rows($GetSkaters);
				
				if ($totalRows_GetSkaters > 0) { 
			?>
            
             <div style="float:left;"><h3><?php echo $l_Skaters;?></h3></div>
                
            <br clear="all"/>   
            <table  cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
                    <th width="80"><a title="<?php echo $l_Positions;?>"><?php echo $l_Positions;?></a></th>
                    <th><a title="<?php echo $l_Age;?>"><?php echo $l_Age;?></a></th>
                    <th><a title="<?php echo $l_Country;?>">CTY</a></th>
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
                    <th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
                    <th><a title="<?php echo $l_OV_D;?>">OV</a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    do { 
                    ?>
                  <tr>
                    <td align="left">
                    	<a href="player.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a>
                    	<?php 
						if ($row_GetSkaters['Rookie'] == "True" || $row_GetSkaters['Rookie'] == "Vrai"){ echo "R&nbsp;";}
						if ($row_GetSkaters['Injury'] <> "") { echo "**&nbsp;"; }
						if ($row_GetSkaters['Suspension'] > 0){echo "***";}
						?>
                    </td>
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
                    <td align="center"><?php echo getAge($row_GetSkaters['AgeDate']);?></td>
                    <td align="center" width="16"><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetSkaters['Country']; ?>.png" border="0" width="16" height="16"></td>
                    <td align="center"><?php echo $row_GetSkaters['CK'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['FG'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['DI'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['SK'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['ST'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['EN'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['DU'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['PH'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['FO'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['PA'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['SC'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['DF'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['PS'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['EX'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['LD'];?></td>
                    <td align="center"><?php echo $row_GetSkaters['PO'];?></td>
                    <td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetSkaters['Overall'];} ?></td>
                  </tr>
                  <?php
                   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
                   ?>	
                 </table>
                <br />
                <?php } ?> 
                
                        
                 <?php 
					$query_GetGoalies = sprintf("SELECT G.* FROM goalies as G WHERE  (G.Contract=0 OR G.Team = 0) AND G.Retired=0 ORDER BY Overall desc");
					$GetGoalies = mysql_query($query_GetGoalies, $connection) or die(mysql_error());
					$row_GetGoalies = mysql_fetch_assoc($GetGoalies);
					$totalRows_GetGoalies = mysql_num_rows($GetGoalies);
					
					if ($totalRows_GetGoalies > 0) { 
				?>
                
                <div style="float:left;"><h3><?php echo $l_Goalies;?></h3></div>
                
                <div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
                    R = <?php echo $l_Rookie;?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    ** = <?php echo $l_InjuredReserve ;?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    *** = <?php echo $l_Suspended;?>
                </div>
                <br clear="all" />  
                <table cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_Age;?>"><?php echo $l_Age;?></a></th>
                    <th><a title="<?php echo $l_Country;?>">CTY</a></th>
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
                    <th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
                    <th><a title="<?php echo $l_OV_D;?>">OV</a></th>	
                </tr>
                </thead>
                <tbody>
                <?php
                    do { 
                    ?>
                  <tr>
                    <td align="left">
                    	<a href="goalie.php?player=<?php echo $row_GetGoalies['Number']; ?>"><?php echo $row_GetGoalies['Name']; ?></a>
                    	<?php 
						if ($row_GetGoalies['Rookie'] == "True" || $row_GetGoalies['Rookie'] == "Vrai"){ echo "R&nbsp;";}
						if ($row_GetGoalies['Injury'] <> "") { echo "**&nbsp;"; }
						if ($row_GetGoalies['Suspension'] > 0){echo "***";}
						?>
                    </td>		
                    <td align="center"><?php echo getAge($row_GetGoalies['AgeDate']);?></td>
                    <td align="center"><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetGoalies['Country']; ?>.png" border="0" width="16" height="16" /></td>
                    <td align="center"><?php echo $row_GetGoalies['SK'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['DU'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['EN'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['SZ'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['AG'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['RB'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['SC'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['HS'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['RT'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['PC'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['PS'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['EX'];?></td>
                    <td align="center"><?php echo $row_GetGoalies['LD'];?></td>	
                    <td align="center"><?php echo $row_GetGoalies['PO'];?></td>
                    <td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetGoalies['Overall'];} ?></td>
                    
                  </tr>
                  <?php 
                  } while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 
                  ?>
                </tbody>
                </table>
                <?php } ?>
                <br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
