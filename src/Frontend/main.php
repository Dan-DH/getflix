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
    <title>Home page</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-bg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/Getflix.webp" width="200rem" height="80rem">
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
                    <form class="d-flex" action="search-result.php" method="post">
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
                include('search.php');
                header('location: ../Frontend/search-result.php');
            ?>
            <h3 class="search-error" style="text-align: center">
                <?php include('../Backend/errors.php');?>
            </h3> 
        <?php endif ?>

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
            <div class="row" id="comedy">
                <div class="col-12 fs-4 mb-3 ms-3" >
                    Comedy
                </div>
                <div class="col-12 carousel" data-flickity='{ "groupCells": true, "wrapAround":true }' >
                    <?php
                        $query= "Select image from movies where genre like '%35%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                                foreach($row as $name=>$value){
                                    ?>
                                        <div class="carousel-cell">
                                                <img src="<?php echo $value; ?>">
                                        </div>
                                    <?php
                                }
                        }
                    ?>
                </div>
            </div>
            <div class="row" id="action">
                <div class="col-12 fs-4 mt-5 mb-3 ms-3">
                        Action
                </div>
                <div class="col-12 carousel" data-flickity='{ "groupCells": true, "wrapAround":true }'>
                    <?php
                        $query= "Select image from movies where genre like '%28%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                            foreach($row as $name=>$value){
                                ?>
                                    <div class="carousel-cell">
                                        <img src="<?php echo $value; ?>">
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row" id="drama">
                <div class="col-12 fs-4 mt-5 mb-3 ms-3">
                    Drama
                </div>
                <div class="col-12 carousel" data-flickity='{ "groupCells": true, "wrapAround":true }'>
                    <?php
                        $query= "Select image from movies where genre like '%18%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                            foreach($row as $name=>$value){
                                ?>
                                    <div class="carousel-cell">
                                         <img src="<?php echo $value; ?>">
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row" id="family">
                <div class="col-12 fs-4 mt-5 mb-3 ms-3">
                    Family
                </div>
                <div class="col-12 carousel" data-flickity='{ "groupCells": true, "wrapAround":true }'>
                    <?php
                        $query= "Select image from movies where genre like '%10751%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                            foreach($row as $name=>$value){
                                ?>
                                    <div class="carousel-cell">
                                        <img src="<?php echo $value; ?>">
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row" id="fantasy">
                <div class="col-12 fs-4 mt-5 mb-3 ms-3">
                    Fantasy
                </div>
                <div class="col-12 carousel" data-flickity='{ "groupCells": true, "wrapAround":true }'>
                    <!-- test movie that needs to be removed later -->
                <div class="carousel-cell">
                      <img data-tab="bright" id="open"  onclick= "popupOpen()" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg" onclick="popup()"/>
                    </div>
                    <!-- test movie that needs to be removed later -->
                    <?php
                        $query= "Select image from movies where genre like '%14%'";
                        $data= $db->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row) {
                            foreach($row as $name=>$value){
                                ?>
                                    <div class="carousel-cell">
                                        <img src="<?php echo $value; ?>">
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="popup">
        <div class="card black-font">
            <div class="d-flex justify-content-end me-4 mt-3">
                <a class="fw-bold fs-5" href="#" id="closePopup" onclick="popupClose()">X</a>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
                <!-- width="900px" height="500px" -->
                <iframe id="trailer-area" src="https://www.youtube.com/embed/8YjFbMbfXaQ?rel=0&showinfo=0&wmode=opaque&html5=1"  allow="fullscreen"  title="movie trailer">
                </iframe>
            </div>
            <div class="card-body mx-4">
                <h5 class="card-title fs-1">Bright</h5>
                <p class="card-text">
                    The Abundant Life Bible offers readers insights about living the abundant life through a relationship with Jesus Christ. Topics such as joy, peace, dealing with life's tough issues, and more offer practical guidance for daily life. The Abundant Life Bible is value priced—perfect for gift giving.
                </p>
                <p class="card-text fw-bolder">
                    Rating:
                </p>
                <hr class="fw-bold">
                <div class="mt-5">
                    <form class="card-text">
                        <input type="text" class="form-control py-3" id="comment-post" placeholder="Add a public comment...">
                        <div class="d-flex justify-content-end">
                        <input type="submit" class="my-3 submit py-2 px-3" value="COMMENT">
                    </form>
                </div>
                <p class="card-text fw-light">
                    Previous Comments
                </p>
                <hr class="fw-bold">
            </div>   
        </div>
    </div>
        
    </main>
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
    <script>
        function popupOpen() {
            let open = document.getElementById("open");
            popup.style.display = "inline";
        }
        function popupClose() {
            let close = document.getElementById("closePopup");
            if (popup.style.display === "none") {
                popup.style.display = "block";
            }
            else {
                popup.style.display= "none";
            }
        }
     </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>
</html>