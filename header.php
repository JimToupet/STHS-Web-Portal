<script type="text/javascript">
$(function(){ 
	var zIndexNumber = 1000;
	$('div').each(function() {
		$(this).css('zIndex', zIndexNumber);
		zIndexNumber -= 10;
	});
	
<?php
echo "$('#team0').hover(";
echo "function(){";
echo "$(this).attr({ src : '".$_SESSION['DomainName']."/image/logos/nav/".$_SESSION['current_TinyLeagueImage']."'});";
echo "$(this).attr({ href : 'simhl.php'});";
echo "$(this).stop().animate({ opacity: 1.0 }, 200);";
echo "},";
echo "function(){";
echo "$(this).attr({ src : '".$_SESSION['DomainName']."/image/logos/nav/".$_SESSION['current_TinyLeagueImage']."'});";
echo "$(this).stop().animate({ opacity: 0.5 }, 200);";
echo "}";
echo ");";
foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
	echo "$('#team".$_SESSION['MenuTeamsID'][$TeamPage]."').hover(";
	echo "function(){";
	echo "$(this).attr({ src : '".$_SESSION['DomainName']."/image/logos/nav/".$_SESSION['MenuTeamsLogo'][$TeamPage]."'});";
	echo "$(this).attr({ href : 'team.php?team=".$_SESSION['MenuTeamsID'][$TeamPage]."'});";
	echo "$(this).stop().animate({ opacity: 1.0 }, 200);";
	echo "},";
	echo "function(){";
	echo "$(this).attr({ src : '".$_SESSION['DomainName']."/image/logos/nav/".$_SESSION['MenuTeamsLogo'][$TeamPage]."'});";
	echo "$(this).stop().animate({ opacity: 0.5 }, 200);";
	echo "}";
	echo ");";
}
?>

	$( "#todaysGames" ).accessNews({
		speed : "normal",
		slideBy : 2
	});
	
	
<?php 
	if(!isset($_SESSION['U_ID'])){ 
		echo "$('#signin').formly(); ";
	 	$accountMenuName = "signin_menu";
	}else{
	 	$accountMenuName = "profile_menu";		
	}
?>

	var OriginalColor = $(".topnavblock").css("background-color");
	$(".signin").click(function(e) {          
		e.preventDefault();
		$("fieldset#<?php echo $accountMenuName;?>").toggle();
		$(".signin").toggleClass("menu-open");
		$(".topnavblock").css("background-color","#dedede");
		
	});
			
	$("fieldset#<?php echo $accountMenuName;?>").mouseup(function() {
		return false
	});
	
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.signin").length==0) {
			$(".signin").removeClass("menu-open");
			$(".topnavblock").css("background-color",OriginalColor);
			$("fieldset#<?php echo $accountMenuName;?>").hide();
		} 
	});	
			
	$('#forgot_username_link').tipsy({gravity: 'w'});   

});;
</script>
<header>
<div style="width:100%; height:25px; background-color:#232323; background-image:url(image/common/top-icon-bg.jpg); background-position:top; background-repeat:repeat-x;">
    <ul class="teams">
    <?php
    echo '<li><a href="simhl.php" class="thumb"><span><img src="'.$_SESSION['DomainName'].'/image/logos/nav/'.$_SESSION['current_TinyLeagueImage'].'" id="team0" alt="'.$_SESSION['SiteName'].'" width="25" height="25" border="0" /></span></a></li>';
    foreach( $_SESSION['MenuTeams'] as $TeamPage => $value){
        echo '<li><a href="team.php?team='.$_SESSION['MenuTeamsID'][$TeamPage].'" class="thumb"><span><img src="'.$_SESSION['DomainName'].'/image/logos/nav/'.$_SESSION['MenuTeamsLogo'][$TeamPage].'" id="team'.$_SESSION['MenuTeamsID'][$TeamPage].'" title="'.$value.'" width="25" height="25" border="0" /></span></a></li>';
		$ExtID = $_SESSION['MenuTeamsID'][$TeamPage];
    }
	if(isset($_SESSION['ExtLeague']) && $_SESSION['ExtLeague'] != ""){
		foreach( $_SESSION['ExtLeague'] as $LeaguePage => $value){
			$ExtID = $ExtID + 1;
			if($_SESSION['ExtIcon'][$LeaguePage] != ""){
				echo '<li><a href="'.$_SESSION['ExtURL'][$LeaguePage].'" class="thumb" target="_blank"><span><img src="'.$_SESSION['DomainName'].'/image/logos/'.$_SESSION['ExtIcon'][$LeaguePage].'" id="team'.$ExtID.'" title="'.$value.'" width="25" height="25" border="0" /></span></a></li>';
			}
		}
	}
    ?>
    </ul>
</div>

<div id="container">
<div class="accessible_news_slider NHL" id="todaysGames">
<?php
 		
$query_GetInfo = sprintf("SELECT LastModifiedLeagueFile, LastModifiedSchedule FROM config");
$GetInfo = mysql_query($query_GetInfo, $connection) or die(mysql_error());
$row_GetInfo = mysql_fetch_assoc($GetInfo);

putenv($_SESSION['current_TimeZone']);
$timeStamp = strtotime($row_GetInfo['LastModifiedSchedule']);
					$timeStamp += 36 * 60 * 60 * 1; // (add 7 days)
					$newDate = $row_GetInfo['LastModifiedSchedule'];
$TodaysDate = strftime('%Y-%m-%d', strtotime('now'));

if($_SESSION['current_Team_ID']==0){
	$tmpDayCount=1;
	$query_GetLastDay = "select schedule.Day, schedule.Round FROM schedule WHERE (schedule.Play='TRUE' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." GROUP BY schedule.Day Desc Limit 0,1";
} else {
	$tmpDayCount=8;
	$query_GetLastDay = "select schedule.Day, schedule.Round FROM schedule WHERE (schedule.Play='TRUE' OR schedule.Play='Vrai') AND schedule.Season_ID=".$_SESSION['current_SeasonID']." AND schedule.HomeTeam=".$_SESSION['current_Team_ID']." GROUP BY schedule.Day Desc Limit 0,1";
}
		
$GetLastDay = mysql_query($query_GetLastDay, $connection) or die(mysql_error());
$row_GetLastDay = mysql_fetch_assoc($GetLastDay);
$totalRows_GetLastDay = mysql_num_rows($GetLastDay);

$query_GetSeasons = sprintf("SELECT Folder FROM seasons WHERE Active=1");
$GetSeasons = mysql_query($query_GetSeasons, $connection) or die(mysql_error());
$row_GetSeasons = mysql_fetch_assoc($GetSeasons);


if($totalRows_GetLastDay > 0 ){
	$Day_ID = $row_GetLastDay['Day'];
	$NextDay = $row_GetLastDay['Day'] + $tmpDayCount;
	$PreviousDay = $row_GetLastDay['Day'];
	$PlayoffRound = $row_GetLastDay['Round'];
} else {
	$Day_ID = 0;
	$NextDay = $tmpDayCount;
	$PreviousDay = 0;
	$PlayoffRound = $tmpDayCount;
}
if($_SESSION['current_Team_ID']==0){
$query_GetDay = sprintf("select S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Pro' as GameType FROM schedule WHERE Day <= %s AND Day >=%s AND Season_ID=%s UNION ALL select S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore,  'Farm' as GameType FROM farmschedule WHERE Day <= %s AND Day >=%s AND Season_ID=%s ", $NextDay, $PreviousDay, $_SESSION['current_SeasonID'], $NextDay, $PreviousDay, $_SESSION['current_SeasonID']);
}else{
$query_GetDay = sprintf("select S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Pro' as GameType FROM schedule WHERE Day <= %s AND Day >=%s AND Season_ID=%s AND (VisitorTeam='%s' OR HomeTeam='%s') UNION ALL select S_ID, Number, Day, Play, VisitorTeam, VisitorScore, HomeTeam, HomeScore, 'Farm' as GameType FROM farmschedule WHERE Day <= %s AND Day >=%s AND Season_ID=%s AND (VisitorTeam='%s' OR HomeTeam='%s') ", $NextDay, $PreviousDay, $_SESSION['current_SeasonID'],$_SESSION['current_Team_ID'],$_SESSION['current_Team_ID'], $NextDay, $PreviousDay, $_SESSION['current_SeasonID'],$_SESSION['current_Team_ID'],$_SESSION['current_Team_ID']);
}
	
$GetDay = mysql_query($query_GetDay, $connection) or die(mysql_error());
$row_GetDay = mysql_fetch_assoc($GetDay);
$totalRows_GetDay = mysql_num_rows($GetDay);

if($totalRows_GetDay > 0 ){
?>
<p class="back"><a href="#" title="Back">&laquo; back</a></p>
<p class="next"><a href="#" title="Next">next &raquo;</a></p>
<ul>
<?php
do {
$GameLink = "";
if($row_GetDay['GameType'] == "Pro"){
$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Pro' ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
$row_GetLink = mysql_fetch_assoc($GetLink);
$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetDay['Number'].".html";

$query_GetHomeTeam = sprintf("SELECT proteam.Name, proteam.Number, proteam.Name FROM proteam WHERE proteam.Number=%s",$row_GetDay['HomeTeam']);
$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);
$query_GetVisitorTeam = sprintf("SELECT proteam.Name, proteam.Number, proteam.Name FROM proteam WHERE proteam.Number=%s",$row_GetDay['VisitorTeam']);
$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);
?>    
    <li>
    <table border="0" cellpadding="1" cellspacing="0" width="125">
    <tr><td><?php echo $l_Day." ".$row_GetDay['Day'];?></td><td align="right"><?php echo $l_Game." ".$row_GetDay['Number'];?></td></tr>
    </table>
    <table border="0" cellpadding="1" cellspacing="0" width="125">
    <tr><td><?php echo $row_GetHomeTeam['Name'];?></td><td align="right"><?php if ($row_GetDay['Day'] < $NextDay){ echo $row_GetDay['HomeScore'];}?></td></tr>
    <tr><td><?php echo $row_GetVisitorTeam ['Name'];?></td><td align="right"><?php if ($row_GetDay['Day'] < $NextDay){ echo $row_GetDay['VisitorScore'];}?></td></tr>
    <tr><td colspan="2"><?php if ($row_GetDay['Play'] == "True" OR $row_GetDay['Play'] == "Vrai"){  echo '<a href="'.$_SESSION['DomainName'].'/File/'.$row_GetSeasons["Folder"].'/'.$GameLink.'" target="_blank">'.$l_Boxscore.'</a>';  } else { echo '<a href="game_preview.php?id='.$row_GetDay['S_ID'].'">'.$l_Preview.'</a>'; } ?></td></tr>
    </table>
    </li>
    
<?php
}else{
if ($_SESSION['current_FarmLeague'] == 'True'){
$GameLink = "";

$query_GetLink = sprintf("SELECT Link FROM todaysgame WHERE Season_ID=%s AND Type='Farm' ORDER BY Link DESC limit 0,1", $_SESSION['current_SeasonID']);
$GetLink = mysql_query($query_GetLink, $connection) or die(mysql_error());
$row_GetLink = mysql_fetch_assoc($GetLink);
$tmpPos = strpos($row_GetLink['Link'], ".") - strrpos($row_GetLink['Link'],"-")-1;
$gameNumber = substr($row_GetLink['Link'], strrpos($row_GetLink['Link'],"-")+1, $tmpPos);
$GameLink = substr($row_GetLink['Link'], 0, strrpos($row_GetLink['Link'],"-")+1).$row_GetDay['Number'].".html";

$query_GetHomeTeam = sprintf("SELECT farmteam.Number, farmteam.Name FROM farmteam WHERE farmteam.Number=%s",$row_GetDay['HomeTeam']);
$GetHomeTeam = mysql_query($query_GetHomeTeam, $connection) or die(mysql_error());
$row_GetHomeTeam = mysql_fetch_assoc($GetHomeTeam);
$query_GetVisitorTeam = sprintf("SELECT farmteam.Number, farmteam.Name FROM farmteam WHERE farmteam.Number=%s",$row_GetDay['VisitorTeam']);
$GetVisitorTeam = mysql_query($query_GetVisitorTeam, $connection) or die(mysql_error());
$row_GetVisitorTeam = mysql_fetch_assoc($GetVisitorTeam);
?>    
    <li>
    <table border="0" cellpadding="1" cellspacing="0" width="125">
    <tr><td><?php echo $l_Day." ".$row_GetDay['Day'];?></td><td align="right"><?php echo $l_Game." ".$row_GetDay['Number'];?></td></tr>
    </table>
    <table border="0" cellpadding="1" cellspacing="0" width="125">
    <tr><td><?php echo substr($row_GetHomeTeam['Name'], strrpos($row_GetHomeTeam['Name']," "));?></td><td align="right"><?php if ($row_GetDay['Day'] < $NextDay){ echo $row_GetDay['HomeScore'];}?></td></tr>
    <tr><td><?php echo substr($row_GetVisitorTeam['Name'], strrpos($row_GetVisitorTeam['Name']," "));?></td><td align="right"><?php if ($row_GetDay['Day'] < $NextDay){ echo $row_GetDay['VisitorScore'];}?></td></tr>
    <tr><td colspan="2"><?php if ($row_GetDay['Play'] == "True" OR $row_GetDay['Play'] == "Vrai"){  echo '<a href="'.$_SESSION['DomainName'].'/File/'.$row_GetSeasons["Folder"].'/'.$GameLink.'" target="_blank">'.$l_Boxscore.'</a>';  } else { echo '<a href="farm_game_preview.php?id='.$row_GetDay['S_ID'].'">'.$l_Preview.'</a>'; } ?></td></tr>
    </table>
    </li>
<?php 
}
}
} while ($row_GetDay = mysql_fetch_assoc($GetDay)); 
echo "</ul>";
} 
?>
</div>
</div>
</header>