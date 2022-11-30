<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
	{ 	header("Location:register.php");	 }

		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['add']=="ADD" || !empty($_GET['add']) || isset($_GET['add']) )
		{
			include("../Include_Connection.php");
			$sql="SELECT * FROM storage WHERE SupID='$_GET[supID]' AND projectYear='$_GET[proYear]' AND addLine1='$_GET[add1]' AND city='$_GET[city]' AND storeType='$_GET[storage]' ";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
		if($numRow>0)
			{
				echo("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Already Insert this record! Go to Storage View Page')
				</SCRIPT>");
	 		}
		else 
			{
				include("../Include_Connection.php");
				$sql1="INSERT INTO storage (storeID, SupID, projectYear, addLine1, addLine2,addLine3, city, ownerShip, storeType,  todayDate) VALUES ('', '$_GET[supID]', '$_GET[proYear]', '$_GET[add1]', '$_GET[add2]', '$_GET[add3]', '$_GET[city]', '$_GET[owerner]', '$_GET[storage]', '$_GET[todayDate]' ) ";
	
				if(mysql_query($sql1, $conn))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Record added successfully!')
						</SCRIPT>");
				}
				else
				{
					echo "Error".mysql_error();	
				}
			}
	//header("Location:appForm21View.php?msg=$txt");
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
   		<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/>
        <h3 class="pageHeading">PRE-QUALIFICATION APPLICATION<br/> Information of Storage Facility Insert Page</h3><h2 align="right">FORM III &nbsp;&nbsp;&nbsp; </h2>


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

    <br/><br/>
      
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
<table width="500" border="0" cellspacing="0" cellpadding="5">
 <tr>
     	<td colspan="2"><hr/></td>
 </tr>
 <tr>
    	<td colspan="2" align="center" height="35"><h4>Storage and Cold room Facility</h4></td>
   
 </tr>
 <tr>
     <td colspan="2" align="center">
       <p><label><input type="radio" name="storage" value="Warehouse" />stores</label>
         &nbsp;  &nbsp;
         <label><input type="radio" name="storage" value="ColdRoom" />coldroom</label>
      <br /></p>
     </td>
 </tr>
 <tr>
    	<td class="tdformat">Address Line1</td>
    	<td><input name="add1" type="text" id="add1" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Address Line2</td>
    	<td><input name="add2" type="text" id="add2" /></td>
  </tr>
  <tr>
    	<td class="tdformat">Address Line3</td>
    	<td><input name="add3" type="text" id="add3" /></td>
  </tr>
  <tr>
    	<td class="tdformat">city</td>
        <td><input name="city" type="text" id="city"/></td>
  </tr>
  <tr>
    	<td class="tdformat">Ownership detail</td>
        <td><select name="owerner">
        <option>owned</option>
        <option>hired</option>
        <option>Leased</option>
        </select></td>
  </tr>
  <tr>
   		<td colspan="2"><p class="p3"><input name="accept" type="checkbox" value="1" />We/ I hereby declare that the information provide above  is true and accurate to best of our/my knowledge.</p></td>
       
  </tr>
  <tr>
     	<td colspan="2" align="center">
     	<input name="add" type="submit" value="ADD" />
     	<input name="cancel" type="reset" value="CANCEL" />
     	<input name="supID"  id="supID" type="hidden" value="<?php echo $newArray['login_Id']; ?>" />
      	<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    	<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    	 </td>
 </tr>
 </table>
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