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
       $fullName= test_input($_POST['name']);
       $email = test_input($_POST['email']);
       $telephone = test_input($_POST['telephone']);
       $password = test_input($_POST['password']);
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
       
       $insertToEmployee = "insert into `employee` (name, mobile, company_id) 
       values('$fullName', '$telephone','$companyId')";
       $insertResult = mysqli_query($conn, $insertToEmployee);
       $userId = mysqli_insert_id($conn);
       if(!$insertResult){
        die(mysqli_error($conn));
       }


       $usql =  "insert into `users` (email, password, company_id,userType) 
       values('$email','$hashedPassword','$userId', 'employee')";
       $insertToUsers = mysqli_query($conn, $usql);
        if(!$insertToUsers){
         die(mysqli_error($insertToUsers));
        }
       header("location:companyLanding.php");  
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
    <title>Anch</title>
</head>
<body>
 <div class="wrapper d-flex">
       <section class=" border w-25 vh-100">
        <h3 class="text-primary text-center mb-4 border-bottom p-2">Company Admin</h3>
        <ul class="list-unstyled navbar p-4">
            <li class="text-primary pb-2 mt-2 mb-2 fs-5 w-100">
                <a href="companyLanding.php" class="text-decoration-none">Employees</a>
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
            <div class="container">
                <h2 class=" text-primary mb-4 mt-5 text-center">Add Employee</h2>
                <form action="addEmployee.php" method="POST" class="w-50 my-0 mx-auto">
                    <div class="my-4">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name" name="name" autocomplete="off">
                    </div>
                    <div class="my-4">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email" autocomplete="off">
                    </div>
                     <div class="my-4">
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password">
                    </div>
                     <div class="my-4">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telephone" name="telephone" autocomplete="off">
                    </div>
                    <div class="my-4">
                    <button class="btn btn-primary" type="submit" name="submit">Add Employee</button>
                   </div>
                </form>
          </div>
        
        </div>
      </section>
   </div>
</body>
</html>