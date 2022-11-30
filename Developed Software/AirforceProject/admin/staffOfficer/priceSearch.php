<?php session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }?>
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
    <td width="790" height="450"valign="top" align="center" bgcolor="#FFFFFF"><h2>Price View Page </h2>
    
      <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
             
     <div class="container">
 <table width="500" border="0" cellpadding="5">
     <tr>
    	<td>Date</td>
    	<td><p>
		<?php
		$today=date("F j,Y");
		echo $today;
		?></p>
 		</td>
 	 </tr> 
     
     <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM sources";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     
     <tr>
   	 	<td><p>Source name</p></td>
    	<td><select name="seleSource">
		<option>Select Source</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['sourceID']; ?>" <?php if($newArray['sourceID']==$_GET['seleSource']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['sourceName']; ?> </option>
                  
 	 	
		<?php }  ?> 
        </select>
        </td>
  	</tr>
   		<?php
		include("../../Include_Connection.php");
 		$sql = "SELECT * FROM category ";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
 		?>
  <tr>
    <td><p>Category Name</p></td>
    <td><select name="seleCategory">
      	
	<option>Select Category</option>	
<?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php
 }
	?>
    </select>

        <input type="submit" name="Sersubmit" value="View List" />
        </td>
        
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2">
    <?php
if(isset($_GET['Sersubmit']))
{
	
 $Id= $_GET['seleCategory'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item,price,sources,category WHERE (category.catId=item.itemCatID and item.itemID =price.priceItemID and price.priceSourceId=sources.sourceID and catId='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 if($newArray) {
	 echo "<h2 class='MainHeading'></h2>";
 ?>
 
<table width="600" border="1" cellpadding="10" align="center" class="subtable">
       <tr align="center" class="subtableheading">
   		
         <td width="50">Item No</td>
    	 <td width="200">Item </td>
          <td width="150">Source</td>
           <td width="150">Price(Rs)</td>
    	 <td width="150">Price Behavior</td>
        
 	 </tr>
     	
 	 <?php
   $a=1;
 while ($newArray = mysql_fetch_array($result))
 {
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    
    	<td align="center">
			<?php echo $newArray['itemID']; ?>
     	</td>
     	<td align="left">
		 	<?php echo $newArray['item']; ?>(<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>)-<?php echo $newArray['denomination']; ?>
     	</td>
        <td align="center">
			<?php echo $newArray['sourceName']; ?>
     	</td>
        <td align="center">
			<?php echo $newArray['isRetail']; ?>
     	</td>
        <td align="center">
			<?php echo $newArray['price']; ?>
     	</td>
     <?PHP  $a++; } ?>
     
    	
  </tr>
	
    	
  </table>
   
  </td>
  </tr>
  <tr>
    	
        <td align="center" colspan="5">
    <a href="costEdit.php?ID=<?php echo $newArray['priceId']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="costDelete.php?ID=<?php echo $newArray['priceId']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
    </td> 
    	
  	</tr>
    <?php
 }
 else { echo "<h3>"."No Data"."</h3>"; }
mysql_close($conn);
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
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
