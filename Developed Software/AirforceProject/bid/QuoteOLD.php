<?php 
session_start(); 
if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
{ 	header("Location:../login.php");	 }

error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit']))
{
	
	
include("../Include_Connection.php");
$CatId=$_GET['PurCat'];
$sql111 = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID and catId='$CatId')"; 
 $result111 = mysql_query($sql111, $conn) or die(mysql_error()); 
 while ($newArray111 = mysql_fetch_array($result111))
{
	$price=$_GET[$newArray111['itemID']];
	$priceItemID=$newArray111['itemID'];
	$pricestaID= $_GET['PurStation'];
	$date=$_GET['purDate'];
	$proYear=$_GET['puryear'];
	$bidder=$_GET['purbidder'];
	
	$sql112="INSERT INTO bidquote (bidQuoteID,  date, projYear,  bQitemID, bQstaID, bQcatID, bQSupId, priceQuote) VALUES ('', '$date', '$proYear', '$priceItemID', '$pricestaID', '$CatId', '$bidder', '$price')";
	echo "<p>".$sql112."</p>";
	if(mysql_query($sql112, $conn))
	{
		echo " Records Added successfully";
	}
	else
	{
		echo "Error".mysql_error();	
	}
	

	
	
}
header("Location:quotePriceView.php?msg=$txt");

	
}
?>
<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("../include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
	<?php
	include("include_quoteMenu.php");
	?>
<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_bidSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" height="400" ><br/>
    <p class="pageHeading" >Price Schedule - Insert Page</p>
    
<!--///////////////////////Start Form 1/////////////////////////////-->    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get" name="form2">
    
   <p align="left">  <?php		    			  
	   			$bidderName=$_SESSION['comName']; 
				error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
				$sql = "SELECT * FROM  login, supplier  WHERE (supplier.supLogID=login.login_Id AND compName='$bidderName')";
				 $result = mysql_query($sql, $conn) or die(mysql_error()); 
	  				$newArray = mysql_fetch_array($result);
						$bidID=$newArray['supplierID'];
						?>
                                                </p>
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p>  
 <hr/>      
      <?php
  	 error_reporting(E_ALL ^ E_NOTICE);
include ("../include_Connection.php");
 $sql = "SELECT * FROM  station, bid   WHERE (station.stationId=bid.bidStatID AND  bidSupID='$bidID' AND projectYear='$projectYear') GROUP BY stationName "; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
?>
     
   
   	 	<p align="left">Station Name
    	<select name="seleStat">
		<option>Select Station</option>
		<?php
		 while ($newArray = mysql_fetch_array($result)) 
		 { ?>
          <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
		<?php  }  ?> 
        </select>&nbsp;&nbsp; <input type="submit" name="serStat" value="SELECT" /></p>

<!-- //////////////////////////////Display Category Name////////////////////////////// --> 
   		<?php
 	
	if(isset($_GET['serStat']))
{
	 $Id= $_GET['seleStat'];
	 //echo $Id;
	 include("../Include_Connection.php");
 	$sql ="SELECT * FROM  category, bid  WHERE (category.catId=bid.bidCatID AND bidSupID ='$bidID' AND bidStatID='$Id' AND 	projectYear=' $projectYear' )";

 	 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 	?>
  
 <p align="left"> Category Name
    <select name="seleCategory">
	<option>Select Category</option>	
<?php  
	while ($newArray = mysql_fetch_array($result)) 
 { 	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php  }
	?>
    </select>&nbsp;<input type="submit" name="Sersubmit" value="Display" /></p>
      <?php  }
	?>
   </form>
   
   
   	
     
   
<!--///////////////////////End Form 2/////////////////////////////-->        
 <?php 
	
	if(isset($_GET['Sersubmit']))
{
 ?>
 
<!--///////////////////////Start Form 2/////////////////////////////--> 
<form action="" method="get" name="form1">
 <table width="500" border="0" cellpadding="5" cellspacing="0">
  <tr>
  	<td colspan="2">
    <?php
	include ("../include_Connection.php");
	$sql="SELECT * FROM  bidquote WHERE bQSupId='$bidID' AND	projYear='$projectYear' AND bQstaID='$_GET[seleStat]' AND bQcatID='$_GET[seleCategory]'";
	//echo $sql;
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$numRow=mysql_num_rows($result);
  if($numRow>0)
		{		
		echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Already quoted for this Bid! Go to View Page')
	
	</SCRIPT>"); }

	
 else{
	 $id=$_GET['seleCategory'];
include ("../include_Connection.php");
$sql1 = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID AND catId='$id')"; 

 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
 ?>
 
<table width="700" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" class="subtableheading">
   		 <td width="50">Sr No</td>
    	 <td width="300">Item Name</td>
    	 <td width="80">UOM</td>
    	 <td width="80">Quantity</td>
          <td width="50">Price(Rs)</td>
   		
        <!-- <td width="50">Total Price(Rs)</td>-->
 	 </tr>
     	
 	 <?php
   $a=1;
   $b=0;
 while ($newArray1 = mysql_fetch_array($result1))
 
 {$b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
	 //$item=$newArray['quanItemID'];
?>
  <tr class="<?php echo $bg; ?>">
    
    	<td height="30"  align="center">
			<?php echo $b; ?>
     	</td>
     	<td align="left">
		 	<?php echo $newArray1['itemName']; ?><input name="<?php $itemNo= $newArray1['itemID']; ?>" type="hidden"/>
     	</td>
     	<td align="left">
		 	<?php echo $newArray1['weight']; ?><?php echo $newArray1['UOM']; ?>
     	</td>
        
<!--////////////////////////////////////////////////////////////////-->        
       <?php
	$itemID=$newArray1['itemID'];   
$sql2="SELECT quanItemID, actualQuantity FROM quantity WHERE quanItemID='$itemID'";
$result2 = mysql_query($sql2, $conn); 
$actualQuantityTot=0;
while($newArray2 = mysql_fetch_array($result2)) {
$actualQuantityTot=$actualQuantityTot+	$newArray2['actualQuantity'];
}
	
 ?>
 <!--////////////////////////////////////////////////////////////////-->
    	<td  align="center">
			<?php echo $actualQuantityTot; ?>
    	</td>
  
    <td>
        	
            <input name="<?php echo $newArray1['itemID']; ?>" type="text" size="15" />
           
        </td>
        
      <!--	  <td>
        	
            <input name="getTot" type="button" value="total" />
           
        </td>-->
       
  </tr>
 
	<?PHP  $a++; } ?>
     
  </table>
  
  </td>
  </tr>
  <tr>
        <td colspan="2" align="center">
        <input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;
        <input name="reset" type="reset" value="Reset" />
         <input type="hidden" name="PurStation" value="<?php echo $_GET['seleStat']; ?>" />
        <input type="hidden" name="PurCat" value="<?php echo $_GET['seleCategory']; ?>" />
        <input type="hidden" name="purDate" value="<?php echo $today; ?>" />
        <input type="hidden" name="purbidder" value="<?php echo  $bidID; ?>" /> 
        <input type="hidden" name="puryear" value="<?php echo $projectYear; ?>" /> 
        
        
        
        </td>
      <?php
}
?>	
  	</tr>
   
    
   </table>
  
 <?php
}
?>

   </form>
    <?php if(isset($_GET['getTot'])){} ?>

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
