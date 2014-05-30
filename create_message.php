<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Create Message";
	$l_To  = "TO";
	$l_Title  = "TITLE";
	$l_Message  = "MESSAGE";
	$l_Select  = "Select a team";
	$l_Submit  = "SEND";
	$l_Alert1 = "Please select a G.M. you wish to send a message to.";
	$l_Alert2 = "Please enter a title.";
	break; 

case 'fr': 
	$l_PageTitle = "Envoyez message";
	$l_To  = "&AGRAVE;";
	$l_Title  = "TITRE";
	$l_Message  = "MESSAGE";
	$l_Select  = "Choisissez une &eacute;quipe";
	$l_Submit  = "ENVOYEZ";
	$l_Alert1 = "Veuillez choisir un G.M. que vous souhaitez envoyer un message &agrave;.";
	$l_Alert2 = "Veuillez &eacute;crire un titre.";
	break;
} 


 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mail (Title,Content,DateCreated,Sender_U_ID,Receiver_U_ID,Viewed) values (%s,%s,%s,%s,%s,'False')",
                        GetSQLValueString($_POST['TITLE'], "text"),
                        GetSQLValueString($_POST['CONTENT'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
					   	GetSQLValueString($_SESSION['U_ID'], "int"),
						GetSQLValueString($_POST['RECEIVER'], "int"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  
  $query_GetTeam = sprintf("SELECT proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['RECEIVER']);
	$GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
	$row_GetTeam = mysql_fetch_assoc($GetTeam);	
	if ($row_GetTeam['EmailAlert']==1){
		sendMail($row_GetTeam['Email'], $_SESSION['U_Email'], $_POST['TITLE'], $_POST['CONTENT']);
	}
	mysql_free_result($GetTeam);
  
  $updateGoTo = "check_messages.php?team=".$_SESSION['U_ID'];
  header(sprintf("Location: %s", $updateGoTo));
}
$ID_GetMail = "1";
if (isset($_GET['id'])) {
  $ID_GetMail = (get_magic_quotes_gpc()) ? $_GET['id'] : ParseSQL($_GET['id']);
}
$GetType = "new";
if (isset($_GET['type'])) {
  $GetType = (get_magic_quotes_gpc()) ? $_GET['type'] : ParseSQL($_GET['type']);
}

if ($GetType == "reply"){
	$query_GetMail = sprintf("SELECT mail.* FROM mail WHERE mail.M_ID=%s", $ID_GetMail);
	$GetMail = mysql_query($query_GetMail, $connection) or die(mysql_error());
	$row_GetMail = mysql_fetch_assoc($GetMail);
	$tmpTitle="RE: ".$row_GetMail['Title'];
	$tmpContent="<p> </p><br><br><br><blockquote style='font-size:0.75em;'>-----Original Message-----<br><b>Sent:</b> ".$row_GetMail['DateCreated']."<br><b>Subject:</b> ".$row_GetMail['Title']."<br>".$row_GetMail['Content']."</blockquote>";
	
	if ($row_GetMail['Sender_U_ID'] == NULL){
		$tmpGM=0;
	} else {
		$tmpGM=$row_GetMail['Sender_U_ID'];
	}
	mysql_free_result($GetMail);
	
}else{
	$tmpGM=0;
	$tmpTitle="";
	$tmpContent="";
}
if ($GetType == "reply"){
	$query_GetTeamList = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number = %s",$tmpGM);
}else{
	$query_GetTeamList = sprintf("SELECT proteam.GM, proteam.City, proteam.Name, proteam.Number FROM proteam WHERE proteam.Number <> %s ORDER BY proteam.City",$_SESSION['U_ID']);
}
$GetTeamList = mysql_query($query_GetTeamList, $connection) or die(mysql_error());
$row_GetTeamList = mysql_fetch_assoc($GetTeamList);

$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Email", "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
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
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

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
});;
</script>
<script language="javascript">
function checkit(){
	if (document.form1.RECEIVER[document.form1.RECEIVER.selectedIndex].value == 0){
		alert("<?php echo $l_Alert1;?>");
		return false;
	}
	if (document.form1.TITLE.value.length==0){
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
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>
        
        <div class="rowElem">
        <label for="RECEIVER"><?php echo $l_To;?>:</label>
            <select name="RECEIVER">
              <option value="0" selected="selected"><?php echo $l_Select;?></option>
            <?php do { ?>
            <option value="<?php echo $row_GetTeamList['Number']; ?>" <?php if ($tmpGM==$row_GetTeamList['Number']){ echo "selected"; }?>><?php echo $row_GetTeamList['City']." ".$row_GetTeamList['Name']." (".$row_GetTeamList['GM']; ?>)</option>
            <?php } while ($row_GetTeamList = mysql_fetch_assoc($GetTeamList)); ?>
          </select>
        </div>
        
        <div class="rowElem">
        <label for="TITLE"><?php echo $l_Title;?>:</label>
        <input type="text" name="TITLE" size="85" value="<?php echo $tmpTitle; ?>" size="100">
        </div>
        
        <div class="rowElem">
        <label for="CONTENT" ><?php echo $l_Message;?>:</label>
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
                $CKEditor->editor("CONTENT", $tmpContent);
            }
            ?>
            </div>
        </div>
        
        <br /><br />
        
        <div class="rowElem" align="center">
        <input type="submit" value="<?php echo $l_Submit;?>" class="button email">
        </div>
        
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
<?php
mysql_free_result($GetTeamList);
?>