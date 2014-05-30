<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?PHP 
switch ($lang){ 
case 'en': 
	$MailSubject = '%item1 sent you a message.';
	$MailMessage = '<a href="%item1">%item2 sent you a message</a>.<hr>%item3';
	break; 

case 'fr': 
	$MailSubject = '%item1 sent you a message.';
	$MailMessage = '<a href="%item1">%item2 sent you a message</a>.<hr>%item3';
	break;
} 

$GetTeam = 0;
if (isset($_POST["team"])) {
 $GetTeam = (get_magic_quotes_gpc()) ? $_POST["team"] : addslashes($_POST["team"]);
}
$status = "";
if (isset($_POST["msg"])) {
 $status = (get_magic_quotes_gpc()) ? $_POST["msg"] : addslashes($_POST["msg"]);
}
$status = stripslashes($status);
$status = strip_tags($status);
$status = nl2br(ParseSQL($status));

//Inset into database  
$insertSQL = sprintf("INSERT INTO chat (chat.from,chat.to,message,sent,recd) values (%s,%s,%s,now(),0)",
					GetSQLValueString(str_replace(" ","_",$_SESSION['U_Team']), "text"),
					GetSQLValueString(str_replace(" ","_",$GetTeam), "text"),
					GetSQLValueString($status, "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
					GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
					GetSQLValueString(str_replace(" ","_",$_SESSION['U_Team']), "text"),
					GetSQLValueString($_SESSION['current_SeasonID'], "int"),
					GetSQLValueString("Email", "text"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

$query_GetEmail = sprintf("SELECT Number, Email, EmailAlert FROM proteam WHERE Name='%s'", $GetTeam);
$GetEmail = mysql_query($query_GetEmail, $connection) or die(mysql_error());
$row_GetEmail = mysql_fetch_assoc($GetEmail);

$link_url = $_SESSION['DomainName'] . "/view_conversation.php?id=".$_SESSION['U_ID'];
$tmpTxtItems = array("%item1");
$updatedTxtItems = array($_SESSION['U_Name']);
$MailSubject = str_replace($tmpTxtItems, $updatedTxtItems, $MailSubject);

$tmpTxtItems = array("%item1", "%item2", "%item3");
$updatedTxtItems = array($link_url,  $_SESSION['U_Name'],$status);
$MailMessage = str_replace($tmpTxtItems, $updatedTxtItems, $MailMessage);

if ($row_GetEmail['EmailAlert']==1){		
	sendMail($row_GetEmail['Email'], $_SESSION['U_Email'], $MailSubject, $MailMessage);
}


echo '<div class="msg_row">';
echo '<div class="msg_icon"><img src="'.$_SESSION['Avatar'].'" width="50" height="50" border="0" /></div>';
echo '<div class="msg_comment"><a class="msg_link" href="#">'.$_SESSION['U_Name']." (".$_SESSION['U_City']." ".str_replace(" ","_",$_SESSION['U_Team']).")".'</a>';
echo '<br />'.$status.'</div>';
echo '<div class="msg_date">'.strftime('%Y-%m-%d %H:%M:%S', strtotime('now')).'</div><br clear="all" />';
echo '</div>';

?>