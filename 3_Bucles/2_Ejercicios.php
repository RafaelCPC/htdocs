<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 | Ejercicios</title>
</head>
<body>
    <h2> Ejercicio 1 </h2>
    <p> Con while recorre desde 150 hasta 0. Muestra los pares que no sean
        múltiplos de 6. Calcula su cantidad, la suma y la media
    </p>
    <?php
        $int = 150;
        $cant = 0;
        $sum = 0;
        $media = 0;
        while ($int >= 0) {
            if($int % 2 == 0 && $int % 6 != 0) {
                echo "<p> $int es par y no es mult de 6 </p>";
                $cant++;
                $sum += $int;
            }
            $int -= 2;
        }
        $media = $sum/$cant;
        
        echo "<p> Cantidad: $cant </p>";
        echo "<p> Suma: $sum </p>";
        echo "<p> Media: $media </p>";
    ?>
    <h2> Ejercicio 2 </h2>
    <p> Recorre desde 1 hasta 200 con un while, selecciona los múltiplos de 7 que no
        sean múltiplos de 3. Muestra cada seleccionado en una li dentro de una lista ordenada
        Cuando hayas acabado de mostrar todos, fuera de la lista, enseña la cantidad de números 
        que hay, su suma y su media
    </p>
    <ol>
    <?php
        $int = 1;
        $cant = 0;
        $sum = 0;
        $media = 0;
        while ($int <= 200) {
            if($int % 7 == 0 && $int % 3 != 0) {
                ?>
                    <li> <?php echo $int ?> Es mult de 7 y no es mult de 3 </li>
                <?php
                $cant++;
                $sum += $int;
            }
            $int++;
        }
    ?>
    </ol>
    <?php
    $media = $sum / $cant;
        echo "<p>Cantidad: $cant </p>";
        echo "<p>Suma: $sum </p>";
        echo "<p>Media: $media </p>";
    ?>
    <h> Ejercicio 3 </h2>
    <p> Empiezas con 0 euros y ahorras 40 euros a la semana hasta alcanzar o superar los 4k </p>
    <p> Versión 1: Calcula cuantas semanas debes de estar ahorrando para llegar o superar los 4k </p>
    <p> Versión 2: Añadir un gasto de 20 euros cada cuarta semana para ir a cenar con tu novia
        Calcular cuantas semanas debe estar ahorrando para llegar a los 4k y por cada semana que pase
        mostrar un párrafo el dinero aportado, el gastado y lo ahorrado hasta ese momento </p>
    <?php
        $euro = 0;
        $sema = 0;
        $gast = 0;
        while ($euro < 4000) {
            $euro += 40;
            $sema++;
            if($sema % 4 == 0) {
                $euro -= 20; 
                $gast += 20;
            }
            echo "<p> _________________</p>";
            echo "<p>Semana $sema  </p>";
            echo "<p> Dinero: $euro euros </p>";
            echo "<p> Gastado: $gast euros </p>";
            if($sema % 4 == 0) {
                echo "<p> Aportado:20 euros </p>";
            } else {
                echo "<p> Aportado: 40 euros </p>";
            }
        }
    ?>
</body>
</html>