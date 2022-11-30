
<?php
session_start(); 
	if(!isset($_SESSION['user5']) || (empty($_SESSION['user5'])))
		{ 	header("Location:../login.php");	 }

 ?>
<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../bid/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script>
function printpage()
  {
  window.print()
  }
</script>
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
 <tr >
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_BaseMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SCAPCSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC">
    <h3 class="pageHeading" align="center">SCAPC Approved Prices View </h3>
    
   <form id="form1" name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <table width="500" border="0" cellspacing="0" cellpadding="5">
 
  
    <tr>
   <td>Minute Date :</td>
      <?php
 error_reporting(E_ALL ^ E_NOTICE);
include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  scapcrecommend GROUP BY   MinuteDate";
		  $result = mysql_query($sql, $conn) or die(mysql_error());

?>
    
     <td><select name="serDate" >
       <option value="-1">Minute Date</option>
       <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
       <option value="<?php echo $newArray['MinuteDate']; ?>" <?php if($newArray['MinuteDate']==$_GET['serDate']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['MinuteDate']; ?></option>
       <?php
 }
	?>
     </select></td>
  
   </tr>
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
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="catSubmit" value="DISPLAY" /></td>
 
  </tr>
</table>

 </form>
 
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
	 $sql = "SELECT * FROM login, bid WHERE login.login_Id=bid.bidSupID AND bidStatID='$statID' AND bidCatID='$CatID'  AND projectYear='$proYear' AND isSelected='1'";
	
	 $result = mysql_query($sql, $conn) or die(mysql_error());
	 $newArray = mysql_fetch_array($result);
	 $bidID=$newArray['login_Id'];
	 //echo $bidID;
	 $tableID=$newArray['bidId'];
	 
 	 ?>
     <p  align="left"><strong>Selected Bidder Name : <?php echo $newArray['name']; ?> </strong></p>
     
     <input name="bidId" type="hidden"  value="<?php echo $newArray['login_Id']; ?>"/>
    
        
   </form>     
<!-- //////////////////////////////Select Bidder Name////////////////////////////// -->
   
    
              
  <form  name="form2" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">        
<!-- //////////////////////////////Connect to the Database////////////////////////////// -->
 
        <?php
$proYear=$_GET['serYear'];
$StaID= $_GET['seleStation'];
$CatID= $_GET['SeleCat'];	
echo $CatID;
//$SupplID= $_GET['bidId'];
 
include ("../../include_Connection.php");
$sql = "SELECT * FROM item WHERE   itemCatID='$CatID'"; 
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
     <td width="75">SCAPC Approved price(Rs)</td>
   
  
    
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
$sql1 = "SELECT * FROM item,  scapcsuggest WHERE (item.itemID=scapcsuggest.sugeItemID AND sugeItemID='$itemID')";
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
<input type="hidden" name="PurStation" value="<?php echo $_GET['seleStation']; ?>" />
        <input type="hidden" name="PurCat" value="<?php echo $_GET['SeleCat']; ?>" />
         <input type="hidden" name="PurDate" value="<?php echo $today ; ?>" />
         <input type="hidden" name="MinuteDate" value="<?php echo $_GET['MDate']; ?>" /><input type="hidden" name="proyear" value="<?php echo  $_GET['serYear']; ?>" />
         <input type="hidden" name="bidder" value="<?php echo $bidID; ?>" />
          <input type="button" value="Print" onclick="printpage()" /><br/>&nbsp;&nbsp;
</form>
</td>
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

