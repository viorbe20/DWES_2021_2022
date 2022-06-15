<div id="loginForm">
        <form id="form-login" action="" method="post">
            <div>
                <label>Iniciar sesión
                    <input class="myInput" type="text" name="username" id="inputWord" placeholder="Nombre de usuario" value="admin">
                </label>
                <input class="myInput" type="text" name="passwrd" id="inputWord" placeholder="Contraseña" value="admin">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
            <div>
            <a href='<?php echo DIRBASEURL ?>/home/signup'>Registrarse</a>
            </div>
        </form>
</div>