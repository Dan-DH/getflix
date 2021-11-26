
<?php
//  $apikey = "271b40684c0dc7716d75c02906a97e9f";
$genre_id = [14,18,28,35,10751];
$genre = [];
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
//      echo "<pre>";
//      print_r($genre) ;
//      echo "</pre>";

foreach($genre as $key => $value){
      print_r($key['id']);
      // $ct = curl_init();
      // curl_setopt($ct, CURLOPT_URL, "http://api.themoviedb.org/3/movie/".$id['id']."/videos?api_key=271b40684c0dc7716d75c02906a97e9f");
      // curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
      // curl_setopt($ct, CURLOPT_HEADER, FALSE);
      // curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
      // $response5 = curl_exec($ct);
      // curl_close($ct);
      // $result_genre = json_decode($response5);
      // foreach($result_genre->results as $p){
      //             array_push($genre,$p);
      // }
}

?>


