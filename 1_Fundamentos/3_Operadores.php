<?php
    $salto = "<br>";
    $num1 = 14;
    $num2 = 20;

    echo " Suma: " . ($num1+$num2) .$salto; 
    // los paréntesis pueden ser importantes porque puede dar problemas
    echo "Resta: ".($num2-$num1) .$salto;
    echo "Multiplicación: ".($num2*$num1) .$salto;
    echo "División: ".($num2/$num1) .$salto;
    echo "Resto: ".($num2%$num1) .$salto;

    // Incremento y Decremento (post y pre)
    $num3 = $num2++; //postincremento
    echo "valor de num3: $num3 Valor de num2: $num2 $salto"; 
    /* 
        num2 sería 21 num3 sería 20
        Esto se debe a que se hacen dos operaciones. 
        Primero se asigna el valor
        Luego se suma.
    */
    
    $num3 = ++$num2; //preincremento
    echo "valor de num3: $num3 Valor de num2: $num2 $salto"; 
    /* 
        num2 sería 22 num3 sería 22
        Esto se debe a que se hacen dos operaciones. 
        Primero se suma
        Luego se asigna valor
    */

    // Decremento
    $num4 = $num2--;
    echo "valor de num4: $num4 Valor de num2: $num2 $salto"; 
    $num4 = --$num2;
    echo "valor de num4: $num4 Valor de num2: $num2 $salto"; 

    // Operadores Lógicos 

    echo "Es num1 mayor que 10?: ".($num1>10) .$salto;
    // Va a dar 1, que es true.

    echo "Es num3 mayor o igual que 3 o es num3 menor que 2?: ". (($num3 >= 3) || ($num3 <2)).$salto;

    echo "Es num3 igual a num2 y es num1 menor que num2?: ". (($num3 == $num2) && ($num1 < $num2)) . $salto;

    $numero = 12;
    $cadena = "12";
    $estricto =$numero === $cadena; //el comparador debil es (==) y el estricto (===)
    echo $estricto .$salto;
    echo "num1 y num2 no son iguales: " . !($num1 = $num2) .$salto; // Se puede hacer tanto != como !()
    