
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
if((isset($_POST['email'])&&  $_POST['email'] !="")&&isset($_POST['submit'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //getting data from the form

        function openConnection() { 
            $name = $_POST['name'];
$email = $_POST['email'];
$issue = $_POST['issue'];
$message = $_POST['message'];
            $dbhost = "database"; 
            $dbuser = "root";
            $dbpass = "getflixRoot";
            $db = "getflix";
            //do we need the charset?
    
            $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
            echo "connected";
            return $pdo;
        };
    
        $pdo = openConnection();
        $pdo->query("SELECT * FROM contact;")->fetchAll(PDO::FETCH_OBJ));
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
echo "<h3>Thanks, we'll be in touch!</h3>";
    }
    else{
        //if email was invalid
      echo'Please, enter valid email address';
    }
}
?>

    <input type="text" name="name" placeholder='Please, nter your name' id="name">
    <input type="email" name="email" placeholder="Please,enter your email" id="email">
        <label for="issue_type">
        <select name="issue" id="issue_type">
            <option value="select">Please, specify your issue</option>
            <option value="movies notloading">Movies not loading</option>
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