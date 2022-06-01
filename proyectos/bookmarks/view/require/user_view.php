<?php
$css = file_get_contents('../view/css/usersTable_style.css');
echo "<style>. $css . </style>";
$name = "";
//$data: contiene usuarios bloqueados
if ($_SESSION['user']['profile'] == "user") {

?>
    <div class="table_container">
        
        <h2>Tus Marcadores</h2>

        <table>
            <tr>

                <th>Url</th>
                <th>Descripción</th>
            </tr>


            <?php
            // if (!empty($data[0])) {
                
            //     foreach ($data[0] as $key => $value) {
            //         echo '<tr>';
            //         echo '<td>' . $value["url"] . '</td>';
            //         echo '<td>' . $value["descripcion"] . '</td>';
            //         echo '</tr>';
            //     }
            // }

            ?>
        </table>
        <div id="buttons_admin">
            <!-- <button type="submit" name="btn_unblock">Desbloquear seleccionados</button>
            <button type="submit" name="btn_unblockAll">Desbloquear todos</button> -->
        </div>
    </div>
<?php
}
?>