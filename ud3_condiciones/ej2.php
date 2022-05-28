<?php
/**
 * Reescritura de contraseñas
 * Escribe un script que muestre un formulario con dos inputs de tipo password y verifique en el
 * servidor que las entradas coinciden.
 * @author Virginia Ordoño Bernier
 */
require("../require/view_condiciones_header.php");
require("../require/view_footer.php");
$errorMsg = "";
$ok = "";
$pw1 = "";
$pw2 = "";

//Valida formulario
if (isset($_POST["check"])) {
    //Si hay campos vacíos avisa con mensaje
    if (empty($_POST["pw1"]) || empty($_POST["pw2"])) {
        $errorMsg = "Todo los campos deben estar cumplimentados.";
    } else {
        //Si campos relleno, compara contraseñas y muestra mensaje
        if (($_POST["pw1"] != $_POST["pw2"])) {
            $errorMsg = "Las contraseñas no coinciden.";
        } else {
            $ok = "Las contraseñas coinciden.";
        }
    }
}

?>
<!DOCTYPE HTML>
<html lang='es'>

<head>
    <link rel='stylesheet' type='text/css' href='../css/style_exercises.css' />
</head>
<body>
    <main>
<form action="" method="post">
    <h4>Introduce las contraseñas y verifica que son iguales.</h4>
    <span>Contraseña </span><input type="password" name="pw1"><br><br>
    <span>Repite contraseña </span><input type="password" name="pw2"><br><br>
    <button type="submit" name="check">Comprueba</button><br><br><span class="error">
        <?php
        echo $errorMsg ?></span>
    <span class="ok">
        <?php
        echo $ok ?></span>
</form>
</main>
</body>
<style>
    .error {
        color: red;
    }

    .ok {
        color: green;
    }
</style>