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
            if ($sema % 4 == 0) {
                echo "<p> Aportado:20 euros </p>";
            } else {
                echo "<p> Aportado: 40 euros </p>";
            }
        }
    ?>

    <h3> Ejercicio 4 </h3>
    <p>
        Genera números enteros del 1 al 20 con un do-while y acumulalos. Si superas el 100
        sin haber alcanzado exáctamente el num 100 entonces el bucle termina y tienes que mostrar
        el número creado y dibujar la fuente de la frase en rojo si es par y en azul si es impar.
        En el caso de que hayas llegado exáctamente al 100 seguirás iterando hasta llegar o sobrepasar
        el 150. En este caso, la frase estará en verde si es par y en morado si es impar.
        Además, añade el número de iteraciones
    </p>
<?php
$num = 0;
$sum = 0;
$string = "blue";
    do {
        $num = rand(1,20);
        $sum += $num;
        if ($sum > 100 && $sum % 2 == 0)  $string = "red";
        if($sum == 100) {
            while ($sum < 150) {
                $num = rand(1,20);
                $sum += $num;
                $string = "purple";
                if ($sum >= 150 && $sum % 2 == 0) $string = "green";
            }
        }
    } while ($sum < 100);
    echo "<p> El numero de iteraciones es $num </p>";
    echo "<p style='color : $string' > La suma acumulada es  $sum </p>";
?>
    <h3>Ejercicio 5</h3>
    <p> Crea una función que reciba un número y dos límites enteros. Rechaza límites invertidos
        Recorre el intervalo con for y muestra solo las operaciones cuyo resultado sea par. Calcula
        cuántas has mostrado y la suma de sus resultados
        En el caso de que todas las operaciones sean impar muestra que no haya ningún resultado par
        En el caso de que se introduzca el min y el máx estén mal se invierte
    </p>
    <?php
    $min = 0;
    $max = 0;
    function mult (int $num, int $min, int $max) {
        $cambio= 0;
        $mult = 0;
        $boo = false;
        $sum = 0;
        $cont = 0;
        if ($min > $max) {
            $cambio= $max;
            $max = $min;
            $min = $cambio;
        } 
        for ($i=$min; $i <= $max ; $i++) { 
            $mult = $num * $i;
            if ($mult % 2 == 0) {
                echo "<p> $num * $i = $mult </p>";
                $sum += $mult;
                $boo = true;
                $cont++;
            } 
        }
        echo "<p> La suma total es $sum </p>";
        echo "<p> Se ha mostrado $cont </p>";
        if(!$boo) {
        echo "<p> No hay resultado par </p>";
        }
    }
    mult(5, 3, 8);

    ?>
    <h3>Ejercicio 6</h3>
    <p>
        Function grupos () {
            rand (100, 150)
            Creamos 4 grupos donde guardamos los num. mult de 3, los de 5, los de 3 y 5 y el resto. Además hay que sacar la media
            de cada grupo
        }
    </p>
</body>
</html>