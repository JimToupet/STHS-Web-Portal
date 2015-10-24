<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}


function trustedFile($file) 
{
    // only trust local files owned by ourselves
    if (!eregi("^([a-z]+)://", $file) 
        && fileowner($file) == getmyuid()) {
            return true;
    }
    return false;
}

function ParseSQL($strText){
  return str_replace("'", "&#039;", $strText);
}

function getAge( $p_strDate ) {
   	$tmpYear = $_SESSION['current_Season'];
   	if ($_SESSION['current_SeasonTypeID']==0 || $_SESSION['SEASON_HALF']==TRUE){
		$tmpYear = $tmpYear + 1;
	}
	$years = 0;
	if(substr_count($p_strDate,"-") > 0){
    	list($m,$d,$Y) = explode("-",$p_strDate);
    	$years = $tmpYear - $Y;
   		if ($_SESSION['JuniorLeague'] == 'False'){ 
			if( (date("md") < $m.$d) && ($tmpYear > $_SESSION['current_Season'])) { $years--; }
		}	
			
	} elseif (substr_count($p_strDate,"/") > 0){
		list($m,$d,$Y) = explode("/",$p_strDate);
		$years = $tmpYear - $Y;
		if ($_SESSION['JuniorLeague'] == 'False'){ 
			if( (date("md") < $m.$d) && ($tmpYear > $_SESSION['current_Season'])) { $years--; }
		}
			
	} elseif (substr_count($p_strDate,".") > 0){
		list($m,$d,$Y) = explode(".",$p_strDate);
		$years = $tmpYear - $Y;
		if ($_SESSION['JuniorLeague'] == 'False'){ 
			if( (date("md") < $m.$d) && ($tmpYear > $_SESSION['current_Season'])) { $years--; }
		}		
   }
   return $years;
}

function checkUFA($age, $salary, $extension, $displayed, $years, $birthDate){
	global $UFADisplayed, $UFA;
	$UFA_Deadline = date("m-d-Y", mktime(0, 0, 0, 06, 31, $_SESSION['current_Season']));
	if($birthDate > $UFA_Deadline){
		$age = $age - 1;
	} 
	if (($age + $years) < $UFA){
		$returnText = "<span style='text-align:center; vertical-align:middle; padding:3px; width:90%; height:100%; display:block; color:#FFF; background-color:#090;'>RFA</span>";
	} else {
		$returnText = "<span style='text-align:center; vertical-align:middle; padding:3px; width:90%; height:100%; display:block; color:#FFF; background-color:#F00;'>UFA</span>";
	}
	if($displayed == 1){
		$returnText = " - ";
	}
	$UFADisplayed = 1;
	return $returnText;	
}

function getAvatar($service_id, $service_type, $team, $connection){
	if($service_type == "twitter"){
		$avatar_path = "http://api.twitter.com/1/users/profile_image/".$service_id;
	} else if ($service_type == "facebook") {
		$avatar_path = "http://graph.facebook.com/".$service_id."/picture";
	} else {
		$query_GetAvatar = sprintf("SELECT Avatar FROM `proteam` WHERE Number=%s", $team);
		$GetAvatar = mysql_query($query_GetAvatar, $connection) or die(mysql_error());
		$row_GetAvatar = mysql_fetch_assoc($GetAvatar);
		$avatar_path = '/image/gm/'.$row_GetAvatar["Avatar"];
		if($avatar_path == "/image/gm/"){
			$avatar_path = $_SESSION['DomainName']."/image/gm/defaultgm.jpg";
		} else {
			$result = file_exists($_SERVER['DOCUMENT_ROOT'] . $avatar_path);
			if ($result == TRUE) {
				$avatar_path = $_SESSION['DomainName'].$avatar_path;
			} else {
				$avatar_path = $_SESSION['DomainName']."/image/gm/defaultgm.jpg";
			}
		}
	}
	if($team == 0){
		$avatar_path = $_SESSION['DomainName']."/image/gm/".$_SESSION['CommishIcon'];
	}
	return $avatar_path;	
}


function convertdate($s_date,$s_from,$s_to,$s_return_delimiter) {

    $s_return_date = '';
    $s_to = strtolower($s_to);
 
    switch($s_to) {
        case 'eng': # dd/mm/yyyy
            $s_return_date = date("d/m/Y",strtotime($s_date));
        break;
        case 'usa':  # mm/dd/yyyy
            $s_return_date = date("m/d/Y",strtotime($s_date));
        break;
        case "iso": # yyyy/mm/dd
            $s_return_date = date("Y/m/d",strtotime($s_date));
        break;
        default: # error message
            user_error('function convertdate(string $s_date, string $s_from, string $s_to, string $s_return_delimiter) $s_to not a valid type of \'eng\', \'usa\' or \'iso\'');
            return NULL;
    }


    return $s_return_date;
}

function sort2d ($array, $index, $order='desc', $natsort=FALSE, $case_sensitive=FALSE)  
{ 
	if(is_array($array) && count($array)>0)  
	{ 
	   foreach(array_keys($array) as $key)  
		   $temp[$key]=$array[$key][$index]; 
		   if(!$natsort)  
			   ($order=='asc')? asort($temp) : arsort($temp); 
		  else  
		  { 
			 ($case_sensitive)? natsort($temp) : natcasesort($temp); 
			 if($order!='asc')  
				 $temp=array_reverse($temp,TRUE); 
	   } 
	   foreach(array_keys($temp) as $key)  
		   (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key]; 
	   return $sorted; 
  } 
  return $array; 
}

function sendMail($to, $from, $title, $message){
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:".$from."\r\n";
	
	if (mail($to, $title, $message, $headers)) {
	  $errortxt = "";
	 } else {
	  $errortxt = "\n Message delivery failed - ".$to."<br>";
	 }
	return $errortxt;
}   

function imageExists($image_path){
	if($image_path == "/image/players/"){
		return $_SESSION['DomainName']."/image/players/default_mug.jpg";
	} else {
		$result = file_exists($_SERVER['DOCUMENT_ROOT'] . $image_path);
		if ($result == TRUE) {
			return $_SESSION['DomainName'].$image_path;
		} else {
			return $_SESSION['DomainName']."/image/players/default_mug.jpg";
		}
	}
}

function numeric_entities($str){ 
    $str = htmlentities($str,ENT_NOQUOTES,'UTF-8',false);
	//print $str."\n";
	
	// convert text from UTF-8 to ISO-8859-1, 
	// characters that cannot be converted will be converted to ?
	$str = utf8_decode($str);
	return $str;
}  

function minutes( $seconds )
{
    return sprintf( "%02.2d:%02.2d", floor( $seconds / 60 ), $seconds % 60 );
}

function getTeamPayroll($team, $year, $connection, $amount){
	if($team > 0 || $team != ""){
		if ($year == 1){ $sqlYear = "Salary1"; $sqlExtYear = "e.Salary1"; $sqlExtAmount = "AND Type <> 'Extension'";}
		if ($year == 2){ $sqlYear = "Salary2"; $sqlExtYear = "e.Salary1"; $sqlExtAmount = "AND e.Salary1 >= ".$amount; }
		if ($year == 3){ $sqlYear = "Salary3"; $sqlExtYear = "e.Salary2"; $sqlExtAmount = "AND e.Salary2 >= ".$amount; }
		if ($year == 4){ $sqlYear = "Salary4"; $sqlExtYear = "e.Salary3"; $sqlExtAmount = "AND e.Salary3 >= ".$amount; }
		if ($year == 5){ $sqlYear = "Salary5"; $sqlExtYear = "e.Salary4"; $sqlExtAmount = "AND e.Salary4 >= ".$amount; }
		if ($year == 6){ $sqlYear = "Salary6"; $sqlExtYear = "e.Salary5"; $sqlExtAmount = "AND e.Salary5 >= ".$amount; }
		if ($year == 7){ $sqlYear = "Salary7"; $sqlExtYear = "e.Salary6"; $sqlExtAmount = "AND e.Salary6 >= ".$amount; }
		if ($year == 8){ $sqlYear = "Salary8"; $sqlExtYear = "e.Salary7"; $sqlExtAmount = "AND e.Salary7 >= ".$amount; }
		if ($year == 9){ $sqlYear = "Salary9"; $sqlExtYear = "e.Salary8"; $sqlExtAmount = "AND e.Salary8 >= ".$amount; }
		if ($year == 10){ $sqlYear = "Salary10"; $sqlExtYear = "e.Salary9"; $sqlExtAmount = "AND e.Salary9 >= ".$amount;}
		
		$query_GetPayRoll = sprintf("SELECT SUM(%s) as Salary FROM players WHERE Retired=0 AND Team=%s AND Status0 > 1 ", $sqlYear, $team);
		$GetPayRoll = mysql_query($query_GetPayRoll, $connection) or die(mysql_error());
		$row_GetPayRoll = mysql_fetch_assoc($GetPayRoll);
		
		$query_GetGPayRoll = sprintf("SELECT SUM(%s) as Salary FROM goalies WHERE Retired=0 AND Team=%s AND Status1 > 1 ", $sqlYear, $team);
		$GetGPayRoll = mysql_query($query_GetGPayRoll, $connection) or die(mysql_error());
		$row_GetGPayRoll = mysql_fetch_assoc($GetGPayRoll);
	
		$query_GetExtPayRoll = sprintf("SELECT SUM(%s) as Salary, e.Compensation FROM playerscontractoffers as e, players as p WHERE e.Type='Extension' %s AND e.Player=p.Number AND p.Team=%s", $sqlExtYear, $sqlExtAmount, $team, $team);
		$GetExtPayRoll = mysql_query($query_GetExtPayRoll, $connection) or die(mysql_error());
		$row_GetExtPayRoll = mysql_fetch_assoc($GetExtPayRoll);
		
		$query_GetExtPayRollGoalie = sprintf("SELECT SUM(%s) as Salary, e.Compensation FROM playerscontractoffers as e, goalies as p WHERE e.Type='Extension' %s AND e.Player=p.Number AND p.Team=%s AND e.PlayerType='goalie'", $sqlExtYear, $sqlExtAmount, $team, $team);
		$GetExtPayRollGoalie = mysql_query($query_GetExtPayRollGoalie, $connection) or die(mysql_error());
		$row_GetExtPayRollGoalie = mysql_fetch_assoc($GetExtPayRollGoalie);
		
		if ($year == 2){ 
			$query_GetExtBonus = sprintf("SELECT SUM(e.Compensation) as Compensation FROM playerscontractoffers as e, players as p WHERE e.Type='Extension' AND e.Player=p.Number AND p.Team=%s", $team, $sqlExtAmount, $team);
			$GetExtBonus = mysql_query($query_GetExtBonus, $connection) or die(mysql_error());
			$row_GetExtBonus = mysql_fetch_assoc($GetExtBonus);
			
			$query_GetExtBonusGoalie = sprintf("SELECT SUM(e.Compensation) as Compensation FROM playerscontractoffers as e, goalies as p WHERE e.Type='Extension' AND e.Player=p.Number AND p.Team=%s", $team, $sqlExtAmount, $team);
			$GetExtBonusGoalie = mysql_query($query_GetExtBonusGoalie, $connection) or die(mysql_error());
			$row_GetExtBonusGoalie = mysql_fetch_assoc($GetExtBonusGoalie);
			
			$teampayroll = $row_GetPayRoll['Salary'] + $row_GetGPayRoll['Salary'] + $row_GetExtPayRoll['Salary'] + $row_GetExtPayRollGoalie['Salary'] + $row_GetExtBonus['Compensation'] + $row_GetExtBonusGoalie['Compensation'];	
		} else {
			$teampayroll = $row_GetPayRoll['Salary'] + $row_GetGPayRoll['Salary'] + $row_GetExtPayRoll['Salary'] + $row_GetExtPayRollGoalie['Salary'];				
		}
	} else {
		$teampayroll = 0;	
	}
	return $teampayroll;
}

function getTeamOffers($team, $connection){
	if($team > 0 || $team != ""){
		$query_GetExtBonus = sprintf("SELECT SUM(e.Salary1) as Compensation FROM playerscontractoffers as e WHERE e.Type IN ('Offer Sheet','Offer Sheet Final','Signed','RFA Offer Sheet','RFA Offer Sheet Final','RFA Signed','Goalie Offer Sheet','Goalie Offer Sheet Final','Goalie Signed','RFA Goalie Offer Sheet','RFA Goalie Offer Sheet Final','RFA Goalie Signed') AND e.Team=%s", $team);
		$GetExtBonus = mysql_query($query_GetExtBonus, $connection) or die(mysql_error());
		$row_GetExtBonus = mysql_fetch_assoc($GetExtBonus);
		$teampayroll = $row_GetExtBonus['Compensation'];	
		
	} else {
		$teampayroll = 0;	
	}
	return $teampayroll;
}

function getBonus($team, $connection){
	if($team > 0 || $team != ""){
		$query_GetExtBonus = sprintf("SELECT SUM(Compensation) as Compensation FROM playerscontractoffers WHERE Team=%s AND Type='Extension'", $team);
		$GetExtBonus = mysql_query($query_GetExtBonus, $connection) or die(mysql_error());
		$row_GetExtBonus = mysql_fetch_assoc($GetExtBonus);
		$teampayroll = $row_GetExtBonus['Compensation'];
	} else {
		$teampayroll = 0;	
	}
	return $teampayroll;
}

function getTeamRoster($team, $connection){
		
	$query_GetPayRoll = sprintf("SELECT SUM(1) as RosterCount FROM players WHERE Retired=0 AND Contract > 0 AND Team=%s", $team);
	$GetPayRoll = mysql_query($query_GetPayRoll, $connection) or die(mysql_error());
	$row_GetPayRoll = mysql_fetch_assoc($GetPayRoll);
	
	$query_GetGPayRoll = sprintf("SELECT SUM(1) as RosterCount FROM goalies WHERE Retired=0 AND Contract > 0 AND Team=%s ", $team);
	$GetGPayRoll = mysql_query($query_GetGPayRoll, $connection) or die(mysql_error());
	$row_GetGPayRoll = mysql_fetch_assoc($GetGPayRoll);

	$query_GetExtPayRoll = sprintf("SELECT SUM(1) as RosterCount FROM playerscontractoffers WHERE Team=%s AND Type <> 'Extension'", $team);
	$GetExtPayRoll = mysql_query($query_GetExtPayRoll, $connection) or die(mysql_error());
	$row_GetExtPayRoll = mysql_fetch_assoc($GetExtPayRoll);
	$RosterCount = $row_GetPayRoll['RosterCount'] + $row_GetGPayRoll['RosterCount'] + $row_GetExtPayRoll['RosterCount'];	

	return $RosterCount;
}

function checkPlayersFuture($team, $position, $overall, $connection){
	$flagDepth = 0;
	if($team > 0 || $team != ""){
		if($position == 5){
			$query_GetTeamDepth = sprintf("SELECT 1 FROM goalies WHERE Team=%s AND Overall > %s ", $team, $overall);
			$GetTeamDepth = mysql_query($query_GetTeamDepth, $connection) or die(mysql_error());
			$row_GetTeamDepth = mysql_fetch_assoc($GetTeamDepth);
			$totalRows_GetTeamDepth = mysql_num_rows($GetTeamDepth);
			if($overall >= 80){
				if($totalRows_GetTeamDepth > 0){
					$flagDepth = 1;
				}
			} else if($overall >= 70){
				if($totalRows_GetTeamDepth >= 1){
					$flagDepth = 1;
				}
			} else {
				if($totalRows_GetTeamDepth > 2){
					$flagDepth = $totalRows_GetTeamDepth;
				}
			}
		} else {
			$query_GetTeamDepth = sprintf("SELECT 1 FROM players WHERE Position=%s AND Team=%s AND Overall > %s ", $position, $team, $overall);
			$GetTeamDepth = mysql_query($query_GetTeamDepth, $connection) or die(mysql_error());
			$row_GetTeamDepth = mysql_fetch_assoc($GetTeamDepth);
			$totalRows_GetTeamDepth = mysql_num_rows($GetTeamDepth);
		}
		if($position == 4){
			if($overall >= 70){
				if($totalRows_GetTeamDepth >= 4){
					$flagDepth = 1;
				}
			} else {
				if($totalRows_GetTeamDepth > 6){
					$flagDepth = 1;
				}
			}
			
		} else {
			if($overall >= 70){
				if($totalRows_GetTeamDepth >= 2){
					$flagDepth = 1;
				}
			} else {
				if($totalRows_GetTeamDepth > 4){
					$flagDepth = 1;
				}
			}
		}
	}
	
	return $flagDepth;
}

function getPlayerAgent($player, $position, $connection){
	if($position == 5){
		$query_GetTeamDepth = sprintf("SELECT Country, Name, EX, Overall, PO FROM goalies WHERE Number = %s ", $player);
		$GetTeamDepth = mysql_query($query_GetTeamDepth, $connection) or die(mysql_error());
		$row_GetTeamDepth = mysql_fetch_assoc($GetTeamDepth);
		$totalRows_GetTeamDepth = mysql_num_rows($GetTeamDepth);
		$ratingScore = ($row_GetTeamDepth['Overall'] * 0.8) + ($row_GetTeamDepth['PO'] * 0.1) + ($row_GetTeamDepth['EX'] * 0.1) - 10;
	} else {
		$query_GetTeamDepth = sprintf("SELECT Country, Name, EX, Overall, PO FROM players WHERE Number = %s ", $player);
		$GetTeamDepth = mysql_query($query_GetTeamDepth, $connection) or die(mysql_error());
		$row_GetTeamDepth = mysql_fetch_assoc($GetTeamDepth);
		$totalRows_GetTeamDepth = mysql_num_rows($GetTeamDepth);
		$ratingScore = ($row_GetTeamDepth['Overall'] * 0.8) + ($row_GetTeamDepth['PO'] * 0.1) + ($row_GetTeamDepth['EX'] * 0.1);
	}
	if($row_GetTeamDepth['Country'] == "RUS" || $row_GetTeamDepth['Country'] == "BLR" || $row_GetTeamDepth['Country'] == "SVK" || $row_GetTeamDepth['Country'] == "SLO" || $row_GetTeamDepth['Country'] == "LAT" || $row_GetTeamDepth['Country'] == "LVA" || $row_GetTeamDepth['Country'] == "KAZ" || $row_GetTeamDepth['Country'] == "UKR" || $row_GetTeamDepth['Country'] == "CHE" || $row_GetTeamDepth['Country'] == "GER"){
		if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('A', 'D', 'E','H', 'M', 'Q','T', 'S', 'P', 'Z'))) {	
			$agentName = "Mark Gandler";
		} else {
			$agentName = "Anton Thun";
		}
	} else if($row_GetTeamDepth['Country'] == "SWE" || $row_GetTeamDepth['Country'] == "FIN" ){
		if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('A', 'D', 'E','H', 'M', 'Q','T', 'S', 'P', 'Z'))) {	
			$agentName = "Larry Kelly";
		} else {
			$agentName = "Allan Walsh";
		}
	} else {
		if($ratingScore > 78){
			if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('A', 'D', 'E','H', 'M', 'Q','T', 'S', 'P'))) {	
				$agentName = "J.P. Barry";
			} else if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('C', 'F', 'J','N', 'P', 'R','T', 'W'))) {	
				$agentName = "Donald Meehan";
			} else {
				$agentName = "Donald Baizley";
			}
		} else if($row_GetTeamDepth['PO'] > 70 && $ratingScore > 70){
			if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('A', 'D', 'E','H', 'M', 'Q','T', 'S', 'P', 'Z'))) {	
				$agentName = "Bobby Orr";
			} else {
				$agentName = "Donald Meehan";
			}
		} else {
			if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('A', 'G', 'S','M','S'))) {	
				$agentName = "Steven Bartlett";
			} else if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('B', 'H', 'N','T'))) {	
				$agentName = "Pat Brisson";
			} else if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('C', 'I', 'O','U'))) {	
				$agentName = "Richard Curran";
			} else if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('D', 'J', 'P','V'))) {	
				$agentName = "Jay Grossman";
			} else if(in_array(substr($row_GetTeamDepth['Name'],0,1), array('E', 'K', 'Q','W'))) {	
				$agentName = "Donald Meehan";
			} else {	
				$agentName = "Paul Theofanous";
			}
		}
	}
	return	'<img src="'.$_SESSION['DomainName'].'/image/agents/'.$agentName.'.jpg" width="70" height="105" align="right"/><br />'.$agentName;
}

function unique_rand($start, $end, $amount) {
	$random = array();
	while ($amount) {
		$amount--;
		do {
			$random_num = mt_rand($start, $end);
		} while (in_array($random_num, $random));
		$random[] = $random_num;
	}
	return $random;
}

function getMyTimeDiff($t1,$t2)
{
	$a1 = explode(":",$t1);
	$a2 = explode(":",$t2);
	$time1 = (($a1[0]*60*60)+($a1[1]*60)+($a1[2]));
	$time2 = (($a2[0]*60*60)+($a2[1]*60)+($a2[2]));
	$diff = abs($time1-$time2);
	$hours = floor($diff/(60*60));
	$mins = floor(($diff-($hours*60*60))/(60));
	$secs = floor(($diff-(($hours*60*60)+($mins*60))));
	$result = $hours.":".$mins.":".$secs;
	return $result;
}

// Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
	$time1 = $ttime;
	$diffs[$interval]++;
	// Create new temp time from time1 and interval
	$ttime = strtotime("+1 " . $interval, $time1);
      }
    }
 
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
	break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
	// Add s if value is not 1
	if ($value != 1) {
	  $interval .= "s";
	}
	// Add value and interval to times array
	$times[] = $value . " " . $interval;
	$count++;
      }
    }
 
    // Return string with times
    return $times[0];
  }
  
  
function checkMarketValue($player, $position, $connection){
	$query_GetWebInfo = sprintf("SELECT * FROM config");
	$GetWebInfo = mysql_query($query_GetWebInfo, $connection) or die(mysql_error());
	$row_GetWebInfo = mysql_fetch_assoc($GetWebInfo);
	
	$SalaryCap=$row_GetWebInfo['SalaryCap'];
	$MinimumPlayerSalary=$row_GetWebInfo['MinimumPlayerSalary'];
	$MaximumPlayerSalary=$row_GetWebInfo['MaximumPlayerSalary'];
	$TradeDeadlineDay=$row_GetWebInfo['TradeDeadlineDay'];
	$PlayerAI=$row_GetWebInfo['PlayerAI'];
	$UFA=$row_GetWebInfo['UFA'];
	$AvgerageSalary=$row_GetWebInfo['AvgerageSalary'];
	$WaiverSalaryExemption=$row_GetWebInfo['WaiverSalaryExemption'];
	
	if ($position == 'goalie'){
		$query_GetPlayer = sprintf("SELECT P.*, '5' as Position FROM goalies as P, goaliestats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $player);
		$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
		$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
		$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
		
		$query_GetAvg = sprintf("SELECT AVG(Salary1) as Salary, AVG(SK) as SK, AVG(DU) as DU, AVG(EN) as EN, AVG(SZ) as SZ, AVG(AG) as AG, AVG(RB) as RB, AVG(SC) as SC, AVG(HS) as HS, AVG(RT) as RT, AVG(PC) as PC, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM goalies WHERE Retired=0 AND SK > 50 AND DU > 50 AND EN > 40 AND SZ > 50 AND AG > 50 AND RB > 50 AND SC > 50 AND PS AND LD > 50 AND EX > 50");
		$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
		$row_GetAvg = mysql_fetch_assoc($GetAvg);
		$totalRows_GetAvg = mysql_num_rows($GetAvg);
		
		$OverallRate = $row_GetPlayer['Overall'] - 10;
		
		$SK_MOD=0.85;
		$DU_MOD=1.10;
		$EN_MOD=1.00;
		$SZ_MOD=1.10;
		$AG_MOD=0.85;
		$RB_MOD=1.05;
		$SC_MOD=0.90;
		$HS_MOD=0.75;
		$RT_MOD=0.85;
		$PC_MOD=0.80;
		$PS_MOD=0.75;
		$EX_MOD=0.50;
		$LD_MOD=0.50;
		
		$BASE_MOD_1 = 1.15;
		$BASE_MOD_2 = 1.1;
		$BASE_MOD_3 = 1.05;
		$BASE_MOD_4 = 1;
		$INCREMENT=0.06;
		
		if($row_GetPlayer['Salary1'] < $MinimumPlayerSalary) { $tmpSalary = $MinimumPlayerSalary; } else {$tmpSalary = $row_GetPlayer['Salary1']; }
		
		$WEIGHTED_AVE_RATE = ((($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['SZ'] * $SZ_MOD) + ($row_GetAvg['AG'] * $AG_MOD) + ($row_GetAvg['RB'] * $RB_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['HS'] * $HS_MOD) + ($row_GetAvg['RT'] * $RT_MOD) + ($row_GetAvg['PC'] * $PC_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 13);
		$PLAYER_AVE_RATE = ((($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['SZ'] * $SZ_MOD) + ($row_GetPlayer['AG'] * $AG_MOD) + ($row_GetPlayer['RB'] * $RB_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['HS'] * $HS_MOD) + ($row_GetPlayer['RT'] * $RT_MOD) + ($row_GetPlayer['PC'] * $PC_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 14);
		$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
		
		if($row_GetPlayer['PO'] > 90){ $POTENTIAL_MOD = 1.25; 
		} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.2; 
		} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.15; 
		} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.1; 
		} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.075; 
		} else if($row_GetPlayer['PO'] >= 65 && $row_GetPlayer['PO'] < 70){ $POTENTIAL_MOD = 1.05; 
		} else if($row_GetPlayer['PO'] >= 60 && $row_GetPlayer['PO'] < 65){ $POTENTIAL_MOD = 1.025; 
		} else { $POTENTIAL_MOD = 1;}
		
		if($FINAL_BASE_RATE < 0.9) { $FINAL_BASE_RATE = 0.9; }
		$YEAR_1_MOD = abs(($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_2_MOD = abs(($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_3_MOD = abs(($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_4_MOD = abs(($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		
		if(abs($YEAR_1_MOD * $AvgerageSalary) < $MinimumPlayerSalary){
			$tmpSalaryMod = $MinimumPlayerSalary;
		} else {
			$tmpSalaryMod = abs($YEAR_1_MOD * $AvgerageSalary);
		}
		if($tmpSalary > $tmpSalaryMod){
			$BONUS = floor(($tmpSalary - $AvgerageSalary) * 0.2);
		} else {
			$BONUS = 0;
		}
		
		$YEAR_1_SALARY = round(floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1)),-3);
		$YEAR_2_SALARY = round(floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95)),-3);
		$YEAR_3_SALARY = round(floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9)),-3);
		$YEAR_4_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85)),-3);
		$YEAR_5_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8)),-3);
		$YEAR_6_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75)),-3);
		$YEAR_7_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7)),-3);
		$YEAR_8_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65)),-3);
		$YEAR_9_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6)),-3);
		$YEAR_10_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5)),-3);
		
		$SalaryIncrement = 1 + ((($row_GetPlayer['PO'] * .25) + ($row_GetPlayer['Overall'] * .75))/100);
	
		if ($YEAR_1_SALARY < $MinimumPlayerSalary) { $YEAR_1_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 1); }
		if ($YEAR_2_SALARY < $MinimumPlayerSalary) { $YEAR_2_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.95); }
		if ($YEAR_3_SALARY < $MinimumPlayerSalary) { $YEAR_3_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.90); }
		if ($YEAR_4_SALARY < $MinimumPlayerSalary) { $YEAR_4_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.85); }
		if ($YEAR_5_SALARY < $MinimumPlayerSalary) { $YEAR_5_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.8); }
		if ($YEAR_6_SALARY < $MinimumPlayerSalary) { $YEAR_6_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.75); }
		if ($YEAR_7_SALARY < $MinimumPlayerSalary) { $YEAR_7_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.7); }
		if ($YEAR_8_SALARY < $MinimumPlayerSalary) { $YEAR_8_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.65); }
		if ($YEAR_9_SALARY < $MinimumPlayerSalary) { $YEAR_9_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.6); }
		if ($YEAR_10_SALARY < $MinimumPlayerSalary) { $YEAR_10_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.5); }
	
		$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;
	
		
	}else{
		$query_GetPlayer = sprintf("SELECT P.* FROM players as P, playerstats as S WHERE P.Number='%s' AND P.Number=S.Number AND S.Active='True'", $player);
		$GetPlayer = mysql_query($query_GetPlayer, $connection) or die(mysql_error());
		$row_GetPlayer = mysql_fetch_assoc($GetPlayer);
		$totalRows_GetPlayer = mysql_num_rows($GetPlayer);
		
		$query_GetAvg = sprintf("SELECT AVG(Salary1) as Salary, AVG(CK) as CK, AVG(FG) as FG, AVG(DI) as DI, AVG(SK) as SK, AVG(ST) as ST, AVG(EN) as EN, AVG(DU) as DU, AVG(PH) as PH, AVG(FO) as FO, AVG(PA) as PA, AVG(SC) as SC, AVG(DF) as DF, AVG(PS) as PS, AVG(EX) as EX, AVG(LD) as LD, AVG(PO) as PO FROM players WHERE Retired=0 AND CK > 50 AND FG > 50 AND DI > 40 AND SK > 50 AND ST > 50 AND EN > 50 AND DU > 50 AND PH > 50 AND FO > 50 AND PA > 50 AND SC > 50 AND DF > 50 AND PS > 50 AND LD > 50 AND EX > 50");
		$GetAvg = mysql_query($query_GetAvg, $connection) or die(mysql_error());
		$row_GetAvg = mysql_fetch_assoc($GetAvg);
		$totalRows_GetAvg = mysql_num_rows($GetAvg);
		
		$OverallRate = $row_GetPlayer['Overall'];
		
		if($row_GetPlayer['Salary1'] < $MinimumPlayerSalary) { $tmpSalary = $MinimumPlayerSalary; } else {$tmpSalary = $row_GetPlayer['Salary1']; }
		
		if ($row_GetPlayer['Position'] > 0 && $row_GetPlayer['Position'] < 4){
			$CK_MOD=0.65;
			$FG_MOD=0.50;
			$DI_MOD=0.50;
			$SK_MOD=0.50;
			$ST_MOD=0.80;
			$EN_MOD=0.80;
			$DU_MOD=0.70;
			$PH_MOD=0.80;
			$FO_MOD=0.65;
			$PA_MOD=1.10;
			$SC_MOD=1.30;
			$DF_MOD=1.10;
			$PS_MOD=0.60;
			$EX_MOD=0.50;
			$LD_MOD=0.50;
		} else {
			$CK_MOD=0.90;
			$FG_MOD=0.50;
			$DI_MOD=0.60;
			$SK_MOD=0.75;
			$ST_MOD=0.80;
			$EN_MOD=0.80;
			$DU_MOD=1.10;
			$PH_MOD=0.80;
			$FO_MOD=0.20;
			$PA_MOD=1.05;
			$SC_MOD=1.00;
			$DF_MOD=1.30;
			$PS_MOD=0.20;
			$EX_MOD=0.50;
			$LD_MOD=0.50;
		} 
		
		$BASE_MOD_1 = 1.15;
		$BASE_MOD_2 = 1.1;
		$BASE_MOD_3 = 1.05;
		$BASE_MOD_4 = 1;
		if($OverallRate >= 80){
			$INCREMENT=0.08;
		} else {
			$INCREMENT=0.06;
		}
		
		$WEIGHTED_AVE_RATE = ((($row_GetAvg['CK'] * $CK_MOD) + ($row_GetAvg['FG'] * $FG_MOD) + ($row_GetAvg['DI'] * $DI_MOD) + ($row_GetAvg['SK'] * $SK_MOD) + ($row_GetAvg['ST'] * $ST_MOD) + ($row_GetAvg['EN'] * $EN_MOD) + ($row_GetAvg['DU'] * $DU_MOD) + ($row_GetAvg['PH'] * $PH_MOD) + ($row_GetAvg['FO'] * $FO_MOD) + ($row_GetAvg['PA'] * $PA_MOD) + ($row_GetAvg['SC'] * $SC_MOD) + ($row_GetAvg['DF'] * $DF_MOD) + ($row_GetAvg['PS'] * $PS_MOD) + ($row_GetAvg['EX'] * $EX_MOD) + ($row_GetAvg['LD'] * $LD_MOD)) / 15);
		$PLAYER_AVE_RATE = ((($row_GetPlayer['CK'] * $CK_MOD) + ($row_GetPlayer['FG'] * $FG_MOD) + ($row_GetPlayer['DI'] * $DI_MOD) + ($row_GetPlayer['SK'] * $SK_MOD) + ($row_GetPlayer['ST'] * $ST_MOD) + ($row_GetPlayer['EN'] * $EN_MOD) + ($row_GetPlayer['DU'] * $DU_MOD) + ($row_GetPlayer['PH'] * $PH_MOD) + ($row_GetPlayer['FO'] * $FO_MOD) + ($row_GetPlayer['PA'] * $PA_MOD) + ($row_GetPlayer['SC'] * $SC_MOD) + ($row_GetPlayer['DF'] * $DF_MOD) + ($row_GetPlayer['PS'] * $PS_MOD) + ($row_GetPlayer['EX'] * $EX_MOD) + ($row_GetPlayer['LD'] * $LD_MOD)) / 15);
		$FINAL_BASE_RATE = $PLAYER_AVE_RATE / $WEIGHTED_AVE_RATE;
		
		if($row_GetPlayer['PO'] > 90){ $POTENTIAL_MOD = 1.25; 
		} else if($row_GetPlayer['PO'] >= 85 && $row_GetPlayer['PO'] < 90){ $POTENTIAL_MOD = 1.2; 
		} else if($row_GetPlayer['PO'] >= 80 && $row_GetPlayer['PO'] < 85){ $POTENTIAL_MOD = 1.15; 
		} else if($row_GetPlayer['PO'] >= 75 && $row_GetPlayer['PO'] < 80){ $POTENTIAL_MOD = 1.1; 
		} else if($row_GetPlayer['PO'] >= 70 && $row_GetPlayer['PO'] < 75){ $POTENTIAL_MOD = 1.075; 
		} else if($row_GetPlayer['PO'] >= 65 && $row_GetPlayer['PO'] < 70){ $POTENTIAL_MOD = 1.05; 
		} else if($row_GetPlayer['PO'] >= 60 && $row_GetPlayer['PO'] < 65){ $POTENTIAL_MOD = 1.025; 
		} else { $POTENTIAL_MOD = 1;}
		
		if($FINAL_BASE_RATE < 0.9) { $FINAL_BASE_RATE = 0.9; }
		$YEAR_1_MOD = abs(($BASE_MOD_1 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_2_MOD = abs(($BASE_MOD_2 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_3_MOD = abs(($BASE_MOD_3 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		$YEAR_4_MOD = abs(($BASE_MOD_4 + (($FINAL_BASE_RATE-1)*100)*$INCREMENT)*$POTENTIAL_MOD);
		
		if(abs($YEAR_1_MOD * $AvgerageSalary) < $MinimumPlayerSalary){
			$tmpSalaryMod = $MinimumPlayerSalary;
		} else {
			$tmpSalaryMod = abs($YEAR_1_MOD * $AvgerageSalary);
		}
		if($tmpSalary > $tmpSalaryMod){
			$BONUS = floor(($tmpSalary - $AvgerageSalary) * 0.2);
		} else {
			$BONUS = 0;
		}
		
		$YEAR_1_SALARY = round(floor(abs($YEAR_1_MOD * $AvgerageSalary) + ($BONUS * 1)),-3);
		$YEAR_2_SALARY = round(floor(abs($YEAR_2_MOD * $AvgerageSalary) + ($BONUS * 0.95)),-3);
		$YEAR_3_SALARY = round(floor(abs($YEAR_3_MOD * $AvgerageSalary) + ($BONUS * 0.9)),-3);
		$YEAR_4_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.85)),-3);
		$YEAR_5_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.8)),-3);
		$YEAR_6_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.75)),-3);
		$YEAR_7_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.7)),-3);
		$YEAR_8_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.65)),-3);
		$YEAR_9_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.6)),-3);
		$YEAR_10_SALARY = round(floor(abs($YEAR_4_MOD * $AvgerageSalary) + ($BONUS * 0.5)),-3);
		
		$SalaryIncrement = 1 + ((($row_GetPlayer['PO'] * .25) + ($row_GetPlayer['Overall'] * .75))/100);
	
		if ($YEAR_1_SALARY < $MinimumPlayerSalary) { $YEAR_1_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 1); }
		if ($YEAR_2_SALARY < $MinimumPlayerSalary) { $YEAR_2_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.95); }
		if ($YEAR_3_SALARY < $MinimumPlayerSalary) { $YEAR_3_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.90); }
		if ($YEAR_4_SALARY < $MinimumPlayerSalary) { $YEAR_4_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.85); }
		if ($YEAR_5_SALARY < $MinimumPlayerSalary) { $YEAR_5_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.8); }
		if ($YEAR_6_SALARY < $MinimumPlayerSalary) { $YEAR_6_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.75); }
		if ($YEAR_7_SALARY < $MinimumPlayerSalary) { $YEAR_7_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.7); }
		if ($YEAR_8_SALARY < $MinimumPlayerSalary) { $YEAR_8_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.65); }
		if ($YEAR_9_SALARY < $MinimumPlayerSalary) { $YEAR_9_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.6); }
		if ($YEAR_10_SALARY < $MinimumPlayerSalary) { $YEAR_10_SALARY = $MinimumPlayerSalary * ($SalaryIncrement * 0.5); }
		
		$TOTAL_SALARY = $YEAR_1_SALARY + $YEAR_2_SALARY + $YEAR_3_SALARY + $YEAR_4_SALARY + $YEAR_5_SALARY + $YEAR_6_SALARY + $YEAR_7_SALARY + $YEAR_8_SALARY + $YEAR_9_SALARY + $YEAR_10_SALARY;
	
	}
	
	if($OverallRate > 70 && $row_GetPlayer['Age'] < 36 && $row_GetPlayer['Age'] >= $UFA){
		$expectedYears = 4;
		$expectedTotal = $YEAR_4_SALARY * 4;
		$expectedSalary = $YEAR_4_SALARY;
	} else if($OverallRate > 70 && $row_GetPlayer['Age'] > 39){
		$expectedYears = 1;
		$expectedTotal = $YEAR_1_SALARY;
		$expectedSalary = $YEAR_1_SALARY;
	} else if($OverallRate > 70 && $row_GetPlayer['Age'] > 35){
		$expectedYears = 2;
		$expectedTotal = $YEAR_2_SALARY * 2;
		$expectedSalary = $YEAR_2_SALARY;
	} else if($OverallRate < 60){
		$expectedYears = 1;
		$expectedTotal = $YEAR_1_SALARY;
		$expectedSalary = $YEAR_1_SALARY;
	} else if($OverallRate > 70 && $row_GetPlayer['Age'] < $UFA){
		$expectedYears = 4;
		$expectedTotal = $YEAR_4_SALARY;
		$expectedSalary = $YEAR_4_SALARY;
		if($row_GetPlayer['Age'] + 4 >= $UFA){
			$expectedYears = 3 - (($row_GetPlayer['Age']+4) - $UFA);
		}
		if($expectedYears == 1 || $expectedYears == 0){
			$expectedYears = 1;
			$expectedTotal = $YEAR_1_SALARY;
			$expectedSalary = $YEAR_1_SALARY;
		} else if($expectedYears == 2){
			$expectedYears = 2;
			$expectedTotal = $YEAR_2_SALARY * 2;
			$expectedSalary = $YEAR_2_SALARY;
		} else {
			$expectedYears = 3;
			$expectedTotal = $YEAR_3_SALARY * 3;
			$expectedSalary = $YEAR_3_SALARY;
		} 
		
	} else {
		$expectedYears = 2;
		$expectedTotal = $YEAR_2_SALARY * 2;
		$expectedSalary = $YEAR_2_SALARY;
	}

	$jsonData = '[{
	"years":"'.$expectedYears.'",
	"salary":"'.$expectedSalary.'",
	"total":"'.$expectedTotal.'"
	}]';
	return $jsonData;
}
?>
