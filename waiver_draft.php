<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Change  = "CHANGE SEASON";
	$l_ADDDRAFT = "ADD NEW DRAFT";			
	$l_INACTIVE = "DRAFT IS INACTIVE";
	$l_DACTIVE = "DRAFT IS ACTIVE";
	$l_TurnOn = "TURN ON DRAFT";
	$l_TurnOff = "TURN OFF DRAFT";
	$l_EditDraft = "EDIT CURRENT DRAFT";
	$l_Round = "Round";
	$l_player = "Player";
	$l_OwnBy = "Owned By";
	$l_TimeLeft = "Time Left";
	$l_Overall = "Overall";
	$l_Select = "Make selection";
	$l_List = "Create a draft list";
	$l_Current = "Current Pick";
	break; 

case 'fr': 
	$l_Change  = "Changer de saison";
	$l_ADDDRAFT = "Rajouter un Nouveau Rep&ecirc;chage";	
	$l_INACTIVE = "DRAFT IS INACTIVE";
	$l_DACTIVE = "Le Rep&ecirc;chage et Inactif";
	$l_TurnOn = "D&eacute;buter le Rep&ecirc;chage";
	$l_TurnOff = "Quitez le Rep&ecirc;chage";
	$l_EditDraft = "Modifier le Rep&ecirc;chage";
	$l_Round = "Rond";
	$l_player = "Joueur";
	$l_OwnBy = "Propri&eacute;taire";
	$l_TimeLeft = "Le temps est parti";
	$l_Overall = "Rank";
	$l_Select = "Faites le choix";
	$l_List = "Faites une liste";
	$l_Current = "S&eacute;lection courante";
	break; 
} 

$LotteryPos = 0;
$LotteryCount = 0 ;

$ID_GetDraftYear = "0";
if (isset($_POST['Year'])) {
  $ID_GetDraftYear = (get_magic_quotes_gpc()) ? $_POST['Year'] : addslashes($_POST['Year']);
}
if($ID_GetDraftYear == "0"){
	$query_GetActiveDraft = sprintf("SELECT D_ID FROM waiver_draft WHERE DraftStatus='True'");
	$GetActiveDraft = mysql_query($query_GetActiveDraft, $connection) or die(mysql_error());
	$row_GetActiveDraft = mysql_fetch_assoc($GetActiveDraft);
	$totalRows_GetActiveDraft = mysql_num_rows($GetActiveDraft);
	if($totalRows_GetActiveDraft > 0){
		$ID_GetDraftYear = $row_GetActiveDraft["D_ID"];
	}
}

$query_GetDraftYears = sprintf("SELECT * FROM waiver_draft ORDER BY Season_ID desc, D_ID desc");
$GetDraftYears = mysql_query($query_GetDraftYears, $connection) or die(mysql_error());
$row_GetDraftYears = mysql_fetch_assoc($GetDraftYears);
$totalRows_GetDraftYears = mysql_num_rows($GetDraftYears);

if ($ID_GetDraftYear == 0 && $totalRows_GetDraftYears > 0){
	$ID_GetDraftYear = $row_GetDraftYears['D_ID'];
}

$query_GetDraftDetails = sprintf("SELECT * FROM waiver_draft WHERE D_ID=%s",$ID_GetDraftYear);
$GetDraftDetails = mysql_query($query_GetDraftDetails, $connection) or die(mysql_error());
$row_GetDraftDetails = mysql_fetch_assoc($GetDraftDetails);
$totalRows_GetDraftDetails = mysql_num_rows($GetDraftDetails);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_waiver_draft;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/ui.tabs.css">     


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

<script language="JavaScript" type="text/javascript">
	setTimeout('window.location = "waiver_draft.php"', 120000);
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
<div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_waiver_draft." - ".$row_GetDraftDetails['DraftName']; ?></h1></div>

<div style="float:right; padding-top:5px;">
    <form action="waiver_draft.php" method="post" name="form0">
    <select name="Year" id="Year">
    <?php do { ?>
    <option value="<?php echo $row_GetDraftYears['D_ID']; ?>" <?php if ($row_GetDraftDetails['D_ID']== $row_GetDraftYears['D_ID']){ echo "selected"; } ?>><?php echo $row_GetDraftYears['DraftName']; ?></option>
    <?php } while ($row_GetDraftYears = mysql_fetch_assoc($GetDraftYears)); ?>
    </select>  <input type="submit" value="<?php echo $l_Change;?>"  class="button" />
    </form>
</div>

<br clear="all" />


<div align="center">
<form action="waiver_draft_action.php" method="post" name="form1">
<input type="hidden" name="id" value="<?php echo $row_GetDraftDetails['D_ID']; ?>" />
<table align="center" border="0" cellpadding="4" cellspacing="0">
<tr><td style="vertical-align:bottom; padding-bottom:10px;"><?php 
	if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
		echo "<a href='add_waiver_draft.php' class='button add'><strong>".$l_ADDDRAFT."</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}
?></td>
<td align="center" style="vertical-align:bottom"><h3>
<?php if ($row_GetDraftDetails['DraftStatus'] == "False" || $totalRows_GetDraftYears == 0){
	echo "<span style='color:red;'>".$l_INACTIVE."</span>";
	if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
		echo "<input type='hidden' name='action' value='True'>";
		echo "<br><br><input type='submit' value='".$l_TurnOn."' class='button' />";
	}
} else {
	echo "<span style='color:green;'>".$l_DACTIVE."</span>";
	if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
		echo "<input type='hidden' name='action' value='False'>";
		echo "<br><br><input type='submit' value='".$l_TurnOff."' class='button' />";
	}
}
?>
</h3></td>
<td style="vertical-align:bottom; padding-bottom:10px;"><?php 
        if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1 && $totalRows_GetDraftYears > 0){
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='edit_waiver_draft.php?id=".$row_GetDraftDetails['D_ID']."' class='button edit'><strong>".$l_EditDraft."</strong></a>";
        }
    ?></td>
</tr>
</table>
</form>
</div>

<?php 
if($totalRows_GetDraftDetails > 0){

$DraftPickTime = $row_GetDraftDetails['DraftPickTime'];

$query_GetNextPick = sprintf("SELECT D_ID FROM waiver_draftpicks WHERE Name = '' AND Draft_ID=%s ORDER BY Round, Overall Limit 0,1", $row_GetDraftDetails['D_ID']);
$GetNextPick = mysql_query($query_GetNextPick, $connection) or die(mysql_error());
$row_GetNextPick = mysql_fetch_assoc($GetNextPick);
$totalRows_GetNextPick = mysql_num_rows($GetNextPick);

$query_GetRounds = sprintf("SELECT L.*, P.LogoTiny, P.City, P.Name as ProTeamName, L.TeamName as TeamNumber FROM proteam as P, waiver_draftpicks as L WHERE L.Draft_ID=%s AND P.Number=L.TeamName ORDER BY L.Round, L.Overall", $row_GetDraftDetails['D_ID']);
$GetRounds = mysql_query($query_GetRounds, $connection) or die(mysql_error());
$row_GetRounds = mysql_fetch_assoc($GetRounds);
$totalRows_GetRounds = mysql_num_rows($GetRounds);

$tmpRowColor="000000";
$tmpRowCount=0;
$LastRound=0;
$i=0;
$pos=0;
$tmppos=0;
$tmp_i=0;
$timeCounter=0;
$hourCounter=0;
$timeExpired=0;

do {
	$i=$i+1;
	$pos=$pos+1;
	$totalEuros = 0;
if ($LastRound <> $row_GetRounds['Round']){
	$LastRound=$row_GetRounds['Round'];
?>
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
	<th colspan="7"><h2><?php echo $l_Round." ".$row_GetRounds['Round'];?></h2></th>
</tr>
</thead>
<tbody>
<tr style="background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>">
	<td style="padding-top: 2px; font-weight: bold; width:100px; text-align:center;">POS.</td>
	<td style="padding-top: 2px; font-weight: bold; width:150px; text-align:center;" colspan="2"><?php echo $l_nav_team ;?></td>
	<td style="padding-top: 2px; font-weight: bold; width:120px; text-align:center;"><?php echo $l_TimeLeft;?></td>
	<td style="padding-top: 2px; font-weight: bold; text-align:center;"><?php echo $l_player;?></td>
</tr>
<?php 
}
	$tmppos = $tmppos + 1;
	$tmp_i = $tmp_i + 1;
	
	if ($tmpRowCount==1){
		$tmpRowColor="E9ECF3";
		$tmpRowCount=0;
	} else {
		$tmpRowColor="FFFFFF";
		$tmpRowCount=1;
	}
	if ($row_GetNextPick['D_ID'] == $row_GetRounds['D_ID']){
		$tmpRowColor="FFFF00";
	}
	
	echo '<tr bgcolor="#'.$tmpRowColor.'"><td>'.$tmppos.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$tmp_i.' '.$l_Overall.')</td>';
	echo '<td width=15><img border=0 src="'.$_SESSION['DomainName'].'/image/logos/small/'.$row_GetRounds['LogoTiny'].'" width=15></img></td>';
	echo '<td>'.$row_GetRounds['City'].' '.$row_GetRounds['ProTeamName'].'</td>';
	
	$query_GetOwnedBy = sprintf("SELECT LogoTiny, City, Name FROM proteam WHERE Number=%s", $row_GetRounds['TeamName']);
	$GetOwnedBy = mysql_query($query_GetOwnedBy, $connection) or die(mysql_error());
	$row_GetOwnedBy = mysql_fetch_assoc($GetOwnedBy);
	$totalRows_GetOwnedBy = mysql_num_rows($GetOwnedBy);
	
	echo '<td width="100"><div align="center">';
	if ($row_GetRounds['Name'] != ''){
		echo "-";
	} else {
		if ($row_GetDraftDetails['DraftStatus'] == "True" ){
			$timeCounter = $timeCounter + 1;
			$query_GetNextTime = sprintf("SELECT DateCreated FROM waiver_draftpicks WHERE DateCreated <> '' ORDER BY DateCreated desc Limit 0,1");
			$GetNextTime = mysql_query($query_GetNextTime, $connection) or die(mysql_error());
			$row_GetNextTime = mysql_fetch_assoc($GetNextTime);
			$totalRows_GetNextTime = mysql_num_rows($GetNextTime);
			$timeStamp = strtotime($row_GetNextTime['DateCreated']);
			
			$NewTime = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp + (($DraftPickTime * $timeCounter)*60)));
			$NewTime2 = date(strftime('%Y-%m-%d %H:%M:%S', $timeStamp));
			
	
				//echo strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))." - ".$NewTime." - ".$timeExpired;
				if (strftime('%Y-%m-%d %H:%M:%S', strtotime('now')) >= $NewTime && $timeExpired==0){
						echo '<form method="post" action="nba_waiver_draftpick.php" name="NBA">';
						echo '<input type="hidden" name="year" value="'.$row_GetRounds['Year'].'">';
						echo '<input type="hidden" name="id" value="'.$row_GetRounds['D_ID'].'">';
						echo '<input type="hidden" name="draft" value="'.$ID_GetDraftYear.'">';
						echo '<input type="hidden" name="team" value="'.$row_GetRounds['TeamName'].'">';
						echo '<input type="hidden" name="round" value="'.$tmppos.'">';
						echo '<input type="hidden" name="overview" value="'.$tmp_i.'">';
						echo '</form>';
						echo '<script language="javascript">document.NBA.submit();</script>';
						$timeExpired = 1;
				}
				

			if($timeCounter == (60 / $DraftPickTime)){
				$hourCounter = $hourCounter + 1;
				$timeCounter = 0;
			}
			
			if($hourCounter == 0){
				$tmpMinute =  date("i", strtotime($NewTime) - strtotime($NewTime2));	
				if ($tmpMinute == $DraftPickTime){
					echo "current picking";
				} else {
					echo date("i", strtotime($NewTime) - strtotime($NewTime2))." minutes";
				}
			} else {
				echo $hourCounter." hour(s) <br />".date("i", strtotime($NewTime) - strtotime($NewTime2))." minutes";			
			}
		} else {
			echo "Draft is not active";
		}
	}
	echo '</div></td>';
	echo '<td width="300"><div align="center">';
	if ($_SESSION['JuniorLeague'] == 'True'){
		$query_Get50ManAge = sprintf("select (select count(P_ID) as ID from prospects where TeamNumber=P.Number ) as Prospect, (select count(ID) as ID from players where Team=P.Number AND Retired=0) as PAge, (select count(ID) as ID from goalies where Team=P.Number AND Retired=0) as GAge, P.Number, P.Name from proteam as P WHERE P.Number=%s group by P.Number", $row_GetRounds['TeamNumber']);
		$Get50ManAge = mysql_query($query_Get50ManAge, $connection) or die(mysql_error());
		$row_Get50ManAge = mysql_fetch_assoc($Get50ManAge);
		$RosterLimit = $row_Get50ManAge['PAge'] + $row_Get50ManAge['GAge'] + $row_Get50ManAge['Prospect'];
		//echo $RosterLimit;
	}
	if($row_GetDraftDetails["Type"] == "Euro"){					
		$query_GetEuro = sprintf("SELECT COUNT(Name) as Euros FROM `players` WHERE Country NOT IN ('USA','CAN') AND Retired=0 AND Team=%s",$row_GetRounds['TeamNumber']);
		$GetEuro = mysql_query($query_GetEuro, $connection) or die(mysql_error());
		$row_GetEuro = mysql_fetch_assoc($GetEuro);
		$totalRows_GetEuro = mysql_num_rows($GetEuro);
		
		$query_GetEuroG = sprintf("SELECT COUNT(Name) as Euros FROM `goalies` WHERE Country NOT IN ('USA','CAN') AND Retired=0 AND Team=%s",$row_GetRounds['TeamNumber']);
		$GetEuroG = mysql_query($query_GetEuroG, $connection) or die(mysql_error());
		$row_GetEuroG = mysql_fetch_assoc($GetEuroG);
		$totalRows_GetEuroG = mysql_num_rows($GetEuroG);
		$totalEuros = $row_GetEuro['Euros'] + $row_GetEuroG['Euros'];
		$EuroLimit = 2;
		//echo $totalEuros;
	}
	if ($row_GetRounds['Name'] == ''){
		if ($row_GetDraftDetails['DraftStatus'] == "True" ){
			if ($row_GetNextPick['D_ID'] == $row_GetRounds['D_ID']){
				if (isset($_SESSION['U_ID']) && ($_SESSION['U_ID'] == $row_GetRounds['TeamName'] || $_SESSION['U_Admin']==1) && $_SESSION['U_Team'] <> ''){
					if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
					else if($row_GetDraftDetails["Type"] == "Regular" && $_SESSION['JuniorLeague'] == 'True' && $RosterLimit >= 50){ echo "Pass"; } 
					else { echo '<a href="make_waiver_draftpick.php?draft='.$ID_GetDraftYear.'&id='.$row_GetRounds['D_ID'].'&team='.$row_GetRounds['TeamName'].'&overview='.$tmp_i.'&round='.$tmppos.'">'.$l_Select.'</a>';}
				} else {
					if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
					else { echo $l_Current; }
				}
			} else {
				if (isset($_SESSION['U_ID']) && ($_SESSION['U_ID'] == $row_GetRounds['TeamName'] || $_SESSION['U_Admin']==1) && $_SESSION['U_Team'] <> ''){
					if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
					else if($row_GetDraftDetails["Type"] == "Regular" && $_SESSION['JuniorLeague'] == 'True' && $RosterLimit >= 50){ echo "Pass"; } 
					else { echo '<a href="make_waiver_draftlist.php?draft='.$ID_GetDraftYear.'&id='.$row_GetRounds['D_ID'].'&team='.$row_GetRounds['TeamName'].'&overview='.$tmp_i.'&round='.$tmppos.'">'.$l_List.'</a>';}
				} else {
					if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
					else if($row_GetDraftDetails["Type"] == "Regular" && $_SESSION['JuniorLeague'] == 'True' && $RosterLimit >= 50){ echo "Pass"; } 
					else { echo "-";}
				}
			}
		} else {
			if (isset($_SESSION['U_Admin']) && isset($_SESSION['U_ID']) && ($_SESSION['U_ID'] == $row_GetRounds['TeamName'] || $_SESSION['U_Admin']==1) && $_SESSION['U_Team'] <> ''){
				if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
					else if($row_GetDraftDetails["Type"] == "Regular" && $_SESSION['JuniorLeague'] == 'True' && $RosterLimit >= 50){ echo "Pass"; } 
				else { echo '<a href="make_waiver_draftlist.php?draft='.$ID_GetDraftYear.'&id='.$row_GetRounds['D_ID'].'&team='.$row_GetRounds['TeamName'].'&overview='.$tmp_i.'&round='.$tmppos.'">'.$l_List.'</a>'; }
			} else {	
				if($row_GetDraftDetails["Type"] == "Euro" && $totalEuros >= $EuroLimit){ echo "Pass"; $NewTime = strftime('%Y-%m-%d %H:%M:%S', strtotime('now')); } 
				else if($row_GetDraftDetails["Type"] == "Regular" && $_SESSION['JuniorLeague'] == 'True' && $RosterLimit >= 50){ echo "Pass"; } 
			}
		}
	} else {
			$query_GetPlayer = sprintf("SELECT 'Player' as Type, Number FROM players WHERE Name='%s' UNION ALL SELECT 'Goalie' as Type, Number FROM goalies WHERE Name='%s'", $row_GetRounds['Name'], $row_GetRounds['Name']);
			$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
			$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
			$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
			if($row_GetPlayer['Type']=='Player'){
				echo '<a href="player.php?player='.$row_GetPlayer["Number"].'">'.$row_GetRounds["Name"].'</a>';
			} else if($row_GetPlayer['Type']=='Goalie'){
				echo '<a href="goalie.php?player='.$row_GetPlayer["Number"].'">'.$row_GetRounds["Name"].'</a>';
			} else {
				echo $row_GetRounds["Name"];
			}
	}	
	//echo "<BR>".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))." - ".$NewTime." - ".$timeExpired;
	echo '</div></td></tr>'; 
	

if ($_SESSION['total_teams'] == $i){
	$i=0;
	$tmppos=0;
?>
</tbody>
</table><br /><br />
<?php
}
} while ($row_GetRounds = mysql_fetch_assoc($GetRounds)); 
}
?>
	</td>
</tr>
</table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
