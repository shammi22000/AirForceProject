<?php 
session_start(); 
if(!isset($_SESSION['user1']) || (empty($_SESSION['user1']))) 
{ 	header("Location:../login.php");	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
				<?php
				include("../include_Mainmenu.php");
				?>
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

		</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" valign="top" align="left" bgcolor="#FFFFCC">
<h3 class="pageHeading" align="center">Bid Documents for supply of Ration items<br/>for the year &nbsp;&nbsp;<?php $projectYear = date("Y");  echo $projectYear;?> </h3><br/>
   
   				
				<?php //retrieve bid documents infor====================================
   				 error_reporting(E_ALL ^ E_NOTICE);
				include("../Include_Connection.php");
 				 $sql = "SELECT * FROM tenderdocuments ";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
  				?>
   

<!--///////////////////////Start Form 2/////////////////////////////-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get" name="form1">
    
<table width="700" border="0" cellpadding="0" align="center" class="subtable">
 <tr height="50">
    	<td width="50" class="subtableheading" height="50" align="center">Sr No</td>
    	<td width="350" class="subtableheading" align="center" >Document Name</td>
    	<td width="350" class="subtableheading" align="center">Document </td>
    
  </tr>  
		 	<?php
 			$a=1;$b=0;
			while ($newArray = mysql_fetch_array($result))
 				{$b++;
				 if($a%2==1)
	 				{$bg="tableBg1";}
	 	 		else{$bg="tableBg2";}
			?>
 <tr class="<?php echo $bg; ?>">
   	 	<td height="30"  align="center"><?php echo $b ?></td>
        <td align="left"><?php echo $newArray['docName']; ?></td>
    	<td><a href="TenderDocument/<?php echo $newArray['docPath']; ?>"><?php echo $newArray['docName']; ?> - <?php echo $newArray['year']; ?></a></td>
  </tr>
			<?PHP  $a++; } ?>

</table>
<br/><br/>
</form>
<!--///////////////////////ending form1/////////////////////////////-->


    

   
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
