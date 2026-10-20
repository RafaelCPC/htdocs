<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios | Tema 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p> Crea un formulario donde elijas el tamaño de la matriz. Comprueba que no sea negativo
        Si lo es, pon en rojo: "Introduce un número positivo". Si entra un valor como el 3, creamos una matriz
        3x3 con números aleatorios.
        El array no lo tocamos, sino que tenemos que crear una tabla. La tabla debe tener una fila y columna nueva.
        La columna debe sumar las filas y la fila debe sumar las columnas.
    </p>
    <?php
    $arra = [];
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["tamano"])) {
            if($_GET["tamano"] < 0) echo "<p style='color: red;'> Introduce un número positivo </p>";
            else {
                for ($i=0; $i < $_GET["tamano"]; $i++) { 
                    array_push($arra,[]);
                    for ($j=0; $j < $_GET["tamano"]; $j++) { 
                        array_push($arra[$i],rand(1, 100));
                    }
                }
            }

        }
    }
    ?>
    <form action="" method="get" >
        <label for="numero">Introduce el tamaño de la matriz: </label> <br>
        <input type="number" name="tamano" id="tamano"> <br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        function tabla () {
            global $arra;
            $sumCol1 = 0;
            $sumCol2 = 0;
            $sumCol3 = 0;
            
    ?>
        <table border="">
            <thead>
                <tr>
                <?php
                for ($i=0; $i < count($arra); $i++) { 
                    echo "<th>Columna $i</th>";
                }
                ?>
                    <th>Suma Filas</th>
                </tr>
            </thead>
        <?php
            foreach ($arra as $valor) {

                list($col1, $col2, $col3) = $valor;
                $sumCol1 += $col1;
                $sumCol2 += $col2;
                $sumCol3 += $col3;
                $suma = 0;
                echo "<tr>";
                for ($i=0; $i < count($valor); $i++) { 
                    echo "<td> $valor[$i] </td>";
                    $suma += $valor[$i];
                }
                echo "<td> $suma </td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td> $sumCol1 </td>";
            echo "<td> $sumCol2 </td>";
            echo "<td> $sumCol3 </td>";
            echo "<th> Suma cols </th>";
            echo "</tr>";
        ?>
        </table>
    <?php
        }
        tabla();
    ?>
</body>
</html>