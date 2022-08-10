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
  $companyId= $_SESSION['companyId'];
  $sql = "select * from `company` where id = $companyId";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $name = $data['name'];


  if(isset($_POST['submit'])){
       $restaurantID = $_POST['restaurant'];
       $insql = "update `company` set restaurant_id='$restaurantID' where id = '$companyId'";
       $inresult = mysqli_query($conn,$insql);
       if($inresult){
          header("location:companyLanding.php");
       }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container w-75 mx-auto my-0 p-5">
        <h4 class="text-primary text-center"> Choose one of the Restaurant around you vicinity to partner with.</h4>
    </div>
    <div class="container w-75 mx-auto my-0 p-5">
       <form action="" method="post">
          <select class="form-select" aria-label="Default select example" name="restaurant">
            <option selected>Open this select menu</option>
            <?php
               
               $restsql = "select * from `restaurant`";
               $reresult = mysqli_query($conn, $restsql);
               if($reresult){
                 while($row = mysqli_fetch_assoc($reresult)){
                    $resName = $row['name'];
                    $resId = $row['id'];
                    $location = $row['address'];

                    echo "
                       <option value='$resId'>Name: $resName, Location: $location </option>
                    ";
                 }
               }
            
            ?>
            
          </select>
          <div class="my-4">
            <button class="btn btn-primary" type="submit" name="submit">Partner</button>
          </div>
       </form>
    </div>
</body>
</html>