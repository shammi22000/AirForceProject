<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<h2 align="center">Pre-qualification Evaluation Sheet for supply of Ration Items</h2>
      
      
    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET" name="form1"> 
   	
			<?php //display Project year=====================================
	  		error_reporting(E_ALL ^ E_NOTICE);
			include("../../Include_Connection.php");
			 $sql = "SELECT * FROM  supplierinfo GROUP BY projectYear";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 		?>
            
      	<p align="center">Project Year :
      		 <select name="serYear">
       			<option>Select year</option>
				<?php  
				while ($newArray = mysql_fetch_array($result)) 
 				{ 	?>
    			<option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    			<?php  
				}
				?>
   		 </select>&nbsp; 
  	 </p>
   
  
   
			<input name="seleBidder" type="submit" value="Select" /></p><br/>
</form>
   
  
  
  <!-- //////////////////////////////form 1 ending//////////////////////////////////////// -->    
      <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
        
        <?php
	if(isset($_GET['seleBidder']))
			{   
				$year=$_GET['serYear'];	
	error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM  supplier";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
 		?>   
     
     <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center">
    <td height="30" width="60"><strong>Sr No</strong></td>
    <td><strong>Bidder Name</strong></td>
     <td width="100"><strong>VAT No</strong></td>
    <td><strong>Staff</strong></td>
    <td width="50"><strong>Vehecle fleet</strong></td>
    <td width="50"><strong>Working Capital(Mn)</strong></td>
    <td width="150"><strong>Past Experience</strong> (Year/Institute/Category/Value(Mn))</td>
    <td width="150"><strong>Storage<br/> (City/Ownership/Store Type)</strong></td>
   <td width="150"><strong>Bank Details<br/> (Bank/TO/OD/LTL/STL/FD/CF)</strong></td>
   </tr>
 <?php
 //go through each row in the result set and display data
 $b=0;
 while ($newArray = mysql_fetch_array($result)) 
 {
	$b++;
	?>
 <tr>
    <td height="30"><?php echo $b; ?></td>
    
    <td><?php echo $newArray['compName']; ?> </td>
      <td><?php echo $newArray['VATregNo ']; ?>  </td>
      <td><?php echo $newArray['staffTot']; ?><br/>  
     <?php echo $newArray['staffEPFPaid']; ?>  </td>
        <td>own :<?php echo $newArray['vehicleOwnTot']; ?><br/>
       hired : <?php echo $newArray['vehicleHireTot']; ?><br/>
        Leased : <?php echo $newArray['leaseVehicle']; ?>
          </td>
         <td><?php echo $newArray['workinCapital']; ?>  </td>
         <td><?php echo $newArray['workinCapital']; ?>  </td>
         <input type="hidden" name="ID" value="<?php echo $newArray['supplierID']; ?>" />
          
<td>
<?php
 $Id=$newArray['supplierID'];
 //echo $Id;
include ("../../include_Connection.php");

 $sql1 = "SELECT * FROM supplier, experience WHERE (supplier.supplierID=experience.expSupID AND expSupID='$Id')"; 
 //echo $sql1;
 $result1 = mysql_query($sql1, $conn) or die(mysql_error());

?>
<table width="200" border="0" cellspacing="0" cellpadding="0">
 <?php
 //go through each row in the result set and display data
 while ($newArray1 = mysql_fetch_array($result1)) 
 {
		
	?>
  <tr>
    <td><?php echo $newArray1['year']; ?>  </td>
    <td><?php echo $newArray1['institute']; ?>  </td>
    <td><?php echo substr($newArray1['expCategory'],0,10); ?>  </td>
    <td><?php echo $newArray1['totVal']; ?>  </td>
  </tr>
  <?php

 }
?>
</table>
</td>

 <td>
          <?php
 $Id=$newArray['supplierID'];
include("../../Include_Connection.php");
	 $sql2 = "SELECT * FROM supplier, storage WHERE (supplier.supplierID=storage.SupID AND SupID='$Id' )";
 $result2 = mysql_query($sql2, $conn) or die(mysql_error()); ?>
          <table width="250" border="0" cellspacing="0" cellpadding="0">
          <?php
 
 //go through each row in the result set and display data
 while ($newArray2 = mysql_fetch_array($result2)) 
 {	?>
          <tr>
          	<td><?php echo $newArray2['city']?></td>
			<td><?php echo $newArray2['ownerShip']?></td>
			<td><?php echo $newArray2['storeType']?></td>
    	    </tr>
        <?php } ?>
  	  </table>
            
          </td>
          
           <td>
		    <?php
 $Id=$newArray['supplierID'];
include("../../Include_Connection.php");
	 $sql3 = "SELECT * FROM bank WHERE (SupID='$Id' )";
 $result2 = mysql_query($sql3, $conn) or die(mysql_error()); ?>
  
 <table width="250" border="1" cellspacing="0" cellpadding="0">
          <?php
 
 //go through each row in the result set and display data
 while ($newArray3 = mysql_fetch_array($result2)) 
 {	?>
          <tr>
          	<td><?php echo $newArray3['bankName']?></td>
			<td><?php echo $newArray3['turnOver']?></td>
			<td><?php echo $newArray3['OD']?></td>
            <td><?php echo $newArray3['LTL']?></td>
            <td><?php echo $newArray3['STL']?></td>
            <td><?php echo $newArray3['FD']?></td>
            <td><?php echo $newArray3['CF']?></td>
    	    </tr>
        <?php } ?>
  	  </table>
            
          </td>
 
 
 
           
  </tr>
 
 <?php

 }
?>
</table>


 </div>
 </form>
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
