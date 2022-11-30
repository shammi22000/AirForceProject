<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }

error_reporting(E_ALL ^ E_NOTICE);
if($_GET['submit']=="INSERT"  )

{	$staID= $_GET['SerStat'];
	$bidderID=$_GET['SerBidder'];
	$category=$_GET['SerCat']; 
	$isQuali=$_GET['serQaul'];
	$proYear=$_GET['proYear'];
	error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	$sql1="SELECT * FROM prequalificate";
	
	 $result1 = mysql_query($sql1, $conn) or die(mysql_error());
	while ($newArray1 = mysql_fetch_array($result1)) 
	 //echo $newArray1['catId'];
	 $st=$newArray1['stID'];
	$cat=$newArray1['catId'];
	 $bid=$newArray1['supId'];
	 
	 if($st<>$staID && $cat<>$category && $bid<>$bidderID)
	 { 	
	$sql="UPDATE  prequalificate SET isQualified='$isQuali' WHERE stID='$staID' AND catId='$category'  AND supId='$bidderID' AND projectYear='$proYear' ";
		echo $sql;
		if(mysql_query($sql, $conn))
		{
			$txt="1 Record Added";
		}
		else
		{
		$txt="Error".mysql_error();	
		}
		}
		else{echo "<h3>Bidder not apply for this Station/Category</h3>";}


//header("Location:PQlistView.php?msg=$txt");
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
    <h2><br/><br/>Pre-qualifed List Insert Page</h2>
    
   
<form action="<?php $_SERVER['PHP_SELF']?>" method="get" name="form2" >

   
 <table width="500" border="1" cellpadding="15" bgcolor="#EAEAEA">
  <tr>
  <td class="subtableheading">Project Year</td>
  <td ><input name="proYear" type="text" /></td>
  </tr>
 
 <tr><td class="subtableheading">Select Bidder</td>
  <!-- //////////////////////////////Select Bidder////////////////////////////// --> 

 <td><?php
 error_reporting(E_ALL ^ E_NOTICE);
include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  login, prequalificate   WHERE (login.login_Id=prequalificate.supId ) GROUP BY name";
		  $result = mysql_query($sql, $conn) or die(mysql_error());

?>

<select name="SerBidder" id="SerBidder" onChange="ShowHint(this.value)">
   
   <option value="-1">Select bidder</option><?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['login_Id']; ?>" <?php if($newArray['login_Id']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?> </option>
    <?php
 }
	?>
</select></td>
  <tr>
    <td width="100" class="subtableheading">Station Name</td>
   <!-- //////////////////////////////Select Station////////////////////////////// --> 
  
    <td>
   <?php
		
 error_reporting(E_ALL ^ E_NOTICE);
		include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  station,  prequalificate   WHERE (station.stationId=prequalificate.stID )GROUP BY stationName";
	 // execute the SQL statement
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	//go through each row in the result set and display data
	 		?>
  <select name="SerStat">
  <option value="-1">Select Station</option>
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['stID']; ?>" <?php if($newArray['stID']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
    <?php
 }
	?>
</select> 
</td>          
  </tr>
  <tr>
    <td class="subtableheading">Category Name</td>
     <!-- //////////////////////////////Select Category////////////////////////////// --> 
    <td> 
    
       <?php 
	
    include("../../Include_Connection.php");
	
	$sql ="SELECT * FROM  category ";

// execute the SQL statement
 $result = mysql_query($sql, $conn) or die(mysql_error());
 
 ?>
 <select name="SerCat">
 <option value="-1">Select Category</option>
   <?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SerCat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?> </option>
    <?php
 }
	?>
</select> 
 
 
 </td>
  </tr>
  <tr>
    <td class="subtableheading">Is Qualified</td>
    <td><select name="serQaul">
    <option value="-1">Select is qualified</option>
      <option value="1">Qualified</option>
    <option value="0">Not Qualified</option>
</select> </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  <input name="submit" id="submit" type="submit" value="INSERT" />
  <input name="cancel" id="cancel" type="reset" value="CANCEL" />
  
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
