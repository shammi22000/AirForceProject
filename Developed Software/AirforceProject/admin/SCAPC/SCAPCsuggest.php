<?php
session_start(); 
	if(!isset($_SESSION['user5']) || (empty($_SESSION['user5'])))
		{ 	header("Location:../login.php");	 }
error_reporting(E_ALL ^ E_NOTICE);

if($_GET['submit']=="SUMBIT" || !empty($_GET['submit']) || isset($_GET['submit']) )

{

include ("../../include_Connection.php");
	$sql= "INSERT INTO inquiry (inqID, inqSupId, inqDate, inq_TypeID, inqStatId, inqCatId, inqItemId, inqDesc) VALUES ('', '$_GET[inqSupId]', '$_GET[date]', '$_GET[seleInq]', '$_GET[seleSta]', '$_GET[seleCat]', '$_GET[seleItem]', '$_GET[txtdesc]')";
	
if (!mysql_query($sql,$conn))
	{
	  	$msg="Error: ". mysql_error();
	}
else
	{
		$msg= "1 Record Added";
	}
header("Location:inquiry.php?txt=$msg");
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
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SCAPCSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
    <p class="pageHeading" >SCAPC suggested prices for all Ration Items of each category</p>
    
   
    
    <p align="left"> Date :<?php $today = date("F j, Y");echo $today;  ?></p>
    
     
 <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM category";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     
   	
     
     <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['../../bid/PHP_SELF'];?>">
      <p align="left">Category Name: <select name="SerID">
    <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_POST['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?></option>
    <?php
 }
	?>
    </select>&nbsp;<input type="submit" name="Sersubmit" value="SEARCH" /></p>
        <?php
if(isset($_POST['Sersubmit']))
{
	
 $Id= $_POST['SerID'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item,category WHERE (category.catId =item.itemCatID and catId='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 if($newArray) {
	 echo "<h2 class='MainHeading'></h2>";
 ?>
     
     <div class="container">
     
 <table width="600" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40" width="60">No</td>
    <td width="300">Item Name</td>
    <td width="100">UOM</td>
   
    <td width="100">Suggested Price(Rs)</td>
   
  
    
     </tr>
<?php
   $a=1;
   $Sb=1;
 while ($newArray = mysql_fetch_array($result))
 {
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
  
    <td height="30"  align="center"><?php  echo $b=$b+1; ?></td>
        <td align="left"><?php echo $newArray['itemName']; ?></td>
    <td  align="center"><?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>&nbsp; <?php echo $newArray['denomination']; ?></td>
 <?php $quan=$newArray['quan'];?>
       <td  align="center"><input name="price" type="text" value="" /></td><?php $price=$_POST['price'];?>
   
 
  
	<?PHP  $a++; } ?>

</table>

<input name="Edit" type="button" value="Edit" />&nbsp;<input name="submit" type="submit" />&nbsp;<input name="cancel" type="reset" value="Cancel" />

 <?php
 }
 else { echo "no data"; }
mysql_close($conn);
}
?>
    
  
    
 


 </div>
 </form>
   

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
