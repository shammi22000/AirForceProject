<?php
//include("include_Session.php");

if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']))
{
	include("../../Include_Connection.php");


 $sql="UPDATE pqpoints SET avgAnnIncome='$_GET[annIncome]', availCredit='$_GET[aviCredit]', staff='$_GET[staff]', vehicle='$_GET[vehicle]', coldRoom='$_GET[cRoom]', stores='$_GET[store]', experience='$_GET[exp]', performance='$_GET[perf]'  WHERE PQpointID='$_GET[ID]'"; 


	
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
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Recommended Points Edit Page</h3>
   <!-- /////////////////////////////Select the Project Year//////////////////////////// --> 
   
  
         <form action= method="get" name="form1">
          
  
 <!-- /////////////////////////////Select the Project Year//////////////////////////// -->   
<?php
 $Id= $_GET['ID'];
 include ("../../include_Connection.php");
$sql = "SELECT * FROM  supplier, pqpoints WHERE(supplier.supplierID=pqpoints.PQsupID  AND PQpointID='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 $newArray = mysql_fetch_array($result);
 ?>
 
  <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="500" border="0" cellpadding="10" align="center" class="subtable">
    
  <tr>
    <td class="subtableheading" width="120">Bidder Name</td>
    <td><?php echo $newArray['compName']; ?></td>
  </tr>
 <tr>
    <td class="subtableheading">Average Annual Income</td>
    <td><input name="annIncome" type="text" value="<?php echo $newArray['avgAnnIncome']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Available Credit</td>
    <td><input name="aviCredit" type="text" value="<?php echo $newArray['availCredit']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Staff, EPF/ETF staff</td>
    <td><input name="staff" type="text" value="<?php echo $newArray['staff']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Transport Facility</td>
    <td><input name="vehicle" type="text" value="<?php echo $newArray['vehicle']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Cold Room Facility</td>
    <td><input name="cRoom" type="text" value="<?php echo $newArray['coldRoom']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Storage Facility</td>
    <td><input name="store" type="text" value="<?php echo $newArray['stores']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Past Experience</td>
    <td><input name="exp" type="text" value="<?php echo $newArray['experience']; ?>" /> </td>
  </tr>
  <tr>
    <td class="subtableheading">Past Performance</td>
    <td><input name="perf" type="text" value="<?php echo $newArray['performance']; ?>" /> </td>
  </tr>
  <tr align="center">
    <td colspan="2"><input name="ID" type="hidden" value="<?php echo $newArray['PQpointID']; ?>"  />&nbsp;&nbsp;&nbsp;  <input name="submit" type="submit" value="UPDATE"  /> &nbsp;&nbsp;&nbsp; <input type="reset" name="Cancel" id="Cancel" value="CANCEL" />
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
