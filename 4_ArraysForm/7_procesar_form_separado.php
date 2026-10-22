<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario desde fuera | Tema 4</title>
    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <?php
    /* Concatenamos porque no pilla las comillas simples. Hay maneras de hacerlo, pero no vamos a meternos mucha tralla */
        if(isset ($_POST["mensaje"])) echo "<p> Mensaje recibido: " . $_POST['mensaje']. "</p";
    ?>
</body>
</html>