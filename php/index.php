<?php
session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $login=true;
}else{
  header("location: login.php");
}
    $showAlert  = false;    
    $showError = false;
    $userid=$_SESSION['userid'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db_connect.php";
        $message = $_POST["mes"];
      
            if(!empty($message)){
                $sql = "INSERT INTO `feeds` (`userid`, `message`, `day`) VALUES ('$userid', '$message', CURRENT_DATE)";
                $result = mysqli_query($con, $sql);
                $showAlert = "Your question is submitted";
            }else if(empty($message)){
                $showError = "empty messege";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <title>LocatoR</title>
</head>

<body>
    <nav class="navbar">
        <div class="container flex">
            <div class="left">
                <a href="../php/index.php"><img src="../images/img.jpg" alt="" srcset="" /></a>
            </div>

            <div class="right">
                <ul class="flex">
                    <li id="home">Home</li>
                    <li id="services">
                        Services
                        <div class="dropdown">
                            <a href="../html/suggestion.php">Suggest Place</a>
                            <a href="../html/admin.php">Admin</a>
                            <a href="../html/feedback.php">Feedback</a>
                        </div>
                    </li>
                    <li id="about" data-open="#aboutContent">About</li>
                    <li id="support" data-open="#supportContent">Support</li>
                    <li id="contact" data-open="#contactContent">Contact</li>
                </ul>
            </div>
        </div>
        <div id="theSwitch">
            <div class="switchContainer">
                <input type="checkbox" class="checkbox" id="checkbox" />
                <label class="switch" for="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
            <p class="component-title">Logged Out</p>
        </div>
    </nav>

    <div id="pop1">
        <div id="aboutContent" class="pop">
            <h2 style="
            text-align: center;
            font-weight: 500;
            margin-bottom: 5px;
            border-bottom: 1px solid black;
          ">
                About LocatoR
            </h2>
            <div class="aboutInsideContent">
                <!-- <i class="fa-regular fa-circle-xmark fa-lg closeBtn" data-close></i> -->
                <p>Created On: 1st May - 18th May <br /></p>
                <p>
                    Team Members: <br />
                    <a href="">Ram</a>,
                    <a href="">Shyam</a>
                    <a href="">Hari</a>
                </p>
            </div>
        </div>
        <div id="overlay" class="pop"></div>
    </div>

    <div id="pop2">
        <div id="supportContent" class="pop">
            <h2 style="
            font-weight: 500;
            margin-bottom: 5px;
            border-bottom: 1px solid black;
          ">
                Support Center
            </h2>
            <!-- <i class="fa-regular fa-circle-xmark fa-lg closeBtn" data-close></i> -->
            <div class="supportInsideContent">
                <img id="supportImg" src="../images/support_100.jpg" alt="" />
                <p>
                    Leave us your queries below <br />
                    <form action="" method="post">
                        <input type="text" id="mes" name="mes">
                        <button type="submit">SEND</button>
                    </form>
                </p>
                <p>We will be happy to help you.</p>
            </div>
        </div>
        <div id="overlay" class="pop"></div>
    </div>

    <div id="pop3">
        <div id="contactContent" class="pop">
            <h2 style="
            font-weight: 500;
            margin-bottom: 5px;
            border-bottom: 1px solid black;
          ">
                Contact
            </h2>
            <!-- <i class="fa-regular fa-circle-xmark fa-lg closeBtn" data-close></i> -->
            <div class="contactInsideContent">
                <p>
                    <!-- <i class="fa fa-location-dot"></i> -->

                    Address: <br />
                    Kirtipur-05, Kathmandu, Nepal <br />
                </p>
                <p>
                    <!-- <i class="fa fa-phone"></i> -->
                    Phone: <br />
                    +977-9840510225 <br />
                    +977-9840510225 <br />
                    +977-9840510225 <br />
                </p>
                <p>
                    <!-- <i class="fa fa-envelope"></i> -->
                    Email: <br />
                    <a href="">fulmaya@gmail.com</a> <br />
                    <a href="">fulmaya@gmail.com</a> <br />
                    <a href="">fulmaya@gmail.com</a> <br />
                </p>
                <div class="connect">
                    Connect with us:<br />
                    <!-- <a href=""><i class="fa-brands fa-facebook fa-lg" style="padding: 2px 5px; color: black"></i></a> -->
                    <!-- <a href=""><i class="fa-brands fa-twitter fa-lg" style="padding: 2px 5px; color: black"></i></a> -->
                    <!-- <a href=""><i class="fa-brands fa-linkedin fa-lg" style="padding: 2px 5px; color: black"></i></a> -->
                </div>
            </div>
        </div>
        <div id="overlay" class="pop"></div>
    </div>

    <?php
        if($showAlert){
            echo '<div class="alert">'.$showAlert.'</div>';
        }else if($showError){
            echo '<div class="error">'.$showError.'</div>';
        }
        ?>
    <div class="container2">
        <div class="content1 border">
            <div class="hospitalImage">
                <img src="https://st2.depositphotos.com/4930557/11377/v/950/depositphotos_113778230-stock-illustration-kathmandu-durbar-square-nepal-sketch.jpg" alt="" srcset="" style="height: 400px" />
            </div>
            <div class="slogan border">
                <div class="text">
                <p style="font-size:40px">The future of travel starts now.</p>
                <p style="font-size:20px">Enhance your travel experience with us.</p>
                </div>
                <div class="btn"><button type="submit">Get Started</button></div>
            </div>
        </div>
    </div>

    <div class="container3 border">
        <!-- <p class="intro" style="font-weight: 500; font-size: 20px;">Introduction</p> -->
        <h2 class="intro" style="font-weight: 500">Introduction</h2>
        <p class="border">
        With tourism revenue in 2018 being accounted for 7.9% of our country’s GDP (Ranjit Sah, 2020)we can say that tourism is extremely popular and important in Nepal’s context. Project LocatoR is an application that focuses on making tourism more interesting and memorable. 
LocatoR is a short form for Location Review. As its name suggests, this application will consist of lots of places with detailed descriptions, pictures, and place reviews for users to choose from. User will also be able to select places according to categories, for example: Cultural heritage, religious sites, public attractions, parks etc. to make things easier. LocatoR will be a web-based application that lets its user have better experience with travelling.

        </p>
    </div>

    <div class="container4 border">

        <a href="event.php" style="text-decoration: none; color: black">
            <div class="minicontainer border">
                <!-- <i class="fa-solid fa-calendar-check fa-2xl"></i> -->
                <h3 style="font-weight: 500">Upcoming Events</h3>
                <p>
                    Be upto date with the upcoming events! choose if you want to go or not.
                </p>
            </div>
        </a>

        <a href="location.php" style="text-decoration: none; color: black">
            <div class="minicontainer border">
                <!-- <i class="fa-solid fa-user-doctor fa-2xl"></i> -->
                <h3 style="font-weight: 500">Top Locations</h3>
                <p>
                    These are our top locations with highest rating.
                </p>
            </div>
        </a>

        <a href="register.html" style="text-decoration: none; color: black">
            <div class="minicontainer border">
                <!-- <i class="fa-solid fa-pills fa-2xl"></i> -->
                <h3 style="font-weight: 500">Our Location</h3>
                <p>
                    visit us at our office.
                </p>
            </div>
        </a>
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

<script>
        const alert = document.querySelector(".alert");
        const error = document.querySelector(".error");
        setTimeout(() => {
            // alert.style.display = "none";
            error.style.display = "none";
        }, 3000);
        </script>
    <script src="../js/script.js"></script>
    <!-- <script src="https://kit.fontawesome.com/e87b42cfc1.js" crossorigin="anonymous"></script> -->
</body>

</html>