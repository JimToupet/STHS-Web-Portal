<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Check Messages";
	$l_Inbox  = "Inbox";
	$l_SentItems  = "Sent Items";
	$l_Date  = "DATE SENT";
	$l_Title  = "SUBJECT";
	$l_Sender = "FROM";
	$l_Reply = "Reply";
	$l_ReturnInbox = "Return to Inbox";
	$l_ReturnOutbox = "Return to Sent Items";
	$l_NoRight = "YOU DON'T HAVE PERMISSION TO VIEW THIS MESSAGE!";
	break; 

case 'fr': 
	$l_PageTitle = "Lire le courriels";
	$l_Inbox  = "Bo&icircte de r&eacute;ception";
	$l_SentItems  = "Messages envoy&eacute;s";
	$l_Date  = "Date";
	$l_Title  = "Objet";
	$l_Sender = "De";
	$l_Reply = "R&eacute;ponse";
	$l_ReturnInbox = "Revenir &agrave; la bo&icircte de r&eacute;ception";
	$l_ReturnOutbox = "Revenir &agrave; la messages envoy&eacute;s";
	$l_NoRight = "VOUS N'AVEZ PAS LA PERMISSION DE REGARDER CE MESSAGE!";
	break;
}

$ID_GetMail = "1";
if (isset($_GET['id'])) {
  $ID_GetMail = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$GetType = "Inbox";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);
}

$query_GetMail = sprintf("SELECT mail.*, proteam.Name, proteam.City, proteam.GM, proteam.Avatar FROM mail LEFT JOIN proteam ON mail.Sender_U_ID=proteam.Number WHERE mail.M_ID=%s", $ID_GetMail);
$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
$row_GetMail = mysql_fetch_assoc($GetMail);
if ($GetType <> "sent") {
	$updateSQL = "UPDATE mail SET mail.Viewed = 'True' WHERE mail.M_ID=".$ID_GetMail;
	
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Message - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.accessible-news-slider.js"></script>
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
    <h1><?php echo $l_Title;?>: <span style="color:#<?php echo $_SESSION['current_PrimaryColor']; ?>"><?php echo $row_GetMail['Title']; ?></span></h1>
	
    <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
    <tr><th style="text-align:right" width="90"><?php echo $l_Date;?>:</th><th style="text-align:left"><?php echo date("l, F j, Y - G:i A", strtotime($row_GetMail['DateCreated'])); ?></th></tr>
    <tr>
        <th style="text-align:right"><?php echo $l_Sender;?>:</th>
        <th style="text-align:left"><?php 
        if ($row_GetMail['GM'] == ""){
            echo "League";
        } else {
            echo $row_GetMail['GM']." (".$row_GetMail['City']." ".$row_GetMail['Name'].")"; 
        }
        ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="2" style="border-color:#666; border-style:solid; border-width:1px; padding:20px; font-size:12px;">
    <?php 
    if(isset($_SESSION['U_ID'])){
        if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
             echo $row_GetMail['Content']; 
        } else {
            echo "<h3 align=center>".$l_NoRight."</h3>";
        }	
    }	 
    ?></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2" align="center" style="border-color:#000000; border-style:solid; border-width:1px; background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>;">
        <?php
        if ($GetType == "inbox"){
            echo '<a href="check_messages.php?team='.$_SESSION['current_Team_ID'].'" style="font-size:14px" class="button"><strong>'.$l_ReturnInbox.'</strong></a>';
            if($row_GetMail['Sender_U_ID'] > 0){
				echo '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="create_message.php?team='.$_SESSION['current_Team_ID'].'&id='.$row_GetMail['M_ID'].'&type=reply" style="font-size:14px" class="button email"><strong>'.$l_Reply.'</strong></a>';
			}
        } else {
            echo '<a href="sent_messages.php?team='.$_SESSION['current_Team_ID'].'" style="font-size:14px" class="button"><strong>'.$l_ReturnOutbox.'</strong></a>';
        }
        ?>
        </td>
    </tr>
    </tfoot>
    </table>
		
		<br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
