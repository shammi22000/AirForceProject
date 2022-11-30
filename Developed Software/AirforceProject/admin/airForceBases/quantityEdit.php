<?php
session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php");  }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="UPDATE" )
			{		
				$actQuan=$_GET['quan'];
				$date=$today;
				$currDate= $_GET['purtodayDate'];                
	
			include("../../Include_Connection.php");
	 		$sql="UPDATE quantity SET  actualQuantity='$actQuan', currDay='$currDate' WHERE (quantityID='$_GET[preId]') ";
				if(mysql_query($sql, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Successfully edited record!')
					</SCRIPT>");
				}
				else
	
				{
					$txt="Error".mysql_error();	
				}
	header("Location:quantityView.php?msg=$txt");
}	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
   <tr>
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
				include("include_BaseSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 
		</td>
    	<td width="790" height="450"valign="top" align="center" bgcolor="#FFFFCC"><br/><h3 class="pageHeading">Consumed/Purchased Quantity Collection Edit Page</h3>
      

  					<?php
						include("../../Include_Connection.php");
						$id=$_GET['ID'];
				 		$sql ="SELECT * FROM  station, category, item, quantity  WHERE (station.stationId=quantity.quanstaID AND category.catId=quantity.quanCatID AND item.itemID=quantity.quanItemID AND  quantityID='$id')";
	 					// execute the SQL statement******************************
	 					$result = mysql_query($sql, $conn) or die(mysql_error());
	 					$newArray = mysql_fetch_array($result);
 						//go through each row in the result set and display data******************
	 				?>

<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

<table width="500" border="1" cellpadding="10" bgcolor="#EAEAEA">
  <tr>
 		<td class="subtableheading">Date</td>
 		<td><p><?php $today = date("F j, Y, g:i a"); echo  $today; ?></p> </td>
  </tr>
  <tr>
 		<td class="subtableheading">Project Year</td>
 		<td><p><?php echo $newArray['projectYear']; ?></p> </td>
  </tr>
   <tr>
 		<td class="subtableheading">Month</td> 	
 		<td><p><?php echo $newArray['date']; ?> </p> </td>
  </tr>
  <tr>
   		 <td width="100" class="subtableheading">Station Name</td>
     	<td><p><?php echo $newArray['stationName']; ?></p> </td>          
  </tr>
  <tr>
    	<td class="subtableheading">Category Name</td>
    	 <td> <p><?php echo $newArray['catName']; ?> </p>
 </td>
  </tr>
  <tr>
    	<td class="subtableheading">Item Name</td>
     	<td> <p><?php echo $newArray['itemName']; ?>&nbsp;(<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>)</p>
 </td>
  </tr>
  <tr>
    	<td class="subtableheading">Purchased Quantity</td>
    	<td> <input name="quan" id="quan" type="text" value="<?php echo $newArray['actualQuantity']; ?>" /></td>
  </tr>
  <tr>
  		<td colspan="2" align="center">
  			<input name="submit" id="submit" type="submit" value="UPDATE" />
  			<input name="cancel" id="cancel" type="reset" value="CANCEL" />
  			<input name="preId" id="preId" type="hidden" value="<?php echo $id; ?> " />
 			<input name="purtodayDate" id="purtodayDate" type="hidden" value="<?php echo $today; ?> " />
  		</td>
  </tr>
 
</table>
</div><br/><br/>
</form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

   	 </td>
  </tr>
    
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
