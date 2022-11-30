<?php
include ("include_sessionU3.php");
include ("../../include_Connection.php");
$sql= "DELETE FROM 	committemember WHERE comMemId= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:commView.php?txt=$msg");
?>