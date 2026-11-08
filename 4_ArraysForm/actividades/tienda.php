<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra con descuento | Ejercicio 11</title>
    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <?php
        $productos = [
            "manzanas" => [
                "nombre" => "Manzanas",
                "precio" => 1.50,
                "categoria" => "Alimentacion",
                "iva" => 0.04,
            ],
            "leche" => [
                "nombre" => "Leche",
                "precio" => 0.90,
                "categoria" => "Alimentacion",
                "iva" => 0.04,
            ],
            "pan" => [
                "nombre" => "Pan",
                "precio" => 1.20,
                "categoria" => "Alimentacion",
                "iva" => 0.04,
            ],
            "cerveza" => [
                "nombre" => "Cerveza",
                "precio" => 2.50,
                "categoria" => "Bebidas",
                "iva" => 0.10,
            ],
            "refresco" => [
                "nombre" => "Refresco",
                "precio" => 1.80,
                "categoria" => "Bebidas",
                "iva" => 0.10,
            ],
            "raton" => [
                "nombre" => "Raton Inalámbrico",
                "precio" => 25.00,
                "categoria" => "Electrónica",
                "iva" => 0.21,
            ]
        ];
        /*
            El ejercicio está en el pdf del github de ale
            En el input tenemos que poner la cantidad en kg que queremos.
            Tenemos que sacar una tabla. Ten en cuenta que el descuento se aplica antes que el iva
            Si se pasan 0 productos de algo, ese algo no sale en la tabla
            
            Un ejercicio como este cae en el examen
        */
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["ejercicios"]) && $_POST["ejercicios"] == "tienda"){
                    ?>
                    <table border="">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio uni</th>
                                <th>Subtotal</th>
                                <th>Desc.</th>
                                <th>IVA</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $esta = false;
                    foreach ($productos as $clave => $valor) {
                        $precio = 0;
                        list($nom, $prec, $cat, $iva) = array_values($valor);
                        $desc = 0;
                        if ($_POST[$clave] > 10) {
                            $desc = 0.2;
                        } else if ($_POST[$clave] > 5){
                            $desc = 0.1;
                        }
                        $cant= $prec *  $_POST[$clave];
                        $ivaTot= $_POST[$clave] * $iva;
                        if($_POST[$clave] > 0 && $_POST[$clave] != "") {
                            echo "<tr>";
                            echo "<td> $nom - $cat </td>";
                            echo "<td> $_POST[$clave] </td>";
                            echo "<td> $prec </td>";
                            echo "<td>" . $cant  . "</td>";
                            echo ($desc != 0) ? "<td>" . $cant *  $desc  . "</td>" : "<td> - </td>";
                            echo "<td>" . $ivaTot . "</td>";
                            echo "<td>" . $cant + $ivaTot - ($cant *  $desc). "</td>";
                            echo "</tr>";
                            $esta = true;
                        }
                    }
                    if(!$esta){
                        echo "<p> Introduce un valor válido </p>";
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php
                    echo "<pre>";
                    print_r(array_keys($_POST));
                    echo "</pre>";
                }
            }
    ?>

</body>
</html>