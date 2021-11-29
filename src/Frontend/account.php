<?php 
//for testing purposes
session_start();
$_SESSION["userID"] = 3;
//actual code
$id = $_SESSION["userID"];
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
$login = mysqli_real_escape_string($database, $_SESSION["login"]);
$query = "SELECT * FROM achievements WHERE userID = $id;";
$result = mysqli_query($database, $query)-> fetch_array(MYSQLI_ASSOC);
$queryData = "SELECT * FROM users WHERE userID = $id;";
$resultData = mysqli_query($database, $queryData)-> fetch_array(MYSQLI_ASSOC);
//print_r($resultData);

//POST request
$login = mysqli_real_escape_string($database, $_POST['login']);
$email = mysqli_real_escape_string($database, $_POST['email']);
$password1 = mysqli_real_escape_string($database, $_POST['password']);
$password2 = mysqli_real_escape_string($database, $_POST['password2']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] == $_POST['password2']) {
        $newValues = [];
        foreach ($_POST as $k => $v) {
            $v != null ? $newValues[$k] = $v : true;
        };
    
        count($newValues) > 3 ? array_pop($newValues): true;
    
        foreach ($newValues as $k => $v) {
            $queryUpdate = "UPDATE users SET $k = '$v' WHERE userID = $id;";
            $updateSent = mysqli_query($database, $queryUpdate);
        };

        $info = "Your data has been updated";
    } else {
        $info = "Passwords must match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style-account.css">
    <title>Account</title>
</head>
<body>
<div class="navbar">
        <h1>Getflix</h1>
        <div class="buttons">
            <a href="./main.php"><button type="button" id="home">Home</button></a>
            <a href="./login.php"><button type="button" id="logout">Log out</button></a>
        </div>
</div>
<div class="row userform">
    <div class="col-12 col-md-4 containerForm">
        <form action="account.php" method="post">
            <label for="login">Current login:</label><br>
            <input type="text" class="inputfield" id="login" name="login" placeholder="<?php echo $resultData['login']?>" value=""><br>
            <label for="email">Current email:</label><br>
            <input type="text" class="inputfield" id="email" name="email" placeholder="<?php echo $resultData['email']?>" value=""><br>
            <label for="password">New password:</label><br>
            <input type="password" class="inputfield" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
            <label for="password2">Repeat password:</label><br>
            <input type="password" class="inputfield" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"s><br>
            <?php echo "<p class='info'>$info</p>"?>
            <div class="text-center">
                <button type="submit" class="submit">Update my data</button>
            </div>
        </form>

        <div id="message">
            <p class="passList"><b>Password must contain:</b></p>
            <ul class="passList">
                <li class="passList">A lowercase letter</li>
                <li class="passList">An uppercase letter</li>
                <li class="passList">A number</li>
                <li class="passList">Minimum 8 characters</li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-md-7 containerAchievement">
        <div class="row rowAchievement text-center">
            <h3>Your achievements</h3>
            <div class="col-6 col-md-6 achievementRow">
                <img class="achievImage <?php echo $result["movie_achievement1"] ? 'trans' : ''; ?>" src="../assets/achievement1.jpg" alt="Level 1" id="movie1">
                <span>Watched your first movie</span><br>
                <img class="achievImage <?php echo $result["movie_achievement3"] ? 'trans' : ''; ?>" src="../assets/achievement2.jpg" alt="Level 2" id="movie3">
                <span>Watched five movies</span><br>
                <img class="achievImage <?php echo $result["movie_achievement5"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 3" id="movie5">
                <span>Watched ten movies</span><br>
                <img class="achievImage <?php echo $result["contact_achievement"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 1" id="contact">
                <span>Contacted the team</span>
            </div>
            <div class="col-6 col-md-6 achievementRow">
                <img class="achievImage <?php echo $result["comment_achievement1"] ? 'trans' : ''; ?>" src="../assets/achievement1.jpg" alt="Level 1" id="comment1">
                <span>Wrote your first comment</span><br>
                <img class="achievImage <?php echo $result["comment_achievement3"] ? 'trans' : ''; ?>" src="../assets/achievement2.jpg" alt="Level 1" id="comment3">
                <span>Wrote five comments</span><br>
                <img class="achievImage <?php echo $result["comment_achievement5"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 1" id="comment5">
                <span>Wrote ten comments</span><br>
                <img class="achievImage <?php echo $result["achievements_all"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 1" id="all">
                <span>Got all achievements !!</span>
            </div>
        </div>
    </div>
</div>

<footer id="footer">
        <div class="container text-center">
            <div class="row d-flex">
                <div class="col order-md-2 d-none d-sm-block">
                    A collab between <a class="navig-link" href="https://github.com/Dan-DH" target="_blank"
                        rel="noopener">Daniel</a>, <a class=" navig-link" href="https://github.com/Brigilets"
                        target="_blank" rel="noopener">Brigita</a>, <a class=" navig-link"
                        href="https://github.com/ShivaniKhatri96/" target="_blank" rel="noopener">Shivani</a> and <a
                        class=" navig-link" href="https://github.com/teo-cozma" target="_blank"
                        rel="noopener">Teodora</a>.comment_achievement1
                <div class="col-3 order-md-4  text-center hide2">
                    <a href="https://github.com/Brigilets" target="_blank" rel="noopener">
                        <img src="../assets/brigita.jpg" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3 text-center hide2">
                    <a href="https://github.com/Dan-DH" target="_blank" rel="noopener">
                        <img src="../assets/daniIcon.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3 text-center hide2">
                    <a href="https://github.com/teo-cozma" target="_blank" rel="noopener">
                        <img src="../assets/teodora.jpg" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3  text-center hide2">
                    <a href="https://github.com/ShivaniKhatri96" target="_blank" rel="noopener">
                        <img src="../assets/shivaniIcon.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col col-md-12 mt-2 order-md-1">
                    Copyright &#169; 2021
                </div>
            </div>
        </div>
    </footer>
</body>
</html>