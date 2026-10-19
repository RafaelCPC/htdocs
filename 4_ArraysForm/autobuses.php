<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses | Ejercicio</title>
</head>
<body>
    <h2>Subapartado 1</h2>
    <p>Dado los datos que aparecen en la pizarra, crear un array bidimensional indexado con los datos
        de todos los viajes que tiene mi empresa de autobuses. Añadir dos viajes más en el que el primer
        viaje tenga como destino "Torremolinos" y el segundo viaje tenga como origen "Málaga"
        Origen  Destino Tiempo Precio
        Málaga -> Ronda 100 mins 15€ (quitar los mins y € en el array)
        Churriana -> "Málaga" 20 mins 3 €
        "Malaga" -> "Granada" 90 12€
        "Torremolinos" -> "Malaga" 30 mins 3,5€
    </p>
    <?php
    //Inicializamos el array bidimensional y le asignamos valores
        $viajes = [];
        array_push($viajes, ["Málaga", "Ronda", 100, 15]);
        array_push($viajes, ["Churriana", "Málaga", 20, 3]);
        array_push($viajes, ["Málaga", "Granada", 90, 12]);
        array_push($viajes, ["Torremolinos", "Málaga", 30, 3.5]);
        array_push($viajes, ["Benalmádena", "Torremolinos", 15, 2]);
        array_push($viajes, ["Málaga", "Fuengirola", 60, -2]);

        // el array push no puede hacerse cuando el array es asociativo. El array tocho tiene que ser
        // indexado. Si los array chiquititos son asociativos no hay problema.
        echo "<pre>";
        print_r($viajes);
        echo "<pre>";
    ?>
    <h2>Subapartado 2</h2>
    <p>Manteniendo el orden original de mi array, enseña en el navegador gracias a la función print_r el array
        ordenado por duración de más largo a más corto
    </p>
    <?php
        function ordenado ($viajes) {

        //Ordenamos el array según la duración 
            $ordenado = [];
            $duracion = [];
            
            foreach ($viajes as $viaje) {
                list($origen, $destino, $dura, $precio) = $viaje;
                array_push($duracion, $dura);
                array_push($ordenado, $viaje);
            }

            /*
                PHP te permite copiarlo así de facil
                $copia = $viajes;
                Para sacar la duración
                $duracion = array_column($copia,2);
                Para ordenarlo ya hacemos el multisort
            */

            array_multisort($duracion, SORT_DESC, $ordenado);

            echo "<pre>";
            print_r($ordenado);
            echo"</pre>";
        }
        ordenado($viajes);
    ?>
    <h2>Crea una tabla con la siguiente estructura mediante una función llamada tabla ()</h2>

        <?php
            function tabla (array $viajes) {
        ?>
        <table border="">
        <thead>
            <tr >
                <th>Origen</th>
                <th>Destino</th>
                <th>Duración</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // recorremos el array y le asignamos un color a la fila en función del precio
                foreach ($viajes as $viaje) {
                    list($origen, $destino, $dura, $precio) = $viaje;

                    $color="";

                    switch($precio){
                        case ($precio >= 1 && $precio < 10): $color = "blue"; break;
                        case ($precio >= 10 && $precio < 15): $color = "green"; break;
                        case ($precio >= 15): $color = "purple"; break;
                        default: $color = "";
                    }

                    echo "<tr style='background-color: $color ;'>";
                    echo "<td> $origen </td>";
                    echo "<td> $destino </td>";
                    if ($precio > 0){
                        echo "<td> $dura </td>";
                        echo "<td> $precio </td>";
                    } else {
                        echo "<td colspan='2'> Viaje no disponible </td>";
                    }

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            tabla ($viajes);
        ?>

    <p>Si el precio del viaje es menor o igual a cero, se mostrará "Viaje no disponible"
    </p>
    <p>Si el precio está comprendido desde 1 (inlcusive) hasta 10 sin incluir, se coloreará la fila entera de color azul</p>
    <p>Si el precio está comprendido desde el 10 (inlcusive) hasta 15 sin incluir. se coloreará la fila entera de color verde</p>
    <p>Si el precio es mayor o igual a 15 se coloreará de morado</p>

    <h2>Subapartado 4</h2>
    <p>Modifica la función tabla para que sea capaz de recibir dos parámetros. Uno que indique la columna (en formato entero) y otro 
        que indique el tipo de ordenación tabla(0 -columna-, SORT_DESC). La función ahora deberá mostrar la tabla pero con los datos del
        array ordenados según la columna y el tipo de ordenación
    </p>
    <?php
        function tablas (array $viajes,int $num, $orden) {
        ?>
        <table border="">
        <thead>
            <tr >
                <th>Origen</th>
                <th>Destino</th>
                <th>Duración</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Creamos un array ordenado
            $ordenado = [];
            $colOrd = [];
            
            foreach ($viajes as $viaje) {
                array_push($colOrd, $viaje[$num]);
                array_push($ordenado, $viaje);
            }

            array_multisort($colOrd, $orden, $ordenado);

        // Recorremos el array ordenado y le asignamos un color a la fila en función del precio
            foreach ($ordenado as $viaje) {
                list($origen, $destino, $dura, $precio) = $viaje;
                
                $color="";

                switch($precio){
                    case ($precio >= 1 && $precio < 10): $color = "blue"; break;
                    case ($precio >= 10 && $precio < 15): $color = "green"; break;
                    case ($precio >= 15): $color = "purple"; break;
                    default: $color = "";
                }

                echo "<tr style='background-color: $color ;'>";
                echo "<td> $origen </td>";
                echo "<td> $destino </td>";
                if ($precio > 0){
                    echo "<td> $dura </td>";
                    echo "<td> $precio </td>";
                } else {
                    echo "<td colspan='2'> Viaje no disponible </td>";
                }

                echo "</tr>";
            }    
            ?>
                </tbody>
            </table>
            <?php  
        }
        tablas ($viajes, 0, SORT_DESC);
    ?>
    <h2>Subapartado 5</h2>
    <p>MOdifica la tabla de la función para que contenga una columna más llamada tipo. Que dependiendo de la duración de cada viaje
        contendrá una cadena u otra. La tabla, no el array.</p>
        <ul>
            <li>Duración <= 30 ... COrta distancia</li>
            <li>Duración > 30 <= 120 ... Media distancia</li>
            <li>Duración > 120 ... Larga distancia</li>
        </ul>
       <?php
        function tabla2 (array $viajes) {
        ?>
        <table border="">
        <thead>
            <tr >
                <th>Origen</th>
                <th>Destino</th>
                <th>Duración</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // recorremos el array
                foreach ($viajes as $viaje) {
                    list($origen, $destino, $dura, $precio) = $viaje;

                    $color="";

                    switch($precio){
                        case ($precio >= 1 && $precio < 10): $color = "blue"; break;
                        case ($precio >= 10 && $precio < 15): $color = "green"; break;
                        case ($precio >= 15): $color = "purple"; break;
                        default: $color = "";
                    }

                    echo "<tr style='background-color: $color ;'>";
                    echo "<td> $origen </td>";
                    echo "<td> $destino </td>";

                // según la duración modificamos la casilla de Tipo
                    $res = "";
                    switch($dura){
                        case ($dura <= 30): $res = "Corta distancia"; break;
                        case ($dura > 30 && $dura <= 120): $res = "Media distancia"; break;
                        case ($dura > 120): $res = "Larga distancia"; break;
                        default: $res = "No disponible";
                    }

                    if ($precio > 0){
                        echo "<td> $dura </td>";
                        echo "<td> $precio </td>";
                        echo "<td> $res </td>";
                        
                    } else {
                        echo "<td colspan='3'> Viaje no disponible </td>";
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            tabla2 ($viajes);
        ?>
</body>
</html>