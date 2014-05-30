<?php 
if (isset($_GET["lang"])) {
  $lang = (get_magic_quotes_gpc()) ? $_GET["lang"] : addslashes($_GET["lang"]);
}
if (isset($_GET["prevpage"])) {
  $targetFile = (get_magic_quotes_gpc()) ? $_GET["prevpage"] : addslashes($_GET["prevpage"]);
}

include("../includes/langfile.php");
?>