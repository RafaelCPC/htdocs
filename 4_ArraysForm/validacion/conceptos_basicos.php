<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos básicos de validación</title>
</head>
<body>
    <h1>1. isset, empty, trim y htmlspecialchars</h1>
    <!-- Hay maneras de saltarse la validación a nivel de cliente
         por lo que también se valida a nivel de backend 
    -->
    <p>
        Antes de validar un formulario hay que tener claras tres ideas:
    </p>
    <ul>
        <li>Como saber si un dato existe o está vacío</li>
        <li>Como limpiar los espacios de los extremos (trim)</li>
        <li>Como mostrar en la página un texto que ha escrito el usuario
            sin que lo interprete como HTML.</li>
    </ul>

    <?php
        $valor = "0";
        var_dump(isset($valor)); // true porque la variable ya existe
        var_dump(empty($valor)); // true porque considera el 0 como vacio
        
        unset($valor); // se carga la variable
        var_dump(isset($valor)); // false porque la variable no existe
        var_dump(empty($valor)); // true porque considera el 0 como vacio
    ?>

    <table border="">
        <tr>
            <th>Valor $x</th>
            <th>isset ($x)</th>
            <th>empty ($x)</th>
        </tr>
    <?php
    // esta tabla es mejor verla en HTML. Nos da el valor de $x según lo que contenga en isset y empty
        $pruebita = [
            ["null", null, false],
            ['"" (cadena vacia)', "", false],
            ['"0"(cadena con un cero)', "0", true],
            ["0", 0, true],
            ["false", false, false],
            ["[] (array vacío)", [], false],
            ['" " (un espacio en blanco)', " ", true],
            ['"hola"', "hola", false]
        ];
        foreach ($pruebita as $prueba) {
            $x = $prueba[1];
            echo "<tr>";
            echo "<td>" . $prueba[0] . "</td>";
            echo "<td>" . (isset($x) ? "true" : "false") . "</td>";
            echo "<td>" . (empty($x) ? "true" : "false"). "</td>";
            echo "</tr>";

        }
    ?>
        <tr>
            <td>Variable no definida</td>
            <td>false</td>
            <td>true</td>
        </tr>
    </table>
    <form action="" method="get">
        <input type="text" name="nombre" id="">
        <input type="submit" value="Enviar">
    </form>
    <pre>
        <?php
            // Usamos trim para que se cargue los espacios en blanco a izq y derecha
            $nombre = trim($_GET["nombre"]);
            echo "<pre>" . $_GET["nombre"] . "</pre>";
            echo "<pre>" . $nombre . "</pre>";

            // Permite eliminar las etiquetas de html que se introduzcan para evitar las inyecciones de XSS
            // Podríamos hacer algo como esto
            // <script> alert("Holiii"); </script> document.body.innerHTML = "<h1> Sitio Jakiado </h1> </script>;
            // <b onmouseover= alert ("Holiii")> acercate bebito </b>
            $nombre = htmlspecialchars($nombre); // para eliminar las etiquetas HTML
            echo "<pre>" . $nombre . "</pre>";

        ?>
    </pre>
</body>
</html>