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
            Haz un formulario para dar de alta un producto y valídalo siguiendo las siguientes instrucciónes:
                1. Nombre => obligatorio, entre 3 y 50 caracteres strlen()
                2. Stock => obligatorio, numero entero mayor o igual a 0
                3. Categoría => inventaos 3 categorías

                Si hay errores, cada uno sale al lado de su campo en rojo
                SI no hay errores, aparece en verde debajo del formulario: Stock insertado correctamente: "Nombre", "Stock" y "categoria".
        */
            $temp_nom = "";
            $temp_stock = "";
            $temp_cat = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["ejer"]) && ($_POST["ejer"] == "prac")) {

                $temp_nom = trim($_POST["nombre"] ?? "");
                $temp_stock = trim($_POST["stock"] ?? "");
                $temp_cat = isset($_POST["categoria"]) ? $_POST["categoria"] : "";

                if($temp_nom == "") {
                    $err_nombre = "No se ha introducido un nombre";
                } else {
                    if(strlen($temp_nom) < 3 || strlen($temp_nom) > 50) {
                        $err_nombre = "La longitud del nombre debe estar entre 3 y 50 caracteres";
                    } else {
                        $nom = $temp_nom;
                    }
                }

                if($temp_stock == "") {
                    $err_nombre = "No se ha introducido un stock";
                } else {
                    if($temp_stock < 1) {
                        $err_stock = "El numero no es positivo";
                    } else {
                        $nom = $temp_nom;
                    }
                }
            }
        }
    ?>

    <form action="" method="post">
        <input type="hidden" name="ejer" value="prac">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required> <br> <br>
        <label for="stock">Stock: </label>
        <input type="text" name="stock" id="stock" required> <br> <br>
        <label for="categoria">Categoria: </label>
        <select name="categoria" id="categoria">
            <option disabled selected> -- Selecciona una categoría --</option>
            <option value="videojuegos">Videojuegos</option>
            <option value="juegosMesa">Juegos de Mesa</option>
            <option value="tcg">TCG</option>
        </select> <br> <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>