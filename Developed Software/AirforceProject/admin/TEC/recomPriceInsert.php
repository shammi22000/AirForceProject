<?php

error_reporting(E_ALL ^ E_NOTICE);

if($_GET['recomend']=="Recommend" || !empty($_GET['recomend']) || isset($_GET['recomend']))

{ echo "Minute Date :<div class='demo' style='padding:0px'><input  name='dof' type='text' id='datepicker' ?>";
$StaID= $_GET['PurStation'];
$CatID= $_GET['PurCat'];
$year=$_GET['proyear'];
 $BidderID=$_GET['bidder']; 	
include ("../../include_Connection.php");
$sql = "SELECT * FROM item, bidquote WHERE (item.itemID=bidquote.bQitemID AND bQstaID='$StaID' AND bQcatID='$CatID' AND  projYear='$year' AND bQSupId=' $BidderID')"; 
//echo $sql;
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
  while ($newArray = mysql_fetch_array($result))
{
	$recPrice=$_GET[$newArray['itemID']];
	//echo "<p>itemID : ".$newArray['itemID']." - quntity".$newArray['itemID']." : ".$qty."</p>";
	$recPriceItemID=$newArray['itemID'];
	$minuteDate= $_GET['MinuteDate'];
	
	$currDate= $_GET['PurDate'];

 
include ("../../include_Connection.php");
	$sql1= "INSERT INTO tecrecommend (TCID, proYear, todayDate, MinuteDate, TRstaID, TRCatID, TRitemID, TRSupID, recomPrice) VALUES ('', '$year', '$currDate', '$minuteDate', '$StaID', '$CatID','$recPriceItemID', '$BidderID', '$recPrice' )";
	//echo $sql1;

if (!mysql_query($sql1,$conn))
	{
	  	echo "Error: ". mysql_error();
	}
else
	{
		echo "1 Record Added";
	}}
//header("Location:inquiry.php?txt=$msg");
}
?><!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../bid/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" height="650" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
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
	include("include_tecSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFCC" ><br/>
    <p class="pageHeading" >Compared Prices of Each Bid</p>
    
<form id="form1" name="form1" method="GET" action="<?php $_SERVER['PHP_SELF'];?>">
<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>Project Year:</td>
    <?php
 error_reporting(E_ALL ^ E_NOTICE);
include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  bid GROUP BY  projectYear";
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
        </select></td>
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
    </select>&nbsp;<input type="submit" name="catSubmit" value="SELECT" /></td>
  </tr>
  
</table>
 </form>
 

  		
 <form  name="form3" method="GET" action="<?php $_SERVER['PHP_SELF'];?>">  
    	<?php
		
		if(isset($_GET['catSubmit']))
		{
		$proYear=$_GET['serYear'];
		$CatID= $_GET['SeleCat'];
		$statID= $_GET['seleStation'];
		
 		?>
         <?php
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM login, bid WHERE login.login_Id=bid.bidSupID AND bidStatID='$statID' AND bidCatID='$CatID'  AND projectYear='$proYear' AND isSelected=1";
	// echo  $sql;
	 $result = mysql_query($sql, $conn) or die(mysql_error());
	 $newArray = mysql_fetch_array($result);
	 $bidID=$newArray['login_Id'];
	 $tableID=$newArray['bidId'];
	 
 	 ?>
     <p  align="left"><strong>Selected Bidder Name : <?php echo $newArray['name']; ?> </strong></p>
     
     <input name="bidId" type="hidden"  value="<?php echo $newArray['login_Id']; ?>"/>
    
        
       
<!-- //////////////////////////////Select Bidder Name////////////////////////////// -->
   
              
 
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
    
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40" width="60">No</td>
    <td width="300">Item Name</td>
    <td width="100">UOM</td>
     <td width="75">Quoted Price (Rs)</td>
    <td width="75">Suggested Price(Rs)</td>
     <td width="75">Compared Price(Rs)</td>
   
  
    
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
   <td  align="center"><?php echo $quote;?></td>
  
      
   <? include ("../../include_Connection.php");
$sql1 = "SELECT * FROM item,  tecsuggest WHERE (item.itemID=tecsuggest.	sugeItemID AND sugeItemID='$itemID')";
//echo  $sql1;
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
$newArray1 = mysql_fetch_array($result1);
 $suggPrice=$newArray1['TECprice'];
 ?>
       <td  align="right"><?php echo $suggPrice; ?></td>
       
       <td  align="center">
	   <?php 
	   
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
 </form>
</br></br>
  
<?PHP  }?>
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
