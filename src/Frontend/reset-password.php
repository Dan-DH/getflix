<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Password Reset</title>
</head>
<body>
<header class="navbar">
<a href="welcome.html"><img src="../assets/Getflix.webp" width="200rem" height="80rem"></a>
</header>
    <?php

    // declaring variables for db connection
    // development server
    $servername = "database";
    $db_user = "root";
    $db_password = "getflixRoot";
    $dbname = "getflix";
    ///Connecting to the database///
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
        // set error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } 
    catch (PDOException $e) {
        echo "Connection failed : " . $e->getMessage();
    }
    $array_err=array();
    $pattern = '/^(?=.*[0-9])(?=.*[A-Z])$/';
    
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
        $key = $_GET["key"];
        $get_email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");

        $sql= "SELECT * FROM password_reset_temp WHERE user_key ='$key' and email ='$get_email';";
        $res=$db->prepare($sql);
        $res->execute();
        $row = $res->fetch(PDO::FETCH_ASSOC);

        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
    ?>
<main>
    <div class="fill_form">
<form action="" method="post">
    <h2>PASSWORD RESET</h2>
    
  
    <label for="password1">Enter your new password</label>
   <input type="password" name="password1" class='sf' placeholder='Please,enter your new password'><br>
   <label for="password2">Repeat your new password</label>
   <input type="password" name="password2" class='sf' placeholder='Please,repeat your new password'>
   <br>
<button name="submit" type="submit">SUBMIT</button>
</form>
    </div>
              <?php
                    } else {
                        $error .= "<h2>Link Expired</h2>>";
                    }
                    }
                    if ($error != "") {
                        echo "<div class='error'>" . $error . "</div><br />";
                    }
                    

                    if (isset($_POST["password1"])) {
                        $password1 = $_POST["password1"];
                        $sql= "UPDATE users SET password = '$password1' WHERE email = '$get_email';";
                        $res=$db->prepare($sql)->execute();
                        $sql1= "DELETE FROM password_reset_temp WHERE email = '$get_email';";
                        $res1=$db->prepare($sql1)->execute();
                        echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
                    }
                    ?>
</main>
</body>
</html>


