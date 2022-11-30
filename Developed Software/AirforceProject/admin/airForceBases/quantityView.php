<?php
	session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php");  }
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
    	<td width="790" height="450"valign="top" align="center" bgcolor="#FFFFCC"><br/><h3 class="pageHeading">Consumed/Purchased Quantity Collection View Page</h3>
      

<div class="container">
 <table border="0" cellspacing="0" cellpadding="10" width="500" align="center">
    <tr>
    	<td>
        
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
    
<table width="500" border="0" cellpadding="5"  cellspacing="0" align="center" >
    			 <?php //Select Project Year ============================================
					include("../../Include_Connection.php");
			 		$sql = "SELECT * FROM quantity GROUP BY projectYear";
			 		$result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
     
    <tr>
   	 	<td><p>Project year</p></td>
    	<td><select name="surYear">
			<option>Select year</option>
			<?php
			 while ($newArray = mysql_fetch_array($result)) 
			 { ?>
         	 <option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['surYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
			<?php  }  ?> 
       		 </select>
		</td>
    </tr>
    <tr>
    	<td>Month</td> 
    	<td><select name="month">
        <option value="January">January</option>
         <option value="February">February</option>
          <option value="March">March</option>
           <option value="April">April</option>
            <option value="May">May</option>
             <option value="June">June</option>
              <option value="July">July</option>
               <option value="August">August</option>
                <option value="September">September</option>
                 <option value="October">October</option>
                  <option value="November">November</option>
                   <option value="December">December</option>
        
        
        </select>
        </td>
    	
 	</tr> 
     
     			<?php //Select Station ============================================
					include("../../Include_Connection.php");
	 				$sql = "SELECT * FROM station, quantity WHERE station.stationId=quantity.quanstaID GROUP BY stationName";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
     
     <tr>
   	 	<td><p>Station Name</p></td>
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
   				<?php //Select Category ============================================
					include("../../Include_Connection.php");
 					$sql = "SELECT * FROM category, quantity WHERE (category.catId=quantity.quanCatID) GROUP BY catName ";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
 				?>
  <tr>
    	<td><p>Category Name</p></td>
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
  		<td colspan="2" align="center"> <input type="submit" name="Sersubmit" value="Display" /></td></tr></table>
</form>
   
     	</td>
  </tr>
  <tr>
    	<td>
       				<?php 
						if(isset($_GET['Sersubmit']))
						{
 					?>
                    
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
    
<table width="500" border="0" cellpadding="5" cellspacing="0">
  <tr>
  		<td colspan="2">
   			 <?php
				 $catId= $_GET['seleCategory'];
 				$statId= $_GET['seleStation'];
			 	$year= $_GET['surYear'];
			 	$month= $_GET['month'];
 
				include ("../../include_Connection.php");
				$sql = "SELECT * FROM item, quantity WHERE (item.itemID=quantity.quanItemID AND projectYear='$year' AND date='$month' AND quanCatID=' $catId' AND quanstaID=' $statId')"; 
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
 			?>
 
<table width="600" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" class="subtableheading">
   		 <td width="50">Item No</td>
    	 <td width="200">Item Name</td>
    	 <td width="100">UOM</td>
    	 <td width="100">Purchased Quantity</td>
         <td width="50">Action</td>
 	 </tr>
     	
 			 <?php
   				$a=1;  $b=0;
  				while ($newArray = mysql_fetch_array($result))
 				{$b++;
				 if($a%2==1)
					 {$bg="tableBg1";}
	 					 else{$bg="tableBg2";}
			?>
  	<tr class="<?php echo $bg; ?>">
        	<td height="30"  align="center"><?php echo $b; ?></td>
			<td align="left"><?php echo $newArray['itemName']; ?></td>
     		<td align="left"><?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?> <?php echo $newArray['denomination']; ?></td>
     		<td align="right"><?php echo $newArray['actualQuantity']; ?></td> 
		 	<td colspan="2" align="center">
     	 		<a href="quantityEdit.php?ID=<?php echo $newArray['quantityID']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  &nbsp; &nbsp; 
    			<a href="quantityDelete.php?ID=<?php echo $newArray['quantityID']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
   			</td>
 	 </tr>
				<?PHP  $a++; } ?>
</table>
 
 		 </td>
  </tr>
  <tr>
        <td colspan="2" align="center">
        	<input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;
        	<input name="reset" type="reset" value="Reset" />
        	<input type="hidden" name="PurStation" value="<?php echo $_GET['seleStation']; ?>" />
        	<input type="hidden" name="PurCat" value="<?php echo $_GET['seleCategory']; ?>" />
         	<input type="hidden" name="PurDate" value="<?php echo $_GET['month']; ?>" />
         	<input type="hidden" name="Puryear" value="<?php echo $_GET['proYear']; ?>" />
        
        </td>
    	
  </tr>
</table>
 			<?php
 			} 
			?>

 </form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 
    
   		 </td>
  </tr>
</table>
</div>
       <br/><br/>
            
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
