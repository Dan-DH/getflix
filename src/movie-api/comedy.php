<?php
//saving extra code that I might or might not use again
// $comedy=[];
//       $ct = curl_init();
//       curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=271b40684c0dc7716d75c02906a97e9f&with_genres=35");
//       curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
//       curl_setopt($ct, CURLOPT_HEADER, FALSE);
//       curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
//       $response5 = curl_exec($ct);
//       curl_close($ct);
//       $result_comedy = json_decode($response5);
//       foreach($result_comedy->results as $p){
//             array_push($comedy,$p);  
// }
// foreach($comedy as $com){
//       $ct = curl_init();
//       curl_setopt($ct, CURLOPT_URL, "http://api.themoviedb.org/3/movie/".$com->id."/videos?api_key=271b40684c0dc7716d75c02906a97e9f");
//       curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
//       curl_setopt($ct, CURLOPT_HEADER, FALSE);
//       curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
//       $response5 = curl_exec($ct);
//       curl_close($ct);
//       $result_trailers = json_decode($response5);
//       foreach($result_trailers->results as $p){
//             //    array_push($trailer,$p->key);  
//             // foreach($genre as $gen){
//             //       array_push($gen,$p['key']->key);
//             // }
//             //type == 'Trailer'
//            //&& $p->official==true
//       //      $link = $p->key;
//             if($p->type == 'Trailer' && $p->official==true){
//                   $com->video= $p->key;
//             // $com->trailer= $p->key;
//                   break;  
//             }
           
//       }
// }
// echo "<pre>";
// print_r($comedy);
// echo "</pre>";
// echo "<pre>";
// print_r($trailer);
// echo "</pre>";
// echo sizeof($trailer);



// foreach($trailer as $key=> $tr){
//       // echo "INSERT INTO movies (title, image, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path',$id->vote_average,'$id->overview');";
//       $query = "Update movies set trailer = 'https://www.youtube.com/watch?v=$tr' where movieID = ".($key).";";
//       $result = mysqli_query($database, $query);
// }  
      //  $apikey = "271b40684c0dc7716d75c02906a97e9f";
// include ("../movie-api/api_toprated.php");
// foreach($toprated->results as $p){
//   echo "<pre>";
//     print_r($p) ;
//     echo "</pre>";
// }


                      // echo "<pre>";
                        // print_r($id->genre_ids);
                        // echo "</pre>";
// foreach($genre as $key=> $tr){
//       // echo "INSERT INTO movies (title, image, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path',$id->vote_average,'$id->overview');";
//       $query = "Update movies set trailer = 'https://www.youtube.com/watch?v=$tr' where movieID = ".($key).";";
//       $result = mysqli_query($database, $query);
// }  



// foreach($movies as $id){
//       foreach($id->genre_ids as $i){
//             if($i == 35){
//                   //echo "35: comedy";
//                    $query = "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path','$id->video','$i',$id->vote_average,'$id->overview');";
//                         $result = mysqli_query($database, $query);
//             }
//             if($i == 28){
//                   //echo "28: Action";
//                   $query = "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path','$id->video','$i',$id->vote_average,'$id->overview');";
//                   $result = mysqli_query($database, $query);
//             }
//             if($i == 18){
//                   //echo "18: Drama";
//                   $query = "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path','$id->video','$i',$id->vote_average,'$id->overview');";
//                   $result = mysqli_query($database, $query);
//             }
//             if($i == 10751){
//                   //echo "10751: Family";
//                   $query = "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path','$id->video','$i',$id->vote_average,'$id->overview');";
//                   $result = mysqli_query($database, $query);
//             }
//             if($i == 14){
//                   //echo "14: Fantasy";
//                   $query = "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path','$id->video','$i',$id->vote_average,'$id->overview');";
//                   $result = mysqli_query($database, $query);
//             }
//       } 
// }

// -- DELETE FROM cte
// -- WHERE row_num > 1;

// <!-- <img data-tab="bright" src="http://www.thebrandage.com/assets/image/uploads/haberler/Bright_TUR.jpg"/>


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
?>