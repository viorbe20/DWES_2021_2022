<?php
require("../require/view_header.php");
require("../require/view_proyectos_header.php");
require("../require/view_home.php");


$ejercicios = array(
    array('id' => 1, 'titulo' => 'Buscaminas', 'descripcion' => 'Crea el juego del buscaminas.  El tablero está dividido en celdas, con minas distribuidas al azar. Para ganar, debes abrir todas las celdas que no contienen minas.', 'enlace' => 'buscaminas/ej1.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/proyectos/buscaminas/index.php'),
    array('id' => 2, 'titulo' => 'Test autoescuela', 'descripcion' => 'Escribe un script que muestre un test de autoescuela.', 'enlace' => 'testAutoescuela/ej1.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/proyectos/testAutoescuela/ej1.php'),
    array('id' => 3, 'titulo' => 'Sopa de Letras V1', 'descripcion' => 'Escribe un script que muestre una sopa de letras con 5 capitales almacenadas.', 'enlace' => 'sopaLetrasV1/index.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/proyectos/sopaLetrasV1/index.php'),
    array('id' => 4, 'titulo' => 'Sopa de Letras V2', 'descripcion' => 'Muestra una sopa de letras con 5 capitales almacenadas. En esta versión se usan sesiones para guardar la información.', 'enlace' => 'sopaLetrasV2/index.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/proyectos/sopaLetrasV2/index.php'),
    array('id' => 5, 'titulo' => 'Puzzle infantil', 'descripcion' => 'Se debe crear una aplicación que permita resolver puzles infantiles de tres piezas. Aplica criterios de usabilidad en el diseño de la aplicación intentando conseguir la mejor experiencia de usuario.', 'enlace' => 'puzzle/index.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/proyectos/puzzle/index.php'),
    array('id' => 5, 'titulo' => 'Sopa de Letras (Modo Vista Controlador)', 'descripcion' => 'Aplicación con sesiones invitado y admin. El invitado puede buscar ciudades y el admin además crearlas, editarlas y eliminarlas.', 'enlace' => '../db/wordSearchV3/public/index.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/db/wordsearchV3/public/index.php'),

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