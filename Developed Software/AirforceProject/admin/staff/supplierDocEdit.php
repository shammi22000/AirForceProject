<?php
if(isset($_POST['submit']))
{
	foreach($_FILES as $file_name => $file_array) 
	{
	if($file_array['name']=="")
		{	$fileName = $_POST['docPath'];	}
	else
		{	$fileName = $file_array['name'];
		
		 if (is_uploaded_file($file_array['tmp_name'])) 
			{
				//unlink("../bidderDocu/".$_POST['docPath']);  
			move_uploaded_file($file_array['tmp_name'], "../bidderDocu/$file_array[name]");
			}
		else
			{ 	$msg="Error : ".mysql_error(); 	}
		}
  	}
	include ("../../include_Connection.php");
	$sql= "UPDATE qualification SET qTypeId='$_POST[SerQualifi]',docEvidence='$fileName' WHERE qualifiID='$_POST[qualiID]'";
	
	if (!mysql_query($sql,$conn))
		{ 	$msg="Error: ". mysql_error();	}
	else
		{	$msg= "1 Record Updated";		}
	
header("Location:supplierDocView.php?txt=$msg");
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
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#000000"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_staffMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 

	<?php
	include("include_staffSubmenu2.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/> Edit Documentary Evidence </h2><br/>


<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
               
        		<?php //retrive pre-qualification docs info=================================
	  				$id=$_GET['ID'];
					include("../../Include_Connection.php");
					 $sql = "SELECT * FROM login, qualificationtype, qualification WHERE  login.login_Id=qualification.QsuppID AND  qualificationtype.qualifiTypeID=qualification.qTypeId AND qualifiID='$id'";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
					$newArray = mysql_fetch_array($result);
 	 			?>
       
<table width="300" border="1" cellspacing="0" cellpadding="15" align="center" class="subtable">
  <tr height="50">
    	<td class="subtableheading">Bid year</td>
    	<td><?php echo $newArray['bidYear']; ?></td>
 </tr>
 <tr height="50">
    	<td class="subtableheading">Bidder Name</td>
    	<td><?php echo $newArray['name']; ?></td>
  </tr>
 <tr height="50">
    	<td width="100" class="subtableheading">Name of Qualification</td>
    	<td> 
     			<?php //retrieve qualification type=============================================
	  				include("../../include_Connection.php");
	 				$sql = "SELECT * FROM qualificationtype";
	 				$result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
     
     
     			<select name="SerQualifi">
				<option>Select Qualification Type</option>
				<?php
		 		while ($newArray = mysql_fetch_array($result)) 
		 		{ ?>
          		<option value="<?php echo $newArray['qualifiTypeID']; ?>" <?php if($newArray['qualifiTypeID']==$_POST['SerQualifi']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['qualificatioName']; ?> </option>
           		 <?php }  ?> 
       			 </select> 
        
        </td>
  </tr>
 
  <tr height="50">
    	<td class="subtableheading">Documentery Evidence</td>
    	<td><a href="../bidderDoc/<?php echo $newArray['docEvidence']; ?>" ><?php echo $newArray['docEvidence']; ?></a>
    	<br/><input type="file" name="fileupload" /> </td>
  </tr>
	<tr class="tableheading">
  		<td colspan="2" align="center" height="40">
  		<input type="submit" name="submit" value="UPDATE" />&nbsp;
  		<input type="reset" name="reset" value="CLEAR" />
  		<input type="hidden" name="qualiID" value="<?php echo $_GET['ID']; ?>" />
  		<input type="hidden" name="docPath" value="<?php echo $newArray['docEvidence']; ?>" />
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
