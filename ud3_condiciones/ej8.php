<?php

/**
 * Carga fecha de nacimiento en variables y calcula la edad.
 * @author Virginia Ordoño Bernier 2021/2022
 */
require("../require/view_condiciones_header.php");
require("../require/view_footer.php");
$message = "";

if (isset($_POST['show'])) {
    $inputDate = new DateTime($_POST['calendar']);
    $currentDate = new DateTime(date("Y-m-d"));
    $difference = $currentDate->diff($inputDate);
    $result =  $difference->format("%y");
    $message = "Tienes ". $result . " años.";
}
?>

<!DOCTYPE HTML>
<html lang='es'>

<head>
    <link rel='stylesheet' type='text/css' href='../css/style_exercises.css' />
</head>

<body>
    <main>
        <h4>Carga fecha de nacimiento en variables y calcula la edad.</h4>
        <div id="result3">
            <form action="" method="post">
                <input type="date" name="calendar">
                <button type="submit" name="show">Calcular</button>
                <?php
                if (isset($_POST['show'])) {
                    echo "<span>". $message ."</span>";
                }
                ?>
            </form>
        </div>
    </main>
</body>
</html>