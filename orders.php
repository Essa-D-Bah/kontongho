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
          <div class="container w-100 mx-auto my-0 d-flex">
              <?php
                $getOrders = "select * from `orders` where restaurant_id = $companyId";
                $ordersResult = mysqli_query($conn, $getOrders);
                $companyIds = array();
                if($ordersResult){
                  while($row=mysqli_fetch_assoc($ordersResult)){
                    $orderingCompanyId = $row['company_id'];
                    array_push($companyIds, $orderingCompanyId); 
                  }
                } 
                
              

                $uniqueIds = array_unique($companyIds);

                foreach($uniqueIds as $comid){
                  $getCom = "select * from `company` where id = $comid";
                    $comResult = mysqli_query($conn, $getCom);
                    $comdata = mysqli_fetch_assoc($comResult);
                       $name = $comdata['name'];
                       $address = $comdata['address'];
                       $mobile = $comdata['mobile'];
                       $id = $comdata['id'];

                    echo '
                        <div class="card m-3 d-flex" style="width: 17rem;">
                            <div class="card-body">
                                <h5 class="card-title">Name: '.$name.'</h5>
                                <p class="card-text"> Address: '.$address.'</p>
                                <p class="">Telephone: '.$mobile.'</p>
                                <a href="allOrdersOfCom.php?comId='.$id.'"  class="btn btn-primary">View More</a>
                            </div>
                        </div>    
                    ';
                }
                

              
              ?>
          </div>
          
        </div>
      </section>
   </div>
</body>
</html>