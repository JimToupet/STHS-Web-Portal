<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_TeamAverage = "TEAM AVERAGE";
	$l_InjuredReserve = "Injured Reserve";
	$l_Suspended = "Suspended";
	$l_Captain = "Captain";
	$l_AssistantCaptain = "Assistant Captain";
	$l_Jersey = "Jersey Number";
	break; 

case 'fr': 
	$l_TeamAverage = "Moyenne d'&eacute;quipe";
	$l_InjuredReserve = "Bless&eacute;";
	$l_Suspended = "Suspendu";
	$l_Captain = "Capitaine";
	$l_AssistantCaptain = "Assistant Capitaine";
	$l_Jersey = "Numero du chandail";
	break;
} 

$SID_GetTop5 = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $SID_GetTop5 = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}


$query_GetSkaters = sprintf("SELECT * FROM players WHERE Team=%s AND Status0=1 AND Retired=0 ORDER BY Overall desc", $_SESSION['current_Team_ID']);
$GetSkaters = mysql_query($query_GetSkaters, $connection) or die(mysql_error());
$row_GetSkaters = mysql_fetch_assoc($GetSkaters);
$totalRows_GetSkaters = mysql_num_rows($GetSkaters);

$query_GetScratched = sprintf("SELECT * FROM players WHERE Team=%s AND Status0=0 AND Retired=0 ORDER BY Overall desc", $_SESSION['current_Team_ID']);
$GetScratched = mysql_query($query_GetScratched, $connection) or die(mysql_error());
$row_GetScratched = mysql_fetch_assoc($GetScratched);
$totalRows_GetScratched = mysql_num_rows($GetScratched);

$query_GetGoalies = sprintf("SELECT * FROM goalies WHERE Team=%s AND Status1=1 AND Retired=0 ORDER BY Overall desc", $_SESSION['current_Team_ID']);
$GetGoalies = mysql_query($query_GetGoalies, $connection) or die(mysql_error());
$row_GetGoalies = mysql_fetch_assoc($GetGoalies);
$totalRows_GetGoalies = mysql_num_rows($GetGoalies);

$query_GetGScratched = sprintf("SELECT * FROM goalies WHERE Team=%s AND Status1=0  AND Retired=0 ORDER BY Overall desc", $_SESSION['current_Team_ID']);
$GetGScratched = mysql_query($query_GetGScratched, $connection) or die(mysql_error());
$row_GetGScratched = mysql_fetch_assoc($GetGScratched);
$totalRows_GetGScratched = mysql_num_rows($GetGScratched);

$query_GetLeaders = sprintf("SELECT Captain, Assistant1, Assistant2 FROM farmteamstandings WHERE Number=%s AND Season_ID=%s", $_SESSION['current_Team_ID'],$SID_GetTop5);
$GetLeaders = mysql_query($query_GetLeaders, $connection) or die(mysql_error());
$row_GetLeaders = mysql_fetch_assoc($GetLeaders);

$query_GetCoach = sprintf("SELECT * FROM coaches WHERE Team='%s' AND coaches.FarmPro='Farm' ", $_SESSION['current_Farm_Team'] );
$GetCoach = mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach = mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach = mysql_num_rows($GetCoach);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $_SESSION['current_Farm_Team'];?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jQuery.bubbletip-1.0.6.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<link href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip-IE.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("table").tablesorter(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
<?php 
for ( $counter = 1; $counter < ($totalRows_GetSkaters+$totalRows_GetScratched); $counter += 1) {
	echo "$('#f".$counter."_up').bubbletip($('#photo".$counter."_up'), {
	calculateOnShow:'true'
	});";
}
for ( $counter = 1; $counter <= ($totalRows_GetGoalies+$totalRows_GetGScratched); $counter += 1) {
	echo "$('#g".$counter."_up').bubbletip($('#gphoto".$counter."_up'), {
	calculateOnShow:'true'
	});";
}
for ( $counter = 1; $counter <= $totalRows_GetCoach; $counter += 1) {
	echo "$('#c".$counter."_up').bubbletip($('#cphoto".$counter."_up'), {
	calculateOnShow:'true'
	});";
}
?>
});;
</script>

<style media="all" type="text/css">

#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_Farm_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {	background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown li.headlink ul { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown li.headlink:hover { background-color:#<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>}
#cssdropdown li.headlink ul li a:hover { background-color:#<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>;}
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

	<h1><?php echo $l_nav_roster;?></h1>
        
        <div style="float:left; padding-bottom:2px">
        	<h3><?php echo $l_Skaters;?></h3>
		</div>
		<div style="font-size:9px; float:right; padding-top:13px; padding-bottom:2px">
			C = <?php echo $l_Captain;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            A = <?php echo $l_AssistantCaptain;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            R = <?php echo $l_Rookie;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            ** = <?php echo $l_InjuredReserve ;?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            *** = <?php echo $l_Suspended;?>
		</div>
        <br clear="all" />
        
		<table  cellspacing="0" border="0" width="100%" class="tablesorter">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>">
			<th><a title="<?php echo $l_Jersey;?>">#</a></th>
			<th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
			<th width="80"><a title="<?php echo $l_Positions;?>"><?php echo $l_Positions;?></a></th>
			<th><a title="<?php echo $l_Condition;?>">CON</a></th>
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
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
		</tr>
        </thead>
		<tbody>
		<?php 
		$tmpRowColor="000000";
		$tmpRowCount=0;
		$tmpCount=1;
		$tmpInjury="";
		$tmpTotCondition=0;
		$tmpTotInjurys=0;
		$tmpTotChecking=0;
		$tmpTotFighting=0;
		$tmpTotDisapline=0;
		$tmpTotSkating=0;
		$tmpTotStrength=0;
		$tmpTotEndurance=0;
		$tmpTotDurability=0;
		$tmpTotPuckHandling=0;
		$tmpTotFaceoff=0;
		$tmpTotPassing=0;
		$tmpTotScoring=0;
		$tmpTotDefense=0;
		$tmpTotPenaltyShot=0;
		$tmpTotExperience=0;
		$tmpTotLeadership=0;
		$tmpTotMorale=0;
		$tmpTotPotential=0;
		$tmpTotOverall=0;
		$tmpTotAge=0;
		$tmpTotSalary=0;
		$tmpTotContract=0;
		
		do { 
			if ($totalRows_GetSkaters > 0){	
			if ($row_GetSkaters['Contract'] > 0){
		?>
		  <tr>
			<td align="center"><a href="#" id="f<?php echo $tmpCount;?>_up"><?php echo $row_GetSkaters['UniformNumber']; ?></a><div id="photo<?php echo $tmpCount;?>_up" style="display:none;"><div style="height:75px; width:50px; display:block;"><img src="<?php echo imageExists("/image/players/".$row_GetSkaters['Photo']); ?>" border="1" width="50" height="75" /></div><table cellpadding="0" cellspacing="0" border="0"><tr><td><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetSkaters['Country']; ?>.png" border="0" width="16" height="16" style="margin-top:5px;" /></td><td style="font-size:0.8em; vertical-align:middle;">&nbsp;<?php echo $l_Age.":".getAge($row_GetSkaters['AgeDate']); ?></td><tr></table></div></td>
			<td align="left"><a href="player.php?player=<?php echo $row_GetSkaters['Number']; ?>"><?php echo $row_GetSkaters['Name']; ?></a>
			<?php 
				if ($row_GetLeaders['Captain'] == $row_GetSkaters['Number']) { echo "<strong>C</strong>&nbsp;"; }
				if ($row_GetLeaders['Assistant1'] == $row_GetSkaters['Number'] || $row_GetLeaders['Assistant2'] == $row_GetSkaters['Number']) { echo "<strong>A</strong>&nbsp;"; }
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
			<td align="center"><?php echo $row_GetSkaters['CON']; $tmpTotCondition=$tmpTotCondition+$row_GetSkaters['CON'];?></td>
			<td align="center"><?php echo $row_GetSkaters['CK']; $tmpTotChecking=$tmpTotChecking+$row_GetSkaters['CK'];?></td>
			<td align="center"><?php echo $row_GetSkaters['FG']; $tmpTotFighting=$tmpTotFighting+$row_GetSkaters['FG'];?></td>
			<td align="center"><?php echo $row_GetSkaters['DI']; $tmpTotDisapline=$tmpTotDisapline+$row_GetSkaters['DI'];?></td>
			<td align="center"><?php echo $row_GetSkaters['SK']; $tmpTotSkating=$tmpTotSkating+$row_GetSkaters['SK'];?></td>
			<td align="center"><?php echo $row_GetSkaters['ST']; $tmpTotStrength=$tmpTotStrength+$row_GetSkaters['ST'];?></td>
			<td align="center"><?php echo $row_GetSkaters['EN']; $tmpTotEndurance=$tmpTotEndurance+$row_GetSkaters['EN'];?></td>
			<td align="center"><?php echo $row_GetSkaters['DU']; $tmpTotDurability=$tmpTotDurability+$row_GetSkaters['DU'];?></td>
			<td align="center"><?php echo $row_GetSkaters['PH']; $tmpTotPuckHandling=$tmpTotPuckHandling+$row_GetSkaters['PH'];?></td>
			<td align="center"><?php echo $row_GetSkaters['FO']; $tmpTotFaceoff=$tmpTotFaceoff+$row_GetSkaters['FO'];?></td>
			<td align="center"><?php echo $row_GetSkaters['PA']; $tmpTotPassing=$tmpTotPassing+$row_GetSkaters['PA'];?></td>
			<td align="center"><?php echo $row_GetSkaters['SC']; $tmpTotScoring=$tmpTotScoring+$row_GetSkaters['SC']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['DF']; $tmpTotDefense=$tmpTotDefense+$row_GetSkaters['DF']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PS']; $tmpTotPenaltyShot=$tmpTotPenaltyShot+$row_GetSkaters['PS']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['EX']; $tmpTotExperience=$tmpTotExperience+$row_GetSkaters['EX']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['LD']; $tmpTotLeadership=$tmpTotLeadership+$row_GetSkaters['LD']; ?></td>			
			<td align="center"><?php echo $row_GetSkaters['MO']; $tmpTotMorale=$tmpTotMorale+$row_GetSkaters['MO']; ?></td>
			<td align="center"><?php echo $row_GetSkaters['PO']; $tmpTotPotential=$tmpTotPotential+$row_GetSkaters['PO'];?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetSkaters['Overall']; $tmpTotOverall=$tmpTotOverall+$row_GetSkaters['Overall'];} ?></td>
		  </tr>
		  <?php 
		  $tmpCount = $tmpCount+1;
		  }}
		  } while ($row_GetSkaters = mysql_fetch_assoc($GetSkaters)); 
		  
		if ($totalRows_GetScratched > 0){
		echo "<tr><td colspan='22'><strong>Scratches</strong></td>";
		do { 
				
			if ($row_GetScratched['Contract'] > 0){
		?>
		  <tr>
			<td align="center"><a href="#" id="f<?php echo $tmpCount;?>_up"><?php echo $row_GetScratched['UniformNumber']; ?></a><div id="photo<?php echo $tmpCount;?>_up" style="display:none;"><div style="height:75px; width:50px; display:block;"><img src="<?php echo imageExists("/image/players/".$row_GetScratched['Photo']); ?>" border="1" width="50" height="75" /></div><table cellpadding="0" cellspacing="0" border="0"><tr><td><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetScratched['Country']; ?>.png" border="0" width="16" height="16" style="margin-top:5px;" /></td><td style="font-size:0.8em; vertical-align:middle;">&nbsp;<?php echo $l_Age.":".getAge($row_GetScratched['AgeDate']); ?></td><tr></table></div></td>
			<td align="left"><a href="player.php?player=<?php echo $row_GetScratched['Number']; ?>"><?php echo $row_GetScratched['Name']; ?></a>
			<?php 
				if ($row_GetLeaders['Captain'] == $row_GetScratched['Number']) { echo "<strong>C</strong>&nbsp;"; }
				if ($row_GetLeaders['Assistant1'] == $row_GetScratched['Number'] || $row_GetLeaders['Assistant2'] == $row_GetScratched['Number']) { echo "<strong>A</strong>&nbsp;"; }
				if ($row_GetScratched['Rookie'] == "True" || $row_GetScratched['Rookie'] == "Vrai"){ echo "R&nbsp;";}
			 	if ($row_GetScratched['Injury'] <> "") { echo "**&nbsp;"; }
				if ($row_GetScratched['Suspension'] > 0){echo "***";}
			?>
            </td>
            <td align="left">
           <?php 
			echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetScratched['PosC'] == "True" || $row_GetScratched['PosC'] == "Vrai"){
				echo $l_C;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetScratched['PosLW'] == "True" || $row_GetScratched['PosLW'] == "Vrai"){
				echo $l_LW;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetScratched['PosRW'] == "True" || $row_GetScratched['PosRW'] == "Vrai"){
				echo $l_RW;
			} else { echo "&nbsp;"; }
                    echo '</div>';
                    echo '<div style="display:block; float:left; width:20px; text-align:center; vertical-align:middle">';
			if ($row_GetScratched['PosD'] == "True" || $row_GetScratched['PosD'] == "Vrai"){
				echo $l_D;
			} else { echo "&nbsp;"; }
			echo '</div>';
			?>
            </td>
			<td align="center"><?php echo $row_GetScratched['CON']; $tmpTotCondition=$tmpTotCondition+$row_GetScratched['CON'];?></td>
			<td align="center"><?php echo $row_GetScratched['CK']; $tmpTotChecking=$tmpTotChecking+$row_GetScratched['CK'];?></td>
			<td align="center"><?php echo $row_GetScratched['FG']; $tmpTotFighting=$tmpTotFighting+$row_GetScratched['FG'];?></td>
			<td align="center"><?php echo $row_GetScratched['DI']; $tmpTotDisapline=$tmpTotDisapline+$row_GetScratched['DI'];?></td>
			<td align="center"><?php echo $row_GetScratched['SK']; $tmpTotSkating=$tmpTotSkating+$row_GetScratched['SK'];?></td>
			<td align="center"><?php echo $row_GetScratched['ST']; $tmpTotStrength=$tmpTotStrength+$row_GetScratched['ST'];?></td>
			<td align="center"><?php echo $row_GetScratched['EN']; $tmpTotEndurance=$tmpTotEndurance+$row_GetScratched['EN'];?></td>
			<td align="center"><?php echo $row_GetScratched['DU']; $tmpTotDurability=$tmpTotDurability+$row_GetScratched['DU'];?></td>
			<td align="center"><?php echo $row_GetScratched['PH']; $tmpTotPuckHandling=$tmpTotPuckHandling+$row_GetScratched['PH'];?></td>
			<td align="center"><?php echo $row_GetScratched['FO']; $tmpTotFaceoff=$tmpTotFaceoff+$row_GetScratched['FO'];?></td>
			<td align="center"><?php echo $row_GetScratched['PA']; $tmpTotPassing=$tmpTotPassing+$row_GetScratched['PA'];?></td>
			<td align="center"><?php echo $row_GetScratched['SC']; $tmpTotScoring=$tmpTotScoring+$row_GetScratched['SC']; ?></td>
			<td align="center"><?php echo $row_GetScratched['DF']; $tmpTotDefense=$tmpTotDefense+$row_GetScratched['DF']; ?></td>
			<td align="center"><?php echo $row_GetScratched['PS']; $tmpTotPenaltyShot=$tmpTotPenaltyShot+$row_GetScratched['PS']; ?></td>
			<td align="center"><?php echo $row_GetScratched['EX']; $tmpTotExperience=$tmpTotExperience+$row_GetScratched['EX']; ?></td>
			<td align="center"><?php echo $row_GetScratched['LD']; $tmpTotLeadership=$tmpTotLeadership+$row_GetScratched['LD']; ?></td>			
			<td align="center"><?php echo $row_GetScratched['MO']; $tmpTotMorale=$tmpTotMorale+$row_GetScratched['MO']; ?></td>
			<td align="center"><?php echo $row_GetScratched['PO']; $tmpTotPotential=$tmpTotPotential+$row_GetScratched['PO'];?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetScratched['Overall']; $tmpTotOverall=$tmpTotOverall+$row_GetScratched['Overall'];} ?></td>
		  </tr>
		  <?php 
		  $tmpCount = $tmpCount+1;
		  }
		  } while ($row_GetScratched = mysql_fetch_assoc($GetScratched)); 
		  }
		  
		  if($tmpCount > 1){
		 ?>	
		 <tfoot> 
         <tr>
		 	<td colspan="3" align="right"><strong><?php echo $l_TeamAverage;?></strong></td>
            <td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotCondition/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotChecking/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotFighting/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotDisapline/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotSkating/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotStrength/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotEndurance/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotDurability/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPuckHandling/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotFaceoff/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPassing/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotScoring/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotDefense/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPenaltyShot/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotExperience/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotLeadership/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotMorale/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPotential/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php  if ($_SESSION['DisplayOV'] == 1) {  echo number_format($tmpTotOverall/($tmpCount-1) ,0); } ?></td>
		</tr>
        </tfoot>
        <?php } ?>
		</table>
		
		<div style="float:left; padding-bottom:2px">
        	<h3><?php echo $l_Goalies;?></h3>
		</div>
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
		<tr style="background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>">
			<th><a title="<?php echo $l_Jersey;?>">#</a></th>
			<th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
			<th><a title="<?php echo $l_Condition;?>">CON</a></th>
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
			<th><a title="<?php echo $l_MO_D;?>">MO</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>	
			<th><a title="<?php echo $l_OV_D;?>">OV</a></th>
		</tr>
        </thead>
		<tbody>
		<?php 
		$tmpRowColor="000000";
		$tmpRowCount=0;
		$tmpCount=1;
		$tmpInjury="";
		$tmpTotCondition=0;
		$tmpTotInjurys=0;
		$tmpTotSkating=0;
		$tmpTotSize=0;
		$tmpToAgility=0;
		$tmpTotSkating=0;
		$tmpTotStrength=0;
		$tmpTotEndurance=0;
		$tmpTotDurability=0;
		$tmpTotPuckControl=0;
		$tmpTotRebound=0;
		$tmpTotStyleControl=0;
		$tmpTotHandspeed=0;
		$tmpTotReactionTime=0;
		$tmpTotPenaltyShot=0;
		$tmpTotExperience=0;
		$tmpTotLeadership=0;
		$tmpTotMorale=0;
		$tmpTotPotential=0;
		$tmpTotOverall=0;
		$tmpTotAge=0;
		$tmpTotSalary=0;
		$tmpTotContract=0;
		$tmpTotAgility=0;
		do { 
			if ($totalRows_GetGoalies > 0){
			if ($row_GetGoalies['Contract'] > 0){
		?>
		  <tr>
			<td align="center"><a href="#" id="g<?php echo $tmpCount;?>_up"><?php echo $row_GetGoalies['UniformNumber'];?></a><div id="gphoto<?php echo $tmpCount;?>_up" style="display:none;"><div style="height:75px; width:50px; display:block;"><img src="<?php echo imageExists("/image/players/".$row_GetGoalies['Photo']); ?>" border="1" width="50" height="75" /></div><table cellpadding="0" cellspacing="0" border="0"><tr><td><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetGoalies['Country']; ?>.png" border="0" width="16" height="16" style="margin-top:5px;" /></td><td style="font-size:0.8em; vertical-align:middle;">&nbsp;<?php echo $l_Age.":".getAge($row_GetGoalies['AgeDate']); ?></td><tr></table></div></td>
            <td align="left"><a href="goalie.php?player=<?php echo $row_GetGoalies['Number']; ?>"><?php echo $row_GetGoalies['Name']; ?></a> 
			<?php 
				if ($row_GetGoalies['Rookie'] == "True" || $row_GetGoalies['Rookie'] == "Vrai"){ echo "R&nbsp;";}
			 	if ($row_GetGoalies['Injury'] <> "") { echo "**&nbsp;"; }
				if ($row_GetGoalies['Suspension'] > 0){echo "***";}
			?>
            </td>
			<td align="center"><?php echo $row_GetGoalies['CON']; $tmpTotCondition=$tmpTotCondition+$row_GetGoalies['CON']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['SK']; $tmpTotSkating=$tmpTotSkating+$row_GetGoalies['SK']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['DU']; $tmpTotDurability=$tmpTotDurability+$row_GetGoalies['DU']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['EN']; $tmpTotEndurance=$tmpTotEndurance+$row_GetGoalies['EN']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['SZ']; $tmpTotSize=$tmpTotSize+$row_GetGoalies['SZ']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['AG']; $tmpTotAgility=$tmpTotAgility+$row_GetGoalies['AG']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['RB']; $tmpTotRebound=$tmpTotRebound+$row_GetGoalies['RB']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['SC']; $tmpTotStyleControl=$tmpTotStyleControl+$row_GetGoalies['SC']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['HS']; $tmpTotHandspeed=$tmpTotHandspeed+$row_GetGoalies['HS']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['RT']; $tmpTotReactionTime=$tmpTotReactionTime+$row_GetGoalies['RT']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['PC']; $tmpTotPuckControl=$tmpTotPuckControl+$row_GetGoalies['PC']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['PS']; $tmpTotPenaltyShot=$tmpTotPenaltyShot+$row_GetGoalies['PS']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['EX']; $tmpTotExperience=$tmpTotExperience+$row_GetGoalies['EX']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['LD']; $tmpTotLeadership=$tmpTotLeadership+$row_GetGoalies['LD']; ?></td>			
			<td align="center"><?php echo $row_GetGoalies['MO']; $tmpTotMorale=$tmpTotMorale+$row_GetGoalies['MO']; ?></td>
			<td align="center"><?php echo $row_GetGoalies['PO']; $tmpTotPotential=$tmpTotPotential+$row_GetGoalies['PO'];?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetGoalies['Overall']; $tmpTotOverall=$tmpTotOverall+$row_GetGoalies['Overall'];} ?></td>
		  </tr>
		  <?php 
			  $tmpCount = $tmpCount+1;
		  	}
			}
		  } while ($row_GetGoalies = mysql_fetch_assoc($GetGoalies)); 
		 
		  if ($totalRows_GetGScratched > 0){
		  echo "<tr><td colspan='19'><strong>Scratches</strong></td>";
          do { 
			if ($row_GetGScratched['Contract'] > 0){
		  ?>
		  <tr>
			<td align="center"><a href="#" id="g<?php echo $tmpCount;?>_up"><?php echo $row_GetGScratched['UniformNumber'];?></a><div id="gphoto<?php echo $tmpCount;?>_up" style="display:none;"><div style="height:75px; width:50px; display:block;"><img src="<?php echo imageExists("/image/players/".$row_GetGScratched['Photo']);?>" border="1" width="50" height="75" /></div><table cellpadding="0" cellspacing="0" border="0"><tr><td><img src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetGScratched['Country']; ?>.png" border="0" width="16" height="16" style="margin-top:5px;" /></td><td style="font-size:0.8em; vertical-align:middle;">&nbsp;<?php echo $l_Age.":".getAge($row_GetGScratched['AgeDate']); ?></td><tr></table></div></td>
            <td align="left"><a href="goalie.php?player=<?php echo $row_GetGScratched['Number']; ?>"><?php echo $row_GetGScratched['Name']; ?></a> 
			<?php 
				if ($row_GetGScratched['Rookie'] == "True" || $row_GetGScratched['Rookie'] == "Vrai"){ echo "R&nbsp;";}
			 	if ($row_GetGScratched['Injury'] <> "") { echo "**&nbsp;"; }
				if ($row_GetGScratched['Suspension'] > 0){echo "***";}
			?>
            </td>
			<td align="center"><?php echo $row_GetGScratched['CON']; $tmpTotCondition=$tmpTotCondition+$row_GetGScratched['CON']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['SK']; $tmpTotSkating=$tmpTotSkating+$row_GetGScratched['SK']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['DU']; $tmpTotDurability=$tmpTotDurability+$row_GetGScratched['DU']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['EN']; $tmpTotEndurance=$tmpTotEndurance+$row_GetGScratched['EN']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['SZ']; $tmpTotSize=$tmpTotSize+$row_GetGScratched['SZ']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['AG']; $tmpTotAgility=$tmpTotAgility+$row_GetGScratched['AG']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['RB']; $tmpTotRebound=$tmpTotRebound+$row_GetGScratched['RB']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['SC']; $tmpTotStyleControl=$tmpTotStyleControl+$row_GetGScratched['SC']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['HS']; $tmpTotHandspeed=$tmpTotHandspeed+$row_GetGScratched['HS']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['RT']; $tmpTotReactionTime=$tmpTotReactionTime+$row_GetGScratched['RT']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['PC']; $tmpTotPuckControl=$tmpTotPuckControl+$row_GetGScratched['PC']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['PS']; $tmpTotPenaltyShot=$tmpTotPenaltyShot+$row_GetGScratched['PS']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['EX']; $tmpTotExperience=$tmpTotExperience+$row_GetGScratched['EX']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['LD']; $tmpTotLeadership=$tmpTotLeadership+$row_GetGScratched['LD']; ?></td>			
			<td align="center"><?php echo $row_GetGScratched['MO']; $tmpTotMorale=$tmpTotMorale+$row_GetGScratched['MO']; ?></td>
			<td align="center"><?php echo $row_GetGScratched['PO']; $tmpTotPotential=$tmpTotPotential+$row_GetGScratched['PO'];?></td>
			<td align="center"><?php if ($_SESSION['DisplayOV'] == 1) {  echo $row_GetGScratched['Overall']; $tmpTotOverall=$tmpTotOverall+$row_GetGScratched['Overall'];} ?></td>
		  </tr>
		  <?php 
			  $tmpCount = $tmpCount+1;
		  	}
          } while ($row_GetGScratched = mysql_fetch_assoc($GetGScratched)); 
		  }
		  
		  if($tmpCount > 1){
          ?>	
		<tfoot> 
         <tr>
		 	<td colspan="2" align="right"><strong><?php echo $l_TeamAverage;?></strong></td>
            <td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotCondition/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotSkating/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotDurability/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotEndurance/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotSize/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotAgility/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotRebound/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotStyleControl/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotHandspeed/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotReactionTime/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPuckControl/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPenaltyShot/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotExperience/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotLeadership/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotMorale/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php echo number_format($tmpTotPotential/($tmpCount-1) ,0); ?></td>
			<td align="center" style="font-weight:bold;"><?php  if ($_SESSION['DisplayOV'] == 1) {  echo number_format($tmpTotOverall/($tmpCount-1) ,0); } ?></td>
		</tr>
        </tfoot>
        <?php } ?>
        </table>
		
		<div style="float:left; padding-bottom:2px">
        	<h3><?php echo $l_nav_coaches;?></h3>
		</div>
        <br clear="all" />
        
		<table cellspacing="0" border="0" width="100%" class="tablesorter">
        <thead>
		  <tr style="background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>">
			<th><a title="<?php echo $l_Name;?>"><?php echo $l_Name;?></a></th>
			<th><a title="<?php echo $l_PH_D;?>">PH</a></th>	
			<th><a title="<?php echo $l_DF_D;?>">DF</a></th>	
			<th><a title="<?php echo $l_OF_D;?>">OF</a></th>	
			<th><a title="<?php echo $l_PD_D;?>">PD</a></th>	
			<th><a title="<?php echo $l_EX_D;?>">EX</a></th>	
			<th><a title="<?php echo $l_LD_D;?>">LD</a></th>
			<th><a title="<?php echo $l_PO_D;?>">PO</a></th>
		  </tr>
        </thead>
		<tbody>
		<?php 
		$tmpCount = 1;
		do { 
		?>
		  <tr>
			<td align="left"><a href="coach.php?coach=<?php echo $row_GetCoach['Number']; ?>" id="c<?php echo $tmpCount;?>_up"><?php echo $row_GetCoach['Name']; ?></a><div id="cphoto<?php echo $tmpCount;?>_up" style="display:none;"><img src="<?php echo imageExists("/image/coaches/".$row_GetCoach['Photo']); ?>" border="1" width="50" height="75" /></div></td>
			<td align="center"><?php echo $row_GetCoach['PH']; ?></td>
			<td align="center"><?php echo $row_GetCoach['DF']; ?></td>
			<td align="center"><?php echo $row_GetCoach['OF']; ?></td>
			<td align="center"><?php echo $row_GetCoach['PD']; ?></td>
			<td align="center"><?php echo $row_GetCoach['EX']; ?></td>
			<td align="center"><?php echo $row_GetCoach['LD']; ?></td>
			<td align="center"><?php echo $row_GetCoach['PO']; ?></td>
		  </tr>
		<?php 
		$tmpCount = $tmpCount+1;
		} while ($row_GetCoach = mysql_fetch_assoc($GetCoach)); 
		?>	
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
mysql_free_result($GetLeaders);
mysql_free_result($GetSkaters);
mysql_free_result($GetScratched);
mysql_free_result($GetGScratched);
mysql_free_result($GetGoalies);
mysql_free_result($GetCoach);
?>
