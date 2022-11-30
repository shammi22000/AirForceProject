<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }

 	error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']))
		{include("../../Include_Connection.php");
		$sql="UPDATE login SET 	name='$_GET[name]', userName='$_GET[un]', login_Type='$_GET[logtype]', userGroup='$_GET[uGroup]', login_Status='$_GET[status]' WHERE login_Id='$_GET[ID]'";
	
	
			if(mysql_query($sql, $conn))
			{
				$txt="1 Record Edited";
	
			}
			else
	
			{
				$txt="Error".mysql_error();	
			}
		header("Location:loginView.php?msg=$txt");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
     	 <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
		<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
			<?php
			include("../../include_Mainmenu.php");
			?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 
        </td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

			<?php
			include("includeOfficerSubmenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
   		 <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>Edit Login Information</h2>
			<?php
			include("../../Include_Connection.php");
			$id=$_GET['ID'];
			$sql = "SELECT * FROM login WHERE login_Id='$id'";
 			$result = mysql_query($sql, $conn) or die(mysql_error());
			$newArray=mysql_fetch_array($result)
	 		?>
            
  <!-- ///////////////Start Form 1//////////////////////////////////////// --> 
    
<form name="form1" method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
<div class="container">
<table width="300" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">
  
   <tr>
   	 	<td width="100" class="subtableheading">Name</td>
   	 	<td>
    	<input type="text" name="name" value="<?php echo $newArray['name']; ?>" size="45" />
    	</td>
  </tr>
  <tr>
    	<td class="subtableheading">Username</td>
   		 <td><input type="text" name="un" value="<?php echo $newArray['userName']; ?>" /></td>
  </tr>
  <tr>
    	<td class="subtableheading">User Type</td>
   		 <td>
   			 <select name="logtype">
   			 <option value="admin">Admin</option>
    		 <option value="user">User</option>
    		</select>
    	</td>
    
 </tr>
 <tr>
   		 <td align="left" class="subtableheading">User Group</td>
   		 <td>
   			 <select name="uGroup">
   			 <option value="u0">Bidder</option>
    		<option value="u1">Pre-qualified Bidder</option>
            <option value="u2">Air Force Bases</option>
            <option value="u3">Staff</option>
            <option value="u4">Staff Officer</option>
            <option value="u5">TEC</option>
             <option value="u6">SCAPC</option>
    		</select>
   		 </td>
  </tr>
 <tr>
   		 <td align="left" class="subtableheading">Status</td>
   		 <td>
   			 <select name="status">
   			 <option value="active">Active</option>
    		<option value="disable">Disable</option>
    		</select>
   		 </td>
  </tr>
  <tr>
  		<td colspan="2" align="center" height="40" >
 		 <input type="submit" name="submit" value="UPDATE" />&nbsp;
         <a href="loginNewUser.php"><input type="reset" name="reset" value="CANCEL" /></a>
 		 <input type="hidden" name="ID" value="<?php echo $newArray['login_Id']; ?>" />
 		 </td>
 	 </tr>
</table>
</div>
</form>
    		</td>

   </tr>
  <tr>
   		 <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
