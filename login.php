<?php

# da inserire in ogni pagina che usa le variabili di sessione
# deve essere sempre la prima istruzione della pagina
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    # creo variabile di sessione (verrà cifrata)
    # se c'è una variabile di sessione attiva, vuol dire che sono loggato
    $_SESSION['id'] = "Pippo";

    # fa un refresh alla root del sito (riesegue index.php)
    header("location: /");
}
?>