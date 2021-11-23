<?php 

// Connecting to the database (see Brigi or Dan for code)

// $db = mysqli_connect ('localhost', 'root', '', 'signup');

/*
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $db = new PDO("mysql:host=$servername; dbname=myDB", $username, $password);

        // PDO error mode to exception
        $conn -> setAttribute (PDO :: ATTR_ERRMODE, PDO :: ERROMODE_EXCEPTION);
        echo "Connected successfully";
        
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
 
*/

// declaring variables for submission
/*$username = "";
$email = "";
$errors = array();
*/

// if the signup submit button is clicked
/*
if (isset($_POST['signup'])) {
    
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password1 = mysql_real_escape_string($_POST['password1']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    

    // making sure the fields are filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }

    // No errors, save user to database
    /*
    if (count($errors) ==0) {
        $sql = "INSERT INTO user (username, email, password)
                VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);
    }
    
}
*/


?>