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
    if (count($errors) ==0) {
        $sql = "INSERT INTO user (username, email, password)
                VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);
    }
    
}
*/
?>