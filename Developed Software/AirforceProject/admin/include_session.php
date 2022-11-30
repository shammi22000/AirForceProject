<?php
if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+3600) 
{
    session_destroy();
    $_SESSION = array();
	}
$_SESSION['EXPIRES'] = time() + 3600;
error_reporting(E_ALL ^ E_NOTICE);
?>
