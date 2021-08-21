<?php 
 class TestClass
 {
     private $name;
      
     function __construct($name){
         $this->name = $name;
     }

     public function get_detail(){
         try {
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM ns_users WHERE username = ?");
            $stmt->execute([$this->name]);
            $res = $stmt->fetch();

            return array(
                "id" => $res['id'],
                "nome" => $res['nome'],
                "cognome" => $res['cognome'],
                "mail" => $res["mail"],
                "address" => $res["address"],
                "username" => $res['username']
            );

         } catch (\PDOException $e) {
             echo $e->getMessage();
             return array();
         }  
     }

     public static function get_users(){
        try{
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM ns_users");
            $stmt->execute([]);

            $array = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($array, array(
                    "id" => $row['id'],
                    "nome" => $row['nome'],
                    "cognome" => $row['cognome'],
                    "mail" => $row["mail"],
                    "address" => $row["address"],
                    "username" => $row['username']
                ));
            }

            return $array;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return array();
        }  
     }
 }
?>