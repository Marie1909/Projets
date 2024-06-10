<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récuperation du formulaire</title>
</head>

<body>
    <h2>Récupération des données du formulaire</h2>
    <?php
    echo 'Nom & Prénom : ' . $_POST["firstname"] . '<br>';
    echo 'Sujet : ' . $_POST["sujet"] . '<br>';
    echo 'email : ' . $_POST["email"] . '<br>';
    echo 'subject : ' . $_POST["subject"] . '<br>';
    ?>
</body>
</html>




