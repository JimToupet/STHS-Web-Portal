<?php if(!isset($_SESSION['U_ID'])){ ?>
    <div id="topnav" class="topnav"> 
        <table cellpadding="0" cellspacing="0" border="0">
        <tr>
			<td><a href="login.php" class="signin"><span><?php echo $l_login;?></span></a> </td>
            <td><a href="File/<?php echo $_SESSION['current_SeasonFolder']."/".$_SESSION['current_LeagueFile']; ?>"><img src="image/common/ic_down.png" title="<?php echo $l_nav_league_file;?>" width="25" height="25" border="0" /></a></td>
        </tr>
        </table>
    </div>
  
  <fieldset id="signin_menu">
    <form method="post" name="signin" id="signin" action="check_login.php?team=<?php echo $_SESSION['current_Team_ID']; ?>">
      <input name="username" type="text" style="width:150px;" place="<?php echo $l_username;?>" label="<?php echo $l_username;?>" require="true"><Br />
      <input name="password" type="password" style="width:150px;" place="<?php echo $l_password;?>" label="<?php echo $l_password;?>" require="true" ><Br />
      
      <table><tr><Td>Stay logged in <input type="checkbox" name="cookie" value="1"></Td>
      	<Td><input value="<?php echo $l_login;?>" tabindex="3" type="submit"></Td></tr></table>
        <br />
      
      <?php if(APP_ID != "" && TWITTER_CONSUMER_KEY != ""){?>
	      <div id="quicklogin"><?php echo $l_quicklogin;?></div>
      <?php } else if(APP_ID == "" && TWITTER_CONSUMER_KEY != ""){?>
	      <div id="quicklogin"><?php echo $l_quicklogin_t;?></div>
      <?php } else if(APP_ID != "" && TWITTER_CONSUMER_KEY == ""){?>
	      <div id="quicklogin"><?php echo $l_quicklogin_f;?></div>
      <?php }?>      
      <?php if(TWITTER_CONSUMER_KEY != ""){?><a onclick="OnSocialBtnSubmit('?login&oauth_provider=twitter')" href="#"><img src="image/common/tw_login.png" width="85" height="32" border="0" /></a>&nbsp;<?php }?>
	  <?php if(APP_ID != ""){?><a onclick="OnSocialBtnSubmit('?login&oauth_provider=facebook')" href="#"><img src="image/common/fb_login.png" width="85" height="32" border="0"></a><?php }?><br />
    </form>
  </fieldset>
<script type="text/javascript">
function OnSocialBtnSubmit(url)
{
  document.signin.action = url;
  document.signin.submit();
}
</script>

<?php
} else {
	
	$query_GetNewMail = sprintf("SELECT COUNT(recd) as TotalRows FROM chat WHERE recd = 0 AND chat.to='%s'", str_replace(" ","_",$_SESSION['U_Team']));
	$GetNewMail = mysql_query($query_GetNewMail, $connection) or die(mysql_error());
	$row_GetNewMail = mysql_fetch_assoc($GetNewMail);
	
	$query_GetNewNotice = sprintf("SELECT COUNT(Viewed) as TotalRows FROM teamhistory WHERE Viewed = 'False' AND Team=%s", $_SESSION['U_ID']);
	$GetNewNotice = mysql_query($query_GetNewNotice, $connection) or die(mysql_error());
	$row_GetNewNotice = mysql_fetch_assoc($GetNewNotice);
	
	if ($row_GetNewMail['TotalRows'] < 1){
		$totalNewMessages = 0;
	} else {
		$totalNewMessages = $row_GetNewMail['TotalRows']; 
	}
	if ($row_GetNewNotice['TotalRows'] < 1){
		$totalNewNotice = 0;
	} else {
		$totalNewNotice = $row_GetNewNotice['TotalRows']; 
	}
?>
    
	<div id="topnav" class="topnav">
    	<table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td nowrap="nowrap" class="signin"><a href="#" style="color:#FFF; text-decoration:none; padding-right:5px;"><strong><?php echo $_SESSION['U_City']." ".$_SESSION['U_Team'];?></strong>&nbsp;</a></td>
            <td width="30"><div class="inbox"><a href="check_conversations.php?team=<?php echo $_SESSION['U_ID']; ?>" title="<?php echo $NewMessages;?>"><?php echo $totalNewMessages; ?></a></div></td>
            <td><div class="inbox"><a href="check_notifications.php?team=<?php echo $_SESSION['U_ID']; ?>" title="<?php echo $NewNotice;?>"><?php echo $totalNewNotice; ?></a></div></td>
			<td><a href="#"><span class="topnavblock"><img src="<?php echo $_SESSION['Avatar']; ?>" width="22" height="22" border="0" class="signin" /></span></a></td>
            <td><a href="upload_lines.php?team=<?php echo $_SESSION['U_ID'];?>" target="_blank"><img src="image/common/ic_up.png" title="<?php echo $l_nav_upload_lines;?>" width="25" height="25" border="0" /></a></td>
            <td><a href="File/<?php echo $_SESSION['current_SeasonFolder']."/".$_SESSION['current_LeagueFile']; ?>" target="_blank"><img src="image/common/ic_down.png" title="<?php echo $l_nav_league_file;?>" width="25" height="25" border="0" /></a></td>
        </tr>
        </table>
    </div>
    
  <fieldset id="profile_menu">
    	<div class="tipsy">
    	<img src="<?php echo $_SESSION['Avatar']; ?>" width="65" height="65" border="0" style="float:left; margin-right:10px;"/>
        <strong style="font-size:12px"><a href="bio.php?team=<?php echo $_SESSION['U_ID'];?>"><?php echo $_SESSION['U_Name'];?></a></strong><br />
        <strong><a href="check_messages.php?team=<?php echo $_SESSION['current_Team_ID'];?>"><?php echo $_SESSION['U_Email'];?></a></strong>
        <br /><br />
		<a href="edit_gm.php?team=<?php echo $_SESSION['U_ID'];?>"><?php echo $l_nav_edit_gm;?></a>&nbsp;|&nbsp;<a href="edit_applications.php?team=<?php echo $_SESSION['U_ID'];?>"><?php echo $l_nav_edit_app;?></a>
        <br /><br />
    	<a href="logout.php"><?php echo $l_log_out; ?></a>
        </div>
  	</fieldset>
  
  
<?php } ?>
