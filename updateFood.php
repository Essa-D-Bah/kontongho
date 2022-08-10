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
     $companyId= $_SESSION['companyId'];
     $sql = "select * from `restaurant` where id = $companyId";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_assoc($result);
     $name = $data['name'];

     $foodId = $_GET['updateId'];

     $getFood = "select * from `food` where id=$foodId";
     $getFoodResult = mysqli_query($conn,$getFood);
     $foodData = mysqli_fetch_assoc($getFoodResult);

     $prevName = $foodData['name'];
     $prevPrice = $foodData['price'];
     $prevDisc = $foodData['discription'];
     
     echo $foodName;

    if(isset($_POST['submit'])){
        $foodName = test_input($_POST['foodname']);
        $price = test_input($_POST['price']);
        $discription = test_input($_POST['discription']);
            $insql = "update `food` set name='$foodName', discription = '$discription', price='$price' where id = $foodId";
            $inresult = mysqli_query($conn,$insql);

            if($inresult){
                header("location:resfood.php");
            }

            else{
                die(mysqli_error($conn));
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


    <div class="wrapper d-flex">
       <section class=" border w-25 vh-100 ">
        <h3 class="text-primary text-center mb-4 border-bottom p-2">Restaurant Admin</h3>
        <ul class="list-unstyled navbar p-4">
            <li class="text-primary pb-2 mt-2 mb-2 fs-5  w-100">
                <a href="orders.php" class="text-decoration-none">Orders</a>
            </li>
            <li class="text-primary pb-2 mt-2 mb-2 fs-5 w-100" >
                <a href="resfood.php" class="text-decoration-none">Food</a>
            </li>
        </ul>
      </section>
      <section class="w-100 bg-light flex-grow-3">
        <div class="navbar border-bottom p-2 d-flex justify-content-betweeen">
           <form class="d-flex" role="search">
             <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
          <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               <?php echo $name?>
            </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item text-primary" href="logout.php">Logout</a></li>
           </ul>
          </div>
        </div>
        
        <div  class="container-fluid">
                         <div class="container">
                <h2 class=" text-primary mb-4 mt-5 text-center">Update Food</h2>
                <form action="#" method="POST" class="w-50 my-0 mx-auto" enctype="multipart/form-data">

                    <div class="my-4">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Food Name" name="foodname" value='<?php echo $prevName;?>'>
                    </div>
                    <div class="my-4">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Price" name="price" value='<?php echo $prevPrice;?>'>
                    </div>
                    <div class="my-4">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Discription" name="discription" ><?php echo $prevDisc;?></textarea>
                    </div>
                    <div class="my-4">
                    <button class="btn btn-primary" type="submit" name="submit">Update Food</button>
                   </div>

                </form>
          </div>
        
        </div>
      </section>
   </div>
</body>
</html>