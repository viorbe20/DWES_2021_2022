<?php
require("../require/view_header.php");
require("../require/view_sesiones_header.php");
require("../require/view_home.php");


$ejercicios = array(
    array('id' => 1, 'titulo' => 'Lista de contactos', 'descripcion' => 'Formulario que pide nombre y teléfono. Una vez introducidos se da al botón enviar para visualizar la lista de contactos en la parte inferior de la pantalla.', 'enlace' => 'ej1.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_sesiones/ej1.php'),

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