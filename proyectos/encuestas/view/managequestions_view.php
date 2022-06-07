<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/managequestions_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";


?>
<html>
    <nav>
        <ul>
            <li> 
            <a href="<?php echo DIRBASEURL?>/home/managequestions">Preguntas</a>
            </li>
            <li>
            <a href="<?php echo DIRBASEURL?>/home/managesurveys">Encuestas</a>
            </li>
            <li>
            <a href="<?php echo DIRBASEURL?>/home/manageusers">Usuarios</a>
            </li>
        </ul>
    </nav>
    <body>
<main id="mq_container">

    <form action="" method="post">
        <input class="myInput" type="text" name="input_search" id="" placeholder="Busca una pregunta">
        <input class="myButton" type="submit" name="btn_search" value="Buscar">
        <a href='<?php echo DIRBASEURL?>/home/managequestions/addquestion'>Nueva</a>
        <?php

        ?>
    </form>
</main>
    </body>
</html>