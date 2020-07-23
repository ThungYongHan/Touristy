<!-- turn off error reporting so that undefined index:username error and session has already started error will not pop up -->
<?php error_reporting(0); ?>

<?php include('server.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penang";

// start new or resume existing session
session_start();

// call current session's username(logged in user)
$user = $_SESSION['username'];
// connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
// code to detect if a user is already logged in, and if they are, redirect them back to the index page
if (isset($user)) {
    echo "<script type='text/javascript'>
            alert('You are already logged in! Redirecting you back to homepage in 1 second!');
        </script>";
    // refresh in 0.1 seconds to index.php
    header('Refresh:0.1; url=http://localhost:8080/Penang\Touristy\Touristy\index.php');
}

// close connection to database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
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

<title>Login Page</title>
<body>
    <div class="main">
        <!-- log in form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign in image"></figure>
                        <a href="http://localhost:8080/Penang/LoginSignUp/LoginSignUp/signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <!-- user login form -->
                        <form method="POST" class="register-form" id="login-form" action="login.php">
                            <!-- errors.php to print out error messages if there is any -->
                            <?php include('errors.php');?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login_user" id="signin" class="btn btn-lg btn-primary" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>