<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }
if($_GET['seleCate']=="SELECT" || !empty($_GET['Select']) || isset($_GET['seleCate']) )

{error_reporting(E_ALL ^ E_NOTICE);
	
	include("../Include_Connection.php");
	
	$sql ="SELECT * FROM  category (category.catId=prequalificate.catId AND station.stationId=prequalificate.stID AND  stID='$sID' AND  supId='$bID' )";
	echo $sql;
	 $result = mysql_query($sql, $conn) or die(mysql_error()); 
	 $staID= $_GET['stationName'];
	 echo  $staID;
	 $bidderID=$_GET['bidderName'];
	 $category=$_GET['category'];
	echo  $bidderID;
	while ($newArray = mysql_fetch_array($result))
{
	$CatId=$_GET[$newArray['catId']];
	
	$sql="UPDATE  prequalificate SET (isQualified=1) VALUES ('$CatId') WHERE stID='$staID' AND supId='$bidderID' AND $category='catId'";
	echo "<p>$sql</p>";
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	
	
}
header("Location:PQlistInsert1.php?msg=$txt");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function val()
{
var answer=window.confirm("Are you sure?");
return answer;
}
</script>

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
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	//include("../admin/staffOfficer/includeOfficerSubmenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF">
    <h2><br/><br/>Pre-qualifed List Insert Page</h2>
    
<form action="" method="get" name="form1">

<!-- ////////////////////////////// Start Select Bidder////////////////////////////// --> 
<?php
 error_reporting(E_ALL ^ E_NOTICE);
include("../Include_Connection.php");
		 $sql ="SELECT * FROM  supplier, prequalificate   WHERE (supplier.supplierID=prequalificate.supId ) GROUP BY compName";
		  $result = mysql_query($sql, $conn) or die(mysql_error());

?>

<h4>Select Bidder
<select name="SerBidder">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['supId']; ?>" <?php if($newArray['supId']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['compName']; ?> </option>
    <?php
 }
	?>
</select> <input type="submit" name="seleBidder" value="SEARCH" /></h4>
<!-- ////////////////////////////// End Select Bidder////////////////////////////// --> 

<!-- ////////////////////////////// start Select station////////////////////////////// --> 
<?php
		if(isset($_GET['seleBidder']))
		{
				 $Id= $_GET['SerBidder'];
				 
 error_reporting(E_ALL ^ E_NOTICE);
		include("../Include_Connection.php");
		 $sql ="SELECT * FROM  station,  supplier, prequalificate   WHERE (station.stationId=prequalificate.stID AND  supplier.supplierID=prequalificate.supId AND supId='$Id')GROUP BY stationName";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
	 		?>
 <h4>Select Station : <select name="SerStat">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['stID']; ?>" <?php if($newArray['stID']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    <?php
 }
	?>
</select> <input type="submit" name="seleStat" value="SEARCH" /></h4>     <?php
 }
	?>       
            
            
<!-- ////////////////////////////// end Select station////////////////////////////// --> 
</form>
       
 
<form action="<?php $_SERVER['../admin/staffOfficer/PHP_SELF']?>" method="get" name="form2" >
    <?php 
	if(isset($_GET['seleStat']))
{
	  $sID= $_GET['SerStat'];
	  $bID=$_GET['SerBidder'];
	 
    include("../Include_Connection.php");
	
	$sql ="SELECT * FROM  category, station, prequalificate  WHERE (category.catId=prequalificate.catId AND station.stationId=prequalificate.stID AND  stID='$sID' AND  supId='$bID' )";


 // execute the SQL statement
 $result = mysql_query($sql, $conn) or die(mysql_error());
 
 ?>
   
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Station Name</td>
    <?php
		if(isset($_GET['seleBidder']))
		{
				 $Id= $_GET['SerBidder'];
				 
 error_reporting(E_ALL ^ E_NOTICE);
		include("../Include_Connection.php");
		 $sql ="SELECT * FROM  station,  supplier, prequalificate   WHERE (station.stationId=prequalificate.stID AND  supplier.supplierID=prequalificate.supId AND supId='$Id')GROUP BY stationName";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
	 		?>
    <td>
 <h4>Select Station : <select name="SerStat">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['stID']; ?>" <?php if($newArray['stID']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    <?php
 }
	?>
</select> <input type="submit" name="seleStat" value="SEARCH" /></h4>      </td><?php
 }
	?>      
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


 <input name="bidderName" type="hidden" value="<?php echo $_GET['SerBidder']; ?>" />
  <input name="stationName" type="hidden" value="<?php echo $_GET['SerStat']; ?>" />
   <input name="seleCate" id="seleCate" type="submit" value="Select" />
<?PHP   } ?>
    </form>
 <!-- //////////////////////////////Form2 End////////////////////////////// -->
    </td>

   </tr>
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
