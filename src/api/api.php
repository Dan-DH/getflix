</form>
    <?php
    function openConnection() { 
    development server
    private $dbhost = "database"; 
    private $dbuser = "root";
    private $dbpass = "getflixRoot";
    private $db = "getflix";
    private $conn;
        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        echo "connected";
        return $pdo;
    };

    $pdo = openConnection();

    echo "<pre>";
    print_r($pdo->query("INSERT INTO achievements () VALUES();"));
    echo "</pre>";
    ?>