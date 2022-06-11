<?php
require('../view/require/header_view.php');

// $css1 = file_get_contents('../view/css/style.css');
// $css2 = file_get_contents('../view/css/header_style.css');
// $css3 = file_get_contents('../view/css/managequestions_view_style.css');
// $css = $css1 . $css2 . $css3;
// echo "<style>. $css . </style>";

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
            
            <form action="" method="post">
                <input class="myInput" type="text" name="input_search" id="" placeholder="Busca una pregunta">
                <input class="myButton" type="submit" name="btn_search" value="Buscar">
                <a href='<?php echo DIRBASEURL?>/home/managequestions/addquestion'>Nueva</a>
                <?php

?>
    </form>
    

    <div id="showFour">
        <?php
        if (isset($data)) {
            var_dump($data);
        }
            //$data[0]=> contiene las preguntas
            foreach ($data[0] as $value) {
                echo "<p class='question4'>" . $value["descripcion"] . "</p>";
            }


        ?>
    </div>
</main>
    </body>
</html>