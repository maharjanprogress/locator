<?php
session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
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
</head>

<body>
    <?php 
    require '../components/nav.html';
?>

    <div id="docContainer">
      <div class="a_head">
        <h2 style="font-weight: 500">Top Locations</h2>
      </div>
      <div class="a_body">
        <div class="docList">
        <?php
            include "db_connect.php";
              $query = "SELECT * FROM place";
              $result = mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0)
              {
                foreach($result as $items)
                {
                  ?>
                  <a href="<?= $items['html']?>">
                  <div class="doc">
                  <div class="docImg" id="image">
              <img
                src="<?= $items['pic'] ?>" height="130" width="130"
                alt=""
              />
            </div>
            <div class="docInfo">
              <h3 id="name"><?= $items['placename']?></h3>
              <p class="edu"><?= $items['address']?></p>
                      <div class="text">
                         <p>here you can find brief introduction on <?php echo $items['placename'] ?></p>
                         <p>Average Review: <?php
                         $placee=$items['placeid'];
                         $sqll = "SELECT AVG(star) AS two FROM reviews WHERE placeid='$placee'";
                         $lol = mysqli_query($con, $sqll);
                         $row=mysqli_fetch_array($lol);
                         $p=$row['two'];
                         ?><?= $p ?>/5</p>
                     
                    </div>
                </div>
                </div>
                </a>   
                  <?php
                }
              }
              else
              {
                ?>
                <h1>NO location FOUND</h1>
                <?php
              }
          ?>
        </div>
      </div>
    </div>
</body>
</html>