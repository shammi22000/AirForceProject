
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript"></script>
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr >
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
    
 		<!-- //////////////////////////////special  Menu Starting////////////////////////////// -->    
			<?php
			include("include_pointmenu.php");
			?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

		</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_tecSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Pre-qualification Evaluation <br/>Point Insert Page</h3>
    
    <!-- ////////////////////////////Form 1 starting/////////////////////////////// --> 
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET" name="form1"> 
   	
			<?php //display Project year=====================================
	  		error_reporting(E_ALL ^ E_NOTICE);
			include("../../Include_Connection.php");
			 $sql = "SELECT * FROM  supplierinfo GROUP BY projectYear";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 		?>
            
      	<p align="center">Project Year :
      		 <select name="serYear">
       			<option>Select year</option>
				<?php  
				while ($newArray = mysql_fetch_array($result)) 
 				{ 	?>
    			<option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    			<?php  
				}
				?>
   		 </select>&nbsp; 
  	 </p>
   
  
    <!-- //////////////////////////////Select Bidder//////////////////////////// --> 
             
      		<?php //display Project year=====================================
	  		$Id=$_GET['serYear'];
	 		 error_reporting(E_ALL ^ E_NOTICE);
			include("../../Include_Connection.php");
	 		$sql = "SELECT * FROM login WHERE login_Type='user'";
	 		$result = mysql_query($sql, $conn) or die(mysql_error());
 	 		?>
            
    		 <p align="center">Select Bid
       		<select name="SerBidder">
        		 <option>Select Bidder</option>
        		 <?php
				 while ($newArray = mysql_fetch_array($result)) 
				 { ?>
         		<option value="<?php echo $newArray['login_Id']; ?>" <?php if($newArray['login_Id']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?></option>
         		<?php }  ?>
       		</select>
       
			<input name="seleBidder" type="submit" value="Select" /></p><br/>
</form>
   
  
  
  <!-- //////////////////////////////form 1 ending//////////////////////////////////////// -->  
   
    
<!-- //////////////////////////////form 1 ending//////////////////////////////////////// -->  

  			<?php
			if(isset($_GET['seleBidder']))
			{   
				$year=$_GET['serYear'];
				$Id= $_GET['SerBidder'];
				include("../../Include_Connection.php");
	 			$sql = "SELECT * FROM  login, supplierinfo WHERE( login.login_Id=supplierinfo.inforSupID AND  inforSupID='$Id' AND  projectYear='$year' )";
 				$result = mysql_query($sql, $conn) or die(mysql_error()); 
				 $newArray = mysql_fetch_array($result);
  			?>
             
<!-- //////////////////////////////form 2 starting//////////////////////////////////////// -->  
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET" name="form2" id="form2"> 
           <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="700" border="0" bordercolor="#666666" cellspacing="0" cellpadding="5"  >
     
  <tr>
   	 	<td class="point"><strong>Average Annual Income (X)</strong><br/><strong>Tender Value(Y)</strong><br/><strong>Available Credit (Z)</strong></td>
        <td colspan="2" align="right"><strong>Overall Maximum Score&nbsp;(Financial + Technical + Experience) = 100</strong><br/><strong>Overall Minimum for Qualification  =60</strong></td>
    	
        
  </tr>
  <tr>
   	 	<td class="tableBg2" width="300"><strong>Capacity</strong></td>
    	<td class="tableBg2" width="300" ><strong>Bidder Qualification</strong></td>
       
        <td class="tableBg2" width="100" ><strong>Recommended Points</strong></td>
  </tr>
  <tr>
    <td colspan="4"><strong class="p2">Financial Capacity</strong></td>
    	
      </tr>
      
  <tr>
  
    <td ><strong>Average Annual Income</strong></td>
     <?php
	    		$year=$_GET['serYear'];
				$Id= $_GET['SerBidder'];
  				include("../../Include_Connection.php");
	 			$sql2 = "SELECT * FROM suppliefinanceinfor WHERE(supFinID='$Id' AND  proYear='$year' )";
	  			$result2 = mysql_query($sql2, $conn) or die(mysql_error()); 
 				$newArray2 = mysql_fetch_array($result2);
 			?> 
      
    	<td><h3><?php echo $newArray2['avgIncome'];?></h3></strong></td> 
         <?php
			
			$year=$_GET['serYear'];
				$Id= $_GET['SerBidder'];
include("../../Include_Connection.php");
	 $sql1 = "SELECT * FROM pqpoints WHERE( PQsupID='$Id' )";
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
 $newArray1= mysql_fetch_array($result1);
 
 		?> 
        
        <td width="150">
          <strong><?php echo $newArray1['avgAnnIncome'];?></strong>
		  <?php $AAI=$newArray1['avgAnnIncome'];?></td>
      </tr>
    
      <tr>
    <td >X &lt; Y :&nbsp;&nbsp;<strong>0</strong><br/> Y &lt; X &lt; 1.5Y:&nbsp;&nbsp;<strong>10</strong><br/>1.5Y &lt; X &lt; 2Y :&nbsp;&nbsp;<strong>12</strong><br/>2Y &lt; X &lt; 2.5Y:&nbsp;&nbsp;<strong>14</strong><br/>2.5Y &lt; X &lt; 3Y:&nbsp;&nbsp;<strong>16</strong><br/>3Y &lt; X &lt; 4Y:&nbsp;&nbsp;<strong>18</strong><br/>X &gt; 4Y:&nbsp;&nbsp;<strong>20</strong>
    
    
    </td>
    	<td>&nbsp;</td>
        
        <td width="150"></td>
      </tr>
      <tr>
      <?php
	    		$year=$_GET['serYear'];
				$Id= $_GET['SerBidder'];
  				include("../../Include_Connection.php");
				 $sql3 = "SELECT * FROM bank WHERE(SupID='$Id' AND  projYear='$year' )";
	 			 $result3 = mysql_query($sql3, $conn) or die(mysql_error()); 
 				$newArray3 = mysql_fetch_array($result3);
 				?> 
    <td ><strong>Available Credit</strong></td>
    	<td><strong><h3><?php echo $newArray3['CF']?></h3></strong></td>
        <?php
			
			$year=$_GET['serYear'];
				$Id= $_GET['SerBidder'];
include("../../Include_Connection.php");
	 $sql1 = "SELECT * FROM pqpoints WHERE( PQsupID='$Id' )";
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
 $newArray1= mysql_fetch_array($result1);
 
 		?> 
        <td width="150"><strong><?php echo $newArray1['availCredit'];?></strong>
        <?php $AC=$newArray1['availCredit'];?></td>
      </tr>
  
      <tr>
    <td >Z &lt; 0.1Y :&nbsp;&nbsp;<strong>0</strong><br/> 0.1Y &lt; Z &lt; 0.15Y:&nbsp;&nbsp;<strong>10</strong><br/>0.15Y &lt; Z &lt; 0.2Y :&nbsp;&nbsp;<strong>12</strong><br/>0.2Y &lt; Z &lt; 0.25Y:&nbsp;&nbsp;<strong>14</strong><br/>0.25Y &lt; Z &lt; 0.3Y:&nbsp;&nbsp;<strong>16</strong><br/>0.3Y &lt; Z &lt; 0.4Y:&nbsp;&nbsp;<strong>18</strong><br/>Z &gt; 0.4Y:&nbsp;&nbsp;<strong>20</strong>
     </td>
    	<td>&nbsp;</td>
        
        <td width="150"></td>
      </tr>
      <tr>
    <td colspan=3"" ><hr/></td>
    	
      </tr> 
       <tr>
      
     <tr>
    <td ><strong class="p2">Technical Capability</strong></td>
    	<td>&nbsp;</td>
       
        <td width="150">&nbsp;</td>
      </tr> 
       <tr>
    	<td ><strong>Organization and Staff</strong></td>
    	<td rowspan="2"><strong>No of Managers :<?php echo $newArray['staffMangers']?></strong></br><strong>No of skilled labours :<?php echo $newArray['staffskillLabour']?></strong></br><strong>No of Unskilled labours :<?php echo $newArray['staffUnskilledLabour']?></strong></br>
            <strong>No of EPF/ETF Staff :<?php echo $newArray['staffEPF']?></strong></td>
        <td width="150">
         <strong><?php echo $newArray1['staff'];?></strong></td>
</tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/></td>
    	<td></td>
       
        <td width="150"></td>
      </tr> 
      <tr>
    <td ><strong>Transport Facility</strong></td>
    	<td><strong>No of vehicles owned :<?php echo $newArray['vehicleOwn']?><br/>
        No of vehicles hired :<?php echo $newArray['vehicleHire']?><br/>
        No of vehicles leased :<?php echo $newArray['vehicleLease']?><br/>
        No of vehicles freezer truck :<?php echo $newArray['frezerTruck']?></strong>
        </td>
        
        <td width="150">
		<strong><?php echo $newArray1['vehicle'];?></strong>
		<?php $TF=$newArray1['vehicle'];?></td>
      </tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/>Superior :&nbsp;&nbsp;<strong>6</strong></td>
    	<td></td>
       
        <td></td>
      </tr>
      
      <tr>
    <td ><strong>Cold Room Facility</strong></td>
    	<td rowspan="4">
        <?php
				if(isset($_GET['seleBidder']))
				{
				$Id= $_GET['SerBidder'];
				include("../../Include_Connection.php");
				 $sql = "SELECT * FROM storage WHERE(SupID='$Id' AND projectYear='$year') ORDER BY storeType";
				 $result = mysql_query($sql, $conn) or die(mysql_error()); 
  				?>
        <table width="250" border="1" cellspacing="0" cellpadding="0">
    	 
          <tr>
          <td align="center"><strong>Sr no</strong></td>
          <td align="center"><strong>City</strong></td>
          <td align="center"><strong>Ownership<br/> detail</strong></td>
          <td align="center"><strong>Store Type</strong></td>
          </tr>
           <?php
 $b=0;
 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	$b++;
	
	
	?>
          <tr>
          	<td align="center"><?php echo $b; ?></td>
    	    <td><?php echo $newArray['city']?></td>
			<td><?php echo $newArray['ownerShip']?></td>
			<td><?php echo $newArray['storeType']?></td>
    	   
  	    </tr>
        <?php } ?>
  	  </table>
      <?php } ?>
      </td>
       
        <td width="150"><strong><?php echo $newArray1['coldRoom']?></strong>
		<?php $CRF=$newArray1['coldRoom'];?></td>
      </tr> 
       <tr>
    <td > Inadequate :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong><br/>Superior :&nbsp;&nbsp;<strong>6</strong></td>
    	<td></td>
       
      
      </tr> 
      <tr>
    <td ><strong>Storage Facility</strong></td>
    	
      
        <td width="150">
          <strong><?php echo $newArray1['stores']?></strong> <?php $SF=$newArray1['stores'];?></td>
      </tr> 
       <tr>
    <td > Unsatisfactory :&nbsp;&nbsp;<strong>0</strong><br/> Marginal :&nbsp;&nbsp;<strong>2</strong><br/>Satisfactory :&nbsp;&nbsp;<strong>4</strong></td>
    	<td></td>
       
      
      </tr> 
      
      <tr>
       <td colspan="3"><hr/></td>
         </tr>
      <tr>
    <td ><strong class="p2">Experience</strong></td>
    	<td>&nbsp;</td>
       
        <td width="150">&nbsp;</td>
      </tr> 
       <tr>
    <td ><strong>Experience with similar supplies </strong></td>
    	<td rowspan="2">
		<?php
					if(isset($_GET['seleBidder']))
					{
					$Id= $_GET['SerBidder'];
					include("../../Include_Connection.php");
	 				$sql = "SELECT * FROM experience WHERE(expSupID='$Id' AND projectYear='$year') ORDER BY year";
 					$result = mysql_query($sql, $conn) or die(mysql_error()); 
  				?>  
        <table width="250" border="1" cellspacing="0" cellpadding="0">
    	 
          <tr>
         
          <td align="center"><strong>Year</strong></td>
          <td align="center"><strong>Institute</strong></td>
          <td align="center"><strong>Category/item</strong></td>
          <td align="center"><strong>Total Value(Mn)</strong></td>
          </tr>
           <?php

 //go through each row in the result set and display data
 while ($newArray = mysql_fetch_array($result)) 
 {
	
?>
          <tr>
           <td><?php echo $newArray['year']?></td>
			<td><?php echo $newArray['institute']?></td>
			<td><?php echo $newArray['expCategory']?></td>
    	    <td><?php echo $newArray['totVal']?></td>
  	    </tr>
        <?php } ?>
  	  </table>
      <?php } ?></td>
       
        <td width="150"><strong><?php echo $newArray1['experience']?></strong>
		<?php $EXP=$newArray1['experience'];?></td>
      </tr> 
       <tr>
    <td > None:&nbsp;&nbsp;<strong>0</strong><br/> One Contract :&nbsp;&nbsp;<strong>14</strong><br/>Two Contract:&nbsp;&nbsp;<strong>16</strong><br/>Three Contract:&nbsp;&nbsp;<strong>18</strong><br/>Four Contract:&nbsp;&nbsp;<strong>20</strong><br/>More than four Contract:&nbsp;&nbsp;<strong>22</strong></td>
    	
       
        <td width="150"></td>
      </tr> 
      <tr>
    <td ><strong>Past Performance</strong></td>
    <?php
	
		if(isset($_POST['seleBidder']))
		{
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql = "SELECT * FROM  login, performance WHERE(login.login_Id=performance.perSupId AND perSupId='$Id' AND   	projYear='$year')";
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
  $newArray = mysql_fetch_array($result);
 
 		?>  
    	<td><h3><?php echo $newArray['bidPerformanace'];?></h3></td>
      <?php
			
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql1 = "SELECT * FROM pqpoints WHERE( PQsupID='$Id' )";
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
 $newArray1= mysql_fetch_array($result1);
 
 		?> 
        <td width="150" align=""><strong><?php echo $newArray1['performance'];?></strong>
		<?php $PP=$newArray1['performance'];?></td>
      </tr>  
   
       
      
   <tr>
    	<td > No reference:&nbsp;&nbsp;<strong>0</strong><br/> One satisfactory reference :&nbsp;&nbsp;<strong>5</strong><br/>Two Satisfactory :&nbsp;&nbsp;<strong>10</strong><br/>Three or more :&nbsp;&nbsp;<strong>18</strong></td>
        <td>&nbsp;   </td>
    	<?php
			
			$Id= $_POST['SerBidder'];
include("../../Include_Connection.php");
	 $sql1 = "SELECT * FROM pqpoints WHERE( PQsupID='$Id' )";
 $result1 = mysql_query($sql1, $conn) or die(mysql_error()); 
 $newArray1= mysql_fetch_array($result1);
 
 		?> 
  	</tr>
     <?php } ?>
    <tr>
    <td colspan="3" ><hr/></td>
    
    </tr>
    
    <tr>
    
    <td colspan="2" align="right" ><strong>Total Recommended Points</strong><br/>(Financial + Technical + Experience)</td>
     <td ><strong><?php
	  	$AAI=$newArray1['avgAnnIncome'];
		$AC=$newArray1['availCredit'];
		$STAFF=$newArray1['staff'];
		$TF=$newArray1['vehicle'];
		$CRF=$newArray1['coldRoom'];
		$SF=$newArray1['stores'];
		$EXP=$newArray1['experience'];
		$PP=$newArray1['performance'];
		$TotalPoint=$AAI+$AC+$STAFF+$TF+$CRF+$SF+$EXP+$PP;
		echo $TotalPoint; ?></strong></td>
    </tr>
     
    <tr>
    <td>&nbsp;</td>
    <td  ></td>
    
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="right"><strong>Average of earned points</strong></td>
    
    <td><strong>
      <?php $avg=($TotalPoint/100)*100; echo $avg."%";?>
    </strong></td>
    </tr>
    <tr><tr>
    <td colspan="3" align="center">
    <a href="pointEdit.php?ID=<?php echo $newArray1['PQpointID']; ?>"><input type="submit" name="submit" value="EDIT" /></a>
    &nbsp;
  <input type="reset" name="reset" value="CLEAR" />
  <input type="hidden" name="ID" value="<?php echo $newArray1['PQpointID'];?>" />
    </td>
    <tr></tr>
   </table>
   <?php }?>
       </div>
       <br/><br/>
            
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
