<div id="signupForm">
    <?php
    ?>
        <form action="" method="post">
            <div>
                <label>Iniciar sesión
                    <input class="myInput" type="text" name="username" id="inputWord" placeholder="Nombre de usuario" value="admin">
                </label>
                <input class="myInput" type="text" name="passwrd" id="inputWord" placeholder="Contraseña" value="admin">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
            <div>
                <a href='<?php echo DIRBASEURL?>/index/signup_view.php'>Registrarse</a>
            </div>


        </form>
</div>