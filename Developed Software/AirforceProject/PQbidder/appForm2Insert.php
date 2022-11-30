<?php
session_start(); 
	if(!isset($_SESSION['user0']) || (empty($_SESSION['user0'])))
		{ 	header("Location:../login.php");	 }

	error_reporting(E_ALL ^ E_NOTICE);
	if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )

		{
			
	//***********************************Starting check whether the variable is numeric**********************************************		
		$year=$_GET['year'];			
		$cate=$_GET['category'];			
		$total=$_GET['value'];						
		
			
		$error=0;
 		$err_year_msg="";					
		$err_cate_msg="";							
		$err_tot_msg="";						
		
				
 if(!is_numeric($year))
 {
 	$error=1;
 	$err_year_msg="*Enter number";
 }	
	
 
if (strlen(trim($cate))=="")
 {
 	$error=1;
 	$err_cate_msg="*Compulsory Field";
 }	
if(!is_numeric($total))
 {
 	$error=1;
 	$err_tot_msg="*Enter number";
 }	
 if (strlen(trim($total))=="")
 {
 	$error=1;
 	$err_tot_msg="*Compulsory Field";
 }	

//************************************************************************************************	
 if($error==0)
 {		
		$process=1;
			

			include("../Include_Connection.php");
			$sql="SELECT * FROM  experience WHERE expSupID='$_GET[supID]' AND projectYear='$_GET[proYear]' AND  year='$_GET[year]' AND institute='$_GET[institution]' AND expCategory='$_GET[category]'  ";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			$numRow=mysql_num_rows($result);
			if($numRow>0)
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Already Inserted this record! Go to Experience View Page')
					</SCRIPT>");
	
	 			}
			else if(!isset($_GET['accept']))
				{
					echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Before submit application, accept the declaration!')
						</SCRIPT>");}
	
			else
			 	{
					include("../Include_Connection.php");
					$sql="INSERT INTO experience (expID, expSupID, projectYear,  year, institute, expCategory, totVal, remarks, expDate, declaration) VALUES ('', '$_GET[supID]', '$_GET[proYear]', '$_GET[year]', '$_GET[institution]', '$_GET[category]', '$_GET[value]', '$_GET[remark]', '$_GET[todayDate]', '$_GET[accept]') ";
					if(mysql_query($sql, $conn))
						{
							echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Record added Successfully!')
						</SCRIPT>");
						}
					else
						{
							$msg="Error: ". mysql_error();
						}
				}
	
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
    		<td width="790"  align="center" bgcolor="#FFFFFF" ><br/>
<h3 class="pageHeading">PRE-QUALIFICATION APPLICATION<br/>Records of Past Experience </h3><h2 align="right">FORM II &nbsp;&nbsp;&nbsp; </h2>

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
    	<td><input name="year" type="text" id="year" size="10" value="<?php echo $year; ?>" ><span style="font-size:10px; color:#FF0000;" ><?php echo $err_year_msg; ?></span> </td>
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
    	<td><textarea name="category" cols="30" rows="5"></textarea><span style="font-size:10px; color:#FF0000;" ><?php echo $err_cate_msg; ?></span></td>
  </tr>
   <tr>
    	<td class="tdformat">Total Value (Mn)</td>
    	<td><input name="value" type="text" id="value" value="<?php echo $total; ?>" /><span style="font-size:10px; color:#FF0000;" ><?php echo $err_tot_msg; ?></span></td>
  </tr>
  <tr>
     	<td class="tdformat">Remarks</td>
    	<td><textarea name="remark" cols="30" rows="5"></textarea></td>
  </tr>
   <tr>
     	<td colspan="2"> <p class="p3"><input name="accept" type="checkbox" value="1" />We/ I hereby declare that the information provide above  is true and accurate to best of our/my knowledge.</p></td>
    
  </tr>
  <tr>
     	<td colspan="2" align="center">
     		<input name="submit" type="submit" value="INSERT" />&nbsp;&nbsp;
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
<?php
}
?>