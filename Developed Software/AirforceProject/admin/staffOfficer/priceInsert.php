<?
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }
error_reporting(E_ALL ^ E_NOTICE);
if($_POST['submit']=="Insert"){
 $sql  = "INSERT INTO price (priceId,price) VALUES ";
 foreach($_POST['Price'] as $key=>$value){
 $sql .= "(";
 $sql .= $key.",".$value;
 $sql .= "),";
 }
 echo $sql;
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
    <td width="790" height="450"valign="top" align="center" bgcolor="#FFFFFF"><h2>Price Insert Page </h2>
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="post" action="<?php $_SERVER['PHP_SELF']?>">

 <table width="500" border="0" cellpadding="5">
           <?php
	 			include("../../Include_Connection.php");
 				$sql = "SELECT * FROM category ";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
 			?>
  <tr>
    	<td><p>Category Name</p></td>
    	<td><select name="serCategory">
      		<?php  
			while ($newArray = mysql_fetch_array($result)) 
 			{
			?>
    		<option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_POST['serCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    		<?php
 			}
			?>
    		</select>&nbsp;
        	<input type="submit" name="selecat" value="View List" />
         
        </td>
        
  </tr>
  		
  <tr>
    	<td><p>Item Name</p></td>
    	<td><select name="serItem">
     		<?php
	 			if(isset($_POST['selecat']))
				{
	 			$Id= $_POST['serCategory'];
				include("../../Include_Connection.php");
 				$sql = "SELECT * FROM item, category WHERE category.catId=item.itemCatID AND catId='$Id' ";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
 			?> 	
			<option>Select Item</option>	
			<?php  
			while ($newArray = mysql_fetch_array($result)) 
 			{
			?>
   			 <option value="<?php echo $newArray['itemID']; ?>" <?php if($newArray['itemID']==$_POST['serItem']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['itemName']; ?> </option>
   			 <?php
 			}
			?>
    		</select>
        	<input type="submit" name="seleItem" value="View List" /> 
          	<?php }?>
         </td>
        
  </tr>
</table> 
</form> 
    <?php
if(isset($_POST['seleItem']))
{
	
 $itId= $_POST['serItem'];
include ("../../include_Connection.php");

$sql = "SELECT * FROM item, category WHERE category.catId=item.itemCatID AND itemID='$itId'"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 ?>

<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form2"  method="post" action="<?php $_SERVER['PHP_SELF']?>">

<div class="container"> 
<table width="550" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" class="subtableheading">
   		  
    	 <td width="200">Item </td>
         <td><input name="cateID" type="hidden" value=" <?php echo $newArray['catId']; ?>" />
         <input name="itemID" type="hidden" value=" <?php echo $newArray['itemID']; ?>" />
		 <?php echo $newArray['itemName']; ?>(<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>)-<?php echo $newArray['denomination']; ?></td>
        </tr>
        <tr>
         <td>Brand Name</td>
    	 <td><input name="bName" type="text" /></td>
       </tr>
       <tr>
         <td>Price Behavior</td>
    	 <td><select name="priceBehavior">
      		<option  value="Retail" selected="selected">Retail</option>
   			 <option  value="Wholesale" selected="selected">Wholesale</option>
   			 </select>
             </td>
      </tr>
 	 <tr>
         <td>Price(Rs)</td>
    	 <td><input name="Price[<?php echo $newArray['itemID']; ?>]" type="text" /></td>
      </tr>
      <tr>
         <td>Source</td>
    	 <td><input name="priSource" type="text" /></td>
          </tr>
          <tr>
         <td>Date</td>
    	 <td><input name="date" type="text" value="<?php $today = date("m/d/y");  echo $today;?>" /></td>
      </tr>
        <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="Insert" />&nbsp;&nbsp;<input name="reset" type="button" value="Cancel" /></td>
          </tr>	
          
             	
  </table>
   <?php }?>
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
