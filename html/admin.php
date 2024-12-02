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
        <h2 style="font-weight: 500">Our Admins</h2>
      </div>
      <div class="a_body">
        <div class="docList">
          <div class="doc" id="doc">
            <div class="docImg" id="image">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeLJnzgcw-0NEcuH0joPa1I_-MCWg-yJ_v1FrDzT8&s"
                alt=""
              />
            </div>
            <div class="docInfo">
              <h3 id="name">Progress Maharjan</h3>
              <p class="edu">BE Computer</p>
              <p class="speciality">Product Manager</p>
              <p class="experience">5+ years of experience</p>
              <p class="availability">9:00 AM to 5:00 PM (Tue,Thu)</p>
            </div>
            <div class="book"><a href="https://www.facebook.com/profile.php?id=100009209997986"><button>Request Assistance</button></a></div>
          </div>
          <div class="doc" id="doc">
            <div class="docImg" id="image">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeLJnzgcw-0NEcuH0joPa1I_-MCWg-yJ_v1FrDzT8&s"
                alt=""
              />
            </div>
            <div class="docInfo">
              <h3 id="name">Sujal Khatri</h3>
              <p class="edu">BCA</p>
              <p class="speciality">CEO</p>
              <p class="experience">10+ years of experience</p>
              <p class="availability">9:00 AM to 5:00 PM (Tue,Thu)</p>
            </div>
            <div class="book"><a href="https://www.facebook.com/Suzal.Khatri01"><button>Request Assistance</button></a></div>
          </div>

          <div class="doc">
            <div class="docImg" id="image">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeLJnzgcw-0NEcuH0joPa1I_-MCWg-yJ_v1FrDzT8&s"
                alt=""
              />
            </div>
            <div class="docInfo">
              <h3 id="name">Sujal Maharjan</h3>
              <p class="edu">BIT</p>
              <p class="speciality">Developer</p>
              <p class="experience">20+ years of experience</p>
              <p class="availability">9:00 AM to 5:00 PM (Tue,Thu)</p>
            </div>
            <div class="book"><a href="https://www.facebook.com/unikch.maharjan.7"><button>Request Assistance</button></a></div>
          </div>
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
