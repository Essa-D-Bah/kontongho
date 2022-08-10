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
          <div class="container w-100 mx-auto my-0 p-4">
            <h4 class="text-primary"><?php 
               $orderDate = '';
               if(isset($_GET['comId'])){
                $comID = $_GET['comId'];
                  $getName = "select * from `company` where id =$comID";
                  $comresult = mysqli_query($conn, $getName);
                  $comNaData = mysqli_fetch_assoc($comresult);
                  $CompanyName = $comNaData['name'];
                  echo 'Orders From '.$CompanyName;
               }
            
            ?></h4>
             <table class="table border ">
                <tbody>
              <?php
                 if(isset($_GET['comId'])){
                    $ordringcomId = $_GET['comId'];
                    $getOrders = "select * from `orders` where company_id = $ordringcomId order by orderDate desc";
                    $orderRessult = mysqli_query($conn, $getOrders);
                    if($orderRessult){
                        while($row=mysqli_fetch_assoc($orderRessult)){
                            $foodId = $row['food_id'];
                            $employeeId = $row['employee_id'];
                            $orderDate=$row['orderDate'];
                            $getFood = "select * from `food` where id = $foodId";
                            $foodsResult = mysqli_query($conn, $getFood);
                            $foodData = mysqli_fetch_assoc($foodsResult);
                            $foodName = $foodData['name'];

                            $getEmployee = "select * from `employee` where id = $employeeId";
                            $employeesResult = mysqli_query($conn, $getEmployee);
                            $employeeData = mysqli_fetch_assoc($employeesResult);
                            $employeeName = $employeeData['name'];
                            $employeeTelephone = $employeeData['mobile'];

                             echo '
                            
                            <tr>
                                <td>'.$employeeName.'</td>
                                <td>'.$foodName.'</td>
                                <td>'.$employeeTelephone.'</td>
                                <td>'.$orderDate.'</td>

                            </tr>';

                            
                        }
                    }


                 }
              
              
              ?>
                 
                </tbody>
                 <thead>
                 <tr>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Food Ordered</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Order Date</th>
                 </tr>
                </thead>
            </table>
          </div>
          
        </div>
      </section>
   </div>
</body>
</html>