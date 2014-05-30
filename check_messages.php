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
	$l_CreateNewMessage  = "Create New Message";
	$l_Date  = "Date";
	$l_Title  = "Title";
	$l_Sender = "Sender";
	$l_Viewed = "Viewed";
	$l_Empty = "Empty In Box";
	break; 

case 'fr': 
	$l_PageTitle = "V&eacute;rifiez les messages";
	$l_Inbox  = "Inbox";
	$l_SentItems  = "Messages envoy&eacute;s";
	$l_CreateNewMessage  = "&Eacute;crire un message";
	$l_Date  = "Date";
	$l_Title  = "Objet";
	$l_Sender = "De";
	$l_Viewed = "Vu";
	$l_Empty = "Vider";
	break;
}

$query_GetConversations = sprintf("SELECT p.*, (SELECT DateCreated FROM mail as m WHERE m.Sender_U_ID=%s AND m.Receiver_U_ID=p.Number ORDER BY DateCreated DESC LIMIT 0,1) as LatestMessage FROM proteam as p WHERE p.number <> %s ORDER BY LatestMessage DESC", $_SESSION['U_ID'],$_SESSION['U_ID']);
$GetConversations = mysql_query($query_GetConversations, $connection) or die(mysql_error());
$row_GetConversations = mysql_fetch_assoc($GetConversations);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_PageTitle;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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

	$('.msg_row').hover(function() {
		$(this).css("background-color","#dedede");
	  	$(this).addClass('pretty-hover');
	}, function() {
		$(this).css("background-color",$(this).attr("color"));
	  	$(this).removeClass('pretty-hover');
	});
	
	$('.msg_row').click(function(e){
		var link = $(this).attr("team");
		window.location.href = "view_conversation.php?team=" + link;
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
    <h1><?php echo $l_PageTitle;?></h1><br />
<?php 
do { 
$query_GetLatestMessage = sprintf("SELECT * FROM mail as m WHERE m.Sender_U_ID=%s AND m.Receiver_U_ID=%s ORDER BY DateCreated DESC LIMIT 0,1", $row_GetConversations['Number'],$_SESSION['U_ID']);
$GetLatestMessage = mysql_query($query_GetLatestMessage, $connection) or die(mysql_error());
$row_GetLatestMessage = mysql_fetch_assoc($GetLatestMessage);
$totalRows_GetLatestMessage = mysql_num_rows($GetLatestMessage);
$RowStyle = "#FFF";
if($row_GetLatestMessage['Viewed']=="False"){ $RowStyle = "#EEE";}
	echo '<div class="msg_row" team="'.$row_GetConversations['Number'].'" style="background-color:'.$RowStyle.'" color="'.$RowStyle.'">';
	echo '<div class="msg_icon"><img src="'.getAvatar($row_GetConversations['oauth_uid'], $row_GetConversations['oauth_provider'], $_SESSION['U_ID'], $connection).'" width="50" height="50" border="0" /></div>';
	echo '<div class="msg_comment"><a class="msg_link" href="#">'.$row_GetConversations['GM']." (".$row_GetConversations['City']." ".$row_GetConversations['Name'].")".'</a>';
	echo '<br />'.substr($row_GetLatestMessage['Content'],0,200).'&#8230;</div>';
	if($totalRows_GetLatestMessage > 0){
	echo '<div class="msg_date">'.dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetLatestMessage['DateCreated']).'</div>';
	}
	echo '</div>';
} while ($row_GetConversations = mysql_fetch_assoc($GetConversations)); 
?>	  
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetConversations);
?>