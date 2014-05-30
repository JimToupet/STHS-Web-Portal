<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_RemoveAll = "Remove All";
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
	$l_RemoveAll = "SUPPRIMER All";
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
  $("#tabs").ttabs(); 
  $("table").tablesorter(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;	
</script>

<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to clear this log?")) {
    document.location = delUrl;
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
              <li><a href="rfa-free-agents.php"><?php echo $l_tab1; ?></a></li>
              <li><a href="rfa-free-agents_w_offer.php"><?php echo $l_tab2; ?></a></li>
              <li><a href="rfa-free-agents_decide.php"><?php echo $l_tab3; ?></a></li>
              <li id="selected"><a href="rfa-free-agents_signed.php"><?php echo $l_tab4; ?></a></li>
        </ul>
		
        <div id="tab-content">
            <?php
			 	$query_GetSkatersSigned = sprintf("SELECT P.Name, P.Number, O.*, T.Abbre FROM playerscontractoffers AS O, proteam as T, players as P WHERE O.Player=P.Number AND O.Team=T.Number AND O.Type='RFA Signed' AND P.Retired=0 ORDER BY T.City, O.DateCreated");
				$GetSkatersSigned = mysql_query($query_GetSkatersSigned, $connection) or die(mysql_error());
				$row_GetSkatersSigned = mysql_fetch_assoc($GetSkatersSigned);
				$totalRows_GetSkatersSigned = mysql_num_rows($GetSkatersSigned);
				
              ?>
               <div style="float:left;"><h3><?php echo $l_Skaters;?></h3></div>
           		<br clear="all"/>    
              <table cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_Name;?></th>
                    <th><?php echo $l_nav_team;?></th>
                    <th><?php echo $l_Year; ?> 1</th>
                    <th><?php echo $l_Year; ?> 2</th>
                    <th><?php echo $l_Year; ?> 3</th>
                    <th><?php echo $l_Year; ?> 4</th>
                    <th><?php echo $l_Year; ?> 5</th>
                    <th><?php echo $l_Year; ?> 6</th>
                    <th><?php echo $l_Year; ?> 7</th>
                    <th><?php echo $l_Year; ?> 8</th>
                    <th><?php echo $l_Year; ?> 9</th>
                    <th><?php echo $l_Year; ?> 10</th>
                    <th><?php echo $l_NoTrade; ?></th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if ($totalRows_GetSkatersSigned > 0) {
			  	$contractAccepted=0;
                do { 
                ?>
                <tr>
                    <td valign="top"><a href="player.php?team=<?php echo $_SESSION['current_Team_ID']; ?>&player=<?php echo $row_GetSkatersSigned['Number']; ?>"><?php echo $row_GetSkatersSigned['Name']; ?></a></td>
                    <td style="text-align:center" valign="top"><?php echo $row_GetSkatersSigned['Abbre']; ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary1'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary2'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary3'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary4'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary5'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary6'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary7'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary8'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary9'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetSkatersSigned['Salary10'],0); ?></td>
                    <td style="text-align:center" valign="top"><?php if($row_GetSkatersSigned['NoTrade']==1){echo "True";}else{echo "False";} ?></td>
                    <td style="text-align:center" valign="top">
                    <?php 
                    if ($_SESSION['U_Admin']==1){ 
                        echo '<a href="remove_rfa_offer_sheet.php?player='.$row_GetSkatersSigned['Player'].'&id='.$row_GetSkatersSigned['PR_ID'].'">'.$l_Remove.'</a>';
                    } else {
						echo $row_GetSkatersSigned['DateCreated'];
					}
                    ?></td>
                </tr>
                <?php
				if($row_GetSkatersSigned['Compensation'] != "None"){ echo "<tr><td colspan=2></td><td colspan=11>Compensation = ".$row_GetSkatersSigned['Compensation']."</td><td></td></tr>"; } 
                } while ($row_GetSkatersSigned = mysql_fetch_assoc($GetSkatersSigned)); 
				}
                ?>
                </tbody>
                <?php  if ($_SESSION['U_Admin']==1){ ?>
                <tfoot> 
                <tr>
                	<td colspan="14" align="right"><a href="javascript:confirmDelete('remove_all_rfa_offer_sheet.php');"><strong><?php echo $l_RemoveAll;?></strong></a></td>
                  </tr>
              	</tfoot>              	
                <?php } ?>
                </table>
                <br />
                
                <?php
			 	$query_GetGoaliesSigned = sprintf("SELECT G.Name, G.Number, O.*, T.Abbre FROM playerscontractoffers AS O, proteam as T, goalies as G WHERE O.Player=G.Number AND O.Team=T.Number AND O.Type='RFA Goalie Signed' AND G.Retired=0 ORDER BY T.City, O.DateCreated");
				$GetGoaliesSigned = mysql_query($query_GetGoaliesSigned, $connection) or die(mysql_error());
				$row_GetGoaliesSigned = mysql_fetch_assoc($GetGoaliesSigned);
				$totalRows_GetGoaliesSigned = mysql_num_rows($GetGoaliesSigned);
				
              ?>
               <div style="float:left;"><h3><?php echo $l_Goalies;?></h3></div>
				<br clear="all"/>    
              <table cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_Name;?></th>
                    <th><?php echo $l_nav_team;?></th>
                    <th><?php echo $l_Year; ?> 1</th>
                    <th><?php echo $l_Year; ?> 2</th>
                    <th><?php echo $l_Year; ?> 3</th>
                    <th><?php echo $l_Year; ?> 4</th>
                    <th><?php echo $l_Year; ?> 5</th>
                    <th><?php echo $l_Year; ?> 6</th>
                    <th><?php echo $l_Year; ?> 7</th>
                    <th><?php echo $l_Year; ?> 8</th>
                    <th><?php echo $l_Year; ?> 9</th>
                    <th><?php echo $l_Year; ?> 10</th>
                    <th><?php echo $l_NoTrade; ?></th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if ($totalRows_GetGoaliesSigned > 0) {
			  	$contractAccepted=0;
                do { 
                ?>
                <tr>
                    <td valign="top"><a href="player.php?team=<?php echo $_SESSION['current_Team_ID']; ?>&player=<?php echo $row_GetGoaliesSigned['Number']; ?>"><?php echo $row_GetGoaliesSigned['Name']; ?></a></td>
                    <td style="text-align:center" valign="top"><?php echo $row_GetGoaliesSigned['Abbre']; ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary1'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary2'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary3'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary4'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary5'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary6'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary7'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary8'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary9'],0); ?></td>
                    <td style="text-align:center" valign="top">$<?php echo number_format($row_GetGoaliesSigned['Salary10'],0); ?></td>
                    <td style="text-align:center" valign="top"><?php if($row_GetGoaliesSigned['NoTrade']==1){echo "True";}else{echo "False";} ?></td>
                    <td style="text-align:center" valign="top">
                    <?php 
                    if ($_SESSION['U_Admin']==1){ 
                        echo '<a href="remove_rfa_offer_sheet.php?player='.$row_GetGoaliesSigned['Player'].'&id='.$row_GetGoaliesSigned['PR_ID'].'">'.$l_Remove.'</a>';
                    } else {
						echo $row_GetGoaliesSigned['DateCreated'];
					}
                    ?></td>
                </tr>
                <?php
				if($row_GetGoaliesSigned['Compensation'] != "None"){ echo "<tr><td colspan=14>Compensation = ".$row_GetGoaliesSigned['Compensation']."</td></tr>"; } 
                } while ($row_GetGoaliesSigned = mysql_fetch_assoc($GetGoaliesSigned)); 
				}
                ?>
                </tbody>                
                <?php  if ($_SESSION['U_Admin']==1){ ?>
                <tfoot> 
                <tr>
                	<td colspan="14" align="right"><a href="javascript:confirmDelete('remove_all_rfa_offer_sheet.php');"><strong><?php echo $l_RemoveAll;?></strong></a></td>
                  </tr>
              	</tfoot>
                <?php } ?>
                </table>
             </div>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
