
<?php
session_start(); 
	if(!isset($_SESSION['user5']) || (empty($_SESSION['user5'])))
		{ 	header("Location:../login.php");  }
		
if(isset($_POST['submit']))
{
	foreach($_FILES as $file_name => $file_array) 
	{
	if($file_array['name']=="")
		{	$fileName = $_POST['minutePath'];	}
	else
		{	$fileName = $file_array['name'];
		
		 if (is_uploaded_file($file_array['tmp_name'])) 
			{
				unlink("Minutes/".$_POST['minutePath']);  
			move_uploaded_file($file_array['tmp_name'], "Minutes/$file_array[name]");
			}
		else
			{ 	$msg="Error : ".mysql_error(); 	}
		}
  	}
include ("../../include_Connection.php");
$sql= "UPDATE minutes SET Date='$_POST[date]', docType='$_POST[docType]',  docPath='$fileName' WHERE minuteId='$_POST[Pro_Id]'";
	if (!mysql_query($sql,$conn))
		{ 	$msg="Error: ". mysql_error();	}
	else
		{	$msg= "1 Record Updated";		}
	
header("Location:MinutesView.php?txt=$msg");
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
    	<td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Procurement Plan Edit Page</h3>
   
       
     				<?php //retrieve minutes information ==================================
 						$Id= $_GET['ID'];
 						include ("../../include_Connection.php");
						$sql = "SELECT * FROM minutes WHERE minuteId='$Id' "; 
 						$result = mysql_query($sql, $conn) or die(mysql_error()); 
 						$newArray = mysql_fetch_array($result);
 
 					?>
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     
<table width="400" border="1" cellspacing="0" cellpadding="15" align="center" class="subtable">
 <tr>
    	<td width="100" class="subtableheading">Date</td>
    	<td><input type="text" name="date" class="input" value="<?php echo $newArray['Date']; ?>" />YYYY-MM-DD</td>
  </tr>
  <tr>
    	<td width="100" class="subtableheading">Document Type</td>
    	<td><input type="hidden" name="comittee" class="input" value="TEC" />
      		<label for="docType"></label>
      		<select name="docType" id="docType">
      		<option value="Agenda">Agenda</option>
       		<option value="Minute">Minute</option>
      		</select>
        </td>
  </tr>
  <tr height="50">
    	<td class="subtableheading">File</td>
    	<td><a href="Minutes/<?php echo $newArray['docPath']; ?>"> <?php echo $newArray['docPath']; ?></a><br />
    		<input type="file" name="fileupload"  value="<?php echo $newArray['docPath']; ?>"/> </td>
  </tr>
     
 <tr class="tableheading">
  		<td colspan="2" align="center" height="40">
  			<input type="submit" name="submit" value="UPDATE" />&nbsp;
  			<input type="reset" name="reset" value="CLEAR" />
    		<input type="hidden" name="Pro_Id" value="<?php echo $newArray['minuteId']; ?>" />
  			<input type="hidden" name="minutePath" value="<?php echo $newArray['docPath']; ?>" />
  </td>
  </tr>
</table>
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
