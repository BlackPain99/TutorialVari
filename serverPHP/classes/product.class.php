<?php

class Product {

    private $id;

    function __construct($id){
        $this->id = $id;
    }

    public static function new_product($name, $price, $desc){
        try {
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO ns_products(name, price, description) VALUES(?, ?, ?)");
            $stmt->execute([$name, $price, $desc]);
            
            return array("OK");

        } catch (PDOException $e) {
            return array("KO", $e->getMessage());
        }
    }

    public function set_price($price){
        try {
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("UPDATE ns_products SET price = ? WHERE id = ?");
            $stmt->execute([$price, $this->id]);
            
            return array("OK");

        } catch (PDOException $e) {
            return array("KO", $e->getMessage());
        }
    }
}
{
    
}


?>