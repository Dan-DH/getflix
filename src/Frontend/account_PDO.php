<?php
include('../Backend/resetPassword.php');
//include('../Backend/PDOserver.php');

if (empty($_SESSION['username'])){
    header('location: ../Frontend/index.php');
}
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
        
    <title>Update account information</title>
</head>
<body>
    <div class="navbar">
        <a href="test.php"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>

        <!--<h1>Getflix</h1>-->
        <div class="buttons">
            <a href="./test.php"><button type="button" id="home">Home</button></a>
            <a href="./index.php"><button type="button" id="logout">Log out</button></a>
        </div>
    </div>

    <main>
        <div class="account_content">
            <div class="fill_form">
                <form action="account_PDO.php" method="post">
                    <h2>Change account information</h2>

                    <?php include('../Backend/errors.php'); ?>

                    <input type="text" placeholder="username" class="sf" name="username" value="<?php echo $username; ?>">

                    <input type="text" placeholder="email" class="sf" name="email" value="<?php echo $email; ?>">

                    <input type="password" placeholder="new password" class="sf" name="new_password1" value="<?php echo $new_password1; ?>">

                    <input type="password" placeholder="confirm new password" class="sf" name="new_password2" value="<?php echo $new_password2; ?>">

                    <button type="submit" class="submit" name="update">Update</button>
                    <div class="content">
                        <?php if (isset($_SESSION['username'])): ?>
                            <h3>
                                <?php
                                    echo $_SESSION['updated'];
                                    unset($_SESSION['updated']);
                                ?>
                            </h3>
                        <?php endif ?>
                    </div>
                    <div id="message">
                        <p class="passList"><b>Password must contain:</b></p>
                        <ul class="passList">
                            <li class="passList">Minimum 8 characters</li>
                            <li class="passList">An uppercase letter</li>
                            <li class="passList">A lowercase letter</li>
                            <li class="passList">A number</li>
                        </ul>
                    </div>
                </form>
            </div>

        
            <div class="achievements_board">
                <h3>Your achievements</h3>
                <div>
                    <img class="achievImage <?php echo $result["movie_achievement1"] ? 'trans' : ''; ?>" src="../assets/achievement1.jpg" alt="Level 1" id="movie1">
                    <span>Watched your first movie</span><br>
                    <img class="achievImage <?php echo $result["movie_achievement3"] ? 'trans' : ''; ?>" src="../assets/achievement2.jpg" alt="Level 2" id="movie3">
                    <span>Watched five movies</span><br>
                    <img class="achievImage <?php echo $result["movie_achievement5"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 3" id="movie5">
                    <span>Watched ten movies</span><br>
                    <img class="achievImage <?php echo $result["contact_achievement"] ? 'trans' : ''; ?>" src="../assets/achievement3.jpg" alt="Level 1" id="contact">
                    <span>Contacted the team</span>
                </div>
                <div>
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
    </main>
    <!--
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
            
    </footer>-->
</body>

</html>