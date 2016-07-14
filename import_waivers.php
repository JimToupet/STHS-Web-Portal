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

//echo "<h4 align=center>Importing Waivers XML</h4>";
	  
if ($ID_GetAction == 1){
	$query_GetSeasons = sprintf("SELECT * FROM seasons WHERE S_ID=".$_SESSION['current_SeasonID']);
	$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
	$row_GetSeasons = mysql_fetch_assoc($GetSeasons);
	$file = $uploaddir . $row_GetSeasons['Waivers'];
	$updateGoTo = "import_csv_coaches.php?action=1";
} else {
	if (allowedExtension($_FILES['xmlFile']['name'],"xml")) {

		$file = $uploaddir . basename($_FILES['xmlFile']['name']);
		$updateGoTo = "upload.php";
		//$file = $uploaddir ."QMJHL0-ProTeam.xml";
		//echo basename($_FILES['xmlFile']['name']);
		if (move_uploaded_file($_FILES['xmlFile']['tmp_name'], $file)) {
			$updateSQL = "UPDATE seasons SET Waivers='".basename($_FILES['xmlFile']['name'])."' where S_ID=".$CurrentSeasonID;
			$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

		} else {
			echo "<h5 align=center>Unable to process Waivers file.  Please try uploading the file manually in previous page.</h5>";
			exit();
		}
	}
	else {
		echo "<FORM><div align=center><h3>Unable to upload file.  Please try again.</h3><INPUT TYPE='button' VALUE='Go Back' onClick='history.back()'></FORM></div>";
		exit();
	}
}

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
global $TMP_DayPutOnWaiver;
global $TMP_DayRemoveFromWaiver;
global $TMP_FromTeam;
global $TMP_Player;
global $TMP_ToTeam;


$tmp_hostname_simhl = DB_SERVER;
$tmp_database_simhl = DB_DATABASE;
$tmp_username_simhl = DB_USERNAME;
$tmp_password_simhl = DB_PASSWORD;
$tmp_simhl = $connection;

mysql_select_db($tmp_database_simhl, $connection);
$query_GetActiveSeason = "SELECT seasons.S_ID FROM seasons WHERE seasons.Active=1";
$GetActiveSeason = mysql_query($query_GetActiveSeason, $connection) or die(mysql_error());
$row_GetActiveSeason = mysql_fetch_assoc($GetActiveSeason);
$totalRows_GetActiveSeason = mysql_num_rows($GetActiveSeason);
$ActiveSeason=$row_GetActiveSeason['S_ID'];
mysql_free_result($GetActiveSeason);


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

	if ($name=="TYPEOUTPUTXMLWAIVER"){
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
	global $TMP_DayPutOnWaiver;
	global $TMP_DayRemoveFromWaiver;
	global $TMP_FromTeam;
	global $TMP_Player;
	global $TMP_ToTeam;

	if ($name=="TYPEOUTPUTXMLWAIVER" && $RowActive==1){
		$RowActive=0;
		
		if ($SQLAction=="INSERT"){
			$insertSQL = sprintf("INSERT INTO waiver (DayPutOnWaiver,DayRemoveFromWaiver,FromTeam,Player,ToTeam) VALUES (%s, %s, %s, %s, %s)",
				GetSQLValueString($TMP_DayPutOnWaiver, "int"),
				GetSQLValueString($TMP_DayRemoveFromWaiver, "int"),
				GetSQLValueString($TMP_FromTeam, "int"),
				GetSQLValueString($TMP_Player, "text"),
				GetSQLValueString($TMP_ToTeam, "int")
			);
			
			mysql_real_escape_string($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($insertSQL, $tmp_simhl) or die(mysql_error());
			
			
		} elseif ($SQLAction=="UPDATE"){
			
			$updateSQL = sprintf("UPDATE waiver set DayPutOnWaiver=%s,DayRemoveFromWaiver=%s,FromTeam=%s,Player=%s,ToTeam=%s  WHERE Player=%s",
				GetSQLValueString($TMP_Player, "text"),
				GetSQLValueString($TMP_DayPutOnWaiver, "int"),
				GetSQLValueString($TMP_DayRemoveFromWaiver, "int"),
				GetSQLValueString($TMP_FromTeam, "int"),
				GetSQLValueString($TMP_Player, "text"),
				GetSQLValueString($TMP_ToTeam, "int")
			);
			
			mysql_select_db($tmp_database_simhl, $tmp_simhl);
			$Result1 = mysql_query($updateSQL, $tmp_simhl) or die(mysql_error());
			
		}
		$TMP_DayPutOnWaiver="";
		$TMP_DayRemoveFromWaiver="";
		$TMP_FromTeam="";
		$TMP_Player="";
		$TMP_ToTeam="";
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
	global $TMP_DayPutOnWaiver;
	global $TMP_DayRemoveFromWaiver;
	global $TMP_FromTeam;
	global $TMP_Player;
	global $TMP_ToTeam;
	if ($RowActive==1 && $RowSkip==1){

			if ($FieldName=="PLAYER"){
				$TMP_Player = addslashes($data);
				mysql_select_db($tmp_database_simhl, $tmp_simhl);
				$query_CheckPlayer = sprintf("SELECT Player FROM waiver WHERE Player='%s'", $TMP_Player);
				$CheckPlayer = mysql_query($query_CheckPlayer, $tmp_simhl) or die(mysql_error());
				$row_CheckPlayer = mysql_fetch_assoc($CheckPlayer);
				$totalRows_CheckPlayer = mysql_num_rows($CheckPlayer);				
				if ($totalRows_CheckPlayer == 0) {
					$SQLAction="INSERT";
				} else {
					$SQLAction="UPDATE";		
				}
				mysql_free_result($CheckPlayer);
				
				//echo $TMP_Player." - ".$SQLAction."<br>"; // O\'reilly
				
			}
			if ($FieldName=="DAYPUTONWAIVER"){$TMP_DayPutOnWaiver=$data;}
			if ($FieldName=="DAYREMOVEFROMWAIVER"){$TMP_DayRemoveFromWaiver=$data;}
			if ($FieldName=="FROMTEAM"){$TMP_FromTeam=$data;}
			if ($FieldName=="TOTEAM"){$TMP_ToTeam=$data;}
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

$updateSQL = "UPDATE config SET LastModifiedWaivers='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."'";
$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if ($ID_GetAction == 1){
	//echo "<h6 align=center><b>IMPORT OF WAIVERS COMPLETE</b></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
} else {
	//echo "<h6 align=center><b>IMPORT OF WAIVERS COMPLETE</b><br><br><a href='upload.php'>Click here to return.</a></h6>\n";
	header(sprintf("Location: %s", $updateGoTo));
}


?>