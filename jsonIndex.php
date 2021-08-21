<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        let formData = new FormData();
        //chiave-valore
        formData.append('data', 'pokedex');

        fetch('esempioJSON.php', {
            method = "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data));
    </script>

    <script>
        let utente = "stringa di json";
        let parsed = JSON.parse(utente);
        console.log(parsed.indirizzo.via);

        //oppure
        //in automatico trasforma json in oggetto di js
        let requestURL = './utente.json';
        let request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        request.send();

        request.onload = function (){
            const utente = request.response;
            console.log(utente);
        }
    </script>
    
</body>
</html>