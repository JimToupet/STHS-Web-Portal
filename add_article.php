<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Add Article";
	$l_Title  = "TITLE";
	$l_Summary  = "SUMMARY";
	$l_Content  = "CONTENT";
	$l_DateCreated  = "DATE CREATED";
	$l_Submit  = "SUBMIT";
	$l_Alert1 = "Please enter a title.  Please keep the title lest than 30 characters.";
	$l_Alert2 = "Please enter a summary.  Please keep the title lest than 140 characters.";
	$l_Alert3 = "Please enter the content.";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un article";
	$l_Title  = "TITRE";
	$l_Summary  = "SOMMAIRE";
	$l_Content  = "CONTENU";
	$l_DateCreated  = "DATE DE CR&Eacute;ATION";
	$l_Submit  = "POSTER";
	$l_Alert1 = "Veuillez &eacute;crire un titre.  SVP Gardez le titre &agrave; moins de 30 caract&egrave;res.";
	$l_Alert2 = "Veuillez &eacute;crire un sommaire.  SVP Gardez le sommaire &agrave; moins de 140 caract&egrave;res.";
	$l_Alert3 = "Veuillez &eacute;crire le contenu.";
	break;
} 



 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	$UPLOADED_PHOTO ="";
	
	$uploaddir = "image/headlines/";
	$uploadthumb = "image/headlines/thumb/";
	$uploadfile = $uploaddir . basename($_FILES['NEW_PHOTO']['name']);
	$uploadthumbfile = $uploadthumb . basename($_FILES['NEW_PHOTO']['name']);
	include('includes/SimpleImage.php');
	
	if (move_uploaded_file($_FILES['NEW_PHOTO']['tmp_name'], $uploadfile)) {
		$image = new SimpleImage();
		$image->load($uploadfile);	
		$image->resize(480,285);
		$image->save($uploadfile);
		$UPLOADED_PHOTO = basename($_FILES['NEW_PHOTO']['name']);
		$thumb = new SimpleImage();
		$thumb->load($uploadfile);
		$thumb->resize(35,25);
		$thumb->save($uploadthumbfile);
	}else{
		$UPLOADED_PHOTO = $_POST['PHOTO'];
	}

  $insertSQL = sprintf("INSERT INTO articles (Headline,Content,Summary,Image,DateCreated,Team,League) values (%s,%s,%s,%s,%s,%s,'True')",
                        GetSQLValueString($_POST['HEADLINE'], "text"),
                        GetSQLValueString($_POST['CONTENT'], "text"),
                        GetSQLValueString($_POST['SUMMARY'], "text"),
                        GetSQLValueString($UPLOADED_PHOTO, "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
					   	GetSQLValueString($_SESSION['U_ID'], "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
  $last_id=mysql_insert_id();
	
  
  $insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Name'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Article", "text"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  
  $url = $_SESSION['DomainName'].'/news.php?article='.$last_id;
	
  if(isset($_POST['SHARE']) && $_POST['SHARE'] != ""){
	require('includes/shorturl.php'); 
	$tinyURL = ShortUrl::create($url,'tinyurl');
	$message = $_POST['HEADLINE']." - ".$tinyURL;
  }
  
  if(isset($_POST['SHARE']) && $_POST['SHARE'] == "twitter"){
	require("twitter/twitteroauth.php");
	/* Get user access tokens out of the session. */
	$access_token = $_SESSION['access_token'];
	$twittter_connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$response = $twittter_connection->post('statuses/update', array('status' => substr($message, 0, 140)));
	
  } else if(isset($_POST['SHARE']) && $_POST['SHARE'] == "facebook"){
	  require 'facebook/facebook.php';
	  //facebook application
	   $facebook = new Facebook(array(
		  'appId'  => APP_ID,
		  'secret' => APP_SECRET,
		  'cookie' => true,
		));
	
		//Facebook Authentication part
		$user       = $facebook->getUser();
		if ($user) {
			try {
				$user = $facebook->api('/me');
				//$statusUpdate = $facebook->api('/me/feed', 'post', array('message'=> $message, 'cb' => ''));
				$publishStream = $facebook->api("/me/feed", 'post', array(
					'message' => $_POST['HEADLINE'],
					'link'    => $url,
					'picture' => $_SESSION['DomainName'].'/image/common/Facebook-share-icon.png',
					'name'    => $_SESSION['SiteName'],
					'description'=> $_POST["SUMMARY"]
					)
				);
			} catch (Exception $e) {
				echo $e;
			}
		}
  }
	
  if ($_SESSION['current_Team_ID'] == 0) {
  	$updateGoTo = "index.php";
  } else {
  	$updateGoTo = "news.php?Team=".$_SESSION['current_Team_ID']."&article=".$last_id;
  }
  
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_PageTitle;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css"><link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/datePicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/date.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/date.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.bgiframe.min.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  $('.date-pick').datepicker().val(new Date().asString()).trigger('change');
});;
</script>
<script language="javascript">
function checkit(){
	if (document.form1.HEADLINE.value.length==0){
		alert("<?php echo $l_Alert1;?>");
		return false;
	}
	if (document.form1.SUMMARY.value.length==0){
		alert("<?php echo $l_Alert2;?>");
		return false;
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

<h1><?php echo $l_PageTitle;?></h1>
<br />
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>

<div class="rowElem">
<label for="HEADLINE"><?php echo $l_Title;?>:</label>
<input type="text" name="HEADLINE" size="80" maxlength="255">
</div>

<div class="rowElem">
<label for="SUMMARY"><?php echo $l_Summary;?>:</label>
<input type="text" name="SUMMARY" size="80" maxlength="255">
</div>

<div class="rowElem">
<label for="CONTENT"><?php echo $l_Content;?>:</label>
<div style="margin-left:140px;">
<?php
if ($_SESSION['RichTextEditor'] == 0){
	echo "<textarea name='CONTENT' cols='50' rows='10'></textarea>";
} else {
	// Include CKEditor class.
	include_once "ckeditor/ckeditor.php";
	// The initial value to be displayed in the editor.
	$initialValue = '<p>This is some <strong>sample text</strong>.</p>';
	// Create class instance.
	$CKEditor = new CKEditor();
	// Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
	//   $CKEditor->basePath = '/ckeditor/'
	// If not set, CKEditor will try to detect the correct path.
	$CKEditor->basePath = 'ckeditor/';
	$CKEditor->config['width'] = 800;
	// Create textarea element and attach CKEditor to it.
	$CKEditor->editor("CONTENT","");
}
?></div>
</div>

<div class="rowElem">
<label for="PHOTO">PHOTO:</label>
<select name="PHOTO" size="1">
<option value="<?php echo $_SESSION['current_HeadlineImage'];?>" selected><?php echo $_SESSION['current_HeadlineImage'];?> (Default)</option>
<?php
$dir = "image/headlines/";

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			
            echo "<option value='".$file."'>".$file."</option>";
        }
        closedir($dh);
    }
} 
?> 
</select>  

<div class="rowElem">
<label for="NEW_PHOTO">UPLOAD PHOTO:</label>
<input type="file" name="NEW_PHOTO">
</div>


<?php if(isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'twitter'){?>
<div class="rowElem">
<input name="SHARE" type="checkbox" value="twitter" /> <img src="image/common/tweet.png" width="55" height="20" alt="Tweet">
<label for="SHARE"></label>
</div>
<?php } else if (isset($_SESSION['oauth_provider']) && $_SESSION['oauth_provider'] == 'facebook'){?>
<div class="rowElem">
<input name="SHARE" type="checkbox" value="facebook" /> <img src="image/common/fb_share.png" width="59" height="18" alt="Share">
<label for="SHARE"></label>
</div>
<?php } else { ?>
<input name="SHARE" type="hidden" value="" />
<?php } ?>


<br /><br />
<br /><br />

<div class="rowElem">
<label for="submit"></label>
<input type="submit" value="<?php echo $l_PageTitle;?>" class="button add">
</div>
<br /><br />

<input type="hidden" name="MM_insert" value="form1">
</form>

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
