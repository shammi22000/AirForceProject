<?php
//include("../admin/include_session.php");
include ("../include_Connection.php");

$sql= "DELETE FROM 	experience WHERE expID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:appForm2View.php?txt=$msg");
?>