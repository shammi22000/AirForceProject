<?php
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['btnRegister']) || $_POST['btnRegister']=='Register')
{

		//Get Posted Form Inputs
		$comName=$_POST['cname'];			$BRnum=$_POST['BRno'];
		$BRdate=$_POST['dof'];				$Bnature=$_POST['Bnature'];
		$VAT=$_POST['vat'];					$address=$_POST['add'];
		$telephone=$_POST['tp'];			$mobileNo=$_POST['mobile'];
		$faxno=$_POST['fax'];		 		$email=$_POST['email'];
 		$uname=$_POST['un'];		 		$password=$_POST['pw'];
		$rPW=$_POST['rpw'];
		
 		$error=0;
 		$err_comName_msg="";				$err_BRno_msg="";
		$err_date_msg="";					$err_Bnature_msg="";
		$err_vat_msg="";					$err_add_msg="";
		$err_tp_msg="";						$err_mobile_msg="";			
		$err_fax_msg="";					$err_email_msg="";
 		$err_uname_msg="";	 				$err_password_msg="";
		$err_repassword_msg="";
		
 //Inlput Validation
 if(strlen(trim($comName))==0)
 {
 	$error=1;
 	$err_comName_msg="*Compulsory Field";
 }
 if(strlen(trim($BRnum))==0)
 {
 	$error=1;
 	$err_BRno_msg="*Compulsory Field";
 }

if(strlen(trim($BRdate))==0)
 {
 	$error=1;
 	$err_date_msg="*Compulsory Field";
 }

if(strlen(trim($Bnature))==0)
 {
 	$error=1;
 	$err_Bnature_msg="*Compulsory Field";
 }

if(strlen(trim($VAT))==0)
 {
 	$error=1;
 	$err_vat_msg="*Compulsory Field";
 }

if(strlen(trim($address))==0)
 {
 	$error=1;
 	$err_add_msg="*Compulsory Field";
 }

if(strlen(trim($telephone))==0)
 {
 	$error=1;
 	$err_tp_msg="*Compulsory Field";
 }

if(strlen(trim($mobileNo))==0)
 {
 	$error=1;
 	$err_mobile_msg="*Compulsory Field";
 }

if(strlen(trim($email))==0)
 {
 	$error=1;
 	$err_email_msg="Enter email Address";
 }
if(strlen($uname)>35)
{
	$error=1;
 	 $err_uname_msg="Maximum 35 characters";}

if (strlen(trim($uname))=="")
 {
 	$error=1;
 	 $err_uname_msg="Enter User name";
 }
 if(strlen($password)<5)
 {
 	$error=1;
 	$err_password_msg="Minimum 8 characters";
 }
 if(strlen($password)=="")
 {
 	$error=1;
 	 $err_password_msg="Enter password";
 }
 if(strlen($rPW)=="")
 {
 	$error=1;
 	 $err_repassword_msg="Re-enter password";
 }
 	else if($password<>$rPW)
	{$error=1;
 	 $err_repassword_msg="Password not matching";}
 if($error==0)
 {
 	//Process Form
	$process=1;
 	include("Include_Connection.php");
    $sql="INSERT INTO login(login_Id, name, userName, password, login_Type , userGroup, login_Status, goupId,  	email, TPNo1, mobileNo, faxNo, busRegDate, busRegNo, busNature, VATregNo) 
	VALUES ('', '$_POST[cname]', '$_POST[un]', '$_POST[rpw]', 'user', 'u0', 'disable', '1', '$_POST[email]', '$_POST[tp]','$_POST[mobile]', '$_POST[fax]', '$_POST[dof]', '$_POST[BRno]',  '$_POST[Bnature]', '$_POST[vat]')";	if(mysql_query($sql, $conn))
	if(mysql_query($sql1, $conn))
	{
		echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Successfully Registered!')
				</SCRIPT>");
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:index.php");
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
<link href="include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<!-- ////////jquery Starting/////// -->
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="jquery/demos.css">
		<script src="jquery/jquery-1.5.1.js"></script>
		<script src="jquery/jquery.ui.core.js"></script>
		<script src="jquery/jquery.ui.widget.js"></script>
		<script src="jquery/jquery.ui.datepicker.js"></script>
		<script> 
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script> 
<!-- ////////jquery Ending/////// -->
 
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="500" valign="middle" align="center" class="subtable" bgcolor="#CCCCCC">
    <h2>Register Page</h2>

     <div class="container">
 <form  method="post"  name="form1" id="form1" >
 <table width="700" border="0" cellpadding="4" bgcolor="#CCCCCC" bordercolor="#000000">
       
     <tr class="p3">
          <td width="300" align="right">Company Name</td>
          <td width="350"><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?>" />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_comName_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td align="right">Business Registration No</td>
          <td><label for="cname"></label>
            <input name="BRno" type="text" id="BRno" size="25" value="<?php echo $BRnum; ?>" />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_BRno_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td width="350" align="right">Business Registration Date</td>
          <td><div class="demo" style="padding:0px"><input  name="dof" type="text" id="datepicker" value="<?php echo $BRdate; ?>">&nbsp;
          <span style="font-size:10px; color:#FF0000;" ><?php echo $err_date_msg; ?></span></div></td>         
     </tr>
     <tr class="p3" align="right">
          <td align="right">Nature of the Business</td>
          <td align="left">
            <input name="Bnature" type="text" id="Bnature" size="25" value="<?php echo $Bnature; ?>"  />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_Bnature_msg; ?></span></td>
     </tr>
     <tr class="p3" align="right">
          <td align="right">VAT registration No</td>
          <td align="left">
            <input name="vat" type="text" id="vat" size="25" value="<?php echo $VAT; ?>"  />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_vat_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td align="right">Address</td>
          <td>
            <input name="add" type="text" id="add" size="25" value="<?php echo $address; ?>"  />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_add_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td align="right">Telephone No</td>
          <td>
            <input name="tp" type="text" id="tp" size="25" value="<?php echo $telephone; ?>" />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_tp_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td align="right">Mobile No</td>
          <td>
            <input name="mobile" type="text" id="mobile" size="25" value="<?php echo $mobileNo; ?>"/>&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_mobile_msg; ?></span></td>
     </tr>
     <tr class="p3">
          <td align="right">Fax No</td>
          <td>
            <input name="fax" type="text" id="fax" size="25" value="<?php echo $faxno; ?>" />&nbsp;
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_fax_msg; ?></span></td>
    </tr>
    <tr class="p3">
          <td align="right">Email Address</td>
          <td>
            <input name="email" type="text" id="email" size="25"  value="<?php echo $email; ?>"/>
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_email_msg; ?></span></td>
    </tr>
     <tr class="p3">
          <td align="right">User name</td>
          <td>
            <input name="un" type="text" id="un" size="25" value="<?php echo $uname; ?>"/>
            <span style="font-size:10px; color:#FF0000;" ><?php echo $err_uname_msg; ?></span></td>
     </tr>
        <tr class="p3">
          <td align="right">Password</td>
          <td>
            <input name="pw" type="password" id="pw" size="25" value="" />
            <span style="font-size:10px; color:#FF0000;"><?php echo $err_password_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Re-Enter Password</td>
          <td> <input name="rpw" type="password" id="rpw" size="25" value="" />
          <span style="font-size:10px; color:#FF0000;" ><?php echo $err_repassword_msg; ?></span></td>
        </tr>
        
        <tr class="p3">
         
          <td colspan="2" align="center"><input type="submit" name="btnRegister" id="btnRegister" value="Register"  />
           
            <input name="btncancel" type="button" id="btncancel" value="Cancel"  ></td>
        </tr>
      </table>
  </form>
  </div>
    </td>
   </tr>
  <tr>
    <td colspan="2" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
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