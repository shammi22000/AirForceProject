<?php
include("include_Session.php");

if($_POST['submit']=="UPDATE" || !empty($_POST['submit']) || isset($_POST['submit']))
{
	include("../../Include_Connection.php");


$sql="UPDATE points SET recomPoints='$_POST[name]' WHERE pointID='$_POST[ID]'";
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Edited";
	}
	else
	
	{
		$txt="Error".mysql_error();	
	}
	header("Location:scoreView.php?msg=$txt");
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
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	//include("include_BaseMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_tecSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Recommended Points View Page</h3>
   <!-- /////////////////////////////Select the Project Year//////////////////////////// --> 
   
  
         <form action="" method="get" name="form1">
          
  
 <!-- /////////////////////////////Select the Project Year//////////////////////////// -->   
<?php
 $Id= $_GET['ID'];
 include ("../../include_Connection.php");
$sql = "SELECT * FROM  supplier, qualification, points WHERE(supplier.supplierID=points.supId  AND qualificationtype.qualifiTypeID=points.qualTypeId AND pointID='$Id' )"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 ?>
 
  <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="500" border="0" cellpadding="15" align="center" class="subtable">
      
  <tr>
    <td class="subtableheading" width="120">Bidder Name</td>
    <td><?php echo $newArray['compName']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">Qualification</td>
    <td><?php echo $newArray['qualificatioName']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">Recommended Points</td>
    <td><input name="ID" type="point" value="<?php echo $newArray['recomPoints']; ?>" /> </td>
  </tr>
  <tr align="center">
    <td colspan="2"><input name="ID" type="hidden" value="<?php echo $newArray['pointID']; ?>"  />&nbsp;&nbsp;&nbsp;  <input name="submit" type="submit" value="UPDATE"  /> &nbsp;&nbsp;&nbsp; <input type="reset" name="Cancel" id="Cancel" value="CANCEL" />
</td>
      </tr>
       	
  </table>
       </div>
       <br/><br/>
            
     </form>
     
     	  
     
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
