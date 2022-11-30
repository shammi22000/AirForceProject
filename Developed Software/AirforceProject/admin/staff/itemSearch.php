<?php ?>
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
	include("include_staffMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("include_staffSubmenu2.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Search Item Detail</h2>
    
     
      <form name="SerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

      <table width="400" border="0" cellspacing="0" cellpadding="10" align="center">
<!-- //////////////////////////////Display Category List////////////////////////////// -->

      <?php
include ("../../include_Connection.php");

 $sql = "SELECT * FROM category"; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
?>
  <tr>
    <td align="right">
       <select name="SerID">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php
 }
	?>
    
    </select>
    </td>
    <td align="left"><input type="submit" name="Sersubmit" value="SELECT CATEGORY" /></td>
  </tr>
  
<!-- //////////////////////////////Display item list////////////////////////////// -->    
  <?php
if(isset($_GET['Sersubmit']))
{
	 $Id= $_GET['SerID'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item, category WHERE category.catId=item.itemCatID AND catId='$Id'"; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
?>
   <tr>
    <td align="right">
  
    <select name="itemSelecID">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['itemID']; ?>" <?php if($newArray['itemID']==$_GET['itemSelecID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['itemName']; ?> </option>
    <?php
 }
	?>
    
    </select>
   
     </td>
    <td align="left"><input type="submit" name="itemSubmit" value="SEARCH ITEM" /></td>
  <?php
}
?>     
</table>
<br/>
</form>

  <!-- //////////////////////////////Main Area Starting////////////////////////////// --> 

<?php
if(isset($_GET['itemSubmit']))
{
	 $Id1= $_GET['itemSelecID'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item WHERE itemID='$Id1'"; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
 $newArray = mysql_fetch_array($result);
?>

<table width="300" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">

 <tr>
    <td width="100" class="subtableheading">Item Name</td>
    <td><?php echo $newArray['itemName']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">UOM</td>
    <td><?php echo $newArray['UOM']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">Denomination</td>
    <td><?php echo $newArray['denomination']; ?></td>
  </tr>  <tr>
    <td class="subtableheading">Weight</td>
    <td><?php echo $newArray['weight']; ?></td>
  </tr>  
  <tr>
  <tr class="tableheading">
  <td align="center" colspan="2">
    <a href="itemEdit.php?ID=<?php echo $newArray['itemID']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="itemDelete.php?ID=<?php echo $newArray['itemID']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a></td>
  </tr>
</table>

<?php
}
?>
 <!-- //////////////////////////////Main Area Ending////////////////////////////// --> 
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
