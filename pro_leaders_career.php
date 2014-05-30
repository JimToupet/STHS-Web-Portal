<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en':
	$l_Change  = "CHANGE";
	$l_saves = "Saves";
	$l_SShots = "Shootout Shots"; 
	break; 

case 'fr': 
	$l_Change  = "Changer";
	$l_saves = "Saves";
	$l_SShots = "Shootout Shots";
	break;
} 

$ID_Type = "";
if (isset($_POST['type'])) {
  $ID_Type = (get_magic_quotes_gpc()) ? $_POST['type'] : addslashes($_POST['type']);
}

if ($ID_Type == 0){
	$SQL_Type = "";
} else {
	$SQL_Type = " AND j.Position=".$ID_Type;
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_leader_career;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <form action="pro_leaders_career.php" method="post" name="form1">
	<div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_leader_career;?></h1></div>
    <div style="float:right; padding-top:5px;">
    <select name="type" id="type">
            <option value="0" <?php if($ID_Type==0){ echo "selected"; }?>>All</option>
            <option value="1" <?php if($ID_Type==1){ echo "selected"; }?>>Center</option>
            <option value="2" <?php if($ID_Type==2){ echo "selected"; }?>>Left Wing</option>
            <option value="3" <?php if($ID_Type==3){ echo "selected"; }?>>Right Wing</option>
            <option value="4" <?php if($ID_Type==4){ echo "selected"; }?>>Defense</option>
            </select>
            <input type="submit" value="<?php echo $l_Change;?>"  class="button" />
        </div>
        </form>
        <br clear="all" />
		<br />
    
    <div id="tabs">
            <div id="tabs-1">
            <h3><?php echo $l_regularseason;?></h3>
            
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_GP_D; ?></th>
        <th width="33%"><?php echo $l_G_D; ?></th>
        <th width="33%"><?php echo $l_A_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
			if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGP) as ProGP from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by ProGP DESC, ProMinutePlay DESC LIMIT 0,10");
			} else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGP) as ProGP from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by ProGP DESC, ProMinutePlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
			}
            $GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['ProGP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	             $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProG) as G from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by G DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProG) as G from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by G DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['G']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	             $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProA) as A from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by A DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProA) as A from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by A DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['A']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_P_D; ?></th>
        <th width="33%"><?php echo $l_P_M_D; ?></th>
        <th width="33%"><?php echo $l_PIM_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPoint) as Point from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by Point DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPoint) as Point from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by Point DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Point']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPlusMinus) as PlusMinus from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.ProPlusMinus > 0 group by p.Number order by PlusMinus DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPlusMinus) as PlusMinus from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s AND p.ProPlusMinus > 0 group by p.Number order by PlusMinus DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PlusMinus']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPim) as Pim from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by Pim DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPim) as Pim from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by Pim DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Pim']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>
    
    <Br />
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_PP_D; ?></th>
        <th width="33%"><?php echo $l_SH_D; ?></th>
        <th width="33%"><?php echo $l_GW_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPPG) as PPG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by PPG DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPPG) as PPG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by PPG DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PPG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPKG) as PKG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by PKG DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPKG) as PKG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by PKG DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PKG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGW) as GW from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by GW DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGW) as GW from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by GW DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GW']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_SHT_D; ?></th>
        <th width="33%"><?php echo $l_SB_D; ?></th>
        <th width="33%"><?php echo $l_HIT_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShots) as Shots from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by Shots DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShots) as Shots from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by Shots DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Shots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShotsBlock) as ShotsBlock from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by ShotsBlock DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShotsBlock) as ShotsBlock from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by ShotsBlock DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['ShotsBlock']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProHits) as Hits from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." group by p.Number order by Hits DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProHits) as Hits from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=1 and j.Number=p.Number ".$SQL_Type." AND p.Team=%s group by p.Number order by Hits DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Hits']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_GP_D; ?></th>
        <th width="33%"><?php echo $l_W_D; ?></th>
        <th width="33%"><?php echo $l_L_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGP) as GP from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by GP DESC, g.ProMinPlay DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGP) as GP from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by GP DESC, g.ProMinPlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProW) as W from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by W DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProW) as W from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by W DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['W']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProL) as L from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by L DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProL) as L from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by L DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['L']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_OT_D; ?></th>
        <th width="33%"><?php echo $l_GA_D; ?></th>
        <th width="33%"><?php echo $l_saves; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProOTL) as OTL from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by OTL DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProOTL) as OTL from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by OTL DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['OTL']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGA) as GA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by GA DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGA) as GA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by GA DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GA']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProSA) as SA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by SA DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProSA) as SA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by SA DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['SA']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_Shutouts_D; ?></th>
        <th width="33%"><?php echo $l_MP_D; ?></th>
        <th width="33%"><?php echo $l_SShots; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProShutouts) as Shutouts from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by Shutouts DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProShutouts) as Shutouts from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by Shutouts DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Shutouts']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProMinPlay) as MinPlay from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by MinPlay DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProMinPlay) as MinPlay from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by MinPlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo minutes($row_GetStats['MinPlay']); ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProPenalityShotsShots) as PenalityShotsShots from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 group by g.Number order by PenalityShotsShots DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProPenalityShotsShots) as PenalityShotsShots from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=1 AND g.Team=%s group by g.Number order by PenalityShotsShots DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PenalityShotsShots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    		</div>
            <div id="tabs-2">
            <h3><?php echo $l_playoffs;?></h3>

<table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_GP_D; ?></th>
        <th width="33%"><?php echo $l_G_D; ?></th>
        <th width="33%"><?php echo $l_A_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
			if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGP) as ProGP from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by ProGP DESC, ProMinutePlay DESC LIMIT 0,10");
			} else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGP) as ProGP from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by ProGP DESC, ProMinutePlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
			}
            $GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['ProGP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	             $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProG) as G from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by G DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProG) as G from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by G DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['G']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	             $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProA) as A from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by A DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProA) as A from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by A DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['A']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_P_D; ?></th>
        <th width="33%"><?php echo $l_P_M_D; ?></th>
        <th width="33%"><?php echo $l_PIM_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPoint) as Point from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by Point DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPoint) as Point from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by Point DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Point']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPlusMinus) as PlusMinus from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.ProPlusMinus > 0 group by p.Number order by PlusMinus DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPlusMinus) as PlusMinus from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s AND p.ProPlusMinus > 0 group by p.Number order by PlusMinus DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PlusMinus']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPim) as Pim from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by Pim DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPim) as Pim from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by Pim DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Pim']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>
    
    <Br />
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_PP_D; ?></th>
        <th width="33%"><?php echo $l_SH_D; ?></th>
        <th width="33%"><?php echo $l_GW_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPPG) as PPG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by PPG DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPPG) as PPG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by PPG DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PPG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPKG) as PKG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by PKG DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProPKG) as PKG from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by PKG DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PKG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGW) as GW from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by GW DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProGW) as GW from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by GW DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GW']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_SHT_D; ?></th>
        <th width="33%"><?php echo $l_SB_D; ?></th>
        <th width="33%"><?php echo $l_HIT_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShots) as Shots from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by Shots DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShots) as Shots from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by Shots DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Shots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShotsBlock) as ShotsBlock from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by ShotsBlock DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProShotsBlock) as ShotsBlock from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by ShotsBlock DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['ShotsBlock']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProHits) as Hits from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  group by p.Number order by Hits DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, p.Name, p.Number, SUM(p.ProHits) as Hits from playerstats as p, seasons as s, players as j  where s.S_ID=p.Season_ID And s.SeasonType=0 and j.Number=p.Number ".$SQL_Type."  AND p.Team=%s group by p.Number order by Hits DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="player.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Hits']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_GP_D; ?></th>
        <th width="33%"><?php echo $l_W_D; ?></th>
        <th width="33%"><?php echo $l_L_D; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGP) as GP from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by GP DESC, g.ProMinPlay DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGP) as GP from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by GP DESC, g.ProMinPlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProW) as W from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by W DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProW) as W from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by W DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['W']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProL) as L from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by L DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProL) as L from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by L DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['L']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_OT_D; ?></th>
        <th width="33%"><?php echo $l_GA_D; ?></th>
        <th width="33%"><?php echo $l_saves; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProOTL) as OTL from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by OTL DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProOTL) as OTL from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by OTL DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['OTL']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGA) as GA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by GA DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProGA) as GA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by GA DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['GA']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProSA) as SA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by SA DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProSA) as SA from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by SA DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['SA']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
    
    
    <table cellspacing="0" cellpadding="10" border="0" width="100%" class="tablesorterLeaders" >
    <thead>
    <tr>
        <th width="33%"><?php echo $l_Shutouts_D; ?></th>
        <th width="33%"><?php echo $l_MP_D; ?></th>
        <th width="33%"><?php echo $l_SShots; ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProShutouts) as Shutouts from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by Shutouts DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProShutouts) as Shutouts from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by Shutouts DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['Shutouts']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProMinPlay) as MinPlay from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by MinPlay DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProMinPlay) as MinPlay from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by MinPlay DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo minutes($row_GetStats['MinPlay']); ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            if($_SESSION['current_Team_ID'] == 0){
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProPenalityShotsShots) as PenalityShotsShots from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 group by g.Number order by PenalityShotsShots DESC LIMIT 0,10");
            } else {
	            $query_GetStats = sprintf("select s.Season, g.Name, g.Number, SUM(g.ProPenalityShotsShots) as PenalityShotsShots from  goaliestats as g, seasons as s where s.S_ID=g.Season_ID And s.SeasonType=0 AND g.Team=%s group by g.Number order by PenalityShotsShots DESC LIMIT 0,10",$_SESSION['current_Team_ID']);
            }
			$GetStats = mysql_query($query_GetStats, $connection) or die(mysql_error());
            $row_GetStats = mysql_fetch_assoc($GetStats);
            $totalRows_GetStats = mysql_num_rows($GetStats);
            $i=0;
            do {
            $i=$i+1;
            ?>
                <tr>
                <td align="center"><?php echo $i;?>.</td>
                <td align="center"><a href="goalie.php?player=<?php echo $row_GetStats['Number']; ?>"><?php echo $row_GetStats['Name']; ?></a></td>
                <td align="center"><?php echo $row_GetStats['PenalityShotsShots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>
    
			<Br />
            </div>
    </div>
    
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
