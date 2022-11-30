<?php 
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }	?>
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
 
  <tr>
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
   		 <td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

			<?php
			include("includeOfficerSubmenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>View Committee Member Information</h2>
         
<!-- /////////////////////////////Form 1 started////////////////////////////// -->     
<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

<table width="400" border="0" cellspacing="0" cellpadding="10" align="center">
      	<?php
		include ("../../include_Connection.php");
		 $sql = "SELECT * FROM committee"; 
		 $result = mysql_query($sql, $conn) or die(mysql_error());
		?>
  <tr>
    	<td align="right">
   		 <select name="SerID">
       		<?php  
			while ($newArray = mysql_fetch_array($result)) 
 			{
			?>
    	<option value="<?php echo $newArray['commId']; ?>" <?php if($newArray['commId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['commName']; ?> </option>
    		<?php
 			}
			?>
    	 </select>
    	</td>
    	<td align="left">
    	<input type="submit" name="Sersubmit" value="SEARCH" />
   		 </td>
  </tr>
</table>
   

       		<?php
			if(isset($_GET['Sersubmit']))
			{
				 $Id= $_GET['SerID'];
				include("../../Include_Connection.php");
				//$sql = "SELECT * FROM  committemember";
	 			$sql = "SELECT * FROM committemember,committee  WHERE (committee.commId=committemember.ComitteeID AND ComitteeID='$Id')";
	 			// execute the SQL statement
				 $result = mysql_query($sql, $conn) or die(mysql_error());
 				//go through each row in the result set and display data
	 	?>
 <div class="container">
 <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
   		 <td height="40">No</td>
   		 <td>Name</td>
   		 <td>Position</td>
   		 <td>Appoinment Date</td>
   		 <td>End Date</td>
    	<td>Action</td>    
   </tr>

		<?php
   		$a=1;
 		while ($newArray = mysql_fetch_array($result))
 		{
	 		if($a%2==1)
			 {$bg="tableBg1";}
	 		 else{$bg="tableBg2";}
?>
  <tr class="<?php echo $bg; ?>">
    	<td height="30"  align="center">
		<?php echo $newArray['comMemId']; ?></td>
    	<td><?php echo $newArray['memName']; ?></td>
    	<td><?php echo $newArray['memPosition']; ?></td>
    	<td><?php echo $newArray['appoinmentDate']; ?></td>
    	<td><?php echo $newArray['endDate']; ?></td>
    	<td align="center">
   		<a href="commFullView.php?ID=<?php echo $newArray['comMemId']; ?>"><img src="../../images/b_views.png" width="16" height="16" alt="FULL VIEW" border="0" /></a>&nbsp;&nbsp;
    	<a href="commEdit.php?ID=<?php echo $newArray['comMemId']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    	<a href="commDelete.php?ID=<?php echo $newArray['comMemId']; ?>"><img src="../../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a>
   		 </td> 
   </tr>
		<?PHP  $a++; } ?>

</table>
</form>
</div>  
		 <?php
 		}
 		else { echo "no data"; }
		mysql_close($conn);
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
