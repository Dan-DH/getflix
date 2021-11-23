<?php 

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

    echo count($t) > 0 ? "Welcome back, {$t[0][2]}" : "Incorrect login credentials, please try again";
};

/* if ($password1 != $password2) { 
    echo "Passwords do not match";
    break;
}  */

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
    } */
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