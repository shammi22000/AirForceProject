<?php
 error_reporting(E_ALL ^ E_NOTICE);
 $conn = mysql_connect("localhost", "root", "")or die ("Server Error " . mysql_error());
 
 mysql_select_db("airforceproject",$conn) or die ("Database Error " . mysql_error()); return $conn;
  

 
?>