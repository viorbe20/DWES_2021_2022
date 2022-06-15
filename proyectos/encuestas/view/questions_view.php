<?php
require('../view/require/header_view.php');
require('../view/require/nav_view.php');

$css = file_get_contents('../view/css/style.css');

echo "<style>. $css . </style>";
//$data[0]=> $data[0] = array($p->getOnlyFour());
//$data[1]=> p->getDescripcionById()
//var_dump($data[0]);
$description;
$readonly;
?>
<html>

<body>
    <main>
        <form action="" method="post">
            <div id="botonesQuestion">
                <input type="submit" value="Mostrar Preguntas" name="showQuestions">
                <input type="submit" value="Crear pregunta" name="addQuestion">
            </div>

            <?php
            if (isset($_POST['showQuestions'])) {
                //Carga vista input búsqueda 
                require('../view/require/search_view.php');

                //Muestra 4 preguntas
            ?>
                <div id="table_container">
                    <table>
                        <tr>
                            <th>Pregunta</th>
                            <th>Seleccionar</th>
                        </tr>

                        <?php
                        foreach ($data[0] as $key => $value) {

                            foreach ($value as $question) {
                                echo '<tr>';
                                echo '<td>' . $question['descripcion'] . '</td>';
                                

                                // //Desmarca todos los checkbox
                                if (isset($_POST['uncheckAll'])) {
                                    $checked = "";
                                } elseif (isset($_POST['checkAll'])) {
                                    $checked = "checked";
                                } else {
                                    $checked = "checked";
                                }

                                echo '<td><input type="checkbox" id="' . $question['id'] . '" name="selected[]" value="' . $question['id'] . '"' . $checked . '></td>';
                                //echo '<td><input type="checkbox" id="' . $value['id']  . '" name="selected[]" value="' . $value['id']  . '"' . $checked . '></td>';
                                echo '</tr>';
                            }
                        }



                        ?>
                    </table>
                    <div id="buttonsBox">
                        <button type="submit" name="checkAll">Marcar</button>
                        <button type="submit" name="uncheckAll">Desmarcar</button>
                    </div>
                </div>
            <?php
            } elseif (isset($_POST['addQuestion'])) {
            ?>
                <div id="addQuestionForm">

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

                    <input type="text" value="<?php echo $description ?>" name="description" required <?php
                                                                                                        echo $readonly ?>>

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
                        for ($i = 1; $i < ($data[0] + 1); $i++) {
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
    <?php
            }
    ?>
    </main>
</body>

</html>