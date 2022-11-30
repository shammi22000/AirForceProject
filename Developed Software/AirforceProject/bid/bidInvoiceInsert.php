<?php 
session_start(); 
	if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
		{	header("Location:../login.php");}
	 
	 	error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="SELECT" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{	
		
			$staID= $_GET['statID'];	
			//check the bid already exist===============================	
			include ("../include_Connection.php");
			$sql2="SELECT * FROM  bid WHERE bidStatID='$staID' AND bidSupID='$_GET[purbidder]' AND projectYear='$_GET[proyear]'";
			$result2 = mysql_query($sql2, $conn) or die(mysql_error());
			$numRow2=mysql_num_rows($result2);
			if($numRow2>0)
			{		
				echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Already selected category for this station! Go to View Page')
				</SCRIPT>"); }
			
		else{error_reporting(E_ALL ^ E_NOTICE);
			include("../include_Connection.php");
			$sql = "SELECT * FROM category  ";
	 		$result = mysql_query($sql, $conn) or die(mysql_error()); 
			while ($newArray = mysql_fetch_array($result))
			{
			$CatId=$_GET[$newArray['catId']];
	
		
			
					if(!empty($CatId)){
					$sql1="INSERT INTO bid (bidId, bidStatID, bidCatID, bidSupID, projectYear, todayDate) VALUES ('', '$staID', '$CatId', '$_GET[purbidder]', '$_GET[proyear]', '$_GET[purDate]') ";
						
	 
	 
				if(mysql_query($sql1, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Record Added Successfully!')
								</SCRIPT>");
				}
				else
				{
					$txt="Error".mysql_error();	
				}
	
				}
			}
		}
//header("Location:bidInvoiceView.php?msg=$txt");
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
</head>

<body>
<table width="990" height="600" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
    	<td  colspan="3" align="center" height="125"><img src="../images/new.jpg" width="990" height="125" alt="logo image" border="0" /></td>
  </tr>
  <tr>
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
				<?php
				include("../include_Mainmenu.php");
				?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> </td>
  </tr>
  <tr>
   <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
				<?php
				include("include_invoiceMenu.php");
				?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

		</td>
  </tr>
  <tr>
   	 	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" valign="top" align="center" bgcolor="#FFFFFF" >
   
   	 
<h3 class="pageHeading">Payments for Bid - Insert page</h3>
     

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
    

 <hr/>  
 <!-- /////////////////////////////starting display names of stations////////////////////////////// --> 
    
     			<?php //retrieve pre-qualified stations details ===========================================
 				error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
 				$sql21 = "SELECT * FROM   station, prequalificate  WHERE (station.stationId=prequalificate.stID AND  supId='$bidID' AND 	projectYear=' $projectYear' AND isQualified='1') GROUP BY stationName "; 
 				$result21 = mysql_query($sql21, $conn) or die(mysql_error());
				?>
                
<p align="left">
   				<strong>Station Name: </strong>   
      				<select name="SerStat">
   					<?php  
					while ($newArray21 = mysql_fetch_array($result21)) 
 					{
					?>
    				<option value="<?php echo $newArray21['stationId']; ?>" <?php if($newArray21['stationId']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray21['stationName']; ?> </option>
    				<?php
					 }
					?>
    
    				</select> <input name="seleStat" type="submit" value="Select" />
</p>
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
 
 
       			<?php 
					if(isset($_GET['seleStat']))
					{	
					
	 					$Id= $_GET['SerStat'];
	    				include("../include_Connection.php");
						$sql ="SELECT * FROM  category, prequalificate   WHERE (category.catId=prequalificate.catId AND supId='$bidID' AND stID='$Id' AND  	projectYear=' $projectYear' AND  isQualified='1')";
 						$result = mysql_query($sql, $conn) or die(mysql_error());
 				?>
                
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
         
<table width="500" border="1" cellpadding="5" bgcolor="#EAEAEA">
   <tr bgcolor="#666666" >
    	<td height="25" align="center" width="30">Sr.No</td>
      	<td  align="center" width="400">Pre-qualified Category Name</td>
      	<td align="center" width="70">&nbsp;</td>
  </tr>
   
   			<?php
  			$b=0;
 			while ($newArray = mysql_fetch_array($result))
 			{$b++;
			?>
  <tr>
     	<td><?php echo $b; ?></td>
    	<td><?php echo $newArray['catName']; ?></td>
    	<td><input name="<?php echo $newArray['catId']; ?>" type="checkbox" value="<?php echo $newArray['catId']; ?>" /></td>
  </tr>
  			 <?PHP   } ?>
   
</table> 
 
		<input name="submit" id="submit" type="submit" value="SELECT" />&nbsp;&nbsp;
		<input name="cancel" id="cancel" type="reset" value="CANCEL" />
 		<input name="statID" id="statID" type="hidden" value="<?php echo $_GET['SerStat']; ?>" />
 		<input name="proyear" id="proyear" type="hidden" value="<?php echo $projectYear; ?>" />
  		<input type="hidden" name="purbidder" value="<?php echo  $bidID; ?>" /> 
 		<input type="hidden" name="purDate" value="<?php echo $today; ?>" />
			<?PHP   } ?>
</form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 

<br/>
    	</td>

  </tr>
  <tr>
    	<td height="15" colspan="3" align="center" class="copyr"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
