<?php
session_start();
  include "functions.php";
  $conn = connection();
  if(!isset($_SESSION['companyId'])){
       header("location:login.php");
  }
  if(strcmp( $_SESSION['userType'], "employee") != 0){
    header("location:login.php");
  }

  $companyId= $_SESSION['companyId'];
  $sql = "select * from `employee` where id = $companyId";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $name = $data['name'];
  $parentComID = $data['company_id'];

  $psql = "select * from `company` where id = $parentComID";
  $presult = mysqli_query($conn, $psql);
  $pdata = mysqli_fetch_assoc($presult);
  $resId = $pdata['restaurant_id'];

  if(isset($_GET['foodId'])){
    $foodId = $_GET['foodId'];
    
     $todayDate = date("y/m/d");

    $orsql= "insert into `orders` (food_id, restaurant_id, company_id, employee_id, orderDate)
             values('$foodId', '$resId', '$parentComID','$companyId','$todayDate')
    ";

    $inorResult = mysqli_query($conn, $orsql);
    if($inorResult){
        header("location:employeeLanding.php");
    }

  }

?>