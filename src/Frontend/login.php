<?php //include('../Backend/server.php')?>
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
        <h1>Getflix</h1>
        <div class="buttons">
            <button type="button" id="login" href>Log in</button>
            <button type="button" id="sign">Sign up</button>
        </div>
    </div>

    <main>
        <div class="fill_form">
            <form action="../Backend/server.php" method="post">
                <h2>Log in</h2>
                <input type="text" placeholder="username / email" class="sf" name="userinfo">
                <input type="password" placeholder="password" class="sf" name="password">

                <button type="submit" class="submit">Login</button>
                <a href="#">Forgot password ?</a>

                <p>Not yet a member ? <a href="signup.php">Sign up !</a></p>

            </form>
        </div>
    
    </main>
    
</body>
</html>