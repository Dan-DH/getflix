<?php 
include('../Backend/PDOserver.php');

$servername = "database";
$db_user = "root";
$db_password = "getflixRoot";
$dbname = "getflix";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} 
catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}


//$keyword = $_POST['searchbar'];
if (isset($_POST['searchbar'])) {
    $keyword = $_POST['searchbar'];

        if (!empty($_POST['searchbar'])) {
            $query = $db->prepare("SELECT * FROM movies WHERE title LIKE '%$keyword%'");
        
            $query->execute();

            foreach($query as $row) {
                if ($row = $query->fetch()) {
                    // $_SESSION['$username'] = $username;
                    // header('location: ../Frontend.search-result.php');
                    ?>
                    
                    <div class="grid-item">
                    <!--    <h3>
                            <strong>
                                <?php echo $row['title']; ?>
                            </strong>
                        </h3>-->
                            <?php
                            echo "<br><br>";
                            //echo $row['image']; ?>
                            <img src="<?php echo $row['image']; ?>" alt="poster" class="poster" style="width: 100%;">
                    </div>
                    
                    <div class="grid-item">
                        <?php
                        echo "<br><br>";
                        ?>
                        <iframe src="<?php echo $row['trailer']; ?>" frameborder="0" class="trailer" allow="fullscreen"></iframe>
                        <?php
                        echo "<br><br>";
                        echo "Rating : " . $row['rating'];
                        echo "<br><br>"; ?>
                        <div class="syn" style="overflow: scroll; height: 100px">
                            <?php echo "Synopsis : " . $row['synopsis']; ?>
                        </div>
                    </div>
                        <?php
                } 
            }
            
        }

        if (empty($_POST['searchbar'])) {
            array_push($errors, "Please fill in the field.");
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