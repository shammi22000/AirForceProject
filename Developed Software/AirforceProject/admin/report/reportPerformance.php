<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<h2 align="center">Report of Past Performance of Bidders </h2>
      <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
      
      
      <?php
	  error_reporting(E_ALL ^ E_NOTICE);
	include("../Include_Connection.php");
	 $sql = "SELECT * FROM supplier";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     <p align="left"><select name="SerBidder">
		<option>Select Bidder</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['supplierID']; ?>" <?php if($newArray['supplierID']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['compName']; ?> </option>
                  
 	 	
		<?php }  ?> 
        </select> <input name="seleBidder" type="submit" value="Select" /></p>
      
      
      
        <?php
	
		if(isset($_GET['seleBidder']))
		{
			$Id= $_GET['SerBidder'];
include("../Include_Connection.php");
	 $sql = "SELECT * FROM  station, category, supplier, performance  WHERE( performance.perSupId=supplier.supplierID AND performance.perStaID=station.stationId AND performance.perCatID=category.catId AND supplierID='$Id' )";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 if($newArray) {
	 echo "";
 		?>   
     
     <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center">
    <td height="30" width="60"><strong> Sr.No</strong></td>
    <td><strong>Month</strong></td>
     <td width="50"><strong>Station Name</strong></td>
     <td width="80"><strong>Category Name</strong></td>
    <td width="50"><strong>Feedback</strong></td>
    <td width="100"><strong>Description</strong></td>
    
    
   
   </tr>
   
 <?php
 $b=0;
 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	$b++;
	
	
	?>
 <tr>
    <td height="30"><?php echo $b;?></td>
    <td><?php echo $newArray['month']; ?></td>
    <td><?php echo $newArray['stationName']; ?></td>
    <td><?php echo $newArray['catName']; ?></td>
    <td><?php echo $newArray['feedback']; ?>  </td>
   	 <td><?php echo $newArray['	desc ']; ?>  </td>
     
   		
  </tr>
 
 <?php
$b++;
 }
?>
</table>
<?php
 }
 else { echo "no data"; }
mysql_close($conn);
}
?>
 </div>
 </form>
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
