
<?php
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
//  $apikey = "271b40684c0dc7716d75c02906a97e9f";
$genre_id = [14,18,28,35,10751];
$genre = [];
$trailer=[];
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
?>
<?
foreach($genre_id as $id){
      $ct = curl_init();
      // curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/movie/now_playing?api_key=271b40684c0dc7716d75c02906a97e9f&language=en-US&page=1"); 
      curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=271b40684c0dc7716d75c02906a97e9f&with_genres=".$id);
      curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ct, CURLOPT_HEADER, FALSE);
      curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
      $response5 = curl_exec($ct);
      curl_close($ct);
      $result_genre = json_decode($response5);
      foreach($result_genre->results as $p){
            array_push($genre,$p);  
}
}

            // echo "<pre>";
            // print_r($genre) ;
            // echo "</pre>";
// foreach($genre as $id){
//       echo $id->id;
//       echo "<br>";
// }

            foreach($genre as $id){
                  $ct = curl_init();
                  curl_setopt($ct, CURLOPT_URL, "http://api.themoviedb.org/3/movie/".$id->id."/videos?api_key=271b40684c0dc7716d75c02906a97e9f");
                  curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
                  curl_setopt($ct, CURLOPT_HEADER, FALSE);
                  curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
                  $response5 = curl_exec($ct);
                  curl_close($ct);
                  $result_genre = json_decode($response5);
                  foreach($result_genre->results as $p){
                        //    array_push($trailer,$p->key);  
                        // foreach($genre as $gen){
                              // array_push($gen,$p['key']->key);
                        // }
                       
                        if($p->type == "Trailer" && $p->official==true){
                              $id->video= $p->key;
                              // array_push($trailer,$p->key); 
                              break;
                        }
                  }
            }
//             foreach($genre as $id){
//       echo $id->id;
//       echo "<br>";
// }
                 echo "<pre>";
                        print_r($genre);
                        echo "</pre>";
foreach($genre as $id){
      // echo "INSERT INTO movies (title, image, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path',$id->vote_average,'$id->overview');";
      $query = "INSERT INTO movies (title, image, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path',$id->vote_average,'$id->overview');";
      $result = mysqli_query($database, $query);
}
            
foreach($trailer as $key=> $tr){
      // echo "INSERT INTO movies (title, image, rating, synopsis) VALUES ('$id->title','https://image.tmdb.org/t/p/w500$id->poster_path',$id->vote_average,'$id->overview');";
      $query = "Update movies set trailer = 'https://www.youtube.com/watch?v=$tr' where movieID = ".($key).";";
      $result = mysqli_query($database, $query);
}  
      //  $apikey = "271b40684c0dc7716d75c02906a97e9f";
// include ("../movie-api/api_toprated.php");
// foreach($toprated->results as $p){
//   echo "<pre>";
//     print_r($p) ;
//     echo "</pre>";

// }
?>


