<?php
 error_reporting(E_ALL ^ E_NOTICE);
if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
{
	include("../../Include_Connection.php");

	$sql="UPDATE station SET stationName ='$_POST[staName]', addLine1 ='$_POST[ad1]', addLine2 ='$_POST[ad2]', addLine3 ='$_POST[ad3]', 	addCity ='$_POST[adCity]', contPersonName ='$_POST[conPerson]', phoneNo1 ='$_POST[tp1]', phoneNo2 ='$_POST[tp2]', fax ='$_POST[fax]', email ='$_POST[email]' WHERE stationId='$_POST[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Edited";
	}
	else
	
	{
	$txt="Error".mysql_error();	
	}
	header("Location:stationView.php?msg=$txt");
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
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/>Edit Station Detail</h2>
     <?php
	include("../../Include_Connection.php");
	$id=$_GET['ID'];
	$sql = "SELECT * FROM station WHERE  stationId='$id'";
 $result = mysql_query($sql, $conn) or die(mysql_error());
 $newArray=mysql_fetch_array($result)
 ?>
      <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       
 <div class="container">
          <table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  
   <tr>
    <td width="100" class="subtableheading">Station Name</td>
    <td>
    <input type="text" name="staName" value="<?php echo $newArray['stationName']; ?>" />
    </td>
  </tr>
  <tr>
    <td class="subtableheading">Address</td>
    <td>
 <input type="text" name="ad1" value="<?php echo $newArray['addLine1']; ?>" /> <br/>			   
  <input type="text" name="ad2" value="<?php echo $newArray['addLine2']; ?>" /><br/>    
 <input type="text" name="ad3" value="<?php echo $newArray['addLine3']; ?>" /><br/>   
  <input type="text" name="adCity" value="<?php echo $newArray['addCity']; ?>" />
    </td>
  </tr>
  <tr>
    <td  class="subtableheading">Contact Person</td>
    <td>
    <input type="text" name="conPerson" value="<?php echo $newArray['contPersonName']; ?> " />
    </td>
  </tr>
      <tr>
    <td  class="subtableheading">Telephone</td>
    <td>
    <input type="text" name="tp1" value="<?php echo $newArray['phoneNo1']; ?>" /><br/>
    <input type="text" name="tp2" value="<?php echo $newArray['phoneNo2']; ?>" />
    
    </td>
  </tr>
   <tr>
    <td  class="subtableheading">Fax</td>
    <td>
    <input type="text" name="fax" value="<?php echo $newArray['fax']; ?>" />
    </td>
  </tr>
   <tr>
    <td  class="subtableheading">Email</td>
    <td>
    <input type="text" name="email" value="<?php echo $newArray['email']; ?>" />
    </td>
  </tr>
    
  <tr >
  <td colspan="2" align="center" height="40" >
  <input type="submit" name="submit" value="UPDATE" />&nbsp;
  <input type="reset" name="reset" value="CLEAR" />
  <input type="hidden" name="ID" value="<?php echo $newArray['stationId'];?>" />
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
