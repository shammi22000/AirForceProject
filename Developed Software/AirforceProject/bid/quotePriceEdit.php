<?php 
session_start(); 
  		  			    
		if(!isset($_SESSION['user1']) || (empty($_SESSION['user1'])) || $today>=$exp_date ) 
			{ 	header("Location:../login.php");	 }

			error_reporting(E_ALL ^ E_NOTICE);
			if($_GET['submit']=="UPDATE" || !empty($_GET['submit']) || isset($_GET['submit']) )
			{
 
	 			include("../Include_Connection.php");
				$sql="UPDATE  bidquote SET date='$_GET[todayDate]', priceQuote='$_GET[quote]'  WHERE bidQuoteID='$_GET[preId]'";
					if(mysql_query($sql, $conn))
					{
						echo("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('1 Record Edited! Go to View Page')
						</SCRIPT>");
					}
					else
					{
						echo "Error".mysql_error();	
					}
				header("Location:quotePriceView.php");
		}
	?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<link href="../include/MyStyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

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
    	<td  colspan="3" height="30" align="center"  bgcolor="#000000">
    
 		<!-- //////////////////////////////special Menu Starting////////////////////////////// -->    
				<?php
				include("include_quoteMenu.php");
				?>
		<!-- //////////////////////////////special Menu Ending////////////////////////////// --> 

</td>
  </tr>
  <tr>
    	<td width="200" valign="top">
   		<!-- //////////////////////////////Sub Menu Starting////////////////////////////// --> 
				<?php
				include("include_bidSubMenu.php");
				?>
		<!-- //////////////////////////////Sub Menu Ending////////////////////////////// --> 

		</td>
    	<td width="790" height="435" valign="top" align="center" bgcolor="#FFFFFF">

<h2><br/><br/>Quoted Price Edit Page</h2><br/>

<!-- /////////////////////////////form1 starting////////////////////////////// --> 
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
 <p align="left"> 
  
 				<?php  //retrieve bidder Id and company name==================================== 
	    		$bidderName=$_SESSION['comName']; 
	 		 	error_reporting(E_ALL ^ E_NOTICE);
				include ("../include_Connection.php");
				$sql = "SELECT * FROM  login, supplier  WHERE (supplier.supLogID=login.login_Id AND compName='$bidderName')";
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
	  			$newArray = mysql_fetch_array($result);
				$bidID=$newArray['supplierID'];
				?>
</p>                                               
                <p align="left"><strong>&nbsp;&nbsp;Bidder Name : <?php echo $_SESSION['comName'];  ?></strong> </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
   
</form>
<!-- /////////////////////////////form1 ending////////////////////////////// -->   
  

<!-- /////////////////////////////form2 starting////////////////////////////// --> 
<form name="form2"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
 			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				include("../Include_Connection.php");
				$id=$_GET['ID'];	
		 		$sql ="SELECT * FROM  station, category, item, bidquote  WHERE (station.stationId=bidquote.bQstaID AND category.catId=bidquote.bQcatID AND  item.itemID=bidquote.bQitemID AND  bidQuoteID='$id')";
	 			// execute the SQL statement
	 			$result = mysql_query($sql, $conn) or die(mysql_error());
	 			$newArray = mysql_fetch_array($result);
 				//go through each row in the result set and display data
	 		?>
   
<table width="500" border="1" cellpadding="15" bgcolor="#EAEAEA">
 	<tr>      
       	<td width="100" class="subtableheading">Station Name</td>
    	 <td><p><?php echo $newArray['stationName']; ?></p> </td>          
  </tr>
  <tr>
    	<td class="subtableheading">Category Name</td>
     	<td> <p><?php echo $newArray['catName']; ?> </p></td>
 </tr>
  <tr>
    	<td class="subtableheading">Item Name</td>
     	<td> <p><?php echo $newArray['itemName']; ?>&nbsp;(<?php echo $newArray['weight']; ?><?php echo $newArray['UOM']; ?>)</p></td>
 </tr>
  <tr>
    	<td class="subtableheading">Quoted Price</td>
    	<td> <input name="quote" id="quote" type="text" value="<?php echo $newArray['priceQuote']; ?>" /></td>
  </tr>
  <tr>
  		<td colspan="2" align="center">
  			<input name="submit" id="submit" type="submit" value="UPDATE" />&nbsp;&nbsp;
  			<input name="cancel" id="cancel" type="reset" value="CANCEL" />
  			<input name="preId" id="preId" type="hidden" value="<?php echo $id; ?> " />
   			<input name="todayDate" id="todayDate" type="hidden" value="<?php echo $today; ?> " />
  		</td>
  </tr>
 </table>
 </form>
<!-- //////////////////////////////Form2 End////////////////////////////// -->
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
