<?php

/**
 * Ejercicio 1. Número aletorio.
 * Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números que
 * han sido solicitados previamente mediante un formulario.
 * @author Virginia Ordoño Bernier
 */
require("../require/view_condiciones_header.php");
require("../require/view_footer.php");

$procesaFormulario = false;
$n1 = 0;
$n2 = 0;
$generatedNumber = "";
$firstNum = 0;
$lastNum = 0;

//Validación formulario
if (isset($_POST["generate"])) {
    //Partimos de valor 0 por lo que no hay que comproabr que los campos estén vacíos
    $firstNum = ($_POST["n1"]);
    $lastNum = ($_POST["n2"]);
    $generatedNumber = "Número generado: " . rand($firstNum, $lastNum);
}

?>
<!DOCTYPE HTML>
<html lang='es'>

<head>
    <link rel='stylesheet' type='text/css' href='../css/style_exercises.css' />
</head>

<body>
    <main>
        <h4>Introduce dos números para generar uno aleatorio comprendido entre esos dos.</h4>
        <form action="" method="post">
            <span>Número 1 </span><input type="number" name="n1" value=<?php echo $firstNum ?>><br><br>
            <span>Número 2 </span><input type="number" name="n2" value=<?php echo $lastNum ?>><br><br>
            <button type="submit" name="generate">Generar</button><br><br><span>
                <?php
                echo $generatedNumber ?></span>
        </form>
    </main>
</body>