<?php

require 'Connections/settings.php';
require 'includes/sessionInfo.php';
require 'includes/functions.php';
require("twitter/twitteroauth.php");

$setCookie = 0;
if (isset($_GET['cookie'])) {
  $setCookie = (get_magic_quotes_gpc()) ? $_GET['cookie'] : addslashes($_GET['cookie']);
}

if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
    // We've got everything we need
    $twitteroauth = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
// Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
    $_SESSION['access_token'] = $access_token;
// Let's get the user's info
    $user_info = $twitteroauth->get('account/verify_credentials');
// Print user's info
    //echo '<pre>';
    //print_r($user_info);
    //echo '</pre><br/>';
    if (isset($user_info->error)) {
        // Something's wrong, go back to square 1  
        header('Location: login.php?error=fail');
    } else {
        $uid = $user_info->id;
        $username = $user_info->name;
        //$user = new User();
        //$userdata = $user->checkUser($uid, 'twitter', $username);
        $query = mysql_query("SELECT Username, Password, Number, EmailAlert, Email, Name, Avatar, Administrator, GM, Number, City, PrimaryColor, SecondaryColor, LastModifiedLines FROM `proteam` WHERE oauth_uid = '$uid' and oauth_provider = 'twitter'") or die(mysql_error());
        $userdata = mysql_fetch_array($query);
        if (!empty($userdata)) {
            session_start();
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
			$_SESSION['Avatar']=getAvatar($uid, 'twitter', $userdata['Number'], $connection);
			//$_SESSION['Avatar'] = "http://img.tweetimag.es/i/".$user_info->screen_name;
			$_SESSION['LastModifiedLines'] = $userdata['LastModifiedLines'];
			$_SESSION['oauth_id'] = $uid;
			$_SESSION['oauth_provider'] = 'twitter';
			$_SESSION['username'] = $userdata['Name'];
						
			$ip=$_SERVER['REMOTE_ADDR']; 
			$updateSQL = "UPDATE proteam SET LastVisit='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', REMOTE_ADDR='".$ip."', Avatar='".$user_info->screen_name.".jpg' WHERE Number=".$_SESSION['U_ID'];
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
			header("Location: team.php?team=".$_SESSION['U_ID']);  
			
        } else {
            #user not present. Insert a new Record
			if(isset($_SESSION['U_ID'])){
				$query = mysql_query("update `proteam` SET oauth_provider='twitter', oauth_uid=$uid, access_token='".implode(",", $_SESSION['access_token'])."' WHERE Number=".$_SESSION['U_ID']."") or die(mysql_error());
	            $query = mysql_query("SELECT * FROM `proteam` WHERE oauth_uid = '$uid' and oauth_provider = 'twitter'");
				$result = mysql_fetch_array($query);
				header("Location: edit_applications.php");
			} else {
				header("Location: login.php?error=social");
			}
        }
    }
} else {
    // Something's missing, go back to square 1
    header('Location: login.php?error=fail');
}
?>
