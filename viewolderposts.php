<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$id=mysql_real_escape_string($id);

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

$POSTTYPE=$_POST['type'];
if($POSTTYPE == "team"){
	$query_GetRecentStatus = sprintf("
	SELECT
	c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, c.Comment as Comment, c.A_ID as A_ID, p.Avatar, p.GM, p.oauth_provider, p.oauth_uid
	FROM comments as c, proteam as p 
	WHERE c.Team=%s
	AND c.Team=p.Number 
	AND c.Parent_ID=0 
	ORDER BY DateModified DESC LIMIT %d,10",$_SESSION['current_Team_ID'], $id);
} else {
	$query_GetRecentStatus = sprintf("
	SELECT
	c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, c.DateModified, c.Comment as Comment, c.A_ID as A_ID, p.Avatar, p.GM, p.oauth_provider, p.oauth_uid
	FROM comments as c, proteam as p 
	WHERE c.Team=p.Number 
	AND c.Parent_ID=0 
	UNION ALL 
	SELECT c.ID as ID, c.Team as Team, c.DateCreated as DateCreated, c.DateModified, c.Comment as Comment, c.A_ID as A_ID, '".$avatar."', '".$defaultname."','', '' 
	FROM comments as c 
	WHERE c.Team=0 
	AND c.Parent_ID=0 
	ORDER BY DateModified DESC LIMIT %d,10",$id);	
}

$GetRecentStatus = mysql_query($query_GetRecentStatus, $connection) or die(mysql_error());
$row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus);
$totalRows_GetRecentStatus = mysql_num_rows($GetRecentStatus);

if($totalRows_GetRecentStatus > 0){
	$tmpID=0;
	$tmpCounter=$id;
	do { 
	$currentLikes = 0;
	$query_GetLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$row_GetRecentStatus['ID']);
	$GetLikes = mysql_query($query_GetLikes, $connection) or die(mysql_error());
	$row_GetLikes = mysql_fetch_assoc($GetLikes);
	$currentLikes = $row_GetLikes['TotalLikes'];
	if($tmpID != $row_GetRecentStatus['ID']){
		$query_GetComments = sprintf("SELECT * FROM comments WHERE Parent_ID = %s ORDER BY ID DESC", $row_GetRecentStatus['ID']);
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
		if($row_GetRecentStatus['A_ID'] > 0 && $totalRows_GetArticle > 0){
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
							echo '<div class="comment_actual_text" id="'.$row_GetCommentsDetails['ID'].'"><a href="bio.php?team='.$row_GetCommentsDetails['Number'].'">'.$row_GetCommentsDetails['GM'].'</a> '.$row_GetCommentsDetails['Comment'].'</div><br />';
							echo '<div class="date" style="font-size:11px;">';
							//echo $row_GetCommentsDetails['DateCreated'];
							echo dateDiff(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), $row_GetCommentsDetails['DateCreated']);
							
							if(isset($_SESSION['U_ID'])){
								if($row_GetComments['LikeComment'] > 0){
									if($currentCommentLikes-1 > 0){
										echo '&nbsp;&nbsp;<span style="color:#333333; font-size:12px;">You and '.number_format($currentCommentLikes-1).' other(s) Like this</span>';
									} else {
										echo '&nbsp&nbsp;;<span style="color:#333333; font-size:12px;">You Like this</span>';
									}
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
	$tmpCounter=$tmpCounter+1;
	$tmpID=$row_GetRecentStatus['ID'];
	if(($tmpCounter-$id)==$totalRows_GetRecentStatus){
		echo '<div class="olderposts" id="olderposts" align="center"><a href="#" class="GetOlderPosts" id="'.$tmpCounter.'">Older Posts</a></div>';
	}
	} while ($row_GetRecentStatus = mysql_fetch_assoc($GetRecentStatus));  

}

}
?>