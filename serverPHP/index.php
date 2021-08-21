<?php 

    # intestazione risposta php (invia una raw HTTP header)
    # fornisce accesso alle risorse client (a tutte le fonti)
    header("Access-Control-Allow-Origin: *");

    # si occupa delle intestazioni (accesso a tutte le intestazioni)
    header("Access-Control-Allow-Headers: *");

    # contenuto in formato json al client
    header("Content-Type: application/json");

    require 'config.php';

    if (isset($_GET["request"]) && $_GET["request"] == "user") {
        $test = new TestClass($_GET["name"]);
        $detail = $test->get_detail();
        echo json_encode($detail);
    } else if (isset($_GET["request"]) && $_GET["request"] == "users"){
        $users = TestClass::get_users();
        echo json_encode($users);
    } else {
        $json = file_get_contents("json/es.json");
        $object = json_decode($json);
        print_r($object);
    }


?>