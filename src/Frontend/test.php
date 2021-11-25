<?php include('../Backend/server.php');
//if user is not logged in, page is inaccessible
    if (empty($_SESSION['username'])){
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
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
    <link rel="stylesheet" href="./style-home.css">
    <title>Home page (test) </title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-bg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/Getflix.png" width="200rem" height="80rem">
                </a>
                <button class="navbar-toggler font-color" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-align-justify font-align"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-5 me-lg-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font  me-lg-5 fs-5" href="#comedy">Comedy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#">Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#">Drama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#">Fantasy</a>
                        </li>

                    </ul>
                    <!-- search bar -->
                    <form class="d-flex" action="" method="post">
                        <div class="row me-2 ms-4 ms-lg-0 mb-3 mb-lg-0">
                            <div class="col">
                                <input class="collapse" id="searchbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <!-- <input class="form-control collapse" id="searchbar" type="search" placeholder="Search" 
                                        aria-label="Search"> -->
                            </div>
                            <div class="col  mt-lg-1">
                                <!-- class="btn" -->
                                <a data-bs-toggle="collapse" href="#searchbar" role="button" aria-expanded="false"
                                    aria-controls="searchbar"><i class="fa fa-search white-font fs-5"></i></a>
                            </div>
                        </div>
                    </form>
                    <!-- notifications -->
                    <div class="nav-item dropdown me-2 ms-5 ms-lg-0">
                        <a class="nav-link white-font" href="#" id="notify" role="button" data-bs-toggle="dropdown"><i
                                class="fa fa-bell white-font fs-5"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">notification 1</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">notification 2</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">notification 3</a>
                            </li>
                        </ul>
                    </div>
                    <!-- user pages -->
                    <div class="nav-item dropdown me-5 ms-5 ms-lg-0">
                        <a class="nav-link white-font fs-5" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa fa-id-card white-font"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./account.php">Account Page</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./contact.php">Contact Page</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item fw-bold" href="login.php" name="logout" href="login.php?logout='1'"> <strong>Log out</strong> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

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

        <?php if (isset($_SESSION['username'])): ?>
            <h3>Ready to chill?</h3>
        <?php endif ?>
    </div> 

    <div>
        <h3 id="comedy">Comedy</h3>
    </div>
<!-- <main>
<ul class="pic">
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
      <li><a href="#"><img src="http://www.google.com.au/intl/en_com/images/srpr/logo1w.png" width="150" height="150"/></a></li>
    </ul>
    </main> -->
    <footer id="footer">
        <div class="container text-center">
            <div class="row d-flex">
                <div class="col order-md-2 d-none d-sm-block">
                    A collab between <a class="navig-link" href="https://github.com/Dan-DH" target="_blank"
                        rel="noopener">Daniel</a>, <a class=" navig-link" href="https://github.com/Brigilets"
                        target="_blank" rel="noopener">Brigita</a>, <a class=" navig-link"
                        href="https://github.com/ShivaniKhatri96/" target="_blank" rel="noopener">Shivani</a> and <a
                        class=" navig-link" href="https://github.com/teo-cozma" target="_blank"
                        rel="noopener">Teodora</a>.
                </div>
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
                <div class="col-3  text-center hide2">
                    <a href="https://github.com/ShivaniKhatri96" target="_blank" rel="noopener">
                        <img src="../assets/shivaniIcon.webp" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col-3 text-center hide2">
                    <a href="https://github.com/teo-cozma" target="_blank" rel="noopener">
                        <img src="../assets/teodora.jpg" alt="githubLink" class="portrait">
                    </a>
                </div>
                <div class="col col-md-12 mt-2 order-md-1">
                    Copyright &#169; 2021
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        
</body>

</html>


