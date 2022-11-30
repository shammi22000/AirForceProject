<?php
include ("include_sessionU3.php");
include ("../../include_Connection.php");
$sql= "DELETE FROM 	supplier WHERE supplierID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:supplierView.php?txt=$msg");
?>