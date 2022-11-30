<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<script src="../../bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  
  <tr>
    
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
  <strong> Comparison sheet of Quoted Prices</strong>
    
   
   
    
              
  <form  name="form2" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">        
<!-- //////////////////////////////Connect to the Database////////////////////////////// -->
 
        
     
  
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40" width="60">No</td>
    <td width="300">Item Name</td>
    <td width="50">UOM</td>
        <?php
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
$CatID= $_GET['SeleCat'];	
//$SupplID= $_GET['bidId'];
 
include ("../../include_Connection.php");
$sql = "SELECT supplierID,compName FROM supplier, bidquote WHERE (supplier.supplierID=bidquote.bQSupId AND  bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear')GROUP BY compName"; 
//echo $sql;
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 //$newArray = mysql_fetch_array($result);
    
 while ($newArray = mysql_fetch_array($result))
 {
?>

    <td width="100"><?php echo $newArray['compName']; ?></td><?php }?>
    
     </tr>
     
     
     
     
     
     
<?php
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
$CatID= $_GET['SeleCat'];	

include ("../../include_Connection.php");
$sql1 ="SELECT * FROM item, bidquote  WHERE (item.itemID=bidquote.bQitemID AND projYear='$proYear' AND bQcatID='$CatID' AND bQstaID='$StaID')";
//echo $sql1;
			 //execute the SQL statement
	 $result1 = mysql_query($sql1, $conn);
 	
 //$newArray = mysql_fetch_array($result);
  $b=0;   
 while ($newArray1 = mysql_fetch_array($result1))
	 {
	 	$itemID=$newArray1['itemID']; 
		$b++;?>
  <tr>
      <td height="30"  align="center"><?php  echo $b; ?></td>
       	<td align="left"><?php echo $newArray1['itemName']; ?></td>
       	<td  align="center"><?php echo $newArray1['weight']; ?><?php echo $newArray1['UOM']; ?>&nbsp; <?php echo $newArray1['denomination']; ?></td>
 
    
  <?php
 include ("../../include_Connection.php");
$sql2 = "SELECT supplierID,compName FROM supplier, bidquote WHERE (supplier.supplierID=bidquote.bQSupId AND  bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear')GROUP BY compName"; 
//echo $sql2;
 $result2 = mysql_query($sql2, $conn) or die(mysql_error()); 

    
 while ($newArray2 = mysql_fetch_array($result2))
	 {
 		 $bidderID=$newArray2['supplierID']?>
  	 <?php
  	 include ("../../include_Connection.php");
$sql3 = "SELECT * FROM bidquote WHERE (bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear' AND bQSupId='$bidderID' AND  bQitemID='$itemID') "; 
 //echo $sql3;
  $result3 = mysql_query($sql3, $conn) or die(mysql_error()); 
 
  while ($newArray3 = mysql_fetch_array($result3)){?>
  
   <td  align="center"><?php
  echo $newArray3['priceQuote']; ?>
</td>  <?php }}?>
                   
       </tr>       
   
 	<?PHP  } ?>

</table>

</div>
 <BR/>

</form>
</td>
   </tr>
   
  
    
    
</table>
