<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="items">
<div class="carouselOfImages">
  <div class="carouselImage" style="background-size:cover;">
    <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>
  </div>
  <div class="carouselImage" style="background-size:cover;">
    <img data-tab="avatar" src="https://i.pinimg.com/736x/a4/23/f8/a423f86593029b7d2a6d9f1e1fd1e406---movies-movies-to-watch-online.jpg"/>
  </div>
  <div class="carouselImage" style="background-size:cover;">
    <img data-tab="thor" src="https://mikeantjones.files.wordpress.com/2012/04/thor-film-poster.jpg"/>
  </div>
   <div class="carouselImage" style="background-size:cover;">
    <img data-tab="john" src="https://images-na.ssl-images-amazon.com/images/I/91H06HPhX%2BL._SY717_.jpg"/>
  </div>
   <div class="carouselImage" style="background-size:cover;">
    <img data-tab="deadpool2" src="https://icdn3.digitaltrends.com/image/deadpool-2-thanksgiving-poster-1294x2048.jpg"/>
  </div>
   <div class="carouselImage" style="background-size:cover;">
    <img data-tab="fight" src="https://i.pinimg.com/736x/fd/5e/66/fd5e662dce1a3a8cd192a5952fa64f02--classic-poster-classic-movies-posters.jpg"/>
  </div>
</div>


// <div class="carousel-cell">
// <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="avatar" src="https://i.pinimg.com/736x/a4/23/f8/a423f86593029b7d2a6d9f1e1fd1e406---movies-movies-to-watch-online.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="thor" src="https://mikeantjones.files.wordpress.com/2012/04/thor-film-poster.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="john" src="https://images-na.ssl-images-amazon.com/images/I/91H06HPhX%2BL._SY717_.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="deadpool2" src="https://icdn3.digitaltrends.com/image/deadpool-2-thanksgiving-poster-1294x2048.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="fight" src="https://i.pinimg.com/736x/fd/5e/66/fd5e662dce1a3a8cd192a5952fa64f02--classic-poster-classic-movies-posters.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="avatar" src="https://i.pinimg.com/736x/a4/23/f8/a423f86593029b7d2a6d9f1e1fd1e406---movies-movies-to-watch-online.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="thor" src="https://mikeantjones.files.wordpress.com/2012/04/thor-film-poster.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="john" src="https://images-na.ssl-images-amazon.com/images/I/91H06HPhX%2BL._SY717_.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="deadpool2" src="https://icdn3.digitaltrends.com/image/deadpool-2-thanksgiving-poster-1294x2048.jpg"/>
// </div>
// <div class="carousel-cell">
// <img data-tab="fight" src="https://i.pinimg.com/736x/fd/5e/66/fd5e662dce1a3a8cd192a5952fa64f02--classic-poster-classic-movies-posters.jpg"/>
// </div> -->
</section>
</body>
</html> -->
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
// while($data = $result->fetch_assoc()) {
//   ?>
<!-- //   <div class="carousel-cell">
// <img src="<?php echo $data['image']; ?>" width="100" height="100"> 
// </div>
     <?php
  //  } -->
  ?> 
     <div>
        <h3 id="comedy">Comedy</h3>
    </div> -->

    <!-- <div class="carousel" data-flickity='{ "groupCells": true, "wrapAround":true }'> -->

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
// $servername = "database";
// $db_user = "root";
// $db_password = "getflixRoot";
// $dbname = "getflix";
// ///Connecting to the database///
// try{
//     $db= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $e) {
//     echo "Connection failed : " . $e->getMessage();
// }
// $query= "Select image from movies where genre like '%35%'";
// $data= $db->query($query);
// $data->setFetchMode(PDO::FETCH_ASSOC);
// foreach($data as $row) {
//     foreach($row as $name=>$value){
//         ?>
<!-- //         <div class="carousel-cell">
//         <img src="<?php echo $value; ?>">
//         </div>
//         <?php 
//     }
// }

?>

</div>


<div class="card black-font" style="width: 1000px;">
            <div class="d-flex justify-content-end me-4 mt-3">
                <a class="fw-bold fs-5" href="#">X</a>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
                <iframe src="https://www.youtube.com/embed/8YjFbMbfXaQ?rel=0&showinfo=0&wmode=opaque&html5=1" allow="fullscreen" width="900px" height="500px" title="movie trailer">
                </iframe>
            </div>
            <div class="card-body">
                <h5 class="card-title fs-1 ms-4">Bright</h5>
                <p class="card-text ms-4">
                    The Abundant Life Bible offers readers insights about living the abundant life through a relationship with Jesus Christ. Topics such as joy, peace, dealing with life's tough issues, and more offer practical guidance for daily life. The Abundant Life Bible is value priced—perfect for gift giving.
                </p>
                <p class="card-text ms-4 fw-bolder">
                    Rating:
                </p>
                <hr class="fw-bold ms-4">
                <div class="ms-4 mt-5">
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

           <div class="card-body">
                <h5 class="card-title fs-1 ms-4">Bright</h5>
                <p class="card-text ms-4">
                    The Abundant Life Bible offers readers insights about living the abundant life through a relationship with Jesus Christ. Topics such as joy, peace, dealing with life's tough issues, and more offer practical guidance for daily life. The Abundant Life Bible is value priced—perfect for gift giving.
                </p>
                <p class="card-text ms-4 fw-bolder">
                    Rating:
                </p>
                <hr class="fw-bold ms-4">
                <div class="ms-4 mt-5">
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