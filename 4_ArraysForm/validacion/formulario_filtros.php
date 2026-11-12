<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtros de Formulario</title>
    <style> 
        pre {
            background-color: gray;
        }
        .error{
            color:red
        }
        .acierto {
            color:green;
        }
    </style>
</head>
<body>
    <h3> Validación con filter_var()</h3>
    <form action="" method="get">
        <label for="entero">Entero: </label> <br>
        <input type="text" name="entero" id=""> <br>
        <label for="entero">Decimal: </label> <br>
        <input type="text" name="decimal" id=""> <br>
        <label for="entero">Correo: </label> <br>
        <input type="text" name="correo" id=""> <br>
        <label for="entero">URL: </label> <br>
        <input type="text" name="url" id=""> <br>
        <label for="entero">Booleano: </label> <br>
        <input type="text" name="booleano" id=""> <br>
        <input type="submit" value="Enviar">
    </form>
    <?= $_GET["edad"] ?>
<!-- 
    En los formularios los datos siempre se mandan como cadena, incluso si pones el input type number
    Lo que pasa cuando tienes type number es que se manda como cadena pero se comprueba que se puede pasar a número

    filter_var()
    Sirve para comprobar si un valor tiene el formato esperado y, si es así, devolverlo convertido en el tipo de dato
    especificado.
    Es la herramienta pensada para los datos de un formulario, que siempre SIEMPRE llegan cadenas.
    Si el valor es válido devuelve el valor ya convertido ("25" pasa a ser int(25)) y si no es válido devuelve false.

    intval()
    Siempre devuelve un dato, aunque no sea correcto (basura)
    Por el contrario, filter_var() rechaza lo que no se puede convertir a entero (esto en el caso de que apliquemos 
    el filtro de enteros)

    LOs filtros básicos (hay más)
    FILTER_VALIDATE_INT
    FILTER_VALIDATE_FLOAT
    FILTER_VALIDATE_EMAIL
    FILTER_VALIDATE_URL
    FILTER_VALIDATE_BOOLEAN
    
-->
    <?php 
       /*
            Fltrar los datos. 
       */
      $filtros = [FILTER_VALIDATE_INT, FILTER_VALIDATE_FLOAT, FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_URL, FILTER_VALIDATE_BOOLEAN];
      $i = 0;

      foreach ($_GET as $clave => $valor) {
        echo (filter_var($_GET[$clave],$filtros[$i])) ? "<p class ='acierto'> Pasa el filtro:  </p>" . filter_var($_GET[$clave],$filtros[$i]) : "<p class ='error'> No pasa el filtro </p>" . filter_var($_GET[$clave],$filtros[$i]);
        $i++;
      }
      
     ?>
</body>
</html>