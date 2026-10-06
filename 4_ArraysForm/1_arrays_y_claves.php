<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays y claves | Tema 4</title>
</head>
<body>
    <?php
    $salto = "<br>";
        // 1. Array Indexado: claves numéricas automáticas desde 0
        // En php muchas cosas se manejan mediante arrays
        $frutas = []; // creamos un array vacío
        $frutas = ["Manzana", "Pera", "Piña"]; // también podemos crearlo con valores predefinidos
        echo $frutas[0] . $salto;
        // echo $frutas; va a llamarte la atención
        print_r($frutas); // esto sí va a funcionar porque esta función printea arrays. Nos da también el indice
        
        // esto da una cosa
        echo "<pre>" . print_r($frutas) . "</pre>"; // devuelve 1 (true) 
        // esto da otra totalmente diferente, aunque es parecido
        echo "<pre>";
        print_r($frutas);
        echo "</pre>"; // esto si nos saca todo el array, es la manera que vamos a usar

        var_dump($frutas); // otra manera de imprimir el array. Nos dice el nº de elementos y el tipo de dato de cada elemento

        echo $frutas[9]; // no saca nada porque no hay.

        // 2. Arrays Asociativos: son arrays cuya particularidad es que accedemos a los valores 
        // de dichos arrays a través de claves y no por posiciones
        $personas = ["2adaw" => "Samu", "2bdaw" => "Menganito", "2mkt" => "Fulanita", "2com" => "Fulgencio"];
        echo $salto. $personas ["2adaw"].$salto;

        // Como meter valores nuevos a mi array ya creado de antes
        $personas ["2tresde"] = "Vini";
        echo "<pre>";
        print_r($personas);
        echo "</pre>"; 
        var_dump($personas);

        $personas [] = "Lamine"; // esto te lo hace pero, en vez de clave, se asigna una posición
        $personas [] = "Nico";
        echo "<pre>";
        print_r($personas);
        echo "</pre>"; 
        var_dump($personas);


        $personas ["2adaw"] = "Juan"; //Samu se va a la M.
        echo "<pre>";
        print_r($personas);
        echo "</pre>"; 
        var_dump($personas);

        // 3. Añadir, Modificar y Eliminar elementos dentro de un array
        print_r($frutas);
        $frutas [] = "Coco"; // si no se pone posición, busca la última que encuentre y la mete
        $frutas [9] = "platano"; // te deja meter un valor en cualquier posición, 
        // pero las posiciones anteriores no existen. No es que no haya nada, no se pueden recorrer.
        $frutas [] = "Banana"; // busca la última posición, por lo que sigue en 10

        echo $salto;
        echo $salto;

        // existe una función que vamos a usar ahora y más adelante para eliminar cosas
        unset($frutas[0]); // se carga la posición  y el valor de 0
        // unset se puede usar con muchas cosas. como la variable $salto por ejemplo
        print_r($frutas);

        $frutas[1] = "Sandia"; // para modificar una posición
        print_r($frutas);

        //count(array) da el tamaño
        echo "Tamaño del array frutas: " . count($frutas) . " Tamaño del array personas: " .count($personas) . $salto;
        // count funciona tanto como posiciones como en arrays asociativos

        //array_values
        // echo array_values($frutas); devuelve un array
        echo "<pre>";
        print_r(array_values($frutas)); // saca los valores y los guarda en un array ordenado
        echo "</pre>";
        // esto se puede hacer
        // $frutas = array_values($frutas); 
         $personas = array_values($personas); // se pasa de un array asociado a uno indexado

        echo "<pre>";
        print_r(array_values($personas)); // saca los valores y los guarda en un array ordenado
        echo "</pre>";
        
        // 4. Comprobar claves
        $animales = ["mamifero" => "gato", "reptiles" => "lagarto", "aves" => "loro", "peces" => "martillo"];
        
        //isset() esta función es muy importante y la vamos a usar mucho
        //isset ($var) => si la función tiene algún valor distinto de nulo devuelve un bool
        var_dump(isset($animales["anfibio"])); // devuelve false

        //array_key_exist(clave, arr) comprueba si existe una clave y devuelve un bool
        var_dump(array_key_exists("anfibio", $animales));
        var_dump(array_key_exists("mamifero", $animales));
        echo $salto;
        
        // Operador de fusión nulo => ??
        echo $animales["anfibio"] ?? "no existe"; // es como el ternario pero se da la condición por dada.
        // es decir si se cumple la condición saca $animales["anfibio"] sino saca "no existe"
        // comprueba que la variable tenga un valor distinto de Null, si es Null, se mostrará un valor alternativo
        // echo (2 < 3) ? "hola" : "adios"; // ternario
        echo $salto;
        $animales["anfibio"] = "rana";
        echo $animales["anfibio"] ?? "no existe";
        echo "<br>";


        // 5. Comparación
        $a = ["uno" => 1, "dos" => 2];
        $b = ["dos" => 2, "uno" => 1];
        /*
            En php, como todo son variables y no hay tipos de datos, compararar dos arrays
            es muy sencillo. Solo tenemos que hacer lo siguiente. En Java sería mucho más 
            difícil porque tendrías que hacer un bucle y eso.
        
        */
        var_dump($a == $b); // T - porque tiene las mismas asociaciones clave - valor
        var_dump($a === $b); // F - Tiene las mismas asociaciones, pero el orden es distinto
        
        $a = [1,2]; 
        $b = ["1","2"]; 
        echo "<br>";


        var_dump($a == $b);// T - son los mismos valores
        var_dump($a === $b); // F - el tipo de dato es diferente
        echo "<br>";

        $p1 = ["Ana", "Luis"];
        $p2 = ["Luis", "Ana"];

        var_dump($p1 == $p2); // F - sale falso porque las posiciones no son las mismas
        var_dump($p1 === $p2); // F - ni las posiciones ni el string son los mismos
        
    ?>  
</body>
</html>