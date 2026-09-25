<?php

// Formas de hacer una estructura de control if

$a = -3;

// Primera forma

if($a > 0){
    echo"<p> El número es positivo </p>";
};

// Segunda forma

if ($a) echo "<p> El número es positivo </p>";

// Tercera forma

if ($a):
    echo "<p> El número es positivo </p>";
endif;

// Formas de hacer una estructura de control if else

// Primera forma

if ($a > 0){
    echo "<p> El número es positivo </p>";
} else {
    echo "<p> El número es cero o negativo </p>";
};

// Segunda forma

if ($a > 0) echo "<p> El número es positivo </p>";
else echo "<p> El número es cero o negativo </p>";

// Tercera forma

if ($a > 0):
    echo "<p> El número es positivo </p>";
else:
    echo "<p> El número es cero o negativo </p>";
endif;

// Formas de hacer un if elseif

// Primera forma

if($a > 0) {
    echo "<p> El número es positivo </p>";
} elseif($a == 0) {
    echo "<p> El número es cero </p>";
} else {
    echo "<p> El número es negativo </p>";
};

// Segunda forma

if ($a > 0) echo "<p> El número es positivo </p>";
elseif ($a == 0) echo "<p> El número es cero </p>";
else echo "<p> El número es negativo </p>";

// Tercera forma

if($a > 0):
    echo "<p> El número es positivo </p>";
    elseif ($a == 0):
    echo "<p> El número es cero </p>";
    else:
    echo "<p> El número es negativo </p>";
    endif;