<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }

?>
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
    <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Selected Bidder List View Page</h2>
         
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   
   				<?php //select project year==================================
	  				include ("../../include_Connection.php");
 					$sql ="SELECT * FROM  bid GROUP BY projectYear";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
				?>
  
<p align="left"> Project Year :
    			<select name="SerYear">
        		<option value="-1">Select Year</option>
    			<?php  
					while ($newArray = mysql_fetch_array($result)) 
 					{ 
				?>
    			<option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['SerYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    			<?php } ?>
				</select> 
</p>
             
   
<p align="left">Station Name :
      			<?php
				include ("../../include_Connection.php");
 				$sql ="SELECT * FROM  station";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
				?>
  
    			<select name="SerID">
        		<option value="-1">Select Station</option>
    			<?php  
				while ($newArray = mysql_fetch_array($result)) 
 				{ 
				?>
    			<option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    			<?php
 				}
				?>
     			</select>&nbsp;   <input type="submit" name="Sersubmit" value="DISPLAY" />    
</p>
				
    </form> 


   
<form name="form2"  method="get">
       <?php
		if(isset($_GET['Sersubmit']))
		{
				 $Id= $_GET['SerID'];
				$bidYear=$_GET['SerYear'];
		include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  category, station, login, bid  WHERE (category.catId=bid.bidCatID AND station.stationId=bid.bidStatID AND  login.login_Id=bid.bidSupID AND bidStatID='$Id' AND  isSelected=1 AND projectYear='$bidYear')";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
	 		?>
 <div class="container">
          <table width="700" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
  <tr align="center" class="subtableheading">
    <td height="40">Sr. No</td>
    <td>Cetegory Name</td>
    <td>Bidder Name</td>
   <td>Action</td>    
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
	<?php echo $b; ?></td>
   <td><?php echo $newArray['catName']; ?></td>
    <td><?php echo $newArray['name']; ?></td>
    <td align="center">
    <a href="bidListEdit.php?ID=<?php echo $newArray['bidId']; ?>"><img src="../../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
     
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
