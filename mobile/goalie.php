<?php include('../Connections/settings.php'); ?>
<?php include("../includes/sessionInfo.php") ?>
<?php include("../includes/functions.php") ?>
<?php include("../includes/langfile.php") ?>
<?php include("../includes/langs.php") ?>
<?php include("../includes/langs_stats.php") ?>
<?php 
switch ($lang){ 
case 'en': 
	$l_OV_D = "Overall";
	$l_AvgCapHit = "Avg. Cap Hit";
	$l_t_years = "Year(s)";
	$l_Over = "Contract";
	break; 

case 'fr': 
	$l_OV_D = "Total";
	$l_AvgCapHit = "Moy. Des Couts de la Masse Salariale";
	$l_t_years = "Year(s)";
	$l_Over = "Contract";
	break;
} 



$PID_GetPlayer = 0;
if (isset($_GET['player'])) {
  $PID_GetPlayer = (get_magic_quotes_gpc()) ? $_GET['player'] : addslashes($_GET['player']);
}
$GetNumber = 0;
if (isset($_GET['number'])) {
  $GetNumber = (get_magic_quotes_gpc()) ? $_GET['number'] : addslashes($_GET['number']);
}

$query_GetPlayer = sprintf("SELECT * FROM goalies WHERE goalies.Number=%s", $PID_GetPlayer);
$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
$totalRows_GetPlayer = mysql_num_rows($GetPlayer);


function minutes( $seconds )
{
    return sprintf( "%02.2d:%02.2d", floor( $seconds / 60 ), $seconds % 60 );
}

$division=$row_GetPlayer['Height']/12;   
$feet=intval(abs($division)); 
$decimal=abs($division)-intval(abs($division));
$inches=$decimal*12;
$ContractExtension=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['TouchIcon'];?>" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $_SESSION['SiteName'] ; ?></title>
<meta content="STHS Web Portal" name="keywords" />
</head>

<body>

<div id="topbar">
	<div id="title"><?php echo $_SESSION['current_City']." ".$_SESSION['current_Team'];?></div>
	<div id="leftnav">
		<a href="team.php?team=<?php echo $_SESSION['current_Team_ID']; ?>"><img alt="<?php echo $_SESSION['current_Team']; ?>" src="../image/logos/medium/<?php echo $_SESSION['current_LogoSmall']; ?>" height="20" /></a>
    </div>
    
	<div id="rightnav">
    <?php if(!isset($_SESSION['U_ID'])){ ?>
		<a href="login.php"><?php echo $l_login;?></a> </div>
    <?php } else { ?>
    	<a href="logout.php"><?php echo $l_log_out; ?></a> </div>
    <?php } ?>
</div>

<div id="content">
	<span class="graytitle"><?php echo $l_nav_proteam; ?></span>
	<ul class="pageitem">
    	<li class="textbox">
        <img src="<?php echo imageExists("/image/players/".$row_GetPlayer['Photo']); ?>" style="float:left; padding-right:10px;" width="100" height="150" />
        <span class="header"><?php echo $row_GetPlayer['Name']; ?></span> 
        <span class="text">
			<?php 
			echo $l_Age." : ".getAge($row_GetPlayer['AgeDate']);
        	echo "<br />";
			echo $l_Height." : ".$feet."'".$inches;
        	echo "<br />";
			echo $l_Weight." : ".$row_GetPlayer['Weight']."lbs";
        	echo "<br />";
			echo $l_Country." : ";
			echo '<img height="12" width="12" src="'.$_SESSION['DomainName'].'/image/flags/'.$row_GetPlayer['Country'].'.png" border="0"/>';
        	echo "<br />";
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
			echo $l_AvgCapHit." : ";
			if($row_GetPlayer['Contract'] > 0){
				echo "$".number_format($tmpCapHit/$row_GetPlayer['Contract'],0);
				echo "<br />";
				echo $l_Over." : ".$row_GetPlayer['Contract']." ".$l_t_years;
			} else {
				if($UFA > getAge($row_GetPlayer['AgeDate'])){
					echo " ".$l_restricted_free_agents;
				} else {
					echo " ".$l_unrestricted_free_agents;
				}
			}
        	echo "<br />";
			echo $l_Condition." : ".$row_GetPlayer['CON']."%";
			?>
        </span>
		
        <li class="menu"><span class="name"><?php echo $l_SK_D." : ".$row_GetPlayer['SK'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_DU_D." : ".$row_GetPlayer['DU'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_EN_D." : ".$row_GetPlayer['EN'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_SZ_D." : ".$row_GetPlayer['SZ'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_AG_D." : ".$row_GetPlayer['AG'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_RB_D." : ".$row_GetPlayer['RB'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_SA_D." : ".$row_GetPlayer['SC'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_HS_D." : ".$row_GetPlayer['HS'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_RT_D." : ".$row_GetPlayer['RT'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_PC_D." : ".$row_GetPlayer['PC'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_PenS_D." : ".$row_GetPlayer['PS'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_EX_D." : ".$row_GetPlayer['EX'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_LD_D." : ".$row_GetPlayer['LD'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_MO_D." : ".$row_GetPlayer['MO'];?></span></li>        
        <li class="menu"><span class="name"><?php echo $l_PO_D." : ".$row_GetPlayer['PO'];?></span></li>  
        <?php if ($_SESSION['DisplayOV'] == 1) {  echo '<li class="menu"><span class="name">'.$l_OV_D ." : ".$row_GetPlayer['Overall'].'</span></li>'; } ?>
		</li> 
		<?php if($row_GetPlayer['Status1'] <= 1){?>
        	<li class="menu"><a href="farm_roster.php"><span class="name"><?php echo $l_nav_farmteam; ?></span><span class="arrow"></span></a></li> 
		<?php } else { ?>
        	<li class="menu"><a href="pro_roster.php"><span class="name"><?php echo $l_nav_proteam; ?></span><span class="arrow"></span></a></li>
        <?php } ?>        
	</ul>
</div>

<div id="footer">
	<a class="noeffect" href="http://www.simhl.net"><?php echo $l_footer_2; ?> STHS WEB PORTAL</a>
	&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php
    $currentFile = $_SERVER["SCRIPT_NAME"]; 
    $parts = Explode('/', $currentFile); 
    $currentFile = $parts[count($parts) - 1]; 
    if($lang=='en'){
        echo '<a class="noeffect"href="langswitch.php?lang=fr&prevpage='.$currentFile.'">Fran&ccedil;ais</a>';
    } else {
        echo '<a class="noeffect"href="langswitch.php?lang=en&prevpage='.$currentFile.'">English</a>';
    }
    ?>
</div>

</body>

</html>
