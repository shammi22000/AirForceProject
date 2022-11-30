
<?php
 error_reporting(E_ALL ^ E_NOTICE);

?>


<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../bid/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
	include("../../include_Mainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_sugePriceMenu.php");
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
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
    <p class="pageHeading">TEC suggested prices View page</p>
         
     

<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   <p align="center">Project Year : 

   			<?php
 				$Id= $_GET['serYear'];
				include ("../../include_Connection.php");
				$sql = "SELECT * FROM tecsuggest GROUP BY year  "; 
 				$result = mysql_query($sql, $conn) or die(mysql_error()); 
 			?>
   

    			<select name="serYear" >
       		<?php  
				while ($newArray = mysql_fetch_array($result)) 
 			{
			?>
    		<option value="<?php echo $newArray['year']; ?>" <?php if($newArray['year']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['year']; ?> </option>
   			 <?php
 			}
			?>
		</select> <input name="seleYear" type="submit" value="Display" />

</p>
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 


   
  
    <!--  //////////////////////////////////////////////////////////////////// -->
     <?php 
	
	if(isset($_GET['seleYear']))
{
 ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="get" name="form2">
   
    
    <?php
 $Id= $_GET['serYear'];
include ("../../include_Connection.php");
$sql = "SELECT * FROM item,tecsuggest WHERE (item.itemID=tecsuggest.sugeItemID AND year='$Id') "; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 ?>
 
<table width="600" border="1" cellpadding="0" align="center" class="subtable">
       <tr align="center" height="50">
   		 <td width="50" class="subtableheading">Item No</td>
    	 <td width="200" class="subtableheading">Item Name</td>
    	 <td width="150" class="subtableheading">UOM</td>
    	 <td width="150" class="subtableheading">TEC suggested Price</td>
          <td width="150" class="subtableheading">Action</td>
 	 </tr>
     	
 	 <?php
   $a=1;
   $b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	 if($a%2==1)
	 {$bg="tableBg1";}
	 
	 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    
    	<td height="30"  align="center">
			<?php echo $b; ?>	 	</td>
     	<td align="left">
		 	<?php echo $newArray['itemName']; ?>
     	</td>
     	<td align="left">
		 	<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>  &nbsp;&nbsp; <?php echo $newArray['denomination']; ?>
     	</td>
    	<td>
        	<?php echo $newArray['TECprice']; ?>
         </td>
         <td>
        	 <a href="sugePriceEdit.php?ID=<?php echo $newArray['sugePriceID']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  &nbsp; &nbsp; 
    <a href="sugePriceDelete.php?ID=<?php echo $newArray['sugePriceID']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
         </td>
  </tr>
	<?PHP  $a++; } ?>
    	
  </table>
   
 
 <?php
 } 
?>

   </form>
    <!--  //////////////////////////////////////////////////////////////////// -->

   


   
       </div>
       <br/><br/>
            
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
