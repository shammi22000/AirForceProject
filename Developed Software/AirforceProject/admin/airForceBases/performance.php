<?php

	session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php");  }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{	
			include ("../../include_Connection.php");
			$sql="INSERT INTO performance (perfID, perStaID, perCatID, perSupId, feedback, perDescrip, projYear, perfMonth, currDay) VALUES ('','$_GET[serStat]','$_GET[serCat]','$_GET[serSupp]','$_GET[serPerform]','$_GET[perDesc]','$_GET[proYear]', '$_GET[serMonth]', '$_GET[purtodayDate]' )";
				if(mysql_query($sql, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Record Added successfully!')
					</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				}
	//header("Location:performanceView.php?msg=$txt");
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
					include("include_PerformanceSubMenu.php");
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
   		 	<td width="790" valign="top" align="center" bgcolor="#FFFFCC"><h3 class="pageHeading">Performance of Suppliers </h3>
      
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
         
     
<div class="container">
<table width="500" border="0" cellpadding="5" class="p3">
   <tr>
 		<td class="p3">Date</td>
		 <td><p><?php $today = date("F j, Y, g:i a"); echo  $today; ?></p> </td>
  	</tr>
    <tr>
    	<td>Year</td>
   		 <td><?php $projectYear = date("Y");  echo $projectYear;?> </td>
    </tr>
    <tr class="p3">
    	<td>Month</td>
    	<td><select name="serMonth">
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
     
      			<?php //Select Bidder ============================================
				include("../../Include_Connection.php");
				 $sql = "SELECT * FROM supplier";
		 		$result = mysql_query($sql, $conn) or die(mysql_error());
 				 ?>
     <tr>
  		<td>Supplier Name</td>
   		 <td>
         		<select class="p3" name="serSupp">
    			<?php
				 while ($newArray = mysql_fetch_array($result)) 
				 { ?>
    
  	 			<option value="<?php echo $newArray['supplierID']; ?>">
	 			<?php echo $newArray['compName']; ?></option> <?php }  ?>
    	 		</select>
           </td>
  </tr> 
   			<?php //Select Station ============================================
			include("../../Include_Connection.php");
 			$sql = "SELECT * FROM station ";
 			$result = mysql_query($sql, $conn) or die(mysql_error());
 			 ?>
 	<tr>
   	 	<td>Station Name</td>
    	<td><select name="serStat" class="p3">
			<?php
		 	while ($newArray = mysql_fetch_array($result)) 
			 { ?>
 	 		<option value="<?php echo $newArray['stationId']; ?>">
	 		<?php echo $newArray['stationName']; ?></option>
			<?php }  ?> </select></td>
  </tr>
      
     		 <?php //Select Category ============================================
			include("../../Include_Connection.php");
			 $sql = "SELECT * FROM category";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
  			?>
  <tr>
   	 	<td>Category Name</td>
     	 <td><select name="serCat" class="p3">
  			 <?php
			 while ($newArray = mysql_fetch_array($result)) 
			 { ?>
 	 		<option value="<?php echo $newArray['catId']; ?>">
	 		<?php echo $newArray['catName']; ?></option>
			<?php }  ?> </select>
          </td>
  </tr>
 
  <tr>
  		<td>Performance of Supplier</td>
   		 <td><select name="serPerform" class="p3">
      		<option>Select performance</option>
      		<option>Satisfactory</option>
      		<option>Unsatisfactory </option>
      		<option>Poor</option>
     		</select>
          </td>
  </tr>
  <tr>
  	<td colspan="2">Description<br/><em>(If the performance of suppliers is Unsatisfactory/Poor. Give brief description )</em></td>
  </tr>
  <tr>
  	<td colspan="2"><textarea name="perDesc" cols="40" rows="10" class="p3"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
     <td><input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;<input name="reset" type="button" value="Reset" />&nbsp;&nbsp;<input name="cancel" type="button" value="Cancel" /><input name="purtodayDate" id="purtodayDate" type="hidden" value="<?php echo $today; ?> " /></td>
  </tr>
</table>
</div>
<br/><br/>
            
</form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
         
     
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
