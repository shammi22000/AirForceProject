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
    	<td width="790" valign="top" align="center" bgcolor="#FFFFFF">
    
<h2 class="pageHeading">Committee Details</h2>
    
<table width="700" boSrder="1" cellpadding="0" class="contactTable" >
  <tr>
    	<td valign="top">
   			 <?php
			include("Include_Connection.php");
			 $sql = "SELECT * FROM committemember WHERE ComitteeID=1";
			 $result = mysql_query($sql, $conn) or die(mysql_error());
  				?>
                
 <table width="350" border="0" cellpadding="5" class="subtable">
  <tr>
    	<td class="subtableheading" valign="top" height="50">Standing Cabinet Appointed Procurement Committee(SCAPC)</td>
  </tr>
  
   			<?php
  			 while ($newArray = mysql_fetch_array($result))
			 {
	 		?>
  <tr>
   	 <td>
		<?php echo $newArray['memPosition'];?><br/>
   		 <?php echo $newArray['memName'];?><br/>
    	<?php echo $newArray['occupation'];?><br/>
    	<?php echo $newArray['memWorkPlace'];?><br/>
    	<?php echo $newArray['workPlaceAddress'];?>
      </td>
  </tr>
  <tr>
  	<td><hr/></td>
  </tr>
  	 <?php }?> 
</table>
</td>
    <td valign="top">
    	<?php
		include("Include_Connection.php");
 		$sql = "SELECT * FROM committemember WHERE ComitteeID=2";
 		$result = mysql_query($sql, $conn) or die(mysql_error());
 		?>
 <table width="350" border="0" cellpadding="5" class="subtable">
  <tr>
   	 <td class="subtableheading" height="50">Technical Evaluation Committee<br/>(TEC)</td>
  </tr>
   		<?php
  	 	while ($newArray = mysql_fetch_array($result))
		 {
	 	?>
  <tr>
    	<td>
    	<?php echo $newArray['memPosition'];?><br/>
    	<?php echo $newArray['memName'];?><br/>
   	 	<?php echo $newArray['occupation'];?><br/>
    	<?php echo $newArray['memWorkPlace'];?><br/>
    	<?php echo $newArray['workPlaceAddress'];?>
    	</td>
  </tr>
  <tr>
  		<td><hr/></td></tr>
   		<?php }?> 
</table>
		</td>
 </tr>
  
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
