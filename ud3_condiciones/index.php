<?php
require("../require/view_header.php");
require("../require/view_condiciones_header.php");
require("../require/view_home.php");


$ejercicios = array(
    array('id' => 1, 'titulo' => 'Número aleatorio', 'descripcion' => 'Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números que han sido solicitados previamente mediante un formulario.', 'enlace' => 'ej1.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej1.php'),
    array('id' => 2, 'titulo' => 'Reescritura de contraseñas', 'descripcion' => 'Escribe un script que muestre un formulario con dos inputs de tipo password y verifique en el servidor si las entradas coinciden.', 'enlace' => 'ej2.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej2.php'),
    array('id' => 3, 'titulo' => 'Operaciones aritméticas', 'descripcion' => 'Escribe un script que muestre al usuario un formulario con una operación aritmetica básica, generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se realizó correctamente.', 'enlace' => 'ej3.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej3.php'),
    array('id' => 4, 'titulo' => 'Encuesta', 'descripcion' => 'Escribe un script que muestre un formulario que permita la votación de 10 items(items1, items2...) mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.', 'enlace' => 'ej4.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej4.php'),
    array('id' => 5, 'titulo' => 'Figuras geométricas', 'descripcion' => 'Escribe un script que muestre una figura geométrica utilizando el formato svg. Para ello el script mostrará un formulario con un radio buton con las figuras disponibles: círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará los datos necesarios para su visualización.', 'enlace' => 'ej5.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej5.php'),
    array('id' => 6, 'titulo' => 'Almacena números', 'descripcion' => 'Escribe un script donde se almacenen tres números en variables. Esos números deben aparecer por pantalla de manera ordenada.', 'enlace' => 'ej6.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej6.php'),
    array('id' => 7, 'titulo' => 'Días del mes', 'descripcion' => 'Escribe un script en el que se pueda introducir un mes y año. Aparecerá un mensaje que debe indicar los días que tiene ese mes en concreto.', 'enlace' => 'ej7.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej7.php'),
    array('id' => 8, 'titulo' => 'Calcula edad', 'descripcion' => 'Escribe un script en el que se pueda introducir una fecha. A partir de ella, debe aparecer un mensaje indicando la edad', 'enlace' => 'ej8.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_condiciones/ej8.php'),

);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/style_units.css' />
    <title>Virginia Ordoño Bernier</title>
</head>

<body>
    <main>
        <?php
        foreach ($ejercicios as $key => $value) {
            echo '<article id="art' . $value['id'] . '">
        <div class="titulo">' . $value['titulo'] . '</div>
        <div class="descripcion">' . $value['descripcion'] . '</div>
        <div class="enlaces">
        <a target="_blank" href="' . $value['enlace'] . '">Ejercicio</a>
        <a target="_blank" href="' . $value['github'] . '">Código</a>
        </div>
        </article>';
        }
        ?>
    </main>
</body>

</html>