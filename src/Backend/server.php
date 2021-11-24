<?php 
session_start();

// declaring variables for submission
$username = "";
$email = "";
$errors = array();

// Connecting to the database
//$mysqli = new mysqli("127.0.0.1", "root", "root", "getflix-database");
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');

    // if the signup submit button is clicked
    
    if (isset($_POST['signup'])) {
        // Protection against MySQL injection
        /*
        $username = stripslashes($username);
        $email = stripslashes($email);
        $password = stripslashes($password);
        */
        /*
        $email = test_input($_POST["email"]);
        if (strlen($email) > 255) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                }
        } else {
            echo "Invalid email";
        }
        */
        
        
        // Which syntax do we keep ? This...
        $username = mysqli_real_escape_string($database, $_POST['username']);
        $email = mysqli_real_escape_string($database, $_POST['email']);
        $password1 = mysqli_real_escape_string($database, $_POST['password1']);
        $password2 = mysqli_real_escape_string($database, $_POST['password2']);
        
        // ... or this?
        /*
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2']; 
        */

        // making sure the fields are filled out
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

        // checking database for existing user information
        /*
        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $result = mysqli_query($database, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Username is taken");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Email is already registered");
            }
        }
        */

        // No errors, save user to database
        if (count($errors) == 0) {
            $password = md5($password1); //password encryption before storage
            $sql = "INSERT INTO getflix.user (username, email, password) VALUES ('$username', '$email', '$password')";
            
            // Will need to "convert" to PDO syntax
            mysqli_query($database, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in !";
            header('location: ../Frontend/main.php'); //redirect to main
        }
    }
    


    // Log user from login page (priority for today, 24/11 !!!)
    if (isset($_POST['login'])) {
        $userinfo = mysqli_real_escape_string($database, $_POST['userinfo']);
        $password = mysqli_real_escape_string($database, $_POST['password']);

        // ensure the fields are filled properly
        if (empty($userinfo)) {
        array_push($errors, "Username / email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if(count($errors) == 0) {
            $password = md5($password); // encrypt password before comparing it with the database

            $query = "SELECT * FROM getflix.users WHERE login='$userinfo' AND email='$userinfo' AND password='$password'";

            $results = mysqli_query($database, $query);
            if (mysqli_num_rows($results) == 1) {
                // log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Welcome back !";
                header('location: ../Frontend/main.php');
            } else {
                array_push($errors, "Wrong user / password combo.");
            }
        }
    }
    
// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

/*
function openConnection() { 
    $dbhost = "database"; 
    $dbuser = "root";
    $dbpass = "getflixRoot";
    $db = "getflix";
    //do we need the charset?

    try {
        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        //echo "Connected";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed : " . $e->getMessage();
    }
}
*/

    // When entering the user information
    /*
    if (isset($_POST['userinfo']) && isset($_POST['password'])) {
        $pdo = openConnection();
        $username = $_POST['userinfo'];
        //$email = $_POST['email'];
        $password = $_POST['password'];
        //selecting field to query (login/email)
        if (strpos($username, "@")) {
            $login ="SELECT * FROM users WHERE email = $username AND password = $password;";
        } else {
            $login = "SELECT * FROM users WHERE login = 'Dan-DH' AND password = 'holaworld'";
        };
        $t = $pdo->query($login)->fetchAll();
    }
    */

?>