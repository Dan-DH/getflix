<?php 
include('../Backend/PDOserver.php');

// Change password form
/*
$stmt = $db->query("SELECT * FROM users WHERE login='$login' AND email='$email'");
while ($row = $stmt->fetch())
{
    echo $row['name'] . "\n";
}

$sql = "UPDATE user SET login=?, email=? ,password1=?, password2=? where id=?";
$db->prepare($sql)->execute([$login, $email, $password1, $password2]);
*/

$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";

///Connecting to the database///
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    // set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

try {
    //echo "success";
    
    if (isset($_POST['update'])) {

        /*if (isset($_SESSION['username'])) {  
            header('location: account_PDO.php');
        }*/
            
        // Declaring variables on the page
        //$data = [
            $username = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);
            $new_password1 = strip_tags($_POST['new_password1']);
            $new_password2 = strip_tags($_POST['new_password2']);
        //];

        // Ensure the fields are filled properly :
        if (empty($username)) {
            array_push($errors, "Please enter your username");
        }
        if (empty($email)) {
            array_push($errors, "Please enter your email");
        }
        if (empty($new_password1)) {
            array_push($errors, "Please make a new password");
        }
        if ($new_password1 != $new_password2) {
            array_push($errors, "Passwords must match");
        }
        else {
            // New password is confirmed
            $new_password = $new_password1;
            
            // New password will be set
            $sql = "UPDATE users SET password = '$new_password' WHERE login = '$username'";
            $db->prepare($sql)->execute([$new_password, $username]);
                $_SESSION['username'] = $username;
                $_SESSION['updated'] = "Your information has been updated!";
                header('location: ../Frontend/account_PDO.php'); //redirect to main (test)
        }
    }
} catch (PDOEexception $e) {
    echo "Update failed : " . $e->getMessage();
}

/*
try {
    //echo "success";
    if (isset($_SESSION['username'])) {

        if (isset($_POST['update'])) {
            
        //header('location: account_PDO.php');
            
            // Declaring variables on the page
            //$data = [
                $username = strip_tags($_POST['username']);
                $email = strip_tags($_POST['email']);
                $new_password1 = strip_tags($_POST['new_password1']);
                $new_password2 = strip_tags($_POST['new_password2']);
            //];

            // Ensure the fields are filled properly :
            if (empty($username)) {
                array_push($errors, "Please enter username");
            }
            if (empty($email)) {
                array_push($errors, "Please enter email");
            }
            if (empty($new_password1)) {
                array_push($errors, "Password is required");
            }
            if ($new_password1 != $new_password2) {
                array_push($errors, "Passwords do not match");
            }
            /*
            else {
                // New password is confirmed
                $new_password = $new_password1;
                
                // New password will be set
                $sql = "UPDATE users SET password = '$new_password' WHERE login = '$login'";
                $db->prepare($sql)->execute($new_password);
                    //$_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your information has been updated!";
                    header('location: ../Frontend/account_PDO.php'); //redirect to main (test)
            }
            
        }
    }
} catch (PDOEexception $e) {
    echo "Update failed : " . $e->getMessage();
}*/
    
    /*try {
        // No errors, save new password to database
        if (count($errors) == 0) {
            // Select query
            $queryData = $db->prepare("SELECT * FROM users WHERE login='$login' AND email='$email'");
            $result->execute();
            $row_count = $result->fetchColumn();
            echo $row_count;
            
            $password = $password1;
            $insert_stmt = $db->prepare("UPDATE users SET password = '$password' WHERE login = '$login'");

            if($insert_stmt->execute(array(':uname'=>$username,':uemail'=>$email,':upassword'=>$password))) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Logged in !";
                header('location: ../Frontend/test.php'); //redirect to main (test)
            }
        }

    } catch (PDOEexception $e) {
        echo "Login failed : " . $e->getMessage();
    }*/
?>