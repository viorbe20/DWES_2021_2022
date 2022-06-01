<?php
$css = file_get_contents('../view/css/usersTable_style.css');
echo "<style>. $css . </style>";
$name = "";
//$data: contiene usuarios bloqueados
if ($_SESSION['user']['profile'] == "admin") {

?>
    <div id="table_container">


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
            foreach ($data[0] as $key => $value) {
                echo '<tr>';
                echo '<td>'. $value["nombre"] .'</td>';
                echo '<td>'. $value["user"] .'</td>';
                echo '<td>'. $value["psw"] .'</td>';
                echo '<td>'. $value["email"] .'</td>';
                echo '</tr>';
                }
                ?>
        </table>
    </div>
<?php
}
?>