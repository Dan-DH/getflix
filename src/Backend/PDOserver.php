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

///Connecting to the database///
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    // set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    /*
    $statement = $connect->prepare("SELECT login, :email, password FROM getflix.users");
    $statement->execute();
    $user = $statement->fetch();*/
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

/// Log user from login page///
    // if (isset($_POST['login'])) {

    //     if (isset($_SESSION['username'])) {
    //         header('location: test.php');
    //     }
        
    //     $username = strip_tags($_POST['userinfo']);
    //     $email = strip_tags($_POST['userinfo']);
    //     $password = strip_tags($_POST['password']);
    //     //$hash_encrypt = password_hash($password, PASSWORD_DEFAULT);

    //     // ensure the fields are filled properly :
    //     if (empty($username)) {
    //     array_push($errors, "Username / email is required");
    //     }
    //     /*elseif (empty($email)) {
    //         array_push($errors, "Username / email is required");
    //     }*/
    //     if (empty($password)) {
    //         array_push($errors, "Password is required");
    //     }

    //     // If information is correctly input :
    //     try {
    //         if (count($errors) == 0) {
    //             // select query
    //             $sql = "SELECT * FROM users WHERE (login='$username' OR email='$email') AND password='$password'";
    //             $result = $db->prepare($sql); 

    //             $result->execute();
    //             $row_count = $result->fetchColumn();
    //             //echo $row_count;

    //             if ($row_count > 0) {
    //                 //echo "some form of success";
    //                 // Logged in
    //                 $_SESSION['username'] = $username;
    //                 $_SESSION['success'] = "Welcome back $username! Ready to chill ?";
    //                 header('location: ../Frontend/test.php');
    //             }
    //             else {
    //                 array_push($errors, "Wrong user / password combo.");
    //             }
                
    //         } 
    //     } 
    //     catch (PDOException $e) {
    //         echo "Login failed : " . $e->getMessage();
    //     }
        
    // }

    ///creating a new account///
    if (isset($_REQUEST['signup'])) {
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

        try {
            // Select query
            $select_stmt=$db->prepare("SELECT login, email FROM users WHERE login=:uname OR email=:uemail");
            // Execute query
            $select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
        
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

                // Checking database for existing user information
                if ($row['login'] === $username){
                    array_push($errors, "Username is taken");
                }
                if ($row['email'] === $email){
                    array_push($errors, "Email is already registered");
                }

            if (empty($password1)) {
                array_push($errors, "Password is required");
            }
            if ($password1 != $password2) {
                array_push($errors, "Passwords do not match");
            }

            // No errors, save user to database
            if (count($errors) == 0) {
                $password = password_hash($password1, PASSWORD_DEFAULT);
                $insert_stmt=$db->prepare("INSERT INTO users (login, email, password) VALUES ('$username', '$email', '$password')");

                if($insert_stmt->execute(array(':uname'=>$username,':uemail'=>$email,':upassword'=>$password))) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Logged in !";
                    header('location: ../Frontend/test.php'); //redirect to main (test)
                }
            }
        } catch (PDOEexception $e) {
            echo "Login failed : " . $e->getMessage();
        }
    }
    
    // Logout
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('location: ../Frontend/index.php');
    }

    // update account info
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = strip_tags($_POST['login']);
        $email = strip_tags($_POST['email']);
        $password1 = strip_tags($_POST['password1']);
        $password2 = strip_tags($_POST['password2']);

        if ($_POST['password'] == $_POST['password2']) {
            //adding data to array if not null
            $newValues = [];
            foreach ($_POST as $k => $v) {
                $v != null ? $newValues[$k] = $v : true;
            };

            //removing second password from array
            count($newValues) > 3 ? array_pop($newValues): true;

            $holder = $_SESSION['username'];

            foreach ($newValues as $k => $v) {
                $update_stmt=$db->prepare("UPDATE users SET $k = '$v' WHERE login = '$holder';");
                $update_stmt->execute();
            };

            //updating username in SESSION if needed
            if (isset($_POST['login'])) {
                $_SESSION['username'] = $_POST['login'];
            };

            //updating form fields
            GLOBAL $id;
            GLOBAL $database;
            $insert_stmt=$db->prepare("SELECT * FROM users WHERE login = '$login';");
            $insert_stmt->execute();

            $info = "Your data has been updated";
        } else {
            $info = "Passwords must match";
        };
}