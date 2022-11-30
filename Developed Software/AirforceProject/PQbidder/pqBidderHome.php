
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
 
  <tr >
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
	include("include_bidderSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" >
     <h2>Pre-qualification Application </h2><br/>
    <table width="770" border="0" cellspacing="0" cellpadding="15">
   <tr>
    <td colspan="2" class="p3">Pre-qualification Application consist of following forms. All forms must be completed to apply for pre-qualification. </td>
     </tr>
     <tr>
    <td class="pageHeading"><a href="appForm1Insert.php">FORM I</a>  </td>
    <td><a href="appForm1Insert.php">Company Information</a> <br/></td>
  </tr>
  <tr>
    <td class="pageHeading"><a href="appForm2Insert.php">FORM II</a></td>
    <td><a href="appForm2Insert.php">Record of Past Experience </a></td>
  </tr>
   <tr>
    <td class="pageHeading"><a href="appForm21Insert.php">FORM III</a></td>
    <td><a href="appForm21Insert.php">Information of Storage Facility</a></td>
  </tr>
  <tr>
    <td class="pageHeading"><a href="appForm3Insert.php">FORM IV</a></td>
    <td><a href="appForm3Insert.php">Financial Information </a></td>
  </tr>
   <tr>
    <td class="pageHeading"><a href="appForm31Insert.php">FORM V</a></td>
    <td><a href="appForm31Insert.php">Bank Account Information</a></td>
  </tr>
   <tr>
    <td colspan="2">&nbsp;</td>
     </tr>
   <tr>
    <td colspan="2" style="font:'Courier New', Courier, monospace; font-weight:bold; font-size:12px">The following documentary evidence  are to be forwarded before the deadline to the Standing Cabinet Appointed Procurement Committee, Command Procurement Devision, Sri Lanka Air Force, Colombo 02.</td>
    </tr>
   <tr>
    <td colspan="2" class="p3">
    (a)Certified copy of the Certificate of Registration or Incorporation.<br/>
(b) 	Tax clearance certificate for the past 3 assessment years issued by the Department of   Inland Revenue - VAT No<br/>
(c) 	Audited Statements of accounts for past 3 financial years.<br/>
 (d)   	Bankers certificate regarding financial stability .  Form "V"<br/>
 (e)   	Documentary evidence to prove the possession of following communication   facilities. <br/>
&nbsp;&nbsp;&nbsp&nbspi.	Telephone/s	&nbsp;&nbsp;&nbsp;	 iii.  Fax<br/>
&nbsp;&nbsp;&nbsp&nbspii.	Mobile phone/s&nbsp;&nbsp;&nbsp;	 iv.  E-Mail<br/> 
(f)	Documentary evidence to prove the possession of a fleet of vehicles .<br/>
(g)	Documentary evidence to prove the possession of the following storage facilities<br/>
&nbsp;&nbsp;&nbsp&nbspi.	Cold rooms. (if necessary) (Capacity)<br/>
&nbsp;&nbsp;&nbsp&nbspii.	Warehouses. (Capacity)<br/>
&nbsp;&nbsp;&nbsp&nbspiii.	Inspection Report from relevant area SLAF Base<br/>
(h)	Documentary evidence to prove previous experience in similar contracts<br/> 
(i)	A copy of the receipt issued for the payment of non-refundable deposit.<br/> 

</td>
   
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
   
  </tr>
</table>

   
    
    
    
   
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
