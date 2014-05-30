<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php


$ID_GetAction = "0";
if (isset($_GET['action'])) {
  $ID_GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}

set_time_limit(1500);
$uploaddir = 'File/'.$_SESSION['current_SeasonFolder']."/";
global $CurrentSeasonID;
$CurrentSeasonID = $_SESSION['current_SeasonID'];

//echo "<h4 align=center>Importing Todays Games XML</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['TodaysGames'];
	$updateGoTo = "import_waivers.php?action=1";
} else {
	$file = $uploaddir . basename($_FILES['xmlFile']['name']);
	$updateGoTo = "upload.php";
	//$file = $uploaddir ."QMJHL0-ProTeam.xml";
	//echo basename($_FILES['xmlFile']['name']);
	if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
	  $updateSQL = "UPDATE seasons SET TodaysGames='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
	  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	} else {
		echo "<h5 align=center>Unable to process todays games file.  Please try uploading the file manually in previous page.</h5>";
		exit();
	}
}

global $tmp_DomainName;
global $tmp_current_Season;
global $tmp_current_Folder;
global $tmp_siteName;
global $FieldName;
global $RowName;
global $RowActive;
global $LastRow;
global $RowSkip;
global $SQLAction;
global $ActiveSeason;
global $tmp_hostname_simhl;
global $tmp_database_simhl;
global $tmp_username_simhl;
global $tmp_password_simhl;
global $tmp_simhl;
global $TMP_GameNumber;
global $TMP_Link;
global $TMP_VisitorTeam;
global $TMP_VisitorTeamScore;
global $TMP_VisitorTeamGoal;
global $TMP_VisitorTeamGoaler;
global $TMP_HomeTeam;
global $TMP_HomeTeamScore;
global $TMP_HomeTeamGoal;
global $TMP_HomeTeamGoaler;
global $TMP_GameResultForward;

$tmp_hostname_simhl = DB_SERVER;
$tmp_database_simhl = DB_DATABASE;
$tmp_username_simhl = DB_USERNAME;
$tmp_password_simhl = DB_PASSWORD;
$tmp_simhl = $connection;
$tmp_DomainName = $_SESSION['DomainName'];
$tmp_current_Season = $_SESSION['current_Season'];
$tmp_siteName = $_SESSION['SiteName'];
mysql_select_db($tmp_database_simhl, $connection);

$query_GetInfo = sprintf("SELECT LastModifiedLeagueFile, LeagueFile, GameResultForward, ConsecutiveDays FROM config");
$GetInfo = mysql_query($query_GetInfo, $tmp_simhl) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$TMP_GameResultForward=$row_GetInfo['GameResultForward'];
$TMP_ConsecutiveDays=$row_GetInfo['ConsecutiveDays'];

$query_GetActiveSeason = "SELECT seasons.S_ID FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$ActiveSeason=$row_GetActiveSeason['S_ID'];
mysql_free_result($GetActiveSeason);
$query_GetSeasons = sprintf("SELECT Folder FROM seasons WHERE Active=1");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
$tmp_current_Folder = $row_GetSeasons['Folder'];
mysql_free_result($GetSeasons);


function startElement($parser, $name, $attribs) 
{
	
	global $LastRow;
	global $FieldName;
	global $RowName;
	global $RowActive;
	global $RowSkip;
	global $SQLAction;
	global $ActiveSeason;
	global $tmp_hostname_simhl;
	global $tmp_database_simhl;
	global $tmp_username_simhl;
	global $tmp_password_simhl;
	global $tmp_simhl;
	
	if ($name=="GAME"){
		$RowActive=1;
	}
	
	if ($RowActive==1){		
		$FieldName=$name;
	}
	
	$RowSkip=1;
	
    //echo "&lt;<font color=\"#0000cc\">$name</font>";
   // if (count($attribs)) {
        //foreach ($attribs as $k => $v) {
           // echo " <font color=\"#009900\">$k</font>=\"<font color=\"#990000\">$v</font>\"";
		   
       // }
    //}
   // echo "&gt;";
}
function endElement($parser, $name) 
{
   
	global $LastRow;
	global $FieldName;
	global $RowName;
	global $RowActive;
	global $RowSkip;
	global $SQLAction;
	global $ActiveSeason;
	global $tmp_hostname_simhl;
	global $tmp_database_simhl;
	global $tmp_username_simhl;
	global $tmp_password_simhl;
	global $tmp_simhl;
	global $TMP_GameNumber;
	global $TMP_Link;
	global $TMP_VisitorTeam;
	global $TMP_VisitorTeamScore;
	global $TMP_VisitorTeamGoal;
	global $TMP_VisitorTeamGoaler;
	global $TMP_HomeTeam;
	global $TMP_HomeTeamScore;
	global $TMP_HomeTeamGoal;
	global $TMP_HomeTeamGoaler;
	global $tmp_DomainName;
	global $tmp_current_Season;
	global $tmp_current_Folder;
	global $tmp_siteName;
	global $TMP_GameResultForward;
	
	if ($name=="GAME" && $RowActive==1){
		$RowActive=0;
		if ($SQLAction=="INSERT"){
			$GameType = substr($TMP_GameNumber, 0, 3);
			if($GameType!="Pro"){ $GameType="Farm";}
			$insertSQL = sprintf("INSERT INTO todaysgame (GameNumber,Link,VisitorTeam,VisitorTeamScore,VisitorTeamGoal,VisitorTeamGoaler,HomeTeam,HomeTeamScore,HomeTeamGoal,HomeTeamGoaler,Type,Season_ID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_GameNumber, "text"),
				GetSQLValueString($TMP_Link, "text"),
				GetSQLValueString($TMP_VisitorTeam,  "text"),
				GetSQLValueString($TMP_VisitorTeamScore, "double"),
				GetSQLValueString($TMP_VisitorTeamGoal, "text"),
				GetSQLValueString($TMP_VisitorTeamGoaler, "text"),
				GetSQLValueString($TMP_HomeTeam, "text"),
				GetSQLValueString($TMP_HomeTeamScore, "double"),
				GetSQLValueString($TMP_HomeTeamGoal, "text"),
				GetSQLValueString($TMP_HomeTeamGoaler, "text"),
				GetSQLValueString($GameType, "text"),
				GetSQLValueString($ActiveSeason, "int")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
		} elseif ($SQLAction=="UPDATE"){
			
			$updateSQL = sprintf("UPDATE todaysgame set Link=%s,VisitorTeam=%s,VisitorTeamScore=%s,VisitorTeamGoal=%s,VisitorTeamGoaler=%s,HomeTeam=%s,HomeTeamScore=%s,HomeTeamGoal=%s,HomeTeamGoaler=%s WHERE GameNumber=%s AND Season_ID=$ActiveSeason",
				GetSQLValueString($TMP_Link, "text"),
				GetSQLValueString($TMP_VisitorTeam,  "text"),
				GetSQLValueString($TMP_VisitorTeamScore, "double"),
				GetSQLValueString($TMP_VisitorTeamGoal, "text"),
				GetSQLValueString($TMP_VisitorTeamGoaler, "text"),
				GetSQLValueString($TMP_HomeTeam, "text"),
				GetSQLValueString($TMP_HomeTeamScore, "double"),
				GetSQLValueString($TMP_HomeTeamGoal, "text"),
				GetSQLValueString($TMP_HomeTeamGoaler, "text"),
				GetSQLValueString($TMP_GameNumber, "text")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
	
		}	
		$TMP_HomeTeamScore="";
		$TMP_HomeTeamGoal="";
		$TMP_VisitorTeamScore="";
		$TMP_VisitorTeamGoal="";
	}
	$RowSkip=0;
}
function characterData($parser, $data) 
{
	global $LastRow;
	global $FieldName;
	global $RowName;
	global $RowActive;
	global $RowSkip;
	global $SQLAction;
	global $ActiveSeason;
	global $tmp_hostname_simhl;
	global $tmp_database_simhl;
	global $tmp_username_simhl;
	global $tmp_password_simhl;
	global $tmp_simhl;
	global $TMP_GameNumber;
	global $TMP_Link;
	global $TMP_VisitorTeam;
	global $TMP_VisitorTeamScore;
	global $TMP_VisitorTeamGoal;
	global $TMP_VisitorTeamGoaler;
	global $TMP_HomeTeam;
	global $TMP_HomeTeamScore;
	global $TMP_HomeTeamGoal;
	global $TMP_HomeTeamGoaler;
	global $TMP_GameResultForward;
	
	if ($RowActive==1 && $RowSkip==1){
			if ($FieldName=="GAMENUMBER"){
				$TMP_GameNumber=$data;
				mysql_select_db($tmp_database_simhl, $tmp_simhl);
				$query_CheckPlayer = sprintf("SELECT GameNumber FROM todaysgame WHERE GameNumber='%s' AND Season_ID=%s", $TMP_GameNumber, $ActiveSeason);
				$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
				$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
				$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);				
				if ($totalRows_CheckPlayer == 0) {
					$SQLAction="INSERT";
				} else {
					$SQLAction="UPDATE";		
				}
				mysql_free_result($CheckPlayer);
				
				//echo $TMP_GameNumber." - ".$SQLAction."<br>"; // O\'reilly
				
			}
			if ($FieldName=="LINK"){$TMP_Link=$data;}
			if ($FieldName=="VISITORTEAM"){$TMP_VisitorTeam=$data;}
			if ($FieldName=="VISITORTEAMSCORE"){$TMP_VisitorTeamScore=$data;}
			if ($FieldName=="VISITORTEAMGOAL"){$TMP_VisitorTeamGoal=addslashes($data);}
			if ($FieldName=="VISITORTEAMGOALER"){$TMP_VisitorTeamGoaler=addslashes($data);}
			if ($FieldName=="HOMETEAM"){$TMP_HomeTeam=$data;}
			if ($FieldName=="HOMETEAMSCORE"){$TMP_HomeTeamScore=$data;}
			if ($FieldName=="HOMETEAMGOAL"){$TMP_HomeTeamGoal=addslashes($data);}
			if ($FieldName=="HOMETEAMGOALER"){$TMP_HomeTeamGoaler=addslashes($data);}
	}
}
function PIHandler($parser, $target, $data) 
{
    switch (strtolower($target)) {
        case "php":
            global $parser_file;
            // If the parsed document is "trusted", we say it is safe
            // to execute PHP code inside it.  If not, display the code
            // instead.
            if (trustedFile($parser_file[$parser])) {
                eval($data);
            } else {
                printf("Untrusted PHP code: <i>%s</i>", 
                        htmlspecialchars($data));
            }
            break;
    }
}
function defaultHandler($parser, $data) 
{
    //if (substr($data, 0, 1) == "&" && substr($data, -1, 1) == ";") {
    //    printf('<font color="#aa00aa">%s</font>', 
     //           htmlspecialchars($data));
    //} else {
    //    printf('<font size="-1">%s</font>', 
     //           htmlspecialchars($data));
   // }
}
function externalEntityRefHandler($parser, $openEntityNames, $base, $systemId,
                                  $publicId) {
    if ($systemId) {
        if (!list($parser, $fp) = new_xml_parser($systemId)) {
            printf("Could not open entity %s at %s\n", $openEntityNames,
                   $systemId);
            return false;
        }
        while ($data = fread($fp, 4096)) {
            if (!xml_parse($parser, $data, feof($fp))) {
                printf("XML error: %s at line %d while parsing entity %s\n",
                       xml_error_string(xml_get_error_code($parser)),
                       xml_get_current_line_number($parser), $openEntityNames);
                xml_parser_free($parser);
                return false;
            }
        }
        xml_parser_free($parser);
        return true;
    }
    return false;
}
function new_xml_parser($file) 
{
    global $parser_file;
    $xml_parser = xml_parser_create();
    xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, 1);
    xml_set_element_handler($xml_parser, "startElement", "endElement");
    xml_set_character_data_handler($xml_parser, "characterData");
    xml_set_processing_instruction_handler($xml_parser, "PIHandler");
    xml_set_default_handler($xml_parser, "defaultHandler");
    xml_set_external_entity_ref_handler($xml_parser, "externalEntityRefHandler");
    
    if (!($fp = @fopen($file, "r"))) {
        return false;
    }
    if (!is_array($parser_file)) {
        settype($parser_file, "array");
    }
    $parser_file[$xml_parser] = $file;
    return array($xml_parser, $fp);
}
if (!(list($xml_parser, $fp) = new_xml_parser($file))) {
    die("could not open XML input");
}
while ($data = fread($fp, 1000000)) {
    if (!xml_parse($xml_parser, $data, feof($fp))) {
        die(sprintf("XML error: %s at line %d\n",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
    }
}

xml_parser_free($xml_parser);

$updateSQL = "UPDATE config SET LastModifiedTodaysGames='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF TODAYS GAMES COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF TODAYS GAMES COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}

?>