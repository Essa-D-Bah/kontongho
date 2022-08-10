<?php
session_start();
  include "functions.php";
  $conn = connection();
  if(!isset($_SESSION['companyId'])){
       header("location:login.php");
  }
  if(strcmp( $_SESSION['userType'], "resAdmin") != 0){
    header("location:login.php");
  }
  
  if(isset($_GET['deleteId'])){
    $foodId = $_GET['deleteId'];
    
    $sql = "delete from `food` where id=$foodId";
    $result = mysqli_query($conn, $sql);

      if($result){
         header("location:resfood.php");
      }

  }

?>