<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4_Funciones</title>
</head>
<body>
    <h1> Funciones en PHP </h1>
    <?php
        /* 
        Una función es un bloque de código con un nombre que lo referencie
        Permite reutilizar código. Vamos a ver funciones con parámetros y con o sin
        returns
        */
        // Sin parámetros y sin return
        function saludar () {
            echo "hola <br>";
        };
        saludar ();

        // Con parámetros y sin return
        $a = "Juan";
        $b = 20;
        function presentarse ($nombre, $edad) {
            echo "Hola, mi nombre es $nombre y tengo $edad años <br>";
        }
        presentarse ("Pedro", 15);
        presentarse($a, $b);

        // Sin parámetros y con return
        function saludar2(){
            return "Holiwi <br>";
        };
        echo saludar2();

        /* 
        Parámetros con un valor por defecto
        Si no pasamos un argumento se utiliza el valor especificado
        Si combinamos parámetros obligatorios y opcionales, colocamos antes los primeros
        */
         function darBienvenida ($nombre = "Felipe") {
            echo "Bienvenido/a, $nombre <br>";
        };
        darBienvenida("Paquito");
        darBienvenida();

        // Con parámetros y con Return
        function operar ($a, $b) {
            return $a + $b;
        };
        $suma = operar(2,4);
        echo $suma;
    ?>
</body>
</html>