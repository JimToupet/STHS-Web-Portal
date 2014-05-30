<ul id="cssdropdown">
<li class="headlink"><a href="<?php echo $_SESSION['DomainName']; ?>/home.php"><?php echo $l_nav_home;?></a></li>

<li  class="headlink"><a href="pro_scores.php"><?php echo $l_nav_proleague;?></a>
<ul>
<li><a href="pro_scores.php"><?php echo $l_nav_scores;?></a></li>
<li><a href="pro_schedule.php"><?php echo $l_nav_schedules;?></a></li>
<li><a href="pro_standings.php"><?php echo $l_nav_standings;?></a></li>
<li><a href="pro_power_rankings.php"><?php echo $l_nav_PowerRankings;?></a></li>
<li><a href="pro_league_stats_history.php"><?php echo $l_full_league_stats;?></a></li>
<li><a href="pro_leaders.php"><?php echo $l_nav_leaders;?></a></li>
<li><a href="pro_injured.php"><?php echo $l_InjuredReserve;?></a></li>
<li><a href="pro_awards.php?" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_awards;?></a></li>
<li><a href="pro_leaders_career.php"><?php echo $l_nav_leader_career;?></a></li>  
<li><a href="pro_leaders_season.php"><?php echo $l_nav_leader_season;?></a></li>
</ul>
</li>
<?php if ($_SESSION['current_FarmLeague'] == 'True'){ ?>
<li  class="headlink"><a href="farm_scores.php"><?php echo $l_nav_farmleague;?></a>
<ul>
<li><a href="farm_scores.php"><?php echo $l_nav_scores;?></a></li>
<li><a href="farm_standings.php"><?php echo $l_nav_standings;?></a></li>
<li><a href="farm_schedule.php"><?php echo $l_nav_schedules;?></a></li>
<li><a href="farm_power_rankings.php"><?php echo $l_nav_PowerRankings;?></a></li>
<li><a href="farm_league_stats_history.php"><?php echo $l_full_league_stats;?></a></li>
<li><a href="farm_leaders.php"><?php echo $l_nav_leaders;?></a></li>
<li><a href="farm_injured.php"><?php echo $l_InjuredReserve;?></a></li>
<li><a href="farm_awards.php?" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_awards;?></a></li>
<li><a href="farm_leaders_career.php"><?php echo $l_nav_leader_career;?></a></li>  
<li><a href="farm_leaders_season.php"><?php echo $l_nav_leader_season;?></a></li>
</ul></li>
<?php } ?>
<li  class="headlink"><a href="player_list.php"><?php echo $l_nav_players;?></a>
<ul>
<li><a href="player_list.php"><?php echo $l_nav_player_lists;?></a></li>
<li><a href="prospect_list.php"><?php echo $l_nav_prospect_list;?></a></li>
<li><a href="retired_players.php"><?php echo $l_nav_retired_players;?></a></li>
<li><a href="search.php"><?php echo $l_nav_search;?></a></li>
</ul>
</li>
<li  class="headlink"><a href="transactions.php?team=<?php echo $_SESSION['current_Team_ID'];?>" class="headlink"><?php echo $l_nav_transactions;?></a>
<ul>
<li><a href="transactions.php"><?php echo $l_nav_trades;?></a></li>
<li><a href="trading_block.php"><?php echo $l_nav_trading_block;?></a></li>
<li><a href="transactions_log.php"><?php echo $l_nav_transactions_log;?></a></li>
<li><a href="view_transactions.php" style="border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#CCCCCC;"><?php echo $l_nav_trans_history;?></a></li>
<li><a href="coaches.php"><?php echo $l_nav_coaches;?></a></li>
<?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
<li><a href="pending-free-agents.php"><?php echo $l_nav_pending_free_agents;?></a></li>
<li><a href="rfa-free-agents.php"><?php echo $l_nav_restricted_free_agents;?></a></li>
<li><a href="ufa-free-agents.php"><?php echo $l_nav_unrestricted_free_agents;?></a></li>
<?php } ?>
<li><a href="unassigned-players.php"><?php echo $l_nav_unassigned_players;?></a></li>
<li><a href="entry_draft.php" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_entry_draft;?></a></li>
<li><a href="waiver_draft.php"><?php echo $l_nav_waiver_draft;?></a></li>
<li><a href="waiver_list.php"><?php echo $l_nav_waiver_list;?></a></li>
</ul> 
</li>

<li  class="headlink"><a href="leagueinfo.php"><?php echo $l_nav_league;?></a>
<ul>
<li><a href="leagueinfo.php"><?php echo $l_nav_league_information;?></a></li>
<li><a href="gm_standings.php"><?php echo $l_nav_gm_standings;?></a></li>
<li><a href="chat_room.php"><?php echo $l_nav_chat;?></a></li>
<?php if(isset($_SESSION['U_ID'])){?>
<li><a href="complaint.php"><?php echo $l_nav_complaint_form;?></a></li>
<?php } ?>
<?php if($_SESSION['MessageBoardURL'] != "") {?>
<li><a href="<?php echo $_SESSION['MessageBoardURL'];?>" target="_blank"><?php echo $l_nav_forum;?></a></li>
<?php } ?>
<li><a href="participation.php"><?php echo $l_nav_participation;?></a></li>
<?php if($_SESSION['RulesFile'] != ""){?>
<li><a href="File/<?php echo $_SESSION['RulesFile']; ?>" target="_blank"><?php echo $l_nav_rules;?></a></li>
<?php } ?>
<li><a href="leaguefile.php" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_sths_client;?></a></li>
<li><a href="videos.php"><?php echo $l_nav_video_tutorials;?></a></li>
<li><a href="contact.php"><?php echo $l_nav_gm_waiting_list;?></a></li>
</ul>
</li>

<li class="headlink"><a href="#"><?php echo $l_nav_teams;?></a>
<ul>
<div class="np-menu ul" style="text-indent:0px; width: 355px;">
<?php
$query_GetTeamNav = "SELECT Name, City, Number, Conference, Division FROM proteam ORDER BY Conference, Division, City";
$GetTeamNav = mysql_query($query_GetTeamNav, $connection) or die(mysql_error());
$row_GetTeamNav = mysql_fetch_assoc($GetTeamNav);
$totalRows_GetTeamNav = mysql_num_rows($GetTeamNav);

$pos = 0;
$current_conference = "";
$current_division = "";
do {
	if($current_conference != $row_GetTeamNav['Conference'] && $pos > 0){
		echo '</div>';
	}
	if($current_conference != $row_GetTeamNav['Conference']){
		echo '<div style="width:175px; float:left; display:inline; background-color:#3a3a3a;">';
		$current_conference = $row_GetTeamNav['Conference'];
	}
	if($current_division != $row_GetTeamNav['Division']){
		echo '<li style="float:left; padding:5px; text-transform:uppercase; background-color:#9d9d9d; width:172px;border-right-width:1px;  border-style:solid; border-color:#000">'.$row_GetTeamNav['Division'].'</li>';
		$current_division = $row_GetTeamNav['Division'];
	}

	echo '<li style="float:left; width:175px; "><a href="team.php?team='.$row_GetTeamNav['Number'].'">'.$row_GetTeamNav['City'].' '.$row_GetTeamNav['Name'].'</a></li>';
	
	$pos = $pos + 1;
} while ($row_GetTeamNav = mysql_fetch_assoc($GetTeamNav)); 
?>
</div>
</ul>
</li>

<?php 
if(isset($_SESSION['U_ID'])){
if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
?>

<li  class="headlink"><a href="admin_report.php" class="headlink"><?php echo $l_nav_admin ;?></a>
<ul>
<li><a href="admin_report.php"><?php echo $l_nav_administrator_report;?></a></li>
<li><a href="web_config.php"><?php echo $l_nav_site_configuration;?></a></li>
<li><a href="links.php"><?php echo $l_nav_links;?></a></li>
<li><a href="seasons.php"><?php echo $l_nav_seasons;?></a></li>
<li><a href="players-report.php"><?php echo $l_nav_outdated_players;?></a></li>
<li><a href="players-stats-report.php"><?php echo $l_nav_stats_cleaner;?></a></li>
<li><a href="upload.php"><?php echo $l_nav_upload_files;?></a></li>
</ul>
</li>

<?php 
}
}
$currentFile = $_SERVER["SCRIPT_NAME"]; 
$parts = Explode('/', $currentFile); 
$currentFile = $parts[count($parts) - 1]; 
	
if($lang=='en'){
	echo '<li  class="headlink"><a href="langswitch.php?lang=fr&prevpage='.$currentFile.'" accesskey="l">Fran&ccedil;ais</a></li>';
} else {
	echo '<li  class="headlink"><a href="langswitch.php?lang=en&prevpage='.$currentFile.'" accesskey="l">English</a></li>';
}
?>
</li>
</ul>