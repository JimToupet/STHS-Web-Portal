<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_team1 = "Team 1";
	$l_team2 = "Team 2";
	$l_Assets = "Assets";
	$l_TradeOffers = "Trade Offers";
	$l_FutureConsiderations="Future Considerations";
	$l_Note3 = "Check here if the GM of team 1 agrees to the terms of this trade.";
	$l_Note1 = "The G.M. of Team 1 must log in and accept this trade before it will be submitted to the commissioner.";
	$l_Note2 = "The G.M. of Team 2 must log in and accept this trade before it will be submitted to the commissioner.";
	$l_Submit = "Submit Trade";
	break; 

case 'fr': 
	$l_team1 = "&Eacute;quipe  1";
	$l_team2 = "&Eacute;quipe  2";
	$l_Assets = "Articles";
	$l_TradeOffers = "Offres du &eacute;changes";
	$l_FutureConsiderations="Futures consid&eacute;rations";
	$l_Note3 = "V&eacute;rifiez ici si le GM de l'&eacute;quipe 1 est d'accord sur les limites de ce commerce.";
	$l_Note1 = "Le G.M. de l'&eacute;quipe 1 doit ouvrir une session et accepter ce commerce avant qu'il soit soumis au commissaire.";
	$l_Note2 = "Le G.M. de l'&eacute;quipe 2 doit ouvrir une session et accepter ce commerce avant qu'il soit soumis au commissaire.";
	$l_Submit = "Soumettez le commerce";
	break;
} 

 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO transactions (Team1,Team2,Team1List,Team2List,Team1Approved,Team2Approved,CommishApproved,DateCreated,FutureConsiderations) values (%s,%s,%s,%s,%s,'False','False',%s,%s)",
                        GetSQLValueString($_POST['team1'], "int"),
                        GetSQLValueString($_POST['team2'], "int"),
                       	GetSQLValueString($_POST['team1list'], "text"),
                       	GetSQLValueString($_POST['team2list'], "text"),
                       	GetSQLValueString($_POST['TEAM1_CONFIRM'], "text"),
                       	GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"),
						GetSQLValueString($_POST['FutureConsiderations'], "text"));
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  $query_GetTeam = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['team1']);
  $GetTeam = mysql_query($query_GetTeam, $connection) or die(mysql_error());
  $row_GetTeam = mysql_fetch_assoc($GetTeam);
  
  $query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name, proteam.Email, proteam.EmailAlert FROM proteam WHERE proteam.Number='%s'",$_POST['team2']);
  $GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
  $row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

  $MailSubject = "TRADE - Awaiting your approval.";
  $MailMessage = "<p>The ".$row_GetTeam['City']." ".$row_GetTeam['Name']." has submitted a trade to the league.  You are required to either accept or decline the trade offer. The trade will become void if you do not accept or decline in the TRADES secton of the website.</p>";  
	if ($row_GetTeam2['EmailAlert']==1){
		sendMail($row_GetTeam2['Email'], $row_GetTeam['Email'], $MailSubject, $MailMessage);
	}
	$MailMessage = "<strong>".$MailSubject."</strong><br>".$MailMessage;	

	$insertSQL = sprintf("INSERT INTO teamhistory(Season_ID, Value, Team, DateCreated, Viewed) values (%s,%s,%s,%s,'False')",
				GetSQLValueString($_SESSION['current_Season'], "text"),
				GetSQLValueString(addslashes($MailMessage), "text"),
				GetSQLValueString($_POST['team2'], "text"),
				GetSQLValueString(strftime('%Y-%m-%d %H:%M:%S', strtotime('now')), "date"));
  $Result2 = mysql_query($insertSQL, $connection) or die(mysql_error());
  
  mysql_free_result($GetTeam);
  mysql_free_result($GetTeam2);
	 
	 $insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Transactions", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
	
  $updateGoTo = "transactions.php?Team=".$_SESSION['current_Team_ID'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$GetTeamID = "1";
if (isset($_POST['team1'])) {
  $GetTeamID = (get_magic_quotes_gpc()) ? $_POST['team1'] : addslashes($_POST['team1']);
}
$ID_GetTeam2 = "Bruins";
if (isset($_POST['team2'])) {
  $ID_GetTeam2 = (get_magic_quotes_gpc()) ? $_POST['team2'] : addslashes($_POST['team2']);
}


$tmpYear = $_SESSION['current_DraftYear'];

$query_GetTeam2 = sprintf("SELECT Name, City, Number FROM proteam WHERE Number=%s", $ID_GetTeam2);
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);

$query_GetTeam1 = sprintf("SELECT Name, City, Number FROM proteam WHERE Number=%s", $GetTeamID);
$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);

$query_GetRoster = sprintf("SELECT players.Name, players.Number, players.Contract FROM players WHERE players.Team='%s' AND (players.NoTrade='False' or players.NoTrade='Faux') UNION ALL SELECT goalies.Name, goalies.Number, goalies.Contract FROM goalies WHERE goalies.Team='%s' AND (goalies.NoTrade='False' or goalies.NoTrade='Faux') ORDER BY Name", $row_GetTeam1['Number'], $row_GetTeam1['Number']);
$GetRoster = mysql_query($query_GetRoster, $connection) or die(mysql_error());
$row_GetRoster = mysql_fetch_assoc($GetRoster);

$query_GetProspects = sprintf("SELECT prospects.* FROM prospects WHERE prospects.TeamNumber='%s' ORDER BY prospects.Name", $row_GetTeam1['Number']);
$GetProspects = mysql_query($query_GetProspects, $connection) or die(mysql_error());
$row_GetProspects = mysql_fetch_assoc($GetProspects);

$query_GetInfo = sprintf("SELECT TradeYears FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);

$query_GetDraftPicks = sprintf("SELECT draftpicks.*, proteam.Abbre FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year BETWEEN  %s AND %s ORDER BY draftpicks.Year, draftpicks.Round", $row_GetTeam1['Number'], $tmpYear, ($tmpYear + $row_GetInfo['TradeYears'] - 1));
$GetDraftPicks = mysql_query($query_GetDraftPicks, $connection) or die(mysql_error());
$row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks);

$query_GetRoster2 = sprintf("SELECT players.Name, players.Number, players.Contract FROM players WHERE players.Team='%s' AND (players.NoTrade='False' or players.NoTrade='Faux') UNION ALL SELECT goalies.Name, goalies.Number, goalies.Contract FROM goalies WHERE goalies.Team='%s' AND (goalies.NoTrade='False' or goalies.NoTrade='Faux') ORDER BY Name", $row_GetTeam2['Number'], $row_GetTeam2['Number']);
$GetRoster2 = mysql_query($query_GetRoster2, $connection) or die(mysql_error());
$row_GetRoster2 = mysql_fetch_assoc($GetRoster2);

$query_GetProspects2 = sprintf("SELECT prospects.* FROM prospects WHERE prospects.TeamNumber='%s' ORDER BY prospects.Name", $row_GetTeam2['Number']);
$GetProspects2 = mysql_query($query_GetProspects2, $connection) or die(mysql_error());
$row_GetProspects2 = mysql_fetch_assoc($GetProspects2);

$query_GetDraftPicks2 = sprintf("SELECT draftpicks.*, proteam.Abbre FROM draftpicks, proteam WHERE draftpicks.TeamName=proteam.Number AND draftpicks.OwnBy=%s AND draftpicks.Year BETWEEN  %s AND %s ORDER BY draftpicks.Year, draftpicks.Round", $row_GetTeam2['Number'], $tmpYear, ($tmpYear + $row_GetInfo['TradeYears'] - 1));
$GetDraftPicks2 = mysql_query($query_GetDraftPicks2, $connection) or die(mysql_error());
$row_GetDraftPicks2 = mysql_fetch_assoc($GetDraftPicks2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_trade;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/reflection.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.validate.js"></script>
<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.bgiframe.min.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(document).ready(function(){
$("#form").validate({
rules: {
	TEAM1_CONFIRM: "required"
	}
});
});
</script>
<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  
  $('#add').click(function() {
    return !$('#select1 option:selected').remove().appendTo('#select2');
   });
   $('#remove').click(function() {
    return !$('#select2 option:selected').remove().appendTo('#select1');
   });

	$('#add2').click(function() {
    return !$('#select3 option:selected').remove().appendTo('#select4');
   });
   $('#remove2').click(function() {
    return !$('#select4 option:selected').remove().appendTo('#select3');
   });
   
   
 $('form').submit(function() {
	 $('#select2 option').each(function(i) {
	  $(this).attr("selected", "selected");
	 });
	 $('#select4 option:selected').each(function(i) {
	  $(this).attr("selected", "selected");
	 });
	 
	 var str1 = "";
	 $("#select2 option:selected").each(function () {
		str1 += $(this).text() + "<br>";
	  });
	 $('#team1list').val(str1);

	 var str2 = "";
	 $("#select4 option:selected").each(function () {
		str2 += $(this).text() + "<br>";
	  });
	 $('#team2list').val(str2);	 
 });

});
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
#TEAM1_CONFIRM { margin-left: .5em; float: left; width:200px; }
#TEAM1_CONFIRM, label { float: left; font-family: Arial, Helvetica, sans-serif; font-size: small;  width:20px;}
input.error { border: 1px solid red; }
label.error {
	background: url('image/common/unchecked.gif') no-repeat;
	padding-left: 16px;
	margin-left: .3em;
}
label.valid {
	background: url('image/common/checked.gif') no-repeat;
	display: block;
	width: 16px;
	height: 16px;
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
    <h1><?php echo $l_nav_trade;?></h1>
<?php if(!isset($_SESSION['U_ID'])) { ?>
	<form action="<?php echo $editFormAction; ?>" method="post" name="form" id="form">
	<input type="hidden" name="TEAM1_CONFIRM" value="False" />
<?php } else { ?>
	<form action="<?php echo $editFormAction; ?>" method="post" name="form" id="form" >
<?php } ?>
<input type="hidden" name="team1" value="<?php echo $row_GetTeam1['Number']; ?>" />


<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td valign="top" width="49%">
<h3><?php echo $l_team1." - ".$row_GetTeam1['City']." ".$row_GetTeam1['Name']; ?></h3>

<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th><?php echo $l_Assets;?></th>
    <th><?php echo $l_TradeOffers;?></th>
</tr>
</thead>
<tbody>
<tr>
	<td>
        <select name="select1" size="10" multiple id="select1" style="width:225px;"> 
        <?php do { 
        if ($row_GetRoster['Contract'] > 0){ ?>
        <option value="<?php echo $row_GetRoster['Name']; ?>"><?php echo $row_GetRoster['Name']; ?></option>
        <?php 
            }
        } while ($row_GetRoster = mysql_fetch_assoc($GetRoster)); ?>	
        <?php do { ?>
        <option value="Prospect: <?php echo $row_GetProspects['Name']; ?>">Prospect: <?php echo $row_GetProspects['Name']; ?></option>
        <?php } while ($row_GetProspects = mysql_fetch_assoc($GetProspects)); ?>	
        <?php do { ?>
        <option value="Year <?php echo $row_GetDraftPicks['Year']." - ".$row_GetDraftPicks['Abbre']." - Round ".$row_GetDraftPicks['Round']; ?>">Year <?php echo $row_GetDraftPicks['Year']." - ".$row_GetDraftPicks['Abbre']." - Round ".$row_GetDraftPicks['Round']; ?></option>
        <?php } while ($row_GetDraftPicks = mysql_fetch_assoc($GetDraftPicks)); ?>	
        </select>
        <br />
         <input type="button" id="add" value="<?php echo $l_Add;?> &gt;&gt;" />
         
		</td>
		<td>
        	<select name="select2" multiple id="select2" size="10" style="width:225px;"></select>
			<input type="hidden" name="team1list" id="team1list" value="" />
            <br />
            <input type="button" id="remove" value="&lt;&lt; <?php echo $l_Remove;?>" />
		</td>
	</tr>
</tbody>
</table>
<div style="font-size:10px">
<?php if(!isset($_SESSION['U_ID'])) {
	echo '<br />'.$l_Note1;
} else {
	echo '<input type="checkbox" id="TEAM1_CONFIRM" name="TEAM1_CONFIRM" value="True" /><br /> '.$l_Note3.'<br />';
}
?></div>
</td>

<td width="1%"></td>

<td valign="top" width="49%">

<h3><?php echo $l_team2." - ".$row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></h3>

<input type="hidden" name="team2" value="<?php echo $row_GetTeam2['Number']; ?>" />
<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
<thead>
<tr>
    <th><?php echo $l_Assets;?></th>
    <th><?php echo $l_TradeOffers;?></th>
</tr>
</thead>
<tbody>
<tr>
	<td>
        <select name="select3" multiple id="select3" size="10" style="width:225px;"> 
        <?php do { 
        if ($row_GetRoster2['Contract'] > 0){ ?>
        <option value="<?php echo $row_GetRoster2['Name']; ?>"><?php echo $row_GetRoster2['Name']; ?></option>
        <?php 
            }
        } while ($row_GetRoster2 = mysql_fetch_assoc($GetRoster2)); ?>	
        <?php do { ?>
        <option value="Prospect: <?php echo $row_GetProspects2['Name']; ?>">Prospect: <?php echo $row_GetProspects2['Name']; ?></option>
        <?php } while ($row_GetProspects2 = mysql_fetch_assoc($GetProspects2)); ?>	
        <?php do { ?>
        <option value="Year <?php echo $row_GetDraftPicks2['Year']." - ".$row_GetDraftPicks2['Abbre']." - Round ".$row_GetDraftPicks2['Round']; ?>">Year <?php echo $row_GetDraftPicks2['Year']." - ".$row_GetDraftPicks2['Abbre']." - Round ".$row_GetDraftPicks2['Round']; ?></option>
        <?php } while ($row_GetDraftPicks2 = mysql_fetch_assoc($GetDraftPicks2)); ?>	
        </select>
        <br />
         <input type="button" id="add2" value="<?php echo $l_Add;?> &gt;&gt;" />
         
		</td>
		<td>
        	<select name="select4" multiple id="select4" size="10" style="width:225px;"></select>
			<input type="hidden" name="team2list" id="team2list" value="" />
            <br />
            <input type="button" id="remove2" value="&lt;&lt; <?php echo $l_Remove;?>" />
		</td>
	</tr>
</tbody>
</table>

<br /><div style="font-size:9px"><?php echo $l_Note2; ?></div>
</td>
</tr>
</table>

<br /><br />
<h3><?php echo $l_FutureConsiderations;?></h3><br />
<textarea name="FutureConsiderations" cols="65" rows="5"></textarea>

<br /><br />
<div align="center"><input type="submit" value="<?php echo $l_Submit;?>" class="button" /></div>
<input type="hidden" name="MM_insert" value="form1">
<br /><br />
</form>	

 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
