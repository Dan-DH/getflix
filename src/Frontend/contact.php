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
            <option value="not_loading">Movies not loading</option>
            <option value="cannot_update">Cannot update my profile info</option>
            <option value="other">Other</option>
        </select><br>
        Tell us more about your issue:<br>
        <textarea name="issue" id="problem" cols="30" rows="10"></textarea>
        </label>
        <br>
        <button>Send</button>
    </form>
</body>
</html>