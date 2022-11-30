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


 
<?php //START============================================================
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
include("../../Include_Connection.php");

$sql1 = "SELECT * FROM  station WHERE (stationId='$StaID')"; 
$result1 = mysql_query($sql1, $conn) ; 
$newArray1 = mysql_fetch_array($result1);?>
 <h2><u>Rejected Bid list of <?php echo $newArray1['stationName'];?>&nbsp; for the year <?php echo $proYear;?></u></h2>



<form action="" method="GET" >
      
<?php
include("../../Include_Connection.php");
$sql = "SELECT * FROM prequalificate, station, category, login  WHERE (station.stationId=prequalificate.stID AND login.login_Id=prequalificate.supId AND category.catId=prequalificate.catId AND stID='$StaID' AND projectYear='$proYear' AND isQualified='0') ORDER BY name "; 
//echo $sql ;
$result = mysql_query($sql, $conn) or die(mysql_error()); 
?>
   
<table width="750" border="1" cellpadding="5" >
   <tr height="45" align="center">
     	<td >Sr No</td>
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
     <td><?php echo $newArray['catName']; ?></td>  
   	 <td><?php echo $newArray['name']; ?></td>
	
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