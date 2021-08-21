<?php

$richiesta = $_POST["data"];
//preleva contenuti del file senza aprirlo
$strJsonFileContents = file_get_contents("$richiesta.json");
//true per avere array associativo, altrimenti ritorna un object
$array = json_decode($strJsonFileContents, true);

//echo '<pre>' . var_export($array['pokemon']['0']['name'], true) . '</pre>';

//echo per rimandare al frontend
echo json_encode($array);

?>