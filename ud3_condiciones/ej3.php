<!--Ejercicio 3. Operaciones aritméticas.
Escribe un script que muestre al usuario un formulario con una operación aritmética básica,
generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se
realizó correctamente.
Virginia Ordoño Bernier
-->
<?php
$n1 = rand(0, 10);
$n2 = rand(0, 10);
$index = rand(0, 3);
//$index = 0;
$operaciones = ["+", "-", "*", "/"];
$procesaFormulario = false;
$message = "";
$result;
$userInput = "";

if (isset($_POST['refresh'])) {
    $procesaFormulario = false;
}

//Validación formulario
if (isset($_POST["check"])) {
    //Si el usuario no introduce valor aparece mensaje avisando
    //if (empty($_POST["userInput"])) { si pobgo esto considera 0 como vacío
        if (!isset($_POST["userInput"])) {
        $procesaFormulario = false;
        $message = " Este campo no puede estar vacío.";
    } else {
        $procesaFormulario = true;
    }
}

if ($procesaFormulario) {
 
        //Según operación establecemos el resultado que se obtendrá
        switch ($_POST['oldSign'] ) {
            case "+";
                $result = $_POST['oldN1'] + $_POST['oldN2'];
                break;
            case "-";
                $result = $_POST['oldN1'] - $_POST['oldN2'];
                break;
            case "/";
                $result = $_POST['oldN1'] / $_POST['oldN2'];
                break;
            case "*";
                $result = $_POST['oldN1'] * $_POST['oldN2'];
                break;
        }


        //Comparamos resultado real con el introducido por el usuario
        $userInput = $_POST["userInput"];
        if ($result == $userInput) {
            $message = " CORRECTO";
        } else {
            $message = "Incorrecto. El resultado es " . round($result, 2);
        }

        //Mantenemos los valores seleccionados después del submit
        //$newN1 = $_POST['oldN1'];
        $n1 = $_POST['oldN1'];
        $n2 = $_POST['oldN2'];
        $operaciones[$index] = $_POST['oldSign'];
        $userInput = $_POST['userInput'];
}


?>
<!--Mostramos formulario inicial-->
<!--Utilizamos hidden para guardar valores seleccionados y que se mantengan tras el submit-->
<form action="" method="post">
    <h1>Ejercicio 3</h1>
    <h2>Escribe el resultado de la operación y comprueba.</h2>
    <?php echo "$n1 $operaciones[$index] $n2 = " ?>
    <input type="number" name="userInput" value="<?php echo $userInput?>"><span><?php
                                                echo $message ?></span>
    <br><br>
    <button type="submit" name="check">Comprobar</button><br>
    <br>
    <button type="submit" name="refresh">Refrescar</button><br><br>


    <input type="hidden" name="oldN1" value="<?php echo $n1?>">
    <input type="hidden" name="oldN2" value="<?php echo $n2?>">
    <input type="hidden" name="oldSign" value="<?php echo $operaciones[$index]?>">
</form>