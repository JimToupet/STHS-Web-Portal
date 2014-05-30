<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
$GetAction = "accept";
if (isset($_GET['action'])) {
  $GetAction = (get_magic_quotes_gpc()) ? $_GET['action'] : addslashes($_GET['action']);
}
$GetTeam = "1";
if (isset($_GET['teamnum'])) {
  $GetTeam = (get_magic_quotes_gpc()) ? $_GET['teamnum'] : addslashes($_GET['teamnum']);
}
$ID_GetRivalryID = "0";
if (isset($_GET['id'])) {
  $ID_GetRivalryID  = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}

$query_GetRiv = sprintf("SELECT Team1, Team2 FROM rivalry WHERE T_ID=".$ID_GetRivalryID);
$GetRiv = mysql_query($query_GetRiv, $connection) or die(mysql_error());
$row_GetRiv = mysql_fetch_assoc($GetRiv);

$query_GetTeam1 = sprintf("SELECT proteam.Email, proteam.EmailAlert, proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'",$row_GetRiv['Team1']);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);

$query_GetTeam2 = sprintf("SELECT proteam.Email, proteam.EmailAlert, proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'",$row_GetRiv['Team2']);
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

if ($GetAction == "accept") {
	if ($GetTeam == 1) {
		$updateSQL = "UPDATE rivalry SET Team1Approved='True' WHERE T_ID=".$ID_GetRivalryID;
	} else {
		$updateSQL = "UPDATE rivalry SET Team2Approved='True' WHERE T_ID=".$ID_GetRivalryID;
	}
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "RIVALRY - Accepted by the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'];
  	$MailMessage1 = "<p>The ".$row_GetTeam2['City']." ".$row_GetTeam2['Name']." has accepted the rivalry request. The request has been sent to the league for approval.  It may take up to 24 hours to get approval.</p>";
  	$MailMessage2 = "<p>A rivalry request between you and the  ".$row_GetTeam1['City']." ".$row_GetTeam1['Name']." has accepted by both teams.  The offer has been sent to the league for approval.  It may take up to 24 hours to get approval.</p>";
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO chat (chat.from,chat.to,message,sent,recd) values (%s,%s,%s,now(),0)",
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam2['Name'])), "text"),
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam['Name'])), "text"),
					GetSQLValueString($MailMessage, "text"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO chat (chat.from,chat.to,message,sent,recd) values (%s,%s,%s,now(),0)",
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam['Name'])), "text"),
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam2['Name'])), "text"),
					GetSQLValueString($MailMessage, "text"));

	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	
	
	$query_GetRivalry = sprintf("SELECT COUNT(T_ID) as TeamApproved FROM rivalry WHERE Team1Approved = 'True' AND Team2Approved = 'True' AND T_ID = %s", $ID_GetRivalryID);
	$GetRivalry = mysql_query($query_GetRivalry, $connection) or die(mysql_error());
	$row_GetRivalry = mysql_fetch_assoc($GetRivalry);
		
	if ($row_GetRivalry['TeamApproved'] == 1) {
		// To send HTML mail, the Content-type header must be set
		$subject = "RIVALRY APPROVAL BY BOTH TEAMS - ".strftime('%Y-%m-%d', strtotime('now'));
		$body = "A rivalry request has been approved by the two teams involved.  Please ACCEPT or DECLINE the request.";
		sendMail($_SESSION['site_Email'], $_SESSION['site_Email'], $subject, $body);
	}
	
	if ($row_GetTeam1['EmailAlert']==1){		
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage1);
	}
	
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage2);
	}	
	
	mysql_free_result($GetRivalry);
	
	$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "decline") {
	if ($GetTeam == 1) {
		$updateSQL = "UPDATE rivalry SET Team1Approved='Declined' WHERE T_ID=".$ID_GetRivalryID;
	} else {
		$updateSQL = "UPDATE rivalry SET Team2Approved='Declined' WHERE T_ID=".$ID_GetRivalryID;
	}
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "RIVALRY - declined by the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'];
  	$MailMessage1 = "<p>The ".$row_GetTeam2['City']." ".$row_GetTeam2['Name']." has declined your rivalry request.</p>";
	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $row_GetTeam2['Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $row_GetTeam2['Email'], $MailSubject, $MailMessage2);
	}
  	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	
	$insertSQL = sprintf("INSERT INTO chat (chat.from,chat.to,message,sent,recd) values (%s,%s,%s,now(),0)",
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam2['Name'])), "text"),
					GetSQLValueString(str_replace(" ","_",str_replace(" ","_",$row_GetTeam['Name'])), "text"),
					GetSQLValueString($MailMessage, "text"));

	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$deleteSQL = "DELETE FROM  rivalry WHERE T_ID=".$ID_GetRivalryID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

} else if ($GetAction == "commishaccept") {
	$updateSQL = "UPDATE rivalry SET CommishApproved='True' WHERE T_ID=".$ID_GetRivalryID;
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	
  	$MailSubject = "RIVALRY - Approved by the league";
  	$MailMessage1 = "<p>The League has Approved your RIVALRY with the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'].". Ça peut prendre jusqu'&agrave; 24 heures pour voir les changements sur le site web.</p>";
  	$MailMessage2 = "<p>The League has Approved your RIVALRY with the ".$row_GetTeam1['City']." ".$row_GetTeam1['Name'].". Ça peut prendre jusqu'&agrave; 24 heures pour voir les changements sur le site web.</p>";  
	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage2);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetRiv['Team1'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage2;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetRiv['Team2'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "commishdecline") {
	$updateSQL = "UPDATE rivalry SET CommishApproved='Declined' WHERE T_ID=".$ID_GetRivalryID;
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	
	$MailSubject = "RIVALRY - Refus&eacute;e by the league";
  	$MailMessage1 = "<p>The League has refus&eacute; your demande de RIVALRY with the ".$row_GetTeam2['City']." ".$row_GetTeam2['Name'].".  Vous pouvez contecter <a href='mailto:".$_SESSION['site_Email']."'>".$_SESSION['site_Email']."</a> pour plus d'informations.</p>";
  	$MailMessage2 = "<p>The League has refus&eacute; your demande de RIVALRY with the ".$row_GetTeam1['City']." ".$row_GetTeam1['Name'].".  Vous pouvez contecter <a href='mailto:".$_SESSION['site_Email']."'>".$_SESSION['site_Email']."</a> pour plus d'informations.</p>";
  	if ($row_GetTeam1['EmailAlert']==1){
		sendMail($row_GetTeam1['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage1);
	}
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $_SESSION['site_Email'], $MailSubject, $MailMessage2);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage1;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetRiv['Team1'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage2;	
	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($row_GetRiv['Team2'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
	$Result3 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
	$deleteSQL = "DELETE FROM rivalry WHERE T_ID=".$ID_GetRivalryID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
	
} else if ($GetAction == "remove") {
	$deleteSQL = "DELETE FROM rivalry WHERE T_ID=".$ID_GetRivalryID;
	$Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());
}

mysql_free_result($GetRiv);
mysql_free_result($GetTeam1);
mysql_free_result($GetTeam2);

$updateGoTo = "rivalry.php?Team=".$_SESSION['U_ID'];
header(sprintf("Location: %s", $updateGoTo));
?>