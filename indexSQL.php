<?php
require 'configSQL.php';

echo "<h2>Lista utenti<h2/>";
echo "<ul>";
foreach(get_users() as $user){
    echo "<li>" . $user . "</li>";
}
echo "</ul>";

function get_users(){
    try {
        $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
                $GLOBALS['dbuser'], $GLOBALS['dbpassword']);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name FROM Users");
        $stmt->execute([]);

        $array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $row['name']);
        }

        return $array;
    } catch (PDOException $e){
        echo $e->getMessage();
        return array();
    }
}
?>