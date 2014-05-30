<?php
function post_to_twitter($message,$link,$username,$password){ 
	//post to twitter
	// The message you want to send, control size and create link
	$msg_size=140;//max size for twitt msg
	$msg_size-=(strlen($link)+1);//size that we have for the message after the link inserted +1 to leave an space between
	if(strlen($message)>$msg_size) $message=substr($message, 0, $msg_size);//crop the message then fits the url
	$message.=" ".$link;//message with the link

	// The twitter API address
	$twitterurl = 'http://twitter.com/statuses/update.xml';
	// Set up and execute the curl process
	$curl_handle = curl_init();
	curl_setopt($curl_handle, CURLOPT_URL, "$twitterurl");
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_POST, 1);
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "status=$message");
	curl_setopt($curl_handle, CURLOPT_USERPWD, "$username:$password");
	$buffer = curl_exec($curl_handle);
	$resultArray = curl_getinfo($curl_handle);
	curl_close($curl_handle);
	// check for success or failure
	if($resultArray['http_code'] == "200")  return true;//success
	else return false;//twitter failure
}
?>