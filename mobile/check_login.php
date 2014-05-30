<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php
$username_CheckLogin = "0";
if (isset($_POST['username'])) {
  $username_CheckLogin = (get_magic_quotes_gpc()) ? $_POST['username'] : addslashes($_POST['username']);
}
$password_CheckLogin = "0";
if (isset($_POST['password'])) {
  $password_CheckLogin = (get_magic_quotes_gpc()) ? $_POST['password'] : addslashes($_POST['password']);
}

$query_CheckLogin = sprintf("SELECT proteam.oauth_provider, proteam.EmailAlert, proteam.Email, proteam.Name, proteam.Avatar, proteam.Administrator, proteam.GM, proteam.Number, proteam.City, proteam.PrimaryColor, proteam.SecondaryColor, proteam.LastModifiedLines FROM proteam WHERE proteam.Username='%s'  AND proteam.Password='%s'",$username_CheckLogin,$password_CheckLogin);
$CheckLogin = mysql_query($query_CheckLogin, $connection) or die(mysql_error());
$row_CheckLogin = mysql_fetch_assoc($CheckLogin);
$totalRows_CheckLogin = mysql_num_rows($CheckLogin);
if ($totalRows_CheckLogin > 0) 
{
	$_SESSION['U_ID']=$row_CheckLogin['Number'];
	$_SESSION['U_Team']=$row_CheckLogin['Name'];
	$_SESSION['U_City']=$row_CheckLogin['City'];
	$_SESSION['U_Admin']=$row_CheckLogin['Administrator'];
	$_SESSION['U_EmailAlert']=$row_CheckLogin['EmailAlert'];
	$_SESSION['U_Email']=$row_CheckLogin['Email'];
	$_SESSION['U_Name']=$row_CheckLogin['GM'];
	$_SESSION['Avatar']=$_SESSION['DomainName']."/image/gm/".$row_CheckLogin['Avatar'];
	$_SESSION['oauth_provider']=$row_CheckLogin['oauth_provider'];	
	$ip=$_SERVER['REMOTE_ADDR']; 

	$updateSQL = "UPDATE proteam SET LastVisit='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', REMOTE_ADDR='".$ip."' WHERE Name='".$row_CheckLogin['Name']."'";
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$updateGoTo = "team.php?team=".$_SESSION['U_ID'];
	header(sprintf("Location: %s", $updateGoTo));
} else {
	$updateGoTo = "wrong.php";
	header(sprintf("Location: %s", $updateGoTo));
}
?>
