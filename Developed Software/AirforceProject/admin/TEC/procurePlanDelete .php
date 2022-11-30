<?php
include ("../../include_Connection.php");
$sql= "DELETE FROM 	activity WHERE activityID='$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:procurePlanView.php?txt=$msg");
?>