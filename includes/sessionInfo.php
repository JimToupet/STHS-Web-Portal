<?php
session_start(); 
//session_register("session");
//header("Content-type: text/html; charset=utf-8");
//header("Content-Type: text/plain; charset=ISO-8859-1");

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
	if (isset($_POST['cookie'])) {$setCookie=1;} else { $setCookie=0;}
    if ($oauth_provider == 'twitter') {
        header("Location: login-twitter.php?cookie=".$setCookie);
    } else if ($oauth_provider == 'facebook') {
       header("Location: login-facebook.php?cookie=".$setCookie);
    }
}

if(!isset($_SESSION['current_Team_ID']))
{
	$_SESSION['current_Team_ID'] = 0;
}

if(!isset($_SESSION['U_ID'])){
	if (isset($_COOKIE['username']) && isset($_COOKIE['password']) && $_COOKIE['username']!= '' && $_COOKIE['password']!= '') { 
		$_SESSION['username'] = $_COOKIE['username']; 
		$_SESSION['password'] = $_COOKIE['password']; 
	}
	
	//check if user is logged in 
	if (isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['username']!= '' && $_SESSION['password']!= '') { 
		header("Location: check_login.php?username=".$_SESSION['username']."&password=".$_SESSION['password']."&target=".basename($_SERVER['REQUEST_URI']));
	} 
}

$GetAction=0;
$id_GetTeamInfo = "1";
if (isset($_GET['team'])) {
  	$id_GetTeamInfo = (get_magic_quotes_gpc()) ? $_GET['team'] : addslashes($_GET['team']);
	if ($_GET['team'] != $_SESSION['current_Team_ID']) {
  		$GetAction=1;
	}
	if($_GET['team'] == 0 ){
		unset($_SESSION['current_Team']);
		unset($_SESSION['current_Team_ID']);
		$_SESSION['current_Team'] = "SIMHL";
		$_SESSION['current_Team_ID'] = 0;
	}
}
if ($GetAction==1){
	
	$query_GetTeamInfo = sprintf("SELECT Conference,HeadlineImage,Number,Name,City,GM,Email,TextColor,PrimaryColor,SecondaryColor,HeaderImage,LogoLarge,LogoTiny,LogoSmall,Division FROM proteam WHERE proteam.Number=%s", $id_GetTeamInfo);
	$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
	$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);
	$totalRows_GetTeamInfo = mysql_num_rows($GetTeamInfo);
	
	$query_GetConfig = "SELECT * FROM config";
	$GetConfig = mysql_query($query_GetConfig, $connection) or die(mysql_error());
	$row_GetConfig = mysql_fetch_assoc($GetConfig);
    	$_SESSION['current_FarmLeague'] = $row_GetConfig['FarmLeague'];
		$_SESSION['current_TinyLeagueImage'] = $row_GetConfig['TinyLeagueImage'];
	
	if ($totalRows_GetTeamInfo > 0) {
		$query_GetFarmTeamInfo = sprintf("SELECT Name,City,TextColor,PrimaryColor,SecondaryColor,HeaderImage,LogoLarge,LogoSmall FROM farmteam WHERE Number='%s'", $row_GetTeamInfo['Number']);
		$GetFarmTeamInfo = mysql_query($query_GetFarmTeamInfo, $connection) or die(mysql_error());
		$row_GetFarmTeamInfo = mysql_fetch_assoc($GetFarmTeamInfo);
		$totalRows_GetFarmTeamInfo = mysql_num_rows($GetFarmTeamInfo);

		$_SESSION['current_Team_ID'] = $row_GetTeamInfo['Number'];
		$_SESSION['current_Team'] = $row_GetTeamInfo['Name'];
		$_SESSION['current_City'] = $row_GetTeamInfo['City'];
		$_SESSION['current_GM'] = $row_GetTeamInfo['GM'];
		$_SESSION['current_PrimaryColor'] = $row_GetTeamInfo['PrimaryColor'];
		$_SESSION['current_SecondaryColor'] = $row_GetTeamInfo['SecondaryColor'];
		$_SESSION['current_TextColor'] = $row_GetTeamInfo['TextColor'];
		$_SESSION['current_HeaderImage'] = $row_GetTeamInfo['HeaderImage'];
		$_SESSION['current_LogoLarge'] = $row_GetTeamInfo['LogoLarge'];
		$_SESSION['current_LogoSmall'] = $row_GetTeamInfo['LogoSmall'];
		$_SESSION['current_HeadlineImage'] = $row_GetTeamInfo['HeadlineImage'];
		$_SESSION['current_LeagueLogo'] = $row_GetConfig['LeagueLogo'];
		$_SESSION['current_LeagueColor'] = $row_GetConfig['LeagueColor'];		
		$_SESSION['current_FarmLeagueColor'] = $row_GetConfig['FarmLeagueColor'];		
		$_SESSION['current_FarmLeagueLogo'] = $row_GetConfig['FarmLeagueLogo'];			
		$_SESSION['current_LeagueFile'] = $row_GetConfig['LeagueFile'];				
		$_SESSION['current_version'] = $row_GetConfig['Version'];	
		$_SESSION['current_TimeZone'] = $row_GetConfig['TimeZone'];	
		$_SESSION['current_DateFormat'] = $row_GetConfig['DateFormat'];			
		$_SESSION['current_Farm_Number'] = $row_GetTeamInfo['Number'];
		
		if ($totalRows_GetFarmTeamInfo > 0) {
			if ($row_GetFarmTeamInfo['Name'] <> ""){$_SESSION['current_Farm_Team'] = $row_GetFarmTeamInfo['Name']; } else {$_SESSION['current_Farm_Team'] = $row_GetTeamInfo['Name'];}
			$_SESSION['current_Farm_City'] = $row_GetFarmTeamInfo['City'];
			if ($row_GetFarmTeamInfo['PrimaryColor'] <> ""){$_SESSION['current_Farm_PrimaryColor'] = $row_GetFarmTeamInfo['PrimaryColor']; } else {$_SESSION['current_Farm_PrimaryColor'] = $row_GetTeamInfo['PrimaryColor'];}
			if ($row_GetFarmTeamInfo['SecondaryColor'] <> ""){$_SESSION['current_Farm_SecondaryColor'] = $row_GetFarmTeamInfo['SecondaryColor']; } else {$_SESSION['current_Farm_SecondaryColor'] = $row_GetTeamInfo['SecondaryColor'];}
			if ($row_GetFarmTeamInfo['TextColor'] <> ""){$_SESSION['current_Farm_TextColor'] = $row_GetFarmTeamInfo['TextColor']; } else {$_SESSION['current_Farm_TextColor'] = $row_GetTeamInfo['TextColor'];}
			if ($row_GetFarmTeamInfo['HeaderImage'] <> ""){$_SESSION['current_Farm_HeaderImage'] = $row_GetFarmTeamInfo['HeaderImage']; } else {$_SESSION['current_Farm_HeaderImage'] = $row_GetTeamInfo['HeaderImage'];}
			if ($row_GetFarmTeamInfo['LogoLarge'] <> ""){$_SESSION['current_Farm_LogoLarge'] = $row_GetFarmTeamInfo['LogoLarge']; } else {$_SESSION['current_Farm_LogoLarge'] = $row_GetTeamInfo['LogoLarge'];}
			if ($row_GetFarmTeamInfo['LogoSmall'] <> ""){$_SESSION['current_Farm_LogoSmall'] = $row_GetFarmTeamInfo['LogoSmall']; } else {$_SESSION['current_Farm_LogoSmall'] = $row_GetTeamInfo['LogoSmall'];}
		} else {
			$_SESSION['current_Farm_Team'] = $row_GetTeamInfo['Name'];
			$_SESSION['current_Farm_City'] = $row_GetTeamInfo['City'];
			$_SESSION['current_Farm_PrimaryColor'] = $row_GetTeamInfo['PrimaryColor'];
			$_SESSION['current_Farm_SecondaryColor'] = $row_GetTeamInfo['SecondaryColor'];
			$_SESSION['current_Farm_TextColor'] = $row_GetTeamInfo['TextColor'];
			$_SESSION['current_Farm_HeaderImage'] = $row_GetTeamInfo['HeaderImage'];
			$_SESSION['current_Farm_LogoLarge'] = $row_GetTeamInfo['LogoLarge'];
			$_SESSION['current_Farm_LogoSmall'] = $row_GetTeamInfo['LogoSmall'];
			$_SESSION['current_HeadlineImage'] = $row_GetTeamInfo['HeadlineImage'];
		}
		$_SESSION['current_GM'] = $row_GetTeamInfo['GM'];
		$_SESSION['current_Email'] = $row_GetTeamInfo['Email'];
		$_SESSION['current_Division'] = $row_GetTeamInfo['Division'];
		$_SESSION['current_Conference'] = $row_GetTeamInfo['Conference'];
	} elseif ($totalRows_GetTeamInfo == 0) {
		$_SESSION['current_Team_ID'] = 0;
		$_SESSION['current_Team'] = "Pro";
		$_SESSION['current_City'] = "";
		$_SESSION['current_GM'] = "";
		$_SESSION['current_PrimaryColor'] = "999999";
		$_SESSION['current_SecondaryColor'] = "CCCCCC";
		$_SESSION['current_TextColor'] = "000000";
		$_SESSION['current_HeaderImage'] =  $row_GetTeamInfo['HeaderImage'];
		$_SESSION['current_LeagueLogo'] = "SIMHL.gif";
		$_SESSION['current_LeagueColor'] = "000000";		
		$_SESSION['current_FarmLeagueColor'] = "000000";		
		$_SESSION['current_FarmLeagueLogo'] = "SIMHL.gif";	
		
		$_SESSION['current_LogoLarge'] = "SIMHL.gif";
		$_SESSION['current_LogoSmall'] = "SIMHL.gif";
		$_SESSION['current_HeadlineImage'] = "SIMHL.gif";
		$_SESSION['current_Farm_Team'] = "Farm";
		$_SESSION['current_Farm_City'] = "";
		$_SESSION['current_Farm_PrimaryColor'] = "999999";
		$_SESSION['current_Farm_SecondaryColor'] = "CCCCCC";
		$_SESSION['current_Farm_TextColor'] = "000000";
		$_SESSION['current_Farm_HeaderImage'] =  $row_GetTeamInfo['FarmHeaderImage'];
		$_SESSION['current_Farm_LogoLarge'] = "SIMHL.gif";
		$_SESSION['current_Farm_LogoSmall'] = "SIMHL.gif";
		$_SESSION['current_GM'] = "";
		$_SESSION['current_Email'] = "";
		$_SESSION['current_Division'] = "";
		$_SESSION['current_Conference'] = "";
		
		$_SESSION['current_TimeZone'] = "TZ=Canada/Atlantic";	
		$_SESSION['current_DateFormat'] = "mm/dd/yyyy";			
	}
	$_SESSION['PlayerAI'] =  $row_GetConfig['PlayerAI'];
	$_SESSION['JuniorLeague'] =  $row_GetConfig['JuniorLeague'];
	$_SESSION['CommishIcon'] =  $row_GetConfig['CommishIcon'];
	$_SESSION['current_DraftYear'] =  $row_GetConfig['DraftYear'];
	$_SESSION['site_Email'] =  $AdministratorEmail;
	$_SESSION['DomainName'] =  $DomainName;
	$_SESSION['SiteName'] =  $SiteName;
	$_SESSION['MessageBoardURL'] = $MessageBoardURL;
	$_SESSION['RulesFile'] =  $row_GetConfig['RulesFile'];
	$_SESSION['DisplayOV'] =  $row_GetConfig['DisplayOV'];
	$_SESSION['RichTextEditor'] =  $row_GetConfig['RichTextEditor'];
	$_SESSION['ContractExtensionFormula'] =  $row_GetConfig['ContractExtensionFormula'];
	$_SESSION['FavIcon'] = $row_GetConfig['FavIcon'];		
	$_SESSION['TouchIcon'] = $row_GetConfig['TouchIcon'];		
	
	$query_GetTeamMenu = "SELECT Name, City, Number, LogoNav, LogoTiny  FROM proteam ORDER BY City";
	$GetTeamMenu = mysql_query($query_GetTeamMenu, $connection) or die(mysql_error());
	$row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu);
	$totalRows_GetTeamMenu = mysql_num_rows($GetTeamMenu);
	$_SESSION['total_teams'] = $totalRows_GetTeamMenu;
		
	$pos = 0;
	do {
		$_SESSION['MenuTeams'][$pos] = $row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name'];
		$_SESSION['MenuTeamsName'][$pos] = $row_GetTeamMenu['Name'];
		$_SESSION['MenuTeamsID'][$pos] = $row_GetTeamMenu['Number'];	
		$_SESSION['MenuTeamsLogo'][$pos] = $row_GetTeamMenu['LogoNav'];	
		$_SESSION['MenuTeamsSmallLogo'][$pos] = $row_GetTeamMenu['LogoTiny'];	
		$pos = $pos + 1;
	} while ($row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu)); 
	
	$query_GetExtLinks = "SELECT * FROM links ORDER BY League Asc";
	$GetExtLinks = mysql_query($query_GetExtLinks, $connection) or die(mysql_error());
	$row_GetExtLinks = mysql_fetch_assoc($GetExtLinks);
	$totalRows_GetExtLinks = mysql_num_rows($GetExtLinks);
	if($totalRows_GetExtLinks > 0){
	$pos = 0;
	do {
		$_SESSION['ExtLeague'][$pos] = $row_GetExtLinks['League'];
		$_SESSION['ExtURL'][$pos] = $row_GetExtLinks['URL'];
		$_SESSION['ExtIcon'][$pos] = $row_GetExtLinks['Icon'];
		$pos = $pos + 1;
	} while ($row_GetExtLinks = mysql_fetch_assoc($GetExtLinks)); 
	}
	mysql_free_result($GetExtLinks);
	mysql_free_result($GetTeamMenu);
	mysql_free_result($GetConfig);

} elseif ($GetAction==0 && $_SESSION['current_Team_ID']==""){
	
	$query_GetConfig = "SELECT * FROM config";
	$GetConfig = mysql_query($query_GetConfig, $connection) or die(mysql_error());
	$row_GetConfig = mysql_fetch_assoc($GetConfig);
	$_SESSION['current_TinyLeagueImage'] = $row_GetConfig['TinyLeagueImage'];
	$_SESSION['current_FarmLeague'] = $row_GetConfig['FarmLeague'];
	$_SESSION['current_Team_ID'] = 0;
	$_SESSION['current_Team'] = "SIMHL";
	$_SESSION['current_City'] = "";
	$_SESSION['current_GM'] = "";
	$_SESSION['current_PrimaryColor'] = $row_GetConfig['LeagueColor'];
	$_SESSION['current_SecondaryColor'] = "CCCCCC";
	$_SESSION['current_HeaderImage'] = $row_GetConfig['HeaderImage'];
	$_SESSION['current_LeagueLogo'] = $row_GetConfig['LeagueLogo'];
	$_SESSION['current_LeagueColor'] = $row_GetConfig['LeagueColor'];		
	$_SESSION['current_FarmLeagueColor'] = $row_GetConfig['FarmLeagueColor'];		
	$_SESSION['current_FarmLeagueLogo'] = $row_GetConfig['FarmLeagueLogo'];	
	$_SESSION['current_LogoLarge'] = "";
	$_SESSION['current_TimeZone'] = "TZ=Canada/Atlantic";	
	$_SESSION['current_DateFormat'] = "mm/dd/yyyy";	
	$_SESSION['current_LogoSmall'] = "";
	$_SESSION['current_HeadlineImage'] = "";
	$_SESSION['current_Farm_Team'] = "SIMHL";
	$_SESSION['current_Farm_City'] = "";
	$_SESSION['current_Farm_PrimaryColor'] = $row_GetConfig['FarmLeagueColor'];
	$_SESSION['current_Farm_SecondaryColor'] = "CCCCCC";
	$_SESSION['current_Farm_TextColor'] = "000000";
	$_SESSION['current_Farm_HeaderImage'] = $row_GetConfig['FarmHeaderImage'];
	$_SESSION['current_FarmLogoLarge'] = "";
	$_SESSION['current_FarmLogoSmall'] = "";
	$_SESSION['current_GM'] = "";
	$_SESSION['current_Email'] =  "";
	$_SESSION['PlayerAI'] =  $row_GetConfig['PlayerAI'];
	$_SESSION['JuniorLeague'] =  $row_GetConfig['JuniorLeague'];
	$_SESSION['CommishIcon'] =  $row_GetConfig['CommishIcon'];
	$_SESSION['current_DraftYear'] =  $row_GetConfig['DraftYear'];
	$_SESSION['site_Email'] =  $AdministratorEmail;
	$_SESSION['DomainName'] =  $DomainName;
	$_SESSION['SiteName'] =  $SiteName;
	$_SESSION['MessageBoardURL'] =  $MessageBoardURL;
	$_SESSION['RulesFile'] =  $row_GetConfig['RulesFile'];
	$_SESSION['DisplayOV'] =  $row_GetConfig['DisplayOV'];	
	$_SESSION['RichTextEditor'] =  $row_GetConfig['RichTextEditor'];
	$_SESSION['ContractExtensionFormula'] =  $row_GetConfig['ContractExtensionFormula'];
	$_SESSION['FavIcon'] = $row_GetConfig['FavIcon'];	
	$_SESSION['TouchIcon'] = $row_GetConfig['TouchIcon'];			
	$_SESSION['current_LeagueFile'] = $row_GetConfig['LeagueFile'];			
	$_SESSION['current_version'] = $row_GetConfig['Version'];	
	$_SESSION['current_TimeZone'] = $row_GetConfig['TimeZone'];	
	$_SESSION['current_DateFormat'] = $row_GetConfig['DateFormat'];	
	
	$query_GetTeamMenu = "SELECT Name, City, Number, LogoNav, LogoTiny FROM proteam ORDER BY City";
	$GetTeamMenu = mysql_query($query_GetTeamMenu, $connection) or die(mysql_error());
	$row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu);
	$totalRows_GetTeamMenu = mysql_num_rows($GetTeamMenu);
	$_SESSION['total_teams'] = $totalRows_GetTeamMenu;
	$pos = 0;
	do {
		$_SESSION['MenuTeams'][$pos] = $row_GetTeamMenu['City']." ".$row_GetTeamMenu['Name'];	
		$_SESSION['MenuTeamsName'][$pos] = $row_GetTeamMenu['Name'];
		$_SESSION['MenuTeamsID'][$pos] = $row_GetTeamMenu['Number'];		
		$_SESSION['MenuTeamsLogo'][$pos] = $row_GetTeamMenu['LogoNav'];	
		$_SESSION['MenuTeamsSmallLogo'][$pos] = $row_GetTeamMenu['LogoTiny'];	
		$pos = $pos + 1;
	} while ($row_GetTeamMenu = mysql_fetch_assoc($GetTeamMenu)); 
	
	$query_GetExtLinks = "SELECT * FROM links ORDER BY League Asc";
	$GetExtLinks = mysql_query($query_GetExtLinks, $connection) or die(mysql_error());
	$row_GetExtLinks = mysql_fetch_assoc($GetExtLinks);
	$totalRows_GetExtLinks = mysql_num_rows($GetExtLinks);
	if($totalRows_GetExtLinks > 0){
	$pos = 0;
	do {
		$_SESSION['ExtLeague'][$pos] = $row_GetExtLinks['League'];
		$_SESSION['ExtURL'][$pos] = $row_GetExtLinks['URL'];
		$_SESSION['ExtIcon'][$pos] = $row_GetExtLinks['Icon'];
		$pos = $pos + 1;
	} while ($row_GetExtLinks = mysql_fetch_assoc($GetExtLinks)); 
	}
	mysql_free_result($GetExtLinks);
	mysql_free_result($GetTeamMenu);
	mysql_free_result($GetConfig);
}
if(!isset($_SESSION['current_SeasonID']))
{
	
	$query_GetActiveSeason = "SELECT * FROM seasons WHERE seasons.Active=1";
	$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
	$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
	$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
	if($totalRows_GetActiveSeason > 0){
		$_SESSION['current_SeasonID']=$row_GetActiveSeason['S_ID'];
		$_SESSION['current_SeasonFolder']=$row_GetActiveSeason['Folder'];
		$_SESSION['current_Season']=$row_GetActiveSeason['Season'];
		$_SESSION['SeasonStartDate']=$row_GetActiveSeason['StartDate'];
		if ($row_GetActiveSeason['SeasonType'] == 2){
			$_SESSION['current_SeasonType']="Pre-Season";
		} else if ($row_GetActiveSeason['SeasonType'] == 1){
			$_SESSION['current_SeasonType']="Regular Season";
		} else if ($row_GetActiveSeason['SeasonType'] == 0){
			$_SESSION['current_SeasonType']="Playoffs";
		}
		$_SESSION['current_SeasonTypeID']=$row_GetActiveSeason['SeasonType'];
	} else {
		$_SESSION['current_SeasonID']=0;
		$_SESSION['current_SeasonFolder']="";
		$_SESSION['current_Season']="";
		$_SESSION['current_SeasonType']="";
		$_SESSION['current_SeasonTypeID'] = 2;
	}
	
	$query_GetTotalDays = "select schedule.Day FROM schedule WHERE schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day desc limit 0,1";
	$GetTotalDays = mysql_query($query_GetTotalDays, $connection) or die(mysql_error());
	$row_GetTotalDays = mysql_fetch_assoc($GetTotalDays);
	$totalRows_GetTotalDays = $row_GetTotalDays['Day'];
	
	$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
	$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
	$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
	$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
	if ($totalRows_GetLastDay==0){
		$Day_ID = 0;
	} else {
		$Day_ID = $row_GetLastDay['Day'];
	}
	
	$HalfSeason = number_format($totalRows_GetTotalDays / 2,0);
	$_SESSION['SEASON_HALF']=FALSE;
	if ($_SESSION['current_SeasonTypeID']==1){
		if ($Day_ID > $HalfSeason){
			$_SESSION['SEASON_HALF']=TRUE;
		}
	}
	
	mysql_free_result($GetActiveSeason);
	mysql_free_result($GetTotalDays);
	mysql_free_result($GetLastDay);
}
putenv($_SESSION['current_TimeZone']);
?>
