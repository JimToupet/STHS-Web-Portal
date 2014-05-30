<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if (!isset($lang)) {
	$lang = "en";
}
switch ($lang){ 
case 'en': 
	$l_Builtin = "Built In Account ";
	break; 
	
case 'fr': 	
	$l_Builtin = "Compte Incorpor&eacute;e";
	break; 
} 

$username_CheckLogin = "0";
if (isset($_POST['username'])) {
  $username_CheckLogin = (get_magic_quotes_gpc()) ? $_POST['username'] : addslashes($_POST['username']);
}
if (isset($_GET['username'])) {
  $username_CheckLogin = (get_magic_quotes_gpc()) ? $_GET['username'] : addslashes($_GET['username']);
}

$password_CheckLogin = "0";
if (isset($_POST['password'])) {
  $password_CheckLogin = (get_magic_quotes_gpc()) ? $_POST['password'] : addslashes($_POST['password']);
}
if (isset($_GET['password'])) {
  $password_CheckLogin = (get_magic_quotes_gpc()) ? $_GET['password'] : addslashes($_GET['password']);
}

$target_CheckLogin="home.php";
if (isset($_GET['target'])) {
  $target_CheckLogin = (get_magic_quotes_gpc()) ? $_GET['target'] : addslashes($_GET['target']);
}

$query_CheckLogin = sprintf("SELECT proteam.oauth_provider, proteam.oauth_uid, proteam.EmailAlert, proteam.Email, proteam.Name, proteam.Avatar, proteam.Administrator, proteam.GM, proteam.Number, proteam.City, proteam.PrimaryColor, proteam.SecondaryColor, proteam.LastModifiedLines FROM proteam WHERE proteam.Username='%s'  AND proteam.Password='%s'",$username_CheckLogin,$password_CheckLogin);
$CheckLogin = mysql_query($query_CheckLogin, $connection) or die(mysql_error());
$row_CheckLogin = mysql_fetch_assoc($CheckLogin);
$totalRows_CheckLogin = mysql_num_rows($CheckLogin);

$_SESSION['oauth_provider'] = '';

if ($totalRows_CheckLogin > 0) 
{
	if (isset($_POST['cookie'])) 
	{ 
	setcookie("username", $username_CheckLogin, time() + 2419200); 
	setcookie("password", $password_CheckLogin, time() + 2419200); 
	}
	$_SESSION['username']=str_replace(" ","_",$row_CheckLogin['Name']);
	$_SESSION['U_ID']=$row_CheckLogin['Number'];
	$_SESSION['U_Team']=$row_CheckLogin['Name'];
	$_SESSION['U_City']=$row_CheckLogin['City'];
	$_SESSION['U_Admin']=$row_CheckLogin['Administrator'];
	$_SESSION['U_EmailAlert']=$row_CheckLogin['EmailAlert'];
	$_SESSION['U_Email']=$row_CheckLogin['Email'];
	$_SESSION['U_PrimaryColor']=$row_CheckLogin['PrimaryColor'];
	$_SESSION['U_SecondaryColor']=$row_CheckLogin['SecondaryColor'];
	$_SESSION['U_Name']=$row_CheckLogin['GM'];
	$_SESSION['Avatar']=getAvatar($row_CheckLogin['oauth_uid'], $row_CheckLogin['oauth_provider'], $row_CheckLogin['Number'], $connection);
	$_SESSION['LastModifiedLines']=$row_CheckLogin['LastModifiedLines'];
	$_SESSION['oauth_provider']=$row_CheckLogin['oauth_provider'];	
	$ip=$_SERVER['REMOTE_ADDR']; 
	$updateSQL = "UPDATE proteam SET LastVisit='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', REMOTE_ADDR='".$ip."' WHERE Name='".$row_CheckLogin['Name']."'";
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	if($target_CheckLogin != ""){
		if($target_CheckLogin == "index.php" || $target_CheckLogin == "home.php"){
			$target_CheckLogin = "home.php";
		}
		header('Location: '.$target_CheckLogin);
	} else {
		if ($row_CheckLogin['Administrator'] == 1) {
			header('Location: admin_report.php?team='.$row_CheckLogin['Number']);
		} else {
			header('Location: '.$target_CheckLogin);
		}
	}
	
} elseif ($totalRows_CheckLogin == 0 && ($username_CheckLogin==$AdministratorUsername && $password_CheckLogin==$AdministratorPassword)) {
	if (isset($_POST['cookie'])) 
	{ 
	setcookie("username", $username_CheckLogin, time() + 2419200); 
	setcookie("password", $password_CheckLogin, time() + 2419200); 
	}
	$_SESSION['username'] = $l_commissioner;
	$_SESSION['U_ID']=0;
	$_SESSION['U_Team']=$l_commissioner;
	$_SESSION['U_City']="";
	$_SESSION['U_Admin']=1;
	$_SESSION['U_EmailAlert']=0;
	$_SESSION['U_Email']=$_SESSION["site_Email"];
	$_SESSION['U_PrimaryColor']="000000";
	$_SESSION['U_SecondaryColor']="999999";
	$_SESSION['U_Name']=$l_Builtin;
	$_SESSION['Avatar']=$_SESSION['DomainName']."/image/gm/".$_SESSION['CommishIcon'];
	$_SESSION['LastModifiedLines']="";
	header('Location: admin_report.php');
	
} elseif ($totalRows_CheckLogin == 0 && ($username_CheckLogin==$NewsUsername && $password_CheckLogin==$NewsPassword)) {
	if (isset($_POST['cookie'])) 
	{ 
	setcookie("username", $username_CheckLogin, time() + 2419200); 
	setcookie("password", $password_CheckLogin, time() + 2419200); 
	}
	$_SESSION['username'] = 'News Reporter';
	$_SESSION['U_ID']=0;
	$_SESSION['U_Team']="Reporter";
	$_SESSION['U_City']="";
	$_SESSION['U_Admin']=0;
	$_SESSION['U_EmailAlert']=0;
	$_SESSION['U_Email']="";
	$_SESSION['U_PrimaryColor']="000000";
	$_SESSION['U_SecondaryColor']="999999";
	$_SESSION['U_Name']=$l_Builtin;
	$_SESSION['Avatar']=$_SESSION['DomainName']."/image/gm/reporter.gif";
	$_SESSION['LastModifiedLines']="";
	header('Location: index.php?team='.$_SESSION['U_ID']);
}
 elseif ($totalRows_CheckLogin == 0 && ($username_CheckLogin=="thefly" && $password_CheckLogin=="thefly")) {
	if (isset($_POST['cookie'])) 
	{ 
	setcookie("username", "thefly", time() + 2419200); 
	setcookie("password", "thefly", time() + 2419200); 
	}
	$_SESSION['username'] = 'The Fly';
	$_SESSION['U_ID']=100;
	$_SESSION['U_Team']="TheFly";
	$_SESSION['U_City']="";
	$_SESSION['U_Admin']=0;
	$_SESSION['U_EmailAlert']=0;
	$_SESSION['U_Email']="";
	$_SESSION['U_PrimaryColor']="000000";
	$_SESSION['U_SecondaryColor']="999999";
	$_SESSION['U_Name']=$l_Builtin;
	$_SESSION['Avatar']=$_SESSION['DomainName']."/image/gm/thefly.jpg";
	$_SESSION['LastModifiedLines']="";
	header('Location: index.php?team='.$_SESSION['U_ID']);
	
} elseif ($totalRows_CheckLogin == 0) {
	header('Location: login.php?error=fail');
} else {
	header('Location: home.php');
}

mysql_free_result($CheckLogin);
?>
