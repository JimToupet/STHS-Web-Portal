<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$id=mysql_real_escape_string($id);
$com=mysql_query("DELETE FROM comments WHERE ID=$id");
}
?>