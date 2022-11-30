<?php
session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php"); }
		 
		 error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit']))
			{	include("../../Include_Connection.php");
				$CatId=$_GET['PurCat'];
				$sql = "SELECT * FROM item,category WHERE (category.catId=item.itemCatID and catId='$CatId')"; 
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
			 	while ($newArray = mysql_fetch_array($result))
					{
						$qty=$_GET[$newArray['itemID']];
						$quanItemID=$newArray['itemID'];
						$quanstaID= $_GET['PurStation'];
						$projectYear = date("Y");
						$date= $_GET['PurDate'];
						$currDate= $_GET['purtodayDate'];
	
						$sql12="INSERT INTO quantity (quantityID, projectYear, date, actualQuantity, quanItemID,quanCatID, quanstaID, currDay) VALUES ('', '$projectYear', '$date', '$qty', '$quanItemID', '$CatId', '$quanstaID','$currDate')";
								
						if(mysql_query($sql12, $conn))
						{
			 				echo("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Records added Successfully !')
							</SCRIPT>");
						}
						else
						{
							echo "Error".mysql_error();	
						}

//header("Location:quote.php?msg=$txt");
		}
	
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
   		 <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    	<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
					<?php
					include("include_inquirySubMenu.php");
					?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 
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
   	 	<td width="790" height="450"valign="top" align="center" bgcolor="#FFFFCC"><br/><h3 class="pageHeading">Consumed/Purchased Quantity Collection Page</h3>
    
                  
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

<table width="500" border="0" cellpadding="5"  cellspacing="0" align="center" >
     
  <tr class="p3">
 		<td >User Name</td>
 		<td><?php	echo $_SESSION['user4'];?>
  </tr>
  <tr class="p3">
		 <td >Date</td>
 		 <td><?php $today = date("F j, Y"); echo  $today; ?> </td>
 </tr>
 <tr class="p3">
  		<td>Project Year</td>
  		<td><?php $projectYear = date("Y");  echo $projectYear;?> </td>
  </tr>
  <tr class="p3">
    	<td>Month</td> 
    	<td><select name="month" >
        <option value="January">January</option>
         <option value="February">February</option>
          <option value="March">March</option>
           <option value="April">April</option>
            <option value="May">May</option>
             <option value="June">June</option>
              <option value="July">July</option>
               <option value="August" >August</option>
                <option value="September">September</option>
                 <option value="October">October</option>
                  <option value="November">November</option>
                   <option value="December">December</option>
        
        
        </select>
        </td>
 	</tr> 
     
     			<?php //Select Stattion============================================
					include("../../Include_Connection.php");
					 $sql = "SELECT * FROM station";
					 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
     
     <tr class="p3">
   	 	<td>Station Name</td>
    	<td><select name="seleStation">
			<option>Select Station</option>
			<?php
		 	while ($newArray = mysql_fetch_array($result)) 
			 { ?>
          	<option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleStation']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
			<?php  }  ?> 
        	</select>
		</td>
      </tr>
   		
		
					<?php //Select Category============================================
						include("../../Include_Connection.php");
 						$sql = "SELECT * FROM category ";
 						$result = mysql_query($sql, $conn) or die(mysql_error());
 					?>
 	 <tr class="p3">
    	<td>Category Name</td>
    	<td><select name="seleCategory">
			<option>Select Category</option>	
			<?php  
			while ($newArray = mysql_fetch_array($result)) 
			 { 	?>
    		<option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCategory']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
   			 <?php  }
			?>
    		</select>
        </td>
  </tr>
  <tr>
  		<td colspan="2" align="center"> <input type="submit" name="Sersubmit" value="Display" /></td>
  </tr>
</table>
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// -->
  
 
    			<?php 
					if(isset($_GET['Sersubmit']))
					{
 				?>
                
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

  				<?php //retrieve item infor===================================
 					$Id= $_GET['seleCategory'];
					include ("../../include_Connection.php");
					$sql = "SELECT * FROM item WHERE (itemCatID='$Id')";
					 $result = mysql_query($sql, $conn) or die(mysql_error()); 
		 		?>
 
<table width="600" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" class="subtableheading">
   		 <td width="50">Item No</td>
    	 <td width="200">Item Name</td>
    	 <td width="100">Weight</td>
    	 <td width="50">UOM</td>
          <td width="50">Deno</td>
   		 <td width="150">Purchased Quantity</td>
 	 </tr>
     	
 	 		<?php
   				$a=1;$b=0;
   				while ($newArray = mysql_fetch_array($result))
				{ $b++; $cv=$newArray['itemName'];
				if($a%2==1)
	 				{$bg="tableBg1";}
	 			 else{$bg="tableBg2";}
			?>
	  <tr class="<?php echo $bg; ?>">
        	<td height="30"  align="center"><?php echo $b; ?></td>
			<td align="left"><?php echo $newArray['itemName']; ?></td>
		 	<td align="left"><?php echo $newArray['weight']; ?></td>
     		<td  align="center"><?php echo $newArray['UOM']; ?></td>
     		<td  align="center"><?php echo $newArray['denomination']; ?></td>
		 	<td> <input name="<?php echo $newArray['itemID']; ?>" type="text" /> </td>
     	
     </tr>
			<?PHP  $a++; } ?>	
     <tr>
        	<td colspan="6" align="center">
        		<input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;
        		<input name="reset" type="reset" value="Reset" />
       			<input type="hidden" name="PurStation" value="<?php echo $_GET['seleStation']; ?>" />
        		<input type="hidden" name="PurCat" value="<?php echo $_GET['seleCategory']; ?>" />
         		<input type="hidden" name="PurDate" value="<?php echo $_GET['month']; ?>" />
         		<input type="hidden" name="puryear" value="<?php echo $_GET['proYear'];  ?>" /> 
         		<input type="hidden" name="purtodayDate" value="<?php echo $today; ?>" />
        	</td>
       </tr>	
</table>     	 	
     			<?php } ?> 
</form>    
 <!-- /////////////////////////////form2 ending////////////////////////////// -->    			</td>
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
