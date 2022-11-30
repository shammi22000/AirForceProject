<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }
 
		 error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="SUMBIT" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{

			include ("../include_Connection.php");
			$sql= "INSERT INTO inquiry (inqID, inqSupId, inqDate, projYear,  inq_TypeID, inqStatId, inqCatId, inqItemId, inqDesc, appPrice, reqesPrice, appBrand, reqesBrand) VALUES ('', '$_GET[supID]', '$_GET[todayDate]', '$_GET[proYear]', '$_GET[seleInq]', '$_GET[seleSta]', '$_GET[seleCat]', '$_GET[seleItem]', '$_GET[txtdesc]', '$_GET[txtprice]', '$_GET[txtreqestprice]', '$_GET[txtbrand]', '$_GET[txtreqest]')";
				if (!mysql_query($sql,$conn))
				{
	  				$msg="Error: ". mysql_error();
				}
				else
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Already Insert this record! Go to Bank info View Page')
					</SCRIPT>");
				}
		//header("Location:inquiry.php?txt=$msg");
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
 
  <tr>
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
			include("include_bidderSubMenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
   		 <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
    
<h3 class="pageHeading">Appeal/Inquiries</h3>
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
 <p align="left"> 
  
 				<?php  //retrieve bidder Id and company name==================================== 
	    		$bidderName=$_SESSION['comName']; 
	 		 	error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
				$sql = "SELECT * FROM  login WHERE (name='$bidderName')";
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  			$newArray = mysql_fetch_array($result);
				$bidID=$newArray['login_Id'];
				?>
</p>                                               
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("d/m/Y ");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
 
 
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
     
<div class="container">
<table width="700" border="0" cellpadding="5" bgcolor="#CCCCCC" class="subtable3">
  
  			 <?php // retrieve inquiry type===========================
 			include("../Include_Connection.php");
 			$sql = "SELECT * FROM inquiry_type";
			$result = mysql_query($sql, $conn) or die(mysql_error()); 
 			?>
  <tr>
    	<td>Inquiry Type</td>
   		 <td>
    		<select name="seleInq"> 
			<?php  
			while ($newArray = mysql_fetch_array($result)) 
			 {
			?>
    		<option value="<?php echo $newArray['inqTypeID']; ?>" <?php if($newArray['inqTypeID']==$_GET['seleInq']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['inqName']; ?> </option>
    		<?php
	 		}
			?>
    		</select>
    	</td>
  </tr>
  <tr>
    	<td>Related Project Year</td>
    	<td><input name="proYear" type="text" /></td>
  </tr>
   				<?php //retrieve station details =====================================
  				include("../Include_Connection.php");
  				$sql = "SELECT * FROM station "; 
  				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	 			?>
   <tr>
    	<td>Select the related station</td>
    	<td><select name="seleSta">
			<?php while ($newArray = mysql_fetch_array($result)) 
	 		{
			?>
   			 <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleSta']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    		<?php
	 		}
			?></select>
        </td>
  </tr>
  
  				<?php //retrieve category details =====================================
 	 			include("../Include_Connection.php");
 				$sql = "SELECT * FROM category "; 
 	 			$result = mysql_query($sql, $conn) or die(mysql_error()); 
 				?>
   
   <tr>
    	<td>Select the related category</td>
    	<td><select name="seleCat" >
			<?php while ($newArray = mysql_fetch_array($result)) 
	 		{
			?>
   			 <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCat']) {  ?> selected="selected" <?php } ?> ><?php echo substr($newArray['catName'],0,25);?> </option>
    		<?php
			 }
			?>
       	 	</select>
    	</td>
  </tr>
  
  				<?php //retrieve item details =====================================
 	 			include("../Include_Connection.php");
 				$sql = "SELECT * FROM item "; 
 				$result = mysql_query($sql, $conn) or die(mysql_error()); 
			 	?>
   
 
  <tr>
    	<td>Item Name</td>
        <td><input name="seleItem" type="text" /><span style="font:'Courier New', Courier, monospace; color:#999;">(eg.Bread/All Items)</span> </td>
  </tr>
  <tr>
    	<td colspan="2"><hr/></td>
   </tr>
  <tr>
    	<td colspan="2"><em>If appeal/inquiry type is "Price revision". Fill following fields</em></td>
  </tr>
  <tr>
    	<td>Approved Price</td>
    	<td><input name="txtprice" type="text" /></td>
   </tr>
   <tr>
   		<td>Request Price</td>
    	<td><input name="txtreqestprice" type="text" /></td>
   </tr>
   <tr>
    	<td colspan="2"><hr/></td>
   </tr>
    <tr>
    	<td colspan="2"><em>If appeal/inquiry type is "Change a brand name". Fill following fields</em></td>
   </tr>
   <tr>
    	<td>Approved Brand Name</td>
    	<td><input name="txtbrand" type="text" /></td>
  </tr>
   <tr>
    	<td>Requested Brand Name</td>
    	<td><input name="txtreqest" type="text" /></td>
  </tr>
   <tr>
    	<td colspan="2"><hr/></td>
   </tr>
   <tr>
    	<td colspan="2">Description</td>
   </tr>
   <tr>
   		<td colspan="2">
   		<textarea name="txtdesc" cols="50" rows="10"></textarea></td>
  </tr>
  <tr>
   		<td>&nbsp;</td>
   		<td>
   			<input name="submit" type="submit" value="SUMBIT" /> 
   			<input name="reset" type="button" value="Cancel" />
   			<input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['supplierID']; ?>" />
    		<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    		<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    		 <input name="supID"  id="supID" type="hidden" value="<?php echo $bidID; ?>" />
  </tr>
</table>

      </div>
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
