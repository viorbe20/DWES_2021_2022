<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/addquestions_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";

// $data[0]-> id encuesta
// $data[1]-> enunciado
//$data[2]-> 4 últimas preguntas
// 
// if (!empty($data)) {
//     # code...
//     var_dump($data);
// }

?>
<html>
<nav>
    <ul>
        <li>
            <a href="<?php echo DIRBASEURL ?>/home/createquestions">Preguntas</a>
        </li>
        <li>
            <a href="<?php echo DIRBASEURL ?>/home/createsurvey">Encuestas</a>
        </li>
    </ul>
</nav>

<body>
    <main id="mq_container">
        <h3><?php
        echo $data[1]?></h3>

        <form action="" method="post">
            <input type="text" name="btn_search" placeholder="Busca una pregunta">
            <input type="button" value="Buscar">

            <?php
            //Muestra 4 preguntas
foreach ($data[2] as $key => $value) {
    var_dump($value['id']);
}
            ?>
        </form>
    </main>

</body>

</html>