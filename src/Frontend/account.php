<?php 
include_once('../Backend/session.php');

if (empty($_SESSION['username'])){
    header('location: ../Frontend/index.php');
}

include_once "../api/Database.php";
$database = new Database();
$db = $database->connect();

//show user data and achievements
$user = $_SESSION['username'];
$query = "SELECT u.*, a.* FROM getflix.users u JOIN getflix.achievements a ON u.userID = a.userID WHERE u.login = '$user';";
$stmt = $db->prepare($query);
$stmt->execute();
$resultData = $stmt->fetch(PDO::FETCH_ASSOC);

// update account info
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = strip_tags($_POST['login']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password2 = strip_tags($_POST['password2']);

    //error checks
    $info = [];
    $password != $password2 ? array_push($info, "Passwords must match") : true;

    if (isset($login) || isset($email)) {
        //checking if new username or password already exists
       $check = $db->prepare("SELECT * FROM users WHERE login='$login' OR email='$email';");
       $check->execute();
       $checkResult = $check->fetch(PDO::FETCH_ASSOC);
       $check->rowCount() > 0 ? array_push($info, "Login or email already in use") : true;
    };

    //if no errors are found
    if (count($info) == 0) {
        //adding data to array if not null
        $newValues = [];
        foreach ($_POST as $k => $v) {
            $v != null ? $newValues[$k] = $v : true;
        };

        //removing second password from array
        array_key_exists('password2', $newValues) ? array_pop($newValues): true;

        //updating the database
        foreach ($newValues as $k => $v) {
            $update_stmt=$db->prepare("UPDATE users SET $k = '$v' WHERE login = '$user';");
            $update_stmt->execute();
        };

        //updating username in SESSION if needed
        if (!empty($login)) {
            $_SESSION['username'] = $login;
            $user = $_SESSION['username'];
        };

        //updating form fields
        $query = "SELECT * FROM users WHERE login = '$user';";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        $info = "Your data has been updated";
    }   
};
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
        <a href="./main.php"><h1>Getflix</h1></a>
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
            <input type="password" class="inputfield" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 characters"><br>
            <?php if ($info[0] == "Login or email already in use") {
                echo "<p class='info'>Login or email already in use</p>";
            } elseif ($info[0] == "Passwords must match") {
                echo "<p class='info'>Passwords must match</p>";
            } else {
                echo "<p class='info'>$info</p>";
            } ?>
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
                <li class="passList">Minimum 6 characters</li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-md-6 containerAchievement">
        <div class="row rowAchievement">
            <h3>Your achievements</h3>
            <div class="col-6 col-md-6 achievementCol text-center">
                <img class="achievImage <?php echo $resultData["movie_achievement1"] ? 'trans' : ''; ?>" src="../assets/achievement1.webp" alt="Level 1" id="movie1"><br>
                <span>Checked your first movie</span><br>
                <img class="achievImage <?php echo $resultData["movie_achievement3"] ? 'trans' : ''; ?>" src="../assets/achievement2.webp" alt="Level 2" id="movie3"><br>
                <span>Checked three movies</span><br>
                <img class="achievImage <?php echo $resultData["movie_achievement5"] ? 'trans' : ''; ?>" src="../assets/achievement3.webp" alt="Level 3" id="movie5"><br>
                <span>Checked five movies</span><br>
                <img class="achievImage <?php echo $resultData["contact_achievement"] ? 'trans' : ''; ?>" src="../assets/achievement3.webp" alt="Level 1" id="contact"><br>
                <span>Contacted the team</span>
            </div>
            <div class="col-6 col-md-6 achievementCol">
                <img class="achievImage <?php echo $resultData["comment_achievement1"] ? 'trans' : ''; ?>" src="../assets/achievement1.webp" alt="Level 1" id="comment1"><br>
                <span>Wrote your first comment</span><br>
                <img class="achievImage <?php echo $resultData["comment_achievement3"] ? 'trans' : ''; ?>" src="../assets/achievement2.webp" alt="Level 1" id="comment3"><br>
                <span>Wrote three comments</span><br>
                <img class="achievImage <?php echo $resultData["comment_achievement5"] ? 'trans' : ''; ?>" src="../assets/achievement3.webp" alt="Level 1" id="comment5"><br>
                <span>Wrote five comments</span><br>
                <img class="achievImage <?php echo $resultData["account_achievement"] ? 'trans' : ''; ?>" src="../assets/achievement3.webp" alt="Level 1" id="all"><br>
                <span>Joined the Chill-Zone</span>
            </div>
        </div>
    </div>
</div>


<!-- pop up example -comments-->
<?php
$user = $_SESSION['username'];
//comment count increase
$c_increase = "UPDATE users SET comment_count = comment_count +1 WHERE login = '$user';"; //this triggers on comment sent
$c_inc_stmt = $db->prepare($c_increase);
$c_inc_stmt->execute();
//comment achievement check
$c_ach_query = "SELECT u.*, a.* FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
$c_ach_stmt = $db->prepare($c_ach_query);
$c_ach_stmt->execute();
$c_query_result = $c_ach_stmt->fetch(PDO::FETCH_ASSOC);
$id = $c_query_result['userID'];

if ($c_query_result['comment_count'] == 1 || $c_query_result['comment_count'] == 3 || $c_query_result['comment_count'] ==5)  {
    //setting popup arrays
    $c_image_array = array(1=>"../assets/achievement1.webp", 3=>"../assets/achievement2.webp", 5=>"../assets/achievement3.webp");
    $c_text_array = array(1=>"Wrote your first comment", 3=>"Wrote three comments", 5=>"Wrote five comments");
    $c_ach_array = array(1=>"comment_achievement1", 3=>"comment_achievement3", 5=>"comment_achievement5");
    $c_ach_img = $c_image_array[$c_query_result['comment_count']];
    $c_ach_text = $c_text_array[$c_query_result['comment_count']];
    $c_ach_table = $c_ach_array[$c_query_result['comment_count']];

    //showing achievement popup
    echo "
        <a class='a_popup' href='./main.php'>
            <div class='achievement_popup'>
            <img class='ach_Img' src= $c_ach_img alt='Achievement unlocked'><br>
            <p class='ach_p'>$c_ach_text</p>
            </div>
        </a>";
    //updating the achievements table
    $c_unlock_query = "UPDATE achievements SET $c_ach_table = 1 WHERE userID = $id;";
    $c_unl_stmt = $db->prepare($c_unlock_query);
    $c_unl_stmt->execute();
};      
?>

<!-- pop up example -trailers-->
<?php
$user = $_SESSION['username'];
//trailer count increase
$t_increase = "UPDATE users SET trailer_count = trailer_count +1 WHERE login = '$user';"; //this triggers on trailer sent
$t_inc_stmt = $db->prepare($t_increase);
$t_inc_stmt->execute();
//trailer achievement check
$t_ach_query = "SELECT u.*, a.* FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
$t_ach_stmt = $db->prepare($t_ach_query);
$t_ach_stmt->execute();
$t_query_result = $t_ach_stmt->fetch(PDO::FETCH_ASSOC);
$id = $t_query_result['userID']; 

if ($t_query_result['trailer_count'] == 1 || $t_query_result['trailer_count'] == 3 || $t_query_result['trailer_count'] ==5)  {
    //setting popup arrays
    $t_image_array = array(1=>"../assets/achievement1.webp", 3=>"../assets/achievement2.webp", 5=>"../assets/achievement3.webp");
    $t_text_array = array(1=>"Checked your first movie", 3=>"Checked three movies", 5=>"Checked five movies");
    $t_ach_array = array(1=>"movie_achievement1", 3=>"movie_achievement3", 5=>"movie_achievement5");
    $t_ach_img = $t_image_array[$t_query_result['trailer_count']];
    $t_ach_text = $t_text_array[$t_query_result['trailer_count']];
    $t_ach_table = $t_ach_array[$t_query_result['trailer_count']];

    //showing achievement popup
    echo "
        <a class='a_popup' href='./main.php'>
            <div class='achievement_popup'>
            <img class='ach_Img' src= $t_ach_img alt='Achievement unlocked'><br>
            <p class='ach_p'>$t_ach_text</p>
            </div>
        </a>";
    //updating the achievements table
    $t_unlock_query = "UPDATE achievements SET $t_ach_table = 1 WHERE userID = $id;";
    $t_unl_stmt = $db->prepare($t_unlock_query);
    $t_unl_stmt->execute();
};      
?>

<!-- pop up example -contact-->
<?php
$user = $_SESSION['username'];
//contact achievement check 
$contact_query = "SELECT u.userID, a.contact_achievement FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
$contact_stmt = $db->prepare($contact_query);
$contact_stmt->execute();
$contact_query_result = $contact_stmt->fetch(PDO::FETCH_ASSOC);
$id = $contact_query_result['userID']; 

if ($contact_query_result['contact_achievement'] == 0) {
    //showing achievement popup
    echo "
        <a class='a_popup' href='./main.php'>
            <div class='achievement_popup'>
            <img class='ach_Img' src='../assets/achievement3.webp' alt='Achievement unlocked'><br>
            <p class='ach_p'>'Contacted the team'</p>
            </div>
        </a>";

    //updating the achievements table
    $contact_unlock_query = "UPDATE achievements SET contact_achievement = 1 WHERE userID = $id;";
    $contact_unl_stmt = $db->prepare($contact_unlock_query);
    $contact_unl_stmt->execute();
};      
?>

<!-- pop up example -sign-up-->
<?php
//on page load
$user = $_SESSION['username'];
//new account achievement check 
$account_query = "SELECT u.userID, a.account_achievement FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
$account_stmt = $db->prepare($account_query);
$account_stmt->execute();
$account_query_result = $account_stmt->fetch(PDO::FETCH_ASSOC);
$id = $account_query_result['userID']; 

if ($account_query_result['account_achievement'] == 0) {
    //showing achievement popup
    echo "
        <a class='a_popup' href='./main.php'>
            <div class='achievement_popup'>
            <img class='ach_Img' src='../assets/achievement3.webp' alt='Achievement unlocked'><br>
            <p class='ach_p'>'Joined the Chill-Zone'</p>
            </div>
        </a>";

    //updating the achievements table
    $account_unlock_query = "UPDATE achievements SET account_achievement = 1 WHERE userID = $id;";
    $account_unl_stmt = $db->prepare($account_unlock_query);
    $account_unl_stmt->execute();
};      
?>
<!-- pop up example -->


    <footer id="footer">
        <div class="container text-center">
            <div class="row d-flex">
                <div class="col order-md-2 d-none d-sm-block">
                    A collab between <a class="navig-link2" href="https://github.com/Dan-DH" target="_blank"
                        rel="noopener">Daniel</a>, <a class=" navig-link2" href="https://github.com/Brigilets"
                        target="_blank" rel="noopener">Brigita</a>, <a class=" navig-link2"
                        href="https://github.com/ShivaniKhatri96/" target="_blank" rel="noopener">Shivani</a> and <a
                        class=" navig-link2" href="https://github.com/teo-cozma" target="_blank"
                        rel="noopener">Teodora</a>.
                </div>
                <div class="col-3 order-md-4  text-center hide2">
                    <a href="https://github.com/Brigilets" target="_blank" rel="noopener">
                        <img src="../assets/brigita.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3 text-center hide2">
                    <a href="https://github.com/Dan-DH" target="_blank" rel="noopener">
                        <img src="../assets/daniIcon.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3  text-center hide2">
                    <a href="https://github.com/ShivaniKhatri96" target="_blank" rel="noopener">
                        <img src="../assets/shivaniIcon.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3 text-center hide2">
                    <a href="https://github.com/teo-cozma" target="_blank" rel="noopener">
                        <img src="../assets/teodora.webp" alt="githubLink" class="portrait">
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