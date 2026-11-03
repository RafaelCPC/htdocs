<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra con descuento | Ejercicio 11</title>
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
                        list($nom, $prec, $cat, $iva) = $valor;
                        echo $cat;
                        echo "<pre>";
                        print_r($valor);
                        echo "</pre>";
                        if(array_key_exists($nom, $_POST) && $_POST[$nom] > 0 && $_POST[$nom] != "") {
                            echo "<tr>";
                            echo "<td> $nom - $cat</td>";
                            echo "<td> $_POST[$nom] </td>";
                            echo "<td> $prec </td>";
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