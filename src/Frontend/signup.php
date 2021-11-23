<?php //include('../Backend/server.php')?>
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
        <h1>Getflix</h1>
        <div class="buttons">
            <button type="button" id="login">Log in</button>
            <button type="button" id="sign">Sign up</button>
        </div>
    </div>

    <main>
        <div class="fill_form">
            <form action="" method="post">
            
            <!-- Validation errors -->
            <!--<?php// include('../Backend/errors.php')?>-->

                <h2>Sign up</h2>
                <input type="text" placeholder="username" class="sf" name="username">
                <input type="text" placeholder="email" class="sf" name="email">
                <input type="password" placeholder="password" class="sf" name="password1">
                <input type="password" placeholder="confirm password" class="sf" name="password2">

                <button type="submit" class="submit" name="signup">Submit</button>

                <p>Already a member ? <a href="login.php">Log in !</a></p>
            </form>
        </div>
    </main>
    <footer> <p>Copyright &#169; 2021 </p> 
        <p>A collab between <a href="https://github.com/Dan-DH">Daniel</a>, <a href="https://github.com/Brigilets">Brigita</a>, <a href="https://github.com/ShivaniKhatri96/">Shivani</a> and <a href="https://github.com/teo-cozma">Teodora</a>.</p>
    </footer>

</body>

</html>