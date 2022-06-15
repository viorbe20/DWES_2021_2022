<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Cabecera</title>
</head>

<body>
    <header>
        <h2>Ejercicio Php</h2>
        <!--Muestra la información del perfil que está conectado-->
        <div id="auth">
            <div>
                <!--Icono usuario y nombre-->
                <section>
                    <span id="img" class="material-symbols-outlined">
                        account_circle
                    </span>
                    <div><?php echo strtoupper($_SESSION['user']['profile']) ?></div>
                </section>

                <!--Icono de salir-->
                <?php
                ?>
                    <section> 
                        <a id="icon-logout" href="<?php echo DIRBASEURL . '/index/logout' ?>"><span class="material-symbols-outlined">logout</span><label>Salir</label></a>
                    </section>
                <?php

                ?>
            </div>
            <div>
                <p>Hoy es <?php echo date('d-m-Y, h:i a', time()) ?></p>
            </div>
        </div>
    </header>
</body>

</html>
