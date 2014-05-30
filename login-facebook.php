<?php

require 'Connections/settings.php';
require 'includes/functions.php';
require 'facebook/facebook.php';

$setCookie = 0;
if (isset($_GET['cookie'])) {
  $setCookie = (get_magic_quotes_gpc()) ? $_GET['cookie'] : addslashes($_GET['cookie']);
}

$facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
			'cookie' => true,
        ));

$uid = $facebook->getUser();
//echo $uid;
if ($uid) {
    # Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
    try {
        $user = $facebook->api('/me');
		//get user basic description
    	$userInfo = $facebook->api("/$user");
    } catch (Exception $e) {

    }
	
    if (!empty($user)) {
        # User info ok? Let's print it (Here we will be adding the login and registering routines)
        /*
		echo '<pre>';
        print_r($user);
        echo '</pre><br/>';
		*/
		     
		$username = $user['name'];
		$token = $facebook->getAccessToken();
        //$user = new User();
		//$userdata = $user->checkUser($uid, 'facebook', $username);
		//var_dump($userdata);
		$query = mysql_query("SELECT Username, Password, Number, EmailAlert, Email, Name, Avatar, Administrator, GM, Number, City, PrimaryColor, SecondaryColor, LastModifiedLines FROM `proteam` WHERE oauth_uid = '$uid' and oauth_provider = 'facebook'") or die(mysql_error());
        $userdata = mysql_fetch_array($query);
		//var_dump($query);
        if (!empty($userdata)) {
			
			//session_start();
			if ($setCookie==1) 
			{ 
				setcookie("username", $userdata['Username'], time() + 2419200); 
				setcookie("password", $userdata['Password'], time() + 2419200); 
			}
			$_SESSION['id'] = $userdata['Number'];
			$_SESSION['U_ID'] = $userdata['Number'];
			$_SESSION['U_Team'] = $userdata['Name'];
			$_SESSION['U_City'] = $userdata['City'];
			$_SESSION['U_Admin'] = $userdata['Administrator'];
			$_SESSION['U_EmailAlert'] = $userdata['EmailAlert'];
			$_SESSION['U_Email'] = $userdata['Email'];
			$_SESSION['U_PrimaryColor'] = $userdata['PrimaryColor'];
			$_SESSION['U_SecondaryColor'] = $userdata['SecondaryColor'];
			$_SESSION['U_Name'] = $userdata['GM'];			
			$_SESSION['Avatar']=getAvatar($uid, 'facebook', $userdata['Number'], $connection);
			//$_SESSION['Avatar'] = "http://graph.facebook.com/".$uid."/picture";
			$_SESSION['LastModifiedLines'] = $userdata['LastModifiedLines'];
			$_SESSION['oauth_id'] = $uid;
			$_SESSION['oauth_provider'] = 'facebook';
			$_SESSION['username'] = $userdata['Name'];

			$ip=$_SERVER['REMOTE_ADDR']; 
			$updateSQL = "UPDATE proteam SET LastVisit='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', REMOTE_ADDR='".$ip."', Avatar='".$uid.".jpg' WHERE Number=".$_SESSION['U_ID'];
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
			header("Location: team.php?team=".$_SESSION['U_ID']);  
			
        } else {
            #user not present. Insert a new Record
			if(isset($_SESSION['U_ID'])){
				$query = mysql_query("update `proteam` SET oauth_provider='facebook', oauth_uid=$uid, access_token='$token' WHERE Number=".$_SESSION['U_ID']."") or die(mysql_error());
	            $query = mysql_query("SELECT * FROM `proteam` WHERE oauth_uid = '$uid' and oauth_provider = 'facebook'");
				$result = mysql_fetch_array($query);
				header("Location: edit_applications.php");
			} else {
				header("Location: login.php?error=social");
			}
		}
		
    } else {
        # For testing purposes, if there was an error, let's kill the script
        die("There was an error.");

    }
} else {
    # There's no active session, let's generate one
    $login_url = $facebook->getLoginUrl(array("scope" => "offline_access,publish_stream"));  
    header("Location: " . $login_url);
}
?>
