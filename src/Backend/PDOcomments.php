<?php 
include('../Backend/PDOserver.php');

// declaring variables for db connection
// development server
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";

///Connecting to the database///

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}


try {
    //echo "success";
    
    if (isset($_POST['send'])) {
            
        // Declaring variables on the page
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $issue = strip_tags($_POST['issue']);
            $message = strip_tags($_POST['message']);

        // Ensure the fields are filled properly :
        if (empty($name) OR empty($email) OR empty($issue) OR empty($message)) {
            array_push($errors, "Please fill in all the fields");
            if (strlen($name) > 50) {
                array_push($errors, "Please, enter a valid name");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Please, enter a valid email address");
            }
        }
         else { // Comment will be added to database
            $sql = "INSERT INTO contact (name, email, issue, message) VALUES('$name', '$email', '$issue', '$message')";
            $db->prepare($sql)->execute([$name, $email, $issue, $message]);
                //$_SESSION['username'] = $username;
                $_SESSION['sent'] = "Your message was sent, we'll be in touch with you shortly.";
                header('location: ../Frontend/contact.php'); //redirect to same page
        }
    }
} catch (PDOEexception $e) {
    echo "Message not sent : " . $e->getMessage();
}
?>