<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Note = "<p>You can contact the league by e-mailing <a href='mailto:".$_SESSION['site_Email']."'><strong>".$_SESSION['site_Email']."</strong></a>.</p><p>If you wish to join the league, please fill in the forum below and you will be added to our waiting list. </P>";
	$l_How = "How did you find us?";
	$l_Email = "E-Mail";
	$l_Submit  = "SEND";
	$l_Replace = "Note: We replaced @ with a the code special characters to protect your e-mail from e-mail spiders.";
	break; 
	
case 'fr': 
	$l_Note = "<p>Vous pouvez contacter la ligue en envoyant un e-mail &agrave;  <a href='mailto:".$_SESSION['site_Email']."'><strong>".$_SESSION['site_Email']."</strong></a>.</p><p>Si vous d&eacute;sirez vous joindre &agrave; la ligue, veuillez remplir le formulaire ci-apr&egrave;s et vous allez &ecirc;tre ajout&eacute; &agrave; notre liste d'attente.</P>";
	$l_How = "Comment nous avez vous trouv&eacute;?";
	$l_Email = "Courriel";
	$l_Submit  = "ENVOYEZ";
	$l_Replace = "Note : Nous avons remplac&eacute; @ par les caract&egrave;res sp&eacute;ciaux de code pour prot&eacute;ger votre courriel contre des araign&eacute;es courriel.";
	break; 
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
 

  $insertSQL = sprintf("INSERT INTO waitinglist (Name, Email, Referal, DateCreated) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($_POST['Name'], "text"),
                        GetSQLValueString($_POST['Email'], "text"),
					   	GetSQLValueString($_POST['referal'], "text"),
						GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

		$subject = "Application for the G.M. waiting list - ".strftime('%Y-%m-%d', strtotime('now'));
		sendMail($_SESSION['site_Email'], $_POST['Email'], $subject, $_POST['referal']);
		
  $updateGoTo = "contact.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$query_GetWaitingList = sprintf("SELECT * FROM waitinglist ORDER BY DateCreated asc");
$GetWaitingList = mysql_query($query_GetWaitingList, $connection) or die(mysql_error());
$row_GetWaitingList = mysql_fetch_assoc($GetWaitingList);
$totalRows_GetWaitingList = mysql_num_rows($GetWaitingList);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_gm_waiting_list;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
section {width:718px; float:left;}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <aside>
    	<h4> <?php echo $l_nav_gm_waiting_list;?></h4>
        <p><?php echo $l_Replace;?></p>
		<table cellpadding="2" cellspacing="0" border="0" width="100%">
		<?php 
		if ($totalRows_GetWaitingList > 0){
		do { 
		$tmpemail = str_replace("@" , "&#64;",$row_GetWaitingList['Email']);
		?>
		<tr>
			<td valign="top" align="left"><?php echo $row_GetWaitingList['Name']; ?>: </td>
            <td align="right"><?php 
				if ($_SESSION['U_Admin'] == 1){
					echo '<a href="delete_waitinglist.php?id='.$row_GetWaitingList['W_ID'].'">'.$l_Remove.'</a>';
				}
				?>
			</td>
        </tr>
        <tr>
        	<td valign="top" colspan="2" align="left"><?php echo $tmpemail; ?><Br /><Br /></td>	
		</tr>
	   <?php } while ($row_GetWaitingList = mysql_fetch_assoc($GetWaitingList));}  ?>
	   </table>
       </aside>
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
    <h1><?php echo $l_nav_gm_waiting_list;?></h1>
	 	<?php echo $l_Note;?>
	  	<form method="post" name="form1" enctype="multipart/form-data"  action="<?php echo $editFormAction; ?>">

        <div class="rowElem">
        <label for="Name"><?php echo $l_Name;?>:</label>
        <input type="text" name="Name"   size="50" /></div>
                
        <div class="rowElem">
        <label for="Email"><?php echo $l_Email;?>t:</label>
        <input type="text" name="Email"  size="50"/></div>
                
        <div class="rowElem">
        <label for="referal"><?php echo $l_How;?>:</label>
        <textarea name="referal" cols="40" rows="4"></textarea></div>
        
        <div align="center"><input type="submit" value="<?php echo $l_Submit;?>"></div>
        
        <input type="hidden" name="MM_update" value="form1">
        </form><br /><Br />

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
