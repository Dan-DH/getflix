
<?php
 $apikey = "271b40684c0dc7716d75c02906a97e9f";
$ct = curl_init();
curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=271b40684c0dc7716d75c02906a97e9f&with_genres=35");
// curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/trending/all/day?api_key=" . $apikey);
// curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=" . $apikey);
// curl_setopt($ct, CURLOPT_URL, "https://api.themoviedb.org/3/genre/movie/list?api_key=" . $apikey);
// curl_setopt($ct, CURLOPT_URL, "http://api.themoviedb.org/3/movie/top_rated?api_key=" . $apikey);
curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ct, CURLOPT_HEADER, FALSE);
curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response5 = curl_exec($ct);
curl_close($ct);
$toprated = json_decode($response5);
?>
