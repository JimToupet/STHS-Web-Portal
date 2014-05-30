<?php 
if(isset($_SESSION['username'])){ 

$time=strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));//Get current time

$timeStamp = strtotime('now');
$timeStamp += 1 * -2 * 60; // (add 7 days)
$RecentTimeStamp = strftime('%Y-%m-%d %H:%M:%S',$timeStamp);;
//Update the current users time

mysql_query("UPDATE proteam Set LastVisit='$time' WHERE Number=".$_SESSION['U_ID']) 
or die (mysql_error());
?>

<span id="onlineBar">
<script type="text/javascript"> 
$(function(){
	$("#onlineBar").position({of: $( "#footer" )});
});
</script>
<ul class="onlineTeams">
<span style="float:left; padding:5px 5px 0px 10px; color:#2d2d2d;"><strong>online:</strong></span>
    <?php
	$query_GetUsersOnline = sprintf("SELECT * FROM proteam WHERE LastVisit >='$RecentTimeStamp'");
	$GetUsersOnline = mysql_query($query_GetUsersOnline, $connection) or die(mysql_error());
	
	$OnlineTeamsID = array(0);
	while($users_row=mysql_fetch_array($GetUsersOnline)){	
		$users_time=$users_row['LastVisit'];//Get the users time from database
		$time = time() - 100;//Current time minus 100ms 
		if($users_time >= $RecentTimeStamp && $users_row['Number'] != $_SESSION['U_ID']){//Check if users time is greater than or equal to $time
			array_push($OnlineTeamsID, $users_row['Number']);			
		}
		
	}
	
	foreach( $_SESSION['MenuTeamsID'] as $TeamPage => $value){
		if(in_array($_SESSION['MenuTeamsID'][$TeamPage], $OnlineTeamsID)){
			echo '<li><a href="javascript:chatWith(\''.str_replace(" ","_",$_SESSION['MenuTeamsName'][$TeamPage]).'\');" class="thumb"><span><img src="'.$_SESSION['DomainName'].'/image/logos/small/'.$_SESSION['MenuTeamsSmallLogo'][$TeamPage].'" id="onlineTeam'.$_SESSION['MenuTeamsID'][$TeamPage].'" title="'.$_SESSION['MenuTeamsName'][$TeamPage].'" width="25" height="25" border="0" /></span></a></li>';
		} else {			
 	       echo '<li><img src="'.$_SESSION['DomainName'].'/image/logos/small/'.$_SESSION['MenuTeamsSmallLogo'][$TeamPage].'" width="25" height="25" border="0" class="disabledIcon" /></li>';
		}
    }
	
    ?>
    <li><a href="chat_room.php"><img src="<?php echo $_SESSION['DomainName'];?>/image/common/icon--chat.png" width="25" height="25" border="0" title="<?php echo $l_nav_chat;?>" style="margin-left:10px;" /></a></li>
</ul>
</span>
<?php } ?>