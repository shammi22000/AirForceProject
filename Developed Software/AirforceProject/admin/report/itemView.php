<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<h2 align="center">Report of Item Information</h2>
      <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['../admin/staff/PHP_SELF'];?>">
      
        <?php
		error_reporting(E_ALL ^ E_NOTICE);
	include("../Include_Connection.php");
	 $sql = "SELECT * FROM item, category WHERE category.catId=item.	itemCatID";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
 		?>   
     
     <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="30" width="60">No</td>
    <td>Item Name</td>
     <td >Category</td>
     <td width="80">Weight</td>
    <td width="50">UOM</td>
    <td width="50">Denomination</td>
    
   
   </tr>
 <?php
 $b=0;
 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	 $b++;
		
	?>
 <tr>
    <td height="30"><?php echo $b; ?></td>
    <td><?php echo $newArray['itemName']; ?></td>
    <td><?php echo $newArray['catName']; ?></td>
    <td><?php echo $newArray['weight']; ?></td>
    <td><?php echo $newArray['UOM']; ?></td>
    <td><?php echo $newArray['denomination']; ?>  </td>
   	
   	
    
    
	
		
    
	
  </tr>
 
 <?php

 }
?>
</table>
 </div>
 </form>
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
