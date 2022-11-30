<?php
if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )

{
	include("../../Include_Connection.php");
	$sql="INSERT INTO supplier(supplierID, compName, comAddress, TPNo1, TPNo2, mobileNo, faxNo, email) VALUES ('', '$_GET[comName]', '$_GET[add]', '$_GET[tp1]', '$_GET[tp2]', '$_GET[mobile]', '$_GET[fax]', '$_GET[mail]') ";
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:supplierView.php?msg=$txt");
}
?>

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
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Insert Supplier Information</h2>
     
     <form name="form1" method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       <table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
 
     <tr>
    <td colspan="2"><?php
			
				 if(isset($_REQEST['msg']))
				{
				 echo "successfully submitted the Apllication";
			     }
			 ?></td>
    
  </tr>
   <tr>
    <td width="100" class="subtableheading">Company Name</td>
    <td>
    <input type="text" name="comName" />
    </td>
  </tr>
  <tr>
    <td class="subtableheading">Address</td>
    <td><input type="text" name="add" />
    </td>
  </tr>
  <tr>
    <td  class="subtableheading">Telephone No</td>
    <td>
    <input type="text" name="tp1" />
    <input type="text" name="tp2" />
    </td>
  </tr>
    <tr>
    <td  class="subtableheading">Mobile No</td>
    <td>
    <input type="text" name="mobile"  />
    </td>
  </tr>
      <tr>
    <td  class="subtableheading">Fax No</td>
    <td><input type="text" name="fax"  /></td>
  </tr>
  
   <tr>
    <td  class="subtableheading">Email</td>
    <td><input type="text" name="mail" /></td>
  </tr>
  
    <tr class="tableheading">
  <td colspan="2" align="center" height="40">
  <input type="submit" name="submit" value="INSERT" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
  </td>
  </tr>
</table>
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
