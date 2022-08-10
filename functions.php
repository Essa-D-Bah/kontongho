<?php

function connection(){
   $connection = new mysqli('localhost', 'root', 'Jolosutu@1', 'lunchApp');
   
   if(!$connection){
    die(mysqli_error($connection));
   }

   else{
    return $connection;
   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 

?>