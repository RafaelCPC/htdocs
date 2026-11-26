<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de Validación revisado</title>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
    <style>
        .cor {
            color: green;
        }

        .error {
            color: red
        }
    </style>
</head>
<body>
    <?php
        /* Hacer el ej_validacion.php pero esta vez de la otra manera
           Con los errores al final y una lista con la información introducida
        */

        $nom = ""; $email = ""; $edad = ""; $cond = ""; $turn = "";

        $errores = [];
        $info = [];

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $nom = trim($_POST["nombre"] ?? "");
            $email = trim($_POST["correo"] ?? "");
            $edad = trim($_POST["edad"] ?? "");

            $turn = ($_POST["turno"] ?? "");

            $cond = ($_POST["condiciones"] ?? "");

            if($nom == "") $errores [] = "El nombre es obligatorio"; 
            else if(strlen($nom) < 3 || strlen($nom) > 40) $errores [] =  "El nombre debe tener una longitud entre 3 y 40 caracteres";
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) $errores [] =  "El correo no es válido";

            if(filter_var($edad, FILTER_VALIDATE_INT) === false) $errores [] =  "La edad debe ser un número entero" ;
            else if($edad < 18 || $edad > 80) $errores [] =  "La edad debe estar entre los 18 y los 80 años";

            $whitelist = ["js", "php", "github"];
            if(!in_array(($_POST["taller"] ?? ""), $whitelist)) $errores [] = "Debes seleccionar un taller adecuado";

            $whitelist2 = ["manana", "tarde"];
            if(!in_array($turn, $whitelist2)) $errores [] =  "Debes seleccionar un turno";

            if($cond === "") $errores [] =  "Debes aceptar las condiciones";

            $info = [$nom, $email, $edad, $turn, $cond];
        }
    ?>


    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nom) ?>"> 
        <br> <br>

        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="correo" value="<?= htmlspecialchars($email) ?>"> 
        <br> <br>

        <label for="nombre">Edad: </label>
        <input type="text" name="edad" id="edad" value="<?=  htmlspecialchars($edad) ?>"> 
        <br> <br>

        <select name="taller">
            <?php 
                $valor = ["no","js", "php", "github"];
                $campo = ["-- Seleccionar una opcion --","Javascript", "PHP", "Github"];

                $i = 0;
                foreach ($valor as $val) {
                    if($_POST["taller"] == $val) {
                        echo "<option value= $val selected> $campo[$i] </option>";
                    } else if ($val === "no"){
                        echo "<option value= $val selected disabled> $campo[$i] </option>";
                    } else {
                        echo "<option value= $val> $campo[$i] </option>";
                    }
                    $i++;
                }
            ?>
        </select> 
        <br> <br>

        <fieldset>
            <?php 
            $radio = ["manana" => "Mañana", "tarde" => "Tarde"];
            foreach ($radio as $name => $campo) {
                if($turn == $name) {
                echo "<input type='radio' name='turno' value= '$name' id ='$name' checked>";
                } else {
                echo "<input type='radio' name='turno' value= '$name' id ='$name' >";
                }
               
                echo "<label for='$name'> $campo </label>";
                echo "<br>";
            }
            ?>
        </fieldset> <br>

        <input type='checkbox' name='condiciones' id='condiciones' checked>
        <label for="condiciones"> Acepto las condiciones</label> 
        <br> <br>

        <input type="submit" value="Enviar">
    </form>

        <?php 
            if(count($errores) > 0) {
                foreach ($errores as $valor) {
                    echo "<p class = 'error'> $valor </p>";
                }
            }
            if (count($errores) < 5) {
               echo "<ul>";
                foreach ($info as $valor) {
                    if ($valor === "on") {
                    echo "<li class = 'cor'> Se han aceptado las condiciones </li>";
                    } else if ($valor !== "") {
                        echo "<li class = 'cor'> $valor </li>";
                    }
                }
                echo "</ul>"; 
            }
        ?>
</body>
</html>