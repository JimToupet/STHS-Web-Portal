<?php include('../Connections/settings.php'); ?>
<?php include('../includes/functions.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$lines = file('version.txt');
$tmpFileVersion=0;
foreach ($lines as $line_num => $line)
{
	$line = explode("=",$line);
	//$varname = $my.$line[0];
	$tmpFileVersion = $line[1]; 
} 

if ((isset($_POST["MM_Upgrade"])) && ($_POST["MM_Upgrade"] == "form1")) {
	//RUN THE UPGRADE SCRIPT
	if($_POST["version"] == "3.2"){
		include("STHS_UPGRADE_3.3.php");
	} else if($_POST["version"] == "3.1"){
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	} else if($_POST["version"] == "3.0"){		
		include("STHS_UPGRADE_3.1.php");
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	} else if($_POST["version"] == "2.2"){		
		include("STHS_UPGRADE_3.0.php");
		include("STHS_UPGRADE_3.1.php");
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	} else if($_POST["version"] == "2.1"){		
		include("STHS_UPGRADE_2.2.php");		
		include("STHS_UPGRADE_3.0.php");
		include("STHS_UPGRADE_3.1.php");
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	} else if($_POST["version"] == "2.0"){		
		include("STHS_UPGRADE_2.1.php");	
		include("STHS_UPGRADE_2.2.php");		
		include("STHS_UPGRADE_3.0.php");
		include("STHS_UPGRADE_3.1.php");
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	} else {
		include("STHS_UPGRADE_2.0.php");		
		include("STHS_UPGRADE_2.1.php");	
		include("STHS_UPGRADE_2.2.php");		
		include("STHS_UPGRADE_3.0.php");	
		include("STHS_UPGRADE_3.1.php");	
		include("STHS_UPGRADE_3.2.php");
		include("STHS_UPGRADE_3.3.php");
	}
		
	//UPDATE THE VERSION NUMBER IN DATABASE
	$upgradeSQL = sprintf("update config set Version=%s;",$tmpFileVersion);
  	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$updateGoTo = "../home.php";
	header(sprintf("Location: %s", $updateGoTo));
}


############## BEGIN FUNCTIONS ##############################
# FUNCTION TO TEST USERNAME AND PASSWORD IN MYSQL HOST
function db_connect($server, $username, $password, $link = 'db_link') {
	global $$link, $db_error;
	$db_error = false;
	if (!$server) {
		$db_error = 'No Server selected.';
		return false;
	}
	$$link = @mysql_connect($server, $username, $password) or $db_error = mysql_error();
	return $$link;
}
# FUNCTION TO SELECT DATABASE ACCESS
function db_select_db($database) {
	echo mysql_error();
	return mysql_select_db($database);
}
# FUNCTION TO TEST DATABASE ACCESS
function db_test_create_db_permission($database) {
	global $db_error;
	$db_created = false;
	$db_error = false;
	if (!$database) {
		$db_error = 'No Database selected.';
		return false;
	}
	if ($db_error) {
		return false;
	} else {
		if (!@db_select_db($database)) {
			$db_error = mysql_error();
			return false;
		}else {
			return true;
		}
	return true;
	}
}

# FUNCTION TO TEST IF CONFIG TABLE EXIST
function table_exists ($table, $db) { 
	$tables = mysql_query("SHOW TABLES FROM $db;");
	while (list ($temp) = mysql_fetch_array ($tables)) {
		if ($temp == $table) {
			return TRUE;
		}
	}
	return FALSE;
}

$db_error = false;
$tmpInstructions = "";

db_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if ($db_error == false) {
	if (!db_test_create_db_permission(DB_DATABASE)) {
		$error = $db_error;
	}
} else {
	$error = $db_error;
}
if ($db_error != false) {
	$tmpTitle = $db_error;
	$tmpCurrentVersion = 0;
	$tmpVersion = "-1";
} else {
	$tmpTitle = "STHS V3 : Web Portal ".$tmpFileVersion." Upgrade";
	if (table_exists('config', DB_DATABASE)) {
		$query_Version = sprintf("SELECT * FROM config");
		$Version = mysql_query($query_Version, $connection) or die(mysql_error());
		$row_Version = mysql_fetch_assoc($Version);
		$totalRows_Version = mysql_num_rows($Version);
		$tmpVersion = 0;
		$tmpCurrentVersion = 0;
		if($totalRows_Version > 0){
			if($row_Version['Version'] != ""){
				$tmpVersion = $row_Version['Version'];
				$tmpCurrentVersion = $row_Version['Version'];
				if($tmpVersion == $tmpFileVersion){
					$tmpTitle = "You have already upgraded STHS v3 Web Portal ".$tmpFileVersion." database.";
				} else {
					$tmpTitle = "STHS v3 Web Portal ".$tmpFileVersion." Upgrade";
					$tmpInstructions = "<p>Your database is currently version $tmpVersion.   If you click <strong>Upgrade</strong>, you will upgrade the database to version $tmpFileVersion.</p>";
					$tmpVersion = 0;
				}
			}
		}
	} else {
		$tmpVersion = 0;
		$tmpCurrentVersion = 0;
	} 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upgrade STHS Web Portal</title>
<link rel="stylesheet" type="text/css" href="../css/install.css">
<script language=javascript type='text/javascript'> 
function hidediv() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideShow').style.visibility = 'hidden'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideShow.visibility = 'hidden'; 
} 
else { // IE 4 
document.all.hideShow.style.visibility = 'hidden'; 
} 
} 
} 
function showdiv() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideShow').style.visibility = 'visible'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideShow.visibility = 'visible'; 
} 
else { // IE 4 
document.all.hideShow.style.visibility = 'visible'; 
} 
} 
} 
</script> 
</head>

<body onload="hidediv()">
<div class="wrapper">
	<div class="header">
		<img src="../image/common/sths.jpg" alt="STHS" width="200" height="100" border="0" />
	</div>
	
    <div class="content">
    <h1><?php echo $tmpTitle;?></h1>
    <div id="hideShow" style="text-align:center; padding-top:190px; position:absolute; top:0px; left:0px; width:100%; height:100%;background: transparent; background-color:#CCCCCC; opacity: .9; filter:alpha(opacity=90); /* IE's opacity*/ ;">
    	<h3 align=center>Upgrading STHS Web Portal</h3><br>
        <div align=center><img src='../image/common/progressbar.gif' width=245 height=16 border=0 /></div>
   	</div> 
    <?php echo $tmpInstructions;?>
    <p>Upgrading Steps:</p>
    <ol>
	<li>Find your MySQL <strong>hostname</strong>, <strong>database name</strong>, <strong>username</strong>, and <strong>password</strong>.</li>
    <li>Open the <strong><span class="style1">"settings.php"</span></strong> in the "Connections" folder and confirm you have the correct database credentials <Br />and save the file.</li>
    <li><strong>Move</strong> the <span class="style1"><strong>"settings.php"</strong></span> to the server.</li>
    <?php if ($tmpVersion == 0){ ?>
    <li>When you have completed the above, <strong>click Upgrade</strong> below to setup your Database for STHS Web Portal. </li>
    </ol>
    <div align="center">
	<form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>" onSubmit="showdiv()">
    <input type="submit" value="Upgrade" />
 	<input type="hidden" name="version" value="<?php echo $tmpCurrentVersion;?>">
 	<input type="hidden" name="MM_Upgrade" value="form1">
    </form>
    <?php } else { ?>
    <li>When you have completed the above, <strong>refresh this page</strong>.  The refreshed page should have an <strong>"Upgrade"</strong> button. </li>
    </ol>
	<?php } ?>
    
    <br /></div>
	</div>
</div>
</body>
</html>
