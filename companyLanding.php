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
  if($data['restaurant_id']==NULL){
     header("location:connectRestaurant.php");
  }
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
        <h3 class="text-primary text-center mb-4 border-bottom p-2">Company Admin</h3>
        <ul class="list-unstyled navbar p-4">
            <li class="text-primary pb-2 mt-2 mb-2 fs-5 w-100">
                <a href="#" class="text-decoration-none">Employees</a>
            </li>
            <li class="text-primary pb-2 mt-2 mb-2 fs-5  w-100">
                <a href="comOrders.php" class="text-decoration-none">Orders</a>
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
        
        <div class="container-fluid">
            <div>
              <a href="addEmployee.php" class="btn btn-primary active m-3" aria-current="page">Add Employee</a>
            </div>

            <div class="container">
               <table class="table border">
                <thead>
                 <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th>Operation</th>
                 </tr>
                </thead>
                <tbody>
                    <?php
       
                        $emsql = "select * from `employee` where company_id=$companyId";
                        $emResult = mysqli_query($conn, $emsql);
                        if($emResult){
                        while( $row = mysqli_fetch_assoc($emResult)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['discription'];
                            $telephone = $row['mobile'];

                            $sql2 = "select * from `users` where company_id=$id and userType='employee'";
                            $sql2Result = mysqli_query($conn,$sql2);
                            $edata = mysqli_fetch_assoc($sql2Result);
                            $email=$edata['email'];
                            echo '
                            
                            <tr>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$telephone.'</td>
                                <td>
                                <button class="btn btn-outline-primary ">
                                <a href="updateEmployee.php?updateId='.$id.'"  class="text-decoration-none">Update</a>
                                </button>
                                <button class="btn btn-outline-danger text-danger  ">
                                <a href="deleteEmployee.php?deleteId='.$id.'" class="text-decoration-none text-danger">Delete</a>
                                </button>
                                </td>
                            </tr>
                            
                            ';
                        }
                        
                    }
                    else{
                        die(mysqli_error($conn));
                    }

                    
                    
                    ?>

   
                </tbody>
            </table>
            </div>
        </div>
      </section>
   </div>
</body>
</html>