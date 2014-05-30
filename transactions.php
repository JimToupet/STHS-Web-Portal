<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
$GetTeamID = "0";
if (isset($_SESSION['current_Team_ID'])) {
  $GetTeamID = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}

switch ($lang){ 
case 'en': 
	$l_team1 = "Team 1";
	$l_team2 = "Team 2";
	$l_team1Approve = "Team 1 Approval";
	$l_team2Approve = "Team 2 Approval";
	$l_CommishApprove = "Commish Approval";
	$l_LogOn = "Log in to create a transaction.";
	$l_select_team = "Select a team";
	$l_submit_trade = "Submit a trade";
	$l_submit_trade_alert = "Please select Team 2!";
	$l_First = "First";
	$l_Previous = "Previous";
	$l_Next = "Next";
	$l_Last = "Last";
	$l_NoGames = "No games available";
	$l_FutureConsiderations="Future Considerations";
	break; 

case 'fr': 
	$l_team1 = "&Eacute;quipe  1";
	$l_team2 = "&Eacute;quipe  2";
	$l_team1Approve = "Approbation &eacute;quipe 1";
	$l_team2Approve = "Approbation &eacute;quipe 2";
	$l_CommishApprove = "Approbation du Pr&eacute;sident";
	$l_LogOn = "Connectez-vous pour soumettre une transaction.";
	$l_select_team = "Choisissez une &eacute;quipe";
	$l_submit_trade = "Soumettez un &eacute;changes";
	$l_submit_trade_alert = "Veuillez choisir l'&eacute;quipe 2!";
	$l_First = "Premiere";
	$l_Previous = "Pr&eacute;c&eacute;dent";
	$l_Next = "Prochaine";
	$l_Last = "Derni&egrave;re";
	$l_NoGames = $l_None;
	$l_FutureConsiderations="Futures consid&eacute;rations";
	break;
} 

$maxRows_GetTransactions = 10;
$pageNum_GetTransactions = 0;
if (isset($_GET['pageNum_GetTransactions'])) {
  $pageNum_GetTransactions = $_GET['pageNum_GetTransactions'];
}
$startRow_GetTransactions = $pageNum_GetTransactions * $maxRows_GetTransactions;
$TID_GetTransactions = "0";
if (isset($_SESSION['current_Team'])) {
  $TID_GetTransactions = (get_magic_quotes_gpc()) ? $_SESSION['current_Team'] : addslashes($_SESSION['current_Team']);
}

if(isset($_SESSION['U_ID'])) { $userID=$_SESSION['U_ID']; } else { $userID=0; }
if ($GetTeamID == 0){
	$query_GetTransactions = sprintf("SELECT *, (SELECT count(ID) FROM likes WHERE ParentType=4 AND Parent_ID=T_ID AND Team=%s) as LikeComment FROM transactions ORDER BY DateCreated desc", $userID);
} else {
	$query_GetTransactions = sprintf("SELECT *, (SELECT count(ID) FROM likes WHERE ParentType=4 AND Parent_ID=T_ID AND Team=%s) as LikeComment FROM transactions WHERE (Team1=%s OR Team2=%s) ORDER BY DateCreated desc", $userID, $GetTeamID,$GetTeamID);
}
$query_limit_GetTransactions = sprintf("%s LIMIT %d, %d", $query_GetTransactions, $startRow_GetTransactions, $maxRows_GetTransactions);
$GetTransactions = mysql_query($query_limit_GetTransactions, $connection) or die(mysql_error());
$row_GetTransactions = mysql_fetch_assoc($GetTransactions);
if (isset($_GET['totalRows_GetTransactions'])) {
  $totalRows_GetTransactions = $_GET['totalRows_GetTransactions'];
} else {
  $all_GetTransactions = mysql_query($query_GetTransactions);
  $totalRows_GetTransactions = mysql_num_rows($all_GetTransactions);
}
$totalPages_GetTransactions = ceil($totalRows_GetTransactions/$maxRows_GetTransactions)-1;
$queryString_GetTransactions = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_GetTransactions") == false && 
        stristr($param, "totalRows_GetTransactions") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_GetTransactions = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_GetTransactions = sprintf("&totalRows_GetTransactions=%d%s", $totalRows_GetTransactions, $queryString_GetTransactions);



$query_GetTeams = sprintf("SELECT City, Name, Number FROM proteam ORDER BY proteam.City");
$GetTeams = mysql_query($query_GetTeams, $connection) or die(mysql_error());
$row_GetTeams = mysql_fetch_assoc($GetTeams);

$query_GetTeams2 = sprintf("SELECT City, Name, Number FROM proteam ORDER BY proteam.City");
$GetTeams2 = mysql_query($query_GetTeams2, $connection) or die(mysql_error());
$row_GetTeams2 = mysql_fetch_assoc($GetTeams2);

$TradeDeadlineDay=0;
$query_GetInfo = sprintf("SELECT TradeDeadlineDay FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$TradeDeadlineDay=$row_GetInfo['TradeDeadlineDay'];
mysql_free_result($GetInfo);

$query_GetLastDay = "select schedule.Day FROM schedule WHERE (schedule.Play='True' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);
if ($totalRows_GetLastDay==0){
	$Day_ID = 0;
} else {
	$Day_ID = $row_GetLastDay['Day'];
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_transactions;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
});;
</script>
<script type="text/javascript">
<!--
function validate_form ( )
{
    valid = true;
    if ( document.form1.team1.value == "" )
    {
        alert ( "Please select Team 1" );
        valid = false;
    }
	if ( document.form1.team2.value == "" )
    {
	alert ( "<?php echo $l_submit_trade_alert;?>" );
        valid = false;
    }
    return valid;
}
//-->
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
    
    <div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_transactions;?></h1></div>
    
    <div style="float:right; padding-top:5px;">
		<?php
		if(isset($_SESSION['U_ID']) && $_SESSION['U_Team'] != "") {
			if ($TradeDeadlineDay >= 1) {
			?>
			<form name="form1" action="trade.php" method="post" onSubmit="return validate_form();">
			<table>
			<tr>
			<td><strong><?php echo $l_team1;?></strong><br />
			<select name="team1" id="team1">
			<option selected="selected" value="<?php echo $_SESSION['U_ID']; ?>"><?php echo $_SESSION['U_City']." ".$_SESSION['U_Team']; ?></option>
			</select></td>
			<td><strong><?php echo $l_team2;?></strong><br />
			<select name="team2" id="team2">
			<option value="" selected="selected"><?php echo $l_select_team;?></option>
			<?php do { ?>
			<option value="<?php echo $row_GetTeams2['Number']; ?>"><?php echo $row_GetTeams2['City']." ".$row_GetTeams2['Name']; ?></option>
			<?php } while ($row_GetTeams2 = mysql_fetch_assoc($GetTeams2)); ?>
			</select></td>
			<td><br /><input type="submit" value="<?php echo $l_submit_trade;?>" class="button" /></td>
			</tr>
			</table>
			</form>
        <?php } } ?>
	</div>
    <br clear="all" />
	<br />
        
	<table  cellspacing="0" border="0" width="100%" class="tablesorterRates" >
    <thead>
    <tr>
        <th><?php echo $l_DateCreated;?></th>
        <th width="200" align="left"><?php echo $l_team1;?></th>
        <th width="200" align="left"><?php echo $l_team2;?></th>
        <th width="120" align="center"><?php echo $l_team1Approve;?></th>
        <th width="120" align="center"><?php echo $l_team2Approve;?></th>
        <th width="120" align="center"><?php echo $l_CommishApprove;?></th>
        <th>Likes</th>
    </tr>
    </thead>
    <tbody>
		<?php 
		if ($totalRows_GetTransactions > 0) {
			do { 
				
				$query_GetTeam1 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetTransactions['Team1']);
				$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
				$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
				$query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetTransactions['Team2']);
				$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
				$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

			if (($row_GetTransactions['Team2Approved'] != "False" || ($row_GetTransactions['Team2'] == $_SESSION['U_ID'] || $row_GetTransactions['Team1'] == $_SESSION['U_ID'])) || $_SESSION['U_Admin'] == 1){
		?>
		<tr>
			<td valign="top"><a><?php echo $row_GetTransactions['DateCreated']; ?></a></td>
			<td align="left" valign="top"><strong><?php echo $row_GetTeam1['City']." ".$row_GetTeam1['Name']; ?></strong><br /><?php echo $row_GetTransactions['Team1List']; ?></td>
			<td align="left" valign="top"><strong><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></strong><br /><?php echo $row_GetTransactions['Team2List']; ?></td>
			<td align="center" valign="top"><?php 
			if (isset($_SESSION['U_ID']) && $_SESSION['U_ID'] == $row_GetTransactions['Team1']){
				if ($row_GetTransactions['Team1Approved'] == "False") {
					echo "<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&teamnum=1&action=accept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&teamnum=1&action=decline'>".$l_Decline."</a>";
				} else {
					if ($row_GetTransactions['Team1Approved'] == "False"){
						echo $l_Waiting;
					}else if ($row_GetTransactions['Team1Approved'] == "Declined"){
						echo $l_Declined;
					}else {
						echo $l_Approved;
					}	
				}
			} else {
				if ($row_GetTransactions['Team1Approved'] == "False"){
					echo $l_Waiting;
				} else if ($row_GetTransactions['Team1Approved'] == "Declined"){
					echo $l_Declined;
				}else {
						echo $l_Approved;
				}
			}
			 ?></td>
			<td align="center" valign="top"><?php 
			if (isset($_SESSION['U_ID']) && $_SESSION['U_ID'] == $row_GetTransactions['Team2']){
				if ($row_GetTransactions['Team2Approved'] == "False") {
					echo "<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&teamnum=2&action=accept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&teamnum=2&action=decline'>".$l_Decline."</a>";
				} else {
					if ($row_GetTransactions['Team2Approved'] == "False"){
						echo $l_Waiting;
					} else if ($row_GetTransactions['Team2Approved'] == "Declined"){
						echo $l_Declined;
					}else {
						echo $l_Approved;
					}
				}
			} else {
				if ($row_GetTransactions['Team2Approved'] == "False"){
					echo $l_Waiting;
				} else if ($row_GetTransactions['Team2Approved'] == "Declined"){
					echo $l_Declined;
				}else {
					echo $l_Approved;
				}
			}
			 ?></td>
			<td align="center" valign="top"><?php 
				if (isset($_SESSION['U_Admin']) && $_SESSION['U_Admin'] == 1){
					if ($row_GetTransactions['CommishApproved'] == "False" && $row_GetTransactions['Team2Approved']=="True" && $row_GetTransactions['Team1Approved']=="True"){
						echo "<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&action=commishaccept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='trade_action.php?id=".$row_GetTransactions['T_ID']."&action=commishdecline'>".$l_Decline."</a>";
					} else if ($row_GetTransactions['CommishApproved'] == "False" && ($row_GetTransactions['Team2Approved']=="False" || $row_GetTransactions['Team1Approved']=="False")){
						echo $l_Waiting."<br><br><A href='trade_action.php?id=".$row_GetTransactions['T_ID']."&action=remove'>".$l_Remove."</a>";
					} else if ($row_GetTransactions['CommishApproved'] == "False" && ($row_GetTransactions['Team2Approved']=="Declined" || $row_GetTransactions['Team1Approved']=="Declined")){
						echo $l_NA."<br><br><A href='trade_action.php?id=".$row_GetTransactions['T_ID']."&action=remove'>".$l_Remove."</a>";
					} else {
						echo $l_Approved."<br><br><A href='trade_action.php?id=".$row_GetTransactions['T_ID']."&action=remove'>".$l_Remove."</a>";
					}
				} else {
					if ($row_GetTransactions['CommishApproved'] == "False"){
						echo $l_Waiting;
					} else if ($row_GetTransactions['CommishApproved'] == "Declined"){
						echo $l_Declined;
					} else {
						echo $l_Approved;
					}
				}
			 ?></td>
             <td align=right nowrap="nowrap"><?php
				$currentLikes = 0;
				$query_GetLikes = sprintf("SELECT Count(ID) as TotalLikes FROM likes WHERE ParentType=4 AND Parent_ID=%s",$row_GetTransactions['T_ID']);
				$GetLikes = mysql_query($query_GetLikes, $connection) or die(mysql_error());
				$row_GetLikes = mysql_fetch_assoc($GetLikes);
				$currentLikes = $row_GetLikes['TotalLikes'];
				if(isset($_SESSION['U_ID'])){
					if($row_GetTransactions['LikeComment'] > 0){
						echo $currentLikes.' Likes';
					} else {
						echo '<span><a href="" class="likeButton">Like</a> (<span type="4" id="'.$row_GetTransactions['T_ID'].'">'.$currentLikes.'</span>)</span>';
					}
				} else {
						echo $currentLikes.' Likes';
				}
				?></td>
		</tr>	
		<?php
			if ($row_GetTransactions['FutureConsiderations'] != "" && $row_GetTransactions['FutureConsiderations'] != "N/A"){	
				echo '<tr bgcolor="#'.$tmpRowColor.'"><td></td><td colspan="6"><strong>'.$l_FutureConsiderations.':</strong> '.$row_GetTransactions['FutureConsiderations'].'</td></tr>';
			} 
			
			}
			
		  	mysql_free_result($GetTeam1);
			mysql_free_result($GetTeam2);
			} while ($row_GetTransactions = mysql_fetch_assoc($GetTransactions)); 
		}
		?>
        </tbody>	
		</table>
		<br /><br />
		
        <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
        <tr>
            <th width="23%" align="center"><?php if ($pageNum_GetTransactions > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_GetTransactions=1", $currentPage, 0, $queryString_GetTransactions); ?>" style="font-weight:bold;"><?php echo $l_First;?></a>
                <?php } else { echo $l_First ;} // Show if not first page ?> </th>
            <th width="31%" align="center"><?php if ($pageNum_GetTransactions > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_GetTransactions=%d%s", $currentPage, max(0, $pageNum_GetTransactions - 1), $queryString_GetTransactions); ?>" style="font-weight:bold;"><?php echo $l_Previous;?></a>
                <?php } else { echo $l_Previous ;}// Show if not first page ?></th>
            <th width="23%" align="center"><?php if ($pageNum_GetTransactions < $totalPages_GetTransactions) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_GetTransactions=%d%s", $currentPage, min($totalPages_GetTransactions, $pageNum_GetTransactions + 1), $queryString_GetTransactions); ?>" style="font-weight:bold;"><?php echo $l_Next;?></a>
                <?php } else { echo $l_Next ;} // Show if not last page ?></th>
            <th width="23%" align="center"><?php if ($pageNum_GetTransactions < $totalPages_GetTransactions) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_GetTransactions=%d%s", $currentPage, $totalPages_GetTransactions, $queryString_GetTransactions); ?>" style="font-weight:bold;"><?php echo $l_Last;?></a>
                <?php } else { echo $l_Last ;} // Show if not last page ?></th>
          </tr>
         </thead>
        </table>
	
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($GetTransactions);
mysql_free_result($GetTeams);
mysql_free_result($GetTeams2);
?>