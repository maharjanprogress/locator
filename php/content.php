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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <!-- <link rel="stylesheet" href="../css/style2.css" /> -->
    <link rel="stylesheet" href="../css/get-started.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <title>LocatoR - Recommendations</title>
</head>

<body style="overflow-y: scroll">
    <?php require '../components/nav.html' ?>

    <div class="content">
        <form method="GET">
          <div class="top">
              <input type="text" name="search" value="<?php if(isset($_GET["search"])){echo $_GET["search"];}?>" placeholder="search location" action="" required>
              <button type="submit" id="popupButton" style="color:red" data-open="#searchBox">Search</button>
          </div>
        </form>
    </div>

    <div>
          <?php
            include "db_connect.php";
            if(isset($_GET['search']))
            {
              $filtervalues = $_GET['search'];
              $query = "SELECT * FROM place where placename LIKE '%$filtervalues%'";
              $result = mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0)
              {
                foreach($result as $items)
                {
                  ?>
                  <div class="destinations">
                      <a href=<?= $items['html']?> target="_blank">
                       <div class="content-image">
                         <img src=<?= $items['pic']?> alt="<?= $items['placename']?>">
                      </div>
                      <div class="text">
                         <h3><?= $items['placename']?></h3>
                         <p>here you can find brief introduction on <?php echo $items['placename'] ?></p>
                         <p>Average Review: <?php
                         $placee=$items['placeid'];
                         $sqll = "SELECT AVG(star) AS two FROM reviews WHERE placeid='$placee'";
                         $lol = mysqli_query($con, $sqll);
                         $row=mysqli_fetch_array($lol);
                         $p=$row['two'];
                         ?><?= $p ?>/5</p>
                     </a>
                    </div>    
                  </div>
                  <?php
                }
              }
              else
              {
                ?>
                <h1>NO RECORD FOUND</h1>
                <?php
              }
            }
          ?>
    </div>
    <div class="content">
        <h2>Recommendations</h2>
    </div>
    <div class="destinations">
                <a href="../placeht/kirtipur.php" target="_blank">
                <div class="content-image">
                    <img src="../images/Kirtipur.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Kirtipur</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, dignissimos doloremque nesciunt cupiditate in accusamus vel exercitationem aperiam numquam aliquid!</p>
                </a>
                </div>    
        </div>

    <div class="destinations">
                <a href="../placeht/kirtipur.php" target="_blank">
                <div class="content-image">
                    <img src="../images/kds.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Kathmandu Durbar Square</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, dignissimos doloremque nesciunt cupiditate in accusamus vel exercitationem aperiam numquam aliquid!</p>
                </a>
                </div>    
        </div>

    <div class="destinations">
                <a href="../placeht/kirtipur.php" target="_blank">
                <div class="content-image">
                    <img src="../images/asan.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Asan</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, dignissimos doloremque nesciunt cupiditate in accusamus vel exercitationem aperiam numquam aliquid!</p>
                </a>
                </div>    
        </div>
    <script src="../js/script2.js"></script>
</body>

</html>