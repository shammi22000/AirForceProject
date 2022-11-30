
<?php
//error_reporting(o);
//session_start();
//ob_start();
include("../Include_Connection.php");

// Define $myusername,$mypassword and $level
$myusername=$_POST['UN']; 
$mypassword=$_POST['PW']; 

//if(isset($_POST['submit']))
 //{
 // header("location:index.php");
 //}

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);


//password encrypting
//$mypassword = base64_encode($mypassword);



//select from the table
$sql="SELECT * FROM login WHERE userName='$myusername' AND  password='$mypassword' AND login_Type='Admin' AND login_Status='Active'"; 
$result = mysql_query($sql);
echo "fagfghtyyg".$sql;

//pass the user id to SESSION
while($row = mysql_fetch_array($result)){
 $user = $row['userName'];
}
//$_SESSION['c_id'] = $user[0];
//$_SESSION['username'] = $_POST['UN'];
$level = $row['logGroupID'];//get the user's level

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

 if($level =='u2'){
// session_start();
 //$_SESSION['username'] = $_POST['UN'];
		//
		header('Location:staff/index.php');
 }

 else if($level =='u3'){//Direct the account to LEVEL2 user
  $_SESSION['username'] = $_POST['UN'];	   
			header('Location:staffOfficer/index.php');
 }

 else
 {//Direct the account to LEVEL3 user
  header('Location:airForceBases/index.php');
 }

 
}
else {
echo "Wrong Username or Password";
header("location:index.php");
}

ob_end_flush();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>