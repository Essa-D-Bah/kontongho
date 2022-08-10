<?php
session_start();
  include "functions.php";
  $conn = connection();
  if(!isset($_SESSION['companyId'])){
       header("location:login.php");
  }
  if(strcmp( $_SESSION['userType'], "companyAdmin") != 0){
    header("location:login.php");
  }
  
  if(isset($_GET['deleteId'])){
    $emId = $_GET['deleteId'];
    
    $sql = "delete from `users` where company_id=$emId";
      $result = mysqli_query($conn, $sql);
    $sql2 = "delete from `employee` where id=$emId";
      $result2 = mysqli_query($conn, $sql2);

      if($result && $result2){
         header("location:companyLanding.php");
      }

  }

?>