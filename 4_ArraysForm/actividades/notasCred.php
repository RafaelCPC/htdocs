<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Ponderadas por Créditos | Ejercicio 12</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]  == "POST") {
            if(isset($_POST["ejercicios"]) && isset($_POST["ejercicios"]) == "notas") {
        $asignat = ["Programación", "Bases de Datos", "LLMM", "Entornos", "Sistemas Operativos"];
                ?>
                    <table border="">
                        <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th>Créditos</th>
                                <th>Nota</th>
                                <th>Ponderación</th>
                                <th>Mención</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                <?php
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                foreach ($asignat as $val) {
                    echo "<tr>";
                    echo "<th> $val </th>"; 
                    $nota = "";
                    $creditos = "";
                    switch ($val) {
                        case "Programación":
                            $nota = "progNot";
                            $creditos = "progCred";
                            break;
                        case "Bases de Datos":
                            $nota = "bbddNot";
                            $creditos = "bbddCred";
                            break;
                        case "LLMM":
                            $nota = "llmmNot";
                            $creditos = "llmmCred";
                            break;
                        case "Entornos":
                            $nota = "entNot";
                            $creditos = "entCred";
                            break;
                        case "Sistemas Operativos":
                            $nota = "soNot";
                            $creditos = "soCred";
                            break;
                    }
                        echo "<td>" . $_POST[$creditos] . " ECTS" . "</td>";
                        echo "<td>" . $_POST[$nota] . "</td>";
                        echo "<td> " . $_POST[$creditos] * $_POST[$nota]  . "</td>";
                        $menc= "";
                        if($_POST[$nota] < 5) {
                            $menc= "Suspendido";
                        } else if ($_POST[$nota] < 7) {
                            $menc= "Aprobado";
                        } else if ($_POST[$nota] < 9) {
                            $menc= "Notable";
                        } else if ($_POST[$nota] <= 10) {
                            $menc= "Matricula de Honor";
                        }
                        echo "<td> $menc </td>";
                        
                        $esta = ""; $color = "";
                        if($_POST[$nota] < 5) {
                            $esta = "Suspendido";
                            $color = "red";
                        } else  {
                            $esta = "Aprobado"; 
                            $color = "green";
                        }
                        echo "<td style='background-color:$color'> $esta </td>";
                    echo "</tr>";
                }
                ?>
                    </table>
                <?php
            }
        }
    ?>
</body>
</html>