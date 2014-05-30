<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `AI_UFA_BASE` int(2) NOT NULL DEFAULT '50',
						ADD `AI_RFA_BASE` int(2) NOT NULL DEFAULT '70',
						ADD `AI_PAY_CUT_90` int(2) NOT NULL DEFAULT '10',
						ADD `AI_PAY_CUT_80` int(2) NOT NULL DEFAULT '20',
						ADD `AI_PAY_CUT_70` int(2) NOT NULL DEFAULT '30',
						ADD `AI_PAY_CUT_60` int(2) NOT NULL DEFAULT '40',
						ADD `AI_PAY_CUT_50` int(2) NOT NULL DEFAULT '50',
						ADD `AI_PAY_RAISE_10` int(2) NOT NULL DEFAULT '5',
						ADD `AI_PAY_RAISE_20` int(2) NOT NULL DEFAULT '10',
						ADD `AI_PAY_RAISE_30` int(2) NOT NULL DEFAULT '15',
						ADD `AI_PAY_RAISE_40` int(2) NOT NULL DEFAULT '20',
						ADD `AI_PAY_RAISE_50` int(2) NOT NULL DEFAULT '25',
						ADD `AI_SIGNING_BONUS` int(2) NOT NULL DEFAULT '5',
						ADD `AI_NO_TRADE` int(2) NOT NULL DEFAULT '5',
						ADD `AI_MORALE_HIGH` int(2) NOT NULL DEFAULT '5',
						ADD `AI_MORALE_LOW` int(2) NOT NULL DEFAULT '5',
						ADD `AI_LOW_EXPECTATIONS` int(2) NOT NULL DEFAULT '10',
						ADD `AI_DEPTH_CHARTS` int(2) NOT NULL DEFAULT '5',
						ADD `AI_FAIL` int(2) NOT NULL DEFAULT '10',
						ADD `AI_RFA_TO_UFA` int(2) NOT NULL DEFAULT '5',
						ADD `AI_SEASON_PRE` int(2) NOT NULL DEFAULT '0',
						ADD `AI_SEASON_REG_1ST` int(2) NOT NULL DEFAULT '5',
						ADD `AI_SEASON_REG_2ND` int(2) NOT NULL DEFAULT '10',
						ADD `AI_SEASON_POST` int(2) NOT NULL DEFAULT '15',
						ADD `AI_WAIVE_NT` int(2) NOT NULL DEFAULT '10',
						ADD `AI_FA_1ST_ODDS` int(2) NOT NULL DEFAULT '60',
						ADD `AI_FA_2ND_ODDS` int(2) NOT NULL DEFAULT '30',
						ADD `AI_FA_3RD_ODDS` int(2) NOT NULL DEFAULT '10',
						ADD `AI_NOTRADE_TEAM_LIST` int(2) NOT NULL DEFAULT '8',
						ADD `AI_NOTRADE_AVAILABLE` varchar(36) DEFAULT '3';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE traderequests
$upgradeSQL =  sprintf("ALTER TABLE `traderequests`
						ADD `RequestType` varchar(36) DEFAULT 'Extension';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE traderequests
$upgradeSQL =  sprintf("ALTER TABLE `waiver_draft`
						ADD `Type` varchar(11) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
?>