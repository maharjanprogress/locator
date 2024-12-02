<?php

session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
$showAlert  = false;    
$showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db_connect.php";
    $placename = $_POST["placeName"];
    $address = $_POST["address"];
    $html = $_POST["htmlSource"];
    $pic=$_POST["imageSource"];
 
      
        if(!empty($pic) && !empty($html) && !empty($address) && !empty($placename)){
            $sql = "INSERT INTO `place` (`placename`, `address`, `html`, `pic`) VALUES ('$placename', '$address', '../placeht/$html', '../placeht/$pic')";
            $result = mysqli_query($con, $sql);
            $showAlert = "added up successfully.";
        }else if(empty($pic) || empty($html) || empty($address) || empty($placename)){
            $showError = "Please fill out all the fields";
        }   
    }  

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel - Add Place</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<?php require '../components/nave.html' ?>
<?php
    if($showAlert){
        echo '<div class="alert">'.$showAlert.'</div>';
    }else if($showError){
            echo '<div class="error">'.$showError.'</div>';
    }
?>

    <div class="container" style="padding:2rem 12rem ">
        <h1>Add Place</h1>
    <form class="add-place-form" method="post" action="admin.php">
      <label for="placeName">Place Name</label>
      <input type="text" id="placeName" name="placeName" required>

      <label for="address">Address</label>
      <input type="text" id="address" name="address" required>

      <label for="imageSource">Image Source</label>
      <input type="file" id="imageSource" name="imageSource" required>

      <label for="htmlSource">HTML Source</label>
      <input type="file" id="htmlSource" name="htmlSource" required>

      <button type="submit">Add</button>
    </form>
  </div>


  <?php
    if($login){
        echo'
        <script>
        document.querySelector(".checkbox").checked = true;
        document.querySelector(".component-title").innerHTML = "Logged In";

        document.querySelector(".checkbox").addEventListener("click", () => {
        let confirmval = confirm("Are you sure you want to log out?");
        if (confirmval == true) {
            window.location.href = "../php/logout.php";
        } else {
            document.querySelector(".checkbox").checked = true;
        }
        });
        </script>';
    }
    ?>
    <script>
        const alert = document.querySelector(".alert");
        const error = document.querySelector(".error");
        setTimeout(() => {
            // alert.style.display = "none";
            error.style.display = "none";
        }, 3000);
    </script>
</body>
</html>