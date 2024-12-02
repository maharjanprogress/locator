<?php
session_start();
$_SESSION['place']="asan";
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
    <title>Document</title>
  </head>
  <body>
    <div class="about">
      <h1>Kirtipur</h1>
      <div class="main" style="text-align: center">
        <img src="../images/asan.jpg" alt="" />
      </div>
      <h3>Introduction</h3>
      <p>
        Kirtipur (Nepali: कीर्तिपुर; Nepal Bhasa: किपूKipoo) is a Municipality
        and an ancient city of Nepal. The Newars are the natives of Kipoo
        (Kirtipur) that is believed to be derived from Kirati King Yalamber. It
        is located in the Kathmandu Valley 5 km south-west of the city of
        Kathmandu. It is one of the five dense municipalities in the valley, the
        others being Kathmandu, Lalitpur, Bhaktapur and MadhyapurThimi. It is
        one of the most famous and religious places to visit[clarification
        needed]. Many people visit this place not only for its natural
        environment but also to visit temples. The city was listed as a UNESCO
        tentative site in 2008.
      </p>
      <h3>History</h3>
      <p>
        Kirtipur's history dates from 1099 A.D. It was part of the territory of
        Lalitpur at the time of the invasion of the Kathmandu Valley by the
        Gorkhali king Prithvi Narayan Shah in the 18th century. In 1767,
        Kirtipur was annexed to the Gorkhali kingdom by Prithvi Narayan Shah
        following the Battle of Kirtipur. He conquered the town on his third
        attempt, after entering it by trickery. After this, he cut off the noses
        of the people (both male and female) over 13 years of age in the
        city.[9][10] This was the site of an inspirational peaceful
        demonstration of the people in the 2006 mass uprising that overthrew the
        powers of the king. It is considered to be an anti-monarchy city due to
        its bitter history against the Shah dynasty whose modern founder
        conquered the city insultingly, which was followed by negligence of the
        administration and development by subsequent rulers.
      </p>
      <h3>Places of Interest</h3>
      <img
        class="int"
        src="../reseach/Bagh_Bhairab_Kritipur_IMG_8037_03.jpg"
        alt=""
      />
      <p>
        Bagh Bhairab Temple is one of the most popular temples dedicated to the
        god Bhairab in the form of an angry tiger. This god is regarded as the
        guardian of Kirtipur and the locals call it Ajudeu, a grandfather god.
        Bhairab, the most terrifying and awful form of Shiva, is the destroyer
        on one hand and the guardian on the other. Ceremonial rituals in
        relation to the important events of life such as rice-feeding, puberty,
        marriage and even the construction of houses cannot be done without
        propitiating this deity in most of the towns and cities of Nepal. Bagh
        Bhairab is mainly worshiped by the MunsiNewars (Man Singh Pradhan). Each
        of the male family members, on a yearly basis, are supposed to take the
        chest of Bagh Bhairab turn by turn and keep it in a secret room and
        worship it twice a day. It is believed that any wrong method applying
        for worship might curse the individual. Denial for taking the chest home
        accounts for a fine equivalent to US$2000.
      </p>
      <br />
      <p>
        The present three storeyed temple of Bagh Bhairab, probably built in the
        16th century, stands in the brick-paved rectangular courtyard with rest
        houses around it. Some small shrines and stone idols are spread over the
        courtyard. The main gate is at the southern side of the courtyard. There
        are two other gates on the eastern and western sides. The two roofs of
        the temple are made of tiles while the third is covered with gilt
        copper. Wooden posts with the carving of Hindu gods and goddesses adorn
        the temple in addition to supporting its roof. They have been installed
        in between windows of the second storey, and the names of the carved
        deities have been finely cut out below them on the pedestals. There are
        eighteen pinnacles: one on the first roof, six on the middle and eleven
        on the top. Beneath the eaves of the first roof there are very old but
        faded murals depicting the stories of Ramayan. Maha Bharat and the
        various manifestations of Durga, the mighty goddess. These paintings are
        frescoes in red with white plaster background. At the right side of the
        main gate of the temple there is HifaDyo, the god of blood sacrifice is
        allowed directly to Bagh Bhairab, all animal offerings here are made to
        this deity just like the animal sacrifices are made to Kumari, a stone
        idol, placed at the second gate in the left side of Chandeswori in
        Banepa and to the Chhetrapal which is at the very beginning of the final
        series of the steps to the temple of Khadga Jogini in Sankhu.
      </p>
      <br />
      <p>
        There are two torans over HifaDyo. They bear very fine cuttings of
        Asta-Matriks, Asta-Bhairabs and other gods and goddesses. In the western
        wall of the temple there is a hollow space regarded by the local people
        as Nasa Dyo, the god of music and dance. Bagh Bhairab made of clay has
        been enshrined in the left side corner in the temple. The three
        glass-eyed tiger-god is tongue-less and tooth-less but covered with
        silver and copper plates and heavily ornamented. This deity as mentioned
        in the stone inscriptions has been called Bagheswor (the tiger god),
        BhimsenBhattarak(Bhimsen, the governing deity), GudeiSthanadhipati (the
        lord in the form of tiger) and Ajudyo(the ancestral god). The local
        people regard this deity as the embodiment of prudence, knowledge,
        productivity and strength to resist all evils. Hence, the auspicious
        ceremonies such as weddings, Bratabandha (rite of passage for adolescent
        boys), Pasni (rice-feeding) and other ritual performances in Kirtipur
        are done only after a ceremonial worship to this deity.
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
