<?php
/**
 * $data [datosUsuario, array(tantos bookmarks como tenga)]
 */

require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/edit_bm_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";

?>        
    <h2>Edita el marcador</h2>
<form method="post">
    <?php
    foreach ($data[0] as $key => $value) {
    ?>
        <!--urldecode():Decodes any %## encoding in the given string. Plus symbols ('+') are decoded to a space character.-->
        <!--current() - returns the value of the current element in an array. $data[0] in this case-->
        <label>Url
            <input class = "myInput" type="text" name="editUrl" value="<?php echo urldecode($value['bm_url'])?>">
        </label>
        <label>Descripción
            <input class = "myInput" type="text" name="editDescription" value="<?php echo urldecode($value['descripcion'])?>">
        </label>
        <input class = "myButton" type="submit" value="Editar" name="btn_edit">
        
        <?php
    }
    ?>

</form>