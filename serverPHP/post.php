<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

require 'config.php';

if (isset($_POST["request"])) {
    
    switch ($_POST["request"]) {

        case "newproduct":
            $res = Product::new_product($_POST["name"], $_POST["price"], $_POST['descr']);
            echo json_encode($res);
            break;

        case "updateprice":
            $prod = new Product($_POST["id"]);
            $res = $prod->set_price($_POST["price"]);
            echo json_encode($res);
            break;
        
    }
}

?>