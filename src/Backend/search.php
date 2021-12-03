<?php 
//include('../Backend/PDOserver.php');
$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //echo "Connected successfully";
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

if (isset($_POST['searchbar'])) {
    $keyword = strip_tags($_POST['searchbar']);
    if (empty($_POST['searchbar'])) {
        array_push($errors, "Please fill in the field.");
    }
    else {
        $query = $db->prepare("SELECT * FROM movies WHERE title LIKE '%$keyword%'");
        $query->execute();
        foreach($query as $row) {
            while($row = $query->fetch()) {?>
                <div class="grid-item">
                    <?php
                    echo "<br><br>";?>
                    <img src="<?php echo $row['image']; ?>" alt="poster" class="poster" style="width: 100%;">
                </div>
                <div class="grid-item">
                    <?php echo "<br><br>"; ?>
                    <iframe src="<?php echo $row['trailer']; ?>" frameborder="0" class="trailer" allow="fullscreen"></iframe>
                    <?php
                    echo "<br><br>";
                    echo "Rating : " . $row['rating'];
                    echo "<br><br>"; 
                    ?>
                    <div class="syn" style="overflow: scroll; height: 100px">
                        <?php echo "Synopsis : " . $row['synopsis']; ?>
                    </div>
                </div>
                <?php
            }
        }
        
    }
    if($row['title'] ==! $keyword) {
        array_push($errors, "Sorry, no match found.");
    }
    
}
// while ($row = $query->fetch()) {
            //         echo $row['title'];
            //         echo "<br><br>";
            //         echo $row["image"];
            //         echo "<br><br>";
            //     }
?>