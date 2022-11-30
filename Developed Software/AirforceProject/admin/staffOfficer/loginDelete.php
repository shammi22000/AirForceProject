<?php
include ("include_sessionU3.php");
include ("../../include_Connection.php");
$sql= "DELETE FROM login WHERE login_Id= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:loginView.php?txt=$msg");
?>