<?php
session_start();
$_SESSION['place']="PatanDarbar";
$laal=$_SESSION['place'];
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
$showAlert  = false;
$showError = false;
include "../php/db_connect.php";
$sqle = "SELECT * FROM place WHERE placename like '$laal'";
$lol = mysqli_query($con, $sqle);
$row=mysqli_fetch_array($lol);
$placeid=$row['placeid'];
$userid=$_SESSION['userid'];
if(isset($_POST['rating_value'])){

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}




    $rating_value = $_POST['rating_value'];
    $userMessage = $_POST['userMessage'];
    
$sql = "INSERT INTO `reviews` (`userid`, `placeid`, `star`,`description`,`day`) VALUES ('$userid', '$placeid', '$rating_value','$userMessage',CURRENT_DATE)";




if (mysqli_query($con, $sql)) {
    $showAlert = "added up successfully.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/content.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
      
    />
    <link rel="stylesheet" href="../css/get-started.css" />
    <title>Patan Durbar Square</title>
  </head>
  <body>
    <div class="about">
      <h1>Patan Durbar Square</h1>
      <div class="main" style="text-align: center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.77222525929!2d85.3253211!3d27.6726981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c50daa2fb1%3A0x6f197fa38097b530!2sPatan%20Darbar%20Square!5e0!3m2!1sen!2snp!4v1695832542360!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <h3>Introduction</h3>
      <p>
      Patan Durbar Square is situated at the centre of the city of Lalitpur in Nepal. It is one of the three Durbar Squares in the Kathmandu Valley, all of which are UNESCO World Heritage Sites. One of its attractions is the medieval royal palace where the Malla Kings of Lalitpur resided.

The Durbar Square is a marvel of Newar architecture. The square floor is tiled with red bricks. There are many temples and statues in the area. The main temples are aligned opposite of the western face of the palace. The entrance of the temples faces east, towards the palace. There is also a bell situated in the alignment beside the main temples. The Square also holds old Newari residential houses. There are other temples and structures in and around Patan Durbar Square built by the Newa People. A center of both Hinduism and Buddhism, Patan Durbar Square has 136 "bahals" (courtyards) and 55 major temples.

The square was heavily damaged by the earthquake in April 2015.
      </p>
      <div class="main" style="text-align: center">
        <img src="patandarbar.png" alt="" />
      </div>
      <h3>History</h3>
      <p>
      The history of Durbar Square is not clear. Although the Malla Kings of Lalitpur are credited with the establishment of the royal square, it is known that the site is an ancient crossroad. The Pradhanas, who settled around the site before the Mallas, have connections with the Durbar Square. Some chronicles hint that the Thakuri dynasty built a palace and made reforms to the locality, but there is little evidence of this. Scholars are certain that Patan was a prosperous city since ancient times.

The Malla Kings made important changes to the square. Most of the current architecture is from the 1600s, constructed during the reign of King Siddhi Narsingh Malla and his son Srinivasa Sukriti. Some of the notable Malla Kings who improved the square include Purandarasimha, Sivasimha Malla and Yoganarendra Malla.
      </p>
    </div>
    <?php require '../components/starr.html'?>
    <script>
        const alert = document.querySelector(".alert");
        const error = document.querySelector(".error");
        setTimeout(() => {
            alert.style.display = "none";
            error.style.display = "none";
        }, 3000);
    </script>
  </body>
</html>
