<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

 		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET['edit']=="UPDATE" || !empty($_GET['edit']) || isset($_GET['edit']) )
			{
				include("../Include_Connection.php");
				$sql="UPDATE login SET busRegNo='$_GET[VAT]', busRegDate='$_GET[dof]', busNature='$_GET[BusNature]', VATregNo='$_GET[VAT]', address='$_GET[address]', TPNo1='$_GET[tp1]',  mobileNo='$_GET[mobile]', faxNo='$_GET[fax]', email='$_GET[email]', password='$_GET[pw]' WHERE login_Id='$_GET[bidName]'";
				echo $sql;	
					if(mysql_query($sql, $conn))
					{
						echo " Update Successfully ";
					}
					else
					{
						echo "Error".mysql_error();	
					}

	header("Location:index.php?msg=$txt");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<!-- ////////jquery Starting/////// -->
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="file:///C|/xampp/htdocs/jquery/demos.css">
		<script src="../jquery/jquery-1.5.1.js"></script>
		<script src="../jquery/jquery.ui.core.js"></script>
		<script src="../jquery/jquery.ui.widget.js"></script>
		<script src="../jquery/jquery.ui.datepicker.js"></script>
		<script> 
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script> 
<!-- ////////jquery Ending/////// -->
 
</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
      	<td  colspan="3"  height="109" bgcolor="#000000"><img src="../images/new.jpg" width="990" height="109"></td>
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
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidderSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" height="500" valign="middle" align="center" class="subtable" bgcolor="#CCCCCC"> 
<h2>Profile Edit Page</h2>
    
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
 
 

     			<?php
	 				include("../Include_Connection.php");
					$id=$_GET['ID'];
					$sql = "SELECT * FROM  login WHERE login_Id='$bidID' ";
 					$result = mysql_query($sql, $conn) or die(mysql_error());
				 ?>
                 
                 
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="validcheck()">
<div class="container">
    
<table width="500" border="1" cellpadding="5" cellspacing="0" bgcolor="#EFEFEF" bordercolor="#CCCCCC">
   <tr>
          <td colspan="2" align="center"><h3><?php echo $_SESSION['comName'];  ?></h3></td>
   </tr>
   <tr class="p3">
          <td align="right">Business Registration No</td>
          <td><input name="BRNo" type="text" id="BRNo" size="25" value="<?php echo $newArray['busRegNo']; ?> " /></td>
    </tr>
    <tr class="p3">
          <td width="350" align="right">Business Registration Date</td>
          <td> <div class="demo" style="padding:0px">
                <p><input  name="dof" type="text" id="datepicker"></p></div>    
		 </td>
    </tr>
    <tr class="p3" align="right">
          <td align="right">Nature of the Business</td>
          <td align="left">
            <input name="BusNature" type="text" id="BusNature" size="40" value="<?php $newArray['busNature']; ?> " /></td>
     </tr>
     <tr class="p3" align="right">
          <td align="right">VAT registration No</td>
          <td align="left">
            <input name="VAT" type="text" id="VAT" size="25" value="<?php echo $newArray['VATregNo']; ?> " /></td>
     </tr>
     <tr class="p3">
          <td align="right">Address</td>
          <td>
            <textarea name="address" cols="25" rows="5"><?php echo $newArray['address']; ?> </textarea></td>
     </tr>
     <tr class="p3">
          <td align="right">Telephone No</td>
          <td>
            <input name="tp1" type="text" id="tp1" size="25" value="<?php echo $newArray['TPNo1']; ?> " /><br/>
           </td>
     </tr>
     <tr class="p3">
          <td align="right">Mobile No</td>
          <td><label for="cname"></label>
            <input name="mobile" type="text" id="mobile" size="25" value="<?php echo $newArray['mobileNo']; ?>" /></td>
      </tr>
      <tr class="p3">
          <td align="right">Fax No</td>
          <td>
            <input name="fax" type="text" id="fax" size="25" value="<?php echo $newArray['faxNo']; ?>" /></td>
      </tr>
      <tr class="p3">
          <td align="right">Email Address</td>
          <td>
            <input name="email" type="text" id="email" size="25" value="<?php echo $newArray['email']; ?>"/></td>
      </tr>
      <tr class="p3">
          <td align="right">Password</td>
          <td><label for="pw"></label>
            <input name="pw" type="password" id="pw" size="25" /></td>
      </tr>
              
      <tr class="p3">
         
          <td colspan="2" align="center">
            <p>
              	<input type="submit" name="edit" id="edit" value="UPDATE"  />
              	<a href="index.php"><input name="cancel" type="reset" id="cancel" value="CANCEL" ></a>
             	 <input name="supID"  id="supID" type="hidden" value="<?php echo $bidID; ?>" />
      			<input name="todayDate" type="hidden" value="<?php echo $today; ?>" />
    			<input name="proYear" type="hidden" value="<?php echo $projectYear; ?>" />
    			<input name="bidName" type="hidden" value="<?php echo $id; ?>" />
            </p>
            </td>
        </tr>
      </table>
      </div>
  </form>
  
  
    </td>
   </tr>
  <tr>
    <td colspan="2" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
