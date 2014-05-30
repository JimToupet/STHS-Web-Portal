<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Check Comments";
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

$ID = 0;
if (isset($_GET['id'])) {
  $ID = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
if(isset($_SESSION['Avatar'])){ 
	$avatar=$_SESSION['Avatar'];
} else { 
	$avatar = '/image/gm/'.$_SESSION['CommishIcon'];
}
if(isset($_SESSION['U_Team'])){ 
	$defaultname=$_SESSION['U_Team'];
} else { 
	$defaultname = $l_commissioner;
}
if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }

$query_GetRecentStatus = sprintf("
SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, DateModified, c.Comment as Comment, c.A_Type, c.A_ID as A_ID, p.Avatar, p.GM, p.oauth_provider, p.oauth_uid,
(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=%s) as LikeComment
FROM comments as c, proteam as p 
WHERE c.ID=%s
AND c.Team=p.Number
AND c.Parent_ID=0
ORDER BY DateModified DESC",$userID, $ID);
$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Check Comments - <?php echo $_SESSION['SiteName'] ; ?></title>

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

  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });

$(".input_box").elastic().css("height","30px");
$(".input_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "Write a comment..."
}).val("").css("color","#000000");
});
$(".input_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("Write a comment...").css("color","#808080");
});


$("#share").click(function(){
	$(".loading").show();
	var status=$(".input_box").val();
	if(status == "Write a comment..."){
		$(".loading").hide();
	}else{
		var DATA = 'status=' + status + '&id=<?php echo $ID;?>&type=0&article=0';
		$.ajax({
		type: "POST",
		url: "comment_update.php",
		data: DATA,
		cache: false,
		success: function(data){
		$(".loading").hide();
		$(".input_box").val("Write a comment...").css("color","#808080").css("height","30px");
		$("#view_comments"+<?php echo $ID;?>).prepend(data);
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
    <h1>Check Comments</h1><br />
    <div id="conversation">
	<?php 
    if($totalRows_GetRecentStatus > 0){
					
					$tmpID=0;
					$tmpCounter=0;
					do { 
					$currentLikes = 0;
					$query_GetLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$row_GetRecentStatus['ID']);
					$GetLikes = mysql_query($query_GetLikes, $connection) or die(mysql_error());
					$row_GetLikes = mysql_fetch_assoc($GetLikes);
					$currentLikes = $row_GetLikes['TotalLikes'];
					if($tmpID != $row_GetRecentStatus['ID']){
						if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }
						$query_GetComments = sprintf("SELECT c.*,(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=%s) as LikeComment FROM comments as c WHERE c.Parent_ID = %s ORDER BY c.ID DESC", $userID, $row_GetRecentStatus['ID']);
						$GetComments = mysql_query($query_GetComments, $connection) or die(mysql_error());
						$row_GetComments = mysql_fetch_assoc($GetComments);
						$totalRows_GetComments = mysql_num_rows($GetComments);
						if($totalRows_GetComments > 0){ $commentID = $row_GetComments['ID'];} else { $commentID=0;}
                        
						if($row_GetRecentStatus['A_ID'] > 0){
							$query_GetArticle = sprintf("SELECT Headline, Summary FROM articles WHERE A_ID=%s",$row_GetRecentStatus['A_ID']);
							$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
							$row_GetArticle = mysql_fetch_assoc($GetArticle);
							$totalRows_GetArticle = mysql_num_rows($GetArticle);
						}
						
                        echo '<div class="load_status" id="load_status'.$row_GetRecentStatus['ID'].'">
						<div class="status_img"><img src="'.getAvatar($row_GetRecentStatus['oauth_uid'], $row_GetRecentStatus['oauth_provider'], $row_GetRecentStatus['Team'], $connection).'" width="50" height="50" border="0" /></div>';
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$row_GetRecentStatus['Team'] || $_SESSION['U_Admin']==1){
								echo '<div class="remove_comment" id="'.$row_GetRecentStatus['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
							}
						}
						echo '<div class="status_text" id="'.$row_GetRecentStatus['ID'].'"><a href="view_comments.php?id='.$row_GetRecentStatus['ID'].'" class="blue">'.$row_GetRecentStatus['GM'].'</a>';
						echo '<p class="text">'.$row_GetRecentStatus['Comment'].'</p>';
						if($row_GetRecentStatus['A_ID'] > 0 && $row_GetRecentStatus['A_Type'] == 1 && $totalRows_GetArticle > 0){
							echo '<p class="text" style="margin-left:20px; font-size:10px;"><a href="news.php?article='.$row_GetRecentStatus['A_ID'].'"><strong>'.$row_GetArticle['Headline'].'</strong></a><br /><em>'.$row_GetArticle['Summary'].'</em></p>';
						}
						echo '<div style="margin:5px;">';
						if(isset($_SESSION['U_ID'])){
							if($row_GetRecentStatus['LikeComment'] > 0){
								if($currentLikes-1 > 0){
									echo '<span style="color:#333333; font-size:12px;">&#8226; You and '.number_format($currentLikes-1).' other(s) Like this</span>';
								} else {
									echo '<span style="color:#333333; font-size:12px;">&#8226; You Like this</span>';
								}
							} else {
								echo '<span style="color:#333333; font-size:12px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$row_GetRecentStatus['ID'].'">'.$currentLikes.'</span>)</span>';
							}
							//echo '&nbsp;&nbsp;<a href="javascript:void();" class="light_blue" id="'.$row_GetRecentStatus['ID'].'">Comment</a>';
						} else {
								echo '<span style="color:#333333; font-size:12px;">&#8226; '.$currentLikes.' teams Like this</span>';
						}
						//echo '<div class="date">'.$row_GetRecentStatus['DateCreated'];
						echo '&nbsp;&nbsp;<span class="date">'.dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetRecentStatus['DateCreated']);
						echo '</span></div></div>';
						
						
						if($totalRows_GetComments>0){
							
							$query_GetCommentsDetails = sprintf("SELECT c.*,(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=p.Number) as LikeComment, p.oauth_provider, p.oauth_uid, p.Avatar, p.GM, p.Number FROM comments as c, proteam as p WHERE c.Team=p.Number AND c.Parent_ID = %s ORDER BY ID ASC ",$row_GetRecentStatus['ID']);
							$GetCommentsDetails = mysql_query($query_GetCommentsDetails, $connection) or die(mysql_error());
							$row_GetCommentsDetails = mysql_fetch_assoc($GetCommentsDetails);
							$totalRows_GetCommentsDetails = mysql_num_rows($GetCommentsDetails);
							
							
							do {
								
							$currentCommentLikes = 0;
							$query_GetCommentLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$row_GetCommentsDetails['ID']);
							$GetCommentLikes = mysql_query($query_GetCommentLikes, $connection) or die(mysql_error());
							$row_GetCommentLikes = mysql_fetch_assoc($GetCommentLikes);
							$currentCommentLikes = $row_GetCommentLikes['TotalLikes'];

							echo '<div class="comment_ui" id="view'.$row_GetRecentStatus['ID'].'">';
							echo '<div id="two_comments'.$row_GetRecentStatus['ID'].'">';
									echo '<div class="comment_text">';
										echo '<div class="comment_img"><img src="'.getAvatar($row_GetCommentsDetails['oauth_uid'], $row_GetCommentsDetails['oauth_provider'], $row_GetCommentsDetails['Number'], $connection).'" width="32" height="32" border="0" /></div>';
										if(isset($_SESSION['U_ID'])){
											if($_SESSION['U_ID']==$row_GetCommentsDetails['Team'] || $_SESSION['U_Admin']==1){
												echo '<div class="remove_status" id="'.$row_GetCommentsDetails['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
											}
										}
										echo '<div class="comment_actual_text" id="'.$row_GetCommentsDetails['ID'].'"><a href="bio.php?team='.$row_GetCommentsDetails['Number'].'">'.$row_GetCommentsDetails['GM'].'</a> '.$row_GetCommentsDetails['Comment'].'</div><br />';
										echo '<div class="date" style="font-size:11px;">';
										//echo $row_GetCommentsDetails['DateCreated'];
										echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetCommentsDetails['DateCreated']);
										
										if(isset($_SESSION['U_ID'])){
											if($row_GetCommentsDetails['LikeComment'] > 0){
												if($currentCommentLikes-1 > 0){
													echo '&nbsp;&nbsp;<span style="color:#333333; font-size:12px;">You and '.number_format($currentCommentLikes-1).' other(s) Like this</span>';
												} else {
													echo '&nbsp&nbsp;;<span style="color:#333333; font-size:12px;">You Like this</span>';
												}
											} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$row_GetCommentsDetails['ID'].'">'.$currentCommentLikes.'</span>)</span>';
											}
										} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">'.$currentCommentLikes.' teams Like this</span>';
										}
									echo '</div>';
									echo '</div>';
									echo '</div>';
							
							echo '</div>';
							} while ($row_GetCommentsDetails = mysql_fetch_assoc($GetCommentsDetails));  
						}
						echo '<div id="view_comments'.$row_GetRecentStatus['ID'].'"></div>';
						if(isset($_SESSION['U_ID'])){
							echo '<div class="comment_ui" style="visibility:hidden; height:1px;" id="comment_ui'.$row_GetRecentStatus['ID'].'"><input type="text" maxlength="255" id="'.$row_GetRecentStatus['ID'].'" class="comment_box" style="font-size:11px;" value="Write a comment..." /></div>';
						}
						echo '<div class="clear" clear="both"></div></div>';
					}
					$tmpCounter=$tmpCounter+1;
					$tmpID=$row_GetRecentStatus['ID'];
					
					} while ($row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus));  
					
					
				}
				
				?>  
    </div>
    
	<div align="center">
		<div class="con2">
                    <textarea class="input_box" style="width:615px;">Write a comment...</textarea>
                    <div class="button_outside_border_blue" id="share" style="width:125px;">
                        <div class="button_inside_border_blue" style="width:125px;">Comment</div>
                    </div>
                <div class="clear"></div>
                <div class="load_status_out"></div>
         </div>
     </div>
     
		<br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
