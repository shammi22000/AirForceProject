<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

 		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['Submit']=="UPDATE" || !empty($_GET['Submit']) || isset($_GET['Submit']) )
		{
			include("../Include_Connection.php");
			$sql="UPDATE   suppliefinanceinfor SET date='$_GET[todayDate]', shareCapital='$_GET[SC]', totAssest='$_GET[TA]', currentAssest='$_GET[CA]', otherLiabili='$_GET[OL]', curreLiability='$_GET[CL]', netWorth='$_GET[NW]', WC='$_GET[WC]', totProfit='$_GET[TP]', avgIncome='$_GET[ATAI]' WHERE  FinanID='$_GET[bidName]'";
				if(mysql_query($sql, $conn))
				{
					echo " Records Added successfully";
				}
				else
				{
					echo "Error".mysql_error();	
				}

	//header("Location:application2.php?msg=$txt");
}?>
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
    		<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Financial Information Edit Page </h3>
    
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
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" >
       
	   	<?php // retrieve Financial Information ================================
	 		include("../Include_Connection.php");
	 		$id=$_GET['ID'];
			$sql = "SELECT * FROM   suppliefinanceinfor WHERE FinanID='$id'";
	 		$result = mysql_query($sql, $conn) or die(mysql_error());
	 		$newArray=mysql_fetch_array($result);
	 	?>
        
<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
    	<td colspan="2" align="center" height="35"><h4>Financial Information</h4><br/><p2>Summary of assets and liabilities based on the audited financial statements of the last  financial year. (According to submitted documentary evidence)</p2></td>
  </tr>
  <tr>
    	<td class="tdformat">(a) Share Capital(Mn)</td>
    	<td><input name="SC" type="text" id="SC" value="<?php echo $newArray['shareCapital']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat">(b) Total Assets(Mn)</td>
    	<td><input name="TA" type="text" id="TA" value="<?php echo $newArray['totAssest']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat">(c) Current Assets(Mn)	</td>
    	<td><input name="CA" type="text" id="CA" value="<?php echo $newArray['currentAssest']; ?>" /></td>
  </tr>
   <tr>
    	<td class="tdformat">(d) Other Liabilities(Mn) </td>
    	<td><input name="OL" type="text" id="OL" value="<?php echo $newArray['otherLiabili']; ?>" /></td>
  </tr>
  <tr>
     	<td class="tdformat">(e) Current Liabilities(Mn)</td>
    	<td><input name="CL" type="text" id="CL" value="<?php echo $newArray['curreLiability']; ?>"  /></td>
  </tr>
   <tr>
     	<td class="tdformat">(f) Net Worth(Mn)</td>
    	<td><input name="NW" type="text" id="NW" value="<?php echo $newArray['netWorth']; ?>"  /></td>
  </tr>
   <tr>
     	<td class="tdformat">(g) Working Capital(Mn)</td>
    	<td><input name="WC" type="text" id="WC" value="<?php echo $newArray['WC']; ?>"  /></td>
  </tr>
  <tr>
    	<td class="tdformat">(h) Total profit before Tax(Mn) </td>
        <td><input name="TP" type="text" id="TP" value="<?php echo $newArray['totProfit']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat"> Average Total Annual Income(Mn)</td>
    	<td><input name="ATAI" type="text" id="ATAI" value="<?php echo $newArray['avgIncome']; ?> " /></td>
   
  </tr>
  <tr>
   		<td colspan="2" align="center">
   			<input name="Submit" type="submit" value="UPDATE" />&nbsp;
   			<input name="Cancel" type="reset" value="CANCEL" />
    		<input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['login_Id']; ?>" />
      		<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    		<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    		<input name="bidName" type="hidden" value="<?php echo $id; ?>" /></td>
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
