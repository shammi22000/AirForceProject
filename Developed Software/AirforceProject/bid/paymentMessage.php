<?php
session_start(); 
	if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])))
		{ 	header("Location:../login.php");	 } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../general.css" rel="stylesheet" type="text/css" />
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
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> </td>
 </tr>
 <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" align="center" bgcolor="#FFFFFF" >
    	<br/><br/>
<h3 class="pageHeading">Bid Documents and Price Schedule </h3>


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
    
    
    <?php 
					//*************************retrive payment Voucher infor********************************************
						include("../Include_Connection.php");
	 					$sql1 = "SELECT * FROM paymentvoucher WHERE projectYear='$projectYear' AND vouSupId='$bidID' AND purpose='1' AND status='0'";
	 					$result1 = mysql_query($sql1, $conn) or die(mysql_error());
						$newArray1 = mysql_fetch_array($result1);
						$numRow1=mysql_num_rows($result1);
						
					
					//*************************retrive procurement plan infor********************************************
						include("../Include_Connection.php");
	 					$sql2 = "SELECT * FROM  activity WHERE projectYear='$projectYear' AND activityName='3'";
	 					$result2 = mysql_query($sql2, $conn) or die(mysql_error());
						$newArray2 = mysql_fetch_array($result2);
						$startDate=$newArray2['dateStart'];
						$endDate=$newArray2['dateEnd'];
						
						echo "<div class='container'>";
						//if($numRow1>0)
						{ echo "<h3>Bid fee should be paid to activate this link.</h3> ";}	
    					 echo "</div>";
    ?>
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 


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