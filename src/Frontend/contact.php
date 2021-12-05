<?php 
include_once('../Backend/session.php');
include('../Backend/PDOcomments.php');
if (empty($_SESSION['username'])){
    header('location: ../Frontend/index.php');
}

//contact achievement check
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_SESSION['username'];
    //contact achievement check 
    $contact_query = "SELECT u.userID, a.contact_achievement FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
    $contact_stmt = $db->prepare($contact_query);
    $contact_stmt->execute();
    $contact_query_result = $contact_stmt->fetch(PDO::FETCH_ASSOC);
    $id = $contact_query_result['userID']; 

    if ($contact_query_result['contact_achievement'] == 0) {
        //updating the achievements table
        $contact_unlock_query = "UPDATE achievements SET contact_achievement = 1 WHERE userID = $id;";
        $contact_unl_stmt = $db->prepare($contact_unlock_query);
        $contact_unl_stmt->execute();
        //setting achievement for showing popup after refresh
        $_SESSION['contact_ach'] = "done";
    };
};  

//showing achievement on page refresh
if ($_SESSION['contact_ach'] == "done") {
    echo "
    <a class='a_popup' href='./account.php'>
        <div class='achievement_popup'>
        <img class='ach_Img' src='../assets/achievement3.webp' alt='Achievement unlocked'><br>
        <p class='ach_p'>Contacted the team</p>
        </div>
    </a>";
    unset($_SESSION['contact_ach']);
}
?>

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

<div class="navbar">
    <a href="./main.php"><img src="../assets/Getflix.webp" width="200rem" height="80rem" class="logo"></a>
    <div class="buttons">
        <a href="./main.php"><button type="button" id="home">HOME</button></a>
        <?php if (isset($_SESSION['username'])): ?>
                <a href="contact.php?logout='1'" name="logout">
                    <button type="button" id="logout">LOG OUT</button>
                </a>
        <?php endif ?>
    </div>
</div>


<main>
    <div class="fill_form">
        <form action="contact.php" method="post">
            <h2>Contact Us</h2><br>
            <?php include('../Backend/errors.php') ?>

            <input type="text" name="name" placeholder='Please, enter your name' id="name" href="index.php" class="sf" value="<?php echo $name; ?>">
            <input type="text" name="email" placeholder="Please, enter your email" id="email" href="home.php" class="sf" value="<?php echo $email; ?>">
        
            <!--<label for="issue_type" >-->
                <select name="issue" id="issue_type" class="sf" value="<?php echo $issue; ?>">
                    <option value="">Please, specify your issue</option>
                    <option value="movies not loading">Movies not loading</option>
                    <option value="cannot update my profile">Cannot update my profile info</option>
                    <option value="other">Other</option>
                </select>
            <!--</label>-->
            <textarea name="message" id="problem" class="sf" placeholder="Tell us more about your issue" value="<?php echo $message; ?>"></textarea>
            <br>
            <button type="submit" name="send" id='send' class="submit">Send</button>

            <!-- <div class="content">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="error success">
                        <h3>
                            <?php
                                // echo $_SESSION['sent'];
                                // unset($_SESSION['sent']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
            </div>  -->
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