<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/showsurveys_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";
//$data[0]=> número de inputs que hay que crear para las opciones
//$data[1]=> enunciado de la pregunta
$description;
$readonly;
?>
<html>

<body>
<div>Muestra encuesta</div>

</body>

</html>