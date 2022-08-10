<?php
session_start();

 if($_SESSION['userType']==="resAdmin"){
            header("location:orders.php");
           }
           
          else if($_SESSION['userType']==="companyAdmin"){
            header("location:companyLanding.php");
           }
           
         else if($_SESSION['userType']==="employee"){
            header("location:employeeLanding.php");
           }
           
         else{
            header("location:login.php");
         }
?>