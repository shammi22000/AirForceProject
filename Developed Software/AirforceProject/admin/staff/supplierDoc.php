<?php
 error_reporting(E_ALL ^ E_NOTICE);

	if(isset($_POST['submit']))
{
foreach($_FILES as $file_name => $file_array)
 	{	
	
	if (is_uploaded_file($file_array['tmp_name'])) 
	   {    
	   	move_uploaded_file($file_array['tmp_name'], "../bidderDocu/$file_array[name]") ;
		 }
	else
		{ 	$msg="Error : ".mysql_error(); 	}
	
include ("../../include_Connection.php");
$sql= "INSERT INTO qualification (qualifiID, qTypeId, QsuppID, docEvidence, bidYear) VALUES ('','$_POST[SerBidder]', '$_POST[SerQualifi]', '$file_array[name]', '$_POST[year]')";
	
	if (!mysql_query($sql,$conn))
		{ 	$msg="Error: ". mysql_error();	}
	else
		{	$msg= "1 Record Added";		}
	}
//header("Location:Product_View.php?txt=$msg");



}//$sql= "INSERT INTO qualification (qualifiID, qTypeId, QsuppID, docEvidence, bidYear) VALUES ('','$_POST[SerBidder]', '$_POST[SerQualifi]', '$file_array[name]', '$_POST[year]')";
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
    	<td width="790" height="450" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Insert Documentary Evidence </h2><br/>
     
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
     
<table width="300" border="1" cellspacing="0" cellpadding="15" align="center" class="subtable">
 <tr height="50">
    	<td class="subtableheading">Bid year</td>
    	<td><input name="year" type="text" /></td>
 </tr>
 <tr height="50">
    	<td class="subtableheading">Bidder Name</td>
    	<td> <?php //retrieve bidder infor=============================================
	  			include("../../include_Connection.php");
	 			$sql = "SELECT * FROM login WHERE userGroup='u0' OR userGroup='u1' ";
	 			$result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
    
         		<select name="SerBidder">
				<option>Select Bidder</option>
				<?php
		 		while ($newArray = mysql_fetch_array($result)) 
		 		{ ?>
          		<option value="<?php echo $newArray['login_Id']; ?>" <?php if($newArray['login_Id']==$_POST['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?> </option>
            	<?php }  ?> 
        		</select> 
       </td>
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
    	<td><input type="file" name="fileupload" /> </td>
  </tr>
      
  <tr class="tableheading">
  		<td colspan="2" align="center" height="40">
  		<input type="submit" name="submit" value="INSERT" />&nbsp;<input type="reset" name="reset" value="CLEAR" /></td>
  
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
