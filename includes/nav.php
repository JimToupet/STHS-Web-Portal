<nav>
<?php 
include("account.php");
echo '<div id="menu_block">';
if ($_SESSION['current_Team_ID'] == 0) { 
	include("leagueMenu.php");
} else {
	include("teamMenu.php") ;
} 
echo "</div>";
?>
</nav>