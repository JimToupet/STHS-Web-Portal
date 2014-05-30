<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("facebook/facebook.php") ?>
<?php include("twitter/twitteroauth.php") ?>
<?php include("includes/shorturl.php") ?>
<?PHP 

 
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

$l_Comments = "Comments";

$ID_GetArticle = "0";
if (isset($_POST["article"])) {
  $ID_GetArticle = (get_magic_quotes_gpc()) ? $_POST["article"] : addslashes($_POST["article"]);
}
$GetShare = "";
if (isset($_POST["share"])) {
  $GetShare = (get_magic_quotes_gpc()) ? $_POST["share"] : addslashes($_POST["share"]);
}
$GetType = 0;
if (isset($_POST["type"])) {
  $GetType = (get_magic_quotes_gpc()) ? $_POST["type"] : addslashes($_POST["type"]);
}

//Get posted values from form
$status=$_POST['status'];
 
//Strip slashes
$status = stripslashes($status);
 
//Strip tags 
$status = strip_tags($status);

$status = ParseSQL($status);
$Headline = "";

if($ID_GetArticle > 0){
	$query_GetArticle = sprintf("SELECT Headline FROM articles WHERE A_ID=%s",  $ID_GetArticle);
	$GetArticle = mysql_query($query_GetArticle, $connection) or die(mysql_error());
	$row_GetArticle = mysql_fetch_assoc($GetArticle);
	$totalRows_GetArticle = mysql_num_rows($GetArticle);
	$Headline = $row_GetArticle['Headline'];
}

if(!isset($_SESSION['U_ID']) || $_SESSION['U_ID'] == ''){
	$LoggedinTeamID = 0;
} else {
	$LoggedinTeamID = $_SESSION['U_ID'];
}

//Inset into database
$insert_status=mysql_query("INSERT INTO comments (Comment, DateCreated, DateModified, Team, A_ID, A_Type) 
VALUES ('".numeric_entities($status)."', '".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', '".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', '".$LoggedinTeamID."', ".$ID_GetArticle.", ".$GetType.")") or die (mysql_error());


$get_status_sql = "SELECT * FROM comments WHERE Team=".$LoggedinTeamID." ORDER BY ID DESC LIMIT 1";
$get_status=mysql_query($get_status_sql) or die (mysql_error());
while($row=mysql_fetch_array($get_status)){
$status=$row['Comment'];
$date=$row['DateCreated'];
}
 
if($LoggedinTeamID > 0){
$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
					GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
					GetSQLValueString($_SESSION['U_Name'], "text"),
					GetSQLValueString($_SESSION['current_SeasonID'], "int"),
					GetSQLValueString("Article", "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}
//Line break after every 60
$status = wordwrap($status, 60, "<br />", true);
 
//Line breaks
$status=nl2br($status);
 
//Display status from data base
echo '<div class="load_status">
<div class="status_img"><img src="'.$avatar.'" width="50" height="50" border="0" /></div>
<div class="status_text"><a href="#" class="blue">'.$defaultname.'</a>
<p class="text">'.$status.'</p>
<div class="date">'.$date.'</div>
</div>
<div class="clear"></div>
</div>';

if($GetShare == "twitter"){  
	if($ID_GetArticle > 0){
		$url = $_SESSION['DomainName'].'/news.php?article='.$ID_GetArticle;
		$tinyURL = ShortUrl::create($url,'tinyurl');
	} else {
		$tinyURL = ShortUrl::create($_SESSION['DomainName'],'tinyurl');
	}
	$status = $status." - ".$tinyURL;
	/* Get user access tokens out of the session. */
	$access_token = $_SESSION['access_token'];
	$twittter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$response = $twittter_connection->post('statuses/update', array('status' => substr($status, 0, 140)));
	
} else if($GetShare == "facebook"){
	//facebook application
	$facebook = new Facebook(array(
	  'appId'  => APP_ID,
	  'secret' => APP_SECRET,
	  'cookie' => true,
	));

	if($ID_GetArticle > 0){
		$url = $_SESSION['DomainName'].'/news.php?article='.$ID_GetArticle;
	} else {
		$url = $_SESSION['DomainName'];
	}
	//Facebook Authentication part
	$user       = $facebook->getUser();
	if ($user) {
		try {
			$user = $facebook->api('/me');
			//$statusUpdate = $facebook->api('/me/feed', 'post', array('message'=> $message, 'cb' => ''));
			$publishStream = $facebook->api("/me/feed", 'post', array(
				'message' => $l_Comments.' - '.$Headline,
				'link'    => $url,
				'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
				'name'    => $_SESSION['SiteName'],
				'description'=> $status
				)
			);
		} catch (Exception $e) {
			echo $e;
		}
	}
}
?>