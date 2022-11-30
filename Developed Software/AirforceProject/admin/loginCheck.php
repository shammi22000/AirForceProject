<?php

include("../Include_Connection.php");
	
//$username=""; // Mysql username 
//$password=""; // Mysql password 



// username and password sent from form 
$myusername=$_POST['UN']; 
$mypassword=$_POST['PW']; 


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//$sql="SELECT * FROM login WHERE userName='$myusername' AND  password='$mypassword' AND 	login_Type='admin' AND login_Status='active' AND IF(logGroupID='U0')

$sql="SELECT * FROM login WHERE userName='$myusername' AND  password='$mypassword' AND login_Type='Admin' AND login_Status='Active'"; 


$newArray = mysql_fetch_row($result);
$group=$newArray['logGroupID'];

if($group=='u0')
	//if($newArray=='u2')
//if (mysql_num_rows($login) == 1)
	   {
		   //$row = mysql_fetch_row($login); 
		  // $lcode = $row[1];
		  //if($lcode=="u2"){
			//Set username session variable
		session_start();
		$_SESSION['username'] = $_POST['UN'];
		//Jump to secured page
		header('Location:staff/index.php');
		}
		else if($group=='u3')
	{
			$_SESSION['username'] = $_POST['UN'];	   
			header('Location:staffOfficer/index.php');
		}		  
		else {
	//Jump to login page
		header('Location:airForceBases/index.php');
		}
	
		
//$result=mysql_query($sql);

// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
//if($count==1 ){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_start();
		

//$_SESSION['myusername']=$myusername; 
//$_SESSION['mypassword']=$mypassword;
//$_SESSION['loginType']="admin"; 

//header("location:staff/index.php");

//}
//else {
//echo "Wrong Username or Password";
//}
?>