<?php

/*
upload file
*/
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $upload_path = "upload/";
    $filename = basename($_FILES['photo']['name']);
    $target_file = $upload_path . $filename;
    $check = true;
    $output = "";

    $img_check = getimagesize($_FILES['photo']['tmp_name']);
    if(!$img_check){
        $check = false;
        $output = "Questo file non è un'immagine valida!";
    }

    # altrimenti il file viene sovrascritto
    if(file_exists($target_file)){
        $check = false;
        $output = "Il file esiste già";
    }

    if($_FILES['photo']['size'] > 2000000){
        $check = false;
        $output = "File troppo grande! (Max 2MB)";

    }

    $ext = strtoupper(pathinfo($target_file, PATHINFO_EXTENSION));
    if($ext != "JPG" && $ext != "PNG"){
        $check = false;
        $output = "Estensione non valida! (Solo PDF o PNG)";
    }

    if ($check) {
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)){
            echo "Upload fallito...";
        } else {
            echo "File caricato con successo";
        }
    } else {
        echo $output;
    }

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $estensioni_permesse = array("jpg" => "image/jpg", 
                                     "jpeg" => "image/jpeg",
                                     "gif" => "image/gif",
                                     "png" => "image/png");

        $nome_file = $_FILES["photo"]["name"];
        $tipo_file = $_FILES["photo"]["type"];
        $dimensione_file = $_FILES["photo"]["size"];

        //verificare estensione file
        $estensione = pathinfo($nome_file, PATHINFO_EXTENSION);
        if(!array_key_exists($estensione, $estensioni_permesse))
            die("Errore: seleziona un formato valido");
        
        //verificare la grandezza massima 5mb
        $dimensione_massima = 5 * 1024 * 1024;
        if($dimensione_file > $dimensione_massima)
            die("Errore: la grandezza è superiore al limite di 5mb");
        
        //verificare il tipo MIME
        if(in_array($tipo_file, $estensioni_permesse)){
            //controllare se il file esiste già
            if(file_exists("upload/" . $nome_file)){
                echo $nome_file . " esiste già.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $nome_file);
                echo "Il tuo file è stato caricato con successo";
            }

        } else {
            echo "Errore: c'è stato un problema con il caricamento del tuo file, riprova";
        }

    } else {
        echo "Errore: " . $_FILES["photo"]["error"];
    }

}

?>