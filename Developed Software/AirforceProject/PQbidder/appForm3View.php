<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
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
     	<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
				<?php
				include("include_specialMenu.php");
				?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

		</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidderSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
   	 <td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Financial Information View Page  </h3>
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
 <p align="left"> 
  
 				<?php  //retrieve bidder Id and company name==================================== 
	    		$bidderName=$_SESSION['comName']; 
	 		 	include ("../include_Connection.php");
				$sql = "SELECT * FROM  login WHERE (name='$bidderName')";
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  			$newArray = mysql_fetch_array($result);
				$bidID=$newArray['login_Id'];
				?>
</p>                                               
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 


      		<?php // retrieve financial infomation =============================================================
	 			include("../Include_Connection.php");
				$sql = "SELECT * FROM   suppliefinanceinfor WHERE supFinID='$bidID' AND  proYear='$projectYear'";
			 	$result = mysql_query($sql, $conn) or die(mysql_error());
	 			$newArray=mysql_fetch_array($result);
			 ?>


<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" >
      
<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
    	<td colspan="2" align="center" height="35"><h4>Financial Information</h4><br/>
    	<p2>Summary of assets and liabilities based on the audited financial statements of the last  financial year. (According to submitted documentary evidence)</p2></td>
  </tr>
  <tr>
    	<td class="tdformat">(a) Share Capital(Mn)</td>
    	<td><strong><?php echo $newArray['shareCapital']; ?></strong></td>
  </tr>
  <tr>
    	<td class="tdformat">(b) Total Assets(Mn)</td>
    	<td><strong><?php echo $newArray['totAssest']; ?></strong></td>
  </tr>
  <tr>
    	<td class="tdformat">(c) Current Assets	(Mn)</td>
    	<td><strong><?php echo $newArray['currentAssest']; ?></strong></td>
  </tr>
   <tr>
    	<td class="tdformat">(d) Other Liabilities(Mn) </td>
    	<td><strong><?php echo $newArray['otherLiabili']; ?></strong></td>
  </tr>
  <tr>
     	<td class="tdformat">(e) Current Liabilities(Mn)</td>
    	<td><strong><?php echo $newArray['curreLiability']; ?></strong></td>
  </tr>
   <tr>
     	<td class="tdformat">(f) Net Worth(Mn)</td>
    	<td><strong><?php echo $newArray['netWorth']; ?></strong></td>
  </tr>
   <tr>
     	<td class="tdformat">(g)Working Capital(Mn)</td>
    	<td><strong><?php echo $newArray['WC']; ?></strong></td>
  </tr>
  <tr>
    	<td class="tdformat">(h) Total profit before Tax(Mn) </td>
        <td><strong><?php echo $newArray['totProfit']; ?></strong></td>
  </tr>
  <tr>
    	<td class="tdformat"> Average Total Annual Income (Mn)</td>
    	<td><strong><?php echo $newArray['avgIncome']; ?> </strong></td>
  </tr>
  <tr>
   		<td colspan="2" align="center">
   		<a href="appForm3Edit.php?ID=<?php echo $newArray['FinanID']; ?>"><input name="Submit" type="submit" value="EDIT" /></a>&nbsp;
   		<input name="Cancel" type="reset" value="CANCEL" />
        </td>
   
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