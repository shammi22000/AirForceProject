<?php

session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['insert']=="INSERT" || !empty($_GET['insert']) || isset($_GET['insert']) )
			{
				include("../Include_Connection.php");
				$sql="SELECT * FROM bank WHERE SupID='$_GET[supID]' AND projYear='$_GET[proYear]' AND bankName='$_GET[bank]'  AND AccNo='$_GET[accNo]' ";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				$numRow=mysql_num_rows($result);
				
			if($numRow>0)
				{
				echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Already Insert this record! Go to Bank info View Page')
				</SCRIPT>");
	 			}
				
			else if(!isset($_GET['accept']))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Before submit application pls accept the declaration!')
						</SCRIPT>");}
			else 
				{
					include("../Include_Connection.php");
					$sql="INSERT INTO  bank (bankID, SupID, date, bankName, AccNo, turnOver, OD, LTL, STL, FD, CF, projYear) VALUES ('', '$_GET[supID]', '$_GET[todayDate]', '$_GET[bank]', '$_GET[accNo]', '$_GET[tOver]', '$_GET[oDraft]', '$_GET[LTLoan]', '$_GET[STLoan]', '$_GET[fDeposit]', '$_GET[CreditF]', '$_GET[proYear]') ";
						if(mysql_query($sql, $conn))
						{
							echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Record added successfully!')
						</SCRIPT>");
						}
						else
						{
							echo "Error".mysql_error();	
						}
			}

	//header("Location:appForm31View.php?msg=$txt");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


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
    	<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Bank Account  Information Insert Page  </h3><h2 align="right">FORM V &nbsp;&nbsp;&nbsp; </h2>
    
    
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
<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
  <tr>
    	<td colspan="2"><hr/></td>
  </tr>
  <tr>
 		<td colspan="2" align="center" height="35"><h4>Bank Account Information</h4></td>
 </tr>
   
  <tr>
    	<td class="tdformat">Name of the Bank</td>
    	<td><input name="bank" type="text" id="bank" /> </td>
 </tr>     
  <tr>   
  	    <td class="tdformat">Account Number</td>
    	<td><input name="accNo" type="text" id="accNo" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Monthly Turnover(Mn)</td>
    	<td><input name="tOver" type="text" id="tOver" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Over Draft(Mn)</td>
    	<td><input name="oDraft" type="text" id="oDraft" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Long Term Loan(Mn)</td>
        <td><input name="LTLoan" type="text" id="LTLoan"/></td>
  </tr>
  <tr>
   		 <td class="tdformat">Short Term Loan(Mn)</td>
        <td><input name="STLoan" type="text" id="STLoan"/> </td>
  </tr>
  <tr>
   		 <td class="tdformat">Fixed Deposit(Mn)</td>
        <td><input name="fDeposit" type="text" id="fDeposit"/></td>
   </tr>
   <tr>
    	<td class="tdformat">Credit Facility(Mn)</td>
        <td><input name="CreditF" type="text" id="CreditF"/></td>
   </tr>
   
   
   <tr>
   		<td colspan="2"><p class="p3"><input name="accept" type="checkbox" value="1" />We/ I hereby declare that the information provide above  is true and accurate to best of our/my knowledge.</p></td>
       
  </tr>
    	<td colspan="2" align="center">
   			<input name="insert" type="submit" value="INSERT" />&nbsp;
   			<a href="appForm31View.php"><input name="Cancel" type="reset" value="Cancel" /></a>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>
