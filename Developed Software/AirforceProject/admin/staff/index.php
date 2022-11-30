
<?php
//include("../include_session.php");

session_start();
if(!isset($_SESSION['user2'])||(empty($_SESSION['user2'])))
{header("Location:../../index.php"); }
error_reporting(E_ALL ^ E_NOTICE);


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
 
    <td  colspan="3" height="30" align="center" class="text-style2">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
		
		include("../include_Welcome.php");
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
    <td width="790"  height="450"valign="top" align="center" bgcolor="#FFFFFF">
    <h2 class="pageHeading"><br/>Staff Home Page</h2><br/><br/>
     <div style="border-width: thick; border-color: #000; background-color:#FFFFB7; width:300px; text-align:left; vertical-align:middle; margin-left:100px; font-family:'Courier New', Courier, monospace; font-size:16px; font-weight:bold" >The Authorized Staff members can manage details of Item, Category, Station and the information about Contact using the above links. </div>
     
 </td>
       
     
         
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
