<?php
    /*
     Variables globales (accesibles desde todo el archivo), 
     locales (solo accesibles dentro del archivo) 
     y estáticas (como las locales pero su valor no se resetea)
    */
    // Variables Locales: Se crea dentro de una función y solo se puede usar dentro de esta
    function mostrarAlumno () {
        $nombre = "Monica";
        echo "Desde dentro de la función: $nombre <br>";
    }
    mostrarAlumno();
    //echo $nombre no funcionaría fuera al estar creada dentro de la función

    $nombre = "Fran";
    echo $nombre; // Esto sí funcionaría pero es otra variable totalmente diferente

    /*
     Variable Global: Se crean fuera de las funciones y es accesible en todo el fichero
     gracias a la palabra reservada "global".
    */
    $modulo = "Desarrollo web en entorno servidor";
     function mostrarCurso () {
        global $modulo;
        // Se define dentro de la función porque a lo mejor no te apetece tenerlas en otras
        echo "Desde dentro de la función : $modulo <br>";
     };
     mostrarCurso();

     $numerito = 1;
     function sumar () {
        global $numerito;
        $numerito += 2;
     };
     sumar ();
     echo $numerito . "<br>";

     // Variables Estáticas
    function contadorConLocal () {
        $cont = 0;
        $cont++;
        echo "Cont Local: $cont <br>";
     };
    contadorConLocal();
    contadorConLocal();

    function contadorConEstatica () {
        static $cont = 0;
        $cont++;
        echo "Cont con Estatica: $cont <br>";
     };
     contadorConEstatica();
     contadorConEstatica();
     contadorConEstatica();

     /*
        Crear una función que duplique el valor de una variable local inicializada
        en 2 hasta que el resultado de las llamadas a la misma función sea 1024
     */
    function duplicar () {
      $valor = 2;  
      while ($valor <1024){
        $valor *= 2;
      }
      echo $valor ."<br>";
    }
    duplicar ();

    function sinBucle () {
        static $val = 2;
        echo $val ."<br>";
        $val *= 2;
    };
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
    sinBucle();
