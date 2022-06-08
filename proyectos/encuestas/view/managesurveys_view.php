<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css3 = file_get_contents('../view/css/managesurveys_view_style.css');
$css = $css1 . $css2 . $css3;
echo "<style>. $css . </style>";

?>
<html>
<nav>
    <ul>
        <li>
            <a href="<?php echo DIRBASEURL ?>/home/managequestions">Preguntas</a>
        </li>
        <li>
            <a href="<?php echo DIRBASEURL ?>/home/managesurveys">Encuestas</a>
        </li>
        <li>
            <a href="<?php echo DIRBASEURL ?>/home/manageusers">Usuarios</a>
        </li>
    </ul>
</nav>

<body>
    <main id="mq_container">

        <form action="" method="post">
            <input class="myInput" type="text" name="input_search" id="" placeholder="Busca una pregunta">
            <input class="myButton" type="submit" name="btn_search" value="Buscar">
            <?php

            ?>



            <div class="table_container">

                <h2>Selecciona preguntas</h2>

                <table>
                    <tr>
                        <th>Pregunta</th>
                        <th>Encuesta</th>
                        <th>Agregar</th>
                    </tr>


                    <?php
                    if (!empty($data[0])) {

                        foreach ($data[0] as $key => $preg) {
                            echo '<tr>';
                            echo '<td>' . $preg["descripcion"] . '</td>';
                            echo '<td><select>';
                            foreach ($data[1] as $encu) {
                                echo '<option value="'. $preg["id"] .'-'. $encu["id"] .'">' . $encu['descripcion'] . '</option>';
                            }
                            echo '</select></td>';
                            echo '<td><input type="checkbox" value="Agregar" name="add[]"></td>';
                            echo '</tr>';
                        }
                    }

                    ?>
                </table>
            </div>
            <div id="buttonBox">
                <input class="myButton" type="submit" name="btn_add" value="Agregar"> 
            </div>
        </form>
    </main>

</body>

</html>