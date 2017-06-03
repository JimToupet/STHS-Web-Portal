<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$uploaddir = "image/players/";
	$uploadfile = $uploaddir . basename($_FILES['NEW_PHOTO']['name']);
	include('includes/SimpleImage.php');
	
	if (move_uploaded_file($_FILES['NEW_PHOTO']['tmp_name'], $uploadfile)) {
		$image = new SimpleImage();
		$image->load($uploadfile);	
		$image->resize(100,150);
		$image->save($uploadfile);
		$UPLOADED_PHOTO = basename($_FILES['NEW_PHOTO']['name']);
	}else{
		$UPLOADED_PHOTO = $_POST['PHOTO'];
	}
	
   $updateSQL = "UPDATE players SET Photo='".$UPLOADED_PHOTO."', BIO='".$_POST['BIO']."', uniformNumber=".$_POST['uniformNumber'].", Position=".$_POST['Position']." WHERE Number=".$_POST['Player'];  
   $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  
  if($_POST['Request'] != ""){
	  $insertSQL = sprintf("INSERT INTO playerschangerequest (Name,Request,DateCreated,Team,URL,Type) values (%s,%s,%s,%s,%s,%s)",
							GetSQLValueString($_POST['Name'], "text"),
							GetSQLValueString($_POST['Request'], "text"),
							GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
				GetSQLValueString($_SESSION['current_Team_ID'], "text"),
				GetSQLValueString($_POST['URL'], "text"),
				GetSQLValueString('Position', "text"));
	  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	  $MailSubject = "Change Player Position - ".$_POST['Name'];	
	  $MailMessage = "<p>".$_POST['Name']." request to change or add position was sent to Commissioner.  Please allow 48hrs to see the change.</p>";
		sendMail($_SESSION['site_Email'], $_SESSION['U_Email'], $MailSubject, $MailMessage);
  }
	
  $updateGoTo = "player.php?player=".stripslashes($_POST['Player']);
  header(sprintf("Location: %s", $updateGoTo));
}

switch ($lang){ 
case 'en': 
	// Create the position references array
	$l_Number = "Number";
	$l_profileedit = "PLAYER PROFILE / BIOGRAPHY:";
	$l_Save = "Save";
	$l_MustLogIn = "Sorry, ou must log in to edit prospect information.";
	$l_PhotoNote = "You may change the photograph by uploading a new photograph from your computer.<br /><br />";
	$l_Jersey = "Jersey";
	break; 

case 'fr': 
	// Create the position references array
	$l_Number = "Num&eacute;ro";
	$l_profileedit = "Bio:";
	$l_Save = "Sauvegarder";
	$l_MustLogIn = "Vous devez &ecirc;tre enregistr&eacute; pour modifier un joueur.";
	$l_PhotoNote = "Vous pouvez changer la photo en envoyant une photo de votre ordinateur.<br /><br />";
	$l_Jersey = "Chandail";
	break;
}

$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}

$query_GetPlayer = sprintf("SELECT Status1, UniformNumber, Name, Photo, Position, Number, BIO FROM players WHERE Number=%s", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$query_GetTeamJerseys = sprintf("SELECT UniformNumber FROM players WHERE Team=%s AND Status1=%s AND UniformNumber > 0 AND Retired=0 AND Suspension<99 UNION ALL SELECT UniformNumber FROM goalies WHERE Team=%s AND Status1=%s AND UniformNumber > 0 AND Retired=0 AND Suspension<99", $_SESSION['current_Team_ID'], $row_GetPlayer['Status1'], $_SESSION['current_Team_ID'], $row_GetPlayer['Status1']);
$GetTeamJerseys = mysql_query($query_GetTeamJerseys, $connection) or die(mysql_error());
$row_GetTeamJerseys = mysql_fetch_assoc($GetTeamJerseys);
$tmpTeamJerseyes = "";

do {
	$tmpTeamJerseyes=$tmpTeamJerseyes.",".$row_GetTeamJerseys['UniformNumber'];
} while ($row_GetTeamJerseys = mysql_fetch_assoc($GetTeamJerseys));
$numbers = explode(",",$tmpTeamJerseyes);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $l_Edit." - ".$row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

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
    <form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
	<?php 
    if(isset($_SESSION['U_ID'])){
        if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
    ?>	
    	<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
        <tr>
        	<td id="PlayerProfile" style="background-color:#ededed; padding:6px; width:120px;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td><img src="<?php echo  imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;" width="100" height="150"/></td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px;vertical-align:top;">

				<h1><?php echo $l_Edit." : ".$row_GetPlayer['Name']; ?></h1>
                
                <div style="float:right; text-align:left; width:400px;">
                	<strong>Send position change request to league</strong><br /><br />
                    <div class="rowElem">
                            Change Players Position:
                    </div>
                    <div class="rowElem">
                            <input id="Request" name="Request" size="50">
                    </div>
                    <div class="rowElem">
                            Website Reference Link:
                    </div>
                    <div class="rowElem">
                            <input id="URL" name="URL" size="50" >
                    </div>
                </div>
                
				<div style="width:400px; float:left;">
                <div class="rowElem">
				<label for="NEW_PHOTO" style="width:80px; font-size:14px; ">Photo:</label>
				<input name="NEW_PHOTO" type="file" /><input type="hidden" name="PHOTO" value="<?php echo $row_GetPlayer['Photo']; ?>" />
                </div>
                
                <div class="rowElem">
				<label for="uniformNumber" style="width:80px; font-size:14px; "><?php echo $l_Jersey;?>#:</label>
               	<select name="uniformNumber" size="1"><option value="0">Select #</option>
                    <?php 
					for ( $counter = 1; $counter <= 100; $counter += 1) {
						if ($counter == $row_GetPlayer['UniformNumber']){ 
							$tmpJersey = "selected";
						} else {
							$tmpJersey = "";
						}
						if (in_array($counter, $numbers)) {
							if($tmpJersey == "selected"){
								echo "<option value='".$counter."' ".$tmpJersey.">".$counter."</option>";
							}
						} else {
							echo "<option value='".$counter."' ".$tmpJersey.">".$counter."</option>";
						}
					}
					?>
                    </select>
	            </div>
    
    			<div class="rowElem">
				<label for="Position" style="width:80px; font-size:14px; ">Position:</label>
               	<select name="Position" size="1">
                    <?php 
					if ($row_GetPlayer['Position']==1){
						echo "<option value='1' selected>".$l_Center."</option>";
						echo "<option value='2' >".$l_LeftWing."</option>";
						echo "<option value='3' >".$l_RightWing."</option>";
						echo "<option value='4' >".$l_Defence."</option>";
					} elseif ($row_GetPlayer['Position']==2){
						echo "<option value='1' >".$l_Center."</option>";
						echo "<option value='2' selected>".$l_LeftWing."</option>";
						echo "<option value='3' >".$l_RightWing."</option>";
						echo "<option value='4' >".$l_Defence."</option>";
					} elseif ($row_GetPlayer['Position']==3){
						echo "<option value='1' >".$l_Center."</option>";
						echo "<option value='2' >".$l_LeftWing."</option>";
						echo "<option value='3' selected>".$l_RightWing."</option>";
						echo "<option value='4' >".$l_Defence."</option>";
					} elseif ($row_GetPlayer['Position']==4){
						echo "<option value='1' >".$l_Center."</option>";
						echo "<option value='2' >".$l_LeftWing."</option>";
						echo "<option value='3' >".$l_RightWing."</option>";
						echo "<option value='4' selected>".$l_Defence."</option>";
					}
					?>
                    	</select>
	            </div>
                </div>
            </td>
            </tr>
            </table>
				
          		<h3><?php echo $l_profileedit;?></h3>
                <br />
				<textarea name='BIO' cols='50' rows='10'><?php echo $row_GetPlayer['BIO']; ?></textarea>
				<script type="text/javascript" >
		   
						CKEDITOR.replace('BIO',{
							width: 950
					});
				</script>
       		<br />
			<div align="center">
            <input type="submit" value="<?php echo $l_Save;?>" class="button save" />
            <input type="hidden" name="MM_update" value="form1">
            <input type="hidden" name="Name" value="<?php echo $row_GetPlayer['Name']; ?>">
		  	<input type="hidden" name="Player" value="<?php echo $row_GetPlayer['Number']; ?>">
            </div>
		</form>


			<?php
                } else {
                    echo "<h1>Sorry</h1><p>You must log in to edit player information.</p>";
                }
            } else {
                echo "<h1>Sorry</h1><p>You must log in to edit player information.</p>";
            }
            ?>
        
            </section>

</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetPlayer);
?>