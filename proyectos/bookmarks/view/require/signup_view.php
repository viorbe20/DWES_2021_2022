<?php
$css = file_get_contents('../view/css/signup_style.css');
echo "<style>. $css . </style>";
$name = "";
?>

<div id="signupForm">
    <?php
    ?>
    <form action="" method="post">
        <div class="container">
            <h2>Registro Usuario</h2>
            <hr>

            <label for="name"><b>Nombre</b></label>
            <input type="text" value="<?php echo $name?>" name="name" required>

            <label for="lastname"><b>Apellido</b></label>
            <input type="text" value="Ordoño" name="lastname" required>

            <label for="name"><b>Nombre de usuario</b></label>
            <input type="text" value="orbevi" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" value="vir@virginia.com" name="email" required>

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" value="orbevi" name="psw" required>

            <label for="psw-repeat"><b>Repite Contraseña</b></label>
            <input type="password" value="orbevi" name="psw-repeat" required>

            <h2>Bookmarks</h2>
            <hr>

            <label for="name"><b>Url</b></label>
            <input type="text" value="" name="url" required>

            <label for="description"><b>Descripción</b></label>
            <textarea type="text"  placeholder="Página web del instituto" name="description" required></textarea>
            <div class="clearfix">
                <button type="submit" name="btn_addBookmark" id="btn_addBookmark">Añadir bookmark</butt>
            </div>
            <p>Con la creación del usuario acepto los <a href="#" style="color:dodgerblue">Términos y Condiciones</a>.</p>

            <div class="clearfix">
                <button type="submit" name="btn_cancel" class="btn_cancel">Cancelar</button>
                <button type="submit" name="btn_signup" class="btn_signup">Registrarse</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>