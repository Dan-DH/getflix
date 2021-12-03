<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/phpmailer/phpmailer/src/Exception.php';
require_once  './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once  './vendor/phpmailer/phpmailer/src/SMTP.php';
include ("./Composant_php/config.php");
if (isset($_POST["recovery"])){
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
  $email = $_POST["email"];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  if (!$email) {
      $email_err .="Invalid email address";
  } else {
      $sel_query = "SELECT * FROM Users WHERE Email='$email'";
      $results = $conn->query($sel_query);
      $row=$results->fetch_assoc();
      if ($results->num_rows == 0) {
          $email_err .= "User Not Found";
          ?>
          <script>
            // BLOCK MODAL if there is an error WITH JQUERY
          $(window).ready(function(){
          $('#popUpRecovery').modal('show'); 
          })
        </script>
    <?php
        unset($_GET["recovery"]);
      }
    else {
      $output = '';
      $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
      $expDate = date("Y-m-d H:i:s", $expFormat);
      $key = md5(time());
      $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
      $key = $key . $addKey;
      // Insert Temp Table
      $sqlx= "INSERT INTO password_reset_temp  VALUES ('$email','$key', '$expDate ');";
      $res=$conn->query($sqlx);
      $output.='<p>Please click on the following link to reset your password.</p>';
      //replace the site url
      $output.='<p><a href="http://localhost/reset/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhostreset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $body = $output;
      $subject = "Password Recovery";
      $email_to = $email;
      //autoload the PHPMailer
      require("./vendor/autoload.php");
      $mail = new PHPMailer(true);

try {
    // Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'ivan.d.andrea28@gmail.com'; // YOUR gmail email
    $mail->Password = getenv('SMTP_PASS'); // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('support@getflix.com', 'Getflix');
    $mail->addAddress($email, 'Receiver Name');
    $mail->addReplyTo('support@getflix.com', 'Getflix'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = 'You need an html lail client to read this email';

    $mail->send();
    $mode= "Email send ";
    ?>
    <script>
      // BLOCK MODAL if there is an error WITH JQUERY
    $(window).ready(function(){
    $('#popUpSucces').modal('show'); 
    })
  </script>
<?php
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}
}
}}?>

<!-- 
  POP UP MODAL Recovery Password
-->
<div class="modal fade" id="popUpRecovery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title text-danger text-center " id="popUpSuccesLabel">Insert your E-mail to recover your password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-light"><form action="" method="post">
        <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <!-- Input with php injected to control invaid status -->
            <input type="email" class="form-control 
                    <?php echo (isset($email_err)) ? 'is-invalid' : ''; ?>
                    " name="email" id="email"></input>
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
            <span class="valid-feedback" id="valid-mail"></span>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="recovery"  class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
          </form>
        </div>
      </div>
    </div>
  </div>