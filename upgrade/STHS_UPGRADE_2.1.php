<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE CONFIG
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `WaiverAgeExemption` int(11) NOT NULL DEFAULT '27',
						ADD `WaiverSalaryExemption` int(11) NOT NULL DEFAULT '1500000',
						ADD `WaiverMinimumGames` int(11) NOT NULL DEFAULT '10',
						ADD `WaiverDuration` int(11) NOT NULL DEFAULT '2';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPGRADE COACHES AND COACHESTATS
$upgradeSQL =  sprintf("ALTER TABLE `coaches`
						ADD `DateCreated` datetime DEFAULT NULL,
						ADD `FarmPro` varchar(5) DEFAULT 'Pro';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPGRADE PLAYER CONTRACT OFFERS
$upgradeSQL =  sprintf("ALTER TABLE `playerscontractoffers`
						ADD `ContractType` int(11) NOT NULL DEFAULT '0',
						ADD `FarmPro` varchar(5) DEFAULT 'Pro';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPGRADE Transactions and Team History
$upgradeSQL =  sprintf("ALTER TABLE `teamhistory`
					 	ADD `Season_ID` int(11) DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL =  sprintf("ALTER TABLE `transactionhistory`
					 	ADD `Season_ID` int(11) DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
?>