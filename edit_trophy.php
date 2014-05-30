<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php
 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$UPLOADED_PlayoffsChampionsPhoto ="";
$UPLOADED_RegularSeasonChampionsPhoto ="";
$UPLOADED_PlayoffMVPPhoto ="";
$UPLOADED_TopScorerPhoto ="";
$UPLOADED_MVPPhoto ="";
$UPLOADED_GoalieOfTheYearPhoto ="";
$UPLOADED_DefensemanOfTheYearPhoto ="";
$UPLOADED_RookieOfTheYearPhoto ="";
$UPLOADED_BestDefensiveForwardPhoto ="";
$UPLOADED_MostSportsmanlikePlayerPhoto ="";
$UPLOADED_CoachOfTheYearPhoto ="";
$UPLOADED_TopGoalScorerPhoto ="";
$UPLOADED_LowestGAAPhoto ="";
$UPLOADED_LowestPIMPhoto ="";
$UPLOADED_FarmPlayoffsChampionsPhoto ="";
$UPLOADED_FarmRegularSeasonChampionsPhoto ="";
$UPLOADED_FarmPlayoffMVPPhoto ="";
$UPLOADED_FarmTopScorerPhoto ="";
$UPLOADED_FarmMVPPhoto ="";
$UPLOADED_FarmGoalieOfTheYearPhoto ="";
$UPLOADED_FarmDefensemanOfTheYearPhoto ="";
$UPLOADED_FarmRookieOfTheYearPhoto ="";
$UPLOADED_FarmBestDefensiveForwardPhoto ="";
$UPLOADED_FarmMostSportsmanlikePlayerPhoto ="";
$UPLOADED_FarmCoachOfTheYearPhoto ="";
$UPLOADED_FarmTopGoalScorerPhoto ="";
$UPLOADED_FarmLowestGAAPhoto ="";
$UPLOADED_FarmLowestPIMPhoto ="";
$UPLOADED_GeneralManager ="";
$UPLOADED_GeneralManagerPhoto ="";

if ($_FILES["PlayoffMVPPhoto"]["error"] > 0)
  {  $UPLOADED_PlayoffMVPPhoto = $_POST['OLD_PlayoffMVPPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['PlayoffMVPPhoto']['name']); 
  if(move_uploaded_file($_FILES['PlayoffMVPPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['PlayoffMVPPhoto']['name'])." has been uploaded";
		$UPLOADED_PlayoffMVPPhoto=basename( $_FILES['PlayoffMVPPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_PlayoffMVPPhoto = $_FILES["PlayoffMVPPhoto"]["name"];
}

if ($_FILES["TopScorerPhoto"]["error"] > 0)
  {  $UPLOADED_TopScorerPhoto = $_POST['OLD_TopScorerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['TopScorerPhoto']['name']); 
  if(move_uploaded_file($_FILES['TopScorerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['TopScorerPhoto']['name'])." has been uploaded";
		$UPLOADED_TopScorerPhoto=basename( $_FILES['TopScorerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_TopScorerPhoto = $_FILES["TopScorerPhoto"]["name"];
}

if ($_FILES["MVPPhoto"]["error"] > 0)
  {  $UPLOADED_MVPPhoto = $_POST['OLD_MVPPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['MVPPhoto']['name']); 
  if(move_uploaded_file($_FILES['MVPPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['MVPPhoto']['name'])." has been uploaded";
		$UPLOADED_MVPPhoto=basename( $_FILES['MVPPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_MVPPhoto = $_FILES["MVPPhoto"]["name"];
}

if ($_FILES["GoalieOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_GoalieOfTheYearPhoto = $_POST['OLD_GoalieOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['GoalieOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['GoalieOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['GoalieOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_GoalieOfTheYearPhoto=basename( $_FILES['GoalieOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_GoalieOfTheYearPhoto = $_FILES["GoalieOfTheYearPhoto"]["name"];
}

if ($_FILES["DefensemanOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_DefensemanOfTheYearPhoto = $_POST['OLD_DefensemanOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['DefensemanOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['DefensemanOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['DefensemanOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_DefensemanOfTheYearPhoto=basename( $_FILES['DefensemanOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_DefensemanOfTheYearPhoto = $_FILES["DefensemanOfTheYearPhoto"]["name"];
}

if ($_FILES["RookieOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_RookieOfTheYearPhoto = $_POST['OLD_RookieOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['RookieOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['RookieOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['RookieOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_RookieOfTheYearPhoto=basename( $_FILES['RookieOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_RookieOfTheYearPhoto = $_FILES["RookieOfTheYearPhoto"]["name"];
}

if ($_FILES["BestDefensiveForwardPhoto"]["error"] > 0)
  {  $UPLOADED_BestDefensiveForwardPhoto = $_POST['OLD_BestDefensiveForwardPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['BestDefensiveForwardPhoto']['name']); 
  if(move_uploaded_file($_FILES['BestDefensiveForwardPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['BestDefensiveForwardPhoto']['name'])." has been uploaded";
		$UPLOADED_BestDefensiveForwardPhoto=basename( $_FILES['BestDefensiveForwardPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_BestDefensiveForwardPhoto = $_FILES["BestDefensiveForwardPhoto"]["name"];
}

if ($_FILES["MostSportsmanlikePlayerPhoto"]["error"] > 0)
  {  $UPLOADED_MostSportsmanlikePlayerPhoto = $_POST['OLD_MostSportsmanlikePlayerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['MostSportsmanlikePlayerPhoto']['name']); 
  if(move_uploaded_file($_FILES['MostSportsmanlikePlayerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['MostSportsmanlikePlayerPhoto']['name'])." has been uploaded";
		$UPLOADED_MostSportsmanlikePlayerPhoto=basename( $_FILES['MostSportsmanlikePlayerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_MostSportsmanlikePlayerPhoto = $_FILES["MostSportsmanlikePlayerPhoto"]["name"];
}

if ($_FILES["CoachOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_CoachOfTheYearPhoto = $_POST['OLD_CoachOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['CoachOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['CoachOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['CoachOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_CoachOfTheYearPhoto=basename( $_FILES['CoachOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_CoachOfTheYearPhoto = $_FILES["CoachOfTheYearPhoto"]["name"];
}

if ($_FILES["TopGoalScorerPhoto"]["error"] > 0)
  {  $UPLOADED_TopGoalScorerPhoto = $_POST['OLD_TopGoalScorerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['TopGoalScorerPhoto']['name']); 
  if(move_uploaded_file($_FILES['TopGoalScorerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['TopGoalScorerPhoto']['name'])." has been uploaded";
		$UPLOADED_TopGoalScorerPhoto=basename( $_FILES['TopGoalScorerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_TopGoalScorerPhoto = $_FILES["TopGoalScorerPhoto"]["name"];
}

if ($_FILES["LowestGAAPhoto"]["error"] > 0)
  {  $UPLOADED_LowestGAAPhoto = $_POST['OLD_LowestGAAPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['LowestGAAPhoto']['name']); 
  if(move_uploaded_file($_FILES['LowestGAAPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['LowestGAAPhoto']['name'])." has been uploaded";
		$UPLOADED_LowestGAAPhoto=basename( $_FILES['LowestGAAPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_LowestGAAPhoto = $_FILES["LowestGAAPhoto"]["name"];
}

if ($_FILES["LowestPIMPhoto"]["error"] > 0)
  {  $UPLOADED_LowestPIMPhoto = $_POST['OLD_LowestPIMPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['LowestPIMPhoto']['name']); 
  if(move_uploaded_file($_FILES['LowestPIMPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['LowestPIMPhoto']['name'])." has been uploaded";
		$UPLOADED_LowestPIMPhoto=basename( $_FILES['LowestPIMPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_LowestPIMPhoto = $_FILES["LowestPIMPhoto"]["name"];
}

if ($_FILES["GeneralManagerPhoto"]["error"] > 0)
  {  $UPLOADED_GeneralManagerPhoto = $_POST['OLD_GeneralManagerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['GeneralManagerPhoto']['name']); 
  if(move_uploaded_file($_FILES['GeneralManagerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['GeneralManagerPhoto']['name'])." has been uploaded";
		$UPLOADED_GeneralManagerPhoto=basename( $_FILES['GeneralManagerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_GeneralManagerPhoto = $_FILES["GeneralManagerPhoto"]["name"];
}

if ($_FILES["FarmPlayoffMVPPhoto"]["error"] > 0)
  {  $UPLOADED_FarmPlayoffMVPPhoto = $_POST['OLD_FarmPlayoffMVPPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmPlayoffMVPPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmPlayoffMVPPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmPlayoffMVPPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmPlayoffMVPPhoto=basename( $_FILES['FarmPlayoffMVPPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmPlayoffMVPPhoto = $_FILES["FarmPlayoffMVPPhoto"]["name"];
}

if ($_FILES["FarmFarmTopScorerPhoto"]["error"] > 0)
  {  $UPLOADED_FarmTopScorerPhoto = $_POST['OLD_FarmTopScorerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmTopScorerPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmTopScorerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmTopScorerPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmTopScorerPhoto=basename( $_FILES['FarmTopScorerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmTopScorerPhoto = $_FILES["FarmTopScorerPhoto"]["name"];
}

if ($_FILES["FarmFarmMVPPhoto"]["error"] > 0)
  {  $UPLOADED_FarmMVPPhoto = $_POST['OLD_FarmMVPPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmMVPPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmMVPPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmMVPPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmMVPPhoto=basename( $_FILES['FarmMVPPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmMVPPhoto = $_FILES["FarmMVPPhoto"]["name"];
}

if ($_FILES["FarmFarmGoalieOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_FarmGoalieOfTheYearPhoto = $_POST['OLD_FarmGoalieOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmGoalieOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmGoalieOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmGoalieOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmGoalieOfTheYearPhoto=basename( $_FILES['FarmGoalieOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmGoalieOfTheYearPhoto = $_FILES["FarmGoalieOfTheYearPhoto"]["name"];
}

if ($_FILES["FarmFarmDefensemanOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_FarmDefensemanOfTheYearPhoto = $_POST['OLD_FarmDefensemanOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmDefensemanOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmDefensemanOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmDefensemanOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmDefensemanOfTheYearPhoto=basename( $_FILES['FarmDefensemanOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmDefensemanOfTheYearPhoto = $_FILES["FarmDefensemanOfTheYearPhoto"]["name"];
}

if ($_FILES["FarmFarmRookieOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_FarmRookieOfTheYearPhoto = $_POST['OLD_FarmRookieOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmRookieOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmRookieOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmRookieOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmRookieOfTheYearPhoto=basename( $_FILES['FarmRookieOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmRookieOfTheYearPhoto = $_FILES["FarmRookieOfTheYearPhoto"]["name"];
}

if ($_FILES["FarmFarmBestDefensiveForwardPhoto"]["error"] > 0)
  {  $UPLOADED_FarmBestDefensiveForwardPhoto = $_POST['OLD_FarmBestDefensiveForwardPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmBestDefensiveForwardPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmBestDefensiveForwardPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmBestDefensiveForwardPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmBestDefensiveForwardPhoto=basename( $_FILES['FarmBestDefensiveForwardPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmBestDefensiveForwardPhoto = $_FILES["FarmBestDefensiveForwardPhoto"]["name"];
}

if ($_FILES["FarmFarmMostSportsmanlikePlayerPhoto"]["error"] > 0)
  {  $UPLOADED_FarmMostSportsmanlikePlayerPhoto = $_POST['OLD_FarmMostSportsmanlikePlayerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmMostSportsmanlikePlayerPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmMostSportsmanlikePlayerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmMostSportsmanlikePlayerPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmMostSportsmanlikePlayerPhoto=basename( $_FILES['FarmMostSportsmanlikePlayerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmMostSportsmanlikePlayerPhoto = $_FILES["FarmMostSportsmanlikePlayerPhoto"]["name"];
}

if ($_FILES["FarmFarmCoachOfTheYearPhoto"]["error"] > 0)
  {  $UPLOADED_FarmCoachOfTheYearPhoto = $_POST['OLD_FarmCoachOfTheYearPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmCoachOfTheYearPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmCoachOfTheYearPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmCoachOfTheYearPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmCoachOfTheYearPhoto=basename( $_FILES['FarmCoachOfTheYearPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmCoachOfTheYearPhoto = $_FILES["FarmCoachOfTheYearPhoto"]["name"];
}

if ($_FILES["FarmFarmTopGoalScorerPhoto"]["error"] > 0)
  {  $UPLOADED_FarmTopGoalScorerPhoto = $_POST['OLD_FarmTopGoalScorerPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmTopGoalScorerPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmTopGoalScorerPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmTopGoalScorerPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmTopGoalScorerPhoto=basename( $_FILES['FarmTopGoalScorerPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmTopGoalScorerPhoto = $_FILES["FarmTopGoalScorerPhoto"]["name"];
}

if ($_FILES["FarmFarmLowestGAAPhoto"]["error"] > 0)
  {  $UPLOADED_FarmLowestGAAPhoto = $_POST['OLD_FarmLowestGAAPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmLowestGAAPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmLowestGAAPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmLowestGAAPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmLowestGAAPhoto=basename( $_FILES['FarmLowestGAAPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmLowestGAAPhoto = $_FILES["FarmLowestGAAPhoto"]["name"];
}

if ($_FILES["FarmFarmLowestPIMPhoto"]["error"] > 0)
  {  $UPLOADED_FarmLowestPIMPhoto = $_POST['OLD_FarmLowestPIMPhoto'];  }
else
  {
  $target_path = "image/trophys/";
  $target_path = $target_path . basename( $_FILES['FarmLowestPIMPhoto']['name']); 
  if(move_uploaded_file($_FILES['FarmLowestPIMPhoto']['tmp_name'], $target_path)) {
		$errortxt = "The file ".basename( $_FILES['FarmLowestPIMPhoto']['name'])." has been uploaded";
		$UPLOADED_FarmLowestPIMPhoto=basename( $_FILES['FarmLowestPIMPhoto']['name']);
	} else{ $errortxt = "There was an error uploading the file, please try again!";	}
  $UPLOADED_FarmLowestPIMPhoto = $_FILES["FarmLowestPIMPhoto"]["name"];
}



  $updateSQL = sprintf("UPDATE trophies SET PlayoffMVP=%s, TopScorer=%s, MVP=%s, GoalieOfTheYear=%s, DefensemanOfTheYear=%s, RookieOfTheYear=%s, BestDefensiveForward=%s, MostSportsmanlikePlayer=%s, CoachOfTheYear=%s, TopGoalScorer=%s, LowestGAA=%s, LowestPIM=%s, GeneralManager=%s,PlayoffMVPPhoto=%s,TopScorerPhoto=%s,MVPPhoto=%s,GoalieOfTheYearPhoto=%s,DefensemanOfTheYearPhoto=%s,RookieOfTheYearPhoto=%s,BestDefensiveForwardPhoto=%s,MostSportsmanlikePlayerPhoto=%s,CoachOfTheYearPhoto=%s,TopGoalScorerPhoto=%s,LowestGAAPhoto=%s,LowestPIMPhoto=%s,GeneralManagerPhoto=%s,FarmPlayoffMVP=%s, FarmTopScorer=%s, FarmMVP=%s, FarmGoalieOfTheYear=%s, FarmDefensemanOfTheYear=%s, FarmRookieOfTheYear=%s, FarmBestDefensiveForward=%s, FarmMostSportsmanlikePlayer=%s, FarmCoachOfTheYear=%s, FarmTopGoalScorer=%s, FarmLowestGAA=%s, FarmLowestPIM=%s, FarmPlayoffMVPPhoto=%s,FarmTopScorerPhoto=%s,FarmMVPPhoto=%s,FarmGoalieOfTheYearPhoto=%s,FarmDefensemanOfTheYearPhoto=%s,FarmRookieOfTheYearPhoto=%s,FarmBestDefensiveForwardPhoto=%s,FarmMostSportsmanlikePlayerPhoto=%s,FarmCoachOfTheYearPhoto=%s,FarmTopGoalScorerPhoto=%s,FarmLowestGAAPhoto=%s,FarmLowestPIMPhoto=%s",
                        GetSQLValueString($_POST['PlayoffMVP'], "text"),
						GetSQLValueString($_POST['TopScorer'], "text"),
						GetSQLValueString($_POST['MVP'], "text"),
						GetSQLValueString($_POST['GoalieOfTheYear'], "text"),
						GetSQLValueString($_POST['DefensemanOfTheYear'], "text"),
						GetSQLValueString($_POST['RookieOfTheYear'], "text"),
						GetSQLValueString($_POST['BestDefensiveForward'], "text"),
						GetSQLValueString($_POST['MostSportsmanlikePlayer'], "text"),
						GetSQLValueString($_POST['CoachOfTheYear'], "text"),
						GetSQLValueString($_POST['TopGoalScorer'], "text"),
						GetSQLValueString($_POST['LowestGAA'], "text"),
						GetSQLValueString($_POST['LowestPIM'], "text"),
						GetSQLValueString($_POST['GeneralManager'], "text"),
						GetSQLValueString($UPLOADED_PlayoffMVPPhoto, "text"),
						GetSQLValueString($UPLOADED_TopScorerPhoto, "text"),
						GetSQLValueString($UPLOADED_MVPPhoto, "text"),
						GetSQLValueString($UPLOADED_GoalieOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_DefensemanOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_RookieOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_BestDefensiveForwardPhoto, "text"),
						GetSQLValueString($UPLOADED_MostSportsmanlikePlayerPhoto, "text"),
						GetSQLValueString($UPLOADED_CoachOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_TopGoalScorerPhoto, "text"),
						GetSQLValueString($UPLOADED_LowestGAAPhoto, "text"),
						GetSQLValueString($UPLOADED_LowestPIMPhoto, "text")	,
						GetSQLValueString($UPLOADED_GeneralManagerPhoto, "text"), 
						GetSQLValueString($_POST['FarmPlayoffMVP'], "text"),
						GetSQLValueString($_POST['FarmTopScorer'], "text"),
						GetSQLValueString($_POST['FarmMVP'], "text"),
						GetSQLValueString($_POST['FarmGoalieOfTheYear'], "text"),
						GetSQLValueString($_POST['FarmDefensemanOfTheYear'], "text"),
						GetSQLValueString($_POST['FarmRookieOfTheYear'], "text"),
						GetSQLValueString($_POST['FarmBestDefensiveForward'], "text"),
						GetSQLValueString($_POST['FarmMostSportsmanlikePlayer'], "text"),
						GetSQLValueString($_POST['FarmCoachOfTheYear'], "text"),
						GetSQLValueString($_POST['FarmTopGoalScorer'], "text"),
						GetSQLValueString($_POST['FarmLowestGAA'], "text"),
						GetSQLValueString($_POST['FarmLowestPIM'], "text"),
						GetSQLValueString($UPLOADED_FarmPlayoffMVPPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmTopScorerPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmMVPPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmGoalieOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmDefensemanOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmRookieOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmBestDefensiveForwardPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmMostSportsmanlikePlayerPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmCoachOfTheYearPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmTopGoalScorerPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmLowestGAAPhoto, "text"),
						GetSQLValueString($UPLOADED_FarmLowestPIMPhoto, "text")						
						);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
  $updateGoTo = "pro_awards.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$query_GetTrophies = sprintf("SELECT * FROM trophies");
$GetTrophies = mysql_query($query_GetTrophies, $connection) or die(mysql_error());
$row_GetTrophies = mysql_fetch_assoc($GetTrophies);
$totalRows_GetTrophies = mysql_num_rows($GetTrophies);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Edit Trophys - <?php echo $_SESSION['SiteName'] ; ?></title>

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
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.datePicker.js"></script>
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
  $('.date-pick').datePicker().val(new Date().asString()).trigger('change');
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
    <h1>Edit Trophy Names</h1><Br />
    
<table class="tablesorterRates" >
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" enctype="multipart/form-data">
<thead>
    <tr>
        <th></th>
        <th>Name of Trophy</th>
        <th>Photo</th>
    </tr>
    </thead>
 <tbody>       <!--paste newest signing here-->
<?php do {  ?>
        <tr>
            <td>Pro Top Scorer:</td><td><input type="text" name="TopScorer" value="<?php echo $row_GetTrophies['TopScorer']; ?>" size="40" /></td>
            <td><input type="file" name="TopScorerPhoto" />
				<input type="hidden" name="OLD_TopScorerPhoto" value="<?php echo $row_GetTrophies['TopScorerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Top Goal Scorer:</td><td><input type="text" name="TopGoalScorer" value="<?php echo $row_GetTrophies['TopGoalScorer']; ?>" size="40" /></td>
            <td><input type="file" name="TopGoalScorerPhoto" />
				<input type="hidden" name="OLD_TopGoalScorerPhoto" value="<?php echo $row_GetTrophies['TopGoalScorerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Most Sportsman like Player:</td><td><input type="text" name="MostSportsmanlikePlayer" value="<?php echo $row_GetTrophies['MostSportsmanlikePlayer']; ?>" size="40" /></td>
            <td><input type="file" name="MostSportsmanlikePlayerPhoto" />
				<input type="hidden" name="OLD_MostSportsmanlikePlayerPhoto" value="<?php echo $row_GetTrophies['MostSportsmanlikePlayerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Lowest PIM:</td><td><input type="text" name="LowestPIM" value="<?php echo $row_GetTrophies['LowestPIM']; ?>" size="40" /></td>
            <td><input type="file" name="LowestPIMPhoto" />
				<input type="hidden" name="OLD_LowestPIMPhoto" value="<?php echo $row_GetTrophies['LowestPIMPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Rookie Of The Year:</td><td><input type="text" name="RookieOfTheYear" value="<?php echo $row_GetTrophies['RookieOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="RookieOfTheYearPhoto" />
				<input type="hidden" name="OLD_RookieOfTheYearPhoto" value="<?php echo $row_GetTrophies['RookieOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Best Defensive Forward:</td><td><input type="text" name="BestDefensiveForward" value="<?php echo $row_GetTrophies['BestDefensiveForward']; ?>" size="40" /></td>
            <td><input type="file" name="BestDefensiveForwardPhoto" />
				<input type="hidden" name="OLD_BestDefensiveForwardPhoto" value="<?php echo $row_GetTrophies['BestDefensiveForwardPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro MVP:</td><td><input type="text" name="MVP" value="<?php echo $row_GetTrophies['MVP']; ?>" size="40" /></td>
            <td><input type="file" name="MVPPhoto" />
				<input type="hidden" name="OLD_MVPPhoto" value="<?php echo $row_GetTrophies['MVPPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Playoff MVP:</td><td><input type="text" name="PlayoffMVP" value="<?php echo $row_GetTrophies['PlayoffMVP']; ?>" size="40" /></td>
            <td><input type="file" name="PlayoffMVPPhoto" />
				<input type="hidden" name="OLD_PlayoffMVPPhoto" value="<?php echo $row_GetTrophies['PlayoffMVPPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Coach Of The Year:</td><td><input type="text" name="CoachOfTheYear" value="<?php echo $row_GetTrophies['CoachOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="CoachOfTheYearPhoto" />
				<input type="hidden" name="OLD_CoachOfTheYearPhoto" value="<?php echo $row_GetTrophies['CoachOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Defenseman Of The Year:</td><td><input type="text" name="DefensemanOfTheYear" value="<?php echo $row_GetTrophies['DefensemanOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="DefensemanOfTheYearPhoto" />
				<input type="hidden" name="OLD_DefensemanOfTheYearPhoto" value="<?php echo $row_GetTrophies['DefensemanOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Goalie Of The Year:</td><td><input type="text" name="GoalieOfTheYear" value="<?php echo $row_GetTrophies['GoalieOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="GoalieOfTheYearPhoto" />
				<input type="hidden" name="OLD_GoalieOfTheYearPhoto" value="<?php echo $row_GetTrophies['GoalieOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Pro Lowest GAA:</td><td><input type="text" name="LowestGAA" value="<?php echo $row_GetTrophies['LowestGAA']; ?>" size="40" /></td>
            <td><input type="file" name="LowestGAAPhoto" />
				<input type="hidden" name="OLD_LowestGAAPhoto" value="<?php echo $row_GetTrophies['LowestGAAPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>General Manager:</td><td><input type="text" name="GeneralManager" value="<?php echo $row_GetTrophies['GeneralManager']; ?>" size="40" /></td>
            <td><input type="file" name="GeneralManagerPhoto" />
				<input type="hidden" name="OLD_GeneralManagerPhoto" value="<?php echo $row_GetTrophies['GeneralManagerPhoto']; ?>" /></td>
        </tr>
        
        <tr>
            <td>Farm Top Scorer:</td><td><input type="text" name="FarmTopScorer" value="<?php echo $row_GetTrophies['FarmTopScorer']; ?>" size="40" /></td>
            <td><input type="file" name="FarmTopScorerPhoto" />
				<input type="hidden" name="OLD_FarmTopScorerPhoto" value="<?php echo $row_GetTrophies['FarmTopScorerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Top Goal Scorer:</td><td><input type="text" name="FarmTopGoalScorer" value="<?php echo $row_GetTrophies['FarmTopGoalScorer']; ?>" size="40" /></td>
            <td><input type="file" name="FarmTopGoalScorerPhoto" />
				<input type="hidden" name="OLD_FarmTopGoalScorerPhoto" value="<?php echo $row_GetTrophies['FarmTopGoalScorerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Most Sportsman like Player:</td><td><input type="text" name="FarmMostSportsmanlikePlayer" value="<?php echo $row_GetTrophies['FarmMostSportsmanlikePlayer']; ?>" size="40" /></td>
            <td><input type="file" name="FarmMostSportsmanlikePlayerPhoto" />
				<input type="hidden" name="OLD_FarmMostSportsmanlikePlayerPhoto" value="<?php echo $row_GetTrophies['FarmMostSportsmanlikePlayerPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Lowest PIM:</td><td><input type="text" name="FarmLowestPIM" value="<?php echo $row_GetTrophies['FarmLowestPIM']; ?>" size="40" /></td>
            <td><input type="file" name="FarmLowestPIMPhoto" />
				<input type="hidden" name="OLD_FarmLowestPIMPhoto" value="<?php echo $row_GetTrophies['FarmLowestPIMPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Rookie Of The Year:</td><td><input type="text" name="FarmRookieOfTheYear" value="<?php echo $row_GetTrophies['FarmRookieOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="FarmRookieOfTheYearPhoto" />
				<input type="hidden" name="OLD_FarmRookieOfTheYearPhoto" value="<?php echo $row_GetTrophies['FarmRookieOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Best Defensive Forward:</td><td><input type="text" name="FarmBestDefensiveForward" value="<?php echo $row_GetTrophies['FarmBestDefensiveForward']; ?>" size="40" /></td>
            <td><input type="file" name="FarmBestDefensiveForwardPhoto" />
				<input type="hidden" name="OLD_FarmBestDefensiveForwardPhoto" value="<?php echo $row_GetTrophies['FarmBestDefensiveForwardPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm MVP:</td><td><input type="text" name="FarmMVP" value="<?php echo $row_GetTrophies['FarmMVP']; ?>" size="40" /></td>
            <td><input type="file" name="FarmMVPPhoto" />
				<input type="hidden" name="OLD_FarmMVPPhoto" value="<?php echo $row_GetTrophies['FarmMVPPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Playoff MVP:</td><td><input type="text" name="FarmPlayoffMVP" value="<?php echo $row_GetTrophies['FarmPlayoffMVP']; ?>" size="40" /></td>
            <td><input type="file" name="FarmPlayoffMVPPhoto" />
				<input type="hidden" name="OLD_FarmPlayoffMVPPhoto" value="<?php echo $row_GetTrophies['FarmPlayoffMVPPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Coach Of The Year:</td><td><input type="text" name="FarmCoachOfTheYear" value="<?php echo $row_GetTrophies['FarmCoachOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="FarmCoachOfTheYearPhoto" />
				<input type="hidden" name="OLD_FarmCoachOfTheYearPhoto" value="<?php echo $row_GetTrophies['FarmCoachOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Defenseman Of The Year:</td><td><input type="text" name="FarmDefensemanOfTheYear" value="<?php echo $row_GetTrophies['FarmDefensemanOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="FarmDefensemanOfTheYearPhoto" />
				<input type="hidden" name="OLD_FarmDefensemanOfTheYearPhoto" value="<?php echo $row_GetTrophies['FarmDefensemanOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Goalie Of The Year:</td><td><input type="text" name="FarmGoalieOfTheYear" value="<?php echo $row_GetTrophies['FarmGoalieOfTheYear']; ?>" size="40" /></td>
            <td><input type="file" name="FarmGoalieOfTheYearPhoto" />
				<input type="hidden" name="OLD_FarmGoalieOfTheYearPhoto" value="<?php echo $row_GetTrophies['FarmGoalieOfTheYearPhoto']; ?>" /></td>
        </tr>
        <tr>
            <td>Farm Lowest GAA:</td><td><input type="text" name="FarmLowestGAA" value="<?php echo $row_GetTrophies['FarmLowestGAA']; ?>" size="40" /></td>
            <td><input type="file" name="FarmLowestGAAPhoto" />
				<input type="hidden" name="OLD_FarmLowestGAAPhoto" value="<?php echo $row_GetTrophies['FarmLowestGAAPhoto']; ?>" /></td>
        </tr>
<?php } while ($row_GetTrophies = mysql_fetch_assoc($GetTrophies)); ?>
<tr><td colspan=4 align="center"><input type="submit" value="Change" class="button edit"></td></tr>
<input type="hidden" name="MM_update" value="form1">
</form>    </tbody>
</table>
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
<?php include("includes/statusBar.php"); ?>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($EditGM);
?>