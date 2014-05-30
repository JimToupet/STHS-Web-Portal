<ul id="cssdropdown">
<li class="headlink"><a href="team.php?team=<?php echo $_SESSION['current_Team_ID'];?>" class="headlink"><?php echo $l_nav_home;?></a>
<ul>
<li><a href="news_archive.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_news;?></a></li>
<?php 
if(isset($_SESSION['U_ID'])){
			if($_SESSION['U_ID']==$_SESSION['current_Team_ID'] || $_SESSION['U_Admin']==1){
?>
<li><a href="check_conversations.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_email; ?></a></li>
<li><a href="check_comments.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_comments; ?></a></li>
<li><a href="check_notifications.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_notifications; ?></a></li>
<li><a href="edit_gm.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_edit_gm;?></a></li>
<li><a href="edit_applications.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_edit_app;?></a></li>
<?php }}?>
<li><a href="bio.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_gm_notes;?></a></li>
<li><a href="gm_standings.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_gm_standings;?></a></li>
</ul> 
</li>
  

<li  class="headlink"><a href="pro_roster.php" accesskey="p"><?php echo $l_nav_proteam; ?></a>
<ul>
      <li><a href="pro_roster.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_roster; ?></a></li>
	  <li><a href="pro_stats.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_playerstats; ?></a></li>
      <li><a href="pro_schedule.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_schedules; ?></a></li>
      <li><a href="pro_stats_history.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_teamhistoryregular; ?></a></li>
	  <li><a href="pro_injured.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_InjuredReserve;?></a></li>
      <li><a href="pro_team_awards.php?team=<?php echo $_SESSION['current_Team_ID'];?>" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_awards;?></a></li>
      <li><a href="pro_leaders_career.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_leader_career;?></a></li>  
      <li><a href="pro_leaders_season.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_leader_season;?></a></li>
    </ul>
</li>

<li  class="headlink"><a href="farm_roster.php?team=<?php echo $_SESSION['current_Team_ID'];?>" accesskey="f"><?php echo $l_nav_farmteam; ?></a>
<?php if ($_SESSION['current_FarmLeague'] == 'True'){ ?>
	  <ul>
	  <li><a href="farm_roster.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_roster; ?></a></li>
      <li><a href="farm_stats.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_playerstats; ?></a></li>
      <li><a href="farm_schedule.php?team=<?php echo $_SESSION['current_Team_ID'];?>" ><?php echo $l_nav_schedules; ?></a></li>
      <li><a href="farm_stats_history.php?team=<?php echo $_SESSION['current_Team_ID'];?>" ><?php echo $l_nav_teamhistoryregular; ?></a></li>
	  <li><a href="farm_injured.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_InjuredReserve;?></a></li>
      <li><a href="farm_team_awards.php?team=<?php echo $_SESSION['current_Team_ID'];?>" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_awards;?></a></li>
      <li><a href="farm_leaders_career.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_leader_career;?></a></li>
      <li><a href="farm_leaders_season.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_leader_season;?></a></li>
    </ul>
<?php } ?>
</li>

<li  class="headlink"><a href="depth_chart.php?team=<?php echo $_SESSION['current_Team_ID'];?>" accesskey="f"><?php echo $l_nav_depth; ?></a>
	  <ul>
            <li><a href="draft_picks.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_draft; ?></a></li>
            <li><a href="prospects.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_prospects; ?></a></li>
		</ul>
</li>

<li  class="headlink"><a href="finance.php?team=<?php echo $_SESSION['current_Team_ID'];?>" class="headlink"><?php echo $l_nav_finance; ?></a></li>

<li  class="headlink"><a href="transactions.php?team=<?php echo $_SESSION['current_Team_ID'];?>" class="headlink"><?php echo $l_nav_transactions;?></a>
<ul>
<li><a href="transactions.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_transactions;?></a></li>
<li><a href="transactions_log.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_transactions_log;?></a></li>
<li><a href="trading_block.php?team=<?php echo $_SESSION['current_Team_ID'];?>" style="border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#CCCCCC;"><?php echo $l_nav_trading_block;?></a></li>
<li><a href="coaches.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_coaches;?></a></li>
<?php if ($_SESSION['JuniorLeague'] == 'False'){ ?>
<li><a href="pending-free-agents.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_pending_free_agents;?></a></li>
<li><a href="rfa-free-agents.php"><?php echo $l_nav_restricted_free_agents;?></a></li>
<li><a href="ufa-free-agents.php"><?php echo $l_nav_unrestricted_free_agents;?></a></li>
<?php } ?>
<li><a href="unassigned-players.php"><?php echo $l_nav_unassigned_players;?></a></li>
<li><a href="entry_draft.php?team=<?php echo $_SESSION['current_Team_ID'];?>" style="border-top-width:1px; border-top-style:solid; border-top-color:#CCCCCC;"><?php echo $l_nav_entry_draft;?></a></li>
<li><a href="waiver_draft.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_waiver_draft;?></a></li>
<?php if(isset($_SESSION['U_ID'])){?>
<li><a href="rivalry.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_rivalry;?></a></li>
<?php } ?>
<li><a href="waiver_list.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $l_nav_waiver_list;?></a></li>
</ul> 
</li>

<li  class="headlink"><a href="simhl.php" class="headlink"><?php echo $l_nav_league;?></a></li>

<?php
$currentFile = $_SERVER["SCRIPT_NAME"]; 
$parts = Explode('/', $currentFile); 
$currentFile = $parts[count($parts) - 1]; 
	
if($lang=='en'){
	echo '<li  class="headlink"><a href="langswitch.php?lang=fr&prevpage='.$currentFile.'" accesskey="l">Fran&ccedil;ais</a></li>';
} else {
	echo '<li  class="headlink"><a href="langswitch.php?lang=en&prevpage='.$currentFile.'" accesskey="l">English</a></li>';
}

?>
</ul>