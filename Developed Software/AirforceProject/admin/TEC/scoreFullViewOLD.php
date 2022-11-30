<?php
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
$sql = "SELECT * FROM   qualificationtype, points WHERE(qualificationtype.qualifiTypeID=points. 	qualTypeId  AND pointID='$Id' )"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 //$newArray = mysql_fetch_array($result);
 
 ?>
  <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="700" border="0" cellpadding="0" align="center" class="subtable">
       
     	
 	
<tr>
      	
     	<td width="300" height="50" class="tableBg1">Sr No</td>
     	<td class="tableBg1" width="100">Qualification Type</td>
        <td class="tableBg1" width="100">Recommended Points</td>
    	<td class="tableBg1" width="100" >Action</td>
            	
  </tr>
  <?php
   
   $b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	
?>
  <tr>
      	
     	<td align="left" >
		 	<?php echo $b; ?>
     	</td>
     	<td align="left" >
		 	<?php echo $newArray['qualificatioName']; ?>
     	</td>
    	<td  align="center">
			<?php echo $newArray['recomPoints']; ?>
    	</td>
           	<td>
            <a href="scoreEdit.php?ID=<?php echo $newArray['pointID']; ?>"><img src="image/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="ScoreDelete.php?ID=<?php echo $newArray['pointID']; ?>"><img src="image/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
         </td>
  </tr>
	<?PHP  } ?>
       	
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
