<?php
/**
 * $data [datosUsuario, array(tantos bookmarks como tenga)]
 */

require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/bookmarks_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";
if ($_SESSION['user']['profile'] == "user") {
?>
    <div class="table_container">

        <h2>Mis Bookmarks</h2>

        <table>
            <tr>
                <th>Url</th>
                <th>Descripcióm</th>
                <th>Editar</th>
                <th>Contraseña</th>
            </tr>


            <?php
            if (!empty($data[1])) {
                echo "<form action=\"\" method=\"post\">";
                foreach ($data[1] as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value["bm_url"] . '</td>';
                    echo '<td>' . $value["descripcion"] . '</td>';
                    echo '<td> Borrar </td>';
                    echo '<td> Editar </td>';
                    echo '</tr>';
                }
            }

            ?>
        </table>
        <div id="buttons_admin">
            <button type="submit" name="btn_uncheckAll">>Añadir un Bookmarks</button>
        </div>
    </div>
    </form>
<?php
}
?>