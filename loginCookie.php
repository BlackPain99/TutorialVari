<?php
session_start();

if (isset($_COOKIE['user'])) {
    // in questo modo se sessione era scaduta, viene rinnovata con il cookie
    $_SESSION['user'] = $_COOKIE['user'];

    //funzione finta
    // $_SESSION['password'] = sql_get_password($_SESSION['user']);

    echo "Hai fatto il login!";
    echo '<a href="?logout=true">Logout<a/>';
} else {
    setcookie("user", "Lorenzo", time() + 86400 * 365, "/");
    $_SESSION['user'] = $_COOKIE['user'];
    // $_SESSION['password'] = sql_get_password($_SESSION['user']);
    echo "Hai fatto il login!";
    echo '<a href="?logout=true">Logout<a/>';
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    //unset($_SESSION['password']);
    session_destroy();
    setcookie("user", "", time() - 3600);
    header("Location: /");
}

?>