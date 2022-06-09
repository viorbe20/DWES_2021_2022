<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/selectedsurvey_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";
$tituloEncuesta = $data['descripcion'];
?>
<pre><?php var_dump($data)?><pre>
<html>

<body>
<div id="selectedSurveyForm">
        <form action="" method="post">

            <h3><?php echo $tituloEncuesta?></h3>
            <hr>


            <div class="buttons">
                <button type="submit" name="btn_cancel" class="btn_cancel">Terminar</button>
                <button type="submit" name="btn_add" class="btn_add">Añadir</button>
            </div>

        </form>
    </div>
</body>

</html>