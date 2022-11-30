<?php

include ("../../include_Connection.php");
$sql= "DELETE FROM inquiry_Type WHERE inqTypeID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:inqTypeView.php?txt=$msg");
?>