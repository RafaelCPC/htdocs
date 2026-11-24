<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Validación</title>
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
<!--
    Hacer un formulario con nombre, correo y edad. Tiene que haber también un despegable para elegir un taller
    También tiene que haber un fieldset con radio para elegir turno: mañana o tarde. Añadir un check para aceptar las condiciones
    Tienen que salir los errores al lado de cada campo. Los datos tienen que salir en value. En el radio tiene que guardarse también
    la opción seleccionada.
    
    Nombre: obligatorio, más de 3 caracteres y menos de 40
    correo: obligatorio, formato correo
    edad: obligatorio, formato entero, mayor a 18 y menor a 80

    Taller: lista desplegable creando una whitelist (extra: guardar la opción del cliente trabajando con el atributo selected) (JS, PHP, Git)
    Turno: igual que taller, pero con radio. También debe guardarse
    Condiciones: obligatorio que esté marcado y guardar el marcad en el caso que el cliente lo haya marcado anteriormente 
-->
</head>
<body>
    <?php 
        $nom = ""; $email = ""; $edad = ""; $cond = "";

        $err_nom = ""; $err_email = ""; $err_edad = ""; $err_lista = ""; $err_turno = ""; $err_cond = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $nom = trim($_POST["nombre"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $edad = trim($_POST["edad"] ?? "");

            $turn = ($_POST["turno"] ?? "");

            $cond = ($_POST["condiciones"] ?? "");

            if($nom == "") $err_nom = "El nombre es obligatorio"; 
            else if(strlen($nom) < 3 || strlen($nom) > 40) $err_nom = "El nombre debe tener una longitud entre 3 y 40 caracteres";
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) $err_email = "El correo no es válido";

            if(filter_var($edad, FILTER_VALIDATE_INT) == false) $err_edad = "La edad debe ser un número entero" ;
            else if($edad < 18 || $edad > 80) $err_edad = "La edad debe estar entre los 18 y los 80 años";

            $whitelist = ["js", "php", "github"];
            if(!in_array(($_POST["taller"] ?? ""), $whitelist)) $err_lista = "Debes seleccionar un taller adecuado";

            $whitelist2 = ["manana", "tarde"];
            if(!in_array($turn, $whitelist2)) $err_turno = "Debes seleccionar un turno";

            if($cond === "") $err_cond = "Debes aceptar las condiciones";
        }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nom) ?>"> 
        <?php 
            if(isset($err_nom)) echo "<span class = 'error'> $err_nom </span>"
        ?>
        <br> <br>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="correo" value="<?= htmlspecialchars($email) ?>"> 
        <?php 
            if(isset($err_email)) echo "<span class = 'error'> $err_email </span>"
        ?>
        <br> <br>
        <label for="nombre">Edad: </label>
        <input type="text" name="edad" id="edad" value="<?=  htmlspecialchars($edad) ?>"> 
        <?php 
            if(isset($err_edad)) echo "<span class = 'error'> $err_edad </span>";
        ?>
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
        <?php 
            if(isset($err_lista)) echo "<span class = 'error'> $err_lista </span>"
        ?>
        <br> <br>

        <fieldset>
            <?php 
            $radio = ["manana" => "Mañana", "tarde" => "Tarde"];
            foreach ($radio as $name => $campo) {
                echo "<input type='radio' name='turno' value= '$name' id ='$name' >";
                echo "<label for='$name'> $campo </label>";
                echo "<br>";
            }
            if(isset($err_turno)) echo "<span class = 'error'> $err_turno </span>";
            echo " <br>";
            ?>
        </fieldset> <br>

        
        <?php 
            if($cond === false){
                echo "<input type='checkbox' name='condiciones' id='condiciones'>";
            } else{
                echo "<input type='checkbox' name='condiciones' id='condiciones' checked>";
            }
            ?>
            <label for="condiciones"> Acepto las condiciones</label> 
            <?php
            if(isset($err_cond)) echo "<span class = 'error'> $err_cond </span>";
            
        ?>
        <br> <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>