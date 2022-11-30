<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Devin R. Olsen - Pure CSS Vertical Menu Demo</title>
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
		    <ul class="top-level">
             <li>&nbsp;</li>
		        <li><a href="../staff/index.php">Staff Home</a></li>
		        <li><a href="../staff/itemView.php" >Item Detail Management</a>
                   <ul class="sub-level">
		                 <li><a href="../staff/itemView.php">View Details</a></li>
		                 <li><a href="../staff/itemInsert.php">Insert Detail</a></li>
		                 <li><a href="../staff/itemSearch.php">Search Detail</a></li>
		           </ul>
                
                </li>
		        <li><a href="../staff/categoryView.php">Category Info management</a>
                 	<ul class="sub-level">
		                 <li><a href="../staff/categoryView.php">View Details</a></li>
		                 <li><a href="../staff/categoryInsert.php">Insert Detail</a></li>
		                 
		           	</ul>
                </li>
		        <li>
		            <a href="../staff/stationView.php">Station Info Management</a>
		            <ul class="sub-level">
		                <li><a href="../staff/stationView.php">View Details</a></li>
      					<li><a href="../staff/stationInsert.php">Insert Detail</a></li>
     				    <li><a href="../staff/stationSearch.php">Search Detail</a></li>
		            </ul>
		        </li>
                
		        <li>
		           <a href="../staff/conDetaView.php">Contact Info Management</a>
		          <ul class="sub-level">
		                <li><a href="../staff/conDetaView.php">View Information</a></li>
      					<li><a href="../staff/conDetaInsert.php">Insert Information</a></li>
		          </ul>
		       <li>
               <li><a href="../staff/supplierDoc.php">Bidder Documents</a></li>
               <li><a href="../logout.php">Logout</a></li>
		    </ul>
		</div>
    </body>
</html>