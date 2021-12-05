<?php include('../Backend/PDOserver.php');
        // NB:if user is not logged in, page is inaccessible
    if (empty($_SESSION['username'])){
        header('location: index.php');
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
    <title>Search results</title>
    <style>
        .search_result {
            display: grid;
            grid-template-columns: auto auto;
            justify-content: center;
            text-align: justify;
            margin: 0 auto;
            padding: 0.5em 5em;
            grid-gap: 3em;
        }
        .poster {
            width: 100%;
            display: grid;
            justify-content: center;
        }
        .trailer {
            width: 100%;
            height: 50%;
        }
        .syn {
            overflow: scroll;
            height: 20%;
        }
        .search-error {
            text-align: center;
        }
        @media screen and (min-width: 1500px) {
            .trailer {
                width: 100%;
                height: 70%;
            }
        }
        @media screen and (max-width: 886px) and (min-width: 460px) {
            .search_result{
                grid-template-columns: auto;
                grid-gap: 2em;
            }
            .poster {
                width: 100%;
                margin-top:3em;
            }
            .trailer {
                width: 100%;
                height: 70%;
            }    
            .syn {
                overflow: scroll;
                height: 20%;
                padding-bottom: 2em;
            }
        }
        @media screen and (max-width: 560px){
            .logo{
                width: 10rem;
                height: 4rem;
            }
        }
        @media screen and (max-width: 460px){
            .search_result{
                grid-template-columns: auto;
                grid-gap: 2em;
                padding: 1em;
            }
            .trailer {
                width: 100%;
                height: 40%;
            }
            .syn {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
<header>

<nav class="navbar navbar-expand-xl navbar-xl">
    <div class="container-fluid">
        <a class="navbar-brand" href="./main.php">
            <img src="../assets/Getflix.webp" width="200rem" height="80rem" class="logo">
        </a>
        <button class="navbar-toggler font-color" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify font-align"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-5 ms-xl-3 ms-xxl-5 me-xl-auto mb-2 mb-xl-0">
                <li class="nav-item">
                    <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="../Frontend/main.php#comedy">Comedy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="../Frontend/main.php#action">Action</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="../Frontend/main.php#drama">Drama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="../Frontend/main.php#family">Family</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navig-link white-font me-xl-3 me-xxl-5 font-navbar" href="../Frontend/main.php#fantasy">Fantasy</a>
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
                        <a class="dropdown-item font-notifications" href="#">Having trouble?<br> Get help on contact page!</a>
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
    <main>
        <?php
            $servername = "database";
            $db_user = "root";
            $db_password = "getflixRoot";
            $dbname = "getflix";
            try{
                $db= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo "Connection failed : " . $e->getMessage();
            }
        ?>
        <div>
            <div class="search_result"> 
                <?php include('../Backend/search.php')?>
                <h3 class="search-error"><?php include('../Backend/errors.php')?></h3>
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