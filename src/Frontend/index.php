<?php include('../Backend/PDOserver.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="navbar">
        <a href="welcome.php"><img src="../assets/Getflix.webp" width="200" height="80" class="logo" alt="getflix-logo"></a>
    </div>

    <main>
        <div class="fill_form">
            <form action="index.php" method="post">
                <h2>Log in</h2>

                <?php include('../Backend/errors.php') ?>

                <input type="text" placeholder="userinfo" class="sf" name="userinfo" value="<?php echo $username; ?>">
                <input type="password" placeholder="password" class="sf" name="password" value="<?php echo $password; ?>">
                <button type="submit" class="submit" name="login">Login</button>

                <a href="pass_recovery_request.php">Forgot password ?</a>
                <p>Not yet a member ? <a href="signup.php">Sign up !</a></p>
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