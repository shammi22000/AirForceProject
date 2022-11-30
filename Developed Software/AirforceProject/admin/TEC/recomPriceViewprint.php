 <form  name="form3" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">  
    <?php
		if(isset($_GET['catSubmit']))
		{
			$minuteDate=$_GET['serDate'];
			
		$proYear=$_GET['serYear'];
		$CatID= $_GET['SeleCat'];
		$statID= $_GET['seleStation'];
		}
 		?>
         <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM supplier, bid WHERE supplier.supplierID=bid.bidSupID AND bidStatID='$statID' AND bidCatID='$CatID'  AND projectYear='$proYear' AND isSelected='1'";
	
	 $result = mysql_query($sql, $conn) or die(mysql_error());
	 $newArray = mysql_fetch_array($result);
	 $bidID=$newArray['supplierID'];
	 //echo $bidID;
	 $tableID=$newArray['bidId'];
	 
 	 ?>
     <p  align="left"><strong>Selected Bidder Name : <?php echo $newArray['compName']; ?> </strong></p>
     
     <input name="bidId" type="hidden"  value="<?php echo $newArray['supplierID']; ?>"/>
    
        
   </form>     
<!-- //////////////////////////////Select Bidder Name////////////////////////////// -->
   
    
              
  <form  name="form2" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">        
<!-- //////////////////////////////Connect to the Database////////////////////////////// -->
 
        <?php
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
$CatID= $_GET['SeleCat'];	
//$SupplID= $_GET['bidId'];
 
include ("../../include_Connection.php");
$sql = "SELECT * FROM item, bidquote WHERE (item.itemID=bidquote.bQitemID AND bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$proYear' AND bQSupId=' $bidID')"; 
//echo $sql;
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 //$newArray = mysql_fetch_array($result);
 
 ?>
     
     <div class="container">
    
 <table width="500" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40" width="60">No</td>
    <td width="300">Item Name</td>
    <td width="100">UOM</td>
    <!-- <td width="75">Quoted Price (Rs)</td>
    <td width="75">Suggested Price(Rs)</td>-->
     <td width="75">TEC Recomended Price(Rs)</td>
   
  
    
     </tr>
<!-- //////////////////////////////Fetch data from selected tables////////////////////////////// -->
<?php
   $a=1;
   $b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
  <?php $itemID=$newArray['itemID']; ?>
    <td height="30"  align="center"><?php  echo $b; ?></td>
        <td align="left"><?php echo $newArray['itemName']; ?></td>
    <td  align="center"><?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>&nbsp; <?php echo $newArray['denomination']; ?></td>
 
     <?php $quote=$newArray['priceQuote']; ?> 
 <!--  <td  align="center"><?php //echo $quote;?></td>-->
  
      
   <? include ("../../include_Connection.php");
$sql1 = "SELECT * FROM item,  tecsuggest WHERE (item.itemID=tecsuggest. 	sugeItemID AND sugeItemID='$itemID')";
//echo  $sql1;
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
$newArray1 = mysql_fetch_array($result1);
 $suggPrice=$newArray1['TECprice'];
 ?>
  <!--     <td  align="right"><?php echo $suggPrice; ?></td>-->
       
       <td  align="center"><?php 
	   
	   if($suggPrice<$quote)
	   
	   {
		    $recPrice=$suggPrice; 
			}
	   else { 
	   			$recPrice=$quote;
	   		 }
	   echo $recPrice;
	   ?>
	   
       </td>
   
 
  
	<?PHP  $a++; } ?>

</table>

</div>
 <BR/>
<input type="submit" name="submit" value="SUBMIT" />
<input type="hidden" name="PurStation" value="<?php echo $_GET['seleStation']; ?>" />
        <input type="hidden" name="PurCat" value="<?php echo $_GET['SeleCat']; ?>" />
         <input type="hidden" name="PurDate" value="<?php echo $today ; ?>" />
         <input type="hidden" name="MinuteDate" value="<?php echo $_GET['MDate']; ?>" /><input type="hidden" name="proyear" value="<?php echo  $_GET['serYear']; ?>" />
         <input type="hidden" name="bidder" value="<?php echo $bidID; ?>" /> <input type="button" value="Print" onclick="printpage()" /><br/>&nbsp;&nbsp;
</form>
