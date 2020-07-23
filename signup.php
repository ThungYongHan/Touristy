<!-- turn off error reporting so that undefined index:username error will not pop up -->
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<?php
include('server.php');
require_once "config.php";
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>

<?php
// if no user is logged in (username session is empty)
if (empty($user)) {
    // use a different header (without profile, welcome message and log out)
    include('C:\xampp\htdocs\Penang\Touristy\Touristy\notloggedheader.php');
}
?>

<!-- font icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/navstyle.css">
</head>

<title>Sign Up Page</title>
<body>
    <div class="main"> 
    <script>
        function term_confirm(termCheckBox){
            // if terms of service checkbox is checked
            if(termCheckBox.checked){        
                // register button set to not disabled
                document.getElementById("signup").disabled = false;
            }
            else{
                // register button set to disabled
                document.getElementById("signup").disabled = true;
            }
        }
    </script>
        
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <!-- user sign up form -->
                        <form method="POST" class="register-form" id="register-form" name="register-form" action="signup.php">
                            <!-- errors.php to print out error messages if there is any -->
                            <?php include('errors.php');?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirm" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <!-- terms and conditions checkbox to enable the register button-->
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" onchange="term_confirm(this)"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree with all statements in Terms of service</a></label>
                            </div> 
                            <div class="form-group form-button">
                                <input type="submit" name="register_user" id="signup" disabled class="btn btn-lg btn-primary" value="Register"/>
                            </div>
                        </form>
                    </div>

                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sign up image"></figure>
                        <!-- link to send user to login page -->
                        <a href="http://localhost:8080/Penang/LoginSignUp/LoginSignUp/login.php" class="signup-image-link">I am already member</a>
                    </div>

                </div>
            </div>
       
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>