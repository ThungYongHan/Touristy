<?php
    // start new or resume existing session
    session_start();

    // variable declaration
    $username = "";
    $email    = "";
    $errors = array();

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'penang');
    
    // if user clicked "Register" at signup.php
    if (isset($_POST['register_user'])) {
        $usercheck = $_POST['username'];
        $emailcheck = $_POST['email'];
        // receive all input values from the form
        // mysqli_real_escape_string() escapes special characters in a string for use in an SQL query, used to create a legal SQL string that can be used in an SQL statement
        $username = mysqli_real_escape_string($db, $usercheck);
        $email = mysqli_real_escape_string($db, $emailcheck);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_confirm = mysqli_real_escape_string($db, $_POST['password_confirm']);

        // form validation: ensure that all fields of the sign up form are filled
        if (empty($username)) {
            // array_push to push error message onto the end of $errors array
            array_push($errors, "Username field cannot be empty!");
        }
        if (empty($email)) {
            array_push($errors, "Email address field cannot be empty!");
        }
        if (empty($password)) {
            array_push($errors, "Password field cannot be empty!");
        }
        if (empty($password_confirm)) {
            array_push($errors, "Confirmation password cannot be empty!");
        }
        if ($password != $password_confirm) {
            array_push($errors, "Password and confirmation password do not match!");
        }
        
        // check if the newly submitted register username matches any username in the "username" column of the "Users" table.
        $sql_username = "SELECT * FROM Users WHERE username='$usercheck'";
        $res_username = mysqli_query($db, $sql_username);
        // if the newly submitted register username matches any username in the "username" column of the "Users" table.
        if (mysqli_num_rows($res_username) > 0) {                     
            array_push($errors, "Username already taken!");
        }

        // check if the newly submitted register email address matches any email address in the "email" column of the "Users" table.
        $sql_email = "SELECT * FROM Users WHERE email='$email'";
        $res_email = mysqli_query($db, $sql_email);
        // if the newly submitted register email address matches any email address in the "email" column of the "Users" table.
        if (mysqli_num_rows($res_email) > 0) {
            array_push($errors, "Email address already taken!");
        }
        
        // register user if $errors array is empty (no errors detected)
        if (count($errors) == 0) {
            // encrypt the password before saving in the database
            $password = md5($password);
            // insert register user data into "Users" table
            $query = "INSERT INTO Users (username, email, password) 
                      VALUES('$username', '$email', '$password')";

            // if insertion of register user data into "Users" table is successful
            if ($db->query($query) === true) {
            } else {
                echo "Error registering user: " . $conn->error;
            }
            // store $username as username session variable to enable logging in function to access the website as logged in user
            $_SESSION['username'] = $username;
            // redirect to homepage
            header('location: http://localhost:8080\Penang\Touristy\Touristy\index.php');
        }
    }

    // if user clicked "Log in" at login.php
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // form validation: ensure that all fields of the log in form are filled
        if (empty($username)) {
            array_push($errors, "Username field cannot be empty!");
        }
        if (empty($password)) {
            array_push($errors, "Password field cannot be empty!");
        }

        // log in user if $errors array is not empty (no errors detected)
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            
            // if submitted login username and password matches one found in the database
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                header('Location: http://localhost:8080\Penang\Touristy\Touristy\index.php');
            } else {
                array_push($errors, "Invalid username and password combination!");
            }
        }
    }
