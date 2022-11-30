<?php
//include("../include_session.php");
 error_reporting(E_ALL ^ E_NOTICE);
 
if($_POST['tot']=="Total" || !empty($_POST['tot']) || isset($_POST['tot']) )

{
	include("../Include_Connection.php");
	$sql="INSERT INTO points(pointID, poinSupID, analIncome, availCredit, staff, vehicleFleet, coldRoom, wareHouse, experin) VALUES ('','$_POST[SerBidder]', '$_POST[annIncome]', '$_POST[aviCredit]', '$_POST[staff]', '$_POST[cRoom]', '$_POST[wHouse],' '$_POST[experi]', '$_POST[perform]') ";
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:conDetaView.php?msg=$txt");
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
<script language="javascript" type="text/javascript">
function praddcheck()
{
 if(document.pra.fulname.value=="")
 {
 alert("Enter Full Name");
 document.pra.fulname.focus();
 return false;
}
 if(document.pra.address.value=="")
 {
 alert("Enter Address");
 document.pra.address.focus();
 return false;
}
 if(document.pra.tele.value=="")
 {
 alert("Enter Contact No");
 document.pra.tele.focus();
 return false;
}
}
</script>
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	//include("include_BaseMainmenu.php");
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
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Pre-qualification Evaluation Sheet</h3>
   
      
        
         
      <?php
	  error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM supplier";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     <p align="center"><select name="SerBidder">
		<option>Select Bidder</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['supplierID']; ?>" <?php if($newArray['supplierID']==$_POST['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['compName']; ?> </option>
                  
 	 	
		<?php }  ?> 
        </select> <input name="seleBidder" type="submit" value="Select" /></p><br/>
  

  <?php
	
		if(isset($_POST['seleBidder']))
		{
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql = "SELECT * FROM  supplier WHERE(supplierID='$Id' )";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 
 		?> 
         <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" name="form1"> 
           <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="700" border="0" bordercolor="#666666" cellspacing="0" cellpadding="5"  >
     
  <tr>
   	 	<td class="point"><strong>Average Annual Income (X)</strong><br/><strong>Tender Value(Y)</strong><br/><strong>Available Credit (Z)</strong></td>
        <td colspan="2" align="right"><strong>Overall Maximum Score&nbsp;(Financial + Technical + Experience) = 100</strong><br/><strong>Overall Minimum for Qualification  =60</strong></td>
    	
        
  </tr>
  <tr>
   	 	<td class="tableBg2" width="300"><strong>Capacity</strong></td>
    	<td class="tableBg2" width="300" ><strong>Bidder Qualification</strong></td>
       
        <td class="tableBg2" width="100" ><strong>Recommended Points</strong></td>
  </tr>
  <tr>
    <td colspan="4"><strong class="p2">Financial Capacity</strong></td>
    	
      </tr>
      
  <tr>
  
    <td ><strong>Average Annual Income</strong></td>
      
    	<td><h3><?php echo $newArray['averageIncome']?></h3></strong></td> 
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="annIncome" id="annIncome" /></td>
      </tr>
    
      <tr>
    <td >X &lt; Y :&nbsp;&nbsp;<strong>0</strong><br/> Y &lt; X &lt; 1.5Y:&nbsp;&nbsp;<strong>10</strong><br/>1.5Y &lt; X &lt; 2Y :&nbsp;&nbsp;<strong>12</strong><br/>2Y &lt; X &lt; 2.5Y:&nbsp;&nbsp;<strong>14</strong><br/>2.5Y &lt; X &lt; 3Y:&nbsp;&nbsp;<strong>16</strong><br/>3Y &lt; X &lt; 4Y:&nbsp;&nbsp;<strong>18</strong><br/>X &gt; 4Y:&nbsp;&nbsp;<strong>20</strong>
    
    
    </td>
    	<td>&nbsp;</td>
        
        <td width="150"></td>
      </tr>
      <tr>
    <td ><strong>Available Credit</strong></td>
    	<td><strong><h3><?php echo $newArray['availCredit']?></h3></strong></td>
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="aviCredit" id="aviCredit" /></td>
      </tr>
  
      <tr>
    <td >Z &lt; 0.1Y :&nbsp;&nbsp;<strong>0</strong><br/> 0.1Y &lt; Z &lt; 0.15Y:&nbsp;&nbsp;<strong>10</strong><br/>0.15Y &lt; Z &lt; 0.2Y :&nbsp;&nbsp;<strong>12</strong><br/>0.2Y &lt; Z &lt; 0.25Y:&nbsp;&nbsp;<strong>14</strong><br/>0.25Y &lt; Z &lt; 0.3Y:&nbsp;&nbsp;<strong>16</strong><br/>0.3Y &lt; Z &lt; 0.4Y:&nbsp;&nbsp;<strong>18</strong><br/>Z &gt; 0.4Y:&nbsp;&nbsp;<strong>20</strong>
     </td>
    	<td>&nbsp;</td>
        
        <td width="150"></td>
      </tr>
      <tr>
    <td colspan=3"" ><hr/></td>
    	
      </tr> 
       <tr>
      
     <tr>
    <td ><strong class="p2">Technical Capability</strong></td>
    	<td>&nbsp;</td>
       
        <td width="150">&nbsp;</td>
      </tr> 
       <tr>
    <td ><strong>Organization and Staff</strong></td>
    	<td><strong><strong>No of Staff&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  :</strong><?php echo $newArray['staffTot']?></strong></br>
            <strong>No of EPF/ETF Staff :<?php echo $newArray['staffEPFPaid']?></strong></td>
       
        <td width="150">
          <input type="text" name="staff" id="staff" /></td>
      </tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/></td>
    	<td></td>
       
        <td width="150"></td>
      </tr> 
      <tr>
    <td ><strong>Transport Facility</strong></td>
    	<td><strong>No of vehicles owned :<?php echo $newArray['vehicleOwnTot']?><br/>
        No of vehicles hired :<?php echo $newArray['vehicleHireTot']?><br/>
        No of vehicles leased :<?php echo $newArray['leaseVehicle']?><br/>
        No of vehicles freezer truck :<?php echo $newArray['freezerTruck']?></strong>
        </td>
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="vehicle" id="vehicle" /></td>
      </tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/>Superior :&nbsp;&nbsp;<strong>6</strong></td>
    	<td></td>
       
        <td></td>
      </tr>
      
      <tr>
    <td ><strong>Cold Room Facility</strong></td>
    	<td rowspan="4">
         <?php
	
		if(isset($_POST['seleBidder']))
		{
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql = "SELECT * FROM supplier, storage WHERE(supplier.supplierID=storage.SupID AND supplierID='$Id') ORDER BY storeType";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 
 
 		?>  
        <table width="250" border="1" cellspacing="0" cellpadding="0">
    	 
          <tr>
          <td align="center"><strong>Sr no</strong></td>
          <td align="center"><strong>City</strong></td>
          <td align="center"><strong>Ownership<br/> detail</strong></td>
          <td align="center"><strong>Store Type</strong></td>
          </tr>
           <?php
 $b=0;
 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	$b++;
	
	
	?>
          <tr>
          	<td align="center"><?php echo $b; ?></td>
    	    <td><?php echo $newArray['city']?></td>
			<td><?php echo $newArray['ownerShip']?></td>
			<td><?php echo $newArray['storeType']?></td>
    	   
  	    </tr>
        <?php } ?>
  	  </table>
      <?php } ?>
      </td>
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="cRoom" id="cRoom" /></td>
      </tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/>Superior :&nbsp;&nbsp;<strong>6</strong></td>
    	<td></td>
       
      
      </tr> 
      <tr>
    <td ><strong>Storage Facility</strong></td>
    	
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="wHouse" id="wHouse" /></td>
      </tr> 
       <tr>
    <td > Unsatisfactory :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong></td>
    	<td></td>
       
      
      </tr> 
      
      <tr>
       <td colspan="3"><hr/></td>
         </tr>
      <tr>
    <td ><strong class="p2">Experience</strong></td>
    	<td>&nbsp;</td>
       
        <td width="150">&nbsp;</td>
      </tr> 
       <tr>
    <td ><strong>Experience with similar supplies </strong></td>
    	<td rowspan="2"><?php
	
		if(isset($_POST['seleBidder']))
		{
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql = "SELECT * FROM supplier, experience WHERE(supplier.supplierID=experience.expSupID AND supplierID='$Id') ORDER BY year";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 
 
 		?>  
        <table width="250" border="1" cellspacing="0" cellpadding="0">
    	 
          <tr>
         
          <td align="center"><strong>Year</strong></td>
          <td align="center"><strong>Institute</strong></td>
          <td align="center"><strong>Category/item</strong></td>
          <td align="center"><strong>Total Value(Mn)</strong></td>
          </tr>
           <?php

 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	
?>
          <tr>
           <td><?php echo $newArray['year']?></td>
			<td><?php echo $newArray['institute']?></td>
			<td><?php echo $newArray['expCategory']?></td>
    	    <td><?php echo $newArray['totVal']?></td>
  	    </tr>
        <?php } ?>
  	  </table>
      <?php } ?></td>
       
        <td width="150"><label for="textfield"></label>
          <input type="text" name="experi" id="experi" /></td>
      </tr> 
       <tr>
    <td > None:&nbsp;&nbsp;<strong>0</strong><br/> One Contract :&nbsp;&nbsp;<strong>14</strong><br/>Two Contract:&nbsp;&nbsp;<strong>16</strong><br/>Three Contract:&nbsp;&nbsp;<strong>18</strong><br/>Four Contract:&nbsp;&nbsp;<strong>20</strong><br/>More than four Contract:&nbsp;&nbsp;<strong>22</strong></td>
    	
       
        <td width="150"></td>
      </tr> 
      <tr>
    <td ><strong>Past Performance</strong></td>
    <?php
	
		if(isset($_POST['seleBidder']))
		{
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql = "SELECT * FROM supplier, bid WHERE(supplier.supplierID=bid.	bidSupplierID AND supplierID='$Id')";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
  $newArray = mysql_fetch_array($result);
 
 		?>  
    	<td><h3><?php echo $newArray['bidPerformanace']?></h3></td>
      
        <td width="150" align=""><label for="textfield"></label>
          <input type="text" name="perform" id="perform" /></td>
      </tr>  
      
       
      
   <tr>
    	<td > No reference:&nbsp;&nbsp;<strong>0</strong><br/> One satisfactory reference :&nbsp;&nbsp;<strong>5</strong><br/>Two Satisfactory :&nbsp;&nbsp;<strong>10</strong><br/>Three or more :&nbsp;&nbsp;<strong>18</strong></td>
        <td>&nbsp;
       </td>
    	
  	</tr>
     <?php } ?>
    <tr>
    <td colspan="3" ><hr/></td>
    
    </tr>
     <tr>
    <td colspan="3" align="right" ><input name="tot" type="submit" value="Total" />&nbsp;&nbsp;<input name="cancel" type="reset" value="Cancel" /></td>
    
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td  ><strong>Total Recommended Points</strong><br/>(Financial + Technical + Experience)</td>
    
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="right"><strong>Average of earned points</strong></td>
    
    <td>&nbsp;</td>
    </tr>
   
    
   </table>
   <?php }?>
       </div>
       <br/><br/>
            
     </form>
         
     
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
