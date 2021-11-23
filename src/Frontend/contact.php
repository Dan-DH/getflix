<?php //include('../Backend/server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact us</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="" method="post">
        <label for="issue">Specify your issue:<br>
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