<?php
   include "functions.php";

   $conn = connection();
   
   if(isset($_POST['submit'])){
       $companyName = test_input($_POST['name']);
       $companyAddress = test_input($_POST['address']);
       $companyMobile = test_input($_POST['mobile']);
       $companyEmail = test_input($_POST['email']);
       $companyPassword = test_input($_POST['password']);
       $hashedPassword = password_hash($companyPassword, PASSWORD_DEFAULT);

       $csql = "insert into `company` (name, address, mobile) 
       values('$companyName','$companyAddress','$companyMobile')";

       $insertToCompany = mysqli_query($conn, $csql);
       $companyId = mysqli_insert_id($conn);

       if(!$insertToCompany){
        die(mysqli_error($conn));
       }


        $usql =  "insert into `users` (email, password, company_id,userType) 
       values('$companyEmail','$hashedPassword','$companyId', 'companyAdmin')";

       $insertToUsers = mysqli_query($conn, $usql);
       
        if(!$insertToUsers){
          die(mysqli_error($conn));

        }

        else{
            header("location:login.php");
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

    <title>Anch</title>
</head>
<body>
    <div class="container w-50 mt-5 p-5 border">
        <h3 class ="text-primary text-center pb-3">Register Your Company</h3>
     <form action="" method="POST">
           
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required autocomplete="off">    
        </div>

        <div class="mb-3">
            <label class="form-check-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="off">    
        </div>

        <div class="mb-3">
            <label class="form-check-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>    
        </div>

        <!-- <div class="mb-3">
            <label class="form-check-label" for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword">    
        </div> -->

        <button type="submit" class="btn btn-primary" name="submit">Register</button>
        
      </form>

      <p class="text-center text-primary">
        Already got an account 
        <a href="login.php" class="px-3">Login</a>
      </p>
    </div>
</body>
</html>