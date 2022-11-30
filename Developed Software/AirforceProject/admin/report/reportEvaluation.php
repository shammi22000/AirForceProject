<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script>
function printpage()
  {
  window.print()
  }
</script>

</head>

<body>
<h2 align="center">Pre-qualification Evaluation  for supply of Ration Items - <?php $projectYear = date("Y");  echo $projectYear;?> </h2>

<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
        <?php
			error_reporting(E_ALL ^ E_NOTICE);
			include("../../Include_Connection.php");
	 		$sql = "SELECT * FROM  login, supplierinfo WHERE login.login_Id=supplierinfo.inforSupID";
	 		// execute the SQL statement=============
	 		$result = mysql_query($sql, $conn) or die(mysql_error());
 			//go through each row in the result set and display data
 		?>   
     
     <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center">
    <th height="30" width="60">Sr No</th>
    <th>Bidder Name</th>
     <th width="100">VAT No</th>
    <th>Staff</th>
    <th>Vehecle fleet</th>
    <th>Financial Capability</th>
    <th>Past Experience (Year/Institute/Category/Value(Mn))</th>
    <th>Storage<br/> (City/Ownership/Store Type)</th>
   <th>Bank Details<br/> (Bank/TO/OD/LTL/STL/FD/CF)</th>
   </tr>
 <?php
 //go through each row in the result set and display data
 $b=0;
 while ($newArray = mysql_fetch_array($result)) 
 {
	$b++;
	?>
 <tr>
    	<td height="30"><?php echo $b; ?></td>
        <td><?php echo $newArray['name']; ?> </td>
        
       	<td><?php $vat=$newArray['VATregNo ']; if($vat=''){echo "0";} else{echo "1";}?> </td>
      	<td>Managers:<?php echo $newArray['staffMangers']; ?><br/>  
     		S.Labours<?php echo $newArray['staffskillLabour']; ?><br/> 
     		US.Labours<?php echo $newArray['staffUnskilledLabour']; ?>
       	</td>
        <td>own:<?php echo $newArray['vehicleOwn']; ?><br/>
       		hire: <?php echo $newArray['vehicleHire']; ?><br/>
        	Lease: <?php echo $newArray['vehicleLease']; ?>
       </td>
        <?php
			$Id=$newArray['login_Id'];
			include("../../Include_Connection.php");
	 		$sql4 = "SELECT * FROM  suppliefinanceinfor WHERE supFinID='$Id' ";
	 		// execute the SQL statement=============
	 		$result4 = mysql_query($sql4, $conn) or die(mysql_error());
			$newArray4 = mysql_fetch_array($result4)
 		?>   
       <td style="font-size:11px;">
       		SC:<?php echo $newArray4['shareCapital']; ?><br/> 
            TA:<?php echo $newArray4['totAssest']; ?><br/> 
       		CA:<?php echo $newArray4['currentAssest']; ?><br/> 
       		OL:<?php echo $newArray4['otherLiabili']; ?><br/> 
       		CL:<?php echo $newArray4['curreLiability']; ?><br/> 
       		NW:<?php echo $newArray4['netWorth']; ?><br/> 
       		WC:<?php echo $newArray4['WC']; ?><br/> 
       		TP:<?php echo $newArray4['totProfit']; ?><br/> 
       		AI:<?php echo $newArray4['avgIncome']; ?><br/>   </td>
         <input type="hidden" name="ID" value="<?php echo $newArray['login_Id']; ?>" />
          
<td>
<?php
 $Id=$newArray['login_Id'];
 //echo $Id;
include ("../../include_Connection.php");

 $sql1 = "SELECT * FROM login, experience WHERE (login.login_Id=experience.expSupID AND expSupID='$Id')"; 
 //echo $sql1;
 $result1 = mysql_query($sql1, $conn) or die(mysql_error());

?>
<table width="200" border="0" cellspacing="0" cellpadding="0">
 <?php
 //go through each row in the result set and display data
 while ($newArray1 = mysql_fetch_array($result1)) 
 {
		
	?>
  <tr>
    <td><?php echo $newArray1['year']; ?>  </td>
    <td><?php echo $newArray1['institute']; ?>  </td>
    <td><?php echo substr($newArray1['expCategory'],0,10); ?>  </td>
    <td><?php echo $newArray1['totVal']; ?>  </td>
  </tr>
  <?php

 }
?>
</table>
</td>

 <td>
          <?php
 $Id=$newArray['login_Id'];
include("../../Include_Connection.php");
	 $sql2 = "SELECT * FROM login, storage WHERE (login.login_Id=storage.SupID AND SupID='$Id' )";
 $result2 = mysql_query($sql2, $conn) or die(mysql_error()); ?>
<table width="250" border="0" cellspacing="0" cellpadding="0">
          <?php

 //go through each row in the result set and display data
 while ($newArray2 = mysql_fetch_array($result2)) 
 {	?>
          <tr>
          	<td><?php echo $newArray2['city']?></td>
			<td><?php echo $newArray2['ownerShip']?></td>
			<td><?php echo $newArray2['storeType']?></td>
    	    </tr>
        <?php } ?>
  	  </table>
            
          </td>
          
           <td valign="top">
		    <?php
 $Id=$newArray['login_Id'];
include("../../Include_Connection.php");
	 $sql3 = "SELECT * FROM bank WHERE (SupID='$Id' )";
 $result2 = mysql_query($sql3, $conn) or die(mysql_error()); ?>
  
 <table width="250" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
          <?php
 
 //go through each row in the result set and display data
 while ($newArray3 = mysql_fetch_array($result2)) 
 {	?>
          <tr>
          	<td><?php echo $newArray3['bankName']?></td>
			<td><?php echo $newArray3['turnOver']?></td>
			<td><?php echo $newArray3['OD']?></td>
            <td><?php echo $newArray3['LTL']?></td>
            <td><?php echo $newArray3['STL']?></td>
            <td><?php echo $newArray3['FD']?></td>
            <td><?php echo $newArray3['CF']?></td>
    	    </tr>
        <?php } ?>
  	  </table>
      
            
          </td>
 
 
 
           
  </tr>
 
 <?php

 }
?>
<table width="1000" border="0" cellspacing="0" cellpadding="0" style="font:'Courier New', Courier, monospace; font-size:13px;">
  <tr>
    <td colspan="3">*.VAT No = 1(VAT no was submitted)</td>
    <td colspan="3">*.VAT No = 0(VAT no was not submitted)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>*<strong>SC</strong>-share capital</td>
    <td>*<strong>TA</strong>-total assest</td>
    <td>*<strong>CA</strong>-current assest</td>
    <td>*<strong>OL</strong>-other liabilities</td>
    <td>*<strong>CL</strong>-current liabilities</td>
    <td>*<strong>NW</strong>-net worth</td>
    <td>*<strong>WC</strong>-working capital</td>
    <td>*<strong>TP</strong>-total profit</td>
    <td>*<strong>AI</strong>-average annual income</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="2">*<strong>TO</strong>-monthly turn over</td>
    <td>*<strong>OD</strong>-total assest</td>
    <td>*<strong>LTL</strong>-over draft</td>
    <td>*<strong>STL</strong>-long term loan</td>
    <td>*<strong>FD</strong>-fixed deposit</td>
    <td>*<strong>CF</strong>-credit facility</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</table>
<p align="right"><input type="button" value="Print" onclick="printpage()" /></p>

 </div>
 </form>
    

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
