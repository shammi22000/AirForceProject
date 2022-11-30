<?php
session_start();
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
	{ 	header("Location:../login.php");	 }
 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<link href="../general.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="125"></td>
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
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
			<?php
			include("include_specialMenu.php");
			?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

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
     
 <h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Company Information View Page </h3><h2 align="right">FORM I &nbsp;&nbsp;&nbsp; </h2>
     
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
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

     
     

   		 <?php //retrieve bidder's basic information=======================================================
			include("../Include_Connection.php");
			 $sql = "SELECT * FROM supplierinfo WHERE inforSupID='$bidID' AND projectYear='$projectYear' ";
			 // execute the SQL statement
			 $result = mysql_query($sql, $conn) or die(mysql_error());
	 		$newArray = mysql_fetch_array($result);
 			//go through each row in the result set and display data
 		?>
        
        
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
<div class="container">
     
<table width="500" border="0" cellspacing="0" cellpadding="10">
 <tr>
    	<td colspan="2" align="center" height="35"><h4>Company Information</h4></td>
 </tr>
 <tr>
    	<td class="p3" colspan="2" align="left"><strong><em>Personnel  Employed</em></strong></td>
 </tr> 
 <tr>
    	<td class="tdformat">No of Managers</td>
        <td><strong><?php echo $newArray['staffMangers']; ?></strong></td>
 </tr>
 <tr>
    	<td class="tdformat">No of Skilled Labour</td>
        <td><strong><?php echo $newArray['staffskillLabour']; ?></strong></td>
 </tr>
 <tr>
    	<td class="tdformat">No of Unskilled Labour</td>
        <td><strong><?php echo $newArray['staffUnskilledLabour']; ?></strong></td>
  </tr> 
  <tr>
    	<td class="tdformat">Whether the security clearance is obtained for the above employees</td>
        <td> <strong><?php echo $newArray['secureClearence']; ?></strong></td>
  </tr>
  <tr>
    	<td class="tdformat">No of EPF/ETF paid staff</td>
        <td><strong><?php echo $newArray['staffEPF']; ?></strong></td>
  </tr>
  <tr>
   		<td class="tdformat" colspan="2"><hr/></td>
  </tr>
  <tr>
   		 <td class="p3" colspan="2" align="left"><strong><em>Vehicle Fleet</em></strong></td>
 </tr> 
  
  <tr>
   		<td class="tdformat">No of Vehicles own</td>
        <td><strong><?php echo $newArray['vehicleOwn']; ?></strong></td>
  </tr>
  <tr>
   		<td class="tdformat">No of Vehicles hired</td>
        <td><strong><?php echo $newArray['vehicleHire']; ?></strong></td>
  </tr>
  <tr>
  		 <td class="tdformat">No of Vehicles leased</td>
        <td><strong><?php echo $newArray['vehicleLease']; ?></strong></td>
  </tr>
  <tr>
  		<td class="tdformat">No of Freezer Truck</td>
        <td><strong><?php echo $newArray['frezerTruck']; ?></strong></td>
  </tr>
  <tr>
   		<td colspan="2" align="center">
   		<a href="appForm1Edit.php?ID=<?php echo $newArray['supInforID']; ?>">
   		<input name="next" type="submit" value="EDIT" /></a>&nbsp;
   		<input name="Cancel" type="reset" value="CANCEL" /></td>
</tr>  
       
</table>
</div>
</form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 
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
