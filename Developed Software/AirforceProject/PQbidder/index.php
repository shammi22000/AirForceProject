<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }
		
		
		error_reporting(E_ALL ^ E_NOTICE);
	if(isset($_POST['btnRegister']) || $_POST['btnRegister']=='Register')
		{

		//Get Posted Form Inputs
		$comName=$_POST['cname'];
 		$email=$_POST['email'];
 		$uname=$_POST['un'];
 		$password=$_POST['pw'];
 		$error=0;
 		$err_comName_msg="";
 		$err_email_msg="";
 		$err_uname_msg="";
 		$err_password_msg="";
 		//Inlput Validation
		 if(strlen(trim($comName))==0)
 		{
 			$error=1;
 			$err_comName_msg="Cannot  display lists until the deadline";
		 }
 			if(strlen(trim($email))==0)
 		{
 			$error=1;
 			$err_email_msg="Enter email Address";
 		}
		if(strlen($uname)>35)
		{
			$error=1;
 		 	$err_uname_msg="Maximum length is 35 character";}

		else if (strlen(trim($uname))=="")
 		{
 			$error=1;
 			 $err_uname_msg="Enter User name";
		 }
 		if(strlen($password)<5)
		 {
 			$error=1;
 			$err_password_msg="Minimum length: 8 Charactor";
 		}
 		else if(strlen($password)=="")
 		{
 			$error=1;
 	 		$err_password_msg="Enter password";
 		}
 		if($error==0)
 		{
 			//Process Form
			$process=1;
 			include("Include_Connection.php");
			$sql="INSERT INTO login(login_Id, logComName, email, userName, password) VALUES ('', '$_POST[cname]', '$_POST[email]', '$_POST[un]', '$_POST[pw]')";
				if(mysql_query($sql, $conn))
				{
					$txt="1 Record Added";
				}
				else
				{
					$txt="Error".mysql_error();	
				}
	header("Location:register.php?msg=$txt");
	}
 }
 

	if( $error>0 || $process<>1)
	{
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
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidderSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" valign="middle" align="center" bgcolor="#FFFFFF" >
    	<br/><br/>
        
        
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
				//$id=$newArray['login_Id'];
				include("../Include_Connection.php");
				$sql = "SELECT * FROM  login WHERE login_Id='$bidID' ";
 				$result = mysql_query($sql, $conn) or die(mysql_error());
		 		?>
         
         
<div class="container">

<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>" >

<table width="500" border="1" cellpadding="5" cellspacing="0" bgcolor="#EFEFEF" bordercolor="#CCCCCC">
   <tr>
         <td colspan="2" align="center"><h3><?php echo $_SESSION['comName'];  ?></h3></td>
   </tr>
   <tr class="p3">
       	<td align="right">Business Registration No</td>
        <td><?php echo $newArray['busRegNo']; ?></td>
   </tr>
   <tr class="p3">
         <td width="250" align="right">Business Registration Date</td>
         <td width="250">  <?php echo $newArray['busRegNo']; ?></td>         
   </tr>
   <tr class="p3" align="right">
          <td align="right">Nature of the Business</td>
          <td align="left"><?php echo $newArray['busNature']; ?></td>
   </tr>
   <tr class="p3" align="right">
          <td align="right">VAT registration No</td>
          <td align="left"><?php echo $newArray['VATregNo']; ?> </td>
   </tr>
   <tr class="p3">
          <td align="right">Address</td>
          <td><?php echo $newArray['address']; ?> </td>
   </tr>
   <tr class="p3">
          <td align="right">Telephone No</td>
          <td><?php echo $newArray['TPNo1']; ?><br/></td>
          
   </tr>
   <tr class="p3">
          <td align="right">Mobile No</td>
          <td><?php echo $newArray['mobileNo']; ?></td>
  </tr>
  <tr class="p3">
          <td align="right">Fax No</td>
          <td><?php echo $newArray['faxNo']; ?></td>
  </tr>
  <tr class="p3">
          <td align="right">Email Address</td>
         <td><?php echo $newArray['email']; ?></td>
  </tr>
  <tr class="p3">
         <td colspan="2" align="center">
          <a href="editProfile.php?ID=<?php echo $newArray['login_Id']; ?>">
          <input type="submit" name="edit" id="edit" value="Edit Profile"  /></a>
          </td>
 </tr>
 </table>
</form>
 <!-- /////////////////////////////form2 ending////////////////////////////// --> 

  </div>
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
<?php
}
?>