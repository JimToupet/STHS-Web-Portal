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

if ($GetTeamID == 0){
	$query_GetRivalry = sprintf("SELECT * FROM rivalry ORDER BY DateCreated desc");
} else {
	$query_GetRivalry = sprintf("SELECT * FROM rivalry WHERE (Team1=%s OR Team2=%s) ORDER BY DateCreated desc", $GetTeamID,$GetTeamID);
}
$GetRivalry = mysql_query($query_GetRivalry, $connection) or die(mysql_error());
$row_GetRivalry = mysql_fetch_assoc($GetRivalry);
$totalRows_GetRivalry = mysql_num_rows($GetRivalry);

$query_GetTeams = sprintf("SELECT proteam.City, proteam.Name FROM proteam ORDER BY proteam.City");
$GetTeams = mysql_query($query_GetTeams, $connection) or die(mysql_error());
$row_GetTeams = mysql_fetch_assoc($GetTeams);

$query_GetTeams2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam ORDER BY proteam.City");
$GetTeams2 = mysql_query($query_GetTeams2, $connection) or die(mysql_error());
$row_GetTeams2 = mysql_fetch_assoc($GetTeams2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_rivalry;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $("table").tablesorter(); 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
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
    
    <div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_rivalry;?></h1></div>

    <div style="float:right; padding-top:5px;">
    <?php if(isset($_SESSION['U_ID']) && $_SESSION['U_Team'] != "") {?>
    <form name="form1" action="riv.php" method="post" onSubmit="return validate_form();">
        <table  cellspacing="0" border="0">
        <tr>
            <td><strong>TEAM 1</strong><br />
                <select name="team1" id="team1">
                <option selected="selected" value="<?php echo $_SESSION['U_Team']; ?>"><?php echo $_SESSION['U_City']." ".$_SESSION['U_Team']; ?></option>
                </select></td>
            <td><strong>TEAM 2</strong><br />
                <select name="team2" id="team2">
                <option value="" selected="selected">Select a team</option>
                <?php do { ?>
                <option value="<?php echo $row_GetTeams2['Name']; ?>"><?php echo $row_GetTeams2['City']." ".$row_GetTeams2['Name']; ?></option>
                <?php } while ($row_GetTeams2 = mysql_fetch_assoc($GetTeams2)); ?>
                </select></td>
            <td><br /><input type="submit" value="Submit New Rivalry" /></td>
        </tr>
        </table>
    </form>
    <?php } ?>
    </div>
    
    <br clear="all" />
    <br />
    
	<table  cellspacing="0" border="0" width="100%" class="tablesorter" >
    <thead>
    <tr>
    	<th>Date Created</a></th>
        <th width="200">Team 1</th>
        <th width="200">Team 2</th>
        <th width="100">Team 1 Approval</th>
        <th width="100">Team 2 Approval</th>
        <th width="120">Commish Approval</th>
	</tr>
    </thead>
    <tbody>
		<?php 
		if ($totalRows_GetRivalry > 0) {
			do { 
				
				$query_GetTeam1 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetRivalry['Team1']);
				$GetTeam1 = mysql_query($query_GetTeam1, $connection) or die(mysql_error());
				$row_GetTeam1 = mysql_fetch_assoc($GetTeam1);
				$query_GetTeam2 = sprintf("SELECT proteam.City, proteam.Name FROM proteam WHERE proteam.Number='%s'", $row_GetRivalry['Team2']);
				$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
				$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
		?>
		<tr>
			<td valign="top"><a><?php echo $row_GetRivalry['DateCreated']; ?></a></td>
			<td valign="top"><strong><?php echo $row_GetTeam1['City']." ".$row_GetTeam1['Name']; ?></strong><br /></td>
			<td valign="top"><strong><?php echo $row_GetTeam2['City']." ".$row_GetTeam2['Name']; ?></strong><br /></td>
			<td align="center" valign="top"><?php 
			if ($_SESSION['U_ID'] == $row_GetRivalry['Team1']){
				if ($row_GetRivalry['Team1Approved'] == "False") {
					echo "<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&teamnum=1&action=accept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&teamnum=1&action=decline'>".$l_Decline."</a>";
				} else {
					if ($row_GetRivalry['Team1Approved'] == "False"){
						echo $l_Waiting;
					}else if ($row_GetRivalry['Team1Approved'] == "Declined"){
						echo $l_Declined;
					}else {
						echo $l_Approved;
					}	
				}
			} else {
				if ($row_GetRivalry['Team1Approved'] == "False"){
					echo $l_Waiting;
				} else if ($row_GetRivalry['Team1Approved'] == "Declined"){
					echo $l_Declined;
				}else {
						echo $l_Approved;
				}
			}
			 ?></td>
			<td align="center" valign="top"><?php 
			if ($_SESSION['U_ID'] == $row_GetRivalry['Team2']){
				if ($row_GetRivalry['Team2Approved'] == "False") {
					echo "<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&teamnum=2&action=accept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&teamnum=2&action=decline'>".$l_Decline."</a>";
				} else {
					if ($row_GetRivalry['Team2Approved'] == "False"){
						echo $l_Waiting;
					} else if ($row_GetRivalry['Team2Approved'] == "Declined"){
						echo $l_Declined;
					}else {
						echo $l_Approved;
					}
				}
			} else {
				if ($row_GetRivalry['Team2Approved'] == "False"){
					echo $l_Waiting;
				} else if ($row_GetRivalry['Team2Approved'] == "Declined"){
					echo $l_Declined;
				}else {
						echo $l_Approved;
				}
			}
			 ?></td>
			<td align="center" valign="top"><?php 
				if ($_SESSION['U_Admin'] == 1){
					if ($row_GetRivalry['CommishApproved'] == "False" && $row_GetRivalry['Team2Approved']=="True" && $row_GetRivalry['Team1Approved']=="True"){
						echo "<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&action=commishaccept'>".$l_Accept."</a>&nbsp;|&nbsp;<a href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&action=commishdecline'>".$l_Decline."</a>";
					} else if ($row_GetRivalry['CommishApproved'] == "False" && ($row_GetRivalry['Team2Approved']=="False" || $row_GetRivalry['Team1Approved']=="False")){
						echo "Waiting <br><br><A href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&action=remove'>Remove</a>";
					} else if ($row_GetRivalry['CommishApproved'] == "False" && ($row_GetRivalry['Team2Approved']=="Declined" || $row_GetRivalry['Team1Approved']=="Declined")){
						echo "N/A <br><br><A href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&action=remove'>Remove</a>";
					} else {
						echo "Approved <br><br><A href='rivalry_action.php?id=".$row_GetRivalry['T_ID']."&action=remove'>Remove</a>";
					}
				} else {
					if ($row_GetRivalry['CommishApproved'] == "False"){
						echo $l_Waiting;
					} else if ($row_GetRivalry['CommishApproved'] == "Declined"){
						echo $l_Declined;
					} else {
						echo $l_Approved;
					}
				}
			 ?></td>
		</tr>	
		<?php
		  	mysql_free_result($GetTeam1);
			mysql_free_result($GetTeam2);
			} while ($row_GetRivalry = mysql_fetch_assoc($GetRivalry)); 
		}
		?>
        </tbody>
		</table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
