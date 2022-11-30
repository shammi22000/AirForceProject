<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../Include_Connection.php");
   if(isset($_POST['submit']) || $_POST['submit']=="login")
   {
  	$myusername=$_POST['UN']; 
	$mypassword=$_POST['PW'];
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
 
   $sql=mysql_query("select userName, password,userGroup  from login where MD5(userName) = '".md5($myusername)."' and MD5(password)='".md5($mypassword)."'");
   $selfetch=mysql_fetch_array($sql);
   $count=mysql_num_rows($sql);
   if($count>0){
	  	$groupSelect=$selfetch['userGroup'];
		$_SESSION['group']=$groupSelect;
		if($groupSelect=='u2')
		 	{
			$sessionName=$selfetch['userName'];
	 		$_SESSION['user2']=$sessionName;
	  		header('Location:staff/index.php');
    	 	}
	 	else if($groupSelect=='u3')
			{
			 $sessionName=$selfetch['userName'];
	 		 $_SESSION['user3']=$sessionName;
	  		 header('Location:staffOfficer/index.php'); 
		 	}
   		else if($groupSelect=='u4')
   			{
			$sessionName=$selfetch['userName'];
	 		$_SESSION['user4']=$sessionName;
	    	header('Location:airForceBases/index.php'); 
   			}
		else if ($groupSelect=='u5')
			{
			$sessionName=$selfetch['userName'];
	 		$_SESSION['user5']=$sessionName;
	  		header('Location:TEC/index.php'); 
			}
			else if ($groupSelect=='u6')
			{
			$sessionName=$selfetch['userName'];
	 		$_SESSION['user6']=$sessionName;
	  		header('Location:SCAPC/index.php'); 
			}
		}
		
	else
	{
		header("location:index.php?msg1");
	 }
	
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validcheck()
{
 if(document.form1.UN.value=="")
 {
  alert("Enter UserName ");
  document.form1.UN.focus();
  return false; 
 }
 if(document.form1.PW.value=="")
 {
  alert("Enter Password");
  document.form1.PW.focus();
  return false;
 }
}
</script>

</head>

<body>
<table width="990" height="600" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="109"></td>
  </tr>
 
  <tr>
      <td width="990" valign="top" align="center" bgcolor=#E4E4E4>
         <h2>Admin Login Page</h2>
    	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td>
        <div class="container">
  		<div class="login-box">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%" align="center" class="text-style2"><img src="../images/login-icon.jpg" width="57" height="44" /><br />
              Login</td>
            <td id="seperater-vertical"> 
            
            <form name="form1" method="post" onsubmit="return validcheck()">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><span class="red">
            <?php
			
				 if(isset($_REQUEST['msg1']))
				{
				 echo "<span style='font-size:10px; color:#FF0000;' >User Name and Password is InCorrect</span>";
			     }
			 ?>
          </span> </td>
                </tr>
                <tr>
                  <td class="text-style1">Login Name</td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td>
                  
                  </td>
                </tr>
                <tr>
                  <td><label for="textfield2"></label>
                    <input name="UN" type="text"  class="text-box" id="UN" size="30"  /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="text-style1">Password</td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td><label for="textfield5"></label>
                    <input name="PW" type="password" class="text-box" id="PW"  size="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><input type="submit" name="submit" id="submit" value="login"  /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table>
        </div>
</div>
        
   
    </td>
   </tr>
   </table>
   </td>
   </tr>
  <tr>
    	<td colspan="3" align="center" class="copyr" height="30"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
