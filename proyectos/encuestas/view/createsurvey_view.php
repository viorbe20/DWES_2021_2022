<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/createsurvey_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";
//$data[0]=> número de inputs que hay que crear para las opciones
//$data[1]=> enunciado de la pregunta
$description;
$readonly;
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

            <input type="text" value="" name="description" required>

            <div class="buttons">
                <button type="submit" name="btn_add" class="btn_add">Crear</button>
            </div>
    </div>
    </form>
    </div>

</body>

</html>