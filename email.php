<?php 

/*
non usare mail() perchè finiscono nello spam o non vengono ricevute
usare framework phpmailer 
*/

require './mailer/mailsender.php';

if (isset($_POST['send'])) {
    $res = send_mail($_POST['email'], "Questo è un tutorial", $_POST['text']);
    if ($res) {
    echo "<div class=\"alert alert-success\">Mail inviata!</div>";
    } else {
        echo "<div class\"alert alert-danger\">Errore durante l'invio della mail!</div>";
    }
}

?>

