<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:register.php");	 }

		if($_GET['Submit']=="UPDATE" || !empty($_GET['Submit']) || isset($_GET['Submit']) )
			{
				include("../Include_Connection.php");
				$sql="UPDATE bank SET date='$_GET[todayDate]', bankName='$_GET[bank]', 	AccNo='$_GET[accNo]', turnOver='$_GET[turnOver]', OD='$_GET[OD]', LTL='$_GET[LTL]', STL='$_GET[STL]', FD='$_GET[FD]', CF='$_GET[CF]', projYear='$_GET[proYear]' WHERE  	bankID='$_GET[bidName]'";
				if(mysql_query($sql, $conn))
				{
					echo " Records Added successfully";
				}
				else
				{
					echo "Error".mysql_error();	
				}

	header("Location:appForm31View.php?msg=$txt");
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
<script language="javascript">
function pqsubmit()
{
var answer=window.confirm("Succussfully submitted");
return answer;
}
</script>
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
    		<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION<br/>Bank Account Information Edit Page </h3><h2 align="right">FORM II &nbsp;&nbsp;&nbsp; </h2>
    
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


     			<?php //retrieve bank information ============================
					include("../Include_Connection.php");
					$id=$_GET['ID'];
					$sql = "SELECT * FROM   bank WHERE  bankID='$id'";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
	 				$newArray=mysql_fetch_array($result)
	 			?>
      
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" >
<table width="500" border="0" cellspacing="0" cellpadding="5">
   <tr>
    	<td colspan="2"><hr/></td>
    </tr>
    <tr>
    	<td colspan="2" align="center" height="35"><h4>Bank Account Information</h4></td>
    </tr>
    <tr>
    	<td class="tdformat">Name of the Bank</td>
    	<td><input name="bank" type="text" id="bank" value="<?php echo $newArray['bankName']; ?>" /></td>
  </tr>
  <tr>   
  	    <td class="tdformat">Account Number</td>
    	<td><input name="accNo" type="text" id="accNo" value="<?php echo $newArray['AccNo']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Monthly Turnover</td>
    	<td><input name="turnOver" type="text" id="turnOver" value="<?php echo $newArray['turnOver']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Over Draft</td>
    	<td><input name="OD" type="text" id="OD" value="<?php echo $newArray['OD']; ?>" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Long Term Loan</td>
        <td><input name="LTL" type="text" id="LTL" value="<?php echo $newArray['LTL']; ?>"/></td>
  </tr>
  <tr>
    	<td class="tdformat">Short Term Loan</td>
        <td><input name="STL" type="text" id="STL" value="<?php echo $newArray['STL']; ?>"/></td>
  </tr>
  <tr>
    	<td class="tdformat">Fixed Deposit</td>
        <td><input name="FD" type="text" id="FD" value="<?php echo $newArray['FD']; ?>"/></td>
  </tr>
  <tr>
    	<td class="tdformat">Credit Facility</td>
        <td><input name="CF" type="text" id="CF" value="<?php echo $newArray['CF']; ?>"/></td>
  </tr>
  
  <tr>
     	<td colspan="2" align="center">
     		<input name="Submit" type="submit" value="UPDATE" />&nbsp;&nbsp;
     		<input name="cancel" type="reset" value="CANCEL" />
      		<input name="supID"  id="supID" type="hidden" value="<?php echo $bidID; ?>" />
      		<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    		<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    		<input name="bidName" type="hidden" value="<?php echo $id; ?>" />
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
