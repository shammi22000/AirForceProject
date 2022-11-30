
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

</head>

<body>

<h2 align="center">Air Force bases/stations Information</h2>

      <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
        <?php
	include("../Include_Connection.php");
	 $sql = "SELECT * FROM station";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
 		?>   
     
     <div class="container">
 <table width="770" border="1" cellpadding="0" class="subtable" align="center">
       <tr  class="subtableheading" height="75">
         <td width="37" height="40" align="center"><strong>No</strong></td>
       <td width="159" align="center"><strong>Station/Air Force Bases</strong></td>
       <td width="120" align="center"><strong>Addresss</strong></td>
       <td width="100" align="center"><strong>Contact Person</strong></td>
       <td width="66" align="center"><strong>Telephone</strong></td>
       <td width="80" align="center"><strong>Email</strong> </td>
       <td width="60" align="center"><strong>Fax</strong></td>
     
     
       
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
	 <?php echo $b; ?> </td>
    <td><?php echo $newArray['stationName']; ?></td>
    <td><?php echo $newArray['addLine1']; ?>,<?php echo $newArray['addLine2']; ?><br/><?php echo $newArray['addLine3']; ?><br/><?php echo $newArray['addCity']; ?></td>
    <td><?php echo $newArray['contPersonName']; ?></td>
    <td><?php echo $newArray['phoneNo1']; ?></td>
    <td><?php echo $newArray['email']; ?></td>
    <td><?php echo $newArray['fax']; ?></td>
    
  </tr>
<?PHP  $a++; } ?>
      </table>
 </div>
 </form>
    
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
