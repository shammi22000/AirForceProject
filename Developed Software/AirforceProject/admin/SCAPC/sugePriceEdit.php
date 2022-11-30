<?php
session_start(); 
	if(!isset($_SESSION['user5']) || (empty($_SESSION['user5'])))
		{ 	header("Location:../login.php");	 }
 error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']))
{
	include("../../Include_Connection.php");

	$sql="UPDATE  scapcsuggest SET SCAPCprice ='$_GET[price]' WHERE sugePriceId='$_GET[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		echo "1 Record Edited";
	}
	else
	
	{
	echo "Error".mysql_error();	
	}
	
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
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109" /></td>
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
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_sugePriceMenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("include_SCAPCSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>
    SCAPC suggested prices Edit page</h2>
      <?php

include ("../../include_Connection.php");
 $id=$_GET['ID'];
$sql = "SELECT * FROM item, scapcsuggest WHERE (item.itemID= scapcsuggest.sugeItemID AND sugePriceId='$id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 ?>
      <form name="form1" method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       
 <div class="container">
          <table width="300" border="1" cellspacing="0" cellpadding="15" align="center" class="subtable">
  
   <tr>
    <td width="100" class="subtableheading">Item Name</td>
    <td>
   <?php echo $newArray['itemName']; ?>
    </td>
  </tr>
  <tr>
    <td class="subtableheading">UOM</td>
    <td><?php echo $newArray['UOM']; ?>
    </td>
  </tr>
  <tr>
    <td  class="subtableheading">Denomination</td>
    <td>
   <?php echo $newArray['denomination']; ?> 
    </td>
  </tr>
      <tr>
    <td  class="subtableheading">Weight</td>
    <td>
    <?php echo $newArray['weight']; ?>
    </td>
  </tr>
  
   <tr>
    <td  class="subtableheading">Suggested Price (Rs)</td>
    <td>
   <input name="price" type="text" value="<?php echo $newArray['SCAPCprice']; ?>" />
    </td>
  </tr>
  
    
  <tr >
  <td colspan="2" align="center" height="40" >
  <input type="submit" name="submit" value="UPDATE" />&nbsp;
  <input type="reset" name="reset" value="CLEAR" />
  <input type="hidden" name="ID" value="<?php echo  $id;?>" />
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
