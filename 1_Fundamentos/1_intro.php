<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Parte estatica de la web-->
    <p> esto es una intro de PHP </p>
    <p> Este texto es HTML puro, no tiene nada de CSS </p>

<!-- Para meter el PHP en un parrafo. Es decir, meter codigo HTML en un PHP -->
 <p>
    <?php
        echo "hola";
    ?>
 </p>

 <!-- Otra manera de hacerlo -->
 <?php
    $salto = "<br>";
    echo "<p> hola </p>";

    // Para hacerlo dinamico
    echo date("d/m/Y H:i:s");

    $lenguaje = "PHP";
    $ciclo = "DAW";
    echo "<br>";
    echo "El lenguaje de backend que aprenderemos este año será " . $lenguaje . $salto;
    echo "El lenguaje de backend que aprenderemos este año será $lenguaje $salto"
 ?>
</body>
</html>