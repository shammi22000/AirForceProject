<?php
include ("include_sessionU3.php");

	error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['Submit']) )

	{	$staID= $_GET['SerStat'];
		$bidderID=$_GET['SerBidder'];
		$category=$_GET['SerCat']; 
		$isQuali=$_GET['serQaul'];
		$proYear=$_GET['proYear'];
	
		include("../../Include_Connection.php"); 
		$sql1="SELECT * FROM  bid WHERE bidStatID='$staID' AND bidCatID='$category' AND  projectYear='$proYear' AND  isSelected='1'";
		 $result1 = mysql_query($sql1, $conn) or die(mysql_error());
	 	$numRow1=mysql_num_rows($result1);
	  
	 	if($numRow1>0)
		 	{ 	echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Already selected a bidder for this bid. Go to View Page')
					</SCRIPT>");}
	 
		else{
				include("../../Include_Connection.php");
				$sql="UPDATE  bid SET isSelected='$isQuali' WHERE bidStatID='$staID' AND bidCatID='$category'  AND bidSupID='$bidderID' AND projectYear='$proYear' ";
echo $sql;
				/*if(mysql_query($sql, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Record added successfully!')
						</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				} */
			}
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
    <h2><br/><br/>Bidding List Insert Page</h2>
    
<form id="form1" name="form1" method="GET" action="lowestListView.php" >
    
<p align="left">Project Year: <input name="proYear" type="text" value="<?php echo $proYear; ?>" /></p>
  		
   
   				<?php // retrieve station details==========================================
					include("../../Include_Connection.php");
					 $sql = "SELECT * FROM station";
					 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 			?>
  
<p align="left"> Station Name :
    				<select name="seleStation">
					<option>Select Station</option>
					<?php
		 			while ($newArray = mysql_fetch_array($result)) 
		 			{ ?>
          			<option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['seleStation']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
                 	<?php }  ?> 
        			</select>
</p>
  
      				<?php // retrieve category infor====================================
						include("../../Include_Connection.php");
						 $sql = "SELECT * FROM category";
	 					$result = mysql_query($sql, $conn) or die(mysql_error());
 					 ?>
     
  
<p align="left">Category Name: 
    				<select name="SeleCat">
    				<?php  
					while ($newArray = mysql_fetch_array($result)) 
 					{
					?>
    				<option value="<?php echo $newArray['catId']; ?>" <?php if($newArray['catId']==$_GET['SeleCat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['catName']; ?></option>
    				<?php
 					}
					?>
    				</select>&nbsp;<input type="submit" name="catSubmit" value="DISPLAY" />
</p> 
 

 </form>
    
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
		 $sql ="SELECT * FROM  login, bid  WHERE (login.login_Id=bid.bidSupID ) GROUP BY name";
		  $result = mysql_query($sql, $conn) or die(mysql_error());

?>

<select name="SerBidder" >
   
   <option value="-1">Select bidder</option><?php  
	while ($newArray = mysql_fetch_array($result)) 
 {
	?>
    <option value="<?php echo $newArray['bidSupID']; ?>" <?php if($newArray['bidSupID']==$_GET['SerBidder']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['name']; ?> </option>
    <?php
 }
	?>
</select></td>
   <!-- //////////////////////////////Select Station////////////////////////////// --> 
  
  <tr>
    <td width="100" class="subtableheading">Station Name</td>
  
    <td>
   <?php
		
 error_reporting(E_ALL ^ E_NOTICE);
		include("../../Include_Connection.php");
		 $sql ="SELECT * FROM  station ";
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
    <option value="<?php echo $newArray['stationId']; ?>" <?php if($newArray['stationId']==$_GET['SerStat']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['stationName']; ?> </option>
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
    <td class="subtableheading">Is Selected</td>
    <td><select name="serQaul">
    <option value="-1">Select is Selected</option>
      <option value="1">Selected</option>
    <option value="0">Not Selected</option>
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
