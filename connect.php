<?php
require 'Connections/settings.php';

if (TWITTER_CONSUMER_KEY === '' || TWITTER_CONSUMER_SECRET === '') {
  echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://twitter.com/apps">https://twitter.com/apps</a>';
  echo '<a href="redirect.php"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>';
  exit;
}

header('Location: login-twitter.php');

?>