<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_LeagueFile = "League File";
	$l_RemoveAll = "Remove All";
	$l_LastUpload = "Last Upload";
	$l_XML = "CSV/XML Files";
	$l_UploadXML = "Upload XML";
	$l_UploadCSV = "Upload CSV";
	$l_UploadLeagueFile = "Upload League File";
	$l_Uploading = "Uploading File";
	$l_ProFarm = "PRO and Farm League";
	$l_OverCap = "Team Payroll over ";
	$l_UnderCap = "Team Payroll under ";
	$l_CapSalary = " salary cap";
	$l_SendEmail = "Send Warning";
	$l_AllTeams = "All teams are within the salary cap";
	$l_JUNIORLEAGUE = "JUNIOR LEAGUE";
	$l_nav_burried_list = "Burried In Minors";
	break; 
	
case 'fr': 	
	$l_LeagueFile = "Fichier de la Ligue";
	$l_RemoveAll = "TOUT SUPPRIMER";
	$l_LastUpload = "Derni&egrave;re Mise &agrave; Jour";
	$l_XML = "Fichiers XML";
	$l_UploadXML = "Mettre &agrave; jour XML";
	$l_UploadCSV = "Mettre &agrave; jour CSV";
	$l_UploadLeagueFile = "Mettre &agrave; jour le fichier Ligue";
	$l_Uploading = "Mise &agrave; jour des fichiers";
	$l_ProFarm = "Ligue Pro et ligue affili&eacute;e";
	$l_OverCap = "Livre de paie d'&eacute;quipe plus de ";
	$l_UnderCap = "Livre de paie d'&eacute;quipe dessous ";
	$l_CapSalary = " salaires";
	$l_SendEmail = "Envoyez l'avertissement";
	$l_AllTeams = "Toutes les &eacute;quipes sont dans le plafond de salaire";
	$l_JUNIORLEAGUE = "Ligue junior";
	$l_nav_burried_list = "Soit envoyez dans les mineurs o&ugrave; Enterrez dans les mineurs";

	break; 
} 

if($_SESSION['U_Admin']!=1){
	$updateGoTo = "login.php";
	header(sprintf("Location: %s", $updateGoTo));
}

if(!isset($_SESSION['current_SeasonID'])){
	$updateGoTo = "seasons.php";
	header(sprintf("Location: %s", $updateGoTo));
}
					
$querysetBIG="SET SESSION SQL_BIG_SELECTS=1";
mysql_query($querysetBIG);

$query_GetGMInfo = sprintf("SELECT * FROM config");
$GetGMInfo = mysql_query($query_GetGMInfo, $connection) or die(mysql_error());
$row_GetGMInfo = mysql_fetch_assoc($GetGMInfo);
$rfa=24;
$rfa=$row_GetGMInfo['RFA'];
$wavsalary=15;
$wavsalary=$row_GetGMInfo['WaiverSalaryExemption'];
$wavmin=15;
$wavmin=$row_GetGMInfo['WaiverMinimumGames'];
$wavAge=25;
$wavAge=$row_GetGMInfo['WaiverAgeExemption'];
$salcap=50000000;
$salcap=$row_GetGMInfo['SalaryCap'];

$query_GetSalary = sprintf("SELECT s.TotalPlayersSalaries, s.Number, t.Name, t.City FROM proteam as t, proteamstandings as s WHERE s.Number=t.Number AND s.Season_ID=%s ORDER BY s.TotalPlayersSalaries", $_SESSION['current_SeasonID']);
$GetSalary = mysql_query($query_GetSalary, $connection) or die(mysql_error());
$row_GetSalary = mysql_fetch_assoc($GetSalary);
$totalRows_GetSalary = mysql_num_rows($GetSalary);

$query_GetMinors= sprintf("SELECT proteam.Name as Team, players.Team as TeamNumber,  players.Number, players.Name, players.Salary1 FROM players, playerstats, proteam WHERE  proteam.Number=players.Team AND players.Status0 < 2 AND players.Retired=0 AND  players.Salary1 >= %s AND players.Age >= %s AND players.Team > 0 AND players.Name=playerstats.Name AND playerstats.ProGP >= %s AND playerstats.Season_ID=%s GROUP BY players.Name", $wavsalary, $wavAge, $wavmin, $_SESSION['current_SeasonID'] );
$GetMinors = mysql_query($query_GetMinors, $connection) or die(mysql_error());
$row_GetMinors = mysql_fetch_assoc($GetMinors);
$totalRows_GetMinors = mysql_num_rows($GetMinors);

$query_GetMinorsG= sprintf("SELECT proteam.Name as Team, goalies.Team as TeamNumber, goalies.Number, goalies.Name, goalies.Salary1 FROM goalies, goaliestats, proteam WHERE  proteam.Number=goalies.Team AND goalies.Status1 < 2 AND goalies.Retired=0 AND  goalies.Salary1 >= %s AND goalies.Age >= %s AND goalies.Team > 0 AND goalies.Name=goaliestats.Name AND goaliestats.ProGP >= %s AND goaliestats.Season_ID=%s GROUP BY goalies.Name", $wavsalary, $wavAge, $wavmin, $_SESSION['current_SeasonID'] );
$GetMinorsG = mysql_query($query_GetMinorsG, $connection) or die(mysql_error());
$row_GetMinorsG = mysql_fetch_assoc($GetMinorsG);
$totalRows_GetMinorsG = mysql_num_rows($GetMinorsG);

$query_GetSalarys = sprintf("SELECT e.*, p.Abbre as Team, p.Number FROM playerscontractoffers as e, proteam as p WHERE (e.Team=p.Name OR e.Team=p.Number) AND Type='Extension' ORDER BY DateCreated DESC");
$GetSalarys = mysql_query($query_GetSalarys, $connection) or die(mysql_error());
$row_GetSalarys = mysql_fetch_assoc($GetSalarys);
$totalRows_GetSalarys = mysql_num_rows($GetSalarys);

$query_GetFA = sprintf("SELECT e.*, p.Abbre as Team, p.Number FROM playerscontractoffers as e, proteam as p WHERE e.Team=p.Number AND (Type='Signed' OR  Type='RFA Signed') GROUP BY e.Player ORDER BY DateCreated DESC");
$GetFA = mysql_query($query_GetFA, $connection) or die(mysql_error());
$row_GetFA = mysql_fetch_assoc($GetFA);
$totalRows_GetFA = mysql_num_rows($GetFA);

$query_GetTransactions = sprintf("SELECT * FROM transactions WHERE Team1Approved='True' AND Team2Approved='True' AND CommishApproved='False' ORDER BY DateCreated desc");
$GetTransactions = mysql_query($query_GetTransactions, $connection) or die(mysql_error());
$row_GetTransactions = mysql_fetch_assoc($GetTransactions);
$totalRows_GetTransactions = mysql_num_rows($GetTransactions);

$query_GetRivalry = sprintf("SELECT * FROM rivalry WHERE Team1Approved='True' AND Team2Approved='True' AND CommishApproved='False' ORDER BY DateCreated desc");
$GetRivalry = mysql_query($query_GetRivalry, $connection) or die(mysql_error());
$row_GetRivalry = mysql_fetch_assoc($GetRivalry);
$totalRows_GetRivalry = mysql_num_rows($GetRivalry);

$query_GetWaivers = sprintf("SELECT w.*, p.Contract, p.Salary1, p.Name, p.Overall, p.PosC, p.PosLW, p.PosRW, p.PosD, 'False' as PosG FROM waiver as w, players as p WHERE w.Player = p.Number AND w.FromTeam=p.Team UNION ALL SELECT w.*, g.Contract, g.Salary1, g.Name, g.Overall, 'False' as PosC, 'False' as PosLW, 'False' as PosRW, 'False' as PosD, 'True' as PosG FROM waiver as w, goalies as g WHERE (w.Player-10000) = g.Number AND w.FromTeam=g.Team ");
$GetWaivers = mysql_query($query_GetWaivers, $connection) or die(mysql_error());
$row_GetWaivers = mysql_fetch_assoc($GetWaivers);
$totalRows_GetWaivers = mysql_num_rows($GetWaivers);

$query_GetCoach = sprintf("SELECT e.*, c.Name, p.Abbre as Team, p.Number FROM coaches as c, playerscontractoffers as e, proteam as p WHERE e.Team=p.Number AND c.Name=e.Player AND e.Type='Coach Signed' GROUP BY c.Name ORDER BY DateCreated desc" );
$GetCoach = mysql_query($query_GetCoach, $connection) or die(mysql_error());
$row_GetCoach = mysql_fetch_assoc($GetCoach);
$totalRows_GetCoach = mysql_num_rows($GetCoach);

$query_GetRequests = "SELECT R.*, P.Name as Team FROM playerschangerequest as R, proteam as P WHERE R.Team=P.Number";
$GetRequests = mysql_query($query_GetRequests, $connection) or die(mysql_error());
$row_GetRequests = mysql_fetch_assoc($GetRequests);
$totalRows_GetRequests = mysql_num_rows($GetRequests);



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_administrator_report;?> - <?php echo $_SESSION['SiteName'] ; ?></title>


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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tablesorter.min.js"></script>  
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.ttabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
  $("#tabs").ttabs(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
		
	
  $(".approveExt").live('click', function(e) {
	  var id = $(this).attr("id");
	  var teamnumber = $(this).attr("teamnumber");
	  var player = $(this).attr("player");
	  var DATA = 'id=' + id + '&player=' + player + '&teamnumber=' + teamnumber;
	  $(this).removeAttr('href');
	  $(this).replaceWith("<?php echo $l_Approved;?>");	
		$.ajax({
				type: "POST",
				url: "confirm_transaction.php",
				data: DATA,
				cache: false,
				success: function(msg){
					//alert(msg);
				}
		});
		return false;
	});
});;
</script>

<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to clear this log?")) {
    document.location = delUrl;
  }
}
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
fieldset{
border:1px solid #333;
border-bottom:1px solid #666;
border-right:1px solid #666;
padding:10px;
}

.fieldsetright {display:display:block; float:left; width:450px; margin:0px 8px 0px 8px;}
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
    <h1><?php echo $l_nav_administrator_report;?></h1>
    <br clear="all"/>
    
    <div id="tabs">
            <div id="tabs-1"><h3>The League</h3>
            
            <div class="fieldsetright">
            	<?php if ($totalRows_GetSalary > 0){?>
                <strong style="text-transform:uppercase;"><a href="finance.php"><?php echo $l_OverCap;?> $<?php echo number_format($row_GetGMInfo['SalaryCap'],0); ?> <?php echo $l_CapSalary;?></a></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <tbody>
                <?php 
                $i = 0;
                do { 
					if ($row_GetSalary['TotalPlayersSalaries'] > $row_GetGMInfo['SalaryCap']){
						$i = $i + 1;
						echo "<tr><td>".$row_GetSalary['City']." ".$row_GetSalary['Name']."</td><td>$".number_format($row_GetSalary['TotalPlayersSalaries'],0)."</td><td align=right><a href='send_over_cap_warning.php?teamNumber=".$row_GetSalary['Number']."'>".$l_SendEmail."</a></td></tr>";
					}
                } while ($row_GetSalary = mysql_fetch_assoc($GetSalary));
				if($i==0){ echo "<tr><td colspan=3>".$l_AllTeams."</td></tr>";}
                ?>
                </tbody>
                </table>
                
                <br />
                <strong style="text-transform:uppercase;"><a href="finance.php"> <?php echo $l_UnderCap;?> $<?php echo number_format($row_GetGMInfo['MinimumSalaryCap'],0); ?>  <?php echo $l_CapSalary;?></a></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <tbody>
                <?php 
                $i = 0;
				mysql_data_seek($GetSalary,0);
                while ($row_GetSalary = mysql_fetch_assoc($GetSalary)){ 
					if ($row_GetSalary['TotalPlayersSalaries'] < $row_GetGMInfo['MinimumSalaryCap']){
						$i = $i + 1;
                        echo "<tr><td>".$row_GetSalary['City']." ".$row_GetSalary['Name']."</td><td>$".number_format($row_GetSalary['TotalPlayersSalaries'],0)."</td><td align=right><a href='send_under_cap_warning.php?teamNumber=".$row_GetSalary['Number']."'>".$l_SendEmail."</a></td></tr>";
                     }
                } 
				if($i==0){ echo "<tr><td colspan=3>".$l_AllTeams."</td></tr>";}
                ?>
                </tbody>
                </table>	
                <?php } ?>
                
				<?php 
                if ($totalRows_GetWaivers > 0) {
					echo '<br>';
					echo '<strong style="text-transform:uppercase;"><a href="waiver_list.php">'.$l_nav_waiver_list.'</a></strong>';
                    echo '<table  cellspacing="0" border="0" width="100%" class="tablesorter" >';
                    do { 
                ?>
                    <tr><td><?php echo $row_GetWaivers['Name']; ?></td>
                    <td align="center">
                    <?php
						$query_GetClaims = sprintf("SELECT c.WC_ID, p.Abbre, p.Number FROM waiver_claims as c, waiver as w, proteam as p where c.Team=p.Number AND w.Player='%s' AND w.WID=c.W_ID ORDER BY p.Abbre",addslashes($row_GetWaivers['Player']) );
						$GetClaims = mysql_query($query_GetClaims, $connection) or die(mysql_error());
						$row_GetClaims = mysql_fetch_assoc($GetClaims);
						$totalRows_GetClaims = mysql_num_rows($GetClaims);
						if ($totalRows_GetClaims > 0) {
							$i=0;
							$tmpPlacedBid = 0;
							do {
								echo $row_GetClaims['Abbre'];
								$i=$i+1;
								if ($i < $totalRows_GetClaims){
									echo ", ";
								}
								if($row_GetClaims['Number']==$_SESSION['U_ID']){
									$tmpPlacedBid = 1;
								}
							} while ($row_GetClaims = mysql_fetch_assoc($GetClaims)); 
						} 
					?>
                    </td>
                    <td align="right"><a href="remove_waiver.php?id=<?php echo $row_GetWaivers['WID']; ?>"><?php echo $l_Remove;?></a></td></tr>
                <?php } while ($row_GetWaivers = mysql_fetch_assoc($GetWaivers)); 
                  echo '</table>';  
                }
				?>	
                
                <?php 
                if ($totalRows_GetMinors > 0 ||  $totalRows_GetMinorsG > 0) {
					echo '<br>';
					echo '<strong style="text-transform:uppercase;">'.$l_nav_burried_list.'</strong>';
                    echo '<table  cellspacing="0" border="0" width="100%" class="tablesorter" >';
                    do { 
                ?>
                    <tr><td><a href="player.php?player=<?php echo $row_GetMinors['Number']; ?>"><?php echo $row_GetMinors['Name']."</a></td><td>".$row_GetMinors['Team']."</td><td>$".number_format($row_GetMinors['Salary1'],0); ?></td><td align=right><a href='send_burried_warning.php?player=<?php echo $row_GetMinors['Number'];?>&type=player'><?php echo $l_SendEmail;?></a></td></tr>
                <?php } while ($row_GetMinors = mysql_fetch_assoc($GetMinors));
				     do { 
				?>
                    <tr><td><a href="goalie.php?player=<?php echo $row_GetMinorsG['Number']; ?>"><?php echo $row_GetMinorsG['Name']."</a></td><td>".$row_GetMinorsG['Team']."</td><td>$".number_format($row_GetMinorsG['Salary1'],0); ?></td><td align=right><a href='send_burried_warning.php?player=<?php echo $row_GetMinorsG['Number'];?>&type=goalie'><?php echo $l_SendEmail;?></a></td></tr>
                <?php } while ($row_GetMinorsG = mysql_fetch_assoc($GetMinorsG));
                  echo '</table>';  
                }
				?>
                
                <?php 
                if ($totalRows_GetRequests > 0) {
					echo '<br>';
					echo '<strong style="text-transform:uppercase;">'.$l_nav_player_change_request.'</strong>';
                    echo '<table  cellspacing="0" border="0" width="100%" class="tablesorter" >';
                    do { 
                ?>
                	<tr>
                    <td><?php echo $row_GetRequests['Team']; ?></td>
                    <td><?php echo $row_GetRequests['Type']; ?></td>
                    <td><a href="<?php echo $row_GetRequests['URL'];?>" target="_blank"><?php echo $row_GetRequests['Request']; ?></a></td>
                    <td align="right"><a href="remove_request.php?id=<?php echo $row_GetRequests['ID']; ?>"><?php echo $l_Remove;?></a></td>
                    </tr>
                <?php  } while ($row_GetRequests = mysql_fetch_assoc($GetRequests)); 
                  echo '</table>';  
                }
				?>	


            
             <?php
				if ($totalRows_GetTransactions > 0) {
				echo "<br />";
				echo '<strong style="text-transform:uppercase;"><a href="transactions.php">'.$l_nav_transactions.'</a></strong>';
				?>
				<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
				<tbody>
				<?php
				do { 
					
					$query_GetTeam1 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetTransactions['Team1']);
					$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
					$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
					$query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetTransactions['Team2']);
					$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
					$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
				?>
					<tr>
						<td valign="top" width="50%"><strong><?php echo $row_GetTeam1['City']." ".$row_GetTeam1['Name']; ?></strong><br /><?php echo $row_GetTransactions['Team1List']; ?></td>
						<td valign="top"><strong><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></strong><br /><?php echo $row_GetTransactions['Team2List']; ?></td>
					</tr>
                    <?php if ($row_GetTransactions['FutureConsiderations'] != ""){?>
					<tr><td colspan="2">Future Considerations: <?php echo $row_GetTransactions['FutureConsiderations']; ?></td></tr>
				<?php 
					}
				} while ($row_GetTransactions = mysql_fetch_assoc($GetTransactions));
				?>
				</tbody>
				</table>
				<?php } ?>		
                
                
                <?php
                if ($totalRows_GetRivalry > 0) {
                ?>
                <br>
                <strong style="text-transform:uppercase;"><a href="rivalry.php"><?php echo $l_nav_rivalry;?></a></strong>
				<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <?php
                do { 
                
                $query_GetTeam1 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetRivalry['Team1']);
                $GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
                $row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
                $query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetRivalry['Team2']);
                $GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
                $row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
                ?>
                    <tr>
                        <td valign="top" width="50%"><strong><?php echo $row_GetTeam1['City']." ".$row_GetTeam1['Name']; ?></strong><br /><?php echo $row_GetRivalry['Team1List']; ?></td>
                        <td valign="top"><strong><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></strong><br /><?php echo $row_GetRivalry['Team2List']; ?></td>
                    	<td align="right"><a href="rivalry_action.php?action=commishaccept&id=<?php echo $row_GetRivalry['T_ID']; ?>">Confirm</a></td>
                    </tr>
                <?php 
                } while ($row_GetRivalry = mysql_fetch_assoc($GetRivalry));
                ?>
                </table>
                <?php } ?>	
				
            </div>
    
            <div class="fieldsetright"> 
            <strong style="text-transform:uppercase;"><?php echo $l_XML;?></strong>
			<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
              <tr <?php if ($row_GetGMInfo['LastModifiedLeagueFile'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td><?php echo $row_GetGMInfo['LeagueFile']; ?></a></td>
                <td align="right" ><?php echo $row_GetGMInfo['LastModifiedLeagueFile']; ?></td>
                </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedProTeams'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Pro Teams</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedProTeams']; ?></td>
              </tr>
              
  			<?php if($_SESSION['current_FarmLeague'] == "True"){?>
              <tr <?php if ($row_GetGMInfo['LastModifiedFarmTeams'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Farm Teams</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedFarmTeams']; ?></td>
              </tr>
            <?php } ?>
  
              <tr <?php if ($row_GetGMInfo['LastModifiedPlayers'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Players</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedPlayers']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedGoalies'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td><?php echo $l_Goalie;?></td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedGoalies']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedSchedule'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Pro Schedule</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedSchedule']; ?></td>
              </tr> 
              
 			 <?php if($_SESSION['current_FarmLeague'] == "True"){?>
              <tr <?php if ($row_GetGMInfo['LastModifiedFarmSchedule'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Farm Schedule</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedFarmSchedule']; ?></td>
              </tr> 
 			 <?php } ?>
  
              <tr <?php if ($row_GetGMInfo['LastModifiedTodaysGames'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Todays Games</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedTodaysGames']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedWaivers'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Waivers</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedWaivers']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedCoaches'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Coaches</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedCoaches']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedProspects'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Prospects</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedProspects']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedDraftPicks'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Draft Picks</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedDraftPicks']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedTransactionHistory'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Transactions</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedTransactionHistory']; ?></td>
              </tr>
              <tr <?php if ($row_GetGMInfo['LastModifiedTeamHistory'] < strftime('%Y-%m-%d', strtotime('now'))) {echo "bgcolor='#FFFF00'";} ?>>
                <td>Team History</td>
                <td align="right"><?php echo $row_GetGMInfo['LastModifiedTeamHistory']; ?></td>
              </tr>
            </table>
                
                
                </div>
                 <br clear="all" />
                
                <?php if($totalRows_GetCoach > 0){?>
                <br clear="all" /><br clear="all" />
             
             	<strong style="text-transform:uppercase;"><?php echo $l_nav_coaches;?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_coaches;?></th>
                    <th><?php echo $l_nav_team;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                    <th><a title="No Trade">Team</a></th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpSalary1 = 0;
				$tmpSalary2 = 0;
				$tmpSalary3 = 0;
				$tmpSalary4 = 0;
				$tmpSalary5 = 0;
				$tmpSalary6 = 0;
				$tmpSalary7 = 0;
				$tmpSalary8 = 0;
				$tmpSalary9 = 0;
				$tmpSalary10 = 0;
				
				
				do { 
					$query_GetPlayerName = sprintf("SELECT Name FROM coaches WHERE Number=%s", $row_GetFA['Player']);
					$GetPlayerName = mysql_query($query_GetPlayerName, $connection) or die(mysql_error());
					$row_GetPlayerName = mysql_fetch_assoc($GetPlayerName);
					$playerName = $row_GetPlayerName['Name'];
				?>
                  <tr>
                    <td nowrap><?php echo $playerName; ?></td>
                	<td align="center"><?php echo $row_GetCoach['Team']; ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary1'] > 0){ echo "$".number_format($row_GetCoach['Salary1'],0); $tmpSalary1 = $tmpSalary1 + $row_GetCoach['Salary1']; } else { echo "-"; } ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary2'] > 0){ echo "$".number_format($row_GetCoach['Salary2'],0); $tmpSalary2 = $tmpSalary2 + $row_GetCoach['Salary2']; } else if (isset($row_GetContractExt['Salary1']) && $row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0)."</span>";  $tmpSalary2 = $tmpSalary2 + $row_GetContractExt['Salary1'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary3'] > 0){ echo "$".number_format($row_GetCoach['Salary3'],0); $tmpSalary3 = $tmpSalary3 + $row_GetCoach['Salary3']; } else if (isset($row_GetContractExt['Salary2']) && $row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0)."</span>";  $tmpSalary3 = $tmpSalary3 + $row_GetContractExt['Salary2'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary4'] > 0){ echo "$".number_format($row_GetCoach['Salary4'],0); $tmpSalary4 = $tmpSalary4 + $row_GetCoach['Salary4']; } else if (isset($row_GetContractExt['Salary3']) && $row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0)."</span>";  $tmpSalary4 = $tmpSalary4 + $row_GetContractExt['Salary3'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary5'] > 0){ echo "$".number_format($row_GetCoach['Salary5'],0); $tmpSalary5 = $tmpSalary5 + $row_GetCoach['Salary5']; } else if (isset($row_GetContractExt['Salary4']) && $row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0)."</span>";  $tmpSalary5 = $tmpSalary5 + $row_GetContractExt['Salary4'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary6'] > 0){ echo "$".number_format($row_GetCoach['Salary6'],0); $tmpSalary6 = $tmpSalary6 + $row_GetCoach['Salary6']; } else if (isset($row_GetContractExt['Salary5']) && $row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0)."</span>";  $tmpSalary6 = $tmpSalary6 + $row_GetContractExt['Salary5'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary7'] > 0){ echo "$".number_format($row_GetCoach['Salary7'],0); $tmpSalary7 = $tmpSalary7 + $row_GetCoach['Salary7']; } else if (isset($row_GetContractExt['Salary6']) && $row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0)."</span>";  $tmpSalary7 = $tmpSalary7 + $row_GetContractExt['Salary6'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary8'] > 0){ echo "$".number_format($row_GetCoach['Salary8'],0); $tmpSalary8 = $tmpSalary8 + $row_GetCoach['Salary8']; } else if (isset($row_GetContractExt['Salary7']) && $row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0)."</span>";  $tmpSalary8 = $tmpSalary8 + $row_GetContractExt['Salary7'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary9'] > 0){ echo "$".number_format($row_GetCoach['Salary9'],0); $tmpSalary9 = $tmpSalary9 + $row_GetCoach['Salary9']; } else if (isset($row_GetContractExt['Salary8']) && $row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0)."</span>";  $tmpSalary9 = $tmpSalary9 + $row_GetContractExt['Salary8'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetCoach['Salary10'] > 0){ echo "$".number_format($row_GetCoach['Salary10'],0); $tmpSalary10 = $tmpSalary10 + $row_GetCoach['Salary10']; } else if (isset($row_GetContractExt['Salary9']) && $row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0)."</span>";  $tmpSalary10 = $tmpSalary10 + $row_GetContractExt['Salary9'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php echo $row_GetCoach['FarmPro']; ?></td>
                    <td align="right"><?php if ($row_GetCoach['Approved']=='False'){ ?><a href="#" class="approveExt" player="<?php echo addslashes($playerName);?>" teamnumber="<?php echo $row_GetCoach['Number'];?>" id="<?php echo $row_GetCoach['PR_ID']; ?>">Confirm</a><?php } else { echo $l_Approved; } ?></td>
					<td align="right"><a href="remove_transaction.php?id=<?php echo $row_GetCoach['PR_ID']; ?>"><?php echo $l_Remove;?></a></td>
                  </tr>
                <?php 
				} while ($row_GetCoach = mysql_fetch_assoc($GetCoach)); 
				
				?>
                </tbody>
                <tfoot> 
                <tr>
                	<td colspan="16" align="right"><a href="javascript:confirmDelete('remove_coaches.php');"><strong><?php echo $l_RemoveAll;?></strong></a></td>
                  </tr>
              	</tfoot>
                </table>    
                <?php } ?>
        </div>



		<?php if($totalRows_GetFA > 0 ){?>
        <div id="tabs-2"><h3>Free Agents</h3>                     
             	<strong style="text-transform:uppercase;"><?php echo $l_nav_unrestricted_free_agents." / ".$l_nav_restricted_free_agents;?></strong>
                <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_players;?></th>
                    <th><?php echo $l_nav_team;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                    <th><a title="No Trade">NT</a></th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpSalary1 = 0;
				$tmpSalary2 = 0;
				$tmpSalary3 = 0;
				$tmpSalary4 = 0;
				$tmpSalary5 = 0;
				$tmpSalary6 = 0;
				$tmpSalary7 = 0;
				$tmpSalary8 = 0;
				$tmpSalary9 = 0;
				$tmpSalary10 = 0;
				
				do { 
				if($row_GetFA['PlayerType']=='player'){
					$query_GetPlayerName = sprintf("SELECT Name FROM players WHERE Number=%s", $row_GetFA['Player']);
					$GetPlayerName = mysql_query($query_GetPlayerName, $connection) or die(mysql_error());
					$row_GetPlayerName = mysql_fetch_assoc($GetPlayerName);
					$playerName = $row_GetPlayerName['Name'];
				}else{
					$query_GetPlayerName = sprintf("SELECT Name FROM goalies WHERE Number=%s", $row_GetFA['Player']);
					$GetPlayerName = mysql_query($query_GetPlayerName, $connection) or die(mysql_error());
					$row_GetPlayerName = mysql_fetch_assoc($GetPlayerName);
					$playerName = $row_GetPlayerName['Name'];
				}
				?>
                  <tr>
                    <td nowrap><?php echo $playerName;?></td>
                	<td align="center"><?php echo $row_GetFA['Team']; ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary1'] > 0){ echo "$".number_format($row_GetFA['Salary1'],0); $tmpSalary1 = $tmpSalary1 + $row_GetFA['Salary1']; } else { echo "-"; } ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary2'] > 0){ echo "$".number_format($row_GetFA['Salary2'],0); $tmpSalary2 = $tmpSalary2 + $row_GetFA['Salary2']; } else if (isset($row_GetContractExt['Salary1']) && $row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0)."</span>";  $tmpSalary2 = $tmpSalary2 + $row_GetContractExt['Salary1'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary3'] > 0){ echo "$".number_format($row_GetFA['Salary3'],0); $tmpSalary3 = $tmpSalary3 + $row_GetFA['Salary3']; } else if (isset($row_GetContractExt['Salary2']) && $row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0)."</span>";  $tmpSalary3 = $tmpSalary3 + $row_GetContractExt['Salary2'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary4'] > 0){ echo "$".number_format($row_GetFA['Salary4'],0); $tmpSalary4 = $tmpSalary4 + $row_GetFA['Salary4']; } else if (isset($row_GetContractExt['Salary3']) && $row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0)."</span>";  $tmpSalary4 = $tmpSalary4 + $row_GetContractExt['Salary3'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary5'] > 0){ echo "$".number_format($row_GetFA['Salary5'],0); $tmpSalary5 = $tmpSalary5 + $row_GetFA['Salary5']; } else if (isset($row_GetContractExt['Salary4']) && $row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0)."</span>";  $tmpSalary5 = $tmpSalary5 + $row_GetContractExt['Salary4'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary6'] > 0){ echo "$".number_format($row_GetFA['Salary6'],0); $tmpSalary6 = $tmpSalary6 + $row_GetFA['Salary6']; } else if (isset($row_GetContractExt['Salary5']) && $row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0)."</span>";  $tmpSalary6 = $tmpSalary6 + $row_GetContractExt['Salary5'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary7'] > 0){ echo "$".number_format($row_GetFA['Salary7'],0); $tmpSalary7 = $tmpSalary7 + $row_GetFA['Salary7']; } else if (isset($row_GetContractExt['Salary6']) && $row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0)."</span>";  $tmpSalary7 = $tmpSalary7 + $row_GetContractExt['Salary6'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary8'] > 0){ echo "$".number_format($row_GetFA['Salary8'],0); $tmpSalary8 = $tmpSalary8 + $row_GetFA['Salary8']; } else if (isset($row_GetContractExt['Salary7']) && $row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0)."</span>";  $tmpSalary8 = $tmpSalary8 + $row_GetContractExt['Salary7'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary9'] > 0){ echo "$".number_format($row_GetFA['Salary9'],0); $tmpSalary9 = $tmpSalary9 + $row_GetFA['Salary9']; } else if (isset($row_GetContractExt['Salary8']) && $row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0)."</span>";  $tmpSalary9 = $tmpSalary9 + $row_GetContractExt['Salary8'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['Salary10'] > 0){ echo "$".number_format($row_GetFA['Salary10'],0); $tmpSalary10 = $tmpSalary10 + $row_GetFA['Salary10']; } else if (isset($row_GetContractExt['Salary9']) && $row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0)."</span>";  $tmpSalary10 = $tmpSalary10 + $row_GetContractExt['Salary9'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetFA['NoTrade']==1){ echo "True"; } else { echo "-";} ?></td>
					<td align="right"><?php if ($row_GetFA['Approved']=='False'){ ?><a href="#" class="approveExt" player="<?php echo  addslashes($playerName);?>" teamnumber="<?php echo $row_GetFA['Number'];?>" id="<?php echo $row_GetFA['PR_ID']; ?>">Confirm</a><?php } else { echo $l_Approved; } ?></td>
					<td align="right"><a href="remove_transaction.php?id=<?php echo $row_GetFA['PR_ID']; ?>"><?php echo $l_Remove;?></a></td>
                  </tr>
                <?php 
				if($row_GetFA['Compensation'] !=""){
					echo "<tr><td></td><td colspan=12>Compensation: ".$row_GetFA['Compensation']."</td><td colspan=2></td></tr>";
				}
				} while ($row_GetFA = mysql_fetch_assoc($GetFA));

				?>
                </tbody>
                <tfoot> 
                <tr>
                	<td colspan="16" align="right"><a href="javascript:confirmDelete('remove_freeagents.php');"><strong><?php echo $l_RemoveAll;?></strong></a></td>
                  </tr>
              	</tfoot>
                </table>    
        </div>
		<?php } ?>

		<?php if($totalRows_GetSalarys > 0){?>
        <div id="tabs-3"><h3>Extensions</h3>                     
             	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
                <thead>
                <tr style="background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>">
                    <th><?php echo $l_nav_players;?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season'])."-".substr($_SESSION['current_Season']+1, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+1)."-".substr($_SESSION['current_Season']+2, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+2)."-".substr($_SESSION['current_Season']+3, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+3)."-".substr($_SESSION['current_Season']+4, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+4)."-".substr($_SESSION['current_Season']+5, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+5)."-".substr($_SESSION['current_Season']+6, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+6)."-".substr($_SESSION['current_Season']+7, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+7)."-".substr($_SESSION['current_Season']+8, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+8)."-".substr($_SESSION['current_Season']+9, -2);?></th>
                    <th width="7%"><?php echo ($_SESSION['current_Season']+10)."/".substr($_SESSION['current_Season']+10, -2);?></th>
                    <th><a title="No Trade">NT</a></th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$tmpSalary1 = 0;
				$tmpSalary2 = 0;
				$tmpSalary3 = 0;
				$tmpSalary4 = 0;
				$tmpSalary5 = 0;
				$tmpSalary6 = 0;
				$tmpSalary7 = 0;
				$tmpSalary8 = 0;
				$tmpSalary9 = 0;
				$tmpSalary10 = 0;
				
				do { 
				
				if($row_GetSalarys['PlayerType']=='player'){
					$query_GetPlayerName = sprintf("SELECT Name FROM players WHERE Number=%s", $row_GetSalarys['Player']);
					$GetPlayerName = mysql_query($query_GetPlayerName, $connection) or die(mysql_error());
					$row_GetPlayerName = mysql_fetch_assoc($GetPlayerName);
					$playerName = $row_GetPlayerName['Name'];
				}else{
					$query_GetPlayerName = sprintf("SELECT Name FROM goalies WHERE Number=%s", $row_GetSalarys['Player']);
					$GetPlayerName = mysql_query($query_GetPlayerName, $connection) or die(mysql_error());
					$row_GetPlayerName = mysql_fetch_assoc($GetPlayerName);
					$playerName = $row_GetPlayerName['Name'];
				}
				?>
                  <tr>
                    <td nowrap><?php echo $playerName;?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary1']) || $row_GetSalarys['Salary1'] > 0){ echo "$".number_format($row_GetSalarys['Salary1'],0); $tmpSalary1 = $tmpSalary1 + $row_GetSalarys['Salary1']; } else { echo "-"; } ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary2']) || $row_GetSalarys['Salary2'] > 0){ echo "$".number_format($row_GetSalarys['Salary2'],0); $tmpSalary2 = $tmpSalary2 + $row_GetSalarys['Salary2']; } else if ($row_GetContractExt['Salary1'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary1'],0)."</span>";  $tmpSalary2 = $tmpSalary2 + $row_GetContractExt['Salary1'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary3']) || $row_GetSalarys['Salary3'] > 0){ echo "$".number_format($row_GetSalarys['Salary3'],0); $tmpSalary3 = $tmpSalary3 + $row_GetSalarys['Salary3']; } else if ($row_GetContractExt['Salary2'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary2'],0)."</span>";  $tmpSalary3 = $tmpSalary3 + $row_GetContractExt['Salary2'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary4']) || $row_GetSalarys['Salary4'] > 0){ echo "$".number_format($row_GetSalarys['Salary4'],0); $tmpSalary4 = $tmpSalary4 + $row_GetSalarys['Salary4']; } else if ($row_GetContractExt['Salary3'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary3'],0)."</span>";  $tmpSalary4 = $tmpSalary4 + $row_GetContractExt['Salary3'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary5']) || $row_GetSalarys['Salary5'] > 0){ echo "$".number_format($row_GetSalarys['Salary5'],0); $tmpSalary5 = $tmpSalary5 + $row_GetSalarys['Salary5']; } else if ($row_GetContractExt['Salary4'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary4'],0)."</span>";  $tmpSalary5 = $tmpSalary5 + $row_GetContractExt['Salary4'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary6']) || $row_GetSalarys['Salary6'] > 0){ echo "$".number_format($row_GetSalarys['Salary6'],0); $tmpSalary6 = $tmpSalary6 + $row_GetSalarys['Salary6']; } else if ($row_GetContractExt['Salary5'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary5'],0)."</span>";  $tmpSalary6 = $tmpSalary6 + $row_GetContractExt['Salary5'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary7']) || $row_GetSalarys['Salary7'] > 0){ echo "$".number_format($row_GetSalarys['Salary7'],0); $tmpSalary7 = $tmpSalary7 + $row_GetSalarys['Salary7']; } else if ($row_GetContractExt['Salary6'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary6'],0)."</span>";  $tmpSalary7 = $tmpSalary7 + $row_GetContractExt['Salary6'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary8']) || $row_GetSalarys['Salary8'] > 0){ echo "$".number_format($row_GetSalarys['Salary8'],0); $tmpSalary8 = $tmpSalary8 + $row_GetSalarys['Salary8']; } else if ($row_GetContractExt['Salary7'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary7'],0)."</span>";  $tmpSalary8 = $tmpSalary8 + $row_GetContractExt['Salary7'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary9']) || $row_GetSalarys['Salary9'] > 0){ echo "$".number_format($row_GetSalarys['Salary9'],0); $tmpSalary9 = $tmpSalary9 + $row_GetSalarys['Salary9']; } else if ($row_GetContractExt['Salary8'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary8'],0)."</span>";  $tmpSalary9 = $tmpSalary9 + $row_GetContractExt['Salary8'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if (isset($row_GetSalarys['Salary10']) || $row_GetSalarys['Salary10'] > 0){ echo "$".number_format($row_GetSalarys['Salary10'],0); $tmpSalary10 = $tmpSalary10 + $row_GetSalarys['Salary10']; } else if ($row_GetContractExt['Salary9'] > 0) { echo "<span style='color:#0183da'>$".number_format($row_GetContractExt['Salary9'],0)."</span>";  $tmpSalary10 = $tmpSalary10 + $row_GetContractExt['Salary9'];} else { echo "-"; }  ?></td>
                    <td align="center"><?php if ($row_GetSalarys['NoTrade']==1){ echo "True"; } else { echo "-";} ?></td>
                    <td align="right"><?php if ($row_GetSalarys['Approved']=='False'){ ?><a href="#" class="approveExt" player="<?php echo  addslashes($playerName);?>" teamnumber="<?php echo $row_GetSalarys['Number'];?>" id="<?php echo $row_GetSalarys['PR_ID']; ?>">Confirm</a><?php } else { echo $l_Approved; } ?></td>
                    <td align="right"><a href="remove_transaction.php?id=<?php echo $row_GetSalarys['PR_ID']; ?>"><?php echo $l_Remove;?></a></td>
                  </tr>
                <?php 
				if($row_GetSalarys['Compensation'] > 0){
					echo "<tr><td></td><td colspan=12>Bonus: $".number_format($row_GetSalarys['Compensation'],0)."</td><td colspan=2></td></tr>";
				}
				} while ($row_GetSalarys = mysql_fetch_assoc($GetSalarys)); 
				?>
                </tbody>
                <tfoot> 
                <tr>
                	<td colspan="16" align="right"><a href="javascript:confirmDelete('remove_extensions.php');"><strong><?php echo $l_RemoveAll;?></strong></a></td>
                  </tr>
              	</tfoot>
                </table>   

        </div>
		<?php } ?>
            
		<?php if ($row_GetGMInfo['JuniorLeague'] == "True") { ?>
            <div id="tabs-4"><h3><?php echo $l_JUNIORLEAGUE;?></h3>
            
            <table width="100%" border="0">
            <tr>
            <td width="32%" valign="top">
            <strong style="text-transform:uppercase;">Teams more than 3 overagers</strong>
			<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <tbody>
            <?php 
            $query_Get20ManAge = sprintf("
            select (select count(ID) as ID from players where Age > 19 and Team=P.Number AND Suspension<99 AND Retired=0 ) as PAge, (select count(ID) as ID from goalies where Age > 19 and Team=P.Number AND Suspension<99  AND Retired=0) as GAge, P.Number, P.Name from proteam as P  group by P.Number
            ");
            $Get20ManAge = mysql_query($query_Get20ManAge, $connection) or die(mysql_error());
            $row_Get20ManAge = mysql_fetch_assoc($Get20ManAge);
            $i = 0;
            do { 
                $Age = $row_Get20ManAge['PAge'] + $row_Get20ManAge['GAge'];
                if ($Age > 3){
                    $i = $i + 1;
                    echo "<tr><td>".$row_Get20ManAge['Name']."</td><td>".$Age."</td><td align=right><a href='send_20_yearold_warning.php?teamNumber=".$row_Get20ManAge['Number']."'>".$l_SendEmail."</a></td></tr>";
                }
            } while ($row_Get20ManAge = mysql_fetch_assoc($Get20ManAge)); 
            mysql_free_result($Get20ManAge);
            ?>
            </tbody>
            </table>
            <br clear="all" />
             </td>
                
            
            <td width="1%"></td>
            
            <td width="32%" valign="top">
            <strong style="text-transform:uppercase;">Teams more than 50 man roster</strong>
			<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <tbody>
            <?php 
            $query_Get50ManAge = sprintf("
            select (select count(P_ID) as ID from prospects where TeamNumber=P.Number ) as Prospect, (select count(ID) as ID from players where Team=P.Number AND Retired=0 ) as PAge, (select count(ID) as ID from goalies where Team=P.Number AND Retired=0) as GAge, P.Number, P.Name from proteam as P  group by P.Number
            ");
            $Get50ManAge = mysql_query($query_Get50ManAge, $connection) or die(mysql_error());
            $row_Get50ManAge = mysql_fetch_assoc($Get50ManAge);
            $i = 0;
            do { 
                $RosterLimit = $row_Get50ManAge['PAge'] + $row_Get50ManAge['GAge'] + $row_Get50ManAge['Prospect'];
                if ($RosterLimit > 50){
                    $i = $i + 1;
                    echo "<tr><td>".$row_Get50ManAge['Name']."</td><td>".$RosterLimit."</td><td align=right><a href='send_50_roster_warning.php?teamNumber=".$row_Get50ManAge['Number']."'>".$l_SendEmail."</a></td></tr>";
                }
            } while ($row_Get50ManAge = mysql_fetch_assoc($Get50ManAge)); 
            mysql_free_result($Get50ManAge);
            ?>
            </tbody>
            </table>
            <br clear="all" />
            </td>
            
            <td width="1%"></td>
            
            <td width="32%" valign="top">
            <strong style="text-transform:uppercase;">Teams more than 2 Euros</strong>
            <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <tbody>
            <?php 
            $query_Get2Euro = sprintf("
            select (select count(ID) as ID from players where Country NOT IN ('CAN','USA') and Team=P.Number AND Suspension<99 AND Retired=0) as PCountry, (select count(ID) as ID from goalies where Country NOT IN ('CAN','USA') and Team=P.Number AND Suspension<99  AND Retired=0) as GCountry,  P.Number, P.Name from proteam as P group by P.Number
            ");
            $Get2Euro = mysql_query($query_Get2Euro, $connection) or die(mysql_error());
            $row_Get2Euro = mysql_fetch_assoc($Get2Euro);
            $i = 0;
            do { 
                $Country = $row_Get2Euro['PCountry'] + $row_Get2Euro['GCountry'];
                if ($Country > 2){
                    $i = $i + 1;
                    echo "<tr><td>".$row_Get2Euro['Name']."</td><td>".$Country."</td><td align=right><a href='send_2_euro_warning.php?teamNumber=".$row_Get2Euro['Number']."'>".$l_SendEmail."</a></td></tr>";
                }
            } while ($row_Get2Euro = mysql_fetch_assoc($Get2Euro)); 
            
            mysql_free_result($Get2Euro);
            ?>
            </tbody>
            </table>	
            <br clear="all" />
            </td>
            </tr>
            </table>
            
            <br clear="all" />
            </div>
         <?php } ?>
</div>


   
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
