<?php 
include('../Backend/PDOcomments.php');
if (empty($_SESSION['username'])){
    header('location: ../Frontend/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="styleB.css">-->
    <link rel="stylesheet" href="style.css">
    <title>Contact us</title>
</head>
<body>

<div class="navbar">
    <a href="./main.php"><img src="../assets/Getflix.webp" width="200rem" height="80rem"></a>
    <div class="buttons">
        <a href="./main.php"><button type="button" id="home">HOME</button></a>
        <?php if (isset($_SESSION['username'])): ?>
                <a href="contact.php?logout='1'" name="logout">
                    <button type="button" id="logout">LOG OUT</button>
                </a>
        <?php endif ?>
        
    </div>
</div>


<main>
    <div class="fill_form">
        <form action="contact.php" method="post">
            <h2>Contact Us</h2><br>
            <?php include('../Backend/errors.php') ?>

            <?php //include('../Backend/PDOcomments.php');

            //$database=mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
            /* $status="";
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
                */
            ?>

            <input type="text" name="name" placeholder='Please, enter your name' id="name" href="index.php" class="sf" value="<?php echo $name; ?>">
            <input type="text" name="email" placeholder="Please, enter your email" id="email" href="home.php" class="sf" value="<?php echo $email; ?>">
        
            <!--<label for="issue_type" >-->
                <select name="issue" id="issue_type" class="sf" value="<?php echo $issue; ?>">
                    <option value="">Please, specify your issue</option>
                    <option value="movies not loading">Movies not loading</option>
                    <option value="cannot update my profile">Cannot update my profile info</option>
                    <option value="other">Other</option>
                </select>
            <!--</label>-->
            <textarea name="message" id="problem" class="sf" placeholder="Tell us more about your issue" value="<?php echo $message; ?>"></textarea>
            <br>
            <button type="submit" name="send" id='send' class="submit">Send</button>

            <div class="content">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="error success">
                        <h3>
                            <?php
                                echo $_SESSION['sent'];
                                unset($_SESSION['sent']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
            </div> 
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
                <img src="../assets/brigita.webp" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/Dan-DH" target="_blank" rel="noopener">
                <img src="../assets/daniIcon.webp" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/ShivaniKhatri96" target="_blank" rel="noopener">
                <img src="../assets/shivaniIcon.webp" alt="githubLink" class="portrait">
            </a>
            <a href="https://github.com/teo-cozma" target="_blank" rel="noopener">
                <img src="../assets/teodora.webp" alt="githubLink" class="portrait">
            </a>

        </div>
        <p>Copyright &#169; 2021</p>  
    </footer>
</body>
</html>