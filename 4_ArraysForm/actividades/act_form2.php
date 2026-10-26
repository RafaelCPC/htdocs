<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Formularios 2 | Tema 4</title>

    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <?php
        /*
            Crea un campo de texto donde se introduzca una fruta. Busca la fruta en un array
            que hayamos creado. Sacar por pantalla si se ha encontrado y la posición. Si no
            pon que no se ha encontrado
        */
            $frutas = ["melón","sandía","platano","manzana","naranja","mango","coco"];
            $pos = 0; $esta = false;
        if($_SERVER ["REQUEST_METHOD"] == "POST") {
            if (isset($_POST ["formularios"]) && $_POST["formularios"] == "ej2") {
                for ($i=0; $i < count($frutas); $i++) {  
                    if($_POST["fruta"] === $frutas[$i]){
                        $pos = $i;
                        $esta = true;
                    }
                }
                echo ($esta) ? "<p> La fruta ". $_POST["fruta"] . " está en la posición $pos </p>": "<p> No está la fruta </p>";
            }
        }
    ?>
</body>
</html>