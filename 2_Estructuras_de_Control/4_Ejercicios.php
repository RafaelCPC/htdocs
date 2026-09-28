<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 4</title>
</head>
<body>
    <p> 
        Ej. 1. Crea una función que haciendo uso de la estructura de switch muestre
        por pantalla si una persona es menor de edad, adulta o anciana. Adulta va de 18 a 67.
        Anciana de 67 en adelante. Hacer una llamada a la función con un num random del 1 al 100.
        Controlar que el número no sea negativo
    </p>
    <?php
        
        function edad (int $num) :string { // se puede especificar el tipo de dato como en java. Tanto el que entra como el que sale
            $edad ="Adulta";
            $res= "";
            if($num < 0) {
                $edad = "negativo";
            }else if($num < 18 ){
                $edad = "Menor";
            } else if ($num > 67) {
                $edad = "Anciana";
            }
            switch (true) {
                case "Adulta": 
                    $res= "Esa persona es $edad";
                    break;
                case "Menor": 
                    $res= "Esa persona es $edad";
                    break;
                case "Anciana": 
                    $res= "Esa persona es $edad";
                    break;
                default:
                    $res= "El valor es $edad";
            }
            return $res;
        };
        echo edad(rand(1,100));
    ?>
    <p> 
        Ej. 2. Crea una función llamada notas que contenga un parámetro decimal. SI la nota es
        menor que 5 se mostrará por la pantalla la palabra "suspenso". Si la nota está entre 5 y 6
        se mostrará "Aprobado". Si está entre 7 y 8 se mostrará "Notable" y si es entre 9 y 10
        se mostrará "Sobresaliente".
    </p>
    <?php
        function notas ($float) {
            $nota = "Sobresaliente";
            if($float < 5) {
                    $nota = "Suspenso";
            } else if ($float < 7 && $float >= 5) {
                $nota = "Aprobado";
            } else if ($float < 9 && $float >= 7) {
                $nota = "Notable";
            }
            echo "<p> La nota es $nota </p>";
        }
        notas (8.9);
    ?>
    <p> 
        Ej. 3. Crea una función llamada meses que, dependiendo del número que entre y haciendo uso del match
        devolverá el nombre del mes correspondiente. Importante! Controlar que el número no sea menor a 1 o mayor a 12
    </p>
    <?php
        function meses ($num) {
        $res = "<p> $num no representa un mes valido </p>";
           if ($num >= 1 && $num <= 12) { 
            $mes = match($num) {
                1=> "Enero",
                2=> "Febrero",
                3=> "Marzo",
                4=> "Abril",
                5=> "Mayo",
                6=> "Junio",
                7=> "Julio",
                8=> "Agosto",
                9=> "Septiembre",
                10=> "Octubre",
                11=> "Noviembre",
                12=> "Diciembre"
            };
                $res = "<p> El mes es $mes </p>";
            } 
            echo $res;
        };
        meses(13);
    ?>
    <p> 
        Ej. 4. Crea una función llamada calculadora que tenga 3 parámetros. Los parámetros van a ser 2 números y un string
        Usar un switch para mostrar el resultado de la operación correspondiente. Las operaciones aceptadas serán: suma, resta,
        multiplicacion y exponente
    </p>
    <?php
        function calculadora ($num1, $num2, $str) {
            $res = 0;
            switch ($str){
                case "suma":
                    $res = $num1 + $num2;
                    break;
                case "resta":
                    $res = $num1 - $num2;
                    break;
                case "multiplicacion":
                    $res = $num1 * $num2;
                    break;
                case "division":
                    $res = $num1 / $num2;
                    break;
                    default:
                    echo "<p>No se contempla dicha operación </p>";
            }
         echo "<p> La $str es $res";
    }
    calculadora (10, 2, "division");
    ?>
    <p> 
        Ej. 5. Crea una funcion llamada analizarNumero (int $n, int $min, int $max): string que
        Devuelva "fuera de rango" si n es menor que el rango mínimo o n es mayor que el rango máximo
        Si está dentro del rango indicar si es par o impar y además si está en los bordes (min o máx)
        o en el interior
    </p>
    <?php
        function analizarNumero ($num, $min, $max) {
            $res = "Fuera de rango. ";
            $res2 = null;

            if ($num <= $max && $num >= $min) {
               if ($num % 2 == 0) {
                    $res = "Es par.";
               } else {
                    $res = "Es impar. ";
               }
            
                if($num == $min || $num == $max) {
                    $res2 = " Está en el límite";
                } 
            }

            echo $res . $res2;
        }
        analizarNumero (1, 0, 10);
    ?>

    <p>
        Ejercicio 6. Crear una función llamada calcularEnvio (float $peso, bool $express, bool $internacional)
        que determinará el tipo de tarifa usando un match:
            Si es internacional, express y pesa 2kg o menos la tarifa es "Express internacional ligero"
            Si el envío es internacional pero no es express, la tarifa es "Estándar internacional"
            Si el envío no es internacional, es express y pesa 5kg o más la tarifa es "Express nacional"
            Si el envío no es internacional y no es express, la tarifa es "Estándar internacional"
            En cualquier otro caso "Caso no contemplado"
        Devuelve además un precio base distinto para cada caso (elige tú mismo las cantidades). El texto
        final debe ser tal que así: "Tarifa: X -- Precio: Y$"
    </p>
    <?php
        function calcularEnvio ($peso, $express, $internacional) {
            $num = 0;
            switch (true) {
                case ($peso <= 2 && $express && $internacional): 
                    $num = 1;
                    break;
                case ($peso >= 5 && $express && !$internacional): 
                    $num = 3;
                    break;   
                case ($express && !$internacional): 
                    $num = 2;
                    break;    
                case (!$express && !$internacional): 
                    $num = 4;
                    break;  
                default:
                   echo "<p>Caso no contemplado </p>";                                                       
            }

            $res = match ($num) {
                1 => "<p> Tarifa: Express internacional ligero -- Precio: 10$ </p>",
                2 => "<p> Tarifa: Estándar internacional -- Precio: 15$ </p>",
                3 => "<p> Tarifa: Express nacional -- Precio: 25$ </p>",
                4 => "<p> Tarifa: Estandar internacional -- Precio: 35$ </p>",
            };
            echo $res;
        }

        calcularEnvio(5, true, false);
    ?>

    <h3>Ejercicio 7</h3>
    <p>Validación de fecha: Crear una función que se llame validarFecha ($dia, $med, $annio) 
        devuelve un string informando si la fecha introducida es anterior a la actual o posterior
        a la fecha de hoy
        Además, antes de hacer dicho cálculo, hay que comprobar que la fecha introducida es válida
        Nota: no metáis fechas anteriores a 1970
        Funciones que tenemos que usar
        checkdate(mes, dia, annio) comprobar que la fecha tiene el formato correcto (boolean)
        date("Y-m-d") te da la fecha de hoy. 
        date (annio, mes, dia) devuelve la fecha en formato day
        strtotime(formato date) tenemos que pasarle la fecha actual con date("Y-m-d") 
        Te da en segundos el tiempo que ha pasdo desde 1970 en adelante
    </p>
    <?php
        function validarFecha(string $dia,string $mes,string $annio):string {
            $res = "";

            if(checkdate($mes, $dia, $annio)){

                if(strtotime(date("Y-m-d")) < strtotime("$annio-$mes-$dia")) {
                    $res = "<p> La fecha introducida es posterior a la actual </p>";
                } else {
                    $res = "<p> La fecha introducida es anterior a la actual </p>";
                }
            } else {
                $res = "<p> No es una fecha válida </p>";
            }
            return $res;
        };
        echo validarFecha("20","10", "2030");


        /*
            Operador ternario
            (condición) ? (si se cumple) : (si no se cumple)
            Ejemplo:
        */
            $n = rand();
            echo ($n % 2 == 0) ? "$n es par" : "$n es impar";
    ?>
</body>
</html>