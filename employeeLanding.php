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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Anch</title>
</head>
<body>
 <div class="wrapper d-flex ">
        
      <section class="w-100 bg-light flex-grow-3">
        <div class="navbar border-bottom p-2 d-flex justify-content-betweeen  mx-auto my-0">
           <form class="d-flex" role="search">
             <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
          <div class="dropdown mx-4">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               <?php echo $name?>
            </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item text-primary" href="logout.php">Logout</a></li>
            
           </ul>
          </div>
        </div>
        
        <div class="container-fluid p-4">
         <div class="container w-75 mx-auto my-0 d-flex flex-wrap">

         <?php
               $fsql = "select * from `food` where restaurant_id ='$resId'";
               $fresult = mysqli_query($conn, $fsql);
               if($fresult){
                 while($row = mysqli_fetch_assoc($fresult)){
                       $id=$row['id'];
                       $foodName= $row['name'];
                       $discription = $row['discription'];
                       $price = $row['price'];
                       $image = $row['image'];
                
                       echo '
                        <div class="card m-3" style="width: 18em;">
                            <img src='.$image.' class="card-img-top" alt="..." height:"100px">
                            <div class="card-body">
                                <h5 class="card-title">'.$foodName.'</h5>
                                <p class="card-text">'.$discription.'</p>
                                <p class="text-primary">D '.$price.'</p>
                                <a href="processOrder.php?foodId='.$id.'"  class="btn btn-primary">Order</a>
                            </div>
                        </div>
                       
                       ';
                       
                       
                 }
                }
         ?>

        </div>
           
        </div>
      </section>
   </div>
</body>
</html>