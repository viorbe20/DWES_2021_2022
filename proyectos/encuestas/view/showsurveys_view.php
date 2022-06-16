<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/showsurveys_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";


?>
<html>

<body>


    <div id="addQuestionForm">
        <form action="" method="post">

            <h3>Selecciona la encuesta</h3>
            <hr>

            <div class="selection">
                <select name="surveys">
                    <?php
                    for ($i=0;  $i < count($data[0]); $i++) { 
                        
                        echo '<option value='. $data[0][$i]['id'] .'>'. $data[0][$i]['descripcion'] .'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="buttons">
                <button type="submit" name="btn_showSurvey" class="btn_showSurvey">Mostrar</button>
            </div>

        </form>
    </div>

</body>

</html>