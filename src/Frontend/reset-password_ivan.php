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
    $array_err=array();
    $pattern = '/^(?=.*[0-9])(?=.*[A-Z])$/';
    
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $query =  "SELECT * FROM password_reset_temp WHERE key_temp='$key' and email='$email';";
        $results = $conn->query($query);
        // $row=$results->fetch_assoc();
        if ($results->num_rows==0 ) {
            $error .= '<h2>Invalid Link</h2>';
        } else {
            $row=$results->fetch_assoc();
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
  

</main>
</body>
</html>
              <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }
                    }

                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        if (empty(trim($_POST["pass1"]))) { //CONTROL IF EMPTY INPUT
                            $password_err = "Please enter a password.";
                            array_push($array_err, $password_err);
                          } elseif (strlen(trim($_POST["pass1"])) < 6) { //CONTROL ON CHARACTER LENGHT
                            $password_err = "Password must have atleast 6 characters.";
                            array_push($array_err, $password_err);
                          }
                          elseif (preg_match($pattern,$_POST["pass1"])) {
                            $password_err="Password must have at least 1 uppercase and 1 number";
                            array_push($array_err,$password_err);
                          }
                        $error = "";
                        $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
                        $email = $_POST["email"];
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if (!empty($array_err)) {
                            echo "<p>".$password_err."</p>";
                        } else {

                            $pass1 =password_hash($pass1,PASSWORD_DEFAULT);
                            mysqli_query($conn, "UPDATE Users SET `User_Password` = '$pass1'WHERE `Email` = '$email';");
                            mysqli_query($conn, "DELETE FROM password_reset_temp WHERE `email` = '$email';");
                            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
                        }
                    }
                    ?>


