<?php
session_start();

if (isset($_SESSION['id'])) {
    echo "Il tuo indirizzo civico è ...";
} else {
    header("location: /");
}
?>