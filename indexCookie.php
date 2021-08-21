<?php
    if (isset($_COOKIE['test'])) {
        echo "Hai visualizzato questa pagina il " . $_COOKIE['test'];
        echo '<a href="?remove=true">Cancella Cookie<a/>';
    } else {
        echo "Benvenuto!";
        setcookie("test", date("d M Y H:i:s"), time() + 86400 * 365, "/");
    }

    if (isset($_GET['remove'])) {
        # eliminare il cookie
        setcookie("test", "", time() - 3600);
        header("location: /");
    }

?>