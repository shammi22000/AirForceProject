<?php
include ("include_sessionU3.php");
 error_reporting(E_ALL ^ E_NOTICE);
	if($_POST['submit']=="INSERT" || !empty($_POST['submit']) || isset($_POST['submit']) )
		{
			include("../../Include_Connection.php");
			$sql="INSERT INTO committemember(comMemId, memName, memPosition, memWorkPlace, workPlaceAddress, occupation, phoneNo1, phoneNo2, email, faxNo, appoinmentDate, endDate) VALUES ('', '$_POST[memName]', '$_POST[memPosition]', '$_POST[memWorkPlace]', '$_POST[workPlaceAddress]', '$_POST[occupation]', '$_POST[phoneNo1]', '$_POST[phoneNo2]', '$_POST[email]', '$_POST[faxNo]', '$_POST[appoinmentDate]', '$_POST[endDate]')";
			if(mysql_query($sql, $conn))
			{
				$txt="1 Record Added";
			}
			else
			{
				$txt="Error".mysql_error();	
			}
		header("Location:commView.php?msg=$txt");
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
   			 <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Supplier Information Full View</h2>
     
	 		<?php
			include("../../Include_Connection.php");
			$id=$_GET['ID'];
 			$sql = "SELECT * FROM supplier WHERE supplierID='$id'";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
 			$newArray=mysql_fetch_array($result)
 			?>

 <div class="container">
<table width="600" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">
  <tr>
    	<td class="subtableheading">Company Name</td>
    	<td><?php echo $newArray['compName']; ?></td>
  </tr>
  <tr>
   		 <td class="subtableheading">Address</td>
   		 <td><?php echo $newArray['comAddress']; ?>
    </td>
  </tr>
  <tr>
    	<td  class="subtableheading">Telephone NO</td>
    	<td><?php echo $newArray[' 	TPNo1']; ?><br/><?php echo $newArray['TPNo2']; ?></td>
  </tr>
    <tr>
    	<td  class="subtableheading">Mobile No</td>
    	<td><?php echo $newArray['mobileNo']; ?></td>
  </tr>
   <tr>
    	<td  class="subtableheading">Fax No</td>
    	<td><?php echo $newArray['faxNo']; ?></td>
  </tr>
   <tr>
    	<td  class="subtableheading">Email Address</td>
    	<td><?php echo $newArray['email']; ?></td>
  </tr>
   <tr>
  		<td colspan="2" align="center" height="40">
 		  <a href="supplierEdit.php?ID=<?php echo $newArray['supplierID']; ?>"><input name="submit" type="submit" value="EDIT" /></a>
   		 <a href="supplierDelete.php?ID=<?php echo $newArray['supplierID']; ?>"><input name="submit" type="submit" value="DELETE" /></a>
  		</td>
  </tr>
</table>
</div>
<br /><br />
 
   
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
