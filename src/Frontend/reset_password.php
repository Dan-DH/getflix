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
<a href="welcome.html"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>
</header>
<main>
    <div class="fill_form">
<form action="" method="post">
    <h2>PASSWORD RESET</h2>
    <?php
    //include('PDOserver.php');
    $servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";
$errors=array();
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
}//retrieving data from the link we sent to user for password recovery
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");
                        $query ="SELECT * FROM password_reset_temp WHERE key='$key' and email='$email'";
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                       // $row = mysqli_num_rows($query);
                       $row= $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($row == "") {
                            array_push($errors, '<h2>Invalid Link</h2>');
                        } else {
                            $row= $stmt->fetch(PDO::FETCH_ASSOC);
                            //$row = mysqli_fetch_assoc($query);
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
                                ?> 
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
                                array_push($errors,"<h2>Link Expired</h2>>");
                            }
                        }
                       /* if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br>";
                        }*/
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $password1 = strip_tags($_POST["password1"]);
                        $password2 = strip_tags($_POST["password2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $password1 = md5($password1);
                            $sql ="UPDATE users SET password = '$password1', acc_date = '$curDate' WHERE email = '$email'";
                            $db->prepare($sql)->execute([$password1,$curDate,$email]);

                            $del_statement="DELETE FROM password_reset_temp WHERE email = '$email'";
                            $db->prepare($del_statement)->execute();

                            echo '<div class="error"><p>Your password has been updated successfully.</p>';
                        }
                    }
                    ?>
</main>
</body>
</html>