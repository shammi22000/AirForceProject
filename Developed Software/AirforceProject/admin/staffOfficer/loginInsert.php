<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }

	if(isset($_GET['submit']))
		{
			include ("../../include_Connection.php");
			$sql= "INSERT INTO login (login_Id, name, userName, password, login_Type, userGroup, login_Status) VALUES (' ',  '$_GET[name]', '$_GET[un]', '$_GET[pw]', '$_GET[type]', '$_GET[uGroup]', '$_GET[status]')";
	
			if (!mysql_query($sql,$conn))
			{
	  			$msg="Error: ". mysql_error();
			}
			else
			{
				$msg= "1 Record Added";
			}
		header("Location:loginView.php?txt=$msg");
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
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2>Insert Login Details</h2>
     
<form name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="container">
<table width="300" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">
  <tr>
    	<td width="100" class="subtableheading">Name</td>
   		 <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    	<td class="subtableheading">User Name</td>
    	<td><input type="text" name="un" /></td>
  </tr>
  <tr>
    	<td class="subtableheading">Pass Word</td>
    	<td><input type="password" name="pw" /></td>
  </tr>
  <tr>
    	<td class="subtableheading">Type</td>
    	<td><select name="type">
    		<option value="Admin">Admin</option>
    		<option value="User">User</option>
    		</select></td>
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
    	<td class="subtableheading">Status</td>
   		 <td><select name="status">
    		<option value="Active">Active</option>
    		<option value="Disable">Disable</option>
    		</select>
            </td>
  </tr>
  <tr>
  		<td colspan="2" align="center" height="40">
 		 <input type="submit" name="submit" value="INSERT" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
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
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
