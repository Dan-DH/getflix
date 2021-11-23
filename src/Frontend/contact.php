<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
    <input type="email" name="email" placeholder="Please,enter your email" id="email">
        <label for="issue_type">
=======
    <link rel="stylesheet" href="style.css">
    <title>Contact us</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="" method="post">
        <label for="issue">Specify your issue:<br>
>>>>>>> b2d95626948501eeccc1daa38cdbbac237fabfde
        <select name="issue" id="issue_type">
            <option name="issue" value="select">Please, specify your issue</option>
            <option value="not_loading" name="issue">Movies not loading</option>
            <option value="cannot_update" name='issue'>Cannot update my profile info</option>
            <option value="other" name="issue">Other</option>
        </select><br><br>
        
        <textarea name="message" id="problem" cols="30" rows="10" placeholder="Tell us more about your issue" ></textarea>
        </label>
        <br>
        <button id='submit'>Send</button>
    </form>
    </div>
    </main>
</body>
</html>