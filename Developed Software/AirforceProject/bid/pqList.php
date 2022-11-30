<?php
session_start(); 
	if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
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
    
<h2>List of Qualified Bids</h2><br/>
    
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


<p align="left">UNOFFICIAL RESULTS :</p> 
<div class="container">


<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
      		<?php
 			 include("../Include_Connection.php");
 			$sql = "SELECT * FROM  station, category, prequalificate WHERE (station.stationId=prequalificate.stID AND  category.catId=prequalificate.catId AND supId='$bidID' AND projectYear='$projectYear' AND isQualified='1')"; 
  			$result = mysql_query($sql, $conn) or die(mysql_error()); 
			?>

<table width="500" border="1" cellpadding="5">
   <tr  align="center">
         <td class="subtableheading" >Sr No</td>
     	<td class="subtableheading" width="150" >Stations</td>
    	<td class="subtableheading" width="350">Categories</td>
   </tr>
   
			<?php
 			$b=0;
 			//go through each row in the result set and display data
 			while ($newArray = mysql_fetch_array($result)) 
  			{$b++;
	 		?>
  <tr>
   		<td ><?php echo $b; ?></td>
    	<td><?php echo $newArray['stationName']; ?></td>
      	<td><?php echo $newArray['catName']; ?></td>  
  </tr>
 			<?php }?>
</table>

</form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 

</div>
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
