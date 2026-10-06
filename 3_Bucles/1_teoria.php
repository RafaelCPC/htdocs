<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3. Bucles </title>
</head>
<body>
    <h1> Bucles </h1>
    <p> 
        Un bucle repite un bloque de código tantas veces como queramos,
        el número de iteraciones dependerá de la condición que definamos y
        cómo interactúa dicha condición con la variable booleana o iterativa.
    </p>
    <?php
        // 1. While
        $numero = 5;
        while ($numero <= 12) {
            echo "El valor de número es: $numero <br>";
            $numero++;
        }
        echo $numero . "<br>";

        // 2. Do While
        /* 
         partiendo del num 9 hacia abajo hasta llegar al 0 sin inc
         mostrar por nav en una linea para cada uno todos los numeros 
         par
        */
         $num = 9;
        do {
            if($num % 2 == 0) echo "El $num es par <br>";
            $num--;
        } while ($num > 0);

        // 3. For
        /*
            Sabes el número de interacciones que quieres hacer
        */
            for ($i = 0; $i <= 10; $i++) {
                echo "<p id='parrafo_$i'> Estamos en el parrafo $i </p>";
            }
        
        // 4. Bucles Anidados
        for ($i=0; $i < 4; $i++) {  // filas
            
            for ($j=0; $j < 4; $j++) { // columnas
                echo "[$i, $j] ";
            }
            echo "<br>";
        }

        /*
         5. For each
            Sirve para iterar los elementos de un array tanto asociativos como indexado
        */
        $nombres = ["12345678A" => "Ana","33421231B" => "Luis","98765432C" =>  "Marta","77882220D" =>  "Paquito","5552334" =>  "Emilio"];
        
        // esto me saca el valor solo
        foreach($nombres as $nombre) {
            echo $nombre . "<br>";
        }

        $deportes = ["baloncesto" => "Lebron", "futbol" => "Messi", "tenis" => "Federer", "MMA" => "nurmagomedov"];
        foreach($deportes as $deporte => $jugador) {
            if($deporte =! "MMA") echo "<p> En el $deporte el rey es $jugador </p>";
            else echo "<p> En las $deporte el rey es $jugador </p>";
            }

        // 6. Generar HTML con un bucle

        echo "<h2> Generar una lista HTML con un bucle </h2>";
        echo $num = 0;
    ?>
    <ul>
        <?php
            while($num % 7 == 0 && $numero % 3 != 0) {
        ?>
        <li> Mi numero es el <?php echo $num ?> </li>
        <?php
            $num++;
            }
        ?>
    </ul>
</body>
</html>