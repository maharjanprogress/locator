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
    $eventname = $_POST["eventname"];
    $district = $_POST["district"];
    $html = $_POST["htmlSource"];
    $pic=$_POST["imageSource"];
    $date=$_POST["date"];
      
        if(!empty($pic) && !empty($html) && !empty($district) && !empty($eventname) && !empty($date)){
            $sql = "INSERT INTO `event` (`eventname`, `district`, `pic`, `source`,`day`) VALUES ('$eventname', '$district', '../events/$pic', '../events/$html','$date')";
            $result = mysqli_query($con, $sql);
            $showAlert = "added up successfully.";
        }else if(empty($pic) || empty($html) || empty($district) || empty($eventname) || empty($date)){
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
        <h1>Add Event</h1>
    <form class="add-place-form" method="post" action="">
      <label for="eventname">Event Name</label>
      <input type="text" id="eventname" name="eventname" required>

      <label for="district">Address</label>
      <input type="text" id="district" name="district" required>

      <label for="imageSource">Image Source</label>
      <input type="file" id="imageSource" name="imageSource" required>

      <label for="htmlSource">Webpage Source</label>
      <input type="file" id="htmlSource" name="htmlSource" required>
      
      <label for="date">date:</label>
      <input type="text" id="date" name="date" placeholder="yyyy-mm-dd" required>
      
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