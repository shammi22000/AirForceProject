<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center"bgcolor="#FFFFFF">
    
  		 <?php
		include("Include_Connection.php");
		 $sql = "SELECT * FROM contactus";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
  		?>
<table width="500" border="0" cellpadding="5" align="center" bgcolor="#89CBEB" class="subtable" >
  <tr>
    <td colspan="2" height="50" class="pageHeading"><h2>Contact Details</h2></td>
     </tr>
     	<?php
  		 while ($newArray = mysql_fetch_array($result))
 		{
		?>
  <tr>
    	<td width="100" ><strong>Address:</strong></td>
     	<td width="400" ><?php echo $newArray['Position'];?><br/><?php echo $newArray['Address'];?></td>
  </tr>
  <tr>
   		<td ><strong>Telepho No:</strong></td>
  		<td><?php echo $newArray['teleNo1'];?><br/><?php echo $newArray['teleNo2'];?></td></tr>
  <tr>
   		<td ><strong>Email:</strong></td>
   		<td><?php echo $newArray['email'];?></td>
  
  </tr>
   <tr>
    	<td ><strong>Fax:</strong></td>
   		<td><?php echo $newArray['fax'];?></td>
  </tr>
  <tr>	
  		<td colspan="2"><hr /></td>
        
  </tr>
   		<?php }?> 
</table>
    
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
