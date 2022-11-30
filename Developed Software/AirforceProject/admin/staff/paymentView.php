<?php
session_start(); 
	if(!isset($_SESSION['user2']) || (empty($_SESSION['user2'])))
		{ 	header("Location:../login.php");	 }
	
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
 
				
<p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
 <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
   
 <p>Purpose  :
     			<select name="serPurpose">
				<option value="-1">Select purpose</option>
               	<option value="0">Pre-qualification Application Fee</option>
            	<option value="1">Bid Document Fee</option>	
        		</select>&nbsp;
                <input name="select" type="submit" value="Select" />
 </p>  
   
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
 
 					<?php // Retrieve payment voucher info=================================
	  				
						if(isset($_GET['select']))
	 					{$purpose=$_GET['serPurpose'];  
					?>
     			
          
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   					<?php // Retrieve payment voucher info=================================
	  					include("../../Include_Connection.php");
	 					$sql = "SELECT * FROM  login, paymentvoucher WHERE login.login_Id=paymentvoucher.vouSupId AND projectYear='$projectYear' AND purpose='$purpose' ";
	 					//echo $sql; 
						$result = mysql_query($sql, $conn) or die(mysql_error());
					?>
   <table width="750" border="1" cellspacing="0" cellpadding="5">
      
  <tr class="subtable2" >
     	<td width="30" bgcolor="#999999" >Sr.no</td>
    	<td width="300" bgcolor="#999999" >Bidder Name</td>
    	<td bgcolor="#999999" >Voucher No</td>
   	 	<td  bgcolor="#999999">Issued Date</td>
    	<td  bgcolor="#999999">Received Date</td>
        <td  bgcolor="#999999">Is Amount correct(Rs)</td>
      	<td  bgcolor="#999999">Status</td>
     	<td width="75" bgcolor="#999999" >Action</td>
  </tr>
 
 		 <?php
     		$b=0; 
    		while ($newArray = mysql_fetch_array($result))
 			{$supID=$newArray['supplierID'];
			//echo $supID;
	 			$b++;
	 	?> 
<tr class="p3" >
    	<td height="30"  align="center"><?php echo $b; ?></td>
    	<td><?php echo $newArray['name']; ?></td>
   		<td><?php echo $newArray['vouNum']; ?></td>
    	<td><?php echo $newArray['issDate']; ?></td>
        <td><?php echo $newArray['recDate']; ?></td>
        <td><?php if($newArray['isCorrectTot']=='1')
							{echo $correction="Correct";}
						else {echo $correction="Wrong";}  ?></td>
        <td><?php if($newArray['status']=='0')
				{echo $status="Not Paid";}
				else {echo $status="Paid";} ?></td>
        <td align="center">
    	<a href="paymentEdit.php?ID=<?php echo $newArray['payVouID']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;
    	<a href="paymentDelete.php?ID=<?php echo $newArray['payVouID']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" onClick="myFunction()"  /></a>
        </td> 
	
  </tr>
   		<?php  }?> 
  
  </table>
 </form>
 <?php }?> 
  <!-- /////////////////////////////form2 ending////////////////////////////// --> 

 
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
