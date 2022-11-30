<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }
	if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
	{
		include("../../Include_Connection.php");
		$sql="UPDATE committemember SET memName='$_POST[name]', memPosition='$_POST[position]', memWorkPlace='$_POST[workPlace]', workPlaceAddress='$_POST[address]', occupation='$_POST[occupa]', phoneNo1='$_POST[tp1]', phoneNo2='$_POST[tp2]',email='$_POST[mail]', faxNo='$_POST[fax]', appoinmentDate='$_POST[appDate]', endDate='$_POST[endDate]' WHERE comMemId='$_POST[ID]'";
		if(mysql_query($sql, $conn))
		{
			$txt="1 Record Edited";
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
<img src="../../images/new.jpg" width="990" height="109" />
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      	<td  colspan="3"  height="109" bgcolor="#000000">&nbsp;</td>
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
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>Edit Committee Member Information</h2>
    		 <?php
			include("../../Include_Connection.php");
			$id=$_GET['ID'];
 			$sql = "SELECT * FROM committemember WHERE comMemId='$id'";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
 			$newArray=mysql_fetch_array($result)
 			?>
<!-- /////////////////////////////Form1 starting////////////////////////////// -->        
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       
<div class="container">
<table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
   <tr>
    	<td width="100" class="subtableheading">Name</td>
   		<td><input type="text" name="name" value="<?php echo $newArray['memName']; ?>" /></td>
  </tr>
  <tr>
    	<td class="subtableheading">Position</td>
    	<td><input type="text" name="position" value="<?php echo $newArray['memPosition']; ?>" />
   		 </td>
  </tr>
  <tr>
    	<td  class="subtableheading">Work Place</td>
   		 <td><input type="text" name="workPlace" value="<?php echo $newArray['memPosition']; ?>" /></td>
   </tr>		 
   <tr> 
  	   <td  class="subtableheading">Address</td>
   		 <td><input type="text" name="address" value="<?php echo $newArray['workPlaceAddress']; ?>" /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Occupation</td>
    	<td><input type="text" name="occupa" value="<?php echo $newArray['occupation']; ?>" /> </td>
  </tr>
  <tr>
    	<td  class="subtableheading">Telephone No</td>
    	<td><input type="text" name="tp1" value="<?php echo $newArray['phoneNo1']; ?>" /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Mobile No</td>
    	<td><input type="text" name="tp2" value="<?php echo $newArray['phoneNo2']; ?>" /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Email</td>
   		 <td><input type="text" name="mail" value="<?php echo $newArray['email']; ?>" /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Fax No</td>
   		 <td><input type="text" name="fax" value="<?php echo $newArray['faxNo']; ?>" /> </td>
  </tr>
  <tr>
    	<td  class="subtableheading">Appoinment Date</td>
    	<td><input type="text" name="appDate" value="<?php echo $newArray['appoinmentDate']; ?>" /></td>
  </tr>
  <tr>
   		 <td  class="subtableheading">End Date</td>
    	<td><input type="text" name="endDate" value="<?php echo $newArray['endDate']; ?>" /></td>
  </tr>
  <tr>
  		<td colspan="2" align="center" height="40" >
  		<input type="submit" name="submit" value="UPDATE" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
 		 <input type="hidden" name="ID" value="<?php echo $newArray['comMemId']; ?>" />
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
