</form>
    <?php
    function openConnection() { 
    // development server
    // private $dbhost = "database"; 
    // private $dbuser = "root";
    // private $dbpass = "getflixRoot";
    // private $db = "getflix";
    private $conn;
    // production server
    private $dbhost = "fdb33.awardspace.net";
    private $dbuser = "3998204_getflix";
    private $dbpass = "getflixRoot1";
    private $db = "3998204_getflix";

        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        echo "connected";
        return $pdo;
    };

    $pdo = openConnection();

    echo "<pre>";
    print_r($pdo->query("INSERT INTO achievements () VALUES();"));
    echo "</pre>";
    ?>