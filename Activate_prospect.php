<?php include('Connections/simhl-setup.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	// Create the position references array
	$l_Submit  = "SUBMIT";
	$l_EditPlayer = "EDIT PROSPECT";
	$l_Activate = "ACTIVATE";
	$Proof = "Please provide the link/url of the website that will provide proof of your request.";
	break; 

case 'fr': 
	// Create the position references array
	$l_Submit  = "POSTER";
	$l_EditPlayer = "Modifier Rel&#232;ve";
	$l_Activate = "Activer";
	$Proof = "Veuillez fournir le lien/URL du site Web qui fournira la preuve de votre demande.";
	break;
} 

$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
} 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_select_db($database_simhl, $simhl);
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO playerschangerequest (Name,DateCreated,Team,URL,Type) values (%s,%s,%s,%s,%s)",
                        GetSQLValueString($_POST['Name'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
		   	GetSQLValueString($_SESSION['current_Team_ID'], "text"),
			GetSQLValueString($_POST['URL'], "text"),
			GetSQLValueString($_POST['RequestType'], "text"));
  $Result1 = mysql_query($insertSQL, $simhl) or die(mysql_error());
  $MailSubject = "Activate Prospect - ".$_POST['Name'];	
  $MailMessage = "<p>The ".$_SESSION['U_City']." ".$_SESSION['U_Team']." has signed ".$_POST['Name']." to a Entry level contract.</p>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:".$_SESSION['U_Email']."\r\n";
		

	$to =  $_SESSION['site_Email'];
	if (mail($to, $MailSubject, $MailMessage, $headers)) {
	  $errortxt = "\n Email has been sent to - ".$to."<br>";
	 } else {
	  $errortxt = "\n Message delivery failed - ".$to."<br>";
	 }
	//echo "$errortxt";
	
  $updateGoTo = "sent_request.php?team=".$_SESSION['current_Team_ID'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_simhl, $simhl);
$query_GetPlayer = sprintf("SELECT prospects.*, proteam.Name As Team FROM prospects LEFT JOIN proteam ON prospects.TeamNumber = proteam.Number WHERE prospects.Name='%s'", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $simhl) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetProspects = sprintf("SELECT prospects.Name, prospects.Position FROM prospects WHERE prospects.TeamNumber=%s ORDER BY Name", $_SESSION['current_Team_ID'] );
$GetProspects = mysql_query($query_GetProspects, $simhl) or die(mysql_error());
$row_GetProspects = mysql_fetch_assoc($GetProspects);

$query_GetInfo = sprintf("SELECT JuniorLeague FROM config");
$GetInfo = mysql_query($query_GetInfo, $simhl) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);

if ($row_GetPlayer['TeamNumber']==""){
	$tmpTeamNumber = 0;
} else {
	$tmpTeamNumber = $row_GetPlayer['TeamNumber'];
}

$query_GetTeamInfo = sprintf("SELECT p.Number,  p.Name,  p.Abbre,  p.City,  p.LogoLarge,  p.LogoSmall,  p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Number=%s ", $tmpTeamNumber);
$GetTeamInfo = mysql_query($query_GetTeamInfo, $simhl) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/jqtransformplugin/jqtransform.css" />

<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.accessible-news-slider.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/jqtransformplugin/jquery.jqtransform.js"></script>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("#TeamPhoto").reflect({height:30,opacity:0.3});
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  $('form').jqTransform({imgPath:'jqtransformplugin/img/'});
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
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;
}
</style>
<script language="javascript">
function checkit(){
	if (document.form1.URL.value.length==0){
		alert("Please enter the URL of the website that provides the proof of the request.");
		return false;
	}
}
</script>
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
    <table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
        <tr>
        	<td id="PlayerProfile" style="background-color:#<?php echo $row_GetTeamInfo['PrimaryColor']; ?>; padding:6px; width:35%;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td width="110" rowspan="2" style="vertical-align:top; width:110px;"><img src="<?php echo $_SESSION['DomainName']; ?>/image/players/<?php echo $row_GetPlayer['Photo']; ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
                    <td rowspan="2" valign="top" height="150" style="vertical-align:middle;">
                        <div align="center"><img src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>"id="TeamPhoto" /></div>
                        <div style="position:absolute; z-index:10; top:308px; padding-left:20px; ">
                            <FORM>
                            <SELECT ONCHANGE="location = this.options[this.selectedIndex].value;" style="font-size:0.85em; width:150px; text-align:center;">
                            <?php 
							echo "<option>".$l_nav_prospects."</option>";
                            $tmpTargetFile="prospect.php";
                            do { 
                                echo '<OPTION VALUE="'.$tmpTargetFile.'?player='.$row_GetProspects['Name'].'">'.$row_GetProspects['Name'].'</OPTION>';
                            } while ($row_GetProspects = mysql_fetch_assoc($GetProspects));
                            ?>
                            </SELECT> 
                            </FORM>
                        </div>
                    </td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px; width:65%; vertical-align:top;">
                    
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
                    <tr>
                    	<td style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $row_GetPlayer['Name']; ?></strong></td>
                     </tr>
                     <tr>
                        <td style="vertical-align:bottom;">

<form method="post" name="form1" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>
<INPUT id="prospect" type="hidden" value="<?php echo $row_GetPlayer['Name']; ?>" name=Name>
<div class="rowElem">
        <label>Action:</label>
    <select id="Action" size=1 name=RequestType><option value="Activate Prospect" selected="selected">Activate Prospect</option></select>
    </div>
<div class="rowElem">
<label>Website:</label>
<INPUT id="PlayerURL" name=URL onfocus=select() size="40" ONCHANGE="FrontEnd();">
</div>
<div class="rowElem">
<label></label><?php echo $Proof;?>
</div>
<div class="rowElem"><label></label>
    <input type="submit" value="<?php echo $l_Submit;?>">
</div>
<input type="hidden" name="MM_insert" value="form1">
</form>
    
						</td>
                    </tr>
                     </table>
                     
                  </td>
          	</tr>
          </table>
	<br /><br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>
