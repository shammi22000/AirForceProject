<?php
	session_start(); 
	if(!isset($_SESSION['user4']) || (empty($_SESSION['user4'])))
		{ 	header("Location:../login.php");  }
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
<table width="990" height="650" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
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
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_BaseSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
   		 <td width="790" valign="top" align="center" bgcolor="#FFFFCC"><h3 class="pageHeading">Air Force Base Detail View Page</h3>


<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
         
      			<?php //retrieve station infor================================
					include("../../Include_Connection.php");
					$sql = "SELECT * FROM station ";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
 	 				$newArray = mysql_fetch_array($result);
	 			?>
	 
<!--//////////////////////// display list of station names//////////////////////////////////////-->	
     <select name="serStat" class="p3">
	<?php while ($newArray = mysql_fetch_array($result)) { ?>
	<option value="<?php echo $newArray['stationId']; ?>"><?php echo $newArray['stationName']; ?></option>
	 <?php }  ?>
     </select>&nbsp; <input name="seleStat" type="submit" value="Display" /><br/><br/>
 
 
  				<?php
 				 	if(isset($_GET['seleStat']))
					{
	 				$Id= $_GET['serStat'];
					include("../../Include_Connection.php");
					$sql = "SELECT * FROM station WHERE stationId='$Id' ";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
 					 $newArray = mysql_fetch_array($result);
	 			?>
<div style="width:500">
<table width="500" border="1" bordercolor="#666666" cellspacing="2" cellpadding="10">
  <tr>
   	 	<td width="150" class="subtableheading">Station Name :</td>
    	<td><?php echo $newArray['stationName']; ?></td>
  </tr>
  <tr>
    	<td class="subtableheading">Addresss :</td>
      	<td>
	  		<?php echo $newArray['addLine1']; ?>,<br/> 
	  		<?php echo $newArray['addLine2']; ?>,<br/>
	  		<?php echo $newArray['addLine3']; ?>,<br/>
	  		<?php echo $newArray['addCity']; ?>
      	</td>
  </tr>
  <tr>
  		<td class="subtableheading">Contact Person :</td>
    	<td><?php echo $newArray['contPersonName']; ?></td>
  </tr>
  <tr>
  		<td class="subtableheading">Telephone :</td>
    	<td>
			<?php echo $newArray['phoneNo1']; ?><br/>
			<?php echo $newArray['phoneNo2']; ?>
    	</td>
  </tr>
  <tr>
  		<td class="subtableheading">Email : </td>
    	<td>
			<?php echo $newArray['email']; ?>
    	</td>
  </tr>
  <tr>
  		<td class="subtableheading">Fax :</td>
    	<td>
			<?php echo $newArray['fax']; ?>
    	</td>
  </tr>
  
   <tr>
        <td colspan="2" align="center">
        	<a href="baseMgt_Edit.php?ID=<?php echo $newArray['stationId']; ?>"><input name="update" type="submit" value="Edit" /></a>&nbsp;&nbsp;
        	<input name="cancel" type="reset" value="Cancel" /></td>
    	
  	</tr>
   </table>
   			<?php } ?>
</div> <br/><br/>
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 
         
     
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
