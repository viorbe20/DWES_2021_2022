<?php
require('../view/require/header_view.php');

// $css1 = file_get_contents('../view/css/style.css');
// $css2 = file_get_contents('../view/css/header_style.css');
// //$css3 = file_get_contents('../view/css/m_style.css');
// $css = $css1 . $css2 . $css3;
// echo "<style>. $css . </style>";


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


    </body>
</html>