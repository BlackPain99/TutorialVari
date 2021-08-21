<?php

/*
cifra i messaggi tra noi e il server
si attiva solo su un singolo browser
ci fa accedere ad una parte privata
non valgono con scheda di navigazione in incognito
*/

# da inserire in ogni pagina che usa le variabili di sessione
# deve essere sempre la prima istruzione della pagina
session_start();


if(isset($_SESSION['id'])){
    # parte visibile solo agli utenti loggati
    echo "Benvenuto nella pagina nascosta" . $_SESSION['id'] . "<br>";
    ?>
    <a href="account.php">Account</a>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    <?php
} else {
    echo "Non hai accesso a questa pagina <br>";
    ?>
    <form action="login.php" method="POST">
        <input type="submit" value="Login">
    </form>
    <?php
}

?>