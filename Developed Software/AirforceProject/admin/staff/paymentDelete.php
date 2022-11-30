<?php
include ("../../include_Connection.php");

$sql= "DELETE FROM 	paymentvoucher WHERE payVouID= '$_GET[ID]' "; 
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Deleted";
	}
header("Location:paymentView.php?txt=$msg");
?>