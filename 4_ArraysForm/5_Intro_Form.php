<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción de Formularios | Tema 4</title>
</head>
<body>
    <h3>Como funciona una petición</h3>
    <p> Cada vez que el navegador pide esta página, PHP se ejecuta desde 0 y rellena unos arrays especiales
        llamados (arrays superglobales): $_GET, $_POST,$_REQUEST, $_SERVER. Todos estos arrays son completamente
        normales que funcionan exactamente igual que cualquier otro array que nosotros creemos.
        Estos arrays pueden ser llamados desde cualquier fichero en cualquier momento.El objetivo es gestionar los datos
    </p>
    <?php
        echo "<pre>"; print_r($_GET); echo "</pre>"; // no sale nada
        echo "<pre>"; print_r($_POST); echo "</pre>"; // no sale nada
        echo "<pre>"; print_r($_REQUEST); echo "</pre>"; // no sale nada
        echo "<pre>"; print_r($_SERVER); echo "</pre>"; // salen muchas cosas y el REQUEST METHOD es importantisimo
        /*
            Otras cosas importantes es el REMOTE ADDR que dice la dirección IP pública del cliente
            Si mientras tenemos la página abierta nos vamos a F12, NETWORK y pulsamos F5 para recargar
            la página podemos ver el protocolo HTTP
        */
        $claves_de_Server = [
            "REQUEST_METHOD" => "Método de la petición que se ha enviado",
            "REQUEST_URI" => "Ruta y parámetros que se han pedido",
            "QUERY_STRING" => "Parámetros de la URL",
            "SCRIPT_NAME" => "Archivo PHP que se ejecuta", // PHP es no compilado, por lo que es un script
            "HTTP_REFERER" => "Página desde la que vienes",
            "HTTP_USER_AGENT" => "Navegador y sistema operativo desde el que se trabaja", // nosotros seguramente no la usemos
            "REMOTE_ADDR" => "La IP pública del cliente",
            "SERVER_NAME" => "Nombre del servidor",
            "SERVER_PORT" => "Puerto del servidor",
        ];
        /*
            Las claves que vamos a escribir no nos las inventamos, están en el $_SERVER
        */
    ?>
    <table border="" style="border-collapse: collapse;">
        <tr>
            <th>Clave de $_SERVER</th>
            <th>Qué es</th>
            <th>Valor</th>
        </tr>
        <?php
            foreach ($claves_de_Server as $clave => $descripcion) {
        ?>
            <tr>
                <td><?=  $clave ?></td>
                <td><?=  $descripcion ?></td>
                <td><?=  $_SERVER[$clave] ?? "(no existe)"?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <form action="" method="get">
        <label for="comentario">Comentario: </label> <br>
        <input type="text" name="comentario" id="comentario"> <br>
        <button type="submit">Enviar</button>
        <!--
        Button e imput son parecido, pero el input tiene el texto en Value y podemos ponerle name
        <input type="submit" value="enviar" name="enviado">

        Lo que habíamos hecho antes y estaba vacío (los array de los métodos) ahora tienen lo que hemos enviado.
        No todos tienen contenido. GET recoge los datos del GET y REQUEST recoge todos los datos que se envíen sin importar el método. POST
        no tiene nada porque solo recoge lo que hay en POST.
        -->
    </form>

    <?php
        // vamos a recoger los datos que hemos enviado con el formulario
        /*
            Es importante que el formulario no se active hasta que se envie la información
            Si no lo hacemos es un petardazo. Por eso es importante añadir una condición
        */

        if($_SERVER["REQUEST_METHOD"] == "GET") { //usamos $_server porque le llega todo
                /*
                    me meto en el if si me han llegado los datos de un formulario que use POST. 
                    Lo hacemos en el ejercicio
                */
            if(isset($_GET["comentario"])){ // esta condición controla si la clave comentario hay un valor asignado
                $recogida = $_GET["comentario"]; // no queremos traer todo el GET, solo la clave. Y la clave es el name del input
                echo "<h2> $recogida </h2>";
            } else{echo "manda algo, awegonao";}
        }
    ?>
    <!--
        Falta algo muy importante que es el método usado y el contador. Si usamos un método se hace unas cosas, si no 
    -->
    <p>La página no recuerda nada de la ejecución anterior, inclusive los datos que se pasaron. Vamos a ver una forma en la 
        que podemos "recordar" un dato usando un input hidden
    </p>
    <?php
        $contador = 0;
        if(isset($_POST["contador"])){
            $contador = $_POST["contador"];
        }
        if(isset($_POST["accion"])) {
            if($_POST["accion"] == "sumar") $contador++;
            else $contador--;
        }
    ?>
    <form action="" method="post">
        <input type="hidden" name="contador" value="<?= $contador ?>"> <!--Es una manera que vamos a ver sobre cómo almacenar datos -->
        <p>Contador: <?= $contador ?></p>
        <input type="submit" name="accion" value="restar">
        <input type="submit" name="accion" value="sumar">
    </form>
</body>
</html>