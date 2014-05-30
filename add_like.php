<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?PHP 

$ID = 0;
if (isset($_POST["id"])) {
  $ID = (get_magic_quotes_gpc()) ? $_POST["id"] : addslashes($_POST["id"]);
}
$PARENTTYPE = 0;
if (isset($_POST["type"])) {
  $PARENTTYPE = (get_magic_quotes_gpc()) ? $_POST["type"] : addslashes($_POST["type"]);
}

if(isset($_POST['id']))
{
//Inset into database  
$insertSQL = sprintf("INSERT INTO likes (Parent_ID, ParentType, Team, DateCreated) VALUES (%s,%s,%s,%s)",
						GetSQLValueString($ID, "int"),
                        GetSQLValueString($PARENTTYPE, "int"),
                        GetSQLValueString($_SESSION['U_ID'], "int"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

//0=comment 1=article 2=proscore 3=farmscore 4=trade
//If Game score, trade then check to see if there is a conversation, if not, start one
if($PARENTTYPE > 0){
	if($PARENTTYPE == 2 || $PARENTTYPE == 3){
		//score
		if($A_TYPE==2){
			$query_GetSchedule = sprintf("SELECT *, (SELECT City FROM proteam WHERE Number=Team1) as TeamName1, (SELECT City FROM proteam WHERE Number=Team2) as TeamName2  FROM schedule WHERE S_ID=%s", $ID);
			$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
			$row_GetSchedule= mysql_fetch_assoc($GetSchedule);
			$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
		} else {
			$query_GetSchedule = sprintf("SELECT * FROM farmschedule WHERE S_ID=%s", $ID);
			$GetSchedule = mysql_query($query_GetSchedule, $connection) or die(mysql_error());
			$row_GetSchedule= mysql_fetch_assoc($GetSchedule);
			$totalRows_GetSchedule = mysql_num_rows($GetSchedule);
		}

		$status = 'Likes game '.$row_GetDay['Number'].': '.$row_GetDay['TeamName1'].' '.$row_GetDay['HomeScore'].' - '.$row_GetDay['TeamName2'].' '.$row_GetDay['VisitorScore'];
		$query_GetConversation = sprintf("SELECT ID FROM comments WHERE A_ID=%s AND (A_TYPE=2 OR A_TYPE=3)", $ID);
	}
	if($PARENTTYPE == 4){
		//trade
		$query_GetTrade = sprintf("SELECT *, (SELECT City FROM proteam WHERE Number=Team1) as TeamName1, (SELECT City FROM proteam WHERE Number=Team2) as TeamName2 FROM transactions WHERE T_ID=%s", $ID);
		$GetTrade = mysql_query($query_GetTrade, $connection) or die(mysql_error());
		$row_GetTrade= mysql_fetch_assoc($GetTrade);
		$totalRows_GetTrade = mysql_num_rows($GetTrade);
		$status = 'Likes the trade between '.$row_GetTrade['TeamName1'].' and '.$row_GetTrade['TeamName2'].'.';
		$query_GetConversation = sprintf("SELECT ID FROM comments WHERE A_ID=%s AND A_TYPE=4", $ID);
	}
	if($PARENTTYPE == 1){
		//article
		$query_GetArticles = sprintf("SELECT A_ID,Headline FROM articles WHERE A_ID=%s", $ID);
		$GetArticles = mysql_query($query_GetArticles, $connection) or die(mysql_error());
		$row_GetArticles= mysql_fetch_assoc($GetArticles);
		$totalRows_GetArticles = mysql_num_rows($GetArticles);
		$status = "Likes <a href='news.php?article=".$row_GetArticles['A_ID']."'>".$row_GetArticles['Headline']."</a>.";
		$query_GetConversation = sprintf("SELECT ID FROM comments WHERE A_ID=%s AND A_TYPE=1", $ID);
	}
	
	$GetConversation = mysql_query($query_GetConversation, $connection) or die(mysql_error());
	$row_GetConversation = mysql_fetch_assoc($GetConversation);
	$totalRows_GetConversation = mysql_num_rows($GetConversation);
	
	if($totalRows_GetConversation==0){
		$insert_status=mysql_query("INSERT INTO comments (Comment, DateCreated, DateModified, Team, A_ID, A_Type) 
		VALUES ('".$status."', '".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', '".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."', ".$_SESSION['U_ID'].", ".$ID.", ".$PARENTTYPE.")") or die (mysql_error());
	}
}
?>