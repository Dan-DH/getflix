
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="styleB.css">-->
    <link rel="stylesheet" href="styleB.css">
    <title>Contact us</title>
</head>
<body>

<div class="navbar">
        <h1>Getflix</h1>
        <div class="buttons">
            <button type="button" id="home" href="./index.php">HOME</button>
            <button type="button" id="logout" href="./login.php">LOG OUT</button>
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
 
/*$dbhost = "database"; 
   $dbuser = "root";
   $dbpass = "getflixRoot";
   $db = "getflix";*/
    //do we need the charset?

   /* try {
        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        //echo "Connected";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed : " . $e->getMessage();
    }
};*/
//
$database=mysqli_connect('database', 'root', 'getflixRoot', 'getflix');

$status="";
//validation for form method
if(isset($_POST['submit'])){
   //$pdo = openConnection();
//getting data from the form
    $name = mysqli_real_escape_string($database,$_POST['name']);
    $email = mysqli_real_escape_string($database,$_POST['email']);
    $issue = mysqli_real_escape_string($database, $_POST['issue']);
    $message = mysqli_real_escape_string($database, $_POST['message']);

// added automatically $contact_date =mysqli_real_escape_string($database,date("j M Y H:i:s "));
//validation for unfilled fields native php function empty()
   if(empty($name) || empty($email) || empty($issue) || empty($message)){
       $status="Please fill in all the fields";
       echo $status;
   };//checking if name is not too long
   if(strlen($name)>255){
           $status="Please, enter a valid name.";
           echo $status;
           //validating email for case not valid
       };if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $status='Please, enter a valid email address.';
           echo $status;
       }else{
// IF EVERYTHING IS CORRECTLY FILLED
          //executing query and returning the message
   //query to insert the variables into DB
           $sql="INSERT INTO contact (name, email ,issue ,message) VALUES('$name', '$email', '$issue', '$message')";
          mysqli_query($database, $sql);   
           $status= "Your message was sent, we'll be in touch with you shortly.";
           echo $status;
          
        };
    }
?>

    <input type="text" name="name" placeholder='Please, enter your name' id="name" href="index.php" class="sf" >
    <input type="text" name="email" placeholder="Please,enter your email" id="email" href="home.php" class="sf" >
        <label for="issue_type" >
        <select name="issue" id="issue_type" class="sf">
            <option value="">Please, specify your issue</option>
            <option value="movies not loading">Movies not loading</option>
            <option value="cannot update my profile">Cannot update my profile info</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <textarea name="message" id="problem" cols="30" rows="10" class="sf" placeholder="Tell us more about your issue" ></textarea>
        </label>
        <br>
        <button name="submit" id='submit'>Send</button>
    </form>
    </div>
    </main>

    <footer id="desktop_footer"> 
        <p>Copyright &#169; 2021</p> 
        <p>A collab between <a href="https://github.com/Dan-DH">Daniel</a>, <a href="https://github.com/Brigilets">Brigita</a>, <a href="https://github.com/ShivaniKhatri96/">Shivani</a> and <a href="https://github.com/teo-cozma">Teodora</a>.</p>
    </footer>

    <footer id="mobile_footer">

        <div class="footer_img">
            <a href="https://github.com/Brigilets" target="_blank" rel="noopener">
                <img src="../assets/brigita.jpg" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/Dan-DH" target="_blank" rel="noopener">
                <img src="../assets/daniIcon.webp" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/ShivaniKhatri96" target="_blank" rel="noopener">
                <img src="../assets/shivaniIcon.webp" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/teo-cozma" target="_blank" rel="noopener">
                <img src="../assets/teodora.jpg" alt="githubLink" class="portrait">
            </a>

        </div>
        <p>Copyright &#169; 2021 </p>
            
    </footer>
</body>
</html>