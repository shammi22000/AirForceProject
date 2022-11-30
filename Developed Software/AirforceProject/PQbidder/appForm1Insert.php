<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

 		
		error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="SUBMIT" || !empty($_GET['submit']) || isset($_GET['submit']) )

		{ 	
//***********************************Starting check whether the variable is numeric**********************************************		
		$managers=$_GET['managers'];			$own=$_GET['ownVehicle'];
		$sLabours=$_GET['Slabour'];				$hire=$_GET['hireVehicle'];
		$usLabours=$_GET['unsLabour'];			$lease=$_GET['leaseVehicle'];
		$epf=$_GET['epf'];						$freTruch=$_GET['frezTruck'];
		
			
		$error=0;
 		$err_manager_msg="";					$err_own_msg="";
		$err_sl_msg="";							$err_hire_msg="";
		$err_usl_msg="";						$err_lease_msg="";
		$err_epf_msg="";						$err_FT_msg="";
		
				
if(!is_numeric($managers))
{
 	$error=1;
 	$err_manager_msg="Enter number";
 }	
 
	 
if(!is_numeric($sLabours))
 {
 	$error=1;
 	$err_sl_msg="*Enter number";
 }	
if(!is_numeric($usLabours))
 {
 	$error=1;
 	$err_usl_msg="*Enter number";
 }	
if(!is_numeric($epf))
 {
 	$error=1;
 	$err_epf_msg="*Enter number";
 }
 if(!is_numeric($own))
 {
 	$error=1;
 	$err_own_msg="*Enter number";
 }	

if(!is_numeric($hire))
 {
 	$error=1;
 	$err_hire_msg="*Enter number";
 }	

if(!is_numeric($lease))
 {
 	$error=1;
 	$err_lease_msg="*Enter number";
 }	

if(!is_numeric($freTruch))
 {
 	$error=1;
 	$err_FT_msg="*Enter number";
 }	

//*************************starting process form **********************************************************	
 if($error==0)
 {		
		$process=1;
			
			include("../Include_Connection.php");
			$sql="SELECT * FROM supplierinfo WHERE inforSupID='$_GET[bidderName]' AND projectYear='$_GET[proYear]'  ";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
		if($numRow>0)
			{
				echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Already Inserted the qualification! Go to Company Infor View Page')
					</SCRIPT>");
	
	 		}
	else if(!isset($_GET['accept']))
			{
				echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Before submit application pls accept the declaration!')
					</SCRIPT>");}
	
	
	else	{
				$sql1="INSERT INTO supplierinfo (supInforID, inforSupID, projectYear, date, staffMangers,  staffskillLabour, staffUnskilledLabour, secureClearence, staffEPF, vehicleOwn, vehicleHire, vehicleLease, frezerTruck, receiptNo, declaration) VALUES ('', '$_GET[bidderName]', '$_GET[proYear]', '$_GET[todayDate]', '$_GET[managers]', '$_GET[Slabour]', '$_GET[unsLabour]', '$_GET[Sclea]', '$_GET[epf]', '$_GET[ownVehicle]', '$_GET[hireVehicle]', '$_GET[leaseVehicle]', '$_GET[frezTruck]','$_GET[RecNo]', '$_GET[accept]') ";
				if(mysql_query($sql1, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Record added successfully!')
						</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				}
	
		}
	}
}
 

if( $error>0 || $process<>1)
{
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
<h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Company Information Insert Page</h3><h2 align="right">FORM I &nbsp;&nbsp;&nbsp; </h2>


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


<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
<div class="container">
<table width="600" border="0" cellspacing="0" cellpadding="10">
  <tr>
    	<td colspan="2" align="center" height="35"><h4>Company Information</h4></td>
  </tr>
   <tr>
    	<td class="p3" colspan="2" align="left"><strong><em>Personnel  Employed</em></strong></td>
  </tr> 
  <tr>
    	<td class="tdformat">No of Managers</td>
        <td><input name="managers" type="text" id="managers" value="<?php echo $managers; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_manager_msg; ?></span></td>
  </tr>
   <tr>
   		<td class="tdformat">No of Skilled Labour</td>
        <td><input name="Slabour" type="text" id="Slabour" value="<?php echo $sLabours; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_sl_msg; ?></span></td>
  </tr>
   <tr>
    	<td class="tdformat">No of Unskilled Labour</td>
        <td><input name="unsLabour" type="text" id="unsLabour" value="<?php echo $usLabours; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_usl_msg; ?></span></td>
  </tr> 
  <tr>
   		<td class="tdformat">Whether the security clearance is obtained for the above employees</td>
        <td>
        	<select name="Sclea">
        	<option value="yes">Yes</option>
         	<option value="No">No</option>
        	</select>
        </td>
  </tr>
   <tr>
    	<td class="tdformat">No of EPF/ETF paid staff</td>
        <td><input name="epf" type="text" id="epf" value="<?php echo $epf; ?>"   /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_epf_msg; ?></span></td>
  </tr>
  <tr>
   		<td class="tdformat" colspan="2"><hr/></td>
  </tr>
  <tr>
    	<td class="p3" colspan="2" align="left"><strong><em>Vehicle Fleet</em></strong></td>
  </tr> 
 
  <tr>
   		<td class="tdformat">No of Vehicles own</td>
        <td><input name="ownVehicle" type="text" id="ownVehicle" value="<?php echo $own; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_own_msg; ?></span></td>
  </tr>
  <tr>
   		<td class="tdformat">No of Vehicles hired</td>
        <td><input name="hireVehicle" type="text" id="hireVehicle" value="<?php echo $hire; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_hire_msg; ?></span></td>
  </tr>
  <tr>
   		<td class="tdformat">No of Vehicles leased</td>
        <td><input name="leaseVehicle" type="text" id="leaseVehicle" value="<?php echo $lease; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_lease_msg; ?></span></td>
  </tr>
  <tr>
   		<td class="tdformat">No of Freezer Truck</td>
        <td><input name="frezTruck" type="text" id="frezTruck" value="<?php echo $freTruch; ?>"  /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_FT_msg; ?></span></td>
  </tr>
  <tr>
   		<td colspan="2"><p class="p3"><input name="accept" type="checkbox" value="1" />We/ I hereby declare that the information provide above  is true and accurate to best of our/my knowledge.</p></td>
       
  </tr>
  <tr>
   		<td colspan="2" align="center"><input name="submit" type="submit" value="SUBMIT" />&nbsp;<input name="Cancel" type="reset" value="CANCEL" />
			<input name="bidderName" type="hidden" value="<?php echo $bidID; ?>" />
			<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
			<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
  		 </td>
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
<?php
}
?>