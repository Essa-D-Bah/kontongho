<?php
   session_start();
   include 'functions.php';
   $conn = connection();


     if(isset($_POST['submit'])){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $sql = "select * FROM `users` where email = '$email'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        
        if($rows==1){
          $data = mysqli_fetch_assoc($result);
          $hashedPass = $data['password'];
          if(password_verify($password, $hashedPass)){
           $_SESSION['userType']= $data['userType'];
           $_SESSION['companyId'] = $data['company_id'];
           header("location:authentication.php");
          }
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

 <div class="container w-50 p-5 mt-5 border">
  <h3 class="text-primary text-center" >Login</h3>
  <form method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div> 
    <button type="submit" class="btn btn-primary" name="submit">Login</button>
  </form>
  <div class="">
    <p class="text-primary text-center pt-3">If you don't have an Account click the links below Register Either as</p>
    <div class="d-flex justify-content-between">
      <button class="btn btn-outline-primary" >
        <a href="companySignUp.php"  class="text-decoration-none">Company</a>
      </button>
      <button class="btn btn-outline-primary" >
        <a href="restaurantSignup.php" class="text-decoration-none">Restaurant</a>
      </button>
    </div>
    
  </div>
</div>
</body>
</html>