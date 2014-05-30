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

$Team_ID = 0;
if (isset($_GET['id'])) {
  $Team_ID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}

$query_GetTeam = sprintf("SELECT * FROM proteam WHERE Number=%s", $Team_ID);
$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
$row_GetTeam = mysql_fetch_assoc($GetTeam);
$TeamAvatar = getAvatar($row_GetTeam['oauth_uid'], $row_GetTeam['oauth_provider'], $row_GetTeam['Number'], $connection);;

$query_GetThread = sprintf("SELECT c.* FROM chat as c WHERE (c.from='%s' AND c.to='%s') OR (c.to='%s' AND c.from='%s') ORDER BY c.sent", str_replace(" ","_",$_SESSION['U_Team']), str_replace(" ","_",$row_GetTeam['Name']), str_replace(" ","_",$_SESSION['U_Team']), str_replace(" ","_",$row_GetTeam['Name']));
$GetThread = mysql_query($query_GetThread, $connection) or die(mysql_error());
$row_GetThread = mysql_fetch_assoc($GetThread);
$totalRows_GetThread = mysql_num_rows($GetThread);

$updateSQL = sprintf("UPDATE chat set recd=1 WHERE chat.to='%s'",
           str_replace(" ","_",$_SESSION['U_Team']));
  			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
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
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/status.css" />

<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.elastic.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
$('html, body').animate({ 
   scrollTop: $(document).height()-$(window).height()}, 
   400, 
   "easeOutQuint"
);

  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });

$(".input_box").elastic().css("height","30px");
$(".input_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "Write a reply..."
}).val("").css("color","#000000");
});
$(".input_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("Write a reply...").css("color","#808080");
});


$("#share").click(function(){
	$(".loading").show();
	var status=$(".input_box").val();
	var team='<?php echo str_replace(" ","_",$row_GetTeam['Name']);?>';
	if(status == "Write a reply..."){
		$(".loading").hide();
	}else{
		var DATA = 'msg=' + status + '&team=' + team;
		$.ajax({
		type: "POST",
		url: "send_replay.php",
		data: DATA,
		cache: false,
		success: function(data){
		$("#conversation").append(data);
		$(".loading").hide();
		$(".input_box").val("Write a reply...").css("color","#808080").css("height","30px");
	}
	});
	}
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
    <h1><?php echo $row_GetTeam['City']." ".$row_GetTeam["Name"];?></h1><br />
    <div id="conversation">
	<?php 
    do { 
    if($row_GetThread['from']==str_replace(" ","_",$_SESSION['U_Team'])){
        $thread_avatar = $_SESSION['Avatar'];
        $thread_gm = $_SESSION['U_Name'];
        $thread_City = $_SESSION['U_City'];
        $thread_Name = $_SESSION['U_Team'];
    } else {
        $thread_avatar = $TeamAvatar;
        $thread_gm = $row_GetTeam ['GM'];
        $thread_City = $row_GetTeam ['City'];
        $thread_Name = $row_GetTeam ['Name'];
    }
    
        echo '<div class="msg_row">';
        echo '<div class="msg_icon"><img src="'.$thread_avatar.'" width="50" height="50" border="0" /></div>';
        echo '<div class="msg_comment"><a class="msg_link" href="#">'.$thread_gm." (".$thread_City." ".$thread_Name.")".'</a>';
        echo '<br />'.$row_GetThread['message'].'</div>';
        echo '<div class="msg_date">'.dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetThread['sent']).'</div><br clear="all" />';
        echo '</div>';
    } while ($row_GetThread = mysql_fetch_assoc($GetThread)); 

    ?>	  
    </div>
    <br clear="all" />
	<div align="center">
		<div class="con2">
                    <textarea class="input_box" style="width:615px;">Write a reply...</textarea>
                    <div class="button_outside_border_blue" id="share">
                        <div class="button_inside_border_blue">Reply</div>
                    </div>
                <div class="clear"></div>
                <div class="load_status_out"></div>
         </div>
     </div>
     
		<br />
 	</section>
</article>

<?php 
if(!isset($_SESSION['U_ID'])){
  header("Location: check_login.php?target=".basename($_SERVER['REQUEST_URI']));
	
} else {
	if(!$_SESSION['U_ID']==$_SESSION['current_Team_ID']){
  		header("Location: permission.php");
	}
}
?>
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
