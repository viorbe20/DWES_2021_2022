<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/createquestions_view_style.css');
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
    <div id="addQuestionForm">
        <form action="" method="post">

            <h3>Nueva pregunta</h3>
            <hr>

            <label><b>Descripción</b></label>
            <?php
            if (isset($data[1])) {
                $description = $data[1];
                $readonly = "readonly";
            } else {
                $readonly = "";
                $description = "";
            }
            ?>
            
            <input type="text" value="<?php echo $description?>" name="description" required <?php
            echo $readonly?>>

            <label><b>Respuesta</b></label>


            <div class="selection">
                <select name="numAnswers">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                </select>
                <button type="submit" name="btn_create" class="btn_add">Crear</button>
            </div>

            <?php
            if (isset($data[0])) {
                for ($i = 1; $i < ($data[0]+1); $i++) {
                    echo "<label><b>Opción $i</b></label>";
                    echo "<input type='text' name='option$i' required>";
                }
            }

            ?>


            <div class="buttons">
                <button type="submit" name="btn_cancel" class="btn_cancel">Terminar</button>
                <button type="submit" name="btn_add" class="btn_add">Añadir</button>
            </div>

        </form>
    </div>

</body>

</html>