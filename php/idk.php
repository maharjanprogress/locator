<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $a="ddddddddddsssdrrrrdd";
    require_once "db_connect.php";
  
      $sql = "INSERT into `users`(`username`,`district`,`email`,`password`) values('$a','$a','$email','$password')";
       if(mysqli_query($con,$sql)){
        $result["success"]="1";
        $result["message"]="success";
        echo json_encode($result);
        mysqli_close($con);
       }
       else{
        $result["success"]="0";
        $result["message"]="error";
        echo json_encode($result);
        mysqli_close($con);
       }
}
?>