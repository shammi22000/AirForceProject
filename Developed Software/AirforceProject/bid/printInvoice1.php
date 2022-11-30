<?php
session_start(); 
if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
{ 	header("Location:../login.php");	 }
	
	error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="SUBMIT" || !empty($_GET['submit']) || isset($_GET['submit']) )

		{ 
			include("../Include_Connection.php");
			$sql="SELECT * FROM paymentinvoice WHERE supID='$_GET[bidName]' AND proYear='$_GET[proYear]' AND purpose='1'  ";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
	if($numRow>0)
			{	
				include("../Include_Connection.php");
				$sql2="UPDATE  paymentinvoice SET invoiceNo='11111', issDate='$_GET[issDate]', totAmount='$_GET[total]', todayDate='$_GET[currDate]' WHERE supID='$_GET[bidName]' AND proYear='$_GET[proYear]' AND purpose='1' ";
					echo $sql2;
					if(mysql_query($sql2, $conn))
					{
						echo "1 Record Added";
					}
					else
					{
						echo "Error".mysql_error();	
					}
				header("Location:printInvoice2.php");
	 		}
	else	{
				include("../Include_Connection.php");
				$sql1="INSERT INTO paymentinvoice (payInvoiID, supID, invoiceNo, issDate, totAmount, purpose, proYear, todayDate) 
				VALUES ('', '$_GET[bidName]', '11111', '$_GET[issDate]', '$_GET[total]', '1', '$_GET[proYear]', '$_GET[currDate]') ";
					echo $sql1;
					if(mysql_query($sql1, $conn))
					{
						echo "1 Record Added";
					}
					else
					{
						echo "Error".mysql_error();	
					}
			header("Location:printInvoice2.php");
		}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

<table width="700" border="0" cellpadding="0" bgcolor="#FFFFFF">
 <tr>
    	<td colspan="3" height="30"><h2 align="center">Payment Invoice</h2><h3 align="center">Command Procurement Division, Tenders & Contract Management <br/> Sri Lanka Air Force</h3></td>
</tr>
 <tr>
    	<td height="70" colspan="2" valign="top">&nbsp;&nbsp;To: Director<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finance, Sri Lanka Air Force,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No 140, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sir Chittampalam A. Gardiner Mawatha,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Colombo 02.</td>
         <td width="291" valign="top"> From :Command Procurement Division, Tenders & Contract Management , Sri Lanka Air Force</td>
  </tr>
  <tr>
  		<td colspan="3"><hr/></td></tr>
  <tr>
    	<td width="166" height="30" valign="bottom">Invoice No:</td>
    	<td width="335">&nbsp;</td>
  </tr>
  					<?php  //retrieve bidder Id and company name==================================== 
	    			$bidderName=$_SESSION['comName']; 
	 		 		error_reporting(E_ALL ^ E_NOTICE);
					include ("../include_Connection.php");
					$sql = "SELECT * FROM  login WHERE (name='$bidderName')";
					$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  				$newArray = mysql_fetch_array($result);
					$bidID=$newArray['login_Id'];
					?>
  <tr>
    	<td width="166" height="30" valign="bottom">Bidder Name</td>
    	<td width="335"><strong><?php echo $_SESSION['comName'];  ?></strong></td>
     	<td width="335">Project Year :<strong><?php $projectYear = date("Y");  echo $projectYear;?> </strong></td>  
  </tr>
    
  <tr>
    	<td height="30"  valign="bottom" a>Issued Date:</td>
    	<td><strong><?php $issueDate = date("d/m/y");  echo $issueDate; $today = date("F j, Y"); echo $today;?></strong>  </td>
     	<td>Due Date :<strong></strong>  </td> 
  </tr>
  <tr>
    	<td height="30"  valign="bottom">Purpose</td>
    	<td><strong>Bid Documents Fee(Non refundable deposit)</strong></td>
 </tr>
  </table><br/><br/>
</form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
   
   				<?php //retrieve selected bids infor =========================================
	 				include("../Include_Connection.php");
					$sql = "SELECT * FROM   station, category,  bid WHERE 	station.stationId=bid.bidStatID AND category.catId=bid.bidCatID AND  	bidSupID='$bidID' AND  projectYear='$projectYear' ORDER BY stationName";
				 	$result = mysql_query($sql, $conn) or die(mysql_error());
					$numRow=mysql_num_rows($result);
		 		?>
  
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="validcheck()">
<table border="1" cellpadding="0" cellspacing="0" width="700" bgcolor="#FFFFFF">
   
    <tr>
      	<td width="35"><strong>Sr No</strong></td>
     	 <td width="150"><strong>Item Name</strong></td>
       	<td width="250"><strong>Category Name</strong></td>
     	<td width="150"><strong>Rate (Rs)</strong></td>
      	<td width="150"><strong>Amount (Rs)</strong></td>
   </tr>
    			<?php
 					$b=0;
					 //go through each row in the result set and display data
 					while ($newArray = mysql_fetch_array($result)) 
 					{ $b++;
				?>
    <tr>
     	<td height="30"><?php echo $b; ?></td>
    	<td><?php echo $newArray['stationName']; ?></td>
     	<td ><?php echo $newArray['catName']; ?></td>
    	<td align="right">2000.00</td>
    	<td align="right">2000.00 </td>
   </tr>
   				 <?php }?>
    <tr>
     	<td colspan="4" align="right"><strong>Total Amount</strong></td>
     	<td  align="right"><strong><?php $tot=$numRow*2000; echo "Rs.". $tot.".00";?></strong></td>
  </tr>
  </table>

			<p align="center"><input type="submit" value="Save" name="submit"   />
            <a href="bidInvoiceView.php"><input type="reset" value="Cancel" name="cancel"  /></a></p>
			 <input name="currDate" type="hidden" value="<?php echo $today; ?>" />
             <input name="issDate" type="hidden" value="<?php echo $issueDate; ?>" /> 
    		<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
     		<input name="bidName" type="hidden" value="<?php echo $bidID; ?>" />
     		<input name="total" type="hidden" value="<?php echo $tot; ?>" />
    
</form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 

</body>
</html>