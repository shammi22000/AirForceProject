<?php session_start(); 
  		  			    
		if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])) || $today>=$exp_date ) 
		{ 	header("Location:../login.php");	 }
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
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
    	<td  colspan="3" align="center" height="125"><img src="../images/new.jpg" width="990" height="125" alt="logo image" border="0" /></td>
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
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

			</td>
    		<td width="790" valign="top" align="center" bgcolor="#FFFFFF" >
    
<h2>List of Qualified Bids</h2> <br/>
   
<p align="left">Name of Bidder :</p><br/>
<p align="left">UNOFFICIAL RESULTS :</p> 
 
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
     
     		 <?php //retrieve selected stations and category info====================================
  				include("../Include_Connection.php");
			 	$sql = "SELECT * FROM prequalification, station, category WHERE (station.stationId=prequalification.PQstaID AND  category.catId=prequalification.PQCatID AND  prequalification.isRequested='1' AND prequalification.isQualified='1')"; 
 			 	$result = mysql_query($sql, $conn) or die(mysql_error()); 
			?>
<table width="750" border="0" cellpadding="0">
   <tr height="45" align="center">
   		<td class="subtableheading" width="50" >Bid ID</td>
    	<td class="subtableheading" >Stations</td>
    	<td class="subtableheading">Categories</td>
   </tr>
   
 
				<?php
 					$a=1;
 					//go through each row in the result set and display datac**********************
 					while ($newArray = mysql_fetch_array($result)) 
  					{
	 					if($a%2==1)
	 						{$bg="tableBg1";}
	 	 				else{$bg="tableBg2";}
				?>
  <tr class="<?php echo $bg; ?>">
   		<td><?php echo $newArray['bidId']; ?></td>
   		 <td><?php echo $newArray['stationName']; ?></td>
      	<td><?php echo $newArray['catName']; ?></td>  
  </tr>
 			<?php }?>
</table>
</form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

<p align="left"> NOTE: </p>
    </td>

   </tr>
  <tr>
    <td colspan="3" align="center" class="copyr"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
