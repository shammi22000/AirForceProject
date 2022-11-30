<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }
error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="UPDATE" )

{		$isQuali=$_GET['serQaul'];
	error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	 $sql="UPDATE  bid SET isSelected='$isQuali' WHERE (bidId='$_GET[preId]') ";
	if(mysql_query($sql, $conn))
	{
	$txt="1 Record Edited";
	}
	else
	{
	$txt="Error".mysql_error();	
	}
}
	
	//else{
	//	header("Location:PQlistView.php?msg=$txt");
		
	//}



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
    <td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF">
    <h2><br/><br/>Selected Bidder List Edit Page</h2>
    
   <?php
		
 error_reporting(E_ALL ^ E_NOTICE);
		include("../../Include_Connection.php");
		$id=$_GET['ID'];
		
		 $sql ="SELECT * FROM  station, category, login, bid  WHERE (station.stationId=bid.bidStatID AND category.catId=bid.bidCatID AND login.login_Id=bid.bidSupID AND bidId='$id')";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
	 $newArray = mysql_fetch_array($result);
 	//go through each row in the result set and display data
	 		?>
<form action="PQlistView.php" method="get" name="form2" >

   
 <table width="500" border="1" cellpadding="15" bgcolor="#EAEAEA">
  <tr>
 <td class="subtableheading">Project Year</td>
 <td><p><?php echo $newArray['projectYear']; ?></p> </td>
  <tr>
 <tr>
 <td class="subtableheading">Select Bidder</td>
 <td><p><?php echo $newArray['compName']; ?></p> </td>
  <tr>
    <td width="100" class="subtableheading">Station Name</td>
     <td><p><?php echo $newArray['stationName']; ?></p> </td>          
  </tr>
  <tr>
    <td class="subtableheading">Category Name</td>
     <td> <p><?php echo $newArray['name']; ?> </p>
 </td>
  </tr>
  <tr>
    <td class="subtableheading">Is Selected</td>
    <td><select name="serQaul">
    <option value="-1">Select is Selected</option>
      <option value="1">Selected</option>
    <option value="0">Not Selected</option>
</select> </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  <input name="submit" id="submit" type="submit" value="UPDATE" />
  <input name="cancel" id="cancel" type="reset" value="CANCEL" />
   <input name="preId" id="preId" type="hidden" value="<?php echo $id; ?> " />
  </td>
  </tr>
 
</table>

    </form>
   
 <!-- //////////////////////////////Form2 End////////////////////////////// -->
    </td>

   </tr>
   
  <tr>
    <td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
