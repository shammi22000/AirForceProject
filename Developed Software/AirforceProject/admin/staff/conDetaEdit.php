 <?php
 error_reporting(E_ALL ^ E_NOTICE);
 if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
{
	include("../../Include_Connection.php");

	$sql="UPDATE contactus SET Position ='$_POST[position]', Address ='$_POST[add]',  teleNo1 ='$_POST[tp1]', teleNo2 ='$_POST[tp1]', fax='$_POST[fax]', email ='$_POST[email]' WHERE contactID='$_POST[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Edited";
	}
	else
	
	{
	$txt="Error".mysql_error();	
	}
	header("Location:conDetaView.php?msg=$txt");
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
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109" /></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
		include("include_staffMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("include_staffSubmenu2.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>Edit Contact Detail</h2>
     <?php
	include("../../Include_Connection.php");
	$id=$_GET['ID'];
	$sql = "SELECT * FROM contactus WHERE contactID='$id'";
 $result = mysql_query($sql, $conn) or die(mysql_error());
 $newArray=mysql_fetch_array($result)
 ?>
      <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       
 <div class="container">
          <table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  
   <tr>
    <td width="100" class="subtableheading">Position</td>
    <td>
    <input type="text" name="position" width="400" value="<?php echo $newArray['Position']; ?>"  />
    </td>
  </tr>
  <tr>
    <td width="100" class="subtableheading">Address</td>
    <td>
    <input type="text" name="add" width="400" value="<?php echo $newArray['Address']; ?>"  />
    </td>
  </tr>
   <tr>
    <td width="100" class="subtableheading">Telephone</td>
    <td>
    <input type="text" name="tp1" width="400" value="<?php echo $newArray['teleNo1']; ?>"  />
     <input type="text" name="tp2" width="400" value="<?php echo $newArray['teleNo2']; ?>"  />
    </td>
  </tr>
   <tr>
    <td width="100" class="subtableheading">Fax No</td>
    <td>
    <input type="text" name="fax" width="400" value="<?php echo $newArray['fax']; ?>"  />
    </td>
  </tr>
   <tr>
    <td width="100" class="subtableheading">Email</td>
    <td>
    <input type="text" name="email" width="400" value="<?php echo $newArray['email']; ?>"  />
    </td>
  </tr>
    
  <tr >
  <td colspan="2" align="center" height="40" >
  <input type="submit" name="submit" value="UPDATE" />&nbsp;
  <input type="reset" name="reset" value="CLEAR" />
  <input type="hidden" name="ID" value="<?php echo $newArray['contactID'];?>" />
  </td>
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
