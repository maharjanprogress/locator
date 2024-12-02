<?php
session_start();
$_SESSION['place']="swayambhunath";
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
    <title>Swayambhunath</title>
  </head>
  <body>
    <div class="about">
      <h1>Swayambhunath</h1>
      <div class="main" style="text-align: center">
        <img src="../images/swayambhunath.jpg" alt="" />
      </div>
      <h3>Introduction</h3>
      <p>
        Swayambhu (Devanagari: स्वयम्भू स्तूप; Nepal bhasa: स्वयंभू; sometimes
        Swayambu or Swoyambhu) is an ancient religious complex atop a hill in
        the Kathmandu Valley, west of Kathmandu city. The Tibetan name for the
        site means 'Sublime Trees' (Wylie: Phags.pa Shing.kun), for the many
        varieties of trees found on the hill. However, Shingun may be of in
        Nepalbhasa name for the complex, Swayambhu, meaning 'self-sprung'. For
        the Buddhist Newars, in whose mythological history and origin myth as
        well as day-to-day religious practice Swayambhu occupies a central
        position, it is probably the most sacred among Buddhist pilgrimage
        sites. For Tibetans and followers of Tibetan Buddhism, it is second only
        to Boudha. Swayambhu is the Hindu name. The complex consists of a stupa,
        a variety of shrines and temples, some dating back to the Licchavi
        period. A Tibetan monastery, museum and library are more recent
        additions. The stupa has Buddha's eyes and eyebrows painted on. Between
        them, the number one (in Nepal script) is painted in the fashion of a
        nose. There are also shops, restaurants and hostels. The site has two
        access points: a long staircase leading directly to the main platform of
        the temple, which is from the top of the hill to the east; and a car
        road around the hill from the south leading to the south-west entrance.
        The first sight on reaching the top of the stairway is the Vajra.
        Tsultrim Allione describes the experience: We were breathless and
        sweating as we stumbled up the last steep steps and practically fell
        upon the biggest vajra (thunderbolt scepter) that I have ever seen.
        Behind this Vajra was the vast, round, white dome of the stupa, like a
        full solid skirt, at the top of which were two giant Buddha eyes wisely
        looking out over the peaceful valley which was just beginning to come
        alive. Much of Swayambhu's iconography comes from the Vajrayana
        tradition of Newar Buddhism. However, the complex is an important site
        for Buddhists of many schools, and is also revered by Hindus.
      </p>

      <h3>History</h3>
      <p>
        Swayambhu is among the oldest religious sites in Nepal. According to the
        Gopālarājavaṃśāvalī, it was founded by the great-grandfather of King
        Mānadeva (464–505 CE), King Vṛsadeva, about the beginning of the fifth
        century CE. This seems to be confirmed by a damaged stone inscription
        found at the site, which indicates that King Vrsadeva ordered work done
        in 640 CE. However, Emperor Ashoka is said to have visited the site in
        the third century BCE and built a temple on the hill which was later
        destroyed. Although the site is considered Buddhist, the place is
        revered by both Buddhists and Hindus. Numerous Hindu monarch followers
        are known to have paid their homage to the temple, including Pratap
        Malla, the powerful king of Kathmandu, who is responsible for the
        construction of the eastern stairway in the seventeenth century. The
        stupa was completely renovated in May 2010, its first major renovation
        since 1921 and its 15th in the nearly 1,500 years since it was built.
        The Swayambhu Shrine was re-gilded using 20 kg of gold. The renovation
        was funded by the Tibetan Nyingma Meditation Center of California, and
        began in June 2008. At around 5 a.m. on 14 February 2011, Pratapur
        Temple in the Swayambhu Monument Zone suffered damage from a lightning
        strike during a sudden thunderstorm. The Swayambunath complex suffered
        damage in the April 2015 Nepal earthquake.
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
