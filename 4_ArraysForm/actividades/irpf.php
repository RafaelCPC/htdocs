<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio IRPF</title>
</head>
<body>
    <?php
/*
Sin incluir - Incluyendo
    0 - 12.450€         19% (12.450 - 0) * 0.19
    12.450€ - 20.000€   24% (20.000 - 12.450) * 0.24
    20.200€ - 35.200€   30% ...
    35-200€ - 40.000€   37% (37.000 - 35.200) * 0.37
    40.000€ - palante   47€ 
    Tenemos que ir acumulando lo que se quita de cada tramo y quitárselo 
    al salario y luego se resta.
    El examen nos lo da en md o a papel. Quizás nos da arrays grandes
    
    Crear un formulario con un solo campo numérico (en salario bruto). Cuando llega el formulario
    sale error si es un número negativo o una cadena. Y si se envía un número positivo
    aparecerá una tabla de una sola linea con las siguientes columnas: bruto, neto, impuesto total,
    numero de tramos
    Recomienda usar min() y/o max()
    min(2,10) devuelve el valor mínimo
    max(2,10) devuelve el valor máximo

    Convertirlo todo a una función que reciba como parámetro el bruto
    version 2 //
    Ahora en vez de devolver una tabla, debe devolver un array bidimensional. El array interno debe
    tener dos claves: tramo y el impuesto acumulado 
*/
$tramos = [
    [0,12450,0.19],
    [12451, 20200,0.24],
    [20201, 35200,0.30],
    [35201, 60000,0.37],
    [60001, 300000, 0.45],
    [300001, INF, 0.47],
];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ejercicios"]) && ($_POST["ejercicios"] == "irpf")) {

        $i = 0; $imp = 0; $mini = []; $maxi = []; $irpf = [];

        function irpf (int $bruto) {

            global $tramos; global $imp; global $maxi;
            global $i; global $mini; global $irpf;

            $mini = array_column($tramos, 0);
            $maxi = array_column($tramos, 1);
            $irpf = array_column($tramos, 2);

        if($bruto < 0 || $bruto == "") {
            echo "<p> Introduce un valor válido </p>";
        } else {
            while ($bruto >  $maxi[$i]) {
                $imp += ($maxi[$i] - $mini[$i]) * $irpf[$i];
                $i++;
            };
            $imp += ($bruto - $mini[$i]) * $irpf[$i];
        }

        }
    irpf($_POST["bruto"]);
    ?>
<table border="">
    <thead>
        <th>Salario Bruto</th>
        <th>Salario Neto</th>
        <th>Impuesto Total</th>
        <th>Numero de tramos</th>
    </thead>
    <tbody>
        <tr>
        <?php
            if ($_POST["bruto"] > 0 && $_POST["bruto"] != "") {
                echo "<td>" . $_POST['bruto'] . "</td>";
                echo "<td>" . $_POST['bruto'] - $imp . "</td>";
                echo "<td> $imp </td>";
                echo "<td>" . $i + 1 . "</td>";
            } else {
                echo "<td colspan= 4> Valor no valido </td>";
            }
    }
}
        ?>
        </tr>
    </tbody>
</table>
</body>
</html>