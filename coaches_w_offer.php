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

	$(".choose_offer").live('click', function()
	{
		var ID = $(this).attr("id");
		var player = $(this).attr("player");
		var type = $(this).attr("type");
		$.ajax({
			type: "POST",
			url: "choose_final_3_coach_offers.php",
			data: "player="+ player, 
			cache: false,
			success: function(html){
				$("#FreeAgent_"+ID).remove();
			}
		});
		return false;
	});
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
              <li><a href="coaches.php"><?php echo $l_tab1; ?></a></li>
              <li id="selected"><a href="coaches_w_offer.php"><?php echo $l_tab2; ?></a></li>
              <li><a href="coaches_decide.php"><?php echo $l_tab3; ?></a></li>
              <li><a href="coaches_signed.php"><?php echo $l_tab4; ?></a></li>
        </ul>
		
        <div id="tab-content">
			<?php 
			
				$query_GetCoaches = sprintf("SELECT P.* FROM coaches as P WHERE Exists (SELECT O.Team as Teams FROM playerscontractoffers AS O WHERE O.Player=P.Number AND O.Type='Coach Offer Sheet') ORDER BY LD desc" );
				$GetCoaches = mysql_query($query_GetCoaches, $connection) or die(mysql_error());
				$row_GetCoaches = mysql_fetch_assoc($GetCoaches);
				$totalRows_GetCoaches = mysql_num_rows($GetCoaches);
				
				$rowCount=0;
				if ($totalRows_GetCoaches > 0) {
			?>
            
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
            <th>OFFERS</th>
            <th>Date</th>
		</tr>
        </thead>
        <tbody>
		<?php 
		$contractAccepted=0;
			do { 
				$rowCount = $rowCount + 1;
				$query_GetEndDate= sprintf("SELECT O.DateCreated FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By O.DateCreated Desc Limit 0,1",addslashes($row_GetCoaches['Number']) );
				$GetEndDate = mysql_query($query_GetEndDate, $connection) or die(mysql_error());
				$row_GetEndDate = mysql_fetch_assoc($GetEndDate);
				
				$query_GetStatus= sprintf("SELECT O.Type, O.DateCreated, O.PR_ID, O.Team, T.Abbre FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By T.City asc",addslashes($row_GetCoaches['Number']) );
				$GetStatus = mysql_query($query_GetStatus, $connection) or die(mysql_error());
				$row_GetStatus = mysql_fetch_assoc($GetStatus);
				$totalRows_GetStatus = mysql_num_rows($GetStatus);
				
				$timeStamp = strtotime($row_GetEndDate['DateCreated']);
				$timeStamp2 = $timeStamp + 24 * 60 * 60 * 1;
				$newDate = date("Y-m-d H:i:s", $timeStamp2);
				
				if ($newDate > strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))){
					$contractAccepted=0;
				} else {
					$contractAccepted=1;
				}
		?>
		  <tr id="FreeAgent_<?php echo $rowCount;?>">
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
			<td style="text-align:center" valign="top">
					<?php 
                        $TeamOfferList = "0";
						$tmp_PR_ID=0;
						$tmpCount=0;
						do { 
							$tmpCount=$tmpCount+1;
							$TeamOfferList = $TeamOfferList.",".$row_GetStatus['Team'];
							//echo $row_GetStatus['Abbre'];
							//if($totalRows_GetStatus > $tmpCount){
								//echo ", ";
							//}
							if ($_SESSION['U_ID']==$row_GetStatus['Team']){
								$tmp_PR_ID=$row_GetStatus['PR_ID'];
							}
						} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
						mysql_free_result($GetStatus);
						mysql_free_result($GetEndDate);
                        
						//echo "<br />";
                        if($contractAccepted==0 && $_SESSION['U_ID'] <> ""){
							$tmp_PlacedBid = 0;
							$TeamOfferList = explode(",",$TeamOfferList);
							foreach ($TeamOfferList as $color ){
								if ($color == $_SESSION['U_ID']){$tmp_PlacedBid = 1;}
							}
							if ($tmp_PlacedBid == 0 && $contractAccepted==0){
								echo '<a href="coach_offer_sheet.php?coach='.$row_GetCoaches['Number'].'">'.$l_Send.'</a>';
							} else {
								echo $row_GetStatus['City'].' <a href="edit_coach_offer_sheet.php?coach='.$row_GetCoaches['Number'].'&target=1&id='.$tmp_PR_ID.'">'.$l_Edit.'</a> | <a href="remove_coach_offer_sheet.php?coach='.$row_GetCoaches['Number'].'&id='.$tmp_PR_ID.'">'.$l_Remove.'</a>';
							}
						}
                        ?>
                        </td>
                        <td align="right" valign="top" nowrap="nowrap">
						<?php 
                        if($contractAccepted==1 && $_SESSION['U_Admin']==1){
							echo '<a href="sign_coach_offer.php" id="'.$rowCount.'" player="'.$row_GetCoaches['Number'].'" type="coach" class="choose_offer">'.$l_Choose.'</a>';
                        } else {
							$myDate1 = strftime('%d', strtotime('now'));
							$myDate2 = date("d", $timeStamp2);
							if($myDate2 - $myDate1 == 0){	
								$mytime1 = strftime('%H:%M:%S', strtotime('now'));
								$mytime2 = date("H:i:s", $timeStamp2);
								$timediff = getMyTimeDiff($mytime1,$mytime2);
							} else {
								$timediff = $myDate2 - $myDate1. "&nbsp;day(s)";
							}
							
							if ($newDate < strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))){
                            	echo "Finished";
							} else {
								echo $timediff;
							}
                        }?></td>
		  </tr>
		  <?php } while ($row_GetCoaches = mysql_fetch_assoc($GetCoaches)); ?>	
        </tbody>
		</table>
        <?php } ?></div>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
