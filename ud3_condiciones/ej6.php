<?php

/**
 * Almacena tres números en variables y escribirlos en pantalla de manera ordenada.
 * @author Virginia Ordoño Bernier 2021/2022
 */
require("../require/view_condiciones_header.php");
require("../require/view_footer.php");

$num1 = random_int(0, 100);
$num2 = random_int(0, 100);
$num3 = random_int(0, 100);

$aNumbers = array();
array_push($aNumbers, $num2, $num1, $num3);
sort($aNumbers);
?>

<!DOCTYPE HTML>
<html lang='es'>

<head>
    <link rel='stylesheet' type='text/css' href='../css/style_exercises.css' />
</head>

<body>
    <main>
        <h4>Almacena tres números en variables y escribirlos en pantalla de manera ordenada (F5).</h4>
        <div id="result1">
            <?php
            foreach ($aNumbers as $key => $value) {
                echo $value . " / ";
            }
            ?>
        </div>
    </main>
</body>

</html>