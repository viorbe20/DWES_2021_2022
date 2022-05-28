<!--Ejercicio 5. Figuras geométricas.
Escribe un script que muestre una figura geométrica utilizando el formato svg. Para ello el script
mostrará formulario con un radio button con las figuras disponibles: círculo, rectángulo, cuadrado y
un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará los
datos necesarios para su visualización.
Virginia Ordoño Bernier
-->

<?php
$procesaFormulario = false;
$procesaFormulario2 = false;
$errorMsg = "";
$dataError = "";

if (isset($_POST["submit"])) {

    $procesaFormulario = true;

    //Si no se ha seleccionado figura muestra mensaje
    if (empty($_POST["figure"])) {
        $procesaFormulario = false;
        $errorMsg = "Debes seleccionar una figura";
    }
}

if (isset($_POST["submit2"])) {

    $procesaFormulario = true;
    $procesaFormulario2 = true;

    switch ($_POST["figure"]) {
        case 'circle':
            if ((empty($_POST["radio"]))) {
                $procesaFormulario2 = false;
                $dataError = "Indica el radio";
            }
            break;

        case 'rectangle':
            if ((empty($_POST["height"])) || (empty($_POST["width"]))) {
                $procesaFormulario2 = false;
                $dataError = "Indica el ancho y el alto";
            }
            break;

        case 'square':
            if ((empty($_POST["side"]))) {
                $procesaFormulario2 = false;
                $dataError = "Indica el lado";
            }
            break;
    }
}
?>

<!--Formulario inicial-->
<form action="" method="post">
    <h1>Ejercicio 5</h1>
    <h2>Elige una figura y su color y pulsa mostrar.</h2>
    <label>Círculo <input type="radio" name="figure" value="circle"></label><br><br>
    <label>Rectángulo <input type="radio" name="figure" value="rectangle"></label><br><br>
    <label>Cuadrado <input type="radio" name="figure" value="square"></label><br><br>

    Color
    <select name="color">
        <option value="yellow">Amarillo</option>
        <option value="blue">Azul</option>
        <option value="green">Verde</option>
    </select>

    <br><br>
    <button type="submit" name="submit">Seleccionar</button><br><br><span>
        <span class="error"><?php echo $errorMsg; ?></span><br />

</form>

<!--Parte 2: muestra opciones para seleccionar alto y ancho-->
<form action="" method="post">
    <?php

    if ($procesaFormulario) {
        switch ($_POST["figure"]) {
            case 'circle':
                echo 'Introduce el radio <input type="number" name="radio" value="50"> <input type="hidden" name="figure" value=' . $_POST["figure"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . ' > <span class="error"> ' . $dataError . ' </span><br/><br/>';
                break;

            case 'rectangle':
                echo 'Introduce el alto <input type="number" name="height" value="70"> <br><br> Introduce el ancho <input type="number" name="width" value="100"> <input type="hidden" name="figure" value=' . $_POST["figure"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <span class="error"> ' . $dataError . ' </span><br/><br/>';
                break;

            case 'square':
                echo 'Introduce el lado <input type="number" name="side" value="100"> <input type="hidden" name="figure" value=' . $_POST["figure"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <span class="error"> ' . $dataError . ' </span><br/><br/>';
                break;
        }

        echo '<input type="submit" value="Mostrar" name="submit2">';
    }
    ?>
</form>

<!--Parte 3: muestra la figura-->
<?php
if ($procesaFormulario2) {

    echo '<svg width="200" height="200">';
    switch ($_POST["figure"]) {
        case 'circle':
            echo '<circle cx="50" cy="50" r="' . $_POST["radio"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'rectangle':
            echo '<rect x="' . $_POST["width"] / 2 . '" y="' . $_POST["height"] / 2 . '" width="' . $_POST["width"] . '" height="' . $_POST["height"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'square':
            echo '<rect x="' . $_POST["side"] / 2 . '" y="' . $_POST["side"] / 2 . '" width="' . $_POST["side"] . '" height="' . $_POST["side"] . '" fill="' . $_POST["color"] . '"/>';
            break;
    }
    echo '</svg>';
}
?>

<style>
    .error {
        color: #FF0000;
    }
</style>