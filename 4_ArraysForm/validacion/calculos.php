<?php
/*
    Crear tres constantes donde el nombre sea el tipo de IVA y su valor el número por el que
    multiplicar el precio que de el pvp

    General => 1.21
    Reducido => 1.1
    Superreducido => 1.04
*/
define("General", 1.21);
define("Reducido", 1.1);
define("Superreducido", 1.04);

function calcularPVP (int | float $precio, string $iva): float {

    // Se puede llamar a las constantes dentro de una función
    return match ($iva) {
        "general" => General * $precio,
        "reducido" => Reducido * $precio,
        "superreducido" => Superreducido * $precio
    };
}
