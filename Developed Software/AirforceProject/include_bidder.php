
<form name="form1"  method="get" action="<?php $_SERVER['PHP_SELF']?>">
 
     <p align="left">  <?php  //echo $_SESSION['user1']; 
	
	  
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
                
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Date :<?php $today = date("F j, Y, g:i a");  echo $today;?>  </p> 
                <p align="left" style="font-size:13px; font-weight:bold">&nbsp;&nbsp;Project Year :<?php $projectYear = date("Y");  echo $projectYear;?>  </p> 
    
    </form>
