<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_Email = "E-mail Address";
	$l_Messenger = "Messenger Address";
	$l_note = "Note: We replaced @ with a the code special characters to protect your e-mail from e-mail spiders.";
	$l_addnotes = "These notes are only viewable by an administrator.";
	$l_Comnotes = "Commissioners Notes";
	$l_ExtSummary = "Ext. Summary";
	$l_Summary = "Summary";
	$l_ProTotals = "PRO TOTALS";
	$l_RegularSeason = "Regular Season";
	$l_PlayerRatings = "Player Ratings";
	$l_CareerPlayoff = "CAREER PLAYOFF SEASON STATISTICS";
	$l_CareerRegular = "CAREER REGULAR SEASON STATISTICS";
	break; 
	
case 'fr': 	
	$l_Email = "Courriel";
	$l_Messenger = "Addresse du Messenger";
	$l_note = "Note : Nous avons remplac&eacute; @ par les caract&egrave;res sp&eacute;ciaux de code pour prot&eacute;ger votre email contre des araign&eacute;es d'email.";
	$l_addnotes = "Ces notes sont seulement visualisables par un administrateur.";
	$l_Comnotes = "Notes";
	$l_Summary = "Sommaire";
	$l_ProTotals = "TOTAL PRO";
	$l_RegularSeason = "Saison R&eacute;guli&egrave;re";
	$l_PlayerRatings = "Cotes du joueur";
	$l_CareerPlayoff = "Statistiques carri&egrave;re pour s&eacute;rie &eacute;liminatoire";
	$l_CareerRegular = "Statistiques carri&egrave;re pour saison r&eacute;guliere";
	break; 
} 

$ID_GetGM = $_SESSION['current_GM'];
if (isset($_GET['gm'])) {
  	$ID_GetGM = (get_magic_quotes_gpc()) ? $_GET['gm'] : addslashes($_GET['gm']);
	$ID_GetGM = htmlspecialchars(urldecode($ID_GetGM));
  	$query_GetBio = sprintf("SELECT oauth_provider, oauth_uid, Number, Avatar, GM, Bio, CommishNotes, Email, Messenger FROM proteam WHERE GM='%s'",  $ID_GetGM );
	$GetBio = mysql_query($query_GetBio, $connection) or die(mysql_error());
	$row_GetBio = mysql_fetch_assoc($GetBio);
	$totalRows_GetBio = mysql_num_rows($GetBio);
} else {
	$query_GetBio = sprintf("SELECT oauth_provider, oauth_uid, Number, Avatar, GM, Bio, CommishNotes, Email, Messenger FROM proteam WHERE Number=%s",  $_SESSION['current_Team_ID']);
	$GetBio = mysql_query($query_GetBio, $connection) or die(mysql_error());
	$row_GetBio = mysql_fetch_assoc($GetBio);
	$totalRows_GetBio = mysql_num_rows($GetBio);
}


$query_GetStats= sprintf("SELECT * FROM gmstats as G, seasons as S WHERE S.S_ID = G.Season_ID AND G.Name='%s' AND S.SeasonType=1 ORDER BY S.Season Asc", $ID_GetGM);
$GetStats= mysql_query($query_GetStats, $connection) or die(mysql_error());
$row_GetStats= mysql_fetch_assoc($GetStats);
$totalRows_GetStats = mysql_num_rows($GetStats);

$query_GetPlayoffStats= sprintf("SELECT * FROM gmstats as G, seasons as S WHERE S.S_ID = G.Season_ID AND G.Name='%s' AND S.SeasonType=0 ORDER BY S.Season Asc", $ID_GetGM);
$GetPlayoffStats= mysql_query($query_GetPlayoffStats, $connection) or die(mysql_error());
$row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats);
$totalRows_GetPlayoffStats = mysql_num_rows($GetPlayoffStats);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_gm_notes;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <?php if ($totalRows_GetBio > 0){?>
    	<div style="float:right; padding-top:5px; padding-bottom:10px;">
        <?php 
            if(isset($_SESSION['U_ID'])){
                if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
                    echo "<a href='edit_gm.php?team=".$_SESSION['current_Team_ID']."&u_id=".$_SESSION['U_ID']."' class='button edit'><strong>".$l_Edit."</strong></a>";
                }
            }
            ?>
         </div>
         <br clear="all" />
            <img src="<?php echo getAvatar($row_GetBio['oauth_uid'], $row_GetBio['oauth_provider'], $row_GetBio['Number'], $connection); ?>" border="0" style="float:right; margin-left:10px;"/>
			<?php 
			echo "<h1>".$row_GetBio['GM']."</h1>"; 
			$tmpemail = str_replace("@" , "&#64;",$row_GetBio['Email']);
			$tmpmessenger = str_replace("@" , "&#64;", $row_GetBio['Messenger']);
			?>
            
			<p><?php echo $l_note;?></p>
			<?php if(isset($_SESSION['U_ID'])){ ?>
			<strong><?php echo $l_Email;?>:</strong> <?php echo $tmpemail; ?></a>
            <?php if ($tmpmessenger != ""){?>
            <br clear="all" />
			<strong><?php echo $l_Messenger;?>:</strong> <?php echo $tmpmessenger; ?>
            <?php } ?>
           	<br clear="all" />
            <?php } ?>
			<hr>
            
			<blockquote>
                <?php echo $row_GetBio['Bio']; ?>
            </blockquote>
            
		<?php } else { echo "<h1>".$ID_GetGM."</h1>"; } ?>
        
			<br clear="all" />
			<?php
                echo "<h3>".$l_Summary."</h3><br>";
                $tmpTotGP=0;
                $tmpW=0;
                $tmpL=0;
                $tmpT=0;
                $tmpOTW=0;
                $tmpOTL=0;
                $tmpSOW=0;
                $tmpSOL=0;
                $tmpGF=0;
                $tmpGA=0;
                $tmpPim=0;
                $tmpHits=0;
            ?>
            <?php  if ($row_GetStats['ProGP'] > 0){ ?>
            <strong style="text-transform:uppercase;"><?php echo $l_CareerRegular." - ".$l_Summary; ?></strong>
            <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <thead>
            <tr>
                <th><?php echo $l_season;?></th>
                <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
                <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
                <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
                <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
                <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
                <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
                <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
            </tr>
            </thead>
            <tbody>
            <?php do { ?>
            <tr>
                <td align="center"><?php echo ($row_GetStats['Season'])."-".substr($row_GetStats['Season']+1, -2); ?></td>
                <td align="center"><?php echo $row_GetStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetStats['ProGP'];?></td>
                <td align="center"><?php echo $row_GetStats['ProW']; $tmpW=$tmpW+$row_GetStats['ProW'];?></td>
                <td align="center"><?php echo $row_GetStats['ProL']; $tmpL=$tmpL+$row_GetStats['ProL'];?></td>
                <td align="center"><?php echo $row_GetStats['ProT']; $tmpT=$tmpT+$row_GetStats['ProT'];?></td>
                <td align="center"><?php echo $row_GetStats['ProOTW']; $tmpOTW=$tmpOTW+$row_GetStats['ProOTW'];?></td>
                <td align="center"><?php echo $row_GetStats['ProOTL']; $tmpOTL=$tmpOTL+$row_GetStats['ProOTL'];?></td>
                <td align="center"><?php echo $row_GetStats['ProSOW']; $tmpSOW=$tmpSOW+$row_GetStats['ProSOW'];?></td>
                <td align="center"><?php echo $row_GetStats['ProSOL']; $tmpSOL=$tmpSOL+$row_GetStats['ProSOL'];?></td>
                <td align="center"><?php echo $row_GetStats['ProGF']; $tmpGF=$tmpGF+$row_GetStats['ProGF'];?></td>
                <td align="center"><?php echo $row_GetStats['ProGA']; $tmpGA=$tmpGA+$row_GetStats['ProGA'];?></td>
                <td align="center"><?php echo $row_GetStats['ProPim']; $tmpPim=$tmpPim+$row_GetStats['ProPim'];?></td>
                <td align="center"><?php echo $row_GetStats['ProHits']; $tmpHits=$tmpHits+$row_GetStats['ProHits'];?></td>
            </tr>
            <?php } while ($row_GetStats= mysql_fetch_assoc($GetStats)); ?>	
            </tbody>
            <tfoot>
            <?php if ($tmpTotGP > 0) { ?>
            <tr>		
                <td align="right" ><?php echo $l_ProTotals; ?></td>		
                <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpT ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpOTW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpOTL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpSOW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpSOL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpGF ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpGA ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpPim ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpHits ,0); ?></td>
            </tr>
             <?php } ?>
            </tfoot>
            </table>
             <?php } ?>
             
            <?php  if ($row_GetPlayoffStats['ProGP'] > 0){ ?>
            <?php
                $tmpTotGP=0;
                $tmpW=0;
                $tmpL=0;
                $tmpT=0;
                $tmpOTW=0;
                $tmpOTL=0;
                $tmpSOW=0;
                $tmpSOL=0;
                $tmpGF=0;
                $tmpGA=0;
                $tmpPim=0;
                $tmpHits=0;
            ?>
            <strong style="text-transform:uppercase;"><?php echo $l_CareerPlayoff." - ".$l_Summary; ?></strong>
            <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
            <thead>
            <tr>
                <th><?php echo $l_season;?></th>
                <th><a title="<?php echo $l_GP_D;?>"><?php echo $l_GP;?></a></th>
                <th><a title="<?php echo $l_W_D;?>"><?php echo $l_W;?></a></th>
                <th><a title="<?php echo $l_L_D;?>"><?php echo $l_L;?></a></th>
                <th><a title="<?php echo $l_T_D;?>"><?php echo $l_T;?></a></th>
                <th><a title="<?php echo $l_OTW_D;?>"><?php echo $l_OTW;?></a></th>
                <th><a title="<?php echo $l_OTL_D;?>"><?php echo $l_OTL;?></a></th>
                <th><a title="<?php echo $l_SOW_D;?>"><?php echo $l_SOW;?></a></th>
                <th><a title="<?php echo $l_SOL_D;?>"><?php echo $l_SOL;?></a></th>
                <th><a title="<?php echo $l_GF_D;?>"><?php echo $l_GF;?></a></th>
                <th><a title="<?php echo $l_GA_D;?>"><?php echo $l_GA;?></a></th>
                <th><a title="<?php echo $l_PIM_D;?>"><?php echo $l_PIM;?></a></th>
                <th><a title="<?php echo $l_HIT_D;?>"><?php echo $l_HIT;?></a></th>
            </tr>
            </thead>
            <tbody>
            <?php do { ?>
            <tr>
                <td align="center"><?php echo ($row_GetPlayoffStats['Season'])."-".substr($row_GetPlayoffStats['Season']+1, -2); ?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProGP']; $tmpTotGP=$tmpTotGP+$row_GetPlayoffStats['ProGP'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProW']; $tmpW=$tmpW+$row_GetPlayoffStats['ProW'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProL']; $tmpL=$tmpL+$row_GetPlayoffStats['ProL'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProT']; $tmpT=$tmpT+$row_GetPlayoffStats['ProT'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProOTW']; $tmpOTW=$tmpOTW+$row_GetPlayoffStats['ProOTW'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProOTL']; $tmpOTL=$tmpOTL+$row_GetPlayoffStats['ProOTL'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProSOW']; $tmpSOW=$tmpSOW+$row_GetPlayoffStats['ProSOW'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProSOL']; $tmpSOL=$tmpSOL+$row_GetPlayoffStats['ProSOL'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProGF']; $tmpGF=$tmpGF+$row_GetPlayoffStats['ProGF'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProGA']; $tmpGA=$tmpGA+$row_GetPlayoffStats['ProGA'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProPim']; $tmpPim=$tmpPim+$row_GetPlayoffStats['ProPim'];?></td>
                <td align="center"><?php echo $row_GetPlayoffStats['ProHits']; $tmpHits=$tmpHits+$row_GetPlayoffStats['ProHits'];?></td>
            </tr>
            <?php } while ($row_GetPlayoffStats= mysql_fetch_assoc($GetPlayoffStats)); ?>	
            </tbody>
            <tfoot>
            <?php if ($tmpTotGP > 0) { ?>
            <tr>		
                <td align="right" ><?php echo $l_ProTotals; ?></td>		
                <td align="center" ><?php echo number_format($tmpTotGP ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpT ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpOTW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpOTL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpSOW ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpSOL ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpGF ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpGA ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpPim ,0); ?></td>
                <td align="center" ><?php echo number_format($tmpHits ,0); ?></td>
            </tr>
             <?php } ?>
            </tfoot>
            </table>
             <?php } ?>
                <br clear="all" />
			<?php 
			if ($totalRows_GetBio > 0){
			if(isset($_SESSION['U_ID'])){
				if($_SESSION['U_Admin']==1){
			?>
			<div style="float:right; padding-top:5px;">
			<?php
                echo "<a href='edit_gm_notes.php?team=".$_SESSION['current_Team_ID']."&u_id=".$_SESSION['U_ID']."' class='button edit'><strong>".$l_Edit."</strong></a>";
            ?>
			</div>
			<?php 
				echo "<h1>".$l_Comnotes."</h1><p><em>".$l_addnotes."</em></p><hr>".$row_GetBio['CommishNotes'];
				}
			}
			}
			?>
            
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
