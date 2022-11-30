<?php
	session_start(); 
	if(!isset($_SESSION['user5']) || (empty($_SESSION['user5'])))
		{ 	header("Location:../login.php");	 }

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" height="650" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
  <tr >
      <td  colspan="3"  height="109" bgcolor="#FCC314"><img src="../../images/new.jpg" width="990" height="109"></td>
  </tr>
  <tr>
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////Main Menu Starting////////////////////////////// -->    
	<?php
	include("include_BaseMainmenu.php");
	?>
<!-- //////////////////////////////Main Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_SCAPCSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Documentary Evidence of Bidders</h3>
   
      
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
   
   
<?php
 		error_reporting(E_ALL ^ E_NOTICE);
		include("../../Include_Connection.php");
		$sql ="SELECT * FROM   qualification GROUP BY  bidYear";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		?>
    	
<p>Project Year: &nbsp;  
			<select name="serYear" >
   		 	<option value="-1">Select year</option>
  		 	<?php  
			while ($newArray = mysql_fetch_array($result)) 
 			{
			?>
   		 	<option value="<?php echo $newArray['bidYear']; ?>" <?php if($newArray['bidYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['bidYear']; ?> </option>
    		<?php } ?>
			</select> &nbsp;<input type="submit" name="seleYear" value="Display" /> 
</p> 
 <!-- /////////////////////////////form1 ending////////////////////////////// --> 

  
<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
         
<div style="font-family: 'Times New Roman', Times, serif; ">
  
 			<?php //retrive bidder's documents =====================================
				if(isset($_GET['seleYear'])){
				$proYear=$_GET['serYear'];
				include ("../../include_Connection.php");
				$sql = "SELECT * FROM  qualification, qualificationtype,  login WHERE login.login_Id= qualification.QsuppID AND qualificationtype.qualifiTypeID=qualification.qTypeId"; 
 				$result = mysql_query($sql, $conn) or die(mysql_error()); 
 				$newArray = mysql_fetch_array($result);
  			?>
<table width="700"  border="1" cellpadding="5" align="center" class="subtable">
  
<tr>
      	<td width="40" height="50" class="tableBg1">Sr. No</td>
		<td width="250" height="50" class="tableBg1">Bidder Name</td> 
     	<td class="tableBg1" width="300">Qualification Name</td>
		<td class="tableBg1" width="100">Documentary Evidence</td> 	
</tr>
  			<?php
   				$a=0;
 				while ($newArray = mysql_fetch_array($result))
 				{ $a++;
				?>

  <tr>
      	
     	<td align="left" > <?php echo $a; ?></td>
     	<td align="left" > <?php echo $newArray['name']; ?></td>
    	<td align="left" > <?php echo $newArray['qualificatioName']; ?></td>
    	<td align="left" > <a href="../bidderDocu/<?php echo $newArray['docEvidence']; ?>"><?php echo $newArray['docEvidence']; ?></a></td>
    
  </tr>
			<?PHP   } ?>
    
    	
  </table>
 			 <?PHP   } ?>
</div><br/><br/>
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
