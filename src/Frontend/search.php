<?php 
include('../Backend/PDOserver.php');

$keyword = $_POST['searchbar'];
if (isset($_POST['searchbar'])) {
    try {
        if (!empty($_POST['searchbar'])) {
            $query = $db->prepare("SELECT * FROM movies WHERE title = '$keyword'");
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
                    <img src="<?php echo $row['image']; ?>" alt="poster">
            </div>
            
            <div class="grid-item">
                <?php
                echo "<br><br>";
                ?>
                <iframe src="<?php echo $row['trailer']; ?>" frameborder="0" id="trailer"></iframe>
                <?php
                echo "<br><br>";
                //echo "Genre : " . $row['genre'];
                echo "<br><br>";
                echo "Rating : " . $row['rating'];
                echo "<br><br>";
                echo "Synopsis : " . $row['synopsis'];
                ?>
            </div>
    <?php
            } else {
                array_push($errors, "Sorry, no match found.");
            }
        } else {
            array_push($errors, "Please fill in the field.");
        }
            
    } catch (PDOException $e) {
        echo "Login failed : " . $e->getMessage();
    }
}
?>