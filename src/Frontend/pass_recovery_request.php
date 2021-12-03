

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
<a href="welcome.html"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>
    </div>

    <main>
  <div class="fill_form">
     
  <form action="" method="post" name="reset">
  <h2>FORGOT PASSWORD</h2><br>
  <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ('../vendor/phpmailer/phpmailer/src/Exception.php');
require_once  '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once  '../vendor/phpmailer/phpmailer/src/SMTP.php';
//include ("../Backend/PDOserver.php");
require("../vendor/autoload.php");


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
    /*
    $statement = $connect->prepare("SELECT login, :email, password FROM getflix.users");
    $statement->execute();
    $user = $statement->fetch();*/
} 
catch (PDOException $e) {
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
      if ($results->userID == 0) { //num_rows where is it coming from?
          $email_err .= "User Not Found";
          echo $email_err;
      /*<script>
            // BLOCK MODAL if there is an error WITH JQUERY
          $(window).ready(function(){
          $('#popUpRecovery').modal('show'); 
          })
        </script>*/
   
        unset($_GET["reset"]);
      }
    else {
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
      //replace the site url
      $output.='<p><a href="http://localhost/Frontend/reset_password_ivan.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/reset-password_ivan.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $body = $output;
      $subject = "Password Recovery";
      $email_to = $email;
      //autoload the PHPMailer
     
      $mail = new PHPMailer(true);

try {
    // Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'bxlgetflix@gmail.com'; // YOUR gmail email
    $mail->Password = 'getflixbxl'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('bxlgetflix@gmail.com', 'Getflix Team');
$mail->addAddress($email/*, 'Receiver Name'*/);
    $mail->addReplyTo('bxlgetflix@gmail.com', 'Getflix Team'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = 'You need an html lail client to read this email';

    $mail->send();
    $mode= "The email was sent, please check your email. ";
    
   /* <script>
      // BLOCK MODAL if there is an error WITH JQUERY
    $(window).ready(function(){
    $('#popUpSucces').modal('show'); 
    })
  </script>*/

} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}
}
}}?>
  <label for="input">Please enter your email address:</label><br>
            <input class="sf" type="email" name="email" placeholder="please enter your email">
            <?php $email=$_POST['email'];
             echo $email;
?>
            <br>
            <button name='reset' type="submit" id="reset">SUBMIT</button>
        </form>
  </div>
    </main>
</body>
</html>