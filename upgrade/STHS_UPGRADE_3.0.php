<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE proteam
$upgradeSQL =  sprintf("ALTER TABLE `proteam`
						ADD `oauth_uid` VARCHAR(15),
  						ADD `oauth_provider` VARCHAR(30),
  						ADD `access_token` VARCHAR(150),
  						ADD `post_game_results` varchar(5) DEFAULT 'True',
  						ADD `post_approvals` varchar(5) DEFAULT 'True',
  						ADD `forward_messages` varchar(5) DEFAULT 'False',
						CHANGE `LastVisit` `LastVisit` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `FavIcon` varchar(36) DEFAULT NULL,
						ADD `TouchIcon` varchar(36) DEFAULT NULL,
						ADD `DateFormat` varchar(10) DEFAULT 'mm/dd/yyyy';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE playersextensionoffers
$upgradeSQL =  sprintf("ALTER TABLE `playersextensionoffers`
						ADD `PlayerType` varchar(10) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPGRADE proteam
$upgradeSQL =  sprintf("ALTER TABLE `farmteamstandings`
						ADD `TicketPrice1` decimal(10,0) DEFAULT NULL,
						ADD `TicketPrice2` decimal(10,0) DEFAULT NULL,
						ADD `Attendance1` int(11) DEFAULT NULL,
						ADD `Attendance2` int(11) DEFAULT NULL,
						ADD `ArenaCapacity1` int(11) DEFAULT NULL,
						ADD `ArenaCapacity2` int(11) DEFAULT NULL,
						ADD `SeasonTicketPCT` double DEFAULT NULL,
						ADD `TotalAttendance` int(11) DEFAULT NULL,
						ADD `TotalIncome` decimal(10,0) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS comments (
  ID int(11) NOT NULL AUTO_INCREMENT,
  A_ID int(11) NOT NULL DEFAULT '0',
  Parent_ID int(11) NOT NULL DEFAULT '0',
  Team int(11) NOT NULL,
  DateCreated datetime NOT NULL,
  DateModified datetime NOT NULL,
  Comment text DEFAULT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$upgradeSQL = sprintf("CREATE TABLE `chat` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `from` VARCHAR(255) NOT NULL DEFAULT '',
  `to` VARCHAR(255) NOT NULL DEFAULT '',
  `message` TEXT NOT NULL,
  `sent` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
 INDEX `to` (`to`),
 INDEX `from` (`from`)
)
ENGINE = InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


?>