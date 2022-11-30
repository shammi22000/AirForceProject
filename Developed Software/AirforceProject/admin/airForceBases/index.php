<?php 
session_start(); 
if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
	{ 	header("Location:../index.php");	 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr>
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
     	<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
				<?php
				include("include_BaseMainmenu.php");
				?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 
	</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
  		 <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
			<?php
			include("include_BaseSubMenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" height="500" valign="top" align="left" bgcolor="#FFFFCC" ><h3 class="pageHeading" align="center">Air Force Bases/Stations Information Handling Page</h3><br/><br/>
    
      
 <div class="container2">
      <ul>
      		<li >To enter the quantity consumed/purchased in respect of each item on monthly basis.<br/> Use this link <a href="quantity.php">Consumed Quantities</a></li><br/><br/><br/>
      		<li>Use the <a href="performance.php">Performance of Supplers</a>link to mention the performance of Suppliers on monthly basis.</li><br/><br/><br/>
        	<li>To update the information of Air Force Bases/stations use <a href="baseDetailMgt.php">Air Force Bases details Managements</a> link.</li><br/><br/><br/>
         	<li>Make appeals/inquiries regarding supplies, suppliers, quantitites etc........ use &nbsp;<a href="BaseInquiry.php">Inquiry</a> </li>
      </ul>
</div>
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
