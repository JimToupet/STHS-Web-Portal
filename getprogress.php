<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
 
if (isset($_GET['uid'])) {
 
    // Fetch the upload progress data
    $status = uploadprogress_get_info($_GET['uid']);
 
    if ($status) {
 
        // Calculate the current percentage
        echo round($status['bytes_uploaded']/$status['bytes_total']*100);
 
    }
    else {
 $uploaddir = 'File/GMLines/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $errortxt = "Congratulations, the file is valid, and was successfully uploaded.\n";
		
	
	$updateSQL = "UPDATE proteam SET LastModifiedLines='".strftime('%Y-%m-%d %H:%M:%S', strtotime('now'))."' WHERE Name='".$_SESSION['current_Team']."'";
	$Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	$insertSQL = sprintf("INSERT INTO participation (DateCreated,Team,Season_ID,Type) values (%s,%s,%s,%s)",
                       	GetSQLValueString(strftime('%Y-%m-%d', strtotime('now')), "date"),
                        GetSQLValueString($_SESSION['U_Team'], "text"),
						GetSQLValueString($_SESSION['current_SeasonID'], "int"),
						GetSQLValueString("Upload", "text"));
  	$Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

        // If there is no data, assume it's done
        echo 100;
 
    }
}
?>