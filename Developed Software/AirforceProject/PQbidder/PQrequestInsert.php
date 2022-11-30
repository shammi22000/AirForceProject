<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
	{ 	header("Location:register.php");	 }

	 error_reporting(E_ALL ^ E_NOTICE);
	 if($_GET['submit']=="SUBMIT" || !empty($_GET['submit']) || isset($_GET['submit']) )
	{
	
		include("../Include_Connection.php");
		$sql="SELECT * FROM prequalificate WHERE supId='$_GET[supID]' AND	projectYear='$_GET[proYear]'";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$numRow=mysql_num_rows($result);
 	 if($numRow>0)
		{	//Display error message ================================================
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('This Stations/Category already requested! Go to View Page')
			</SCRIPT>"); 
		}
		
	else{
			foreach($_GET['station_category'] as $station_category)
		{
			$station_category_arr = explode(",",$station_category);
			$station_id = $station_category_arr[0];
			$category_id = $station_category_arr[1];
			include("../Include_Connection.php");
			//Insert data into prequalificate table ================================================
			$sql1 = "INSERT INTO prequalificate(pqID, stID, catId, supId, projectYear, reqDate) VALUES ('', ".$station_id.",".$category_id.", '$_GET[supID]', '$_GET[proYear]', '$_GET[todayDate]' )";
	if(mysql_query($sql1, $conn))
		{
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Bids selected Successfully!')
			</SCRIPT>"); 
		}
	else
		{
			echo "Error".mysql_error();	
	}}}
//header("Location:PQrequestView.php?msg=$txt");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<!--//////////////////////// starting success message////////////////////////-->
<script language="javascript">
function deleteMes()
{
var answer=window.confirm("Are you sure? you want to delete this record!");
return answer;
}
</script>
<!--//////////////////////// ending success message////////////////////////-->
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
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- /////////////////////////////special Menu Starting////////////////////////////// -->    
	<?php
	include("include_pqReqMenu.php");
	?>
<!-- //////////////////////////////special Menu Ending////////////////////////////// --> </td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_bidderSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" >
    <h2>Generate Payment Invoice </h2>
    
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
 <p align="left"> 
  
 				<?php  //retrieve bidder Id and company name==================================== 
	    		$bidderName=$_SESSION['comName']; 
	 		 	error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
				$sql = "SELECT * FROM  login WHERE (name='$bidderName')";
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  			$newArray = mysql_fetch_array($result);
				$bidID=$newArray['login_Id'];
				?>
</p>                                               
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    
 </form>
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

 <div style="border-width:thick; background-color:#999; width:600px; text-align:left; font-family: 'Arial', Gadget, sans-serif; font-stretch:expanded; font-size:12px; margin:10px; max-width:600px; min-height:100px;"><br/><h3>The Applicants who are interested to apply for pre-qualification, should be done payments using payment invoice</h3><br/>
 <div style="list-style-position:inside; font-size:10px;">
   		&nbsp; 1.Vegetable - Vegetables, Fruits, Coconut and Eggs<br/>
   		&nbsp; 2.Dry - Dry Ration <br/>
   		&nbsp; 3.Fish - Fresh Fish<br/>
  		&nbsp; 4.Bakery -  Bakery items<br />
   		&nbsp; 5.Meat - Meat<br/>
   		&nbsp; 6.Breakfast - Indigenous Breakfast<br/>
   		&nbsp; 7.Rice - Rice<br/>
   		&nbsp; 8.Fowl Dressed - Fowl Dressed 
</div>
</div>
    
    
<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

<table width="750" border="1" cellpadding="10" bgcolor="#EAEAEA">
   <tr bgcolor="#666666" >
        <td width="100">Station Name</td>
    	<td width="50">Vagetable</td>
    	<td width="50">Dry </td>
   		<td width="50">Fish</td>
   		<td width="50">meat</td>
    	<td width="50">Rice</td>
    	<td width="50">Bakery Ited</td>
    	<td width="50">Fowl Dressed</td>
   		<td width="50">fruit</td>
 </tr>
  <tr>
    	<td>Vaunia</td>
    	<td><input type="checkbox" name="station_category[]" value="1,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,4" /></td>
     	<td><input type="checkbox" name="station_category[]" value="1,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,7" /></td>
    	<td><input type="checkbox" name="station_category[]" value="1,8" /></td>
  </tr>
  <tr>
    	<td>Ampara</td>
    	<td><input type="checkbox" name="station_category[]" value="2,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,4" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,7" /></td>
    	<td><input type="checkbox" name="station_category[]" value="2,8" /></td>
  </tr>
  <tr>
    	<td>Anuradhapura</td>
   	 	<td><input type="checkbox" name="station_category[]" value="3,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,4" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,7" /></td>
    	<td><input type="checkbox" name="station_category[]" value="3,8" /></td>
  </tr>
  <tr>
    	<td>Batticaloa</td>
    	<td><input type="checkbox" name="station_category[]" value="4,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="4,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="4,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="4,4" /></td>
    	 <td><input type="checkbox" name="station_category[]" value="4,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="4,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="4,7" /></td>
   		 <td><input type="checkbox" name="station_category[]" value="4,8" /></td>
  </tr>
  <tr>
    	<td>BIA-Katunayaka</td>
    	<td><input type="checkbox" name="station_category[]" value="5,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="5,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="5,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="5,4" /></td>
     	<td><input type="checkbox" name="station_category[]" value="5,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="5,6" /></td>
   	 	<td><input type="checkbox" name="station_category[]" value="5,7" /></td>
    	<td><input type="checkbox" name="station_category[]" value="5,8" /></td>
  </tr>
  <tr>
    	<td>China Bay</td>
   	 	<td><input type="checkbox" name="station_category[]" value="6,1"  /></td>
    	<td><input type="checkbox" name="station_category[]" value="6,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="6,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="6,4" /></td>
     	<td><input type="checkbox" name="station_category[]" value="6,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="6,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="6,7" /></td>
   	 	<td><input type="checkbox" name="station_category[]" value="6,8" /></td>
  </tr>
   <tr>
    	<td>Thanthirimale</td>
    	<td><input type="checkbox" name="station_category[]" value="7,1" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,2" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,3" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,4" /></td>
     	<td><input type="checkbox" name="station_category[]" value="7,5" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,6" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,7" /></td>
    	<td><input type="checkbox" name="station_category[]" value="7,8" /></td>
  </tr>
 
   
</table>
		<input type="submit" value="SUBMIT" name="submit" />
 		<input name="cancel" type="reset" value="CANCEL" />
     	 <input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['login_Id']; ?>" />
     	 <input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
   		 <input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    	<input name="bidName" type="hidden" value="<?php echo $id; ?>" />     
</form>
    	</td>
 </tr>
  <tr>
    	<td colspan="3" align="center" class="copyr"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
