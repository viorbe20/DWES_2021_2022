<!--Ejercicio 2.  Reescritura de contraseñas
Escribe un script que muestre un formulario con dos inputs de tipo password y verifique en el
servidor que las entradas coinciden.
Virginia Ordoño Bernier
-->
<?php
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

<form action="" method="post">
    <h1>Ejercicio 2</h1>
    <h2>Introduce las contraseñas y verifica que son iguales.</h2>
    <span>Contraseña </span><input type="password" name="pw1"><br><br>
    <span>Repite contraseña </span><input type="password" name="pw2"><br><br>
    <button type="submit" name="check">Comprueba</button><br><br><span class="error">
        <?php
        echo $errorMsg ?></span>
    <span class="ok">
        <?php
        echo $ok ?></span>
</form>

<style>
    .error {
        color: red;
    }

    .ok {
        color: green;
    }
</style>