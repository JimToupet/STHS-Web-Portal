<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PlayerRatings = "Player Ratings";
	$l_NoTradeDescription = "A no trade clause will help convince the player to sign with your team.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Salary will be the same each year of their contract.<br>&nbsp;&nbsp;FRONT-LOAD = Higher salary in first year and will gradually decrease until final year.";
	$l_SalaryDistribution = "Salary Distribution";
	$l_SalaryPerYear = "Salary Per Year";
	$l_SendOffer = "Send Offer";
	$l_Offer = "Offer Sheet";
	$l_True  = "True";
	$l_False  = "False";
	$l_CONTRACTLENGTH = "Contract Length";
	$Alert3 = "The owner of your team does not approve sending any more contract offers because you already have 10 active offers.  If you want to send an offer to this player, you will have to remove another offer first.";
	$Alert2_1 = "The owner of your team does not approve sending a contract greater than $";
	$Alert2_2 = "per year because there is not enough league competition for his services.  If more bids are placed then he will approve a higher offer.";
	$Alert1_1 = "Please enter a salary greater than $";
	$Alert1_2 = "per year.";
	break; 

case 'fr': 
	$l_PlayerRatings = "Stat de joueur";
	$l_NoTradeDescription = "Une clause de non-&eacute;change va aider a convaincre le joueur de signer avec votre &eacute;quipe.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Salaire va &ecirc;tre &eacute;gale a chaque ann&eacute;e du contrat<br>&nbsp;&nbsp;FRONT-LOAD = Salaire et plus haut la premi&egrave;re ann&eacute;e et va diminuer graduellement jusqu'&agrave;� la derni&egrave;re ann&eacute;e du contrat";
	$l_SalaryDistribution = "Distribution de salaire";
	$l_SalaryPerYear = "Salaire par an";
	$l_SendOffer = "Envoyez l'offre";
	$l_Offer = "Offre";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_CONTRACTLENGTH = "Longueur de contrat";
	$Alert3 = "Le propri&eacute;taire de votre &eacute;quipe n'approuve pas envoyer plus d'offres de contrat parce que vous avez d&eacute;j&agrave;� 10 offres actives. Si vous voulez envoyer une offre &agrave;� ce joueur, vous devrez enlever une autre offre d'abord.";
	$Alert2_1 = "Le propri&eacute;taire de votre &eacute;quipe n'approuve pas envoyer un contrat plus grand que ";
	$Alert2_2 = "$ par an parce qu'il n'y a pas assez de concurrence de ligue pour ses services. Si plus d'offres sont plac&eacute;es alors il approuvera un plus haut offrent.";
	$Alert1_1 = "Veuillez &eacute;crire un salaire plus grand que ";
	$Alert1_2 = "$ ann&eacute;e.";
	break;
} 
    

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {

	$tmpNoTradeSalary = 0;
	if($_POST['notrade'] == 1){$tmpNoTradeSalary = ($_POST['newsal']/2);} else {$tmpNoTradeSalary = 0;}
	
	$insertSQL = sprintf("INSERT INTO playerscontractoffers (Player,Type,Team,DateCreated,Contract,Salary1,Salary2,Salary3,Salary4,Salary5,Salary6,Salary7,Salary8,Salary9,Salary10,NoTrade,NoTradeSalary,Approved) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'False')",
            GetSQLValueString(ParseSQL($_POST['player']), "text"),
            GetSQLValueString("Offer Sheet", "text"),
            GetSQLValueString($_SESSION['U_ID'], "int"),
            GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
			GetSQLValueString($_POST['yearsoff'], "double"),
			GetSQLValueString($_POST['YearSalary1'], "int"),
			GetSQLValueString($_POST['YearSalary2'], "int"),
			GetSQLValueString($_POST['YearSalary3'], "int"),
			GetSQLValueString($_POST['YearSalary4'], "int"),
			GetSQLValueString($_POST['YearSalary5'], "int"),
			GetSQLValueString($_POST['YearSalary6'], "int"),
			GetSQLValueString($_POST['YearSalary7'], "int"),
			GetSQLValueString($_POST['YearSalary8'], "int"),
			GetSQLValueString($_POST['YearSalary9'], "int"),
			GetSQLValueString($_POST['YearSalary10'], "int"),
			GetSQLValueString($_POST['notrade'], "text"),
			GetSQLValueString($tmpNoTradeSalary, "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
 
	$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	  $updateGoTo = $_POST['location'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetType = "Player";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}
$GetTarget = "1";
if (isset($_GET['target'])) {
  $GetTarget = (get_magic_quotes_gpc()) ? $_GET['target'] : addslashes($_GET['target']);
}
if($GetTarget == 1){
	$tmpLocation = "ufa-free-agents_w_offer.php";
} else if($GetTarget == 2){
	$tmpLocation = "ufa-free-agents_decide.php";
} 

if ($GetType == 'Goalie'){
	$query_GetPlayer = sprintf("SELECT * FROM goalies WHERE goalies.Number='%s'", $PID_GetPlayer);
}else{
	$query_GetPlayer = sprintf("SELECT * FROM players WHERE players.Number='%s'", $PID_GetPlayer);
}
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
$MinimumPlayerSalary=10000;
$PID_GetPlayer=addslashes($row_GetPlayer['Name']);

$query_GetWebInfo = sprintf("SELECT MaxContract, UFA, MinimumPlayerSalary, MaximumPlayerSalary FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);
$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
$UFA=$row_GetWebInfo['UFA'];
mysql_free_result($GetWebInfo);

$query_GetPlayerOffers = sprintf("SELECT 1 FROM playerscontractoffers AS O WHERE O.Player='%s' AND O.Type='Offer Sheet'", $PID_GetPlayer);
$GetPlayerOffers = mysql_query($query_GetPlayerOffers, $connection) or die(mysql_error());
$row_GetPlayerOffers = mysql_fetch_assoc($GetPlayerOffers);
$totalRows_GetPlayerOffers = mysql_num_rows($GetPlayerOffers);

$query_GetCurrentOffers = sprintf("SELECT 1 FROM playerscontractoffers AS O WHERE O.Team='%s' AND (O.Type='Offer Sheet' OR O.Type='Offer Sheet' OR O.Type='Offer Sheet Final')", $_SESSION['U_ID']);
$GetCurrentOffers = mysql_query($query_GetCurrentOffers, $connection) or die(mysql_error());
$row_GetCurrentOffers = mysql_fetch_assoc($GetCurrentOffers);
$totalRows_GetCurrentOffers = mysql_num_rows($GetCurrentOffers);

if ($totalRows_GetPlayerOffers == 0 ){
	if ($row_GetPlayer['Overall'] > 70){
		$MaximumPlayerSalary=2000000;
	} else {
		$MaximumPlayerSalary=1000000;
	}
} else if ($totalRows_GetPlayerOffers == 1 ){
	if ($row_GetPlayer['Overall'] > 70){
		$MaximumPlayerSalary=3000000;
	} else {
		$MaximumPlayerSalary=1500000;
	}
} else if ($totalRows_GetPlayerOffers == 2 ){
	if ($row_GetPlayer['Overall'] > 70){
		$MaximumPlayerSalary=4000000;
	} else {
		$MaximumPlayerSalary=2000000;
	}
} else if ($totalRows_GetPlayerOffers == 3 ){
	if ($row_GetPlayer['Overall'] > 70){
		$MaximumPlayerSalary=5000000;
	} else {
		$MaximumPlayerSalary=2500000;
	}
} else {
		$MaximumPlayerSalary=$row_GetWebInfo['MaximumPlayerSalary'];
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>UFA <?php echo $l_Offer;?>  - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
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
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>
<SCRIPT language=JavaScript>
function FrontEnd() {
	var obj1 = document.getElementById("Year1");
	var obj2 = document.getElementById("Year2");
	var obj3 = document.getElementById("Year3");
	var obj4 = document.getElementById("Year4");
	var obj5 = document.getElementById("Year5");
	var obj6 = document.getElementById("Year6");
	var obj7 = document.getElementById("Year7");
	var obj8 = document.getElementById("Year8");
	var obj9 = document.getElementById("Year9");
	var obj10 = document.getElementById("Year10");
	
	document.form.YearSalary1.value=<?php echo $MinimumPlayerSalary; ?>;
	document.form.YearSalary2.value=0;
	document.form.YearSalary3.value=0;
	document.form.YearSalary4.value=0;
	document.form.YearSalary5.value=0;
	document.form.YearSalary6.value=0;
	document.form.YearSalary7.value=0;
	document.form.YearSalary8.value=0;
	document.form.YearSalary9.value=0;
	document.form.YearSalary10.value=0;
	
	obj1.innerHTML = "$0";
	obj2.innerHTML = "$0";
	obj3.innerHTML = "$0";
	obj4.innerHTML = "$0";
	obj5.innerHTML = "$0";
	obj6.innerHTML = "$0";
	obj7.innerHTML = "$0";
	obj8.innerHTML = "$0";
	obj9.innerHTML = "$0";
	obj10.innerHTML = "$0";
	
	if (document.form.distribute.value == 1) {
		$tmpMod = (document.form.yearsoff.value / 2);
		$tmp1=0;
		$tmp2=0;
		$tmp3=0;
		$tmp4=0;
		$tmp5=0;
		$tmp6=0;
		$tmp7=0;
		$tmp8=0;
		$tmp9=0;
		$tmp10=0;
		if(document.form.yearsoff.value==1){
			$tmp1=Math.round(document.form.newsal.value);
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
		} else if(document.form.yearsoff.value==2){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp2 < <?php echo $MinimumPlayerSalary; ?>) { $tmp2 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2; 
		} else if(document.form.yearsoff.value==3){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value);
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp3 < <?php echo $MinimumPlayerSalary; ?>) { $tmp3 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
		} else if(document.form.yearsoff.value==4){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp3 < <?php echo $MinimumPlayerSalary; ?>) { $tmp3 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
		} else if(document.form.yearsoff.value==5){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value);
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
		} else if(document.form.yearsoff.value==6){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
		} else if(document.form.yearsoff.value==7){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value);
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
		} else if(document.form.yearsoff.value==8){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp4 < <?php echo $MinimumPlayerSalary; ?>) { $tmp4 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
		} else if(document.form.yearsoff.value==9){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value);
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp9=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp5 < <?php echo $MinimumPlayerSalary; ?>) { $tmp5 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp9 < <?php echo $MinimumPlayerSalary; ?>) { $tmp9 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
			obj9.innerHTML = "$" + formatCurrency($tmp9);
			document.form.YearSalary9.value=$tmp9;
		} else if(document.form.yearsoff.value==10){
			$tmp1=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.1)));
			$tmp2=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.05)));
			$tmp3=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.025)));
			$tmp4=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.015)));
			$tmp5=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * 0.005)));
			$tmp6=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.005)));
			$tmp7=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.015)));
			$tmp8=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.025)));
			$tmp9=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.05)));
			$tmp10=Math.round(document.form.newsal.value * ((1 + ($tmpMod) * -0.1)));
			if ($tmp6 < <?php echo $MinimumPlayerSalary; ?>) { $tmp6 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp7 < <?php echo $MinimumPlayerSalary; ?>) { $tmp7 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp8 < <?php echo $MinimumPlayerSalary; ?>) { $tmp8 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp9 < <?php echo $MinimumPlayerSalary; ?>) { $tmp9 = <?php echo $MinimumPlayerSalary; ?>; }
			if ($tmp10 < <?php echo $MinimumPlayerSalary; ?>) { $tmp10 = <?php echo $MinimumPlayerSalary; ?>; }
			obj1.innerHTML = "$" + formatCurrency($tmp1);
			document.form.YearSalary1.value=$tmp1;
			obj2.innerHTML = "$" + formatCurrency($tmp2);
			document.form.YearSalary2.value=$tmp2;
			obj3.innerHTML = "$" + formatCurrency($tmp3);
			document.form.YearSalary3.value=$tmp3;
			obj4.innerHTML = "$" + formatCurrency($tmp4);
			document.form.YearSalary4.value=$tmp4;
			obj5.innerHTML = "$" + formatCurrency($tmp5);
			document.form.YearSalary5.value=$tmp5;
			obj6.innerHTML = "$" + formatCurrency($tmp6);
			document.form.YearSalary6.value=$tmp6;
			obj7.innerHTML = "$" + formatCurrency($tmp7);
			document.form.YearSalary7.value=$tmp7;
			obj8.innerHTML = "$" + formatCurrency($tmp8);
			document.form.YearSalary8.value=$tmp8;
			obj9.innerHTML = "$" + formatCurrency($tmp9);
			document.form.YearSalary9.value=$tmp9;
			obj10.innerHTML = "$" + formatCurrency($tmp10);
			document.form.YearSalary10.value=$tmp10;
		}
		
    } else {
		for (i=1;i<=document.form.yearsoff.value;i++)
		{
			if(i == 1){document.form.YearSalary1.value=document.form.newsal.value; obj1.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 2){document.form.YearSalary2.value=document.form.newsal.value; obj2.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 3){document.form.YearSalary3.value=document.form.newsal.value; obj3.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 4){document.form.YearSalary4.value=document.form.newsal.value; obj4.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 5){document.form.YearSalary5.value=document.form.newsal.value; obj5.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 6){document.form.YearSalary6.value=document.form.newsal.value; obj6.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 7){document.form.YearSalary7.value=document.form.newsal.value; obj7.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 8){document.form.YearSalary8.value=document.form.newsal.value; obj8.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 9){document.form.YearSalary9.value=document.form.newsal.value; obj9.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
			if(i == 10){document.form.YearSalary10.value=document.form.newsal.value; obj10.innerHTML = "$" + formatCurrency(document.form.newsal.value);}
		}
	}
}


function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + num );
}

function validateFields() {
	var ov = (form.overall.value);
	var offers = (form.offers.value);

	if (document.form.newsal.value < <?php echo $MinimumPlayerSalary; ?>) {
        alert("<?php echo $Alert1_1." ".number_format($MinimumPlayerSalary,0)." ".$Alert1_2; ?>");
        return false;
    }
	
<?php if ($totalRows_GetPlayerOffers < 4 ) { ?>
	if (document.form.newsal.value > <?php echo $MaximumPlayerSalary; ?> && ov < 70) {
        alert("<?php echo $Alert2_1." ".number_format($MaximumPlayerSalary,0)." ".$Alert2_2; ?>");
        return false;
    }
<?php } ?>

<?php if ($totalRows_GetCurrentOffers >= 10 ) { ?>
	if (offers >= 10) {
		alert("<?php echo $Alert3;?>");
		return false;
	}
<?php } ?>

	return true;
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
    
<h1><?php echo $l_Offer;?> &nbsp;-&nbsp; <?php echo $row_GetPlayer['Name']; ?></h1>

<form method="post" name="form" id="form" action="<?php echo $editFormAction; ?>" onSubmit="return validateFields();">
<INPUT id="player" type="hidden" value="<?php echo $row_GetPlayer['Name']; ?>" name=player>
<INPUT id="location" type="hidden" value="<?php echo $tmpLocation; ?>" name=location>
<INPUT ID="offers" type="hidden" value="<?php echo $totalRows_GetCurrentOffers;?>" name=offers>
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
<tr>
	<td width="110" valign="top" style="vertical-align:top">
    	<img src="<?php echo imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" style=" border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>; width:100px; height:150px; border-width:1px; margin-top:10px; border-style:solid;" width="100" height="150"/>
    	<INPUT id="age" onfocus=select() type="hidden" value="<?php echo getAge($row_GetPlayer['AgeDate']); ?>" name=age>
        <INPUT id="prevsal" type="hidden" onfocus=select() size=8 value="<?php echo $row_GetPlayer['Salary1']; ?>" name=prevsal>        
    </td>
     <td valign="top">
     
		<h3><?php echo $l_PlayerRatings;?></h3>
       <?php if ($GetType == 'Goalie'){ ?>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
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
		  <tr>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DU']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EN']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SZ']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['AG']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['RB']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['HS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['RT']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EX']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['LD']; ?></td>			
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['MO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetPlayer['Overall'];} else { echo 0;} ?></td>
		</tr>
		</tbody>
		</table>
     <?php }else{ ?>
		<table  cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
		<tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
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
		  <tr>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['CK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['FG']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DI']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SK']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['ST']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EN']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DU']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PH']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['FO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PA']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['SC']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['DF']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PS']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['EX']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['LD']; ?></td>			
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['MO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php echo $row_GetPlayer['PO']; ?></td>
			<td align="center" style="font-size:1.4em;"><?php if ($_SESSION['DisplayOV'] == 1) { echo $row_GetPlayer['Overall'];} else { echo 0;} ?></td>
		</tr>
		</tbody>
		</table>
     <?php } ?>
  		<h3><?php echo $l_Offer;?></h3>
        <table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
        <thead>
        <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
            <th width="10%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
            <th width="10%"><?php echo ($_SESSION['current_Season']+9)."-".substr($_SESSION['current_Season']+10, -2);?></th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center"><div id="Year1">$<?php echo number_format($MinimumPlayerSalary,0); ?></div></td>
            <td align="center"><div id="Year2">$0</div></td>
            <td align="center"><div id="Year3">$0</div></td>
            <td align="center"><div id="Year4">$0</div></td>
            <td align="center"><div id="Year5">$0</div></td>
            <td align="center"><div id="Year6">$0</div></td>
            <td align="center"><div id="Year7">$0</div></td>
            <td align="center"><div id="Year8">$0</div></td>
            <td align="center"><div id="Year9">$0</div></td>
            <td align="center"><div id="Year10">$0</div></td>
        </tr>
        </tbody>
        </table>
        <div class="rowElem">
        <label><?php echo $l_CONTRACTLENGTH;?></label>
        <select id="yearsoff" size=1  name=yearsoff ONCHANGE="FrontEnd();" s>
        <?php 
		for ( $counter = 1; $counter <= $row_GetWebInfo['MaxContract']; $counter += 1) {
			if($counter == 1){
				$tmpSelected = 'selected="selected"';
			} else {
				$tmpSelected = '';
			}
			echo '<option value="'.$counter.'" '.$tmpSelected.'>'.$counter.'</option>';
		}
		?>
        </select>
        </div>
        
		<div class="rowElem">
        <label><?php echo $l_SalaryPerYear;?>:</label>
        <INPUT id="newsal" onfocus=select() size="8" maxlength="8" value="<?php echo $MinimumPlayerSalary; ?>" name=newsal ONCHANGE="FrontEnd();" >
		</div>
        
        <div class="rowElem" style="">
        <label><?php echo $l_SalaryDistribution;?>:</label>
        <select id="distribute" size=1  name="distribute" ONCHANGE="FrontEnd();" ><option value="0" selected="selected">EVEN</option><option value="1">FRONT-LOAD</option></select>
        <div style="display:block;">
        <label>&nbsp;</label><sub style="font-size:10px;"><?php echo $l_FrontLoadDescription;?></sub><br clear="all" />
        </div>
        </div>
        
        <div class="rowElem" style="">
        <label><?php echo $l_NoTrade;?>:</label>
        <select id="notrade" size=1  name="notrade"><option value="0" selected="selected"><?php echo $l_False;?></option><option value="1"><?php echo $l_True;?></option></select>
        <label></label>&nbsp;&nbsp;<sub style="font-size:10px;"><?php echo $l_NoTradeDescription;?></sub>
       </div>
        
        <div class="rowElem"><label></label><input type="submit" value="<?php echo $l_SendOffer;?>"></div>
         
      </td>
    </tr>
    </table>
  <input type="hidden" name="MM_insert" value="form">
  <input type="hidden" name="YearSalary1" value="<?php echo $MinimumPlayerSalary; ?>">
  <input type="hidden" name="YearSalary2" value="0">
  <input type="hidden" name="YearSalary3" value="0">
  <input type="hidden" name="YearSalary4" value="0">
  <input type="hidden" name="YearSalary5" value="0">
  <input type="hidden" name="YearSalary6" value="0">
  <input type="hidden" name="YearSalary7" value="0">
  <input type="hidden" name="YearSalary8" value="0">
  <input type="hidden" name="YearSalary9" value="0">
  <input type="hidden" name="YearSalary10" value="0">
  <INPUT id="overall" type="hidden" value="<?php echo $row_GetPlayer['Overall']; ?>" name="overall">     
</form>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
