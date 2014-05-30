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
	$l_tab1 = "UFA's No Offers";
	$l_tab2 = "UFA's with Offers";
	$l_tab3 = "UFA's Deciding";
	$l_tab4 = "UFA's Signed";
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
	$l_tab1 = "UFA Aucune Offre";
	$l_tab2 = "UFA Avec Offre";
	$l_tab3 = "UFA en R&eacute;flexion";
	$l_tab4 = "UFA &agrave;  Signer";
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
<title><?php echo $l_nav_unrestricted_free_agents;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
	
   $(".choose_offer").live('click', function()
	{
		var ID = $(this).attr("id");
		var player = $(this).attr("player");
		var type = $(this).attr("type");
		
		$.ajax({
			type: "POST",
			url: "sign_offer.php",
			data: "player="+ player +"&type="+type, 
			cache: false,
			success: function(html){
				$("#FreeAgent_"+ID).remove();
			}
		});
		return false;
	});
});	
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
    <h1><?php echo $l_nav_unrestricted_free_agents;?></h1> 
       <br /><br clear="all" />
        
        <ul>
              <li><a href="ufa-free-agents.php"><?php echo $l_tab1; ?></a></li>
              <li><a href="ufa-free-agents_w_offer.php"><?php echo $l_tab2; ?></a></li>
              <li id="selected"><a href="ufa-free-agents_decide.php"><?php echo $l_tab3; ?></a></li>
              <li><a href="ufa-free-agents_signed.php"><?php echo $l_tab4; ?></a></li>
        </ul>
		
        <div id="tab-content">
			
            <?php 
				$query_GetSkaters = sprintf("SELECT P.* FROM players as P WHERE Exists (SELECT O.Team as Teams FROM playerscontractoffers AS O WHERE O.Player=P.Number AND O.Type='Offer Sheet Final') AND Not Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=P.Number AND E.PlayerType <> 'goalie') AND P.Retired=0 ORDER BY Overall desc" );
				$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
				$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
				$totalRows_GetSkaters = mysql_num_rows($GetSkaters);
				
				$rowCount=0;
				if ($totalRows_GetSkaters > 0) {
			?>
                
            <div style="float:left;"><h3><?php echo $l_Skaters;?></h3></div>

            <br clear="all"/>    
                        
            <table  cellspacing="0" border="0" width="100%" class="tablesorter">
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th width="120"><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
                    <th><a title="<?php echo $l_Positions;?>">POS</a></th>
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
                    <th width="100">OFFERS</th>
                    <th width="30">TIME</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$tmpRowColor="000000";
					$tmpRowCount=0;
					$contractAccepted=0;
					do { 
						$rowCount = $rowCount + 1;
                        if ($tmpRowCount==1){
							$tmpRowColor="E9ECF3";
							$tmpRowCount=0;
						} else {
							$tmpRowColor="FFFFFF";
							$tmpRowCount=1;
						}
						
						$query_GetEndDate= sprintf("SELECT O.DateCreated FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By O.DateCreated asc Limit 0,1", $row_GetSkaters['Number'] );
						$GetEndDate = mysql_query($query_GetEndDate, $connection) or die(mysql_error());
						$row_GetEndDate = mysql_fetch_assoc($GetEndDate);
						
						$query_GetStatus= sprintf("SELECT O.Type, O.PR_ID, O.Team, T.Abbre, T.Name FROM playerscontractoffers AS O, proteam AS T WHERE O.Player='%s' AND O.Team=T.Number Order By T.Name asc", $row_GetSkaters['Number'] );
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
                    <td align="left"><a href="player.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a></td>
                    <td align="center">
                    <?php
					if ($row_GetSkaters['PosC'] == "True" || $row_GetSkaters['PosC'] == "Vrai"){
						echo '<div style="clear:all;">'.$l_C.'</div>';
					}
					if ($row_GetSkaters['PosLW'] == "True" || $row_GetSkaters['PosLW'] == "Vrai"){
						echo '<div style="clear:all;">'.$l_LW.'</div>';
					}
					if ($row_GetSkaters['PosRW'] == "True" || $row_GetSkaters['PosRW'] == "Vrai"){
						echo '<div style="clear:all;">'.$l_RW.'</div>';
					}
					if ($row_GetSkaters['PosD'] == "True" || $row_GetSkaters['PosD'] == "Vrai"){
						echo '<div style="clear:all;">'.$l_D.'</div>';
					} 
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
                    <td style="text-align:center" valign="top">
						<?php 
                            $TeamOfferList = "0";
							$tmp_PR_ID=0;
							$tmpCount=0;
							do { 
								$tmpCount=$tmpCount+1;
								$TeamOfferList = $TeamOfferList.",".$row_GetStatus['Team'];
								echo $row_GetStatus['Abbre'];
								if($totalRows_GetStatus > $tmpCount){
									echo ", ";
								}
								if ($_SESSION['U_ID']==$row_GetStatus['Team']){
									$tmp_PR_ID=$row_GetStatus['PR_ID'];
								}
							} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
							mysql_free_result($GetStatus);
							mysql_free_result($GetEndDate);
							
							if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
								echo " = " . $tmpCount;
                        	} 
							
							//echo "<br />";
							if(isset($_SESSION['U_ID']) && $contractAccepted==0 && $_SESSION['U_ID'] <> ""){
								$tmp_PlacedBid = 0;
								$TeamOfferList = explode(",",$TeamOfferList);
								foreach ($TeamOfferList as $color ){
									if ($color == $_SESSION['U_ID']){$tmp_PlacedBid = 1;}
								}
								if ($tmp_PlacedBid == 0 && $contractAccepted==0){
									echo '';
								} else {
									echo $row_GetStatus['City'].' <a href="edit_offerSheet.php?player='.$row_GetSkaters['Number'].'&type=player&target=1&id='.$tmp_PR_ID.'">'.$l_Edit.'</a> | <a href="remove_offer_sheet.php?player='.$row_GetSkaters['Number'].'&id='.$tmp_PR_ID.'&type=player">'.$l_Remove.'</a>';
								}
							}
                        ?>
                        </td>
                         <td style="text-align:right;" valign="top"  nowrap>
                        <?php 
						if($contractAccepted==1 && $_SESSION['U_Admin']==1){
							echo '<a href="#" id="'.$rowCount.'"  player="'.$row_GetSkaters['Number'].'" type="player" class="choose_offer">'.$l_Sign.'</a>';
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
							
							$timediff = dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $newDate);
							
							
							if ($newDate < strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))){
                            	echo "Finished";
							} else {
								echo $timediff;
							}
                        }
						?></td>
                  </tr>
                  <?php
                   } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
                   ?>	
                 </table>
                <br />
                <?php } ?>
                
                <?php 
					$query_GetGoalies = sprintf("SELECT G.* FROM goalies as G WHERE Exists (SELECT O.Team as Teams FROM playerscontractoffers AS O WHERE O.Player=G.Number AND O.Type='Goalie Offer Sheet Final') AND Not Exists (SELECT 1 FROM playersextensionoffers AS E WHERE E.Player=G.Number AND E.PlayerType = 'goalie') AND G.Retired=0 ORDER BY Overall desc");
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
                    <th width="120"><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
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
                    <th width="100">OFFERS</th>
                    <th width="30">TIME</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$tmpRowColor="000000";
					$tmpRowCount=0;
					$contractAccepted=0;
                    do { 
						$rowCount = $rowCount + 1;
                        if ($tmpRowCount==1){
							$tmpRowColor="E9ECF3";
							$tmpRowCount=0;
						} else {
							$tmpRowColor="FFFFFF";
							$tmpRowCount=1;
						}
						
						$query_GetEndDate= sprintf("SELECT O.DateCreated FROM playerscontractoffers AS O, proteam AS T WHERE O.Player=%s AND O.Team=T.Number Order By O.DateCreated asc Limit 0,1",$row_GetGoalies['Number'] );
						$GetEndDate = mysql_query($query_GetEndDate, $connection) or die(mysql_error());
						$row_GetEndDate = mysql_fetch_assoc($GetEndDate);
						
						$query_GetStatus= sprintf("SELECT O.Type, O.DateCreated, O.PR_ID, O.Team, T.Abbre FROM playerscontractoffers AS O, proteam AS T WHERE O.Player=%s AND O.Team=T.Number Order By T.City asc",$row_GetGoalies['Number'] );
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
                    <td align="center">
					<?php 
                        $TeamOfferList = "0";
						$tmp_PR_ID=0;
						$tmpCount=0;
						do { 
							$tmpCount=$tmpCount+1;
							$TeamOfferList = $TeamOfferList.",".$row_GetStatus['Team'];
							echo $row_GetStatus['Abbre'];
							if($totalRows_GetStatus > $tmpCount){
								echo ", ";
							}
							if ($_SESSION['U_ID']==$row_GetStatus['Team']){
								$tmp_PR_ID=$row_GetStatus['PR_ID'];
							}
						} while ($row_GetStatus = mysql_fetch_assoc($GetStatus)); 
						mysql_free_result($GetStatus);
						mysql_free_result($GetEndDate);
						
						if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
							echo " = " . $tmpCount;
						} 
						
						if($contractAccepted==0){
							if ($_SESSION['U_ID'] <> ""){
								if (!stristr($TeamOfferList,$_SESSION['U_ID']) && $contractAccepted==0){
									//echo '';
								} else {
									echo $row_GetStatus['City'].' <a href="edit_offerSheet.php?player='.$row_GetGoalies['Number'].'&id='.$tmp_PR_ID.'&type=goalie&target=2&contract=final">'.$l_Edit.'</a> | <a href="remove_offer_sheet.php?player='.$row_GetGoalies['Number'].'&type=goalie&id='.$tmp_PR_ID.'">'.$l_Remove.'</a>';
								}
							}
						}
                    ?>
                    </td>
                    <td style="text-align:right;" valign="top"  nowrap>
                    <?php 
						if($contractAccepted==1 && $_SESSION['U_Admin']==1){
							echo '<a href="#" id="'.$rowCount.'"  player="'.$row_GetGoalies['Number'].'" type="goalie" class="choose_offer">'.$l_Sign.'</a>';
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
							
							$timediff = dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $newDate);
							
							if ($newDate < strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))){
                            	echo "Finished";
							} else {
								echo $timediff;
							}
                        }
						?></td>
                  </tr>
                  <?php 
                  } while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 
                  ?>
                </tbody>
                </table>
                <br />
       			<?php } ?>
            	</div>
              
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
