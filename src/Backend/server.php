<?php 
<<<<<<< HEAD
//session_start();
// Connecting to the database (see Brigi or Dan for code)
=======

function openConnection() { 
    $dbhost = "database"; 
    $dbuser = "root";
    $dbpass = "getflixRoot";
    $db = "getflix";
    //do we need the charset?
>>>>>>> 1aade3c4bf44c05b5d0aa760cf132f005ee92562

    try {
        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        //echo "Connected";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed : " . $e->getMessage();
    }
};

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

<<<<<<< HEAD
// declaring variables for submission
/*
$username = "";
$email = "";
$errors = array();
*/

// if the signup submit button is clicked
/*
if (isset($_POST['signup'])) {

    // Protection against MySQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password1 = mysql_real_escape_string($_POST['password1']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    
=======
    echo count($t) > 0 ? "Welcome back, {$t[0][2]}" : "Incorrect login credentials, please try again";
};

/* if ($password1 != $password2) { 
    echo "Passwords do not match";
    break;
}  */
>>>>>>> 1aade3c4bf44c05b5d0aa760cf132f005ee92562

/* $username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2']; */

/*     // making sure the fields are filled out
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
<<<<<<< HEAD
    }

    // checking database ofr existing user information
    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";

    $results = db_exec($db, $user_check_query);
    $user = db_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username is taken");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email is already registered");
        }
    }

=======
    } */
>>>>>>> 1aade3c4bf44c05b5d0aa760cf132f005ee92562
    // No errors, save user to database
    /*
    if (count($errors) == 0) {
        $sql = "INSERT INTO user (username, email, password)
                VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Welcome !;
        header('location: ../Frontend/main.php');
    }

    // Log user from login page
    if (isset($_POST['])) {
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);

        // ensure the fields are filled properly
        if (empty($username)) {
        array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if(count($errors) == 0) {
            $password = md5($password); // encrypt password before comparing it with the database
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) == 1) {
                // log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Welcome back !;
                header('location: ../Frontend/main.php');
            } else {
                array_push($errors, "Wrong username/password combo.")
            }
        }

    }
    

    // Logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../Frontend/login.php');
    }
}
*/
?>