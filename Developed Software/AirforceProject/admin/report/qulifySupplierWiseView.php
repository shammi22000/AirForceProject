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
$bidID= $_GET['seleBidder'];
?>

<h3>Report of Qualified Bids and Rejected bids for 
				<?php
  			include("../../Include_Connection.php");
			$sql1 ="SELECT * FROM login  WHERE login_Id='$bidID'";
			$result1 = mysql_query($sql1, $conn) or die(mysql_error());
			 $newArray1 = mysql_fetch_array($result1);
			 echo $newArray1['name']; ?> 
</h3>        


<form action="<?php $_SERVER['PHP_SELF']?>" method="GET" name="form1" >
<?php
include("../../Include_Connection.php");
$sql = "SELECT * FROM prequalificate, station, category, login  WHERE (station.stationId=prequalificate.stID AND login.login_Id=prequalificate.supId AND category.catId=prequalificate.catId AND supId='$bidID' AND projectYear='$proYear') ORDER BY stationName "; 
//echo $sql ;
$result = mysql_query($sql, $conn) or die(mysql_error());
 
?>
<table width="600" border="1" cellpadding="2" >
   <tr height="45" align="center">
     	<th >Sr No</th>
    	 <th>Name of Requested Stations</th>
    	<th>Name of Requested Categories</th>
   		 <th>Is Qualified</th>
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
   	 <td><?php $isQualified=$newArray['isQualified']; 
	 		if($isQualified<>0)
					{echo "Qualified";}
				else {echo " Not Qualified";}
			
			
			?></td>
	
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