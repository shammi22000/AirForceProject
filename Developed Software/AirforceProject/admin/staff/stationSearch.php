<?php ?>
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
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
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
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Search Item Detail</h2>
    
     
      <form name="SerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

      <table width="400" border="0" cellspacing="0" cellpadding="10" align="center">

      <?php
include ("../../include_Connection.php");

 $sql = "SELECT * FROM station ORDER BY stationName "; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
?>
  <tr>
    <td align="right">
       <select name="SerID">
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    <?php
 }
	?>
    
    </select>
    </td>
    <td align="left"><input type="submit" name="Sersubmit" value="Search" /></td>
  </tr>
  
    
</table>
<br/>
</form>



<?php
if(isset($_GET['Sersubmit']))
{
	 $Id= $_GET['SerID'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM station WHERE stationId='$Id'"; 
 $result = mysql_query($sql, $conn) or die(mysql_error());
 $newArray = mysql_fetch_array($result);
?>

<table width="300" border="1" cellspacing="0" cellpadding="10" align="center" class="subtable">

 <tr>
    <td width="100" class="subtableheading">Item Name</td>
    <td><?php echo $newArray['stationName']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">Address</td>
    <td><?php echo $newArray['addLine1']; ?></br>
	<?php echo $newArray['addLine2']; ?></br>
	<?php echo $newArray['addLine3']; ?></br>
    <?php echo $newArray['addCity']; ?></td>
  </tr>
  <tr>
    <td class="subtableheading">Contact Person</td>
    <td><?php echo $newArray['contPersonName']; ?> </td>
  </tr>  
  <tr>
    <td class="subtableheading">Telephone</td>
    <td><?php echo $newArray['phoneNo1']; ?></br>
    <?php echo $newArray['phoneNo2']; ?></td>
  </tr> 
  <tr>
    <td class="subtableheading">Fax</td>
    <td><?php echo $newArray['fax']; ?></td>
  </tr>  
  <tr>
    <td class="subtableheading">Email</td>
    <td><?php echo $newArray['email']; ?></td>
  </tr>   
  <tr>
  <tr class="tableheading">
  <td align="center" colspan="2">
    <a href="stationEdit.php?ID=<?php echo $newArray['stationId']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="stationDelete.php?ID=<?php echo $newArray['stationId']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a></td>
  </tr>
</table>

<?php
}
?>
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
