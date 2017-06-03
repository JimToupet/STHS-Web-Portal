<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
                        GetSQLValueString("COMPLAINT FORM", "text"),
                        GetSQLValueString($_POST['CONTENT'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($_SESSION['U_ID'], "text"),
						GetSQLValueString($_POST['RECEIVER'], "text"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	$query_GetTeam = sprintf("SELECT proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['RECEIVER']);
	$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
	$row_GetTeam = mysql_fetch_assoc($GetTeam);
	if ($row_GetTeam['EmailAlert']==1){
		sendMail($row_GetTeam['Email'], $_SESSION['U_Email'], "COMPLAINT FORM", $_POST['CONTENT']);
	}
	sendMail($_SESSION['site_Email'], $_SESSION['U_Email'], "COMPLAINT FORM", $_POST['CONTENT']);
	mysql_free_result($GetTeam);
	
  $updateGoTo = "sent_complaint.php?team=".$_SESSION['current_Team_ID'];
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
$Position_Get = "Forward";
if (isset($_GET['Position'])) {
  $Position_Get = (get_magic_quotes_gpc()) ? $_GET['Position'] : addslashes($_GET['Position']);
}

$query_GetMail = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number <> %s ORDER BY proteam.City",$_SESSION['U_ID']);
$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
$row_GetMail = mysql_fetch_assoc($GetMail);
$tmpContent = "";
$tmpGM = $_SESSION['U_ID'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_complaint_form;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

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
<h1><?php echo $l_nav_complaint_form;?></h1>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
<br />

<div class="rowElem">
<label for="RECEIVER">Complaint against this General Manager:</label>
<select name="RECEIVER">
  <option value="0" selected="selected">Select a team</option>
  <?php do { ?>
	<option value="<?php echo $row_GetMail['Number']; ?>" <?php if ($tmpGM==$row_GetMail['Number']){ echo "selected"; }?>><?php echo $row_GetMail['City']." ".$row_GetMail['Name']." (".$row_GetMail['GM']; ?>)</option>
 <?php } while ($row_GetMail = mysql_fetch_assoc($GetMail)); ?>
  </select>
</div>

<div class="rowElem">
<label for="CONTENT">Complaint:</label>
<div style="margin-left:140px;">
<textarea name='CONTENT' cols='50' rows='10'><?php echo $tmpContent; ?></textarea>

<script type="text/javascript" >
		   
		CKEDITOR.replace('CONTENT',{
			width: 800
	});
</script>


</div>
<br  clear="all" />
<strong>Note:</strong>  This will forward an E-mail to the commissionher and it will also be sent to the G.M. you're filing a complaint.  So please, make sure you have a legitimate complaint with all the details includes dates to plead your case.
</div>
<br />

<div align="center"><input type="submit" value="Submit"></center>
<br><br>

<input type="hidden" name="MM_insert" value="form1">
</form>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
