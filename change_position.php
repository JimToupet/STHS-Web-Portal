<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>

<?php
switch ($lang){ 
case 'en': 
	$l_unrestricted_free_agents = "UNRESTRICTED FREE AGENT";
	$l_restricted_free_agents = "RESTRICTED FREE AGENT";
	$l_CurrentStats = "Active Season Stats";
	$l_ProCareerStats = "Pro League Career Stats";
	$l_FarmCareerStats = "Farm League Career Stats";
	$l_Awards = "Awards ";
	$l_career = "Career";
	$l_days = "Day(s)";
	$l_games = "Game(s)";
	$l_t_years = "Year(s)";
	$l_Playoffs = "Playoffs";
	$l_RegularSeason = "Regular Season";
	$l_PlayerRatings = "Player Ratings";
	$l_PlayerNotes = "Player Notes";
	$l_year = "YEAR";
	$l_NoNotes = "No notes available.";
	$l_InjuredDesc = "Days remaining on injured reserve:";
	$l_OutsideLinks = "Profile Links:";
	$l_Transactions = "Transactions";
	$l_Total = "Total";
	$l_OneWay = "One Way Contract (PRO)";
	$l_OfferContract = "EXTENSION";
	$l_TwoWay = "Two Way Contract (Pro & Farm)";
	$l_ContractLength = "CONTRACT LENGTH";
	$l_ContractType = "CONTRACT TYPE";
	$l_NoTradeClause = "NO TRADE";
	$l_AvailableTrade = "AVAILABLE FOR A TRADE";
	$l_ContractExt = "CONTRACT EXTENSION";
	$l_SalaryBySeason = "Salary Hit by Season";
	$l_Links = "LINKS";
	$l_ContractDetails = "Contract Details";
	$l_ProTotals = "PRO TOTALS";
	$l_FarmTotals = "FARM TOTALS";
	$l_TransactionHistory = "TRANSACTIONS HISTORY";
	$l_CareerPlayoff = "CAREER PLAYOFF SEASON STATISTICS";
	$l_CareerRegular = "CAREER REGULAR SEASON STATISTICS";
	$l_Extended = "EXTENDED SUMMARY";
	$l_Shootouts = "Shootouts";
	$l_Notes = "Notes";
	$l_Transactions = "Transactions";
	$l_TimeOnIce = "Time On Ice";
	$l_HitsFights = "Hits & Fights";
	$l_SpecialTeams = "Special Teams";
	$l_ExtSummary = "Ext. Summary";
	$l_Summary = "Summary";
	$l_StarPower = "Star Power";
	$l_AvgCap = "Average Cap Hit"; 
	$l_EditPlayer = "EDIT";
	$l_AvgCapHit = "Avg. Cap Hit";
	$l_Roster = "Team Roster";
	$l_Over = "over";
	$l_AssistantCaptain = "Assistant Captain";
	$l_Captain = "Captain";
	$l_Number = "Number";
	$l_Leader = "Leader";
	break; 

case 'fr': 
	$l_unrestricted_free_agents = "Agent libres sans Restrictions";
	$l_restricted_free_agents = "Agent libres avec Restrictions";
	$l_CurrentStats = "Stats Saison Actuelle";
	$l_ProCareerStats = "Stats Pro en Carri&egrave;re";
	$l_FarmCareerStats = "Stats Farm en Carri&egrave;re";
	$l_Awards = "Troph&eacute;es ";
	$l_career = "Carri&egrave;re";
	$l_days = "jour(s)";
	$l_games = "Match(s)";
	$l_t_years = "ann&eacute;e(s)";
	$l_Playoffs = "S&eacute;ries &eacute;liminatoires";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_PlayerRatings = "Cotes du joueur";
	$l_PlayerNotes = "Notes sur le joueur";
	$l_year = "ANN&eacute;E";
	$l_NoNotes = "Pas de notes disponibles";
	$l_InjuredDesc = "Jour(s) restant(s) sur la liste des bless&eacute;:";
	$l_OutsideLinks = "LIENS :";
	$l_Transactions = "Transactions";
	$l_Total = "Total";
	$l_OneWay = "Contrat a sens unique (PRO)";
	$l_OfferContract = "Extension";
	$l_TwoWay = "Contrat a double sens (Pro et Mineur)";
	$l_ContractLength = "Dur&eacute;e du Contrat";
	$l_ContractType = "Type de Contrat";
	$l_NoTradeClause = "Non echange";
	$l_AvailableTrade = "Disponible a un echange";
	$l_ContractExt = "Extension de contrat";
	$l_SalaryBySeason = "Salaire par Saison";
	$l_Links = "Liens";
	$l_ContractDetails = "Detail du Contrat";
	$l_ProTotals = "TOTAL PRO";
	$l_FarmTotals = "TOTAL MINEUR";
	$l_TransactionHistory = "HISTORIQUE DE TRANSACTIONS";
	$l_CareerPlayoff = "Statistiques cariere pour s&eacute;rie &eacute;liminatoire";
	$l_CareerRegular = "Statistiques cariere pour saison r&eacute;guliere";
	$l_Extended = "Sommaire exhaustif";
	$l_Shootouts = "Blanchissages";
	$l_Notes = "Notes";
	$l_Transactions = "Transactions";
	$l_TimeOnIce = "Temp de glace";
	$l_HitsFights = "Bataille";
	$l_SpecialTeams = "Sp&eacute;ciale";
	$l_ExtSummary = "Sommaire Ex.";
	$l_Summary = "Sommaire";
	$l_StarPower = "Impact de Vedette";
	$l_AvgCap = "Moy. Masse Salariale";
	$l_EditPlayer = "Modifier joueur";
	$l_AvgCapHit = "Moy. Masse Salariale";
	$l_Roster = "Alignement";
	$l_Over = "au dessus";
	$l_AssistantCaptain = "Assistant Capitaine";
	$l_Captain = "Capitaine";
	$l_Number = "Num&eacute;ro";
	$l_Leader = "Meneur";
	break;
} 

$PID_GetPlayer = "1";
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO playerschangerequest (Name,Request,DateCreated,Team,URL,Type) values (%s,%s,%s,%s,%s,%s)",
                        GetSQLValueString($_POST['Name'], "text"),
                        GetSQLValueString($_POST['Request'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
		   	GetSQLValueString($_SESSION['current_Team_ID'], "text"),
			GetSQLValueString($_POST['URL'], "text"),
			GetSQLValueString($_POST['RequestType'], "text"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  $MailSubject = "Change Player Position - ".$_POST['Name'];	
  $MailMessage = "<p>".$_POST['Name']." request to change or add position was sent to Commissioner.  Please allow 48hrs to see the change.</p>";
	sendMail($_SESSION['site_Email'], $_SESSION['U_Email'], $MailSubject, $MailMessage);
	
  $updateGoTo = "sent_request.php?team=".$_SESSION['current_Team_ID'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}



$PID_GetPlayer = 0;
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetNumber = 0;
if (isset($_GET['number'])) {
  $GetNumber = (get_magic_quotes_gpc()) ? $_GET['number'] : addslashes($_GET['number']);
}

$query_GetPlayer = sprintf("SELECT * FROM players WHERE players.Number=%s", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);

$tmpStatus = $row_GetPlayer['Status0'];
$PID_GetPlayer=addslashes($row_GetPlayer['Name']);
if ($row_GetPlayer['Team']==""){
	$tmpTeamNumber = 0;
} else {
	$tmpTeamNumber = $row_GetPlayer['Team'];
}

if ($tmpStatus==0){
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, f.Number, f.Name, f.Abbre, f.City, f.LogoLarge, f.LogoSmall, f.HeaderImage, f.LogoTiny, f.PrimaryColor, f.SecondaryColor FROM farmteam as f, farmteamstandings as s WHERE f.Number=s.Number AND f.Number=%s ", $tmpTeamNumber);
} else {
	$query_GetTeamInfo = sprintf("SELECT s.Captain, s.Assistant1, s.Assistant2, p.Number,  p.Name,  p.Abbre,  p.City,  p.LogoLarge,  p.LogoSmall,  p.HeaderImage, p.LogoTiny,  p.PrimaryColor,  p.SecondaryColor FROM proteam as p, proteamstandings as s WHERE p.Number=s.Number AND p.Number=%s ", $tmpTeamNumber);
}
$GetTeamInfo = mysql_query($query_GetTeamInfo, $connection) or die(mysql_error());
$row_GetTeamInfo = mysql_fetch_assoc($GetTeamInfo);
$totalRows_GetTeamInfo = mysql_num_rows($GetTeamInfo);

if($row_GetTeamInfo['HeaderImage']!=""){
	$HeaderImage=$row_GetTeamInfo['HeaderImage'];
	$SecondaryColor=$row_GetTeamInfo['SecondaryColor'];
	$PrimaryColor=$row_GetTeamInfo['PrimaryColor'];
} else {
	$HeaderImage=$_SESSION['current_HeaderImage'];
	$SecondaryColor=$_SESSION['current_SecondaryColor'];
	$PrimaryColor=$_SESSION['current_PrimaryColor'];
}

$tmpTeamCaptain = 0;
$tmpTeamAssistant1 = 0;
$tmpTeamAssistant2 = 0;
if ($row_GetTeamInfo['Captain'] == $row_GetPlayer['Number']){
	$tmpTeamCaptain = 1;
}
if ($row_GetTeamInfo['Assistant1'] == $row_GetPlayer['Number']){
	$tmpTeamAssistant1 = 1;
}
if ($row_GetTeamInfo['Assistant2'] == $row_GetPlayer['Number']){
	$tmpTeamAssistant2 = 1;
}

if ($tmpStatus <= 1){
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 <= 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 <= 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
} else {
	if($row_GetTeamInfo['Number']==""){$tmpTeamNumber=0;} else {$tmpTeamNumber=$row_GetTeamInfo['Number'];}
	$query_GetRoster = sprintf("SELECT 1 as Position, Name, Number FROM players WHERE players.Team=%s AND players.Status1 > 1 AND players.Contract > 0 UNION ALL SELECT 16 as Position, Name, Number FROM goalies WHERE goalies.Team=%s AND goalies.Status1 > 1 AND goalies.Contract > 0 GROUP BY Name", $tmpTeamNumber,$tmpTeamNumber);
}
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetContractExt = sprintf("SELECT * FROM playerscontractoffers as P WHERE P.Player='%s' AND P.Type='Extension'", $row_GetRoster['Number']);
$GetContractExt = mysql_query($query_GetContractExt, $connection) or die(mysql_error());
$row_GetContractExt = mysql_fetch_assoc($GetContractExt);
$totalRows_GetContractExt = mysql_num_rows($GetContractExt);

$query_GetWaivers = sprintf("SELECT Player FROM waiver WHERE Player='%s'", $PID_GetPlayer);
$GetWaivers = mysql_query($query_GetWaivers, $connection) or die(mysql_error());
$row_GetWaivers = mysql_fetch_assoc($GetWaivers);
$totalRows_GetWaivers = mysql_num_rows($GetWaivers);

$query_GetDraftInfo = sprintf("SELECT D.*, S.Season, t.Name as OwnBy FROM seasons as S, draftpicks as D, draft as DD, proteam as t WHERE t.Number=D.OwnBy AND D.Name='%s' AND D.Year=DD.Year AND DD.Season_ID=S.Season", $PID_GetPlayer);
$GetDraftInfo = mysql_query($query_GetDraftInfo, $connection) or die(mysql_error());
$row_GetDraftInfo = mysql_fetch_assoc($GetDraftInfo);
$totalRows_GetDraftInfo = mysql_num_rows($GetDraftInfo);

$division=$row_GetPlayer['Height']/12;   
$feet=intval(abs($division)); 
$decimal=abs($division)-intval(abs($division));
$inches=$decimal*12;
$ContractExtension=0;
$RecoveryRate=1;
$query_GetInfo = sprintf("SELECT UFA, RecoveryRate, PlayerAI, ContractExtensionFormula FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);
$PlayerAI=$row_GetInfo['PlayerAI'];
$RecoveryRate=$row_GetInfo['RecoveryRate'];
$UFA = $row_GetInfo['UFA'];
mysql_free_result($GetInfo);

//teamhistory
$query_GetNotes = "SELECT Value FROM transactionhistory WHERE Value like '%".$PID_GetPlayer."%' ";
$GetNotes = mysql_query($query_GetNotes, $connection) or die(mysql_error());
$row_GetNotes = mysql_fetch_assoc($GetNotes);
$totalRows_GetNotes = mysql_num_rows($GetNotes);

$query_GetRequestedTeams = sprintf("SELECT * FROM traderequests WHERE Player='%s' AND Season='%s'", $PID_GetPlayer, $_SESSION['current_Season']);
$GetRequestedTeams = mysql_query($query_GetRequestedTeams, $connection) or die(mysql_error());
$row_GetRequestedTeams = mysql_fetch_assoc($GetRequestedTeams);
$totalRows_GetRequestedTeams = mysql_num_rows($GetRequestedTeams);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $row_GetPlayer['Name']; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
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
  $("table").tablesorter(); 
  $("#TeamPhoto").reflect({height:30,opacity:0.3});
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $HeaderImage; ?>); background-color:#<?php echo $PrimaryColor;?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
a:active {color:#<?php echo $SecondaryColor; ?>;}
a:hover {color:#<?php echo $SecondaryColor; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $SecondaryColor; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $SecondaryColor; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $PrimaryColor; ?>;}
h3 {color:#<?php echo $PrimaryColor; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}

#JerseyNumber{
	display:block; 
	width:78px; 
	height:78px; 
	background-color:#<?php echo $PrimaryColor; ?>;
	border-style:solid;
	border-width:1px;
	border-color:#FFFFFF;
	color:#FFFFFF;
	font-size:60px;
	text-align:center;
	line-height:74px;
	font-weight:bold;
	font-family:Helvetica, sans-serif, Arial;
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
    	
    	<table cellpadding="0" cellspacing="0" border="0" width="100%" height="150">
        <tr>
        	<td id="PlayerProfile" style="background-color:#<?php echo $PrimaryColor; ?>; padding:6px; width:35%;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td width="110" rowspan="2" style="vertical-align:top; width:110px;"><img src="<?php echo imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" border="1" style="border-color:#<?php echo $PrimaryColor; ?>;" width="100" height="150"/></td>
                    <td rowspan="2" valign="top" height="150" style="vertical-align:middle;">
                        <div align="center" style="width:205px;">
                        	<?php if ($row_GetPlayer['UniformNumber'] > 0){ ?>
                            	<div style="float:left; width:125px;"><img align="right" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>" id="TeamPhoto" /></div>
                            	<div style="float:right;" id="JerseyNumber"><?php echo $row_GetPlayer['UniformNumber'];?></div>
							<?php } else { ?>
                            	<img align="right" src="<?php echo $_SESSION['DomainName']; ?>/image/logos/medium/<?php echo $row_GetTeamInfo['LogoSmall']; ?>" id="TeamPhoto" />
                            <?php } ?>
                        </div>
                        <div style="position:absolute; z-index:10; top:308px; padding-left:20px;">
                            <FORM>
                            <SELECT ONCHANGE="location = this.options[this.selectedIndex].value;" style="font-size:0.85em; width:155px; text-align:center;">
                            <?php 
							if($row_GetPlayer['Retired']==0){
							echo "<option>".$l_Roster."</option>";
                            $tmpTargetFile="player.php";
                            do { 
                                if($row_GetRoster['Position']==16){
                                    $tmpTargetFile="goalie.php";
                                } else {
                                    $tmpTargetFile="player.php";
                                }
                                echo '<OPTION VALUE="'.$tmpTargetFile.'?player='.$row_GetRoster['Number'].'">'.$row_GetRoster['Name'].'</OPTION>';
                            } while ($row_GetRoster = mysql_fetch_assoc($GetRoster));
                            }
							?>
                            </SELECT> 
                            </FORM>
                        </div>
                    </td>
                </tr>
                </table>
        	</td>
            <td id="PlayerInfo" style="background-color:#ededed; padding:0px 6px 6px 6px; width:65%; vertical-align:top;">
                    
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="PlayerInfoTable">
                    <tr>
                    	<td colspan="2" style="vertical-align:top;"><strong style="font-size:1.6em; text-transform:uppercase;"><?php echo $row_GetPlayer['Name']; ?></strong></td>
						<td>
						<?php 
						if(isset($_SESSION['U_ID'])){
							if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
							}
						}
						?>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="vertical-align:bottom;">Position(s): <strong>
                        <?php
							if ($row_GetPlayer['PosC'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_Center."</li>";
							}
							if ($row_GetPlayer['PosLW'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_LeftWing."</li>";
							}
							if ($row_GetPlayer['PosRW'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_RightWing."</li>";
							}
							if ($row_GetPlayer['PosD'] == "True" || $row_GetPlayer['PosC'] == "Vrai"){
								echo "<li id='PositionsList'>&#8226;&nbsp;".$l_Defence."</li>";
							}
							
							
						?>
                    	</strong></td>
                        <td>Status:
                        <?php
							echo "<strong>";
							if($row_GetPlayer['Status0'] == 0 && $row_GetPlayer['Retired']==0){
								echo "Not Active";
							} else if($row_GetPlayer['Status0'] == 1){
								echo "Farm Team";
							} else if($row_GetPlayer['Status0'] > 1){
								echo "Pro Team";
							} else if ($row_GetPlayer['Retired']==1){
								echo "Retired";
							}
							echo "</strong>";
							if($tmpTeamCaptain == 1){ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$l_Leader.":&nbsp;<strong>".$l_Captain."</strong>"; }
							if($tmpTeamAssistant1 == 1 || $tmpTeamAssistant2 == 1){ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$l_Leader.":&nbsp;<strong>".$l_AssistantCaptain."</strong>"; }
                        ?>
                        </td>
                    </tr>
                	<tr>
                        <td valign="top"><?php echo $l_DateOfBirth;?>: <strong><?php echo $row_GetPlayer['AgeDate']; ?></strong></td>
                        <td valign="top"><?php echo $l_Age;?>: <strong><?php 
						if($row_GetPlayer['Retired']==0){
							echo getAge($row_GetPlayer['AgeDate']);
						} else {
							echo $row_GetPlayer['Age'];
						}							
							?></strong></td> 
                        <td><?php echo $l_Country;?>: <strong><?php echo $row_GetPlayer['Country']."</strong>"; ?>&nbsp;<img height="12" width="12" src="<?php echo $_SESSION['DomainName']; ?>/image/flags/<?php echo $row_GetPlayer['Country']; ?>.png" border="0"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $l_Height;?>: <strong><?php echo $feet; ?>' <?php echo $inches ?>"</strong></td>
                        <td><?php echo $l_Weight;?>: <strong><?php echo $row_GetPlayer['Weight']; ?> lbs</strong></td>
                        <td><?php echo $l_StarPower;?>: <strong><?php echo $row_GetPlayer['StarPower']; ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <?php 
							echo "Drafted : ";
							if($totalRows_GetDraftInfo > 0){
								echo "<strong>".$row_GetDraftInfo['Round']."/".number_format(($row_GetDraftInfo['Round'] * $_SESSION['total_teams'] ) - $_SESSION['total_teams'] + $row_GetDraftInfo['Overall'],0)." in ".$row_GetDraftInfo['Season']." by the ".$row_GetDraftInfo['OwnBy']."</strong>"; 
							} else {
								echo "<strong>N/A</strong>";
							}
						?>
                        </td>
                        <td>
                        <?php
                        echo $l_AvgCap.": ";
						if($row_GetPlayer['Retired']==0){
							$tmpCapHit = 0;
							if ($row_GetPlayer['Salary1'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary1'];
							}
							if ($row_GetPlayer['Salary2'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary2'];
							}
							if ($row_GetPlayer['Salary3'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary3'];
							}
							if ($row_GetPlayer['Salary4'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary4'];
							}
							if ($row_GetPlayer['Salary5'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary51'];
							}
							if ($row_GetPlayer['Salary6'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary6'];
							}
							if ($row_GetPlayer['Salary7'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary7'];
							}
							if ($row_GetPlayer['Salary8'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary8'];
							}
							if ($row_GetPlayer['Salary9'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary9'];
							}
							if ($row_GetPlayer['Salary10'] > 0){
								$tmpCapHit = $tmpCapHit + $row_GetPlayer['Salary10'];
							}
							if($row_GetPlayer['Contract'] > 0){
								echo "<strong>$".number_format($tmpCapHit/$row_GetPlayer['Contract'],0)." ".$l_Over." ".$row_GetPlayer['Contract']." ".$l_t_years."</strong>&nbsp;";
								if ($row_GetPlayer['NoTrade'] == "True"){ 
									if ($totalRows_GetRequestedTeams == 0){
										echo $l_NoTradeClause;
									}
								}
							} else {
								if($UFA > getAge($row_GetPlayer['AgeDate'])){
									echo "<strong>".$l_restricted_free_agents."</strong>";
								} else {
									echo "<strong>".$l_unrestricted_free_agents."</strong>";
								}
							}
						}
						?></td>
                    </tr>
                    <?php 
						$tmpRowColorHTML = "";
						if ($row_GetPlayer['Injury'] <> "") {
							$tmpRowColorHTML = "background-color:#FFC1C1;";
						}	
					?>
                   <tr style="<?php echo $tmpRowColorHTML;?>">
                        <td><?php 
								echo $l_Condition.":<strong>";
								echo $row_GetPlayer['CON']."%"; 
								if ($row_GetPlayer['Injury'] <> "") {
									echo " - ".$row_GetPlayer['Injury']." - ";
									echo number_format(((100 - $row_GetPlayer['CON']) / $RecoveryRate),0)." ".$l_days;
								}
								echo "</strong>";
							?>
                        </td>
                        <td><?php echo $l_NumberInjuries;?>:&nbsp;<strong><?php echo $row_GetPlayer['NumberOfInjury']."</strong>"; ?></td>
                        <td><?php echo $l_Suspension;?>: <strong><?php if ($row_GetPlayer['Suspension'] > 0){ echo $row_GetPlayer['Suspension']." ".$l_games; } else { echo 0;}  ?></strong></td>
                    </tr>
                                 
                </table>
            </td>
        </tr>
		</table>
          
        <br /><br />
	<h1>Change Position</h1>
	<form method="post" name="form1" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>
	<INPUT id="prospect" type="hidden" value="<?php echo $row_GetPlayer['Name']; ?>" name=Name>
	<div class="rowElem">
        	<label>Action:</label>
		<select id="Action" size=1 name=RequestType><option value="Change Players Position" selected="selected">Change Players Position</option></select>
        </div>
	<div class="rowElem">
	        <label>Request to:</label>
	</div>
	<div class="rowElem">
        	<INPUT id="Request" name=Request onfocus=select() size="35" ONCHANGE="FrontEnd();">
	</div>
	<div class="rowElem">
		Please State new/add position.
	</div>
	<div class="rowElem">
	        <label>Website Link:</label>
	</div>
	<div class="rowElem">
        	<INPUT id="PlayerURL" name=URL onfocus=select() size="95" ONCHANGE="FrontEnd();">
	</div>
	<div class="rowElem">
		Please add link/url of the website that will provide proof of your request.
	</div>
	<div class="rowElem">
		<input type="submit" value="Submit Request">
	</div>
	<input type="hidden" name="MM_insert" value="form1">
	</form>
	<br /><br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
