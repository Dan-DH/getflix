<?php include('../Backend/PDOserver.php');
include('../Backend/errors.php');
//include('../Backend/test.php')
include('../Frontend/account.php');
include('../Frontend/contact.php');
include('../Frontend/home.php');
include('../Frontend/main.php');
include('../Frontend/rough.php');
include('../Frontend/signup.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    <!-- Bootstrap link 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <title>Login</title>
</head>
<body>
    <div class="navbar">
        <h1>Getflix</h1>
        <div class="buttons">
            <button type="submit" id="login" href>Log in</button>
            <button type="submit" id="sign">Sign up</button>
        </div>
    </div>

    <main>
        <div class="fill_form">
            <form action="login.php" method="post">
                <h2>Log in</h2>

                <?php include('../Backend/errors.php') ?>

                <input type="text" placeholder="userinfo" class="sf" name="userinfo" value="<?php echo $username; ?>">
                <input type="password" placeholder="password" class="sf" name="password" value="<?php echo $password; ?>">
                <button type="submit" class="submit" name="login">Login</button>

                <a href="#">Forgot password ?</a>
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