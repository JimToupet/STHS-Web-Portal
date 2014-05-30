<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PageTitle = "Add Free Agent Draft";
	$l_Title  = "DRAFT TITLE";
	$l_Summary  = "Rounds";
	$l_Season  = "SEASON";
	$l_Lottery  = "Lottery Winner";
	$l_Ranking = "Draft Order";
	$l_Champs  = "League Champions";
	$l_Loosers  = "Lost in Championship Finals";
	$l_STHSYear = "STHS Generated Year";
	$l_DateCreated  = "START DATE";
	$lTime  = "TIME BETWEEN PICKS";
	$l_DraftType = "Draft Type";
	$l_Submit  = "SUBMIT";
	$l_minperpick = "minutes per pick";
	$l_Order = "Team Order";
	$l_OrderNote = "The order of the draft is based on the standings of the selected season.";
	$l_Alert1 = "Please enter a title.  Please keep the title lest than 30 characters.";
	$l_Alert2 = "Please select a season.";
	$l_Instructions = "The season will determine the order of the draft picks.  If the order of the team standings changes after this, please go into the EDIT DRAFT page and UPDATE the draft so the order of the draft will relect the final team standings.";
	break; 

case 'fr': 
	$l_PageTitle = "Ajouter un draft";
	$l_Title  = "Titre";
	$l_Summary  = "Type";
	$$l_Season  = "Saison";
	$l_Lottery  = "Gagnant de la loterie";
	$l_Ranking = "Ordre du rep&ecirc;chage";
	$l_Champs  = "Champion de saison";
	$l_Loosers  = "Ont perdu en finale";
	$l_STHSYear = "Ann&eacute;e g&eacute;n&eacute;r&eacute;e par le STHS";
	$l_DateCreated  = "Date";
	$lTime  = "Temps allouer entre les choix";
	$l_DraftType = "Draft Type";
	$l_Submit  = "POSTER";
	$l_minperpick = "minutes par choix";
	$l_Order = "Odre des &eacute;quipes";
	$l_OrderNote = "L'ordre du rep&ecirc;chage est bas&eacute; sur le classement de la saison s&eacute;lectionn&eacute;e.";
	$l_Alert1 = "Veuillez s'il vous pla&acirc;t &eacute;crire un titre. Maximum 30 caract&egrave;res.";
	$l_Alert2 = "SVP choisir une saison.";
	$l_Instructions = "La saison d&eacute;terminera l'ordre du rep&ecirc;chage. Si le classement final change vous devez allez dans la page EDIT DRAFT et faire une mise &agrave; jour du rep&ecirc;chage, ainsi le classement sera mise &agrave; jour.";
	break;
} 
 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	$RandomDraft = unique_rand(1, $_SESSION['total_teams']+1, $_SESSION['total_teams']);
	$insertSQL = sprintf("INSERT INTO waiver_draft (DraftName,DraftPickTime,Round,DraftStatus,Season_ID,Type,TeamList) values (%s,%s,%s,'False',%s,%s,%s)",
							GetSQLValueString($_POST['DraftName'], "text"),
							GetSQLValueString($_POST['DraftPickTime'], "int"),
							GetSQLValueString($_POST['Round'], "int"),
							GetSQLValueString($_POST['Season_ID'], "int"),
							GetSQLValueString($_POST['DraftType'], "text"),
							GetSQLValueString($_POST['teamlist'], "text"));
	  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  	$DraftIDReturned =  mysql_insert_id();

	$tmpLeagueStatusSQL = "";
	if ($_SESSION['JuniorLeague'] == 'False'){	
		$tmpLeagueStatusSQL = " proteamstandings.StandingPlayoffTitle asc, ";
	}

	$query_GetStandings = sprintf("SELECT proteam.Number FROM proteamstandings, proteam, seasons WHERE seasons.S_ID=proteamstandings.Season_ID AND proteam.Number=proteamstandings.Number AND seasons.Season=%s AND seasons.SeasonType=1 ORDER BY %s proteamstandings.Point asc, proteamstandings.W asc, proteamstandings.GF asc, proteamstandings.GA desc,  proteamstandings.PowerRanking asc", $_POST['Season_ID'], $tmpLeagueStatusSQL);
	$GetStandings = mysql_query($query_GetStandings, $connection) or die(mysql_error());
	$row_GetStandings = mysql_fetch_assoc($GetStandings);
	$totalRows_GetStandings = mysql_num_rows($GetStandings);

	if($_POST['Season_ID'] != 0){
		$i=0;
		do{
			$i = $i + 1;
			$Team[$i] = $row_GetStandings['Number'];	
			$TeamSnake[$totalRows_GetStandings + 1 - ($i)] = $row_GetStandings['Number'];	
		} while ($row_GetStandings = mysql_fetch_assoc($GetStandings)); 
			
	} else { 
		$teamList = explode(",", substr($_POST['teamlist'], 0, strlen($_POST['teamlist'])-1));
		for($i = 0; $i < count($teamList); $i++){
			$Team[$i] = $teamList[$i];	
			$TeamSnake[$i] = $teamList[((count($teamList)-1) - $i)];	
		}
	
	}
	
	for ( $round = 1; $round <= $_POST['Round']; $round += 1) {
		for( $counter = 1; $counter <= $i; $counter++ )
		{	
			if($round > 1){
				$overall = (($round-1) * $_SESSION['total_teams'])+$counter;
			} else {
				$overall = $counter;
			}
			if($_POST['Season_ID'] != 0){
				if(isset($_POST['SNAKE']) && $_POST['SNAKE'] != ""){
					if ($round % 2) {
						$TeamNumber = $Team[$counter];
					} else {
						$TeamNumber = $TeamSnake[$counter];	
					}
				 } else {
					$TeamNumber = $Team[$counter];
				 }
			} else {
				if(isset($_POST['SNAKE']) && $_POST['SNAKE'] != ""){
					if ($round % 2) {
						$TeamNumber = $Team[$counter-1];
					} else {
						$TeamNumber = $TeamSnake[$counter-1];	
					}
				 } else {
					$TeamNumber = $Team[$counter-1];
				 }
			}
			//echo "Round ".$round." - Number: ".$counter." ".$TeamNumber."<br>";
			
			$insertSQL = sprintf("INSERT INTO waiver_draftpicks (Draft_ID,TeamName,Round,Overall) values (%s,%s,%s,%s)",
									GetSQLValueString($DraftIDReturned, "int"),
									GetSQLValueString($TeamNumber, "int"),
									GetSQLValueString($round, "int"),
									GetSQLValueString($overall, "int"));
			$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
			
		}
	}  

  	$updateGoTo = "waiver_draft.php";
 
   if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$query_GetSeasonsList = sprintf("SELECT * FROM seasons WHERE SeasonType=1 ORDER by Season desc");
$GetSeasonsList = mysql_query($query_GetSeasonsList, $connection) or die(mysql_error());
$row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList);
$totalRows_GetSeasonsList = mysql_num_rows($GetSeasonsList);

$query_GetDraftYear = sprintf("SELECT Year FROM draftpicks group by Year Order By Year");
$GetDraftYear = mysql_query($query_GetDraftYear, $connection) or die(mysql_error());
$row_GetDraftYear = mysql_fetch_assoc($GetDraftYear);
$totalRows_GetDraftYear = mysql_num_rows($GetDraftYear);

$query_GetTeam2 = sprintf("SELECT City, Name, Number FROM proteam ORDER by City");
$GetTeam2 = mysql_query($query_GetTeam2, $connection) or die(mysql_error());
$row_GetTeam2 = mysql_fetch_assoc($GetTeam2);
$totalRows_GetTeam2 = mysql_num_rows($GetTeam2);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="shortcut icon" type="image/png" href="<?php echo $_SESSION['DomainName']; ?>/image/<?php echo $_SESSION['FavIcon'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css"><link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/datePicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/date.css" />


<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/date.js"></script>

<?php if(isset($_SESSION['username'])){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/chat.css" />
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/chat.js"></script>
<?php } ?>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.bgiframe.min.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
  
  $('#btn-up').bind('click', function() {
        $('#select-to option:selected').each( function() {
            var newPos = $('#select-to option').index(this) - 1;
            if (newPos > -1) {
                $('#select-to option').eq(newPos).before("<option value='"+$(this).val()+"' selected='selected'>"+$(this).text()+"</option>");
                $(this).remove();
            }
        });
    });
    $('#btn-down').bind('click', function() {
        var countOptions = $('#select-to option').size();
        $('#select-to option:selected').each( function() {
            var newPos = $('#select-to option').index(this) + 1;
            if (newPos < countOptions) {
                $('#select-to option').eq(newPos).after("<option value='"+$(this).val()+"' selected='selected'>"+$(this).text()+"</option>");
                $(this).remove();
            }
        });
    });
	
	 $('form').submit(function() {
	 $('#select-to option').each(function(i) {
	  $(this).attr("selected", "selected");
	 });
	 
	 var str1 = "";
	 $("#select-to option:selected").each(function () {
		str1 += $(this).val() + ",";
	  });
	 $('#teamlist').val(str1);
 });
	
});;
</script>
<script language="javascript">
function checkit(){
	if (document.form1.DraftName.value.length==0){
		alert("<?php echo $l_Alert1;?>");
		return false;
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
<h1><?php echo $l_PageTitle;?></h1>
<form method="post" name="form" id="form" action="<?php echo $editFormAction; ?>" onsubmit='return checkit()'>
<div class="rowElem">
<label for="DraftName"><?php echo $l_Title;?>:</label>
<input type="text" name="DraftName" size="30" value="<?php echo $_SESSION['current_Season'];?> Free Agent Draft" size="30">
</div>

<div class="rowElem">
<label for="round"><?php echo $l_Summary;?>:</label>
<select name="Round" size="1">
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="3">3</option>
   <option value="4">4</option>
   <option value="5" selected>5</option>
   <option value="6">6</option>
   <option value="7">7</option>
   <option value="8">8</option>
   <option value="9">9</option>
   <option value="10">10</option>
   <option value="12">11</option>
   <option value="13">12</option>
   <option value="13">13</option>
   <option value="14">14</option>
   <option value="15">15</option>
   <option value="16">16</option>
   <option value="17">17</option>
   <option value="18">18</option>
   <option value="19">19</option>
   <option value="20">20</option>
   <option value="21">21</option>
   <option value="22">22</option>
   <option value="23">23</option>
   <option value="24">24</option>
   <option value="25">25</option>
   <option value="26">26</option>
   <option value="27">27</option>
   <option value="28">28</option>
   <option value="29">29</option>
   <option value="30">30</option>
   <option value="31">31</option>
   <option value="32">32</option>
   <option value="33">33</option>
   <option value="34">34</option>
   <option value="35">35</option>
   <option value="36">36</option>
   <option value="37">37</option>
   <option value="38">38</option>
   <option value="39">39</option>
   <option value="40">40</option>
   <option value="41">41</option>
   <option value="42">42</option>
   <option value="43">43</option>
   <option value="44">44</option>
   <option value="45">45</option>
   <option value="46">46</option>
   <option value="47">47</option>
   <option value="48">48</option>
   <option value="49">49</option>
   <option value="50">50</option>
  </select>
</div>

<div class="rowElem">
<label for="DraftPickTime"><?php echo $lTime;?>:</label>
<select name="DraftPickTime" size="1">
  <option value="1">1 <?php echo $l_minperpick;?></option>
  <option value="2">2 <?php echo $l_minperpick;?></option>
  <option value="5">5 <?php echo $l_minperpick;?></option>
  <option value="10" selected="selected">10 <?php echo $l_minperpick;?></option>
  <option value="15">15 <?php echo $l_minperpick;?></option><option value="30">30 <?php echo $l_minperpick;?></option><option value="60">60 <?php echo $l_minperpick;?></option>
  </select>
</div>

<div class="rowElem">
<label for="DraftType"><?php echo $l_DraftType;?>:</label>
<select name="DraftType" size="1">
  <option value="Regular" selected="selected">Free Agent Draft</option>
  <option value="Euro">European Import Draft</option>
  </select>
</div>

<div class="rowElem">
<label for="Season_ID"><?php echo $l_Ranking;?>:</label>
<select name="Season_ID" size="1">
<option value="0">Custom Team Order</option>
 <?php do { ?>
  <option value="<?php echo $row_GetSeasonsList['Season']; ?>" <?php if($row_GetSeasonsList['Season']==($_SESSION['current_Season'])){ echo 'selected';}?>><?php echo $row_GetSeasonsList['Season']; ?></option>
<?php } while ($row_GetSeasonsList = mysql_fetch_assoc($GetSeasonsList)); ?>
  </select>
</div>

<div class="rowElem">
<label for="select-to">Custom Team Order:</label>
<select name="selectto" id="select-to" multiple size="10">
<?php
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
echo '<option value="'.$_SESSION['MenuTeamsID'][$TeamPage].'">'.$value.'</option>';
}
?>
    </select>
    <input type="hidden" name="teamlist" id="teamlist" value="" />
    <a href="JavaScript:void(0);" id="btn-up">Up</a>
    <a href="JavaScript:void(0);" id="btn-down">Down</a>
</div>  
 
<div class="rowElem">
<label for="SNAKE">Snake Draft</label>
<input name="SNAKE" type="checkbox" value="1" />
</div>
 
<br clear="all" /><div align="center"><input type="submit" value="<?php echo $l_Submit;?>" class="button add"></div><br />

  <input type="hidden" name="MM_insert" value="form1">
</form>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
