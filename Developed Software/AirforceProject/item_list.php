<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#F8F8F8"><h3 class="pageHeading">Items of the Category View Page</h3>
   <!--   <p class="tabledescription"><strong>Supply of each category to the individual stations will be considered as separate bids</strong></p> -->

 	<?php
	 error_reporting(E_ALL ^ E_NOTICE);
	include ("include_Connection.php");
	 $sql = "SELECT * FROM category "; 
 	$result = mysql_query($sql, $conn) or die(mysql_error());
	?>     
      
      <form id="catForm" name="catForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
       
 
 <table width="590" border="0" cellpadding="5" class="subtable">
       
        <tr>
        <td align="right">
        
        <select name="SerID">
    <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?></option>
    <?php
 }
	?>
    </select>
    </td>
    <td width="150" align="left" ><input type="submit" name="Sersubmit" value="SEARCH" />
    </td>
    </tr>
    </table><br/>
    
  </form>   

   
     <?php
if(isset($_GET['Sersubmit']))
{
	
 $Id= $_GET['SerID'];
include ("include_Connection.php");
$sql = "SELECT * FROM item,category WHERE (category.catId =item.itemCatID and catId='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 

 ?>
 
      <table width="450" border="0" cellpadding="0" class="subtable" align="center" >
  <tr class="subtableheading">
    <td width="35" height="50">Sr No</td>
    <td width="315" >Item</td>
    <td width="100">UOM</td>
    
  </tr>
 
     <?php
   $a=1;
   $b=0;
 while ($newArray = mysql_fetch_array($result))
 {
	 $b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    <td height="30"  align="center"><?php echo $b; ?></td>
        <td align="left"><?php echo $newArray['itemName']; ?></td>
    <td  align="center"><?php echo $newArray['UOM']; ?></td>
    
  </tr>
	<?PHP  $a++; } ?>

</table><br/><br/>
 <?php
 }
 else { echo "no data"; }
mysql_close($conn);

?>
  
  
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
