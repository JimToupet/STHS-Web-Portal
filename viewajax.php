<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php

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

if(isset($_POST['id']))
{
$id=$_POST['id'];
$id=mysql_real_escape_string($id);

if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }
$sql = "select c.*, p.oauth_uid, p.oauth_provider, p.Avatar, p.GM, p.Number,(SELECT count(ID) FROM likes WHERE ParentType=0 AND Parent_ID=c.ID AND Team=".$userID.") as LikeComment from comments as c LEFT JOIN proteam as p ON c.Team=p.Number WHERE c.Parent_ID='$id' UNION ALL SELECT c.*, '', '', '".$avatar."', '".$defaultname."', 0, 0 FROM comments as c WHERE c.Parent_ID='$id' AND c.Team=0 order by ID ASC";
$com=mysql_query($sql);
while($r=mysql_fetch_array($com))
{
$c_id=$r['ID'];
$comment=$r['Comment'];
$gm=$r['GM'];
$team=$r['Number'];
$avatar=$r['Avatar'];
$oauth_provider=$r['oauth_provider'];
$oauth_uid=$r['oauth_uid'];

$currentCommentLikes = 0;
$query_GetCommentLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=0 AND Parent_ID=%s",$c_id);
$GetCommentLikes = mysql_query($query_GetCommentLikes, $connection) or die(mysql_error());
$row_GetCommentLikes = mysql_fetch_assoc($GetCommentLikes);
$currentCommentLikes = $row_GetCommentLikes['TotalLikes'];
?>
<div id="two_comments<?php echo $c_id?>">
<div class="comment_text">
<div class="comment_ui" id="view<?php echo $c_id;?>">
<div class="comment_img"><img src="<?php echo getAvatar($oauth_uid, $oauth_provider, $team, $connection);?>" width="32" height="32" border="0" /></div>
<?php
if(isset($_SESSION['U_ID'])){
if($_SESSION['U_ID']==$team || $_SESSION['U_Admin']==1){
?>
<div class="remove_status" id="<?php echo $c_id; ?>"><img src="<?php echo $_SESSION['DomainName']; ?>/image/common/unchecked.gif" width="14" height="14" border="0" /></div>
<?php } } ?>
<div class="comment_actual_text"><a href="team.php?team=<?php echo $team;?>"><?php echo $gm;?></a> <?php echo $comment; ?></div><br />
<div class="date" style="font-size:11px;">
<?php 
echo $r['DateCreated'];
if(isset($_SESSION['U_ID'])){
	if($r['LikeComment'] > 0){
		echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">You and '.$currentCommentLikes.' other(s) Like this</span>';
	} else {
		echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;"><a href="" class="likeButton">Like</a> (<span type="0" id="'.$c_id.'">'.$currentCommentLikes.'</span>)</span>';
	}
} else {
		echo '&nbsp;&nbsp;<span style="color:#333333; font-size:11px;">'.$currentCommentLikes.' teams Like this</span>';
}
?>
</div>
</div>
</div>
<?php } } ?>