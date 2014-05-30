<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_First = "First";
	$l_Previous = "Previous";
	$l_Next = "Next";
	$l_Last = "Last";
	$l_NoGames = "No games available";
	$l_Article = "Article";
	break; 
	
case 'fr': 	
	$l_First = "Premiere";
	$l_Previous = "Pr&eacute;c&eacute;dent";
	$l_Next = "Prochaine";
	$l_Last = "Derni&egrave;re";
	$l_NoGames = $l_None;
	$l_Article = "Article";
	break; 
} 

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_GetNewsList = 40;
$pageNum_GetNewsList = 0;
if (isset($_GET['pageNum_GetNewsList'])) {
  $pageNum_GetNewsList = $_GET['pageNum_GetNewsList'];
}
$startRow_GetNewsList = $pageNum_GetNewsList * $maxRows_GetNewsList;
$TID_GetNewsList = "0";
if (isset($_SESSION['current_Team_ID'])) {
  $TID_GetNewsList = (get_magic_quotes_gpc()) ? $_SESSION['current_Team_ID'] : addslashes($_SESSION['current_Team_ID']);
}

if ($_SESSION['current_Team_ID']==0) {
	$query_GetNewsList = sprintf("SELECT articles.A_ID, articles.Headline, articles.DateCreated, proteam.Number FROM articles LEFT JOIN proteam ON proteam.Number=articles.Team ORDER BY articles.DateCreated desc");
} else {
	$query_GetNewsList = sprintf("SELECT articles.A_ID, articles.Headline, articles.DateCreated, proteam.Number  FROM articles LEFT JOIN proteam ON  proteam.Number=articles.Team WHERE articles.Team=%s ORDER BY articles.DateCreated desc", $TID_GetNewsList);
}
$query_limit_GetNewsList = sprintf("%s LIMIT %d, %d", $query_GetNewsList, $startRow_GetNewsList, $maxRows_GetNewsList);
$GetNewsList = mysql_query($query_limit_GetNewsList, $connection) or die(mysql_error());
$row_GetNewsList = mysql_fetch_assoc($GetNewsList);
if (isset($_GET['totalRows_GetNewsList'])) {
  $totalRows_GetNewsList = $_GET['totalRows_GetNewsList'];
} else {
  $all_GetNewsList = mysql_query($query_GetNewsList);
  $totalRows_GetNewsList = mysql_num_rows($all_GetNewsList);
}
$totalPages_GetNewsList = ceil($totalRows_GetNewsList/$maxRows_GetNewsList)-1;
$queryString_GetNewsList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_GetNewsList") == false && 
        stristr($param, "totalRows_GetNewsList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_GetNewsList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_GetNewsList = sprintf("&totalRows_GetNewsList=%d%s", $totalRows_GetNewsList, $queryString_GetNewsList);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_nav_news;?> - <?php echo $_SESSION['SiteName'] ; ?></title>

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
    <div style="float:left; padding-bottom:2px"><h1><?php echo $l_nav_news;?></h1></div>

		<div style="float:right; padding-top:5px;">
		<?php 
		if(isset($_SESSION['U_ID'])){
			if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
				echo "<a href='add_article.php'><strong>".$l_Add."</strong></a>";
			}
		}
		?></div>
        
        <br clear="all" />
		<br />
        
        <table  cellspacing="0" border="0" width="100%" class="tablesorter" >
        <thead>
        <tr>
            <th>Date</th>
            <th><?php echo $l_Article;?></th>
        </tr>
        </thead>
        <tbody>
        <?php do { ?>
		<tr>
			<td width="85"><?php echo $row_GetNewsList['DateCreated']; ?></td>
			<td><a href="news.php?article=<?php echo $row_GetNewsList['A_ID']; ?>"><?php echo $row_GetNewsList['Headline']; ?></a></td>
		</tr>
		<?php } while ($row_GetNewsList = mysql_fetch_assoc($GetNewsList)); ?>
        </tbody>
        </table>
        
        <br />
        <table cellspacing="0" border="0" width="100%" class="tablesorterRates">
        <thead>
        <tr>
            <th width="23%" align="center"><?php if ($pageNum_GetNewsList > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_GetNewsList=1", $currentPage, 0, $queryString_GetNewsList); ?>" style="font-weight:bold;"><?php echo $l_First;?></a>
                <?php } else { echo $l_First ;} // Show if not first page ?> </th>
            <th width="31%" align="center"><?php if ($pageNum_GetNewsList > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_GetNewsList=%d%s", $currentPage, max(0, $pageNum_GetNewsList - 1), $queryString_GetNewsList); ?>" style="font-weight:bold;"><?php echo $l_Previous;?></a>
                <?php } else { echo $l_Previous ;}// Show if not first page ?></th>
            <th width="23%" align="center"><?php if ($pageNum_GetNewsList < $totalPages_GetNewsList) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_GetNewsList=%d%s", $currentPage, min($totalPages_GetNewsList, $pageNum_GetNewsList + 1), $queryString_GetNewsList); ?>" style="font-weight:bold;"><?php echo $l_Next;?></a>
                <?php } else { echo $l_Next ;} // Show if not last page ?></th>
            <th width="23%" align="center"><?php if ($pageNum_GetNewsList < $totalPages_GetNewsList) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_GetNewsList=%d%s", $currentPage, $totalPages_GetNewsList, $queryString_GetNewsList); ?>" style="font-weight:bold;"><?php echo $l_Last;?></a>
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
