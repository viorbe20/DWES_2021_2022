<?php
/**
 * Ejercicio 1. Número aletorio.
 * Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números que
 * han sido solicitados previamente mediante un formulario.
 * @author Virginia Ordoño Bernier
 */

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
<form action="" method="post">
    <h1>Ejercicio 1</h1>
    <h2>Introduce dos números para generar uno aleatorio comprendido entre esos dos.</h2>
    <span>Número 1 </span><input type="number" name="n1" value=<?php echo $firstNum ?>><br><br>
    <span>Número 2 </span><input type="number" name="n2" value=<?php echo $lastNum ?>><br><br>
    <button type="submit" name="generate">Generar</button><br><br><span>
        <?php
        echo $generatedNumber ?></span>
</form>