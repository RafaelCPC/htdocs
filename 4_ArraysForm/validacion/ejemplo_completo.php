<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Validación</title>
    <?php
    // Todo esto va a caer en la práctica tocha y esto es lo menos duro
    // Este trimestre tenemos dos prácticas mínimo.

        error_reporting(E_ALL);
        ini_set("display_error", 1);
        
        require "calculos.php"; // Para importar ficheros
    ?>
    <style>
        .error{
            color:red;
        }
        .ole{
            color: green;
        }
    </style>
</head>
<body>
    <h2> Calculeitor con IVA</h2>
    
    <?php
        $tmp_precio = "";
        $tmp_iva = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // 1. Recogida de datos en variables temporales
            $tmp_precio = trim($_POST["precio"] ?? "");

            if(isset($_POST["iva"])) $tmp_iva = $_POST["iva"];
            else $tmp_iva = ""; // Realmente estamos haciendo lo mismo que con el precio, pero de otra manera. NO nos interesa trimearlo

            // 2. Validación del precio
            if($tmp_precio == "") {

                // nivel 1: Comprobar que no esté vacío
                $err_precio = "El precio es obligatorio";

            } else {

                // nivel 2: validar que sea un número (int o float)
                $tmp_precio_filtrado =  filter_var($tmp_precio, FILTER_VALIDATE_FLOAT);

                if ($tmp_precio_filtrado === false) {
                    $err_precio = "El precio debe ser un número (entero o decimal)";
                    
                } else {

                // nivel 3: Validar que sea positivo.
                    if ($tmp_precio_filtrado <= 0) {
                        $err_precio = "El precio debe ser mayor a 0";

                    } else {

                        // nivel 4: validar límite máximo de un precio (opcional pero recomendable)
                        if($tmp_precio_filtrado > 9999999.99) {
                            $err_precio = "Tas pasao de caro";
                        } else {

                            // Si llego aquí todo es correcto, por lo que asigno valor a mi variable definitiva
                            $precio = $tmp_precio_filtrado;
                        }
                    }
                }
            }
        }

        // 3. Validación del IVA con whitelist (lista blanca)
        $whitelist = ["general", "reducido", "superreducido"];

        if ($tmp_iva == "") {

            // nivel 1: comprobar que no esté vacío
            $err_iva = "El tipo de IVA es obligatorio";

        } else {
            $verd = false;
            // nivel 2: validar contra la whitelist (protección contra manipulación del formulario)
            foreach($whitelist as $opc) {

                // if(!$_POST[$opc] === $tmp_iva  && !$verd) {
                //     $err_iva = "No es una opción válida";
                // } else {
                //     $iva = $tmp_iva;
                // }

                // otra manera 
                 if(!in_array($tmp_iva,$whitelist)) {
                    $err_iva = "El tipo de IVA no es válido";
                } else {
                    $iva = $tmp_iva;
                }
                
            }

        }
    ?>
    
    <form action="" method="post">
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio" value="<?=  htmlspecialchars($tmp_precio) ?>"> <!-- Tengo que volver más adelante-->
        <!--
            Pasamos el value del precio de 0 a htmlspecialchars($tmp_precio). Mantiene el precio que se había introducido aunque recarguemos la página

            Como todo lo que es HTML el usuario lo puede modificar, ponemos el type text en precio en vez de number
            Porque de todas maneras el usuario lo puede modificar y lo vamos a revisar desde el código que la info esté correcta
        -->
        <?php 
            if(isset($err_precio)) echo "<span class = 'error'> $err_precio </span>";
        ?>
        <br> <br> 
        <label for="iva">IVA: </label>
        <select name="iva" id="iva">
            <option disabled selected> -- Elige tipo IVA -- </option>
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select> 
        <?php 
            if(isset($err_iva)) echo "<span class = 'error'> $err_iva </span>";
        ?> 
        <br> <br>
        <input type="submit" value="Calcular PVP">
    </form>
    <?php 
        if(isset($precio) && isset($iva)) {
            echo "<h2 class='ole'> Precio " . calcularPVP($precio,$iva) . "</h2>";
        };
    ?> 
</body>
</html>