<?php
session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
$showAlert  = false;
$showError = false;
include "../php/db_connect.php";
$userid=$_SESSION['userid'];
if(isset($_POST['rating_value'])){

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}




    $rating_value = $_POST['rating_value'];
    $userMessage = $_POST['userMessage'];
    
$sql = "INSERT INTO `feedback` (`userid`, `star`,`message`,`day`) VALUES ('$userid', '$rating_value','$userMessage',CURRENT_DATE)";




if (mysqli_query($con, $sql)) {
    $showAlert = "feedback added up successfully.";
} else {
    $showError = "Please fill out all the fields";
}

mysqli_close($con);

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
    <title>LocatoR - Admin</title>
  </head>

  <body style="overflow-y: scroll">
    <?php require '../components/nav.html'?>
    <div id="docContainer">
      <div class="a_head">
        <h2 style="font-weight: 500">Our Reviews</h2>
      </div>
      <div class="a_body">
        <div class="docList">
            <?php require '../components/star.html'?>
            <?php
              $query = "SELECT * FROM feedback INNER JOIN users ON feedback.userid=users.userid ";
              $result = mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0)
              {
                foreach($result as $items)
                {
                  ?>

                  <div class="doc" id="doc">
            <div class="docInfo">
              <h3 id="name"><?= $items['username']?></h3>
              <p class="edu">RATED:<?= $items['star']?>/5</p>
              <p class="speciality"><?= $items['message']?></p>
              <p class="experience"><?= $items['day']?></p>
            </div>
                </div>
                  <?php
                }
              }
              else
              {
                ?>
                <h1>No FeedBack found be the first to give it</h1>
                <?php
              }
          ?>
          
        </div>
      </div>
    </div>

    <script src="../js/script.js"></script>
    <!-- <script src="doc.js"></script> -->
    <script
      src="https://kit.fontawesome.com/e87b42cfc1.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
