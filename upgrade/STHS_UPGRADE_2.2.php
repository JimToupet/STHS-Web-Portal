<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE CONFIG
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `DraftYear` int(11) NOT NULL DEFAULT '1',
						ADD `ConsecutiveDays` int(11) NOT NULL DEFAULT '1';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

for ($i = 20; $i >= 0; $i--) {
	$NewYear = $i + 1;
	$upgradeSQL =  sprintf("UPDATE `draftpicks` SET `Year`=%s WHERE Year=%s", $NewYear, $i);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}
	
?>