<?php 
//include('../Backend/server.php');
include('../Backend/PDOserver.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign up</title>
</head>
<body>
    <div class="navbar">
        <a href="welcome.php"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>

        <!--<h1>Getflix</h1>-->
        <!--
        <div class="buttons">
            <button type="submit" id="login">Log in</button>
            <button type="submit" id="sign">Sign up</button>
        </div>
        -->
    </div>

    <main>
        <div class="fill_form">
            <form action="signup.php" method="post">

                <h2>Sign up</h2>
                <!-- Validation errors -->
                <?php include('../Backend/errors.php');?>
                
                <input type="text" placeholder="username" class="sf" name="username" value="<?php echo $username; ?>">
                <input type="text" placeholder="email" class="sf" name="email" value="<?php echo $email; ?>">
                <input type="password" placeholder="password" class="sf" name="password1" value="<?php echo $password1; ?>">
                <input type="password" placeholder="confirm password" class="sf" name="password2" value="<?php echo $password2; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                <!-- <input type="password" placeholder="confirm password" class="sf" name="password2" value="<?php //echo $password2; ?>"> -->

                <button type="submit" class="submit" name="signup">Submit</button>

                <p>Already a member ? <a href="index.php">Log in !</a></p>
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
        <p>Copyright &#169; 2021</p>
            
    </footer>

</body>

</html>