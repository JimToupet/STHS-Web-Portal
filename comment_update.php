<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("facebook/facebook.php") ?>
<?php include("twitter/twitteroauth.php") ?>
<?php include("includes/shorturl.php") ?>
<?PHP 
switch ($lang){ 
case 'en': 
	$MailSubject = '%item1 commented on your post.';
	$MailMessage = '<a href="%item1">%item2 commented on your post</a>.<hr>%item3';
	break; 

case 'fr': 
	$MailSubject = '%item1 has accepted an offer sheet with %item2.';
	$MailMessage = '%item1 has decided to accept the contract offered by %item2 offered him a %item3 year deal worth $%item4. %item5 It may take up to 24 hours to see the changes on the website.';
	break;
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

$ID_GetArticle = "0";
if (isset($_POST["article"])) {
  $ID_GetArticle = (get_magic_quotes_gpc()) ? $_POST["article"] : addslashes($_POST["article"]);
}
$GetShare = "";
if (isset($_POST["share"])) {
  $GetShare = (get_magic_quotes_gpc()) ? $_POST["share"] : addslashes($_POST["share"]);
}

//Get posted values from form
$status=$_POST['status'];
 
//Strip slashes
$status = stripslashes($status);
 
//Strip tags 
$status = strip_tags($status);

$status = ParseSQL($status);

if(isset($_POST['id']))
{
$id=$_POST['id'];

//Inset into database  
$insertSQL = sprintf("INSERT INTO comments (Comment, DateCreated, DateModified, Team, Parent_ID, A_ID) VALUES (%s,%s,%s,%s,%s,%s)",
                        GetSQLValueString(numeric_entities($status), "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_ID'], "int"),
					   	GetSQLValueString($id, "int"),
                        GetSQLValueString($ID_GetArticle, "int"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$updateSQL = "UPDATE comments SET DateModified='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE ID=".$id;
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
					GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
					GetSQLValueString($_SESSION['U_Name'], "text"),
					GetSQLValueString($_SESSION['current_SeasonID'], "int"),
					GetSQLValueString("Article", "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$id=mysql_real_escape_string($id);
$com=mysql_query("select c.*, p.Avatar, p.GM, p.Number from comments as c, proteam as p WHERE c.Team=p.Number UNION ALL SELECT c.*, '".$avatar."', '".$defaultname."', 0 FROM comments as c WHERE c.Team=0 ORDER BY ID DESC LIMIT 1");
while($r=mysql_fetch_array($com))
{
$c_id=$r['ID'];
$comment=$r['Comment'];
$gm=$r['GM'];
$team=$r['Number'];
$avatar=$r['Avatar'];
?>
<div class="comment_ui" id="view<?php echo $id;?>">
<div class="comment_img"><img src="<?php echo $_SESSION['Avatar'];?>" width="32" height="32" border="0" /></div>
<div class="remove_comment" id="<?php echo $id; ?>"><img src="<?php echo $_SESSION['DomainName']; ?>/image/common/unchecked.gif" width="14" height="14" border="0" /></div>
<div class="comment_actual_text"><a href="team.php?team=<?php echo $team;?>"><?php echo $gm;?></a> <?php echo $comment; ?></div>
</div>
<?php 
} 
}

$query_GetEmails = sprintf("SELECT p.Number, p.Email, p.EmailAlert FROM proteam as p, comments as c WHERE p.Number=c.Team AND c.Parent_ID=%s AND c.Team <> %s GROUP BY p.Number UNION ALL SELECT p.Number, p.Email, p.EmailAlert FROM proteam as p, comments as c WHERE p.Number=c.Team AND c.ID=%s AND c.Team <> %s GROUP BY p.Number", $id, $_SESSION['U_ID'], $id, $_SESSION['U_ID']);
$GetEmails = mysql_query($query_GetEmails, $connection) or die(mysql_error());
$row_GetEmails = mysql_fetch_assoc($GetEmails);

$link_url = $_SESSION['DomainName'] . "/view_comments.php?id=".$ID_GetArticle;
$tmpTxtItems = array("%item1");
$updatedTxtItems = array($_SESSION['U_Name']);
$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubject);

$tmpTxtItems = array("%item1", "%item2", "%item3");
$updatedTxtItems = array($link_url,  $_SESSION['U_Name'],$status);
$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage);

do { 
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
							GetSQLValueString($_SESSION['current_Season'], "text"),
							GetSQLValueString(ParseSQL($MailMessage), "text"),
							GetSQLValueString($row_GetEmails['Number'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result0 = mysql_query($insertSQL, $connection) or die(mysql_error());
	if ($row_GetEmails['EmailAlert']==1){		
		sendMail($row_GetEmails['Email'], $_SESSION['U_Email'], $MailSubject, $MailMessage);
	}
} while ($row_GetEmails = mysql_fetch_assoc($GetEmails));
?>