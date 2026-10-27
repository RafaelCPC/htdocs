<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Asignaturas</title>

    <?php
        ini_set("display errors", 1);
        error_reporting(E_ALL);
    ?>

</head>
<body>
    <?php
        /*
            INtroduce las notas de varias asignaturas de un solo estudiante y obtén las
            siguientes estadísticas:
                Total de notas
                Nota máxima
                Nota mínima
                Media aritmética
                EL número de aprobados
                El número de suspensos
            En el formulario tendremos dos campos de texto. En el primero definiremos el nombre
            de las asignaturas, separadas por coma. Y, en el segundo, las notas de cada asignatura
            separadas por coma. Para trabajar este ejercicio teneis que construir un array asociativo
            donde las claves son el nombre de cada asignatura y el valor es la nota de dicha asignatura
            Después de mostrar todas las estadísticas, mostrar una tabla con 3 columnas: asignatura, nota y
            calificación. Mostrar la fila en verde si está aprobado y en rojo si ha suspendido

            Controlar que ambos array son del mismo tamaño, sino lanzar error.

            Esto podría ser un ejercicio de práctica
        */

        if($_SERVER ["REQUEST_METHOD"] == "POST") {
            if (isset($_POST ["formularios"]) && $_POST["formularios"] == "ej4") {
                $asig = explode(",", $_POST["asignaturas"]);
                $notas = explode(",", $_POST["notas"]);
                
                $max = 0; $min = 100; $sum= 0; $aprov = 0; $res= [];

                if(count($asig) === count($notas)) {
                    for ($i=0; $i < count($asig); $i++) { 
                        $res [$asig[$i]] = $notas[$i];
                        if($notas[$i] > $max) $max = $notas[$i];
                        if($notas[$i] < $min) $min = $notas[$i];
                        $sum += $notas[$i];
                        if($notas[$i] >= 5) $aprov++;
                    }

                    echo "<p> El total de notas es $i <p>";
                    echo "<p> La nota máxima es $max <p>";
                    echo "<p> La nota mínima es $min <p>";
                    echo "<p> La media aritmética es " . ($sum/$i) . "<p>";
                    echo "<p> El número de aprobados es $aprov <p>";
                    echo "<p> El número de suspensos es " . ($i-$aprov) . " <p>";

                    echo "<pre>";
                    print_r($res);
                    echo "</pre>";

                    ?>
                        <table>
                            <thead>
                                <th>Asignatura</th>
                                <th>Nota</th>
                                <th>Calificación</th>
                            </thead>
                    <?php
                        foreach ($res as $asign => $nota) {
                            $cali = "Suspenso";  $color = "";
                            if ($nota <= 10 && $nota >= 9) $cali = "Sobresaliente"; 
                            else if ($nota < 9 && $nota >= 7) $cali = "Notable"; 
                            else if ($nota < 7 && $nota >= 5) $cali = "Aprobado"; 
                            ($nota >= 5) ? $color = "green": $color = "red";
                            echo "<tr style='background-color: $color;'>";
                            echo "<td> $asign </td>";
                            echo "<td> $nota </td>";
                            echo "<td> $cali </td>";
                            echo "</tr>";
                        }
                        
                    ?>
                        </table>
                    <?php
                } else echo "<p> No se han introducido el mismo número de notas que de asignaturas </p>";

            }
        }
    ?>
</body>
</html>