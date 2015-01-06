<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `RosterLimit` int(2) NOT NULL DEFAULT '50';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE  `comments` ADD  `A_Type` INT( 11 ) NOT NULL DEFAULT  '0' AFTER  `A_ID`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE  `teamhistory` ADD  `Viewed` VARCHAR( 5 ) NOT NULL DEFAULT  'False' AFTER  `DateCreated`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
$upgradeSQL =  sprintf("ALTER TABLE  `teamhistory` CHANGE  `DateCreated`  `DateCreated` DATETIME NOT NULL`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
$upgradeSQL =  sprintf("ALTER TABLE  `teamhistory` CHANGE  `Value`  `Value` TEXT  DEFAULT NULL");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
$upgradeSQL =  sprintf("ALTER TABLE  `playerscontractoffers` ADD  `PlayerType` VARCHAR( 10 ) NOT NULL DEFAULT  'player' AFTER  `ContractType`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
$upgradeSQL =  sprintf("ALTER TABLE  `mail` ADD  `recd` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `Viewed`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE config
$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `likes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Parent_ID` int(11) NOT NULL,
  `ParentType` int(11) NOT NULL,
  `Team` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

?>
