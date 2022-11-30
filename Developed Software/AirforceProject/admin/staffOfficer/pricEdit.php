<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
{
	include("../../Include_Connection.php");

$sql="UPDATE price SET brandName='$_POST[BN]', isRetail='$_POST[priceBahav]', price='$_POST[price]', source='$_POST[source]' WHERE priceId='$_POST[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Edited";
	}
	else
	
	{
		$txt="Error".mysql_error();	
	}
	header("Location:priceView.php?msg=$txt");
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
    <td width="790" height="450"valign="top" align="center" bgcolor="#FFFFFF"><h2>Price Edit Page </h2>
    
      <form id="form1" name="form1" method="post" >
      
             
     <div class="container">
          <table width="300" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">
  <?php
		include("../../Include_Connection.php");
		$id=$_GET['ID'];
 		$sql = "SELECT * FROM item, price WHERE item.itemID=price.priceItemID AND priceId='$id'";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
		$newArray = mysql_fetch_array($result)
 		?>
   <tr>
   <td class="subtableheading">Item</td>
   <td align="left"><?php echo $newArray['itemName']; ?>(<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>)-<?php echo $newArray['denomination']; ?>
     	</td>
  </tr>
  <tr>
    <td class="subtableheading">Source</td>
    <td><input type="text" name="source" value="<?php echo $newArray['source']; ?>" />
    </td>
  </tr>
  <tr>
    <td class="subtableheading">Brand Name</td>
    <td><input type="text" name="BN" value="<?php echo $newArray['brandName']; ?>" />
    </td>
  </tr>
   <tr>
    <td class="subtableheading">Price Behavior</td>
    <td>
    <select name="priceBahav">
    <option value="Retail">Retail</option>
     <option value="Wholesale">Wholesale</option>
    </select>
    </td>
    
  </tr>
  <tr>
    <td  class="subtableheading">Price </td>
    <td>
    <input type="text" name="price" value="<?php echo $newArray['price']; ?> " />
    </td>
  </tr>
  
  
  <tr >
  <td colspan="2" align="center" height="40" >
  <input type="submit" name="submit" value="UPDATE" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
  <input type="hidden" name="ID" value="<?php echo $newArray['priceId']; ?>" />
  </td>
  </tr>
</table>
        </div>
  </form>
   
  </td>
  </tr>
  <tr>
    	
        
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
