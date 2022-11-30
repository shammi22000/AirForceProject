<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )

{
	include("../../Include_Connection.php");
	$sql="INSERT INTO inquiry_type(inqTypeID, inqName , inqDesc ) VALUES ('', '$_GET[inqType]', '$_GET[dec]')";
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:inqTypeView.php?msg=$txt");
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function val()
{
var answer=window.confirm("Are you sure?");
return answer;
}
</script>

</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
     	<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
			<?php
			include("../../include_Mainmenu.php");
			?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

		</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

			<?php
			include("includeOfficerSubmenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Insert Inquiry Type Details</h2>

<!-- /////////////////////////////Startinf form 1////////////////////////////// -->      
<form name="form1" method="get" action="<?php $_SERVER['PHP_SELF']?>" >
      
<table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
   <tr>
    	<td width="100" class="subtableheading">Inquiry Type</td>
   		 <td><input  name="inqType" type="text" /> </td>
   </tr> 
   <tr>
    	<td class="subtableheading">Description</td>
   		 <td><textarea name="dec" cols="50" rows="10"></textarea></td>
   </tr>
    <tr class="tableheading">
 		 <td colspan="2" align="center" height="40">
 		 <input type="submit" name="submit" value="INSERT" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
  		</td>
  </tr>
</table>
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
