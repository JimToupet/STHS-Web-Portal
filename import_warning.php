<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_MailSubject = "Notice - %item1 contract is expiring";
	$l_MailMessageUFA  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>My client's contract will be expiring at the end of this season.   Do not forget to log onto the website and negotiate a contract extension before it is too late.  <br><br>If you fail to sign a contract before the end of this season, he will become a unrestricted free agent.";
	$l_MailMessageRFA  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>My client's contract will be expiring at the end of this season.   Do not forget to log onto the website and negotiate a contract extension before it is too late.  <br><br>If you fail to sign a contract before the end of this season, he will become a restricted free agent. <strong>You must at least send one offer sheet to him to hold onto his contract rights.</strong>  If no offer sheet is sent to him, he will become an unrestricted free agent.";
	
	$l_MailSubjectExh = "Notice - %item1 complaining of exhaustion";
	$l_MailMessageExh  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>My client is compaining that he is being over played by the team's coach.  If this continues you risk the chance of injury of occuring.  Please review and manage your teams lines.";

	break; 

case 'fr': 
	$l_MailSubject = "Avertissement - au-dessus de la limite d&apos;Europ&eacute;en de l&apos;&eacute;quipe 2";
	$l_MailMessageUFA  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>Mon client&apos; ; le contrat de s expirera &agrave; la fin de cette saison. N&apos;oubliez pas de noter sur le site Web et de n&eacute;gocier une extension de contrat avant qu&apos;il soit trop tard. Si vous ne signez pas un contrat avant la fin de cette saison, il deviendra un agent libre sans restriction.";
	$l_MailMessageRFA  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>Mon client&apos; ; le contrat de s expirera &agrave; la fin de cette saison. N&apos;oubliez pas de noter sur le site Web et de n&eacute;gocier une extension de contrat avant qu&apos;il soit trop tard. Si vous ne signez pas un contrat avant la fin de cette saison, il deviendra un agent libre restreint. Vous devez au moins lui envoyer une feuille d&apos;offre pour se tenir sur ses droites de contrat. Si aucune feuille d&apos;offre ne lui est envoy&eacute;e, il deviendra un agent libre sans restriction.";

	$l_MailSubjectExh = "Notice - %item1 complaining of exhaustion";
	$l_MailMessageExh  = "<div style='float:right; display:block; text-align:center; font-size:9px; padding-left:10px;'>%item1</div>My client is compaining that he is being over played by the team's coach.  If this continues you risk the chance of injury of occuring.  Please review and manage your teams lines.";
	break;
} 


$query_GetWebInfo = sprintf("SELECT * FROM config");
$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);
$UFA=$row_GetWebInfo['UFA'];

if ($_SESSION['JuniorLeague'] == 'False'){
	$query_GetUpcomming = "SELECT 1 FROM players as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number)  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 UNION ALL SELECT 1 FROM goalies as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number)  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0";
	$GetUpcomming = mysql_query($query_GetUpcomming, $connection) or die(mysql_error());
	$row_GetUpcomming = mysql_fetch_assoc($GetUpcomming);
	$totalRows_GetUpcomming = mysql_num_rows($GetUpcomming);
	$GetNoticePCT = floor($totalRows_GetUpcomming * 0.01);
	
	$query_GetPlayerInfo = "SELECT P.Age, P.Name, P.Number, P.Photo, P.Team, P.Position FROM players as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number)  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 UNION ALL SELECT P.Age, P.Name, P.Number, P.Photo, P.Team, P.Position FROM goalies as P WHERE Not Exists (SELECT 1 FROM playerscontractoffers AS O WHERE O.Player=P.Number)  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 ORDER BY RAND() LIMIT 0,".$GetNoticePCT;
	$GetPlayerInfo = mysql_query($query_GetPlayerInfo, $connection) or die(mysql_error());
	$row_GetPlayerInfo = mysql_fetch_assoc($GetPlayerInfo);
	$totalRows_GetPlayerInfo = mysql_num_rows($GetPlayerInfo);
	
	if($totalRows_GetPlayerInfo > 0){
	do { 
		
		$query_GetWarning = sprintf("SELECT Number, Email FROM proteam WHERE Number=%s", $row_GetPlayerInfo['Team']);
		$GetWarning = mysql_query($query_GetWarning, $connection) or die(mysql_error());
		$row_GetWarning = mysql_fetch_assoc($GetWarning);
		$totalRows_GetWarning = mysql_num_rows($GetWarning);
		
		if ($totalRows_GetWarning > 0){
			
			$tmpTxtItems = array("%item1");
			$updatedTxtItems = array($row_GetPlayerInfo['Name']);
			$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $l_MailSubject);
			
			if($row_GetPlayerInfo['Age'] < $UFA){
				$tmpTxtItems = array("%item1");
				$updatedTxtItems = array(getPlayerAgent($row_GetPlayerInfo['Number'], $row_GetPlayerInfo['Position'], $connection));
				$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $l_MailMessageRFA);
			} else {
				$tmpTxtItems = array("%item1");
				$updatedTxtItems = array(getPlayerAgent($row_GetPlayerInfo['Number'], $row_GetPlayerInfo['Position'], $connection));
				$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $l_MailMessageUFA);
			}
			
			sendMail($row_GetWarning['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);
			$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
			$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($row_GetWarning['Number'], "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
			$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
			
		}
	} while ($row_GetPlayerInfo = mysql_fetch_assoc($GetPlayerInfo)); 
	}
}


$query_GetExhuasted = "SELECT 1 FROM players as P WHERE CON < 97 AND P.Team > 0 AND P.Retired=0 AND (P.Injury = '' OR P.Injury = 'Exhaustion') UNION ALL SELECT 1 FROM goalies as P WHERE CON < 97 AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 AND (P.Injury = '' OR P.Injury = 'Exhaustion')";
$GetExhuasted = mysql_query($query_GetExhuasted, $connection) or die(mysql_error());
$row_GetExhuasted = mysql_fetch_assoc($GetExhuasted);
$totalRows_GetExhuasted = mysql_num_rows($GetExhuasted);
$GetNoticePCT = floor($totalRows_GetExhuasted * 0.01);

$query_GetExhuastedInfo = "SELECT P.Age, P.Name, P.Number, P.Photo, P.Team, P.Position FROM players as P WHERE  CON < 96  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 UNION ALL SELECT P.Age, P.Name, P.Number, P.Photo, P.Position, P.Team FROM goalies as P WHERE  CON < 96  AND P.Contract=1 AND P.Team > 0 AND P.Retired=0 ORDER BY RAND() LIMIT 0,".$GetNoticePCT;
$GetExhuastedInfo = mysql_query($query_GetExhuastedInfo, $connection) or die(mysql_error());
$row_GetExhuastedInfo = mysql_fetch_assoc($GetExhuastedInfo);
$totalRows_GetExhuastedInfo = mysql_num_rows($GetExhuastedInfo);

if($totalRows_GetExhuastedInfo > 0){
do { 
	
	$query_GetWarning = sprintf("SELECT Number, Email FROM proteam WHERE Number=%s", $row_GetExhuastedInfo['Team']);
	$GetWarning = mysql_query($query_GetWarning, $connection) or die(mysql_error());
	$row_GetWarning = mysql_fetch_assoc($GetWarning);
	$totalRows_GetWarning = mysql_num_rows($GetWarning);
	
	if ($totalRows_GetWarning > 0){
		
		$tmpTxtItems = array("%item1");
		$updatedTxtItems = array($row_GetExhuastedInfo['Name']);
		$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $l_MailSubjectExh);
	
		$tmpTxtItems = array("%item1");
		$updatedTxtItems = array(getPlayerAgent($row_GetExhuastedInfo['Number'], $row_GetExhuastedInfo['Position'], $connection));
		$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $l_MailMessageExh);
	
		sendMail($row_GetWarning['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage);		
		$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;		
			$insertSQL = sprintf("INSERT INTO teamhistory (Value,DateCreated,Team,Season_ID,Viewed) values (%s,%s,%s,%s,'False')",
								GetSQLValueString(addslashes($MailMessage), "text"),
								GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
								GetSQLValueString($row_GetWarning['Number'], "int"),
								GetSQLValueString($_SESSION['current_Season'], "text"));
		$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
		
	}
} while ($row_GetExhuastedInfo = mysql_fetch_assoc($GetExhuastedInfo)); 
}

$updateGoTo = "upload.php";
header(sprintf("Location: %s", $updateGoTo));
?>