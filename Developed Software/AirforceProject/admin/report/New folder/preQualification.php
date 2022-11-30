<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script>
function printpage()
  {
  window.print()
  }
</script>

</head>

<body>
<h2>Approved Pre_qualified list for the year 2012</h2>

<form id="form1" name="form1" method="GET" action="<?php $_SERVER['PHP_SELF']?>">
   <table width="500" border="0" cellspacing="0" cellpadding="5">
   <tr>
    	<td>Project Year:</td>
    	<?php
 		error_reporting(E_ALL ^ E_NOTICE);
		include("../../Include_Connection.php");
		$sql ="SELECT * FROM   prequalificate GROUP BY  projectYear";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		?>
    	<td>
		<select name="serYear" >
   		 <option value="-1">Select year</option>
  		 <?php  
		while ($newArray = mysql_fetch_array($result)) 
 		{
		?>
   		 <option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    	<?php } ?>
		</select>
        </td>
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
     	</select><input type="submit" name="catSubmit" value="Display" />
      	</td>
  </tr>
</table><br/><br/>
</form>
 
<?php //START============================================================
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
?>

<form action="" method="GET" >
      
<?php
include("../../Include_Connection.php");
$sql = "SELECT * FROM prequalificate, station, category, supplier  WHERE (station.stationId=prequalificate.stID AND supplier.supplierID=prequalificate.supId AND category.catId=prequalificate.catId AND stID='$StaID' AND projectYear='$proYear' AND isQualified='1') "; 
//echo $sql ;
$result = mysql_query($sql, $conn) or die(mysql_error()); 
?>
   
<table width="750" border="1" cellpadding="5" >
   <tr height="45" align="center">
     	<td >Sr No</td>
    	 <td >Name of Stations</td>
    	<td >Name of Categories</td>
   		 <td >Name of Supplier</td>
   </tr>
   
 
<?php
 $a=1;
 $b=0;
 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
  {$b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	  else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
   	 <td><?php echo $b; ?></td>
     <td><?php echo $newArray['stationName']; ?></td>
     <td><?php echo $newArray['catName']; ?></td>  
   	 <td><?php echo $newArray['compName']; ?></td>
	
  </tr>
<?php }?>
</table>
<p align="right"><input type="button" value="Print" onclick="printpage()" /></p>
</form>
   
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
