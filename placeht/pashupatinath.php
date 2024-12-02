<?php
session_start();
$_SESSION['place']="pashupatinath";
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
    <title>Pahupatinath</title>
  </head>
  <body>
    <div class="about">
      <h1>Pashupatinath</h1>
      <div class="main" style="text-align: center">
        <img src="../images/pashupatinath.jpg" alt="" />
      </div>
      <h3>Introduction</h3>
      <p>
      <?php echo $_SESSION['place'] ?>
        Pashupatinath Temple (Nepali: श्री पशुपतिनाथ मन्दिर) is a Hindu temple
        dedicated to Lord Pashupati, and is located in Kathmandu, Nepal near the
        Bagmati River. This is currently the largest temple in the world as well
        as one of the Oldest Temple. This temple was classified as a World
        Heritage Site in 1979. This "extensive Hindu temple precinct" is a
        "sprawling collection of temples, ashrams, images and inscriptions
        raised over the centuries along the banks of the sacred Bagmati river",
        and is one of seven monument groups in UNESCO's designation of Kathmandu
        Valley. It is built on an area of 246 hectares (2,460,000 m2) and
        includes 518 mini-temples[citation needed] and a main pagoda house. The
        temple is one of the Paadal Petra Sthalams on the continent.
      </p>
      <h3>History</h3>
      <p>
        The exact date of the temple's construction is uncertain, but the
        current form of the temple was constructed in 1692 CE. Over time, many
        more temples have been erected around the two-storied temple, including
        the Vaishnava temple complex with a Rama temple from the 14th century
        and the Guhyeshwari Temple mentioned in an 11th-century manuscript.
        Pashupatinath Temple is the oldest Hindu temple in Kathmandu. It is not
        known for certain when Pashupatinath Temple was built. But according to
        Nepal Mahatmaya and Himvatkhanda, the deity here gained great fame there
        as Pashupati. Pashupatinath Temple's existence is recorded as early as
        400 CE. The ornamented pagoda houses the linga of Shiva. There are many
        legends describing how the temple of Aalok Pashupatinath came into
        existence here. One legend says that Shiva and Parvati took the form of
        antelopes in the forest on the Bagmati river's east bank. The gods later
        caught up with him and grabbed him by one of his horns, forcing him to
        resume his divine form. The broken horn was worshipped as a linga, but
        over time it was buried and lost. Centuries later a herdsman found one
        of his cows showering the earth with milk, and after digging at the
        site, he discovered the divine linga of Pashupatinath. According to
        Gopalraj Aalok Vhat, the temple was built by Prachanda Deva, a Licchavi
        king. Another chronicle states that Pashupatinath Temple was in the form
        of Linga shaped Devalaya before Supuspa Deva constructed a five-storey
        temple of Pashupatinath in this place. As time passed, the temple needed
        to be repaired and renovated. It is known that this temple was
        reconstructed by a medieval king named Shivadeva (1099–1126 CE). It was
        renovated by Ananta Malla adding a roof to it. The main temple complex
        of Pashupatinath and the sanctum sanctorum was left untouched, but some
        of the outer buildings in the complex were damaged by the April 2015
        Nepal earthquake.
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
