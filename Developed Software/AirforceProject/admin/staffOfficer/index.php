<?php 
include ("include_sessionU3.php");
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
  <tr >
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
    		<td width="790" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>New User Details</h2>
     
<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <?php
		include("../../Include_Connection.php");
		 $sql = "SELECT * FROM login WHERE (login_Type='user' AND userGroup='u0' AND login_Status='disable')";
		 // execute the SQL statement
		 $result = mysql_query($sql, $conn) or die(mysql_error());
 		//go through each row in the result set and display data
 		?>
 <div class="container">
<table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    	<td height="40" width="60">No</td>
   		 <td>Name</td>
   		 <td width="100">User Name</td>
   		 <td width="80">User Type</td>
         <td width="80">Login Group</td>
    	<td width="80" >Status</td>
    	<td width="100" >Action</td>
  </tr>
		 <?php
	 	//go through each row in the result set and display data
 		$b=0;
		while ($newArray = mysql_fetch_array($result)) 
		 {$b++;
		?>
 <tr class="tabletxt">
    <td height="30"><?php echo $b; ?></td>
    <td><?php echo $newArray['name']; ?></td>
    <td><?php echo $newArray['userName']; ?></td>
    <td><?php echo $newArray['login_Type']; ?></td>
    <td><?php echo $newArray['userGroup']; ?></td>
    <td><?php echo $newArray['login_Status']; ?></td>
     <td align="center">
    <a href="loginEdit.php?ID=<?php echo $newArray['login_Id']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="loginDelete.php?ID=<?php echo $newArray['login_Id']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
    </td> 
</tr>	
 		<?php
 		}
		 ?>
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
