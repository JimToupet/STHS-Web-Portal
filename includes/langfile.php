<?php 
$SiteName = $_SESSION['DomainName'];
if(!isset($targetFile)){$targetFile="";}
/*Check_if_user_has_changed_language: */ 
if(isset($lang)){
	/*If_so:*/ 
	setcookie("ling",$lang,time()-60*60*24*365,"/",$SiteName,0);/*Wipe_previous_cookie*/ 
	setcookie("ling",$lang,time()+60*60*24*365,"/",$SiteName,0);/*Whatever_the_means_lang_has_been_stored,_store_latest_lang_in_new_cookie:*/ 
	
	header(sprintf("Location: %s", $targetFile));
	
}else{
	//If_user_has_NOT_changed_language:*/ 
	if(isset($_COOKIE['ling'])){	
		/*Check_if_user-language_cookie_is_set._If_so:*/ 
		$lang=$_COOKIE['ling']; 
		setcookie("ling",$lang,time()-60*60*24*365,"/",$SiteName,0);/*Wipe_previous_cookie*/ 
		setcookie("ling",$lang,time()+60*60*24*365,"/",$SiteName,0); 
	}else{
		/*If_user-language_neither_selected_nor_in_cookie,_choose_browser_language:*/ 
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2); 
		setcookie("ling",$lang,time()+60*60*24*365,"/",$SiteName,0); 
	} 
} 
?>