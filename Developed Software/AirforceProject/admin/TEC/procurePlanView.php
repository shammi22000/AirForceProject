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
 
<tr>
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
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
					<?php
					include("include_tecPPlanMenu.php");
					?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

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
<td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Procurement Plan View Page</h3>

<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   
   <p align="center">Project Year : 
   							<?php
 								include ("../../include_Connection.php");
								$sql = "SELECT * FROM activity GROUP BY projectYear"; 
								$result = mysql_query($sql, $conn) or die(mysql_error()); 
 								$newArray = mysql_fetch_array($result);
  							?>

   						<select name="serYear">
						<?php  
						while ($newArray = mysql_fetch_array($result)) 
 						{ 	?>
    					<option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    					<?php  } ?>
			    		</select>&nbsp; <input type="submit" name="seleYear" value="Display" />
   </p>
    
     
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
	 
	  			<?php 
				if(isset($_GET['seleYear']))
				{?>
 

<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
  

				<?php
 					$Id= $_GET['serYear'];
				 	include ("../../include_Connection.php");
					$sql = "SELECT * FROM  activitytype, activity WHERE activitytype.activiTypeID=activity.activityName AND projectYear='$Id' "; 
				 	$result = mysql_query($sql, $conn) or die(mysql_error()); 
 					$newArray = mysql_fetch_array($result);
  				?>
<div style="font-family: 'Times New Roman', Times, serif; ">

<table width="700" border="1" cellpadding="5" align="center" class="subtable">
       
     	
 	
<tr>
      	<td width="30" height="50" class="tableBg1">
		 	Sr.No.
     	</td>
     	<td width="300"  class="tableBg1">
		 	Activity Name
     	</td>
     	<td class="tableBg1" width="100">
		 	Start Date
     	</td>
        <td class="tableBg1" width="100">
		 	Start Time
     	</td>
    	<td class="tableBg1" width="100" >
			End Date
    	</td>
        <td class="tableBg1" width="100">
			End Time
    	</td>
        <td class="tableBg1" width="100">
			Action
    	</td>
    	
  </tr>
  <?php
   $a=0;
 while ($newArray = mysql_fetch_array($result))
 { $a++;
	
?>
  <tr>
      	<td align="left" >
		 	<?php echo $a; ?>
     	</td>
     	<td align="left" >
		 	<?php echo $newArray['ActivityName']; ?>
     	</td>
     	<td align="left" >
		 	<?php echo $newArray['dateStart']; ?>
     	</td>
    	<td  align="center">
			<?php echo $newArray['startTime']; ?>
    	</td>
        <td align="left">
		 	<?php echo $newArray['dateEnd']; ?>
     	</td>
    	<td  align="center">
			<?php echo $newArray['endTime']; ?>
    	</td>
    	<td>
        	 <a href="procurePlanEdit .php?ID=<?php echo $newArray['activityID']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  &nbsp; &nbsp; 
    <a href="procurePlanDelete .php?ID=<?php echo $newArray['activityID']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
         </td>
  </tr>
	<?PHP   } ?> 
       	
  </table>
       </div>
       <br/><br/>
            
     </form>
     
     	<?PHP   } ?>    
     
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
