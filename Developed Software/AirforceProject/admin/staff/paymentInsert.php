<?php
session_start();
if(!isset($_SESSION['user2']) || (empty($_SESSION['user2'])))
		{ 	header("Location:../login.php");	 }
		
error_reporting(E_ALL ^ E_NOTICE);
$proffield=$_GET['serPurpose'];	
function isSelected($val,$sval)
{
	if($val==$sval)
	{
		echo'selected="selected"';
	}
} 
	if(!isset($_SESSION['user2']) || (empty($_SESSION['user2'])))
		{ 	header("Location:../login.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{
			include("../../Include_Connection.php");
			$sql="INSERT INTO paymentvoucher (payVouID, vouSupId,  	purpose, vouNum, issDate, recDate, isCorrectTot,  status, userID,  todayDate, projectYear) VALUES ('', '$_GET[bidID]', '$_GET[purpose]','$_GET[VouNumber]', '$_GET[issDate]', '$_GET[recDate]', '$_GET[isCorrect]', '$_GET[payStatus]', '$_GET[userName]', '$_GET[todayDate]', '$_GET[proYear]' ) ";
	
			if(mysql_query($sql, $conn))
			{
				echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Record Added Successfully!')
				</SCRIPT>");
			}
			else
			{
				echo "Error".mysql_error();	
			}
	
	}


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
 <tr>
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
     	<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
				<?php
				include("include_staffMainmenu.php");
				?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 
		</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

			<?php
			include("include_staffSubmenu2.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 
		</td>
       <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h3><br/>Payment Voucher Detail</h3>
    
    
           		
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 

 				<?php  $userID=$_SESSION['user2']; 	?>
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    


				<?php // Retrieve bidder infor=================================
	  				error_reporting(E_ALL ^ E_NOTICE);
					include("../../Include_Connection.php");
	 				$sql = "SELECT * FROM login WHERE userGroup='u0' OR userGroup='u1' ";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
 				 ?>
    

<p>Bidder Name  :
     			<select name="SerBidder">
				<option>Select Bidder</option>
					<?php while ($newArray = mysql_fetch_array($result))  { ?>
		 		<option value="<?php echo $newArray['login_Id']; ?>" <?php if($newArray['login_Id']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?> </option>
            		<?php }  ?> 
        		</select>
               
 </p>
 <p>Purpose  :	
     			<select name="serPurpose">
				<option value="-1">Select purpose</option>
               	<option value="0" <?php isSelected("0",$proffield); ?>>Pre-qualification Application Fee</option>
            	<option value="1" <?php isSelected("1",$proffield); ?>>Bid Document Fee</option>	
        		</select>&nbsp;
                <input name="select" type="submit" value="Select" />
 </p>
    
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
     
     
     
     
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
    
    		<?php if(isset($_GET['select']))
	 		{$bidID=$_GET['SerBidder'];
			 $purpose=$_GET['serPurpose'];  
			
			}
			
			?>
	 			
      
 <table width="450" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">
 <tr>
    	<td width="150"  class="subtableheading">Voucher Number</td>
    	<td> <input type="text" name="VouNumber" /></td> 
 </tr>
 <tr>
    	<td  class="subtableheading">Issued Date</td>
    	<td><input type="text" name="issDate" /> </td>
 </tr>
 <tr>
    	<td  class="subtableheading">Received Date</td>
    	<td><input type="text" name="recDate" /></td>
</tr>
<tr>
    			<?php // Retrieve payment voucher info=================================
	  				error_reporting(E_ALL ^ E_NOTICE);
					include("../../Include_Connection.php");
	 				$sql1 = "SELECT * FROM paymentinvoice WHERE proYear='$projectYear' AND supID='$bidID' AND purpose='$purpose' ";
	 				$result1 = mysql_query($sql1, $conn) or die(mysql_error());
					$newArray1 = mysql_fetch_array($result1)
				?>		
            
    	<td  class="subtableheading">Total Amount</td>
    	<td><strong><?php echo "Rs.".$newArray1['totAmount']; ?></strong><br/><br/>
    		<select name="isCorrect">
    		<option value="1">Correct Amount</option>
     		<option value="0">Wrong Amount</option>
    		</select>
    	</td>
  </tr>
  <tr>
    	<td  class="subtableheading">Payment Status</td>
    	<td>
    		<select name="payStatus">
    		<option value="1">Paid</option>
     		<option value="0">Not Paid</option>
    		</select>
    	</td>
  </tr> 
  
 <tr class="tableheading">
  		<td colspan="2" align="center" height="40">
  			<input type="submit" name="submit" value="INSERT" />&nbsp;
  			<input type="reset" name="reset" value="CLEAR" />
   			<input type="hidden" name="bidID" value="<?php echo $bidID; ?>" />
   			<input type="hidden" name="userName" value="<?php echo $_SESSION['user2']; ?>" />
    		<input type="hidden" name="todayDate" value="<?php echo $today; ?>" />
    		<input type="hidden" name="proYear" value="<?php echo $projectYear; ?>" />
            <input type="hidden" name="purpose" value="<?php echo $purpose ?>" />
            <?php  ?>
  		</td>
  </tr>
</table>
</form>
 
    </td>

   </tr>
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
