<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/selectedsurvey_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";
$tituloEncuesta = $data[0]['descripcion'];

?>
<html>

<body>
    <div id="selectedSurveyForm">
        <form action="" method="post">

            <h3><?php echo $tituloEncuesta ?></h3>
            <hr>
            <?php
            foreach ($data[1]['preguntas'] as $key => $preguntas) {
                //var_dump($preguntas);
                $idPregunta = $preguntas['id'];
                $descripcionPregunta = $preguntas['descripcion'];
                echo '<h4>' . $descripcionPregunta . '</h4>';

                foreach ($preguntas['opciones'] as $value) {
                    $enunciadoOpcion = $value['opcion'];
                    $idOpcion = $value['id'];
                    echo '<label>' . $enunciadoOpcion . ' <input type="radio" value="' . $idOpcion . '" name="' . $idPregunta . '"></label>';
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