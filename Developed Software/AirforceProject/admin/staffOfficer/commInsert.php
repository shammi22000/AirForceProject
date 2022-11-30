<?php
session_start();
if(!isset($_SESSION['user3']) || (empty($_SESSION['user3'])))
{
	header("Location:../index.php");
	 }
	 error_reporting(E_ALL ^ E_NOTICE);
	 if($_GET['submit']=="INSERT" || !empty($_GET['submit']) || isset($_GET['submit']) )
	{
		include("../../Include_Connection.php");
		$sql="INSERT INTO committemember(comMemId, memName, memPosition, memWorkPlace, workPlaceAddress, occupation, phoneNo1, phoneNo2, email, faxNo, appoinmentDate, endDate, ComitteeID) VALUES
		 ('', '$_GET[name]', '$_GET[position]', '$_GET[workPlace]', '$_GET[address]', '$_GET[occupa]', '$_GET[tp1]', '$_GET[tp2]', '$_GET[mail]', '$_GET[fax]', '$_GET[appDate]', '$_GET[endDate]', '$_GET[SerID]')";
		echo $sql;
		if(mysql_query($sql, $conn))
		{
			echo "1 Record Added";
		}
		else
		{
			echo "Error".mysql_error();	
		}
	//header("Location:commView.php?msg=$txt");
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
<script language="javascript">
function val()
{
var answer=window.confirm("Are you sure?");
return answer;
}
</script>

</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 
  <tr>
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
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF"><h2><br/><br/>Insert Committee Member Information</h2>
        
<!-- //////////////////////////////form 1 starting////////////////////////////// -->      
<form name="form1" method="get"  >
<table width="300" border="1" cellspacing="0" cellpadding="5" align="center" class="subtable">
   <?php
		include ("../../include_Connection.php");
		 $sql = "SELECT * FROM committee"; 
		 $result = mysql_query($sql, $conn) or die(mysql_error());
		?>
  <tr>
    	<td width="100" class="subtableheading">Committee</td>
    	<td>
   		 		<select name="SerID">
       				<?php  
					while ($newArray = mysql_fetch_array($result)) 
 					{
					?>
    			<option value="<?php echo $newArray['commId']; ?>" <?php if($newArray['commId']==$_GET['SerID']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['commName']; ?> </option>
    				<?php }?>
 	    	 </select>
    	</td>
    	
  </tr>
   <tr>
    	<td width="100" class="subtableheading">Name</td>
    	<td> <input type="text" name="name" /></td>
   </tr>
  <tr>
    	<td class="subtableheading">Position</td>
   		 <td><input type="text" name="position" /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Work Place</td>
    	<td><input type="text" name="workPlace" /></td>
 </tr>
  <tr>
   		 <td  class="subtableheading">Address</td>
    	<td><input type="text" name="address"  /></td>
 </tr>
 <tr>
   		 <td  class="subtableheading">Occupation</td>
    	<td><input type="text" name="occupa"  /></td>
  </tr>   
  <tr>
    	<td  class="subtableheading">Telephone No</td>
    	<td><input type="text" name="tp1"  /></td>
  </tr>
  <tr>
    	<td  class="subtableheading">Mobile No</td>
   		 <td><input type="text" name="tp2" /></td>
  </tr>
   <tr>
    	<td  class="subtableheading">Email</td>
   		 <td><input type="text" name="mail" /></td>
  </tr>
   <tr>
    	<td  class="subtableheading">Fax No</td>
    	<td><input type="text" name="fax" /></td>
    </tr> 
   <tr>
    	<td  class="subtableheading">Appoinment Date</td>
   		 <td> <input type="text" name="appDate" /></td>
  </tr> 
   <tr>  
  		<td  class="subtableheading">End Date</td>
   		 <td><input type="text" name="endDate" /></td>
  </tr>
 <tr class="tableheading">
  		<td colspan="2" align="center" height="40">
 		 <input type="submit" name="submit" value="INSERT" />&nbsp;
         <input type="reset" name="reset" value="CLEAR" />
  		</td>
  </tr>
</table>
</form> 
     </td>

</tr>
 <tr>
    	<td colspan="3" align="center" class="copyr" height="35"> Copyright &copy; Sri Lanka Air Force</td>
    
 </tr>
</table>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
