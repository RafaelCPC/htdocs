<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1.</title>
</head>
<body>
    <ol>
        <li>
            Crea una función que muestre "Hola {tu nombre}" usando una variable
            definida desde fuera de la función recogiendo dicha función a través
            de un parámetro. En caso de llamar a la función sin parámetro el valor
            por defecto  será "Paquito"
        </li>
        <li>
            Crea una función llamada operaciones que, dadas dos variables, saque por
            pantalla, la suma, resta, division, modulo y multiplicación de todas las variables
            No hace falta tener en cuenta la división por 0.
        </li>
        <li>
            Haz uso de los operando "^" y "**" para dos variables numéricas 2 y 10
            Dada la solución deduce qué hace cada operando.
        </li>
    </ol>

    <?php
        /*
            Crea una función que muestre "Hola {tu nombre}" usando una variable
            definida desde fuera de la función recogiendo dicha función a través
            de un parámetro. En caso de llamar a la función sin parámetro el valor
            por defecto  será "Paquito"
        */
            $nom = "Juan";
            function saludo ($nombre = "Paquito") {
                echo "hola, $nombre <br>";
            };
            saludo($nom);
            saludo ();

        /*
            Crea una función llamada operaciones que, dadas dos variables, saque por
            pantalla, la suma, resta, division, modulo y multiplicación de todas las variables
            No hace falta tener en cuenta la división por 0.
        */
            $va1 = 4;
            $va2 = 3;
            function operaciones ($a, $b) {
                echo "Suma: ". $a + $b. "<br>";
                echo "Resta: ". $a - $b. "<br>";
                echo "División: ". $a / $b. "<br>";
                echo "Modulo: ". $a % $b. "<br>";
                echo "Multiplicación: ". $a * $b. "<br>";
                echo "_________________ <br>";
            };
            operaciones(5,6);
            operaciones($va1, $va2);

        /*
            Haz uso de los operando "^" y "**" para dos variables numéricas 2 y 10
            Dada la solución deduce qué hace cada operando.
        */
            $var3 = 2;
            $var4 = 10;
            $res = $var3^$var4;
        
            echo "**: " . ($var3**$var4) . "<br>";
            echo "^ : " . $res . "<br>";
    ?>
</body>
</html>