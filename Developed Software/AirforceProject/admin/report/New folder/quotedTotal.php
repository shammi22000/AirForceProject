<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<script src="file:///C|/Users/bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  
  <tr>
    
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
  <strong> Comparison sheet of Quoted Prices</strong>
    
   <form id="form1" name="form1" method="GET" >
   <table width="500" border="0" cellspacing="0" cellpadding="5">
 
  <tr>
    <td>Project Year:</td>
    <?php
 error_reporting(E_ALL ^ E_NOTICE);
include("../../Include_Connection.php");
		 $sql ="SELECT * FROM   bidquote GROUP BY  projYear";
		  $result = mysql_query($sql, $conn) or die(mysql_error());

?>
    <td>
<select name="serYear" >
    <option value="-1">Select year</option>
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['projYear']; ?>" <?php if($newArray['projYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projYear']; ?> </option>
    <?php
 }
	?>
</select></td>
  </tr>
  
   <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM station";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     <!-- //////////////////////////////Select Station Name////////////////////////////// -->
  <tr>
    <td>Station Name : </td>
    <td><select name="seleStation">
		<option>Select Station</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleStation']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
                  
 	 	<?php }  ?> 
        </select>
       <?php $stationName=$newArray['stationName'];?>
       </td>
  </tr>
 <!-- //////////////////////////////Select Category Name////////////////////////////// -->
      <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM category";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
     
  <tr>
    <td>Category Name: </td>
    <td><select name="SeleCat">
    <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SeleCat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?></option>
    <?php
 }
	?>
    </select>&nbsp;<input type="submit" name="catSubmit" value="DISPLAY" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
 
  </tr>
</table>

 </form>
  
<?php //START============================================================
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
$staName=$_GET['statName'];
$CatID= $_GET['SeleCat'];	
include("../../Include_Connection.php");$sql = "SELECT supplierID,compName FROM supplier, bidquote WHERE (supplier.supplierID=bidquote.bQSupId AND  bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear')GROUP BY compName"; 
$result = mysql_query($sql, $conn) or die(mysql_error()); 
?>         
<form  name="form2" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">        
<table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
	<tr align="center" class="subtableheading">
    	<th height="40" width="60">No</th>
    	<th width="300">Item Name</th>
    	<th width="50">UOM</th>
<?php 
$bidderArray =  array();
$i=0;
while($newArray = mysql_fetch_array($result)) { 
	$bidderArray[$i++] = $newArray['supplierID'];
?>
		<th width="100"><?php echo $newArray['compName']; ?></th>
<? 
} 
?>
	</tr>
     
<?php
include("../../Include_Connection.php");
$sql1 = "SELECT * FROM item WHERE (itemCatID='$CatID' )";
echo $sql1;
$result1 = mysql_query($sql1, $conn);

$b=0;   
while ($newArray1 = mysql_fetch_array($result1)){
	$b++;
	$itemID = $newArray1['itemID']; 
	echo $itemID;
?>
	<tr>
    	<td height="30"  align="center"><?php  echo $b; ?></td>
        <td align="left"><?php echo $newArray1['itemName']; ?></td> 
    	<td align="center"><?php echo $newArray1['weight'].$newArray1['UOM']."&nbsp;".$newArray1['denomination']; ?></td>
<?php
	foreach($bidderArray as $bidderID){
		include("../../Include_Connection.php");
		$sql3 = "SELECT * FROM bidquote WHERE (bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear' AND bQSupId='$bidderID' AND  bQitemID='$itemID') "; 
  		$result3 = mysql_query($sql3, $conn) or die(mysql_error()); 
 		while ($newArray3 = mysql_fetch_array($result3)){
			
?>
		<td  align="center"><?php  echo $newArray3['subTot']; ?></td>  
<?php 
		}
	}
?>       
	</tr>       
<?php  
} //END============================================================
?>
</table>
</form>
</td>
</tr>  
</table>
