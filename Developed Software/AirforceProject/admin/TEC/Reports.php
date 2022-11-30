
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
	include("include_BaseMainmenu.php");
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
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC">
    <br/><h1 align="center">Reports</h1>
   
  
   

    
     
  
 <?php

include("../../Include_Connection.php");
 $sql = "SELECT * FROM report WHERE reComName='TEC'";
 $result = mysql_query($sql, $conn) or die(mysql_error());

 
  ?> 
 
   <table width="600" border="0" cellpadding="0" align="center" class="subtable">
    
  
   <tr>
    <td width="30" class="tableBg1" height="50" align="center">Sr No</td>
    <td width="100" class="tableBg1" align="center" >Report Name</td>
       
  </tr>  
 <?php
 

$b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	
?>
  <tr >
    <td height="30"  align="center"><?php echo $b ?></td>
     <td><a href="../report/<?php echo $newArray['docPath']; ?>" target="_new"><?php echo $newArray['reportName']; ?> </a></td>
    
  </tr>
	<?PHP  } ?>

</table>

 

    

   
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
