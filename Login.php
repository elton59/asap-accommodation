<!DOCTYPE html>
<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "asap";

$mysqli = new mysqli($servername, $username, $password, $db) or die($mysqli->error);
if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['pass']);

    if (empty($username) || empty($password)) {
        echo '<script>alert("Username and password cannot be empty");</script>';
    } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format");</script>';
    } else {
        $sql = "SELECT * FROM customers WHERE email = ? AND password = ? AND status = 'approved' LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            echo '<script>alert("Login success");
                    window.location.replace("index.php");
                </script>';
            exit();
        } else {
            echo '<script>alert("Login failed");
                    window.location.replace("index.php");
                </script>';
            exit();
        }
    }
}
?>
<html lang="en">
<head>
    <title>Welcome To ASAP Accomodation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./Login/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="./Login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="./Login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./Login/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="./Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="./Login/css/main.css">
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["pass"].value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            if (email == "" || password == "") {
                alert("Username and password cannot be empty");
                return false;
            }

            if (!emailPattern.test(email)) {
                alert("Invalid email format");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form name="loginForm" class="login100-form validate-form" method="POST" onsubmit="return validateForm()">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="username" placeholder="Type your email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn" name="login">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            <a href="signup.php" style="color:blue">Click here to create account</a>
                        </span>
                        <br/>
                        <span>
                            Follow us on:
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Or Sign Up Using
                        </span>

                        <a href="signup.php" class="txt2">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <script src="./Login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./Login/vendor/animsition/js/animsition.min.js"></script>
    <script src="./Login/vendor/bootstrap/js/popper.js"></script>
    <script src="./Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./Login/vendor/select2/select2.min.js"></script>
    <script src="./Login/vendor/daterangepicker/moment.min.js"></script>
    <script src="./Login/vendor/daterangepicker/daterangepicker.js"></script>    
    <script src="./Login/vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
