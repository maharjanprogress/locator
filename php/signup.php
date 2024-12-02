    <?php
    $showAlert  = false;    
    $showError = false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db_connect.php";
        $email = $_POST["em"];
        $password = $_POST["pw"];
        $cpassword = $_POST["cpw"];
        $username=$_POST["un"];
        $district=$_POST["dis"];
 
      
            if(!empty($password) && !empty($email) && !empty($username) && $password == $cpassword){
                $sql = "INSERT INTO `users` (`username`,`district`, `email`, `password`) VALUES ('$username','$district' ,'$email', '$password')";
                $result = mysqli_query($con, $sql);
                $showAlert = "Signed up successfully.";
            }else if(empty($username) || empty($password) || empty($district) || empty($cpassword) || empty($email)){
                $showError = "Please fill out all the fields";
            }else if($password != $cpassword){
                $showError = "Passwords do not match";
            }
        }      
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style3.css">
        <title>LocatoR - Signup</title>
    </head>

    <body>
        <?php require '../components/nav-mod.html' ?>
        <?php
        if($showAlert){
            echo '<div class="alert">'.$showAlert.'<a href="login.php"> Login here</a></div>';
        }else if($showError){
            echo '<div class="error">'.$showError.'</div>';
        }
        ?>

            <div class="main" style="overflow-y:hidden">
            <form id="signup" method="post" action="signup.php">
                <div id="top">
                    <h3 style="font-weight:500">Signup</h3>
                </div>

                <div id="bod">
                    <div class="inp">
                        <label for="un">Username</label> <br>
                        <input type="text" name="un" id="un">
                    </div>
                    <div class="inp">
                        <label for="dis">District</label> <br>
                        <input type="text" name="dis" id="dis">
                    </div>
                    <div class="inp">
                        <label for="um">Email:</label> <br>
                        <input type="email" name="em" id="em">
                    </div>

                    <div class="inp">
                        <label for="pw">Password:</label> <br>
                        <input type="password" name="pw" id="pw">
                    </div>

                    <div class="inp">
                        <label for="cpw">Confirm Password:</label> <br>
                        <input type="password" name="cpw" id="cpw">
                    </div>
                    <button type="submit" name="submit" id="submit">Signup</button>
                    <p style="margin-top:10px;font-weight:400;text-align:center" class="inp">
                        Already have an account?
                        <a href="login.php">Login</a>
                    </p>
                </div>
            </form>
        </div>


        <script>
        const alert = document.querySelector(".alert");
        const error = document.querySelector(".error");
        setTimeout(() => {
            // alert.style.display = "none";
            error.style.display = "none";
        }, 3000);
        </script>

        <body>

    </html>