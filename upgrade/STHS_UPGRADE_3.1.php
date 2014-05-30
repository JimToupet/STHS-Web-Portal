<?php
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

set_time_limit(1200);

//UPGRADE config
$upgradeSQL =  sprintf("ALTER TABLE `config`
						ADD `TradeYears` int(2) NOT NULL DEFAULT '5',
						ADD `AvgerageSalary` int(11) NOT NULL DEFAULT '2500000';");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `links` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `League` varchar(50) NOT NULL,
  `URL` varchar(255) NOT NULL DEFAULT 'http://',
  `Icon` varchar(50) DEFAULT NULL,
  `EnableFeed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$upgradeSQL = sprintf("CREATE TABLE IF NOT EXISTS `gmstats` (
  `G_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Season_ID` int(11) DEFAULT '0',
  `Team` int(11) DEFAULT '0',
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$Result1 = mysql_query($upgradeSQL, $connection) or die(mysql_error());


$query_GetStandings = sprintf("SELECT p.Season_ID, p.Number, p.GP, p.W, p.L, p.T, p.OTW, p.OTL, p.SOW, p.SOL, p.GF, p.GA, p.Pim, p.Hits, t.GM FROM proteamstandings as p, proteam as t WHERE t.Number=p.Number");
$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
$row_GetStandings = mysql_fetch_assoc($GetStandings);
$totalRows_GetStandings = mysql_num_rows($GetStandings);

if($totalRows_GetStandings > 0){
do {
	$insertSQL = sprintf("INSERT INTO gmstats (Team, Name, Season_ID, ProGP, ProW, ProL, ProT, ProOTW, ProOTL, ProSOW, ProSOL, ProGF, ProGA, ProPim, ProHits) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
		GetSQLValueString($row_GetStandings['Number'], "int"),
		GetSQLValueString($row_GetStandings['GM'], "text"),
		GetSQLValueString($row_GetStandings['Season_ID'], "int"),
		GetSQLValueString($row_GetStandings['GP'], "double"),
		GetSQLValueString($row_GetStandings['W'], "double"),
		GetSQLValueString($row_GetStandings['L'], "double"),
		GetSQLValueString($row_GetStandings['T'], "double"),
		GetSQLValueString($row_GetStandings['OTW'], "double"),
		GetSQLValueString($row_GetStandings['OTL'], "double"),
		GetSQLValueString($row_GetStandings['SOW'], "double"),
		GetSQLValueString($row_GetStandings['SOL'], "double"),
		GetSQLValueString($row_GetStandings['GF'], "double"),
		GetSQLValueString($row_GetStandings['GA'], "double"),
		GetSQLValueString($row_GetStandings['Pim'], "double"),
		GetSQLValueString($row_GetStandings['Hits'], "double")
	);
	
	mysql_real_escape_string(DB_DATABASE, $connection);
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());

} while ($row_GetStandings = mysql_fetch_assoc($GetStandings));
}
?>