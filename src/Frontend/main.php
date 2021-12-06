<?php include('../Backend/PDOserver.php');
    // NB:if user is not logged in, page is inaccessible
    if (empty($_SESSION['username'])){
        header('location: index.php');
    }

//$_SESSION['signup_ach'] = "done";//for testing only, to be removed
//showing achievement on page refresh
if ($_SESSION['signup_ach'] == "done") {
    echo "
    <a class='a_popup' href='./account.php'>
        <div class='achievement_popup'>
        <img class='ach_Img' src='../assets/achievement3.webp' alt='Achievement unlocked'><br>
        <p class='ach_p'>Joined the Chill-Zone</p>
        </div>
    </a>";
    unset($_SESSION['signup_ach']);

    //updating the achievements table
    $user = $_SESSION['username'];
    $account_query = "SELECT u.userID, a.account_achievement FROM users u JOIN achievements a ON u.userID = a.userID WHERE u.login = '$user';";
    $account_stmt = $db->prepare($account_query);
    $account_stmt->execute();
    $account_query_result = $account_stmt->fetch(PDO::FETCH_ASSOC);
    $id = $account_query_result['userID'];
    $account_unlock_query = "UPDATE achievements SET account_achievement = 1 WHERE userID = $id;";
    $account_unl_stmt = $db->prepare($account_unlock_query);
    $account_unl_stmt->execute();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="./style-home.css">
    <style>
        @media screen and (max-width: 560px){
            .logo {
                width: 10rem;
                height: 4rem;
            }
        }
    </style>
    <title>Home page</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-xl navbar-xl">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/Getflix.webp" width="200" height="80" class="logo" alt="getflix-logo">
                </a>
                <button class="navbar-toggler font-color" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-align-justify font-align"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-5 ms-xl-3 ms-xxl-5 me-xl-auto mb-2 mb-xl-0">
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="#comedy">Comedy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="#action">Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="#drama">Drama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="#family">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="#fantasy">Fantasy</a>
                        </li>
                    </ul>
                    <!-- search bar -->
                    <form class="d-flex" action="search-result.php" method="post">
                        <div class="row me-2 ms-4 ms-xl-0 mb-3 mb-xl-0">
                            <div class="col">
                                <input class="collapse search-font" id="searchbar" name="searchbar" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>
                            <div class="col  mt-xl-1">
                                <a data-bs-toggle="collapse" href="#searchbar" role="button" name="search" aria-expanded="false"
                                    aria-controls="searchbar"><i class="fa fa-search white-font font-navbar"></i></a>
                            </div>
                        </div>
                    </form>
                    <!-- notifications -->
                    <div class="nav-item dropdown me-2 ms-5 ms-xl-0">
                        <a class="nav-link white-font" href="#" id="notify" role="button" data-bs-toggle="dropdown"><i
                                class="fa fa-bell white-font font-navbar"></i></a>
                        <ul class="dropdown-menu notify" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item font-notifications" href="#">Check top 10 movies!</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item font-notifications" href="./contact.php">Having trouble?<br> Get help on contact page!</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item font-notifications" href="#">Welcome to Getflix!</a>
                            </li>
                        </ul>
                    </div>
                    <!-- user pages -->
                    <div class="nav-item dropdown me-5 ms-5 ms-xl-0">
                        <a class="nav-link white-font font-navbar" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa fa-id-card white-font"></i>
                        </a>
                        <ul class="dropdown-menu userinfo" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item font-notifications" href="./account.php">Account Page</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item font-notifications" href="./contact.php">Contact Page</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item fw-bold font-notifications" href="index.php?logout='1'" name="logout">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!--Welcome back message-->
    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
        <?php endif ?>
    </div>
    <main>
        <?php if (isset($_POST['searchbar'])): ?>
            <?php 
                // If the user presses enter when the searchbar is activated (on the main page):
                include('../Backend/search.php');
                header('location: ../Frontend/search-result.php');
            ?>
        <?php endif ?>

        <div class="container-fluid">
            <?php
                // declaring variables for db connection
                // development server
                $servername = "database";
                $db_user = "root";
                $db_password = "getflixRoot";
                $dbname = "getflix";

                ///Connecting to the database///
                try{
                    $db= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch (PDOException $e) {
                    echo "Connection failed : " . $e->getMessage();
                }
            ?>
   
            <div class="row" id="topMovies">
                <div class="col-12 font-titles mb-3 ms-3" >
                   Top 10 Movies
                </div>
                <div class="col-12">
                    <div class="carousel0">
                    <?php
                        $query= "Select movieID,image FROM movies ORDER BY rating DESC LIMIT 10;";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                                ?>
                                    <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                        <img src="<?php echo $row['image']; ?>">
                                    </div>
                                <?php
                            }
                    ?>
                    </div>  
                </div>
            </div>

            <div class="row" id="comedy">
                <div class="col-12 font-titles mt-5 mb-3 ms-3" >
                    Comedy
                </div>
                <div class="col-12">
                    <div class="carousel1">
                        <?php
                        $query= "Select movieID,image from movies where genre like '%35%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                        ?>
                            <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                        <?php
                            }
                        ?>
                    </div>  
                </div>
            </div>

            <div class="row" id="action">
                <div class="col-12 font-titles mt-5 mb-3 ms-3">
                        Action
                </div>
                <div class="col-12">
                    <div class="carousel2">
                        <?php
                        $query= "Select movieID,image from movies where genre like '%28%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                        ?>
                            <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                        <?php
                            }
                        ?>
                    </div>  
                </div>
            </div>

            <div class="row" id="drama">
                <div class="col-12 font-titles mt-5 mb-3 ms-3">
                    Drama
                </div>
                <div class="col-12">
                    <div class="carousel3">
                        <?php
                        $query= "Select movieID,image from movies where genre like '%18%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                        ?>
                            <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                        <?php
                            }
                        ?>
                    </div>  
                </div>
               
            <div class="row" id="family">
                <div class="col-12 font-titles mt-5 mb-3 ms-3">
                    Family
                </div>
                <div class="col-12">
                    <div class="carousel4">
                        <?php
                        $query= "Select movieID,image from movies where genre like '%10751%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                        ?>
                            <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                        <?php
                            }
                        ?>
                    </div>  
                </div>
            </div>

            <div class="row" id="fantasy">
                <div class="col-12 font-titles mt-5 mb-3 ms-3">
                    Fantasy
                </div>
                <div class="col-12">
                    <div class="carousel5">
                        <?php
                        $query= "Select movieID,image from movies where genre like '%14%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                        ?>
                            <div class="carousel-cell" data-tab="<?php echo $row['movieID']; ?>">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                        <?php
                            }
                        ?>
                     </div>
                </div> 
             </div> 
            
        </div>
                               
       <?php
             $query= "Select movieID,title,trailer,rating,synopsis from movies";
             $data= $db->query($query);
             $data->setFetchMode(PDO::FETCH_ASSOC);
             foreach($data as $row) {
                ?>
               <section id="<?php echo $row['movieID'] ?>" class="hide">
        <div class="card black-font">
            <div class="d-flex justify-content-end me-4 mt-3">
                <a class="fw-bold xclose" href="#"  onclick="popupClose(<?php echo $row['movieID'] ?>)">X</a>
            </div>
            <div class="d-flex justify-content-center mt-2 mt-md-3 mt-xxl-4 mb-4">
               
                <iframe class="trailer-area" src="<?php echo $row['trailer'] ?>"  allow="fullscreen"  title="movie trailer-<?php echo $row['title'] ?>">
                            </iframe>
            </div>
            <div class="card-body mx-4">
                <h5 class="card-title fs-1"><?php echo $row['title'] ?></h5>
                <p class="card-text">
                <?php echo $row['synopsis'] ?>
                </p>
                <p class="card-text fw-bolder">
                    Rating: <?php echo $row['rating'] ?>
                </p>
                <hr class="fw-bold">
                <div class="mt-5">
                    <form class="card-text">
                        <input type="text" class="form-control py-lg-2 py-xxl-3" id="comment-post" placeholder="Add a public comment...">
                        <div class="d-flex justify-content-end">
                        <input type="submit" class="my-3 submit  px-md-1 py-xl-1 px-xl-2 py-xxl-2 px-xxl-3" value="COMMENT">
                    </form>
                </div>
                <p class="card-text fw-bold">
                   Please pause the video before closing!!! <br> Reload the page if you forget to pause
                </p>
                <p class="card-text fw-light">
                    Previous Comments
                </p>
                <hr class="fw-bold">
            </div>   
        </div>
                </section>
                <?php
                 }
         ?>

 
    </main>
    <footer id="footer" class="my-5">
        <div class="container text-center">
            <div class="row d-flex">
                <div class="col order-sm-2 d-none d-sm-block">
                    A collab between <a class="navig-link2" href="https://github.com/Dan-DH" target="_blank"
                        rel="noopener">Daniel</a>, <a class=" navig-link2" href="https://github.com/Brigilets"
                        target="_blank" rel="noopener">Brigita</a>, <a class=" navig-link2"
                        href="https://github.com/ShivaniKhatri96/" target="_blank" rel="noopener">Shivani</a> and <a
                        class=" navig-link2" href="https://github.com/teo-cozma" target="_blank"
                        rel="noopener">Teodora</a>.
                </div>
                
                <div class="col-3  text-center hide2">
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
                <div class="col col-sm-12 mt-2 order-sm-1">
                    Copyright &#169; 2021
                </div>
            </div>
        </div>
    </footer>   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous">
    </script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="./main.js"></script> 

</body>
</html>