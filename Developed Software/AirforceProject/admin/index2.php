<?php ob_start();session_start();
 // include("include/config.php");
   if(isset($_GET['submit']) || $_GET['submit']=="LOGIN")
   {
  	$myusername=$_POST['UN']; 
	$mypassword=$_POST['PW']; 
   $sql=mysql_query("select * from login userName='$myusername' AND  password='$mypassword'");
   $selfetch=mysql_fetch_array($sql);
   
  if($selfetch['logGroupID']=="u2")
   {echo "Welcome to this page";
	   //$sessionid=$selfetch['userName'];
   //$_SESSION['sesidval']=$sessionid;
   //$count=mysql_num_rows($sel);
   //if($count>0)
   //{
      //$ipaddress=$_SERVER['REMOTE_ADDR'];
	  //$updateip=mysql_query("update register set loginstatus='1' where regi_id='$sessionid'");
        //header('Location:PQbidder/index.php');
     }
   else
   {
      header("location:adminLogin.php?msg1");
   }
   }


//if(isset($_GET['submit']) || $_GET['submit']=="LOGIN")
//{
	//$uname=$_GET['un'];
	//$pword=$_GET['pw'];
	//include ("include_Connection.php");
	//$sql = "SELECT * FROM login WHERE userName=\"$uname\" and password=\"$pword\""; 
	//$result = mysql_query($sql, $conn) or die(mysql_error());
	//$newArray = mysql_fetch_array($result);
	//if($newArray)
	//{
		//session_start();
		//$_SESSION['username']=$newArray['userName'];
		//$_SESSION['LType'] = $newArray['login_Type'];
		//header("Location:admin/staffOfficer/officerHome.php");
	//}
	//else
	//{
		$txt = "Wrong User name & Pass Word!!!";
	//}

//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validcheck()
{
 if(document.jtest.userName.value=="")
 {
  alert("Enter the UserName");
  document.jtest.userName.focus();
  return false;
 }
 if(document.jtest.password.value=="")
 {
  alert("Enter the Password");
  document.jtest.password.focus();
  return false;
 }
}
</script>
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor=#E4E4E4>
    <h2>Admin Login Page</h2>
    
    <div class="container">
  <div class="login-box">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%" align="center" class="text-style2"><img src="images/login-icon.jpg" width="57" height="44" /><br />
              Login</td>
            <td id="seperater-vertical">
           <form name="login" method="post" onsubmit="return validcheck()">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td> <?php
			
				 if(isset($_POST['msg1']))
				{
				 echo "User Name and Password is InCorrect";
			     }
			 ?></td>
                </tr>
                <tr>
                  <td class="text-style1">Login Name</td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td>
                    <input name="un" type="text" / class="text-box" id="un" size="30" /></td>
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
                  <td>
                    <input name="pw" type="password" class="text-box" id="pw" size="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><input type="submit" name="submit" value="LOGIN" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table></div></td>
      </tr>
      <tr>
        <td height="30" class="bg-style1"><a href="£">Forgotten Password?</a></td>
      </tr>
    </table>
  </div>
</div>
    
    
    
    </td>

   </tr>
  <tr>
    <td colspan="3" align="center" class="copyr"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
