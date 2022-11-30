<?php

include("../include_session.php");

include ("../../include_Connection.php");
$sql= "DELETE FROM 	category WHERE catID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:categoryView.php?txt=$msg");
?>