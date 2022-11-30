
 <table width="200" border="0" cellspacing="0" class="mainmenu" cellpadding="20px">
 
  <tr>
    	<td><a href="index.php">Bidder Home Page</a></td>
  </tr>
   <tr>
    	<td><a href="PQrequestInsert.php">Payment Invoice</a></td>
  </tr>
  			<?php 
  				$bidderName=$_SESSION['comName']; 
	 		 	include ("../include_Connection.php");
				$sql = "SELECT * FROM  login WHERE (name='$bidderName')";
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  			$newArray = mysql_fetch_array($result);
				$bidID=$newArray['login_Id'];
				$projectYear = date("Y");
				$today = date("d/m/Y");
				
				
 			?>
  
  					<?php 
					//*************************retrive payment Voucher infor********************************************
						include("../include_Connection.php");
	 					$sql1 = "SELECT * FROM paymentvoucher WHERE projectYear='$projectYear' AND vouSupId='$bidID' AND purpose='0' AND status='1'";
	 					$result1 = mysql_query($sql1, $conn) or die(mysql_error());
						$newArray1 = mysql_fetch_array($result1);
						$numRow1=mysql_num_rows($result1);
						
						
					
					//*************************retrive procurement plan infor********************************************
						include("../include_Connection.php");
	 					$sql2 = "SELECT * FROM  activity WHERE projectYear='$projectYear' AND activityName='3'";
	 					$result2 = mysql_query($sql2, $conn) or die(mysql_error());
						$newArray2 = mysql_fetch_array($result2);
						$startDate=$newArray2['dateStart'];
						$endDate=$newArray2['dateEnd'];
						
					
					if($numRow1>0 ) { ?>
<tr>
 	<td><a href="pqBidderHome.php">Pre-qualification Application</a></td>   	
 
</tr>
		<?php } else {?>					
			  	
  <tr>
    <td><a href="message.php">Pre-qualification Application</a></td>
 
 </tr><?php }?>
  		<?php  if($endDate>$today )  { ?>
  <tr>
    <td><a href="messageViewList.php">View Pre-qualified Bids</a></td>
  </tr>
  <?php } else {?>
  <tr>
    <td><a href="pqList.php">View Pre-qualified Bids</a></td>
  </tr><?php }?>
       <tr>
    <td><a href="inquiry.php">Inquiry</a></td>
  </tr>
  <tr>
    <td><a href="../logout.php">Logout</a></td>
  </tr>
</table>