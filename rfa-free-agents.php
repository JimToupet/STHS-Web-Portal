<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Offer = "Offer Contract";
	$l_Deadline = "Deadline";
	$l_Signed = "Signed a contract";
	$l_Done = "Done";
	$l_OfferSent = "Offer&nbsp;Sheet&nbsp;Sent";
	$l_OfferAccepted = "Contract&nbsp;Accepted";
	$l_tab1 = "RFA's No Offers";
	$l_tab2 = "RFA's with Offers";
	$l_tab3 = "RFA's Deciding";
	$l_tab4 = "RFA's Signed";
	$l_Choose = "Choose Offer(s)";
	$l_Send = "Send Offer";
	$l_Sign = "Sign Offer";
	break; 

case 'fr': 
	$l_Offer = "Offre";
	$l_Deadline = "Date limite";
	$l_Signed = "A sign&eacute; un contrat.";
	$l_Done = "Finis";
	$l_OfferSent = "Feuille d'Offre Envoy&eacute;e";
	$l_OfferAccepted = "Offre Accept&eacute;e";
	$l_tab1 = "RFA's Sans Offre";
	$l_tab2 = "RFA's Avec Offre";
	$l_tab3 = "RFA's en R&eacute;flexion";
	$l_tab4 = "RFA's &agrave;  Signer";
	$l_Choose = "Choisissez l'offre";
	$l_Send = "Envoyez l'offre";
	$l_Sign = "Signe";
	break;
} 

$UFA=26;

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
<title><?php echo $l_nav_restricted_free_agents;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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

section ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

section li {
	display: inline;
	border: 1px solid;
	border-bottom-width: 0;
	padding:10px;
	border-color:#a7a7a7;
	text-align:center;
	background-color:#e6e6e6;
}

section li a {
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;
}

section li a:hover {
	color:#<?php echo $_SESSION['current_SecondaryColor']; ?>;
}

section #selected {
	background: white;
}

#tab-content {
	border: 1px solid;
	border-color:#a7a7a7;
	margin-top:10px;
	padding:10px;	
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
        <h1><?php echo $l_nav_restricted_free_agents;?></h1> 
        <br /><br clear="all" />
        
        <ul>
              <li id="selected"><a href="rfa-free-agents.php"><?php echo $l_tab1; ?></a></li>
              <li><a href="rfa-free-agents_w_offer.php"><?php echo $l_tab2; ?></a></li>
              <li><a href="rfa-free-agents_decide.php"><?php echo $l_tab3; ?></a></li>
              <li><a href="rfa-free-agents_signed.php"><?php echo $l_tab4; ?></a></li>
        </ul>
		
        <div id="tab-content">
		   <?php 
				$query_GetSkaters = sprintf("SELECT P.* FROM players as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number) AND Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=P.Number AND E.PlayerType <> 'goalie') AND P.Age < ".$UFA." AND P.Retired=0 AND P.Contract=0 AND P.Team > 0 ORDER BY Overall desc" );
				//$query_GetSkaters = sprintf("SELECT P.* FROM players as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number) AND P.Age < ".$UFA." AND P.Retired=0 AND P.Contract=0 AND P.Team > 0 ORDER BY Overall desc" );
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
                    <th width="30">TIME</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    do { 
                        $contractAccepted=0;
                        
                        $query_GetStatus= sprintf("SELECT Type, DateCreated, PR_ID FROM playerscontractoffers WHERE Player='%s' Order By DateCreated Desc Limit 0,1",addslashes($row_GetSkaters['Name']) );
                        $GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
                        $row_GetStatus = mysql_fetch_assoc($GetStatus);
                        $totalRows_GetStatus = mysql_num_rows($GetStatus);
                            
                        if ($row_GetStatus['Type'] == 'Offer Sheet'){ 
                            $timeStamp = strtotime($row_GetStatus['DateCreated']);
                            $timeStamp += 24 * 60 * 60 * 1; // (add 7 days)
                            $newDate = date("Y-m-d", $timeStamp);
                            if ($newDate > strftime('%Y-%m-%d', strtotime('now'))){
                                $tmpRowColor="FFFF00"; 
                                $contractAccepted=0;
                            } else {
                                $tmpRowColor="FF99FF"; 
                                $contractAccepted=1;
                            }
                        }
                    ?>
                  <tr>
                    <td align="left"><a href="player.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a></td>
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
                    <td align="right" nowrap="nowrap">
                        <?php if ($_SESSION['U_ID'] <> ""){ ?>
							<a href="restricted_offerSheet.php?player=<?php echo $row_GetSkaters['Number']; ?>&type=player" ><?php echo $l_Send;?></a>
						<?php } ?></td>
                  </tr>
                  <?php mysql_free_result($GetStatus);
                   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
                   ?>	
                 </table>
                <br />
                <?php } ?> 
                
                        
                 <?php
					$query_GetGoalies = sprintf("SELECT G.* FROM goalies as G WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=G.Number) AND Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=G.Number AND E.PlayerType = 'goalie') AND G.Age < ".$UFA." AND G.Retired=0 AND G.Contract=0 AND G.Team > 0 ORDER BY Overall desc");
					//$query_GetGoalies = sprintf("SELECT G.* FROM goalies as G WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=G.Number) AND G.Age < ".$UFA." AND G.Retired=0 AND G.Contract=0 AND G.Team > 0 ORDER BY Overall desc");
					$GetGoalies = mysql_query($query_GetGoalies, $connection) or die(mysql_error());
					$row_GetGoalies = mysql_fetch_assoc($GetGoalies);
					$totalRows_GetGoalies = mysql_num_rows($GetGoalies);
					
					if ($totalRows_GetGoalies > 0) { 
				?>
                
                <div style="float:left;"><h3><?php echo $l_Goalies;?></h3></div>
                
                <br clear="all"/>   
                <table cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
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
                    <th>OFFER</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    do { 
                        $contractAccepted=0;
                        $query_GetStatus= sprintf("SELECT Type, DateCreated, PR_ID FROM playerscontractoffers WHERE Player='%s' Order By DateCreated Desc Limit 0,1",addslashes($row_GetGoalies['Name']) );
                        $GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
                        $row_GetStatus = mysql_fetch_assoc($GetStatus);
                        $totalRows_GetStatus = mysql_num_rows($GetStatus);
                        
                        if ($row_GetStatus['Type'] == 'Offer Sheet'){ 
                            $timeStamp = strtotime($row_GetStatus['DateCreated']);
                            $timeStamp += 24 * 60 * 60 * 1; // (add 7 days)
                            $newDate = date("Y-m-d", $timeStamp);
                            if ($newDate > strftime('%Y-%m-%d', strtotime('now'))){
                                $tmpRowColor="FFFF00"; 
                                $contractAccepted=0;
                            } else {
                                $tmpRowColor="FF99FF"; 
                                $contractAccepted=1;
                            }
                        }
                    ?>
                  <tr>
                    <td align="left"><a href="goalie.php?player=<?php echo $row_GetGoalies['Number']; ?>"><?php echo $row_GetGoalies['Name']; ?></a></td>
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
                    <td align="right" nowrap="nowrap">
                        <?php if ($_SESSION['U_ID'] <> ""){ ?>
							<a href="restricted_offerSheet.php?player=<?php echo $row_GetGoalies['Number']; ?>&type=goalie" ><?php echo $l_Send;?></a>
						<?php } ?></td>
                  </tr>
                  <?php 
                  mysql_free_result($GetStatus);
                  } while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 
                  ?>
                </tbody>
                </table>
                <?php } ?>
                <br />
                </div>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
