--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Headline` varchar(255) DEFAULT NULL,
  `Content` text,
  `Summary` varchar(255) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Team` double DEFAULT '0' NULL,
  `DateCreated` date DEFAULT NULL,
  `League` varchar(5) NOT NULL DEFAULT 'True',
  PRIMARY KEY (`A_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE IF NOT EXISTS `coaches` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `Country` varchar(32) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `PH` double DEFAULT NULL,
  `DF` double DEFAULT NULL,
  `OF` double DEFAULT NULL,
  `PD` double DEFAULT NULL,
  `EX` double DEFAULT NULL,
  `LD` double DEFAULT NULL,
  `PO` double DEFAULT NULL,
  `Contract` double DEFAULT NULL,
  `Salary` decimal(10,0) DEFAULT NULL,
  `Photo` varchar(36) DEFAULT NULL,
  `Bio` text,
  `Retired` double NULL DEFAULT '0',
  `DateCreated` date DEFAULT NULL,
  `FarmPro` varchar(5) DEFAULT 'Pro',
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
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
ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coachestats`
--

CREATE TABLE IF NOT EXISTS `coachestats` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `gmstats` (
  `G_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
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
  PRIMARY KEY (`G_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `A_ID` int(11) NOT NULL DEFAULT '0',
  `Parent_ID` int(11) NOT NULL DEFAULT '0',
  `Team` int(11) NOT NULL,
  `DateCreated` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateModified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Comment` text DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE `chat` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `from` VARCHAR(255) NOT NULL DEFAULT '',
  `to` VARCHAR(255) NOT NULL DEFAULT '',
  `message` TEXT NOT NULL,
  `sent` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
 INDEX `to` (`to`),
 INDEX `from` (`from`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `LastModifiedPlayers` date DEFAULT NULL,
  `TinyLeagueImage` varchar(35) DEFAULT NULL,
  `SmallFarmLeagueLogo` varchar(50) DEFAULT NULL,
  `SmallLeagueLogo` varchar(50) DEFAULT NULL,
  `DisplayOffers` int(11) DEFAULT NULL,
  `LastModifiedCoaches` date DEFAULT NULL,
  `LastModifiedProTeams` date DEFAULT NULL,
  `LastModifiedProspects` date DEFAULT NULL,
  `LastModifiedGoalies` date DEFAULT NULL,
  `LastModifiedSchedule` date DEFAULT NULL,
  `LastModifiedFarmSchedule` date DEFAULT NULL,
  `LastModifiedTodaysGames` date DEFAULT NULL,
  `LastModifiedDraftLog` date DEFAULT NULL,
  `LastModifiedDraftPicks` date DEFAULT NULL,
  `LastModifiedWaivers` date DEFAULT NULL,
  `LastModifiedLeague` date DEFAULT NULL,
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
  `LeagueFile` varchar(36) DEFAULT NULL,
  `HeaderImage` varchar(36) DEFAULT NULL,
  `FarmHeaderImage` varchar(36) DEFAULT NULL,
  `LastModifiedLeagueFile` date DEFAULT NULL,
  `DraftPicks` int(2) DEFAULT '4',
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
  `TimeZone` varchar(50) DEFAULT 'TZ=Canada/Atlantic',
  `MaxContract` int(11) NOT NULL DEFAULT '4',
  `ContractVary` int(11) NOT NULL DEFAULT '1',
  `GameResultForward` int(11) NOT NULL DEFAULT '1',
  `Version` varchar(5) DEFAULT '3.0',
  `WaiverAgeExemption` int(11) NOT NULL DEFAULT '27',
  `WaiverSalaryExemption` int(11) NOT NULL DEFAULT '1500000',
  `WaiverMinimumGames` int(11) NOT NULL DEFAULT '10',
  `WaiverDuration` int(11) NOT NULL DEFAULT '2',
  `DraftYear` int(11) DEFAULT '1',
  `ConsecutiveDays` int(11) DEFAULT '1',
  `FavIcon` varchar(36) DEFAULT NULL,
  `TouchIcon` varchar(36) DEFAULT NULL,
  `DateFormat` varchar(10) DEFAULT 'mm/dd/yyyy',
  `TradeYears` int(2) NOT NULL DEFAULT '5',
  `AvgerageSalary` int(11) NOT NULL DEFAULT '2500000'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


insert  into `config`
(`TinyLeagueImage`,
`SmallFarmLeagueLogo`,
`SmallLeagueLogo`,
`DisplayOffers`,
`DisplayOV`,
`ContractExtensionFormula`,
`RFA`,
`UFA`,
`RecoveryRate`,
`SalaryCap`,
`MinimumSalaryCap`,
`FarmSalaryPercentage`,
`MaximumPlayerSalary`,
`MinimumPlayerSalary`,
`LeagueFile`,
`HeaderImage`,
`FarmHeaderImage`,
`LastModifiedLeagueFile`,
`DraftPicks`,
`RulesFile`,
`RichTextEditor`,
`FarmLeague`,
`JuniorLeague`,
`DivisionLeader`,
`PayrollCoach`,
`PayrollFarm`,
`LeagueLogo`,
`FarmLeagueLogo`,
`LeagueColor`,
`FarmLeagueColor`,
`PlayerAI`,
`TradeDeadlineDay`,
`TimeZone`,
`MaxContract`,
`ContractVary`,
`GameResultForward`,
`DraftYear`) 
values 
('DefaultLogoTiny.jpg',
'DefaultLogoTiny.jpg',
'DefaultLogoTiny.jpg',
1,
1,
1,
26,
27,
1,
58000000,
42000000,
'0.1',
11000000,
550000,
'',
'DefaultHeaderImage.jpg',
'DefaultHeaderImage.jpg',
'2010-01-01',
5,
'',
1,
'True',
'False',
'True',
'False',
'False',
'DefaultLogoSmall.jpg',
'DefaultLogoSmall.jpg',
'000000', 
'000000', 
'True',
1,
'TZ=Canada/Atlantic',
10,
1,
1,
2011);

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE IF NOT EXISTS `draft` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DraftName` varchar(50) DEFAULT NULL,
  `DraftPickTime` int(11) DEFAULT '10',
  `DraftType` varchar(15) DEFAULT 'Prospect',
  `DraftStatus` varchar(5) DEFAULT 'False',
  `Season_ID` int(11) DEFAULT '0',
  `Year` int(11) NOT NULL DEFAULT '0',
  `LotteryWinner` int(11) DEFAULT NULL,
  PRIMARY KEY `D_ID` (`D_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `draftpicks`
--

CREATE TABLE IF NOT EXISTS `draftpicks` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `TeamName` varchar(32) DEFAULT NULL,
  `Round` int(11) DEFAULT NULL,
  `OwnBy` varchar(32) DEFAULT NULL,
  `Name` varchar(50) DEFAULT '',
  `DraftList` text DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Overall` int(11) DEFAULT NULL,
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmschedule`
--

CREATE TABLE IF NOT EXISTS `farmschedule` (
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
  `Round` double DEFAULT '0',
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmteam`
--

CREATE TABLE IF NOT EXISTS `farmteam` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Abbre` char(3) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Division` varchar(75) DEFAULT NULL,
  `Conference` varchar(75) DEFAULT NULL,
  `LogoSmall` varchar(32) DEFAULT NULL,
  `LogoLarge` varchar(32) DEFAULT NULL,
  `HeaderImage` varchar(32) DEFAULT NULL,
  `JerseyHome` varchar(50) DEFAULT NULL,
  `JerseyAway` varchar(50) DEFAULT NULL,
  `PrimaryColor` varchar(6) DEFAULT NULL,
  `SecondaryColor` varchar(6) DEFAULT NULL,
  `TextColor` varchar(6) NOT NULL DEFAULT '000000',
  `LogoTiny` varchar(32) DEFAULT NULL,
  `ProTeamName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmteamstandings`
--

CREATE TABLE IF NOT EXISTS `farmteamstandings` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DivisionLeader` varchar(5) DEFAULT 'False',
  `Name` varchar(30) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Season_ID` int(30) DEFAULT NULL,
  `Captain` int(11) DEFAULT NULL,
  `Assistant1` int(11) DEFAULT NULL,
  `Assistant2` int(11) DEFAULT NULL,
  `Payroll` double DEFAULT NULL,
  `TotalPlayersSalaries` int(11) DEFAULT '0',
  `ExpensePerDay` int(11) DEFAULT '0',
  `CoachID` int(11) DEFAULT NULL,
  `ScheduleGameInAYear` double DEFAULT NULL,
  `Morale` double DEFAULT NULL,
  `PlayOffEliminated` varchar(5) DEFAULT NULL,
  `PowerRanking` double DEFAULT NULL,
  `PlayOffWinRound` double DEFAULT NULL,
  `StandingPlayoffTitle` varchar(6) DEFAULT NULL,
  `Streak` varchar(6) DEFAULT NULL,
  `Last10W` double DEFAULT NULL,
  `Last10L` double DEFAULT NULL,
  `Last10T` double DEFAULT NULL,
  `Last10OTW` double DEFAULT NULL,
  `Last10OTL` double DEFAULT NULL,
  `Last10SOW` double DEFAULT NULL,
  `Last10SOL` double DEFAULT NULL,
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
  `PuckTimeInZoneDF` int(11) DEFAULT NULL,
  `PuckTimeInZoneOF` int(11) DEFAULT NULL,
  `PuckTimeInZoneNT` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneDF` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneOF` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneNT` int(11) DEFAULT NULL,
  `Shutouts` double DEFAULT NULL,
  `Goals` double DEFAULT NULL,
  `Assists` double DEFAULT NULL,
  `TotalPoint` double DEFAULT NULL,
  `Pim` double DEFAULT NULL,
  `Hits` double DEFAULT NULL,
  `FaceOffWonOF` double DEFAULT NULL,
  `FaceOffWonDF` double DEFAULT NULL,
  `FaceOffWonNT` double DEFAULT NULL,
  `FaceOffTotalOF` double DEFAULT NULL,
  `FaceOffTotalDF` double DEFAULT NULL,
  `FaceOffTotalNT` double DEFAULT NULL,
  `EmptyNetGoal` double DEFAULT NULL,
  `TicketPrice1` decimal(10,0) DEFAULT NULL,
  `TicketPrice2` decimal(10,0) DEFAULT NULL,
  `Attendance1` int(11) DEFAULT NULL,
  `Attendance2` int(11) DEFAULT NULL,
  `ArenaCapacity1` int(11) DEFAULT NULL,
  `ArenaCapacity2` int(11) DEFAULT NULL,
  `SeasonTicketPCT` double DEFAULT NULL,
  `TotalAttendance` int(11) DEFAULT NULL,
  `TotalIncome` decimal(10,0) DEFAULT NULL,
  `ProTeamName` varchar(50) DEFAULT NULL,
  `Round` double DEFAULT '0',
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `goalies`
--

CREATE TABLE IF NOT EXISTS `goalies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) DEFAULT NULL,
  `Country` char(3) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `AgeDate` varchar(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Height` double DEFAULT NULL,
  `Contract` double DEFAULT NULL,
  `Rookie` varchar(5) DEFAULT NULL,
  `Protected` varchar(5) DEFAULT NULL,
  `AvailableforTrade` varchar(5) DEFAULT NULL,
  `NoApplyRerate` varchar(5) DEFAULT NULL,
  `NoTrade` varchar(5) DEFAULT NULL,
  `CanPlayPro` varchar(5) DEFAULT NULL,
  `CanPlayFarm` varchar(5) DEFAULT NULL,
  `ForceWaiver` varchar(5) DEFAULT NULL,
  `StarPower` varchar(5) DEFAULT NULL,
  `Salary1` decimal(10,0) DEFAULT NULL,
  `Salary2` decimal(10,0) DEFAULT NULL,
  `Salary3` decimal(10,0) DEFAULT NULL,
  `Salary4` decimal(10,0) DEFAULT NULL,
  `Salary5` decimal(10,0) DEFAULT NULL,
  `Salary6` decimal(10,0) DEFAULT NULL,
  `Salary7` decimal(10,0) DEFAULT NULL,
  `Salary8` decimal(10,0) DEFAULT NULL,
  `Salary9` decimal(10,0) DEFAULT NULL,
  `Salary10` decimal(10,0) DEFAULT NULL,
  `Injury` varchar(35) DEFAULT NULL,
  `NumberOfInjury` double DEFAULT NULL,
  `CON` int(11) DEFAULT '100',
  `Suspension` double DEFAULT NULL,
  `Status1` double DEFAULT NULL,
  `Status2` double DEFAULT NULL,
  `Status3` double DEFAULT NULL,
  `Status4` double DEFAULT NULL,
  `Status5` double DEFAULT NULL,
  `Status6` double DEFAULT NULL,
  `Status7` double DEFAULT NULL,
  `Status8` double DEFAULT NULL,
  `Status9` double DEFAULT NULL,
  `Status10` double DEFAULT NULL,
  `SK` double DEFAULT NULL,
  `DU` double DEFAULT NULL,
  `EN` double DEFAULT NULL,
  `SZ` double DEFAULT NULL,
  `AG` double DEFAULT NULL,
  `RB` double DEFAULT NULL,
  `SC` double DEFAULT NULL,
  `HS` double DEFAULT NULL,
  `RT` double DEFAULT NULL,
  `PC` double DEFAULT NULL,
  `PS` double DEFAULT NULL,
  `EX` double DEFAULT NULL,
  `LD` double DEFAULT NULL,
  `MO` double DEFAULT NULL,
  `PO` double DEFAULT NULL,
  `Overall` double DEFAULT NULL,
  `Team` int(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Photo` varchar(32) DEFAULT NULL,
  `Position` double DEFAULT '5',
  `DateCreated` date DEFAULT NULL,
  `BIO` text,
  `URLLink` varchar(255) DEFAULT NULL,
  `ExcludeFromPayroll` varchar(5) DEFAULT NULL,
  `UniformNumber` int(11) NOT NULL DEFAULT '0',
  `Retired` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `League` varchar(50) NOT NULL,
  `URL` varchar(255) NOT NULL DEFAULT 'http://',
  `Icon` varchar(50) DEFAULT NULL,
  `EnableFeed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `goaliestats`
--

CREATE TABLE IF NOT EXISTS `goaliestats` (
  `STAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Season_ID` int(11) DEFAULT NULL,
  `ProGP` double DEFAULT NULL,
  `ProMinPlay` double DEFAULT NULL,
  `ProW` double DEFAULT NULL,
  `ProL` double DEFAULT NULL,
  `ProOTL` double DEFAULT NULL,
  `ProShootout` double DEFAULT NULL,
  `ProShutouts` double DEFAULT NULL,
  `ProGA` double DEFAULT NULL,
  `ProSA` double DEFAULT NULL,
  `ProSARebound` double DEFAULT NULL,
  `ProPim` double DEFAULT NULL,
  `ProA` double DEFAULT NULL,
  `ProPenalityShotsShots` double DEFAULT NULL,
  `ProPenalityShotsGoals` double DEFAULT NULL,
  `ProStartGoaler` double DEFAULT NULL,
  `ProBackupGoaler` double DEFAULT NULL,
  `ProEmptyNetGoal` double DEFAULT NULL,
  `ProStar1` double DEFAULT NULL,
  `ProStar2` double DEFAULT NULL,
  `ProStar3` double DEFAULT NULL,
  `ProStarPower7Days` int(11) DEFAULT '0',
  `ProStarPower30Days` int(11) DEFAULT '0',
  `ProStarPowerYear` int(11) DEFAULT '0',
  `FarmGP` double DEFAULT NULL,
  `FarmMinPlay` double DEFAULT NULL,
  `FarmW` double DEFAULT NULL,
  `FarmL` double DEFAULT NULL,
  `FarmOTL` double DEFAULT NULL,
  `FarmShootout` double DEFAULT NULL,
  `FarmShutouts` double DEFAULT NULL,
  `FarmGA` double DEFAULT NULL,
  `FarmSA` double DEFAULT NULL,
  `FarmSARebound` double DEFAULT NULL,
  `FarmPim` double DEFAULT NULL,
  `FarmA` double DEFAULT NULL,
  `FarmPenalityShotsShots` double DEFAULT NULL,
  `FarmPenalityShotsGoals` double DEFAULT NULL,
  `FarmStartGoaler` double DEFAULT NULL,
  `FarmBackupGoaler` double DEFAULT NULL,
  `FarmEmptyNetGoal` double DEFAULT NULL,
  `FarmStar1` double DEFAULT NULL,
  `FarmStar2` double DEFAULT NULL,
  `FarmStar3` double DEFAULT NULL,
  `FarmStarPower7Days` int(11) DEFAULT '0',
  `FarmStarPower30Days` int(11) DEFAULT '0',
  `FarmStarPowerYear` int(11) DEFAULT '0',
  `Team` varchar(32) DEFAULT NULL,
  `Active` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`STAT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `M_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sender_U_ID` int(11) DEFAULT '0',
  `Receiver_U_ID` int(11) DEFAULT '0',
  `Title` varchar(100) DEFAULT NULL,
  `Content` text,
  `DateCreated` datetime DEFAULT NULL,
  `Viewed` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`M_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` date DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  `Season_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY `T_ID` (`T_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) DEFAULT NULL,
  `Country` char(3) DEFAULT NULL,
  `Age` double DEFAULT NULL,
  `AgeDate` varchar(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Height` double DEFAULT NULL,
  `Position` double DEFAULT NULL,
  `PosC` char(5) DEFAULT NULL,
  `PosLW` char(5) DEFAULT NULL,
  `PosRW` char(5) DEFAULT NULL,
  `PosD` char(5) DEFAULT NULL,
  `Contract` double DEFAULT NULL,
  `Rookie` varchar(5) DEFAULT 'False',
  `Protected` varchar(5) DEFAULT NULL,
  `AvailableforTrade` varchar(5) DEFAULT 'False',
  `NoApplyRerate` varchar(5) DEFAULT NULL,
  `NoTrade` varchar(5) DEFAULT NULL,
  `CanPlayPro` char(5) DEFAULT NULL,
  `CanPlayFarm` char(5) DEFAULT NULL,
  `ForceWaiver` char(5) DEFAULT NULL,
  `StarPower` double DEFAULT NULL,
  `Salary1` decimal(10,0) DEFAULT NULL,
  `Salary2` decimal(10,0) DEFAULT NULL,
  `Salary3` decimal(10,0) DEFAULT NULL,
  `Salary4` decimal(10,0) DEFAULT NULL,
  `Salary5` decimal(10,0) DEFAULT NULL,
  `Salary6` decimal(10,0) DEFAULT NULL,
  `Salary7` decimal(10,0) DEFAULT NULL,
  `Salary8` decimal(10,0) DEFAULT NULL,
  `Salary9` decimal(10,0) DEFAULT NULL,
  `Salary10` decimal(10,0) DEFAULT NULL,
  `Injury` varchar(75) DEFAULT NULL,
  `NumberOfInjury` double DEFAULT NULL,
  `CON` int(11) DEFAULT NULL,
  `Suspension` double DEFAULT NULL,
  `Status0` double DEFAULT NULL,
  `Status1` double DEFAULT NULL,
  `Status2` double DEFAULT NULL,
  `Status3` double DEFAULT NULL,
  `Status4` double DEFAULT NULL,
  `Status5` double DEFAULT NULL,
  `Status6` double DEFAULT NULL,
  `Status7` double DEFAULT NULL,
  `Status8` double DEFAULT NULL,
  `Status9` double DEFAULT NULL,
  `CK` double DEFAULT NULL,
  `FG` double DEFAULT NULL,
  `DI` double DEFAULT NULL,
  `SK` double DEFAULT NULL,
  `ST` double DEFAULT NULL,
  `EN` double DEFAULT NULL,
  `DU` double DEFAULT NULL,
  `PH` double DEFAULT NULL,
  `FO` double DEFAULT NULL,
  `PA` double DEFAULT NULL,
  `SC` double DEFAULT NULL,
  `DF` double DEFAULT NULL,
  `PS` double DEFAULT NULL,
  `EX` double DEFAULT NULL,
  `LD` double DEFAULT NULL,
  `MO` double DEFAULT NULL,
  `PO` double DEFAULT NULL,
  `Overall` double DEFAULT NULL,
  `Team` int(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Photo` varchar(32) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `BIO` text DEFAULT NULL,
  `URLLINK` varchar(255) DEFAULT NULL,
  `UniformNumber` int(11) NOT NULL DEFAULT '0',
  `Retired` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `playerscontractoffers`
--

CREATE TABLE IF NOT EXISTS `playerscontractoffers` (
  `PR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Player` varchar(50) DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  `Team` int(32) DEFAULT '0',
  `DateCreated` datetime DEFAULT NULL,
  `Contract` double DEFAULT NULL,
  `Salary1` int(11) DEFAULT '0',
  `Salary2` int(11) DEFAULT NULL,
  `Salary3` int(11) DEFAULT NULL,
  `Salary4` int(11) DEFAULT NULL,
  `Salary5` int(11) DEFAULT NULL,
  `Salary6` int(11) DEFAULT NULL,
  `Salary7` int(11) DEFAULT NULL,
  `Salary8` int(11) DEFAULT NULL,
  `Salary9` int(11) DEFAULT NULL,
  `Salary10` int(11) DEFAULT NULL,
  `Approved` varchar(8) DEFAULT 'False',
  `Compensation` varchar(75) DEFAULT NULL,
  `NoTradeSalary` int(11) DEFAULT '0',
  `NoTrade` int(11) DEFAULT '0',
  `bonus` int(11) DEFAULT '0',
  `ContractType` int(11) DEFAULT '0',
  `FarmPro` varchar(5) DEFAULT 'Pro',
  PRIMARY KEY (`PR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `playerschangerequest`
--

CREATE TABLE IF NOT EXISTS `playerschangerequest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Request` text,
  `URL` varchar(255) DEFAULT NULL,
  `Team` varchar(32) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `playersextensionoffers`
--

CREATE TABLE IF NOT EXISTS `playersextensionoffers` (
  `PR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(11) DEFAULT '2008-2009',
  `Player` varchar(50) DEFAULT NULL,
  `Team` int(11) DEFAULT '0',
  `Attempt` int(11) DEFAULT '0',
  `DateCreated` date DEFAULT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'Extension',
  PRIMARY KEY (`PR_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `playerstats`
--

CREATE TABLE IF NOT EXISTS `playerstats` (
  `STAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Number` double DEFAULT NULL,
  `Season_ID` int(11) DEFAULT NULL,
  `ProGP` double DEFAULT NULL,
  `ProShots` double DEFAULT NULL,
  `ProG` double DEFAULT NULL,
  `ProA` double DEFAULT NULL,
  `ProPoint` double DEFAULT NULL,
  `ProPlusMinus` double DEFAULT NULL,
  `ProPim` double DEFAULT NULL,
  `Pro5Pim` double DEFAULT NULL,
  `ProShotsBlock` double DEFAULT NULL,
  `ProOwnShotsBlock` double DEFAULT NULL,
  `ProOwnShotsMissGoals` double DEFAULT NULL,
  `ProHits` double DEFAULT NULL,
  `ProHitsTook` double DEFAULT NULL,
  `ProGW` double DEFAULT NULL,
  `ProGT` double DEFAULT NULL,
  `ProFaceOffWon` double DEFAULT NULL,
  `ProFaceOffTotal` double DEFAULT NULL,
  `ProPenalityShotsScore` double DEFAULT NULL,
  `ProPenalityShotsTotal` double DEFAULT NULL,
  `ProEmptyNetGoal` double DEFAULT NULL,
  `ProMinutePlay` double DEFAULT NULL,
  `ProHatTrick` double DEFAULT NULL,
  `ProPPG` double DEFAULT NULL,
  `ProPPA` double DEFAULT NULL,
  `ProPPShots` double DEFAULT NULL,
  `ProPPMinutePlay` double DEFAULT NULL,
  `ProPKG` double DEFAULT NULL,
  `ProPKA` double DEFAULT NULL,
  `ProPKShots` double DEFAULT NULL,
  `ProPKMinutePlay` double DEFAULT NULL,
  `ProGiveAway` double DEFAULT NULL,
  `ProTakeAway` double DEFAULT NULL,
  `ProPuckPossesionTime` double DEFAULT NULL,
  `ProFightW` double DEFAULT NULL,
  `ProFightL` double DEFAULT NULL,
  `ProFightT` double DEFAULT NULL,
  `ProStar1` double DEFAULT NULL,
  `ProStar2` double DEFAULT NULL,
  `ProStar3` double DEFAULT NULL,
  `ProStarPower7Days` int(11) DEFAULT '0',
  `ProStarPower30Days` int(11) DEFAULT '0',
  `ProStarPowerYear` int(11) DEFAULT '0',
  `FarmGP` double DEFAULT NULL,
  `FarmShots` double DEFAULT NULL,
  `FarmG` double DEFAULT NULL,
  `FarmA` double DEFAULT NULL,
  `FarmPoint` double DEFAULT NULL,
  `FarmPlusMinus` double DEFAULT NULL,
  `FarmPim` double DEFAULT NULL,
  `Farm5Pim` double DEFAULT NULL,
  `FarmShotsBlock` double DEFAULT NULL,
  `FarmOwnShotsBlock` double DEFAULT NULL,
  `FarmOwnShotsMissGoals` double DEFAULT NULL,
  `FarmHits` double DEFAULT NULL,
  `FarmHitsTook` double DEFAULT NULL,
  `FarmGW` double DEFAULT NULL,
  `FarmGT` double DEFAULT NULL,
  `FarmFaceOffWon` double DEFAULT NULL,
  `FarmFaceOffTotal` double DEFAULT NULL,
  `FarmPenalityShotsScore` double DEFAULT NULL,
  `FarmPenalityShotsTotal` double DEFAULT NULL,
  `FarmEmptyNetGoal` double DEFAULT NULL,
  `FarmMinutePlay` double DEFAULT NULL,
  `FarmHatTrick` double DEFAULT NULL,
  `FarmPPG` double DEFAULT NULL,
  `FarmPPA` double DEFAULT NULL,
  `FarmPPShots` double DEFAULT NULL,
  `FarmPPMinutePlay` double DEFAULT NULL,
  `FarmPKG` double DEFAULT NULL,
  `FarmPKA` double DEFAULT NULL,
  `FarmPKShots` double DEFAULT NULL,
  `FarmPKMinutePlay` double DEFAULT NULL,
  `FarmGiveAway` double DEFAULT NULL,
  `FarmTakeAway` double DEFAULT NULL,
  `FarmPuckPossesionTime` double DEFAULT NULL,
  `FarmFightW` double DEFAULT NULL,
  `FarmFightL` double DEFAULT NULL,
  `FarmFightT` double DEFAULT NULL,
  `FarmStar1` double DEFAULT NULL,
  `FarmStar2` double DEFAULT NULL,
  `FarmStar3` double DEFAULT NULL,
  `FarmStarPower7Days` int(11) DEFAULT '0',
  `FarmStarPower30Days` int(11) DEFAULT '0',
  `FarmStarPowerYear` int(11) DEFAULT '0',
  `GameInRowWithAGoal` double DEFAULT NULL,
  `GameInRowWithAPoint` double DEFAULT NULL,
  `GameInRowWithOutAPoint` double DEFAULT NULL,
  `GameInRowWithOutAGoal` double DEFAULT NULL,
  `ExcludeFromPayroll` varchar(5) DEFAULT NULL,
  `Team` int(32) DEFAULT NULL,
  `RequestedTeams` varchar(24) DEFAULT '0',
  `Active` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`STAT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE IF NOT EXISTS `prospects` (
  `TeamNumber` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) DEFAULT NULL,
  `Photo` varchar(36) DEFAULT NULL,
  `P_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProspectGrade` decimal(4,1) DEFAULT NULL,
  `ProspectLevel` varchar(1) DEFAULT NULL,
  `Position` varchar(1) DEFAULT NULL,
  `Bio` text,
  `DraftYear` char(4) DEFAULT NULL,
  `OverallPick` int(11) NOT NULL DEFAULT '0',
  `DateCreated` date DEFAULT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proteam`
--

CREATE TABLE IF NOT EXISTS `proteam` (
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
  `JerseyHome` varchar(50) DEFAULT NULL,
  `JerseyAway` varchar(50) DEFAULT NULL,
  `LogoNav` varchar(35) DEFAULT NULL,
  `PrimaryColor` varchar(6) DEFAULT NULL,
  `SecondaryColor` varchar(6) DEFAULT NULL,
  `TextColor` varchar(6) NOT NULL DEFAULT '000000',
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
  `LastVisit` datetime DEFAULT NULL,
  `REMOTE_ADDR` varchar(16) DEFAULT '1.1.1.1',
  `AwayActive` varchar(5) DEFAULT 'False',
  `Awayleave` date DEFAULT NULL,
  `AwayReturn` date DEFAULT NULL,
  `AwayNote` text,
  `oauth_uid` varchar(15) DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `post_game_results` varchar(5) DEFAULT 'False',
  `post_approvals` varchar(5) DEFAULT 'False',
  `forward_messages` varchar(5) DEFAULT 'False',
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `proteamstandings`
--

CREATE TABLE IF NOT EXISTS `proteamstandings` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Number` int(30) DEFAULT NULL,
  `Season_ID` int(30) DEFAULT NULL,
  `Captain` int(11) DEFAULT NULL,
  `Assistant1` int(11) DEFAULT NULL,
  `Assistant2` int(11) DEFAULT NULL,
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
  `PuckTimeInZoneDF` int(11) DEFAULT NULL,
  `PuckTimeInZoneOF` int(11) DEFAULT NULL,
  `PuckTimeInZoneNT` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneDF` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneOF` int(11) DEFAULT NULL,
  `PuckTimeControlinZoneNT` int(11) DEFAULT NULL,
  `Shutouts` double DEFAULT NULL,
  `Goals` double DEFAULT NULL,
  `Assists` double DEFAULT NULL,
  `Points` double DEFAULT NULL,
  `Pim` double DEFAULT NULL,
  `TotalPoint` double DEFAULT NULL,
  `Hits` double DEFAULT NULL,
  `FaceOffWonOF` double DEFAULT NULL,
  `FaceOffWonDF` double DEFAULT NULL,
  `FaceOffWonNT` double DEFAULT NULL,
  `FaceOffTotalOF` double DEFAULT NULL,
  `FaceOffTotalDF` double DEFAULT NULL,
  `FaceOffTotalNT` double DEFAULT NULL,
  `EmptyNetGoal` double DEFAULT NULL,
  `SeasonTicketPCT` double DEFAULT NULL,
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
  `Payroll` int(11) DEFAULT '0',
  `TotalPlayersSalaries` int(11) DEFAULT '0',
  `ExpensePerDay` int(11) DEFAULT '0',
  `GamesRemaining` double DEFAULT NULL,
  `ExpensesPerGame` int(11) DEFAULT '0',
  `EstimatedSeasonExpenses` int(11) DEFAULT '0',
  `CurrentFunds` varchar(12) DEFAULT NULL,
  `CoachID` int(11) DEFAULT NULL,
  `ScheduleGameInAYear` double DEFAULT NULL,
  `PlayOffEliminated` varchar(5) DEFAULT NULL,
  `PowerRanking` double DEFAULT NULL,
  `LinesLoad` double DEFAULT NULL,
  `PlayOffWinRound` double DEFAULT NULL,
  `LuxuryTaxeTotal` double DEFAULT NULL,
  `StandingPlayoffTitle` varchar(5) DEFAULT NULL,
  `Streak` varchar(6) DEFAULT NULL,
  `Last10W` double DEFAULT NULL,
  `Last10L` double DEFAULT NULL,
  `Last10T` double DEFAULT NULL,
  `Last10OTW` double DEFAULT NULL,
  `Last10OTL` double DEFAULT NULL,
  `Last10SOW` double DEFAULT NULL,
  `Last10SOL` double DEFAULT NULL,
  `ProjectedBankAccount` varchar(12) DEFAULT NULL,
  `DivisionLeader` varchar(5) DEFAULT 'False',
  `Round` double DEFAULT '0',
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rivalry`
--

CREATE TABLE IF NOT EXISTS `rivalry` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` datetime DEFAULT NULL,
  `Team1` varchar(50) DEFAULT NULL,
  `Team2` varchar(50) DEFAULT NULL,
  `Team1Approved` varchar(8) DEFAULT '0',
  `Team2Approved` varchar(8) DEFAULT '0',
  `CommishApproved` varchar(8) DEFAULT '0',
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
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
  `Round` double DEFAULT '0',
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
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
  `FarmSchedule` varchar(35) DEFAULT NULL,
  `TodaysGames` varchar(35) DEFAULT NULL,
  `Waivers` varchar(35) DEFAULT NULL,
  `Coaches` varchar(35) DEFAULT NULL,
  `Prospects` varchar(35) DEFAULT NULL,
  `DraftPicks` varchar(35) DEFAULT NULL,
  `TeamHistory` varchar(35) DEFAULT NULL,
  `Transactions` varchar(35) DEFAULT NULL,
  `LeagueOptions` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuslog`
--

CREATE TABLE IF NOT EXISTS `statuslog` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Position` int(11) DEFAULT '1',
  `DateCreated` date DEFAULT NULL,
  `StatusAction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teamhistory`
--

CREATE TABLE IF NOT EXISTS `teamhistory` (
  `ID` int(11) DEFAULT '0',
  `Season_ID` int(11) DEFAULT '0',
  `Team` varchar(32) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todaysgame`
--

CREATE TABLE IF NOT EXISTS `todaysgame` (
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
  `Type` varchar(4) DEFAULT 'Pro',
  PRIMARY KEY (`TG_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `traderequests`
--

CREATE TABLE IF NOT EXISTS `traderequests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(10) DEFAULT '2008-2009',
  `Player` varchar(50) DEFAULT NULL,
  `RequestedTeams` varchar(30) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Team` varchar(32) DEFAULT NULL,
  `Details` varchar(75) DEFAULT NULL,
  `S_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE IF NOT EXISTS `transactionhistory` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Season_ID` int(11) DEFAULT '0',
  `Value` varchar(255) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
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
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trophies`
--

CREATE TABLE IF NOT EXISTS `trophies` (
  `FarmPlayoffsChampions` varchar(50) DEFAULT 'League Champion',
  `FarmRegularSeasonChampions` varchar(50) DEFAULT 'Best Overall Record',
  `FarmPlayoffMVP` varchar(50) DEFAULT 'Most Valuable Player in the Playoffs',
  `FarmTopScorer` varchar(50) DEFAULT 'Top Point Scorer in the league',
  `FarmMVP` varchar(50) DEFAULT 'Most Valuable Player',
  `FarmGoalieOfTheYear` varchar(50) DEFAULT 'Goalie of the Year',
  `FarmDefensemanOfTheYear` varchar(50) DEFAULT 'Defenseman of the Year',
  `FarmRookieOfTheYear` varchar(50) DEFAULT 'Rookie of the year',
  `FarmBestDefensiveForward` varchar(50) DEFAULT 'Top Defensive Forward',
  `FarmMostSportsmanlikePlayer` varchar(50) DEFAULT 'Qualities of Perseverance and Sportsmanship',
  `FarmCoachOfTheYear` varchar(50) DEFAULT 'Coach of the Year',
  `FarmTopGoalScorer` varchar(50) DEFAULT 'Top Goal Scorer',
  `FarmLowestGAA` varchar(50) DEFAULT 'Goalie(s) With the Fewest Goals Scored Against',
  `FarmLowestPIM` varchar(50) DEFAULT 'Player who Displays Gentlemanly Conduct',
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
  `PlayoffsChampionsPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `RegularSeasonChampionsPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `PlayoffMVPPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `TopScorerPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `MVPPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `GoalieOfTheYearPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `DefensemanOfTheYearPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `RookieOfTheYearPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `BestDefensiveForwardPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `MostSportsmanlikePlayerPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `CoachOfTheYearPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `TopGoalScorerPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `LowestGAAPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `LowestPIMPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `GeneralManager` varchar(50) DEFAULT 'General Manager of the Year',
  `GeneralManagerPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `FarmPlayoffsChampionsPhoto` varchar(50) DEFAULT 'Hockey-Trophy.jpg',
  `FarmRegularSeasonChampionsPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmPlayoffMVPPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmTopScorerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmMVPPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmGoalieOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmDefensemanOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmRookieOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmBestDefensiveForwardPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmMostSportsmanlikePlayerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmCoachOfTheYearPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmTopGoalScorerPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmLowestGAAPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg',
  `FarmLowestPIMPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trophywinners`
--

CREATE TABLE IF NOT EXISTS `trophywinners` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waitinglist`
--

CREATE TABLE IF NOT EXISTS `waitinglist` (
  `W_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Referal` varchar(255) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  PRIMARY KEY (`W_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waiver`
--

CREATE TABLE IF NOT EXISTS `waiver` (
  `WID` int(11) NOT NULL AUTO_INCREMENT,
  `DayPutOnWaiver` int(11) DEFAULT NULL,
  `DayRemoveFromWaiver` int(11) DEFAULT NULL,
  `FromTeam` int(11) DEFAULT NULL,
  `Player` int(11) DEFAULT NULL,
  `ToTeam` int(11) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`WID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waiver_claims`
--

CREATE TABLE IF NOT EXISTS `waiver_claims` (
  `WC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `W_ID` int(11) DEFAULT NULL,
  `Team` int(11) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  PRIMARY KEY (`WC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waiver_draft`
--

CREATE TABLE IF NOT EXISTS `waiver_draft` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DraftName` varchar(50) DEFAULT NULL,
  `DraftPickTime` int(11) DEFAULT '10',
  `Round` int(11) DEFAULT '5',
  `DraftStatus` varchar(5) DEFAULT 'False',
  `Season_ID` int(11) DEFAULT '0',
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waiver_draftpicks`
--

CREATE TABLE IF NOT EXISTS `waiver_draftpicks` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Draft_ID` int(11) DEFAULT NULL,
  `TeamName` varchar(32) DEFAULT NULL,
  `Round` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT '',
  `DraftList` varchar(50) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Overall` int(11) DEFAULT NULL,
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
