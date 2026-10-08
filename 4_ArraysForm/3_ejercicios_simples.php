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
        //$libros [] = "Momo";
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
    </p>
    <?php
        echo "<pre>";
        print_r(array_values($libros));
        echo "</pre>";
    ?>
</body>
</html>