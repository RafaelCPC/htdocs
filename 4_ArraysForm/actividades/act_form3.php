<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjunto Matemático</title>
    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>
</head>
<body>
    <?php
        /*
            La primera parte del ejercicio es parecida al primero.
            Tenemos dos campos como en el primer ejercicio. En uno entran varios numeros separados con coma.
            En el otro se introduce otros numeros. Vamos a hacer un conjunto. Tenemos que unir los dos conjuntos,
            la intesección y las dos diferencias. La unión es juntar las dos cadenas, sin los numeros repetidos.
            La intesección los valores que se repiten entre las cadenas
            Las diferencias: hay dos (b - a) y (a - b). Los valores que no se repiten entre las cadenas
        */

        if($_SERVER ["REQUEST_METHOD"] == "POST") {
            if (isset($_POST ["formularios"]) && $_POST["formularios"] == "ej3") {
                $arr1 = explode("," , $_POST["textoA"]);
                $arr2 = explode("," , $_POST["textoB"]);
                $conj = []; $igual = false; $rep = []; $norepA = []; $norepB = []; $repBool = false;
            
                /*
                    Podemos usar para hacerlo más fácil:
                     array_unique(): nos devuelve un array. Elimina los elementos repetidos del array
                     array_values(): para resetear la posición del array unique
                     $a = array_unique($a);
                     $a = array_values($a);
                */

            // Recorro el arr1
                for ($i=0; $i < count($arr1); $i++) { 
                    // se está el valor de arr1 en el conjunto se pasa a true
                    for ($j=0; $j < count($conj); $j++) { 
                        if($arr1[$i] === $conj[$j]) $igual = true;
                    }
                    // se está el valor de arr1 en el arr2 se pasa a true
                    for ($j=0; $j < count($arr2); $j++) { 
                        if($arr1[$i] === $arr2[$j]) $repBool = true;
                    }
                    // si el valor de arr1 no está se añade al conjunto
                    if(!$igual) array_push($conj, $arr1[$i]);
                    // si el valor de arr1 está se añade a los valores repetidos
                    else array_push($rep, $arr1[$i]);
                    // si el valor de arr1 no está en arr2 se añade a no repetidos
                    if(!$repBool) array_push($norepA, $arr1[$i]);

                    $igual = false;
                }

                for ($i=0; $i < count($arr2); $i++) { 
                    for ($j=0; $j < count($conj); $j++) { 
                        if($arr2[$i] === $conj[$j]) $igual = true;
                    }
                    if(!$igual) {
                        array_push($conj, $arr2[$i]);
                        array_push($norepB, $arr2[$i]);
                        }
                    else array_push($rep, $arr2[$i]);
                    $igual = false;
                }

                $strin = implode(" , ", $conj);
                $inter = implode(" , ", $rep);
                $nrepA = implode(" , ", $norepA);
                $nrepB = implode(" , ", $norepB);

                echo "<p> El conjunto es $strin</p>";
                echo "<p> La intersección es $inter</p>";
                echo "<p> La diferencia de A es $nrepA</p>";
                echo "<p> La diferencia de B es $nrepB</p>";
            }
        }
    ?>
</body>
</html>