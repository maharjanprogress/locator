<?php

session_start();

include "db_connect.php";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $delete="DELETE FROM feeds WHERE feedid='$id'";
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
    <title>LocatoR - Login</title>
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

<body>
    <?php 
    require '../components/nave.html';
?>

    <div id="docContainer">
      <div class="a_head">
        <h2 style="font-weight: 500">Client Queries</h2>
      </div>
      <div class="a_body">
        <div class="docList">
        <?php
              $query = "SELECT * FROM feeds INNER JOIN users ON feeds.userid=users.userid ";
              $result = mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0)
              {
                foreach($result as $items)
                {
                  ?>

                  <div class="doc" id="doc">
                    <div class="docInfo">
                      <h3 id="name"><?= $items['username']?></h3>
                      <p class="edu"><?= $items['email']?></p>
                      <p class="speciality"><?= $items['message']?></p>
                      <p class="experience"><?= $items['day']?></p>
                    </div>
                    <div class="prog">
                      <a href='client-query.php?id=<?= $items['feedid']?>' class='shirt'>problem solved</a>
                    </div>
                  </div>
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