<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;
echo "<style>. $css . </style>";
$name = "";
//$data: contiene usuarios bloqueados
if ($_SESSION['user']['profile'] == "admin") {

?>
    <div class="table_container">

        <h2>Usuarios bloqueados</h2>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Desbloquear</th>
            </tr>


            <?php
            if (!empty($data[0])) {

                foreach ($data[0] as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value["nombre"] . '</td>';
                    echo '<td>' . $value["user"] . '</td>';
                    echo '<td>' . $value["psw"] . '</td>';
                    echo '<td>' . $value["email"] . '</td>';
                    echo '<td><input type="checkbox" id="' . $value["id"] . '" name="' . $value["id"] . '" value="blockedUsers"></td>';
                    echo '</tr>';
                }
            }

            ?>
        </table>
        <div id="buttons_admin">
            <button type="submit" name="btn_unblock">Desbloquear seleccionados</button>
            <button type="submit" name="btn_unblockAll">Desbloquear todos</button>
        </div>
    </div>
<?php
}
?>