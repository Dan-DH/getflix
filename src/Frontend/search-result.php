<?php include('../Backend/PDOserver.php');
        // NB:if user is not logged in, page is inaccessible
    // if (empty($_SESSION['username'])){
    //     header('location: index.php');
    // }
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
    <title>Search results</title>
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
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#action">Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#drama">Drama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#family">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navig-link white-font me-lg-5 fs-5" href="#fantasy">Fantasy</a>
                        </li>

                    </ul>
                    <!-- search bar -->
                    <form class="d-flex" action="" method="post">
                        <div class="row me-2 ms-4 ms-lg-0 mb-3 mb-lg-0">
                            <div class="col">
                                <input class="collapse" id="searchbar" name="searchbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <!-- <input class="form-control collapse" id="searchbar" type="search" placeholder="Search" 
                                        aria-label="Search"> -->
                                    
                            </div>
                            <div class="col  mt-lg-1">
                                <!-- class="btn" -->
                                <a data-bs-toggle="collapse" href="#searchbar" role="button" name="search" aria-expanded="false"
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
                            <li><a class="dropdown-item fw-bold" href="index.php?logout='1'" name="logout">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container-fluid">
            <?php
                // $database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
                // if(!$database){
                //   die("Connection failed: " . mysqli_connect_error());
                // }
                // $query= "Select * from movies";
                // // $query= "Select * from movies where genre=35";
                // // $query ="Select image from movies where movieID = 1";
                // // $query ="SELECT image FROM movies WHERE genre LIKE "%28%";
                // $result = mysqli_query($database, $query);
                // while($data = $result->fetch_assoc()) {}

                // declaring variables for db connection
                // declaring variables for db connection
                // development server
                $servername = "database";
                $db_user = "root";
                $db_password = "getflixRoot";
                $dbname = "getflix";
                // production server
                // $servername = "fdb33.awardspace.net";
                // $db_user = "3998204_getflix";
                // $db_password = "getflixRoot1";
                // $dbname = "3998204_getflix";
                ///Connecting to the database///
                try{
                    $db= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch (PDOException $e) {
                    echo "Connection failed : " . $e->getMessage();
                }
            ?>
        </div>
        <div>
            <h3>
                <?php include('../Backend/errors.php')?>
            </h3>
        

            <div class="search_result">
                <style>
                    .search_result {
                        display: grid;
                        justify-content: center;
                        text-align: justify;
                        margin: 0 auto;
                        padding: 3em;
                    }
                    #trailer {
                        width: 100%;
                    }
                    @media screen and (min-width: 992px) {
                        .search_result{
                            grid-template-columns: auto auto;
                            grid-gap: 2em;
                        }
                    }
                </style>
                    <?php include('search.php')?>
                </div>
                
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>
</html>