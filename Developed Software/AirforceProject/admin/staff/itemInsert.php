<?php
 error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )

{
	include("../../Include_Connection.php");
	$sql="INSERT INTO item (itemID, itemName, UOM, denomination, weight, itemCatID) VALUES ('', '$_GET[itName]', '$_GET[UOM]', '$_GET[deno]', '$_GET[weight]', '$_GET[seleCategory]') ";
	
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Added";
	}
	else
	{
		$txt="Error".mysql_error();	
	}
	header("Location:itemView.php?msg=$txt");
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
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h3><br/>Insert Item Detail</h3>
     
     <form name="form1" method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
      
       <table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
 
   <tr>
    <td width="100" class="subtableheading">Item Name</td>
    <td>
    <input type="text" name="itName" />
    </td>
  </tr>
  <tr>
    <td class="subtableheading">UOM</td>
    <td><input type="text" name="UOM" />
    </td>
  </tr>
  <tr>
    <td  class="subtableheading">Denomination</td>
    <td>
    <input type="text" name="deno" />
    
    </td>
  </tr>
    <tr>
    <td  class="subtableheading">Weight</td>
    <td>
    <input type="text" name="weight"  />
    </td>
  </tr>
      <?php
		include("../../Include_Connection.php");
 		$sql = "SELECT * FROM category ";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
 		?>
   <tr>
    <td  class="subtableheading">Category</td>
    <td>
    <select name="seleCategory">
  <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" ><?php echo $newArray['catName']; ?> </option>
    <?php
 }
	?>
    </select>
    </td>
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
