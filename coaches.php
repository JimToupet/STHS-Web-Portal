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
	$l_PHY_D = "Physical";
	$l_OF_D = "Offense";
	$l_DF_D = "Defense";
	$l_PD_D = "Player Discipline";
	$l_tab1 = "Coaches No Offers";
	$l_tab2 = "Coaches with Offers";
	$l_tab3 = "Coaches Deciding";
	$l_tab4 = "Coaches Signed";
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
	$l_PHY_D = "Physical"; 
	$l_OF_D = "Offensif"; 
	$l_DF_D = "D&eacute;fense"; 
	$l_PD_D = "Discipline des joueurs";
	$l_tab1 = "Entraineur Sans Offre";
	$l_tab2 = "Entraineur Avec Offre";
	$l_tab3 = "Entraineur en R&eacute;flexion";
	$l_tab4 = "Entraineur &agrave;  Signer";
	$l_Choose = "Choisissez l'offre";
	$l_Send = "Envoyez l'offre";
	$l_Sign = "Signe";
	break;
} 

$SORT = "Name";
if (isset($_GET['sort'])) {
  $SORT = (get_magic_quotes_gpc()) ? $_GET['sort'] : addslashes($_GET['sort']);
}

$query_GetCoaches = sprintf("SELECT P.* FROM coaches as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number) AND P.Contract=0 OR P.Team = '' ORDER BY LD desc");
$GetCoaches = mysql_query($query_GetCoaches, $connection) or die(mysql_error());
$row_GetCoaches = mysql_fetch_assoc($GetCoaches);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_coaches;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
   		<h1><?php echo $l_nav_coaches;?></h1>
        <br /><br clear="all" />
        
        <ul>
              <li id="selected"><a href="coaches.php"><?php echo $l_tab1; ?></a></li>
              <li><a href="coaches_w_offer.php"><?php echo $l_tab2; ?></a></li>
              <li><a href="coaches_decide.php"><?php echo $l_tab3; ?></a></li>
              <li><a href="coaches_signed.php"><?php echo $l_tab4; ?></a></li>
        </ul>
		
        <div id="tab-content">

		<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th><a><?php echo $l_Name;?></a></th>
			<th><a title="<?php echo $l_Country;?>"><?php echo $l_Country;?></a></th>
			<th><a title="<?php echo $l_PHY_D;?>">PH</a></th>
			<th><a title="<?php echo $l_DF_D;?>">DF</a></th>
			<th><a title="<?php echo $l_OF_D;?>">OF</a></th>
			<th><a title="<?php echo $l_PD_D;?>">PD</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>	
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>
			<th><a title="<?php echo $l_Age;?>"><?php echo $l_Age;?></a></th>	
            <th>OFFER</th>
		</tr>
        </thead>
        <tbody>
		<?php 
		$tmpRowColor="000000";
		$contractAccepted=0;
			do { 
				$contractAccepted=0;
				 $query_GetStatus= sprintf("SELECT Type, DateCreated, PR_ID FROM playerscontractoffers WHERE Player='%s' Order By DateCreated Desc Limit 0,1",addslashes($row_GetCoaches['Number']) );
				$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
				$row_GetStatus = mysql_fetch_assoc($GetStatus);
				$totalRows_GetStatus = mysql_num_rows($GetStatus);
			   
			   
				if ($row_GetStatus['Type'] == 'Coach Offer Sheet'){ 
					$timeStamp = strtotime($row_GetStatus['OfferDate']);
					$timeStamp += 24 * 60 * 60 * 2; // (add 7 days)
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
		  <tr bgcolor="#<?php echo $tmpRowColor;  ?>" >
			<td><a href="coach.php?coach=<?php echo $row_GetCoaches['Number']; ?>"><?php echo $row_GetCoaches['Name']; ?></a></td>
			<td align="center"><?php echo $row_GetCoaches['Country']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['PH']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['DF']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['OF']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['PD']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['EX']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['LD']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['PO']; ?></td>
			<td align="center"><?php echo $row_GetCoaches['Age']; ?></td>
			<td align="right" nowrap="nowrap">
			<?php if ($_SESSION['U_ID'] <> ""){ ?>
                <a href="coach_offer_sheet.php?coach=<?php echo $row_GetCoaches['Number']; ?>" ><?php echo $l_Send;?></a>
            <?php } ?></td>
		  </tr>
		  <?php } while ($row_GetCoaches = mysql_fetch_assoc($GetCoaches)); ?>	
        </tbody>
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
