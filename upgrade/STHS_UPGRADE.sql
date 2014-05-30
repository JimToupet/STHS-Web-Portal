ALTER TABLE `articles`
CHANGE `Team` double DEFAULT '0' NULL,
ADD `League` varchar(5) NOT NULL DEFAULT 'True';

ALTER TABLE `coaches`
ADD `Bio` text,
ADD `Retired` double NOT NULL DEFAULT '0';

ALTER TABLE `coachestats`
DROP `GP`,
DROP `W`,
DROP `L`,
DROP `T`,
DROP `OTW`,
DROP `OTL`,
DROP `SOW`,
DROP `SOL`,
DROP `GF`,
DROP `GA`,
DROP `Pim`,
DROP `Hits`, 
ADD `Number` int(11) DEFAULT NULL,
ADD `Team` int(11) NOT NULL DEFAULT '0',
ADD `ProGP` double DEFAULT '0',
ADD `ProW` double DEFAULT '0',
ADD `ProL` double DEFAULT '0',
ADD `ProT` double DEFAULT '0',
ADD `ProOTW` double DEFAULT '0',
ADD `ProOTL` double DEFAULT '0',
ADD `ProSOW` double DEFAULT '0',
ADD `ProSOL` double DEFAULT '0',
ADD `ProGF` double DEFAULT '0',
ADD `ProGA` double DEFAULT '0',
ADD `ProPim` double DEFAULT '0',
ADD `ProHits` double DEFAULT '0',
ADD `FarmGP` double NOT NULL DEFAULT '0',
ADD `FarmW` double NOT NULL DEFAULT '0',
ADD `FarmL` double NOT NULL DEFAULT '0',
ADD `FarmT` double NOT NULL DEFAULT '0',
ADD `FarmOTW` double NOT NULL DEFAULT '0',
ADD `FarmOTL` double NOT NULL DEFAULT '0',
ADD `FarmSOW` double NOT NULL DEFAULT '0',
ADD `FarmSOL` double NOT NULL DEFAULT '0',
ADD `FarmGF` double NOT NULL DEFAULT '0',
ADD `FarmGA` double NOT NULL DEFAULT '0',
ADD `FarmPim` double NOT NULL DEFAULT '0',
ADD `FarmHits` double NOT NULL DEFAULT '0',
ADD `DateCreated` datetime DEFAULT NULL,
ADD `FarmPro` varchar(5) DEFAULT 'Pro';

ALTER TABLE `config`
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
DROP `WaiverDuration`,
ADD `TinyLeagueImage` varchar(35) DEFAULT NULL,
ADD `SmallLeagueLogo` varchar(50) DEFAULT NULL,
ADD `SmallFarmLeagueLogo` varchar(50) DEFAULT NULL,
ADD `LastModifiedFarmSchedule` date DEFAULT NULL,
ADD `MaxContract` int(11) NOT NULL DEFAULT '4',
ADD `ContractVary` int(11) NOT NULL DEFAULT '1',
ADD `GameResultForward` int(11) NOT NULL DEFAULT '1',
ADD `TimeZone` varchar(50) DEFAULT 'TZ=Canada/Atlantic',
ADD `Version` varchar(5) DEFAULT '2.0';

ALTER TABLE `draft`
ADD `Year` int(11) NOT NULL DEFAULT '0',
DROP `StartDate`,
DROP `DraftTeamList`,
DROP `FinalChamp`,
DROP `FinalLooser`,
CHANGE `LotteryWinner` int(11) DEFAULT NULL;


DROP TABLE `draftlog`;


ALTER TABLE `draftpicks`
ADD `Name` varchar(50) DEFAULT '',
ADD `DraftList` text DEFAULT NULL,
ADD `DateCreated` datetime DEFAULT NULL,
ADD `Overall` int(11) DEFAULT NULL;


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


ALTER `farmteam`
ADD `Number` int(11) NOT NULL DEFAULT '0',
ADD `JerseyHome` varchar(50) DEFAULT NULL,
ADD `JerseyAway` varchar(50) DEFAULT NULL,
ADD `TextColor` varchar(6) NOT NULL DEFAULT '000000';



ALTER `farmteamstandings`
ADD `Number` int(11) NOT NULL DEFAULT '0',
ADD `Captain` int(11) DEFAULT NULL,
ADD `Assistant1` int(11) DEFAULT NULL,
ADD `Assistant2` int(11) DEFAULT NULL,
ADD `Payroll` double DEFAULT NULL,
ADD `TotalPlayersSalaries` int(11) DEFAULT '0',
ADD `ExpensePerDay` int(11) DEFAULT '0',
ADD `CoachID` int(11) DEFAULT NULL,
ADD `ScheduleGameInAYear` double DEFAULT NULL,
ADD `PlayOffEliminated` varchar(5) DEFAULT NULL,
ADD `PowerRanking` double DEFAULT NULL,
ADD `PlayOffWinRound` double DEFAULT NULL,
ADD `StandingPlayoffTitle` varchar(6) DEFAULT NULL,
ADD `Streak` varchar(6) DEFAULT NULL,
ADD `Last10W` double DEFAULT NULL,
ADD `Last10L` double DEFAULT NULL,
ADD `Last10T` double DEFAULT NULL,
ADD `Last10OTW` double DEFAULT NULL,
ADD `Last10OTL` double DEFAULT NULL,
ADD `Last10SOW` double DEFAULT NULL,
ADD `Last10SOL` double DEFAULT NULL,
ADD `Round` double DEFAULT '0',
ADD `PuckTimeInZoneDF` int(11) DEFAULT NULL,
ADD `PuckTimeInZoneOF` int(11) DEFAULT NULL,
ADD `PuckTimeInZoneNT` int(11) DEFAULT NULL,
ADD `PuckTimeControlinZoneDF` int(11) DEFAULT NULL,
ADD `PuckTimeControlinZoneOF` int(11) DEFAULT NULL,
ADD `PuckTimeControlinZoneNT` int(11) DEFAULT NULL,
CHANGE `Points `TotalPoint` double DEFAULT NULL;


ALTER `goalies`
ADD `AgeDate` varchar(10) DEFAULT NULL,
ADD `CanPlayPro` varchar(5) DEFAULT NULL,
ADD `CanPlayFarm` varchar(5) DEFAULT NULL,
ADD `ForceWaiver` varchar(5) DEFAULT NULL,
ADD `StarPower` varchar(5) DEFAULT NULL,
CHANGE `Salary` `Salary1` decimal(10,0) DEFAULT NULL,
ADD `Salary2` decimal(10,0) DEFAULT NULL,
ADD `Salary3` decimal(10,0) DEFAULT NULL,
ADD `Salary4` decimal(10,0) DEFAULT NULL,
ADD `Salary5` decimal(10,0) DEFAULT NULL,
ADD `Salary6` decimal(10,0) DEFAULT NULL,
ADD `Salary7` decimal(10,0) DEFAULT NULL,
ADD `Salary8` decimal(10,0) DEFAULT NULL,
ADD `Salary9` decimal(10,0) DEFAULT NULL,
ADD `Salary10` decimal(10,0) DEFAULT NULL,
DROP `Status`,
ADD `Status1` double DEFAULT NULL,
ADD `Status2` double DEFAULT NULL,
ADD `Status3` double DEFAULT NULL,
ADD `Status4` double DEFAULT NULL,
ADD `Status5` double DEFAULT NULL,
ADD `Status6` double DEFAULT NULL,
ADD `Status7` double DEFAULT NULL,
ADD `Status8` double DEFAULT NULL,
ADD `Status9` double DEFAULT NULL,
ADD `Status10` double DEFAULT NULL,
DROP `ST`,
ADD `EN` double DEFAULT NULL,
ADD `PC` double DEFAULT NULL,
ADD `PS` double DEFAULT NULL,
CHANGE `OV` `Overall` double DEFAULT NULL,
CHANGE `Team` int(32) DEFAULT NULL,
ADD `URLLink` varchar(255) DEFAULT NULL,
ADD `ExcludeFromPayroll` varchar(5) DEFAULT NULL,
ADD `UniformNumber` int(11) NOT NULL DEFAULT '0',
ADD `Retired` int(11) DEFAULT '0';



ALTER `goaliestats`
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
ADD `FarmStarPowerYear` int(11) DEFAULT '0'l,
CHANGE `Team` int(32) DEFAULT NULL;
 
 
DROP TABLE `mailgenerator`;


ALTER `players`
ADD `AgeDate` varchar(10) DEFAULT NULL,
ADD `PosC` char(5) DEFAULT NULL,
ADD `PosLW` char(5) DEFAULT NULL,
ADD `PosRW` char(5) DEFAULT NULL,
ADD `PosD` char(5) DEFAULT NULL,
ADD `CanPlayPro` char(5) DEFAULT NULL,
ADD `CanPlayFarm` char(5) DEFAULT NULL,
ADD `ForceWaiver` char(5) DEFAULT NULL,
ADD `StarPower` double DEFAULT NULL,
CHANGE `Salary` `Salary1` decimal(10,0) DEFAULT NULL,
ADD `Salary2` decimal(10,0) DEFAULT NULL,
ADD `Salary3` decimal(10,0) DEFAULT NULL,
ADD `Salary4` decimal(10,0) DEFAULT NULL,
ADD `Salary5` decimal(10,0) DEFAULT NULL,
ADD `Salary6` decimal(10,0) DEFAULT NULL,
ADD `Salary7` decimal(10,0) DEFAULT NULL,
ADD `Salary8` decimal(10,0) DEFAULT NULL,
ADD `Salary9` decimal(10,0) DEFAULT NULL,
ADD `Salary10` decimal(10,0) DEFAULT NULL,
ADD `Status0` double DEFAULT NULL,
ADD `Status1` double DEFAULT NULL,
ADD `Status2` double DEFAULT NULL,
ADD `Status3` double DEFAULT NULL,
ADD `Status4` double DEFAULT NULL,
ADD `Status5` double DEFAULT NULL,
ADD `Status6` double DEFAULT NULL,
ADD `Status7` double DEFAULT NULL,
ADD `Status8` double DEFAULT NULL,
ADD `Status9` double DEFAULT NULL,
ADD `EN` double DEFAULT NULL,
ADD `PS` double DEFAULT NULL,
CHANGE `OV` `Overall` double DEFAULT NULL,
ADD `URLLINK` varchar(255) DEFAULT NULL,
ADD `UniformNumber` int(11) NOT NULL DEFAULT '0',
ADD `Retired` int(11) DEFAULT '0',
CHANGE `Team` int(32) DEFAULT NULL;


ALTER `playerscontractoffers`
CHANGE `Team` int(32) DEFAULT '0',
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
DROP `Salary,
ADD `NoTradeSalary` int(11) DEFAULT '0',
DROP `RealNHLSalary`,
CHANGE `NoTrade` `NoTrade` varchar(5) default '0';


ALTER `playersextensionoffers`
CHANGE `Team` int(11) DEFAULT '0';


ALTER `playerstats`
ADD `Number` double DEFAULT NULL,
ADD `Pro5Pim` double DEFAULT NULL,
ADD `ProOwnShotsBlock` double DEFAULT NULL,
ADD `ProOwnShotsMissGoals` double DEFAULT NULL,
CHANGE `ProPP` `ProPPG` double DEFAULT NULL,
ADD `ProPPA` double DEFAULT NULL,
ADD `ProPPShots` double DEFAULT NULL,
ADD `ProPPMinutePlay` double DEFAULT NULL,
CHANGE `ProSH` `ProPKG` double DEFAULT NULL,
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
CHANGE `FarmPP` `FarmPPG` double DEFAULT NULL,
ADD `FarmPPA` double DEFAULT NULL,
ADD `FarmPPShots` double DEFAULT NULL,
ADD `FarmPPMinutePlay` double DEFAULT NULL,
CHANGE `FarmSH` `FarmPKG` double DEFAULT NULL,
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
CHANGE `Team` int(32) DEFAULT NULL;


ALTER `prospects`
ADD `OverallPick` int(11) NOT NULL DEFAULT '0';


ALTER `proteam`
ADD `JerseyHome` varchar(50) DEFAULT NULL,
ADD `JerseyAway` varchar(50) DEFAULT NULL,
ADD `LogoNav` varchar(35) DEFAULT NULL,
ADD `TextColor` varchar(6) NOT NULL DEFAULT '000000';



ALTER `proteamstandings` 
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
CHANGE `ProPayroll` `Payroll` int(11) DEFAULT '0',
DROP `FarmPayroll`,
ADD `TotalPlayersSalaries` int(11) DEFAULT '0',
CHANGE `ExpensesPerGame` `ExpensePerDay` int(11) DEFAULT '0',
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
ADD `Round` double DEFAULT '0';


DROP TABLE `requestplayer`;
DROP TABLE `retiredplayers`;

ALTER `schedule` 
ADD `Round` double DEFAULT '0',
DROP `FarmPlay`,
DROP `FarmVisitorTeam`,
DROP `FarmVisitorScore`,
DROP `FarmHomeTeam`,
DROP `FarmHomeScore`,
DROP `FarmOverTime`,
DROP `FarmShootOut`,
DROP `FarmLink`;
  
  
ALTER `seasons` 
ADD `FarmSchedule` varchar(35) DEFAULT NULL;


ALTER `todaysgame`
ADD `Type` varchar(4) DEFAULT 'Pro';
 

ALTER `trophies` 
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
ADD `FarmLowestPIMPhoto` varchar(50) NOT NULL DEFAULT 'Hockey-Trophy.jpg';

DROP TABLE `trophywinners`;

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


DROP TABLE `users`;

CREATE TABLE IF NOT EXISTS `waiver_draft` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DraftName` varchar(50) DEFAULT NULL,
  `DraftPickTime` int(11) DEFAULT '10',
  `Round` int(11) DEFAULT '5',
  `DraftStatus` varchar(5) DEFAULT 'False',
  `Season_ID` int(11) DEFAULT '0',
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


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
