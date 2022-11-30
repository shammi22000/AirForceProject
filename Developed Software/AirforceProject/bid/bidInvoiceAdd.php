<?php
session_start(); 
	if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
		{ 	header("Location:../login.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['Submit']=="SUBMIT" || !empty($_GET['Submit']) || isset($_GET['Submit']) )
		{		
			include("../Include_Connection.php");
			$sql="SELECT * FROM bid WHERE bidSupID='$_GET[supID]' AND	projectYear='$_GET[proYear]'  AND bidStatID='$_GET[seleSta]' AND bidCatID='$_GET[seleCat]'";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
			echo $numRow;
  		if($numRow>0)
			{echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('This Stations/Category already requested! Go to View Page')
				</SCRIPT>");
				 }
	
		else{include("../Include_Connection.php");
			$sql1="INSERT INTO   bid (bidId, bidStatID, bidCatID, bidSupID, projectYear, todayDate) VALUES ('', '$_GET[seleSta]', '$_GET[seleCat]', '$_GET[supID]', '$_GET[proYear]', '$_GET[todayDate]')";
					if(mysql_query($sql1, $conn))
					{
						echo("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Record Added Successfully!')
								</SCRIPT>");
					}
					else
					{
						echo "Error".mysql_error();	
					}
		//header("Location:bidInvoiceView.php?msg=$txt");
	 }
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../PQbidder/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../PQbidder/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
    
		 <!-- /////////////////////////////special Menu Starting////////////////////////////// -->    
				<?php
				include("include_invoiceMenu.php");
				?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> </td>
 </tr>
 <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" align="center" bgcolor="#FFFFFF" ><br/> <h3 class="pageHeading">Payments for Bid - Add page</h3>
 
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
      
<table width="500" border="1" cellspacing="0" cellpadding="20">
        
         		<?php //retrieve pre-qualified stations details ===========================================
  				 	error_reporting(E_ALL ^ E_NOTICE);
					include ("../include_Connection.php");
 					$sql = "SELECT * FROM  login, station, prequalificate   WHERE (login.login_Id=prequalificate.supId AND station.stationId=prequalificate.stID AND  supId='$bidID' AND isQualified=1) GROUP BY stationName "; 
 					$result = mysql_query($sql, $conn) or die(mysql_error());
				?>
	
   <tr>
    	<td class="subtableheading">Station Name</td>
    	<td><select name="seleSta">
			<option value="-1">Select Station</option>
			<?php while ($newArray = mysql_fetch_array($result)) { ?>
			<option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleSta']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    		<?php } ?>
	 		</select>&nbsp;<input name="serStat" type="submit" value="SELECT" />
    	</td>
  </tr>
 				<?php //retrieve pre-qualified category details ===========================================
 					if(isset($_GET['serStat']))
					{
	 				$Id= $_GET['seleSta'];
					 include("../Include_Connection.php");
 					$sql ="SELECT * FROM  category, prequalificate   WHERE (category.catId=prequalificate.catId AND supId='$bidID' AND stID='$Id' AND  	projectYear=' $projectYear' AND  isQualified='1')";
 	 				$result = mysql_query($sql, $conn) or die(mysql_error()); 
 				?>
   
   <tr>
    	<td class="subtableheading">Category Name</td>
    	<td><select name="seleCat" >
			<option value="-1">Select Category</option>
			<?php while ($newArray = mysql_fetch_array($result)) { ?>
			<option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['seleCat']) {  ?> selected="selected" <?php } ?> ><?php echo substr($newArray['catName'],0,25);?> </option>
    		<?php }?>
			</select>
    	</td>
  </tr>
  			<?php } ?>
		 		
			
 <tr>
  	 <td colspan="2" align="center">
   		<input name="Submit" type="submit" value="SUBMIT" />&nbsp;
   		<a href="bidInvoiceView.php"><input name="Cancel" type="reset" value="CANCEL" /></a>
    	<input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['login_Id']; ?>" />
      	<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    	<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" /></td>
</tr> 
 </table>
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
