<?php 
session_start();

// declaring variables for submission
$username = "";
$email = "";
$errors = array();

// Connecting to the database
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');

    // if the signup submit button is clicked
    if (isset($_POST['signup'])) {
        // Protection against MySQL injection
        /*
        $username = stripslashes($username);
        $email = stripslashes($email);
        $password = stripslashes($password);
        */

        $username = mysqli_real_escape_string($database, $_POST['username']);
        $email = mysqli_real_escape_string($database, $_POST['email']);
        $password1 = mysqli_real_escape_string($database, $_POST['password1']);
        $password2 = mysqli_real_escape_string($database, $_POST['password2']);
        
        // making sure the fields are filled out
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Enter a valid email");
        }
        if (empty($password1)) {
            array_push($errors, "Password is required");
        }
        if ($password1 != $password2) {
            array_push($errors, "Passwords do not match");
        }

        // checking database for existing user information

        $user_check_query = "SELECT * FROM getflix.users WHERE login = '$username' OR email = '$email' LIMIT 1";
        $result = mysqli_query($database, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['login'] === $username) {
                array_push($errors, "Username is taken");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Email is already registered");
            }
        }

        // No errors, save user to database
        if (count($errors) == 0) {
            //$password = md5($password1); //password encryption before storage
            $password = $password1;
            $query = "INSERT INTO getflix.users (login, email, password) VALUES ('$username', '$email', '$password')";
            
            mysqli_query($database, $query);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in !";
            header('location: ../Frontend/test.php'); //redirect to main (test)
        }
    }
    
    // Log user from login page
    if (isset($_POST['login'])) {

        $username = mysqli_real_escape_string($database, $_POST['username']);
        $email = mysqli_real_escape_string($database, $_POST['username']);
        $password = mysqli_real_escape_string($database, $_POST['password']);

        // ensure the fields are filled properly
        if (empty($username)) {
        array_push($errors, "Username / email is required");
        }
        elseif (empty($email)) {
            array_push($errors, "Username / email is required");
            }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0){
            //$password = md5($password); // encrypt password before comparing it with the database

            $query = "SELECT * FROM getflix.users WHERE login='$username' AND password='$password'";

            $result = mysqli_query($database, $query);
            if (mysqli_num_rows($result) == 1) {
                // log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Welcome back $username! Ready to chill ?";
                header('location: ../Frontend/test.php');
            } else {
                array_push($errors, "Wrong user / password combo.");
            }
        }
    }
    
    // Logout
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('location: ../Frontend/login.php');
    }
?>