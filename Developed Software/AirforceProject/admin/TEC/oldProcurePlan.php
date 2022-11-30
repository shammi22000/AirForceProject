
<?php
 error_reporting(E_ALL ^ E_NOTICE);

if($_GET['submit']=="Submit" || !empty($_GET['submit']) || isset($_GET['submit'])){
	include("../../Include_Connection.php");

$sql="INSERT INTO activity (activityID, projectYear, activityName, dateStart, startTime, dateEnd, endTime) VALUES ('', '$_GET[year]', '$_GET[activitySele]','$_GET[dateStart]', '$_GET[timeStart]', '$_GET[dateend]','$_GET[timeEnd]')";
	
	
	
	if(mysql_query($sql, $conn))
	{
		$txt="1 Record Inserted";
	}
	else
	
	{
	$txt="Error".mysql_error();	
	}
	header("Location:procurePlanInsert.php?msg=$txt");
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
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	//include("include_BaseMainmenu.php");
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
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><br/>
    <h3 class="pageHeading" align="center">Procurement Plan Insert Page</h3>
    <br/><br/>
   
       
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get" name="form1">
           
  
  <div style="font-family: 'Times New Roman', Times, serif; ">
     <table width="500" border="1" cellpadding="15" align="center" class="subtable">
       
     	
 	<tr>
      	<td width="150" class="tableBg1">Project Year</td>
        <td align="left" >
		 	<input name="year" type="text"  value="" /></td>
        </tr>
		<tr>
      	<td width="150" class="tableBg1">Activity Name</td>
        <td align="left" >
		 	<select name="activitySele">
            <option value="1">Consumed Quantity Collection</option>
            <option value="2">Published Bid Notice</option>
            <option value="3">Pre-qualification Process</option>
            <option value="4">Bid Process</option>
            </select></td>
        </tr>
        <tr>
     	<td class="tableBg1" width="100">Start Date</td>
        <td align="left" >
		 	<input name="dateStart" type="text"  value="" /></td>
           
            <tr>
        <td class="tableBg1" width="100">Start Time</td>
        <td>
			<input name="timeStart" type="text" value="" /></td>
            </tr>
         <tr>
        <td class="tableBg1" width="100" >End Date</td>
        <td align="left">
		 	<input name="dateend" type="text"  value="" /></td>
          </tr>
          <tr>
         <td class="tableBg1" width="100">End Time</td>
    	<td><input name="timeEnd" type="text"  value="" /></td>
  </tr>
 
<tr >
  <td colspan="2" align="center" height="40" >
  <input type="submit" name="submit" value="Save" />&nbsp;
  <input type="reset" name="reset" value="Clear" />
  <input type="hidden" name="ID" value="<?php echo $newArray['activityID'];?>" />
  </td>
  </tr>
       	
  </table>
       </div>
       <br/><br/>
            
     </form>
     
        
     
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
