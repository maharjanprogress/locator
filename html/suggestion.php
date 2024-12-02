<?php
session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
    $showAlert  = false;    
    $showError = false;
    $userid=$_SESSION['userid'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "../php/db_connect.php";
        $placename=$_POST["place"];
        $district=$_POST["district"];
        $message = $_POST["message"];
      
            if(!empty($district)||!empty($placename)){
                $sql = "INSERT INTO `suggest` (`userid`,`placename`,`district` ,`message`) VALUES ('$userid','$placename','$district' , '$message')";
                $result = mysqli_query($con, $sql);
                $showAlert = "Your question is submitted";
            }else if(empty($district)||empty($placename)){
                $showError = "empty fields";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>LocatoR - Register</title>
  </head>

  <body style="overflow-y: scroll">
  <?php require '../components/nav.html' ?>
    <div class="appointmentContainer">
      <div class="a_head">
        <h2 style="font-weight: 500">You got some interesting place in mind?</h2>
      </div>
      <div class="a_body">
        <form action="" method="post" id="form1">
          <h3 style="font-weight: 500; border-bottom: 1px solid black">
            Suggest Place
          </h3>
          <br />
          <div>
            <label for="place">Place Name:</label>
            <input type="text" id="place" name="place">
          </div>
          <div>
            <label for="district">District:</label>
            <input type="text" id="district" name="district">
          </div>
          <div>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="tell us something about this place"></textarea>
          </div>
          <button type="submit">submit</button>
        </form>
      </div>
    </div>

    <script src="../js/script.js"></script>
    <script
      src="https://kit.fontawesome.com/e87b42cfc1.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
