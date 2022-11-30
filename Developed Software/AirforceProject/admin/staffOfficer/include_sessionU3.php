<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }


?>