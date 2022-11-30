<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:register.php"); 
}
?>

<html>
<body>
Login Successful
</body>
</html>