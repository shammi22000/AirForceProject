<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }
if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
{
	include("../../Include_Connection.php");


$sql="UPDATE login SET 	name='$_POST[name]', userName='$_POST[un]', password='$_POST[pw]', login_Type='$_POST[logtype]', login_Status='$_POST[status]' WHERE login_Id='$_POST[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Edited";
	}
	else
	
	{
		$txt="Error".mysql_error();	
	}
	header("Location:loginView.php?msg=$txt");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="109"></td>
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
    <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>Edit Login Information</h2>
	<?php
	include("../../Include_Connection.php");
	$id=$_POST['ID'];
	$sql = "SELECT * FROM login WHERE login_Id='$id'";
 	$result = mysql_query($sql, $conn) or die(mysql_error());
	 $newArray=mysql_fetch_array($result)
	 ?>
     
      <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       
 <div class="container">
          <table width="700" border="0" cellpadding="4" bgcolor="#CCCCCC" bordercolor="#000000">
       
                <tr class="p3">
          <td width="350" align="right">Company Name</td>
          <td width="300"><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Business Registration No</td>
          <td><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td width="350" align="right">Business Registration Date</td>
          <td>
            
            <div class="demo" style="padding:0px">
				<p><input  name="dof"type="text" id="datepicker"></p></div>
            </td>
        </tr>
        <tr class="p3" align="right">
          <td align="right">Nature of the Business</td>
          <td align="left"><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
        <tr class="p3" align="right">
          <td align="right">VAT registration No</td>
          <td align="left"><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Address</td>
          <td><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
         <tr class="p3">
          <td align="right">Telephone No</td>
          <td><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
         <tr class="p3">
          <td align="right">Mobile No</td>
          <td><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
         <tr class="p3">
          <td align="right">Fax No</td>
          <td><label for="cname"></label>
            <input name="cname" type="text" id="cname" size="25" value="<?php echo $comName; ?> " />&nbsp;<span style="font-size:12px; color: #333; font-weight:bold" ><?php echo $err_comName_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Email Address</td>
          <td><label for="email"></label>
            <input name="email" type="text" id="email" size="25" value="<?php echo $email; ?> "/><span style="font-size:10px; color:#FF0000" ><?php echo $err_email_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">User name</td>
          <td><label for="un"></label>
            <input name="un" type="text" id="un" size="25"value="<?php echo  $uname; ?> " /><span style="font-size:10px; color:#FF0000" ><?php echo $err_uname_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Password</td>
          <td><label for="pw"></label>
            <input name="pw" type="password" id="pw" size="25" value="<?php echo $password; ?> "/><span style="font-size:10px; color:#FF0000" ><?php echo $err_password_msg; ?></span></td>
        </tr>
        <tr class="p3">
          <td align="right">Re-Enter Password</td>
          <td><label for="pw"></label>
            <input name="pw" type="password" id="pw" size="25" value="<?php echo $password; ?> "/><span style="font-size:10px; color:#FF0000" ><?php echo $err_password_msg; ?></span></td>
        </tr>
        
        <tr class="p3">
         
          <td colspan="2" align="center"><input type="submit" name="btnRegister" id="btnRegister" value="Register"  />
           
            <input name="btncancel" type="button" id="btncancel" value="Cancel"  ></td>
        </tr>
      </table>
        </div>
  </form>
    </td>

   </tr>
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
