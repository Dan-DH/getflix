<?php 

$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
if(!$database){
      die("Connection failed: " . mysqli_connect_error());
    }
/*
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";
///Connecting to the database///
try{
      $db= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
      echo "Connection failed : " . $e->getMessage();
}*/

$apikey = "271b40684c0dc7716d75c02906a97e9f";
$genre_id = [14,18,28,35,10751];
//35: comedy,28: Action,18: Drama,10751: Family,14: Fantasy
$genre = [];
$filtered=[];
$movies=[];

//getting movies from tmdb Api and pushing to genre array
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
}
}
//removing the movies that are repeated in the genre array
$filtered= array_intersect_key($genre, array_unique(array_column($genre,'id')));

//adding trailer to each movie in the filtered array
foreach($filtered as $id){
      $ct = curl_init();
      curl_setopt($ct, CURLOPT_URL, "http://api.themoviedb.org/3/movie/".$id->id."/videos?api_key=271b40684c0dc7716d75c02906a97e9f");
      curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ct, CURLOPT_HEADER, FALSE);
      curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
      $response5 = curl_exec($ct);
      curl_close($ct);
      $result_filtered = json_decode($response5);
      foreach($result_filtered->results as $p){
            if($p->type == "Trailer" && $p->official==true){
                   $id->video= 'https://www.youtube.com/watch?v='.$p->key;
                  // $id->trailer= $p->key;
                    break;
             }
       }
 }

//removing the movies without trailers in them from filtered array
foreach($filtered as $id){
      if($id->video != ""){
            array_push($movies,$id);
      }
}   
//adding movies from movies array to database  
//$total = [];
//$data = [];

foreach($movies as $id){
     /* $data = [
            $id->title,
            'https://image.tmdb.org/t/p/w500'. $id->poster_path,
            $id->video,
            ".implode(",",$id->genre_ids).",
            $id->vote_average,
            $id->overview
      ];

      array_push($total, $data);
      echo $data;
     */

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
      //$db->prepare($query)->execute([$id->title, 'https://image.tmdb.org/t/p/w500'$id->poster_path, $id->video])
};
//echo $total;
/*
      $query = "INSERT INTO movies (title, 
      image, 
      trailer, 
      genre, 
      rating, 
      synopsis) VALUES (:title, :image, :trailer, :genre, :rating, :synopsis)";
     
      $result = $db->prepare($query)->execute($data);
*/
echo "<pre>";
print_r($movies);
echo "</pre>";

/*
$data = [
            'title' => $id->title,
            'image' => 'https://image.tmdb.org/t/p/w500'. $id->poster_path,
            'trailer' => $id->video,
            'genre' => ".implode(",",$id->genre_ids).",
            'rating' => $id->vote_average,
            'synopsis' => $id->overview
      ];
*/


