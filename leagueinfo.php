<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_GMS = "GENERAL MANAGERS";
	$l_Email = "E-Mail";
	$l_GM = "General Manager";
	$l_City = "City";
	$l_Settings = "SETTINGS";
	$l_Out = "out of a 100";
	$l_Opt_F = "Fighting Option";
	$l_Opt_C = "Coaching Option";
	$l_Opt_M = "Morale Option";
	$l_Opt_I = "Injury Option";
	$l_Opt_FN = "Finance Option";
	$l_Opt_P = "Penalty Option";
	$l_Opt_S = "Shots Option";
	$l_Opt_G = "Goals Option";
	$l_Opt_H = "Hits Option";
	$l_LastLoginDate = "Login Date";
	$l_LastUploadDate = "Upload Lines";
	$l_CurrentFunds = "Current Funds";
	$l_PRO_PayRoll = "PRO Payroll";
	$l_IP = "IP Address";
	$l_Replace = "Note: We replaced @ with a the code special characters to protect your e-mail from e-mail spiders.";

break; 
	
case 'fr': 
	$l_GMS = "DIRECTEURS G&eacute;RANTS";
	$l_Email = "Courriel";
	$l_GM = "Directeur g&eacute;rant";
	$l_City = "Ville";
	$l_Settings = "PARAM&agrave;^TRES";
	$l_Out = "sur 100";
	$l_Opt_F = "Option Bagarre";
	$l_Opt_C = "Option Entra&icircneur";
	$l_Opt_M = "Option Moral";
	$l_Opt_I = "Option Blessure";
	$l_Opt_FN = "Option Finance";
	$l_Opt_P = "Option P&eacute;nalit&eacute;";
	$l_Opt_S = "Option Tirs";
	$l_Opt_G = "Option Buts";
	$l_Opt_H = "Option Mises en &eacute;chec";
	$l_LastLoginDate = "Dernier login";
	$l_LastUploadDate = "Upload Lines Date";
	$l_CurrentFunds = "Current Funds";
	$l_PRO_PayRoll = "PRO Payroll";
	$l_IP = "IP Address";
	$l_Replace = "Note : Nous avons remplac&eacute; @ par les caract&egrave;res sp&eacute;ciaux de code pour prot&eacute;ger votre courriel contre des araign&eacute;es courriel.";
	break; 
} 


$query_GetInfoConfig = sprintf("SELECT MinimumSalaryCap, SalaryCap FROM config");
$GetInfoConfig = mysql_query($query_GetInfoConfig, $connection) or die(mysql_error());
$row_GetInfoConfig = mysql_fetch_assoc($GetInfoConfig);


$query_GetBio = sprintf("SELECT s.Finance, s.TotalPlayersSalaries, p.GM, p.Email, p.Messenger, p.City, p.Name, p.LastVisit, p.LastModifiedLines, p.REMOTE_ADDR, p.oauth_provider FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND s.Season_ID=%s ORDER BY p.City",$_SESSION['current_SeasonID']);
$GetBio = mysql_query($query_GetBio, $connection) or die(mysql_error());
$row_GetBio = mysql_fetch_assoc($GetBio);
$totalRows_GetBio = mysql_num_rows($GetBio);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_league_information;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<h1><?php echo $l_nav_league_information;?></h1>
            <p><?php echo $l_Replace;?></p>


<h4><?php echo $l_GMS;?></h4>
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead> 
  <tr>
    <th><strong><?php echo $l_nav_team;?></strong></th>
    <th><strong><?php echo $l_GM;?></strong></th>
    <th><strong><?php echo $l_Email;?></strong></th>
    <th><strong><?php echo $l_LastLoginDate;?></strong></th>
    <th><strong><?php echo $l_LastUploadDate;?></strong></th>
    <th><strong><?php echo $l_IP;?></strong></th>
    <th><strong><?php echo $l_CurrentFunds;?></strong></th>
    <th><strong><?php echo $l_PRO_PayRoll;?></strong></th>
    <th><strong>Connected</strong></th>
    </tr>
</thead>
<tbody>
<?php 
do { 
$tmpemail = str_replace("@" , "&#64;",$row_GetBio['Email']);
$tmpmessenger = str_replace("@" , "&#64;", $row_GetBio['Messenger']);
?>	
  <tr>
    <td><?php echo $row_GetBio['City'] . " " . $row_GetBio['Name']; ?></td>
    <td><?php echo $row_GetBio['GM']; ?></td>
    <td><?php if(isset($_SESSION['U_ID'])){ echo $tmpemail; } ?></td>
    <td><?php echo $row_GetBio['LastVisit']; ?></td>
    <td><?php echo $row_GetBio['LastModifiedLines']; ?></td>
    <td><?php if (isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){ echo $row_GetBio['REMOTE_ADDR']; } else { echo "N/A"; } ?></td>
    <td>$<?php echo number_format($row_GetBio['Finance'],0); ?></td>
    <td <?php if($row_GetBio['TotalPlayersSalaries'] < $row_GetInfoConfig['MinimumSalaryCap']){ echo "style='color:blue;'";} else if ($row_GetBio['TotalPlayersSalaries'] > $row_GetInfoConfig['SalaryCap']){ echo "style='color:red;'";} else { echo "style='color:green;'";}?>>$<?php echo number_format($row_GetBio['TotalPlayersSalaries'],0); ?></td>
    <td><?php if ($row_GetBio['oauth_provider']=='twitter'){ echo 'Twitter'; } else if ($row_GetBio['oauth_provider']=='facebook'){ echo 'Facebook'; } ?></td>
    </tr>
	  <?php } while ($row_GetBio = mysql_fetch_assoc($GetBio)); ?>	
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
