<?php
/**
 * Carga en variables mes y año e indica el número de días del mes. 
 * @author Virginia Ordoño Bernier 2021/2022
 */
require("../require/view_condiciones_header.php");
require("../require/view_footer.php");

$message = "";
$month = "";
$year = "";

if (isset($_POST['show'])) {
    if ((empty($_POST['month'])) || (empty($_POST['year']))) {
        $message = "Los campos deben estar rellenos";
    } else {
        $number = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
        $month = $_POST['month'];
        $year = $_POST['year'];
        $months = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        $message =  "Hay " . $number . " días en " . $months[($month - 1)] . " de " . $year . ".";
    }
}
?>

<!DOCTYPE HTML>
<html lang='es'>

<head>
    <link rel='stylesheet' type='text/css' href='../css/style.css' />
</head>

<body>
    <h3>Carga en variables mes y año e indica el número de días del mes.</h3>
    <main>
        <div id="result2">
            <form action="" method="post">
                <label for="month">Mes <input type="number" name="month" min=1 max=12 value=<?php echo $month
                                                                                            ?>></label><br><br>
                <label for="year">Año <input type="number" name="year" min=1800 max=2100 value=<?php echo $year
                                                                                                ?>></label><br><br>
                <button type="submit" name="show">Calcular</button>
                <?php
                if (isset($_POST['show'])) {
                    echo "<span>" . $message . "</span>";
                }
                ?>
            </form>
        </div>
    </main>
</body>
</html>