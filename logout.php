<?php

# da inserire in ogni pagina che usa le variabili di sessione
# deve essere sempre la prima istruzione della pagina
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    unset($_SESSION['id']);
    session_destroy();

    # fa un refresh alla root del sito (index.php)
    header("location: /");
}
?>