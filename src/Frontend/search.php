<?php 
//actual code
//$id = $_SESSION["userID"];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="./style-home.css">
    <title>Document</title>
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
                            <li><a class="dropdown-item fw-bold" href="login.php?logout='1'" name="logout">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
<main>
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

    <div>
        <?php echo '<h3 id="comedy">Results for: ' . $search . ' </h3>';?>
    </div>
    <div class="carousel" data-flickity='{ "groupCells": true}'>
    <div class="carousel-cell">
    <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="avatar" src="https://i.pinimg.com/736x/a4/23/f8/a423f86593029b7d2a6d9f1e1fd1e406---movies-movies-to-watch-online.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="thor" src="https://mikeantjones.files.wordpress.com/2012/04/thor-film-poster.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="john" src="https://images-na.ssl-images-amazon.com/images/I/91H06HPhX%2BL._SY717_.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="deadpool2" src="https://icdn3.digitaltrends.com/image/deadpool-2-thanksgiving-poster-1294x2048.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="fight" src="https://i.pinimg.com/736x/fd/5e/66/fd5e662dce1a3a8cd192a5952fa64f02--classic-poster-classic-movies-posters.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>
    <div class="carousel-cell">
    <img data-tab="avatar" src="https://i.pinimg.com/736x/a4/23/f8/a423f86593029b7d2a6d9f1e1fd1e406---movies-movies-to-watch-online.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="thor" src="https://mikeantjones.files.wordpress.com/2012/04/thor-film-poster.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="john" src="https://images-na.ssl-images-amazon.com/images/I/91H06HPhX%2BL._SY717_.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="deadpool2" src="https://icdn3.digitaltrends.com/image/deadpool-2-thanksgiving-poster-1294x2048.jpg"/>
    </div>
    <div class="carousel-cell">
    <img data-tab="fight" src="https://i.pinimg.com/736x/fd/5e/66/fd5e662dce1a3a8cd192a5952fa64f02--classic-poster-classic-movies-posters.jpg"/>
    </div>
    </div>

    </main>
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
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>

</html>

