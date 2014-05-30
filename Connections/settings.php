<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sths');

$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());

// This is the URL (web address) of your site.  Example http://www.simhl.net
$DomainName = "http://127.0.0.1";

// This is the Name of your website that appears in the browsers Title Bar.  Example, "National Hockey League"
$SiteName = "SimHL Web Portal";

// This is the e-mail address of the commishioner.
$AdministratorEmail = "";

// This is the URL for a message board if your league uses one.  If left blank, no link will display
$MessageBoardURL = "";

// BUILTIN ACCOUNTS - The Administrator account has full power over the site
$AdministratorUsername = "admin";
$AdministratorPassword = "admin";

// The news account can only add articles to the site
$NewsUsername = "news";
$NewsPassword = "news";

//FACEBOOK Configuration
define('APP_ID', '');
define('APP_SECRET', '');

// TWITTER Configuration
define('TWITTER_CONSUMER_KEY', '');
define('TWITTER_CONSUMER_SECRET', '');
?>