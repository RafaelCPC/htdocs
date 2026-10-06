<?php
    /*
        Existen muchas funciones para arrays. No las vamos a dar todas, pero
        sí las importantes. Si haces F12 en una función te lleva a su definición
    */

    $notas = ["Ana" => 7, "Leo" => 9, "Samu" => 3, "Alba" => 10];

    // modificar el array usando su clave
    foreach($notas as $nombre => $nota) {
        $notas[$nombre] = $nota-1;
    }
    echo "<pre>";
    print_r($notas);
    echo "</pre>";
    
    $notas = [4, 6, 1, 10, 9, 9];

    // se puede hacer así
    foreach($notas as $pos => $valor){
        echo "posicion: $pos Nota: $valor <br>";
    }

    // Y así
    for ($i=0; $i < count($notas); $i++) { 
        echo "posicion: $i Nota: $notas[$i] <br>";
    }

    /*
     Funciones para trabajar con arrays

     sort ();
     rsort ();
     asort ();
     arsort ();
     ksort ();
     krsort ();
    */

    $notas = ["Ana" => 7, "Leo" => 9, "Samu" => 3, "Alba" => 10];
    $copia = $notas;
     sort ($copia); // ordena los valores de menor a mayor y elimina las claves

     echo "<pre> Sort";
     echo print_r($copia);
     echo "</pre>";

     $copia = $notas;
     rsort ($copia); // ordena los valores de mayor a menor y elimina las claves

     echo "<pre> Rsort";
     echo print_r($copia);
     echo "</pre>";

     $copia = $notas;
     asort ($copia); // ordena los valores de menor a mayor y respeta las claves

     echo "<pre> Asort";
     echo print_r($copia);
     echo "</pre>";

     $copia = $notas;
     arsort ($copia); // ordena los valores de mayor a menor y respeta las claves

     echo "<pre> Arsort";
     echo print_r($copia);
     echo "</pre>";

     $copia = $notas;
     ksort ($copia); // ordena las claves de menor a mayor o alfabéticamente
     
     echo "<pre> Ksort";
     echo print_r($copia);
     echo "</pre>";

     $copia = $notas;
     krsort ($copia); // ordena las claves de mayor a menor o alfabéticamente

     echo "<pre> Krsort";
     echo print_r($copia);
     echo "</pre>";
     echo "<br>";

     // in_array (); busca un valor en el array. Devuelve bool
     $numeros = [10, 20, 30, 20, 10, 10];
     echo (in_array(9, $numeros)) ?  "El número está <br>" : "El número no está <br>";
     echo (in_array("10", $numeros)) ?  "El número está <br>" : "El número no está <br>"; // no importa el tipo de dato

     // array_search(); busca un valor en el array. Devuelve la primera posición en la que se encuentre
     $posicion = array_search (10, $numeros);
     echo $posicion;
     echo "<br>";

     // array_slice (); saca un array desde la posición que se indica. El segundo número son las posiciones que recorre
     $trozo = array_slice($numeros, 1, 4);
     print_r($trozo);
     echo "<br>";

    $trozo = array_slice($numeros, 2, 1);
     print_r($trozo);
     echo "<br>";

    $trozo = array_slice($numeros, count($numeros) - 1, 4); // coge el último valor y ya está
     print_r($trozo);
     echo "<br>";

    // array_unique() saca un array con los valores que no se repitan
    $patata = array_unique($numeros);
    print_r($patata);
    echo "<br>";

    $patata = array_values(array_unique($numeros));
    print_r($patata);
    echo "<br>";

    // explode (separador, cadena); devuelve un array a partir de una cadena, usando como separador para 
    // crear cada elemento del array el pasado como parámetro 
    $palabras = explode(",", "manzana, pera, lichi, tomate");
    print_r($palabras);
    echo "<br>";


    // implode (separador, array); coge cada valor y los mete en un string separándolos con lo que le especifiquemos
    $cadena = implode(" ", $palabras);
    echo $cadena;
    echo "<br>";

?>