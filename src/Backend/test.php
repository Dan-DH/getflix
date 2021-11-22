</form>
    <?php
    function openConnection() { 
        $dbhost = "database"; 
        $dbuser = "root";
        $dbpass = "getflixRoot";
        $db = "getflix";
        //do we need the charset?

        $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
        echo "connected";
        return $pdo;
    };

    $pdo = openConnection();

    echo "<pre>";
    print_r($pdo->query("SELECT * FROM users;")->fetchAll(PDO::FETCH_OBJ));
    echo "</pre>";
    ?>