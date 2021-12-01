<?php 
include('../Backend/PDOserver.php');

$keyword = $_POST['searchbar'];
if (isset($_POST['searchbar'])) {
    try {
        if (!empty($_POST['searchbar'])) {
            $query = $db->prepare("SELECT image, title FROM movies WHERE title = '$keyword'");
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
            <h3>
                <?php echo $row['title']; ?>
            </h3>
                <?php
                echo "<br><br>";
                //echo $row['image']; ?>
                <img src="<?php echo $row['image']; ?>" alt="poster">
                <?php
                echo "<br><br>";
            } else {
                array_push($errors, "Sorry, no match is found.");
            }
        } else {
            array_push($errors, "Please fill in the field.");
        }
            
    } catch (PDOException $e) {
        echo "Login failed : " . $e->getMessage();
    }
}
?>