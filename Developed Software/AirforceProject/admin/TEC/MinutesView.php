
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
				include("../../include_Mainmenu.php");
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
<h3 class="pageHeading" align="center">Minutes/Agendas of TEC meetings View Page</h3>
   
   				<?php //retrieve minute infor=======================================
    				error_reporting(E_ALL ^ E_NOTICE);
					include("../../Include_Connection.php");
 					$sql = "SELECT * FROM minutes WHERE comName='TEC' GROUP BY Date";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
 				 ?>
   
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<!-- /////////////////////////////dates of minutes list display////////////////////////////// --> 
 <p align="center">
    		<select name="SerID">
   		 	<?php  
			while ($newArray = mysql_fetch_array($result)) { ?>
 			<option value="<?php echo $newArray['Date']; ?>" <?php if($newArray['Date']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['Date']; ?></option>
     		<?php } ?>
   		    </select> 
    		<input type="submit" name="Sersubmit" value="SEARCH" />
</p>
   
  
 				<?php
					if(isset($_GET['Sersubmit']))
					{
 					$Id= $_GET['SerID'];
					include("../../Include_Connection.php");
 					$sql = "SELECT * FROM minutes WHERE (Date='$Id')";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
			  ?> 
 
<table width="600" border="0" cellpadding="0" align="center" class="subtable">
  <tr>
    	<td width="30" class="subtableheading" height="50" align="center">Sr No</td>
    	<td width="100" class="subtableheading" align="center" >Document Type</td>
    	<td width="400" class="subtableheading" align="center">Document Path</td>
     	<td width="400" class="subtableheading" align="center">Action</td>
  </tr>  
 			<?php
 				$a=1; $b=0;
			 	while ($newArray = mysql_fetch_array($result))
				 { $b++; 
	 			if($a%2==1)
	 				{$bg="tableBg1";}
	 	 		else
					{$bg="tableBg2";}
				?>
 <tr class="<?php echo $bg; ?>">
    	<td height="30"  align="center"><?php echo $b; ?></td>
        <td align="left"><?php echo $newArray['docType']; ?></td>
    	<td><a href="Minutes/<?php echo $newArray['docPath']; ?>">TEC <?php echo $newArray['docType']; ?> - <?php echo $newArray['Date']; ?></a></td>
    	<td align="center">
        	<a href="minutesEdit.php?ID=<?php echo $newArray['minuteId']; ?>"><img src="image/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    		<a href="minutesDelete.php?ID=<?php echo $newArray['minuteId']; ?>"><img src="image/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a></td>
  </tr>
			<?PHP  $a++; } ?>

</table>
</form>
 			<?php
 				}
 				else { echo "no data"; }
				mysql_close($conn);

			?>
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
