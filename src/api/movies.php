<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    include_once "Database.php";
    include_once "Post.php";

    $database = new Database();
    $db = $database->connect();

    $post = new Read_movies($db);
    $result = $post->read();

    $num = $result->rowCount();

    if ($num > 0) {
        $posts_arr = array();
        $posts_arr["data"] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array(
                "movieID" => $movieID,
                "title" => $title,
                "image" => $image,
                "trailer" => $trailer,
                "genre" => $genre,
                "rating" => $rating,
                "synopsis" => $synopsis
            );
            
            array_push($posts_arr["data"], $post_item);
        }

        echo json_encode($posts_arr);
    } else {
        echo json_encode(
            array("Message" => "No data found")
        );
    }