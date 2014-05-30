<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Change  = "CHANGE SEASON";
	$l_saves = "Saves";
	$l_SShots = "Shootout Shots";
	break; 

case 'fr': 
	$l_Change  = "Changer de saison";
	$l_saves = "Saves";
	$l_SShots = "Shootout Shots";
	break;
} 

$ID_GetSeason = "1";
if (isset($_SESSION['current_SeasonID'])) {
  $ID_GetSeason = (get_magic_quotes_gpc()) ? $_SESSION['current_SeasonID'] : addslashes($_SESSION['current_SeasonID']);
}
if (isset($_POST['season_id'])) {
  $ID_GetSeason = (get_magic_quotes_gpc()) ? $_POST['season_id'] : addslashes($_POST['season_id']);
}
if (isset($_GET['season_id'])) {
  $ID_GetSeason = (get_magic_quotes_gpc()) ? $_GET['season_id'] : addslashes($_GET['season_id']);
}

if (isset($_POST['type'])) {
  $ID_Type = (get_magic_quotes_gpc()) ? $_POST['type'] : addslashes($_POST['type']);
}

if ($ID_Type == 0){
	$SQL_Type = "";
} else {
	$SQL_Type = " AND j.Position=".$ID_Type;
}

$query_GetSeasonsLink = sprintf("SELECT * FROM seasons");
$GetSeasonsLink = mysql_query($query_GetSeasonsLink, $connection) or die(mysql_error());
$row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_leaders;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">

#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_Farm_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_Farm_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_Farm_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
h3 {color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {
	background-color:#<?php echo $_SESSION['current_Farm_PrimaryColor']; ?>;
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
    <form action="farm_leaders.php" method="post" name="form1">
	<div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_leaders;?></h1></div>
    <div style="float:right; padding-top:5px;">
    		<select name="type" id="type">
            <option value="0" <?php if($ID_Type==0){ echo "selected"; }?>>All</option>
            <option value="1" <?php if($ID_Type==1){ echo "selected"; }?>>Center</option>
            <option value="2" <?php if($ID_Type==2){ echo "selected"; }?>>Left Wing</option>
            <option value="3" <?php if($ID_Type==3){ echo "selected"; }?>>Right Wing</option>
            <option value="4" <?php if($ID_Type==4){ echo "selected"; }?>>Defense</option>
            </select>
        	<select name="season_id" id="season_id">
			<?php do { 
            if ($row_GetSeasonsLink['SeasonType'] == 2){
            $SeasonType = $l_preseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            $SeasonType = $l_regularseason;
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            $SeasonType = $l_playoffs;
            } 
            ?>
            <option value="<?php echo $row_GetSeasonsLink['S_ID']; ?>" <?php if ($ID_GetSeason == $row_GetSeasonsLink['S_ID']){ echo "selected"; } ?>>
			<?php 
			if ($row_GetSeasonsLink['SeasonType'] == 2){
            echo $row_GetSeasonsLink['Season']." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 1){
            echo $row_GetSeasonsLink['Season']."-".($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } else if ($row_GetSeasonsLink['SeasonType'] == 0){
            echo ($row_GetSeasonsLink['Season']+1)." ".$SeasonType; 
            } 
			
			?></option>
            <?php } while ($row_GetSeasonsLink = mysql_fetch_assoc($GetSeasonsLink)); ?>
            </select><input type="submit" value="<?php echo $l_Change;?>"  class="button" />

        </form></div>
        
        <br clear="all" />
		<br />
    
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
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmGP) as FarmGP from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmGP DESC, FarmMinutePlay DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmGP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmG) as FarmG from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmG DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmA) as FarmA from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmA DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmA']; ?></td>
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
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmPoint) as FarmPoint from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmPoint DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPoint']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmPlusMinus) as FarmPlusMinus from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmPlusMinus DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPlusMinus']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmPim) as FarmPim from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmPim DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPim']; ?></td>
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
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmPPG) as FarmPPG from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmPPG DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPPG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmPKG) as FarmPKG from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmPKG DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPKG']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmGW) as FarmGW from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmGW DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmGW']; ?></td>
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
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmShots) as FarmShots from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmShots DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmShots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmShotsBlock) as FarmShotsBlock from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmShotsBlock DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmShotsBlock']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select p.Name, p.Number,  SUM(p.FarmHits) as FarmHits from playerstats as p, players as j where p.Season_ID=%s and j.Number=p.Number ".$SQL_Type." group by p.Number order by FarmHits DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmHits']; ?></td>
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
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmGP) as FarmGP from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmGP DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmGP']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmW) as FarmW from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmW DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmW']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmL) as FarmL from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmL DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmL']; ?></td>
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
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmOTL) as FarmOTL from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmOTL DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmOTL']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmGA) as FarmGA from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmGA DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmGA']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmSA) as FarmSA from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmSA DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmSA']; ?></td>
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
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmShutouts) as FarmShutouts from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmShutouts DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmShutouts']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmMinPlay) as FarmMinPlay from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmMinPlay DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo minutes($row_GetStats['FarmMinPlay']); ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>        

        </td>
    	<td align="center" style="padding:15px;">

            <table  cellspacing="0" border="0" width="100%" >
            <tbody>
            <?php
            
            $query_GetStats = sprintf("select g.Name, g.Number,  SUM(g.FarmPenalityShotsShots) as FarmPenalityShotsShots from goaliestats as g where g.Season_ID=%s group by g.Number order by FarmPenalityShotsShots DESC LIMIT 0,10",$ID_GetSeason);
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
                <td align="center"><?php echo $row_GetStats['FarmPenalityShotsShots']; ?></td>
                </tr>
            <?php } while ($row_GetStats = mysql_fetch_assoc($GetStats)); ?>
            </tbody> 
            </table>
        
        </td>

    </tr>
    </tbody>
    </table>

	<Br />
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
