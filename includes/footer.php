<footer>
<?php echo $l_footer_1.': <a href="mailto:'.$_SESSION["site_Email"].'" style="color:#FFFFFF; font-weight:bold;">'.$_SESSION["site_Email"].'</a>&nbsp;&nbsp;|&nbsp;&nbsp;'.$l_footer_2.' <a href="http://www.simhl.net" style="color:#FFFFFF; font-weight:bold;">SIMHL.net</a>&nbsp;&nbsp;'.$l_footer_3.'&nbsp;&nbsp;<a href="http://sths.simont.info/" style="color:#FFFFFF; font-weight:bold;">Simon T Hockey Simulator</a>&nbsp;&nbsp;|&nbsp;&nbsp;'.$l_version.'&nbsp;'.$_SESSION['current_version'];?>
<div id="FatFooter">
<?php 
if ($_SESSION['current_Team_ID'] > 0){
	$TeamValue = "?team=0";
} else {
	$TeamValue = "";
}
?>
<ul><strong><?php echo $l_nav_proleague;?></strong>
<li><a href="pro_scores.php<?php echo $TeamValue;?>"><?php echo $l_nav_scores;?></a></li>
<li><a href="pro_schedule.php<?php echo $TeamValue;?>"><?php echo $l_nav_schedules;?></a></li>
<li><a href="pro_standings.php<?php echo $TeamValue;?>"><?php echo $l_nav_standings;?></a></li>
<li><a href="pro_power_rankings.php<?php echo $TeamValue;?>"><?php echo $l_nav_PowerRankings;?></a></li>
<li><a href="pro_league_stats_history.php<?php echo $TeamValue;?>"><?php echo $l_full_league_stats;?></a></li>
<li><a href="pro_leaders.php<?php echo $TeamValue;?>"><?php echo $l_nav_leaders;?></a></li>
<li><a href="pro_injured.php<?php echo $TeamValue;?>"><?php echo $l_InjuredReserve;?></a></li>
<li><a href="pro_awards.php<?php echo $TeamValue;?>"><?php echo $l_nav_awards;?></a></li>
<li><a href="pro_leaders_career.php<?php echo $TeamValue;?>"><?php echo $l_nav_leader_career;?></a></li>  
<li><a href="pro_leaders_season.php<?php echo $TeamValue;?>"><?php echo $l_nav_leader_season;?></a></li>
</ul>

<?php if ($_SESSION['current_FarmLeague'] == 'True'){ ?>
<ul><strong><?php echo $l_nav_farmleague;?></strong>
<li><a href="farm_scores.php<?php echo $TeamValue;?>"><?php echo $l_nav_scores;?></a></li>
<li><a href="farm_standings.php<?php echo $TeamValue;?>"><?php echo $l_nav_standings;?></a></li>
<li><a href="farm_schedule.php<?php echo $TeamValue;?>"><?php echo $l_nav_schedules;?></a></li>
<li><a href="farm_power_rankings.php<?php echo $TeamValue;?>"><?php echo $l_nav_PowerRankings;?></a></li>
<li><a href="farm_league_stats_history.php<?php echo $TeamValue;?>"><?php echo $l_full_league_stats;?></a></li>
<li><a href="farm_leaders.php<?php echo $TeamValue;?>"><?php echo $l_nav_leaders;?></a></li>
<li><a href="farm_injured.php<?php echo $TeamValue;?>"><?php echo $l_InjuredReserve;?></a></li>
<li><a href="farm_awards.php?"><?php echo $l_nav_awards;?></a></li>
<li><a href="farm_leaders_career.php<?php echo $TeamValue;?>"><?php echo $l_nav_leader_career;?></a></li>  
<li><a href="farm_leaders_season.php<?php echo $TeamValue;?>"><?php echo $l_nav_leader_season;?></a></li>
</ul>
<?php } ?>

<ul><strong><?php echo $l_nav_players;?></strong>
<li><a href="player_list.php<?php echo $TeamValue;?>"><?php echo $l_nav_player_lists;?></a></li>
<li><a href="prospect_list.php<?php echo $TeamValue;?>"><?php echo $l_nav_prospect_list;?></a></li>
<li><a href="retired_players.php<?php echo $TeamValue;?>"><?php echo $l_nav_retired_players;?></a></li>
<li><a href="search.php<?php echo $TeamValue;?>"><?php echo $l_nav_search;?></a></li>
</ul>

<ul><strong><?php echo $l_nav_transactions;?></strong>
<li><a href="transactions.php<?php echo $TeamValue;?>"><?php echo $l_nav_trades;?></a></li>
<li><a href="trading_block.php<?php echo $TeamValue;?>"><?php echo $l_nav_trading_block;?></a></li>
<li><a href="transactions_log.php<?php echo $TeamValue;?>"><?php echo $l_nav_transactions_log;?></a></li>
<li><a href="view_transactions.php<?php echo $TeamValue;?>"><?php echo $l_nav_trans_history;?></a></li>
<li><a href="coaches.php<?php echo $TeamValue;?>"><?php echo $l_nav_coaches;?></a></li>
<?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
<li><a href="pending-free-agents.php<?php echo $TeamValue;?>"><?php echo $l_nav_pending_free_agents;?></a></li>
<li><a href="rfa-free-agents.php<?php echo $TeamValue;?>"><?php echo $l_nav_restricted_free_agents;?></a></li>
<li><a href="ufa-free-agents.php<?php echo $TeamValue;?>"><?php echo $l_nav_unrestricted_free_agents;?></a></li>
<?php } ?>
<li><a href="unassigned-players.php<?php echo $TeamValue;?>"><?php echo $l_nav_unassigned_players;?></a></li>
<li><a href="entry_draft.php<?php echo $TeamValue;?>"><?php echo $l_nav_entry_draft;?></a></li>
<li><a href="waiver_draft.php<?php echo $TeamValue;?>"><?php echo $l_nav_waiver_draft;?></a></li>
<li><a href="waiver_list.php<?php echo $TeamValue;?>"><?php echo $l_nav_waiver_list;?></a></li>
</ul> 

<ul><strong><?php echo $l_nav_league;?></strong>
<li><a href="leagueinfo.php<?php echo $TeamValue;?>"><?php echo $l_nav_league_information;?></a></li>
<li><a href="gm_standings.php<?php echo $TeamValue;?>"><?php echo $l_nav_gm_standings;?></a></li>
<li><a href="chat_room.php"><?php echo $l_nav_chat;?></a></li>
<?php if(isset($_SESSION['U_ID'])){?>
<li><a href="complaint.php<?php echo $TeamValue;?>"><?php echo $l_nav_complaint_form;?></a></li>
<?php } ?>
<?php if($_SESSION['MessageBoardURL'] != "") {?>
<li><a href="<?php echo $_SESSION['MessageBoardURL'];?>" target="_blank"><?php echo $l_nav_forum;?></a></li>
<?php } ?>
<li><a href="participation.php<?php echo $TeamValue;?>"><?php echo $l_nav_participation;?></a></li>
<?php if($_SESSION['RulesFile'] != ""){?>
<li><a href="File/<?php echo $_SESSION['RulesFile']; ?>" target="_blank"><?php echo $l_nav_rules;?></a></li>
<?php } ?>
<li><a href="leaguefile.php<?php echo $TeamValue;?>"><?php echo $l_nav_sths_client;?></a></li>
<li><a href="videos.php<?php echo $TeamValue;?>"><?php echo $l_nav_video_tutorials;?></a></li>
<li><a href="contact.php<?php echo $TeamValue;?>"><?php echo $l_nav_gm_waiting_list;?></a></li>
<br /><br />

<?php 
if(isset($_SESSION['U_ID'])){
if(isset($_SESSION['U_Admin']) && $_SESSION['U_Admin']==1){
?>
<strong><?php echo $l_nav_admin ;?></strong>
<li><a href="admin_report.php<?php echo $TeamValue;?>"><?php echo $l_nav_administrator_report;?></a></li>
<li><a href="web_config.php<?php echo $TeamValue;?>"><?php echo $l_nav_site_configuration;?></a></li>
<li><a href="links.php<?php echo $TeamValue;?>"><?php echo $l_nav_links;?></a></li>
<li><a href="seasons.php<?php echo $TeamValue;?>"><?php echo $l_nav_seasons;?></a></li>
<li><a href="players-report.php<?php echo $TeamValue;?>"><?php echo $l_nav_outdated_players;?></a></li>
<li><a href="players-stats-report.php<?php echo $TeamValue;?>"><?php echo $l_nav_stats_cleaner;?></a></li>
<li><a href="upload.php<?php echo $TeamValue;?>"><?php echo $l_nav_upload_files;?></a></li>
</ul>
<?php } } ?>

</div>
</footer>