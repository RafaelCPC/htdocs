<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*
            Hacer un formulario con post de nombre, edad y un botón de enviar.
            Poner debajo un texto con lo que sale: Me llamo [nombre] y tengo [edad] años
        */
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label> <br>
        <input type="text" name="nombre" id="nombre"> <br>
        <label for="edad"></label> <br>
        <input type="number" name="edad" id="edad">
        <button type="submit"> Enviar </button>
    </form>
    <?php
    /*
    if(isset($_POST["nombre"]) && $_POST["edad"]){
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        echo "<p> Me llamo $nombre y tengo $edad años </p>";
    } else {echo "<p> No has introducido datos </p>";}
    */

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /*
            me meto en el if si me han llegado los datos de un formulario que use POST. 
            Lo hacemos en el ejercicio
        */
        if(isset($_POST["nombre"]) && $_POST["edad"]){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            echo "<p> Me llamo $nombre y tengo $edad años </p>";

        } else {echo "<p> No has introducido datos </p>";}
    }
    ?>
</body>
</html>