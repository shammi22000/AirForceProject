<?php 
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }
		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit']))
		{
	
//====================================================================================

			$CatId=$_GET['PurCat'];
			include("../Include_Connection.php");
			$sql111 = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID and catId='$CatId')"; 
 			$result111 = mysql_query($sql111, $conn) or die(mysql_error()); 
 			while ($newArray111 = mysql_fetch_array($result111))
			{
				$priceItemID=$newArray111['itemID'];	
				$price=$_GET[$newArray111['itemID']];
				$grand=$price*$actualQuantityTot;
				$priceItemID=$newArray111['itemID'];
				$pricestaID= $_GET['PurStation'];
				$date=$_GET['purDate'];
				$proYear=$_GET['puryear'];
				$bidder=$_GET['purbidder'];
	
			$sql112="INSERT INTO  price (priceId,  priceItemID, price,  brandName, priceDate, isRetail, source, priceCatID) VALUES ('', '$date', '$proYear', '$priceItemID', '$pricestaID', '$CatId', '$bidder', '$price', '$grand')";
				if(mysql_query($sql112, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Already Inserted the qualification! Go to Company Infor View Page')
						</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				}
	}

}
?>
<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
<tr>
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("../../include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("includeOfficerSubmenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="450"valign="top" align="center" bgcolor="#FFFFFF"><h2>Price Insert Page </h2>


<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
   				<?php //retrieve selected categories for bid infor ========================================
 				if(isset($_GET['serStat']))
				{
	 			$Id= $_GET['seleStat'];
	 	 		include("../../Include_Connection.php");
 				$sql ="SELECT * FROM  category";
 	 			$result = mysql_query($sql, $conn) or die(mysql_error()); 
 				?>
  
<p align="left"> Category Name
    			<select name="seleCategory">
				<option>Select Category</option>	
				<?php  
				while ($newArray = mysql_fetch_array($result)) 
 				{ 	?>
    			<option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray[' 	catName']; ?> </option>
   				 <?php  }?>	
    			</select>&nbsp;<input type="submit" name="Sersubmit" value="Display" />
</p>
      			<?php  }?>
	
</form>
<!-- /////////////////////////////form1 ending////////////////////////////// -->   
   
   
 			<?php 
			if(isset($_GET['Sersubmit'])){
			 ?>
 
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

 <table width="500" border="0" cellpadding="5" cellspacing="0">
  <tr>
  		<td colspan="2">
    		<?php
				include ("../include_Connection.php");
				$sql="SELECT * FROM  bidquote WHERE bQSupId='$bidID' AND	projYear='$projectYear' AND bQstaID='$_GET[seleStat]' AND bQcatID='$_GET[seleCategory]'";
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
   	</tr>
     	
 	 		<?php
   				$a=1;
   				$b=0;
 				while ($newArray1 = mysql_fetch_array($result1))
  				{$b++;
	 				if($a%2==1)
	 				{$bg="tableBg1";}
	 	 			else{$bg="tableBg2";}
	 		?>
  <tr class="<?php echo $bg; ?>">
        <td height="30"  align="center"><?php echo $b; ?></td>
		<td align="left"><?php echo $newArray1['itemName']; ?><input name="<?php $itemNo= $newArray1['itemID']; ?>" type="hidden"/></td>
		<td align="left"><?php echo $newArray1['weight']; ?><?php echo $newArray1['UOM']; ?></td>
		 	 	
        
       			<?php //retrieve total actual quantity =======================================================================
					$itemID=$newArray1['itemID'];   
					$sql2="SELECT quanItemID, actualQuantity FROM quantity WHERE quanItemID='$itemID' and projectYear='$projectYear' and quanstaID='$_GET[seleStat]'";
					 $result2 = mysql_query($sql2, $conn); 
					$actualQuantityTot=0;
					while($newArray2 = mysql_fetch_array($result2)) {
					$actualQuantityTot=$actualQuantityTot+	$newArray2['actualQuantity'];
					}
	
			 ?>
    	<td  align="center"><?php echo $actualQuantityTot; ?></td>
        <td> <input name="<?php echo $newArray1['itemID']; ?>" type="text" size="15" /></td>
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
         	<input name="actQuan" type="text"value="<?php echo $actualQuantityTot; ?>" />
        </td>
      			<?php }?>	
</tr>
</table>
  
				 <?php }?>
 </form>
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
