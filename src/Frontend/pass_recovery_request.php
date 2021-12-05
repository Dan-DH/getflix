<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forgotten password request</title>
</head>
<body>
    <div class="navbar">
        <a href="welcome.php"><img src="../assets/Getflix.webp" width="200rem" height="80rem"></a>
    </div>
<main>
  <div class="fill_form">
     
    <form action="pass_recovery_request" method="post" name="reset">
        <h2>FORGOT PASSWORD</h2><br>
  <?php

include_once('../mailer/includes/PHPMailer.php');
include_once('../mailer/includes/SMTP.php');
include_once('../mailer/includes/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// declaring variables for db connection
// development server
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";
// production server
// private $dbhost = "fdb33.awardspace.net";
// private $dbuser = "3998204_getflix";
// private $dbpass = "getflixRoot1";
// private $db = "3998204_getflix";

///Connecting to the database///
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    // set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

//checking if user exists
if (isset($_POST["reset"])){
    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
        $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $email_err .="Invalid email address";
            echo $email_err;
        } else {
            $query = "SELECT * FROM users WHERE email='$email'";
            $results = $db->prepare($query);
            $results->execute();
            $row=$results->fetch(PDO::FETCH_ASSOC);
            $output = '';
            $expFormat = mktime(date("H")+1, date("i"), date("s"), date("m"), date("d"), date("Y"));
            $expDate = date("Y-m-d H:i:s", $expFormat);
            $key = md5(time());
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;
            // Insert Temp Table
            $sql= "INSERT INTO password_reset_temp (email, user_key,expDate) VALUES ('$email','$key', '$expDate ')";
            $res=$db->prepare($sql)->execute();
            $output.='<p>Please click on the following link to reset your password.</p>';
            //development url
            $output.='<p><a href="http://localhost:8082/Frontend/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost:8082/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
            //production url
            //$output.='<p><a href="http://getflix.atwebpages.com/Frontend/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://getflix.atwebpages.com/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
            $body = $output;
            $subject = "Password Recovery";
            $email_to = $email;

            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = 'true';
                $mail->SMTPSecure = 'tls';
                $mail->Port = '587';
                $mail->Username = 'bxlgetflix@gmail.com';
                $mail->Password = 'getflixbxl'; //change password after final deployment
                $mail->Subject = 'Getflix: Password recovery';
                $mail->setFrom('bxlgetflix@gmail.com');
                $mail->isHTML(true);
                $mail->Body = $body;
                $mail->addAddress($email);
                if($mail->Send()) {
                    echo '<div>We sent you password recovery link, please check your email.<div><br>';
                } else {
                    echo 'There was an error somewhere';
                };
                $mail->smtpClose();
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
?>
        <label for="input">Please enter your email address:</label><br>
        <input class="sf" type="email" name="email" placeholder="please enter your email">
        <br>
        <button name='reset' type="submit" id="reset">SUBMIT</button>
    </form>
  </div>
</main>
</body>
</html>