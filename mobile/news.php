<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php 
$ID_GetArticle = "0";
if (isset($_GET["article"])) {
  $ID_GetArticle = (get_magic_quotes_gpc()) ? $_GET["article"] : addslashes($_GET["article"]);
}

$query_GetArticle = sprintf("SELECT articles.*, proteam.LogoSmall, proteam.Number, proteam.City, proteam.Name FROM articles LEFT JOIN proteam ON  articles.Team=proteam.Number WHERE articles.A_ID=%s",  $ID_GetArticle);
$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
$row_GetArticle = mysql_fetch_assoc($GetArticle);
$totalRows_GetArticle = mysql_num_rows($GetArticle);

$query_GetRecentStatus = sprintf("SELECT
c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, c.Comment as Comment, c.A_ID as A_ID, p.Avatar, p.GM, p.LogoSmall, p.Number, p.City, p.Name, p.SecondaryColor 
FROM comments as c, proteam as p 
WHERE c.Team=p.Number 
AND c.Parent_ID=0
AND c.A_ID=%s 
ORDER BY DateCreated DESC ",$ID_GetArticle);

$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/status.css" />
<link rel="apple-touch-icon" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['TouchIcon'];?>" />
<script src="javascript/functions.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.elastic.js"></script>
<style media="all" type="text/css">
.input_box, .comment_box {width:280px;;}
.comment_text { width:300px; float:none; position:inherit;}
.comment_ui{
float:left; width:300px; 
}
</style>
<title><?php echo $_SESSION['SiteName'] ; ?></title>
<meta content="STHS Web Portal" name="keywords" />
<script type="text/javascript">
$(function(){ 
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
		
		var DATA = 'status=' + status + '&article=<?php echo $ID_GetArticle;?>&share=' + sharetype;
		$.ajax({
		type: "POST",
		url: "../status_update.php",
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
		url: "../viewajax.php",
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
			var DATA = 'status=' + status + '&id=' + ID + '&article=<?php echo $ID_GetArticle;?>';
			$.ajax({
				type: "POST",
				url: "../comment_update.php",
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
			url: "../remove_status_comment.php",
			data: "id="+ ID, 
			cache: false,
			success: function(html){
				$("#load_status"+ID).remove();
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
</head>

<body>

<div id="topbar">
	<div id="title"><?php echo $row_GetArticle['Headline']; ?></div>
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<span class="graytitle"><?php echo $row_GetArticle['City']." ".$row_GetArticle['Name']; ?></span>
	<ul class="pageitem">
		<li class="textbox"><span class="header"><?php echo $row_GetArticle['Headline']; ?> - <?php echo $row_GetArticle['DateCreated']; ?></span>
        <?php echo $row_GetArticle['Content']; ?>
        
        <hr />
        <?php
		if($totalRows_GetRecentStatus > 0){
					$tmpID=0;
					do { 
					if($tmpID != $row_GetRecentStatus['ID']){
						$query_GetComments = sprintf("SELECT * FROM comments WHERE Parent_ID = %s ORDER BY ID DESC", $row_GetRecentStatus['ID']);
						$GetComments = mysql_query($query_GetComments, $connection) or die(mysql_error());
						$row_GetComments = mysql_fetch_assoc($GetComments);
						$totalRows_GetComments = mysql_num_rows($GetComments);
                        
						if($row_GetRecentStatus['A_ID'] > 0){
							$query_GetArticle = sprintf("SELECT Headline, Summary FROM articles WHERE A_ID=%s",$row_GetRecentStatus['A_ID']);
							$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
							$row_GetArticle = mysql_fetch_assoc($GetArticle);
							$totalRows_GetArticle = mysql_num_rows($GetArticle);
						}
						
                        echo '<div class="load_status" id="load_status'.$row_GetRecentStatus['ID'].'">
						<div class="status_img"><img src="'.$_SESSION['DomainName'].'/image/gm/'.$row_GetRecentStatus['Avatar'].'" width="50" height="50" border="0" /></div>';
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$row_GetRecentStatus['Team'] || $_SESSION['U_Admin']==1){
								echo '<div class="remove_comment" id="'.$row_GetRecentStatus['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
							}
						}
						echo '<div class="status_text" id="'.$row_GetRecentStatus['ID'].'"><a href="#" class="blue">'.$row_GetRecentStatus['GM'].'</a>';
						echo '<p class="text">'.$row_GetRecentStatus['Comment'].'</p>';
						if($row_GetRecentStatus['A_ID'] > 0 && $totalRows_GetArticle > 0){
							echo '<p class="text" style="margin-left:20px; font-size:10px;"><a href="news.php?article='.$row_GetRecentStatus['A_ID'].'"><strong>'.$row_GetArticle['Headline'].'</strong></a><br /><em>'.$row_GetArticle['Summary'].'</em></p>';
						}
						echo '<div class="date">'.$row_GetRecentStatus['DateCreated'];
						if(isset($_SESSION['U_ID'])){
							echo '&middot; <a href="javascript:void();" class="light_blue" id="'.$row_GetRecentStatus['ID'].'">Comment</a>';
						}
						echo '</div></div>';
						
						if($totalRows_GetComments>0){
							echo '<div class="comment_ui" id="view'.$row_GetRecentStatus['ID'].'">';
							if($totalRows_GetComments>1){
								$second_count=$totalRows_GetComments-1;
								echo '<div><a href="#" class="view_comments" id="'.$row_GetRecentStatus['ID'].'">View all '.$totalRows_GetComments.' comments</a></div>';
							} else {
								$second_count=0;
							}
							$query_GetCommentsDetails = sprintf("SELECT c.*, p.Avatar, p.GM, p.Number FROM comments as c, proteam as p WHERE c.Team=p.Number AND c.Parent_ID = %s ORDER BY c.ID ASC LIMIT %s,1",$row_GetRecentStatus['ID'], $second_count);
							$GetCommentsDetails = mysql_query($query_GetCommentsDetails, $connection) or die(mysql_error());
							$row_GetCommentsDetails = mysql_fetch_assoc($GetCommentsDetails);
							echo '<div id="two_comments'.$row_GetRecentStatus['ID'].'">';
									echo '<div class="comment_text">';
										echo '<div class="comment_img"><img src="'.$_SESSION['DomainName'].'/image/gm/'.$row_GetCommentsDetails['Avatar'].'" width="32" height="32" border="0" /></div>';
										
										if(isset($_SESSION['U_ID'])){
											if($_SESSION['U_ID']==$row_GetCommentsDetails['Team'] || $_SESSION['U_Admin']==1){
												echo '<div class="remove_comment" id="'.$row_GetCommentsDetails['ID'].'"><img src="'.$_SESSION['DomainName'].'/image/common/unchecked.gif" width="14" height="14" border="0" /></div>';
											}
										}
										echo '<div class="comment_actual_text" id="'.$row_GetCommentsDetails['ID'].'"><a href="team.php?team='.$row_GetCommentsDetails['Number'].'">'.$row_GetCommentsDetails['GM'].'</a> '.$row_GetCommentsDetails['Comment'].'</div>';
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
         <br />
		<div align="center">
		<div>
         <?php if(isset($_SESSION['U_ID'])){ ?>
                    <div class="text_status">
                    	<textarea class="input_box">So what's on your mind?</textarea>
                    </div>
                    <div style=" text-align:center">
                    <?php if(isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'twitter'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="twitter" /> <img src="../image/common/tweet.png" vspace="10" width="55" height="20" alt="Tweet">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else if (isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'facebook'){?>
                    <div class="rowElem">
                    <input name="SHARE" id="SHARE" type="checkbox" value="facebook" /> <img src="../image/common/fb_share.png" vspace="10" width="59" height="18" alt="Share">
                    <label for="SHARE"></label>
                    </div>
                    <?php } else { ?>
                    <input name="SHARE" type="hidden" value="" />
                    <?php } ?>
                    </div>
                        <li class="button" id="share"> 
							<input name="Share" type="submit" value="Share" /></li> 
                <div class="clear"></div>
                <div class="load_status_out"></div>
                
        <?php 
		}
		?>
		
            </div>
		</li>
	</ul>
</div>

<div id="footer">
	<a class="noeffect" href="http://www.simhl.net"><?php echo $l_footer_2; ?> STHS WEB PORTAL</a>
	&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php
    $currentFile = $_SERVER["SCRIPT_NAME"]; 
    $parts = Explode('/', $currentFile); 
    $currentFile = $parts[count($parts) - 1]; 
    if($lang=='en'){
        echo '<a class="noeffect"href="langswitch.php?lang=fr&prevpage='.$currentFile.'">Fran&ccedil;ais</a>';
    } else {
        echo '<a class="noeffect"href="langswitch.php?lang=en&prevpage='.$currentFile.'">English</a>';
    }
    ?>
</div>

</body>

</html>
