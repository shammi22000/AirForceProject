<?php

session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['Submit']=="SUBMIT" || !empty($_GET['Submit']) || isset($_GET['Submit']) )
		{
			
//***********************************Starting check whether the variable is numeric**********************************************		
		$year=$_GET['Fyear'];					$CL=$_GET['CL'];	
		$SC=$_GET['SC'];						$NW=$_GET['NW'];			
		$TA=$_GET['TA'];						$WC=$_GET['WC'];	
		$CA=$_GET['CA'];						$TP=$_GET['TP'];
		$OL=$_GET['OL'];						$AAI=$_GET['ATAI'];					
		
			
		$error=0;
 		$err_year_msg="";						$err_CL_msg="";					
		$err_SC_msg="";							$err_NW_msg="";							
		$err_TA_msg="";							$err_WC_msg="";
		$err_CA_msg="";							$err_TP_msg="";
		$err_OL_msg="";							$err_ATAI_msg="";						
		
				
if(!is_numeric($year))
 {
 	$error=1;
 	$err_year_msg="*Enter number";
 }	

if(!is_numeric($SC))
 {
 	$error=1;
 	$err_SC_msg="*Enter number";
 }	

if(!is_numeric($TA))
 {
 	$error=1;
 	$err_TA_msg="*Enter number";
 }	

if(!is_numeric($CA))
 {
 	$error=1;
 	$err_CA_msg="*Enter number";
 }	
if(!is_numeric($OL))
 {
 	$error=1;
 	$err_OL_msg="*Enter number";
 }	
if(!is_numeric($CL))
 {
 	$error=1;
 	$err_CL_msg="*Enter number";
 }	
if(!is_numeric($NW))
 {
 	$error=1;
 	$err_NW_msg="*Enter number";
 }	  
if(!is_numeric($WC))
 {
 	$error=1;
 	$err_WC_msg="*Enter number";
 }	
if(!is_numeric($TP))
 {
 	$error=1;
 	$err_TP_msg="*Enter number";
 }	
if(!is_numeric($AAI))
 {
 	$error=1;
 	$err_ATAI_msg="*Enter number";
 }	

//*************************starting process form **********************************************************	
 if($error==0)
 {		
		$process=1;

			include("../Include_Connection.php");
			$sql="SELECT * FROM suppliefinanceinfor WHERE supFinID='$_GET[supID]' AND  proYear='$_GET[proYear]' ";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
			
		if($numRow>0)
			{
				echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Already Insert Financial Information! Go to Financial Infor View Page')
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
				$sql="INSERT INTO  suppliefinanceinfor (FinanID, supFinID, date, proYear, FinanYear,  shareCapital, totAssest, currentAssest, otherLiabili, curreLiability, netWorth, WC, totProfit, avgIncome) VALUES ('', '$_GET[supID]', '$_GET[todayDate]', '$_GET[proYear]', '$_GET[Fyear]', '$_GET[SC]', '$_GET[TA]', '$_GET[CA]', '$_GET[OL]', '$_GET[CL]', '$_GET[NW]', '$_GET[WC]', '$_GET[TP]', '$_GET[ATAI]') ";
				if(mysql_query($sql, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Record Added Successfully')
				</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				}
			
		}

	
	}
	}
 

if( $error>0 || $process<>1)
{

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
    	<td width="790" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Bank Account  Information Insert Page  </h3><h2 align="right">FORM IV &nbsp;&nbsp;&nbsp; </h2>


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
    	<td colspan="2" align="center" height="35"><h4>Financial Information</h4><br/>
    	<p2>Summary of assets and liabilities based on the audited financial statements of the last  financial year. (According to submitted documentary evidence)</p2></td>
 </tr>
 <tr>	
    	<td class="tdformat">Financial Year</td>
    	<td><input name="Fyear" type="text" id="Fyear" value="<?php echo $year; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_year_msg; ?></span></td>
  </tr>
  <tr>
    	<td class="tdformat">(a) Share Capital(Mn)</td>
    	<td><input name="SC" type="text" id="SC" value="<?php echo $SC; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_SC_msg; ?></span></td>
  </tr>
  <tr>
    	<td class="tdformat">(b) Total Assets(Mn)</td>
    	<td><input name="TA" type="text" id="TA" value="<?php echo $TA; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_TA_msg; ?></span></td>
  </tr>
  <tr>
    	<td class="tdformat">(c) Current Assets(Mn)	</td>
   		 <td><input name="CA" type="text" id="CA" value="<?php echo $CA; ?>" />
         <span style="font-size:10px; color:#FF0000;" ><?php echo $err_CA_msg; ?></span></td>
  </tr>
   <tr>
    	<td class="tdformat">(d) Other Liabilities(Mn) </td>
    	<td><input name="OL" type="text" id="OL" value="<?php echo $OL; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_OL_msg; ?></span></td>
  </tr>
  <tr>
     	<td class="tdformat">(e) Current Liabilities (Mn)</td>
    	<td><input name="CL" type="text" id="CL" value="<?php echo $CL; ?>"  />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_CL_msg; ?></span></td>
  </tr>
   <tr>
     	<td class="tdformat">(f) Net Worth(Mn)</td>
    	<td><input name="NW" type="text" id="NW" value="<?php echo $NW; ?>"  />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_NW_msg; ?></span></td>
  </tr>
   <tr>
     	<td class="tdformat">(g)Working Capital(Mn)</td>
    	<td><input name="WC" type="text" id="WC" value="<?php echo $WC; ?>"  />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_WC_msg; ?></span></td>
  </tr>
  <tr>
    	<td class="tdformat">(h) Total profit before Tax(Mn) </td>
        <td><input name="TP" type="text" id="TP" value="<?php echo $TP; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_TP_msg; ?></span></td>
  </tr>
  <tr>
    	<td class="tdformat"> Average Total Annual Income(Mn)</td>
    	<td><input name="ATAI" type="text" id="ATAI" value="<?php echo $AAI; ?>" />
        <span style="font-size:10px; color:#FF0000;" ><?php echo $err_ATAI_msg; ?></span></td>
  </tr>
  <tr>
   		<td colspan="2"><p class="p3"><input name="accept" type="checkbox" value="1" />We/ I hereby declare that the information provide above  is true and accurate to best of our/my knowledge.</p></td>
       
  </tr>
  <tr>
   		<td colspan="2" align="center">
  		 	<input name="Submit" type="submit" value="SUBMIT" />&nbsp;
   			<input name="Cancel" type="reset" value="CANCEL" />
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
<?php
}
?>