<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/createsurvey_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";
//var_dump($data);
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
    <div id="addSurvey">
        <form action="" method="post">

            <h3>Nombre de la encuesta</h3>
            <hr>
            <!--Recoge descripción encuesta-->
            <input type="text" value="" name="description" required>

            <button type="submit" class="buttonGreen" name="btn_add">Crear</button>
        </form>
    </div>
</body>

</html>