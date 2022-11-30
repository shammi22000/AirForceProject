<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<h2 align="center">Report of Inquiry Information</h2>
      <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
      
      
      <?php
	  error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM inquiry";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     <p align="left"><select name="SerDate">
		<option>Select Date</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['inqDate']; ?>" <?php if($newArray['inqDate']==$_GET['inqDate']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['inqDate']; ?> </option>
                  
 	 	
		<?php }  ?> 
        </select> <input name="seleDate" type="submit" value="Select" /></p>
      
      
      
        <?php
		
		error_reporting(E_ALL ^ E_NOTICE);
		if(isset($_GET['seleDate']))
		{
			$Id= $_GET['SerDate'];
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM inquiry_type, station, category, item, supplier, inquiry  WHERE(inquiry.inq_TypeID=inquiry_type.inqTypeID  AND inquiry.inqSupId=supplier.supplierID AND inquiry.inqStatId=station.stationId AND inquiry.inqCatId=category.catId AND inquiry.inqItemId=item.itemID and inqDate='$Id' )";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
 		?>   
     
     <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center">
    <td height="30" width="60"><strong>Sr No</strong></td>
    <td><strong>Bidder Name</strong></td>
     <td width="50"><strong>Communication Facility</strong></td>
     <td width="80"><strong>Busi.Reg.No/ date</strong></td>
    <td width="50"><strong>Business Nature</strong></td>
    <td width="100"><strong>VAT No</strong></td>
    <td width="30"><strong>Staff</strong></td>
    <td width="30"><strong>EPF/ETF staff</strong></td>
    <td width="50"><strong>Vehecle fleet</strong></td>
    <td width="50"><strong>Working Capital(Mn)</strong></td>
    <td width="150"><strong>Past Experience</strong></td>
    <td width="150"><strong>Storage</strong></td>
   <td width="150"><strong>Bank Details</strong></td>
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
    
    <td><?php echo $newArray['compName']; ?></td>
    <td><?php echo $newArray['stationName']; ?></td>
    <td><?php echo $newArray['catName']; ?></td>
    <td><?php echo $newArray['itemName']; ?>  </td>
   	 <td><?php echo $newArray['inqName ']; ?>  </td>
      <td><?php echo $newArray['appPrice']; ?>  </td>
       <td><?php echo $newArray['reqesPrice']; ?>  </td>
        <td><?php echo $newArray['appBrand']; ?>  </td>
         <td><?php echo $newArray['reqesBrand']; ?>  </td>
          <td><?php echo $newArray['inqDesc']; ?>  </td>
   	
    
    
	
		
    
	
  </tr>
 
 <?php

 }
?>
</table>
<?php
 }
 else { echo "no data"; }
mysql_close($conn);

?>
 </div>
 </form>
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
