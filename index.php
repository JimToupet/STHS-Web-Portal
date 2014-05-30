<?php include('Connections/settings.php'); ?>
<?php
############## BEGIN FUNCTIONS ##############################
# FUNCTION TO TEST USERNAME AND PASSWORD IN MYSQL HOST
function db_connect($server, $username, $password, $link = 'db_link') {
	global $$link, $db_error;
	$db_error = false;
	if (!$server) {
		$db_error = 'No Server selected.';
		return false;
	}
	$link = @mysql_connect($server, $username, $password) or $db_error = mysql_error();
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
	//$tables = mysql_list_tables ($db); 
	$tables = mysql_query("SHOW TABLES FROM $db");
	while (list ($temp) = mysql_fetch_array ($tables)) {
		if ($temp == $table) {
			return TRUE;
		}
	}
	return FALSE;
}



$db_error = false;
db_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if ($db_error == false) {
	if (!db_test_create_db_permission(DB_DATABASE)) {
		$error = $db_error;
	}
} else {
	$error = $db_error;
}
if ($db_error != false) {
	$error = "failed";
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '<title>STHS - Database Connection Error</title><link rel="stylesheet" type="text/css" href="css/install.css"></head>';
	echo '<body><div class="wrapper"><div class="header"><img src="image/common/sths.jpg" alt="STHS" width="200" height="100" border="0" /></div>';
	echo '<div class="content"><h1>'.$db_error.'</h1>';
	echo '<ol>';
    echo '<li>Find your MySQL <strong>hostname</strong>, <strong>database name</strong>, <strong>username</strong>, and <strong>pasword</strong>.</li>';
    echo '<li>Open the <strong> <span class="style1">"simhl-setup.php"</span></strong> in the "Connections" folder and confirm you have the correct database credentials and save the file.</li>';
    echo '<li><strong>Move</strong> the <span class="style1"><strong>"simhl-setup.php"</strong></span> to the live server.</li>';
    echo '<li>When you have completed the above, <strong>click refresh</strong> in your browser window.</li>';
	echo '</ol>';
	echo '<br /></div></div></div></body></html>';
} else {
	if (table_exists('config', DB_DATABASE)) {
		$Version = mysql_query("SELECT * FROM config", $connection) or die(mysql_error());
		$row_Version = mysql_fetch_assoc($Version);
		$totalRows_Version = mysql_num_rows($Version);
		$tmpVersion = 0;
		if($totalRows_Version > 0){
			if($row_Version['Version'] != ""){
				$lines = file('upgrade/version.txt');
				$tmpFileVersion=0;
				foreach ($lines as $line_num => $line)
				{
					$line = explode("=",$line);
					//$varname = $my.$line[0];
					$tmpFileVersion = $line[1]; 
				} 
				if($tmpFileVersion > $row_Version['Version']){
					header(sprintf("Location: %s", "upgrade/"));
				} else {
					include("includes/sessionInfo.php");
					unset($_SESSION['current_Team']);
					unset($_SESSION['current_Team_ID']);
					$_SESSION['current_Team'] = "SIMHL";
					$_SESSION['current_Team_ID'] = 0;
			
					$PCGoTo = "home.php";
					$MobileGoTo = "mobile/index.php";
					
					require_once('mobile_device_detect.php');
					$mobile = mobile_device_detect();
					
					if($mobile==true){
						header(sprintf("Location: %s", $MobileGoTo));
					}else{
						header(sprintf("Location: %s", $PCGoTo));
					}
				}
			} else {
				header(sprintf("Location: %s", "upgrade/"));
			}
		} else {		
			header(sprintf("Location: %s", "install/"));
		}
	} else {		
		header(sprintf("Location: %s", "install/"));
	}
}
?>