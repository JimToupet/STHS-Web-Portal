<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_upToYear = "Up to year";
	$l_TRADEYEARS = "TRADABLE DRAFT PICKS";
	$l_FavIcon = "FAVOURITE ICON";
	$l_TouchIcon = "TOUCH SCREEN ICON";
	$l_CONSECUTIVEDAYS = "CONSECUTIVE DAYS";
	$l_DRAFTYEAR = "UPCOMING DRAFT YEAR";
	$l_Config = "CONFIG LEAGUE";
	$l_Avatar  = "Avatar";
	$l_Administrator = "Administrator";
	$l_MessageForwarding  = "Message Forwarding";
	$l_BIO = "BIO";
	$l_AWAY_Status = "Not available";
	$l_LeaveDate = "Leave Date";
	$l_ReturnDate = "Return Date";
	$l_Note = "Note";
	$l_email = "E-mail";
	$l_MessageForwardingDesc = "This will send all website messages to the G.M.'s e-mail account.";
	$l_VACATION_NOTICE = "VACATION NOTICE";
	$l_AWAY_Desc = "This will tell all the G.M.s that your are not available to respond to their e-mails between the dates you select below.";
	$l_PrimaryColor = "Primary Color";
	$l_SecondaryColor  = "Secondary Color";
	$l_NavLogo  = "Navigation Bar Logo";
	$l_TinyLogo  = "Schedule Logo";
	$l_SmallLogo  = "Next Game Logo";
	$l_LargeLogo  = "Large Team Logo";
	$l_HeaderImage  = "Header Image";
	$l_MaxWidth   = "Max. Width ";
	$l_Save  = "Save Changes";
	$l_True  = "TRUE";
	$l_False  = "FALSE";
	$l_RulesDocument = "Rules Document";
	$l_TimeZone = "Time Zone";
	$l_DateFormat = "Date Format";
	$l_UFAAGE = "UFA Age";
	$l_RECOVERYRATE = "RECOVERY RATE";
	$l_TRADINGENABLEDE = "TRADING ENABLED";
	$l_DIVISIONLEADER = "DIVISION LEADER";
	$l_PLAYERAI = "PLAYER A.I.";
	$l_EMAILGAMERESULTS = "EMAIL GAME RESULTS";
	$l_DISPLAYOVERALL = "DISPLAY OVERALL";
	$l_FARMLEAGUE = "FARM LEAGUE";
	$l_JUNIORLEAGUE = "JUNIOR LEAGUE";
	$l_RICHTEXTEDITOR = "RICH TEXT EDITOR";
	$l_SALARYCAP = "SALARY CAP";
	$l_CONTRACTEXTENSIONS = "CONTRACT EXTENSIONS";
	$l_CONTRACTLENGTH = "CONTRACT LENGTH";
	$l_MAXSALARYCAP = "MAX. SALARY CAP";
	$l_MINSALARYCAP = "MIN. SALARY CAP";
	$l_MAXPLAYERCAP = "MAX. PLAYER SALARY";
	$l_MINPLAYERCAP = "MIN. PLAYER SALARY";
	$l_AVGPLAYERCAP = "AVG. PLAYER SALARY";
	$l_FARMSALARYPCT = "FARM SALARY PCT.";
	$l_INCFARMINCAP = "INC. FARM IN CAP";
	$l_INCCOACHINCAP = "INC. COACHES IN CAP";
	$l_PROCOLORSANDLOGOS = "PRO COLORS AND LOGOS";
	$l_FARMCOLORSANDLOGOS = "FARM COLORS AND LOGOS";
	$l_BackgroundColor = "Background Color";
	$l_WAIVERS = "WAIVERS";
	$l_WaiverAgeExemption = "Age Exemption";
	$l_WaiverSalaryExemption = "Salary Exemption";
	$l_WaiverMinimumGames = "Minimum Games";
	$l_WaiverDuration = "Duration";
	$l_CommishIcon  = "Commissioner Avatar";
	$l_NewsImage  = "News Default Image";
	$l_AI_UFA_BASE = "UFA PCT of Resigning";
	$l_AI_RFA_BASE = "RFA PCT of Resigning";
	$l_AI_PAY_CUT_90 = "Reduce Salary by 10%";
	$l_AI_PAY_CUT_80 = "Reduce Salary by 20%";
	$l_AI_PAY_CUT_70 = "Reduce Salary by 30%";
	$l_AI_PAY_CUT_60 = "Reduce Salary by 40%";
	$l_AI_PAY_CUT_50 = "Reduce Salary by 50%";
	$l_AI_PAY_RAISE_10 = "Rase Salary by 10%";
	$l_AI_PAY_RAISE_20 = "Rase Salary by 20%";
	$l_AI_PAY_RAISE_30 = "Rase Salary by 30%";
	$l_AI_PAY_RAISE_40 = "Rase Salary by 40%";
	$l_AI_PAY_RAISE_50 = "Rase Salary by 50%";
	$l_AI_SIGNING_BONUS = "Signing Bonus";
	$l_AI_NO_TRADE = "No Trade";
	$l_AI_MORALE_HIGH = "High Morale";
	$l_AI_MORALE_LOW = "Low Morale";
	$l_AI_LOW_EXPECTATIONS = "Contract Does Not Meet Expectations";
	$l_AI_DEPTH_CHARTS = "Too Much Team Depth";
	$l_AI_FAIL = "Rejects Offer";
	$l_AI_RFA_TO_UFA = "Offer Interfers with UFA Status";
	$l_AI_SEASON_PRE = "Pre-season";
	$l_AI_SEASON_REG_1ST = "Start Regular Season";
	$l_AI_SEASON_REG_2ND = "2nd Half of Regular Season";
	$l_AI_SEASON_POST = "Post Season";
	$l_AI_WAIVE_NT = "Waive No Trade Odds";
	$l_PCT_PENALTY = "ODDS PERCENTAGE PENALTY - DEFAULT ";
	$l_PCT_BONUS = "ODDS PERCENTAGE BONUS - DEFAULT ";
	$l_AI_FA_1ST_ODDS = "Free Agent 1st Highest Offer Odds";
	$l_AI_FA_2ND_ODDS = "Free Agent 2nd Highest Offer Odds";
	$l_AI_FA_3RD_ODDS = "Free Agent 3rd Highest Offer Odds";
	$l_AI_NOTRADE_TEAM_LIST = "No Trade Claus Waived Team List";
	$l_AI_NOTRADE_AVAILABLE = "When can He waive No Trade Clause";
	$l_RosterLimit = "ROSTER LIMIT";
	break; 

case 'fr': 
	$l_upToYear = "Jusqu&apos;&agrave; l&apos;ann&eacute;e";
	$l_TRADEYEARS = "DRAFTS PICK COMMERCIALISABLES";
	$l_FavIcon = "IC&Ocirc;NE PR&Eacute;F&Eacute;R&Eacute;E";
	$l_TouchIcon = "IC&Ocirc;NE D&apos;&Eacute;CRAN TACTILE";
	$l_CONSECUTIVEDAYS = "Jour cons&eacute;cutif";
	$l_DRAFTYEAR = "L'ann&eacute;e prochaine d'&eacute;bauche";
	$l_Config = "Configuration du ligue";
	$l_Avatar  = "Avatar";
	$l_Administrator = "Administrateur";
	$l_MessageForwarding  = "Exp&eacute;dition de message";
	$l_BIO = "BIO";
	$l_AWAY_Status = "Vacances";
	$l_LeaveDate = "Date que vous Quitter";
	$l_ReturnDate = "Date de Retour";
	$l_Note = "Note";
	$l_email = "Courriel";
	$l_MessageForwardingDesc = "Ceci enverra tous les messages de site Web au G.M.' ; compte de courrier &eacute;lectronique.";
	$l_VACATION_NOTICE = "Avis de Vacance";
	$l_AWAY_Desc = "Ceci indiquera tout le G.M.s que votre ne soyez pas disponible pour r&eacute;pondre &agrave;  leurs email entre les dates o&agrave;¹ vous choisissez ci-dessous.";
	$l_PrimaryColor = "Couleur Primaire";
	$l_SecondaryColor  = "Couleur Secondaire";
	$l_NavLogo  = "Logo de la navigation";
	$l_TinyLogo  = "Logo de la c&eacute;dule";
	$l_SmallLogo  = "Logo de la prochaine partie ";
	$l_LargeLogo  = "Logo d'&eacute;quipe grand";
	$l_HeaderImage  = "Header Image";
	$l_MaxWidth   = "Max.";
	$l_Save  = "Sauvegarder";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_RulesDocument = "Document des R&egrave;glements";
	$l_TimeZone = "Time Zone";
	$l_DateFormat = "Date Format";
	$l_UFAAGE = "Age de l&Acirc;€™UFA";
	$l_RECOVERYRATE = "Temps de recuperation";
	$l_TRADINGENABLEDE = "&eacute;change en vigeur";
	$l_DIVISIONLEADER = "Chef de Division";
	$l_PLAYERAI = "I.A. du joueur";
	$l_EMAILGAMERESULTS = "Envoyer les resultats de la partie par courriel";
	$l_DISPLAYOVERALL = "Voir la note global";
	$l_FARMLEAGUE = " Ligue affili&eacute;e";
	$l_JUNIORLEAGUE = "Ligue junior";
	$l_RICHTEXTEDITOR = "Rich text editor";
	$l_SALARYCAP = "Salaire";
	$l_CONTRACTEXTENSIONS = "Extensions de contrat";
	$l_CONTRACTLENGTH = "Longueur de contrat";
	$l_MAXSALARYCAP = "Max. masse salariale";
	$l_MINSALARYCAP = "Min. masse salariale";
	$l_MAXPLAYERCAP = "Max. salaire de joueur";
	$l_MINPLAYERCAP = "Min. salaire de joueur";
	$l_AVGPLAYERCAP = "AVG. salaire de joueur";
	$l_FARMSALARYPCT = "Pct. du salaire au ligue affili&eacute;e";
	$l_INCFARMINCAP = "Inc. salaire ligue affili&eacute;e dans la masse salariale";
	$l_INCCOACHINCAP = "Inc. entraineur dans la masse salariale ";
	$l_PROCOLORSANDLOGOS = "Couleur PRO";
	$l_FARMCOLORSANDLOGOS = "Couleur affili&eacute;e";
	$l_BackgroundColor = "Couleur Background";
	$l_WAIVERS = "Ballotage";
	$l_WaiverAgeExemption = "Exemption d'&agrave;¢ge";
	$l_WaiverSalaryExemption = "Exemption de salaire";
	$l_WaiverMinimumGames = "Jeux minimum";
	$l_WaiverDuration = "Dur&eacute;e";
	$l_CommishIcon  = "Avatar de commissioner ";
	$l_NewsImage  = "News Default Image";
	$l_AI_UFA_BASE = "UFA PCT of Resigning";
	$l_AI_RFA_BASE = "RFA PCT of Resigning";
	$l_AI_PAY_CUT_90 = "Reduce Salary by 10%";
	$l_AI_PAY_CUT_80 = "Reduce Salary by 20%";
	$l_AI_PAY_CUT_70 = "Reduce Salary by 30%";
	$l_AI_PAY_CUT_60 = "Reduce Salary by 40%";
	$l_AI_PAY_CUT_50 = "Reduce Salary by 50%";
	$l_AI_PAY_RAISE_10 = "Rase Salary by 10%";
	$l_AI_PAY_RAISE_20 = "Rase Salary by 20%";
	$l_AI_PAY_RAISE_30 = "Rase Salary by 30%";
	$l_AI_PAY_RAISE_40 = "Rase Salary by 40%";
	$l_AI_PAY_RAISE_50 = "Rase Salary by 50%";
	$l_AI_SIGNING_BONUS = "Signing Bonus";
	$l_AI_NO_TRADE = "No Trade";
	$l_AI_MORALE_HIGH = "High Morale";
	$l_AI_MORALE_LOW = "Low Morale";
	$l_AI_LOW_EXPECTATIONS = "Contract Does Not Meet Expectations";
	$l_AI_DEPTH_CHARTS = "Too Much Team Depth";
	$l_AI_FAIL = "Rejects Offer";
	$l_AI_RFA_TO_UFA = "Offer Interfers with UFA Status";
	$l_AI_SEASON_PRE = "Pre-season";
	$l_AI_SEASON_REG_1ST = "Start Regular Season";
	$l_AI_SEASON_REG_2ND = "2nd Half of Regular Season";
	$l_AI_SEASON_POST = "Post Season";
	$l_AI_WAIVE_NT = "Waive No Trade Odds";
	$l_PCT_PENALTY = "ODDS PERCENTAGE PENALTY - DEFAULT ";
	$l_PCT_BONUS = "ODDS PERCENTAGE BONUS - DEFAULT ";
	$l_AI_FA_1ST_ODDS = "Free Agent 1st Highest Offer Odds";
	$l_AI_FA_2ND_ODDS = "Free Agent 2nd Highest Offer Odds";
	$l_AI_FA_3RD_ODDS = "Free Agent 3rd Highest Offer Odds";
	$l_AI_NOTRADE_TEAM_LIST = "No Trade Claus Waived Team List";
	$l_AI_NOTRADE_AVAILABLE = "When can He waive No Trade Clause";
	$l_RosterLimit = "Roster Limit";
	break;
} 

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

if ($_FILES["LeagueLogo"]["error"] > 0)
  {
  $UPLOADED_LOGO = $_POST['LOGO'];
  }
else
  {
  $target_path = "image/logos/medium/";
  $target_path = $target_path . basename( $_FILES['LeagueLogo']['name']); 
  $UPLOADED_LOGO = $_FILES["LOGO"]["name"];
  if(move_uploaded_file($_FILES['LeagueLogo']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['LOGO']['name']). 
		" has been uploaded";
		$UPLOADED_LOGO=basename( $_FILES['LeagueLogo']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["FavIconImage"]["error"] > 0)
  {
 $UPLOADED_FAVICON = $_POST['FARM_LOGO'];
  }
else
  {
  $target_path = "image/";
  $target_path = $target_path . basename( $_FILES['FavIconImage']['name']); 
  $UPLOADED_FAVICON = $_FILES["FavIcon"]["name"];
  if(move_uploaded_file($_FILES['FavIconImage']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['FavIconImage']['name']). 
		" has been uploaded";
		$UPLOADED_FAVICON=basename( $_FILES['FavIconImage']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["TouchIconImage"]["error"] > 0)
  {
 $UPLOADED_TOUCHICON = $_POST['TouchIcon'];
  }
else
  {
  $target_path = "image/";
  $target_path = $target_path . basename( $_FILES['TouchIconImage']['name']); 
  $UPLOADED_TOUCHICON = $_FILES["TouchIcon"]["name"];
  if(move_uploaded_file($_FILES['TouchIconImage']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['TouchIconImage']['name']). 
		" has been uploaded";
		$UPLOADED_TOUCHICON=basename( $_FILES['TouchIconImage']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["CommishIconImage"]["error"] > 0)
  {
 $UPLOADED_COMMISHICON = $_POST['CommishIcon'];
  }
else
  {
  $target_path = "image/gm/";
  $target_path = $target_path . basename( $_FILES['CommishIconImage']['name']); 
  $UPLOADED_COMMISHICON = $_FILES["CommishIcon"]["name"];
  if(move_uploaded_file($_FILES['CommishIconImage']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['CommishIconImage']['name']). 
		" has been uploaded";
		$UPLOADED_COMMISHICON=basename( $_FILES['CommishIconImage']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}


if ($_FILES["NewsImage"]["error"] > 0)
  {
 $UPLOADED_NEWSIMAGE = $_POST['NewsImageOld'];
  }
else
  {
  $target_path = "image/headlines/";
  $target_path = $target_path . basename( $_FILES['NewsImage']['name']); 
  $UPLOADED_NEWSIMAGE = $_FILES["NewsImageOld"]["name"];
  if(move_uploaded_file($_FILES['NewsImage']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['NewsImage']['name']). 
		" has been uploaded";
		$UPLOADED_NEWSIMAGE=basename( $_FILES['NewsImage']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["FarmLeagueLogo"]["error"] > 0)
  {
 $UPLOADED_FARM_LOGO = $_POST['FARM_LOGO'];
  }
else
  {
  $target_path = "image/logos/medium/";
  $target_path = $target_path . basename( $_FILES['FarmLeagueLogo']['name']); 
  $UPLOADED_FARM_LOGO = $_FILES["FARM_LOGO"]["name"];
  if(move_uploaded_file($_FILES['FarmLeagueLogo']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['FarmLeagueLogo']['name']). 
		" has been uploaded";
		$UPLOADED_FARM_LOGO=basename( $_FILES['FarmLeagueLogo']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["SmallLeagueLogo"]["error"] > 0)
  {
 $UPLOADED_SMALL_LOGO = $_POST['SMALL_LOGO'];
  }
else
  {
  $target_path = "image/logos/small/";
  $target_path = $target_path . basename( $_FILES['SmallLeagueLogo']['name']); 
  $UPLOADED_SMALL_LOGO = $_FILES["SMALL_LOGO"]["name"];
  if(move_uploaded_file($_FILES['SmallLeagueLogo']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['SmallLeagueLogo']['name']). 
		" has been uploaded";
		$UPLOADED_SMALL_LOGO=basename( $_FILES['SmallLeagueLogo']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["SmallFarmLeagueLogo"]["error"] > 0)
  {
 $UPLOADED_FARM_SMALL_LOGO = $_POST['FARM_SMALL_LOGO'];
  }
else
  {
  $target_path = "image/logos/small/";
  $target_path = $target_path . basename( $_FILES['SmallFarmLeagueLogo']['name']); 
  $UPLOADED_FARM_SMALL_LOGO = $_FILES["FARM_SMALL_LOGO"]["name"];
  if(move_uploaded_file($_FILES['SmallFarmLeagueLogo']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['SmallFarmLeagueLogo']['name']). 
		" has been uploaded";
		$UPLOADED_FARM_SMALL_LOGO=basename( $_FILES['SmallFarmLeagueLogo']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["TinyLeagueImage"]["error"] > 0)
  {
 $UPLOADED_NAV_LOGO = $_POST['TinyLeague'];
  }
else
  {
  $target_path = "image/logos/nav/";
  $target_path = $target_path . basename( $_FILES['TinyLeagueImage']['name']); 
  $UPLOADED_NAV_LOGO = $_FILES["TinyLeague"]["name"];
  if(move_uploaded_file($_FILES['TinyLeagueImage']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['TinyLeagueImage']['name']). 
		" has been uploaded";
		$UPLOADED_NAV_LOGO=basename( $_FILES['TinyLeagueImage']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}


if ($_FILES["NEW_HEADER"]["error"] > 0)
  {
  $UPLOADED_HEADER = $_POST['HEADER'];
  }
else
  {
  $target_path = "image/headers/";
  $target_path = $target_path . basename( $_FILES['NEW_HEADER']['name']); 
  $UPLOADED_HEADER = $_FILES["HEADER"]["name"];
  if(move_uploaded_file($_FILES['NEW_HEADER']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['NEW_HEADER']['name']). 
		" has been uploaded";
		$UPLOADED_HEADER=basename( $_FILES['NEW_HEADER']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["NEW_FARM_HEADER"]["error"] > 0)
  {
  $UPLOADED_FARM_HEADER = $_POST['FARM_HEADER'];
  }
else
  {
  $target_path = "image/headers/";
  $target_path = $target_path . basename( $_FILES['NEW_FARM_HEADER']['name']); 
  $UPLOADED_FARM_HEADER = $_FILES["FARM_HEADER"]["name"];
  if(move_uploaded_file($_FILES['NEW_FARM_HEADER']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['NEW_FARM_HEADER']['name']). 
		" has been uploaded";
		$UPLOADED_FARM_HEADER=basename( $_FILES['NEW_FARM_HEADER']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}

if ($_FILES["NEW_RULES"]["error"] > 0)
  {
  $UPLOADED_RULES = $_POST['RULES'];
  }
else
  {
  $target_path = "File/";
  $target_path = $target_path . basename( $_FILES['NEW_RULES']['name']); 
  $UPLOADED_RULES = $_FILES["RULES"]["name"];
  if(move_uploaded_file($_FILES['NEW_RULES']['tmp_name'], $target_path)) {
		$errortxt = "The file ".  basename( $_FILES['NEW_RULES']['name']). 
		" has been uploaded";
		$UPLOADED_RULES=basename( $_FILES['NEW_RULES']['name']);
	} else{
			$errortxt = "There was an error uploading the file, please try again!";
	}
}


  $updateSQL = sprintf("UPDATE config SET NewsImage=%s, RosterLimit=%s, AI_FA_1ST_ODDS=%s, AI_FA_2ND_ODDS=%s, AI_FA_3RD_ODDS=%s, AI_NOTRADE_TEAM_LIST=%s, AI_NOTRADE_AVAILABLE=%s,  AI_WAIVE_NT=%s, AI_UFA_BASE=%s, AI_RFA_BASE=%s, AI_PAY_CUT_90=%s, AI_PAY_CUT_80=%s, AI_PAY_CUT_70=%s, AI_PAY_CUT_60=%s, AI_PAY_CUT_50=%s, AI_PAY_RAISE_10=%s, AI_PAY_RAISE_20=%s, AI_PAY_RAISE_30=%s, AI_PAY_RAISE_40=%s, AI_PAY_RAISE_50=%s, AI_SIGNING_BONUS=%s, AI_NO_TRADE=%s, AI_MORALE_HIGH=%s, AI_MORALE_LOW=%s, AI_LOW_EXPECTATIONS=%s, AI_DEPTH_CHARTS=%s, AI_FAIL=%s, AI_SEASON_PRE=%s, AI_SEASON_REG_1ST=%s, AI_SEASON_REG_2ND=%s, AI_SEASON_POST=%s, TradeYears=%s, AvgerageSalary=%s, DateFormat=%s, CommishIcon=%s, TouchIcon=%s, FavIcon=%s, DraftYear=%s, ConsecutiveDays=%s, MaxContract=%s, DivisionLeader=%s, WaiverAgeExemption=%s, WaiverSalaryExemption=%s, WaiverMinimumGames=%s, WaiverDuration=%s, TimeZone=%s, PlayerAI=%s, GameResultForward=%s, SmallFarmLeagueLogo=%s, SmallLeagueLogo=%s, TinyLeagueImage=%s, LeagueLogo=%s, FarmLeagueLogo=%s, LeagueColor=%s, FarmLeagueColor=%s, FarmLeague=%s, PayrollFarm=%s, PayrollCoach=%s, DivisionLeader=%s,  RecoveryRate=%s, HeaderImage=%s,FarmHeaderImage=%s,RulesFile=%s, DisplayOV=%s, ContractExtensionFormula=%s, SalaryCap=%s, MinimumSalaryCap=%s, MaximumPlayerSalary=%s, MinimumPlayerSalary=%s, FarmSalaryPercentage=%s, UFA=%s, RichTextEditor=%s, JuniorLeague=%s, TradeDeadlineDay=%s WHERE 1", 
						GetSQLValueString($UPLOADED_NEWSIMAGE, "text"),
						GetSQLValueString($_POST['RosterLimit'], "int"),
						GetSQLValueString($_POST['AI_FA_1ST_ODDS'], "int"),
						GetSQLValueString($_POST['AI_FA_2ND_ODDS'], "int"),
						GetSQLValueString($_POST['AI_FA_3RD_ODDS'], "int"),
						GetSQLValueString($_POST['AI_NOTRADE_TEAM_LIST'], "int"),
						GetSQLValueString($_POST['AI_NOTRADE_AVAILABLE'], "int"),
						GetSQLValueString($_POST['AI_WAIVE_NT'], "int"),
						GetSQLValueString($_POST['AI_UFA_BASE'], "int"),
						GetSQLValueString($_POST['AI_RFA_BASE'], "int"),
						GetSQLValueString($_POST['AI_PAY_CUT_90'], "int"),
						GetSQLValueString($_POST['AI_PAY_CUT_80'], "int"),
						GetSQLValueString($_POST['AI_PAY_CUT_70'], "int"),
						GetSQLValueString($_POST['AI_PAY_CUT_60'], "int"),
						GetSQLValueString($_POST['AI_PAY_CUT_50'], "int"),
						GetSQLValueString($_POST['AI_PAY_RAISE_10'], "int"),
						GetSQLValueString($_POST['AI_PAY_RAISE_20'], "int"),
						GetSQLValueString($_POST['AI_PAY_RAISE_30'], "int"),
						GetSQLValueString($_POST['AI_PAY_RAISE_40'], "int"),
						GetSQLValueString($_POST['AI_PAY_RAISE_50'], "int"),
						GetSQLValueString($_POST['AI_SIGNING_BONUS'], "int"),
						GetSQLValueString($_POST['AI_NO_TRADE'], "int"),
						GetSQLValueString($_POST['AI_MORALE_HIGH'], "int"),
						GetSQLValueString($_POST['AI_MORALE_LOW'], "int"),
						GetSQLValueString($_POST['AI_LOW_EXPECTATIONS'], "int"),
						GetSQLValueString($_POST['AI_DEPTH_CHARTS'], "int"),
						GetSQLValueString($_POST['AI_FAIL'], "int"),
						GetSQLValueString($_POST['AI_SEASON_PRE'], "int"),
						GetSQLValueString($_POST['AI_SEASON_REG_1ST'], "int"),
						GetSQLValueString($_POST['AI_SEASON_REG_2ND'], "int"),
						GetSQLValueString($_POST['AI_SEASON_POST'], "int"),
						GetSQLValueString($_POST['TradeYears'], "int"),
						GetSQLValueString($_POST['AvgerageSalary'], "int"),
						GetSQLValueString($_POST['DateFormat'], "text"),
						GetSQLValueString($UPLOADED_COMMISHICON, "text"),
						GetSQLValueString($UPLOADED_TOUCHICON, "text"),
						GetSQLValueString($UPLOADED_FAVICON, "text"),
						GetSQLValueString($_POST['DraftYear'], "int"),
						GetSQLValueString($_POST['ConsecutiveDays'], "int"),
						GetSQLValueString($_POST['MaxContract'], "int"),
						GetSQLValueString($_POST['DivisionLeader'], "text"),
						GetSQLValueString($_POST['WaiverAgeExemption'], "int"),
						GetSQLValueString($_POST['WaiverSalaryExemption'], "int"),
						GetSQLValueString($_POST['WaiverMinimumGames'], "int"),
						GetSQLValueString($_POST['WaiverDuration'], "int"),
						GetSQLValueString($_POST['TimeZone'], "text"),
						GetSQLValueString($_POST['PlayerAI'], "text"),
						GetSQLValueString($_POST['GameResultForward'], "int"),
						GetSQLValueString($UPLOADED_FARM_SMALL_LOGO, "text"),
						GetSQLValueString($UPLOADED_SMALL_LOGO, "text"),
						GetSQLValueString($UPLOADED_NAV_LOGO, "text"),
						GetSQLValueString($UPLOADED_LOGO, "text"),
						GetSQLValueString($UPLOADED_FARM_LOGO, "text"),
						GetSQLValueString($_POST['LeagueColor'], "text"),
						GetSQLValueString($_POST['FarmLeagueColor'], "text"),
						GetSQLValueString($_POST['FarmLeague'], "text"),
						GetSQLValueString($_POST['PayrollFarm'], "text"),
						GetSQLValueString($_POST['PayrollCoach'], "text"),
						GetSQLValueString($_POST['DivisionLeader'], "text"),
						GetSQLValueString($_POST['RecoveryRate'], "int"),
						GetSQLValueString($UPLOADED_HEADER, "text"),
						GetSQLValueString($UPLOADED_FARM_HEADER, "text"),
						GetSQLValueString($UPLOADED_RULES, "text"),
						GetSQLValueString($_POST['DisplayOV'], "int"),
						GetSQLValueString($_POST['ContractExtensionFormula'], "int"),
						GetSQLValueString($_POST['SalaryCap'], "int"),
						GetSQLValueString($_POST['MinimumSalaryCap'], "int"),
						GetSQLValueString($_POST['MaximumPlayerSalary'], "int"),
						GetSQLValueString($_POST['MinimumPlayerSalary'], "int"),
						GetSQLValueString($_POST['FarmSalaryPercentage'], "text"),
						GetSQLValueString($_POST['UFA'], "int"),
						GetSQLValueString($_POST['RichTextEditor'], "int"),
						GetSQLValueString($_POST['JuniorLeague'], "text"),
						GetSQLValueString($_POST['TradeDeadlineDay'], "int"));
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  $updateGoTo = "web_config.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$query_GetSiteConfig = sprintf("SELECT * FROM config");
$GetSiteConfig = mysql_query($query_GetSiteConfig, $connection) or die(mysql_error());
$row_GetSiteConfig = mysql_fetch_assoc($GetSiteConfig);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_site_configuration;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  
    
  //hide the all of the element with class msg_body
	$(".msg_body").hide();
	$(".msg_body:first").slideToggle(250);
	
	//toggle the componenet with class msg_body
	$(".msg_head").click(function(){
		$(".msg_body").hide();
		$(this).next(".msg_body").slideToggle(250);
	});
  
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
.msg_list {
	width: 100%;
}
.msg_head {
	padding: 5px 10px;
	cursor: pointer;
	position: relative;
	background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;
	font-weight:bold;
	clear:both;
	margin-bottom:1px;
}
.msg_body {
	margin-bottom:30px;
	display:block;
}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>

<h1><?php echo $l_nav_site_configuration;?></h1>
<br />

<form method="post" name="form1" enctype="multipart/form-data"  action="<?php echo $editFormAction; ?>">
<div class="msg_list">

    <p class="msg_head"><?php echo $l_Config;?></p>
    <div class="msg_body">
    
        <div class="rowElem">
        <label for="NEW_RULES"><?php echo $l_RulesDocument;?>:</label>
        <input type="hidden" name="RULES" value="<?php echo $row_GetSiteConfig['RulesFile']; ?>" /><input name="NEW_RULES" type="file" />
        <?php if ($row_GetSiteConfig['RulesFile'] <> ""){
            echo '<a href="File/'.$row_GetSiteConfig['RulesFile'].'" target="_blank">'.$row_GetSiteConfig["RulesFile"].'</a>';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="TimeZone"><?php echo $l_TimeZone;?>:</label>
        <select name="TimeZone" >
		<option value="TZ=Canada/Newfoundland" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Canada/Newfoundland"){ echo "selected";} ?>>Newfoundland</option>
		<option value="TZ=Canada/Atlantic" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Canada/Atlantic"){ echo "selected";} ?>>Atlantic Time</option>
		<option value="TZ=America/New_York" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=America/New_York"){ echo "selected";} ?>>Eastern Time</option>
		<option value="TZ=America/Chicago" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=America/Chicago"){ echo "selected";} ?>>Central Time</option>
		<option value="TZ=America/Denver" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=America/Denver"){ echo "selected";} ?>>Mountain Time</option>
		<option value="TZ=America/Los_Angeles" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=America/Los_Angeles"){ echo "selected";} ?>>Pacific Time</option>
		<option value="TZ=Europe/London" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Europe/London"){ echo "selected";} ?>>Western Europe Time, London, Lisbon, Casablanca</option>
		<option value="TZ=Europe/Brussels" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Europe/Brussels"){ echo "selected";} ?>>Brussels, Copenhagen, Madrid, Paris</option>
		<option value="TZ=Asia/Baghdad" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Asia/Baghdad"){ echo "selected";} ?>>Baghdad, Riyadh, Moscow, St. Petersburg</option>
		<option value="TZ=Pacific/Fiji" <?php if ($row_GetSiteConfig['TimeZone']=="TZ=Pacific/Fiji"){ echo "selected";} ?>>Auckland, Wellington, Fiji, Kamchatka</option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="DateFormat"><?php echo $l_DateFormat;?>:</label>
        <select name="DateFormat" >
		<option value="usa" <?php if ($row_GetSiteConfig['DateFormat']=="usa"){ echo "selected";} ?>>mm/dd/yyyy (USA)</option>
		<option value="eng" <?php if ($row_GetSiteConfig['DateFormat']=="eng"){ echo "selected";} ?>>dd/mm/yyyy (ENG)</option>
		<option value="iso" <?php if ($row_GetSiteConfig['DateFormat']=="iso"){ echo "selected";} ?>>yyyy/mm/dd (ISO)</option>
		</select>
        </div>
        
       	<div class="rowElem">
        <label for="UFA"><?php echo $l_UFAAGE;?>:</label>
		<input name="UFA" type="text" size="3" maxlength="2" value="<?php echo $row_GetSiteConfig['UFA']; ?>" />
        </div>

        <div class="rowElem">
        <label for="RosterLimit"><?php echo $l_RosterLimit;?>:</label>
        <input name="RosterLimit" type="text" size="3" maxlength="2" value="<?php echo $row_GetSiteConfig['RosterLimit']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="RecoveryRate"><?php echo $l_RECOVERYRATE;?>:</label>
        <input name="RecoveryRate" type="text" size="3" maxlength="2" value="<?php echo $row_GetSiteConfig['RecoveryRate']; ?>" />
        </div>

        <div class="rowElem">
        <label for="ConsecutiveDays"><?php echo $l_CONSECUTIVEDAYS;?>:</label>
        <input name="ConsecutiveDays" type="text" size="3" maxlength="2" value="<?php echo $row_GetSiteConfig['ConsecutiveDays']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="DraftYear"><?php echo $l_DRAFTYEAR;?>:</label>
        <select name="DraftYear" >
        <?php 
		$query_GetYears = sprintf("SELECT Year FROM draftpicks Group By Year",$tmpYear);
		$GetYears = mysql_query($query_GetYears, $connection) or die(mysql_error());
		$row_GetYears = mysql_fetch_assoc($GetYears);
		$totalRows_GetYears = mysql_num_rows($GetYears);
		do {
			if ($row_GetSiteConfig['DraftYear'] == $row_GetYears["Year"]){
				$SelectedYear="selected";
			} else {
				$SelectedYear="";
			}
			echo '<option value="'.$row_GetYears["Year"].'" '.$SelectedYear.'>Year '.$row_GetYears["Year"].'</option>';
		} while ($row_GetYears = mysql_fetch_assoc($GetYears));
		?>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="TradeDeadlineDay"><?php echo $l_TRADINGENABLEDE;?>:</label>
        <select name="TradeDeadlineDay" >
		<option value="1" <?php if ($row_GetSiteConfig['TradeDeadlineDay']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['TradeDeadlineDay']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="TradeYears"><?php echo $l_TRADEYEARS;?>:</label>
        <select name="TradeYears" >
		<option value="10" <?php if ($row_GetSiteConfig['TradeYears']==10){ echo "selected";} ?>><?php echo $l_upToYear;?> 10</option>
		<option value="9" <?php if ($row_GetSiteConfig['TradeYears']==9){ echo "selected";} ?>><?php echo $l_upToYear;?> 9</option>
		<option value="8" <?php if ($row_GetSiteConfig['TradeYears']==8){ echo "selected";} ?>><?php echo $l_upToYear;?> 8</option>
		<option value="7" <?php if ($row_GetSiteConfig['TradeYears']==7){ echo "selected";} ?>><?php echo $l_upToYear;?> 7</option>
		<option value="6" <?php if ($row_GetSiteConfig['TradeYears']==6){ echo "selected";} ?>><?php echo $l_upToYear;?> 6</option>
		<option value="5" <?php if ($row_GetSiteConfig['TradeYears']==5){ echo "selected";} ?>><?php echo $l_upToYear;?> 5</option>
		<option value="4" <?php if ($row_GetSiteConfig['TradeYears']==4){ echo "selected";} ?>><?php echo $l_upToYear;?> 4</option>
		<option value="3" <?php if ($row_GetSiteConfig['TradeYears']==3){ echo "selected";} ?>><?php echo $l_upToYear;?> 3</option>
		<option value="2" <?php if ($row_GetSiteConfig['TradeYears']==2){ echo "selected";} ?>><?php echo $l_upToYear;?> 2</option>
		<option value="1" <?php if ($row_GetSiteConfig['TradeYears']==1){ echo "selected";} ?>><?php echo $l_upToYear;?> 1</option>
		<option value="0" <?php if ($row_GetSiteConfig['TradeYears']==0){ echo "selected";} ?>><?php echo $l_upToYear;?> 0</option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="DivisionLeader"><?php echo $l_DIVISIONLEADER;?>:</label>
        <select name="DivisionLeader" >
		<option value="True" <?php if ($row_GetSiteConfig['DivisionLeader']=='True'){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="False" <?php if ($row_GetSiteConfig['DivisionLeader']=='False'){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="GameResultForward"><?php echo $l_EMAILGAMERESULTS;?>:</label>
        <select name="GameResultForward" >
		<option value="1" <?php if ($row_GetSiteConfig['GameResultForward']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['GameResultForward']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="DisplayOV"><?php echo $l_DISPLAYOVERALL;?>:</label>
        <select name="DisplayOV" >
		<option value="1" <?php if ($row_GetSiteConfig['DisplayOV']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['DisplayOV']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>

        <div class="rowElem">
        <label for="FarmLeague"><?php echo $l_FARMLEAGUE;?>:</label>
        <select name="FarmLeague" >
		<option value="True" <?php if ($row_GetSiteConfig['FarmLeague']=="True"){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="False" <?php if ($row_GetSiteConfig['FarmLeague']=="False"){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="JuniorLeague"><?php echo $l_JUNIORLEAGUE;?>:</label>
        <select name="JuniorLeague" >
		<option value="True" <?php if ($row_GetSiteConfig['JuniorLeague']=="True"){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="False" <?php if ($row_GetSiteConfig['JuniorLeague']=="False"){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="RichTextEditor"><?php echo $l_RICHTEXTEDITOR;?>:</label>
        <select name="RichTextEditor" >
		<option value="1" <?php if ($row_GetSiteConfig['RichTextEditor']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['RichTextEditor']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>


    </div>
    
    <p class="msg_head"><?php echo $l_SALARYCAP;?></p>
    <div class="msg_body">
        
         <div class="rowElem">
        <label for="ContractExtensionFormula"><?php echo $l_CONTRACTEXTENSIONS;?>:</label>
        <select name="ContractExtensionFormula" >
		<option value="1" <?php if ($row_GetSiteConfig['ContractExtensionFormula']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['ContractExtensionFormula']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
        <div class="rowElem">
        <label for="MaxContract"><?php echo $l_CONTRACTLENGTH;?>:</label>
		<input name="MaxContract" type="text" size="2" value="<?php echo $row_GetSiteConfig['MaxContract']; ?>" />
        </div>
        
        
        <div class="rowElem">
        <label for="SalaryCap"><?php echo $l_MAXSALARYCAP;?>:</label>
		<input name="SalaryCap" type="text" size="10" value="<?php echo $row_GetSiteConfig['SalaryCap']; ?>" />
        </div>

        <div class="rowElem">
        <label for="MinimumSalaryCap"><?php echo $l_MINSALARYCAP;?>:</label>
		<input name="MinimumSalaryCap" type="text" size="10" value="<?php echo $row_GetSiteConfig['MinimumSalaryCap']; ?>" />
        </div>

        <div class="rowElem">
        <label for="MaximumPlayerSalary"><?php echo $l_MAXPLAYERCAP;?>:</label>
		<input name="MaximumPlayerSalary" type="text" size="10" value="<?php echo $row_GetSiteConfig['MaximumPlayerSalary']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="MinimumPlayerSalary"><?php echo $l_MINPLAYERCAP;?>:</label>
        <input name="MinimumPlayerSalary" type="text" size="10" value="<?php echo $row_GetSiteConfig['MinimumPlayerSalary']; ?>" />
        </div>
        
         <div class="rowElem">
        <label for="FarmSalaryPercentage"><?php echo $l_FARMSALARYPCT;?>:</label>
		<select name="FarmSalaryPercentage"   size="1">
        <option value="0" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0) { echo "selected"; } ?>>0%</option>
        <option value="0.1" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.1) { echo "selected"; } ?>>10%</option>
        <option value="0.2" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.2) { echo "selected"; } ?>>20%</option>
        <option value="0.3" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.3) { echo "selected"; } ?>>30%</option>
        <option value="0.4" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.4) { echo "selected"; } ?>>40%</option>
        <option value="0.5" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.5) { echo "selected"; } ?>>50%</option>
        <option value="0.6" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.6) { echo "selected"; } ?>>60%</option>
        <option value="0.7" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.7) { echo "selected"; } ?>>70%</option>
        <option value="0.8" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.8) { echo "selected"; } ?>>80%</option>
        <option value="0.9" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 0.9) { echo "selected"; } ?>>90%</option>
        <option value="1" <?php if ($row_GetSiteConfig['FarmSalaryPercentage'] == 1) { echo "selected"; } ?>>100%</option>
        </select>
        </div>
        
        <div class="rowElem">
        <label for="PayrollFarm"><?php echo $l_INCFARMINCAP;?>:</label>
        <select name="PayrollFarm" >
		<option value="True" <?php if ($row_GetSiteConfig['PayrollFarm']=="True"){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="False" <?php if ($row_GetSiteConfig['PayrollFarm']=="False"){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>
        
  		<div class="rowElem">
        <label for="PayrollCoach"><?php echo $l_INCCOACHINCAP;?>:</label>
        <select name="PayrollCoach" >
		<option value="True" <?php if ($row_GetSiteConfig['PayrollCoach']=="True"){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="False" <?php if ($row_GetSiteConfig['PayrollCoach']=="False"){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div>   
                        
        
	</div>
    
    <p class="msg_head"><?php echo $l_PLAYERAI;?></p>
    <div class="msg_body">
        <div id="tabs" class="fieldsetleft">
        
        <p><strong>Contract Extensions</strong></p>
        <div class="rowElem">
        <label for="AvgerageSalary"><?php echo $l_AVGPLAYERCAP;?>:</label>
        <input name="AvgerageSalary" type="text" size="5" value="<?php echo $row_GetSiteConfig['AvgerageSalary']; ?>" /><span style="font-size:10px"></span>
        </div>
        
        <div class="rowElem">
        <label for="AI_UFA_BASE"><?php echo $l_AI_UFA_BASE;?>:</label>
        <input name="AI_UFA_BASE" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_UFA_BASE']; ?>" /><span style="font-size:10px">DEFAULT 50</span>
        </div>
        <div class="rowElem">
        <label for="AI_RFA_BASE"><?php echo $l_AI_RFA_BASE;?>:</label>
        <input name="AI_RFA_BASE" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_RFA_BASE']; ?>" /><span style="font-size:10px">DEFAULT 70</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_PAY_CUT_90"><?php echo $l_AI_PAY_CUT_90;?>:</label>
        <input name="AI_PAY_CUT_90" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_CUT_90']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 10</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_CUT_80"><?php echo $l_AI_PAY_CUT_80;?>:</label>
        <input name="AI_PAY_CUT_80" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_CUT_80']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 20</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_CUT_70"><?php echo $l_AI_PAY_CUT_70;?>:</label>
        <input name="AI_PAY_CUT_70" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_CUT_70']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 30</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_CUT_60"><?php echo $l_AI_PAY_CUT_60;?>:</label>
        <input name="AI_PAY_CUT_60" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_CUT_60']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 40</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_CUT_50"><?php echo $l_AI_PAY_CUT_50;?>:</label>
        <input name="AI_PAY_CUT_50" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_CUT_50']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 50</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_PAY_RAISE_90"><?php echo $l_AI_PAY_RAISE_10;?>:</label>
        <input name="AI_PAY_RAISE_10" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_RAISE_10']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 5</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_RAISE_20"><?php echo $l_AI_PAY_RAISE_20;?>:</label>
        <input name="AI_PAY_RAISE_20" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_RAISE_20']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 10</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_RAISE_30"><?php echo $l_AI_PAY_RAISE_30;?>:</label>
        <input name="AI_PAY_RAISE_30" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_RAISE_30']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 15</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_RAISE_40"><?php echo $l_AI_PAY_RAISE_40;?>:</label>
        <input name="AI_PAY_RAISE_40" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_RAISE_40']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 20</span>
        </div>
        <div class="rowElem">
        <label for="AI_PAY_RAISE_50"><?php echo $l_AI_PAY_RAISE_50;?>:</label>
        <input name="AI_PAY_RAISE_50" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_PAY_RAISE_50']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 25</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_SIGNING_BONUS"><?php echo $l_AI_SIGNING_BONUS;?>:</label>
        <input name="AI_SIGNING_BONUS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_SIGNING_BONUS']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_NO_TRADE"><?php echo $l_AI_NO_TRADE;?>:</label>
        <input name="AI_NO_TRADE" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_NO_TRADE']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_MORALE_HIGH"><?php echo $l_AI_MORALE_HIGH;?>:</label>
        <input name="AI_MORALE_HIGH" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_MORALE_HIGH']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_BONUS;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_MORALE_LOW"><?php echo $l_AI_MORALE_LOW;?>:</label>
        <input name="AI_MORALE_LOW" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_MORALE_LOW']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_LOW_EXPECTATIONS"><?php echo $l_AI_LOW_EXPECTATIONS;?>:</label>
        <input name="AI_LOW_EXPECTATIONS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_LOW_EXPECTATIONS']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 10</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_DEPTH_CHARTS"><?php echo $l_AI_DEPTH_CHARTS;?>:</label>
        <input name="AI_DEPTH_CHARTS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_DEPTH_CHARTS']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_FAIL"><?php echo $l_AI_FAIL;?>:</label>
        <input name="AI_FAIL" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_FAIL']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 10</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_RFA_TO_UFA"><?php echo $l_AI_RFA_TO_UFA;?>:</label>
        <input name="AI_RFA_TO_UFA" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_RFA_TO_UFA']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 5</span>
        </div>
        
        <div class="rowElem">
        <label for="AI_SEASON_PRE"><?php echo $l_AI_SEASON_PRE;?>:</label>
        <input name="AI_SEASON_PRE" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_SEASON_PRE']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 0</span>
        </div>
        <div class="rowElem">
        <label for="AI_SEASON_REG_1ST"><?php echo $l_AI_SEASON_REG_1ST;?>:</label>
        <input name="AI_SEASON_REG_1ST" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_SEASON_REG_1ST']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 5</span>
        </div>
        <div class="rowElem">
        <label for="AI_SEASON_REG_2ND"><?php echo $l_AI_SEASON_REG_2ND;?>:</label>
        <input name="AI_SEASON_REG_2ND" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_SEASON_REG_2ND']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 10</span>
        </div>
        <div class="rowElem">
        <label for="AI_SEASON_POST"><?php echo $l_AI_SEASON_POST;?>:</label>
        <input name="AI_SEASON_POST" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_SEASON_POST']; ?>" /><span style="font-size:10px"><?php echo $l_PCT_PENALTY;?> 15</span>
        </div>
        </div>
        
        <div id="tabs" class="fieldsetright">      
        
        <p><strong>Free Agency</strong></p>
        <div class="rowElem">
        <label for="PlayerAI"><?php echo $l_PLAYERAI;?>:</label>
        <select name="PlayerAI" >
		<option value="1" <?php if ($row_GetSiteConfig['PlayerAI']==1){ echo "selected";} ?>><?php echo $l_True;?></option>
		<option value="0" <?php if ($row_GetSiteConfig['PlayerAI']==0){ echo "selected";} ?>><?php echo $l_False;?></option>
		</select>
        </div><span style="font-size:10px">When on, Free Agents will randomly pick from the Top 3 Offers.</span>
          
        <div class="rowElem">
        <label for="AI_FA_1ST_ODDS"><?php echo $l_AI_FA_1ST_ODDS;?>:</label>
        <input name="AI_FA_1ST_ODDS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_FA_1ST_ODDS']; ?>" /><span style="font-size:10px">DEFAULT 60</span>
        </div>
        <div class="rowElem">
        <label for="AI_FA_2ND_ODDS"><?php echo $l_AI_FA_2ND_ODDS;?>:</label>
        <input name="AI_FA_2ND_ODDS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_FA_2ND_ODDS']; ?>" /><span style="font-size:10px">DEFAULT 30</span>
        </div>
        <div class="rowElem">
        <label for="AI_FA_3RD_ODDS"><?php echo $l_AI_FA_3RD_ODDS;?>:</label>
        <input name="AI_FA_3RD_ODDS" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_FA_3RD_ODDS']; ?>" /><span style="font-size:10px">DEFAULT 10</span>
        </div>
        
        <p><strong>No Trade Clause</strong></p>
        
        <div class="rowElem">
        <label for="AI_WAIVE_NT"><?php echo $l_AI_WAIVE_NT;?>:</label>
        <input name="AI_WAIVE_NT" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_WAIVE_NT']; ?>" />
        </div>
        <div class="rowElem">
        <label for="AI_NOTRADE_TEAM_LIST"><?php echo $l_AI_NOTRADE_TEAM_LIST;?>:</label>
        <input name="AI_NOTRADE_TEAM_LIST" type="text" size="5" value="<?php echo $row_GetSiteConfig['AI_NOTRADE_TEAM_LIST']; ?>" />
        </div>
        <div class="rowElem">
        <label for="AI_NOTRADE_AVAILABLE"><?php echo $l_AI_NOTRADE_AVAILABLE;?>:</label>
        <select name="AI_NOTRADE_AVAILABLE" >
		<option value="1" <?php if ($row_GetSiteConfig['AI_NOTRADE_AVAILABLE']==1){ echo "selected";} ?>>PRE-SEASON</option>
		<option value="2" <?php if ($row_GetSiteConfig['AI_NOTRADE_AVAILABLE']==2){ echo "selected";} ?>>1ST HALF OF REGULAR SEASON</option>
		<option value="3" <?php if ($row_GetSiteConfig['AI_NOTRADE_AVAILABLE']==3){ echo "selected";} ?>>2ND HALF OF REGULAR SEASON</option>
		<option value="4" <?php if ($row_GetSiteConfig['AI_NOTRADE_AVAILABLE']==4){ echo "selected";} ?>>POST SEASON</option>
		<option value="5" <?php if ($row_GetSiteConfig['AI_NOTRADE_AVAILABLE']==5){ echo "selected";} ?>>NEVER</option>
		</select>
        </div>
        
        </div>
    </div>
    
    <p class="msg_head"><?php echo $l_WAIVERS;?></p>
    <div class="msg_body">
        
        <div class="rowElem">
        <label for="WaiverAgeExemption"><?php echo $l_WaiverAgeExemption;?>:</label>
		<input name="WaiverAgeExemption" type="text" size="2" value="<?php echo $row_GetSiteConfig['WaiverAgeExemption']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="WaiverSalaryExemption"><?php echo $l_WaiverSalaryExemption;?>:</label>
		<input name="WaiverSalaryExemption" type="text" size="10" value="<?php echo $row_GetSiteConfig['WaiverSalaryExemption']; ?>" />
        </div>
        
        <div class="rowElem">
        <label for="WaiverMinimumGames"><?php echo $l_WaiverMinimumGames;?>:</label>
		<input name="WaiverMinimumGames" type="text" size="2" value="<?php echo $row_GetSiteConfig['WaiverMinimumGames']; ?>" />
        </div>

        <div class="rowElem">
        <label for="WaiverDuration"><?php echo $l_WaiverDuration;?>:</label>
		<input name="WaiverDuration" type="text" size="2" value="<?php echo $row_GetSiteConfig['WaiverDuration']; ?>" />
        </div>      
        
	</div>
    
    <p class="msg_head"><?php echo $l_PROCOLORSANDLOGOS;?></p>
    <div class="msg_body">

        <div class="rowElem">
        <label for="LeagueColor"><?php echo $l_BackgroundColor;?>:</label>
        <input name="LeagueColor" type="text" size="6" maxlength="6" value="<?php echo $row_GetSiteConfig['LeagueColor']; ?>" />
        <div style="margin:0px 0px 0px 220px; display:block; width:25px; height:25px; background-color:#<?php echo $row_GetSiteConfig['LeagueColor']; ?>;"></div>
        </div>
        
         <div class="rowElem">
        <label for="NEW_HEADER"><?php echo $l_HeaderImage;?>:</label>
        <input type="hidden" name="HEADER" value="<?php echo $row_GetSiteConfig['HeaderImage']; ?>" /><input name="NEW_HEADER" type="file" />
        <?php if ($row_GetSiteConfig['HeaderImage'] <> ""){ 
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headers/'.$row_GetSiteConfig['HeaderImage'].'" width="575" border="1" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="LeagueLogo"><?php echo $l_LargeLogo;?>:</label>
        <input type="hidden" name="LOGO" value="<?php echo $row_GetSiteConfig['LeagueLogo']; ?>" /><input name="LeagueLogo" type="file" />
        <?php if ($row_GetSiteConfig['LeagueLogo'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/medium/'.$row_GetSiteConfig['LeagueLogo'].'" border="0" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="SmallLeagueLogo"><?php echo $l_SmallLogo;?>:</label>
        <input type="hidden" name="SMALL_LOGO" value="<?php echo $row_GetSiteConfig['SmallLeagueLogo']; ?>" /><input name="SmallLeagueLogo" type="file" />
        <?php if ($row_GetSiteConfig['SmallLeagueLogo'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/small/'.$row_GetSiteConfig['SmallLeagueLogo'].'" border="0" />';
        }
        ?>
        </div>
        
        
        <div class="rowElem">
        <label for="TinyLeagueImage"><?php echo $l_NavLogo;?>:</label>
        <input type="hidden" name="TinyLeague" value="<?php echo $row_GetSiteConfig['TinyLeagueImage']; ?>" /><input name="TinyLeagueImage" type="file" />
        <?php if ($row_GetSiteConfig['TinyLeagueImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/nav/'.$row_GetSiteConfig['TinyLeagueImage'].'" border="0" />';
        }
        ?>
        </div>
        
        
        <div class="rowElem">
        <label for="FavIcon"><?php echo $l_FavIcon;?>:</label>
        <input type="hidden" name="FavIcon" value="<?php echo $row_GetSiteConfig['FavIcon']; ?>" /><input name="FavIconImage" type="file" />
        <?php if ($row_GetSiteConfig['FavIcon'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/'.$row_GetSiteConfig['FavIcon'].'" border="0" />';
        }
        ?>
        </div>
        
        
        <div class="rowElem">
        <label for="TouchIcon"><?php echo $l_TouchIcon;?>:</label>
        <input type="hidden" name="TouchIcon" value="<?php echo $row_GetSiteConfig['TouchIcon']; ?>" /><input name="TouchIconImage" type="file" />
        <?php if ($row_GetSiteConfig['TouchIcon'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/'.$row_GetSiteConfig['TouchIcon'].'" border="0" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="CommishIcon"><?php echo $l_CommishIcon;?>:</label>
        <input type="hidden" name="CommishIcon" value="<?php echo $row_GetSiteConfig['CommishIcon']; ?>" /><input name="CommishIconImage" type="file" />
        <?php if ($row_GetSiteConfig['CommishIcon'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/gm/'.$row_GetSiteConfig['CommishIcon'].'" border="0" />';
        }
        ?>
        </div>
	
        <div class="rowElem">
        <label for="NewsImage"><?php echo $l_NewsImage;?>:</label>
        <input type="hidden" name="NewsImageOld" value="<?php echo $row_GetSiteConfig['NewsImage']; ?>" /><input name="NewsImage" type="file" />
        <?php if ($row_GetSiteConfig['NewsImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headlines/'.$row_GetSiteConfig['NewsImage'].'" border="0" />';
        }
        ?>
        </div>
	
    </div>
    
    <p class="msg_head"><?php echo $l_FARMCOLORSANDLOGOS;?></p>
    <div class="msg_body">
    
        <div class="rowElem">
        <label for="FarmLeagueColor"><?php echo $l_BackgroundColor;?>:</label>
        <input name="FarmLeagueColor" type="text" size="6" maxlength="6" value="<?php echo $row_GetSiteConfig['FarmLeagueColor']; ?>" />
        <div style="margin:0px 0px 0px 220px; display:block; width:25px; height:25px; background-color:#<?php echo $row_GetSiteConfig['FarmLeagueColor']; ?>;"></div>
        </div>
        
        <div class="rowElem">
        <label for="NEW_FARM_HEADER"><?php echo $l_HeaderImage;?>:</label>
        <input type="hidden" name="FARM_HEADER" value="<?php echo $row_GetSiteConfig['FarmHeaderImage']; ?>" /><input name="NEW_FARM_HEADER" type="file" />
        <?php if ($row_GetSiteConfig['FarmHeaderImage'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/headers/'.$row_GetSiteConfig['FarmHeaderImage'].'" width="575" border="1" />';
        }
        ?>
        </div>

		<div class="rowElem">
        <label for="FarmLeagueLogo"><?php echo $l_LargeLogo;?>:</label>
        <input type="hidden" name="FARM_LOGO" value="<?php echo $row_GetSiteConfig['FarmLeagueLogo']; ?>" /><input name="FarmLeagueLogo" type="file" />
        <?php if ($row_GetSiteConfig['FarmLeagueLogo'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/medium/'.$row_GetSiteConfig['FarmLeagueLogo'].'" border="0" />';
        }
        ?>
        </div>
        
        <div class="rowElem">
        <label for="SmallFarmLeagueLogo"><?php echo $l_SmallLogo;?>:</label>
        <input type="hidden" name="FARM_SMALL_LOGO" value="<?php echo $row_GetSiteConfig['SmallFarmLeagueLogo']; ?>" /><input name="SmallFarmLeagueLogo" type="file" />
        <?php if ($row_GetSiteConfig['SmallFarmLeagueLogo'] <> ""){
            echo '<br /><img style="padding:10px 0px 20px 140px;" src="'.$_SESSION['DomainName'].'/image/logos/small/'.$row_GetSiteConfig['SmallFarmLeagueLogo'].'" border="0" />';
        }
        ?>
        </div>

	</div>
</div>

<br />
	<div align="center"><input type="submit" value="<?php echo $l_Save;?>" class="button save"></div>
	<input type="hidden" name="MM_update" value="form1">
</form>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
