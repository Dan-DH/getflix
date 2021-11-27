
<?php
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
//  $apikey = "271b40684c0dc7716d75c02906a97e9f";
$genre_id = [14,18,28,35,10751];
$genre = [];
$trailer=[];
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
//       foreach($genre as $id){
//       if(($id->id) != ($p->id)){
//             array_push($genre,$p);
//       }
// }    
}
}

//   $genre =  array_unique($genre);
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
                            
                              array_push($trailer,$p->key); 
                              continue;
                        }
                  }
            }
            foreach($genre as $id){
      echo $id->id;
      echo "<br>";
}
            //      echo "<pre>";
            //             print_r($trailer);
            //             echo "</pre>";
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


