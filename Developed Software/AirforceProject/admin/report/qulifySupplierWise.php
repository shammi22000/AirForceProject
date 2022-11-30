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
<h2>Qualified List of Suppliers</h2>

<form id="form1" name="form1" method="GET" action="qulifySupplierWiseView.php" target="_new">
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
$sql = "SELECT * FROM  login";
$result = mysql_query($sql, $conn) or die(mysql_error());
 ?>
 <!-- //////////////////////////////Select Station Name////////////////////////////// -->
  <tr>
    	<td>Bidder Name : </td>
   		<td><select name="seleBidder">
		<option>Select Bidder</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		{ ?>
    	<option value="<?php echo $newArray['login_Id']; ?>" <?php if($newArray['login_Id']==$_GET['seleBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?> </option>
     	<?php }  ?> 
     	</select><input type="submit" name="catSubmit" value="Display" />
      	</td>
  </tr>
</table><br/><br/>
</form>
 

   
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>