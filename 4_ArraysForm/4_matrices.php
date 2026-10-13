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
                list ($titulo, $categoria, $precio) = $juego; // nos divide el array en los elementos que queramos
                echo "<p> $titulo : $categoria - $precio </p>";
            }
    ?>
</body>
</html>