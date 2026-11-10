<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2 PHP</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
    // Ejercicio 1.
        $peliculas = [
            "inception" => [
                "titulo" => "Inception",
                "genero" => "Ciencia Ficción",
                "precio_dia" => 3.50
            ],
            "parasite" => [
                "titulo" => "Parasite",
                "genero" => "Thriller",
                "precio_dia" => 3.00
            ],
            "interstellar" => [
                "titulo" => "Interstellar",
                "genero" => "Ciencia Ficción",
                "precio_dia" => 3.50
            ],
            "joker" => [
                "titulo" => "Joker",
                "genero" => "Drama",
                "precio_dia" => 2.50
            ],
            "avengers" => [
                "titulo" => "Avengers: Endgame",
                "genero" => "Acción",
                "precio_dia" => 4.00
            ]
        ];

        // Comprobamos que se ha rellenado el formulario del ejercicio 1
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["ejercicios"] && $_POST["ejercicios"] == "ej1") {

            // Creamos las variables que vamos a usar
                $alquiler = $peliculas; $subtot = 0; $selecc = false; $totalPeli = 0;
                ?>

            <!-- Creamos la tabla -->
                <h2> Ticket de Alquiler</h2>
                <table border="">
                    <thead>
                        <tr>
                            <th>Película</th>
                            <th>Género</th>
                            <th>Precio/día</th>
                            <th>Días</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                <?php
                // a $alquiler le añadimos los días y el subtotal. También sumamos el subtotal de cada peli
                foreach ($alquiler as $clave => $peli) {
                    $alquiler[$clave]["dias"] = $_POST[$clave];
                    $alquiler[$clave]["subtotal"] = $_POST[$clave] * $peli["precio_dia"];
                    $subtot += $alquiler[$clave]["subtotal"];  
                }

                // Como los días y el subtotal se crea despues de $peli, hace falta hacer otro bucle
                foreach ($alquiler as $clave => $peli) {
                    list($tit, $gen, $precDia, $dia, $subto) = array_values($peli);

                    // Creamos el ticket
                    if($_POST[$clave] != 0 && $_POST[$clave] != "") {
                        $selecc = true;
                        $totalPeli++;

                        echo "<tr>";
                        echo "<td> $tit </td>";
                        echo "<td> $gen </td>";
                        echo "<td> $precDia €</td>";
                        echo "<td> $dia </td>";
                        echo "<td> $subto € </td>";
                        echo "</tr>";
                    }
                }
                // Si no se selecciona ninguna peli sale el siguiente mensaje
                if(!$selecc) {
                    echo "<tr>";
                    echo "<td colspan=5> No se ha seleccionado ninguna película para alquilar </td>";
                    echo "</tr>";
                } else {
                    // Total
                    echo "<tr>";
                    echo "<th colspan=4> TOTAL A PAGAR </th>";
                    echo "<th> $subtot €</th>";
                    echo "</tr>";
                }
                ?>
                </table>
                <?php
                echo "<h2> Total de películas alquiladas: $totalPeli</h2>";
                
                // echo "<pre>";
                // print_r($_SERVER);
                // echo "</pre>";
                ?>
                    <a href="./practica2.html">Volver</a>
                <?php
            }
        }
          
    // Ejercicio 2.
        $alumnos = [
            ["nombre" => "Lucia",  "grupo" => "DAW", "nota" => 8.5,  "faltas" => 2],
            ["nombre" => "Marcos", "grupo" => "DAM", "nota" => 6,    "faltas" => 5],
            ["nombre" => "Andrea", "grupo" => "DAW", "nota" => 9.2,  "faltas" => 0],
            ["nombre" => "Pablo",  "grupo" => "DAM", "nota" => 4.5,  "faltas" => 12],
            ["nombre" => "Carmen", "grupo" => "DAW", "nota" => 6,    "faltas" => 3],
            ["nombre" => "Hugo",   "grupo" => "DAM", "nota" => 8.5,  "faltas" => 1],
            ["nombre" => "Sara",   "grupo" => "DAW", "nota" => 3.8,  "faltas" => 14],
            ["nombre" => "Diego",  "grupo" => "DAM", "nota" => 7.25, "faltas" => 4],
            ["nombre" => "Alba",   "grupo" => "DAW", "nota" => 8.5,  "faltas" => 1],
            ["nombre" => "Bruno",  "grupo" => "DAM", "nota" => 6,    "faltas" => 7]
        ];
        // Comprobamos que se ha rellenado el formulario del ejercicio 2
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["ejercicios"] && $_POST["ejercicios"] == "ej2") {

            // Creamos la variable $listado y la rellenamos según el grupo que se seleccione
                $listado = [];
                foreach ($alumnos as $alumno) {
                    switch($_POST["grupo"]) {
                        case "DAW":
                            if($alumno["grupo"] == "DAW"){
                                array_push($listado, $alumno);
                            }
                            break;
                        case "DAM":
                            if($alumno["grupo"] == "DAM"){
                                array_push($listado, $alumno);
                            }
                            break;
                        default:
                            $listado = $alumnos;
                    }
                }
                
                // Sacamos las columnas nota y nombre y ordenamos listado según las columnas
                $nota = array_column($listado,"nota");
                $nombre = array_column($listado,"nombre");
                array_multisort($nota,SORT_DESC, $nombre, SORT_ASC,$listado);

                // Creamos la tabla
                ?>
                    <table border="">
                        <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Nota</th>
                                <th>Faltas</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php

                // Creamos las variables que vamos a usar
                $posi = 0; $notaMed = 0; $susp = 0; $color = ""; $pierde = 0;

                        // Recorremos listado y lo añadimos a la tabla
                        foreach ($listado as $alumno) {
                            if ($alumno["nota"] < 5) {
                                $estado = "Suspenso";
                                $susp++;
                            } else {
                                $estado = "Aprobado";
                            }
                            if($alumno["faltas"] > 10) {
                                $color = "red";
                                $pierde++;
                            }; 
                            $notaMed += $alumno["nota"];
                            
                            echo "<tr style ='background-color:$color'>";
                            echo "<td> " . ++$posi . "</td>";
                            echo "<td>" . $alumno["nombre"] ."</td>";
                            echo "<td>" . $alumno["grupo"] ."</td>";
                            echo "<td>" . $alumno["nota"] ."</td>";
                            echo "<td>" . $alumno["faltas"] ."</td>";
                            echo "<td> $estado </td>";
                            
                            echo "</tr>";
                        }
                ?>
                        </tbody>
                        </table>
                    <h2>Resumen</h2>
                    <ul>
                        <?php
                            // Sacamos el resumen
                           echo "<li> Número de alumnos: $posi </li>";
                           echo "<li> Nota media: " . round($notaMed/$posi, 2) . "</li>";
                           echo "<li> Aprobados: " . $posi - $susp ." - Suspensos: ". $susp ."</li>";
                           echo "<li> Mejor alumno: " . $listado[0]["nombre"] ." (". $listado[0]["nota"] . ")</li>";
                           echo "<li> Pierden la evaluación continua: $pierde </li>";
                            
                        ?>
                    </ul>
                    <a href="./practica2.html">Volver</a>
                <?php
                // echo "<pre>";
                // print_r($listado);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($_SERVER);
                // echo "</pre>";
            }
        }
    ?>
</body>
</html>