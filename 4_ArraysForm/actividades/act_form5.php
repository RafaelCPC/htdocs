<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Formulario 5</title>
</head>
<body>
    <?php
        /*
            Dado un array bidimensional, crear un formulario con dos listas desplegables
            en el que en la primera se especifique a través de qué columna vamos a ordenar
            y la segunda especificará el orden que se aplicará

            La lista desplegable es el SELECT
            Si no nos acordamos de qué poner podemos hacer un print_r($_SERVER);
        */
        $empleados = [
            [1, "paquito", 900],
            [2, "sebas", 1800],
            [3, "lucas", 1000],
            [4, "maria", 4210],
            [6, "josefa", 9500],
            [5, "lucia", 2200],
            [7, "roberto", 1240],
            [8, "nico", 550],
            [9, "rafa", 420],
        ];
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset ($_POST["ejercicios"]) && $_POST["ejercicios"] == "ej5"){
                    // Para controlar que se escoja una opción de la lista desplegable,
                    // voy a ver en el array post si existe una clave de la lista
                    if(isset($_POST["columna"]) && ($_POST["orden"])) {
                        // Tendremos que usar array_column y array_multisort
                        // Tenemos que mostrarlo en formato tabla
                        
                        $orden= ($_POST["orden"] =="ASC") ? SORT_ASC : SORT_DESC;

                        $id = array_column($empleados, 0);
                        $nombre = array_column($empleados, 1);
                        $salario = array_column($empleados, 2);

                        print_r($_POST["columna"]);
                        echo "<br>";
                        print_r($_POST["orden"]);

                        switch($_POST["columna"]){
                            case "id": array_multisort($id, $orden, $empleados); break;
                            case "nombre": array_multisort($nombre, $orden, $empleados);  break;
                            case "salario": array_multisort($salario, $orden, $empleados);  break;
                        }

                    ?>
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Trabajador</th>
                            <th>Salario</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($empleados as $empleado) {
                                    list($id, $nombre, $sala)= $empleado;
                                    echo "<tr>";
                                    echo "<td> $id </td>";
                                    echo "<td> $nombre </td>";
                                    echo "<td> $sala </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                      
                    } else{
                        echo "<p style='color:red'> Selecciona algo, miarma </p>";
                    }
                }
            }
    ?>
</body>
</html>