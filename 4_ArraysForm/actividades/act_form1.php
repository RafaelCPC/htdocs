<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Formulario 1 | Tema 4</title>

    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <?php
        /*
            Poner un input de texto donde se pueda meter numeros con coma. Pasar esa cadena a un array
            Ordenamos el array según lo que se introduzca en otro input de texto. Da error también si no 
            se introduce ASC o DESC. Volvemos a pasar el array ordenado a cadena y lo sacamos por pantalla
            1 // 2 // 5 // 7
        */

        if($_SERVER ["REQUEST_METHOD"] == "POST") {
            if (isset($_POST ["formularios"]) && $_POST["formularios"] == "ej1") {
                $arr = explode("," , $_POST["texto"]);
                echo $_POST["texto"];
                if(strtoupper($_POST["orden"]) == "ASC") arsort($arr);
                else if(strtoupper($_POST["orden"]) == "DESC") asort($arr);
                else{
                    echo "<p> No se ha introducido un orden adecuado </p>";
                }

                $strin = implode(" // ", $arr);
                echo "<p> $strin </p>";
            }
        }
    ?>
</body>
</html>