<?php
require('../view/require/header_view.php');
require('../view/require/nav_view.php');

$css = file_get_contents('../view/css/style.css');

echo "<style>. $css . </style>";
//$data[0]=> número de inputs que hay que crear para las opciones
//$data[1]=> enunciado de la pregunta
$description;
$readonly;
?>
<html>

<body>
    <main>
        <form action="" method="post">
            <div>
                <input type="submit" value="Mostrar Preguntas" name="showQuestions">
                <input type="submit" value="Crear pregunta" name="addQuestion">
            </div>

            <?php
            if (isset($_POST['showQuestions'])) {
                require('../view/require/search_view.php');
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