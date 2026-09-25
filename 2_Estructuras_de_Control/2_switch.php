<?php

// Estructura de un switch

/*
    switch (valor de una variable) {
        case primer posible valor:
            .......
            break;
        case segundo posible valor:
            .......
            break;
        default:
    };
*/

$operacion = rand(1,5);
function operando ($operacion){
    switch ($operacion){
        case 1:
            echo "La operación escogida es la suma <br>";
            break;
        case 2:
            echo "La operación escogida es la resta <br>";
            break;
        case 3:
            echo "La operación escogida es la multiplicación <br>";
            break;
        case 4:
            echo "La operación escogida es la división <br>";
            break;
        default:
            echo "La operación escogida es el módulo <br>";
    };
};
operando (rand(1,5));


/*
    Un switch en el que entre como cadena el día de la semana, de lunes a viernes
    mi switch imprimirá por pantalla dentro de un párrafo: "me encantan los X"
    si me entra la palabra finde devolveré un "vamoos"
*/
$dia = "lunes";
function dias ($dia){
    switch ($dia){
        case "finde":
        echo "<p> VAMOOOS <p>";
        break;
        default:
        echo "<p> me encantan los $dia";
    }
};
dias ($dia);

/*
    Vamos a tratar con dos números: en el primer case, entraremos si y solo sí el 
    primer número es mayor o igual al segundo o el segundo número es menor o igual
    a 2.
    En el segundo case entraremos si y solo si el primer número es menor que el segundo
    y el segundo es igual a cinco veces el primero entre dos. Tendremos un default
    en cuyo echo pondremos "no se cumple ninguna de las otras dos condiciones"
*/
$num1 = 5; $num2 = 2;

switch(true) {
    case ($num1 >= $num2 || $num2 <= 2):
        echo "<p> El primer case se cumple </p>";
        break;
    case ($num1 < $num2 && $num2 == ((5*$num1)/2)):
        echo "<p> El segundo case se cumple </p>";
        break;
    default:
    echo "no se cumple ninguna de las otras dos condiciones";
};

/*
    Comprobar con switch si un número aleatorio del 1 al 100 es par o impar
    El switch devolverá un echo especificando la paridad dentro de una etiqueta h3.
*/
$ran = rand(1,100);
switch(true){
        case ($ran % 2 == 0):
            echo "<h3> Es un número par </h3>";
            break;
        default: 
            echo "<h3> Es un número impar </h3>";
};