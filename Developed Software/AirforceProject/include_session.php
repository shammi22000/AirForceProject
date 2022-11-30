<?php
session_start();
if(!isset($_SESSION['bidder']) || (empty($_SESSION['bidder'])))
{
	header("Location:register.php");
	 }
else 
{
	echo $_SESSION['user'];
	}


if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+3600) 
{
    session_destroy();
    $_SESSION = array();
	}
$_SESSION['EXPIRES'] = time() + 3600;
?>

