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
    <?php
        function ej6 () {
            $num = rand(100,150);

        }
        ej6 ();
    ?>

    <h3>Ejercicio 7</h3>
    <p>
        Crear una función que calcule con un for la suma de los siguientes números 1, -2, 3, -4... hasta n.
        Acepta enteros entre 0 y 100 y rechaza otros valores que estén fuera de rango. La función devolverá 
        la suma anterior y una comparación con la suma normal del 1 hasta n
    </p>
    <?php
        function ej7 (int $n):string {
            $res = ""; $sum = 0; $num = 0; $sumNor = 0;

            if($n <= 100 && $n >= 0) {
                for ($i=1; $i <= $n; $i++) { 
                    ($i % 2 == 0) ? $num = -$i : $num = $i;
                    $sum += $num;
                    $sumNor += $i;
                } 
                $res = "<p>Suma modificada: $sum </p>
                <p> Suma normal: $sumNor";
            } else {
                $res = "<p> No es un valor correcto </p>";
            }

            return $res;
        }

        echo ej7(13);
    ?>
    <h3>Ejercicio 8</h3>
    <p>
        Crea la función factorial ($n) para enteros de 0 a 15, rechazando valores fuera de ese parámetro.
        Un factorial es (3!) y significa 3! = 1 * 2 * 3. El factorial de 0! es 1.
    </p>
    <?php
        function ej8(int $n): string {
            $res = ""; $fact = 1;
            if($n >= 0 && $n <= 15) {
                for ($i=1; $i <= $n ; $i++) { 
                    $fact *= $i;
                }
                $res = "<p> El factorial es: $fact </p>";
            } else $res = "<p> No es un valor correcto </p>";
            
            return $res;
        }
        echo ej8(10);
    ?>
    <h3>Ejercicio 9</h3>
    <p>
        Sin convertirlo en cadena ni array, recorre las cifras de un número entero entre 0 y 999999 generado de 
        manera aleatoria. Calcula la cantidad de cifras que tiene el número, la suma de sus cifras, la cifra mayor,
        la menor y el número de 0 que contiene. Devolver una cadena como la siguiente: "Para 4050: cuatro cifras, 
        suma 9, mayor 5, menor 0, 2 ceros". Se saca con % 10. El último número se puede sacar convirtiendolo en num entero.
        En php eso se hace con intval.
    </p>
    <?php
        function ej9 (): string {
            $ran = rand(0, 999999); $num = 1; $cont = 0; $sum = 0; $min = 10; $max = 0; $cero = 0;
            $dum = $ran;
            while ($dum != 0){
                if($dum != 0) {
                    $cont++;
                    $num = intval($dum % 10);
                    $dum =intval($dum/10);
                    if ($num < $min) $min = $num;
                    if ($num > $max) $max = $num;
                    if($num == 0) $cero++;
                    $sum += $num;
                }
            }
            return "<p> Para $ran: $cont cifras, suma $sum, mayor $max, menor $min, $cero ceros </p>";
        }
        echo ej9();
    ?>
    <h3>Ej 10</h3>
    <p>
        Crea una función que, dependiendo del parámetro que se le pase, dibujará un triángulo más o menos grande
        El parámetro indicará el tamaño del triángulo. Altura mínima 3 (obligatorio).
        Opcional triangulo2(n). Hace el triángulo invertido
    </p>
    <?php
        function ej10(int $n) {
            if ($n < 3) $n = 3;

            // Triangulo 1
            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $n; $j++) { 
                    if($j <= $i) echo "* ";
                }
                echo "<br>";
            }
            echo "<br>";

            // Triangulo 2

            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $n; $j++) { 
                    if($j >= $i) echo "* ";
                }
                echo "<br>";
            }
            echo "<br>";

            // Triangulo 3

            for ($i=0; $i < $n; $i++) { 
                $num = 1;
                for ($j=0; $j < $n; $j++) { 
                    if ($num < ($n -$i)) {
                        $num++;
                        echo "&nbsp";
                    } else {
                        echo "* ";
                    } 
                }
                echo "<br>";
            }
                echo "<br>";

            // Triangulo 4

            for ($i=0; $i < $n; $i++) { 
                $num = 1;
                for ($j=0; $j < $n; $j++) { 
                    if ($num < ($n -$i)) {
                        $num++;
                        echo "&nbsp &nbsp";
                    } else {
                        echo "* ";
                    } 
                }
                echo "<br>";
            }
        }
        ej10(5);
    ?>
    <h3>Ejercicio 11</h3> <!-- Un ejercicio como este seguramente caiga en la prueba -->
    <p>
        Crea una función que acepte un parámetro numérico entero. Dado dicho número se construirá
        una tabla que calcule el cuadrado, el cubo y el signo de cada número empezando desde el número
        en negativo hasta llegar al número. Ejemplo gráfico para la llamada ej11(2) deberia salir:
    </p>
    <table border="">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cuadrado</th>
                <th>Cubo</th>
                <th>Signo</th>
            </tr>
            <tr>
                <th>-2</th>
                <th>4</th>
                <th>-8</th>
                <th>Negativo</th>
            </tr>
            <tr>
                <th>-1</th>
                <th>1</th>
                <th>-1</th>
                <th>Negativo</th>
            </tr>
            <tr>
                <th>1</th>
                <th>1</th>
                <th>1</th>
                <th>positivo</th>
            </tr>
            <tr>
                <th>2</th>
                <th>4</th>
                <th>8</th>
                <th>positivo</th>
            </tr>
        </thead>
    </table>

    <?php
        function ej11 (int $n) {
    ?>
        <table border="">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cuadrado</th>
                <th>Cubo</th>
                <th>Signo</th>
            </tr>
        </thead>
        <tbody>
    <?php
            $sty = 0;
            for ($i=-$n; $i <= $n; $i++) { 
                if($i != 0) {
                    $estilo = "";
                    if ($sty %2 == 0) $estilo = "aqua";
                    $sty++;
                    echo "<tr style='background-color: $estilo;'>";
                    /*
                    el estilo lo podemos meter directamente dentro de la etiqueta tr
                    */
                    echo "<td> $i </td>";
                    /*
                    existe una abreviatura a lo de arriba <td> <?= $i ?> <td 
                    */
                    echo "<td>" . ($i * $i) . "</td>";
                    echo "<td>" . ($i * $i * $i) . "</td>";
                    echo ($i < 0) ? "<td> Negativo </td>": "<td> Positivo </td>";

    ?>
                </tr>
    <?php
                }
            }
    ?>
        </tbody>
    <?php
        }
        ej11(4);
    ?>
    <h3>Ejercicio 12. Chungo</h3>
    <p>
        Crea una función que reciba un número y dibuje por ejemplo... (img de la pizarra):
        Ten en cuenta que si es impar se pone la ultima +, pero si es par no y no se cruza
        chungo(7)
        \+ + + + +/
         \ + + + /
           \ + /
             +
    </p>
    <?php
        function ej12 (int $n) {

            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $n; $j++) { 
                    if ($j == $i) echo "\\";
                    elseif ($j == (($n - $i)-1)) echo "/";
                    else echo"+";
                }
                echo "<br>";
            }
        }
        ej12(7);
    ?>
</body>
</html>