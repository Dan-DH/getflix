<?php 
include('../Backend/PDOserver.php');

$keyword = $_POST['searchbar'];
if (isset($_POST['searchbar'])) {
    try {
        if (!empty($_POST['searchbar'])) {
            $query = $db->prepare("SELECT * FROM movies WHERE title LIKE '%$keyword%'");
            /*
            $query->setFetchMore(PDO::FETCH_ASSOC);
            foreach($query as $row) {
                foreach($row as $image=>$value){

                }
            }*/
            $query->execute();

            // while ($row = $query->fetch()) {
            //         echo $row['title'];
            //         echo "<br><br>";
            //         echo $row["image"];
            //         echo "<br><br>";
            //     }
            foreach($query as $row) {
                if ($row = $query->fetch()) { ?>
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
                /*else {
                    array_push($errors, "Sorry, no match found.");
                }*/
            }
            
        }

        if (empty($_POST['searchbar'])) {
            array_push($errors, "Please fill in the field.");
        }
        /*
        else {
            array_push($errors, "Sorry, no match found.");
        }*/
            
    } catch (PDOException $e) {
        echo "Login failed : " . $e->getMessage();
    }
}
?>