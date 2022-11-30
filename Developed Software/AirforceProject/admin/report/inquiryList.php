<!--//Main Heading Area Starting//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procurement of Ration Items</title>
<script src="file:///C|/Users/bid/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<!-- ////////jquery Starting/////// -->
<link rel="stylesheet" type="text/css" href="../../jquery/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="../../jquery/demos.css">
		<script src="../../jquery/jquery-1.5.1.js"></script>
		<script src="../../jquery/jquery.ui.core.js"></script>
		<script src="../../jquery/jquery.ui.widget.js"></script>
		<script src="../../jquery/jquery.ui.datepicker.js"></script>
		<script> 
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script> 
        <script> 
			$(function() {
				$( "#datepicker1" ).datepicker1();
			});
		</script> 
<!-- ////////jquery Ending/////// -->

</head>

<body>
<table width="990" border="1" cellspacing="0" cellpadding="0" class="maintable" bgcolor="#A8CBF7">
 <?php $today = date("d/m/Y "); echo $today;  ?>
  
  <tr>
    
    <td width="790" valign="top" align="center" bgcolor="#FFFFFF" ><br/>
 <h2>Inquiry shedule </h2>
    
   <form id="form1" name="form1" method="GET" action="" >
   <div class="demo" style="padding:0px">To Date  :<input  name="dof" type="text" id="datepicker"></div>


 <input name="submit" type="submit"/>
  

 

</form>

<?php if(isset($_GET['submit']))
{echo $_GET['dof'];} ?>
</table>
</td>
</tr> 