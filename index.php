<?php
require("require/view_header.php");
require("require/view_footer.php");

$ejercicios = array (
    array ('id'=>1, 'titulo'=>'Ud3', 'descripcion'=>'Condiciones', 'enlace'=>'ud3_condiciones/index.php'),
    array ('id'=>2, 'titulo'=>'Ud3', 'descripcion'=>'Bucles', 'enlace'=>'ud3_bucles/index.php'),
    array ('id'=>3, 'titulo'=>'Ud3', 'descripcion'=>'Formularios', 'enlace'=>'ud3_formularios/index.php'),
    array ('id'=>4, 'titulo'=>'Ud4', 'descripcion'=>'Cookies', 'enlace'=>'ud4_cookies/index.php'),
    array ('id'=>5, 'titulo'=>'Ud4', 'descripcion'=>'Sesiones', 'enlace'=>'ud4_sesiones/index.php'),
    array ('id'=>6, 'titulo'=>'Proyectos', 'descripcion'=>'', 'enlace'=>'proyectos/index.php'),
)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <title>Virginia Ordoño Bernier</title>
</head>
<body>
    <main>
    <?php 
    foreach ($ejercicios as $key => $value) {
        echo '<a target="_blank" href=' . $value['enlace'] .'>
            <article id=art' . $value['id'] . '>
                <p>' . $value['titulo'] . ': '. $value['descripcion'] . '</p>
            </article>
        </a>';
    }
    ?>
    </main>
</body>
</html>
