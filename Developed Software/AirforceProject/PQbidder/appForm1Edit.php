<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }
		
	 error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{
			include("../Include_Connection.php");
	
			$sql="UPDATE  supplierinfo SET projectYear='$_GET[proYear]', date='$_GET[todayDate]', staffMangers='$_GET[managers]', staffskillLabour='$_GET[Slabour]', staffUnskilledLabour='$_GET[unsLabour]', secureClearence='$_GET[Sclea]', staffEPF='$_GET[epf]', vehicleOwn='$_GET[ownVehicle]', vehicleHire='$_GET[hireVehicle]', vehicleLease='$_GET[leaseVehicle]', frezerTruck='$_GET[frezTruck]' WHERE  	supInforID='$_GET[bidName]'";
	if(mysql_query($sql, $conn))
		{
			echo "1 Record Edited";
		}
	else
		{
			echo "Error".mysql_error();	
		}
	header("Location:appForm1View.php?msg=$txt");
}
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
<!-- ////////jquery Starting/////// -->
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="../jquery/demos.css">
		<script src="../jquery/jquery-1.5.1.js"></script>
		<script src="../jquery/jquery.ui.core.js"></script>
		<script src="../jquery/jquery.ui.widget.js"></script>
		<script src="../jquery/jquery.ui.datepicker.js"></script>
		<script> 
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script> 
<!-- ////////jquery Ending/////// -->
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
        
<h3 class="pageHeading">PRE-QUALIFICATION APPLICATION<br/>Company Information Edit Page </h3><h2 align="right">FORM I &nbsp;&nbsp;&nbsp; </h2>

<!-- /////////////////////////////form1 starting/////////////////////////////////// --> 
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

     	<?php
		include("../Include_Connection.php");
		$id=$_GET['ID'];
		$sql = "SELECT * FROM supplierinfo WHERE supInforID='$id'";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
	 	$newArray=mysql_fetch_array($result)
	 	?>
     
      <form action="<?php $_SERVER['PHP_SELF']?>" method="get" name="form1">
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
        <td><input name="managers" type="text" id="managers" value="<?php echo $newArray['staffMangers']; ?>"  /></td>
  </tr>
   <tr>
    <td class="tdformat">No of Skilled Labour</td>
        <td><input name="Slabour" type="text" id="Slabour" value="<?php echo $newArray['staffskillLabour']; ?>"  /></td>
  </tr>
   <tr>
    <td class="tdformat">No of Unskilled Labour</td>
        <td><input name="unsLabour" type="text" id="unsLabour" value="<?php echo $newArray['staffUnskilledLabour']; ?>"  /></td>
  </tr> 
  <tr>
    <td class="tdformat">Whether the security clearance is obtained for the above employees</td>
        <td>
        <select name="Sclea">
        <option value="yes">Yes</option>
         <option value="No">No</option>
        </select></td>
  </tr>
   <tr>
    <td class="tdformat">No of EPF/ETF paid staff</td>
        <td><input name="epf" type="text" id="epf" value="<?php echo $newArray['staffEPF']; ?>"  /></td>
  </tr>
   <tr>
   <td class="tdformat" colspan="2"><hr/></td>
    </tr>
     <tr>
    <td class="p3" colspan="2" align="left"><strong><em>Vehicle Fleet</em></strong></td>
          </tr> 
  
  <tr>
   <td class="tdformat">No of Vehicles own</td>
        <td><input name="ownVehicle" type="text" id="ownVehicle" value="<?php echo $newArray['vehicleOwn']; ?>"  /></td>
  </tr>
  <tr>
   <td class="tdformat">No of Vehicles hired</td>
        <td><input name="hireVehicle" type="text" id="hireVehicle" value="<?php echo $newArray['vehicleHire']; ?>"  /></td>
  </tr>
  <tr>
   <td class="tdformat">No of Vehicles leased</td>
        <td><input name="leaseVehicle" type="text" id="leaseVehicle" value="<?php echo $newArray['vehicleLease']; ?>"  /></td>
  </tr>
  <tr>
   <td class="tdformat">No of Freezer Truck</td>
        <td><input name="frezTruck" type="text" id="frezTruck" value="<?php echo $newArray['frezerTruck']; ?>"  /></td>
  </tr>
  <tr>
   <td colspan="2" align="center">
   <input name="submit" type="submit" value="UPDATE" />&nbsp;
   <input name="Cancel" type="reset" value="CANCEL" />
    <input name="bidName" type="hidden" value="<?php echo $id; ?>" />
    <input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    <input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" /></td>
    
   
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
