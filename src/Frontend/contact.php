
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleB.css">
    <title>Contact us</title>
</head>
<body>

<div class="navbar">
        <h1>Getflix</h1>
        <div class="buttons">
            <button type="button" id="home" href="main.php">HOME</button>
            <button type="button" id="logout" href="login.php">LOG OUT</button>
        </div>
    </div>


    <main>
<div class="fill_form">
    <form action="contact.php" method="post">
    <h2>Contact Us</h2><br>

    <?php //include('../Backend/server.php')
/*echo '<pre>';
print_r($_POST);
echo'</pre';*/
//$message_sent=false;
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

$status="";
//validation for form method
if($_SERVER['REQUEST_METHOD'=='POST']){
  //  $pdo = openConnection();
//getting data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $message = $_POST['message'];
$contact_date = date(("j M Y H:i:s ") . "<br>");
//validation for unfilled fields native php function empty()
   if(empty($name) || empty($email) || empty($issue) || empty($message)){
       $status="Please fill in all the fields";
       echo $status;
   }else{//checking if name is not too long
       if(strlen($name)>255){
           $status="Please, enter a valid name.";
           echo $status;
           //validating email for case not valid
       }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $status='Please, enter a valid email address.';
           echo $status;
       }else{
           $sql="INSERT INTO contact (name, email ,issue ,message,contact_date) VALUES(:name, :email, :issue, :message, :contact_date)";
           //$stmt= statement
           $stmt = $pdo->prepare($sql);
           $stmt->execute(['name'=>$name, 'email'=>$email, 'issue'=>$issue, 'message'=>$message, 'contact_date'=>$contact_date]);
           
           $status = "Your message was sent, well get back to you shortly.";
           $name="";
           $email="";
           $issue="";
           $message="";
           $contact_date="";
/*echo '<pre>';
print_r($stmt);
echo'</pre';*/
           echo $status;
       }
   }
   }
   // if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        
       /* 
     
           if (strpos($username, "@")) {
            $contact ="SELECT * FROM contact WHERE name = $name AND email = $email AND issue=$issue AND message = $message;";
        } else {
            $contact = "SELECT * FROM contact WHERE name = 'Dan-DH' AND email = 'daniel@getflix.com' AND issue = 'other' AND message = 'Love this, you should charge more' ";
        }
        $t = $pdo->query($contact)->fetchAll();
            
           
      //  $pdo->query("SELECT * FROM contact;")->fetchAll(PDO::FETCH_OBJ));
       /* echo "<pre>";
        print_r($pdo->query("SELECT * FROM contact;")->fetchAll(PDO::FETCH_OBJ));
        echo "</pre>";*/

 //setting up where it will be sent as an email, would like to set it up to be sent to DB
 //$to = 'example@email.com';
// $body = "";
  // Adding body of the message
 // $body.= "From: ".$name. "\r\n\"; 
  //$body.="Email: ".$userEmail. "\r\n\";
  //$body.="Message: ".$message. "\r\n\";

  //sending out email
//mail($to,$issue,$body);
//$message_sent=true;
/*echo "<h3>Thanks, we'll be in touch!</h3>";
    }
    else{
        //if email was invalid
      echo'Please, enter valid email';
    }
}else{
    echo'<h3>Please enter valid email address';
};*/
?>

    <input type="text" name="name" placeholder='Please, nter your name' id="name">
    <input type="email" name="email" placeholder="Please,enter your email" id="email">
        <label for="issue_type">
        <select name="issue" id="issue_type">
            <option value="">Please, specify your issue</option>
            <option value="movies not loading">Movies not loading</option>
            <option value="cannot update my profile">Cannot update my profile info</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <textarea name="message" id="problem" cols="30" rows="10" placeholder="Tell us more about your issue" ></textarea>
        </label>
        <br>
        <button name="submit" id='submit'>Send</button>
    </form>
    </div>
    </main>
</body>
</html>