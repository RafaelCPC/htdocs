<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios simples | Tema 4</title>
</head>
<body>
    <h3>Ejercicio 1</h3>
    <p>
        La biblioteca del insti tiene los siguientes libros: "El Quijote", "1984", "Dune" y "Matilda".
    </p>
    <p>
        Crea la función "unirConComas($array)", que devuelve un texto con todos los valores separados
        por coma (sin coma al final). La usarás en el resto de ejercicios.
    </p>
        <?php
            $libros = ["El Quijote", "1984", "Dune", "Matilda"]; $libroStr = "";
        
            function unirConComas($arra): string {
                $libroStr = implode(", ", $arra);

                return $libroStr;
            }

            echo unirConComas($libros) . "<br>";
        ?>
    <p>
        Añade "Momo", "Dracula" y "El perfume" al final de la biblioteca
    </p>
    <?php
        //$libros [] = "Momo"; Si tenemos un array asociativo no podemos usar la otra forma
        array_push($libros, "Momo", "Dracula", "El perfume"); //otra forma de meter valores, pero no funciona en indexado
        
        echo "<pre>";
        print_r($libros);
        echo "</pre>";
    ?>
    <p>
        Se piden prestados "Dune" y "Hamlet". Para cada petición, busca la posición del libro y, si está,
        crea un array nuevo sin ese libro. De modo que no queden huecos y muestra lo siguiente: "Prestado: Dune"
        y en caso de que el libro no lo tenga en la biblioteca, "No disponible: Hamlet"
    </p>
    <?php
    // lo podemos hacer realmente con un foreach y un bool. Para eliminar el libro usamos unset[$posicion]
        function pedirLibro (string $libro, array $libros): array {
            (in_array($libro, $libros)) ? array_splice($libros, array_search($libro, $libros),1):  "<p> No disponible: $libro" ;
            return $libros;
        }
        echo "<pre>";
        print_r(pedirLibro("Dune", $libros));
        echo "</pre>";
        echo "<pre>";
        print_r(pedirLibro("Hamlet", $libros));
        echo "</pre>";
    ?>
    <p>
        Muestra la lista numerada (1. , 2., 3.  ...) el total de libros y, en una sola línea los libros en orden
        inverso
        En el otro ejercicio nos cargamos el array. Asi que tenemos que guardarlo otra vez
    </p>
    <?php
        $libros = array_values($libros); // Lo usamos cuando necesitamos resetear las posiciones del array. Ya sea porque nos
        // hemos cargado las posiciones o porque queremos pasar de un array asociativo a uno indexado.
        // como el foreach va por elementos y no por posiciones, el <li> nos lo da bien aunque las posiciones estén equivocadas.
        echo "<ol>";
        foreach($libros as $libro){
            echo "<li> $libro </li>";
        }
        echo "</ol>";

        $total = count ($libros);
        echo "<h3> Total de libros de mi biblioteca: $total </h3>";

        rsort($libros);
        echo unirConComas($libros) . "<br>";
    ?>

    <p>
        Ejercicio 2
    </p>
    <p>Una tienda informática guarda su stock en un array asociativo con la siguiente forma producto -> unidades:</p>
    <ol>
        <li>Crear un stock original en el que tengamos 12 teclados, cero ratones, 5 monitores, 3 webcams y 0 altavoces</li>
    <?php
        $stock = [];
        $stock ["Teclado"] = 12;
        $stock ["Ratones"] = 0;
        $stock ["Monitores"] = 5;
        $stock ["Webcams"] = 3;
        $stock ["Altavoces"] = 0;

    echo "<pre>";
    echo print_r($stock);
    echo "</pre>";
    ?>
        <li>Crear una función "estadoStock(unidades)" que devuelva "agotado" (0), "Pocas unidades" (1 a 3) o "disponible" (más de 3)</li> 
        <?php
            function estadoStock($unidades){
                    $resul= match($unidades){
                        0 => "agotado",
                        1, 2, 3 => "Pocas unidades",
                        default => "disponible"
                    };
                return $resul;
            }
         ?>       
         <li>
            Llega un pedido de reposición: raton 10, webcam 2, microfono 7. Suma las unidades a los
            productos existentes. Si el producto no existia antes, añádelo e indica en un Echo "nuevo producto: Micrófono"
         </li>
         <?php
         $pedido = [];
         $pedido ["Ratones"] = 10;
         $pedido ["Webcams"] = 2;
         $pedido ["Microfonos"] = 7;
            foreach($pedido as $reposicion => $un){
                $esta = false;
                foreach($stock as $tipo => $unidades) {
                    if($tipo === $reposicion) {
                        $stock[$tipo] += $un;
                        $esta = true;
                    }   
                }
                if (!$esta){
                        echo "<p> Nuevo producto: $reposicion </p>";
                        $stock[$reposicion] = $un;
                    }
                /* Otra manera
                    if(array_key_exist($reposicion, $stock)){
                        $stock[$tipo] += $un;
                    } else {
                        echo "<p> Nuevo producto: $reposicion </p>";
                        $stock[$reposicion] = $un;
                    }
                */

            }
         ?>

         <li>Crear una tabla inicial con tres columnas. La primera contendrá el nombre del producto, la segunda el número de unidades disponibles
            y el tercero el resultado de la función estadoStock. Además, si no quedan unidades, la fila tendrá el color de fondo rojo. Si quedan pocas
            amarillo y, si están disponibles, azul.
         </li>
         <?php
            function mostrar (array $stock) {
         ?>
         <table border="">
         <thead>
            <tr>
                <th >Nombre</th>
                <th>Unidades</th>
                <th>Estado</th>
            </tr>
         </thead>
         
         <?php
         $cant = 0; $max = 0; $maxProd = "";
         foreach ($stock as $tipo => $unidades) {
            $estilo = "red";
            if(estadoStock($unidades) == "Pocas unidades") $estilo = "yellow";
            else if (estadoStock($unidades) == "disponible") $estilo = "lightblue";
            echo "<tr style = 'background-color: $estilo '; >";
            echo "<td> $tipo </td>";
            echo "<td> $unidades </td>";
            echo "<td>" . estadoStock($unidades) . "</td>";
            echo "</tr>";
            $cant += $unidades;
                if($unidades > $max) {
                    $max = $unidades;
                    $maxProd = $tipo;
                }
            }
         ?>
         </tr>
         </table>
         <?php
            echo "<p> Total de productos:  $cant </p>";
            echo "<p> Producto mayoritario: $maxProd </p>";
            }
            mostrar($stock);
         ?>
        <li>
            Mostrar la función de la tabla (si lo hemos hecho en una función) y si no, creamos una función.
            En esa función, mostrar debajo el total de unidades de productos que tengo en mi tienda, el producto con más unidades
            y una lista no ordenada de productos agotados. 
        </li>
        <?php

        ?>
    </ol>

</body>
</html>