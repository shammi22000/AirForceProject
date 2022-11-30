<?php
//include("../admin/include_session.php");
include ("../include_Connection.php");

$sql= "DELETE FROM 	 bank WHERE  bankID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:appForm31View.php?txt=$msg");
?>