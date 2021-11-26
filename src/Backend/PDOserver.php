<?php 
session_start();

// declaring variables for submission
$username = "";
$email = "";
$errors = array();

// declaring variables for db connection
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";

// Connecting to the database
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    //$db = new PDO ()
    // set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    /*
    $statement = $connect->prepare("SELECT login, :email, password FROM getflix.users");
    $statement->execute();
    $user = $statement->fetch();*/
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

// if the signup submit button is clicked
    if (isset($_POST['signup'])) {
        // Protection against MySQL injection
        /*
        $username = stripslashes($username);
        $email = stripslashes($email);
        $password = stripslashes($password);
        */

        $username = strip_tags($_REQUEST['username']);
        $email = strip_tags($_REQUEST['email']);
        $password1 = strip_tags($_REQUEST['password1']);
        $password2 = strip_tags($_REQUEST['password2']);
        
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

        // mysqli
        /*
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
        */

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

        $username = strip_tags($_REQUEST['userinfo']);
        $email = strip_tags($_REQUEST['userinfo']);
        $password = strip_tags($_REQUEST['password']);
        //$hash_encrypt = password_hash($password, PASSWORD_DEFAULT);

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
        // if (count($errors) == 0)
        else {
            try {
                $select_stmt = $db->prepare("SELECT * FROM users WHERE login=:uname OR email=:uemail");

                $select_stmt->execute(array('uname'=>$username, 'uemail'=>$email));

                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if($select_stmt->rowCount() > 0) {
                    if ($username == $row['username'] OR $email == $row['email']) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['login'] = $username;
                            $_SESSION['success'] = "Welcome back $username! Ready to chill ?";
                            header('location: ../Frontend/test.php');
                        }
                        else {
                            array_push($errors, "Wrong user / password combo.");
                        }
                    }
                }

            } catch (PDOException $e) {
                echo "Data retrieval failed : " . $e->getMessage();
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