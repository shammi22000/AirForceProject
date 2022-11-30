<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	if(isset($_POST['submit']) || !empty($_POST['submit']) || ($_POST['submit']=="login"))
	{
	//Initialize session
	session_start();
	//Include database connection settings
	include("../Include_Connection.php");

	$login = mysql_query("SELECT * FROM login WHERE (userName='". mysql_real_escape_string($_POST['UN']) ."') and (password= '" . mysql_real_escape_string(md5($_POST['PW'])) ."')") or die ('Connection Error'. mysql_error($con));																																											
	//echo "SELECT * FROM user_login WHERE (username='". mysql_real_escape_string($_POST['un']) ."') and (password = '" . mysql_real_escape_string(md5($_POST['pw'])) ."')";
	//Check username, password and level match
	
	// function getUserLevel($user_id) { $result = mysql_query('SELECT user_level FROM table WHERE id="{$user_id}"'); if ($result) { while ($row = mysql_fetch_assoc($result)) { return $row['user_level']; } return null; } 
	
	
	
	
		if (mysql_num_rows($login) == 1)
	    {
		   $row = mysql_fetch_row($login); 
		   $lcode = $row[1];
		  if($lcode=="u2"){
			//Set username session variable
		$_SESSION['username'] = $_POST['UN'];
		//Jump to secured page
		header('Location:staff/index.php');
		}
		else if($lcode=="L3")
		{
			$_SESSION['username'] = $_POST['UN'];	   
			header('Location:staffOfficer/index.php');
		}		  
		else {
	//Jump to login page
		header('Location:airForceBases/index.php');
		}
	}
	}	?>

<body>
</body>
</html>