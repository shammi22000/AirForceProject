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
 
    
   
   
<?php //START============================================================
include("../../Include_Connection.php");
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
include("../../Include_Connection.php");

$sql1 = "SELECT * FROM  station WHERE (stationId='$StaID')"; 
$result1 = mysql_query($sql1, $conn) ; 
$newArray1 = mysql_fetch_array($result1);

$CatID= $_GET['SeleCat'];	

include("../../Include_Connection.php");
$sql = "SELECT * FROM login, bidquote WHERE (login.login_Id=bidquote.bQSupId AND  bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear')GROUP BY name"; 
$result = mysql_query($sql, $conn) or die(mysql_error()); 
?>
<h2> Quoted Prices of <?php echo $newArray1['stationName'];?> for the year  <?php echo $proYear; ?> &nbsp; -  Comparison sheet</h2>

       
<form  name="form2" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">        
<table width="700" border="1" cellspacing="0" cellpadding="4" align="center" class="subtable">
	<tr align="center" class="subtableheading">
    	<th height="40" width="60">No</th>
    	<th width="300">Item Name</th>
    	<th width="50">UOM</th>
<?php 
$bidderArray =  array();
$i=0;
while($newArray = mysql_fetch_array($result)) { 
	$bidderArray[$i++] = $newArray['login_Id'];
?>
		<th width="100"><?php echo $newArray['name']; ?></th>
<? 
} 
?>
	</tr>
     
<?php
include("../../Include_Connection.php");
$sql1 = "SELECT * FROM item WHERE (itemCatID='$CatID' )";
//echo $sql1;
$result1 = mysql_query($sql1, $conn);

$b=0;   
while ($newArray1 = mysql_fetch_array($result1)){
	$b++;
	$itemID = $newArray1['itemID']; 
	//echo $itemID;
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
		<td  align="center"><?php  echo $newArray3['priceQuote']; ?></td>  
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
