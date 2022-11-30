<?php 

session_start(); 
if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
{ 	header("Location:../login.php");	 }
	?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("../include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("include_bidSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Quoted Price List View Page</h2>
         
     
      
   <form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   
      <p align="left">  <?php		    			  
	   			$bidderName=$_SESSION['comName']; 
				error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
				$sql = "SELECT * FROM  login, supplier  WHERE (supplier.supLogID=login.login_Id AND compName='$bidderName')";
				 $result = mysql_query($sql, $conn) or die(mysql_error()); 
	  				$newArray = mysql_fetch_array($result);
						$bidID=$newArray['supplierID'];
						?>
                                                </p>
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    <?php
include ("../include_Connection.php");

 $sql ="SELECT * FROM  station, bidquote WHERE station.stationId=bidquote.bQstaID AND  	bQSupId='$bidID' AND projYear='$projectYear' GROUP BY stationName";
 $result = mysql_query($sql, $conn) or die(mysql_error());

?> 
        <p align="left">Station Name :  <select name="SerStat">
        <option value="-1">Select Station</option>
    <?php  
	while ($newArray = mysql_fetch_array($result)) 
 	{ 
	?>
    <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    <?php
 }
	?>
     </select> </p>
<!-- ////////////////////////////// End Display Bidder Name////////////////////////////// --> 
       
     <!-- ////////////////////////////// start Display Category Name////////////////////////////// -->     
      <?php
	 
 $Id= $_GET['SerStat'];

include ("../include_Connection.php");

 $sql ="SELECT * FROM  category, bidquote WHERE category.catId=bidquote.bQcatID AND  bQSupId='$bidID' AND projYear='$projectYear' ";
 $result = mysql_query($sql, $conn) or die(mysql_error());

?>
  
<p align="left">  Category Name : <select name="SerCat">
        <option value="-1">Select Category</option>
    <?php  
	while ($newArray = mysql_fetch_array($result)) 
 	{ 
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SerCat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php
 }
	?>
     </select>&nbsp; <input type="submit" name="Sersubmit" value="SEARCH" /> </p> 
<!-- ////////////////////////////// End Display Category Name////////////////////////////// -->  
  
 
    </form> 

 

   
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
               
	   <?php 
	
	if(isset($_GET['Sersubmit']))
{
 	 $Id= $_GET['SerCat'];
	include("../Include_Connection.php");
		$sql1 ="SELECT * FROM item, bidquote  WHERE (item.itemID=bidquote.bQitemID  AND bQcatID='$Id')";
		//$sql ="SELECT * FROM item, category, station,  supplier, bidquote   WHERE (item.itemID=bidquote.bQitemID AND category.catId=bidquote.bQcatID AND station.stationId=bidquote.bQstaID AND  supplier.supplierID=bidquote.bQSupId AND  ";
	 //execute the SQL statement
	 $result1 = mysql_query($sql1, $conn);
 	
	 		?>
 <div class="container">
          <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40" width="30">Sr. No</td>
    <td>Item Name</td>
    <td width="60">UOM</td>
     <td width="60">Estimated Quantity</td>
    <td width="50">Quoted Price(Rs)</td>
     <td width="100">Sub Total (Rs)</td>
   <td>Action</td>    
   </tr>

	<?php
   $a=1;
   $b=0;
   $EQTotal=0;
 while ($newArray1 = mysql_fetch_array($result1))
 {
	 $b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    <td height="30"  align="center">
	<?php echo $b; ?></td>
   <td><?php echo $newArray1['itemName']; ?></td>
    <td><?php echo $newArray1['weight']; ?>
	<?php echo $newArray1['UOM']; ?></td>
    
	<?php
	$itemID=$newArray1['itemID']; 
	include("../Include_Connection.php");  
$sql2="SELECT quanItemID, actualQuantity FROM quantity WHERE quanItemID='$itemID'";
$result2 = mysql_query($sql2, $conn); 
$actualQuantityTot=0;

while($newArray2 = mysql_fetch_array($result2)) {
$actualQuantityTot=$actualQuantityTot+	$newArray2['actualQuantity'];
}
	 // echo "item ID :".$newArray['quanItemID']."Total:".$newArray['SUM(actualQuantity)']."<br/>"; 	
 

 ?>
    <td align="right"><?php echo $actualQuantityTot; ?></td>
    <td align="right"> <?php echo $newArray1['priceQuote']; ?></td>
    
    <?php
	$itemID=$newArray1['itemID'];
	$quotePrice=$newArray1['priceQuote']; 
	$subTot= $actualQuantityTot*$quotePrice;
	$EQTotal=$EQTotal+$subTot
 ?>
     <td align="right"> <?php echo ($subTot); ?></td>
    <td align="center">
    <a href="quotePriceEdit.php?ID=<?php echo $newArray['bidQuoteID']; ?>"><img src="../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
      </td> 
    </tr>
	<?PHP  $a++; } ?>
<tr><td>&nbsp;</td>
<td colspan="4" align="right"><strong>Grand Total (Rs)</strong></td>
<td align="right"><strong><?php 
  
echo $EQTotal;
?> </strong></td>
<td>&nbsp;</td> </tr>
</table>
 </h3>
</div>
</form>
<?PHP  } ?>
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
