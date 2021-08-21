<?php

/*
connessione al database
*/

//$connessione = mysqli_connect("127.0.0.1", "root", "", "tutorial_mysql");

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database);

/*
try{
    $connessione = new PDO("mysql:host=localhost;dbname=tutorial_mysql", "root", "");
    $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    $sql = "CREATE DATABASE demo";
    $connessione->exec($sql);
    echo "Database created successfully";
} catch (PDOException $e) {
    die("Error: Could not able to execute $sql. " . $e->getMessage());
}

*/
if($connessione === false){
    die("ERROR: Could not connect: " . $connessione->connect_error);
}

echo "Connect successfully. Host info: " . $connessione->host_info;


/*
creazione database
*/
$sql = "CREATE DATABASE demo";

if($connessione->query($sql) === true){
    echo "Database created successfully";
} else {
    echo "ERROR: Could not able to execute $sql" . $connessione->error;
}

$connessione->close();


/*
prepared

2 fasi: prepare and execute

prepare: statement mandato al server che fa controllo sintassi e ottimizzazione query salvandola per dopo
execute: mandati i valori, ripreso lo statement ed eseguito

*/

$sql = "INSERT INTO persone (nome, cognome, email) VALUES (?, ?, ?)";

//impostare i soliti parametri di connessione e aprire la connessione

if ($statement = $connessione->prepare($sql)) {
    $statement->bind_param("sss", $nome, $cognome, $email);

    $nome = "Leopoldo";
    $cognome = "Monti";
    $email = "leopoldomonti@gmail.com";
    $statement->execute();

    $nome = "Luca";
    $cognome = "Rossi";
    $email = "lucarossi@gmail.com";
    $statement->execute();

    echo "Record inseriti con successo!";
} else {
    echo "Non è possibile eseguire la query: $sql" . $connessione->error;
}

$statement->close();
$connessione->close();

/*
select
*/

$sql = "SELECT * FROM persone";

if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0 ) {
        echo '<table>
        <thead>
        <tr>
        <th>id</th>
        <th>nome</th>
        <th>cognome</th>
        <th>email</th>
        </tr>
        </thead>
        <tbody>';

        while ($row = $result->fetch_array()) {
            echo '
            <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['nome'] . '</td>            
            <td>' . $row['cognome'] . '</td>
            <td>' . $row['email'] . '</td>
            </tr>';
        }

        echo '</tbody></table>';

    } else {
        echo "non ci sono righe per questa query";
    }
} else {
    echo "Errore, impossibile eseguire la query $sql. " . $connessione->error;
}

?>