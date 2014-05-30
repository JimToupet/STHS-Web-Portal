<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Reply = "Reply";
	$l_AddComment = "Add New Comment";
	$l_post = "Post";
	$l_Showing = "Showing";
	$l_Comments = "Comment(s)";
	break; 

case 'fr': 
	$l_Reply = "R&eacute;ponse";
	$l_AddComment = "Add New Comment";
	$l_post = "Post";
	$l_Showing = "Repr&eacute;sentation des";
	$l_Comments = "Comment(s)";
	break;
} 


 

$ID_GetArticle = "0";
if (isset($_GET["article"])) {
  $ID_GetArticle = (get_magic_quotes_gpc()) ? $_GET["article"] : addslashes($_GET["article"]);
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$query_GetArticle = sprintf("SELECT articles.*, proteam.LogoSmall, proteam.Number, proteam.Email, proteam.EmailAlert, proteam.forward_messages, proteam.access_token, proteam.oauth_uid, proteam.oauth_provider FROM articles LEFT JOIN proteam ON  articles.Team=proteam.Number WHERE articles.A_ID=%s",  $ID_GetArticle);
$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
$row_GetArticle = mysql_fetch_assoc($GetArticle);
$totalRows_GetArticle = mysql_num_rows($GetArticle);


if ($_SESSION['current_Team_ID']==0) {
	$query_GetNewsList = sprintf("SELECT articles.A_ID, articles.Headline, proteam.Number FROM articles LEFT JOIN proteam ON proteam.Number=articles.Team ORDER BY articles.DateCreated desc LIMIT 0,20");
} else {
	$query_GetNewsList = sprintf("SELECT articles.A_ID, articles.Headline, proteam.Number  FROM articles LEFT JOIN proteam ON  proteam.Number=articles.Team WHERE articles.Team=%s ORDER BY articles.DateCreated desc LIMIT 0,20", $_SESSION['current_Team_ID']);
}
$GetNewsList = mysql_query($query_GetNewsList, $connection) or die(mysql_error());
$row_GetNewsList = mysql_fetch_assoc($GetNewsList);

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
if(isset($_SESSION['U_SecondaryColor'])){ 
	$defaultSecondaryColor=$_SESSION['U_SecondaryColor'];
} else { 
	$defaultSecondaryColor = '000';
}

if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }
$query_GetRecentStatus = sprintf("SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, DateModified, c.Comment as Comment, c.A_Type, c.A_ID as A_ID, p.Avatar, p.GM, p.LogoSmall, p.Number, p.City, p.Name, p.SecondaryColor, p.oauth_provider, p.oauth_uid,
(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=%s) as LikeComment
FROM comments as c LEFT JOIN proteam as p 
ON c.Team=p.Number 
WHERE c.Parent_ID=0
AND c.A_Type=1
AND c.A_ID=%s 

UNION ALL

SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, DateModified, c.Comment as Comment, c.A_Type, c.A_ID as A_ID, '".$avatar."', '".$defaultname."', 'image/logos/medium/DefaultLogoSmall.jpg', 0, '', '".$l_League."', '".$defaultSecondaryColor."', '', '', (0) as LikeComment
FROM comments as c 
WHERE c.Team=0
AND c.A_Type=1
AND c.Parent_ID=0 
AND c.A_ID=%s 
 
ORDER BY DateModified DESC ",$userID,$ID_GetArticle,$ID_GetArticle);

$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $row_GetArticle['Headline']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
  $("#TeamPhoto").reflect({height:30,opacity:0.3});

 
$(".input_box").elastic().css("height","30px");
$(".input_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "So what's on your mind?"
}).val("").css("color","#000000");
});
$(".input_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("So what's on your mind?").css("color","#808080");
});


$("#share").click(function(){
	$(".loading").show();
	var status=$(".input_box").val();
	if(status == "So what's on your mind?"){
		$(".loading").hide();
	}else{
		
		if ($('#SHARE').is(':checked')){
			var sharetype = SHARE.value;
		} else {
			var sharetype = "";
		}
		
		var DATA = 'status=' + status + '&article=<?php echo $ID_GetArticle;?>&share=' + sharetype + '&type=1';
		$.ajax({
		type: "POST",
		url: "status_update.php",
		data: DATA,
		cache: false,
		success: function(data){
		$(".load_status_out").append(data);
		$(".loading").hide();
		$(".input_box").val("So what's on your mind?").css("color","#808080").css("height","30px");
	}
	});
	}
	return false;
});


$(".light_blue").click(function() 
{
	var ID = $(this).attr("id");
	$("#comment_ui"+ID).css({'visibility' : 'visible'});	
	$("#comment_ui"+ID).css({'height' : '35px'});
	$("#comment_ui"+ID).focus();
});


$(".view_comments").click(function() 
{
	var ID = $(this).attr("id");
	$.ajax({
		type: "POST",
		url: "viewajax.php",
		data: "id="+ ID, 
		cache: false,
		success: function(html){
			$("#view_comments"+ID).prepend(html);
			$("#view"+ID).remove();
			$("#two_comments"+ID).remove();
		}
		
	});
	return false;
});

$(".comment_box").elastic().css("height","15px");
$(".comment_box").focus(function(){
$(this).filter(function(){
return $(this).val() == "" || $(this).val() == "Write a comment..."
}).val("").css("color","#000000");
});
$(".comment_box").blur(function(){
$(this).filter(function(){
return $(this).val() == ""
}).val("Write a comment...").css("color","#808080");
});

$(".comment_box").keypress(function(e) {
	var ID = $(this).attr("id");
	code= (e.keyCode ? e.keyCode : e.which);
	if (code == 13) {
		$(".loading").show();
		var status=$(this).val();
		if(status == "Write a comment..."){
			$(".loading").hide();
		}else{
			var DATA = 'status=' + status + '&id=' + ID + '&type=1&article=<?php echo $ID_GetArticle;?>';
			$.ajax({
				type: "POST",
				url: "comment_update.php",
				data: DATA,
				cache: false,
				success: function(data){
					$(".loading").hide();
					$(".comment_box").val("Write a comment...").css("color","#808080").css("height","15px").blur();
					$("#view_comments"+ID).prepend(data);
				}
			});
		}
		return false;
	}
});


$(".remove_comment").click(function() 
{
	var ID = $(this).attr("id");
	var answer = confirm("Are you sure you want to remove this comment?")
	if (answer){
		$.ajax({
			type: "POST",
			url: "remove_status_comment.php",
			data: "id="+ ID, 
			cache: false,
			success: function(html){
				$("#load_status"+ID).remove();
			}
		});
	}
	return false;
});


$(".remove_status").live('click', function()
{
	var ID = $(this).attr("id");
	var answer = confirm("Are you sure you want to remove this comment?")
	if (answer){
		$.ajax({
			type: "POST",
			url: "remove_status_comment.php",
			data: "id="+ ID, 
			cache: false,
			success: function(html){
				$("#two_comments"+ID).remove();
			}
		});
	}
	return false;
});

$(".remove_comment").hover(function () 
{	
	$(this).css("opacity", "1");
	$(this).css("filter", "alpha(opacity=1)");
  }, 
  function () {
	$(this).css("opacity", "0.1");
	$(this).css("filter", "alpha(opacity=10)");
  }
);

});;
</script> 
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to remove this?")) {
    document.location = delUrl;
  }
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
section {width:718px; float:left;}
#comment_title {background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>;}
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
    	<strong><?php echo $l_nav_news;?></strong>
        <table class="tablesorterRates">
        <tbody>   
        <?php do { ?>
        <tr>
            <td><a href="news.php?team=<?php if($row_GetNewsList['Number'] != ""){ echo $row_GetNewsList['Number']; } else { echo 0; } ?>&article=<?php echo $row_GetNewsList['A_ID']; ?>"><?php echo $row_GetNewsList['Headline']; ?></a></td>
        </tr>
        <?php } while ($row_GetNewsList = mysql_fetch_assoc($GetNewsList)); ?>
        </tbody>
        </table>
    </aside>
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
    	<div style="float:right; width:125px; padding-left:10px; padding-bottom:10px;"><a href="team.php?team=<?php echo $row_GetArticle['Number'];?>"><img src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetArticle['LogoSmall']; ?>" border="0" id="TeamPhoto" /></a></div>
	    <?php 
			if(isset($_SESSION['U_ID'])){
				if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
					echo "<a href='edit_article.php?article=".$row_GetArticle['A_ID']."' class='button edit'><strong>MODIFY ARTICLE</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a href='javascript:confirmDelete(\"remove_article.php?article=".$row_GetArticle['A_ID']."\")'  class='button delete'><strong>REMOVE ARTICLE</strong></a><br /><br />";
				}
			}
			?>
        <h2><?php echo $row_GetArticle['Headline']; ?></h2>
        <small style="font-size:0.85em;"><?php echo $row_GetArticle['DateCreated']; ?></small>
		
        <br clear="all" />
        
        <?php echo $row_GetArticle['Content']; ?>

		<br /><br /><br />
        
		<div align="center">
		<div class="con" >
                <?php if(isset($_SESSION['U_ID'])){ ?>
                    <div class="pd">
                        <div class="share">Share:</div>
                        <div class="status">Status</div>
                        <div class="loading"></div>
                    </div>
                    <div class="img_top"></div>
                    <div class="text_status">
                    	<textarea class="input_box">So what's on your mind?</textarea>
                    </div>
                    <div style="float:left;">
                    <?php if(isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'twitter'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="twitter" /> <img src="image/common/tweet.png" width="55" height="20" alt="Tweet">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else if (isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'facebook'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="facebook" /> <img src="image/common/fb_share.png" width="59" height="18" alt="Share">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else { ?>
                    <input name="SHARE" type="hidden" value="" />
                    <?php } ?>
                    </div>
                    <div class="button_outside_border_blue" id="share">
                        <div class="button_inside_border_blue">
                            Share
                        </div>
                    </div>
                <div class="clear"></div>
                <div class="load_status_out"></div>
                
         <?php 
		}
		
		if($totalRows_GetRecentStatus > 0){
					$currentLikes = 0;
					$query_GetLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$row_GetRecentStatus['ID']);
					$GetLikes = mysql_query($query_GetLikes, $connection) or die(mysql_error());
					$row_GetLikes = mysql_fetch_assoc($GetLikes);
					$currentLikes = $row_GetLikes['TotalLikes'];
					
					$tmpID=0;
					do { 
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
						
						$currentCommentLikes = 0;
						$query_GetCommentLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$commentID);
					
						$GetCommentLikes = mysql_query($query_GetCommentLikes, $connection) or die(mysql_error());
						$row_GetCommentLikes = mysql_fetch_assoc($GetCommentLikes);
						$currentCommentLikes = $row_GetCommentLikes['TotalLikes'];
						
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
							echo '&nbsp;&nbsp;<a href="javascript:void();" class="light_blue" id="'.$row_GetRecentStatus['ID'].'">Comment</a>';
						} else {
								echo '<span style="color:#333333; font-size:12px;">&#8226; '.$currentLikes.' teams Like this</span>';
						}
						//echo '<div class="date">'.$row_GetRecentStatus['DateCreated'];
						echo '&nbsp;&nbsp;<span class="date">'.dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetRecentStatus['DateCreated']);
						echo '</span></div></div>';
						
						if($totalRows_GetComments>0){
							echo '<div class="comment_ui" id="view'.$row_GetRecentStatus['ID'].'">';
							if($totalRows_GetComments>1){
								$second_count=$totalRows_GetComments-1;
								echo '<div><a href="#" class="view_comments" id="'.$row_GetRecentStatus['ID'].'">View all '.$totalRows_GetComments.' comments</a></div>';
							} else {
								$second_count=0;
							}
							$query_GetCommentsDetails = sprintf("SELECT c.*, p.oauth_provider, p.oauth_uid, p.Avatar, p.GM, p.Number FROM comments as c, proteam as p WHERE c.Team=p.Number AND c.Parent_ID = %s UNION ALL SELECT c.*, '', '', '".$avatar."', '".$defaultname."', 0 FROM comments as c WHERE c.Team=0 AND c.Parent_ID = %s ORDER BY ID ASC LIMIT %s,1",$row_GetRecentStatus['ID'], $row_GetRecentStatus['ID'], $second_count);
							$GetCommentsDetails = mysql_query($query_GetCommentsDetails, $connection) or die(mysql_error());
							$row_GetCommentsDetails = mysql_fetch_assoc($GetCommentsDetails);
							echo '<div id="two_comments'.$row_GetRecentStatus['ID'].'">';
									echo '<div class="comment_text">';
										echo '<div class="comment_img"><img src="'.getAvatar($row_GetCommentsDetails['oauth_uid'], $row_GetCommentsDetails['oauth_provider'], $row_GetCommentsDetails['Number'], $connection).'" width="32" height="32" border="0" /></div>';
										
										if(isset($_SESSION['U_ID'])){
											if($_SESSION['U_ID']==$row_GetCommentsDetails['Team'] || $_SESSION['U_Admin']==1){
												echo '<div class="remove_status" id="'.$row_GetCommentsDetails['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
											}
										}
										echo '<div class="comment_actual_text" id="'.$row_GetCommentsDetails['ID'].'"><a href="team.php?team='.$row_GetCommentsDetails['Number'].'">'.$row_GetCommentsDetails['GM'].'</a> '.$row_GetCommentsDetails['Comment'].'</div>';
										echo '<div class="date" style="font-size:11px;">';
										//echo $row_GetCommentsDetails['DateCreated'];
										echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetCommentsDetails['DateCreated']);
										
										if(isset($_SESSION['U_ID'])){
											if($row_GetComments['LikeComment'] > 0){
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">You and '.$currentCommentLikes.' other(s) Like this</span>';
											} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$row_GetComments['ID'].'">'.$currentCommentLikes.'</span>)</span>';
											}
										} else {
												echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">'.$currentCommentLikes.' teams Like this</span>';
										}
									echo '</div>';
									echo '</div>';
									echo '</div>';							
							echo '</div>';
						}
						echo '<div id="view_comments'.$row_GetRecentStatus['ID'].'"></div>';
						if(isset($_SESSION['U_ID'])){
							echo '<div class="comment_ui" style="visibility:hidden; height:1px;" id="comment_ui'.$row_GetRecentStatus['ID'].'"><input type="text" maxlength="255" id="'.$row_GetRecentStatus['ID'].'" class="comment_box" style="font-size:11px;" value="Write a comment..." /></div>';
						}
						echo '<div class="clear" clear="both"></div></div>';
					}
					$tmpID=$row_GetRecentStatus['ID'];
					} while ($row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus));  
					
					
				}
			?>
            </div>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
