<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS articlegenerator (
  A_ID int(11) NOT NULL AUTO_INCREMENT,
  Headline varchar(50) DEFAULT NULL,
  Content text,
  Type varchar(12) DEFAULT NULL,
  Relationship_ID int(11) DEFAULT NULL,
  PRIMARY KEY (A_ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS articles (
  A_ID int(11) NOT NULL AUTO_INCREMENT,
  Headline varchar(255) DEFAULT NULL,
  Content text,
  Summary varchar(255) DEFAULT NULL,
  Image varchar(50) DEFAULT NULL,
  Team varchar(32) DEFAULT NULL,
  DateCreated date DEFAULT NULL,
  PRIMARY KEY (A_ID),
  KEY Team (Team)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS coaches (
  C_ID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(50) DEFAULT NULL,
  Number int(11) DEFAULT NULL,
  Team varchar(32) DEFAULT NULL,
  Country varchar(32) DEFAULT NULL,
  Age double DEFAULT NULL,
  PH double DEFAULT NULL,
  DF double DEFAULT NULL,
  OF double DEFAULT NULL,
  PD double DEFAULT NULL,
  EX double DEFAULT NULL,
  LD double DEFAULT NULL,
  PO double DEFAULT NULL,
  Contract double DEFAULT NULL,
  Salary decimal(10,0) DEFAULT NULL,
  Photo varchar(36) DEFAULT NULL,
  PRIMARY KEY (C_ID),
  KEY Team (Team)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS coachestats (
  C_ID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(32) DEFAULT NULL,
  Season_ID int(11) DEFAULT NULL,
  GP double DEFAULT NULL,
  W double DEFAULT NULL,
  L double DEFAULT NULL,
  T double DEFAULT NULL,
  OTW double DEFAULT NULL,
  OTL double DEFAULT NULL,
  SOW double DEFAULT NULL,
  `SOL` double DEFAULT NULL,
  `GF` double DEFAULT NULL,
  `GA` double DEFAULT NULL,
  `Pim` double DEFAULT NULL,
  `Hits` double DEFAULT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `config` (
  `LastModifiedPlayers` date DEFAULT NULL,
  `DisplayOffers` int(11) DEFAULT NULL,
  `LastModifiedCoaches` date DEFAULT NULL,
  `LastModifiedProTeams` date DEFAULT NULL,
  `LastModifiedProspects` date DEFAULT NULL,
  `LastModifiedGoalies` date DEFAULT NULL,
  `LastModifiedSchedule` date DEFAULT NULL,
  `LastModifiedTodaysGames` date DEFAULT NULL,
  `LastModifiedDraftLog` date NOT NULL,
  `LastModifiedDraftPicks` date NOT NULL,
  `LastModifiedWaivers` date NOT NULL,
  `LastModifiedLeague` date NOT NULL,
  `DisplayOV` int(11) NOT NULL DEFAULT '1',
  `ContractExtensionFormula` int(11) NOT NULL DEFAULT '1',
  `RFA` int(2) NOT NULL DEFAULT '24',
  `UFA` int(2) NOT NULL DEFAULT '28',
  `RecoveryRate` int(2) NOT NULL DEFAULT '1',
  `SalaryCap` int(11) NOT NULL DEFAULT '50000000',
  `MinimumSalaryCap` int(11) NOT NULL DEFAULT '32000000',
  `FarmSalaryPercentage` char(4) NOT NULL DEFAULT '0.1',
  `MaximumPlayerSalary` int(11) NOT NULL DEFAULT '11000000',
  `MinimumPlayerSalary` int(11) NOT NULL DEFAULT '450000',
  `WaiverAgeExemption` int(2) NOT NULL DEFAULT '25',
  `WaiverMinimumGames` int(11) NOT NULL DEFAULT '15',
  `WaiverDuration` int(2) NOT NULL DEFAULT '2',
  `LeagueFile` varchar(36) DEFAULT NULL,
  `HeaderImage` varchar(36) DEFAULT NULL,
  `FarmHeaderImage` varchar(36) DEFAULT NULL,
  `LastModifiedLeagueFile` date DEFAULT NULL,
  `DraftPicks` int(2) DEFAULT '4',
  `PointSystemW` int(11) NOT NULL DEFAULT '2',
  `PointSystemL` int(11) NOT NULL DEFAULT '0',
  `PointSystemT` int(11) NOT NULL DEFAULT '1',
  `PointSystemOTW` int(11) NOT NULL DEFAULT '2',
  `PointSystemOTL` int(11) NOT NULL DEFAULT '1',
  `PointSystemSO` varchar(5) NOT NULL DEFAULT 'TRUE',
  `GameOptionFight` int(11) NOT NULL,
  `GameOptionCoach` int(11) NOT NULL,
  `GameOptionMorale` int(11) NOT NULL,
  `GameOptionInjury` int(11) NOT NULL,
  `GameOptionFinance` int(11) NOT NULL,
  `GameOptionPenalty` int(11) NOT NULL,
  `GameOptionShots` int(11) NOT NULL,
  `GameOptionGoals` int(11) NOT NULL,
  `GameOptionHits` int(11) NOT NULL,
  `RulesFile` varchar(36) DEFAULT NULL,
  `RichTextEditor` int(11) DEFAULT '1',
  `FarmLeague` varchar(5) DEFAULT 'True',
  `JuniorLeague` varchar(5) DEFAULT 'False',
  `LastModifiedFarmTeams` date NOT NULL,
  `LastModifiedTransactionHistory` date DEFAULT NULL,
  `LastModifiedTeamHistory` date DEFAULT NULL,
  `DivisionLeader` varchar(5) DEFAULT 'True',
  `PayrollCoach` varchar(5) DEFAULT 'False',
  `PayrollFarm` varchar(5) DEFAULT 'False',
  `LeagueLogo` varchar(50) DEFAULT 'NHL.png',
  `FarmLeagueLogo` varchar(50) DEFAULT 'AHL.png',
  `LeagueColor` varchar(6) DEFAULT '000000',
  `FarmLeagueColor` varchar(6) DEFAULT '000000',
  `PlayerAI` varchar(5) DEFAULT 'True',
  `TradeDeadlineDay` int(11) DEFAULT '0',
  `TimeZone` varchar(50) DEFAULT 'TZ=Canada/Atlantic'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `draft` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DraftName` varchar(50) DEFAULT NULL,
  `DraftPickTime` int(11) DEFAULT '10',
  `DraftType` varchar(15) DEFAULT 'Prospect',
  `DraftStatus` varchar(5) DEFAULT 'False',
  `StartDate` date NOT NULL,
  `Season_ID` int(11) DEFAULT '0',
  `DraftTeamList` varchar(100) DEFAULT '0',
  `FinalChamp` varchar(50) DEFAULT NULL,
  `FinalLooser` varchar(50) DEFAULT NULL,
  `LotteryWinner` varchar(50) DEFAULT NULL,
  KEY `D_ID` (`D_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `draftlog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Draft_ID` int(11) DEFAULT '0',
  `Type` varchar(10) DEFAULT 'player',
  `Name` varchar(50) DEFAULT NULL,
  `DraftPick_ID` int(11) DEFAULT '0',
  `Team` varchar(32) DEFAULT NULL,
  `DraftBy` varchar(50) DEFAULT NULL,
  `Round` int(11) DEFAULT '0',
  `Overall` int(11) DEFAULT '0',
  `DraftList` varchar(50) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `draftpicks` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `TeamName` varchar(32) DEFAULT NULL,
  `Round` int(11) DEFAULT NULL,
  `OwnBy` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`D_ID`),
  KEY `TeamName` (`TeamName`),
  KEY `OwnBy` (`OwnBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `farmteam` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Abbre` char(3) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Division` varchar(75) DEFAULT NULL,
  `Conference` varchar(75) DEFAULT NULL,
  `LogoSmall` varchar(32) DEFAULT NULL,
  `LogoLarge` varchar(32) DEFAULT NULL,
  `HeaderImage` varchar(32) DEFAULT NULL,
  `PrimaryColor` varchar(6) DEFAULT NULL,
  `SecondaryColor` varchar(6) DEFAULT NULL,
  `LogoTiny` varchar(32) DEFAULT NULL,
  `ProTeamName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`T_ID`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `farmteamstandings` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DivisionLeader` varchar(5) DEFAULT 'False',
  `Name` varchar(30) DEFAULT NULL,
  `Season_ID` int(30) DEFAULT NULL,
  `Morale` double DEFAULT NULL,
  `Point` double DEFAULT NULL,
  `GP` double DEFAULT NULL,
  `W` double DEFAULT NULL,
  `L` double DEFAULT NULL,
  `T` double DEFAULT NULL,
  `OTW` double DEFAULT NULL,
  `OTL` double DEFAULT NULL,
  `SOW` double DEFAULT NULL,
  `SOL` double DEFAULT NULL,
  `GF` double DEFAULT NULL,
  `GA` double DEFAULT NULL,
  `HomeGP` double DEFAULT NULL,
  `HomeW` double DEFAULT NULL,
  `HomeL` double DEFAULT NULL,
  `HomeT` double DEFAULT NULL,
  `HomeOTW` double DEFAULT NULL,
  `HomeOTL` double DEFAULT NULL,
  `HomeSOW` double DEFAULT NULL,
  `HomeSOL` double DEFAULT NULL,
  `HomeGF` double DEFAULT NULL,
  `HomeGA` double DEFAULT NULL,
  `PPAttemp` double DEFAULT NULL,
  `PPGoal` double DEFAULT NULL,
  `PKAttemp` double DEFAULT NULL,
  `PKGoalGA` double DEFAULT NULL,
  `PKGoalGF` double DEFAULT NULL,
  `ShotsFor` double DEFAULT NULL,
  `ShotsAga` double DEFAULT NULL,
  `ShotsBlock` double DEFAULT NULL,
  `ShotsPerPeriod1` double DEFAULT NULL,
  `ShotsPerPeriod2` double DEFAULT NULL,
  `ShotsPerPeriod3` double DEFAULT NULL,
  `ShotsPerPeriod4` double DEFAULT NULL,
  `GoalsPerPeriod1` double DEFAULT NULL,
  `GoalsPerPeriod2` double DEFAULT NULL,
  `GoalsPerPeriod3` double DEFAULT NULL,
  `GoalsPerPeriod4` double DEFAULT NULL,
  `Shutouts` double DEFAULT NULL,
  `Goals` double DEFAULT NULL,
  `Assists` double DEFAULT NULL,
  `Points` double DEFAULT NULL,
  `Pim` double DEFAULT NULL,
  `Hits` double DEFAULT NULL,
  `FaceOffWonOF` double DEFAULT NULL,
  `FaceOffWonDF` double DEFAULT NULL,
  `FaceOffWonNT` double DEFAULT NULL,
  `FaceOffTotalOF` double DEFAULT NULL,
  `FaceOffTotalDF` double DEFAULT NULL,
  `FaceOffTotalNT` double DEFAULT NULL,
  `EmptyNetGoal` double DEFAULT NULL,
  `ProTeamName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`T_ID`),
  KEY `Name` (`Name`),
  KEY `Season_ID` (`Season_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `goalies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) DEFAULT NULL,
  `Country` char(3) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Height` double DEFAULT NULL,
  `Contract` double NOT NULL DEFAULT '0',
  `Rookie` varchar(5) DEFAULT NULL,
  `Protected` varchar(5) DEFAULT NULL,
  `AvailableforTrade` varchar(5) DEFAULT NULL,
  `NoApplyRerate` varchar(5) DEFAULT NULL,
  `NoTrade` varchar(5) DEFAULT NULL,
  `Salary` decimal(10,0) DEFAULT NULL,
  `Injury` varchar(35) DEFAULT NULL,
  `NumberOfInjury` double DEFAULT NULL,
  `CON` int(11) DEFAULT '100',
  `Suspension` double DEFAULT NULL,
  `Status` double DEFAULT NULL,
  `SK` double DEFAULT NULL,
  `DU` double DEFAULT NULL,
  `ST` double DEFAULT NULL,
  `SZ` double DEFAULT NULL,
  `AG` double DEFAULT NULL,
  `RB` double DEFAULT NULL,
  `SC` double DEFAULT NULL,
  `HS` double DEFAULT NULL,
  `RT` double DEFAULT NULL,
  `EX` double DEFAULT NULL,
  `LD` double DEFAULT NULL,
  `MO` double DEFAULT NULL,
  `PO` double DEFAULT NULL,
  `OV` double DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Photo` varchar(32) DEFAULT NULL,
  `Position` double DEFAULT '5',
  `DateCreated` date DEFAULT NULL,
  `BIO` text,
  PRIMARY KEY (`ID`,`Contract`),
  KEY `Team` (`Team`),
  KEY `Status` (`Status`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `goaliestats` (
  `STAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Season_ID` int(11) DEFAULT NULL,
  `ProGP` double DEFAULT NULL,
  `ProMinPlay` double DEFAULT NULL,
  `ProW` double DEFAULT NULL,
  `ProL` double DEFAULT NULL,
  `ProOTL` double DEFAULT NULL,
  `ProShutouts` double DEFAULT NULL,
  `ProGA` double DEFAULT NULL,
  `ProSA` double DEFAULT NULL,
  `ProPim` double DEFAULT NULL,
  `ProA` double DEFAULT NULL,
  `ProPenalityShotsShots` double DEFAULT NULL,
  `ProPenalityShotsGoals` double DEFAULT NULL,
  `ProEmptyNetGoal` double DEFAULT NULL,
  `FarmGP` double DEFAULT NULL,
  `FarmMinPlay` double DEFAULT NULL,
  `FarmW` double DEFAULT NULL,
  `FarmL` double DEFAULT NULL,
  `FarmOTL` double DEFAULT NULL,
  `FarmShutouts` double DEFAULT NULL,
  `FarmGA` double DEFAULT NULL,
  `FarmSA` double DEFAULT NULL,
  `FarmPim` double DEFAULT NULL,
  `FarmA` double DEFAULT NULL,
  `FarmPenalityShotsShots` double DEFAULT NULL,
  `FarmPenalityShotsGoals` double DEFAULT NULL,
  `FarmEmptyNetGoal` double DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `Active` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`STAT_ID`),
  KEY `Team` (`Team`),
  KEY `Season_ID` (`Season_ID`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `mail` (
  `M_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sender_U_ID` int(11) DEFAULT NULL,
  `Receiver_U_ID` int(11) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Content` text,
  `DateCreated` datetime DEFAULT NULL,
  `Viewed` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`M_ID`),
  KEY `Viewed` (`Viewed`),
  KEY `Receiver_U_ID` (`Receiver_U_ID`),
  KEY `Sender_U_ID` (`Sender_U_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `mailgenerator` (
  `M_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Headline` varchar(50) DEFAULT NULL,
  `Content` text,
  `Type` varchar(12) DEFAULT NULL,
  `Relationship_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`M_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `participation` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` date DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  `Season_ID` int(11) NOT NULL DEFAULT '0',
  KEY `T_ID` (`T_ID`),
  KEY `Type` (`Type`),
  KEY `Season_ID` (`Season_ID`),
  KEY `Team` (`Team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) DEFAULT NULL,
  `Country` char(3) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Height` double DEFAULT NULL,
  `Position` char(1) DEFAULT NULL,
  `Rookie` varchar(5) DEFAULT 'False',
  `Protected` varchar(5) DEFAULT NULL,
  `AvailableforTrade` varchar(5) DEFAULT 'False',
  `NoApplyRerate` varchar(5) DEFAULT NULL,
  `NoTrade` varchar(5) DEFAULT NULL,
  `Salary` decimal(10,0) DEFAULT NULL,
  `Injury` varchar(75) DEFAULT NULL,
  `NumberOfInjury` double DEFAULT NULL,
  `CON` double DEFAULT NULL,
  `Suspension` double DEFAULT NULL,
  `Status` double DEFAULT NULL,
  `CK` double DEFAULT NULL,
  `FG` double DEFAULT NULL,
  `DI` double DEFAULT NULL,
  `SK` double DEFAULT NULL,
  `ST` double DEFAULT NULL,
  `DU` double DEFAULT NULL,
  `PH` double DEFAULT NULL,
  `FO` double DEFAULT NULL,
  `PA` double DEFAULT NULL,
  `SC` double DEFAULT NULL,
  `DF` double DEFAULT NULL,
  `EX` double DEFAULT NULL,
  `LD` double DEFAULT NULL,
  `MO` double DEFAULT NULL,
  `PO` double DEFAULT NULL,
  `OV` double DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Photo` varchar(32) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `BIO` text,
  `Contract` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Injury` (`Injury`),
  KEY `Name` (`Name`),
  KEY `Team` (`Team`),
  KEY `Status` (`Status`),
  KEY `AvailableforTrade` (`AvailableforTrade`),
  KEY `Age` (`Age`),
  KEY `Salary` (`Salary`),
  KEY `Suspension` (`Suspension`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `playerschangerequest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Request` text,
  `URL` varchar(255) DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `playerscontractoffers` (
  `PR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Player` varchar(50) DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Contract` double DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Approved` varchar(8) DEFAULT 'False',
  `Compensation` varchar(75) DEFAULT NULL,
  `RealNHLSalary` varchar(15) DEFAULT NULL,
  `NoTrade` varchar(5) DEFAULT '0',
  `bonus` int(11) DEFAULT '0',
  PRIMARY KEY (`PR_ID`),
  KEY `Team` (`Team`),
  KEY `Player` (`Player`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `playersextensionoffers` (
  `PR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(11) DEFAULT '2008-2009',
  `Player` varchar(50) DEFAULT NULL,
  `Team` varchar(35) DEFAULT NULL,
  `Attempt` int(11) DEFAULT '0',
  `DateCreated` date DEFAULT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'Extension',
  PRIMARY KEY (`PR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `playerstats` (
  `STAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Season_ID` int(11) DEFAULT NULL,
  `ProGP` double DEFAULT NULL,
  `ProShots` double DEFAULT NULL,
  `ProG` double DEFAULT NULL,
  `ProA` double DEFAULT NULL,
  `ProPoint` double DEFAULT NULL,
  `ProPlusMinus` double DEFAULT NULL,
  `ProPim` double DEFAULT NULL,
  `ProShotsBlock` double DEFAULT NULL,
  `ProHits` double DEFAULT NULL,
  `ProHitsTook` double DEFAULT NULL,
  `ProPP` double DEFAULT NULL,
  `ProSH` double DEFAULT NULL,
  `ProGW` double DEFAULT NULL,
  `ProGT` double DEFAULT NULL,
  `ProFaceOffWon` double DEFAULT NULL,
  `ProFaceOffTotal` double DEFAULT NULL,
  `ProPenalityShotsScore` double DEFAULT NULL,
  `ProPenalityShotsTotal` double DEFAULT NULL,
  `ProEmptyNetGoal` double DEFAULT NULL,
  `ProMinutePlay` double DEFAULT NULL,
  `ProHatTrick` double DEFAULT NULL,
  `FarmGP` double DEFAULT NULL,
  `FarmShots` double DEFAULT NULL,
  `FarmG` double DEFAULT NULL,
  `FarmA` double DEFAULT NULL,
  `FarmPoint` double DEFAULT NULL,
  `FarmPlusMinus` double DEFAULT NULL,
  `FarmPim` double DEFAULT NULL,
  `FarmShotsBlock` double DEFAULT NULL,
  `FarmHits` double DEFAULT NULL,
  `FarmHitsTook` double DEFAULT NULL,
  `FarmPP` double DEFAULT NULL,
  `FarmSH` double DEFAULT NULL,
  `FarmGW` double DEFAULT NULL,
  `FarmGT` double DEFAULT NULL,
  `FarmFaceOffWon` double DEFAULT NULL,
  `FarmFaceOffTotal` double DEFAULT NULL,
  `FarmPenalityShotsScore` double DEFAULT NULL,
  `FarmPenalityShotsTotal` double DEFAULT NULL,
  `FarmEmptyNetGoal` double DEFAULT NULL,
  `FarmMinutePlay` double DEFAULT NULL,
  `FarmHatTrick` double DEFAULT NULL,
  `GameInRowWithAGoal` double DEFAULT NULL,
  `GameInRowWithAPoint` double DEFAULT NULL,
  `GameInRowWithOutAPoint` double DEFAULT NULL,
  `GameInRowWithOutAGoal` double DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `RequestedTeams` varchar(24) DEFAULT '0',
  `Active` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`STAT_ID`),
  KEY `Season_ID` (`Season_ID`),
  KEY `Name` (`Name`),
  KEY `Team` (`Team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `prospects` (
  `TeamNumber` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) DEFAULT NULL,
  `Photo` varchar(36) DEFAULT NULL,
  `P_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProspectGrade` decimal(4,1) DEFAULT NULL,
  `ProspectLevel` varchar(1) DEFAULT NULL,
  `Position` varchar(1) DEFAULT NULL,
  `Bio` text,
  `DraftYear` char(4) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  PRIMARY KEY (`P_ID`),
  KEY `TeamNumber` (`TeamNumber`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `proteam` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Abbre` char(3) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `GM` varchar(50) DEFAULT NULL,
  `Email` varchar(75) DEFAULT NULL,
  `Division` varchar(75) DEFAULT NULL,
  `Conference` varchar(75) DEFAULT NULL,
  `Arena` varchar(75) DEFAULT NULL,
  `LogoSmall` varchar(32) DEFAULT NULL,
  `LogoLarge` varchar(32) DEFAULT NULL,
  `HeaderImage` varchar(32) DEFAULT NULL,
  `HeadlineImage` varchar(50) DEFAULT NULL,
  `PrimaryColor` varchar(6) DEFAULT NULL,
  `SecondaryColor` varchar(6) DEFAULT NULL,
  `Messenger` varchar(50) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `LogoTiny` varchar(32) DEFAULT NULL,
  `Username` varchar(32) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Administrator` varchar(6) DEFAULT '0',
  `Avatar` varchar(32) DEFAULT 'defaultgm.jpg',
  `EmailAlert` varchar(6) DEFAULT '0',
  `Bio` text NOT NULL,
  `CommishNotes` text NOT NULL,
  `LastModifiedLines` date NOT NULL,
  `LastVisit` date DEFAULT NULL,
  `REMOTE_ADDR` varchar(16) DEFAULT '1.1.1.1',
  `AwayActive` varchar(5) DEFAULT 'False',
  `Awayleave` date DEFAULT NULL,
  `AwayReturn` date DEFAULT NULL,
  `AwayNote` text,
  PRIMARY KEY (`T_ID`),
  KEY `Name` (`Name`),
  KEY `Number` (`Number`),
  KEY `Division` (`Division`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `proteamstandings` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Number` int(30) DEFAULT NULL,
  `Season_ID` int(30) DEFAULT NULL,
  `TicketPrice1` decimal(10,0) DEFAULT NULL,
  `TicketPrice2` decimal(10,0) DEFAULT NULL,
  `TicketPrice3` decimal(10,0) DEFAULT NULL,
  `TicketPrice4` decimal(10,0) DEFAULT NULL,
  `TicketPrice5` double DEFAULT NULL,
  `TotalAttendance` int(11) DEFAULT NULL,
  `TotalIncome` int(11) DEFAULT NULL,
  `Morale` double DEFAULT NULL,
  `Point` double DEFAULT NULL,
  `GP` double DEFAULT NULL,
  `W` double DEFAULT NULL,
  `L` double DEFAULT NULL,
  `T` double DEFAULT NULL,
  `OTW` double DEFAULT NULL,
  `OTL` double DEFAULT NULL,
  `SOW` double DEFAULT NULL,
  `SOL` double DEFAULT NULL,
  `GF` double DEFAULT NULL,
  `GA` double DEFAULT NULL,
  `HomeGP` double DEFAULT NULL,
  `HomeW` double DEFAULT NULL,
  `HomeL` double DEFAULT NULL,
  `HomeT` double DEFAULT NULL,
  `HomeOTW` double DEFAULT NULL,
  `HomeOTL` double DEFAULT NULL,
  `HomeSOW` double DEFAULT NULL,
  `HomeSOL` double DEFAULT NULL,
  `HomeGF` double DEFAULT NULL,
  `HomeGA` double DEFAULT NULL,
  `PPAttemp` double DEFAULT NULL,
  `PPGoal` double DEFAULT NULL,
  `PKAttemp` double DEFAULT NULL,
  `PKGoalGA` double DEFAULT NULL,
  `PKGoalGF` double DEFAULT NULL,
  `ShotsFor` double DEFAULT NULL,
  `ShotsAga` double DEFAULT NULL,
  `ShotsBlock` double DEFAULT NULL,
  `ShotsPerPeriod1` double DEFAULT NULL,
  `ShotsPerPeriod2` double DEFAULT NULL,
  `ShotsPerPeriod3` double DEFAULT NULL,
  `ShotsPerPeriod4` double DEFAULT NULL,
  `GoalsPerPeriod1` double DEFAULT NULL,
  `GoalsPerPeriod2` double DEFAULT NULL,
  `GoalsPerPeriod3` double DEFAULT NULL,
  `GoalsPerPeriod4` double DEFAULT NULL,
  `Shutouts` double DEFAULT NULL,
  `Goals` double DEFAULT NULL,
  `Assists` double DEFAULT NULL,
  `Points` double DEFAULT NULL,
  `Pim` double DEFAULT NULL,
  `Hits` double DEFAULT NULL,
  `FaceOffWonOF` double DEFAULT NULL,
  `FaceOffWonDF` double DEFAULT NULL,
  `FaceOffWonNT` double DEFAULT NULL,
  `FaceOffTotalOF` double DEFAULT NULL,
  `FaceOffTotalDF` double DEFAULT NULL,
  `FaceOffTotalNT` double DEFAULT NULL,
  `EmptyNetGoal` double DEFAULT NULL,
  `Finance` double DEFAULT NULL,
  `Attendance1` int(11) DEFAULT NULL,
  `Attendance2` int(11) DEFAULT NULL,
  `Attendance3` int(11) DEFAULT NULL,
  `Attendance4` int(11) DEFAULT NULL,
  `Attendance5` int(11) DEFAULT NULL,
  `ArenaCapacity1` int(11) DEFAULT NULL,
  `ArenaCapacity2` int(11) DEFAULT NULL,
  `ArenaCapacity3` int(11) DEFAULT NULL,
  `ArenaCapacity4` int(11) DEFAULT NULL,
  `ArenaCapacity5` int(11) DEFAULT NULL,
  `HomeGamesLeft` double DEFAULT NULL,
  `AverageAttendance` varchar(75) DEFAULT NULL,
  `AverageIncome` int(11) DEFAULT '0',
  `EstimatedRevenue` int(11) DEFAULT '0',
  `ProPayroll` int(11) DEFAULT '0',
  `FarmPayroll` int(11) DEFAULT '0',
  `CoachPayroll` int(11) DEFAULT '0',
  `GamesRemaining` double DEFAULT NULL,
  `ExpensesPerGame` int(11) DEFAULT '0',
  `EstimatedSeasonExpenses` int(11) DEFAULT '0',
  `CurrentFunds` varchar(12) DEFAULT NULL,
  `ProjectedBankAccount` varchar(12) DEFAULT NULL,
  `DivisionLeader` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`T_ID`),
  KEY `Number` (`Number`),
  KEY `Season_ID` (`Season_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `requestplayer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `retiredplayers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) DEFAULT NULL,
  `Country` char(3) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Height` double DEFAULT NULL,
  `Position` char(1) DEFAULT NULL,
  `Photo` varchar(32) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `BIO` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `rivalry` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` datetime DEFAULT NULL,
  `Team1` varchar(50) DEFAULT NULL,
  `Team2` varchar(50) DEFAULT NULL,
  `Team1Approved` varchar(8) DEFAULT '0',
  `Team2Approved` varchar(8) DEFAULT '0',
  `CommishApproved` varchar(8) DEFAULT '0',
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `schedule` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season_ID` int(11) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Day` double DEFAULT NULL,
  `Play` varchar(6) DEFAULT NULL,
  `VisitorTeam` varchar(32) DEFAULT NULL,
  `VisitorScore` double DEFAULT NULL,
  `HomeTeam` varchar(32) DEFAULT NULL,
  `HomeScore` double DEFAULT NULL,
  `Overtime` varchar(6) DEFAULT NULL,
  `ShootOut` varchar(6) DEFAULT NULL,
  `FarmPlay` varchar(5) DEFAULT 'False',
  `FarmVisitorTeam` varchar(50) DEFAULT NULL,
  `FarmVisitorScore` int(11) DEFAULT '0',
  `FarmHomeTeam` varchar(50) DEFAULT NULL,
  `FarmHomeScore` int(11) DEFAULT '0',
  `FarmOverTime` varchar(5) DEFAULT 'False',
  `FarmShootOut` varchar(5) DEFAULT 'False',
  `FarmLink` varchar(32) DEFAULT NULL,
  `Link` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`S_ID`),
  KEY `Play` (`Play`),
  KEY `VisitorTeam` (`VisitorTeam`),
  KEY `Season_ID` (`Season_ID`),
  KEY `Day` (`Day`),
  KEY `Number` (`Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `seasons` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(9) DEFAULT NULL,
  `SeasonType` int(16) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Folder` varchar(32) NOT NULL,
  `DraftYear` int(11) NOT NULL,
  `LeagueFile` varchar(35) DEFAULT NULL,
  `ProTeams` varchar(35) DEFAULT NULL,
  `FarmTeams` varchar(35) DEFAULT NULL,
  `Players` varchar(35) DEFAULT NULL,
  `Goalies` varchar(35) DEFAULT NULL,
  `Schedule` varchar(35) DEFAULT NULL,
  `TodaysGames` varchar(35) DEFAULT NULL,
  `Waivers` varchar(35) DEFAULT NULL,
  `Coaches` varchar(35) DEFAULT NULL,
  `Prospects` varchar(35) DEFAULT NULL,
  `DraftPicks` varchar(35) DEFAULT NULL,
  `TeamHistory` varchar(35) DEFAULT NULL,
  `Transactions` varchar(35) DEFAULT NULL,
  `LeagueOptions` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `statuslog` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Position` int(11) DEFAULT '1',
  `DateCreated` date DEFAULT NULL,
  `StatusAction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `teamhistory` (
  `ID` int(11) DEFAULT '0',
  `Team` varchar(32) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  KEY `Team` (`Team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `todaysgame` (
  `TG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season_ID` int(11) DEFAULT NULL,
  `GameNumber` varchar(32) DEFAULT NULL,
  `Link` varchar(36) DEFAULT NULL,
  `VisitorTeam` varchar(32) DEFAULT NULL,
  `VisitorTeamScore` double DEFAULT NULL,
  `VisitorTeamGoal` varchar(255) DEFAULT NULL,
  `VisitorTeamGoaler` varchar(255) DEFAULT NULL,
  `HomeTeam` varchar(32) DEFAULT NULL,
  `HomeTeamScore` double DEFAULT NULL,
  `HomeTeamGoal` varchar(255) DEFAULT NULL,
  `HomeTeamGoaler` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TG_ID`),
  KEY `Season_ID` (`Season_ID`),
  KEY `GameNumber` (`GameNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `traderequests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(10) DEFAULT '2008-2009',
  `Player` varchar(50) DEFAULT NULL,
  `RequestedTeams` varchar(30) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `transaction` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Team` varchar(32) DEFAULT NULL,
  `Details` varchar(75) DEFAULT NULL,
  `S_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `transactionhistory` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Value` varchar(255) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  KEY `Value` (`Value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `transactions` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` datetime DEFAULT NULL,
  `Team1` int(11) DEFAULT NULL,
  `Team2` int(11) DEFAULT NULL,
  `Team1List` text,
  `Team2List` text,
  `Team1Approved` varchar(8) DEFAULT 'False',
  `Team2Approved` varchar(8) DEFAULT 'False',
  `CommishApproved` varchar(8) DEFAULT 'False',
  `FutureConsiderations` text,
  PRIMARY KEY (`T_ID`),
  KEY `Team1` (`Team1`),
  KEY `Team1Approved` (`Team1Approved`),
  KEY `Team2Approved` (`Team2Approved`),
  KEY `CommishApproved` (`CommishApproved`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `trophies` (
  `PlayoffsChampionsDescription` varchar(75) DEFAULT 'League Champion',
  `RegularSeasonChampionsDescription` varchar(75) DEFAULT 'Best Overall Record',
  `PlayoffMVPDescription` varchar(75) DEFAULT 'Most Valuable Player in the Playoffs',
  `TopScorerDescription` varchar(75) DEFAULT 'Top Point Scorer in the league',
  `MVPDescription` varchar(75) DEFAULT 'Most Valuable Player',
  `GoalieOfTheYearDescription` varchar(75) DEFAULT 'Goalie of the Year',
  `DefensemanOfTheYearDescription` varchar(75) DEFAULT 'Defenseman of the Year',
  `RookieOfTheYearDescription` varchar(75) DEFAULT 'Rookie of the year',
  `BestDefensiveForwardDescription` varchar(75) DEFAULT 'Top Defensive Forward',
  `MostSportsmanlikePlayerDescription` varchar(75) DEFAULT 'Qualities of Perseverance and Sportsmanship',
  `CoachOfTheYearDescription` varchar(75) DEFAULT 'Coach of the Year',
  `TopGoalScorerDescription` varchar(75) DEFAULT 'Top Goal Scorer',
  `LowestGAADescription` varchar(75) DEFAULT 'Goalie(s) With the Fewest Goals Scored Against',
  `LowestPIMDescription` varchar(75) DEFAULT 'Player who Displays Gentlemanly Conduct',
  `PlayoffsChampions` varchar(50) DEFAULT 'The Stanley Cup',
  `RegularSeasonChampions` varchar(50) DEFAULT 'Presidents'' Trophy',
  `PlayoffMVP` varchar(50) DEFAULT 'Conn Smythe Trophy',
  `TopScorer` varchar(50) DEFAULT 'Art Ross Trophy',
  `MVP` varchar(50) DEFAULT 'Hart Memorial Trophy',
  `GoalieOfTheYear` varchar(50) DEFAULT 'Vezina Trophy',
  `DefensemanOfTheYear` varchar(50) DEFAULT 'James Norris Memorial Trophy',
  `RookieOfTheYear` varchar(50) DEFAULT 'Calder Memorial Trophy',
  `BestDefensiveForward` varchar(50) DEFAULT 'Frank J. Selke Trophy',
  `MostSportsmanlikePlayer` varchar(50) DEFAULT 'Bill Masterton Memorial Trophy',
  `CoachOfTheYear` varchar(50) DEFAULT 'Jack Adams Award',
  `TopGoalScorer` varchar(50) DEFAULT 'Maurice Richard Trophy',
  `LowestGAA` varchar(50) DEFAULT 'William M. Jennings Trophy',
  `LowestPIM` varchar(50) DEFAULT 'Lady Byng Memorial Trophy',
  `PlayoffsChampionsPhoto` varchar(50) DEFAULT 'Stanley Cup.png',
  `RegularSeasonChampionsPhoto` varchar(50) DEFAULT NULL,
  `PlayoffMVPPhoto` varchar(50) DEFAULT 'Conn Smythe Trophy.png',
  `TopScorerPhoto` varchar(50) DEFAULT 'Art Ross Trophy.png',
  `MVPPhoto` varchar(50) DEFAULT 'Hart Memorial Trophy.png',
  `GoalieOfTheYearPhoto` varchar(50) DEFAULT 'Vezina Trophy.png',
  `DefensemanOfTheYearPhoto` varchar(50) DEFAULT 'James Norris Memorial Trophy.png',
  `RookieOfTheYearPhoto` varchar(50) DEFAULT 'Calder Memorial Trophy.png',
  `BestDefensiveForwardPhoto` varchar(50) DEFAULT 'Frank J. Selke Trophy.png',
  `MostSportsmanlikePlayerPhoto` varchar(50) DEFAULT 'Bill Masterton Memorial Trophy.png',
  `CoachOfTheYearPhoto` varchar(50) DEFAULT 'Jack Adams Award.png',
  `TopGoalScorerPhoto` varchar(50) DEFAULT 'Maurice ''Rocket'' Richard Trophy.png',
  `LowestGAAPhoto` varchar(50) DEFAULT 'William M. Jennings Trophy.png',
  `LowestPIMPhoto` varchar(50) DEFAULT 'Lady Byng Memorial Trophy.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `trophywinners` (
  `T_ID` int(75) NOT NULL AUTO_INCREMENT,
  `PlayoffsChampions` varchar(75) DEFAULT NULL,
  `RegularSeasonChampions` varchar(75) DEFAULT NULL,
  `PlayoffMVP` varchar(75) DEFAULT NULL,
  `TopScorer` varchar(75) DEFAULT NULL,
  `MVP` varchar(75) DEFAULT NULL,
  `GoalieOfTheYear` varchar(75) DEFAULT NULL,
  `DefensemanOfTheYear` varchar(75) DEFAULT NULL,
  `RookieOfTheYear` varchar(75) DEFAULT NULL,
  `BestDefensiveForward` varchar(75) DEFAULT NULL,
  `MostSportsmanlikePlayer` varchar(75) DEFAULT NULL,
  `CoachOfTheYear` varchar(75) DEFAULT NULL,
  `TopGoalScorer` varchar(75) DEFAULT NULL,
  `LowestGAA` varchar(75) DEFAULT NULL,
  `LowestPIM` varchar(75) DEFAULT NULL,
  `Season_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `users` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Team` int(11) DEFAULT NULL,
  `Username` varchar(32) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Administrator` int(11) DEFAULT '0',
  `Avatar` varchar(32) DEFAULT 'defaultgm.jpg',
  PRIMARY KEY (`U_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `waitinglist` (
  `W_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Referal` varchar(255) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  UNIQUE KEY `W_ID` (`W_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `waiver` (
  `WID` int(11) NOT NULL AUTO_INCREMENT,
  `DayPutOnWaiver` int(11) DEFAULT NULL,
  `DayRemoveFromWaiver` int(11) DEFAULT NULL,
  `FromTeam` int(11) DEFAULT NULL,
  `Player` varchar(35) DEFAULT NULL,
  `ToTeam` int(11) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`WID`),
  KEY `Player` (`Player`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `waiver_claims` (
  `WC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `W_ID` int(11) DEFAULT NULL,
  `Team` int(11) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  UNIQUE KEY `WC_ID` (`WC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$query_GetTeamMenu = "SELECT Name, City, Number  FROM proteam ORDER BY City";
$GetTeamMenu = mysql_query($query_GetTeamMenu, $connection) or die(mysql_error());
$row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu);
$totalRows_GetTeamMenu = mysql_num_rows($GetTeamMenu);

do {
	$_SESSION['MenuTeams'][$pos] = $row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name'];
	$_SESSION['MenuTeamsName'][$pos] = $row_GetTeamMenu['Name'];
	$_SESSION['MenuTeamsID'][$pos] = $row_GetTeamMenu['Number'];	
	$pos = $pos + 1;
} while ($row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu)); 
mysql_free_result($GetTeamMenu);

$Version = mysql_query("SELECT * FROM config", $connection) or die(mysql_error());
$row_Version = mysql_fetch_assoc($Version);
if($row_Version['TimeZone'] != ""){
	$upgradeSQL =  sprintf("ALTER TABLE `config`
					DROP `TimeZone`;");
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}

//UPGRADE CONFIG
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `TinyLeagueImage` varchar(35) DEFAULT NULL,
						ADD `SmallLeagueLogo` varchar(50) DEFAULT NULL,
						ADD `SmallFarmLeagueLogo` varchar(50) DEFAULT NULL,
						ADD `LastModifiedFarmSchedule` date DEFAULT NULL,
						ADD `MaxContract` int(11) NOT NULL DEFAULT '4',
						ADD `ContractVary` int(11) NOT NULL DEFAULT '1',
						ADD `GameResultForward` int(11) NOT NULL DEFAULT '1',
						ADD `Version` varchar(5) DEFAULT '2.0',
						ADD `TimeZone` varchar(50) DEFAULT 'TZ=Canada/Atlantic',
						DROP `GameOptionFight`,
						DROP `GameOptionCoach`,
						DROP `GameOptionMorale`,
						DROP `GameOptionInjury`,
						DROP `GameOptionFinance`,
						DROP `GameOptionPenalty`,
						DROP `GameOptionShots`,
						DROP `GameOptionGoals`,
						DROP `GameOptionHits`,
						DROP `PointSystemW`,
						DROP `PointSystemL`,
						DROP `PointSystemT`,
						DROP `PointSystemOTW`,
						DROP `PointSystemOTL`,
						DROP `PointSystemSO`,
						DROP `WaiverAgeExemption`,
						DROP `WaiverMinimumGames`,
						DROP `WaiverDuration`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//UPGRADE ARTICLES
$upgradeSQL =  sprintf("ALTER TABLE `articles` 
						   CHANGE `Team` `OLD_Team` varchar(75), 
						   ADD `Team` double DEFAULT '0' NULL, 
						   ADD `League` varchar(5) NOT NULL DEFAULT 'True';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `articles` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}
$upgradeSQL =  sprintf("ALTER TABLE `articles` 
					   DROP `OLD_Team`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());



//UPGRADE COACHES AND COACHESTATS
$upgradeSQL =  sprintf("ALTER TABLE `coaches`
						ADD `Bio` text,
						ADD `Retired` double NOT NULL DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
			

//DROP REQUESTPLAYER & RETIRED PLAYERS
$upgradeSQL =  sprintf("DROP TABLE IF EXISTS `coachestats`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `coachestats` (
					  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
					  `Name` varchar(32) DEFAULT NULL,
					  `Number` int(11) DEFAULT NULL,
					  `Season_ID` int(11) DEFAULT '0',
					  `Team` int(11) NOT NULL DEFAULT '0',
					  `ProGP` double DEFAULT '0',
					  `ProW` double DEFAULT '0',
					  `ProL` double DEFAULT '0',
					  `ProT` double DEFAULT '0',
					  `ProOTW` double DEFAULT '0',
					  `ProOTL` double DEFAULT '0',
					  `ProSOW` double DEFAULT '0',
					  `ProSOL` double DEFAULT '0',
					  `ProGF` double DEFAULT '0',
					  `ProGA` double DEFAULT '0',
					  `ProPim` double DEFAULT '0',
					  `ProHits` double DEFAULT '0',
					  `FarmGP` double NOT NULL DEFAULT '0',
					  `FarmW` double NOT NULL DEFAULT '0',
					  `FarmL` double NOT NULL DEFAULT '0',
					  `FarmT` double NOT NULL DEFAULT '0',
					  `FarmOTW` double NOT NULL DEFAULT '0',
					  `FarmOTL` double NOT NULL DEFAULT '0',
					  `FarmSOW` double NOT NULL DEFAULT '0',
					  `FarmSOL` double NOT NULL DEFAULT '0',
					  `FarmGF` double NOT NULL DEFAULT '0',
					  `FarmGA` double NOT NULL DEFAULT '0',
					  `FarmPim` double NOT NULL DEFAULT '0',
					  `FarmHits` double NOT NULL DEFAULT '0',
					  PRIMARY KEY (`C_ID`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());



//UPGRADE DRAFT, DRAFT LOG AND DRAFT PICKS
$upgradeSQL =  sprintf("ALTER TABLE `draft`
						ADD `Year` int(11) NOT NULL DEFAULT '0',
						DROP `StartDate`,
						DROP `DraftTeamList`,
						DROP `FinalChamp`,
						DROP `FinalLooser`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());				
												
$upgradeSQL =  sprintf("DROP TABLE `draftlog`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
						
$upgradeSQL =  sprintf("ALTER TABLE `draftpicks`
						ADD `Name` varchar(50) DEFAULT '',
						ADD `DraftList` text DEFAULT NULL,
						ADD `DateCreated` datetime DEFAULT NULL,
						ADD `Overall` int(11) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());





//UPGRADE FARMTEAM, FARMTEAMSTANDINGS & ADD FARM SCHEDULE 
$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `farmschedule` (
						  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
						  `Season_ID` int(11) DEFAULT NULL,
						  `Number` int(11) DEFAULT NULL,
						  `Day` double DEFAULT '0',
						  `Play` varchar(6) DEFAULT NULL,
						  `VisitorTeam` varchar(32) DEFAULT NULL,
						  `VisitorScore` double DEFAULT '0',
						  `HomeTeam` varchar(32) DEFAULT NULL,
						  `HomeScore` double DEFAULT '0',
						  `Overtime` varchar(6) DEFAULT NULL,
						  `ShootOut` varchar(6) DEFAULT NULL,
						  `Round` double DEFAULT '0',
						  PRIMARY KEY (`S_ID`)
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$query_GetFarm = "SELECT * FROM `schedule` WHERE FarmPlay='True' OR  FarmPlay='Vrai'";
$GetFarm = mysql_query($query_GetFarm, $connection) or die(mysql_error());
$row_GetFarm = mysql_fetch_assoc($GetFarm);
$totalRows_GetFarm = mysql_num_rows($GetFarm);
	
$query_GetFarm = "SELECT s.*, (SELECT p.Number FROM proteam as p, farmteam as f WHERE f.Name=s.FarmHomeTeam AND f.ProTeamName=p.Name LIMIT 0,1) as HTeam, (SELECT p.Number FROM proteam as p, farmteam as f WHERE f.Name=s.FarmVisitorTeam AND f.ProTeamName=p.Name LIMIT 0,1) as VTeam FROM `schedule` as s WHERE s.FarmPlay <> 'NULL' ORDER BY S_ID";
$GetFarm = mysql_query($query_GetFarm, $connection) or die(mysql_error());
$row_GetFarm = mysql_fetch_assoc($GetFarm);
$totalRows_GetFarm = mysql_num_rows($GetFarm);
	
if($totalRows_GetFarm > 0){
do{
	$insertSQL = sprintf("INSERT INTO farmschedule (Number,Day,Play,VisitorTeam,VisitorScore,HomeTeam,HomeScore,Overtime,ShootOut,Round,Season_ID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, 0, %s)",
			GetSQLValueString($row_GetFarm['Number'], "int"),
			GetSQLValueString($row_GetFarm['Day'], "double"),
			GetSQLValueString($row_GetFarm['FarmPlay'], "text"),
			GetSQLValueString($row_GetFarm['VTeam'], "double"),
			GetSQLValueString($row_GetFarm['FarmVisitorScore'], "double"),
			GetSQLValueString($row_GetFarm['HTeam'], "double"),
			GetSQLValueString($row_GetFarm['FarmHomeScore'], "double"),
			GetSQLValueString($row_GetFarm['FarmOverTime'], "text"),
			GetSQLValueString($row_GetFarm['FarmShootOut'], "text"),
			GetSQLValueString($row_GetFarm['Season_ID'], "int")
		);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
} while ($row_GetFarm = mysql_fetch_assoc($GetFarm)); 
}
	
$upgradeSQL =  sprintf("ALTER TABLE `farmteam`
						ADD `Number` int(11) NOT NULL DEFAULT '0',
						ADD `JerseyHome` varchar(50) DEFAULT NULL,
						ADD `JerseyAway` varchar(50) DEFAULT NULL,
						ADD `TextColor` varchar(6) NOT NULL DEFAULT '000000';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


				
$upgradeSQL =  sprintf("ALTER TABLE `farmteamstandings`
						ADD `Number` int(11) NOT NULL DEFAULT '0',
						ADD `Captain` int(11) DEFAULT '0',
						ADD `Assistant1` int(11) DEFAULT '0',
						ADD `Assistant2` int(11) DEFAULT '0',
						ADD `Payroll` double DEFAULT '0',
						ADD `TotalPlayersSalaries` int(11) DEFAULT '0',
						ADD `ExpensePerDay` int(11) DEFAULT '0',
						ADD `CoachID` int(11) DEFAULT '0',
						ADD `ScheduleGameInAYear` double DEFAULT '0',
						ADD `PlayOffEliminated` varchar(5) DEFAULT NULL,
						ADD `PowerRanking` double DEFAULT '0',
						ADD `PlayOffWinRound` double DEFAULT '0',
						ADD `StandingPlayoffTitle` varchar(6) DEFAULT NULL,
						ADD `Streak` varchar(6) DEFAULT NULL,
						ADD `Last10W` double DEFAULT '0',
						ADD `Last10L` double DEFAULT '0',
						ADD `Last10T` double DEFAULT '0',
						ADD `Last10OTW` double DEFAULT '0',
						ADD `Last10OTL` double DEFAULT '0',
						ADD `Last10SOW` double DEFAULT '0',
						ADD `Last10SOL` double DEFAULT '0',
						ADD `Round` double DEFAULT '0',
						ADD `PuckTimeInZoneDF` int(11) DEFAULT '0',
						ADD `PuckTimeInZoneOF` int(11) DEFAULT '0',
						ADD `PuckTimeInZoneNT` int(11) DEFAULT '0',
						ADD `PuckTimeControlinZoneDF` int(11) DEFAULT '0',
						ADD `PuckTimeControlinZoneOF` int(11) DEFAULT '0',
						ADD `PuckTimeControlinZoneNT` int(11) DEFAULT '0',
						CHANGE `Points` `TotalPoint` double DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `farmteamstandings` SET `Number`=%s WHERE ProTeamName='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	$upgradeSQL =  sprintf("UPDATE `farmteam` SET `Number`=%s WHERE ProTeamName='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}

//UPGRADE GOALIES AND GOALIESTATS
$upgradeSQL =  sprintf("ALTER TABLE `goalies`
						ADD `AgeDate` varchar(10) DEFAULT NULL,
						ADD `CanPlayPro` varchar(5) DEFAULT NULL,
						ADD `CanPlayFarm` varchar(5) DEFAULT NULL,
						ADD `ForceWaiver` varchar(5) DEFAULT NULL,
						ADD `StarPower` varchar(5) DEFAULT  '0',
						ADD `Salary2` decimal(10,0) DEFAULT  '0',
						ADD `Salary3` decimal(10,0) DEFAULT  '0',
						ADD `Salary4` decimal(10,0) DEFAULT  '0',
						ADD `Salary5` decimal(10,0) DEFAULT  '0',
						ADD `Salary6` decimal(10,0) DEFAULT  '0',
						ADD `Salary7` decimal(10,0) DEFAULT  '0',
						ADD `Salary8` decimal(10,0) DEFAULT  '0',
						ADD `Salary9` decimal(10,0) DEFAULT  '0',
						ADD `Salary10` decimal(10,0) DEFAULT  '0',
						ADD `Status1` double DEFAULT  '0',
						ADD `Status2` double DEFAULT  '0',
						ADD `Status3` double DEFAULT  '0',
						ADD `Status4` double DEFAULT  '0',
						ADD `Status5` double DEFAULT  '0',
						ADD `Status6` double DEFAULT  '0',
						ADD `Status7` double DEFAULT  '0',
						ADD `Status8` double DEFAULT  '0',
						ADD `Status9` double DEFAULT  '0',
						ADD `Status10` double DEFAULT  '0',
						ADD `EN` double DEFAULT  '0',
						ADD `PC` double DEFAULT  '0',
						ADD `PS` double DEFAULT  '0',
						ADD `URLLink` varchar(255) DEFAULT NULL,
						ADD `ExcludeFromPayroll` varchar(5) DEFAULT NULL,
						ADD `UniformNumber` int(11) NULL DEFAULT '0',
						ADD `Retired` int(11) DEFAULT '0',
						CHANGE `Salary` `Salary1` decimal(10,0) DEFAULT NULL,
						CHANGE `OV` `Overall` double DEFAULT '0',
						DROP `ST`,
						DROP `Status`,
						CHANGE `Team` `OLD_Team` varchar(75), 
						ADD `Team` int(32) DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

		
$upgradeSQL =  sprintf("ALTER TABLE `goaliestats`
						ADD `Number` double DEFAULT NULL,
						ADD `ProShootout` double DEFAULT NULL,
						ADD `ProSARebound` double DEFAULT NULL,
						ADD `ProStartGoaler` double DEFAULT NULL,
						ADD `ProBackupGoaler` double DEFAULT NULL,
						ADD `ProStar1` double DEFAULT NULL,
						ADD `ProStar2` double DEFAULT NULL,
						ADD `ProStar3` double DEFAULT NULL,
						ADD `ProStarPower7Days` int(11) DEFAULT '0',
						ADD `ProStarPower30Days` int(11) DEFAULT '0',
						ADD `ProStarPowerYear` int(11) DEFAULT '0',
						ADD `FarmShootout` double DEFAULT NULL,
						ADD `FarmSARebound` double DEFAULT NULL,
						ADD `FarmStartGoaler` double DEFAULT NULL,
						ADD `FarmBackupGoaler` double DEFAULT NULL,
						ADD `FarmStar1` double DEFAULT NULL,
						ADD `FarmStar2` double DEFAULT NULL,
						ADD `FarmStar3` double DEFAULT NULL,
						ADD `FarmStarPower7Days` int(11) DEFAULT '0',
						ADD `FarmStarPower30Days` int(11) DEFAULT '0',
						ADD `FarmStarPowerYear` int(11) DEFAULT '0',
						CHANGE `Team` `OLD_Team` varchar(75), 
						ADD `Team` int(32) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `goalies` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `goaliestats` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}
$upgradeSQL =  sprintf("ALTER TABLE `goalies`
					   DROP `OLD_Team`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
					   
$upgradeSQL =  sprintf("ALTER TABLE `goaliestats`
					   DROP `OLD_Team`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$query_GetPlayer = "SELECT Number, Name FROM `goalies`";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);

do{
	$updateSQL = sprintf("UPDATE `goaliestats` SET Number=%s WHERE Name=%s",
			GetSQLValueString($row_GetPlayer['Number'], "int"),
			GetSQLValueString(addslashes($row_GetPlayer['Name']), "text")
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 

$query_GetPlayer = "SELECT STAT_ID, ProMinPlay, FarmMinPlay, ProGP, FarmGP FROM `goaliestats`";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);

do{
	$tmpProMinPlay = floor ($row_GetPlayer['ProMinPlay'] * 60);
	$tmpFarmMinPlay = floor ($row_GetPlayer['FarmMinPlay'] * 60);
	$updateSQL = sprintf("UPDATE `goaliestats` SET ProMinPlay=%s, FarmMinPlay=%s, ProStartGoaler=%s, FarmStartGoaler=%s WHERE STAT_ID=%s",
			GetSQLValueString($tmpProMinPlay, "int"),
			GetSQLValueString($tmpFarmMinPlay, "int"),
			GetSQLValueString($row_GetPlayer['ProGP'], "int"),
			GetSQLValueString($row_GetPlayer['FarmGP'], "int"),
			GetSQLValueString($row_GetPlayer['STAT_ID'], "int")
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 


//DROP MAIL GENERATOR
$upgradeSQL =  sprintf("DROP TABLE IF EXISTS `mailgenerator`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


	
//UPGRADE PLAYERS, PLAYERSTATS, PLAYERCONTACTEXTENSIONS, PLAYERCONTRACTOFFERS
$upgradeSQL =  sprintf("ALTER TABLE `players`
						ADD `AgeDate` varchar(10) DEFAULT NULL,
						ADD `PosC` char(5) DEFAULT NULL,
						ADD `PosLW` char(5) DEFAULT NULL,
						ADD `PosRW` char(5) DEFAULT NULL,
						ADD `PosD` char(5) DEFAULT NULL,
						ADD `CanPlayPro` char(5) DEFAULT NULL,
						ADD `CanPlayFarm` char(5) DEFAULT NULL,
						ADD `ForceWaiver` char(5) DEFAULT NULL,
						ADD `StarPower` double DEFAULT '0',
						ADD `Salary2` decimal(10,0) DEFAULT  '0',
						ADD `Salary3` decimal(10,0) DEFAULT  '0',
						ADD `Salary4` decimal(10,0) DEFAULT  '0',
						ADD `Salary5` decimal(10,0) DEFAULT  '0',
						ADD `Salary6` decimal(10,0) DEFAULT  '0',
						ADD `Salary7` decimal(10,0) DEFAULT  '0',
						ADD `Salary8` decimal(10,0) DEFAULT  '0',
						ADD `Salary9` decimal(10,0) DEFAULT  '0',
						ADD `Salary10` decimal(10,0) DEFAULT  '0',
						ADD `Status0` double DEFAULT  '0',
						ADD `Status1` double DEFAULT  '0',
						ADD `Status2` double DEFAULT  '0',
						ADD `Status3` double DEFAULT  '0',
						ADD `Status4` double DEFAULT  '0',
						ADD `Status5` double DEFAULT  '0',
						ADD `Status6` double DEFAULT  '0',
						ADD `Status7` double DEFAULT  '0',
						ADD `Status8` double DEFAULT  '0',
						ADD `Status9` double DEFAULT  '0',
						ADD `EN` double DEFAULT  '0',
						ADD `PS` double DEFAULT  '0',
						ADD `URLLINK` varchar(255) DEFAULT NULL,
						ADD `UniformNumber` int(11) NULL DEFAULT '0',
						ADD `Retired` int(11) DEFAULT '0',
						CHANGE `Salary` `Salary1` decimal(10,0) DEFAULT '0',
						CHANGE `OV` `Overall` double DEFAULT '0',
						CHANGE `Team` `OLD_Team` varchar(75), 
						ADD `Team` int(32) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
						
$upgradeSQL =  sprintf("ALTER TABLE `playerstats`
						ADD `Number` double DEFAULT NULL,
						ADD `Pro5Pim` double DEFAULT NULL,
						ADD `ProOwnShotsBlock` double DEFAULT NULL,
						ADD `ProOwnShotsMissGoals` double DEFAULT NULL,
						ADD `ProPPA` double DEFAULT NULL,
						ADD `ProPPShots` double DEFAULT NULL,
						ADD `ProPPMinutePlay` double DEFAULT NULL,
						ADD `ProPKA` double DEFAULT NULL,
						ADD `ProPKShots` double DEFAULT NULL,
						ADD `ProPKMinutePlay` double DEFAULT NULL,
						ADD `ProGiveAway` double DEFAULT NULL,
						ADD `ProTakeAway` double DEFAULT NULL,
						ADD `ProPuckPossesionTime` double DEFAULT NULL,
						ADD `ProFightW` double DEFAULT NULL,
						ADD `ProFightL` double DEFAULT NULL,
						ADD `ProFightT` double DEFAULT NULL,
						ADD `ProStar1` double DEFAULT NULL,
						ADD `ProStar2` double DEFAULT NULL,
						ADD `ProStar3` double DEFAULT NULL,
						ADD `ProStarPower7Days` int(11) DEFAULT '0',
						ADD `ProStarPower30Days` int(11) DEFAULT '0',
						ADD `ProStarPowerYear` int(11) DEFAULT '0',
						ADD `Farm5Pim` double DEFAULT NULL,
						ADD `FarmOwnShotsBlock` double DEFAULT NULL,
						ADD `FarmOwnShotsMissGoals` double DEFAULT NULL,
						ADD `FarmPPA` double DEFAULT NULL,
						ADD `FarmPPShots` double DEFAULT NULL,
						ADD `FarmPPMinutePlay` double DEFAULT NULL,
						ADD `FarmPKA` double DEFAULT NULL,
						ADD `FarmPKShots` double DEFAULT NULL,
						ADD `FarmPKMinutePlay` double DEFAULT NULL,
						ADD `FarmGiveAway` double DEFAULT NULL,
						ADD `FarmTakeAway` double DEFAULT NULL,
						ADD `FarmPuckPossesionTime` double DEFAULT NULL,
						ADD `FarmFightW` double DEFAULT NULL,
						ADD `FarmFightL` double DEFAULT NULL,
						ADD `FarmFightT` double DEFAULT NULL,
						ADD `FarmStar1` double DEFAULT NULL,
						ADD `FarmStar2` double DEFAULT NULL,
						ADD `FarmStar3` double DEFAULT NULL,
						ADD `FarmStarPower7Days` int(11) DEFAULT '0',
						ADD `FarmStarPower30Days` int(11) DEFAULT '0',
						ADD `FarmStarPowerYear` int(11) DEFAULT '0',
						ADD `ExcludeFromPayroll` varchar(5) DEFAULT NULL,
						CHANGE `ProPP` `ProPPG` double DEFAULT NULL,
						CHANGE `ProSH` `ProPKG` double DEFAULT NULL,
						CHANGE `FarmPP` `FarmPPG` double DEFAULT NULL,
						CHANGE `FarmSH` `FarmPKG` double DEFAULT NULL,
						CHANGE `Team` `OLD_Team` varchar(75), 
						ADD `Team` int(32) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
							
$upgradeSQL =  sprintf("ALTER TABLE `playerscontractoffers`
						ADD `Salary1` int(11) DEFAULT '0',
						ADD `Salary2` int(11) DEFAULT NULL,
						ADD `Salary3` int(11) DEFAULT NULL,
						ADD `Salary4` int(11) DEFAULT NULL,
						ADD `Salary5` int(11) DEFAULT NULL,
						ADD `Salary6` int(11) DEFAULT NULL,
						ADD `Salary7` int(11) DEFAULT NULL,
						ADD `Salary8` int(11) DEFAULT NULL,
						ADD `Salary9` int(11) DEFAULT NULL,
						ADD `Salary10` int(11) DEFAULT NULL,
						ADD `NoTradeSalary` int(11) DEFAULT '0',
						DROP `Salary`,
						DROP `RealNHLSalary`,
						CHANGE `NoTrade` `NoTrade` varchar(5) default '0',
						CHANGE `Team` `OLD_Team` varchar(75),
						ADD `Team` int(32) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
						
$upgradeSQL =  sprintf("ALTER TABLE `playersextensionoffers`
						CHANGE `Team` `OLD_Team` varchar(75),
						ADD `Team` int(32) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$query_GetPlayer = "SELECT Position, Number FROM `players`";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
if($totalRows_GetPlayer > 0){
do{
	$tmpC="False";
	$tmpLW="False";
	$tmpRW="False";
	$tmpD="False";
	if($row_GetPlayer['Position'] == 1){
		$tmpC="True";
	} else if($row_GetPlayer['Position'] == 2){
		$tmpLW="True";
	} else if($row_GetPlayer['Position'] == 3){
		$tmpRW="True";
	} else if($row_GetPlayer['Position'] == 4){
		$tmpD="True";
	}
	$insertSQL = sprintf("UPDATE players SET PosC=%s, PosLW=%s, PosRW=%s, PosD=%s WHERE Number=%s",
			GetSQLValueString($tmpC, "text"),
			GetSQLValueString($tmpLW, "text"),
			GetSQLValueString($tmpRW, "text"),
			GetSQLValueString($tmpD, "text"),
			GetSQLValueString($row_GetPlayer['Number'], "int")
		);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 
}

$query_GetPlayer = "SELECT r.* FROM `retiredplayers` as r WHERE r.Position=5";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$tmpNumberCount = 1000000;
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
if($totalRows_GetPlayer > 0){
do{
	$insertSQL = sprintf("INSERT INTO goalies (Name,Photo,Country,Age,Weight,Height,Position,Bio,DateCreated,Number,Retired) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 1)",
			GetSQLValueString(addslashes($row_GetPlayer['Name']), "text"),
			GetSQLValueString($row_GetPlayer['Photo'], "text"),
			GetSQLValueString($row_GetPlayer['Country'], "text"),
			GetSQLValueString($row_GetPlayer['Age'], "int"),
			GetSQLValueString($row_GetPlayer['Weight'], "text"),
			GetSQLValueString($row_GetPlayer['Height'], "text"),
			GetSQLValueString(5, "int"),
			GetSQLValueString($row_GetPlayer['Bio'], "text"),
			GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
			GetSQLValueString($tmpNumberCount, "int")
		);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

	$upgradeSQL =  sprintf("UPDATE `goaliestats` SET `Number`=%s WHERE `Name`='%s' AND `Number`=(SELECT `Name` FROM `goalies` WHERE `Name`='%s' AND `Retired`=1)",$tmpNumberCount, addslashes($row_GetPlayer['Name']), addslashes($row_GetPlayer['Name']));
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

	$tmpNumberCount = $tmpNumberCount + 1;
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 
}

$query_GetPlayer = "SELECT r.* FROM `retiredplayers` as r WHERE r.Position < 5";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$tmpNumberCount = 2000000;
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
	
if($totalRows_GetPlayer > 0){
do{
	$tmpC="False";
	$tmpLW="False";
	$tmpRW="False";
	$tmpD="False";
	if($row_GetPlayer['Position'] == 1){
		$tmpC="True";
	} else if($row_GetPlayer['Position'] == 2){
		$tmpLW="True";
	} else if($row_GetPlayer['Position'] == 3){
		$tmpRW="True";
	} else if($row_GetPlayer['Position'] == 4){
		$tmpD="True";
	}
	$insertSQL = sprintf("INSERT INTO players (Name,Photo,Country,Age,Weight,Height,Position,PosC,PosLW,PosRW,PosD,Bio,DateCreated,Number,Retired) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 1)",
			GetSQLValueString(addslashes($row_GetPlayer['Name']), "text"),
			GetSQLValueString($row_GetPlayer['Photo'], "text"),
			GetSQLValueString($row_GetPlayer['Country'], "text"),
			GetSQLValueString($row_GetPlayer['Age'], "int"),
			GetSQLValueString($row_GetPlayer['Weight'], "text"),
			GetSQLValueString($row_GetPlayer['Height'], "text"),
			GetSQLValueString($row_GetPlayer['Position'], "int"),
			GetSQLValueString($tmpC, "text"),
			GetSQLValueString($tmpLW, "text"),
			GetSQLValueString($tmpRW, "text"),
			GetSQLValueString($tmpD, "text"),
			GetSQLValueString($row_GetPlayer['Bio'], "text"),
			GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
			GetSQLValueString($tmpNumberCount, "int")
		);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `playerstats` SET `Number`=%s WHERE `Name`='%s' AND `Number`=(SELECT `Name` FROM `players` WHERE `Name`='%s' AND `Retired`=1)",$tmpNumberCount, addslashes($row_GetPlayer['Name']), addslashes($row_GetPlayer['Name']));
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$tmpNumberCount = $tmpNumberCount + 1;
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 
}

foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `players` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `playerstats` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `playerscontractoffers` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `playersextensionoffers` SET `Team`=%s WHERE OLD_Team='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}


$query_GetPlayer = "SELECT Number, Name FROM `players`";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);

do{
	$updateSQL = sprintf("UPDATE `playerstats` SET Number=%s WHERE Name=%s",
			GetSQLValueString($row_GetPlayer['Number'], "int"),
			GetSQLValueString(addslashes($row_GetPlayer['Name']), "text")
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 

$query_GetPlayer = "SELECT STAT_ID, ProMinutePlay, FarmMinutePlay FROM `playerstats`";
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);

do{
	$tmpProMinutePlay = floor ($row_GetPlayer['ProMinutePlay'] * 60);
	$tmpFarmMinutePlay = floor ($row_GetPlayer['FarmMinutePlay'] * 60);
	$updateSQL = sprintf("UPDATE `playerstats` SET ProMinutePlay=%s, FarmMinutePlay=%s WHERE STAT_ID=%s",
			GetSQLValueString($tmpProMinutePlay, "int"),
			GetSQLValueString($tmpFarmMinutePlay, "int"),
			GetSQLValueString($row_GetPlayer['STAT_ID'], "int")
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetPlayer = mysql_fetch_assoc($GetPlayer)); 



$updateSQL = "UPDATE `players` SET Status0=2";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateSQL = "UPDATE `goalies` SET Status1=2";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());


//DROP REQUESTPLAYER & RETIRED PLAYERS
$upgradeSQL =  sprintf("DROP TABLE IF EXISTS `requestplayer`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

$upgradeSQL =  sprintf("DROP TABLE IF EXISTS `retiredplayers`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());





//UPDATE PROSPECTS
$upgradeSQL =  sprintf("ALTER TABLE `prospects`
						ADD `OverallPick` int(11) NOT NULL DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//UPDATE PROTEAM AND PROTEAMSTATS
$upgradeSQL =  sprintf("ALTER TABLE `proteam`
						ADD `JerseyHome` varchar(50) DEFAULT NULL,
						ADD `JerseyAway` varchar(50) DEFAULT NULL,
						ADD `LogoNav` varchar(35) DEFAULT NULL,
						ADD `TextColor` varchar(6) NOT NULL DEFAULT '000000';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
						
$upgradeSQL =  sprintf("ALTER TABLE `proteamstandings` 
						ADD `Captain` int(11) DEFAULT NULL,
						ADD `Assistant1` int(11) DEFAULT NULL,
						ADD `Assistant2` int(11) DEFAULT NULL,
						ADD `PuckTimeInZoneDF` int(11) DEFAULT NULL,
						ADD `PuckTimeInZoneOF` int(11) DEFAULT NULL,
						ADD `PuckTimeInZoneNT` int(11) DEFAULT NULL,
						ADD `PuckTimeControlinZoneDF` int(11) DEFAULT NULL,
						ADD `PuckTimeControlinZoneOF` int(11) DEFAULT NULL,
						ADD `PuckTimeControlinZoneNT` int(11) DEFAULT NULL,
						ADD `TotalPoint` double DEFAULT NULL,
						ADD `SeasonTicketPCT` double DEFAULT NULL,
						ADD `TotalPlayersSalaries` int(11) DEFAULT '0',
						ADD `CoachID` int(11) DEFAULT NULL,
						ADD `ScheduleGameInAYear` double DEFAULT NULL,
						ADD `PlayOffEliminated` varchar(5) DEFAULT NULL,
						ADD `PowerRanking` double DEFAULT NULL,
						ADD `LinesLoad` double DEFAULT NULL,
						ADD `PlayOffWinRound` double DEFAULT NULL,
						ADD `LuxuryTaxeTotal` double DEFAULT NULL,
						ADD `StandingPlayoffTitle` varchar(5) DEFAULT NULL,
						ADD `Streak` varchar(6) DEFAULT NULL,
						ADD `Last10W` double DEFAULT NULL,
						ADD `Last10L` double DEFAULT NULL,
						ADD `Last10T` double DEFAULT NULL,
						ADD `Last10OTW` double DEFAULT NULL,
						ADD `Last10OTL` double DEFAULT NULL,
						ADD `Last10SOW` double DEFAULT NULL,
						ADD `Last10SOL` double DEFAULT NULL,
						ADD `Round` double DEFAULT '0',
						DROP `FarmPayroll`,
						CHANGE `ProPayroll` `Payroll` int(11) DEFAULT '0',
						CHANGE `ExpensesPerGame` `ExpensePerDay` int(11) DEFAULT '0';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());



//UPDATE SCHEDULE, SEASONS, DRAFTPICKS, TEAM HISTORY AND TODAYSGAME
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `schedule` SET `VisitorTeam`=%s WHERE `VisitorTeam`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	$upgradeSQL =  sprintf("UPDATE `schedule` SET `HomeTeam`=%s WHERE `HomeTeam`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `draftpicks` SET `TeamName`=%s WHERE `TeamName`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	$upgradeSQL =  sprintf("UPDATE `draftpicks` SET `OwnBy`=%s WHERE `OwnBy`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	
	$upgradeSQL =  sprintf("UPDATE `teamhistory` SET `Team`=%s WHERE `Team`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}
$upgradeSQL =  sprintf("ALTER TABLE `schedule` 
						ADD `Round` double DEFAULT '0',
						DROP `FarmPlay`,
						DROP `FarmVisitorTeam`,
						DROP `FarmVisitorScore`,
						DROP `FarmHomeTeam`,
						DROP `FarmHomeScore`,
						DROP `FarmOverTime`,
						DROP `FarmShootOut`,
						DROP `FarmLink`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());	
					  
$upgradeSQL =  sprintf("ALTER TABLE `seasons` 
						ADD `FarmSchedule` varchar(35) DEFAULT NULL;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	$upgradeSQL =  sprintf("UPDATE `todaysgame` SET `VisitorTeam`=%s WHERE `VisitorTeam`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
	$upgradeSQL =  sprintf("UPDATE `todaysgame` SET `HomeTeam`=%s WHERE `HomeTeam`='%s'",$_SESSION['MenuTeamsID'][$TeamPage], $_SESSION['MenuTeamsName'][$TeamPage]);
	$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
}				
$upgradeSQL =  sprintf("ALTER TABLE `todaysgame`
						ADD `Type` varchar(4) DEFAULT 'Pro';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

		
$query_GetSeasons = sprintf("SELECT S_ID,Season FROM seasons");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
do{
	$updateSQL = sprintf("UPDATE seasons SET Season='%s' WHERE S_ID=%s",
			substr($row_GetSeasons['Season'],0,4),
			$row_GetSeasons['S_ID']
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetSeasons = mysql_fetch_assoc($GetSeasons)); 


//UPDATE PLAYOFFS
$query_GetPlayoff = "SELECT s.S_ID, p.GP, p.T_ID, p.Season_ID, p.Number FROM `proteamstandings` as p, seasons as s WHERE s.SeasonType=0 AND s.S_ID=p.Season_ID AND p.GP > 0 ORDER BY s.Season DESC, p.GP DESC";
$GetPlayoff= mysql_query($query_GetPlayoff, $connection) or die(mysql_error());
$row_GetPlayoff = mysql_fetch_assoc($GetPlayoff);
$totalRows_GetPlayoff = mysql_num_rows($GetPlayoff);
	
if($totalRows_GetPlayoff > 0){
$lastSeason="";
do{
	if($lastSeason != $row_GetPlayoff['Season_ID']){
		$tmpDayStart=43;
		$tmpDayEnd=49;
		$tmpRound=4;
		$rowCount = 16;
		$lastSeason = $row_GetPlayoff['Season_ID'];
		$updateSQL = sprintf("UPDATE schedule SET Round=1 WHERE Season_ID=%s",
			$row_GetPlayoff['S_ID']
		);
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
	
	$updateSQL = sprintf("UPDATE proteamstandings SET Round=%s WHERE T_ID=%s",
			$tmpRound,
			$row_GetPlayoff['T_ID']
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
		
	
	$query_GetSchedule = sprintf("SELECT * FROM schedule WHERE Season_ID=%s AND Day >=%s AND Day <=%s ORDER BY Day asc",
								$row_GetPlayoff['S_ID'], 
								$tmpDayStart, 
								$tmpDayEnd
								);
	$GetSchedule= mysql_query($query_GetSchedule, $connection) or die(mysql_error());
	$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
	$totalRows_GetSchedule = mysql_num_rows($GetSchedule);

	if($totalRows_GetSchedule > 0){
		do{
			$updateSQL = sprintf("UPDATE schedule SET Round=%s WHERE S_ID=%s",
				$tmpRound,
				$row_GetSchedule['S_ID']
			);
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
		} while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)); 
	}
	
	
	
	$rowCount = $rowCount - 1;
	
	if($rowCount == 14){
		$tmpDayStart=29;
		$tmpDayEnd=42;
		$tmpRound=$tmpRound-1;
	} else if($rowCount == 12){
		$tmpDayStart=15;
		$tmpDayEnd=28;
		$tmpRound=$tmpRound-1;
	} else if($rowCount == 8){
		$tmpDayStart=1;
		$tmpDayEnd=14;
		$tmpRound=$tmpRound-1;
	}
} while ($row_GetPlayoff = mysql_fetch_assoc($GetPlayoff)); 
}



$query_GetPlayoff = "SELECT s.S_ID, p.GP, p.T_ID, p.Season_ID, p.Number FROM `farmteamstandings` as p, seasons as s WHERE s.SeasonType=0 AND s.S_ID=p.Season_ID AND p.GP > 0 ORDER BY s.Season DESC, p.GP DESC";
$GetPlayoff= mysql_query($query_GetPlayoff, $connection) or die(mysql_error());
$row_GetPlayoff = mysql_fetch_assoc($GetPlayoff);
$totalRows_GetPlayoff = mysql_num_rows($GetPlayoff);
	
if($totalRows_GetPlayoff > 0){
$lastSeason="";
do{
	if($lastSeason != $row_GetPlayoff['Season_ID']){
		$tmpDayStart=43;
		$tmpDayEnd=49;
		$tmpRound=4;
		$rowCount = 16;
		$lastSeason = $row_GetPlayoff['Season_ID'];
		$updateSQL = sprintf("UPDATE farmschedule SET Round=1 WHERE Season_ID=%s",
			$row_GetPlayoff['S_ID']
		);
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
	
	$updateSQL = sprintf("UPDATE farmteamstandings SET Round=%s WHERE T_ID=%s",
			$tmpRound,
			$row_GetPlayoff['T_ID']
		);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
		
	
	$query_GetSchedule = sprintf("SELECT * FROM farmschedule WHERE Season_ID=%s AND Day >=%s AND Day <=%s ORDER BY Day asc",
								$row_GetPlayoff['S_ID'], 
								$tmpDayStart, 
								$tmpDayEnd
								);
	$GetSchedule= mysql_query($query_GetSchedule, $connection) or die(mysql_error());
	$row_GetSchedule = mysql_fetch_assoc($GetSchedule);
	$totalRows_GetSchedule = mysql_num_rows($GetSchedule);

	if($totalRows_GetSchedule > 0){
		do{
			$updateSQL = sprintf("UPDATE farmschedule SET Round=%s WHERE S_ID=%s",
				$tmpRound,
				$row_GetSchedule['S_ID']
			);
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
		} while ($row_GetSchedule = mysql_fetch_assoc($GetSchedule)); 
	}
	
	
	
	$rowCount = $rowCount - 1;
	
	
	if($rowCount == 14){
		$tmpDayStart=29;
		$tmpDayEnd=42;
		$tmpRound=$tmpRound-1;
	} else if($rowCount == 12){
		$tmpDayStart=15;
		$tmpDayEnd=28;
		$tmpRound=$tmpRound-1;
	} else if($rowCount == 8){
		$tmpDayStart=1;
		$tmpDayEnd=14;
		$tmpRound=$tmpRound-1;
	}
} while ($row_GetPlayoff = mysql_fetch_assoc($GetPlayoff)); 
}




//UPDATE TROPHIES
$upgradeSQL =  sprintf("ALTER TABLE `trophies` 
						DROP `PlayoffsChampionsDescription`,
						DROP `RegularSeasonChampionsDescription`,
						DROP `PlayoffMVPDescription`,
						DROP `TopScorerDescription`,
						DROP `MVPDescription`,
						DROP `GoalieOfTheYearDescription`,
						DROP `DefensemanOfTheYearDescription`,
						DROP `RookieOfTheYearDescription`,
						DROP `BestDefensiveForwardDescription`,
						DROP `MostSportsmanlikePlayerDescription`,
						DROP `CoachOfTheYearDescription`,
						DROP `TopGoalScorerDescription`,
						DROP `LowestGAADescription`,
						DROP `LowestPIMDescription`,
						ADD `GeneralManager` varchar(50) DEFAULT 'General Manager of the Year',
						ADD `GeneralManagerPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmPlayoffsChampions` varchar(50) DEFAULT 'League Champion',
						ADD `FarmRegularSeasonChampions` varchar(50) DEFAULT 'Best Overall Record',
						ADD `FarmPlayoffMVP` varchar(50) DEFAULT 'Most Valuable Player in the Playoffs',
						ADD `FarmTopScorer` varchar(50) DEFAULT 'Top Point Scorer in the league',
						ADD `FarmMVP` varchar(50) DEFAULT 'Most Valuable Player',
						ADD `FarmGoalieOfTheYear` varchar(50) DEFAULT 'Goalie of the Year',
						ADD `FarmDefensemanOfTheYear` varchar(50) DEFAULT 'Defenseman of the Year',
						ADD `FarmRookieOfTheYear` varchar(50) DEFAULT 'Rookie of the year',
						ADD `FarmBestDefensiveForward` varchar(50) DEFAULT 'Top Defensive Forward',
						ADD `FarmMostSportsmanlikePlayer` varchar(50) DEFAULT 'Qualities of Perseverance and Sportsmanship',
						ADD `FarmCoachOfTheYear` varchar(50) DEFAULT 'Coach of the Year',
						ADD `FarmTopGoalScorer` varchar(50) DEFAULT 'Top Goal Scorer',
						ADD `FarmLowestGAA` varchar(50) DEFAULT 'Goalie(s) With the Fewest Goals Scored Against',
						ADD `FarmLowestPIM` varchar(50) DEFAULT 'Player who Displays Gentlemanly Conduct',
						ADD `FarmPlayoffsChampionsPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmRegularSeasonChampionsPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmPlayoffMVPPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmTopScorerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmMVPPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmGoalieOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmDefensemanOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmRookieOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmBestDefensiveForwardPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmMostSportsmanlikePlayerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmCoachOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmTopGoalScorerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmLowestGAAPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
						ADD `FarmLowestPIMPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());



//RENAME TROPHYWINNERS
$upgradeSQL =  sprintf("RENAME TABLE `trophywinners` TO  `old_trophywinners`");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


//ADD TROPHYWINNERS
$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `trophywinners` (
						  `T_ID` int(75) NOT NULL AUTO_INCREMENT,
						  `PlayoffMVP` double DEFAULT NULL,
						  `TopScorer` double DEFAULT NULL,
						  `MVP` double DEFAULT NULL,
						  `GoalieOfTheYear` double DEFAULT NULL,
						  `DefensemanOfTheYear` double DEFAULT NULL,
						  `RookieOfTheYear` double DEFAULT NULL,
						  `BestDefensiveForward` double DEFAULT NULL,
						  `MostSportsmanlikePlayer` double DEFAULT NULL,
						  `CoachOfTheYear` double DEFAULT NULL,
						  `TopGoalScorer` double DEFAULT NULL,
						  `LowestGAA` double DEFAULT NULL,
						  `LowestPIM` double DEFAULT NULL,
						  `GeneralManager` varchar(50) DEFAULT NULL,
						  `FarmPlayoffMVP` double DEFAULT NULL,
						  `FarmTopScorer` double DEFAULT NULL,
						  `FarmMVP` double DEFAULT NULL,
						  `FarmGoalieOfTheYear` double DEFAULT NULL,
						  `FarmDefensemanOfTheYear` double DEFAULT NULL,
						  `FarmRookieOfTheYear` double DEFAULT NULL,
						  `FarmBestDefensiveForward` double DEFAULT NULL,
						  `FarmMostSportsmanlikePlayer` double DEFAULT NULL,
						  `FarmCoachOfTheYear` double DEFAULT NULL,
						  `FarmTopGoalScorer` double DEFAULT NULL,
						  `FarmLowestGAA` double DEFAULT NULL,
						  `FarmLowestPIM` double DEFAULT NULL,
						  `Team` double DEFAULT NULL,
						  `Season_ID` int(11) DEFAULT '0',
						  PRIMARY KEY (`T_ID`)
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$query_GetWinner = "SELECT 
					(SELECT Number FROM `proteam` WHERE Name=PlayoffsChampions) AS PlayoffsChampions,
					(SELECT Number FROM `proteam` WHERE Name=RegularSeasonChampions) AS RegularSeasonChampions,
					(SELECT Number FROM `players` WHERE Name=PlayoffMVP UNION ALL SELECT Number FROM `goalies` WHERE Name=PlayoffMVP) AS PlayoffMVP,
					(SELECT Number FROM `players` WHERE Name=TopScorer) AS TopScorer,
					(SELECT Number FROM `players` WHERE Name=MVP UNION ALL SELECT Number FROM `goalies` WHERE Name=MVP) AS MVP,
					(SELECT Number FROM `goalies` WHERE Name=GoalieOfTheYear) AS GoalieOfTheYear,
					(SELECT Number FROM `players` WHERE Name=DefensemanOfTheYear) AS DefensemanOfTheYear,
					(SELECT Number FROM `players` WHERE Name=RookieOfTheYear UNION ALL SELECT Number FROM `goalies` WHERE Name=RookieOfTheYear) AS RookieOfTheYear,
					(SELECT Number FROM `players` WHERE Name=BestDefensiveForward) AS BestDefensiveForward,
					(SELECT Number FROM `players` WHERE Name=MostSportsmanlikePlayer) AS MostSportsmanlikePlayer,
					(SELECT Number FROM `coaches` WHERE Name=CoachOfTheYear) AS CoachOfTheYear,
					(SELECT Number FROM `players` WHERE Name=TopGoalScorer) AS TopGoalScorer,
					(SELECT Number FROM `goalies` WHERE Name=LowestGAA) AS LowestGAA,
					(SELECT Number FROM `players` WHERE Name=LowestPIM) AS LowestPIM,
					(SELECT Season FROM `seasons` WHERE S_ID=Season_ID) AS Season_ID,
					Season_ID as ID
					FROM `old_trophywinners` ORDER BY ID";
$GetWinner = mysql_query($query_GetWinner, $connection) or die(mysql_error());
$row_GetWinner = mysql_fetch_assoc($GetWinner);
$totalRows_GetWinner = mysql_num_rows($GetWinner);

$updateSQL = sprintf("UPDATE proteamstandings SET StandingPlayoffTitle='E'");
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateSQL = sprintf("UPDATE proteamstandings SET PlayOffEliminated='True'");
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());


$query_GetDivisionLeader = "SELECT T_ID FROM `proteamstandings` WHERE DivisionLeader='True'";
$GetDivisionLeader = mysql_query($query_GetDivisionLeader, $connection) or die(mysql_error());
$row_GetDivisionLeader = mysql_fetch_assoc($GetDivisionLeader);
$totalRows_GetDivisionLeader = mysql_num_rows($GetDivisionLeader);
if($totalRows_GetDivisionLeader > 0){
do{
	$updateSQL = sprintf("UPDATE proteamstandings SET StandingPlayoffTitle='Y' WHERE T_ID=%s",
			$row_GetDivisionLeader['T_ID']
	);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetDivisionLeader = mysql_fetch_assoc($GetDivisionLeader)); 
}

$updateSQL = sprintf("UPDATE farmteamstandings SET StandingPlayoffTitle='E'");
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$updateSQL = sprintf("UPDATE farmteamstandings SET PlayOffEliminated='True'");
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

$query_GetDivisionLeader = "SELECT T_ID FROM `farmteamstandings` WHERE DivisionLeader='True'";
$GetDivisionLeader = mysql_query($query_GetDivisionLeader, $connection) or die(mysql_error());
$row_GetDivisionLeader = mysql_fetch_assoc($GetDivisionLeader);
$totalRows_GetDivisionLeader = mysql_num_rows($GetDivisionLeader);
if($totalRows_GetDivisionLeader > 0){
do{
	$updateSQL = sprintf("UPDATE farmteamstandings SET StandingPlayoffTitle='Y' WHERE T_ID=%s",
			$row_GetDivisionLeader['T_ID']
	);
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
} while ($row_GetDivisionLeader = mysql_fetch_assoc($GetDivisionLeader)); 
}

if($totalRows_GetWinner > 0){
do{
	$query_GetPlayoffID = sprintf("SELECT S_ID as ID FROM seasons WHERE Season=%s AND SeasonType=0",
			substr($row_GetWinner['Season_ID'],0,4));
	$GetPlayoffID = mysql_query($query_GetPlayoffID, $connection) or die(mysql_error());
	$row_GetPlayoffID = mysql_fetch_assoc($GetPlayoffID);
	
	if($row_GetWinner['RegularSeasonChampions'] > 0){
		$updateSQL = sprintf("UPDATE proteamstandings SET StandingPlayoffTitle='Z' WHERE Number=%s AND Season_ID=%s",
				$row_GetWinner['RegularSeasonChampions'],
				$row_GetWinner['ID']
		);
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
	
	if($row_GetWinner['PlayoffsChampions'] > 0){
		$updateSQL = sprintf("UPDATE proteamstandings SET PlayOffEliminated='False' WHERE Number=%s AND Season_ID=%s",
				$row_GetWinner['PlayoffsChampions'],
				$row_GetPlayoffID['ID']
		);
		$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	}
	
	$insertSQL = sprintf("INSERT INTO trophywinners (`PlayoffMVP`, `TopScorer`, `MVP`, `GoalieOfTheYear`, `DefensemanOfTheYear`, `RookieOfTheYear`, `BestDefensiveForward`, `MostSportsmanlikePlayer`, `CoachOfTheYear`, `TopGoalScorer`, `LowestGAA`, `LowestPIM`, `Season_ID`, `Team`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 0)",
			GetSQLValueString($row_GetWinner['PlayoffMVP'], "int"),
			GetSQLValueString($row_GetWinner['TopScorer'], "int"),
			GetSQLValueString($row_GetWinner['MVP'], "int"),
			GetSQLValueString($row_GetWinner['GoalieOfTheYear'], "int"),
			GetSQLValueString($row_GetWinner['DefensemanOfTheYear'], "int"),
			GetSQLValueString($row_GetWinner['RookieOfTheYear'], "int"),
			GetSQLValueString($row_GetWinner['BestDefensiveForward'], "int"),
			GetSQLValueString($row_GetWinner['MostSportsmanlikePlayer'], "int"),
			GetSQLValueString($row_GetWinner['CoachOfTheYear'], "int"),
			GetSQLValueString($row_GetWinner['TopGoalScorer'], "int"),
			GetSQLValueString($row_GetWinner['LowestGAA'], "int"),
			GetSQLValueString($row_GetWinner['LowestPIM'], "int"),
			GetSQLValueString(substr($row_GetWinner['Season_ID'],0,4), "int")
		);
	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
		$insertSQL = sprintf("INSERT INTO trophywinners (`Season_ID`, `Team`) VALUES (%s, %s)",
				substr($row_GetWinner['Season_ID'],0,4),
				$_SESSION['MenuTeamsID'][$TeamPage]
			);
		$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	}

} while ($row_GetWinner = mysql_fetch_assoc($GetWinner)); 
}

//DROP OLD_WINNERS
$upgradeSQL =  sprintf("DROP TABLE `old_trophywinners`;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

//ADD WAIVER DRAFT, WAIVER PICKS

$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `waiver_draft` (
						  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
						  `DraftName` varchar(50) DEFAULT NULL,
						  `DraftPickTime` int(11) DEFAULT '10',
						  `Round` int(11) DEFAULT '5',
						  `DraftStatus` varchar(5) DEFAULT 'False',
						  `Season_ID` int(11) DEFAULT '0',
						  PRIMARY KEY (`D_ID`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());
						
						
$upgradeSQL =  sprintf("CREATE TABLE IF NOT EXISTS `waiver_draftpicks` (
						  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
						  `Draft_ID` int(11) DEFAULT NULL,
						  `TeamName` varchar(32) DEFAULT NULL,
						  `Round` int(11) DEFAULT NULL,
						  `Name` varchar(50) DEFAULT '',
						  `DraftList` varchar(50) DEFAULT NULL,
						  `DateCreated` datetime DEFAULT NULL,
						  `Overall` int(11) DEFAULT NULL,
						  PRIMARY KEY (`D_ID`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());

?>