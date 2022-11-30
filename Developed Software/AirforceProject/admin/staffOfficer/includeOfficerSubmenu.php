<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
body{behavior:url(file:///C|/Users/pc/cssHoverFix.htc);}

#navigation {
    width: 200px;
    font-size: 1em;
}
	#navigation ul {
	    margin: 0px;
	    padding: 0px;
	}
	ul.top-level { background: #A8CBF7; }
		
		#navigation li { list-style: none; }
        ul.top-level li {
            border-bottom: #fff solid;
            border-top: #fff solid;
            border-width: 0px;
        }
			#navigation a {
				color: ;
				cursor: pointer;
				display:block;
				height:35px;
				line-height: 25px;
				text-indent: 5px;					
				text-decoration:none;
				width:100%;
			}
			#navigation a:hover{ text-decoration: none;	}
	        #navigation li:hover {
	            background: #91C8FF;
	            position: relative;
	        }
        ul.sub-level { display: none; }
        li:hover .sub-level {
            background: #999;
			border: #fff solid;
            border-width: 1px;
            display: block;
            position: absolute;
            left:150px;
            top: 5px;
        }
        ul.sub-level li {
			border: none;
			float:left;
			width:150px; 
        }
		#navigation .sub-level { background: #999; }
		#navigation .sub-level .sub-level { background: #09C; }
						
	/*IE RESET HELPER*/
	li:hover .sub-level .sub-level { display:none; }
	.sub-level li:hover .sub-level { display:block; }	
</style>
</head>
    <body>
<div id="navigation">
<li><a href="loginView.php"></a></li>
 <ul class="top-level">  <li><a href="index.php">New User</a> </li>
    <li><a href="loginView.php" class="MenuBarItemSubmenu">Login Management </a>
   <ul class="sub-level">
     <li><a href="loginView.php">View Details</a></li>
       <li><a href="loginInsert.php">Insert Detail</a></li>  
      <li><a href="loginSearch.php">Search Detail</a></li>
    </ul>
    </li>
    <li><a href="priceView.php">Pre-qualify list management</a>
  <ul class="sub-level">
      <li><a href="PQlistView.php">View Lists </a></li>
      <li><a href="PQlistInsert.php">Insert Lists</a></li>
         </ul>
    </li> 
     <li><a href="priceView.php">Bid List Management</a>
  <ul class="sub-level">
      <li><a href="bidListView.php">View Lists </a></li>
      <li><a href="bidListInsert.php">Insert Lists</a></li>
   
    </ul>
    </li>     
   <li><a href="commView.php">Committee Management</a>
  <ul class="sub-level">
      <li><a href="commView.php">View Infomation</a></li>
      <li><a href="commInsert.php">Insert Infomation</a></li>
      <li><a href="commSearch.php">Search Infomation</a></li>
    </ul>
    </li>
    
    <li><a href="inqTypeView.php" >Inquiry Management</a>
    <ul class="sub-level">
      <li><a href="inqTypeView.php">View Inquiry Type </a></li>
      <li><a href="inqTypeInsert.php">Insert Inquiry Type</a></li>
          </ul>
    </li>
  <li><a href="priceView.php">Cost Analysis</a>
  <ul class="sub-level">
      <li><a href="priceView.php">View Prices </a></li>
      <li><a href="priceInsert.php">Insert Prices</a></li>
      
    </ul>
    </li>
     
  <li><a href="../logout.php">Logout</a></li>
</ul>
</div>
    </body>
</html>

