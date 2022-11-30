
<?php
 error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit']))
{
	include("../../Include_Connection.php");
$CatId=$_GET['PurCat'];
$sql = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID AND catId='$CatId')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 while ($newArray = mysql_fetch_array($result))
{
	$sugPrice=$_GET[$newArray['itemID']];
	//echo "<p>itemID : ".$newArray['itemID']." - quntity".$newArray['itemID']." : ".$qty."</p>";
	$sugItemID=$newArray['itemID'];
	$year= $_GET['PurDate'];
	$sql="INSERT INTO tecsuggest (sugePriceID, sugeCatId, sugeItemID, year, TECprice) VALUES ('', '$CatId', '$sugItemID', '$year', '$sugPrice')";
	if(mysql_query($sql, $conn))
	{
		$txt=" Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:sugePriceView.php?msg=$txt");
}
}
?>


<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../bid/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
	include("include_tecSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFCC" ><br/>
    <p class="pageHeading" >TEC suggested prices for Ration Items Insert Page</p>
    
   
    
      
     
<div class="container">
  <table border="0" cellspacing="0" cellpadding="10" width="500" align="center">
  <tr>
    <td>
   <!-- //////////////////////////////////////////////////////// --> 
   <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="get" name="form1">
    <table width="500" border="0" cellpadding="5"  cellspacing="0" align="center" >
     <tr>
    	<td>Year</td> 
    	<td><input name="year" type="text" /></td>
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
 { 	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php  }
	?>
    </select>
        </td>
  </tr>
  <tr><td colspan="2" align="center"> <input type="submit" name="Sersubmit" value="Display" /></td></tr>
   </table>
   </form>
   <!-- //////////////////////////////////////////////////////// -->   
    </td>
  </tr>
  <tr>
    <td>
    <!--  //////////////////////////////////////////////////////////////////// -->
    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="get" name="form2">
    <?php 
	
	if(isset($_GET['Sersubmit']))
{
 ?>
    <table width="500" border="0" cellpadding="5" cellspacing="0">
  <tr>
  	<td colspan="2">
    <?php
 $Id= $_GET['seleCategory'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID and catId='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 ?>
 
<table width="600" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" height="50">
   		 <td width="50" class="subtableheading">Item No</td>
    	 <td width="200" class="subtableheading">Item Name</td>
    	 <td width="150" class="subtableheading">UOM</td>
    	 <td width="150" class="subtableheading">TEC suggested Price</td>
 	 </tr>
     	
 	 <?php
   $a=1;
   $b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    
    	<td height="30"  align="center">
			<?php echo $b; ?>	 	</td>
     	<td align="left">
		 	<?php echo $newArray['itemName']; ?>
     	</td>
     	<td align="left">
		 	<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?><?php echo $newArray['denomination']; ?>
     	</td>
    	<td>
        	<input name="<?php echo $newArray['itemID']; ?>" type="text" />
         </td>
  </tr>
	<?PHP  $a++; } ?>
    	
  </table>
   
  </td>
  </tr>
  <tr>
        <td colspan="2" align="center">
        <input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;
        <input name="reset" type="reset" value="Reset" />
        
        <input type="hidden" name="PurCat" value="<?php echo $_GET['seleCategory']; ?>" />
     <input type="hidden" name="PurDate" value="<?php echo $_GET['year']; ?>" />
        
        
        </td>
    	
  	</tr>
   </table>
 <?php
 } 
?>

   </form>
    <!--  //////////////////////////////////////////////////////////////////// -->

    </td>
  </tr>
</table>


   
       </div>
       <br/><br/>
            
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
