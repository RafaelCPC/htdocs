<?php 
// si solo tenemos PHP en un documento no hace falta cerrarlo.
$salto = "<br>";
// Para crear una constante
define("numPI", 3.1416);
echo numPI;

// Tipos de datos

$int = 4;
$float = 4.1;
$char = "cuatro coma uno"; // en php el string siempre es un array de chars
$boolean = true;
$null = null;
var_dump($int);
var_dump($float); // muestra el tipo de dato
var_dump($char); // muestra las cantidades de caracteres y el valor

// Conversion de datos

// De un tipo de dato a int

$cadena = "1"; 
/* si en vez de un numero escribimos una palabra se pasa a entero
Pero es una variable de valor 0. Si lo hacemos con un decimal, el decimal
no se incluye. Solo interpreta hasta donde puede */

echo "Mostrar el numero en cadena: ";
var_dump($cadena); //string
intval($cadena); //para pasarlo a entero
var_dump($cadena); //entero
echo $salto;

// De un tipo de dato a String
$numero = 12.1; 
/*
Si usamos un boolean pasa a un String "1". 
Si es false es 0 y un string vacio
*/
echo "Mostrar el numero decimal: $salto";
var_dump($numero);
$numero = strval($numero);
var_dump($numero);

// de un tipo a float
$entero = "13.1";
echo "Mostrar el numero entero: $salto";
var_dump($entero);
$entero = floatval ($entero);
var_dump($entero);
