<?php
 error_reporting(E_ALL ^ E_NOTICE);

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
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#FFFF99">
 
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
    <td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 <!-- //////////////////////////////special  Menu Starting////////////////////////////// -->    
	<?php
	include("include_BaseMainmenu.php");
	?>
<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    <td width="200" valign="top">
   <!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
	<?php
	include("include_tecSubMenu.php");
	?>
<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

	</td>
    <td width="790" valign="top" align="left" bgcolor="#FFFFCC"><h3 class="pageHeading" align="center">Recommended Points View Page</h3>
    <form action="" method="get" name="form1"> 
   <!-- /////////////////////////////Select the Project Year//////////////////////////// --> 
   
   <?php
	  error_reporting(E_ALL ^ E_NOTICE);
	include("../../Include_Connection.php");
	 $sql = "SELECT * FROM pqpoints GROUP BY projectYear";
	 $result = mysql_query($sql, $conn) or die(mysql_error());
 	 ?>
      <p align="center">Project Year :
       <select name="serYear">
		<?php  
		while ($newArray = mysql_fetch_array($result)) 
 	{ 	?>
    <option value="<?php echo $newArray['projectYear']; ?>" <?php if($newArray['projectYear']==$_GET['serYear']) {  ?> selected="selected" <?php } ?> ><?php echo $newArray['projectYear']; ?> </option>
    <?php  
	}
	?>
    </select>&nbsp; 
    <input type="submit" name="seleYear" value="Display" /></p>
    
    </form>
    
    
    
      <form action="" method="get" name="form2">
         
      <div style="border-width:thick; background-color:#999; width:600px; text-align:left; font-family: 'Arial', Gadget, sans-serif; font-stretch:expanded; font-size:12px; margin:10px; max-width:600px; min-height:100px;"><br/>
    <div style="list-style-position:inside; font-size:10px;">
   &nbsp; 1.AAI&nbsp;&nbsp;&nbsp;- Average Annual Income<br/>
   &nbsp; 2.AC&nbsp;&nbsp;&nbsp;&nbsp;- Available Credit <br/>
   &nbsp; 3.STAFF&nbsp;- Staff, EPF/ETF staff<br/>
   &nbsp; 4.TF&nbsp;&nbsp;&nbsp;&nbsp;- Transport Facility<br />
   &nbsp; 5.CRF&nbsp;&nbsp;&nbsp;- Cold Room Facility<br/>
   &nbsp; 6.SF&nbsp;&nbsp;&nbsp;&nbsp;- Storage Facility<br/>
   &nbsp; 7.EXP&nbsp;&nbsp;&nbsp;- Experience<br/>
   &nbsp; 8.PP &nbsp;&nbsp;&nbsp;&nbsp;- Past Performance
      </div>
    </div>
<!-- /////////////////////////////Connect to Database//////////////////////////// -->   

  <?php 
	
	//if(isset($_GET['seleYear']))
	//{	 
	// $Id= $_GET['serYear'];
 include ("../../include_Connection.php");
$sql = "SELECT * FROM  supplier, pqpoints WHERE (supplier.supplierID=pqpoints.PQsupID AND projectYear='$Id')"; 
 $result = mysql_query($sql, $conn) or die(mysql_error()); 
 //$newArray = mysql_fetch_array($result);
  ?>   


  <div style="font-family: 'Times New Roman', Times, serif; ">
   <table width="750" border="1" cellpadding="5" align="center" class="subtable">

 	
<tr align="center">
      	<td width="30"  height="50" class="tableBg1">Sr No</td>
     	<td width="250"   class="tableBg1">Bidder Name</td>
     	<td width="50" class="tableBg1">AAI</td>
        <td width="50" class="tableBg1">AC</td>
    	<td width="50"class="tableBg1">STAFF	</td>
        <td width="50" class="tableBg1">TF</td>
        <td  width="50"class="tableBg1">CRF</td>
    	<td width="50" class="tableBg1">SF	</td>
        <td class="tableBg1">EXP </td>
    	<td width="50" class="tableBg1">PP	</td> 
        <td width="50" class="tableBg1">Total Points</td>  	
        <td width="100" class="tableBg1">Action</td> 
  </tr>
  <?php
    $b=0;
 while ($newArray = mysql_fetch_array($result))
 {$b++;
	$AAI=$newArray['avgAnnIncome'];
	$AC=$newArray['availCredit'];
	$STAFF=$newArray['staff'];
	$TF=$newArray['vehicle'];
	$CRF=$newArray['coldRoom'];
	$SF=$newArray['stores'];
	$EXP=$newArray['experience'];
	$PP=$newArray['performance'];
	$TotalPoint=$AAI+$AC+$STAFF+$TF+$CRF+$SF+$EXP+$PP;
?>
  <tr>
  	<td align="left" ><?php echo $b; ?></td>
      	<td align="left" ><?php echo $newArray['compName']; ?></td>
     	<td align="left" ><?php echo $newArray['avgAnnIncome']; ?></td>
     	<td align="left" ><?php echo $newArray['availCredit']; ?></td>
        <td align="left" ><?php echo $newArray['staff']; ?></td>
        <td align="left" ><?php echo $newArray['vehicle']; ?></td>
        <td align="left" ><?php echo $newArray['coldRoom']; ?></td>
        <td align="left" ><?php echo $newArray['stores']; ?></td>
        <td align="left" ><?php echo $newArray['experience']; ?></td>
        <td align="left" ><?php echo $newArray['performance']; ?></td>
        <td align="left" ><?php echo $TotalPoint; ?></td>
    	<td><a href="scoreEdit.php?ID=<?php echo $newArray['PQpointID']; ?>"><img src="image/b_edit.png" width="16" height="16" alt="EDIT" border="0" /></a>&nbsp;&nbsp;  
    <a href="ScoreDelete.php?ID=<?php echo $newArray['PQpointID']; ?>"><img src="image/b_drop.png" width="16" height="16" alt="DELETE" border="0" /></a></td>
         
  </tr>
	<?PHP   } ?>
       	
  </table>
  <?PHP  // } ?>
       </div>
       <br/><br/>
            
     </form>
     
     	 
     
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
