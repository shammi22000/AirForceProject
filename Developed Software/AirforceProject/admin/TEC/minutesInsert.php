<?php
//include("../include_session.php");
if(isset($_POST['submit']))
{
foreach($_FILES as $file_name => $file_array)
 	{	
	
	if (is_uploaded_file($file_array['tmp_name'])) 
	   {    
	   	move_uploaded_file($file_array['tmp_name'], "Minutes/$file_array[name]") ;
		 }
	else
		{ 	$msg="Error : ".mysql_error(); 	}
	
include ("../../include_Connection.php");
$sql= "INSERT INTO  minutes (minuteId, Date, comName, docType, docPath) VALUES ('',  '$_POST[date]', '$_POST[comittee]', '$_POST[docType]', '$file_array[name]')";

	if (!mysql_query($sql,$conn))
		{ 	$msg="Error: ". mysql_error();	}
	else
		{	$msg= "1 Record Added";		}
	}
header("Location:MinutesView.php?txt=$msg");

}
?>
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
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Insert files of TEC Minutes/Agenda </h2><br/>
     
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     
<table width="400" border="1" cellspacing="0" cellpadding="15" align="center" class="subtable">
  <tr>
    	<td width="100" class="subtableheading">Date</td>
    	<td><input type="text" name="date" class="input" />YYYY-MM-DD</td>
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
    	<td><input type="file" name="fileupload" /> </td>
  </tr>
 <tr class="tableheading">
  		<td colspan="2" align="center" height="40">
  		<input type="submit" name="submit" value="INSERT" />&nbsp;<input type="reset" name="reset" value="CLEAR" />
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
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

