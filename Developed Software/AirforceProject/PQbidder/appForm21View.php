<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

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
		<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> </td>
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
    	<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" ><br/><h3 class="pageHeading">PRE-QUALIFICATION APPLICATION <br/>Storage and Cold Room Facility View Page</h3><h2 align="right">FORM II &nbsp;&nbsp;&nbsp; </h2>
   
   
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


    		<?php //retrieve storage information =================================================
	  			$proYear=$_GET['Seryear'];
				include("../Include_Connection.php");
				$sql = "SELECT * FROM  storage WHERE SupID='$bidID' AND  projectYear='$projectYear'";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
	 		?>
      
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" >
<table width="650" border="1" cellspacing="0" cellpadding="5">
      
  <tr class="subtable2" >
     	<td width="50" bgcolor="#999999" >Sr.no</td>
    	<td width="300" bgcolor="#999999" > Storage Address</td>
    	<td width="100" bgcolor="#999999">Ownership Detail</td>
    	<td width="100" bgcolor="#999999"> Store Type</td>
   		<td width="100"bgcolor="#999999" >Action</td>
  </tr>
 
  			<?php
  		   		$b=0;
    			while ($newArray = mysql_fetch_array($result))
				 {
	 				$b++;
			?> 
 <tr class="p3" >
    	<td height="30"  align="center"><?php echo $b; ?></td>
    	<td> 
			<?php echo $newArray['addLine1']; ?><br/>
    		<?php echo $newArray['addLine2']; ?>&nbsp;
    		<?php echo $newArray['addLine3']; ?><br/>
    		<?php echo $newArray['city']; ?>
    	</td>
    	<td><?php echo $newArray['ownerShip']; ?></td>
    	<td><?php echo $newArray['storeType']; ?></td>
       	<td align="center">
    	<a href="appForm21Edit.php?ID=<?php echo $newArray['storeID']; ?>"><img src="../images/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp; <a href="appForm21Delete.php?ID=<?php echo $newArray['storeID']; ?>"><img src="../images/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a> 
    	</td> 
</tr>
   			<?php }?> 
 <tr align="center">
  		<td colspan="5" align="right">
   		<a href="appForm21Insert.php"> <input type="button" name="add" value="Add Another Record" /></a></td>
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
