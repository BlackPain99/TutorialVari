<?php 
    //ritorna contenuto del file e numero caratteri
    //echo readfile("test.txt");

    /*
    r read
    w write
    a append
    x se il file non esiste lo crea, se esiste ci dà errore
    r+ per leggere e scrivere
    w+ sovrascrive il file se esiste, se non esiste lo crea e ci scrive, anche lettura
    a+ append e lettura
    x+ può leggere

    il + permette di leggere

    fgets prende singola riga

    */
    $file = fopen("text.txt", "r") or die ("Non posso aprire il file...");
    echo fread($file, filesize("test.txt"));
    fclose($file);

    $file = fopen("test.txt", "w") or die ("Non posso aprire il file...");
    $txt = "riga 1!\n";
    fwrite($file, $txt);
    fclose($file);

    $file = fopen("test.txt", "r");
    while  (!feof($file)){
        echo fgets($file) . "<br/>";
    }
    fclose($file);
?>