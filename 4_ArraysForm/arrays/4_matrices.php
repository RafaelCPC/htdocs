<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices | Tema 4</title>
</head>
<body>
    <?php
    /*
        Un array bidimensional tiene como característica que cada elemento del array principal
        contiene otro array
    */
        $videojuegos = [
            ["Silksong", "Metroidvania", 20],
            ["Elden Ring", "Souls", 60],
            ["Lego Batman", "Lego", 80],
            ["Cyberpunk", "RPG", 60],
            ["Silksong", "Metroidvania", null],
        ];
        echo $videojuegos[0][0]; // Cilantro
        $videojuegos [] = ["DSIII", "Souls", 40];

        foreach ($videojuegos as $videojuego) {
            foreach($videojuego as $caracteristica) {
                echo $caracteristica . " ";
            }
            echo "<br>";
        }
        echo "______________ <br>";

        for ($i=0; $i < count($videojuegos); $i++) { 
            for ($j=0; $j < count($videojuegos[$i]); $j++) { 
                echo $videojuegos[$i][$j] . " ";
            }
            echo "<br>";
        }

        /*
            Para recorrer los elementos necesitamos dos foreach. Pero hay otro método más sencillo
        */
        foreach ($videojuegos as $juego){
            list ($titulo, $categoria, $precio) = $juego; // nos divide el array en los elementos que queramos siempre que conozcamos la estructura del array
            echo "<p> $titulo : $categoria - $precio </p>";
        }
        echo "<pre>";
        print_r($videojuegos);
        echo"</pre>";
        // esta estructura es parecida al JSON y vamos a aprender de esto al JSON y al revés
        $personas = [
            "Ana" => ["dni" => "12341234A", "edad" => 23],
            "Alberto" => ["dni" => "12341234B", "edad" => 29],
            "Samu" => ["dni" => "12341234C", "edad" => 19],
        ];

        $resultado = "";

        foreach ($personas as $nombre => $informacion) {
            $resultado .= "<p> $nombre: ";
            $tam = 0;
            foreach ($informacion as $key => $value) {
                if($tam != count($informacion) - 1){
                    $resultado .= $key . "->" . $value . " || ";
                    $tam++;
                } else {
                    $resultado .= $key . "->" . $value;
                }
            }
            $resultado .= "</p>";
        }
        echo $resultado;

        /*
            Sacar de videojuegos en un array indexado la columna de las categorías del array videojuegos
            Y, en otro array, la columna de los precios
        */
            $categorias = [];
            $precios= [];
            foreach ($videojuegos as $videojuego) {
                list($nombre, $cat, $precio) = $videojuego;
                array_push($categorias, $cat);
                array_push($precios, $precio);
            }
        echo "<pre>";
        print_r($categorias);
        echo"</pre>";

        echo "<pre>";
        print_r($precios);
        echo"</pre>";

        // Una función que hace lo mismo de antes pero más fácil. Nos saca la columna que queramos
        $categorias = array_column($videojuegos, 1);
        $precios = array_column($videojuegos, 2);

        // La siguiente función ordena el array de diferentes formas. Como en base de datos
        // Array multisort solo funciona si hemos sacado las columnas antes, al final, estamos usando esa columna
        // para ordenarlo. 
        array_multisort($categorias, SORT_ASC, $videojuegos); // orden ascendente
        echo "<pre>";
        print_r($videojuegos);
        echo"</pre>";

        array_multisort($categorias, SORT_ASC, $precios, SORT_DESC, $videojuegos); // orden descendente. Podemos poner todos los filtros que queramos
        // pero solo entra en el segundo filtro si dos valores tienen el mismo valor en el primer filtro
        echo "<pre>";
        print_r($videojuegos);
        echo"</pre>";
    ?>  
</body>
</html>