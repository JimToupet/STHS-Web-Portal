<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Submit  = "SAVE";
	break; 

case 'fr': 
	$l_Submit  = "POSTER";
	break;
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$TID = "0";
if (isset($_SESSION['current_Team_ID'])) {
  $TID = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : $_SESSION['current_Team_ID'];
}

$statustxt = "";

if ((isset($_POST["MM_edit"])) && ($_POST["MM_edit"] == "form1")) {
	
	if(isset($_POST['post_game_results']) && $_POST['post_game_results'] == 'True'){
	   $post_game_results = "True";
	} else {
	   $post_game_results = "False";
	} 
	
	if(isset($_POST['post_approvals']) && $_POST['post_approvals'] == 'True'){
	   $post_approvals = "True";
	} else {
	   $post_approvals = "False";
	}  
	
	if(isset($_POST['forward_messages']) && $_POST['forward_messages'] == 'True'){
	   $forward_messages = "True";
	} else {
	   $forward_messages = "False";
	}  
 
	
	$updateSQL = "UPDATE proteam SET post_game_results='".$post_game_results."',  post_approvals='".$post_approvals."', forward_messages='".$forward_messages."' WHERE Number=".$_POST['team'];
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
    $statustxt = "<strong>App Settings Saved.</strong>\n";
}


$query_EditGM = sprintf("SELECT * FROM proteam WHERE Number=".$_SESSION['U_ID']);
$EditGM = mysql_query($query_EditGM, $connection) or die(mysql_error());
$row_EditGM = mysql_fetch_assoc($EditGM);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_edit_gm;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.datePicker.js"></script>
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
    <h1><?php echo $l_nav_edit_app;?></h1>
    <br />
    
	<?php 
		if(isset($_SESSION['U_ID'])){
			if($_SESSION['U_ID']==$_SESSION['current_Team_ID']){
		
		if($row_EditGM['oauth_provider']=='twitter'){
		?>		
        	<p>Your Twitter account is linked to your team account. </p>
        	<img src="image/common/twitter.png" width="130" height="54" border="0" alt="Twitter">
            <p><a href="remove_application.php?team=<?php echo $_SESSION['current_Team_ID'];?>">Remove Twitter Account</a></p>
            <br /><br />
 
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <div class="rowElem">
            <label for="submit">Tweet Game Results:</label>
            <input name="post_game_results" type="checkbox" value="True" <?php if($row_EditGM['post_game_results']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit">Tweet League Approvals:</label>
            <input name="post_approvals" type="checkbox" value="True" <?php if($row_EditGM['post_approvals']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit">Tweet Comments:</label>
            <input name="forward_messages" type="checkbox" value="True" <?php if($row_EditGM['forward_messages']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit"></label>
            <input type="submit" value="<?php echo $l_Submit;?>">
            </div>
            <br /><br />
            
            <input type="hidden" name="MM_edit" value="form1">
             <input type="hidden" name="team" value="<?php echo $TID; ?>">
            </form>

         
		<?php } else if($row_EditGM['oauth_provider']=='facebook'){ ?>		
        	<p>Your Facebook account is linked to your team account.  </p>
            <img src="image/common/fb.png" width="130" height="54" border="0" alt="Facebook">
            <p><a href="remove_application.php?team=<?php echo $_SESSION['current_Team_ID'];?>">Remove Facebook Account</a></p>
            <br /><br />
 
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <div class="rowElem">
            <label for="submit">Share Game Results:</label>
            <input name="post_game_results" type="checkbox" value="True" <?php if($row_EditGM['post_game_results']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit">Share League Approvals:</label>
            <input name="post_approvals" type="checkbox" value="True" <?php if($row_EditGM['post_approvals']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit">Share Comments:</label>
            <input name="forward_messages" type="checkbox" value="True" <?php if($row_EditGM['forward_messages']=='True'){ echo "checked"; }?>>
            </div>
            
            <div class="rowElem">
            <label for="submit"></label>
            <input type="submit" value="<?php echo $l_Submit;?>">
            </div>
            <br /><br />
            
            <input type="hidden" name="MM_edit" value="form1">
             <input type="hidden" name="team" value="<?php echo $TID; ?>">
            </form>
            
		<?php } else { ?>	
        	<?php if($_SESSION['U_ID']==$_SESSION['current_Team_ID']) { ?>	
            <p>Add your <a href="?login&oauth_provider=twitter">Twitter</a> or <a href="?login&oauth_provider=facebook">Facebook</a> account to your hockey account. </p>
            <a href="?login&oauth_provider=twitter"><img src="image/common/tw_login.png" width="130" height="52" border="0" alt="Twitter"></a>&nbsp;
            <a href="?login&oauth_provider=facebook"><img src="image/common/fb_login.png" width="134" height="54" border="0" alt="Facebook"></a>
            
			<?php } else { ?>
            <p>You don't have permission to edit this information.</p>
            <?php } ?>
            
 		<?php } ?>
        
        <br /><br />
		<?php
			} else {
				echo "<h1>Sorry</h1><p>You don't have permission to edit this information.</p>";
			}
		} else {
			echo "<h1>Sorry</h1><p>You don't have permission to edit this information.</p>";
		}
		echo $statustxt;
		?>
    </section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>