

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr >
    <td  colspan="3" align="center" height="125"><img src="../images/new.jpg" width="990" height="125" alt="logo image" border="0" /></td>
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
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" >
    
    <h2>Generate Payment Invoice </h2>
   
    </div>
    
    
    <form action="printInvoice1.php" method="post" name="registerForm" >
    
     <?php
include("../Include_Connection.php");
 $sql = "SELECT * FROM station";
 // execute the SQL statement
 $result = mysql_query($sql, $conn) or die(mysql_error());
 //go through each row in the result set and display data
 //foreach($numbers as $temp)
//{
//	if(is_array($temp))
	//{
	//	foreach($temp as $value)
	//	{
		//	echo $value. " ";
		//}
	//}
	//else
	//{
	//	echo $temp;
	//}
	//echo "<br>";
//}
 ?>
    
    <table width="500" border="1" cellpadding="0" bgcolor="#EAEAEA">
   <tr bgcolor="#666666" >
    <td height="30" align="center" width="35">Sr no</td>
    <td align="center" width="470" >Station Name</td>
                   
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
  <tr  height="40" class="<?php echo $bg; ?>">
    <td align="center"><?php echo $b; ?></td>
    <td><a href="next.php?stid=<?php echo $newArray['stationId']; ?>"><?php echo $newArray['stationName']; ?></a></td>
           
       
   </tr>
   <?PHP  $a++; } ?>
   
</table>
    </form>
    <br/><br/><br/>
    </td>

   </tr>
  <tr>
    <td height="15" colspan="3" align="center" class="copyr"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
