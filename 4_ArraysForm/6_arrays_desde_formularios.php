<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays desde formularios</title>
    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <form action="" method="post">
    <!-- La manera elegante de hacerlo -->
    <input type="hidden" name="formularios" value="ej1">

    <fieldset>
        <legend>Notitas</legend>
        <label for="nota[]">Nota 1:</label>
        <input type="number" name="nota[]" id="nota1">
        <label for="nota[]">Nota 2:</label>
        <input type="number" name="nota[]" id="nota1">
        <label for="nota[]">Nota 3:</label>
        <input type="number" name="nota[]" id="nota1">
    </fieldset>
    <fieldset>
        <legend>Intereses para el proximo curso</legend>
        <label for="">PHP</label>
        <input type="checkbox" name="intereses[]" value="php">
        <label for="">JS</label>
        <input type="checkbox" name="intereses[]" value="js">
    </fieldset>
    <input type="submit" value="Enviar">
    </form>
    <?php
    /* Esto es muy importante. Tenemos que evitar que nos de petardazos el código
       De esta manera solo entra si, y solo sí se ha enviado datos a través de un formulario con el método
       POST.
    */
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        if(isset ($_POST["nota"])){ // Entra solo si se ha rellenado los datos del formulario de notas.
          print_r($_POST["nota"]);   
        }
    }
    /* Hay maneras más elegantes de hacerlo. De esta manera sí estamos controlando todos los casos */
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        if(isset ($_POST["formularios"]) && $_POST["formularios"] == "ej1"){ // Entra solo si se ha rellenado los datos del formulario de notas.
          print_r($_POST["nota"]);   
        }
    }
    ?>
</body>
</html>