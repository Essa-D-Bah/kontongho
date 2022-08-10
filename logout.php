<?php
session_start();
unset($_SESSION['userType']);
unset($_SESSION['companyId']);
session_destroy();
header("location:index.php");
exit(); 
?>