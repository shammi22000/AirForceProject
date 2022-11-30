<?php
session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php");  }
	
		if(isset($_GET['submit']))
		{
			include ("../../include_Connection.php");
			$sql= "UPDATE station SET stationName='$_GET[txtstat1]' ,addLine1='$_GET[addLine1]', 	addLine2='$_GET[addLine2]', 	addLine3='$_GET[addLine3]', addCity='$_GET[addCity]', 	contPersonName='$_GET[contPersonName]', phoneNo1='$_GET[phoneNo1]', phoneNo2='$_GET[phoneNo2]', email='$_GET[email]', 	fax='$_GET[fax]', currDay='$_GET[purtodayDate]' WHERE stationId='$_GET[ID]'";
	
			if (!mysql_query($sql,$conn))
				{
	  				$msg="Error: ". mysql_error();
				}
			else
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Successfully edited record!')
					</SCRIPT>");
			}
		header("Location:baseDetailMgt.php?txt=$msg");
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
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
   	 	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
 		<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
				<?php
				include("include_BaseMainmenu.php");
				?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 
	 	</td>
  </tr>
  <tr>
   	 	<td width="200" valign="top">
  	 	<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_BaseSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 
		</td>
    	<td width="790" valign="top" align="center" bgcolor="#FFFFCC"><h3 class="pageHeading">Air Force Bases Detail Edit Page</h3>
      

<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
         
 			<?php //Display Base Details=======================================
				$Id= $_GET['ID'];
				include("../../Include_Connection.php");
				$sql = "SELECT * FROM station WHERE stationId='$Id'";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				$newArray = mysql_fetch_array($result);
 			?>
  
<div class="container">
<table width="500" border="1" bordercolor="#666666" cellspacing="2" cellpadding="10" >
   <tr>
 		<td class="subtableheading">Date</td>
 		<td><p><?php $today = date("F j, Y, g:i a"); echo  $today; ?></p> </td>
  </tr>
  <tr>
   	 	<td align="right" class="subtableheading">Station Name</td>
    	<td><input name="txtstat1" type="text" value="<?php echo $newArray['stationName']; ?>"/></td>
  </tr>
  <tr>
   		 <td align="right" class="subtableheading">Addresss</td>
      	<td>
      		<input name="txtadd1" type="text" value="<?php echo $newArray['addLine1']; ?>" />,&nbsp;
      		<input name="txtadd2" type="text" value="<?php echo $newArray['addLine2']; ?>" /><br/>
      		 <input name="txtadd3" type="text" value="<?php echo $newArray['addLine3']; ?>" />,&nbsp; 
      		<input name="txtadd4" type="text" value="<?php echo $newArray['addCity']; ?>" />
      	</td>
  </tr>
  <tr>
  		<td align="right" class="subtableheading">Contact Person</td>
    	<td><input name="txtcon" type="text" value="<?php echo $newArray['contPersonName']; ?>" /></td>
  </tr>
  <tr>
  		<td align="right" class="subtableheading">Telephone</td>
   		 <td><input name="txtTel1" type="text" value="<?php echo $newArray['phoneNo1']; ?>" /><br/><input name="txtTel2" type="text" value="<?php echo $newArray['phoneNo2']; ?>" /></td>
  </tr>
  <tr>
  		<td align="right" class="subtableheading">Email </td>
   		 <td><input name="txtEmail" type="text" value="<?php echo $newArray['email']; ?>" /></td>
  </tr>
  <tr>
  		<td align="right" class="subtableheading">Fax </td>
    	<td><input name="txtFax" type="text" value="<?php echo $newArray['fax']; ?>" /></td>
  </tr>
  <tr>
    	<td colspan="2" align="center">
        <input name="submit" type="submit" value="Update" />&nbsp;&nbsp;
        <input name="cancel" type="reset" value="Cancel" />
       <input name="purtodayDate" id="purtodayDate" type="hidden" value="<?php echo $today; ?> " /></td>
    	
  </tr>
</table>
 </div>
 <br/>
            
</form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

         </td>
    </tr>
  	<tr>
    	<td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
