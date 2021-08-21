<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- enctype="multipart/form-data" per fare upload di dati multimediale-->
    <form action="loadFile.php" method="POST" enctype="multipart/form-data">
        <h2>Carica File</h2>
        <label for="fileSelect">File:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="submit" value="Carica">
        <p><strong>Note:</strong> sono permessi solo i formati .jpg, .jpeg, .gif, .png con una size massima di 5MB</p>
    </form>

    <!-- altro esempio-->
    <form action="loadFile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" value="Carica">
    </form>
</body>
</html>