<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']) )
		{
			include("../Include_Connection.php");
			$sql="UPDATE   experience SET projectYear='$_GET[proYear]',  year='$_GET[year]', institute='$_GET[institution]', expCategory='$_GET[category]', totVal='$_GET[value]', remarks='$_GET[remark]', expDate='$_GET[todayDate]' WHERE expID='$_GET[exID]'";
				if(mysql_query($sql, $conn))
				{
					echo " Records Added successfully";
				}
				else
				{
					echo "Error".mysql_error();	
				}

	//header("Location:appForm2View.php?msg=$txt");
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
<script language="javascript">
function pqsubmit()
{
var answer=window.confirm("Succussfully submitted");
return answer;
}
</script>
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="125"></td>
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
    
 		<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
			<?php
			include("include_specialMenu.php");
			?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 
		</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
  		 <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
			<?php
			include("include_bidderSubMenu.php");
			?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION<br/>Records of Past Experience Edit Page </h3><h2 align="right">FORM II &nbsp;&nbsp;&nbsp; </h2>
  
  
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


    			<?php //retrieve experience info =============================
					include("../Include_Connection.php");
					$id=$_GET['ID'];
					$sql = "SELECT * FROM  experience WHERE expID='$id'";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
					 $newArray=mysql_fetch_array($result)
	 			?>
     
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">

<div class="container">
<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
    	<td colspan="2" align="center" height="35"><h4>Records of Past Experience</h4><p2> Experience as a suppliers of food items by the Bidder during the last 3 years.(Documentary evidence should be  submitted)</p2></td>
  </tr>
  <tr>
     	<td>&nbsp;</td>
    	<td>&nbsp;</td>
  </tr>
  <tr>
    	<td class="tdformat">Year</td>
    	<td><input name="year" type="text" id="year" size="10" value="<?php echo $newArray['year']; ?>" > </td>
  </tr>
  <tr>
    	<td class="tdformat">Name of the institution</td>
    	<td>
      		<select name="institution" id="institution">
     		 <option value="Army">Sri Lanka Army</option>
      		<option value="Navy">Sri Lanka Navy</option>
      		<option value="Prison">Department of Prisons</option>
      		<option value="Hospital">Hospitals</option>
      		<option value="Others">Others</option>
      		</select>
        </td>
  </tr>
  <tr>
    	<td class="tdformat">Names of Food category/item</td>
    	<td><textarea name="category" cols="30" rows="5"><?php echo $newArray['expCategory']; ?></textarea></td>
  </tr>
   <tr>
    	<td class="tdformat">Total Value (Mn)</td>
    	<td><input name="value" type="text" id="value" value="<?php echo $newArray['totVal']; ?>" /></td>
  </tr>
  <tr>
     	<td class="tdformat">Remarks</td>
    	<td><textarea name="remark" cols="30" rows="5" ><?php echo $newArray['remarks']; ?></textarea></td>
  </tr>
  <tr>
     	<td colspan="2" align="center">
    		<input name="submit" type="submit" value="UPDATE" />&nbsp;&nbsp;
      		<input name="cancel" type="reset" value="CANCEL" /><input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['supplierID']; ?>" />
      		<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    		<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
     		<input name="bidName" type="hidden" value="<?php echo $bidID; ?>" />
     		<input name="exID" type="hidden" value="<?php echo $id; ?>" />
     	</td>
  </tr>
  </table>
  </div>
  </form>
  <!-- /////////////////////////////form2 ending////////////////////////////// --> 

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
