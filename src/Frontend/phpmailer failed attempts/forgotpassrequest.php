<?php 
use PHPMailer\PHPMailer\PHPMailer;
//include('PDOserver.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
<a href="welcome.html"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>
    </div>

    <main>
  <div class="fill_form">
     
  <form action="" method="post" name="reset">
  <h2>FORGOT PASSWORD</h2><br>
  <?php
///
//include('errors.php');
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";
$errors=array();



try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
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
if(isset($_POST['email'])&& !empty($_POST['email'])) {
    $email= $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (empty($email) || !$email) {
                            array_push($errors,"Please enter valid email address");
                        } else {
                           
                            $sql = "SELECT * FROM users WHERE email='$email'";
                            $results =$db->prepare($sql);
                            $results->execute();
                            $row_count = $results->fetchColumn();
                            if ($row_count == 0) {
                                array_push($errors,"This email is not registered to getflix, please Sign Up!");
                            }
                        }
                        
                     if(count($errors) == 0 ){

                            $output = '';
                       //expiry date format changed validity from 1d to 1h
                            $expFormat = mktime(date("H")+1, date("i"), date("s"), date("m"), date("d")/* + 1*/, date("Y"));
                            //expiry date set
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            //expiring tmporary key code
                            $key = md5(time());
                            //renders random key
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            $insert_stmt=$db->prepare( "INSERT INTO pass_reset_temp (email, key, expDate) VALUES ('$email', '$key', '$expDate')");
                            $insert_stmt->execute();
                            $result = $insert_stmt->fetch(PDO::FETCH_ASSOC);


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/Frontend/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/Frontend/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            require("vendor/autoload.php");
                            $mail = new PHPMailer();
                            $mail->CharSet =  "utf-8";
                            $mail->IsSMTP();
                            // enable SMTP authentication
                            $mail->SMTPAuth = true;  
                            // sets GMAIL as the SMTP server
                            $mail->Host = "smtp.gmail.com"; // Enter your host here
                            $mail->SMTPAuth = true;
                            $mail->Username = "bxlgetflix@gmail.com"; // Enter your email here
                            $mail->Password = "getflixbxl"; //Enter your passwrod here
                            $mail->Port = 587;
                            $mail->IsHTML(true);
                            $mail->From = "bxlgetflix@gmail.com";
                            $mail->FromName = "Getflix Team";

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->$errors;//not sure if i need to change to actual message
                            } else {
                                echo "Please check your email adress";
                            }
                     }
}
  ?>
            <label for="input">Please enter your email address:</label><br>
            <input class="sf" type="email" name="email" placeholder="please enter your email">
            <br>
            <button name='submit' type="submit" id="reset" value="Reset Password">SUBMIT</button>
        </form>
  </div>
    </main>
</body>
</html>