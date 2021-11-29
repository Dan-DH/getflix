<?php 
$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
$apikey = "271b40684c0dc7716d75c02906a97e9f";
$genre_id = [14,18,28,35,10751];
$genre = [];
$movies=[];

foreach($genre_id as $id){
      $ct = curl_init(); 
      curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=271b40684c0dc7716d75c02906a97e9f&with_genres=".$id);
      curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ct, CURLOPT_HEADER, FALSE);
      curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
      $response5 = curl_exec($ct);
      curl_close($ct);
      $result_genre = json_decode($response5);
      foreach($result_genre->results as $p){
            array_push($genre,$p);  
      };
};

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
            if($p->type == "Trailer" && $p->official==true){
                  $id->video= 'https://www.youtube.com/watch?v='.$p->key;
                  // $id->trailer= $p->key;
                  break;
            }
      };
};
            
foreach($genre as $id){
      $query = "INSERT INTO movies (title, 
      image, 
      trailer, 
      genre, 
      rating, 
      synopsis) VALUES ('$id->title',
      'https://image.tmdb.org/t/p/w500$id->poster_path',
      '$id->video',
      '".implode(",",$id->genre_ids)."',
      $id->vote_average,
      '$id->overview')";
      $result = mysqli_query($database, $query);
};
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
echo "<pre>";
print_r($genre);
echo "</pre>";



