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
         <div>
           <a href="addfood.php" class="btn btn-primary active m-3" aria-current="page">Add Food</a>
         </div>

         <div>
              <table class="table align-middle">
                <thead>
                 <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th>Operation</th>
                 </tr>
                </thead>
                <tbody>
                    <?php
       
                        $foodsql = "select * from `food` where restaurant_id=$companyId";
                        $foodResult = mysqli_query($conn, $foodsql);
                        if($foodResult){
                        while( $row = mysqli_fetch_assoc($foodResult)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $discription = $row['discription'];
                            $price = $row['price'];
                            $image = $row['image'];
                            echo '
                            
                            <tr>
                                <td>'.$name.'</td>
                                <td>'.$discription.'</td>
                                <td>'.$price.'</td>
                                <td><img src='.$image.' height="100px" width="100px"></td>
                                <td>
                                <button class="btn btn-outline-primary ">
                                <a href="updateFood.php?updateId='.$id.'"  class="text-decoration-none">Update</a>
                                </button>
                                <button class="btn btn-outline-danger text-danger  ">
                                <a href="deleteFood.php?deleteId='.$id.'" class="text-decoration-none text-danger">Delete</a>
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