<?php

session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
include "db_connect.php";
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $delete="DELETE FROM reviews WHERE reviewid='$id'";
  $okey=mysqli_query($con,$delete);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/events.css">
        <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style2.css" />
    <style>
      .shirt{
        background: red;
        color: black;
        font-size: 0.8em;
        padding: 10px 30px;
        text-decoration: none;
      }
      .shirt:hover{
        background: black;
        color: red;
      }
    </style>
</head>
    <title>LocatoR - Login</title>
</head>

<body>
    <?php 
    require '../components/nave.html';
?>

    <div id="docContainer">
      <div class="a_head">
        <h2 style="font-weight: 500">Review Modification</h2>
      </div>
      <div class="a_body">
        <div class="docList">
        <?php
              $date = "SELECT `day` FROM reviews GROUP BY `day`  ORDER BY `day` DESC";
              $result = mysqli_query($con,$date);
              if(mysqli_num_rows($result)>0)
              {
                foreach($result as $items)
                {
                  ?><?php $dae=$items['day'] ?>
                  <h1><?= $dae ?></h1>
                  <br>
                  <?php
              $people = "SELECT * FROM reviews INNER JOIN place ON reviews.placeid=place.placeid INNER JOIN users ON reviews.userid=users.userid where reviews.day='$dae' ORDER BY reviews.placeid DESC";
              $res = mysqli_query($con,$people);
              if(mysqli_num_rows($res)>0)
              {
                foreach($res as $item)
                {
                  ?>

                  <div class="doc" id="doc">
                    <div class="docInfo">
                      <h3 id="name"><?= $item['placename']?></h3><br>
                      <h3 id="name"><?= $item['username']?></h3>
                      <p class="edu">RATED: <?= $item['star']?>/5</p>
                      <p class="speciality"><?= $item['description']?></p>
                    </div>
                    <div class="prog">
                      <a href='review.php?id=<?= $item['feedid']?>' class='shirt'>DELETE</a>
                    </div>
                  </div>
                  <?php
                }
              }
          ?>
                  <?php
                }
              }
              else
              {
                ?>
                <h1>No client queries found</h1>
                <?php
              }
          ?>
        </div>
      </div>
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
</body>
</html>