<?php 

$database = mysqli_connect('database', 'root', 'getflixRoot', 'getflix');
if(!$database){
      die("Connection failed: " . mysqli_connect_error());
    }

//  $servername = "database";
// $db_user = "root";
// $db_password = "getflixRoot";
// $dbname = "getflix";
// ///Connecting to the database///
// try{
//     $database= new PDO("mysql:host=$servername;dbname=$dbname",$db_user,$db_password);
//     $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $e) {
//     echo "Connection failed : " . $e->getMessage();
// }
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
                  //https://www.youtube.com/embed/M47Z3I7vG3w?rel=0&amp;showinfo=0&amp;wmode=opaque&amp;html5=1
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
/* 
foreach($movies as $id){
     $data = [
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
 //adding movies from movies array to database  
foreach($movies as $id){
      //  $query = "INSERT INTO movies (title, 
      // image, 
      // trailer, 
      // genre, 
      // rating) VALUES ('$id->title',
      // 'https://image.tmdb.org/t/p/w500$id->poster_path',
      // '$id->video',
      // '".implode(",",$id->genre_ids)."',
      // $id->vote_average)";
      // $result = mysqli_query($database, $query);
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
echo "<pre>";
print_r($movies);
echo "</pre>";
// $q= "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('Shang-Chi and the Legend of the Ten Rings', 'https://image.tmdb.org/t/p/w500/1BIoJGKbXjdFDAqUEiA2VHqkK1Z.jpg','https://www.youtube.com/watch?v=8YjFbMbfXaQ','28,12,14','7.9','Shang-Chi must confront the past he thought he left behind when he is drawn into the web of the mysterious Ten Rings organization.')";
// $result = mysqli_query($database, $q);
// $r= "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('Encanto', 'https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg','https://www.youtube.com/watch?v=CaimKeDcudo','12,16,35,10751,14,10402','7.6','The tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal—every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional family's last hope.')";
// $result = mysqli_query($database, $r);
// $a= "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('Encanto', 'https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg','https://www.youtube.com/watch?v=CaimKeDcudo','12,16,35,10751,14,10402','7.6','The tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal—every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional familys last hope.')";
// $result = mysqli_query($database, $a);
// $a= "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('Encanto', 'https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg','https://www.youtube.com/watch?v=CaimKeDcudo','12,16,35,10751,14,10402','7.6','thehth'e')";
// $result = mysqli_query($database, $a);
// $rs= "INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ('Ciao Alberto', 'https://image.tmdb.org/t/p/w500/1SyTnaY0wte69oKdqxQLvxPT3hs.jpg','https://www.youtube.com/watch?v=KJZS7oXX5SE','16,35,10751,14','7.7','With his best friend Luca away at school, Alberto is enjoying his new life in Portorosso working alongside Massimo - the imposing, tattooed, one-armed fisherman of a few words - who's quite possibly the coolest human in the entire world as far as Alberto is concerned. He wants more than anything to impress his mentor, but it's easier said than done.')";
// $result = mysqli_query($database, $rs);
//The tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal—every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional familys last hope.
//echo $total;
/*
      $query = "INSERT INTO movies (title, 
      image, 
      trailer, 
      genre, 
      rating, 
      synopsis) VALUES (:title, :image, :trailer, :genre, :rating, :synopsis)";
     
      $result = $db->prepare($query)->execute($data);

      //  //$db->prepare($query)->execute([$id->title, 'https://image.tmdb.org/t/p/w500'$id->poster_path, $id->video])
*/


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


